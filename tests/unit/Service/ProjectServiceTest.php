<?php
namespace Service;

use App\Http\Requests\AddUserToProjectRequest;
use App\Http\Requests\CreateProjectRequest;
use App\Models\Project;
use App\Services\ProjectService;
use function PHPUnit\Framework\assertTrue;

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
            'createCardService/',
            'GET',
            [
                'name' => 'Test project',
                'description' => '',
            ]
        );
        $this->assertIsInt(ProjectService::createProject($request));

        $request = CreateProjectRequest::create(
            'createCardService/',
            'GET',
            [
                'name' => '',
                'description' => '',
            ]
        );
        $this->assertIsInt(ProjectService::createProject($request));

        $request = CreateProjectRequest::create(
            'createCardService/',
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
        $request = CreateProjectRequest::create(
            'createCardService/',
            'GET',
            [
                'name' => 'Test project',
                'description' => 'My test project',
                'some data' => 'some data'
            ]
        );

        $id = ProjectService::createProject($request);
        $this->assertTrue(ProjectService::deleteProject($id));
    }

    public function testSelectProject()
    {
        $project = Project::factory()->make();
        $this->assertTrue(ProjectService::selectProject($project->id));
    }

    public function testUnSelectProject()
    {
        $this->assertTrue(ProjectService::unselectProject());
    }

    public function testAddUserToProject()
    {
        $request = AddUserToProjectRequest::create(
            'addUserToProjectService/',
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
            'addUserToProjectService/',
            'GET',
            [
                'email' => '@email.com',
                'role' => ''
            ]
        );
        $this->assertTrue(ProjectService::addUserToProject($request));

        $request = AddUserToProjectRequest::create(
            'addUserToProjectService/',
            'GET',
            [
                'email' => '@email.com',
                'role' => ''
            ]
        );
        $this->assertTrue(ProjectService::addUserToProject($request));
    }
}
