<?php

namespace SplendorGame\storage\memory;

use SplendorGame\Board;
use SplendorGame\interfaces\GameRepository;

class GameRepositoryInMemory implements GameRepository {
    private Board $game;

    public function getGame() {
        return $this->game;
    }

    public function save(Board $game) {
        $this->game = $game;
    }
}