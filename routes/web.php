<?php

use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\UserController;
use App\Http\Controllers\GoogleController;
use App\Http\Controllers\FacebookController;
use App\Http\Controllers\DocumentController;
use App\Http\Controllers\ProjectController;
use App\Services\UserService;

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
        'documents' => json_encode(DB::table('documents')
            ->get())
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
        'documents' => json_encode(DB::table('documents')
            ->get())
    ]);
});

Route::get('/createDocument', function () {
    return view('createDocument', [
        'name' => session()->get('name'),
        'surname' => session()->get('surname')
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
        'projects' => json_encode(DB::table('projects')
            ->get())
    ]);
});

Route::get('/createProject', function () {
    return view('createProject', [
        'name' => session()->get('name'),
        'surname' => session()->get('surname')
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

/*
|--------------------------------------------------------------------------
| Users Routes
|--------------------------------------------------------------------------
*/

Route::get('/signUp', function () {
    return view('signUp', [
        'name' => session()->get('name'),
        'surname' => session()->get('surname')
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
        'surname' => session()->get('surname')
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
        'surname' => session()->get('surname')
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
        'surname' => session()->get('surname')
    ]);
});

Route::get('/createReport', function () {
    return view('createReport', [
        'name' => session()->get('name'),
        'surname' => session()->get('surname')
    ]);
});

/*
|--------------------------------------------------------------------------
| Socials Routes
|--------------------------------------------------------------------------
*/

Route::get('auth/google', [GoogleController::class, 'redirectToGoogle']);

Route::get('auth/google/callback', [GoogleController::class, 'handleGoogleCallback']);

Route::get('auth/facebook', [FacebookController::class, 'redirectToFacebook']);

Route::get('auth/facebook/callback', [FacebookController::class, 'handleFacebookCallback']);
