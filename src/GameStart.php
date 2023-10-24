<?php

namespace SplendorGame;
class GameStart {
    private GameRepositoryInMemory $gameRepository;
    public function __construct(
        GameRepositoryInMemory $gameRepository
    ) {
        $this->gameRepository = $gameRepository;
    }

    public function execute(array $players)
    {
        $nbrJetons = 7;
        $nbrNobles = count($players) + 1;
        switch (count($players))
        {
            case 2:
                $nbrJetons = 4;
                break;
            case 3:
                $nbrJetons = 5;
                break;
        }

        $board = new Board($nbrNobles, $nbrJetons, $nbrJetons, $nbrJetons,$nbrJetons,$nbrJetons, $players);
        $this->gameRepository->saveGame($board);
    }
}