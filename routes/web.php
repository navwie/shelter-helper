<?php

use App\Services\AnnouncementService;
use Illuminate\Support\Facades\Route;

use App\Models\Animal;

use App\Http\Controllers\UserController;
use App\Http\Controllers\ShelterController;
use App\Http\Controllers\AnnouncementController;
use App\Http\Controllers\AnimalController;

use App\Services\ShelterService;
use App\Services\UserService;
use App\Services\AnimalService;


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

/*Route::get('/', fn() => view('SignUp'));*/

Route::get('/', function () {
    return view('SignUp',[
        "userId" => session()->get('userId'),
        'role'=> session()->get('userRole')
    ]);
});

Route::get('/shelter', fn() => view('Shelter', [
    "userId" => session()->get('userId'),
    'role'=> session()->get('userRole'),
    'shelter' => ShelterService::getShelterForUser(),
    'animals' => AnimalService::getAnimalsForShelter()
]));
Route::get('/createShelter', fn() => view('CreateShelter', [
    "userId" => session()->get('userId'),
    'role'=> session()->get('userRole')
]));
Route::get('/editShelter', fn() => view('EditShelter', [
    'user' => session()->get('userId'),
    'shelter' => ShelterService::getShelterForUser()
]));

Route::post('/createShelterService', [ShelterController::class, 'createShelter']);
Route::post('/editShelterService/{id}', [ShelterController::class, 'editShelter']);

//ANIMAL
Route::get('/createAnimal', fn() => view('CreateAnimal', [
    "userId" => session()->get('userId'),
    'role'=> session()->get('userRole')
]));
Route::get('/editAnimal/{id}', fn($id) => view('EditAnimal', [
    'user' => session()->get('userId'),
    'animal'=> Animal::find($id)
]));

Route::post('/createAnimalService', [AnimalController::class, 'createAnimal']);
Route::post('/editAnimalService/{id}', [AnimalController::class, 'editAnimal']);
Route::get('/deleteAnimal/{id}', [AnimalController::class, 'deleteAnimal']);


Route::get('/adminProfile', fn() => view('AdminProfile', [
    "userId" => session()->get('userId'),
    'role'=> session()->get('userRole'),
    'user' => UserService::getUserBySession(),
    'shelter' => ShelterService::getShelterForUser()
]));
Route::get('/contacts', fn() => view('Contacts', [
    "userId" => session()->get('userId'),
    'role'=> session()->get('userRole')
]));

Route::get('/userPage', fn() => view('UserPage', [
    "userId" => session()->get('userId'),
    'role'=> session()->get('userRole')
]));
Route::get('/userChangeData', fn() => view('UserChangeData', [
    'user' => UserService::getUserBySession(),
    "userId" => session()->get('userId'),
    'role'=> session()->get('userRole')
]));
Route::get('/userProfile', fn() => view('UserProfile', [
    "userId" => session()->get('userId'),
    'role'=> session()->get('userRole'),
    'user' => UserService::getUserBySession()
]));

Route::post('/editUserService/{id}', [UserController::class, 'editUser']);

Route::get('/announcement', fn() => view('Announcement', [
    "userId" => session()->get('userId'),
    'role'=> session()->get('userRole'),
    'announcements' =>AnnouncementService::getAnnouncementForUser(),
]));
Route::get('/createAnnouncement', fn() => view('CreateAnnouncement', [
    "userId" => session()->get('userId'),
    'role'=> session()->get('userRole')
]));

Route::post('/createAnnouncementService', [AnnouncementController::class, 'createAnnouncement']);
Route::get('/deleteAnnouncement/{id}', [AnnouncementController::class, 'deleteAnnouncement']);

Route::get(
    '/profile/{id}',
    [UserController::class,'profile']

);
Route::get(
    '/mainPage/{id}',
    [UserController::class,'mainPage']

);
/*
|--------------------------------------------------------------------------
| Users Routes
|--------------------------------------------------------------------------
*/

Route::get('/signUp', fn () => view('SignUp', [
    "userId" => session()->get('userId'),
    'role'=> session()->get('userRole')
]));

Route::match(
    ['get', 'post'],
    '/signUpService',
    [UserController::class, 'signUp']
)->name('signUp');

Route::get('/signIn', fn () => view('SignIn', [
    "userId" => session()->get('userId'),
    'role'=> session()->get('userRole')
]));

Route::post(
    '/signInService',
    [UserController::class, 'signIn']
)->name('signIn');

Route::match(
    ['get', 'post'],
    '/logOut',
    [UserController::class, 'logOut']
)->name('logOut');
