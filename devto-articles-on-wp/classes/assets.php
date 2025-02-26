<?php
namespace DevToWP;

defined( 'ABSPATH' ) || die();
/**
 *  Necessary assets loading
 *
 * @package DevToWP
 */

class Assets {

    public static function initialization() {
        add_action( 'wp_enqueue_scripts', array( __CLASS__, 'manager' ) );
    }

    public static function manager() {
        wp_enqueue_style( 'dev-to-post', DEV_TO_WP_DIR_URL.'/assets/devtowp.css', array(), DEV_TO_WP_VERSION, 'all'  );
    }

}
