<?php

namespace App\Services;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class AnnouncementService
{
    public static function createAnnouncement(Request $request)
    {
        //TODO edit shelter id when Lesia make front
        DB::table('Announcement')->insert([
            'ID_shelter' => 1,
            'Topic' => $request['topic'],
            'Description' => $request['description']
        ]);

        header("location: /announcement");
    }

    public static function deleteAnnouncement($id)
    {
        DB::table('Announcement')->delete($id);
        header('location: /announcement');
    }
}
