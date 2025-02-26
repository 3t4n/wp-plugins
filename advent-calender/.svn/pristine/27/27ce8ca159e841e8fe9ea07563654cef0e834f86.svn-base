<?php
/**
 * Plugin Name.
 *
 * @package   Advent_Calendar
 * @author    Paul Vincent Beigang <pbeigang@gmail.com>
 * @license   GPL-2.0+
 * @link      http://paul-beigang.de
 * @copyright 2013 Paul Vincent Beigang
 */

/**
 * Plugin class. This class should ideally be used to work with the
 * public-facing side of the WordPress site.
 *
 * If you're interested in introducing administrative or dashboard
 * functionality, then refer to `class-plugin-name-admin.php`
 *
 * @package Advent_Calendar
 * @author  Paul Vincent Beigang <pbeigang@gmail.com>
 */
class Advent_Calendar {

	/**
	 * Plugin version, used for cache-busting of style and script file references.
	 *
	 * @since   1.0.0
	 *
	 * @var     string
	 */
	const VERSION = '1.0.2';

	/**
	 * Unique identifier for your plugin.
	 *
	 *
	 * The variable name is used as the text domain when internationalizing strings
	 * of text. Its value should match the Text Domain file header in the main
	 * plugin file.
	 *
	 * @since    1.0.0
	 *
	 * @var      string
	 */
	protected $plugin_slug = 'advent-calendar';

	/**
	 * Instance of this class.
	 *
	 * @since    1.0.0
	 *
	 * @var      object
	 */
	protected static $instance = null;

	/**
	 * Initialize the plugin by setting localization and loading public scripts
	 * and styles.
	 *
	 * @since     1.0.0
	 */
	private function __construct() {

		// Load plugin text domain
		add_action( 'init', array( $this, 'load_plugin_textdomain' ) );

		// Activate plugin when new blog is added
		add_action( 'wpmu_new_blog', array( $this, 'activate_new_site' ) );

		// Load public-facing style sheet
		add_action( 'wp_enqueue_scripts', array( $this, 'enqueue_styles' ) );

		/* Define custom functionality.
		 * Refer To http://codex.wordpress.org/Plugin_API#Hooks.2C_Actions_and_Filters
		 */
		add_action( 'init', array( $this, 'acal_create_post_type' ) );
		add_filter( 'single_template', array( $this, 'acal_template_custom_post_type_single' ) );
		add_shortcode( 'advent-calendar', array( $this, 'acal_shortcode_register' ) );

		if ( function_exists( 'add_image_size' ) ) {
			add_image_size( $this->plugin_slug . '-preview-image', 92, 92, true );
			add_image_size( $this->plugin_slug . '-full-image', 440, 9999 );
		}

	}

	/**
	 * Return the plugin slug.
	 *
	 * @since    1.0.0
	 *
	 * @return    Plugin slug variable.
	 */
	public function get_plugin_slug() {
		return $this->plugin_slug;
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
	 * Fired when the plugin is activated.
	 *
	 * @since    1.0.0
	 *
	 * @param    boolean $network_wide       True if WPMU superadmin uses
	 *                                       "Network Activate" action, false if
	 *                                       WPMU is disabled or plugin is
	 *                                       activated on an individual blog.
	 */
	public static function activate( $network_wide ) {

		if ( function_exists( 'is_multisite' ) && is_multisite() ) {

			if ( $network_wide ) {

				// Get all blog ids
				$blog_ids = self::get_blog_ids();

				foreach ( $blog_ids as $blog_id ) {

					switch_to_blog( $blog_id );
					self::single_activate();
				}

				restore_current_blog();

			} else {
				self::single_activate();
			}

		} else {
			self::single_activate();
		}

	}

	/**
	 * Fired when the plugin is deactivated.
	 *
	 * @since    1.0.0
	 *
	 * @param    boolean $network_wide       True if WPMU superadmin uses
	 *                                       "Network Deactivate" action, false if
	 *                                       WPMU is disabled or plugin is
	 *                                       deactivated on an individual blog.
	 */
	public static function deactivate( $network_wide ) {

		if ( function_exists( 'is_multisite' ) && is_multisite() ) {

			if ( $network_wide ) {

				// Get all blog ids
				$blog_ids = self::get_blog_ids();

				foreach ( $blog_ids as $blog_id ) {

					switch_to_blog( $blog_id );
					self::single_deactivate();

				}

				restore_current_blog();

			} else {
				self::single_deactivate();
			}

		} else {
			self::single_deactivate();
		}

	}

	/**
	 * Fired when a new site is activated with a WPMU environment.
	 *
	 * @since    1.0.0
	 *
	 * @param    int $blog_id ID of the new blog.
	 */
	public function activate_new_site( $blog_id ) {

		if ( 1 !== did_action( 'wpmu_new_blog' ) ) {
			return;
		}

		switch_to_blog( $blog_id );
		self::single_activate();
		restore_current_blog();

	}

	/**
	 * Get all blog ids of blogs in the current network that are:
	 * - not archived
	 * - not spam
	 * - not deleted
	 *
	 * @since    1.0.0
	 *
	 * @return   array|false    The blog ids, false if no matches.
	 */
	private static function get_blog_ids() {

		global $wpdb;

		// get an array of blog ids
		$sql = "SELECT blog_id FROM $wpdb->blogs
			WHERE archived = '0' AND spam = '0'
			AND deleted = '0'";

		return $wpdb->get_col( $sql );

	}

	/**
	 * Fired for each blog when the plugin is activated.
	 *
	 * @since    1.0.0
	 */
	private static function single_activate() {
		// @TODO: Define activation functionality here
	}

	/**
	 * Fired for each blog when the plugin is deactivated.
	 *
	 * @since    1.0.0
	 */
	private static function single_deactivate() {
		// @TODO: Define deactivation functionality here
	}

	/**
	 * Load the plugin text domain for translation.
	 *
	 * @since    1.0.0
	 */
	public function load_plugin_textdomain() {

		$domain = $this->plugin_slug;
		$locale = apply_filters( 'plugin_locale', get_locale(), $domain );

		load_textdomain( $domain, trailingslashit( WP_LANG_DIR ) . $domain . '/' . $domain . '-' . $locale . '.mo' );

	}

	/**
	 * Register and enqueue public-facing style sheet.
	 *
	 * @since    1.0.0
	 */
	public function enqueue_styles() {
		wp_enqueue_style( $this->plugin_slug . '-plugin-styles', plugins_url( 'assets/css/advent-calendar.css', __FILE__ ), array(), self::VERSION );
	}

	/**
	 * Register advent calendar custom post type
	 *
	 * @since 1.0.0
	 */
	public function acal_create_post_type() {

		$custom_post_type_params =
			array(
				'labels' => array(
					'name'          => __( 'Advent calendar entries', $this->plugin_slug ),
					'singular_name' => __( 'Advent calendar entry', $this->plugin_slug )
				),
				'public'      => true,
				'has_archive' => false,
				// if the slug changes, re-save wp-admin/options-permalink.php to avoid 404 after change
				'rewrite'     => array(
					'slug' => 'advent-calendar'
				),
				// Edit to enable more
				'supports'    => array(
					'title',
					'thumbnail'
				)
			);

		register_post_type(
			'acal_entry',
			apply_filters( 'pvb_acal_cpt_params', $custom_post_type_params )
		);
	}

	/**
	 * Register Advent calendar custom post type single template
	 */
	public function acal_template_custom_post_type_single( $single_template ) {

		global $post;

		if ( $post->post_type == 'acal_entry' ) {

			// Check for custom single template in theme folder
			if ( $custom_theme_file = locate_template( array( 'single-advent-calendar-entry-custom.php' ) ) ) {
				$single_template = $custom_theme_file;
			}
			// Load plugin default template
			else {
				$single_template = dirname( __FILE__ ) . '/views/single-advent-calendar-entry.php';
			}
		}

		return $single_template;

	}

	/**
	 * Add Advent calendar shortcode
	 * Usage in posts/pages: [advent-calendar year="2013"]
	 *
	 * @since 1.0.0
	 */
	public function acal_shortcode_register( $atts ) {

		// The shortcode supports the attribute "year"
		extract( shortcode_atts(
			array(
				// The actual year is the default year if the attribute is not used with the shortcode
				'year' => date( 'Y' )
			), $atts ) );

		// Arguments to get the Advent calendar entries for the given year from the database
		$args = array(
			'post_type'      => 'acal_entry',
			'posts_per_page' => 24,
			'post_status'    => array(
				'future',
				'publish' ),
			'order'          => 'ASC',
			'orderby'        => 'date',
			'date_query'     => array(
				array(
					'year' => $year
				),
			)
		);

		// Build the return string from database
		$return_string = '';
		$the_query     = new WP_Query( $args );
		while ( $the_query->have_posts() ) : $the_query->the_post();

			// This Advent calendar entries are not published yet
			if ( 'future' == get_post_status() ) {
				ob_start();
				include( 'views/shortcode-entry-future.php' );
				$return_string .= ob_get_clean();
			}

			// This Advent calendar entries are published already
			if ( 'publish' == get_post_status() ) {
				ob_start();
				include( 'views/shortcode-entry-published.php' );
				$return_string .= ob_get_clean();
			}
		endwhile;
		wp_reset_postdata();

		return $return_string;
	}

}
