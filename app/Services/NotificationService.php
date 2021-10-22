<?php

namespace App\Services;

use App\Services\UserService;

class NotificationService
{
    public static function getUnreadNotifications($projectType = null): bool|string
    {
        $allNotifications = UserService::getUserBySession()
            ->unreadNotifications;
        switch ($projectType) {
            case null:
                $notification = (array) $allNotifications;
                return json_encode(array_shift($notification));
            default:
                if ($allNotifications !== null) {
                    $rawNotifications = (array) $allNotifications
                        ->where('type', "App\Notifications\\" . $projectType);
                } else {
                    return json_encode(null);
                }
        }

        return json_encode(array_shift($rawNotifications));
    }

    public static function readNotification($notificationId): void
    {
        UserService::getUserBySession()
            ->unreadNotifications
            ->where('id', $notificationId)
            ->first()
            ->markAsRead();
    }
}
