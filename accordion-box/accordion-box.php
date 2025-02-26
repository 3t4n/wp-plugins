<?php
/**
 * Plugin Name: Accordion & FAQs for WordPress
 * Plugin URI: https://wordpress.org/plugins/accordion-box/
 * Description: Thanks for visit our plugin. Responsive and Touch-friendly <strong>Searchable Accordion</strong> builder plugin for WordPress. If you want to add more info with one box then it is solve your problem with this plugin.You can create limitless accordion. It also responsive accordion built in bootstrap.
 * Version: 2.7
 * Author: Codelizar
 * Author URI: https://codelizar.com
 * Text Domain: CDLZR_PLUG_ACORD_DOM
 * Domain Path: /languages
 */

defined( 'ABSPATH' ) or die();

if ( ! defined( 'CDLZR_ACORD_URL' ) ) {
	define( "CDLZR_ACORD_URL", plugin_dir_url( __FILE__ ) );
}

if ( ! defined( 'CDLZR_ACORD_PLUGIN_DIR_PATH' ) ) {
	define( 'CDLZR_ACORD_PLUGIN_DIR_PATH', plugin_dir_path( __FILE__ ) );
}

if ( ! defined( 'CDLZR_PLUG_ACORD_DOM' ) ) {
	define( 'CDLZR_PLUG_ACORD_DOM', 'CDLZR_PLUG_ACORD_DOM' );
}

if ( ! defined( 'CDLZR_ACCORD_FILE' ) ) {
	define( 'CDLZR_ACCORD_FILE', __FILE__ );
}


if ( ! class_exists( 'CDLZR_ACORD_CLS' ) ) {
	final class CDLZR_ACORD_CLS
	{
		private static $instance = null;

		private function __construct()
		{
			$this->initialize_hooks();	
			add_action( 'admin_notices', array('CDLZR_ACORD_CLS','cdlzraccbox_display_admin_notice' ));		
			add_action( 'admin_init', array('CDLZR_ACORD_CLS','cdlzraccbox_spare'), 5 );		
		}

		private function initialize_hooks() {
			if ( is_admin() ) {
				require_once( 'admin/class-accbox-admin.php' );
				new CDLZR_ACC_BOX;
			}
			require_once( 'public/class-accbox-public.php' );
			new CDLZR_ACC_BOX_PUBLIC;
		}

		public static function get_instance() {
			if ( is_null( self::$instance ) ) {
				self::$instance = new self();
			}
			return self::$instance;
		}

		public static function cdlzraccbox_display_admin_notice() {
			$dont_disturb = esc_url( get_admin_url() . '?cdlzraccbox_spare_me=1' );
			$plugin_info = get_plugin_data( __FILE__ , true, true );       
			$reviewurl = esc_url( 'https://wordpress.org/support/plugin/accordion-box/reviews/' );
			if( !get_option('cdlzraccbox_spare') ){
				printf(__('<div class="notice notice-success" style="padding: 10px;">You have been using <b> %s </b> for a while. We hope you liked it! Please give us a quick rating, it works as a boost for us to keep working on the plugin!<br><div class="void-review-btn"><a href="%s" style="margin-top: 10px; display: inline-block; margin-right: 5px;" class="button button-primary" target=
				"_blank">Rate Now!</a><a href="%s" style="margin-top: 10px; display: inline-block; margin-right: 5px;" class="button button-secondary">Already Done !</a></div></div>', $plugin_info['TextDomain']), $plugin_info['Name'], $reviewurl, $dont_disturb );
			}
		}

		// remove the notice for the user if review already done or if the user does not want to
		public static function cdlzraccbox_spare(){    
		    if( isset( $_GET['cdlzraccbox_spare_me'] ) && !empty( $_GET['cdlzraccbox_spare_me'] ) ){
		        $cdlzraccbox_spare_me = $_GET['cdlzraccbox_spare_me'];
		        if( $cdlzraccbox_spare_me == 1 ){
		            add_option( 'cdlzraccbox_spare' , TRUE );
		        }
		    }
		}		
	}
}
CDLZR_ACORD_CLS::get_instance();