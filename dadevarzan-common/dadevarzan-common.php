<?php
/**
 * Plugin Name: Dadevarzan WordPress common
 * Plugin URI: https://wordpress.org/plugins/dadevarzan-common
 * GitHub Plugin URI: https://github.com/dadevarzan/dadevarzan-common
 * Description: Dadevarzan co. common functionality uses in WordPress.
 * Version: 2.2.2
 * Author: Dadevarzan Team
 * Author URI: http://www.dadevarzan.com
 * Text Domain: dadevarzan-wp-common
 * Domain Path: /languages
 */

if ( !class_exists( 'dadevarzanWpCommon' ) ) {

    define( 'DADEVARZAN_COMMON_DIR', plugin_dir_path( __FILE__ ) );
    define( 'DADEVARZAN_COMMON_URL', plugins_url( '/', __FILE__ ) );

    require_once 'includes/class-date-shortcode.php';
    require_once 'includes/class-dadevarzan.php';
    require_once 'includes/class-capability-management.php';
    require_once 'includes/class-acf.php';
    require_once 'includes/class-user.php';
    require_once 'includes/class-gravity.php';
    require_once 'includes/class-font.php';
    require_once 'includes/class-dadevarzan-iconfonts.php';
    require_once 'includes/class-fl-mega-menu.php';
    require_once 'includes/class-WooCommerce.php';

    class dadevarzanWpCommon
    {

        public function initialize() {

            $DV_Dadevarzan = new DV_Dadevarzan();
            $DV_Dadevarzan->initialize();

            $DV_AppearancePermissions = new DV_CapabilityManagement();
            $DV_AppearancePermissions->initialize();

            $DV_User = new DV_User();
            $DV_User->initialize();

            $DV_dateShortCode = new DV_dateShortCode();
            $DV_dateShortCode->initialize();


            if(class_exists('acf')){
                $DV_acf = new DV_acf();
                $DV_acf->initialize();
            }

            if(class_exists('WooCommerce')){
                $DV_WooCommerce = new DV_WooCommerce();
                $DV_WooCommerce->initialize();
            }

            if(class_exists('GFCommon')){
                $DV_Gravity = new DV_Gravity();
                $DV_Gravity ->initialize();
            }


            DV_Font::initialize();

            $DV_FLMegaMenu = new DV_FLMegaMenu();
            $DV_FLMegaMenu->initialize();
			
			$DV_IconFonts = new DV_IconFonts();
			$DV_IconFonts->init();

            load_plugin_textdomain( 'dadevarzan-wp-common', FALSE, basename( dirname( __FILE__ ) ) . '/languages'  );
        }
		
    }

    function dv_initialize_plugin() {
        $dadevarzanWpCommon = new dadevarzanWpCommon();
        $dadevarzanWpCommon->initialize();
    }

    add_action( 'plugins_loaded', 'dv_initialize_plugin' );
}
