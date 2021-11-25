<?php

namespace App\Http\Controllers;

use App\Services\AnimalService;
use App\Services\AnnouncementService;
use App\Services\ShelterService;
use Illuminate\Http\Request;

class AnimalController extends Controller
{
    public function createAnimal(Request $request)
    {
       AnimalService::createAnimal($request);
    }

    public function editAnimal(Request $request, $id)
    {
        AnimalService::editAnimal($request, $id);
    }
    public function deleteAnimal($id)
    {
        AnimalService::deleteAnimal($id);
    }
}
