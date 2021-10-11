<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Requests\SignInRequest;
use App\Services\UserService;

class UserController extends Controller
{
    public function signIn(SignInRequest $request): void
    {
        UserService::signIn($request);
        header("Location: /");
    }
}
