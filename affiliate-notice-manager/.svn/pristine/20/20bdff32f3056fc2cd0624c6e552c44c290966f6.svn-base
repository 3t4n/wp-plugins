<?php

/**
 * The public-facing functionality of the plugin.
 *
 * @link       https://wppathfinder.com
 * @since      1.0.0
 *
 * @package    Affiliate_Notice_Manager
 * @subpackage Affiliate_Notice_Manager/public
 */

/**
 * The public-facing functionality of the plugin.
 *
 * Defines the plugin name, version, and two examples hooks for how to
 * enqueue the public-facing stylesheet and JavaScript.
 *
 * @package    Affiliate_Notice_Manager
 * @subpackage Affiliate_Notice_Manager/public
 * @author     Nira Rahman <dragwpofficial@gmail.com>
 */
class Affiliate_Notice_Manager_Public {

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
		 * defined in Affiliate_Notice_Manager_Loader as all of the hooks are defined
		 * in that particular class.
		 *
		 * The Affiliate_Notice_Manager_Loader will then create the relationship
		 * between the defined hooks and the functions defined in this
		 * class.
		 */

		wp_enqueue_style( $this->plugin_name, plugin_dir_url( __FILE__ ) . 'css/affiliate-notice-manager-public.css', array(), $this->version, 'all' );

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
		 * defined in Affiliate_Notice_Manager_Loader as all of the hooks are defined
		 * in that particular class.
		 *
		 * The Affiliate_Notice_Manager_Loader will then create the relationship
		 * between the defined hooks and the functions defined in this
		 * class.
		 */

		wp_enqueue_script( $this->plugin_name, plugin_dir_url( __FILE__ ) . 'js/affiliate-notice-manager-public.js', array( 'jquery' ), $this->version, false );

	}

	public function content_modification_fn($content){
			
		$bold = apply_filters('bold_tag', 'b');

		$affiliate_notice = get_option('affiliate_manager_options');

		$affiliate_notice_display = $affiliate_notice['affiliate_notice_manager_notice_display'];
		
		if ( is_single() && $affiliate_notice_display == 1 ) {
			$content .= sprintf('<div class="aff-disclosure"><%s>%s</%s> %s</div> ',$bold,$affiliate_notice['notice_manager_prefix'],$bold,$affiliate_notice['notice_manager_your_notice']);
		}

		return $content;

	}

}
