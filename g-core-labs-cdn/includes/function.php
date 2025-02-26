<?php
/**
 * Function
 *
 * @package gcore
 */

add_action( 'wp_ajax_gcore_save', 'gcore_ajax_save' );

/**
 * Function gcore_ajax_save
 *
 * @return void
 */
function gcore_ajax_save() {
	if ( ! isset( $_POST['n'] ) || ! wp_verify_nonce( sanitize_text_field( wp_unslash( $_POST['n'] ) ) ) ) {
		status_header( 401, 'Unauthorized' );
		die;
	}

	$type = isset( $_POST['t'] ) ? sanitize_text_field( wp_unslash( $_POST['t'] ) ) : null;

	if ( in_array( $type, array( 'url', 'int', 'checkbox' ), true ) ) {
		$option = isset( $_POST['o'] ) ? sanitize_text_field( wp_unslash( $_POST['o'] ) ) : null;
		if ( 'url' === $type ) {
			$value = isset( $_POST['v'] ) ? trim( esc_url_raw( wp_unslash( $_POST['v'] ) ) ) : null;

			if ( '' !== $value ) {
				$value = trailingslashit( untrailingslashit( $value ) );
			}
		} elseif ( 'int' === $type ) {
			$value = isset( $_POST['v'] ) ? intval( $_POST['v'] ) : 0;
		} elseif ( 'checkbox' === $type ) {
			$value = isset( $_POST['v'] ) ? intval( $_POST['v'] ) : 0;
			if ( 'gcore_type_advanced' === $option ) {
				update_option( 'gcore_type_image', 0 );
				update_option( 'gcore_type_video', 0 );
				update_option( 'gcore_type_audio', 0 );
				update_option( 'gcore_type_js', 0 );
				update_option( 'gcore_type_css', 0 );
				update_option( 'gcore_type_archive', 0 );
			}
			if ( 'gcore_folder_advanced' === $option ) {
				update_option( 'gcore_folder_templates', 0 );
				update_option( 'gcore_folder_plugins', 0 );
				update_option( 'gcore_folder_content', 0 );
			}
		}
		update_option( $option, $value );
		echo esc_html( $value );
	} else {
		echo 0;
	}
	wp_die();
}

add_action( 'wp_ajax_gcore_advance_param_add', 'gcore_ajax_advance_param_add' );

/**
 * Function gcore_ajax_advance_param_add
 *
 * @return void
 */
function gcore_ajax_advance_param_add() {
	if ( ! isset( $_POST['n'] ) || ! wp_verify_nonce( sanitize_text_field( wp_unslash( $_POST['n'] ) ) ) ) {
		status_header( 401, 'Unauthorized' );
		die;
	}

	$type = isset( $_POST['t'] ) ? sanitize_text_field( wp_unslash( $_POST['t'] ) ) : null;
	if ( in_array( $type, array( 'types', 'folders', 'exceptions' ), true ) ) {
		$gcore_array = get_option( 'gcore_cdn_' . $type, wp_json_encode( array() ) );
		$v           = isset( $_POST['v'] ) ? sanitize_text_field( wp_unslash( $_POST['v'] ) ) : null;
		$value       = '';
		if ( 'types' === $type ) {
			$value = preg_replace( '/[^a-zA-Z0-9]/ui', '', strtolower( trim( $v ) ) );
		} elseif ( 'folders' === $type ) {
			$value = trim( $v );
		} elseif ( 'exceptions' === $type ) {
			$value = esc_url( trim( $v ) );
			$value = explode( '?', $value );
			$value = explode( '&', $value[0] );
			$value = $value[0];
		}

		if ( '' !== $value ) {
			if ( 'folders' === $type ) {
				$value = trailingslashit( untrailingslashit( $value ) );
				$first = substr( $value, 0, 1 );
				if ( '/' !== $first ) {
					$value = '/' . $value;
				}
			}
			if ( '' !== $gcore_array ) {
				$gcore_array = json_decode( $gcore_array, true );
			} else {
				$gcore_array = array();
			}
			array_push( $gcore_array, $value );
			$gcore_array = array_unique( $gcore_array );
			$gcore_array = wp_json_encode( $gcore_array );
			update_option( 'gcore_cdn_' . $type, $gcore_array );
			echo 1;
		} else {
			echo 0;
		}
	} else {
		echo 0;
	}
	wp_die();
}

add_action( 'wp_ajax_gcore_advance_param_del', 'gcore_ajax_advance_param_del' );

/**
 * Function gcore_ajax_advance_param_del
 *
 * @return void
 */
function gcore_ajax_advance_param_del() {
	if ( ! isset( $_POST['n'] ) || ! wp_verify_nonce( sanitize_text_field( wp_unslash( $_POST['n'] ) ) ) ) {
		status_header( 401, 'Unauthorized' );
		die;
	}

	$type = isset( $_POST['t'] ) ? sanitize_text_field( wp_unslash( $_POST['t'] ) ) : null;
	if ( in_array( $type, array( 'types', 'folders', 'exceptions' ), true ) ) {
		$gcore_array = get_option( 'gcore_cdn_' . $type );
		$v           = isset( $_POST['v'] ) ? sanitize_text_field( wp_unslash( $_POST['v'] ) ) : null;
		$value       = '';
		if ( 'types' === $type ) {
			$value = preg_replace( '/[^a-zA-Z0-9]/ui', '', strtolower( trim( $v ) ) );
		} elseif ( 'folders' === $type ) {
			$value = sanitize_text_field( trim( $v ) );
		} elseif ( 'exceptions' === $type ) {
			$value = sanitize_text_field( esc_url( trim( $v ) ) );
			$value = explode( '?', $value );
			$value = explode( '&', $value[0] );
			$value = $value[0];
		}
		if ( '' !== $value ) {
			if ( 'folders' === $type ) {
				$value = trailingslashit( untrailingslashit( $value ) );
				$first = substr( $value, 0, 1 );
				if ( '/' !== $first ) {
					$value = '/' . $value;
				}
			}
			if ( '' !== $gcore_array ) {
				$gcore_array = json_decode( $gcore_array, true );
				$k           = array_search( $value, $gcore_array, true );
				if ( false !== $k ) {
					unset( $gcore_array[ $k ] );
					$gcore_array = wp_json_encode( $gcore_array );
					update_option( 'gcore_cdn_' . $type, $gcore_array );
					echo 1;
				} else {
					echo 0;
				}
			} else {
				echo 0;
			}
		} else {
			echo 0;
		}
	} else {
		echo 0;
	}
	wp_die();
}

add_action( 'wp_ajax_gcore_advance_param_show', 'gcore_ajax_advance_param_show' );
/**
 * Function gcore_ajax_advance_param_show
 *
 * @return void
 */
function gcore_ajax_advance_param_show() {
	if ( ! isset( $_POST['n'] ) || ! wp_verify_nonce( sanitize_text_field( wp_unslash( $_POST['n'] ) ) ) ) {
		status_header( 401, 'Unauthorized' );
		die;
	}

	$type = isset( $_POST['t'] ) ? sanitize_text_field( wp_unslash( $_POST['t'] ) ) : null;
	$data = '';
	if ( in_array( $type, array( 'types', 'folders', 'exceptions' ), true ) ) {

		$gcore_array = get_option( 'gcore_cdn_' . $type );
		$gcore_array = json_decode( $gcore_array, true );
		if ( '' === $gcore_array ) {
			$gcore_array = array();
		}
		$example = '';
		if ( 'types' === $type ) {
			$example = 'jpg';
		} elseif ( 'folders' === $type ) {
			$example = '/wp-content/uploads/';
		} elseif ( 'exceptions' === $type ) {
			$example = 'https://example.com/exeptions-page.html';
		}

		foreach ( $gcore_array as $element ) {
			$data .= '<tr class="form-field form-required">
                <td scope="row">' . $element . '</td>
                <td><button type="button" class="button-gcore g-delete" data-e="' . $element . '" data-type="' . $type . '">' . __( 'Delete', 'gcore_translate' ) . '</button></td>
            </tr>';
		}
		$data .= '<tr class="form-field form-required">
                <td scope="row"><input type="text" class="new-' . $type . '" placeholder="' . __( 'Example', 'gcore_translate' ) . ': ' . $example . '"></td>
            <td><input type="button" data-type="' . $type . '" class="button-gcore g-add" value="' . __( 'Add', 'gcore_translate' ) . '"></td>
            </tr>
        ';
	}
	$allowed_tags           = wp_kses_allowed_html( 'post' );
	$allowed_tags['input']  = array(
		'type'        => true,
		'name'        => true,
		'value'       => true,
		'checked'     => true,
		'readonly'    => true,
		'data-e'      => true,
		'disabled'    => true,
		'data-t'      => true,
		'data-o'      => true,
		'data-type'   => true,
		'placeholder' => true,
		'id'          => true,
		'class'       => true,
		'required'    => true,
	);
	$allowed_tags['select'] = array(
		'name'     => true,
		'value'    => true,
		'id'       => true,
		'class'    => true,
		'required' => true,
	);
	$allowed_tags['button'] = array(
		'value'     => true,
		'disabled'  => true,
		'type'      => true,
		'name'      => true,
		'data-e'    => true,
		'data-t'    => true,
		'data-o'    => true,
		'id'        => true,
		'class'     => true,
		'data-type' => true,
	);
	$allowed_tags['option'] = array(
		'value' => true,
	);
	add_filter(
		'safe_style_css',
		function( $styles ) {
			$styles[] = 'display';
			return $styles;
		}
	);
	echo wp_kses( $data, $allowed_tags );
	wp_die();
}
