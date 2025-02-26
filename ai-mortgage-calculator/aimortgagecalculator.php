<?php
/*
Plugin Name: AI Mortgage Calculator
Plugin URI: https://aimortgagecalculator.com
Description: AI Mortgage Calculator offers a suite of mortgage calculators for your website.
License: GPLv2
License URI: https://www.gnu.org/licenses/gpl-2.0.html
Author: Choice Home Mortgage
Author URI: http://choicehm.com
Version: 1.0.1
*/

if ( ! defined( 'ABSPATH' ) ) die;
if ( ! class_exists( 'AI_Mortgage_Calculator' ) ) die;	

// Set the version
define( 'AIMC_VERSION', '1.0.1' );


class AI_Mortgage_Calculator {

	protected static $instance = null;
	protected $globals;

	protected static $plugin_name 			= 'AI Mortgage Calculator';
	protected static $plugin_slug 			= 'ai-mortgage-calculator';
	protected static $settings_options_key	= 'aimc_settings_options';


	public function __construct() {
		register_activation_hook( __FILE__, array( 'AI_Mortgage_Calculator', 'activate' ) );
		register_uninstall_hook( __FILE__, array( 'AI_Mortgage_Calculator', 'uninstall' ) );

		add_action( 'admin_menu', array( $this, 'admin_menu_link') );
		add_action( 'wp_enqueue_scripts', array( $this, 'enqueue_scripts'), 1000);
		add_filter( 'plugin_action_links', array( $this, 'plugin_page_links'), 10, 2);
	}


	/**
	 * Set the instance
	*/
	public static function instance() {
		static $globals;
		if ( self::$instance == null ) {
			self::$instance = new self;
			$globals = self::$instance->set_globals();
			self::$instance->load_includes();
		}
		return $globals;
	}


	/**
	 * Set Globals
	*/
	public function set_globals() {
		$globals = array (
			'plugin_name' 			=> self::$plugin_name,
			'plugin_slug' 			=> self::$plugin_slug,
			'settings_options_key'	=> self::$settings_options_key,
		);
		
		$this->globals = $globals;
		return $globals;
	}


	/**
	 * Admin Setting page and links
	*/
	public function admin_menu_link() {
		add_options_page( self::$plugin_name, self::$plugin_name, 'delete_posts', self::$plugin_slug, array( $this, 'options_page' ) );
	}

	public function options_page() {
		if( ! current_user_can('manage_options') )	{
			wp_die( __('You do not have sufficient permissions to access this page.', 'aimc') );
		}

		include_once( plugin_dir_path(__FILE__ ) . 'includes/options-page.php' );
	}

	public function plugin_page_links($links, $file) {
	    static $this_plugin;

	    if ( ! $this_plugin ) {
	        $this_plugin = plugin_basename( __FILE__ );
	    }

	    if ( $file == $this_plugin ) {
	    	$settings = '<a href="' . get_bloginfo('wpurl') . '/wp-admin/admin.php?page='. self::$plugin_slug .'">Settings</a>';
	        array_unshift( $links, $settings );
	    }

	    return $links;
	}


	/**
	 * Load necessary files
	*/
	public function load_includes() {
		include_once( plugin_dir_path(__FILE__) . 'includes/shortcode.php' );
		
		if ( is_admin() ) {
			include_once( plugin_dir_path(__FILE__) . 'includes/refinance_settings.php' );
		}
	}
	

	/**
	 * Enqueue CSS and JS
	*/
	public function enqueue_scripts( $hook ) {
        wp_enqueue_style( 'ai-mortgage-calculator', plugin_dir_url(__FILE__) . 'css/calculator.css' );
    	wp_enqueue_script( 'ai-mortgage-calculator', plugin_dir_url(__FILE__) . 'js/calculator.js' );
	}


	/**
	 * Activation Hook
	*/
	public static function activate() {
		$options = get_option( self::$settings_options_key );

		// Are our options saved in the DB? If not save them
		if( ! $options ) {
			add_option( self::$settings_options_key, [
			    'refinance' => [
			    	'title' => 'Extra Payment Mortgage Refinance Calculator',
			    	'description' => 'See if you should refinance your mortgage. Enter the details of your current home loan along with details of a new loan to estimate your savings and see if refinancing is right for you!',
			    	'current_loan_amount' => '300,000',
			    	'new_loan_amount' => '270,000',
			    	'current_interest_rate' => '6.0',
			    	'new_interest_rate' => '4.5',
			    	'current_loan_term' => '30',
			    	'new_loan_term' => '30',
			    	'extra_principal_payment' => '100'
			    ],
			]);
		}
	}


	/**
	 * Uninstall Hook
	*/
	public static function uninstall() {
		$options = get_option( self::$settings_options_key );
		delete_option( self::$settings_options_key );
	}
}

AI_Mortgage_Calculator::instance();