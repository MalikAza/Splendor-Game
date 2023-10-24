<?php
declare(strict_types=1);

use PHPUnit\Framework\TestCase;
use SplendorGame\Board;
use SplendorGame\GameRepositoryInMemory;
use SplendorGame\GameStart;

final class GameTest extends TestCase
{
    public array $initialBoard;

    function setUp(): void
    {
    }

    function testInitBoardForTwoPlayers()
    {
        $nbrPlayers = 2;
        $gameRepository = new GameRepositoryInMemory();

        $command = new GameStart($gameRepository);
        $command->execute($nbrPlayers);

        $expected = new Board(3,4,4,4,4,4, $nbrPlayers);
        $actual = $gameRepository->getGame();

        $this->assertEquals($actual, $expected);
    }

    function testInitBoardForThreePlayers()
    {
        $nbrPlayers = 3;
        $gameRepository = new GameRepositoryInMemory();

        $command = new GameStart($gameRepository);
        $command->execute($nbrPlayers);

        $expected = new Board(4,5,5,5,5,5, $nbrPlayers);
        $actual = $gameRepository->getGame();

        $this->assertEquals($actual, $expected);
    }
    function testInitBoardForFourPlayers()
    {
        $nbrPlayers = 4;
        $gameRepository = new GameRepositoryInMemory();

        $command = new GameStart($gameRepository);
        $command->execute($nbrPlayers);

        $expected = new Board(5,7,7,7,7,7, $nbrPlayers);
        $actual = $gameRepository->getGame();

        $this->assertEquals($actual, $expected);
    }
}