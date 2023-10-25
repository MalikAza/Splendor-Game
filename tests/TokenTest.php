<?php declare(strict_types=1);

use PHPUnit\Framework\TestCase;
use SplendorGame\Board;
use SplendorGame\commands\PlayerTakeThreeDistinctTokens;
use SplendorGame\GameRepositoryInMemory;
use SplendorGame\memory\PlayerRepository;
use SplendorGame\Player;

final class TokenTest extends TestCase {
    function setUp(): void
    {
    }
    function boardBuilder($nbNobles, $nbJetons, $players): Board
    {
        return new Board($nbNobles, $nbJetons, $nbJetons, $nbJetons, $nbJetons, $nbJetons, $players);
    }
    function testPlayerCanTakeThreeDistinctToken(){

        // GIVEN
        $gameRepo = new GameRepositoryInMemory();
        $currentPlayer = new PlayerRepository();

        // board
        $board = $this->boardBuilder(3, 4, []);
        $gameRepo->saveGame($board);

        // player
        $playerInit = new Player (
                    [
                        'name' => 'one',
                        'cards' => [],
                        'tokens' => [
                            'red'   => 0,
                            'blue'  => 0,
                            'green' => 0,
                            'white' => 0,
                            'black' => 0
                        ]]
                );
        $currentPlayer->savePlayer($playerInit);

        // WHEN
        $command = new PlayerTakeThreeDistinctTokens($gameRepo, $currentPlayer);
        $command->execute(['red']);//,'black', 'blue']);

        // THEN
        $expectedBoard = new Board(3,4,4,3,4,4,[]);
        $expectedBoardTokens = [
            'red'=>$expectedBoard->red
        ];
        $expectedPlayer = new Player (
            ['name' => 'one',
                'cards' => [],
                'tokens' => [
            'red'   => 1,
            'blue'  => 0,
            'green' => 0,
            'white' => 0,
            'black' => 0
        ]]);



        $this->assertEquals($expectedBoardTokens , $gameRepo->getGame()->red);
        $this->assertEquals($expectedPlayer , $currentPlayer->getPlayer());

    }

    function testPlayerCanTakeTwoIdenticalColorTokens() {
        $playerOne = new Player([
            'name' => 'one',
                        'cards' => [],
            'tokens' => [
                'red'   => 0,
                'blue'  => 0,
                'green' => 0,
                'white' => 0,
                'black' => 0
            ]
        ]);
        $playerTwo = new Player([
            'name' => 'two',
            'cards' => [],
            'tokens' => [
                'red'   => 0,
                'blue'  => 0,
                'green' => 0,
                'white' => 0,
                'black' => 0
            ]
        ]);
        $players = [
            'one' => $playerOne,
            'two' => $playerTwo
        ];

        $board = new Board(0, 0, 0, 4, 0, 0, $players);
        $board->playerTakeTwoIdenticalColorTokens('one', 'red');

        $boardRedTokens = $board->getTokens('red');
        $playerRedTokens = $board->getPlayerTokens('one', 'red');

        $this->assertEquals(2, $boardRedTokens);
        $this->assertEquals(2, $playerRedTokens);
    }

    function testPlayerCanNotTakeTwoIdenticalColorTokens() {
        $playerOne = new Player([
            'name' => 'one',
                        'cards' => [],
            'tokens' => [
                'red'   => 0,
                'blue'  => 0,
                'green' => 0,
                'white' => 0,
                'black' => 0
            ]
        ]);
        $playerTwo = new Player([
            'name' => 'two',
            'cards' => [],
            'tokens' => [
                'red'   => 0,
                'blue'  => 0,
                'green' => 0,
                'white' => 0,
                'black' => 0
            ]
        ]);
        $players = [
            'one' => $playerOne,
            'two' => $playerTwo
        ];

        $board = new Board(0, 0, 0, 3, 0, 0, $players);
        $this->expectExceptionMessage('Action interdite.');
        $board->playerTakeTwoIdenticalColorTokens('one', 'red');
    }
}