<?php

namespace SplendorGame;

use SplendorGame\interfaces\GameRepository;

class StartGameCommand {
    private GameRepository $gameRepository;

    public function __construct(GameRepository $gameRepository) {
        $this->gameRepository = $gameRepository;
    }

    public function execute(int $numberOfPlayers) {
        switch ($numberOfPlayers) {
            case 2:
                $numberOfNobles = 3;
                $red = 4;
                break;
            
            case 3:
                $numberOfNobles = 4;
                $red = 5;
                break;
        }
        $this->gameRepository->save(
            new Board($numberOfNobles, 5, $red, 4, 4, 4)
        );
    }
}