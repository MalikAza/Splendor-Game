<?php

namespace SplendorGame;

class Player {
    private string $name;
    private array $tokens;

    public function __construct(array $data) {
        $this->name = $data['name'];
        $this->tokens = $data['tokens'];
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