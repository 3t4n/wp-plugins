<?php

/**
 * The admin-specific functionality of the plugin.
 *
 * @link       https://wpcodecrafter.com/
 * @since      1.0.0
 *
 * @package    Sticky_Social_Media_Icons
 * @subpackage Sticky_Social_Media_Icons/admin
 */

/**
 * The admin-specific functionality of the plugin.
 *
 * Defines the plugin name, version, and two examples hooks for how to
 * enqueue the admin-specific stylesheet and JavaScript.
 *
 * @package    Sticky_Social_Media_Icons
 * @subpackage Sticky_Social_Media_Icons/admin
 * @author     Hardik Chavada <hardikb.chavada@gmail.com>
 */
class Sticky_Social_Media_Icons_Admin {

	/**
	 * The ID of this plugin.
	 *
	 * @since    1.0.0
	 * @access   private
	 * @var      string    $plugin_name    The ID of this plugin.
	 */
	private $plugin_name;

	/**
	 * The version of this plugin.
	 *
	 * @since    1.0.0
	 * @access   private
	 * @var      string    $version    The current version of this plugin.
	 */
	private $version;

	/**
	 * Initialize the class and set its properties.
	 *
	 * @since    1.0.0
	 * @param      string    $plugin_name       The name of this plugin.
	 * @param      string    $version    The version of this plugin.
	 */
	public function __construct( $plugin_name, $version ) {

		$this->plugin_name = $plugin_name;
		$this->version = $version;

	}

	/**
	 * Register the stylesheets for the admin area.
	 *
	 * @since    1.0.0
	 */
	public function enqueue_styles() {

		/**
		 * This function is provided for demonstration purposes only.
		 *
		 * An instance of this class should be passed to the run() function
		 * defined in Sticky_Social_Media_Icons_Loader as all of the hooks are defined
		 * in that particular class.
		 *
		 * The Sticky_Social_Media_Icons_Loader will then create the relationship
		 * between the defined hooks and the functions defined in this
		 * class.
		 */
		//include css file for admin pages
		wp_enqueue_style( $this->plugin_name, plugin_dir_url( __FILE__ ) . 'css/sticky-social-media-icons-admin.css', array(), $this->version, 'all' );
		
		

	}

	/**
	 * Register the JavaScript for the admin area.
	 *
	 * @since    1.0.0
	 */
	public function enqueue_scripts() {

		/**
		 * This function is provided for demonstration purposes only.
		 *
		 * An instance of this class should be passed to the run() function
		 * defined in Sticky_Social_Media_Icons_Loader as all of the hooks are defined
		 * in that particular class.
		 *
		 * The Sticky_Social_Media_Icons_Loader will then create the relationship
		 * between the defined hooks and the functions defined in this
		 * class.
		 */
		// include js file
		wp_enqueue_script( $this->plugin_name, plugin_dir_url( __FILE__ ) . 'js/sticky-social-media-icons-admin.js', array( 'jquery' ), $this->version, false );

		// loaclize ajax file
		wp_localize_script($this->plugin_name, "socialmediaajaxurl", array(
			"ajaxurl" =>admin_url("admin-ajax.php")
		));
	}

	//add menu page
	public function add_sticky_sm_icon_menu(){
		add_menu_page(
			"Sticky Icons", //Page title
			"Sticky Icons",// Menu title
			"manage_options", //Admin Level
			"sticky-icons", //Menu Slug
			array($this,"add_sticky_icons_cb_function"), //Callback function
			"dashicons-share", //icon link
			10);
	}
	//add_action should not be fired

	//calling of a function
	public function add_sticky_icons_cb_function(){
		include_once plugin_dir_path(__FILE__)."partials/insert-links.php";
	}


	//this function will handle all ajax requests
	public function ajax_request_handle(){
		
		if ( isset($_REQUEST['param']) && $_REQUEST['param'] == 'add_links' ) {
			// Check if nonce is set and valid
			if ( isset($_POST['nonce']) && wp_verify_nonce($_POST['nonce'], 'sticky_sm_icons_nonce') ) {
				global $wpdb;
				$table_name = $wpdb->prefix . 'sticky_sm_icons_tbl';
				
				// Sanitize and validate input data
				$position = isset($_POST['position']) ? sanitize_text_field($_POST['position']) : '';
				$facebook_link = isset($_POST['facebook']) ? esc_url($_POST['facebook']) : '';
				$twitter_link = isset($_POST['twitter']) ? esc_url($_POST['twitter']) : '';
				$youtube_link = isset($_POST['youtube']) ? esc_url($_POST['youtube']) : '';
				$instagram_link = isset($_POST['instagram']) ? esc_url($_POST['instagram']) : '';
				$quora_link = isset($_POST['quora']) ? esc_url($_POST['quora']) : '';
				$tumblr_link = isset($_POST['tumblr']) ? esc_url($_POST['tumblr']) : '';
				$linkedin_link = isset($_POST['linkedin']) ? esc_url($_POST['linkedin']) : '';
				$pinterest_link = isset($_POST['pinterest']) ? esc_url($_POST['pinterest']) : '';
				$telegram_link = isset($_POST['telegram']) ? esc_url($_POST['telegram']) : '';
				
				// Update database with sanitized data
				$wpdb->update(
					$table_name,
					array(
						'position' => $position,	
						'facebook' => $facebook_link,
						'youtube' => $youtube_link,
						'twitter' => $twitter_link,
						'instagram' => $instagram_link,
						'quora' => $quora_link,
						'tumblr' => $tumblr_link,
						'linkedin' => $linkedin_link,
						'pinterest' => $pinterest_link,
						'telegram' => $telegram_link
					),
					array(
						'id' => 1
					)
				);
				
				// Send success response
				$success_msg = array('status' => 1, 'message' => 'Links updated Successfully');
				echo json_encode($success_msg);
				wp_die();
			} else {
				// Nonce verification failed or nonce is not set
				$error_msg = array('status' => 0, 'message' => 'Nonce verification failed!');
				echo json_encode($error_msg);
				wp_die();
			}
		}
		
	}


	//function to display icons on frontpage
	public function display_sticky_socialmedia_icons() {
		
		wp_enqueue_style( 'sticky-icons-display.css', plugin_dir_url( __FILE__ ) . '../assets/sticky-icons-display.css', array(), $this->version, 'all' );
		include_once plugin_dir_path(__FILE__)."../public/partials/social-icons.php";
		
	}

}
