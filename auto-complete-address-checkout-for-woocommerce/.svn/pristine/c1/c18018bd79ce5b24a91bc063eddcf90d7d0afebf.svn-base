<?php
if ( ! defined( 'ABSPATH' ) ) exit;
/**
* This class is loaded on the back-end since its main job is
* to display the Admin to box.
*/
class GMACAW_Admin {
	
	public function __construct () {
		add_action('admin_enqueue_scripts', array($this,'GMACAW_enqueue_admin'));

		add_action('admin_menu', array($this,'GMACAW_admin_menu'));
		
	}
	public function GMACAW_enqueue_admin(){
		wp_enqueue_style('wp-components');
		 wp_register_script(
            'gmacaw-react-admin',
            GMACAW_PLUGINURL.'/build/admin/admin.js', // Adjust the path if necessary
	        ['wp-element','wp-dom-ready','wp-components'], // Ensure this depends on WordPress's React
	        '1.0',
	        true

	        );
	         


	        wp_localize_script('gmacaw-react-admin', 'gmacaw_wp_ajax', [
	            'nonce' => wp_create_nonce('wp_rest'), // Nonce for security in the REST API
	            'ajax_url' => admin_url('admin-ajax.php'),
	            'getsettings' => rest_url('gmacaw/v1/get-settings'),
	            'savedata' => rest_url('gmacaw/v1/save-settings'),
	            'site_url' => get_site_url()
	        ]);

			wp_enqueue_script('gmacaw-react-admin');

		    wp_enqueue_style(
		            'gmacaw-react-admin-style',
		            GMACAW_PLUGINURL.'/build/admin/admin.css',
		            array(),
		            1,
		        );
	}

	public function GMACAW_admin_menu(){
		add_menu_page(
	        'Auto Complete Woo',
	        'Auto Complete Woo',
	        'manage_options',
	        'auto-complete-woo',
	        array($this,'GMACAW_render_admin_page'),
	        'dashicons-admin-site',
	        100
	    );
	}

	public function GMACAW_render_admin_page(){
		 echo '<div id="gmacaw-admin-root"></div>';
	}
}
