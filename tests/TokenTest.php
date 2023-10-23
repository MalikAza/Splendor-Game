<?php declare(strict_types=1);

use PHPUnit\Framework\TestCase;
use SplendorGame\Board;

final class TokenTest extends TestCase {
    public array $initialBoard;

    function setUp(): void
    {
        $this->initialBoard = [
            'tokens' => [
                'red' => 5,
            ],
            'players' => [
                'one' => [
                    'tokens' => [
                        'red' => 0
                    ]
                ]
            ],
        ];
    }

    function testPlayerCanTakeTwoIdenticalColorTokens() {
        $board = new Board($this->initialBoard);

        $board->playerTakeTwoIdenticalToken('one' ,'red');

        $actual = $board->getUserToken('one', 'red');
        $expected = 2;

        $this->assertEquals($expected, $actual);
    }
}