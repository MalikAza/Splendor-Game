<?php

namespace SplendorGame;

use Exception;

class Board {
    const BASE_JOKER_NUMBER = 5;
    const BASE_CARD_LEVEL_3_NUMBER = 20;
    const BASE_CARD_LEVEL_2_NUMBER = 30;
    const BASE_CARD_LEVEL_1_NUMBER = 40;

    public int $numberOfNobles;
    public int $joker;
    public int $green;
    public int $blue;
    public int $red;
    public int $white;
    public int $black;
    public array $players;
    public array $cards;
    public array $tokens;
    public int $cardLevel3;
    public int $cardLevel2;
    public int $cardLevel1;
    public array $colors;

    public function __construct(
        int $numberOfNobles,
        int $green,
        int $blue,
        int $red,
        int $white,
        int $black,
        array $players,
        array $cards = null,
        int $joker = null
    ) {
        $this->numberOfNobles = $numberOfNobles;
        $this->joker = $joker ?? self::BASE_JOKER_NUMBER;
        $this->green = $green;
        $this->blue = $blue;
        $this->red = $red;
        $this->white = $white;
        $this->black = $black;
        $this->players = $players;

        $this->cards = $cards ?? [
            'hidden' => [
                'hiddenCardsLv3' => self::BASE_CARD_LEVEL_3_NUMBER - 4,
                'hiddenCardsLv2' => self::BASE_CARD_LEVEL_2_NUMBER - 4,
                'hiddenCardsLv1' => self::BASE_CARD_LEVEL_1_NUMBER - 4
            ],
            'visible' => [
                'visibleCardsLv3' => [],
                'visibleCardsLv2' => [],
                'visibleCardsLv1' => []
            ]
        ];

        for ($i = 0; $i < 4; $i++) {
            $this->cards['visible']['visibleCardsLv3'][] = new Card(3, true);
            $this->cards['visible']['visibleCardsLv2'][] = new Card(2, true);
            $this->cards['visible']['visibleCardsLv1'][] = new Card(1, true);
        }

        $this->colors = ['green', 'red', 'blue', 'white', 'black'];
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