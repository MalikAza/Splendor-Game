<?php

namespace SplendorGame\exceptions;

use Exception;

class NotEnoughTokensException extends Exception {
    public function __construct(string $who, string $tokensName, int $needsNumber) {
        $message = "$who have not enought $tokensName tokens to make this transaction.
        It needs $needsNumber $tokensName tokens (or more) to perform it. Try again";
        parent::__construct($message);
    }
}