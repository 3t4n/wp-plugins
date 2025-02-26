<?php
/**
 * Plugin Main Class
 *
 * This class is responsible for initializing the admin side of the plugin
 * and managing image attributes in the Media Library.
 *
 * @package Alter
 * @subpackage Admin
 * @since 1.0.0
 */

namespace Alter\Admin;

class Init {
	/**
	 * The ID of this plugin.
	 *
	 * @since 1.0.0
	 * @access private
	 * @var string
	 */
	private $plugin_name;

	/**
	 * The version of this plugin.
	 *
	 * @since 1.0.0
	 * @access private
	 * @var string
	 */
	private $version;

	/**
	 * Singleton instance of the class.
	 *
	 * @since 1.0.0
	 * @access private
	 * @var self|null
	 */
	private static $instance = null;

	/**
	 * Field name for the ALT text filter in query parameters.
	 *
	 * @since 1.0.0
	 * @access private
	 * @var string
	 */
	private const FIELD_NAME_ALT = 'filter_img_alt';

	/**
	 * Field name for the caption filter in query parameters.
	 *
	 * @since 1.0.0
	 * @access private
	 * @var string
	 */
	private const FIELD_NAME_CAPTION = 'filter_img_caption';

	/**
	 * Allowed image MIME types for filtering.
	 *
	 * @since 1.0.0
	 * @access private
	 * @var array<string>
	 */
	private const IMAGE_MIME_TYPES = array(
		'image/jpeg',
		'image/gif',
		'image/png',
		'image/bmp',
		'image/tiff',
		'image/x-icon',
		'image/webp',
	);

	/**
	 * Initialize the class and set its properties.
	 *
	 * @since 1.0.0
	 * @access public
	 */
	public function __construct() {
		$this->initializePlugin();
		$this->setupHooks();
	}

	/**
	 * Get singleton instance of the class.
	 *
	 * @since 1.0.0
	 * @access public
	 * @return self
	 */
	public static function instance(): self {
		if ( is_null( self::$instance ) ) {
			self::$instance = new self();
		}
		return self::$instance;
	}

	/**
	 * Initialize plugin properties.
	 *
	 * @since 1.0.0
	 * @access private
	 * @return void
	 */
	private function initializePlugin(): void {
		$this->version     = defined( 'ALTER_VERSION' ) ? ALTER_VERSION : '1.0.0';
		$this->plugin_name = defined( 'ALTER_NAME' ) ? ALTER_NAME : 'alter-media';
	}

	/**
	 * Setup all WordPress hooks.
	 *
	 * @since 1.0.0
	 * @access private
	 * @return void
	 */
	private function setupHooks(): void {
		// Early return if not on media library page or user can't upload files
		if ( ! $this->isMediaLibraryPage() || ! current_user_can( 'upload_files' ) ) {
			return;
		}

		// Only enqueue styles and set up filters for media library
		add_action( 'admin_enqueue_scripts', array( $this, 'enqueueStyles' ) );
		add_action( 'restrict_manage_posts', array( $this, 'renderDropDownFilterOptions' ) );
		add_action( 'pre_get_posts', array( $this, 'preGetPosts' ) );
		add_action( 'manage_media_columns', array( $this, 'manageMediaColumns' ) );
		add_filter( 'manage_media_custom_column', array( $this, 'manageMediaCustomColumn' ), 10, 2 );
	}

	/**
	 * Enqueue admin-specific styles.
	 *
	 * @since 1.0.0
	 * @access public
	 * @return void
	 */
	public function enqueueStyles(): void {
		if ( $this->isMediaLibraryPage() ) {
			// Register an empty stylesheet with version
			wp_register_style(
				$this->plugin_name,
				false,  // Set source to false for empty stylesheet
				array(),  // No dependencies
				$this->version  // Add version number
			);
			wp_enqueue_style( $this->plugin_name );

			$this->addMediaLibraryStyles();
		}
	}

	/**
	 * Add inline styles for Media Library columns.
	 *
	 * @since 1.0.0
	 * @access private
	 * @return void
	 */
	private function addMediaLibraryStyles(): void {
		$custom_css = '
			.column-alt-text-status,
			.column-caption-status {
				width: 100px !important;
				text-align: center !important;
			}
			.column-alt-text-status .dashicons,
			.column-caption-status .dashicons {
				margin-top: 8px;
			}
		';
		wp_add_inline_style( $this->plugin_name, $custom_css );
	}

	/**
	 * Check if current page is Media Library.
	 *
	 * @since 1.0.0
	 * @access public
	 * @return bool
	 */
	public function isMediaLibraryPage(): bool {
		global $pagenow;
		return is_admin() && $pagenow === 'upload.php';
	}

	/**
	 * Get available filter options for the dropdown.
	 *
	 * @since 1.0.0
	 * @access public
	 * @return array<string, string>
	 */
	public function getFilterOptions(): array {
		return array(
			'no-filter'            => __( 'Attribute Filter', 'alter-media' ),
			'only-with-alt'        => __( 'With Alternative Text', 'alter-media' ),
			'only-without-alt'     => __( 'Without Alternative Text', 'alter-media' ),
			'only-with-caption'    => __( 'With Caption', 'alter-media' ),
			'only-without-caption' => __( 'Without Caption', 'alter-media' ),
		);
	}

	/**
	 * Get filters from query arguments.
	 *
	 * @since 1.0.0
	 * @access public
	 * @return string
	 */
	public function getFilterFromQueryArgs(): string {
		// Check if we have a filter value
		if ( ! isset( $_GET[ self::FIELD_NAME_ALT ] ) ) {
			return 'no-filter';
		}

		$selected_filter_option = sanitize_text_field( wp_unslash( $_GET[ self::FIELD_NAME_ALT ] ) );
		$valid_filter_options   = $this->getFilterOptions();

		// Validate the filter option
		if ( empty( $selected_filter_option ) || ! array_key_exists( $selected_filter_option, $valid_filter_options ) ) {
			return 'no-filter';
		}

		return $selected_filter_option;
	}

	/**
	 * Render dropdown filter options.
	 *
	 * @since 1.0.0
	 * @access public
	 * @return void
	 */
	public function renderDropDownFilterOptions() {
		if ( ! $this->isMediaLibraryPage() ) {
			return;
		}

		// Add nonce field for the overall form
		wp_nonce_field( 'bulk-media' );

		printf( '<select name="%s">', esc_attr( self::FIELD_NAME_ALT ) );
		$selected_filter_option = $this->getFilterFromQueryArgs();
		$valid_filter_options   = $this->getFilterOptions();

		foreach ( $valid_filter_options as $value => $label ) {
			printf(
				'<option value="%s" %s>%s</option>',
				esc_attr( $value ),
				selected( $selected_filter_option, $value, false ),
				esc_html( $label )
			);
		}
		echo '</select>';
	}

	/**
	 * Pre-get posts hook.
	 *
	 * @since 1.0.0
	 * @access public
	 * @param WP_Query $query
	 * @return void
	 */
	public function preGetPosts( $query ) {
		if ( ! $query->is_main_query() ) {
			return;
		}

		$selected_filter_option = $this->getFilterFromQueryArgs();
		if ( $selected_filter_option === 'no-filter' ) {
			return;
		}

		// Set common query parameters
		$query->set( 'post_type', 'attachment' );
		$query->set( 'post_status', 'inherit' );
		$query->set( 'post_mime_type', self::IMAGE_MIME_TYPES );

		// Handle different filter cases
		switch ( $selected_filter_option ) {
			case 'only-with-alt':
				$query->set(
					'meta_query',
					array(
						array(
							'key'     => '_wp_attachment_image_alt',
							'compare' => 'EXISTS',
						),
					)
				);
				break;

			case 'only-without-alt':
				$query->set(
					'meta_query',
					array(
						array(
							'key'     => '_wp_attachment_image_alt',
							'compare' => 'NOT EXISTS',
						),
					)
				);
				break;

			case 'only-with-caption':
			case 'only-without-caption':
				$query->set( 'suppress_filters', false );
				add_filter(
					'posts_where',
					function( $where ) use ( $selected_filter_option ) {
						global $wpdb;
						$operator = $selected_filter_option === 'only-with-caption' ? '!=' : '=';
						return $where . " AND {$wpdb->posts}.post_excerpt {$operator} '' ";
					}
				);
				break;
		}
	}

	/**
	 * Add a custom column for IMG ALT Text present/missing.
	 */
	public function manageMediaColumns( $columns ) {
		$columns['alt-text-status'] = 'Alt Text';
		$columns['caption-status']  = 'Image Caption';
		return $columns;
	}

	/**
	 * This is called for each image in the media library list/table.
	 */
	public function manageMediaCustomColumn( $column_name, $post_id ) {
		if ( $column_name == 'alt-text-status' ) {
			if ( ! empty( $alt_text = trim( strval( get_post_meta( $post_id, '_wp_attachment_image_alt', true ) ) ) ) ) {
				printf(
					'<span class="dashicons dashicons-yes-alt" title="%s" style="color: #16a34a;"></span>',
					esc_attr( $alt_text )
				);
			} else {
				echo '<span class="dashicons dashicons-warning" style="color:#d97706;"></span>';
			}
		} elseif ( $column_name == 'caption-status' ) {
			$post = get_post( $post_id );
			if ( ! empty( $caption = trim( $post->post_excerpt ) ) ) {
				printf(
					'<span class="dashicons dashicons-yes-alt" title="%s" style="color: #16a34a;"></span>',
					esc_attr( $caption )
				);
			} else {
				echo '<span class="dashicons dashicons-warning" style="color:#d97706;"></span>';
			}
		}
	}
}
