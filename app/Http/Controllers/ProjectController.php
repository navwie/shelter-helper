<?php

namespace App\Http\Controllers;

use App\Http\Requests\AddUserToProjectRequest;
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

    public function selectProject($id): void
    {
        ProjectService::selectProject($id);
    }

    public function selectAndOpenProjectPage($id):void
    {
        ProjectService::selectProject($id);
        header('location: /projectPage/' . $id);
    }

    public function unselectProject(): void
    {
        ProjectService::unselectProject();
    }

    public function addUserToProject(AddUserToProjectRequest $request): void
    {
        ProjectService::addUserToProject($request);
    }

    public function editProject(Request $request)
    {
        ProjectService::editProject($request);
    }
}
