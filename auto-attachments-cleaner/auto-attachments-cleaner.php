<?php
/**
 *
 * @link              https://www.stefanofattori.it
 * @package           Auto_Attachments_Cleaner
 *
 * @wordpress-plugin
 * Plugin Name:       Auto Attachments Cleaner
 * Plugin URI:        https://www.stefanofattori.it/wordpress/plugins/
 * Description:       Automatically deletes attachments (images, videos, files etc...) linked to a page, post or custom post type when it is deleted.
 * Version:           1.0.3
 * Requires at least: 5.0
 * Requires PHP:      7.0
 * Author:            Stefano Fattori <info@stefanofattori.it>
 * Author URI:        https://www.stefanofattori.it/
 * License:           GPL-2.0+
 * License URI:       http://www.gnu.org/licenses/gpl-2.0.txt
 * Text Domain:       auto-attachments-cleaner
 * Domain Path:       /languages
 * 
 */


// Prevents direct access to files
if ( ! defined( 'ABSPATH' ) ) {
	exit;
}

/**
 * Currently plugin version.
 * Start at version 1.0.0 and use SemVer - https://semver.org
 */
define( 'AUTO_ATTACHMENTS_CLEANER_VERSION', '1.0.3' );


class Auto_Attachments_Cleaner {

	/**
	 * Singleton instance
	 *
	 * @var Auto_Attachments_Cleaner
	 */
	private static $instance = null;

	/**
	 * Get the unique instance of the class.
	 *
	 * @return Auto_Attachments_Cleaner
	 */
	public static function get_instance() {
		if ( self::$instance === null ) {
			self::$instance = new self();
		}
		return self::$instance;
	}

	/**
	 * Private constructor to implement the Singleton pattern.
	 */
	private function __construct() {
		add_action( 'plugins_loaded', [ $this, 'load_textdomain' ] );

		add_action( 'admin_menu', [ $this, 'add_admin_menu' ] );
		add_action( 'admin_init', [ $this, 'register_settings' ] );

		add_action( 'admin_enqueue_scripts', [ $this, 'admin_styles' ] );
		add_action( 'admin_enqueue_scripts', [ $this, 'admin_scripts' ] );

		add_filter( 'plugin_action_links', [ $this, 'add_settings_link' ], 10, 2 );

		add_action( 'before_delete_post', [ $this, 'delete_post_attachments' ] );
		add_action( 'admin_notices', [ $this, 'display_attachments_deletion_notice' ], 20 );
	}


	/**
	 * Sanitize callback function for options
	 * @param mixed $value
	 * @return array
	 */
	public function sanitize_post_types_option( $value ) {
		// Verifica che sia un array
		if ( ! is_array( $value ) ) {
			return [];
		}

		// Sanifica ogni elemento dell'array
		return array_map( 'sanitize_text_field', $value );
	}

	/**
	 * Load text domain for multilanguage support
	 * @return void
	 */
	function load_textdomain() {
		load_plugin_textdomain(
			'auto-attachments-cleaner',
			false,
			dirname( plugin_basename( __FILE__ ) ) . '/languages'
		);
	}


	/**
	 * Load the CSS style sheet into the post list page, page or custom post type.
	 * @return void
	 */
	function admin_styles() {
		$screen = get_current_screen();

		// Checking whether we are on a list page of posts, pages or custom post type
		if ( $screen && in_array( $screen->base, [ 'edit', 'edit-post_type' ], true ) ) {
			wp_enqueue_style( 'auto-attachments-cleaner-admin-style', plugin_dir_url( __FILE__ ) . 'assets/css/admin-style.css', array(), AUTO_ATTACHMENTS_CLEANER_VERSION, 'all' );
		}
	}


	/**
	 * Adds Admin JS scripts
	 * @return void
	 */
	function admin_scripts() {
		wp_enqueue_script(
			'aac-scripts',
			plugin_dir_url( __FILE__ ) . 'assets/js/scripts.js',
			array(),
			AUTO_ATTACHMENTS_CLEANER_VERSION,
			array(
				'strategy' => 'defer',
			)
		);
	}


	/**
	 * Adds a ‘Settings’ link next to ‘Activate’ on the plugins page.
	 *
	 * @param array $links Existing links for the plugin.
	 * @param string $file The full path to the plugin file.
	 * @return array Updated links.
	 */
	function add_settings_link( $links, $file ) {
		if ( plugin_basename( __FILE__ ) === $file ) {
			$settings_link = '<a href="' . esc_url( get_admin_url( null, 'options-general.php?page=auto-attachments-cleaner-settings' ) ) . '">' . esc_html__( 'Settings', 'auto-attachments-cleaner' ) . '</a>';
			array_unshift( $links, $settings_link );
		}
		return $links;
	}


	/**
	 *  Adds the menu item in the administration panel.
	 * @return void
	 */
	public function add_admin_menu() {
		add_options_page(
			esc_html__( 'Auto Attachments Cleaner Settings', 'auto-attachments-cleaner' ),
			esc_html__( 'Auto Attachments Cleaner', 'auto-attachments-cleaner' ),
			'manage_options',
			'auto-attachments-cleaner-settings',
			[ $this, 'render_settings_page' ]
		);
	}


	/**
	 * Register the plugin settings.
	 * @return void
	 */
	public function register_settings() {
		register_setting(
			'auto_attachments_cleaner_options',
			'auto_attachments_cleaner_post_types',
			array(
				'type' => 'array',
				'sanitize_callback' => array( $this, 'sanitize_post_types_option' ),
			)
		);
	}


	/**
	 * Renders the settings page.
	 * @return void
	 */
	public function render_settings_page() {
		?>
		<div class="wrap">
			<h1><?php echo esc_html( get_admin_page_title() ); ?></h1>
			<form method="post" action="options.php">
				<?php
				settings_fields( 'auto_attachments_cleaner_options' );
				$selected_post_types = get_option( 'auto_attachments_cleaner_post_types', [] );
				if ( ! is_array( $selected_post_types ) ) {
					$selected_post_types = []; // Set an empty array if the variable is not an array.
				}
				?>
				<table class="form-table">
					<tr>
						<th scope="row">
							<?php esc_html_e( 'Enable for the following types of posts: ', 'auto-attachments-cleaner' ); ?>
						</th>
						<td>
							<button type="button" class="button"
								id="select-all-post-types"><?php esc_html_e( 'Select all', 'auto-attachments-cleaner' ); ?></button>
							<button type="button" class="button"
								id="deselect-all-post-types"><?php esc_html_e( 'Deselect all', 'auto-attachments-cleaner' ); ?></button>
							<br><br>
							<?php
							$post_types = get_post_types( [ 'public' => true ], 'objects' );

							// Remove the post type ‘attachment’ from the list
							unset( $post_types['attachment'] );
							foreach ( $post_types as $post_type ) {
								$checked = in_array( $post_type->name, $selected_post_types ) ? 'checked' : '';
								echo '<label><input type="checkbox" name="auto_attachments_cleaner_post_types[]" value="' . esc_attr( $post_type->name ) . '" ' . esc_attr( $checked ) . '> ' . esc_html( $post_type->label ) . '</label><br>';
							}
							?>
						</td>
					</tr>
				</table>
				<?php submit_button( esc_html_e( 'Save settings', 'auto-attachments-cleaner' ) ); ?>
			</form>
		</div>

		<?php
	}


	/**
	 * Deletes attachments attached to a post when the post is deleted.
	 * @param int $post_id ID of the deleted post.
	 * @return void
	 */
	public function delete_post_attachments( int $post_id ) {
		// Check the post type and user settings
		$post_type = get_post_type( $post_id );
		$selected_post_types = get_option( 'auto_attachments_cleaner_post_types', [] );

		if ( ! in_array( $post_type, $selected_post_types, true ) ) {
			return; // Ignore posts not selected in settings
		}

		// Retrieve attachments linked to the post
		$attachments = get_children( [ 
			'post_parent' => $post_id,
			'post_type' => 'attachment',
		] );

		// Initialize or retrieve the option for deleted attachments
		$deleted_attachments = get_transient( 'auto_attachments_cleaner_deleted' );
		if ( ! $deleted_attachments ) {
			$deleted_attachments = [];
		}

		// Delete any attachments found
		if ( $attachments ) {
			foreach ( $attachments as $attachment ) {
				$attachment_id = $attachment->ID;
				$deleted_attachments[] = [ 
					'title' => $attachment->post_title,
					'type' => $attachment->post_mime_type,
				];
				wp_delete_attachment( $attachment_id, true );
			}
		}

		// Save the details of deleted attachments as a temporary option
		set_transient( 'auto_attachments_cleaner_deleted', $deleted_attachments, 30 );
	}

	/**
	 * Shows a notification with a list of deleted attachments.
	 * @return void
	 */
	public function display_attachments_deletion_notice() {
		$deleted_attachments = get_transient( 'auto_attachments_cleaner_deleted' );
		if ( $deleted_attachments ) {
			// Builds the list of deleted attachments
			echo '<div class="notice notice-info is-dismissible auto-attachments-cleaner">';
			echo '<p><strong>' . esc_html__( 'The following attachments were also deleted: ', 'auto-attachments-cleaner' ) . '</strong></p>';
			echo '<ul style="margin-left: 20px;">';

			echo '<li class="header">
					<span>' . esc_html__( 'Attachment Name', 'auto-attachments-cleaner' ) . '</span>
					<span>' . esc_html__( 'Type', 'auto-attachments-cleaner' ) . '</span>
				</li>';

			foreach ( $deleted_attachments as $attachment ) {
				printf(
					'<li><span>%s</span> <em>(%s)</em></li>',
					esc_html( $attachment['title'] ),
					esc_html( $attachment['type'] )
				);
			}

			echo '</ul>';
			echo '</div>';

			// Delete temporary data
			delete_transient( 'auto_attachments_cleaner_deleted' );
		}
	}


}


// Initialise the plugin
Auto_Attachments_Cleaner::get_instance();
