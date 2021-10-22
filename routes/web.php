<?php

use Illuminate\Support\Facades\Route;

use App\Http\Controllers\UserController;
use App\Http\Controllers\GoogleController;
use App\Http\Controllers\FacebookController;
use App\Http\Controllers\DocumentController;
use App\Http\Controllers\ProjectController;
use App\Http\Controllers\NotificationController;

use App\Services\UserService;
use App\Services\DocumentService;
use App\Services\ProjectService;
use App\Services\NotificationService;


/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

/*
|--------------------------------------------------------------------------
| Documents Routes
|--------------------------------------------------------------------------
*/

Route::get('/', function () {
    if(!UserService::isAuth()) {
        return view('notAuth');
    }
    return view('documents', [
        'userId' => session()->get('userId'),
        'name' => session()->get('name'),
        'surname' => session()->get('surname'),
        'documents' => DocumentService::getDocumentsByProject(),
        'project' => ProjectService::getProjectBySession()
    ]);
});

Route::get('/documents', function () {
    if(!UserService::isAuth()) {
        return view('notAuth');
    }
    return view('documents', [
        'userId' => session()->get('userId'),
        'name' => session()->get('name'),
        'surname' => session()->get('surname'),
        'documents' => DocumentService::getDocumentsByProject(),
        'project' => ProjectService::getProjectBySession()
    ]);
});

Route::get('/createDocument', function () {
    return view('createDocument', [
        'name' => session()->get('name'),
        'surname' => session()->get('surname'),
        'project' => ProjectService::getProjectBySession()
    ]);
});

Route::match(
    ['get', 'post'],
    '/createDocumentService',
    [DocumentController::class, 'createDocument']
)->name('createDocumentService');

/*
|--------------------------------------------------------------------------
| Projects Routes
|--------------------------------------------------------------------------
*/

Route::get('/projects', function () {
    if(!UserService::isAuth()) {
        return view('notAuth');
    }
    return view('projects', [
        'userId' => session()->get('userId'),
        'name' => session()->get('name'),
        'surname' => session()->get('surname'),
        'projects' => ProjectService::getAllProjects(),
        'select' => session()->get('project'),
        'project' => ProjectService::getProjectBySession(),
        'notifications' => NotificationService::getUnreadCreateProjectNotifications()
    ]);
});

Route::get('/createProject', function () {
    return view('createProject', [
        'name' => session()->get('name'),
        'surname' => session()->get('surname'),
        'project' => ProjectService::getProjectBySession()
    ]);
});

Route::match(
    ['get', 'post'],
    '/createProjectService',
    [ProjectController::class, 'createProject']
)->name('createProjectService');

Route::match(
    ['get', 'post'],
    '/deleteProjectService/{id}',
    [ProjectController::class, 'deleteProject']
)->name('deleteProjectService');

Route::match(
    ['get', 'post'],
    '/selectProject/{id}',
    [ProjectController::class, 'selectProject']
)->name('selectProject');

Route::match(
    ['get', 'post'],
    '/unselectProject',
    [ProjectController::class, 'unselectProject']
)->name('unselectProject');

/*
|--------------------------------------------------------------------------
| Users Routes
|--------------------------------------------------------------------------
*/

Route::get('/signUp', function () {
    return view('signUp', [
        'name' => session()->get('name'),
        'surname' => session()->get('surname'),
        'project' => ProjectService::getProjectBySession()
    ]);
});

Route::match(
    ['get', 'post'],
    '/signUpService',
    [UserController::class, 'signUp']
)->name('signUp');

Route::get('/signIn', function () {
    return view('signIn', [
        'name' => session()->get('name'),
        'surname' => session()->get('surname'),
        'project' => ProjectService::getProjectBySession()
    ]);
});

Route::match(
    ['get', 'post'],
    '/signInService',
    [UserController::class, 'signIn']
)->name('signIn');

Route::match(
    ['get', 'post'],
    '/logOut',
    [UserController::class, 'logOut']
)->name('logOut');

/*
|--------------------------------------------------------------------------
| Boards Routes
|--------------------------------------------------------------------------
*/

Route::get('/board', function () {
    if(!UserService::isAuth()) {
        return view('notAuth');
    }
    return view('board', [
        'name' => session()->get('name'),
        'surname' => session()->get('surname'),
        'project' => ProjectService::getProjectBySession()
    ]);
});

/*
|--------------------------------------------------------------------------
| Reports Routes
|--------------------------------------------------------------------------
*/

Route::get('/reports', function () {
    if(!UserService::isAuth()) {
        return view('notAuth');
    }
    return view('reports', [
        'name' => session()->get('name'),
        'surname' => session()->get('surname'),
        'project' => ProjectService::getProjectBySession()
    ]);
});

Route::get('/createReport', function () {
    return view('createReport', [
        'name' => session()->get('name'),
        'surname' => session()->get('surname'),
        'project' => ProjectService::getProjectBySession()
    ]);
});

/*
|--------------------------------------------------------------------------
| Notification Routes
|--------------------------------------------------------------------------
*/

Route::match(
    ['get', 'post'],
    '/readNotification',
    [NotificationController::class, 'readNotification']
)->name('readNotification');

/*
|--------------------------------------------------------------------------
| Socials Routes
|--------------------------------------------------------------------------
*/

Route::get('auth/google', [GoogleController::class, 'redirectToGoogle']);

Route::get('auth/google/callback', [GoogleController::class, 'handleGoogleCallback']);

Route::get('auth/facebook', [FacebookController::class, 'redirectToFacebook']);

Route::get('auth/facebook/callback', [FacebookController::class, 'handleFacebookCallback']);
