<?php
/**
 * Advent Calendar.
 *
 * @package   Advent_Calendar_Admin
 * @author    Paul Vincent Beigang <pbeigang@gmail.com>
 * @license   GPL-2.0+
 * @link      http://paul-beigang.de
 * @copyright 2013 Paul Vincent Beigang
 */

/**
 * Plugin class. This class should ideally be used to work with the
 * administrative side of the WordPress site.
 *
 * If you're interested in introducing public-facing
 * functionality, then refer to `class-plugin-name.php`
 *
 * @package Advent_Calendar_Admin
 * @author  Paul Vincent Beigang <pbeigang@gmail.com>
 */
class Advent_Calendar_Admin {

	/**
	 * Instance of this class.
	 *
	 * @since    1.0.0
	 *
	 * @var      object
	 */
	protected static $instance = null;

	/**
	 * Slug of the plugin screen.
	 *
	 * @since    1.0.0
	 *
	 * @var      string
	 */
	protected $plugin_screen_hook_suffix = null;

	/**
	 * Initialize the plugin
	 *
	 * @since     1.0.0
	 */
	private function __construct() {

		/*
		 * Call $plugin_slug from public plugin class.
		 *
		 */
		$plugin            = Advent_Calendar::get_instance();
		$this->plugin_slug = $plugin->get_plugin_slug();

		/*
		 * Define custom functionality.
		 *
		 * Read more about actions and filters:
		 * http://codex.wordpress.org/Plugin_API#Hooks.2C_Actions_and_Filters
		 */
		add_action( 'admin_menu', array( $this, 'acal_menu_add' ) );
		add_action( 'admin_menu', array( $this, 'acal_menu_remove_add_new' ) );

	}

	/**
	 * Return an instance of this class.
	 *
	 * @since     1.0.0
	 *
	 * @return    object    A single instance of this class.
	 */
	public static function get_instance() {

		// If the single instance hasn't been set, set it now.
		if ( null == self::$instance ) {
			self::$instance = new self;
		}

		return self::$instance;
	}

	/**
	 * Add Advent calendar to admin menu
	 *
	 * @since 1.0.0
	 */
	public function acal_menu_add() {

		add_submenu_page(
			'edit.php?post_type=acal_entry',
			__( 'Advent calendar Settings', $this->plugin_slug ),
			__( 'Bulk creation', $this->plugin_slug ),
			'manage_options',
			'acal-creation-tool',
			array( $this, 'acal_options_page' )
		);

	}

	/**
	 * Add bulk creation tool for Advent calendar entries
	 *
	 * @since 1.0.0
	 */
	public function acal_options_page() {

		// Output header HTML
		include_once( 'views/bulk-creation-header.php' );

		if ( isset( $_REQUEST['action'] ) && $_REQUEST['action'] == 'create' ) {

			// Read calendar year from input and make sure the result is an integer (at least zero via intval())
			$calendar_year = intval( $_REQUEST['year'] );

			// If $calendar_year is not 4 digits rewrite it to actual year
			if ( 4 != strlen( $calendar_year ) ) {
				$calendar_year = date( 'Y' );
			}

			// Create 24 calendar entries for the chosen calendar year
			for ( $day_number = 1; $day_number < 25; $day_number ++ ) {

				// Some date & time conversion to meet the expected "post_date" format
				$post_date     = $calendar_year . '-12-' . $day_number . ' 00:00:00';
				$cvt_post_date = strtotime( $post_date );
				$new_post_date = date( 'Y-m-d H:i:s', $cvt_post_date );

				wp_insert_post(
					array(
						'post_type'    => 'acal_entry',
						'post_title'   => $day_number . '. ' . __( 'December', $this->plugin_slug ) . ' ' . $calendar_year,
						'post_content' => '',
						'post_status'  => 'future',
						'post_date'    => $new_post_date,
						#'post_date' => date('Y').'-11-18 00:00:00'
					)
				);
			}

			// Output creation message with link to result
			include_once( 'views/bulk-creation-message.php' );

		} else {

			// Output bulk creation form
			include_once( 'views/bulk-creation-form.php' );

		}

		// Output footer HTML
		include_once( 'views/bulk-creation-footer.php' );

	}

	// Hide "Add new" submenu entry for Advent calendar post type
	public function acal_menu_remove_add_new() {

		global $submenu;
		unset( $submenu['edit.php?post_type=acal_entry'][10] );

	}

}
