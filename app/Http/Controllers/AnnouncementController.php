<?php

namespace App\Http\Controllers;

use App\Services\AnnouncementService;
use Illuminate\Http\Request;

class AnnouncementController extends Controller
{
    public function createAnnouncement(Request $request)
    {
        AnnouncementService::createAnnouncement($request);
    }

    public function deleteAnnouncement($id)
    {
        AnnouncementService::deleteAnnouncement($id);
    }
}
