<?php
/**
** A base module for [captchac] and [captchar]
**/

/* form_tag handler */

add_action( 'wp3cxc2c_init', 'wp3cxc2c_add_form_tag_captcha' );

function wp3cxc2c_add_form_tag_captcha() {
	/*
	// CAPTCHA-Challenge (image)
	wp3cxc2c_add_form_tag( 'captchac',
		'wp3cxc2c_captchac_form_tag_handler',
		array(
			'name-attr' => true,
			'zero-controls-container' => true,
			'not-for-mail' => true,
		)
	);

	// CAPTCHA-Response (input)
	wp3cxc2c_add_form_tag( 'captchar',
		'wp3cxc2c_captchar_form_tag_handler',
		array(
			'name-attr' => true,
			'do-not-store' => true,
			'not-for-mail' => true,
		)
	);
	*/
}

function wp3cxc2c_captchac_form_tag_handler( $tag ) {
	if ( ! class_exists( 'ReallySimpleCaptcha' ) ) {
		$error = sprintf(
			/* translators: %s: link labeled 'Really Simple CAPTCHA' */
			esc_html( __( "To use CAPTCHA, you need %s plugin installed.", '3cx-clicktotalk' ) ),
			wp3cxc2c_link( 'https://wordpress.org/plugins/really-simple-captcha/', 'Really Simple CAPTCHA' ) );

		return sprintf( '<em>%s</em>', $error );
	}

	if ( empty( $tag->name ) ) {
		return '';
	}

	$class = wp3cxc2c_form_controls_class( $tag->type );
	$class .= ' wp3cxc2c-captcha-' . $tag->name;

	$atts = array();
	$atts['class'] = $tag->get_class_option( $class );
	$atts['id'] = $tag->get_id_option();

	$op = array( // Default
		'img_size' => array( 72, 24 ),
		'base' => array( 6, 18 ),
		'font_size' => 14,
		'font_char_width' => 15,
	);

	$op = array_merge( $op, wp3cxc2c_captchac_options( $tag->options ) );

	if ( ! $filename = wp3cxc2c_generate_captcha( $op ) ) {
		return '';
	}

	if ( ! empty( $op['img_size'] ) ) {
		if ( isset( $op['img_size'][0] ) ) {
			$atts['width'] = $op['img_size'][0];
		}

		if ( isset( $op['img_size'][1] ) ) {
			$atts['height'] = $op['img_size'][1];
		}
	}

	$atts['alt'] = 'captcha';
	$atts['src'] = wp3cxc2c_captcha_url( $filename );

	$atts = wp3cxc2c_format_atts( $atts );

	$prefix = substr( $filename, 0, strrpos( $filename, '.' ) );

	$html = sprintf(
		'<input type="hidden" name="_wp3cxc2c_captcha_challenge_%1$s" value="%2$s" /><img %3$s />',
		$tag->name, esc_attr( $prefix ), $atts );

	return $html;
}

function wp3cxc2c_captchar_form_tag_handler( $tag ) {
	if ( empty( $tag->name ) ) {
		return '';
	}

	$class = wp3cxc2c_form_controls_class( $tag->type );

	$atts = array();

	$atts['size'] = $tag->get_size_option( '40' );
	$atts['maxlength'] = $tag->get_maxlength_option();
	$atts['minlength'] = $tag->get_minlength_option();

	if ( $atts['maxlength'] && $atts['minlength']
	&& $atts['maxlength'] < $atts['minlength'] ) {
		unset( $atts['maxlength'], $atts['minlength'] );
	}

	$atts['class'] = $tag->get_class_option( $class );
	$atts['id'] = $tag->get_id_option();
	$atts['tabindex'] = $tag->get_option( 'tabindex', 'signed_int', true );
	$atts['autocomplete'] = 'off';
	$atts['aria-invalid'] = $validation_error ? 'true' : 'false';

	$value = (string) reset( $tag->values );

	if ( wp3cxc2c_is_posted() ) {
		$value = '';
	}

	if ( $tag->has_option( 'placeholder' )
	|| $tag->has_option( 'watermark' ) ) {
		$atts['placeholder'] = $value;
		$value = '';
	}

	$atts['value'] = $value;
	$atts['type'] = 'text';
	$atts['name'] = $tag->name;

	$atts = wp3cxc2c_format_atts( $atts );

	$html = sprintf(
		'<span class="wp3cxc2c-form-control-wrap %1$s"><input %2$s />%3$s</span>',
		sanitize_html_class( $tag->name ), $atts, $validation_error );

	return $html;
}


/* Validation filter */

add_filter( 'wp3cxc2c_validate_captchar', 'wp3cxc2c_captcha_validation_filter', 10, 2 );

function wp3cxc2c_captcha_validation_filter( $result, $tag ) {
	$type = $tag->type;
	$name = $tag->name;

	$captchac = '_wp3cxc2c_captcha_challenge_' . $name;

	$prefix = isset( $_POST[$captchac] ) ? (string) $_POST[$captchac] : '';
	$response = isset( $_POST[$name] ) ? (string) $_POST[$name] : '';
	$response = wp3cxc2c_canonicalize( $response );

	if ( 0 == strlen( $prefix ) || ! wp3cxc2c_check_captcha( $prefix, $response ) ) {
		$result->invalidate( $tag, wp3cxc2c_get_message( 'captcha_not_match' ) );
	}

	if ( 0 != strlen( $prefix ) ) {
		wp3cxc2c_remove_captcha( $prefix );
	}

	return $result;
}


/* Ajax echo filter */

add_filter( 'wp3cxc2c_ajax_onload', 'wp3cxc2c_captcha_ajax_refill' );
add_filter( 'wp3cxc2c_ajax_json_echo', 'wp3cxc2c_captcha_ajax_refill' );

function wp3cxc2c_captcha_ajax_refill( $items ) {
	if ( ! is_array( $items ) ) {
		return $items;
	}

	$tags = array(); //wp3cxc2c_scan_form_tags( array( 'type' => 'captchac' ) );

	if ( empty( $tags ) ) {
		return $items;
	}

	$refill = array();

	foreach ( $tags as $tag ) {
		$name = $tag->name;
		$options = $tag->options;

		if ( empty( $name ) ) {
			continue;
		}

		$op = wp3cxc2c_captchac_options( $options );

		if ( $filename = wp3cxc2c_generate_captcha( $op ) ) {
			$captcha_url = wp3cxc2c_captcha_url( $filename );
			$refill[$name] = $captcha_url;
		}
	}

	if ( ! empty( $refill ) ) {
		$items['captcha'] = $refill;
	}

	return $items;
}

/* Warning message */

add_action( 'wp3cxc2c_admin_warnings', 'wp3cxc2c_captcha_display_warning_message' );

function wp3cxc2c_captcha_display_warning_message() {
	if ( ! $clicktotalk_form = wp3cxc2c_get_current_clicktotalk_form() ) {
		return;
	}
}


/* CAPTCHA functions */

function wp3cxc2c_init_captcha() {
	static $captcha = null;

	if ( $captcha ) {
		return $captcha;
	}

	if ( class_exists( 'ReallySimpleCaptcha' ) ) {
		$captcha = new ReallySimpleCaptcha();
	} else {
		return false;
	}

	$dir = trailingslashit( wp3cxc2c_captcha_tmp_dir() );

	$captcha->tmp_dir = $dir;

	if ( is_callable( array( $captcha, 'make_tmp_dir' ) ) ) {
		$result = $captcha->make_tmp_dir();

		if ( ! $result ) {
			return false;
		}

		return $captcha;
	}

	if ( wp_mkdir_p( $dir ) ) {
		$htaccess_file = path_join( $dir, '.htaccess' );

		if ( file_exists( $htaccess_file ) ) {
			return $captcha;
		}

		if ( $handle = fopen( $htaccess_file, 'w' ) ) {
			fwrite( $handle, 'Order deny,allow' . "\n" );
			fwrite( $handle, 'Deny from all' . "\n" );
			fwrite( $handle, '<Files ~ "^[0-9A-Za-z]+\\.(jpeg|gif|png)$">' . "\n" );
			fwrite( $handle, '    Allow from all' . "\n" );
			fwrite( $handle, '</Files>' . "\n" );
			fclose( $handle );
		}
	} else {
		return false;
	}

	return $captcha;
}

function wp3cxc2c_captcha_tmp_dir() {
	if ( defined( 'WP3CXC2C_CAPTCHA_TMP_DIR' ) ) {
		return WP3CXC2C_CAPTCHA_TMP_DIR;
	} else {
		return path_join( wp3cxc2c_upload_dir( 'dir' ), 'wp3cxc2c_captcha' );
	}
}

function wp3cxc2c_captcha_tmp_url() {
	if ( defined( 'WP3CXC2C_CAPTCHA_TMP_URL' ) ) {
		return WP3CXC2C_CAPTCHA_TMP_URL;
	} else {
		return path_join( wp3cxc2c_upload_dir( 'url' ), 'wp3cxc2c_captcha' );
	}
}

function wp3cxc2c_captcha_url( $filename ) {
	$url = path_join( wp3cxc2c_captcha_tmp_url(), $filename );

	if ( is_ssl() && 'http:' == substr( $url, 0, 5 ) ) {
		$url = 'https:' . substr( $url, 5 );
	}

	return apply_filters( 'wp3cxc2c_captcha_url', esc_url_raw( $url ) );
}

function wp3cxc2c_generate_captcha( $options = null ) {
	if ( ! $captcha = wp3cxc2c_init_captcha() ) {
		return false;
	}

	if ( ! is_dir( $captcha->tmp_dir )
	|| ! wp_is_writable( $captcha->tmp_dir ) ) {
		return false;
	}

	$img_type = imagetypes();

	if ( $img_type & IMG_PNG ) {
		$captcha->img_type = 'png';
	} elseif ( $img_type & IMG_GIF ) {
		$captcha->img_type = 'gif';
	} elseif ( $img_type & IMG_JPG ) {
		$captcha->img_type = 'jpeg';
	} else {
		return false;
	}

	if ( is_array( $options ) ) {
		if ( isset( $options['img_size'] ) ) {
			$captcha->img_size = $options['img_size'];
		}

		if ( isset( $options['base'] ) ) {
			$captcha->base = $options['base'];
		}

		if ( isset( $options['font_size'] ) ) {
			$captcha->font_size = $options['font_size'];
		}

		if ( isset( $options['font_char_width'] ) ) {
			$captcha->font_char_width = $options['font_char_width'];
		}

		if ( isset( $options['fg'] ) ) {
			$captcha->fg = $options['fg'];
		}

		if ( isset( $options['bg'] ) ) {
			$captcha->bg = $options['bg'];
		}
	}

	$prefix = wp_rand();
	$captcha_word = $captcha->generate_random_word();
	return $captcha->generate_image( $prefix, $captcha_word );
}

function wp3cxc2c_check_captcha( $prefix, $response ) {
	if ( ! $captcha = wp3cxc2c_init_captcha() ) {
		return false;
	}

	return $captcha->check( $prefix, $response );
}

function wp3cxc2c_remove_captcha( $prefix ) {
	if ( ! $captcha = wp3cxc2c_init_captcha() ) {
		return false;
	}

	// 3CX Clicktotalk generates $prefix with wp_rand()
	if ( preg_match( '/[^0-9]/', $prefix ) ) {
		return false;
	}

	$captcha->remove( $prefix );
}

add_action( 'template_redirect', 'wp3cxc2c_cleanup_captcha_files', 20 );

function wp3cxc2c_cleanup_captcha_files() {
	if ( ! $captcha = wp3cxc2c_init_captcha() ) {
		return false;
	}

	if ( is_callable( array( $captcha, 'cleanup' ) ) ) {
		return $captcha->cleanup();
	}

	$dir = trailingslashit( wp3cxc2c_captcha_tmp_dir() );

	if ( ! is_dir( $dir ) || ! is_readable( $dir ) || ! wp_is_writable( $dir ) ) {
		return false;
	}

	if ( $handle = opendir( $dir ) ) {
		while ( false !== ( $file = readdir( $handle ) ) ) {
			if ( ! preg_match( '/^[0-9]+\.(php|txt|png|gif|jpeg)$/', $file ) ) {
				continue;
			}

			$stat = stat( path_join( $dir, $file ) );

			if ( $stat['mtime'] + 3600 < time() ) { // 3600 secs == 1 hour
				unlink( path_join( $dir, $file ) );
			}
		}

		closedir( $handle );
	}
}

function wp3cxc2c_captchac_options( $options ) {
	if ( ! is_array( $options ) ) {
		return array();
	}

	$op = array();
	$image_size_array = preg_grep( '%^size:[smlSML]$%', $options );

	if ( $image_size = array_shift( $image_size_array ) ) {
		preg_match( '%^size:([smlSML])$%', $image_size, $is_matches );

		switch ( strtolower( $is_matches[1] ) ) {
			case 's':
				$op['img_size'] = array( 60, 20 );
				$op['base'] = array( 6, 15 );
				$op['font_size'] = 11;
				$op['font_char_width'] = 13;
				break;
			case 'l':
				$op['img_size'] = array( 84, 28 );
				$op['base'] = array( 6, 20 );
				$op['font_size'] = 17;
				$op['font_char_width'] = 19;
				break;
			case 'm':
			default:
				$op['img_size'] = array( 72, 24 );
				$op['base'] = array( 6, 18 );
				$op['font_size'] = 14;
				$op['font_char_width'] = 15;
		}
	}

	$fg_color_array = preg_grep(
		'%^fg:#([0-9a-fA-F]{3}|[0-9a-fA-F]{6})$%', $options );

	if ( $fg_color = array_shift( $fg_color_array ) ) {
		preg_match( '%^fg:#([0-9a-fA-F]{3}|[0-9a-fA-F]{6})$%',
			$fg_color, $fc_matches );

		if ( 3 == strlen( $fc_matches[1] ) ) {
			$r = substr( $fc_matches[1], 0, 1 );
			$g = substr( $fc_matches[1], 1, 1 );
			$b = substr( $fc_matches[1], 2, 1 );

			$op['fg'] = array(
				hexdec( $r . $r ),
				hexdec( $g . $g ),
				hexdec( $b . $b ),
			);
		} elseif ( 6 == strlen( $fc_matches[1] ) ) {
			$r = substr( $fc_matches[1], 0, 2 );
			$g = substr( $fc_matches[1], 2, 2 );
			$b = substr( $fc_matches[1], 4, 2 );

			$op['fg'] = array(
				hexdec( $r ),
				hexdec( $g ),
				hexdec( $b ),
			);
		}
	}

	$bg_color_array = preg_grep(
		'%^bg:#([0-9a-fA-F]{3}|[0-9a-fA-F]{6})$%', $options );

	if ( $bg_color = array_shift( $bg_color_array ) ) {
		preg_match( '%^bg:#([0-9a-fA-F]{3}|[0-9a-fA-F]{6})$%',
			$bg_color, $bc_matches );

		if ( 3 == strlen( $bc_matches[1] ) ) {
			$r = substr( $bc_matches[1], 0, 1 );
			$g = substr( $bc_matches[1], 1, 1 );
			$b = substr( $bc_matches[1], 2, 1 );

			$op['bg'] = array(
				hexdec( $r . $r ),
				hexdec( $g . $g ),
				hexdec( $b . $b ),
			);
		} elseif ( 6 == strlen( $bc_matches[1] ) ) {
			$r = substr( $bc_matches[1], 0, 2 );
			$g = substr( $bc_matches[1], 2, 2 );
			$b = substr( $bc_matches[1], 4, 2 );

			$op['bg'] = array(
				hexdec( $r ),
				hexdec( $g ),
				hexdec( $b ),
			);
		}
	}

	return $op;
}
