<?php
/**
 * Class ExportPost
 *
 * Handles exporting of WordPress posts and meta data to CSV files.
 *
 * @package brainspace
 */

namespace brainspace;

use WP_Query;

/**
 * Class Export_Post
 *
 * @package brainspace
 */
class Export_Post {

	/**
	 * Settings for export configuration.
	 *
	 * @since    1.2.0
	 * @var      string    $settings    The ID of this plugin.
	 */
	private $settings = null;

	/**
	 * ExportPost constructor.
	 */
	public function __construct() {
		$this->settings = get_option( 'wpb-field-settings' ) ? unserialize( get_option( 'wpb-field-settings' ) ) : array();
		add_action( 'admin_menu', array( $this, 'eapm_register_page' ) );
		add_action( 'template_redirect', array( $this, 'eapm_create_post_csv' ) );
		add_action( 'admin_enqueue_scripts', array( $this, 'enqueue_styles' ) );
	}

	/**
	 * Enqueue styles.
	 */
	public function enqueue_styles() {
		// Define the path to your CSS file.
		$css_file = plugin_dir_url( __FILE__ ) . 'assets/css/custom-eapm.css';
		wp_enqueue_style( 'export-posts-css', $css_file, array(), '1.2.0' );
	}

	/**
	 * Registers the export posts settings page under the Tools menu.
	 */
	public function eapm_register_page() {
		add_submenu_page( 'tools.php', 'Export Posts', 'Export Posts', 'manage_options', 'eapm-export-posts', array( $this, 'eapm_render_settings_page' ) );
	}

	/**
	 * Renders the settings page for exporting posts.
	 *
	 * Handles form submission for settings updates and displays the current
	 * settings along with the posts to be exported.
	 */
	public function eapm_render_settings_page() {
		include plugin_dir_path( __FILE__ ) . 'export-post-template.php';
	}

	/**
	 * Creates a CSV file from post data.
	 *
	 * This function generates a CSV file containing post data based on
	 * the current settings. It handles the file creation and output to
	 * the user.
	 */
	public function eapm_create_post_csv() {
		// Check if REQUEST_URI is set and sanitize it.
		if ( isset( $_SERVER['REQUEST_URI'] ) ) {
			$path = sanitize_text_field( wp_unslash( $_SERVER['REQUEST_URI'] ) ); // Sanitize and unslash the input.

			// Check if the user is logged in and if the request URI contains 'wp-posts-export.csv'.
			if ( is_user_logged_in() && ( stripos( strtolower( $path ), 'wp-posts-export.csv' ) !== false ) ) {
				header( 'Content-type: text/csv; charset=utf-8', true, 200 );
				header( 'Content-Disposition: attachment; filename=wp-posts-export.csv' );
				header( 'Pragma: no-cache' );
				header( 'Expires: 0' );

				$posts = new WP_Query(
					array(
						'post_status'    => $this->settings['post_statuses'],
						'post_type'      => $this->settings['post_types'],
						'posts_per_page' => -1,
					)
				);

				$outstream = fopen( 'php://output', 'w' );

				if ( empty( $this->settings['post_keys'] ) ) {
					$headings = array( 'ID', 'post_author', 'post_date', 'post_date_gmt', 'post_content', 'post_title', 'post_excerpt', 'post_status', 'comment_status', 'ping_status', 'post_password', 'post_name', 'to_ping', 'pinged', 'post_modified', 'post_modified_gmt', 'post_content_filtered', 'post_parent', 'guid', 'menu_order', 'post_type', 'post_mime_type', 'comment_count', 'filter' );
				} else {
					$headings = $this->settings['post_keys'];
				}

				if ( ! empty( $this->settings['meta_keys'] ) ) {
					$headings = array_merge( $headings, $this->settings['meta_keys'] );
				}

				fputcsv( $outstream, $headings );

				foreach ( $posts->posts as $post ) {
					$data = array();

					if ( ! empty( $this->settings['post_keys'] ) ) {
						foreach ( $this->settings['post_keys'] as $post_key ) {
							$data[] = $post->$post_key;
						}
					}

					if ( ! empty( $this->settings['meta_keys'] ) ) {
						foreach ( $this->settings['meta_keys'] as $meta_key ) {
							$data[] = maybe_serialize( get_post_meta( $post->ID, $meta_key, true ) );
						}
					}

					fputcsv( $outstream, $data );
				}

				fclose( $outstream );
				exit();
			}
		}
	}

	/**
	 * Retrieves a post based on settings.
	 *
	 * This function fetches a single post using settings defined in the options.
	 * It can be used to get a post based on specific meta keys or other criteria.
	 *
	 * @return WP_Query|null The post object or null if no post is found.
	 */
	private function eapm_get_post_from_settings() {
		$paged = isset( $_GET['paged'] ) ? absint( $_GET['paged'] ) : 1;
		return new WP_Query(
			array(
				'post_status' => $this->settings['post_statuses'],
				'post_type' => $this->settings['post_types'],
				'posts_per_page' => 10,
				'paged' => $paged,
			)
		);
	}

	/**
	 * Retrieves posts by name.
	 *
	 * This function fetches posts based on their names. It is useful when
	 * you need to find posts with specific titles.
	 *
	 * @param string $post_types The name of the post to search for.
	 * @return array Array of WP_Post objects.
	 */
	private function eapm_get_posts_by_name( $post_types ) {
		return new WP_Query(
			array(
				'post_type' => $post_types,
				'posts_per_page' => -1,
			)
		);
	}

	/**
	 * Retrieves an array of meta keys.
	 *
	 * This function returns an array of meta keys which can be used to fetch
	 * specific meta data associated with posts.
	 *
	 * @param string $posts The name of the post to search for.
	 * @return array Array of meta keys.
	 */
	private function eapm_get_meta_keys_array( $posts ) {
		$keys = array();
		foreach ( $posts->posts as $post ) {
			$meta = get_post_meta( $post->ID );
			$keys[] = array_keys( $meta );
		}
		return $keys;
	}
}
