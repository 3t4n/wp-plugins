<?php
/*
Plugin Name: Embed SharePoint OneDrive Documents
Plugin URI: https://plugins.miniorange.com/
Description: This plugin allows you to sync and embed SharePoint documents, folders, and files in WordPress. You can download and preview SharePoint files directly from WordPress.
Version: 2.4.2
Author: miniOrange
License: MIT
*/

namespace MoSharePointObjectSync;

require_once __DIR__ . '/class-wp-namespace-autoloader.php';

use MoSharePointObjectSync\View\AdminView;
use MoSharePointObjectSync\Controller\AdminController;
use MoSharePointObjectSync\Observer\AdminObserver;
use MoSharePointObjectSync\Observer\AppConfigObserver;
use MoSharePointObjectSync\Observer\DocumentObserver;
use MoSharePointObjectSync\Observer\shortcodeSharepoint;

use MoSharePointObjectSync\View\FeedbackForm;
use MoSharePointObjectSync\Wrappers\PluginConstants;
use MoSharePointObjectSync\Wrappers\WpWrapper;

define( 'MO_SPS_PLUGIN_URL', plugins_url( '', __FILE__ ) );
define( 'MO_SPS_PLUGIN_VERSION', '2.4.2' );
define( 'MO_SPS_PLUGIN_FILE', __FILE__ );
/**
 * The main class ofEmbed SharePoint OneDrive Documents plugin.
 */
class MOsps {
	/**
	 * Holds the singleton instance of the MOsps.
	 *
	 * @var MOsps
	 */
	private static $instance;
	/**
	 * The current version of the plugin.
	 *
	 * @var string The version number of the SharePoint plugin, defined as a constant.
	 */
	public static $version = MO_SPS_PLUGIN_VERSION;
	/**
	 * Constructor method for the class.
	 *
	 * This private constructor initializes the class by calling the `mo_sps_load_hooks` method,
	 * which sets up the necessary hooks for the plugin's functionality.
	 *
	 * The constructor is private to enforce the singleton pattern, ensuring that only one instance
	 * of the class can be created.
	 */
	private function __construct() {
		$this->mo_sps_load_hooks();
	}
	/**
	 * Get the singleton instance of the class.
	 *
	 * Ensures only one instance is created and returns it.
	 *
	 * @return self The class instance.
	 */
	public static function mo_sps_load_instance() {
		if ( ! isset( self::$instance ) ) {
			self::$instance = new self();
		}
		return self::$instance;
	}
	/**
	 * Registers all necessary hooks and actions for the plugin.
	 *
	 * This method sets up WordPress actions, filters, shortcodes, and activation/uninstall hooks
	 * to ensure proper functionality of the plugin.
	 */
	private function mo_sps_load_hooks() {
		add_action( 'admin_menu', array( $this, 'mo_sps_admin_menu' ) );
		add_action( 'admin_enqueue_scripts', array( $this, 'mo_sps_enqueue_admin_styles' ) );
		add_action( 'admin_enqueue_scripts', array( $this, 'mo_sps_settings_script' ) );
		add_action( 'admin_init', array( AdminController::get_controller(), 'mo_sps_admin_controller' ) );
		add_action( 'admin_footer', array( FeedbackForm::get_view(), 'mo_sps_display_feedback_form' ) );
		add_action( 'init', array( AdminObserver::get_observer(), 'mo_sps_admin_observer' ) );
		register_activation_hook( __FILE__, array( $this, 'mo_sps_plugin_activate' ) );
		add_shortcode( 'MO_SPS_SHAREPOINT', array( ShortcodeSharepoint::get_observer(), 'mo_sps_shortcode_document_observer' ) );
		add_filter( 'plugin_action_links_' . plugin_basename( __FILE__ ), array( $this, 'settings_link' ) );
		add_filter( 'allowed_redirect_hosts', array( $this, 'extend_allowed_redirect_hosts' ) );
		add_action( 'init', array( $this, 'mo_sps_gutenburg' ) );
		add_action( 'wp_ajax_mo_doc_embed', array( DocumentObserver::get_observer(), 'mo_sps_doc_embed' ) );
		add_action( 'wp_ajax_mo_sps_app_configuration', array( AppConfigObserver::get_observer(), 'mo_sps_app_configuration_api_handler' ) );
		add_action( 'wp_ajax_mo_sps_get_file_web_url', array( DocumentObserver::get_observer(), 'mo_sps_get_file_web_url' ) );
		register_uninstall_hook( __FILE__, 'mo_sps_uninstall' );
		add_action( 'admin_init', array( $this, 'mo_sps_plugin_check_migration' ) );
		add_action( 'admin_init', array( $this, 'mo_sps_plugin_handle_migration_action' ) );
	}
	/**
	 * Checks if plugin migration is required and triggers the appropriate actions.
	 */
	public function mo_sps_plugin_check_migration() {
		if ( ! current_user_can( 'manage_options' )  ) {
			return;
		}
		
		if ( get_option( 'mo_sps_application_config' ) && ! get_option( 'mo_sps_plugin_migration_completed' ) ) {
			add_action( 'admin_notices', array( $this, 'mo_sps_plugin_migration_notice' ) );
		} elseif ( ! get_option( 'mo_sps_application_config' ) ) {
			update_option( 'mo_sps_plugin_migration_completed', true );
		}
	}
	/**
	 * This function adds 'login.microsoftonline.com' to the list of allowed
	 * redirect hosts, enabling safe redirection to external domains when using
	 * wp_safe_redirect.
	 *
	 * @param array $hosts An array of currently allowed hosts for redirection.
	 */
	public function extend_allowed_redirect_hosts( $hosts ) {
		$hosts[] = 'login.microsoftonline.com';
		$hosts[] = 'login.live.com';
		return $hosts;
	}

	/**
	 * Displays a migration notice in the admin area if configuration migration is needed.
	 */
	public function mo_sps_plugin_migration_notice() {
		//phpcs:ignore WordPress.Security.NonceVerification.Recommended -- Reading GET parameter from the URL for checking tab name, doesn't require nonce verification.
		$tab = isset( $_GET['tab'] ) ? sanitize_text_field( wp_unslash( $_GET['tab'] ) ) : 'app_config';
		//PHPCS:ignore -- WordPress.Security.NonceVerification.Recommended -- GET parameter for checking the current page name from the URL doesn't require nonce verification.
		if ( ( isset( $_GET['page'] ) && 'mo_sps' === $_GET['page'] ) && 'app_config' === $tab ) {
			?>
		<div class="notice notice-info">
			<p><?php echo 'It seems you already have some configurations set up from the previous version of the plugin. Click on the button below to migrate your configurations.'; ?></p>
			<form method="post" action="">
			<?php wp_nonce_field( 'mo_sps_migration_action', 'mo_sps_nonce_field' ); ?>
				<input type="hidden" name="mo_sps_plugin_migration_action" value="migrate_configurations">
				<?php submit_button( __( 'Migrate Configurations', 'embed-sharepoint-onedrive-documents' ), 'primary', 'mo_sps_plugin_migrate_button' ); ?>
			</form>
		</div>
			<?php
		}
	}

	/**
	 * Handles the migration action when triggered, updates options, and reloads the page.
	 */
	public function mo_sps_plugin_handle_migration_action() {
		if ( ! isset( $_POST['mo_sps_nonce_field'] ) || ! check_admin_referer( 'mo_sps_migration_action', 'mo_sps_nonce_field' ) ) {
			return;
		}
		if ( ! current_user_can( 'manage_options' )  ) {
			return;
		}
		if ( isset( $_POST['mo_sps_plugin_migration_action'] ) && 'migrate_configurations' === $_POST['mo_sps_plugin_migration_action'] && ! get_option( 'mo_sps_plugin_migration_completed' ) ) {
			update_option( 'mo_sps_test_connection_status', 'success' );
			update_option( 'mo_sps_plugin_migration_completed', true );
			?>
			<script type="text/javascript">
				window.onload = function() {
					if (window.location.href.indexOf('page=mo_sps&tab=app_config') !== -1) {
						location.reload();
					}
				};
			</script>
			<?php
		}
	}

	/**
	 * Loads media library scripts based on the user's preferred mode (list or grid).
	 */
	public function mo_sps_load_media_library_scripts() {
		global $pagenow;

		$mode = get_user_option( 'media_library_mode', get_current_user_id() ) ? get_user_option( 'media_library_mode', get_current_user_id() ) : 'grid';
		if ( 'list' === $mode || 'grid' === $mode ) {
			$this->mo_sps_load_assets();
		}

	}

	/**
	 * Enqueues and registers JavaScript and CSS assets for the plugin.
	 */
	public function mo_sps_load_assets() {
		wp_enqueue_script( 'jquery' );

		wp_enqueue_style(
			'mo-sps-style',
			plugins_url( '/includes/css/media.css', __FILE__ ),
			array(),
			MO_SPS_PLUGIN_VERSION
		);

			wp_register_script(
				'mo-sps-base',
				plugins_url( '/includes/js/media.js', __FILE__ ),
				array( 'jquery' ),
				MO_SPS_PLUGIN_VERSION,
				false
			);

			$params = array(
				'sharepoint_icon' => esc_url( MO_SPS_PLUGIN_URL . '/images/microsoft-sharepoint.svg' ),
				'admin_uri'       => admin_url(),
			);
			wp_enqueue_script( 'mo-sps-base' );
			wp_add_inline_script( 'mo-sps-base', 'var mo_sps=' . wp_json_encode( $params ) . ';', 'before' );

	}
	/**
	 * Initializes plugin options upon activation.
	 */
	public function mo_sps_plugin_activate() {
		WpWrapper::mo_sps_set_option( 'mo_sps_feedback_config', array() );
	}
	/**
	 * Adds the SharePoint/OneDrive admin menu to the WordPress dashboard.
	 */
	public function mo_sps_admin_menu() {
		$page = add_menu_page(
			'SharePoint/OneDrive' . __( '+ Sync', 'embed-sharepoint-onedrive-documents' ),
			'SharePoint /   OneDrive',
			'administrator',
			'mo_sps',
			array( AdminView::get_view(), 'mo_sps_menu_display' ),
			plugin_dir_url( __FILE__ ) . 'images/miniorange_menu.png'
		);
	}
	/**
	 * Enqueues admin styles for the plugin settings page and media library.
	 *
	 * @param string $page The current admin page slug.
	 */
	public function mo_sps_enqueue_admin_styles( $page ) {

		global $pagenow;

		if ( 'upload.php' === $pagenow ) {
			$this->mo_sps_load_media_library_scripts();
		}

		if ( 'toplevel_page_mo_sps' !== $page ) {
			return;
		}

		$css_url              = plugins_url( 'includes/css/mo_sps_settings.css', __FILE__ );
		$css_phone_url        = plugins_url( 'includes/css/phone.css', __FILE__ );
		$css_jquery_ui_url    = plugins_url( 'includes/css/jquery-ui.css', __FILE__ );
		$css_license_view_url = plugins_url( 'includes/css/license.css', __FILE__ );

		wp_enqueue_style( 'mo_sps_css', $css_url, array(), self::$version );
		wp_enqueue_style( 'mo_sps_phone_css', $css_phone_url, array(), self::$version );
		wp_enqueue_style( 'mo_sps_jquery_ui_css', $css_jquery_ui_url, array(), self::$version );
		wp_enqueue_style( 'mo_sps_license_view_css', $css_license_view_url, array(), self::$version );
	}
	/**
	 * Enqueues styles for the plugin settings page and media library.
	 *
	 * @param string $page The current admin page slug.
	 */
	public function mo_sps_enqueue_styles( $page ) {
		global $pagenow;

		if ( 'upload.php' === $pagenow ) {
			$this->mo_sps_load_media_library_scripts();
		}

		if ( 'toplevel_page_mo_sps' !== $page ) {
			return;
		}

		$css_jquery_ui_url = plugins_url( 'includes/css/jquery-ui.css', __FILE__ );
		wp_enqueue_style( 'mo_sps_jquery_ui_css', $css_jquery_ui_url, array(), self::$version );
	}
	/**
	 * Enqueues JavaScript files for the plugin settings page.
	 *
	 * @param string $page The current admin page slug.
	 */
	public function mo_sps_settings_script( $page ) {
		$phone_js_url   = plugins_url( 'includes/js/phone.js', __FILE__ );
		$setting_js_url = plugins_url( 'includes/js/settings.js', __FILE__ );
		wp_enqueue_script( 'mo_sps_phone_js', $phone_js_url, array(), self::$version, false );
		wp_enqueue_script( 'mo_settings_js', $setting_js_url, array(), self::$version, false );
	}
	/**
	 * Registers and enqueues the AJAX handling script and adds inline script for AJAX URL.
	 */
	public function so_enqueue_scripts() {
		wp_register_script( 'ajaxHandle', plugins_url( 'includes/js/ajax.js', __FILE__ ), array(), MO_SPS_PLUGIN_VERSION, true );
		wp_enqueue_script( 'ajaxHandle' );
		wp_add_inline_script(
			'ajaxHandle',
			'var ajax_object=' . wp_json_encode( array( 'ajaxurl' => admin_url( 'admin-ajax.php' ) ) ) . ';',
			'before'
		);
	}
	/**
	 * Adds a "Settings" link to the plugin action links.
	 *
	 * @param array $links Array of existing action links.
	 * @return array Modified array of action links with the "Settings" link appended.
	 */
	public function settings_link( $links ) {
		// Build and escape the URL.
		$url = esc_url(
			add_query_arg(
				'page',
				'mo_sps',
				get_admin_url() . 'admin.php'
			)
		);
		// Create the link.
		$settings_link = "<a href='$url'>" . __( 'Settings', 'embed-sharepoint-onedrive-documents' ) . '</a>';
		// Adds the link to the end of the array.
		array_push(
			$links,
			$settings_link
		);
		return $links;
	}
	/**
	 * Registers a custom Gutenberg block and enqueues its JavaScript.
	 *
	 * Registers the JavaScript for the custom Gutenberg block and adds the post content as inline script if a post ID is provided.
	 */
	public function mo_sps_gutenburg() {
		$src = plugins_url( 'includes/js/gutenburg-block.js', __FILE__ );

		wp_register_script( 'custom-cta-js', $src, array( 'wp-blocks', 'wp-editor' ), self::$version, false );
		//phpcs:ignore WordPress.Security.NonceVerification.Recommended -- Reading GET parameter from the URL for checking post id, doesn't require nonce verification.
		$post_id = ! empty( $_GET['post'] ) ? sanitize_text_field( wp_unslash( $_GET['post'] ) ) : null;
		if ( $post_id ) {
			$post_info    = get_post( $post_id );
			$post_content = ! empty( $post_info->post_content ) ? wp_strip_all_tags( $post_info->post_content ) : '';

			wp_add_inline_script( 'custom-cta-js', 'var post_content=' . wp_json_encode( $post_content ) . ';', 'before' );

		}

		register_block_type(
			'sps/custom-cta',
			array(
				'editor_script' => 'custom-cta-js',

			)
		);

	}

}
$mo_sharepoint = MOsps::mo_sps_load_instance();
