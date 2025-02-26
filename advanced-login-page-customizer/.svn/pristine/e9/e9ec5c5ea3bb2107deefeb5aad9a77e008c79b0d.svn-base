<?php
/**
 * Handle login ui frontend.
 */
namespace Advanced_Login_Page_Customizer;

defined( 'ABSPATH' ) || exit;

class Utils {
	public static $handle = 'alpc-utils';

    public static function init() {
        add_action( 'init', array( __CLASS__, 'register_assets' ) );
    }

    public static function register_assets() {
        $asset_file_path = ADVANCED_LOGIN_PAGE_CUSTOMIZER_BASE_DIR . 'build/non-blocks/utils/index.asset.php';

        if ( file_exists( $asset_file_path ) ) {
            $asset_data = include_once $asset_file_path;
            $dependencies = $asset_data['dependencies'];
            $version  = $asset_data['version'];

            $src = ADVANCED_LOGIN_PAGE_CUSTOMIZER_BASE_URL . 'build/non-blocks/utils/index.js';
            wp_register_script( self::$handle, $src, $dependencies, $version, true );

            $src = ADVANCED_LOGIN_PAGE_CUSTOMIZER_BASE_URL . 'build/non-blocks/utils/index.css';
            wp_register_style( self::$handle, $src, array(), $version );
        }
    }
}

Utils::init();
