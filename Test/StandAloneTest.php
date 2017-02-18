<?php

namespace Tale\Test\Pug;

use Tale\Pug\Compiler;
use Tale\Pug\Renderer;

class StandAloneTest extends \PHPUnit_Framework_TestCase
{

    /** @var \Tale\Pug\Renderer */
    private $renderer;

    public function setUp()
    {

        $this->renderer = new Renderer([
            'adapter_options' => [
                'path' => __DIR__.'/cache/stand-alone',
            ],
            'pretty' => false,
            'paths' => [__DIR__.'/views/stand-alone'],
            'stand_alone' => true
        ]);
    }

    public function testStandAloneCompilation()
    {

        $this->assertEquals('<p class="a b c d e f">Test!</p>', $this->renderer->render('basic', ['classes' => ['e', 'f']]));
    }
}