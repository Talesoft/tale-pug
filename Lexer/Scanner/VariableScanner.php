<?php

namespace Tale\Jade\Lexer\Scanner;

use Tale\Jade\Lexer;
use Tale\Jade\Lexer\ScannerInterface;
use Tale\Jade\Lexer\State;
use Tale\Jade\Lexer\Token\CaseToken;
use Tale\Jade\Lexer\Token\VariableToken;

class VariableScanner implements ScannerInterface
{

    public function scan(State $state)
    {

        return $state->scanToken(
            VariableToken::class,
            '\$(?<name>[a-zA-Z_][a-zA-Z0-9_]*)'
        );
    }
}