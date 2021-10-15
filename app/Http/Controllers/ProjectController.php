<?php

namespace App\Http\Controllers;

use App\Http\Requests\CreateProjectRequest;
use App\Services\ProjectService;
use Illuminate\Http\Request;

class ProjectController extends Controller
{
    public function createProject(CreateProjectRequest $request): void
    {
        ProjectService::createProject($request);
    }

    public function deleteProject($id): void
    {
        ProjectService::deleteProject($id);
    }
}
