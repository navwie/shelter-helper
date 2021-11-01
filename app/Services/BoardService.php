<?php

namespace App\Services;

use App\Http\Requests\CreateCardRequest;
use Illuminate\Support\Facades\DB;
use phpDocumentor\Reflection\Types\True_;

class BoardService
{
    /**
     * Create new card for board
     *
     * @param CreateCardRequest $request
     */
    public static function createCard(CreateCardRequest $request): bool
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
        return true;
    }

    /**
     * Get data from session and return board for selected project
     *
     * @return mixed
     */
    public static function getBoardByProjectSession(): mixed
    {
        return DB::table('boards')
            ->where('project_id', session()->get('activeProject'))
            ->value('id');
    }

    /**
     * Return all cards for selected board
     *
     * @return string|bool
     */
    public static function getCardsAtBoard(): string | bool
    {
        return json_encode(
            DB::select('select * from cards where id in
                              (select card_id from boards_cards where board_id = ?)',
                [self::getBoardByProjectSession()]
            )
        );
    }

    /**
     * Return all users that assigned to current project`s board
     *
     * @return string|bool
     */
    public static function getAssignUsers(): string | bool
    {
        return json_encode(
            DB::select('select users.id, users.name, users.surname, users_cards.card_id
                            from users
                            JOIN users_cards ON users.id = users_cards.user_id
                            where users_cards.card_id in
                                  (select card_id from boards_cards where board_id = ?)',
                [self::getBoardByProjectSession()]
            )
        );
    }

    /**
     * Get current state of cards and call private method to change
     *
     * @param $backlogList
     * @param $toDoList
     * @param $inProgressList
     * @param $testingList
     * @param $doneList
     */
    public static function saveCards(
        $backlogList,
        $toDoList,
        $inProgressList,
        $testingList,
        $doneList
    ): bool
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

        return true;
    }

    /**
     * Get array of cards and category. Set new categories if it was changed
     *
     * @param array $cardsList
     * @param string $category
     */
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

    /**
     * Set assigning user to card
     *
     * @param $id
     */
    public static function assignUser($id): bool
    {
        DB::table('users_cards')->insert([
           'user_id' => session()->get('userId'),
           'card_id' => $id
        ]);

        header('location: /board');
        return true;
    }
}
