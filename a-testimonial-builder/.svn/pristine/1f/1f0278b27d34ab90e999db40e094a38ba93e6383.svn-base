<?php

namespace DavidWenner\ATestimonialBuilder;

if (!defined('ABSPATH'))
    exit; // Exit if accessed directly

class ATBS_StringHelper {

    /**
     * Returns the number of bytes in the given string.
     * This method ensures the string is treated as a byte array by using `mb_strlen()`.
     *
     * @param string $string the string being measured for length
     * @return int the number of bytes in the given string.
     */
    public static function byteLength($string)
    {
        return mb_strlen((string) $string, '8bit');
    }

    /**
     * truncate
     * @param string $string
     * @param int $length
     * @param string $suffix
     * @param string|null $encoding
     * @return string
     */
    public static function truncate($string, $length, $suffix = '...', $encoding = null)
    {
        if ($encoding === null) {
            $encoding = get_bloginfo('charset', 'raw') ?? 'UTF-8';
        }

        if (mb_strlen($string, $encoding) > $length) {
            return rtrim(mb_substr($string, 0, $length, $encoding)) . $suffix;
        }

        return $string;
    }
}
