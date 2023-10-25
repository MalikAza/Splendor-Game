<?php

namespace SplendorGame\commands;

use SplendorGame\Board;
use SplendorGame\GameRepositoryInMemory;
use SplendorGame\memory\PlayerRepository;

class PlayerTakeThreeDistinctTokens
{
    private GameRepositoryInMemory  $gameRepository;
    private PlayerRepository $playerRepositoryInMemory;


    public function __construct(
        GameRepositoryInMemory $gameRepository,
        PlayerRepository $playerRepositoryInMemory
    )
    {
        $this->gameRepository = $gameRepository;
        $this->playerRepositoryInMemory = $playerRepositoryInMemory;
    }

    public function execute(array $colors){

        $currentPlayer = $this->playerRepositoryInMemory->getPlayer();
        $currentBoard = $this->gameRepository->getGame();

            foreach ($currentBoard->colors as $anyColor )
            {
                if (in_array($anyColor, $colors)) {
                    //board
                    $currentBoard->$anyColor -= 1;

                    // player
                    $currentPlayer->tokens[$anyColor] += 1;
                }
            }

        $this->gameRepository->saveGame($currentBoard);
        $this->playerRepositoryInMemory->savePlayer($currentPlayer);


    }
}