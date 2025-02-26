<?php

if ( ! class_exists( 'RCB_Settings' ) ) {
	/**
	 * Registers, displays, validates and saves settings for the Rescue Children Banner plugin
	 */
	class RCB_Settings {
		protected $new_window, $banner_position, $bottom_for_mobile, $image_location, $image_link_url;
		const SETTINGS_PAGE = 'rcb_settings';

		/**
		 * Constructor
		 */
		public function __construct() {
			add_action( 'init',       array( $this, 'init' ) );
			add_action( 'admin_menu', array( $this, 'add_settings_page' ) );
			add_action( 'admin_init', array( $this, 'add_settings' ) );
			
			add_filter( 'plugin_action_links_rescue-children-banner/bootstrap.php', array( $this, 'add_settings_link' ) );
		}

		/**
		 * Returns an associative array with all of the settings indexed by their name
		 * This can be used by other classes to read the settings
		 * 
		 * @return array
		 */
		public function get_settings() {
			$settings = array();
			
			foreach ( array( 'new_window', 'banner_position', 'bottom_for_mobile', 'image_location', 'image_link_url' ) as $setting ) {
				$settings[ $setting ] = $this->$setting;
			}
			
			return $settings;
		}

		/*
		 * Assign variables and other initialization
		 */
		public function init() {
			$this->new_window        = get_option( 'rcb_new-window', '' );
			$this->banner_position   = get_option( 'rcb_banner-position', 'top-right' );
			$this->bottom_for_mobile = get_option( 'rcb_bottom-for-mobile', 'on' );
			$this->image_location    = apply_filters( 'rcb_image_location', plugins_url( 'rescue-children-banner/images/rescue-children-' . $this->banner_position . '.png' ) );
			$this->image_link_url    = apply_filters( 'rcb_image_link_url', 'http://destinyrescue.org' );
		}

		/**
		 * Adds a page to Settings menu
		 */
		public function add_settings_page() {
			add_options_page(
				__( 'Rescue Children Banner Settings', 'rescue-children-banner' ),
				__( 'Rescue Children Banner',          'rescue-children-banner' ),
				'manage_options',
				self::SETTINGS_PAGE,
				array( $this, 'markup_settings_page' )
			);
		}

		/**
		 * Creates the markup for the settings page
		 */
		public function markup_settings_page() {
			if ( current_user_can( 'manage_options' ) ) {
				require_once( dirname( dirname( __FILE__ ) ) . '/views/settings.php' );
			} else {
				wp_die( __( 'Access denied.', 'rescue-children-banner' ) );
			}
		}

		/**
		 * Adds a 'Settings' link to the Plugins page
		 *
		 * @param array $links The links currently mapped to the plugin
		 * @return array
		 */
		public function add_settings_link( $links ) {
			array_unshift( $links, sprintf( '<a href="http://wordpress.org/extend/plugins/rescue-children-banner/faq/">%s</a>', __( 'Help', 'rescue-children-banner' ) ) );
			array_unshift( $links, sprintf( '<a href="options-general.php?page=%s.php">%s</a>', self::SETTINGS_PAGE , __( 'Settings', 'rescue-children-banner' ) ) );

			return $links;
		}

		/**
		 * Adds our custom settings to the admin Settings pages
		 */
		public function add_settings() {
			add_settings_section( self::SETTINGS_PAGE, '', '__return_empty_string', self::SETTINGS_PAGE );

			add_settings_field(
				'rcb_banner-position',
				__( 'Banner Position', 'rescue-children-banner' ),
				array( $this, 'markup_setting_fields' ),
				self::SETTINGS_PAGE,
				self::SETTINGS_PAGE,
				array( 'label_for' => 'rcb_banner-position' )
			);
			
			add_settings_field(
				'rcb_new-window',
				__( 'Open Link in New Window', 'rescue-children-banner' ),
				array( $this, 'markup_setting_fields' ),
				self::SETTINGS_PAGE,
				self::SETTINGS_PAGE,
				array( 'label_for' => 'rcb_new-window' )
			);
			
			add_settings_field(
				'rcb_bottom-for-mobile',
				__( 'Move to Bottom on Small Screens', 'rescue-children-banner' ),
				array( $this, 'markup_setting_fields' ),
				self::SETTINGS_PAGE,
				self::SETTINGS_PAGE,
				array( 'label_for' => 'rcb_bottom-for-mobile' ) 
			);

			register_setting( self::SETTINGS_PAGE, 'rcb_banner-position' );
			register_setting( self::SETTINGS_PAGE, 'rcb_new-window' );
			register_setting( self::SETTINGS_PAGE, 'rcb_bottom-for-mobile' );
		}

		/**
		 * Adds the bottom-for-mobile field to the Settings page
		 */
		public function markup_setting_fields( $field ) {
			require( dirname( dirname( __FILE__ ) ) . '/views/setting-fields.php' );
		}
		
	} // end RCB_Settings
}
