<?php

namespace App\Services;

use App\Services\UserService;

class NotificationService
{
    /**
     * Return unread notifications by notification type
     * Return all unread notifications if type equals null
     *
     * @param null $projectType
     * @return bool|string
     */
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

    /**
     * Get notification id and makes it read
     *
     * @param $notificationId
     */
    public static function readNotification($notificationId): void
    {
        UserService::getUserBySession()
            ->unreadNotifications
            ->where('id', $notificationId)
            ->first()
            ->markAsRead();
    }
}
