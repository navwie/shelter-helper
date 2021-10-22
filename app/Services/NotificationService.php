<?php

namespace App\Services;

use App\Services\UserService;

class NotificationService
{
    public static function getUnreadCreateProjectNotifications()
    {
        $rawNotifications = (array) UserService::getUserBySession()->unreadNotifications;
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
