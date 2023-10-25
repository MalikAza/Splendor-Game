<?php

namespace SplendorGame;

class Player {
    public string $name;
    public array $tokens;
    public array $cards;

    public function __construct(array $data) {
        $this->name = $data['name'];
        $this->tokens = $data['tokens'];
        $this->cards = $data['cards'];
    }

    public function getName() {
        return $this->name;
    }

    public function getTokens(string $tokenColor) {
        return $this->tokens[$tokenColor];
    }

    public function addTokens(string $tokenColor, int $number) {
        $this->tokens[$tokenColor] += $number;
    }
}