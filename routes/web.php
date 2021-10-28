<?php

use Illuminate\Support\Facades\Route;

use App\Http\Controllers\UserController;
use App\Http\Controllers\GoogleController;
use App\Http\Controllers\FacebookController;
use App\Http\Controllers\DocumentController;
use App\Http\Controllers\ProjectController;
use App\Http\Controllers\NotificationController;
use App\Http\Controllers\BoardController;

use App\Services\UserService;
use App\Services\DocumentService;
use App\Services\ProjectService;
use App\Services\NotificationService;
use App\Services\BoardService;


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
        'activeProject' => ProjectService::getProjectBySession(),
        'create_document_notifications' =>
            NotificationService::getUnreadNotifications("CreateDocumentNotification"),
        'delete_document_notifications' =>
            NotificationService::getUnreadNotifications("DeleteDocumentNotification")
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
        'activeProject' => ProjectService::getProjectBySession(),
        'create_document_notifications' =>
            NotificationService::getUnreadNotifications("CreateDocumentNotification"),
        'delete_document_notifications' =>
            NotificationService::getUnreadNotifications("DeleteDocumentNotification")
    ]);
});

Route::get('/createDocument', function () {
    return view('createDocument', [
        'name' => session()->get('name'),
        'surname' => session()->get('surname'),
        'activeProject' => ProjectService::getProjectBySession()
    ]);
});

Route::match(
    ['get', 'post'],
    '/createDocumentService',
    [DocumentController::class, 'createDocument']
)->name('createDocumentService');

Route::match(
    ['get', 'post'],
    '/deleteDocumentService/{id}',
    [DocumentController::class, 'deleteDocument']
)->name('deleteDocumentService');

Route::match(
    ['get', 'post'],
    '/openDocument',
    [DocumentController::class, 'openDocument']
)->name('openDocument');

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
        'select' => session()->get('activeProject'),
        'activeProject' => ProjectService::getProjectBySession(),
        'create_project_notifications' => NotificationService::getUnreadNotifications("CreateProjectNotification"),
        'delete_project_notifications' => NotificationService::getUnreadNotifications("DeleteProjectNotification")
    ]);
});

Route::get('/createProject', function () {
    return view('createProject', [
        'name' => session()->get('name'),
        'surname' => session()->get('surname'),
        'activeProject' => ProjectService::getProjectBySession()
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

Route::get('/projectPage/{id}', function () {
    return view('projectPage', [
        'userId' => session()->get('userId'),
        'name' => session()->get('name'),
        'surname' => session()->get('surname'),
        'activeProject' => ProjectService::getProjectBySession(),
        'user' => json_encode(UserService::getUserBySession()),
    ]);
});

Route::get('/addUserToProject', function () {
    return view('addUserToProject', [
        'name' => session()->get('name'),
        'surname' => session()->get('surname'),
        'activeProject' => ProjectService::getProjectBySession()
    ]);
});

Route::match(
    ['get', 'post'],
    '/addUserToProjectService',
    [ProjectController::class, 'addUserToProject']
)->name('addUserToProjectService');

/*
|--------------------------------------------------------------------------
| Users Routes
|--------------------------------------------------------------------------
*/

Route::get('/signUp', function () {
    return view('signUp', [
        'name' => session()->get('name'),
        'surname' => session()->get('surname'),
        'activeProject' => ProjectService::getProjectBySession()
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
        'activeProject' => ProjectService::getProjectBySession()
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
        'activeProject' => ProjectService::getProjectBySession(),
        'cards' => BoardService::getCardsAtBoard()
    ]);
});

Route::get('/createCard', function () {
    return view('createCard', [
        'name' => session()->get('name'),
        'surname' => session()->get('surname'),
        'activeProject' => ProjectService::getProjectBySession()
    ]);
});

Route::match(
    ['get', 'post'],
    '/createCardService',
    [BoardController::class, 'createCard']
)->name('createCard');

Route::match(
    ['get', 'post'],
    '/saveCards',
    [BoardController::class, 'saveCards']
)->name('saveCards');

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
        'activeProject' => ProjectService::getProjectBySession()
    ]);
});

Route::get('/createReport', function () {
    return view('createReport', [
        'name' => session()->get('name'),
        'surname' => session()->get('surname'),
        'activeProject' => ProjectService::getProjectBySession()
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
