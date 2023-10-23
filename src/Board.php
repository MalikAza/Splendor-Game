<?php

namespace SplendorGame;

class Board {
    private array $board;

    public function __construct(array &$board) {
        $this->board = $board;
    }

    public function playerTakeTwoIdenticalToken(string $playerId, string $colorName) {
        $this->board['players'][$playerId]['tokens'][$colorName] += 2;
    }

    public function getUserToken(string $playerId, string $colorName) {
        return $this->board['players'][$playerId]['tokens'][$colorName];
    }
}