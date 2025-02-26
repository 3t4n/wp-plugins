<?php
namespace asimplebackend\helpers;

class ASB_Dashboard_Fix {
	public function __construct() {
		if ( version_compare($GLOBALS['wp_version'], '5.6-alpha', '<') && !class_exists('ASB_Dashboard_Fix') ) {

            if( is_admin() && isset($_GET['page']) && $_GET['page'] === 'a-simple-backend') {
                add_action( 'plugins_loaded', array(__CLASS__, 'init_actions') );
            }
		}
	}

    public static function init_actions() {
        if ( ! defined( 'CONCATENATE_SCRIPTS' ) ) {
            define( 'CONCATENATE_SCRIPTS', false );
        }

        $GLOBALS['concatenate_scripts'] = false;
        add_action( 'wp_default_scripts', array( __CLASS__, 'replace_scripts' ), -1 );
    }

    /*
    * Replace the script
    */
    public static function replace_scripts( $scripts ) {
        $assets_url = plugins_url( 'js/', dirname(__FILE__) );

        self::set_script( $scripts, 'jquery-migrate', $assets_url . 'jquery-migrate-1.4.1-wp.js', array(), '1.4.1-wp' );
        self::set_script( $scripts, 'jquery', false, array( 'jquery-core', 'jquery-migrate' ), '1.12.4-wp' );
    }

    // Set script
    private static function set_script( $scripts, $handle, $src, $deps = array(), $ver = false, $in_footer = false ) {
        $script = $scripts->query( $handle, 'registered' );

        if ( $script ) {
            $script->src  = $src;
            $script->deps = $deps;
            $script->ver  = $ver;
            $script->args = $in_footer;

            unset( $script->extra['group'] );

            if ( $in_footer ) {
                $script->add_data( 'group', 1 );
            }
        } else {
            if ( $in_footer ) {
                $scripts->add( $handle, $src, $deps, $ver, 1 );
            } else {
                $scripts->add( $handle, $src, $deps, $ver );
            }
        }
    }
}

new ASB_Dashboard_Fix();