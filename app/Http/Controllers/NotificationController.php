<?php

namespace App\Http\Controllers;

use App\Services\NotificationService;

class NotificationController
{
    public function readNotification(): void
    {
        $id = request("id");
        NotificationService::readNotification($id);
    }
}
