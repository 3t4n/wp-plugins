<?php
/**
 * Function include all files in folder
 *
 * @param $path   Directory address
 * @param $ext    array file extension what will include
 * @param $prefix string Class prefix
 */

use AffiAffiliate\AffiEnv;

if ( ! defined( 'ABSPATH' ) ) {
	exit;
}

if ( ! function_exists( 'villatheme_array_flatten' ) ) {
	function villatheme_array_flatten( $params, $allow_empty = true ) {
		if ( ! is_array( $params ) ) {
			return ! $allow_empty && ! $params ? array() : array( $params );
		}
		$result = array();
		foreach ( $params as $val ) {
			if ( ! $allow_empty && ! $val ) {
				continue;
			}
			$result = array_merge( $result, villatheme_array_flatten( $val ) );
		}

		return $result;
	}
}
if ( ! function_exists( 'villatheme_sanitize_fields' ) ) {
	function villatheme_sanitize_fields( $data ) {
		if ( is_array( $data ) ) {
			return array_map( 'villatheme_sanitize_fields', $data );
		} else {
			return is_scalar( $data ) ? sanitize_text_field( wp_unslash( $data ) ) : $data;
		}
	}
}
if ( ! function_exists( 'villatheme_sanitize_kses' ) ) {
	function villatheme_sanitize_kses( $data ) {
		if ( is_array( $data ) ) {
			return array_map( 'villatheme_sanitize_kses', $data );
		} else {
			return is_scalar( $data ) ? wp_kses_post( wp_unslash( $data ) ) : $data;
		}
	}
}
if ( ! function_exists( 'villatheme_remove_object_filter' ) ) {
	/**
	 * Remove an object filter.
	 *
	 * @param string $tag Hook name.
	 * @param string $class Class name. Use 'Closure' for anonymous functions.
	 * @param string|void $method Method name. Leave empty for anonymous functions.
	 * @param string|int|void $priority Priority
	 *
	 * @return void
	 */
	function villatheme_remove_object_filter( $tag, $class, $method = null, $priority = null ) {
		global $wp_filter;
		$filters = $wp_filter[ $tag ] ?? '';
		if ( empty ( $filters ) ) {
			return;
		}
		foreach ( $filters as $p => $filter ) {

			if ( ! is_null( $priority ) && ( (int) $priority !== (int) $p ) ) {
				continue;
			}
			$remove = false;
			foreach ( $filter as $identifier => $function ) {
				$function = $function['function'];
				if (
					is_array( $function )
					&& (
						is_a( $function[0], $class )
						|| ( is_array( $function ) && $function[0] === $class )
					)
				) {
					$remove = ( $method && ( $method === $function[1] ) );
				} elseif ( $function instanceof Closure && $class === 'Closure' ) {
					$remove = true;
				}
				if ( $remove ) {
					$temp = $wp_filter[ $tag ][ $p ];
					unset( $temp[ $identifier ] );
					$wp_filter[ $tag ][ $p ] = $temp;
				}
			}
		}
	}
}

if ( ! function_exists( 'villatheme_get_template' ) ) {
	function villatheme_get_template( $template_name, $args = [], $template_path = '', $default_path = '' ) {

		if ( ! empty( $args ) && is_array( $args ) ) {
			extract( $args ); // @codingStandardsIgnoreLine
		}
		$located = affi_locate_template( $template_name, $template_path, $default_path );

		if ( ! file_exists( $located ) ) {
			_doing_it_wrong( __FUNCTION__, sprintf( '<code>%s</code> does not exist.', esc_html( $located ) ), '2.1' );

			return;
		}

		// Allow 3rd party plugin filter template file from their plugin.
		$located = apply_filters( 'affi_get_template', $located, $template_name, $args, $template_path, $default_path );
		do_action( 'affi_before_template_part', $template_name, $template_path, $located, $args );
		include( $located );
		do_action( 'affi_template_part', $template_name, $template_path, $located, $args );

	}
}
if ( ! function_exists( 'affi_locate_template' ) ) {
	/**
	 * Get path of template
	 *
	 * @param        $template_name
	 * @param string $template_path
	 * @param string $default_path
	 *
	 * @return mixed
	 */

	function affi_locate_template( $template_name, $template_path = '', $default_path = '' ) {
		if ( ! $template_path ) {
			$template_path = '/affi-helpdesk-system/';
		}
		if ( ! $default_path ) {
			$default_path = AffiEnv::get( 'templates_dir' );
		}
		// Look within passed path within the theme - this is priority.
		$template = locate_template( array( trailingslashit( $template_path ) . $template_name, $template_name ) );

		// Get default template/
		if ( ! $template ) {
			$template = $default_path . $template_name;
		}

		// Return what we found.
		return apply_filters( 'affi_locate_template', $template, $template_name, $template_path );
	}
}


/**
 * A  specific method of formatting numeric values
 *
 * @param int $number Number to format
 * @param bool $decimals Optional. Display decimals
 *
 * @return string Formatted string
 * @since 1.0.0
 */
function affi_number_format_i18n( $number = 0, $decimals = false ) {

	// If empty, set $number to (int) 0
	if ( ! is_numeric( $number ) ) {
		$number = 0;
	}

	// Filter & return
	return apply_filters( 'affi_number_format_i18n', number_format_i18n( $number, $decimals ), $number, $decimals );
}

if ( ! function_exists( 'affi_get_page_permalink' ) ) {
	function affi_get_page_permalink( $page, $fallback = null ) {
		$page_id  = 0;
		$settings = \AffiAffiliate\Inc\Data::instance();
		switch ( $page ) {
			case 'my_tickets':
				$page_id = $settings->get_param( 'my_tickets_page' );
				break;
			case 'list_tickets':
				$page_id = $settings->get_param( 'support_page' );
				break;
		}
		$permalink = 0 < $page_id ? get_permalink( $page_id ) : '';

		if ( ! $permalink ) {
			$permalink = is_null( $fallback ) ? get_home_url() : $fallback;
		}

		return $permalink;
	}
}

if ( ! function_exists( 'affi_reorder_ranks' ) ) {
	function affi_reorder_ranks( $ranks ) {
		if ( $ranks ) {
			foreach ( $ranks as $k => $v ) {
				if ( isset( $v->order ) ) {
					$key = $v->order;
					while ( ! empty( $new_arr[ $key ] ) ) {
						$key ++;
					}
					$new_arr[ $key ] = $v;
				}
			}
			if ( ! empty( $new_arr ) ) {
				ksort( $new_arr );

				return $new_arr;
			}
		}

		return $ranks;
	}
}

