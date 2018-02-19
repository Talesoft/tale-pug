<?php

namespace Tale\Test\Pug;

use PHPUnit\Framework\TestCase;
use Tale\Pug\Renderer;

class VariableTest extends TestCase
{

    /** @var \Tale\Pug\Renderer */
    private $renderer;

    public function setUp()
    {

        $this->renderer = new Renderer([
            'adapter_options' => [
                'path' => __DIR__.'/cache/variables'
            ],
            'pretty' => false,
            'paths' => [__DIR__.'/views/variables']
        ]);
    }

    public function testAssignment()
    {

        $errorLevel = error_reporting();
        error_reporting(E_ALL ^ E_WARNING);
        $this->assertEquals('<p>Hello World!</p>nowrap212<div style="width: 100%; height: 50%"></div>', $this->renderer->render('assignment', [
            'existing' => ['style' => ['width' => '100%'], 'class' => 'test']
        ]));
        error_reporting($errorLevel);
    }
}