<?php

use Illuminate\Support\Facades\Route;

use App\Models\Animal;

use App\Http\Controllers\UserController;



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

Route::get('/', fn() => view('SignUp'));

Route::get('/shelter', fn() => view('Shelter'));
Route::get('/createShelter', fn() => view('CreateShelter'));
Route::get('/editShelter', fn() => view('EditShelter', ['shelter' => ShelterService::getShelterForUser()]));

Route::post('/createShelterService', [ShelterController::class, 'createShelter']);
Route::post('/editShelterService/{id}', [ShelterController::class, 'editShelter']);

Route::get('/adminProfile', fn() => view('AdminProfile'));
Route::get('/contacts', fn() => view('Contacts'));

Route::get('/userPage', fn() => view('UserPage'));
Route::get('/userChangeData', fn() => view('UserChangeData', ['user' => UserService::getUserBySession()]));
Route::get('/userProfile', fn() => view('UserProfile'));

Route::post('/editUserService/{id}', [UserController::class, 'editUser']);

Route::get('/announcement', fn() => view('Announcement'));
Route::get('/createAnnouncement', fn() => view('CreateAnnouncement'));

Route::post('/createAnnouncementService', [AnnouncementController::class, 'createAnnouncement']);
Route::get('/deleteAnnouncement/{id}', [AnnouncementController::class, 'deleteAnnouncement']);



/*
|--------------------------------------------------------------------------
| Users Routes
|--------------------------------------------------------------------------
*/

Route::get('/signUp', fn () => view('SignUp'));

Route::match(
    ['get', 'post'],
    '/signUpService',
    [UserController::class, 'signUp']
)->name('signUp');

Route::get('/signIn', fn () => view('SignIn'));

Route::post(
    '/signInService',
    [UserController::class, 'signIn']
)->name('signIn');

Route::match(
    ['get', 'post'],
    '/logOut',
    [UserController::class, 'logOut']
)->name('logOut');
