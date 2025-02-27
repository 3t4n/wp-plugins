<?php

namespace BULKYWP\Admin;

defined( 'ABSPATH' ) || exit;

class Handle_Post {

	protected static $instance = null;
	protected $fields;
	protected $meta_fields;
	protected $post_type;

	public function __construct() {
		global $wpbulky_post_type;
		$this->post_type   = $wpbulky_post_type;
		$this->fields      = BulkyWP_Data()->get_fields_for_parse_post();
		$this->meta_fields = get_option( "vi_wpbulky_{$this->post_type}_meta_fields" );
	}

	public static function instance() {
		return self::$instance == null ? self::$instance = new self() : self::$instance;
	}

	public function get_post_data( \WP_Post $post, $fields ) {
		$p_data = [];
		foreach ( $fields as $field ) {
			switch ( $field ) {

				case 'id':
					$p_data[] = $post->ID;
					break;

				case 'thumnail':
					if ($this->post_type === 'attachment'){
						$p_data[] = $post->ID;
					}else{
						$p_data[] = get_post_thumbnail_id( $post );
					}
					break;

				case 'post_name':
					$p_data[] = urldecode( $post->post_name );
					break;

				case 'post_title':
				case 'post_content':
				case 'post_excerpt':
				case 'post_parent':
				case 'menu_order':
				case 'post_status':
				case 'post_password':
				case 'post_author':
					$p_data[] = $post->$field;
					break;

				case 'post_date':
					$p_data[] = $post->post_date;
					break;

				case 'comment_status':
				case 'ping_status':
					$p_data[] = $post->$field == 'open';
					break;

				default:
					if ( ! empty( $this->meta_fields[ $field ] ) ) {
						$meta_type = $this->meta_fields[ $field ]['input_type'];
						$data      = get_post_meta( $post->ID, $field, true );
						if ( $meta_type == 'json' && ! is_array( $data ) ) {
							$data = json_decode( $data, true );
						}
					}

					$taxonomies = get_taxonomies( [ 'object_type' => [ $this->post_type ] ] );
					if ( in_array( $field, $taxonomies ) ) {
						$data = wp_get_object_terms( $post->ID, $field, array( 'fields' => 'ids' ) );
					}

					$p_data[] = $data ?? '';
					break;
			}
		}

		return $p_data;
	}

	public function get_post_data_for_edit( $post ) {
		return $this->get_post_data( $post, $this->fields );
	}

	public function parse_post_data_to_save( &$post, $pid, $type, $value ) {

		switch ( $type ) {
			case 'id':
				$post['ID'] = $value;
				break;

			case 'thumnail':
				$post['meta_input']['_thumbnail_id'] = $value;
				break;

			case 'post_title':
			case 'post_name':
			case 'post_content':
			case 'post_excerpt':
			case 'post_status':
			case 'post_password':
			case 'menu_order':
			case 'post_parent':
			case 'post_author':
			case 'post_date':

				$post[ $type ] = $value;
				break;

			case 'comment_status':
			case 'ping_status':
				$post[ $type ] = $value ? 'open' : 'closed';
				break;

			default:
				$meta_fields = get_option( "vi_wpbulky_{$this->post_type}_meta_fields" );

				if ( ! empty( $meta_fields ) && is_array( $meta_fields ) && in_array( $type, array_keys( $meta_fields ) ) ) {
					$data_type = $meta_fields[ $type ]['input_type'] ?? '';
					if ( $data_type ) {
						if ( $data_type === 'json' ) {
							$value = wp_json_encode( $value );
						}
						if ( $data_type === 'texteditor' ) {
							$value = wp_kses_post( $value );
						}
						$post['meta_input'][ $type ] = $value;
					}
				}

				$taxonomies = get_taxonomies( [ 'object_type' => [ $this->post_type ] ] );
				if ( in_array( $type, $taxonomies ) ) {
					if ( is_string( $value ) ) {
						$value = array_map( 'absint', explode( ';', $value ) );
					}
					wp_set_object_terms( $pid, $value, $type );
				}

				break;
		}

	}
}
