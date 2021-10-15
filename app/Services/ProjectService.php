<?php

namespace App\Services;

use App\Http\Requests\CreateProjectRequest;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Redirect;
use Illuminate\Support\Facades\View;

class ProjectService
{
    public static function createProject(CreateProjectRequest $request): void
    {
        DB::table('projects')->insert([
            'name' => $request['name'],
            'description' => $request['description'],
        ]);

        header("Location: /projects");
    }

    public static function deleteProject($id): void
    {
        DB::table('projects')->delete($id);

        header("Location: /projects");
    }

}
