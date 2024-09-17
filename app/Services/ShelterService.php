<?php

namespace App\Services;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class ShelterService
{
    public static function createShelter(Request $request)
    {
        DB::table('Shelter')->insert([
            'ID_user' => session()->get('userId'),
            'Name' => $request['name'],
            'Address' => $request['address'],
            'Phone' => $request['phone'],
            'Email' => $request['email'],
        ]);

        header('location: /userPage');
    }

    public static function getShelterForUser()
    {
        return json_encode(DB::table('Shelter')
            ->where('ID_user', session()->get('userId'))
            ->first());
    }

    public static function editShelter(Request $request, $id)
    {
        DB::table('Shelter')
            ->where('id', $id)
            ->update([
                'Name' => $request['name'],
                'Address' => $request['address'],
                'Phone' => $request['phone'],
                'Email' => $request['email'],
            ]);

        header('Location: /adminProfile');
    }
}
