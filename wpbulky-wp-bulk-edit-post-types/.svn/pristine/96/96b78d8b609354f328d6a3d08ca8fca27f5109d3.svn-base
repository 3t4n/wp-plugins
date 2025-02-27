<?php

namespace BULKYWP\Includes;

defined( 'ABSPATH' ) || exit;

class Data {

	protected static $instance = null;

	protected static $params;
	protected $filter;
	protected $settings;

	public function __construct() {
	}

	public static function instance() {
		return self::$instance == null ? self::$instance = new self() : self::$instance;
	}

	public static function get_params() {
		$params_saved   = get_option( 'wpbulky_params_setting' );
		$default_params = [

		];

		return self::$params = wp_parse_args( $params_saved, $default_params );
	}

	public static function get_param( $key ) {
		if ( ! self::$params ) {
			self::get_params();
		}

		return self::$params[ $key ] ?? '';
	}

	public function fixed_columns() {
		return [ 'id' ];
	}

	public function define_columns_type() {
		global $wpbulky_post_type;
		if ( ! $wpbulky_post_type ) {
			return [];
		}

		$post_status = [
			[ 'id' => 'publish', 'name' => esc_html__( 'Published', 'wpbulky-wp-bulk-edit-post-types' ) ],
			[ 'id' => 'future', 'name' => esc_html__( 'Scheduled', 'wpbulky-wp-bulk-edit-post-types' ) ],
			[ 'id' => 'pending', 'name' => esc_html__( 'Pending', 'wpbulky-wp-bulk-edit-post-types' ) ],
			[ 'id' => 'draft', 'name' => esc_html__( 'Draft', 'wpbulky-wp-bulk-edit-post-types' ) ],
			[ 'id' => 'private', 'name' => esc_html__( 'Private', 'wpbulky-wp-bulk-edit-post-types' ) ],
		];

		$post_status = apply_filters( 'wpbulky_post_statuses', $post_status, $wpbulky_post_type );

		$columns['id'] = [ 'type' => 'numeric', 'width' => 70, 'title' => 'ID', 'readOnly' => true ];

		if ( post_type_supports( $wpbulky_post_type, 'title' ) ) {
			$columns['post_title'] = [ 'type' => 'text', 'width' => 200, 'title' => esc_html__( 'Title', 'wpbulky-wp-bulk-edit-post-types' ), 'align' => 'left' ];
		}

		if ( post_type_supports( $wpbulky_post_type, 'thumbnail' ) || $wpbulky_post_type === 'attachment' ) {
			$columns['thumnail'] = [ 'type' => 'custom', 'width' => 70, 'title' => esc_html__( 'Image', 'wpbulky-wp-bulk-edit-post-types' ), 'editor' => 'image' ];
		}

		$columns['post_name'] = [ 'type' => 'text', 'width' => 70, 'title' => esc_html__( 'Slug', 'wpbulky-wp-bulk-edit-post-types' ), 'align' => 'left' ];

		$columns['post_date'] = [
			'type'    => 'calendar',
			'width'   => 120,
			'title'   => esc_html__( 'Publish date', 'wpbulky-wp-bulk-edit-post-types' ),
			'options' => [ 'format' => 'YYYY-MM-DD HH24:MI', 'time' => 1 ]
		];

		if ( post_type_supports( $wpbulky_post_type, 'editor' ) ) {
			$columns['post_content'] = [ 'type' => 'custom', 'width' => 100, 'title' => esc_html__( 'Content', 'wpbulky-wp-bulk-edit-post-types' ), 'align' => 'left', 'editor' => 'textEditor' ];
		}

		if ( post_type_supports( $wpbulky_post_type, 'excerpt' ) ) {
			$columns['post_excerpt'] = [ 'type' => 'custom', 'width' => 100, 'title' => esc_html__( 'Excerpt', 'wpbulky-wp-bulk-edit-post-types' ), 'align' => 'left', 'editor' => 'textEditor' ];
		}

		if ( $wpbulky_post_type == 'attachment' ) {
			$columns['post_content'] = [ 'type' => 'custom', 'width' => 100, 'title' => esc_html__( 'Description', 'wpbulky-wp-bulk-edit-post-types' ), 'align' => 'left', 'editor' => 'textEditor' ];
			$columns['post_excerpt'] = [ 'type' => 'custom', 'width' => 100, 'title' => esc_html__( 'Caption', 'wpbulky-wp-bulk-edit-post-types' ), 'align' => 'left', 'editor' => 'textEditor' ];
		}

		if ( post_type_supports( $wpbulky_post_type, 'page-attributes' ) ) {
			$columns['post_parent'] = [ 'type' => 'number', 'width' => 80, 'title' => esc_html__( 'Post parent', 'wpbulky-wp-bulk-edit-post-types' ), 'align' => 'center' ];
			$columns['menu_order']  = [ 'type' => 'number', 'width' => 80, 'title' => esc_html__( 'Menu order', 'wpbulky-wp-bulk-edit-post-types' ), 'align' => 'center' ];
		}


		if ( $wpbulky_post_type !== 'attachment' ) {
			$columns['post_status'] = [
				'type'   => 'dropdown',
				'width'  => 80,
				'title'  => esc_html__( 'Status', 'wpbulky-wp-bulk-edit-post-types' ),
				'source' => $post_status,
			];
			$columns['post_password'] = [ 'type' => 'text', 'width' => 100, 'title' => esc_html__( 'Password', 'wpbulky-wp-bulk-edit-post-types' ) ];
			if ( post_type_supports( $wpbulky_post_type, 'comments' ) ) {
				$columns['comment_status'] = [ 'type' => 'checkbox', 'width' => 80, 'title' => esc_html__( 'Allow comments', 'wpbulky-wp-bulk-edit-post-types' ), 'align' => 'center' ];
				$columns['ping_status']    = [ 'type' => 'checkbox', 'width' => 80, 'title' => esc_html__( 'Allow trackbacks', 'wpbulky-wp-bulk-edit-post-types' ), 'align' => 'center' ];
			}
		}else{
			$columns['post_date']['readOnly'] = true;
			$columns['thumnail'] = wp_parse_args([
				'title' => esc_html__( 'Image preview', 'wpbulky-wp-bulk-edit-post-types' ),
				'readOnly' => true
			],$columns['thumnail']);
		}


		$taxonomies = get_taxonomies( [ 'object_type' => [ $wpbulky_post_type ] ], 'objects' );
		if ( ! empty( $taxonomies ) ) {
			foreach ( $taxonomies as $taxonomy => $data ) {
				$source = $this->get_categories( $taxonomy, true );
				if ( empty( $source ) ) {
					array_unshift( $source, [ 'id' => '', 'text' => '' ] );
				}
				$columns[ $taxonomy ] = [ 'type' => 'dropdown', 'width' => 100, 'title' => $data->label, 'source' => $source, 'multiple' => true ];
			}
		}


		if ( post_type_supports( $wpbulky_post_type, 'author' ) ) {
			$users = [];
			$uu    = get_users( [ 'capability' => 'edit_posts' ] );
			if ( ! empty( $uu ) ) {
				foreach ( $uu as $u ) {
					$users[] = [ 'id' => $u->data->ID, 'name' => $u->data->display_name ];
				}
			}
			$columns['post_author'] = [ 'type' => 'dropdown', 'width' => 100, 'title' => esc_html__( 'Author', 'wpbulky-wp-bulk-edit-post-types' ), 'source' => $users ];
		}


		$meta_fields = get_option( "vi_wpbulky_{$wpbulky_post_type}_meta_fields" );

		$meta_field_columns = [];
		if ( ! empty( $meta_fields ) && is_array( $meta_fields ) ) {
			foreach ( $meta_fields as $meta_key => $meta_field ) {
				if ( empty( $meta_field['active'] ) ) {
					continue;
				}

				$type   = 'text';
				$editor = '';

				switch ( $meta_field['input_type'] ) {
					case 'textinput':
						$type = 'text';
						break;
					case 'numberinput':
						$type = 'numeric';
						break;
					case 'checkbox':
						$type = 'checkbox';
						break;
					case 'array':
					case 'json':
						$type   = 'custom';
						$editor = 'array';
						break;
					case 'calendar':
						$type = 'calendar';
						break;
					case 'texteditor':
						$type   = 'custom';
						$editor = 'textEditor';
						break;
				}

				$meta_field_columns[ $meta_key ] = [
					'title'  => ! empty( $meta_field['column_name'] ) ? $meta_field['column_name'] : $meta_key,
					'width'  => 100,
					'type'   => $type,
					'editor' => $editor,
				];

			}
		}

		$columns = array_merge( $columns, $meta_field_columns );

		if ( ! empty( $columns ) && is_array( $columns ) ) {
			foreach ( $columns as $col_id => $column ) {
				$columns[ $col_id ] = apply_filters( "wpbulky_define_column", $column, $col_id );
			}
		}

		$post_column_width = get_option( "vi_wpbulky_{$wpbulky_post_type}_column_width", [] );

		if ( empty( $post_column_width ) ) {
			$post_column_width = [];
			foreach ( $columns as $col_id => $column ) {
				$post_column_width[ $col_id ] = $column['width'];
			}
			update_option( "vi_wpbulky_{$wpbulky_post_type}_column_width", $post_column_width );

		}else {
			foreach ( $columns as $col_id => $column ) {
				if ( isset( $post_column_width[ $col_id ] ) ) {
					$columns[$col_id]['width'] = $post_column_width[ $col_id ];
				}
			}
		}

		return $columns;
	}

	public function parse_to_dropdown_source( $options ) {
		$r = [];
		if ( ! empty( $options ) && is_array( $options ) ) {
			foreach ( $options as $id => $name ) {
				$r[] = [ 'id' => $id, 'name' => $name ];
			}
		}

		return $r;
	}

	public function get_culumns_type_title() {
		$columns = wp_list_pluck( $this->define_columns_type(), 'title' );
		unset( $columns['id'] );
//		unset( $columns['post_title'] );

		return $columns;
	}

	public function get_settings() {
		if ( ! $this->settings ) {
			global $wpbulky_post_type;
			$this->settings = wp_parse_args(
				get_option( "vi_wpbulky_{$wpbulky_post_type}_settings", [] ),
				[
					'edit_fields'          => [],
					'posts_per_page'       => 10,
					'order_by'             => 'ID',
					'order'                => 'DESC',
					'auto_save_revision'   => 60,
					'auto_remove_revision' => 30,
				]
			);
		}

		return $this->settings;
	}

	public function get_setting( $key ) {
		$all_settings = $this->get_settings();

		return $all_settings[ $key ] ?? '';
	}

	public function get_fields_for_parse_post() {
		$defined_columns     = array_keys( $this->define_columns_type() );
		$edit_fields         = $this->get_setting( 'edit_fields' );
		$exclude_edit_fields = $this->get_setting( 'exclude_edit_fields' );
		if (!is_array($exclude_edit_fields)){
			$exclude_edit_fields = [];
		}
		if (!in_array('post_format', $exclude_edit_fields)){
			$exclude_edit_fields[]='post_format';
		}

		$r = $defined_columns;

		if ( ! empty( $edit_fields ) && is_array( $edit_fields ) ) {
			$edit_fields = array_merge( $this->fixed_columns(), $edit_fields );

			foreach ( $r as $i => $key ) { //Keep piority
				if ( $key !== false && ! in_array( $key, $edit_fields ) ) {
					unset( $r[ $i ] );
				}
			}
		}

		if ( ! empty( $exclude_edit_fields ) && is_array( $exclude_edit_fields ) ) {
			foreach ( $exclude_edit_fields as $field ) {
				$key = array_search( $field, $r );

				if ( $key !== false && isset( $r[ $key ] ) ) {
					unset( $r[ $key ] );
				}
			}
		}

		return array_values( $r );
	}

	public function get_columns_type() {
		$columns          = $this->define_columns_type();
		$accepted_columns = [];
		$patterns         = $this->get_fields_for_parse_post();

		if ( ! empty( $patterns ) ) {
			foreach ( $columns as $key => $column ) {
				if ( in_array( $key, $patterns ) ) {
					$column['id']             = $key;
					$accepted_columns[ $key ] = $column;
				}
			}
		} else {
			$accepted_columns = $columns;
		}

		return $accepted_columns;
	}


	public function get_categories( $taxonomy, $select2 = false ) {
		$categories = get_categories( array( 'taxonomy' => $taxonomy, 'hide_empty' => false ) );
		$categories = json_decode( wp_json_encode( $categories ), true );

		return $select2 ? $this->build_select2_categories_tree( $categories, 0 ) : $this->build_dropsown_categories_tree( $categories, 0 );
	}

	private function build_dropsown_categories_tree( $all_cats, $parent_cat, $level = 1 ) {
		$res = [];
		foreach ( $all_cats as $cat ) {
			if ( $cat['parent'] == $parent_cat ) {
				$prefix                 = str_repeat( '- ', $level - 1 );
				$res[ $cat['term_id'] ] = $prefix . $cat['name'];
				$child_cats             = $this->build_dropsown_categories_tree( $all_cats, $cat['term_id'], $level + 1 );
				if ( $child_cats ) {
					$res += $child_cats;
				}
			}
		}

		return $res;
	}

	private function build_select2_categories_tree( $all_cats, $parent_cat, $level = 1 ) {
		$res = [];
		foreach ( $all_cats as $cat ) {
			$new_cat = [];
			if ( $cat['parent'] == $parent_cat ) {
				$prefix          = str_repeat( '- ', $level - 1 );
				$new_cat['id']   = $cat['term_id'];
				$new_cat['name'] = $prefix . $cat['name'];
				$res[]           = $new_cat;
				$child_cats      = $this->build_select2_categories_tree( $all_cats, $cat['term_id'], $level + 1 );
				if ( $child_cats ) {
					$res = array_merge( $res, $child_cats );
				}
			}
		}

		return $res;
	}

	public function isHTML( $string ) {
		return $string != wp_strip_all_tags( $string );
	}

	public function sanitize( $var ) {
		if ( is_array( $var ) ) {
			return array_map( [ $this, 'sanitize' ], $var );
		} elseif ( $this->isHTML( $var ) ) {
			return wp_kses_post( $var );
		} else {
			return is_scalar( $var ) ? sanitize_text_field( $var ) : $var;
		}
	}
}