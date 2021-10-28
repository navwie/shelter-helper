<?php

namespace App\Services;

use App\Http\Requests\AddUserToProjectRequest;
use App\Http\Requests\CreateProjectRequest;
use App\Models\Project;
use App\Notifications\AddExistedUserToProjectNotification;
use App\Notifications\CreateProjectNotification;
use App\Notifications\DeleteProjectNotification;
use App\Services\UserService;
use App\Models\User;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Notification;
use stdClass;

class ProjectService
{
    public static function createProject(CreateProjectRequest $request): void
    {
        $projectId = DB::table('projects')->insertGetId([
            'name' => $request['name'],
            'description' => $request['description'],
            'author_id' => session()->get('userId')
        ]);

        DB::table("boards")->insert([
            'project_id' => $projectId
        ]);

        DB::table("projects_users")->insert([
            'project_id' => $projectId,
            'user_id' => session()->get('userId'),
            'role' => 'Owner'
        ]);

        $project = self::getProjectById($projectId);
        $user = User::find(session()->get("userId"));

        Notification::sendNow($user, new CreateProjectNotification($project->getName()));

        header("Location: /projects");
    }

    public static function getAllProjects(): string|bool
    {
        return json_encode(
            DB::select('select * from projects, projects_users where projects_users.user_id = ? and projects.id = projects_users.project_id',
                [session()->get("userId")]
            )
        );
    }

    public static function getProjectBySession(): string|bool
    {
        return json_encode(DB::table('projects')
            ->where("id", "=", session()->get('activeProject'))
            ->first());
    }

    public static function deleteProject($id): void
    {
        $project = self::getProjectById($id);
        $user = User::find(session()->get("userId"));

        Notification::sendNow($user, new DeleteProjectNotification($project->getName()));

        DB::table('projects')->delete($id);

        header("Location: /projects");
    }

    public static function selectProject($id): void
    {
        session()->put("activeProject", $id);

        header("Location: /projects");
    }

    public static function unselectProject(): void
    {
        session()->pull("activeProject");

        header("Location: /projects");
    }

    public static function getProjectById($id)
    {
        $projectDb = DB::table("projects")
            ->where('id', '=',  $id)
            ->first();
        return new Project($projectDb->id, $projectDb->name, $projectDb->description, $projectDb->author_id);
    }

    public static function addUserToProject(AddUserToProjectRequest $request): void
    {
        $userByEmail = User::where('email', $request['email'])->first();
        $project = self::getProjectById(session()->get('project'));

        if ($userByEmail !== null) {
            DB::table("projects_users")->insert([
                'project_id' => $project->getId(),
                'user_id' => $userByEmail->id,
                'role' => $request['role']
            ]);
        }

        header("location: /projectPage/" . $project->getId());

    }



}
