<?php

/**
 * A class definition that includes attributes and functions used across both the
 * public-facing side of the site and the admin area.
 *
 * @link       https://codealtdel.com/
 * @since      1.0.0
 *
 * @package    Age_Okay
 * @subpackage Age_Okay/includes
 */

/**
 * Conaints all the data processing used by both the admin and public areas.
 *
 * @since      1.0.0
 * @package    Age_Okay
 * @subpackage Age_Okay/includes
 * @author     Code Alt Del <info@codealtdel.com>
 */
class Age_Okay_Shared {
	
	/**
	 * Tracks whether viewing preview in Editor admin page
	 *
	 * @since    1.0.0
	 * @access   public
	 * @var      bool    $debug    True if viewing preview, false if live
	 */
	public $debug;
	
	/**
	 * Array of values for style type attributes for verification screen
	 *
	 * @since    1.0.0
	 * @access   public
	 * @var      array    $options    Array of data for building verification screen
	 */
	public $options;
	
	// array of values for all text content, can be overwritten by translated text content
	/**
	 * Array of values for text (language) attributes for verification screen
	 *
	 * @since    1.0.0
	 * @access   public
	 * @var      array    $lang    Array of data for building verification screen text
	 */
	public $lang;

	/**
	 * Define the core functionality of the plugin.
	 *
	 * @since    1.0.0
	 */
	public function __construct() {
		
		$this->debug = ( ! empty( $_REQUEST['age_okay_debug'] ) && ltrim( $_REQUEST['age_okay_debug'], '#' ) == 'age_okay_debug' ? true : false );
		
		// create empty arrays for default values for array_merge() later
		$this->options = array();
		$this->lang = array();

	}

	/**
	 * Default values for options
	 *
	 * @since    1.0.0
	 */
	public function load_options_default() {
		
		$this->options = array(
			'type'             => 'input',
			'load_type'        => 'cache',
			'back_type'        => 'color',
			'exit'             => 'true',
			'text_color'       => '#fff',
			'error_color'      => '#ff4646',
			'button_style'     => 'square',
			'no_type'          => 'back',
			'cookie_time'      => 0,
			'cookie_usertime'  => 0,
			'cookie_type'      => 'days',
			'overlay_color'    => '#000',
			'overlay_opacity'  => '0.7',
			'border_width'     => '0',
			'border_color'     => '',
			'inner_color'      => '',
			'max_width'        => 600,
			'button_tcolor'    => '#fff',
			'button_color'     => '#008CBA',
			'hbutton_tcolor'   => '#fff',
			'hbutton_color'    => '#0b7192',
			'ebutton_tcolor'   => '#fff',
			'ebutton_color'    => '#008CBA',
			'ehbutton_tcolor'  => '#fff',
			'ehbutton_color'   => '#0b7192',
			'logo'             => '',
			'gradient_color_f' => '#000',
			'gradient_color_s' => '#dd3333',
			'gradient_color_m' => '#dd9933',
			'gradient_color_e' => '#1e73be',
			'gradient_type'    => 'to right',
			'gradient_opacity' => '0.7',
			'gradient'         => 'linear-gradient( to right, #dd3333, #dd9933, #1e73be )',
			'ebutton_style'    => 'false',
			'image_url'        => '',
		);
		
	}
	
	/**
	 * Overwrite default values with preview values for options array
	 *
	 * @since    1.0.0
	 */
	public function load_options_debug() {
		
		$this->load_options_default();
		$this->options = array_merge( $this->options, get_option( 'age_okay_preview', array() ) );
		
	}
	
	/**
	 * Overwrite default values with live values for options array
	 *
	 * @since    1.0.0
	 */
	public function load_options_live() {
		
		$this->load_options_default();
		$this->options = array_merge( $this->options, get_option( 'age_okay', array() ) );
		
	}
	
	/**
	 * Default values for language/text content in lang array
	 *
	 * @since    1.0.0
	 */
	public function load_lang_default() {
		
		$this->lang = array(
			'title'               => __( 'Age Restricted Content', 'age-okay' ),
			'desc'                => __( 'Please confirm you are old enough to view this website.', 'age-okay' ),
			'endtext'             => '',
			'age_diff'            => 18,
			'check_text'          => __( 'I confirm', 'age-okay' ),
			'check_error'         => __( 'Please accept by clicking the checkbox', 'age-okay' ),
			'date_order'          => 'dmy',
			'placeholder_d'       => 'dd',
			'placeholder_m'       => 'mm',
			'placeholder_y'       => 'yyyy',
			'input_error_invalid' => __( 'You have not entered a valid date', 'age-okay' ),
			'input_error_under'   => __( 'You are not old enough to view the content of this website', 'age-okay' ),
			'ok_button'           => __( 'Enter', 'age-okay' ),
			'no_button'           => __( 'Exit', 'age-okay' ),
			'no_url'              => '',
			'no_text'             => __( 'Sorry, you cannot enter this site', 'age-okay' ),
		);
		
	}
	
	/**
	 * Overwrite default values with preview values for lang array
	 *
	 * @since    1.0.0
	 */
	public function load_lang_debug() {
		
		$this->load_lang_default();
		$this->lang = array_merge( $this->lang, get_option( 'age_okay_preview_lang', array() ) );
		
	}
	
	/**
	 * Overwrite live values with preview values for lang array
	 *
	 * @since    1.0.0
	 * @param    string/bool   $translate   false if loading default language, locale string if loading translation
	 */
	public function load_lang_live( $translate = false ) {
		
		$this->load_lang_default();
		// load base language content
		$this->lang = array_merge( $this->lang, get_option( 'age_okay_lang', array() ) );
		
	}

}
