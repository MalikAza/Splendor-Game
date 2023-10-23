<?php

namespace SplendorGame;

use SplendorGame\exceptions\BadNumberOfPlayersException;
use SplendorGame\interfaces\GameRepository;

class StartGameCommand {
    private GameRepository $gameRepository;

    public function __construct(GameRepository $gameRepository) {
        $this->gameRepository = $gameRepository;
    }

    public function execute(string  ...$playersNames) {
        switch (count($playersNames)) {
            case 2:
                $numberOfNobles = 3;
                $green = $blue = $red = $white = $black = 4;
                break;
            
            case 3:
                $numberOfNobles = 4;
                $green = $blue = $red = $white = $black = 5;
                break;

            default:
                throw new BadNumberOfPlayersException;
        }

        $board = new Board($numberOfNobles, $green, $blue, $red, $white, $black);
        $board->setPlayers(...$playersNames);

        $this->gameRepository->save($board);
    }
}