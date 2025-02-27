<?php
// Exit if accessed directly.
if ( ! defined( 'ABSPATH' ) ) {
	exit;
}

class Modula_Foo_Migrator {

	/**
	 * Holds the class object.
	 *
	 * @var object
	 *
	 * @since 1.0.0
	 */
	public static $instance;

	/**
	 * Primary class constructor.
	 *
	 * @since 1.0.0
	 */
	public function __construct() {

		require_once MODULA_FOO_MIGRATOR_PATH . 'includes/class-modula-plugin-checker.php';

		if ( class_exists( 'Modula_Plugin_Checker' ) ) {

			$modula_checker = Modula_Plugin_Checker::get_instance();

			if ( ! $modula_checker->check_for_modula() ) {

				if ( is_admin() ) {
					add_action( 'admin_notices', array( $modula_checker, 'display_modula_notice' ) );
					add_action( 'plugins_loaded', array( $this, 'set_locale', 15 ) );
				}

			} else {

				// Add AJAX
				add_action( 'wp_ajax_modula_importer_foogallery_gallery_import', array(
					$this,
					'foogallery_gallery_import'
				) );
				add_action( 'wp_ajax_modula_importer_foogallery_gallery_imported_update', array(
					$this,
					'update_imported'
				) );

				// Add infor used for Modula's migrate functionality
				add_filter( 'modula_migrator_sources', array( $this, 'add_source' ), 15, 1 );
				add_filter( 'modula_source_galleries_foogallery', array( $this, 'add_source_galleries' ), 15, 1 );
				add_filter( 'modula_g_gallery_foogallery', array( $this, 'add_gallery_info' ), 15, 3 );
				add_filter( 'modula_migrator_images_foogallery', array( $this, 'migrator_images' ), 15, 2 );
			}
		}

	}

	/**
	 * Returns the singleton instance of the class.
	 *
	 * @since 1.0.0
	 */
	public static function get_instance() {

		if ( ! isset( self::$instance ) && ! ( self::$instance instanceof Modula_Foo_Migrator ) ) {
			self::$instance = new Modula_Foo_Migrator();
		}

		return self::$instance;

	}


	/**
	 * Get all FooGallery Galleries
	 *
	 * @return mixed
	 *
	 * @since 1.0.0
	 */
	public function get_galleries() {

		global $wpdb;

		$galleries       = $wpdb->get_results( " SELECT * FROM " . $wpdb->prefix . "posts WHERE post_type = 'foogallery' AND post_status = 'publish'" );
		$empty_galleries = array();

		if ( count( $galleries ) != 0 ) {
			foreach ( $galleries as $key => $gallery ) {
				$count = $this->images_count( $gallery->ID );

				if ( $count == 0 ) {
					unset( $galleries[ $key ] );
					$empty_galleries[ $key ] = $gallery;
				}
			}

			if ( count( $galleries ) != 0 ) {
				$return_galleries['valid_galleries'] = $galleries;
			}
			if ( count( $empty_galleries ) != 0 ) {
				$return_galleries['empty_galleries'] = $empty_galleries;
			}

			if ( count( $return_galleries ) != 0 ) {
				return $return_galleries;
			}
		}

		return false;
	}


	/**
	 * Get gallery image count
	 *
	 * @param $id
	 *
	 * @return int
	 *
	 * @since 1.0.0
	 */
	public function images_count( $id ) {

		$images = get_post_meta( $id, 'foogallery_attachments', true );
		$count  = count( $images );

		return $count;
	}

	/**
	 * Imports a gallery from FooGallery to Modula
	 *
	 * @param string $gallery_id
	 *
	 * @since 1.0.0
	 */
	public function foogallery_gallery_import( $gallery_id = '' ) {

		global $wpdb;
		$modula_importer = Modula_Importer::get_instance();

		// Set max execution time so we don't timeout
		ini_set( 'max_execution_time', 0 );
		set_time_limit( 0 );

		// If no gallery ID, get from AJAX request
		if ( empty( $gallery_id ) ) {

			// Run a security check first.
			check_ajax_referer( 'modula-importer', 'nonce' );

			if ( ! isset( $_POST['id'] ) ) {
				$this->modula_import_result( false, esc_html__( 'No gallery was selected', 'modula-foo-migrator' ), false );
			}

			$gallery_id = absint( $_POST['id'] );

		}

		$imported_galleries = get_option( 'modula_importer' );
		// If already migrated don't migrate

		if ( isset( $imported_galleries['galleries']['foogallery'][ $gallery_id ] ) ) {

			$modula_gallery = get_post_type( $imported_galleries['galleries']['foogallery'][ $gallery_id ] );

			if ( 'modula-gallery' == $modula_gallery ) {
				// Trigger delete function if option is set to delete
				if ( isset( $_POST['clean'] ) && 'delete' == sanitize_text_field( wp_unslash( $_POST['clean'] ) ) ) {
					$this->clean_entries( $gallery_id );
				}
				$this->modula_import_result( false, esc_html__( 'Gallery already migrated!', 'modula-foo-migrator' ), false );
			}
		}


		// Get all images attached to the gallery
		$modula_images = array();

		// get gallery data so we can get title, description and alt from FooGallery
		$foogallery_gallery_data          = $modula_importer->prepare_images( 'foogallery', $gallery_id );
		$foogallery_settings              = get_post_meta( $gallery_id, '_foogallery_settings', true );
		$foogallery_template              = get_post_meta( $gallery_id, 'foogallery_template', true );
		$foogallery_settings['grid_type'] = $foogallery_template;

		if ( isset( $foogallery_gallery_data ) && count( $foogallery_gallery_data ) > 0 ) {
			foreach ( $foogallery_gallery_data as $imageID ) {

				$image                    = get_post( $imageID );
				$foogallery_image_title   = ( ! isset( $image->post_title ) || '' != $image->post_title ) ? $image->post_title : '';
				$foogallery_image_caption = ( ! isset( $image->post_content ) || '' != $image->post_content ) ? $image->post_content : wp_get_attachment_caption( $imageID );
				$foogallery_image_alt     = get_post_meta( $imageID, '_wp_attachment_image_alt', true );
				$foogallery_image_url     = ( get_post_meta( $imageID, '_foogallery_custom_url', true ) ) ? get_post_meta( $imageID, '_foogallery_custom_url', true ) : '';
				$target                   = ( get_post_meta( $imageID, '_foogallery_custom_target', true ) && '_blank' == get_post_meta( $imageID, '_foogallery_custom_target', true ) ) ? 1 : 0;
				$image_url                = wp_get_attachment_url( $imageID );

				if ( $foogallery_image_url == $image_url ) {
					$foogallery_image_url = '';
				}

				$modula_images[] = apply_filters( 'modula_migrate_image_data', array(
					'id'          => absint( $imageID ),
					'alt'         => sanitize_text_field( $foogallery_image_alt ),
					'title'       => sanitize_text_field( $foogallery_image_title ),
					'description' => wp_filter_post_kses( $foogallery_image_caption ),
					'halign'      => 'center',
					'valign'      => 'middle',
					'link'        => esc_url_raw( $foogallery_image_url ),
					'target'      => absint( $target ),
					'width'       => 2,
					'height'      => 2,
					'filters'     => ''
				), $image, $foogallery_settings, 'foogallery' );
			}
		}

		if ( count( $modula_images ) == 0 ) {
			// Trigger delete function if option is set to delete
			if ( isset( $_POST['clean'] ) && 'delete' == $_POST['clean'] ) {
				$this->clean_entries( $gallery_id );
			}
			$this->modula_import_result( false, esc_html__( 'No images found in gallery. Skipping gallery...', 'modula-foo-migrator' ), false );
		}

		$grid             = 'grid';
		$last_row_align   = 'center';
		$grid_type        = 'automatic';
		$gutter           = 10;
		$thumbnail_size   = 300;
		$grid_image_size  = 'medium';
		$thumbnail_size_w = '640';
		$thumbnail_size_h = '480';

		switch ( $foogallery_template ) {
			case 'default':
				$gutter           = $foogallery_settings['default_spacing'];
				$thumbnail_size_w = $foogallery_settings['default_thumbnail_dimensions']['width'];
				$thumbnail_size_h = $foogallery_settings['default_thumbnail_dimensions']['height'];
				$grid_image_size  = 'custom';
				break;
			case 'image-viewer':
				$grid             = 'creative-gallery';
				$thumbnail_size_w = $foogallery_settings['image-viewer_thumbnail_size']['width'];
				$thumbnail_size_h = $foogallery_settings['image-viewer_thumbnail_size']['height'];
				$grid_image_size  = 'custom';
				break;
			case 'justified':
				$gutter = $foogallery_settings['justified_margins'];
				break;
			case 'masonry':
				if ( 'fixed' != $foogallery_settings['masonry_layout'] ) {
					$grid_type = $foogallery_settings['masonry_layout'];
				}
				$thumbnail_size = $foogallery_settings['masonry_thumbnail_width'];
				if ( isset( $foogallery_settings['masonry_layout'] ) && 'fixed' == $foogallery_settings['masonry_layout'] ) {
					$gutter = $foogallery_settings['masonry_gutter_width'];
				}
				break;
			case 'simple_portfolio':
				$thumbnail_size_w = $foogallery_settings['simple_portfolio_thumbnail_dimensions']['width'];
				$thumbnail_size_h = $foogallery_settings['simple_portfolio_thumbnail_dimensions']['height'];
				$grid_image_size  = 'custom';
				break;
			case 'thumbnail':
				$thumbnail_size = $foogallery_settings['thumbnail_thumbnail_dimensions']['width'];
				break;
		}

		if ( isset( $foogallery_settings['justified_last_row'] ) && 'hide' != $foogallery_settings['justified_last_row'] ) {
			$last_row_align = $foogallery_settings['justified_last_row'];
		}

		if ( isset( $foogallery_settings['masonry_layout'] ) && 'fixed' != $foogallery_settings['masonry_layout'] ) {
			$grid_type = str_replace( 'col', '', $foogallery_settings['masonry_layout'] );
		}

		$modula_settings = apply_filters( 'modula_migrate_gallery_data', array(
			'type'                  => $grid,
			'grid_type'             => sanitize_text_field( $grid_type ),
			'gutter'                => absint( $gutter ),
			'grid_row_height'       => ( isset( $foogallery_settings['justified_row_height'] ) ) ? absint( $foogallery_settings['justified_row_height'] ) : '250',
			'grid_justify_last_row' => sanitize_text_field( $last_row_align ),
			'lazy_load'             => ( isset( $foogallery_settings['default_lazyload'] ) && 'disabled' != $foogallery_settings['default_lazyload'] ),
			'grid_image_size'       => sanitize_text_field( $grid_image_size ),
			'grid_image_dimensions' => array(
				'width'  => ( isset( $thumbnail_size ) ) ? sanitize_text_field( $thumbnail_size ) : sanitize_text_field( $thumbnail_size_w ),
				'height' => sanitize_text_field( $thumbnail_size_h )
			)
		), $foogallery_settings, 'foogallery' );

		// Get Modula Gallery defaults, used to set modula-settings metadata
		$modula_settings = wp_parse_args( $modula_settings, Modula_CPT_Fields_Helper::get_defaults() );

		// Create Modula CPT
		$modula_gallery_id = wp_insert_post(
			array(
				'post_type'   => 'modula-gallery',
				'post_status' => 'publish',
				'post_title'  => sanitize_text_field( get_the_title( $gallery_id ) ),
			)
		);

		// Attach meta modula-settings to Modula CPT
		update_post_meta( $modula_gallery_id, 'modula-settings', $modula_settings );
		// Attach meta modula-images to Modula CPT
		update_post_meta( $modula_gallery_id, 'modula-images', $modula_images );

		$foogallery_shortcodes = '[foogallery id="' . $gallery_id . '"]';
		$modula_shortcode      = '[modula id="' . $modula_gallery_id . '"]';

		// Replace Foogallery id shortcode with Modula Shortcode in Posts, Pages and CPTs
		$sql = $wpdb->prepare( "UPDATE " . $wpdb->prefix . "posts SET post_content = REPLACE(post_content, '%s', '%s')",
			$foogallery_shortcodes, $modula_shortcode );
		$wpdb->query( $sql );

		// Trigger delete function if option is set to delete
		if ( isset( $_POST['clean'] ) && 'delete' == $_POST['clean'] ) {
			$this->clean_entries( $gallery_id );
		}

		$this->modula_import_result( true, wp_kses_post( '<i class="imported-check dashicons dashicons-yes"></i>' ), $modula_gallery_id );
	}

	/**
	 * Update imported galleries
	 *
	 *
	 * @since 1.0.0
	 */
	public function update_imported() {

		check_ajax_referer( 'modula-importer', 'nonce' );

		if ( ! isset( $_POST['galleries'] ) ) {
			wp_send_json_error();
		}
		
		$galleries = array_map( 'absint', wp_unslash( $_POST['galleries'] ) );

		$importer_settings = get_option( 'modula_importer' );

		// first check if array
		if ( ! is_array( $importer_settings ) ) {
			$importer_settings = array();
		}

		if ( ! isset( $importer_settings['galleries']['foogallery'] ) ) {
			$importer_settings['galleries']['foogallery'] = array();
		}

		if ( is_array( $galleries ) && count( $galleries ) > 0 ) {
			foreach ( $galleries as $key => $value ) {
				$importer_settings['galleries']['foogallery'][ absint( $key ) ] = absint( $value );
			}
		}

		// Remember that this gallery has been imported
		update_option( 'modula_importer', $importer_settings );

		// Set url for migration complete
		$url = admin_url( 'edit.php?post_type=modula-gallery&page=modula&modula-tab=importer&migration=complete' );

		if ( isset( $_POST['clean'] ) && 'delete' == $_POST['clean'] ) {
			// Set url for migration and cleaning complete
			$url = admin_url( 'edit.php?post_type=modula-gallery&page=modula&modula-tab=importer&migration=complete&delete=complete' );
		}

		echo $url;
		wp_die();
	}

	/**
	 * Returns result
	 *
	 * @param $success
	 * @param $message
	 * @param $gallery_id
	 *
	 * @since 1.0.0
	 */
	public function modula_import_result( $success, $message, $gallery_id = false ) {
		echo json_encode( array(
			'success'           => (bool) $success,
			'message'           => (string) $message,
			'modula_gallery_id' => $gallery_id
		) );
		die;
	}

	/**
	 * Delete old entries from database
	 *
	 * @param $gallery_id
	 *
	 * @since 1.0.0
	 */
	public function clean_entries( $gallery_id ) {
		global $wpdb;
		$sql      = $wpdb->prepare( "DELETE FROM  $wpdb->posts WHERE ID = $gallery_id" );
		$sql_meta = $wpdb->prepare( "DELETE FROM  $wpdb->postmeta WHERE post_id = $gallery_id" );
		$wpdb->query( $sql );
		$wpdb->query( $sql_meta );
	}

	/**
	 * Add FooGallery source to Modula gallery sources
	 *
	 * @param $sources
	 *
	 * @return mixed
	 * @since 1.0.0
	 */
	public function add_source( $sources ) {

		global $wpdb;

		$foogallery = $wpdb->get_results( " SELECT COUNT(ID) FROM " . $wpdb->prefix . "posts WHERE post_type ='foogallery'" );

		$foo_return = ( null != $foogallery ) ? get_object_vars( $foogallery[0] ) : false;

		if ( $foogallery && null != $foogallery && ! empty( $foogallery ) && $foo_return && '0' != $foo_return['COUNT(ID)'] ) {
			$sources['foogallery'] = 'FooGallery';
		}

		return $sources;
	}

	/**
	 * Add our source galleries
	 *
	 * @param $galleries
	 *
	 * @return false|mixed
	 * @since 1.0.0
	 */
	public function add_source_galleries( $galleries ) {

		return $this->get_galleries();
	}

	/**
	 * Return Gallery info
	 *
	 * @param $g_gallery
	 * @param $gallery
	 * @param $import_settings
	 *
	 * @return array
	 * @since 1.0.0
	 */
	public function add_gallery_info( $g_gallery, $gallery, $import_settings ) {

		$modula_gallery = get_post_type( $import_settings['galleries']['foogallery'][ $gallery->ID ] );
		$imported       = false;

		if ( isset( $import_settings['galleries']['foogallery'] ) && 'modula-gallery' === $modula_gallery ) {
			$imported = true;
		}

		return array(
			'id'       => $gallery->ID,
			'imported' => $imported,
			'title'    => '<a href="' . admin_url( '/post.php?post=' . $gallery->ID . '&action=edit' ) . '" target="_blank">' . esc_html( $gallery->post_title ) . '</a>',
			'count'    => $this->images_count( $gallery->ID )
		);
	}

	/**
	 * Return FooGallery images
	 *
	 * @param $images
	 * @param $data
	 *
	 * @return mixed
	 *
	 * @since 1.0.0
	 */
	public function migrator_images( $images, $data ) {

		return get_post_meta( $data, 'foogallery_attachments', true );

	}

	/**
	 * Set localization for the plugin
	 *
	 * @return void
	 */
	public function set_locale() {
		load_plugin_textdomain( 'modula-foo-migrator', false, dirname( MODULA_FOO_MIGRATOR_FILE ) . '/languages' );
	}

}