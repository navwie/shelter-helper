<?php

namespace App\Http\Controllers;

use App\Http\Requests\CreateCardRequest;
use App\Services\BoardService;
use Illuminate\Http\Request;

class BoardController extends Controller
{
    public function createCard(CreateCardRequest $request): void
    {
        BoardService::createCard($request);
    }
}
