<?php

use Illuminate\Support\Facades\Route;

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
    return view('documents');
});

Route::get('/documents', function () {
    return view('documents');
});

Route::get('/board', function () {
    return view('board');
});

Route::get('/projects', function () {
    return view('projects');
});

Route::get('/reports', function () {
    return view('reports');
});

Route::get('/signUp', function () {
    return view('signUp');
});

Route::get('/signIn', function () {
    return view('signIn');
});

Route::get('/createDocument', function () {
    return view('createDocument');
});

Route::get('/createProject', function () {
    return view('createProject');
});
