<?php
/**
 * Esport Country
 *
 * Auxiliary class for working with the Rinvex Country library.
 *
 * @package cyberpress/admin
 */

use Rinvex\Country\Loader;

if ( ! defined( 'ABSPATH' ) ) {
    exit;
}


/**
 * CyberPress Settings Class
 */
class CyberPress_Country {
    /**
     * Get the country by it's ISO 3166-1 alpha-2.
     *
     * @param string $code - country ISO code.
     * @param bool   $hydrate - flag for get full country atts.
     *
     * @return \Rinvex\Country\Country|array
     */
    public static function country( $code, $hydrate = true ) {
        return Loader::country( $code, $hydrate );
    }

    /**
     * Get all countries short-listed.
     *
     * @param bool $longlist - flag for get full list of countries.
     * @param bool $hydrate - flag for get full country atts.
     *
     * @return array
     */
    public static function countries( $longlist = false, $hydrate = false ) {
        return Loader::countries( $longlist, $hydrate );
    }

    /**
     * Get Country Flag.
     *
     * @param string $code - country ISO code.
     * @return bool|null|string
     */
    public static function get_flag( $code ) {
        $file = cyberpress()->plugin_path . 'assets/vendor/flag-icon-css/' . $code . '.svg';

        if ( file_exists( $file ) ) {
            $file_url = cyberpress()->plugin_url . 'assets/vendor/flag-icon-css/' . $code . '.svg';
            return '<img src="' . esc_url( $file_url ) . '" alt="' . esc_attr( $code ) . '" class="cyberpress-flag-img">';
        }

        return null;
    }
}
