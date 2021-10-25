<?php

namespace App\Http\Controllers;

use App\Services\NotificationService;

class NotificationController extends Controller
{
    public function readNotification(): void
    {
        $id = request("id");
        NotificationService::readNotification($id);
    }
}
