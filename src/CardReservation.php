<?php

namespace SplendorGame;
class CardReservation {
    private GameRepositoryInMemory $gameRepository;
    public function __construct(GameRepositoryInMemory $gameRepository)
    {
        $this->gameRepository = $gameRepository;
    }

    public function execute(string $playerIndex, int $level, bool $isVisible, int $index = null)
    {
        $board = $this->gameRepository->getGame();
        $cardPicked = $isVisible ? clone $board->cards['visible']['visibleCardsLv'.$level][$index] : new Card($level, false);

        if ($isVisible) {
            $board->cards['visible']['visibleCardsLv'.$level][$index] = new Card($level, true);
        }
        $board->cards['hidden']['hiddenCardsLv'.$level] -= 1;

        $board->players[$playerIndex]->cards[] = $cardPicked;
    }
}