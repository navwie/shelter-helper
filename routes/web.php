<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\UserController;
use App\Http\Controllers\GoogleController;
use App\Http\Controllers\FacebookController;

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

Route::get('/', function () {
    return view('documents', [
        'name' => session()->get('name'),
        'surname' => session()->get('surname')
    ]);
});

Route::get('/documents', function () {
    return view('documents', [
        'name' => session()->get('name'),
        'surname' => session()->get('surname')
    ]);
});

Route::get('/board', function () {
    return view('board', [
        'name' => session()->get('name'),
        'surname' => session()->get('surname')
    ]);
});

Route::get('/projects', function () {
    return view('projects', [
        'name' => session()->get('name'),
        'surname' => session()->get('surname')
    ]);
});

Route::get('/reports', function () {
    return view('reports', [
        'name' => session()->get('name'),
        'surname' => session()->get('surname')
    ]);
});

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

Route::get('/createDocument', function () {
    return view('createDocument', [
        'name' => session()->get('name'),
        'surname' => session()->get('surname')
    ]);
});

Route::get('/createProject', function () {
    return view('createProject', [
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

Route::get('auth/google', [GoogleController::class, 'redirectToGoogle']);

Route::get('auth/google/callback', [GoogleController::class, 'handleGoogleCallback']);

Route::get('auth/facebook', [FacebookController::class, 'redirectToFacebook']);

Route::get('auth/facebook/callback', [FacebookController::class, 'handleFacebookCallback']);
