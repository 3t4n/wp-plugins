<?php


namespace Attrace\Connector\Util;

/**
 * Best Logger ever: simple class to log cause all this complicated classes suck.
 *
 * Class Log
 * @package Attrace\Connector\Util
 */
class Log
{
    public static $debug = true;

    public static function println($object = "")
    {
        if (!self::$debug) {
            return;
        }

        if (is_string($object)) {
            echo $object . PHP_EOL;
            return;
        }
        if (is_array($object)) {
            print_r($object);
            echo PHP_EOL;
            return;
        }
        var_dump(($object));
    }

    public static function int16($int, $varname = null)
    {
        self::println(($varname ? $varname . ' = ' : '') . sprintf('0x%04X', $int));
    }

    public static function int8($int, $varname = null)
    {
        self::println(($varname ? $varname . ' = ' : '') . sprintf('0x%02X', $int));
    }

    public static function int16array(array $data, $varname = null, $hex = true)
    {
        $result = '';
        foreach ($data as $int) {
            $result .= ($hex ? sprintf('0x%04X', $int) : $int) . ' ';
        }
        self::println(($varname ? $varname . ' = ' : '') . $result);
    }

    public static function int8array(array $data, $varname = null, $hex = true)
    {
        $result = '';
        foreach ($data as $int) {
            $result .= strtolower(($hex ? sprintf('0x%02X', $int) : $int) . ' ');
        }
        self::println(($varname ? $varname . ' = ' : '') . $result);
    }

    public static function binaryAsBytes($binary, $varname = null)
    {
        self::int16array(Crypto::binaryToByteArray($binary), $varname, false);
    }

}