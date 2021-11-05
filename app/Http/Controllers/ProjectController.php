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

    public function deleteProject(Request $request): void
    {
        ProjectService::deleteProject($request);
    }

    public function selectProject(Request $request): void
    {
        ProjectService::selectProject($request);
    }

    public function selectAndOpenProject($id):void
    {
        $request = Request::create(
          '/',
          'GET',
          [
              'id' => $id
          ]
        );
        ProjectService::selectProject($request);
        header('location: /projectPage/' . $id);
    }

    public function unselectProject(Request $request): void
    {
        ProjectService::unselectProject();
    }

    public function addUserToProject(AddUserToProjectRequest $request): void
    {
        ProjectService::addUserToProject($request);
    }

    public function editProject(Request $request): void
    {
        ProjectService::editProject($request);
    }
}
