<?php

namespace SplendorGame\memory;

use SplendorGame\Player;

class PlayerRepository
{

    private Player $player;

    public function __construct()
    {
        //$this->player = $player;
    }

    public function getPlayer(): Player
    {
        return $this->player;
    }

    public function savePlayer(Player $player)
    {
        $this->player = $player;
    }

}