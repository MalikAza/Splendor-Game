<?php

use PHPUnit\Framework\TestCase;
use SplendorGame\Player;

class PlayerTest extends TestCase {

    private Player $player;

    function setUp(): void
    {
        $this->player = new Player([
            'name' => 'one',
            'tokens' => [
                'red'   => 0,
                'blue'  => 1,
                'green' => 2,
                'white' => 3,
                'black' => 4
            ],
            'cards' => []
        ]);
    }

    public function testPlayerCanBeCreated() {
        $this->assertInstanceOf('SplendorGame\Player', $this->player);
    }

    public function testPlayerHaveCorrectNameAtItsCreation() {
        $this->assertEquals('one', $this->player->getName());
    }

    public function testGetTokens() {
        $actual = $this->player->getTokens('red');
        $expected = 0;

        $this->assertEquals($expected, $actual);
    }

    public function testPlayerHaveCorrectTokensAtItsCreation() {
        $this->assertEquals(0, $this->player->getTokens('red'));
    }

    public function testAddTokens() {
        $tokenColor = 'red';
        $tokenNumber = 2;
        $this->player->addTokens($tokenColor, $tokenNumber);

        $actual = $this->player->getTokens($tokenColor);
        $expected = $tokenNumber;

        $this->assertEquals($expected, $actual);
    }
}