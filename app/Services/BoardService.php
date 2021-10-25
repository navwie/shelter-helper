<?php

namespace App\Services;

use App\Http\Requests\CreateCardRequest;
use Illuminate\Support\Facades\DB;

class BoardService
{
    public static function createCard(CreateCardRequest $request): void
    {
        $cardId = DB::table('cards')->insertGetId([
            'name' => $request['name'],
            'description' => $request['description'],
            'category' => $request['category'],
            'deadline' => $request['deadline']
        ]);

        $boardId = DB::table('boards')
            ->where('project_id', session()->get('project'))
            ->value('id');

        DB::table("boards_cards")->insert([
            'board_id' => $boardId,
            'card_id' => $cardId,
        ]);
        
        header('Location: /board');
    }
}
