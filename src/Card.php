<?php

namespace SplendorGame;

class Card {
    public string $type;
    public array $cost;
    public bool $isVisible;

    public function __construct(
        int $level,
        bool $isVisible
    ) {
        $this->type = 'Lv'.$level;
        $this->isVisible = $isVisible;
        $this->cost = [
            'red' => rand(0, $level*2+1),
            'green' => rand(0, $level*2+1),
            'blue' => rand(0, $level*2+1),
            'black' => rand(0, $level*2+1),
            'white' => rand(0, $level*2+1)
        ];
    }

}