<?php

namespace SplendorGame;

class Player {
    private string $name;
    private array $tokens;

    public function __construct(string $playerName, array $tokens) {
        $this->name = $playerName;
        $this->tokens = $tokens;
    }

    public function getTokens(string $colorName = null) {
        if (!$colorName) return $this->tokens;
        return $this->tokens[$colorName];
    }

    public function updateTokens(string $colorName, int $number) {
        $this->tokens[$colorName] += $number;
    }
}