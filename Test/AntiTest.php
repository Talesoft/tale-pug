<?php

namespace Tale\Test\Pug;

use PHPUnit\Framework\TestCase;
use Tale\Pug\Compiler;

class AntiTest extends TestCase
{

    /** @var \Tale\Pug\Compiler */
    private $compiler;

    public function setUp()
    {

        $this->compiler = new Compiler();
    }

    /**
     * @expectedException \Tale\Pug\Compiler\Exception
     */
    public function testWhenNotCaseChild()
    {
        $this->compiler->compile('when "abc"');
    }

    /**
     * @expectedException \Tale\Pug\Compiler\Exception
     */
    public function testUnclosedAttributeBlockOnElement()
    {
        $this->compiler->compile('some-element(abc, def');
    }

    /**
     * @expectedException \Tale\Pug\Compiler\Exception
     */
    public function testUnclosedAttributeBlockOnMixin()
    {
        $this->compiler->compile('mixin some-mixin(abc, def');
    }

    /**
     * @expectedException \Tale\Pug\Compiler\Exception
     */
    public function testUnclosedAttributeBlockOnMixinCall()
    {
        $this->compiler->compile('+some-mixin(abc, def');
    }

    /**
     * @expectedException \Tale\Pug\Compiler\Exception
     */
    public function testNestedMixin()
    {
        $this->compiler->compile("mixin some-mixin()\n\tmixin some-sub-mixin()");
    }

    /**
     * @expectedException \Tale\Pug\Compiler\Exception
     */
    public function testDoWithoutWhile()
    {
        $this->compiler->compile("do\n\tp Something\nnot-a-while-element");
    }

    /**
     * @expectedException \Tale\Pug\Compiler\Exception
     */
    public function testStandaloneWhile()
    {
        $this->compiler->compile("while \$something");
    }

    /**
     * @expectedException \Tale\Pug\Compiler\Exception
     */
    public function testDoWhileWithWhileChildren()
    {
        $this->compiler->compile("do\n\tp Something\nwhile \$something\n\tp Anything");
    }
}