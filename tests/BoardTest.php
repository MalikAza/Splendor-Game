<?php

use PHPUnit\Framework\TestCase;
use SplendorGame\Board;
use SplendorGame\Player;

class BoardTest extends TestCase {

    private Board $board;

    function setUp(): void
    {
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

        $this->board = new Board(0, 1, 2, 3, 4, 5, $players);
    }

    public function testGetTokens() {
        $actual = $this->board->getTokens('green');
        $expected = 1;

        $this->assertEquals($expected, $actual);
    }

    public function testGetPlayerOneTokens() {
        $actual = $this->board->getPlayerTokens('one', 'red');
        $expected = 0;

        $this->assertEquals($expected, $actual);
    }
}