<?php
/**
 * Script Loader Class
 * A class that provides a way to add `async` or `defer` attributes to scripts.
 * 
 * Javascript Loader Class
 * Allow `async` and `defer` while enqueuing Javascript.
 *
 * Based on a solution in TwentyTwenty.
 * @link       https://aarambhathemes.com/
 * @since      1.0.3
 *
 * @package    Aarambha_Kits
 * @subpackage Aarambha_Kits/includes/elementor
 * @author     Aarambha Themes <aarambhathemes@gmail.com>
 */

if ( ! defined( 'ABSPATH' ) ) {
    exit; // Exit if accessed directly.
}

class Aarambha_Kits_Script_Loader {

    /**
     * Init
     *
     */
    public static function init() {

        if ( version_compare( $GLOBALS['wp_version'], '6.3', '<' ) ) {
            add_filter( 'script_loader_tag', array(__CLASS__, 'filter_script_loader_tag' ), 10, 2 );
        } else {
            add_filter( 'print_scripts_array', array(__CLASS__, 'migrate_legacy_strategy_script_data' ), 100 );
        }
    }

    /**
     * Migrates legacy async/defer script data which might be used by child themes.
     *
     * This method is used on the `print_scripts_array` filter.
     *
     *
     * @param string[] $to_do An array of script dependency handles.
     * @return string[] Unchanged array of script dependency handles.
     */
    public static function migrate_legacy_strategy_script_data( $to_do ) {
        
        foreach ( $to_do as $handle ) {
            foreach ( array( 'async', 'defer' ) as $strategy ) {
                if ( wp_scripts()->get_data( $handle, $strategy ) ) {
                    wp_script_add_data( $handle, 'strategy', $strategy );
                }
            }
        }
        return $to_do;
    }

    /**
     * Adds async/defer attributes to enqueued / registered scripts.
     *
     * Now that #12009 has landed in WordPress 6.3, this method is only used for older versions of WordPress.
     * This method is used on the `script_loader_tag` filter.
     *
     * @link https://core.trac.wordpress.org/ticket/12009
     *
     * @param string $tag    The script tag.
     * @param string $handle The script handle.
     * @return string Script HTML string.
     */
    public static function filter_script_loader_tag( $tag, $handle ) {
        $strategies = array(
            'async' => (bool) wp_scripts()->get_data( $handle, 'async' ),
            'defer' => (bool) wp_scripts()->get_data( $handle, 'defer' ),
        );
        $strategy   = wp_scripts()->get_data( $handle, 'strategy' );
        if ( $strategy && isset( $strategies[ $strategy ] ) ) {
            $strategies[ $strategy ] = true;
        }

        foreach ( array_keys( array_filter( $strategies ) ) as $attr ) {

            // Prevent adding attribute when already added in #12009.
            if ( ! preg_match( ":\s$attr(=|>|\s):", $tag ) ) {
                $tag = preg_replace( ':(?=></script>):', " $attr", $tag, 1 );
            }
            // Only allow async or defer, not both.
            break;
        }
        return $tag;
    }
}

/*
 * Initialize Javascript Loader Class
 */
Aarambha_Kits_Script_Loader::init();
