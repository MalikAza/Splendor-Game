<?php

use PHPUnit\Framework\TestCase;
use SplendorGame\CardReservation;
use SplendorGame\GameRepositoryInMemory;
use SplendorGame\GameStart;
use SplendorGame\Player;

class ReservationTest extends TestCase {

    function setUp(): void
    {

    }

    public function testPlayerShouldReserveALevelTwoVisibleCard()
    {
        // Given
        $tokens = ['red' => 0, 'green' => 0, 'blue' => 0, 'white' => 0, 'black' => 0];
        $playerCards = [];
        $playerOne = new Player(['name' => 'one', 'tokens'=> $tokens, 'cards' => $playerCards]);
        $playerTwo = new Player(['name' => 'two', 'tokens'=> $tokens, 'cards' => $playerCards]);

        $gameRepository = new GameRepositoryInMemory();
        $gameStarCommand = new GameStart($gameRepository);
        $gameStarCommand->execute([1 => $playerOne, 2 => $playerTwo]);

        $pickedCard = clone $gameRepository->getGame()->cards['visible']['visibleCardsLv2'][1];
        $initialVisiblesCards =  [...$gameRepository->getGame()->cards['visible']];

        // When
        $command = new CardReservation($gameRepository);
        $command->execute(1, 2, true, 1);

        // Then

        $expectedHiddenCards = ['hiddenCardsLv3' => 16, 'hiddenCardsLv2' => 25, 'hiddenCardsLv1' => 36 ];
        $actual =  $gameRepository->getGame();

        $this->assertEquals($pickedCard, $actual->players[1]->cards[0]);
        $this->assertEquals($expectedHiddenCards, $actual->cards['hidden']);
        $this->assertNotEquals($initialVisiblesCards, $actual->cards['visible']);
    }

    public function testPlayerShouldReserveALevelTwoHiddenCard()
    {
        // Given
        $tokens = ['red' => 0, 'green' => 0, 'blue' => 0, 'white' => 0, 'black' => 0];
        $playerCards = [];
        $playerOne = new Player(['name' => 'one', 'tokens'=> $tokens, 'cards' => $playerCards]);
        $playerTwo = new Player(['name' => 'two', 'tokens'=> $tokens, 'cards' => $playerCards]);

        $gameRepository = new GameRepositoryInMemory();
        $gameStarCommand = new GameStart($gameRepository);
        $gameStarCommand->execute([1 => $playerOne, 2 => $playerTwo]);

        $initialVisiblesCards =  [...$gameRepository->getGame()->cards['visible']];

        // When
        $command = new CardReservation($gameRepository);
        $command->execute(1, 2, false);

        // Then
        $expectedHiddenCards = ['hiddenCardsLv3' => 16, 'hiddenCardsLv2' => 25, 'hiddenCardsLv1' => 36 ];
        $actual =  $gameRepository->getGame();

        $this->assertEquals($expectedHiddenCards, $actual->cards['hidden']);
        $this->assertEquals($initialVisiblesCards, $actual->cards['visible']);
    }
}