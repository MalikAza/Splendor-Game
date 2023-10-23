<?php

use PHPUnit\Framework\TestCase;
use SplendorGame\Board;
use SplendorGame\StartGameCommand;
use SplendorGame\storage\memory\GameRepositoryInMemory;

final class TokenTest extends TestCase {

    private Board $board;

    public function setUp(): void {
        $gameRepository =  new GameRepositoryInMemory;

        $startGameCommand = new StartGameCommand($gameRepository);
        $startGameCommand->execute('one', 'two');

        $this->board = $gameRepository->getGame();
    }

    public function testPlayerCanTakeTwoIdenticalToken() {
        $this->board->playerTakeTwoIdenticalColorTokens('one', 'red');

        $actualPlayerToken = $this->board->getUserTokens('one', 'red');
        $actualBoardRedToken = $this->board->getTokens('red');
        
        $expectedPlayerToken = $expectedBoardRedToken = 2;

        $this->assertEquals($expectedPlayerToken, $actualPlayerToken);
        $this->assertEquals($expectedBoardRedToken, $actualBoardRedToken);
    }

    public function testPlayerCanNotTakeTwoIdenticalToken() {
        $this->board->updateTokens('red', -4);
        $this->expectException('SplendorGame\exceptions\NotEnoughTokensException');

        $this->board->playerTakeTwoIdenticalColorTokens('one', 'red');
    }
}