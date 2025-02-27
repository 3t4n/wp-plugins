<?php

namespace BULKYWP\Admin;

use VI_CORE\Core\Helper;

defined( 'ABSPATH' ) || exit;

class Ajax {

	protected static $instance = null;
	protected $fields;
	protected $variation_ids = [];
	protected $post_type;

	public function __construct() {
		add_action( 'wp_ajax_vi_wpbulky_ajax', [ $this, 'ajax_action' ] );
	}

	public static function instance() {
		return self::$instance == null ? self::$instance = new self() : self::$instance;
	}

	public function define_actions() {
		return [
			'set_full_screen_option',
			'load_posts',
			'save_settings',
			'add_filter_data',
			'save_posts',
			'search_tags',
			'search_posts',
			'get_meta_fields',
			'save_meta_fields',
			'auto_save_revision',
			'recover_history',
			'add_new_post',
			'view_history_point',
			'revert_history_single_post',
			'revert_history_all_posts',
			'revert_history_post_attribute',
			'load_history_page',
			'duplicate_post',
			'resize_column'
		];
	}

	public function ajax_action() {

		check_ajax_referer( 'vi_wpbulky_nonce', 'vi_wpbulky_nonce' );

		if ( empty( $_POST['sub_action'] ) || ! current_user_can( BULKYWP_CONST_F['capability'] ) ) {
			return;
		}

		$actions = $this->define_actions();

		$ajax_action = sanitize_text_field( wp_unslash( $_POST['sub_action'] ) );

		if ( ! ( in_array( $ajax_action, $actions ) && method_exists( $this, $ajax_action ) ) ) {
			wp_send_json_error( esc_html__( 'Method is not exist', 'wpbulky-wp-bulk-edit-post-types' ) );
		}

		global $wpbulky_post_type;
		$post_type = ! empty( $_POST['post_type'] ) ? sanitize_text_field( wp_unslash( $_POST['post_type'] ) ) : '';

		if ( ! $post_type ) {
			wp_send_json_error();
		}

		$wpbulky_post_type = $post_type;
		$this->post_type   = $post_type;
		$this->$ajax_action();

		wp_die();
	}

	public function resize_column() {
		check_ajax_referer( 'vi_wpbulky_nonce', 'vi_wpbulky_nonce' );
		$column_id = isset( $_POST['column_id'] ) ? sanitize_text_field( wp_unslash( $_POST['column_id'] ) ) : '';
		$column_width = isset( $_POST['column_width'] ) ? sanitize_text_field( wp_unslash( $_POST['column_width'] ) ) : '';

		$post_column_width = get_option( "vi_wpbulky_{$this->post_type}_column_width", [] );
		$post_column_width[ $column_id ] = $column_width;
		if( update_option( "vi_wpbulky_{$this->post_type}_column_width", $post_column_width ) ) {
			wp_send_json_success(esc_html__( 'Save column width successfully', 'wpbulky-wp-bulk-edit-post-types' ) );
		}else {
			wp_send_json_error( esc_html__( 'Save column width failed', 'wpbulky-wp-bulk-edit-post-types' ) );
		}

		wp_send_json_success( "Success" );
	}

	public function set_full_screen_option() {
		check_ajax_referer( 'vi_wpbulky_nonce', 'vi_wpbulky_nonce' );

		if ( empty( $_POST['status'] ) ) {
			return;
		}
		$status = sanitize_text_field( wp_unslash( $_POST['status'] ) );
		$status = $status === 'true' ? true : false;
		update_option( 'vi_wpbulky_full_screen_option', $status );
	}

	public function save_settings() {
		check_ajax_referer( 'vi_wpbulky_nonce', 'vi_wpbulky_nonce' );

		if ( isset( $_POST['fields'] ) ) {
			wp_parse_str( $_POST['fields'], $new_options );
			$new_options = BulkyWP_Data()->sanitize( $new_options );
			$old_options = get_option( "vi_wpbulky_{$this->post_type}_settings" );

			$old_edit_fields         = $old_options['edit_fields'] ?? [];
			$new_edit_fields         = $new_options['edit_fields'] ?? [];
			$old_exclude_edit_fields = $old_options['exclude_edit_fields'] ?? [];
			$new_exclude_edit_fields = $new_options['exclude_edit_fields'] ?? [];

			$edit_fields_compare         = ! empty( array_merge( array_diff( $old_edit_fields, $new_edit_fields ), array_diff( $new_edit_fields, $old_edit_fields ) ) );
			$exclude_edit_fields_compare = ! empty( array_merge( array_diff( $old_exclude_edit_fields, $new_exclude_edit_fields ), array_diff( $new_exclude_edit_fields, $old_exclude_edit_fields ) ) );

			update_option( "vi_wpbulky_{$this->post_type}_settings", $new_options );

			wp_send_json_success( [
				'settings'     => $new_options,
				'fieldsChange' => $edit_fields_compare || $exclude_edit_fields_compare
			] );
		}

	}

	public function add_new_post() {
		check_ajax_referer( 'vi_wpbulky_nonce', 'vi_wpbulky_nonce' );

		if ( empty( $_POST['post_name'] ) ) {
			return;
		}
		$post_name = sanitize_text_field( wp_unslash( $_POST['post_name'] ) );

		$pid         = wp_insert_post( [ 'post_title' => $post_name, 'post_type' => $this->post_type ] );
		$post        = get_post( $pid );
		$handle_post = Handle_Post::instance();
		$posts_data  = $handle_post->get_post_data_for_edit( $post );
		wp_send_json_success( $posts_data );
	}

	public function load_posts() {
		check_ajax_referer( 'vi_wpbulky_nonce', 'vi_wpbulky_nonce' );

		$filter   = Filters::instance();
		$settings = BulkyWP_Data()->get_settings();
		$page     = ! empty( $_POST['page'] ) ? absint( $_POST['page'] ) : 1;

		$args = [
			'post_type'      => $this->post_type,
			'posts_per_page' => $settings['posts_per_page'],
			'paged'          => $page,
			'paginate'       => true,
			'order'          => $settings['order'],
			'orderby'        => $settings['order_by'],
			'post_status'    => 'any',
		];

		$args = $filter->set_args( $args );

		if ( $this->post_type === 'attachment' ) {
			$args['post_status'] = 'inherit';
		}

		$result = new \WP_Query( $args );

		$count         = $result->found_posts;
		$max_num_pages = $result->max_num_pages;
		$found_posts   = $result->posts;

		$response_posts = $pids = $img_storage = [];

		if ( ! empty( $found_posts ) ) {
			$handle_post = Handle_Post::instance();
			foreach ( $found_posts as $post ) {
				$post_thumbnail_id = $this->post_type === 'attachment' ? $post->ID :get_post_thumbnail_id( $post );
				$thumnail          = wp_get_attachment_image_url( $post_thumbnail_id, 'post-thumbnail' );

				if ( $thumnail ) {
					$img_storage[ $post_thumbnail_id ] = $thumnail;
				}

				$response_posts[] = $handle_post->get_post_data_for_edit( $post );
			}
		}


		$respone_data = [
			'posts'         => $response_posts,
			'count'         => $count,
			'max_num_pages' => $max_num_pages,
			'img_storage'   => $img_storage,
		];

		if ( ! empty( $_POST['re_create'] ) ) {
			$columns                       = BulkyWP_Data()->get_columns_type();
			$id_mapping                    = array_keys( $columns );
			$respone_data['idMapping']     = $id_mapping;
			$respone_data['idMappingFlip'] = array_flip( $id_mapping );
			$respone_data['columns']       = wp_json_encode( array_values( $columns ) );
		}

		wp_send_json_success( $respone_data );
	}

	public function add_filter_data() {
		check_ajax_referer( 'vi_wpbulky_nonce', 'vi_wpbulky_nonce' );

		if ( empty( $_POST['filter_data'] ) ) {
			wp_send_json_error();
		}
		wp_parse_str( $_POST['filter_data'], $filter_data );
		$filter_data = BulkyWP_Data()->sanitize( $filter_data );
		$user_id     = get_current_user_id();
		set_transient( "vi_wpbulky_{$this->post_type}_filter_data_{$user_id}", $filter_data, DAY_IN_SECONDS );

		$this->load_posts();
	}

	public function save_posts() {
		check_ajax_referer( 'vi_wpbulky_nonce', 'vi_wpbulky_nonce' );

		$posts       = isset( $_POST['posts'] ) ? json_decode( stripslashes( $_POST['posts'] ), true ) : '';
		$trash_ids   = ! empty( $_POST['trash'] ) ? Helper::clean( wp_unslash( $_POST['trash'] ) ) : '';
		$untrash_ids = ! empty( $_POST['untrash'] ) ? Helper::clean( wp_unslash( $_POST['untrash'] ) ) : '';

		$response = [];

		if ( $untrash_ids ) {
			array_map( 'wp_untrash_post', $untrash_ids );
		}

		$this->fields = BulkyWP_Data()->get_fields_for_parse_post();
		$handle_post  = Handle_Post::instance();

		if ( ! empty( $posts ) && is_array( $posts ) ) {
			foreach ( $posts as $post_data ) {
				if ( empty( $post_data[0] ) ) {
					continue;
				}
				$pid = $post_data[0] ?? '';

				$post = get_post( $pid );

				if ( ! is_object( $post ) ) {
					continue;
				}

				$update['post_type'] = $this->post_type;
				$post_name = $post_title = '';
				foreach ( $post_data as $key => $value ) {
					$type = $this->fields[ $key ] ?? '';

					if ( $type === 'post_name' ) {
						$post_name =  $value;
					}

					if ( $type === 'post_title' ) {
						$post_title = $value;
					}

					if ( in_array( $type, [ 'post_content', 'post_excerpt' ] ) ) {
						$value = wp_kses_post( ( $value ) );
					}
					$handle_post->parse_post_data_to_save( $update, $pid, $type, $value );
				}
				if ( empty( $post_name ) && ! empty( $post_title ) ) {
					$update['post_name'] = $this->generate_unique_slug( sanitize_title( $post_title ) );
				}

				wp_update_post( $update );
			}
		}

		if ( $trash_ids ) {
			foreach ( $trash_ids as $pid ) {
				wp_trash_post( $pid );
			}
		}

		wp_send_json_success( $response );
	}

	public function search_tags() {
		check_ajax_referer( 'vi_wpbulky_nonce', 'vi_wpbulky_nonce' );

		$search = isset( $_POST['search'] ) ? sanitize_text_field( wp_unslash( $_POST['search'] ) ) : '';
		$tags   = get_tags( [
			'taxonomy'   => 'post_tag',
			'search'     => $search,
			'hide_empty' => false,
		] );

		$r = [];
		if ( ! empty( $tags ) ) {
			foreach ( $tags as $tag ) {
				$r[] = [ 'id' => $tag->term_id, 'text' => $tag->name ];
			}
		}

		wp_send_json( $r );
	}

	public function get_meta_fields() {
		check_ajax_referer( 'vi_wpbulky_nonce', 'vi_wpbulky_nonce' );

		$current_meta_fields = isset( $_POST['current_meta_fields'] ) ? Helper::clean( wp_unslash( $_POST['current_meta_fields'] ) ) : [];

		global $wpdb;

		$query = "select distinct postmeta.meta_key, postmeta.meta_value from {$wpdb->postmeta} as postmeta 
					left join {$wpdb->posts} as posts on(postmeta.post_id = posts.ID) 
					where posts.post_type = '{$this->post_type}'  and postmeta.meta_value is not null 
					group by postmeta.meta_key";

		$metadata = $wpdb->get_results( $query, ARRAY_A ); //phpcs:ignore WordPress.DB.PreparedSQL.NotPrepared,WordPress.DB.DirectDatabaseQuery.DirectQuery,WordPress.DB.DirectDatabaseQuery.NoCaching
		$meta_arr = [];

		if ( ! empty( $metadata ) && is_array( $metadata ) ) {
			foreach ( $metadata as $meta ) {
				$meta_value = $meta['meta_value'];
				$meta_key   = $meta['meta_key'];

				$meta_arr[ $meta_key ]['meta_value'] = $meta_value; //@codingStandardsIgnoreLine

				if ( ! $meta_value ) {
					$meta_arr[ $meta_key ]['input_type'] = 'textinput';
					continue;
				}

				$meta_value_unserialize = maybe_unserialize( $meta_value );
				if ( is_array( $meta_value_unserialize ) ) {
					$meta_arr[ $meta_key ]['input_type'] = 'array';
					continue;
				}

				$meta_value_json = json_decode( $meta_value, true );
				if ( is_array( $meta_value_json ) ) {
					$meta_arr[ $meta_key ]['input_type'] = 'json';
					continue;
				}

				$meta_arr[ $meta_key ]['input_type'] = 'string';

			}
		}

		$meta_arr = wp_parse_args( $current_meta_fields, $meta_arr );
		if ( ! empty( $meta_arr ) ) {
			wp_send_json_success( $meta_arr );
		} else {
			wp_send_json_error( [ 'message' => esc_html__( 'No meta field was found', 'wpbulky-wp-bulk-edit-post-types' ) ] );
		}
	}

	public function save_meta_fields() {
		check_ajax_referer( 'vi_wpbulky_nonce', 'vi_wpbulky_nonce' );

		$meta_fields = isset( $_POST['meta_fields'] ) ? BulkyWP_Data()->sanitize( wp_unslash( $_POST['meta_fields'] ) ) : [];
		update_option( "vi_wpbulky_{$this->post_type}_meta_fields", $meta_fields );
		wp_send_json_success();
	}

	public function auto_save_revision() {
		check_ajax_referer( 'vi_wpbulky_nonce', 'vi_wpbulky_nonce' );

		$data    = ! empty( $_POST['data'] ) ? BulkyWP_Data()->sanitize( $_POST['data'] ) : '';
		$page    = ! empty( $_POST['page'] ) ? absint( $_POST['page'] ) : 1;
		$history = History::instance();
		$history->set( $data );
		$count_page = $history->count_history_pages();
		ob_start();
		$history->get_history_page( $page );
		$update_pages = ob_get_clean();
		wp_send_json_success( [ 'pages' => $count_page, 'updatePage' => $update_pages ] );
	}

	public function view_history_point() {
		check_ajax_referer( 'vi_wpbulky_nonce', 'vi_wpbulky_nonce' );

		if ( ! empty( $_POST['id'] ) ) {
			$history_id = absint( $_POST['id'] );
			$r          = History::instance()->compare_history_point_and_current( $history_id );
			wp_send_json_success( $r );
		}
	}

	public function recover_history() {
		check_ajax_referer( 'vi_wpbulky_nonce', 'vi_wpbulky_nonce' );

		$recover_id = ! empty( $_POST['id'] ) ? absint( $_POST['id'] ) : '';
		if ( $recover_id ) {
			$history = History::instance()->get_history_by_id( $recover_id );
			if ( $history ) {
				wp_send_json_success( $history );
			}
		}
	}

	public function revert_history_single_post() {
		check_ajax_referer( 'vi_wpbulky_nonce', 'vi_wpbulky_nonce' );

		$pid        = ! empty( $_POST['pid'] ) ? absint( $_POST['pid'] ) : '';
		$history_id = ! empty( $_POST['history_id'] ) ? absint( $_POST['history_id'] ) : '';

		if ( $pid && $history_id ) {
			$post = get_post( $pid );

			if ( ! is_object( $post ) ) {
				wp_send_json_error( [ 'message' => esc_html__( 'Post is not exist', 'wpbulky-wp-bulk-edit-post-types' ) ] );
			}

			History::instance()->revert_single_post( $post, $history_id );
		}

		wp_send_json_success();
	}

	public function revert_history_all_posts() {
		check_ajax_referer( 'vi_wpbulky_nonce', 'vi_wpbulky_nonce' );

		$history_id = ! empty( $_POST['history_id'] ) ? absint( $_POST['history_id'] ) : '';
		if ( ! $history_id ) {
			wp_send_json_error( [ 'message' => esc_html__( 'No history id', 'wpbulky-wp-bulk-edit-post-types' ) ] );
		}
		History::instance()->revert_history_all_posts( $history_id );
	}

	public function revert_history_post_attribute() {
		check_ajax_referer( 'vi_wpbulky_nonce', 'vi_wpbulky_nonce' );

		$pid        = ! empty( $_POST['pid'] ) ? absint( $_POST['pid'] ) : '';
		$history_id = ! empty( $_POST['history_id'] ) ? absint( $_POST['history_id'] ) : '';
		$attribute  = ! empty( $_POST['attribute'] ) ? sanitize_text_field( wp_unslash( $_POST['attribute'] ) ) : '';

		if ( $pid && $history_id && $attribute ) {
			$post = get_post( $pid );

			if ( ! is_object( $post ) ) {
				wp_send_json_error( [ 'message' => esc_html__( 'Post is not exist', 'wpbulky-wp-bulk-edit-post-types' ) ] );
			}

			History::instance()->revert_history_post_attribute( $post, $history_id, $attribute );
		}

		wp_send_json_success();
	}

	public function load_history_page() {
		check_ajax_referer( 'vi_wpbulky_nonce', 'vi_wpbulky_nonce' );

		$page = ! empty( $_POST['page'] ) ? absint( $_POST['page'] ) : '';
		if ( $page ) {
			History::instance()->get_history_page( $page );
		}
	}

	private function duplicate_post() {
		check_ajax_referer( 'vi_wpbulky_nonce', 'vi_wpbulky_nonce' );

		$pid  = ! empty( $_POST['post_id'] ) ? absint( $_POST['post_id'] ) : '';
		$post = get_post( $pid );

		if ( ! $post ) {
			wp_send_json_error();
		}

		$duplicate = $this->post_duplicate( $post );
		wp_send_json_success( $duplicate );
	}

	private function post_duplicate( $post ) {
		$posts_data  = [];
		$handle_post = Handle_Post::instance();

		$duplicate = (array) clone $post;

		$duplicate['post_status'] = 'draft';
		$duplicate['post_title']  = $duplicate['post_title'] . ' (Copy)';

		unset( $duplicate['ID'] );
		unset( $duplicate['guid'] );
		unset( $duplicate['post_name'] );
		unset( $duplicate['post_date'] );
		unset( $duplicate['post_date_gmt'] );
		unset( $duplicate['post_modified'] );
		unset( $duplicate['post_modified_gmt'] );

		$post_id  = wp_insert_post( $duplicate );
		$new_post = get_post( $post_id );
		array_unshift( $posts_data, $handle_post->get_post_data_for_edit( $new_post ) );

		return $posts_data;
	}

	private function generate_unique_slug( $slug ) {
		global $wpdb;

		//phpcs:ignore WordPress.DB.DirectDatabaseQuery.DirectQuery,WordPress.DB.DirectDatabaseQuery.NoCaching
		$results1 = $wpdb->get_results(
			$wpdb->prepare( "SELECT post_name FROM {$wpdb->posts} WHERE post_name = %s AND post_type NOT IN ( 'product', 'product_variation' )", $slug )
		);

		// The slug is already unique!
		if ( empty( $results1 ) ) {
			return $slug;
		}

		$root_slug = preg_replace( '/-[0-9]+$/', '', $slug );

		//phpcs:ignore WordPress.DB.DirectDatabaseQuery.DirectQuery,WordPress.DB.DirectDatabaseQuery.NoCaching
		$results = $wpdb->get_results(
			$wpdb->prepare( "SELECT post_name FROM {$wpdb->posts} WHERE post_name LIKE %s AND post_type NOT IN ( 'product', 'product_variation' )", $root_slug . '%' )
		);

		// The slug is already unique!
		if ( empty( $results ) ) {
			return $slug;
		}

		// Find the maximum suffix so we can ensure uniqueness.
		$max_suffix = 1;
		foreach ( $results as $result ) {
			// Pull a numerical suffix off the slug after the last hyphen.
			$suffix = intval( substr( $result->post_name, strrpos( $result->post_name, '-' ) + 1 ) );
			if ( $suffix > $max_suffix ) {
				$max_suffix = $suffix;
			}
		}

		return $root_slug . '-' . ( $max_suffix + 1 );
	}
}


