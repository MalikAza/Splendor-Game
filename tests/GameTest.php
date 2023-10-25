<?php
declare(strict_types=1);

use PHPUnit\Framework\TestCase;
use SplendorGame\Board;
use SplendorGame\GameRepositoryInMemory;
use SplendorGame\GameStart;

final class GameTest extends TestCase
{
    function setUp(): void
    {

    }

    function boardBuilder($nbNobles, $nbJetons, $players): Board
    {
        return new Board($nbNobles, $nbJetons, $nbJetons, $nbJetons, $nbJetons, $nbJetons, $players);
    }

    function testInitBoardForTwoPlayers()
    {
        $players = ['one', 'two'];
        $gameRepository = new GameRepositoryInMemory();

        $command = new GameStart($gameRepository);
        $command->execute($players);

        $expected = $this->boardBuilder(3, 4, $players);
        $actual = $gameRepository->getGame();

        $this->assertEquals($actual, $expected);
    }

    function testInitBoardForThreePlayers()
    {
        $players = ['one', 'two', 'three'];
        $gameRepository = new GameRepositoryInMemory();

        $command = new GameStart($gameRepository);
        $command->execute($players);

        $expected = $this->boardBuilder(4, 5, $players);
        $actual = $gameRepository->getGame();

        $this->assertEquals($actual, $expected);
    }
    function testInitBoardForFourPlayers()
    {
        $players = ['one', 'two', 'three', 'four'];
        $gameRepository = new GameRepositoryInMemory();

        $command = new GameStart($gameRepository);
        $command->execute($players);

        $expected = $this->boardBuilder(5, 7, $players);
        $actual = $gameRepository->getGame();

        $this->assertEquals($actual, $expected);
    }
}