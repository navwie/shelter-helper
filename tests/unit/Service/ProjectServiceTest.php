<?php
namespace Service;

use App\Http\Requests\AddUserToProjectRequest;
use App\Http\Requests\CreateProjectRequest;
use App\Models\Project;
use App\Services\ProjectService;
use Illuminate\Http\Request;

class ProjectServiceTest extends \Codeception\Test\Unit
{
    /**
     * @var \UnitTester
     */
    protected $tester;

    protected function _before()
    {
        session()->put('userId', 1);
        session()->put('activeProject', 1);
    }

    protected function _after()
    {
    }


    public function testCreateProject()
    {
        $request = CreateProjectRequest::create(
            '/createProjectService',
            'GET',
            [
                'name' => 'Test project',
                'description' => '',
            ]
        );
        $this->assertIsInt(ProjectService::createProject($request));

        $request = CreateProjectRequest::create(
            '/createProjectService',
            'GET',
            [
                'name' => '',
                'description' => '',
            ]
        );
        $this->assertIsInt(ProjectService::createProject($request));

        $request = CreateProjectRequest::create(
            '/createProjectService',
            'GET',
            [
                'name' => 'Test project',
                'description' => 'My test project',
                'some data' => 'some data'
            ]
        );
        $this->assertIsInt(ProjectService::createProject($request));
    }

    public function testGetAllProjectsForUser()
    {
        $this->assertIsString(ProjectService::getAllProjectsForUser());
        session()->flush();
        $this->assertIsString(ProjectService::getAllProjectsForUser());
    }

    public function testAllUsersForProject()
    {
        $this->assertIsString(ProjectService::getAllUsersForProject());
        session()->flush();
        $this->assertIsString(ProjectService::getAllUsersForProject());
    }

    public function testGetProjectBySession()
    {
        $this->assertIsString(ProjectService::getProjectBySession());
        session()->flush();
        $this->assertIsString(ProjectService::getProjectBySession());
    }

    public function testDeleteProject()
    {
        $project = Project::all()->first();

        $request = Request::create(
            '/deleteProject',
            'DELETE',
            [
                'id' => $project->id
            ]
        );

        $this->assertTrue(ProjectService::deleteProject($request));
    }

    public function testSelectProject()
    {
        $project = Project::all()->first();

        $request = Request::create(
            '/deleteProject',
            'DELETE',
            [
                'id' => $project->id
            ]
        );

        $this->assertTrue(ProjectService::selectProject($request));
    }

    public function testUnSelectProject()
    {
        $this->assertTrue(ProjectService::unselectProject());
    }

    public function testAddUserToProject()
    {
        $request = AddUserToProjectRequest::create(
            '/addUserToProjectService',
            'GET',
            [
                'email' => 'testemail@email.com',
                'role' => 'developer'
            ]
        );
        $this->assertTrue(ProjectService::addUserToProject($request));

        $request = AddUserToProjectRequest::create(
            'addUserToProjectService/',
            'GET',
            [
                'email' => '',
                'role' => ''
            ]
        );
        $this->assertTrue(ProjectService::addUserToProject($request));

        $request = AddUserToProjectRequest::create(
            '/addUserToProjectService',
            'GET',
            [
                'email' => '@email.com',
                'role' => ''
            ]
        );
        $this->assertTrue(ProjectService::addUserToProject($request));

        $request = AddUserToProjectRequest::create(
            '/addUserToProjectService',
            'GET',
            [
                'email' => '@email.com',
                'role' => ''
            ]
        );
        $this->assertTrue(ProjectService::addUserToProject($request));
    }

    public function testEditProject()
    {
        $project = Project::factory()->make();

        $request = Request::create(
            "/editProjectService" . $project->id,
            'PUT',
            [
                'id' => $project->id,
                'name' => $project->name,
                'description' => $project->description
            ]
        );
        $this->assertTrue(ProjectService::editProject($request));

        $request = Request::create(
            "/editProjectService" . $project->id,
            'PUT',
            [
                'id' => '',
                'name' => '',
                'description' => ''
            ]
        );
        $this->assertTrue(ProjectService::editProject($request));
    }
}
