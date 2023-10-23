<?php

namespace SplendorGame;

class Board {
    private int $numberOfNobles;
    private int $yellow;
    private int $red;
    private int $cardLevel3;
    private int $cardLevel2;
    private int $cardLevel1;

    public function __construct(
        int $numberOfNobles,
        int $yellow,
        int $red,
        int $cardLevel3,
        int $cardLevel2,
        int $cardLevel1
    ) {
        $this->numberOfNobles = $numberOfNobles;
        $this->yellow = $yellow;
        $this->red = $red;
        $this->cardLevel3 = $cardLevel3;
        $this->cardLevel2 = $cardLevel2;
        $this->cardLevel1 = $cardLevel1;
    }
}