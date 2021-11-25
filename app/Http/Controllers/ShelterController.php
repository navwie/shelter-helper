<?php

namespace App\Http\Controllers;

use App\Services\ShelterService;
use Illuminate\Http\Request;

class ShelterController extends Controller
{
    public function createShelter(Request $request)
    {
        ShelterService::createShelter($request);
    }

    public function editShelter(Request $request, $id)
    {
        ShelterService::editShelter($request, $id);
    }
}
