<?php
/**
 * A collection of utilities
 *
 * @package DaReactions
 *
 * @since 1.0.0
 */
namespace DaReactions;
use Exception;
/**
 * Class Utils
 * @package DaReactions
 *
 * A collection of utilities
 *
 * @since 1.0.0
 */
class Utils
{
    /**
     * Default color palettes
     *
     * @var array
     *
     * @since 1.3.2
     */
    public static $defaultPalette = array(
        '#95dd90',
        '#9390dd',
        '#dd9b90',
        '#90dda3',
        '#ab90dd',
        '#ddb390',
        '#90ddbb',
        '#c390dd',
        '#ddcb90',
        '#90ddd2',
        '#da90dd',
        '#d8dd90',
        '#90d0dd',
        '#dd90c8',
        '#c0dd90',
        '#90b8dd',
        '#dd90b0',
        '#a8dd90',
        '#90a0dd',
        '#dd9098'
    );
    /**
     * Converts a number to a human-readable string
     *
     * @param string $number
     *
     * @return int|string
     * @since 1.0.0
     */
    public static function formatBigNumber($number)
    {
        $n_format = 0;
        $suffix = '';
        if ($number > 0 && $number < 1000) {
            // 1 - 999
            $n_format = floor($number);
        } else if ($number >= 1000 && $number < 1000000) {
            // 1k-999k
            $n_format = floor($number / 1000);
            $suffix = 'K+';
        } else if ($number >= 1000000 && $number < 1000000000) {
            // 1m-999m
            $n_format = floor($number / 1000000);
            $suffix = 'M+';
        } else if ($number >= 1000000000 && $number < 1000000000000) {
            // 1b-999b
            $n_format = floor($number / 1000000000);
            $suffix = 'B+';
        } else if ($number >= 1000000000000) {
            // 1t+
            $n_format = floor($number / 1000000000000);
            $suffix = 'T+';
        }
        return !empty($n_format . $suffix) ? $n_format . $suffix : 0;
    }
    /**
     * Checks if a string ends with another string
     *
     * @param string $haystack
     * @param string $needle
     *
     * @return bool
     */
    public static function stringEndsWith( $haystack, $needle) {
	    return strrpos( $haystack, $needle ) === ( strlen( $haystack ) - strlen( $needle ) );
    }
    /**
     * Checks if a string starts with another string
     *
     * @param string $haystack
     * @param string $needle
     *
     * @return bool
     */
    public static function stringStartsWith( $haystack, $needle)
    {
        return str_starts_with($haystack, $needle);
    }
    /**
     * Generate a HEX color from an arbitrary string
     * i.e. 'string' = '#84ffb4'
     *
     * @param string $string
     *
     * @return string
     * @since 1.0.0
     *
     */
    public static function generateColorFromString( $string) {
        $hash = self::hash($string);
	    $color1 = max( hexdec( substr( $hash, 8, 2 ) ), 128 );
	    $color2 = max( hexdec( substr( $hash, 4, 2 ) ), 128 );
	    $color3 = max( hexdec( substr( $hash, 0, 2 ) ), 128 );
	    return sprintf( '#%02x%02x%02x', $color1, $color2, $color3 );
        }
    /**
     * Get contents between two delimiters
     *
     * @param string $string
     * @param string $startDelimiter
     * @param string $endDelimiter
     *
     * @return array
     * @since 1.2.0
     */
    public static function getContentsBetween( $string, $startDelimiter, $endDelimiter) {
        $contents = array();
        $startDelimiterLength = strlen($startDelimiter);
        $endDelimiterLength = strlen($endDelimiter);
        $startFrom = 0;
        while (false !== ($contentStart = strpos($string, $startDelimiter, $startFrom))) {
            $contentStart += $startDelimiterLength;
            $contentEnd = strpos($string, $endDelimiter, $contentStart);
            if (false === $contentEnd) {
                break;
            }
            $contents[] = substr($string, $contentStart, $contentEnd - $contentStart);
            $startFrom = $contentEnd + $endDelimiterLength;
        }
        return $contents;
    }
    /**
     * Returns one of the default color values
     *
     * @param int $index
     *
     * @return string
     * @since 1.3.2
     */
    public static function getDefaultColorByIndex($index) {
        $count = count(self::$defaultPalette);
        return self::$defaultPalette[$index % $count];
    }
    /**
     * Generate color from hex string
     *
     * @param resource $image
     * @param string $hex
     *
     * @return int
     * @since 1.2.0
     */
    public static function hexColorAllocate($image, $hex) {
        $hex = ltrim($hex, '#');
        $r = hexdec(substr($hex, 0, 2));
        $g = hexdec(substr($hex, 2, 2));
        $b = hexdec(substr($hex, 4, 2));
        return imagecolorallocate($image, $r, $g, $b);
    }
    /**
     * Print a select dropdown
     *
     * @param array $options
     * @param mixed $selectedValue
     * @param string $label
     * @param string $name
     */
    public static function printSelect($options, $selectedValue, $label, $name) {
	    $name = sanitize_key( $name ?: $label );
        if (!empty($label)) {
	        echo '<label for="' . esc_attr( $name ) . '">' . esc_html( $label ) . '</label>';
        }
	    echo '<select id="' . esc_attr( $name ) . '" name="' . esc_attr( $name ) . '">';
	    foreach ( $options as $value => $text ) {
		    echo '<option value="' . esc_attr( $value ) . '" ' . selected( $value, $selectedValue, false ) . '>' . esc_html( $text ) . '</option>';
        }
        echo '</select>';
    }
    /**
     * Generate a random string
     *
     * @param int $length
     *
     * @return string
     * @throws Exception
     */
    public static function generateRandomString( $length = 32) {
        $characters = '0123456789abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ-_';
        $randomString = '';
	    $max = strlen( $characters ) - 1;
        for ($i = 0; $i < $length; $i++) {
	        $randomString .= $characters[ wp_rand( 0, $max ) ];
        }
        return $randomString;
    }
	/**
	 * Generate a hash
	 *
	 * @param string $value
	 * @param int $length
	 *
	 * @return string
	 */
    public static function hash($value, $length = 32)
    {
        $token = hash('sha256', NONCE_SALT . $value);
        while (strlen($token) < $length) {
            $token .= $token;
        }
        return substr($token, 0, $length);
    }
}
