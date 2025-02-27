<?php
/**
 * Plugin Name: Latin Now!
 * Description: Converts Serbian Cyrillic characters into the Latin alphabet. No configuration required.
 * Version: 2.1.0
 * Author: Vukica Tomić
 * Text Domain: latin-now
 * Domain Path: /languages
 */

defined( 'ABSPATH' ) || exit;

// Define constants
defined( 'LT_NOW_CYRILLIC' ) or define( 'LT_NOW_CYRILLIC', array( 'А', 'Б', 'В', 'Г', 'Д', 'Ђ', 'Е', 'Ж', 'З', 'И', 'Ј', 'К', 'Л', 'Љ', 'М', 'Н', 'Њ', 'О', 'П', 'Р', 'С', 'Т', 'Ћ', 'У', 'Ф', 'Х', 'Ц', 'Ч', 'Џ', 'Ш', 'а', 'б', 'в', 'г', 'д', 'ђ', 'е', 'ж', 'з', 'и', 'ј', 'к', 'л', 'љ', 'м', 'н', 'њ', 'о', 'п', 'р', 'с', 'т', 'ћ', 'у', 'ф', 'х', 'ц', 'ч', 'џ', 'ш' ) );
defined( 'LT_NOW_LATIN' ) or define( 'LT_NOW_LATIN', array( 'A', 'B', 'V', 'G', 'D', 'Đ', 'E', 'Ž', 'Z', 'I', 'J', 'K', 'L', 'Lj', 'M', 'N', 'Nj', 'O', 'P', 'R', 'S', 'T', 'Ć', 'U', 'F', 'H', 'C', 'Č', 'Dž', 'Š', 'a', 'b', 'v', 'g', 'd', 'đ', 'e', 'ž', 'z', 'i', 'j', 'k', 'l', 'lj', 'm', 'n', 'nj', 'o', 'p', 'r', 's', 't', 'ć', 'u', 'f', 'h', 'c', 'č', 'dž', 'š' ) );
defined( 'LT_NOW_CYR_UNICODE' ) or define( 'LT_NOW_CYR_UNICODE', array( 'u0411', 'u0412', 'u0413', 'u0414', 'u0402', 'u0416', 'u0417', 'u0418', 'u041b', 'u0409', 'u041d', 'u040a', 'u041f', 'u0420', 'u0421', 'u040b', 'u0423', 'u0424', 'u0425', 'u0426', 'u0427', 'u040f', 'u0428', 'u0431', 'u0432', 'u0433', 'u0434', 'u0452', 'u0436', 'u0437', 'u0438', 'u043a', 'u043b', 'u0459', 'u043c', 'u043d', 'u045a', 'u043f', 'u0440', 'u0441', 'u0442', 'u045b', 'u0443', 'u0444', 'u0445', 'u0446', 'u0447', 'u045f', 'u0448' ) );
defined( 'LT_NOW_LAT_UNICODE' ) or define( 'LT_NOW_LAT_UNICODE', array( 'u0042', 'u0056', 'u0047', 'u0044', 'u0110', 'u017d', 'u005a', 'u0049', 'u004c', 'u004c\u006a', 'u004e', 'u004e\u006a', 'u0050', 'u0052', 'u0053', 'u0106', 'u0055', 'u0046', 'u0048', 'u0043', 'u010c', 'u0044\u017e', 'u0160', 'u0062', 'u0076', 'u0067', 'u0064', 'u0111', 'u017e', 'u007a', 'u0069', 'u006b', 'u006c', 'u006c\u006a', 'u006d', 'u006e', 'u006e\u006a', 'u0070', 'u0072', 'u0073', 'u0074', 'u0107', 'u0075', 'u0066', 'u0068', 'u0063', 'u010d', 'u0064\u017e', 'u0161' ) );

// Add character filters if WP language is set to Serbian
if ( ! function_exists( 'lt_now_kill_cirilica' ) ) {
    function lt_now_kill_cirilica() {
        $language = get_locale();
        if ( $language == 'sr_RS' ) {
            add_filter( 'gettext', 'lt_now_get_latin', 10, 3 );
            add_filter( 'gettext_with_context', 'lt_now_get_latin_context', 10, 4 );
            add_filter( 'ngettext', 'lt_now_get_latin_n', 10, 5 );
            add_filter( 'ngettext_with_context', 'lt_now_get_latin_n_context', 10, 6 );
            add_filter( 'load_script_translations', 'lt_now_get_latin_scripts', 10, 4 );
        }
    }
    lt_now_kill_cirilica();
}

if ( ! function_exists( 'lt_now_get_latin' ) ) {
    function lt_now_get_latin( $translation, $text, $domain ) {
        $translation = str_replace( LT_NOW_CYRILLIC, LT_NOW_LATIN, $translation );
        return $translation;
    }
}

if ( ! function_exists( 'lt_now_get_latin_context' ) ) {
    function lt_now_get_latin_context( $translation, $text, $context, $domain ) {
        $translation = str_replace( LT_NOW_CYRILLIC, LT_NOW_LATIN, $translation );
        return $translation;
    }
}

if ( ! function_exists( 'lt_now_get_latin_n' ) ) {
    function lt_now_get_latin_n( $translation, $single, $plural, $number, $domain ) {
        $translation = str_replace( LT_NOW_CYRILLIC, LT_NOW_LATIN, $translation );
        return $translation;
    }
}

if ( ! function_exists( 'lt_now_get_latin_n_context' ) ) {
    function lt_now_get_latin_n_context( $translation, $single, $plural, $number, $context, $domain ) {
        $translation = str_replace( LT_NOW_CYRILLIC, LT_NOW_LATIN, $translation );
        return $translation;
    }
}

// For JavaScript translations
if ( ! function_exists( 'lt_now_get_latin_scripts' ) ) {
    function lt_now_get_latin_scripts( $translations, $file, $handle, $domain ) {
        $translations = str_replace( LT_NOW_CYR_UNICODE, LT_NOW_LAT_UNICODE, $translations );
        return $translations;
    }
}
