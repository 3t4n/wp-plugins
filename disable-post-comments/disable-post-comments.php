<?php
/*
Plugin Name: Disable Post Comments
Plugin URI: https://wordpress.org/plugins/disable-post-comments/
Description: This plugin allows administrators can disable wordpress all post type comments on their site and also can be disabled specific post type.
Version: 1.0.3
Requires at least: 5.0
WC tested up to: 6.0
Author: WP Lovers
Author URI: https://wplovers.co.uk/#plugin
Developer: sumitsingh
Developer URI: https://profiles.wordpress.org/sumitsingh
License: GPL2
Text Domain: disable-post-comments
Domain Path: /languages/
*/

if ( ! defined( 'ABSPATH' ) ) {
	exit;
}

if (!defined('DPC_PLUGIN_NAME'))
    define('DPC_PLUGIN_NAME', trim(dirname(plugin_basename(__FILE__)), '/'));

if (!defined('DPC_PLUGIN_DIR'))
    define('DPC_PLUGIN_DIR', plugin_dir_path(__FILE__));

if (!defined('DPC_PLUGIN_URL'))
    define('DPC_PLUGIN_URL', plugin_dir_url(__FILE__));

if (!defined('DPC_VERSION'))
    define('DPC_VERSION', '1.0.3');

class Disable_Post_Comments {
	const DB_VERSION         = 6;
	private static $instance = null;
	private $options;
	private $networkactive;
	private $modified_types = array();

	public static function dpc_get_instance() {
		if ( is_null( self::$instance ) ) {
			self::$instance = new self;
		}
		return self::$instance;
	}

	function __construct() {
		// are we network activated?
		$this->networkactive = ( is_multisite() && array_key_exists( plugin_basename( __FILE__ ), (array) get_site_option( 'active_sitewide_plugins' ) ) );

		// Load options
		if ( $this->networkactive ) {
			$this->options = get_site_option( 'disable_post_comments_options', array() );
		} else {
			$this->options = get_option( 'disable_post_comments_options', array() );
		}

		// If it looks like first run, check compat
		if ( empty( $this->options ) ) {
			$this->dpc_check_compatibility();
		}

		// Upgrade DB if necessary
		$this->dpc_check_db_upgrades();

		$this->dpc_init_filters();
	}

	private function dpc_check_compatibility() {
		if ( version_compare( $GLOBALS['wp_version'], '4.7', '<' ) ) {
			require_once( ABSPATH . 'wp-admin/includes/plugin.php' );
			deactivate_plugins( __FILE__ );
			if ( isset( $_GET['action'] ) && ( $_GET['action'] == 'activate' || $_GET['action'] == 'error_scrape' ) ) {
				exit( sprintf( __( 'Disable Post Comments requires WordPress version %s or greater.', 'disable-post-comments' ), '4.8' ) );
			}
		}
	}

	private function dpc_check_db_upgrades() {
		$old_ver = isset( $this->options['db_version'] ) ? $this->options['db_version'] : 0;
		if ( $old_ver < self::DB_VERSION ) {
			if ( $old_ver < 2 ) {
				// upgrade options from version 0.2.1 or earlier to 0.3
				$this->options['dpc_disabled_post_types'] = get_option( 'disable_comments_post_types', array() );
				delete_option( 'disable_comments_post_types' );
			}
			if ( $old_ver < 5 ) {
				// simple is beautiful - remove multiple settings in favour of one
				$this->options['dpc_remove_everywhere'] = isset( $this->options['remove_admin_menu_comments'] ) ? $this->options['remove_admin_menu_comments'] : false;
				foreach ( array( 'remove_admin_menu_comments', 'remove_admin_bar_comments', 'remove_recent_comments', 'remove_discussion', 'remove_rc_widget' ) as $v ) {
					unset( $this->options[ $v ] );
				}
			}

			foreach ( array( 'dpc_remove_everywhere', 'dpc_extra_post_types' ) as $v ) {
				if ( ! isset( $this->options[ $v ] ) ) {
					$this->options[ $v ] = false;
				}
			}

			$this->options['db_version'] = self::DB_VERSION;
			$this->dpc_update_options();
		}
	}

	private function dpc_update_options() {
		if ( $this->networkactive ) {
			update_site_option( 'disable_post_comments_options', $this->options );
		} else {
			update_option( 'disable_post_comments_options', $this->options );
		}
	}

	/*
	 * Get an array of disabled post type.
	 */
	private function dpc_get_disabled_post_types() {
		$types = $this->options['disabled_post_types'];
		// Not all extra_post_types might be registered on this particular site
		if ( $this->networkactive ) {
			foreach ( (array) $this->options['dpc_extra_post_types'] as $extra ) {
				if ( post_type_exists( $extra ) ) {
					$types[] = $extra;
				}
			}
		}
		return $types;
	}

	/*
	 * Check whether comments have been disabled on a given post type.
	 */
	private function dpc_is_post_type_disabled( $type ) {
		return in_array( $type, $this->dpc_get_disabled_post_types() );
	}

	private function dpc_init_filters() {
		// These need to happen now
		if ( $this->options['dpc_remove_everywhere'] ) {
			add_action( 'widgets_init', array( $this, 'dpc_disable_rc_widget' ) );
			add_filter( 'wp_headers', array( $this, 'dpc_filter_wp_headers' ) );
			add_action( 'template_redirect', array( $this, 'dpc_filter_query' ), 9 );   // before redirect_canonical

			// Admin bar filtering has to happen here since WP 3.6
			add_action( 'template_redirect', array( $this, 'dpc_filter_admin_bar' ) );
			add_action( 'admin_init', array( $this, 'dpc_filter_admin_bar' ) );
		}

		// These can happen later
		add_action( 'plugins_loaded', array( $this, 'dpc_register_text_domain' ) );
		add_action( 'wp_loaded', array( $this, 'dpc_init_wploaded_filters' ) );

		// Disable "Latest comments" block in Gutenberg
		add_action( 'enqueue_block_editor_assets', array( $this, 'dpc_filter_gutenberg_blocks') );
	}

	public function dpc_register_text_domain() {
		load_plugin_textdomain( 'disable-post-comments', false, dirname( plugin_basename( __FILE__ ) ) . '/languages' );
	}

	public function dpc_init_wploaded_filters() {
		$disabled_post_types = $this->dpc_get_disabled_post_types();
		if ( ! empty( $disabled_post_types ) ) {
			foreach ( $disabled_post_types as $type ) {
				// we need to know what native support was for later
				if ( post_type_supports( $type, 'comments' ) ) {
					$this->modified_types[] = $type;
					remove_post_type_support( $type, 'comments' );
					remove_post_type_support( $type, 'trackbacks' );
				}
			}
			add_filter( 'comments_array', array( $this, 'dpc_filter_existing_comments' ), 20, 2 );
			add_filter( 'comments_open', array( $this, 'dpc_filter_comment_status' ), 20, 2 );
			add_filter( 'pings_open', array( $this, 'dpc_filter_comment_status' ), 20, 2 );
			add_filter( 'get_comments_number', array( $this, 'dpc_filter_comment_status' ), 20, 2 );
		} elseif ( is_admin() && ! $this->options['dpc_remove_everywhere'] ) {
			// It is possible that $disabled_post_types is empty if other
			// plugins have disabled comments. Hence we also check for
			// dpc_remove_everywhere. If you still get a warning you probably
			// shouldn't be using this plugin.
			add_action( 'all_admin_notices', array( $this, 'dpc_setup_notice' ) );
		}

		// Filters for the admin only
		if ( is_admin() ) {
			if ( $this->networkactive ) {
				add_action( 'network_admin_menu', array( $this, 'dpc_settings_menu' ) );
				add_action( 'network_admin_menu', array( $this, 'dpc_tools_menu' ) );
				add_filter( 'network_admin_plugin_action_links', array( $this, 'dpc_plugin_actions_links' ), 10, 2 );
			} else {
				add_action( 'admin_menu', array( $this, 'dpc_settings_menu' ) );
				add_action( 'admin_menu', array( $this, 'dpc_tools_menu' ) );
				add_filter( 'plugin_action_links', array( $this, 'dpc_plugin_actions_links' ), 10, 2 );
				if ( is_multisite() ) {    // We're on a multisite setup, but the plugin isn't network activated.
					register_deactivation_hook( __FILE__, array( $this, 'dpc_single_site_deactivate' ) );
				}
			}

			add_action( 'admin_notices', array( $this, 'dpc_discussion_notice' ) );
			add_filter( 'plugin_row_meta', array( $this, 'dpc_set_plugin_meta' ), 10, 2 );

			if ( $this->options['dpc_remove_everywhere'] ) {
				add_action( 'admin_menu', array( $this, 'dpc_filter_admin_menu' ), 9999 );  // do this as late as possible
				add_action( 'admin_print_styles-index.php', array( $this, 'dpc_admin_css' ) );
				add_action( 'admin_print_styles-profile.php', array( $this, 'dpc_admin_css' ) );
				add_action( 'wp_dashboard_setup', array( $this, 'dpc_filter_dashboard' ) );
				add_filter( 'pre_option_default_pingback_flag', '__return_zero' );
			}
		}
		// Filters for front end only
		else {
			add_action( 'template_redirect', array( $this, 'dpc_check_comment_template' ) );

			if ( $this->options['dpc_remove_everywhere'] ) {
				add_filter( 'feed_links_show_comments_feed', '__return_false' );
			}
		}
	}

	/*
	 * Replace the theme's comment template with a blank one.
	 * To prevent this, define DISABLE_COMMENTS_REMOVE_COMMENTS_TEMPLATE
	 * and set it to True
	 */
	public function dpc_check_comment_template() {
		if ( is_singular() && ( $this->options['dpc_remove_everywhere'] || $this->dpc_is_post_type_disabled( get_post_type() ) ) ) {
			if ( ! defined( 'DISABLE_COMMENTS_REMOVE_COMMENTS_TEMPLATE' ) || DISABLE_COMMENTS_REMOVE_COMMENTS_TEMPLATE == true ) {
				// Kill the comments template.
				add_filter( 'comments_template', array( $this, 'dpc_dummy_comments_template' ), 20 );
			}
			// Remove comment-reply script for themes that include it indiscriminately
			wp_deregister_script( 'comment-reply' );
			// feed_links_extra inserts a comments RSS link
			remove_action( 'wp_head', 'feed_links_extra', 3 );
		}
	}

	public function dpc_dummy_comments_template() {
		return dirname( __FILE__ ) . '/includes/dpc-comments-template.php';
	}


	/*
	 * Remove the X-Pingback HTTP header
	 */
	public function dpc_filter_wp_headers( $headers ) {
		unset( $headers['X-Pingback'] );
		return $headers;
	}

	/*
	 * Issue a 403 for all comment feed requests.
	 */
	public function dpc_filter_query() {
		if ( is_comment_feed() ) {
			wp_die( __( 'Comments are closed.' ), '', array( 'response' => 403 ) );
		}
	}

	/*
	 * Remove comment links from the admin bar.
	 */
	public function dpc_filter_admin_bar() {
		if ( is_admin_bar_showing() ) {
			// Remove comments links from admin bar
			remove_action( 'admin_bar_menu', 'wp_admin_bar_comments_menu', 60 );
			if ( is_multisite() ) {
				add_action( 'admin_bar_menu', array( $this, 'dpc_remove_network_comment_links' ), 500 );
			}
		}
	}

	/**
	 * Determines if scripts should be enqueued
	 */
	public function dpc_filter_gutenberg_blocks( $hook ) {
		global $post;

		if ( $this->options['dpc_remove_everywhere'] || ( isset( $post->post_type ) && in_array( $post->post_type, $this->dpc_get_disabled_post_types(), true ) ) ) {
			return $this->dpc_disable_comments_script();
		}
	}

	/**
	 * Enqueues scripts
	 */
	public function dpc_disable_comments_script() {
		wp_enqueue_script( 'disable-post-comments-gutenberg', plugin_dir_url( __FILE__ ) . 'assets/disable-post-comments.js', array(), false, true );
		wp_localize_script(
			'disable-post-comments-gutenberg',
			'disable_post_comments',
			array(
				'disabled_blocks' => array( 'core/latest-comments' ),
			)
		);
	}

	/*
	 * Remove comment links from the admin bar in a multisite network.
	 */
	public function remove_network_comment_links( $wp_admin_bar ) {
		if ( $this->networkactive && is_user_logged_in() ) {
			foreach ( (array) $wp_admin_bar->user->blogs as $blog ) {
				$wp_admin_bar->remove_menu( 'blog-' . $blog->userblog_id . '-c' );
			}
		} else {
			// We have no way to know whether the plugin is active on other sites, so only remove this one
			$wp_admin_bar->remove_menu( 'blog-' . get_current_blog_id() . '-c' );
		}
	}

	public function dpc_discussion_notice() {
		$disabled_post_types = $this->dpc_get_disabled_post_types();
		if ( get_current_screen()->id == 'options-discussion' && ! empty( $disabled_post_types ) ) {
			$names = array();
			foreach ( $disabled_post_types as $type ) {
				$names[ $type ] = get_post_type_object( $type )->labels->name;
			}

			echo '<div class="notice notice-warning"><p>' . sprintf( __( 'Note: The <em>Disable Post Comments</em> plugin is currently active, and comments are completely disabled on: %s. Many of the settings below will not be applicable for those post types.', 'disable-post-comments' ), implode( __( ', ' ), $names ) ) . '</p></div>';
		}
	}

	/**
	 * Return context-aware settings page URL
	 */
	private function dpc_settings_page_url() {
		$base = $this->networkactive ? network_admin_url( 'settings.php' ) : admin_url( 'options-general.php' );
		return add_query_arg( 'page', 'disable_comments_settings', $base );
	}

	/**
	 * Return context-aware tools page URL
	 */
	private function dpc_tools_page_url() {
		$base = $this->networkactive ? network_admin_url( 'settings.php' ) : admin_url( 'tools.php' );
		return add_query_arg( 'page', 'disable_comments_tools', $base );
	}

	public function dpc_setup_notice() {
		if ( strpos( get_current_screen()->id, 'dpc_settings_page_disable_comments_settings' ) === 0 ) {
			return;
		}
		$hascaps = $this->networkactive ? is_network_admin() && current_user_can( 'manage_network_plugins' ) : current_user_can( 'manage_options' );
		if ( $hascaps ) {
			echo '<div class="updated fade"><p>' . sprintf( __( 'The <em>Disable Comments</em> plugin is active, but isn\'t configured to do anything yet. Visit the <a href="%s">configuration page</a> to choose which post types to disable comments on.', 'disable-post-comments' ), esc_attr( $this->dpc_settings_page_url() ) ) . '</p></div>';
		}
	}

	public function dpc_filter_admin_menu() {
		global $pagenow;

		if ( $pagenow == 'comment.php' || $pagenow == 'edit-comments.php' ) {
			wp_die( __( 'Comments are closed.' ), '', array( 'response' => 403 ) );
		}

		remove_menu_page( 'edit-comments.php' );

		if ( ! $this->dpc_discussion_settings_allowed() ) {
			if ( $pagenow == 'options-discussion.php' ) {
				wp_die( __( 'Comments are closed.' ), '', array( 'response' => 403 ) );
			}

			remove_submenu_page( 'options-general.php', 'options-discussion.php' );
		}
	}

	public function dpc_filter_dashboard() {
		remove_meta_box( 'dashboard_recent_comments', 'dashboard', 'normal' );
	}

	public function dpc_admin_css() {
		echo '<style>
			#dashboard_right_now .comment-count,
			#dashboard_right_now .comment-mod-count,
			#latest-comments,
			#welcome-panel .welcome-comments,
			.user-comment-shortcuts-wrap {
				display: none !important;
			}
		</style>';
	}

	public function dpc_filter_existing_comments( $comments, $post_id ) {
		$post = get_post( $post_id );
		return ( $this->options['dpc_remove_everywhere'] || $this->dpc_is_post_type_disabled( $post->post_type ) ) ? array() : $comments;
	}

	public function dpc_filter_comment_status( $open, $post_id ) {
		$post = get_post( $post_id );
		return ( $this->options['dpc_remove_everywhere'] || $this->dpc_is_post_type_disabled( $post->post_type ) ) ? false : $open;
	}

	public function filter_comments_number( $count, $post_id ) {
		$post = get_post( $post_id );
		return ( $this->options['dpc_remove_everywhere'] || $this->dpc_is_post_type_disabled( $post->post_type ) ) ? 0 : $count;
	}

	public function dpc_disable_rc_widget() {
		unregister_widget( 'WP_Widget_Recent_Comments' );
		// The widget has added a style action when it was constructed - which will
		// still fire even if we now unregister the widget... so filter that out
		add_filter( 'show_recent_comments_widget_style', '__return_false' );
	}

	public function dpc_set_plugin_meta( $links, $file ) {
		static $plugin;
		$plugin = plugin_basename( __FILE__ );
		if ( $file == $plugin ) {
			$links[] = '<a href="https://github.com/sssumitsingh/disable-post-comments">GitHub</a>';
		}
		return $links;
	}

	/**
	 * Add links to Settings page
	 */
	public function dpc_plugin_actions_links( $links, $file ) {
		static $plugin;
		$plugin = plugin_basename( __FILE__ );
		if ( $file == $plugin && current_user_can( 'manage_options' ) ) {
			array_unshift(
				$links,
				sprintf( '<a href="%s">%s</a>', esc_attr( $this->dpc_settings_page_url() ), __( 'Settings' ) ),
				sprintf( '<a href="%s">%s</a>', esc_attr( $this->dpc_tools_page_url() ), __( 'Tools' ) )
			);
		}

		return $links;
	}

	public function dpc_settings_menu() {
		$title = _x( 'Disable Comments', 'settings menu title', 'disable-post-comments' );
		if ( $this->networkactive ) {
			add_submenu_page( 'settings.php', $title, $title, 'manage_network_plugins', 'disable_comments_settings', array( $this, 'dpc_settings_page' ) );
		} else {
			add_submenu_page( 'options-general.php', $title, $title, 'manage_options', 'disable_comments_settings', array( $this, 'dpc_settings_page' ) );
		}
	}

	public function dpc_settings_page() {
		include dirname( __FILE__ ) . '/includes/dpc-settings-page.php';
	}

	public function dpc_tools_menu() {
		$title = __( 'Delete Comments', 'disable-post-comments' );
		if ( $this->networkactive ) {
			add_submenu_page( 'settings.php', $title, $title, 'manage_network_plugins', 'disable_comments_tools', array( $this, 'dpc_tools_page' ) );
		} else {
			add_submenu_page( 'tools.php', $title, $title, 'manage_options', 'disable_comments_tools', array( $this, 'dpc_tools_page' ) );
		}
	}

	public function dpc_tools_page() {
		include dirname( __FILE__ ) . '/includes/dpc-tools-page.php';
	}

	private function dpc_discussion_settings_allowed() {
		if ( defined( 'DISABLE_POST_COMMENTS_ALLOW_DISCUSSION_SETTINGS' ) && DISABLE_POST_COMMENTS_ALLOW_DISCUSSION_SETTINGS == true ) {
			return true;
		}
	}

	public function dpc_single_site_deactivate() {
		// for single sites, delete the options upon deactivation, not uninstall
		delete_option( 'disable_post_comments_options' );
	}
}

Disable_Post_Comments::dpc_get_instance();

add_action('admin_enqueue_scripts', 'dpc_add_stylesheet_to_admin');
if (!function_exists('dpc_add_stylesheet_to_admin')) {
    function dpc_add_stylesheet_to_admin(){
        wp_register_style('dpc_style', DPC_PLUGIN_URL . 'css/dpc_style.css', false, DPC_VERSION);
        wp_enqueue_style('dpc_style');
    }
}