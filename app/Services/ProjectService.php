<?php

namespace App\Services;

use App\Http\Requests\CreateProjectRequest;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Redirect;
use Illuminate\Support\Facades\View;
use stdClass;

class ProjectService
{
    public static function createProject(CreateProjectRequest $request): void
    {
        DB::table('projects')->insert([
            'name' => $request['name'],
            'description' => $request['description'],
            'author_id' => session()->get('userId')
        ]);

        header("Location: /projects");
    }

    public static function getAllProjects(): string|bool
    {
        return json_encode(DB::table('projects')
            ->get());
    }

    public static function getProjectBySession(): stdClass|null
    {
        return DB::table('projects')
            ->where("id", "=", session()->get('project'))
            ->first();
    }

    public static function deleteProject($id): void
    {
        DB::table('projects')->delete($id);

        header("Location: /projects");
    }

    public static function selectProject($id): void
    {
        session()->put("project", $id);

        header("Location: /projects");
    }

    public static function unselectProject(): void
    {
        session()->pull("project");

        header("Location: /projects");
    }



}
