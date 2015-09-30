<?php

namespace Tale\Jade\Parser\Node;

use Tale\Jade\Parser\NodeBase;
use Tale\Jade\Util\AttributesTrait;
use Tale\Jade\Util\NameTrait;

class AssignmentNode extends NodeBase
{

    use NameTrait;
    use AttributesTrait;
}