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
        $players = ['one', 'two'];
        $gameRepository = new GameRepositoryInMemory();

        $command = new GameStart($gameRepository);
        $command->execute($players);

        $expected = new Board(3,4,4,4,4,4, $players);
        $actual = $gameRepository->getGame();

        $this->assertEquals($actual, $expected);
    }

    function testInitBoardForThreePlayers()
    {
        $players = ['one', 'two', 'three'];
        $gameRepository = new GameRepositoryInMemory();

        $command = new GameStart($gameRepository);
        $command->execute($players);

        $expected = new Board(4,5,5,5,5,5, $players);
        $actual = $gameRepository->getGame();

        $this->assertEquals($actual, $expected);
    }
    function testInitBoardForFourPlayers()
    {
        $players = ['one', 'two', 'three', 'four'];
        $gameRepository = new GameRepositoryInMemory();

        $command = new GameStart($gameRepository);
        $command->execute($players);

        $expected = new Board(5,7,7,7,7,7, $players);
        $actual = $gameRepository->getGame();

        $this->assertEquals($actual, $expected);
    }
}