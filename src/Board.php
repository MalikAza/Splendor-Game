<?php

namespace SplendorGame;

use Exception;

class Board {
    const BASE_JOKER_NUMBER = 5;
    const BASE_CARD_LEVEL_3_NUMBER = 40;
    const BASE_CARD_LEVEL_2_NUMBER = 30;
    const BASE_CARD_LEVEL_1_NUMBER = 20;

    private int $numberOfNobles;
    private int $joker;
    private int $green;
    private int $blue;
    private int $red;
    private int $white;
    private int $black;
    private int $cardLevel3;
    private int $cardLevel2;
    private int $cardLevel1;
    private array $players;

    public function __construct(
        int $numberOfNobles,
        int $green,
        int $blue,
        int $red,
        int $white,
        int $black,
        array $players
    ) {
        $this->numberOfNobles = $numberOfNobles;
        $this->joker = self::BASE_JOKER_NUMBER;
        $this->green = $green;
        $this->blue = $blue;
        $this->red = $red;
        $this->white = $white;
        $this->black = $black;
        $this->cardLevel3 = self::BASE_CARD_LEVEL_3_NUMBER;
        $this->cardLevel2 = self::BASE_CARD_LEVEL_2_NUMBER;
        $this->cardLevel1 = self::BASE_CARD_LEVEL_1_NUMBER;
        $this->players = $players;
    }

    public function playerTakeTwoIdenticalColorTokens(string $playerName, string $tokenColor) {
        if ($this->$tokenColor < 4) throw new Exception('Action interdite.');

        $this->$tokenColor -= 2;
        $this->players[$playerName]->addTokens($tokenColor, 2);
    }

    public function getTokens(string $tokenColor) {
        return $this->$tokenColor;
    }

    public function getPlayerTokens(string $playerName, string $tokenColor) {
        $player = $this->players[$playerName];

        return $player->getTokens($tokenColor);
    }
}