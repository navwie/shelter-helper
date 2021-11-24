<?php

use Illuminate\Support\Facades\Route;

use App\Http\Controllers\UserController;

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

Route::get('/Main', function () {
    return view('Main',[
        "userId" => session()->get('userId'),
        'role'=> session()->get('userRole')
        ]);
});
Route::get('/AdminProfile', function () {
    return view('AdminProfile',[
        "userId" => session()->get('userId'),
        'role'=> session()->get('userRole')
    ]);
});
/*Route::get('/UserChangeData', function () {
    return view('UserChangeData',[
        "userId" => session()->get('userId'),
        'role'=> session()->get('userRole'),
        'user'=> UserService::getUserBySession()
    ]);
});*/

Route::get('/UserProfile', function () {
    return view('UserProfile',[
        "userId" => session()->get('userId'),
        'role'=> session()->get('userRole'),
        'user'=> UserService::getUserBySession()
    ]);
});
Route::get(
    '/profile/{id}',
    [UserController::class,'profile']

);
Route::get('/', function () {
    return view('signUp',[
        "userId" => session()->get('userId'),
        'role'=> session()->get('userRole')
    ]);
});
Route::get('/UserPage', function () {
    return view('UserPage',[
        "userId" => session()->get('userId'),
        'role'=> session()->get('userRole'),

    ]);
});
Route::get('/Contacts', function () {
    return view('Contacts',[
        "userId" => session()->get('userId'),
        'role'=> session()->get('userRole'),

    ]);
});

Route::get('/Shelter', function () {
    return view('Shelter',[
        "userId" => session()->get('userId'),
        'role'=> session()->get('userRole')
    ]);
});
Route::get('/CreateShelter', function () {
    return view('CreateShelter',[
        "userId" => session()->get('userId'),
        'role'=> session()->get('userRole')
    ]);
});
Route::match(
    ['get', 'post'],
    '/signUpService',
    [UserController::class, 'signUp']
)->name('signUp');

Route::get('/signIn', function () {
    return view('signIn');
});

Route::post(
    '/signInService',
    [UserController::class, 'signIn']
)->name('signIn');

Route::match(
    ['get', 'post'],
    '/logOut',
    [UserController::class, 'logOut']
)->name('logOut');
