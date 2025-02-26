<?php


namespace Attrace\Connector\Util;


class Hash
{

    /**
     * hashes the string, and returns it as a byte array
     * @param $string
     * @return array
     */
    public static function sha256($string)
    {
        $string = hash('sha256', $string);
        $ret    = [];
        foreach (str_split($string, 2) as $item) {
            $ret[] = hexdec($item);
        }
        return $ret;
    }

    /**
     * hashes the string, and returns it as a byte array
     * @param array $data array of binary strings
     * @return array
     */
    public static function sha256multi(array $data)
    {
        $ctx = hash_init('sha256');
        foreach ($data as $str) {
            hash_update($ctx, $str);
        }
        $string = hash_final($ctx);
        $ret    = [];
        foreach (str_split($string, 2) as $item) {
            $ret[] = hexdec($item);
        }
        return $ret;
    }
}