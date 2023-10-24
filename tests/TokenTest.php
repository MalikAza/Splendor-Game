<?php declare(strict_types=1);

use PHPUnit\Framework\TestCase;
use SplendorGame\Board;
use SplendorGame\Player;

final class TokenTest extends TestCase {

    function testPlayerCanTakeTwoIdenticalColorTokens() {
        $playerOne = new Player([
            'name' => 'one',
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