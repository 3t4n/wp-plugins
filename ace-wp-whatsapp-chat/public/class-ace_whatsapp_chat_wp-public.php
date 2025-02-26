<?php

/**
 * The public-facing functionality of the plugin.
 *
 * @link       http://acewebx.com/
 * @since      1.0.0
 *
 * @package    Ace_whatsapp_chat_wp
 * @subpackage Ace_whatsapp_chat_wp/public
 */

/**
 * The public-facing functionality of the plugin.
 *
 * Defines the plugin name, version, and two examples hooks for how to
 * enqueue the public-facing stylesheet and JavaScript.
 *
 * @package    Ace_whatsapp_chat_wp
 * @subpackage Ace_whatsapp_chat_wp/public
 * @author     AceWebx <webbninja01@gmail.com>
 */
class Ace_whatsapp_chat_wp_Public {

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
	 * @param      string    $plugin_name       The name of the plugin.
	 * @param      string    $version    The version of this plugin.
	 */
	public function __construct( $plugin_name, $version ) {

		$this->plugin_name = $plugin_name;
		$this->version = $version;

	}

	/**
	 * Register the stylesheets for the public-facing side of the site.
	 *
	 * @since    1.0.0
	 */
	public function enqueue_styles() {

		/**
		 * This function is provided for demonstration purposes only.
		 *
		 * An instance of this class should be passed to the run() function
		 * defined in Ace_whatsapp_chat_wp_Loader as all of the hooks are defined
		 * in that particular class.
		 *
		 * The Ace_whatsapp_chat_wp_Loader will then create the relationship
		 * between the defined hooks and the functions defined in this
		 * class.
		 */

		wp_enqueue_style( $this->plugin_name, plugin_dir_url( __FILE__ ) . 'css/ace_whatsapp_chat_wp-public.css', array(), $this->version, 'all' );
		wp_enqueue_style( $this->plugin_name.'fontawesomes-cdn', 'https://use.fontawesome.com/releases/v5.7.2/css/all.css' );

	}

	/**
	 * Register the JavaScript for the public-facing side of the site.
	 *
	 * @since    1.0.0
	 */
	public function enqueue_scripts() {

		/**
		 * This function is provided for demonstration purposes only.
		 *
		 * An instance of this class should be passed to the run() function
		 * defined in Ace_whatsapp_chat_wp_Loader as all of the hooks are defined
		 * in that particular class.
		 *
		 * The Ace_whatsapp_chat_wp_Loader will then create the relationship
		 * between the defined hooks and the functions defined in this
		 * class.
		 */

		wp_enqueue_script( $this->plugin_name, plugin_dir_url( __FILE__ ) . 'js/ace_whatsapp_chat_wp-public.js', array( 'jquery' ), $this->version, false );

	}

	public function ace_whatsapp_chat_btn() {
	$get_setting_value = get_option( 'ace-whatsapp-setting-field' );
		if( !empty( $get_setting_value['ace_whatsapp_no'] )):
			if( $get_setting_value['ace_whatsapp_hiden_btn'] == 0 ):
				if ( $get_setting_value['ace_wp_display_home'] == 1):
					if( is_front_page() ):
						require_once( __DIR__ ).'/partials/ace_whatsapp_chat_wp-public-display.php';
					endif;
				else:
						require_once( __DIR__ ).'/partials/ace_whatsapp_chat_wp-public-display.php';
				endif;
			endif;
		endif;
	}

	public function ace_public_page_load(){
		function shortcode_single_page(){
			require_once( __DIR__ ).'/partials/ace_whatsapp_chat_wp-public-display.php';
		}
		add_shortcode('whats-app-chat-btn-code', 'shortcode_single_page');

		function shortcode_group_setting(){
			$get_setting_group = get_option( 'ace_WA_group_info' );
			if( !empty( $get_setting_group['whatsapp_groupId'] ) ):
				if( $get_setting_group['wp_hidden_button'] == 0 ):
					require_once( __DIR__ ).'/partials/ace_whatsapp_gfront.php';
				endif;
			endif;
		}
		add_shortcode('ace-whatsapp-chat-group', 'shortcode_group_setting');
	}


}



?>