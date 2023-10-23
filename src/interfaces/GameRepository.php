<?php

namespace SplendorGame\interfaces;

use SplendorGame\Board;

interface GameRepository {

    public function getGame();

    public function save(Board $game);
}