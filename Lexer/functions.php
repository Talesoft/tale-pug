<?php

namespace Tale\Jade\Lexer;

function preg_last_error_text()
{

    static $texts = [
        PREG_NO_ERROR => 'No error occured',
        PREG_INTERNAL_ERROR => 'An internal error occured',
        PREG_BACKTRACK_LIMIT_ERROR => 'The backtrack limit was exhausted (Increase pcre.backtrack_limit in php.ini)',
        PREG_RECURSION_LIMIT_ERROR => 'Recursion limit was exhausted (Increase pcre.recursion_limit in php.ini)',
        PREG_BAD_UTF8_ERROR => 'Bad UTF8 error!',
        PREG_BAD_UTF8_OFFSET_ERROR => 'Bad UTF8 offset error'
    ];

    $code = preg_last_error();

    if (!isset($texts[$code]))
        return 'Unknown error ('.$code.')';

    return $texts[$code];
}

function get_internal_encoding()
{

    return extension_loaded('mb') ? mb_internal_encoding() : 'UTF-8';
}

//String functions for save multibyte usage
if (extension_loaded('mb')) {

    function safe_strlen($string, $encoding = null)
    {

        return mb_strlen($string, $encoding);
    }

    function safe_substr($string, $start, $length = null, $encoding = null)
    {

        return mb_substr($string, $start, $length, $encoding);
    }

    function safe_strpos($haystack, $needle, $offset = null, $encoding = null)
    {

        return mb_strpos($haystack, $needle, $offset, $encoding);
    }

    function safe_strstr($haystack, $needle, $before_needle = false, $encoding = null)
    {

        return mb_strstr($haystack, $needle, $before_needle, $encoding);
    }

    function safe_substr_count($haystack, $needle, $encoding = null)
    {

        return mb_substr_count($haystack, $needle, $encoding);
    }

} else {

    function safe_strlen($string, $encoding = null)
    {

        return strlen($string);
    }

    function safe_substr($string, $start, $length = null, $encoding = null)
    {

        return substr($string, $start, $length);
    }

    function safe_strpos($haystack, $needle, $offset = null, $encoding = null)
    {

        return strpos($haystack, $needle, $offset);
    }

    function safe_strstr($haystack, $needle, $before_needle = false, $encoding = null)
    {

        return strstr($haystack, $needle, $before_needle);
    }

    function safe_substr_count($haystack, $needle, $encoding = null)
    {

        return substr_count($haystack, $needle);
    }
}