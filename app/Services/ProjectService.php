<?php

namespace App\Services;

use App\Http\Requests\AddUserToProjectRequest;
use App\Http\Requests\CreateProjectRequest;
use App\Models\Project;
use App\Notifications\CreateProjectNotification;
use App\Notifications\DeleteProjectNotification;
use App\Models\User;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Notification;
use Illuminate\Http\Request;


class ProjectService
{
    /**
     * Create project. Set role Owner for current user. Notify user about creating
     *
     * @param CreateProjectRequest $request
     *
     * @return bool
     */
    public static function createProject(CreateProjectRequest $request): int
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

        $project = Project::find($projectId);
        $user = User::find(session()->get("userId"));

        Notification::sendNow($user, new CreateProjectNotification($project->name));

        header("Location: /projects");
        return $projectId;
    }

    /**
     * Return array of projects for current user
     *
     * @return string|bool
     */
    public static function getAllProjectsForUser(): string|bool
    {
        return json_encode(
            DB::select('select * from projects, projects_users where projects_users.user_id = ? and projects.id = projects_users.project_id',
                [session()->get("userId")]
            )
        );
    }

    /**
     * Return array of users that involved at active project
     *
     * @return string|bool
     */
    public static function getAllUsersForProject(): string|bool
    {
        return json_encode(
            DB::select('
                        select projects.id, projects.name, projects.author_id, projects.created_at,
                               projects_users.user_id, projects_users.project_id, projects_users.role,
                               users.id, users.name, users.surname, users.email
                        from projects, projects_users, users
                        where projects_users.user_id = users.id
                            and projects.id = projects_users.project_id
                            and project_id = ?
                        ',
                [session()->get("activeProject")]
            )
        );
    }

    /**
     * Return active project
     *
     * @return string|bool
     */
    public static function getProjectBySession(): string|bool
    {
        return json_encode(DB::table('projects')
            ->where("id", "=", session()->get('activeProject'))
            ->first());
    }

    /**
     * Delete project for owner and leave from project for staff.
     * Notify user about deleting
     *
     * @param $id
     */
    public static function deleteProject(Request $request): bool
    {
        $project = Project::find($request->id);
        $user = User::find(session()->get("userId"));

        $projectUser = DB::table('projects_users')
            ->where('project_id', $project->id)
            ->where('user_id', $user->id)
            ->first();

        Notification::sendNow($user, new DeleteProjectNotification($project->name));

        if ($projectUser->role === "Owner") {
            DB::table('projects')->delete($request->id);
        } else {
            DB::table('projects_users')->delete($projectUser->id);
        }

        return true;
    }

    /**
     * Make project select via session
     *
     * @param $id
     */
    public static function selectProject(Request $request): bool
    {
        session()->put("activeProject", $request->id);
        return true;
    }

    /**
     * Make project unselect via session
     */
    public static function unselectProject(): bool
    {
        session()->pull("activeProject");
        return true;
    }

    /**
     * Add user to project that was invited by project owner
     *
     * @param AddUserToProjectRequest $request
     */
    public static function addUserToProject(AddUserToProjectRequest $request): bool
    {
        $userByEmail = User::where('email', $request['email'])->first();
        $project = Project::find(session()->get('activeProject'));

        if ($userByEmail !== null) {
            DB::table("projects_users")->insert([
                'project_id' => $project->id,
                'user_id' => $userByEmail->id,
                'role' => $request['role']
            ]);

        }
        header('location: /projectPage/' . $project->id);
        return true;
    }

    public static function editProject(Request $request): bool
    {
        DB::table('projects')
            ->where('id', $request->id)
            ->update([
               'name' => $request->name,
               'description' => $request->description
            ]);
        return true;
    }
}
