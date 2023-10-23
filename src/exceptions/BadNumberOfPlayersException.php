<?php

namespace SplendorGame\exceptions;

use Exception;

class BadNumberOfPlayersException extends Exception {
    public function __construct() {
        $message = 'The Splendor game is a 2-3 players game.';
        parent::__construct($message);
    }
}