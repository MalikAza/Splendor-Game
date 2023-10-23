<?php

use PHPUnit\Framework\TestCase;
use SplendorGame\Board;
use SplendorGame\StartGameCommand;
use SplendorGame\storage\memory\GameRepositoryInMemory;

final class GameTest extends TestCase {
    public function testShouldStartGameForTwoPlayers() {
        $gameRepository =  new GameRepositoryInMemory;

        $startGameCommand = new StartGameCommand($gameRepository);
        $startGameCommand->execute('one', 'two');

        $actual = $gameRepository->getGame();

        $expected = new Board(3, 4, 4, 4, 4, 4);
        $expected->setPlayers('one', 'two');

        $this->assertEquals($expected, $actual);
    }

    public function testShouldStartGameForThreePlayers() {
        $gameRepository =  new GameRepositoryInMemory;

        $startGameCommand = new StartGameCommand($gameRepository);
        $startGameCommand->execute('one', 'two', 'three');

        $actual = $gameRepository->getGame();

        $expected = new Board(4, 5, 5, 5, 5, 5);
        $expected->setPlayers('one', 'two', 'three');

        $this->assertEquals($expected, $actual);
    }
}