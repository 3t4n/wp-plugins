<?php
/**
 * Front CDN
 *
 * @package gcore
 */

/**
 * Function g_core_labs_change_url
 *
 * @param array  $data Required.
 * @param string $urls Required.
 *
 * @return array|mixed|string|string[]
 */
function g_core_labs_change_url( $data, $urls ) {
	global $gcore_cdn_url;

	$gcore_cdn_url = get_option( 'gcore_cdn_url' );
	if ( stripos( $gcore_cdn_url, '[SITE_URL]' ) !== false ) {
		$temp_home_url = wp_parse_url( get_home_url(), PHP_URL_HOST );
		$gcore_cdn_url = str_replace( '[SITE_URL]', $temp_home_url, $gcore_cdn_url );
	}

	$gcore_cdn_exceptions = get_option( 'gcore_cdn_exceptions' );
	$gcore_cdn_exceptions = json_decode( $gcore_cdn_exceptions, true );
	if ( null === $gcore_cdn_exceptions || count( $gcore_cdn_exceptions ) < 1 ) {
		$gcore_cdn_exceptions = array();
	}

	$gcore_folder_advanced = get_option( 'gcore_folder_advanced' );
	if ( 0 === (int) $gcore_folder_advanced ) {
		$gcore_folder_templates = get_option( 'gcore_folder_templates' );
		$gcore_folder_plugins   = get_option( 'gcore_folder_plugins' );
		$gcore_folder_content   = get_option( 'gcore_folder_content' );
		$gcore_folder_wp        = get_option( 'gcore_folder_wp' );
		$gcore_cdn_folders      = array();
		if ( 1 === (int) $gcore_folder_templates ) {
			$gcore_cdn_folders[] = '/wp-content/themes/';
		}
		if ( 1 === (int) $gcore_folder_plugins ) {
			$gcore_cdn_folders[] = '/wp-content/plugins/';
		}
		if ( 1 === (int) $gcore_folder_content ) {
			$gcore_cdn_folders[] = '/wp-content/uploads/';
		}
		if ( 1 === (int) $gcore_folder_wp ) {
			$gcore_cdn_folders[] = '/wp-includes/';
		}
	} else {
		$gcore_cdn_folders = get_option( 'gcore_cdn_folders' );
		$gcore_cdn_folders = json_decode( $gcore_cdn_folders, true );
		if ( null === $gcore_cdn_folders || count( $gcore_cdn_folders ) < 1 ) {
			$gcore_cdn_folders = array();
		}
	}

	$gcore_type_advanced = get_option( 'gcore_type_advanced' );
	if ( 0 === (int) $gcore_type_advanced ) {
		$gcore_type_image   = get_option( 'gcore_type_image' );
		$gcore_type_video   = get_option( 'gcore_type_video' );
		$gcore_type_audio   = get_option( 'gcore_type_audio' );
		$gcore_type_js      = get_option( 'gcore_type_js' );
		$gcore_type_css     = get_option( 'gcore_type_css' );
		$gcore_type_archive = get_option( 'gcore_type_archive' );

		$temp_cdn_type_temp = array();
		if ( 1 === (int) $gcore_type_image ) {
			$temp_cdn_type_temp[] = array( 'jpg', 'jpeg', 'gif', 'png', 'bmp', 'svg', 'webp', 'tif' );
		}
		if ( 1 === (int) $gcore_type_video ) {
			$temp_cdn_type_temp[] = array( 'mp4', 'mov', 'webm', 'ogv' );
		}
		if ( 1 === (int) $gcore_type_audio ) {
			$temp_cdn_type_temp[] = array( 'mp3', 'wav', 'ogg' );
		}
		if ( 1 === (int) $gcore_type_js ) {
			$temp_cdn_type_temp[] = array( 'json', 'js' );
		}
		if ( 1 === (int) $gcore_type_css ) {
			$temp_cdn_type_temp[] = array( 'css', 'map', 'less' );
		}
		if ( 1 === (int) $gcore_type_archive ) {
			$temp_cdn_type_temp[] = array( 'zip', 'rar', 'tar', 'gz', 'bz' );
		}

		$temp_cdn_type = array();
		foreach ( $temp_cdn_type_temp as $e ) {
			$temp_cdn_type = array_merge( $temp_cdn_type, $e );
		}
		$gcore_cdn_types = array();
	} else {
		$gcore_cdn_types = get_option( 'gcore_cdn_types' );
		$gcore_cdn_types = json_decode( $gcore_cdn_types, true );
		if ( null === $gcore_cdn_types || count( $gcore_cdn_types ) < 1 ) {
			$gcore_cdn_types = array();
		}
		$temp_cdn_type = array();
	}

	$urls_temp = explode( ',', $urls );
	$urls_temp = array_diff( $urls_temp, array( '' ) );

	if ( is_array( $urls_temp ) && count( $urls_temp ) > 0 ) {

		foreach ( $urls_temp as $url ) {
			$url = trim( $url );
			$url = explode( '?', $url );
			$url = $url[0];
			$url = explode( ' ', $url );
			$url = $url[0];

			$parsed_url = wp_parse_url( $url );

			if ( isset( $parsed_url['scheme'] ) ) {
				$origin_url = $parsed_url['scheme'] . '://' . $parsed_url['host'] . ( isset( $parsed_url['port'] ) ? ':' . $parsed_url['port'] : '' );
			} else {
				$origin_url = '//' . $parsed_url['host'] . ( isset( $parsed_url['port'] ) ? ':' . $parsed_url['port'] : '' );
			}
			if ( get_home_url() === $origin_url ) {

				if ( ! in_array( $url, $gcore_cdn_exceptions, true ) ) {

					if ( count( $gcore_cdn_folders ) > 0 ) {
						foreach ( $gcore_cdn_folders as $folder ) {

							if ( isset( $parsed_url['path'] ) && substr( $parsed_url['path'], 0, strlen( $folder ) ) === $folder ) {
								$ext = explode( '.', $parsed_url['path'] );
								$ext = end( $ext );
								$ext = explode( ' ', $ext );
								$ext = trim( $ext[0] );

								if ( in_array( $ext, $gcore_cdn_types, true ) || in_array( $ext, $temp_cdn_type, true ) ) {
									$new_url = str_replace( get_home_url() . '/', $gcore_cdn_url, $url );
									$data    = str_replace( $url, $new_url, $data );
								}
							}
						}
					} else {
						$ext = explode( '.', $parsed_url['path'] );
						$ext = end( $ext );
						$ext = explode( ' ', $ext );
						$ext = trim( $ext[0] );
						if ( in_array( $ext, $gcore_cdn_types, true ) || in_array( $ext, $temp_cdn_type, true ) ) {
							$new_url = str_replace( get_home_url() . '/', $gcore_cdn_url, $url );
							$data    = str_replace( $url, $new_url, $data );
						}
					}
				}
			}
		}
	}
	return $data;
}

/**
 * Function g_core_start_buffering
 */
function g_core_start_buffering() {
	ob_start( 'g_core_end_buffering' );
}

/**
 * Function g_core_end_buffering
 *
 * @param string $contents Required.
 * @param int    $phase Required.
 *
 * @return string
 */
function g_core_end_buffering( $contents, $phase ) {
	if ( $phase & PHP_OUTPUT_HANDLER_FINAL || $phase & PHP_OUTPUT_HANDLER_END ) {
		$gcore_enable_cdn = get_option( 'gcore_enable_cdn' );

		if ( !is_admin() && 1 === (int) $gcore_enable_cdn) {
			return g_core_do_replace_urls( $contents );
		}
	}

	return $contents;
}

/**
 * Function g_core_do_replace_urls
 *
 * @param string $contents Required.
 *
 * @return string
 */
function g_core_do_replace_urls( $contents ) {
	$pattern   = '#(?:https?|ftp)://[^\s\,]+[?\'"?]#i';
	$num_found = preg_match_all( $pattern, $contents, $parse_url );
	if ( $num_found ) {
		foreach ( $parse_url[0] as $url ) {
			$url = str_replace( array( '\'', '"' ), array( '', '' ), $url );
			if ( '' !== $url ) {
				$contents = g_core_labs_change_url( $contents, $url );
			}
		}
	}

	return $contents;
}
