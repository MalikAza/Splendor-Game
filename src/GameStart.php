<?php

namespace SplendorGame;
class GameStart {
    private GameRepositoryInMemory $gameRepository;
    public function __construct(
        GameRepositoryInMemory $gameRepository
    ) {
        $this->gameRepository = $gameRepository;
    }

    public function execute(int $nbrPlayers)
    {
        $nbrJetons = 7;
        $nbrNobles = $nbrPlayers + 1;
        switch ($nbrPlayers)
        {
            case 2:
                $nbrJetons = 4;
                break;
            case 3:
                $nbrJetons = 5;
                break;
        }

        $board = new Board($nbrNobles, $nbrJetons, $nbrJetons, $nbrJetons,$nbrJetons,$nbrJetons, $nbrPlayers);
        $this->gameRepository->saveGame($board);
    }
}