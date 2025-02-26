<?php if ( ! defined( 'ABSPATH' ) ) { die; } // If this file is called directly, abort.

/**
 * The public specific Scripts Class of the plugin.
 *
 * @link       https://www.worldwebtechnology.com/
 * @since      1.0.0
 *
 * @package    Recently Purchased Products For Woo
 * @subpackage Recently Purchased Products For Woo/includes
 * @author     World Web Technology <biz@worldwebtechnology.com>
 */
if ( !class_exists( 'RPPW_Scripts' ) ) {
	
	class RPPW_Scripts {


		/**
	     * Initialize the class and set its properties.
	     *
	     * @since      1.0.0
	     * @package    Recently Purchased Products For Woo
	     * @subpackage Recently Purchased Products For Woo/includes
	     * @author     World Web Technology <biz@worldwebtechnology.com>
	     */
		public function __construct() {
		
		}


		/**
		 * Add Scripts for Frontend page
		 * 
		 * @since      1.0.2
		 * @package    Recently Purchased Products For Woo
	     * @subpackage Recently Purchased Products For Woo/includes
		 * @author     World Web Technology <biz@worldwebtechnology.com>
		 * 
		 */
		public function rppw_frontend_scripts() {
	
			//Style			
			wp_register_style( 'rppw-slick-style', RPPW_INC_URL . '/assets/css/slick.css', array(), RPPW_VERSION );
			wp_register_style( 'rppw-slick-theme-style', RPPW_INC_URL . '/assets/css/slick-theme.css', array(), RPPW_VERSION );
			wp_register_style( 'rppw-css', RPPW_INC_URL . '/assets/css/rppw-style.css', array(), RPPW_VERSION.time() );

			//script
			wp_register_script('rppw-slick-script', RPPW_INC_URL . '/assets/js/slick.min.js', array('jquery'), RPPW_VERSION, true);
			wp_register_script('rppw-public-script', RPPW_INC_URL . '/assets/js/rppw-public.js', array('jquery'), time(), true);
			wp_enqueue_script('rppw-public-script');
		}


		/**
		 * Add Scripts for admin page
		 * 
		 * @since      1.0.3
		 * @package    Recently Purchased Products For Woo
	     * @subpackage Recently Purchased Products For Woo/includes
		 * @author     World Web Technology <biz@worldwebtechnology.com>
		 * 
		 */
		public function rppw_admin_scripts() {

			global $pagenow;

			//script | added Script for admin page
			wp_register_script('rppw-admin-script', RPPW_INC_URL . '/assets/js/rppw-admin.js', array('jquery'), RPPW_VERSION.time(), true);

    		if( $pagenow === 'widgets.php' ) {
        		wp_enqueue_script('rppw-admin-script');
            }
		}

		
		/**
	     * Add Actions/Hooks
	     *
	     * @since      1.0.0
	     * @package    Recently Purchased Products For Woo
	     * @subpackage Recently Purchased Products For Woo/includes
	     * @author     World Web Technology <biz@worldwebtechnology.com>
	     */
		public function add_hooks() {
						
			add_action( 'wp_enqueue_scripts', array($this, 'rppw_frontend_scripts' ) );

			//script for the admin pages
			add_action( 'admin_enqueue_scripts', array($this, 'rppw_admin_scripts') );
		}
	}
}