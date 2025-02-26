<?php

namespace Soft_Accordion;

if ( ! defined( 'ABSPATH' ) ) {
	exit;
}


/**
 * Ajax Class
 */
class Ajax {

	/**
	 * Instance of the class.
	 *
	 * @var self|null
	 */
	protected static $instance = null;

	/**
	 * Constructor
	 */
	public function __construct() {
		// save accordion data.
		add_action( 'wp_ajax_handle_save_accordion_data', array( $this, 'handle_save_accordion_data' ) );
		add_action( 'wp_ajax_nopriv_handle_save_accordion_data', array( $this, 'handle_save_accordion_data' ) );

		// save edit accordion data.
		add_action( 'wp_ajax_handle_save_accordion_edit_data', array( $this, 'handle_save_accordion_edit_data' ) );
		add_action(
			'wp_ajax_nopriv_handle_save_accordion_edit_data',
			array(
				$this,
				'handle_save_accordion_edit_data',
			)
		);

		// update status.
		add_action( 'wp_ajax_handle_toggle_status', array( $this, 'handle_toggle_status' ) );
		add_action( 'wp_ajax_nopriv_handle_toggle_status', array( $this, 'handle_toggle_status' ) );

		// delete accordion data by id.
		add_action( 'wp_ajax_handle_delete_accordion_data', array( $this, 'handle_delete_accordion_data' ) );
		add_action( 'wp_ajax_nopriv_handle_delete_accordion_data', array( $this, 'handle_delete_accordion_data' ) );

		// get accordion data
		add_action( 'wp_ajax_handle_get_accordion_data', array( $this, 'handle_get_accordion_data' ) );
		add_action( 'wp_ajax_nopriv_handle_get_accordion_data', array( $this, 'handle_get_accordion_data' ) );

		add_action( 'wp_ajax_handle_accordion_fetch_posts', array( $this, 'handle_accordion_fetch_posts' ) );
		add_action( 'wp_ajax_nopriv_handle_accordion_fetch_posts', array( $this, 'handle_accordion_fetch_posts' ) );

		// Hide Recommended Plugins
		add_action( 'wp_ajax_soft_accordion_hide_recommended_plugins', array( $this, 'hide_recommended_plugins' ) );

		// Update Settings.
		add_action( 'wp_ajax_soft_accordion_update_settings', array( $this, 'update_settings' ) );

		// Get exports settings.
		add_action( 'wp_ajax_soft_accordion_get_export_data', array( $this, 'export_data' ) );

		// import settings.
		add_action( 'wp_ajax_soft_accordion_import_data', array( $this, 'import_data' ) );
	}

	/**
	 * Fetch accordion posts
	 */
	public function handle_accordion_fetch_posts() {
		// Verify the nonce for security
		if ( ! check_ajax_referer( 'soft_accordion', 'nonce', false ) ) {
			wp_send_json_error( array( 'message' => 'Invalid nonce' ) );
		}

		// Decode the post_items JSON data
		$post_items = isset( $_POST['post_items'] ) ? json_decode( stripslashes( $_POST['post_items'] ), true ) : array();

		// Extract parameters from post_items
		$post_type      = $post_items['type'] ?? 'posts';
		$filter         = $post_items['filter'] ?? 'latest';
		$taxonomy       = $post_items['taxonomy'] ?? 'category';
		$category_terms = $post_items['categoryTerms'] ?? array();
		$tag_terms      = $post_items['tagTerms'] ?? array();
		$format_terms   = $post_items['formatTerms'] ?? array();
		$operator       = $post_items['operator'] ?? 'in';
		$orderby        = $post_items['orderBy'] ?? 'date';
		$order          = $post_items['order'] ?? 'ASC';
		$limit          = $post_items['limit'] ?? 10;
		$post_data      = $post_items['postData'] ?? array();
		$page_data      = $post_items['pageData'] ?? array();

		// Base query arguments
		$args = array(
			'post_type'      => ( $post_type === 'posts' ) ? 'post' : 'page',
			'posts_per_page' => $limit,
			'orderby'        => $orderby,
			'order'          => $order,
		);

		// Handle custom post/page selection
		if ( $filter === 'custom' ) {
			if ( $post_type === 'posts' && ! empty( $post_data ) ) {
				$args['post__in'] = array_column( $post_data, 'value' ); // Use selected post IDs
			} elseif ( $post_type === 'pages' && ! empty( $page_data ) ) {
				$args['post__in'] = array_column( $page_data, 'value' ); // Use selected page IDs
			}
		}

		// Handle taxonomy filtering
		if ( $filter === 'taxonomy' && $post_type === 'posts' ) {
			$tax_query = array();

			// Add category terms
			if ( $taxonomy === 'category' && ! empty( $category_terms ) ) {
				$tax_query[] = array(
					'taxonomy' => 'category',
					'field'    => 'slug',
					'terms'    => array_column( $category_terms, 'value' ),
					'operator' => strtoupper( $operator ),
				);
			}

			// Add tag terms
			if ( $taxonomy === 'posttag' && ! empty( $tag_terms ) ) {
				$tax_query[] = array(
					'taxonomy' => 'post_tag',
					'field'    => 'slug',
					'terms'    => array_column( $tag_terms, 'value' ),
					'operator' => strtoupper( $operator ),
				);
			}

			// Add post format terms
			if ( $taxonomy === 'postformat' && ! empty( $format_terms ) ) {
				$tax_query[] = array(
					'taxonomy' => 'post_format',
					'field'    => 'slug',
					'terms'    => array_column( $format_terms, 'value' ),
					'operator' => strtoupper( $operator ),
				);
			}

			// Add tax_query to args if not empty
			if ( ! empty( $tax_query ) ) {
				$args['tax_query'] = $tax_query;
			}
		}

		// Execute the query
		$query = new \WP_Query( $args );

		// Prepare the response
		$response = array();
		if ( $query->have_posts() ) {
			while ( $query->have_posts() ) {
				$query->the_post();
				$response[] = array(
					'id'    => get_the_ID(),
					'title' => get_the_title(),
				);
			}
		} else {
			wp_send_json_error( array( 'message' => 'No posts found.' ) );

			return;
		}

		// Reset post data
		wp_reset_postdata();

		// Send the response
		wp_send_json_success( $response );
	}

	/**
	 * Get accordion data
	 */
	public function handle_get_accordion_data() {
		global $wpdb;
		$table_name = $wpdb->prefix . 'soft_accordion';

		$results = $wpdb->get_results( "SELECT * FROM $table_name", ARRAY_A );

		if ( $results === null ) {
			wp_send_json_error( array( 'message' => $wpdb->last_error ) );
		}

		foreach ( $results as &$row ) {
			$row['is_active']   = intval( $row['is_active'] );
			$row['title']       = sanitize_text_field( $row['title'] );
			$row['type']        = sanitize_text_field( $row['type'] );
			$row['custom_data'] = soft_accordion_sanitize_array( json_decode( $row['custom_data'], true ) );
			$row['post_data']   = soft_accordion_sanitize_array( json_decode( $row['post_data'], true ) );
			$row['settings']    = soft_accordion_sanitize_array( json_decode( $row['settings'], true ) );
		}

		wp_send_json_success( $results );
	}


	/**
	 * Delete accordion data by id
	 */
	public function handle_delete_accordion_data() {
		if ( ! check_ajax_referer( 'soft_accordion', 'nonce', false ) ) {
			wp_send_json_error( array( 'message' => 'Invalid nonce' ) );
		}

		global $wpdb;
		$table_name = $wpdb->prefix . 'soft_accordion';

		$ids = isset( $_POST['accordion_id'] ) ? $_POST['accordion_id'] : null;

		if ( empty( $ids ) ) {
			wp_send_json_error( array( 'message' => 'No accordion ID provided' ) );
		}

		$ids = is_array( $ids ) ? array_map( 'intval', $ids ) : array( intval( $ids ) );

		$ids = array_filter( $ids, fn( $id ) => $id > 0 );

		if ( empty( $ids ) ) {
			wp_send_json_error( array( 'message' => 'Invalid accordion ID(s)' ) );
		}

		$placeholders = implode( ',', array_fill( 0, count( $ids ), '%d' ) );

		$query = $wpdb->query(
			$wpdb->prepare(
				"DELETE FROM $table_name WHERE id IN ($placeholders)",
				$ids
			)
		);

		if ( $query ) {
			wp_send_json_success( array( 'message' => 'Accordion(s) deleted successfully' ) );
		} else {
			wp_send_json_error( array( 'message' => 'Failed to delete accordion(s)' ) );
		}
	}


	/**
	 * Handle toggle status
	 *
	 * @return void
	 */
	public function handle_toggle_status() {
		if ( ! check_ajax_referer( 'soft_accordion', 'nonce', false ) ) {
			wp_send_json_error( array( 'message' => 'Invalid nonce' ) );
		}

		$id     = isset( $_POST['updated_id'] ) ? intval( $_POST['updated_id'] ) : 0;
		$status = isset( $_POST['updated_is_active'] ) ? intval( $_POST['updated_is_active'] ) : 1;

		if ( $id <= 0 ) {
			wp_send_json_error( array( 'message' => 'Invalid ID provided.' ) );
		}

		global $wpdb;
		$table_name = $wpdb->prefix . 'soft_accordion';

		$update_data = array( 'is_active' => $status );
		$where       = array( 'id' => $id );

		$updated = $wpdb->update( $table_name, $update_data, $where, array( '%d' ), array( '%d' ) );

		if ( $updated !== false ) {
			wp_send_json_success( array( 'message' => 'Accordion updated successfully.' ) );
		} else {
			wp_send_json_error( array( 'message' => 'Failed to update accordion.' ) );
		}
	}

	/**
	 * Save edit accordion data
	 */
	public function handle_save_accordion_edit_data() {
		// Verify nonce
		if ( ! check_ajax_referer( 'soft_accordion', 'nonce', false ) ) {
			wp_send_json_error( array( 'message' => 'Security check failed: Invalid nonce.' ) );
		}

		global $wpdb;
		$table_name = $wpdb->prefix . 'soft_accordion';

		// Validate and sanitize inputs
		$id = isset( $_POST['edit_accordion_id'] ) ? intval( $_POST['edit_accordion_id'] ) : 0;
		if ( $id <= 0 ) {
			wp_send_json_error( array( 'message' => 'Invalid accordion ID provided.' ) );
		}

		$title       = isset( $_POST['edit_main_title'] ) ? sanitize_text_field( $_POST['edit_main_title'] ) : '';
		$type        = isset( $_POST['edit_accordion_type'] ) ? sanitize_text_field( $_POST['edit_accordion_type'] ) : '';
		$custom_data = isset( $_POST['edit_custom_accordion_data'] ) ? soft_accordion_sanitize_array( wp_unslash( $_POST['edit_custom_accordion_data'] ) ) : array();
		$post_data   = isset( $_POST['edit_post_accordion_data'] ) ? soft_accordion_sanitize_array( wp_unslash( $_POST['edit_post_accordion_data'] ) ) : null;
		$settings    = isset( $_POST['edit_accordion_settings'] ) ? soft_accordion_sanitize_array( wp_unslash( $_POST['edit_accordion_settings'] ) ) : array();

		// Prepare data for update
		$update_data = array(
			'title'       => $title,
			'type'        => $type,
			'custom_data' => wp_json_encode( $custom_data ),
			'post_data'   => wp_json_encode( $post_data ),
			'settings'    => wp_json_encode( $settings ),
		);

		$where = array( 'id' => $id );

		// Perform update
		$updated = $wpdb->update(
			$table_name,
			$update_data,
			$where,
			array( '%s', '%s', '%s', '%s', '%s' ),
			array( '%d' )
		);

		// Handle response
		if ( $wpdb->last_error ) {
			// Log error for debugging
			error_log( 'Accordion update error: ' . $wpdb->last_error );

			wp_send_json_error( array( 'message' => 'Database error occurred: ' . $wpdb->last_error ) );
		} elseif ( $updated === false ) {
			// False means something went wrong with the query
			wp_send_json_error( array( 'message' => 'Failed to update accordion data. Please try again later.' ) );
		} elseif ( $updated === 0 ) {
			// No rows affected (no changes made)
			wp_send_json_success( array( 'message' => 'No changes were made to the accordion.' ) );
		} else {
			// Rows successfully updated
			wp_send_json_success( array( 'message' => 'Accordion updated successfully.' ) );
		}
	}

	/**
	 * Save accordion data
	 */
	public function handle_save_accordion_data() {
		// Verify nonce
		if ( ! check_ajax_referer( 'soft_accordion', 'nonce', false ) ) {
			wp_send_json_error( array( 'message' => 'Security check failed: Invalid nonce' ) );
		}

		// Access global database variable
		global $wpdb;
		$table_name = $wpdb->prefix . 'soft_accordion';

		// Sanitize inputs
		$title       = isset( $_POST['main_title'] ) ? sanitize_text_field( $_POST['main_title'] ) : '';
		$type        = isset( $_POST['accordion_type'] ) ? sanitize_text_field( $_POST['accordion_type'] ) : '';
		$custom_data = isset( $_POST['custom_accordion_data'] ) && is_array( $_POST['custom_accordion_data'] )
			? soft_accordion_sanitize_array( wp_unslash( $_POST['custom_accordion_data'] ) )
			: array();
		$post_data   = isset( $_POST['post_accordion_data'] ) && is_array( $_POST['post_accordion_data'] )
			? soft_accordion_sanitize_array( wp_unslash( $_POST['post_accordion_data'] ) )
			: null;
		$settings    = isset( $_POST['accordion_settings'] ) && is_array( $_POST['accordion_settings'] )
			? soft_accordion_sanitize_array( wp_unslash( $_POST['accordion_settings'] ) )
			: array();

		// Insert data into database
		$inserted = $wpdb->insert(
			$table_name,
			array(
				'title'       => $title,
				'type'        => $type,
				'custom_data' => wp_json_encode( $custom_data ),
				'post_data'   => wp_json_encode( $post_data ),
				'settings'    => wp_json_encode( $settings ),
			),
			array( '%s', '%s', '%s', '%s', '%s' )
		);

		// Handle database response
		if ( $inserted ) {
			wp_send_json_success(
				array(
					'id'      => $wpdb->insert_id,
					'message' => 'Accordion data saved successfully.',
				)
			);
		} else {
			error_log( 'Accordion data save error: ' . $wpdb->last_error );

			wp_send_json_error(
				array(
					'message' => 'Failed to save accordion data. Please try again later.',
				)
			);
		}
	}

	/**
	 * Hide recommended plugins
	 */
	public function hide_recommended_plugins() {
		// Verify nonce
		if ( ! check_ajax_referer( 'soft_accordion', 'nonce', false ) ) {
			wp_send_json_error( __( 'Invalid nonce', 'soft-accordion' ) );
		}

		// check user permission
		if ( ! current_user_can( 'manage_options' ) ) {
			wp_send_json_error( 'Invalid user' );
		}

		update_option( 'soft_accordion_hide_recommended_plugins', true );

		wp_send_json_success();
	}

	/**
	 * Update Settings
	 *
	 * @return void
	 */
	public function update_settings() {
		// Check nonce.
		if ( ! check_ajax_referer( 'soft_accordion', 'nonce', false ) ) {
			wp_send_json_error( __( 'Invalid nonce', 'soft-accordion' ) );
		}

		// Check permission.
		if ( ! current_user_can( 'manage_options' ) ) {
			wp_send_json_error( __( 'You do not have permission to update settings', 'soft-accordion' ) );
		}

		$data = ! empty( $_POST['data'] ) ? soft_accordion_sanitize_array( wp_unslash( $_POST['data'] ) ) : array();

		update_option( 'soft_accordion_settings', $data );

		wp_send_json_success( array( 'success' => true ) );
	}

	/**
	 * Export data
	 */
	public function export_data() {
		// Check nonce.
		if ( ! check_ajax_referer( 'soft_accordion', 'nonce', false ) ) {
			wp_send_json_error( __( 'Invalid nonce', 'soft-accordion' ) );
		}

		// Check permission.
		if ( ! current_user_can( 'manage_options' ) ) {
			wp_send_json_error( __( 'You do not have permission to export data', 'soft-accordion' ) );
		}

		$type = ! empty( $_POST['type'] ) ? sanitize_text_field( $_POST['type'] ) : 'all';

		$export_data = array();

		// Settings.
		if ( 'all' == $type || 'settings' == $type ) {
			$export_data['settings'] = soft_accordion_get_settings();
		}

		// Accordions.
		if ( 'all' == $type || 'accordions' == $type ) {
			$export_data['accordions'] = soft_accordion_get_accordions();
		}

		wp_send_json_success( $export_data );
	}

	/**
	 * Import Data
	 */
	public function import_data() {
		// Check nonce.
		if ( ! check_ajax_referer( 'soft_accordion', 'nonce', false ) ) {
			wp_send_json_error( __( 'Invalid nonce', 'soft-accordion' ) );
		}

		// Check permission.
		if ( ! current_user_can( 'manage_options' ) ) {
			wp_send_json_error( __( 'You do not have permission to import data', 'soft-accordion' ) );
		}

		$settings   = ! empty( $_POST['data']['settings'] ) ? soft_accordion_sanitize_array( $_POST['data']['settings'] ) : array();
		$accordions = ! empty( $_POST['data']['accordions'] ) ? soft_accordion_sanitize_array( $_POST['data']['accordions'] ) : array();

		if ( ! empty( $settings ) ) {
			update_option( 'soft_accordion_settings', $settings );
		}

		if ( ! empty( $accordions ) ) {
			global $wpdb;
			$table = $wpdb->prefix . 'soft_accordion';

			$wpdb->query( "TRUNCATE TABLE $table" );

			foreach ( $accordions as $accordion ) {
				$this->update_accordion( $accordion );
			}
		}

		wp_send_json_success();
	}

	/**
	 * Update accordion
	 *
	 * @param strings $data data.
	 */
	public function update_accordion( $data = null ) {

		// Check nonce.
		if ( ! check_ajax_referer( 'soft_accordion', 'nonce', false ) ) {
			wp_send_json_error( __( 'Invalid nonce', 'soft-accordion' ) );
		}

		// Check permission.
		if ( ! current_user_can( 'manage_options' ) ) {
			wp_send_json_error( __( 'You do not have permission to update this player', 'soft-accordion' ) );
		}

		if ( ! $data ) {
			$nonce = ! empty( $_POST['nonce'] ) ? sanitize_text_field( $_POST['nonce'] ) : '';

			if ( ! wp_verify_nonce( $nonce, 'soft-accordion' ) ) {
				wp_send_json_error( __( 'Invalid nonce', 'soft-accordion' ) );
			}
		}

		$posted = ! $data ? json_decode( base64_decode( $_POST['data'] ), 1 ) : $data;

		$id          = ! empty( $posted['id'] ) ? intval( $posted['id'] ) : 0;
		$is_active   = ! empty( $posted['is_active'] ) ? intval( $posted['is_active'] ) : '';
		$title       = ! empty( $posted['title'] ) ? sanitize_text_field( $posted['title'] ) : '';
		$type        = ! empty( $posted['type'] ) ? sanitize_text_field( $posted['type'] ) : '';
		$custom_data = ! empty( $posted['custom_data'] ) ? wp_unslash( $posted['custom_data'] ) : array();
		$post_data   = ! empty( $posted['post_data'] ) ? wp_unslash( $posted['post_data'] ) : '';
		$settings    = ! empty( $posted['settings'] ) ? wp_unslash( $posted['settings'] ) : '';
		$created_at  = ! empty( $posted['title'] ) ? sanitize_text_field( $posted['created_at'] ) : '';

		global $wpdb;
		$table = $wpdb->prefix . 'soft_accordion';

		$insert_data = array(
			'is_active'   => $is_active,
			'title'       => $title,
			'type'        => $type,
			'custom_data' => $custom_data,
			'post_data'   => $post_data,
			'settings'    => $settings,
			'created_at'  => $created_at,
		);

		if ( $id > 0 ) {
			$insert_data['id'] = $id;
		}

		if ( $id > 0 && empty( $data ) ) {
			$wpdb->update( $table, $insert_data, array( 'id' => $id ) );
		} else {
			$wpdb->insert( $table, $insert_data );
			$id = $wpdb->insert_id;
		}

		$insert_data['id'] = $id;

		if ( ! empty( $data ) ) {
			return $insert_data;
		}

		wp_send_json_success( $insert_data );
	}

	/**
	 * Get the instance of Enqueue class.
	 *
	 * @since 1.0.0
	 * @return Ajax
	 */
	public static function instance() {
		if ( is_null( self::$instance ) ) {
			self::$instance = new self();
		}

		return self::$instance;
	}
}

Ajax::instance();
