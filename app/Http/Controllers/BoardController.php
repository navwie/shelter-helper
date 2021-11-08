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

    public function saveCards(): void
    {
        $backlogList = request("backlog");
        $toDoList = request("toDo");
        $inProgressList = request("inProgress");
        $testingList = request("testing");
        $doneList = request("done");

        BoardService::saveCards(
            $backlogList,
            $toDoList,
            $inProgressList,
            $testingList,
            $doneList
        );
    }

    public function assignUser($id): void
    {
        BoardService::assignUser($id);
    }

    public function deleteCard(Request $request): void
    {
        BoardService::deleteCard($request);
    }

    public function editCard(Request $request): void
    {
        BoardService::editCard($request);
    }

    public function deleteAssign(Request $request): void
    {
        BoardService::deleteAssign($request);
    }
}
