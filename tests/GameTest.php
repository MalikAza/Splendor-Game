<?php

use PHPUnit\Framework\TestCase;
use SplendorGame\Board;
use SplendorGame\StartGameCommand;
use SplendorGame\storage\memory\GameRepositoryInMemory;

class GameTest extends TestCase {
    public function testShouldStartGameForTwoPlayers() {
        $gameRepository =  new GameRepositoryInMemory;

        $startGameCommand = new StartGameCommand($gameRepository);
        $startGameCommand->execute(2);

        $actual = $gameRepository->getGame();
        $expected = new Board(3, 5, 4, 4, 4, 4);

        $this->assertEquals($expected, $actual);
    }
}