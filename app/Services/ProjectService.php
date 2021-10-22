<?php

namespace App\Services;

use App\Http\Requests\CreateProjectRequest;
use App\Models\Project;
use App\Notifications\CreateProjectNotification;
use App\Notifications\DeleteProject;
use App\Services\UserService;
use App\Models\User;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Notification;
use stdClass;

class ProjectService
{
    public static function createProject(CreateProjectRequest $request): void
    {
        $id = DB::table('projects')->insertGetId([
            'name' => $request['name'],
            'description' => $request['description'],
            'author_id' => session()->get('userId')
        ]);

        $project = self::getProjectById($id);
        $user = User::find(session()->get("userId"));

        Notification::sendNow($user, new CreateProjectNotification($project->getName()));

        header("Location: /projects");

        /*event(new CreateProjectNotification($project->getName()));*/
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
       /* $project = self::getProjectById($id);
        $user = UserService::getUserBySession();
        Notification::sendNow($user, new DeleteProject($user, $project));*/

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

    public static function getProjectById($id): Project
    {
        $projectDb = DB::table("projects")
            ->where('id', '=',  $id)
            ->first();

        return new Project(
            $projectDb->id,
            $projectDb->name,
            $projectDb->description,
            $projectDb->author_id
        );
    }



}
