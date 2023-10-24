<?php

namespace SplendorGame\interfaces;

use SplendorGame\Board;

interface IUser {
    // === Commands === //

    /** @param String[] $userNames Minimum of 2 players, maximum of 4 players. */
    public function startGame(string ...$playerNames): void;

    /** @param stirng $tokenColor 1 token color name. */
    public function playerGetTwoIdenticalTokens(string $tokenColor): void;

    /** @param String[] $tokensColor 3 unique token color name */
    public function playerGetThreeUniqueTokens(string ...$tokensColor): void;

    // === Query === //

    /** Return the state of the current game. */
    public function getGame();

    // public function getPlayer(string $playerName): Player;
}