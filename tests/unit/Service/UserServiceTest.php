<?php
namespace Service;

use App\Http\Requests\SignInRequest;
use App\Http\Requests\SignUpRequest;
use App\Services\UserService;

class UserServiceTest extends \Codeception\Test\Unit
{
    /**
     * @var \UnitTester
     */
    protected $tester;

    protected function _before()
    {
        session()->put('userId', 7);
        session()->put('activeProject', 3);
    }

    protected function _after()
    {
    }


    public function testSignIn()
    {
        $request = SignInRequest::create(
            '/signInService',
            'GET',
            [
                'name' => 'Testname',
                'surname' => 'Testsurname',
                'email' => 'testemail@gmail.com',
                'password' => 'qwerty'
            ]
        );
        $this->assertTrue(UserService::signIn($request));

        $request = SignInRequest::create(
            '/signInService',
            'GET',
            [
                'name' => '',
                'surname' => '',
                'email' => '',
                'password' => ''
            ]
        );
        $this->assertTrue(UserService::signIn($request));

        $request = SignInRequest::create(
            '/signInService',
            'GET',
            [
                'name' => 'eee',
                'surname' => 'eee',
                'email' => 'eeee.com',
                'password' => 'eeey'
            ]
        );
        $this->assertTrue(UserService::signIn($request));
    }

    public function testSignUp()
    {
        $request = SignUpRequest::create(
            '/signUpService',
            'GET',
            [
                'email' => 'eeee',
                'password' => 'eeee'
            ]
        );
        $this->assertTrue(UserService::signUp($request));

        $request = SignUpRequest::create(
            '/signUpService',
            'GET',
            [
                'email' => '',
                'password' => ''
            ]
        );
        $this->assertTrue(UserService::signUp($request));

        $request = SignUpRequest::create(
            '/signUpService',
            'GET',
            [
                'email' => 'kuptsov210@gmail.com',
                'password' => 'qwerty'
            ]
        );
        $this->assertTrue(UserService::signUp($request));
    }

    public function testIsAuth()
    {
        session()->put('userId', 1);
        $this->assertTrue(UserService::isAuth());
        session()->flush();
        $this->assertFalse(UserService::isAuth());
    }

    public function testLogOut()
    {
        $this->assertTrue(UserService::logOut());
    }

    public function testGetUserBySession()
    {
        $this->assertIsObject(UserService::getUserBySession());
    }

}
