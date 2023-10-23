<?php

namespace SplendorGame;

use SplendorGame\exceptions\NotEnoughTokensException;

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
        int $black
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
    }

    public function setPlayers(string ...$playersNames) {
        $tokens = [
            'green' => 0,
            'blue' => 0,
            'red' => 0,
            'white' => 0,
            'black' => 0
        ];
        foreach ($playersNames as $name) {
            $this->players[$name] = new Player($name, $tokens);
        }
    }

    public function playerTakeTwoIdenticalColorTokens(string $playerName, string $colorName) {
        $player = $this->players[$playerName];
        $boardTokens = $this->$colorName;

        if ($boardTokens < 4) throw new NotEnoughTokensException(__CLASS__, $colorName, 4);

        $this->$colorName -= 2;
        $player->updateTokens($colorName, 2);
    }

    public function getUserTokens(string $playerName, string $colorName = null) {
        $player = $this->players[$playerName];

        if ($colorName) return $player->getTokens($colorName);
        return $player->getTokens();
    }

    public function getTokens(string $colorName = null) {
        if (!$colorName) return [
            'green' => $this->green,
            'blue' => $this->blue,
            'red' => $this->red,
            'white' => $this->white,
            'black' => $this->black
        ];

        return $this->$colorName;
    }

    public function updateTokens(string $colorName, int $number) {
        $token = $this->$colorName;
        if (($token + $number) < 0) throw new NotEnoughTokensException(__CLASS__, $colorName, abs($number));

        $this->$colorName += $number;
    }
}