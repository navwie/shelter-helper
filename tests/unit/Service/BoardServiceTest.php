<?php
namespace Service;

use App\Http\Requests\CreateCardRequest;
use App\Models\Card;
use App\Models\User;
use App\Services\BoardService;
use Faker\Factory;

class BoardServiceTest extends \Codeception\Test\Unit
{
    /**
     * @var \UnitTester
     */
    protected $tester;

    protected function _before()
    {
    }

    protected function _after()
    {
    }


    /**
     *  Needs to change session at BoardService::getBoardByProjectSession
     */
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

    /**
     *  Needs to change session at BoardService::assignUser
     */
    public function testAssignUser()
    {
        $this->assertTrue(BoardService::assignUser(1, 1));
    }

    /**
     *  Needs to change session at BoardService::getBoardByProjectSession
     */
    public function testGetBoardByProjectSession()
    {
        $this->assertIsInt(BoardService::getBoardByProjectSession());
    }


}
