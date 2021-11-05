<?php
namespace Service;

use App\Http\Requests\CreateCardRequest;
use App\Models\Card;
use App\Models\User;
use App\Services\BoardService;
use Faker\Factory;

class BoardServiceTest extends \Codeception\Test\Unit
{
    private User $user;
    /**
     * @var \UnitTester
     */
    protected $tester;

    protected function _before()
    {
        session()->put("userId", 7);
        session()->put('activeProject', 3);
        $this->user = User::all()->first();
    }

    protected function _after()
    {
    }


    public function testCreateCard()
    {
        $request = CreateCardRequest::create(
            'createCardService/',
            'GET',
            [
                'name' => 'First',
                'description' => 'You should do first task',
                'category' => 'backlog',
                'deadline' => '2021-10-31T16:09'
            ]
        );

        $this->assertTrue(BoardService::createCard($request));
    }

    public function testSaveCards()
    {
        $cards = [];
        for ($i = 0; $i < 5; $i++) {
            $cards[] = Card::factory()->make();
        }

        $this->assertTrue(BoardService::saveCards([], [], [], [], []));
        $this->assertTrue(BoardService::saveCards($cards, $cards, $cards, $cards, $cards));
    }

    public function testGetAssignUsers()
    {
        $this->assertIsString(BoardService::getAssignUsers());
    }

    public function testAssignUser()
    {
        $card = Card::all()->first();
        $this->assertTrue(BoardService::assignUser($card->id));
    }

    public function testGetBoardByProjectSession()
    {
        $this->assertIsInt(BoardService::getBoardByProjectSession());
    }
}
