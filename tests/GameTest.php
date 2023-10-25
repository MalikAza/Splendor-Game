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

        $expectedNobles = 3;
        $expectedJetons = 4;
        $actual = $gameRepository->getGame();

        $this->assertEquals($actual->numberOfNobles, $expectedNobles);
        $this->assertEquals($actual->red, $expectedJetons);
    }

    function testInitBoardForThreePlayers()
    {
        $players = ['one', 'two', 'three'];
        $gameRepository = new GameRepositoryInMemory();

        $command = new GameStart($gameRepository);
        $command->execute($players);

        $expectedNobles = 4;
        $expectedJetons = 5;
        $actual = $gameRepository->getGame();

        $this->assertEquals($actual->numberOfNobles, $expectedNobles);
        $this->assertEquals($actual->red, $expectedJetons);
    }
    function testInitBoardForFourPlayers()
    {
        $players = ['one', 'two', 'three', 'four'];
        $gameRepository = new GameRepositoryInMemory();

        $command = new GameStart($gameRepository);
        $command->execute($players);

        $expectedNobles = 5;
        $expectedJetons = 7;
        $actual = $gameRepository->getGame();

        $this->assertEquals($actual->numberOfNobles, $expectedNobles);
        $this->assertEquals($actual->red, $expectedJetons);
    }
}