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

        $boardId = self::getBoardByProjectSession();

        DB::table("boards_cards")->insert([
            'board_id' => $boardId,
            'card_id' => $cardId,
        ]);

        header('Location: /board');
    }

    public static function getBoardByProjectSession() {
        return DB::table('boards')
            ->where('project_id', session()->get('project'))
            ->value('id');
    }

    public static function getCardsAtBoard(): string | bool
    {
        return json_encode(
            DB::select('select * from cards where id in
                              (select card_id from boards_cards where board_id = ?)',
                [self::getBoardByProjectSession()]
            )
        );
    }

    public static function saveCards(
        $backlogList,
        $toDoList,
        $inProgressList,
        $testingList,
        $doneList
    ): void
    {
        if ($backlogList !== null)
            self::setCardsCategoriesOfFront($backlogList, 'backlog');

        if ($toDoList !== null)
            self::setCardsCategoriesOfFront($toDoList, 'toDo');

        if ($inProgressList !== null)
            self::setCardsCategoriesOfFront($inProgressList, 'inProgress');

        if ($testingList !== null)
            self::setCardsCategoriesOfFront($testingList, 'testing');

        if ($doneList !== null)
            self::setCardsCategoriesOfFront($doneList, 'done');

    }

    private static function setCardsCategoriesOfFront (array $cardsList, string $category): void
    {
        foreach ($cardsList as $card) {
            if ($card["category"] !== $category)
                DB::table('cards')
                    ->where("id", $card["id"])
                    ->update([
                        'category' => $category
                    ]);
        }
    }
}
