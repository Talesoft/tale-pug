<?php

namespace Tale\Jade;

class Filter
{

    public static function wrapTag($tag, Node $node, $indent, $newLine)
    {

        return "<$tag>".$newLine.self::filterPlain($node, $indent, $newLine).$indent."</$tag>".$newLine;
    }

    public static function wrapCode(Node $node, $indent, $newLine)
    {

        $strlen = function_exists('mb_strlen') ? 'mb_strlen' : 'strlen';
        $text = self::filterPlain($node, $indent, $newLine);

        //Make sure to have it correctly wrapped in php tags
        if (strpos($text, '<?php') !== 0)
            $text = '<?php '.$newLine.$text;

        if (strpos($text, '?>') !== $strlen($text) - 1)
            $text .= $indent.'?>'.$newLine;

        return $text;
    }


    public static function filterPlain(Node $node, $indent, $newLine)
    {

        return implode($newLine, array_map(function($line) use($indent, $newLine) {

            return $indent.trim($line);
        }, preg_split("/\r?\n/", trim($node->text())))).$newLine;
    }

    public static function filterStyle(Node $node, $indent, $newLine)
    {

        return self::wrapTag('style', $node, $indent, $newLine);
    }

    public static function filterScript(Node $node, $indent, $newLine)
    {

        return self::wrapTag('script', $node, $indent, $newLine);
    }

    public static function filterCode(Node $node, $indent, $newLine)
    {

        return self::wrapCode($node, $indent, $newLine);
    }

    public static function filterMarkdown(Node $node, $indent, $newLine)
    {

        return self::wrapTag('markdown', $node, $indent, $newLine);
    }
}