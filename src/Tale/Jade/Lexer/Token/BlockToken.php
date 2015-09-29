<?php

namespace Tale\Jade\Lexer\Token;

use Tale\Jade\Lexer;
use Tale\Jade\Lexer\NamedTokenBase;

class BlockToken extends NamedTokenBase
{
    private $_type;

    public function __construct(Lexer $lexer)
    {

        parent::__construct($lexer);

        $this->_type = null;
    }

    /**
     * @return string
     */
    public function getType()
    {

        return $this->_type;
    }

    /**
     * @param string $type
     *
     * @return $this
     */
    public function setType($type)
    {

        $this->_type = $type;

        return $this;
    }
}