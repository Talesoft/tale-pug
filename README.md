
# Tale Pug for PHP

[![GitHub release](https://img.shields.io/github/release/talesoft/tale-pug.svg?style=flat-square)](https://github.com/Talesoft/tale-pug) [![Travis](https://img.shields.io/travis/Talesoft/tale-pug.svg?style=flat-square)](https://travis-ci.org/Talesoft/tale-pug) [![Packagist](https://img.shields.io/packagist/dt/talesoft/tale-pug.svg?style=flat-square)](https://packagist.org/packages/talesoft/tale-pug) [![HHVM](https://img.shields.io/hhvm/talesoft/tale-pug.svg?style=flat-square)](https://travis-ci.org/Talesoft/tale-pug) [![License](https://img.shields.io/badge/license-MIT-blue.svg?style=flat-square)](https://github.com/Talesoft/tale-pug/blob/master/LICENSE.md)


> **Finally a fully-functional, complete and clean port of the Pug/Jade language to PHP**
>
> *— Abraham Lincoln*


The Tale Pug Template Engine brings the popular and powerful Templating-Language [PugJS](https://pugjs.org), formerly Jade, to PHP!

Tale Pug is the first complete and most powerful Pug implementation in PHP right now.


**Contents:**

- [What is Tale Pug](#what-is-tale-pug)
- [Getting Started / Installation](#getting-started)
- [Supported Features](#supported-features)
- [Documentation Resources](#documentation-resources)
- [Tale Pug in your favorite framework](#tale-pug-for-your-favorite-framework)
- [Get in touch & support my work](#get-in-touch-and-support-my-work)


---


## What is Tale Pug

It's a template engine that doesn't focus on abstracting PHP, but focuses on abstracting **HTML**.

**Why another template engine?**, you might ask.

Template engines like Twig or Blade are pretty cool and functional, but they all lack one common thing: **HTML abstraction**.

You still have to write all those tags, brackets and quotes, you have to close tags and make sure that you keep your structure consistent. It's verbose and it takes large sizes on bigger sites pretty quick.

Similar to HAML, but less verbose, Tale Pug takes _both_ approaches, it abstracts PHP _as well_ as HTML. It works based on indentation and simple CSS-selectors to create your HTML as clean and quick as possible. It also involves a lot of dynamic features, you won't need any line of HTML or PHP to write your templates anymore. _You only need Tale Pug_.

Furthermore, Tale Pug can handle different output formats through its syntax. That way you can use Tale Pug for HTML5, XHTML or XML templates just by changing the doctype and it will automatically make sure to always render valid markup.

Below you have some examples, feature-links, links to documentation and a sandbox where you can play in. Check them out!

Don't fear the syntax. Let me stress this out because I've read a lot about people _being scared_ of Jade syntax. 
It is basically indented CSS-selectors and a few characters to control what you output.
Once you wrote a few templates with it, I assure you, **you'll love it**!


## Getting Started


### Install with [Composer](https://getcomposer.org)

[Download Composer](https://getcomposer.org/download/)

The composer package for Tale Pug is called [`talesoft/tale-pug`](https://packagist.org/packages/talesoft/tale-pug)

If you want to get started right now, hook up [composer](https://getcomposer.org/) and run

```bash
$ composer require "talesoft/tale-pug:*"
```

or add it to your `composer.json` by yourself

```json
{
    "require": {
        "talesoft/tale-pug": "^1.5.0"
    }
}
```

_Note: If you're not using composer, make sure to also include the `Compiler/functions.php` file_

### Rendering a Pug Template

Include the `vendor/autoload.php` file of composer in your PHP script and get started with Tale Pug!

```php

use Tale\Pug;

//Include the vendor/autoload.php if you're using composer!
include('vendor/autoload.php');

$renderer = new Pug\Renderer();

echo $renderer->render('your-pug-file');
```

This way, the renderer will search for `your-pug-file.pug` in your `get_include_path()`-paths.
Notice that the path passed to `render` should be relative. You can give it absolute paths, but it will make caching harder.

We show you how to add alternative search paths further in the **Basic configuration** section below.

When the Jade-file gets rendered, a `./cache/views`-directory is created automatically and the compiled PHTML will be stored in that directory.

To change this directory, use the `cache_path`-option

```php

$renderer = new Pug\Renderer([
    'cache_path' => '/your/absolute/cache/path'
]);
```


The Pug-file will now be rendered to that directory on each call.

To enable a cache that won't render the files on each call, use the `ttl` option of the `file`-adapter


```php

$renderer = new Pug\Renderer([
    'ttl' => 3600 //Will cache the file for 3600 seconds (one hour)
]);
```


### Basic configuration


To enable formatting of the PHTML-output, use the `pretty`-option

```php

$renderer = new Pug\Renderer([
    'pretty' => true
]);
```


If you don't want to use the `get_include_path()`-paths (which could actually harbor a security risk in some cases), pass your own search paths to the Renderer.
Rendered and included Pug-files will be searched in those paths and not in the `get_include_path()`-paths anymore.

```php

//Either with
$renderer = new Pug\Renderer([
    'paths' => [__DIR__.'/views']
]);

//or with
$renderer->addPath(__DIR__.'/views');
```

As soon as you pass *any* path, the loading from the `get_include_path()`-paths will be disabled and you always load from your passed directory/ies.

To pass variables to your Pug-file, use the second argument of the `render`-method

```php

echo $renderer->render('index', [
    'title' => 'Pug is awesome!',
    'content' => 'Oh yeah, it is.'
]);
```

These can be used inside Pug as normal variables

```jade

h1= $title

+content-block($content)
```


---


## Supported features

Tale Pug supports every single feature the [original Pug implementation](http://pugjs.org/) supports!
This always has been and will always be the main target.

**But why stop there?**
PHP has it's own features that are surely different from JavaScript's.
By utilizing those features it aims to bring in more, compatible features into the language to make the fastest template development ever possible!

**You can try each feature and see a bunch of examples on my [sandbox site](http://sandbox.jade.talesoft.codes)**

### Supported official PugJS Features

- [Tags](http://sandbox.jade.talesoft.codes)
- [Classes](http://sandbox.jade.talesoft.codes?example=classes)
- [IDs](http://sandbox.jade.talesoft.codes?example=ids)
- [Doctypes](http://sandbox.jade.talesoft.codes?example=html-5)
- [Attributes](http://sandbox.jade.talesoft.codes?example=attributes)
- [Mixins](http://sandbox.jade.talesoft.codes?example=mixins)
- [Blocks](http://sandbox.jade.talesoft.codes?example=blocks)
- [Expressions](http://sandbox.jade.talesoft.codes?example=expressions)
- [Escaping](http://sandbox.jade.talesoft.codes?example=escaping)
- [Block Expansion](http://sandbox.jade.talesoft.codes?example=block-expansion)
- [Assignments](http://sandbox.jade.talesoft.codes?example=assignments)
- [Comments](http://sandbox.jade.talesoft.codes?example=comments)
- [Code](http://sandbox.jade.talesoft.codes?example=code)
- [Inheritance](http://sandbox.jade.talesoft.codes?example=inheritance)
- [Includes](http://sandbox.jade.talesoft.codes?example=includes)
- [Conditionals](http://sandbox.jade.talesoft.codes?example=conditionals)
- [Loops](http://sandbox.jade.talesoft.codes?example=loops)
- [Interpolation](http://sandbox.jade.talesoft.codes?example=interpolation)
- [Filters](http://sandbox.jade.talesoft.codes?example=filters)
- [Mixin Blocks](http://sandbox.jade.talesoft.codes?example=mixin-blocks)
- [Variadics](http://sandbox.jade.talesoft.codes?example=variadics)

### Supported Tale Pug Features

- [Named Mixin Parameters](http://sandbox.jade.talesoft.codes?example=named-mixin-parameters)
- [Attribute Stacking](http://sandbox.jade.talesoft.codes?example=attribute-stacking)
- [Variable Access](http://sandbox.jade.talesoft.codes?example=variable-access)
- [Do/while and for-Loops](http://sandbox.jade.talesoft.codes?example=loops)

### Other cool features

- Automatic isset-checks for simple variables with `?`-flag to disable the behavior
- Inbuilt Markdown, CoffeeScript, LESS, SCSS/SASS and Stylus support
- Escapable text for HTML/-PHP-output
- UTF-8 support via PHP's mb_* extension
- Indentation detection and support for any indentation kind you like
- Hackable and customizable renderer, compiler, parser and lexer
- Huge amount of (optional) configuration possibilities
- Graceful compiler forgiving many mistakes (e.g. spaces around the code)
- Lightning fast and clean compilation
- Detailed error handling
- Renderer with different adapters
- Intelligent expression parsing based on bracket counting
- Huge documentation available
- Tested well and maintained actively


### There's more to come...

Tale Pug is actively used and developed in many projects and is improved constantly.

It doesn't stick to the Pug-convention, but it will always provide compatibility to PugJS to help reducing confusion.

**Planned features:**
- [x] Command line tools
- [ ] Import Attributes (`include some-file(some-var='some-value')`)
- [ ] Helper Libraries (Own custom helper libraries)
- [ ] Aliases (Like mixins, just smaller)
- [ ] Website Kit for easy website creation with Tale Pug
- [x] Stylus integration
- [x] CoffeeScript integration
- [x] Markdown integration
- [ ] Extensions and package manager

---


## Documentation Resources

[Tale Pug Live Compiler](http://sandbox.jade.talesoft.codes)
A compiler for you to play with in your browser as well as a whole bunch of examples to give you a grasp of what Tale Pug is capable of.

[The Tale Pug API Docs](http://jade.talesoft.codes/docs)
The documentation of the Tale Pug source code.
Generated with phpDocumentor, but is's fairly enlightening.

[Official PugJS Documentation](https://pugjs.org/api/getting-started.html)
The real thing. This is where everything that I do here originates from.
The syntax is the same, only the code-expressions are different.

[Tale Pug Bootstrap](https://github.com/Talesoft/tale-pug-bootstrap) 
A quick-start project to get you up and running. Fork it, download it, play with it. 
Don't forget to run `composer install` before launching ([Download Composer](https://getcomposer.org/download/))

[Development Test Files](https://github.com/Talesoft/tale-pug-examples)
The example files I tested the engine with.

[Tale Pug Unit Tests](https://github.com/Talesoft/tale-pug/tree/master/Test)
The Unit Tests I'm using to ensure stability.
There will be new tests added constantly and most features are covered here.
It's PHP code, though.


---


## Tale Pug for your favorite framework

You're using a framework with a template engine already, but you really want to try out Pug?
Search no further.

Thanks to the Tale Pug Community there are some modules for existing frameworks that allow you to use Tale Pug easily!

Notice that some of these have to be updated because this library has been re-named recently. Feel free to use the old Jade
implementation in this case, the only thing different will be that your files have to use the `.jade` or `.jd` extension.

### Laravel Framework
- [Official Tale Jade Bridge](http://github.com/Talesoft/tale-jade-laravel)

### Symfony 2/3
- [Example Jade Bundle](https://github.com/Talesoft/tale-symfony-jadebundle)

### Yii2 Framework
- [jacmoe's Extension](https://github.com/jacmoe/yii2-tale-pug)

### SimpleMVCFramework
- [Cagatay's SMVC Fork](https://github.com/Talesoft/tale-pug-smvc)

### CakePHP 3
- [clthck's Plugin](https://github.com/clthck/cakephp-jade)

### FlightPHP
- [berkus' Integration](https://gist.github.com/berkus/f54347a4a1fd74e9e162)

### Symphony XSLT CMS
- [vdcrea's Jade Editor](http://www.getsymphony.com/download/extensions/view/111595/)


**Your framework is missing? [Send me an e-mail](mailto:torben@talesoft.codes) and we'll get a bridge up and running as soon as possible!**

A great thanks to the contributors of these modules!

---


## Get in touch and support my work

If you find a bug or miss a function, please use the [Issues](https://github.com/Talesoft/tale-pug/issues) on this page to tell me about it. I will gladly hear you out :)


If this library helped you, eased up your work and you simply can't live without it, think about supporting my work and [**spend me a coffee**](https://www.paypal.me/TorbenKoehn). Thank you!


If you'd like to contribute, fork, send pull requests and I'll take a deep look at what you've been working at!
Tale Pug is completely **Open Source**! You can do anything you like with the code as long as you stick to the **MIT-license** I've appended. Just keep my name somewhere around!


You can also contact me via E-Mail [torben@talesoft.codes](mailto:torben@talesoft.codes)


**Thank you for using Tale Pug. Let us spread the Pug-language together!**

