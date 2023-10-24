<?php


namespace SplendorGame;

class GameRepositoryInMemory
{
    private Board $game;
    public function __construct()
    {
    }
    public function getGame(): Board
    {
        return $this->game;
    }
    public function saveGame(Board $game)
    {
        $this->game = $game;
    }
}