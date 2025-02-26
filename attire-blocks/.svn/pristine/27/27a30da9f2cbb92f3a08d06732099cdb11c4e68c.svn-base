<?php


namespace Attire\Blocks;


class __ {




	/**
	 * @param $var
	 * @param $index
	 * @param $params
	 * @param $validate
	 *
	 * @return array|float|int|mixed|string|string[]|null
	 */

	static function valueof( $var, $index, $params = [], $validate = null ) {

		$index   = explode( "/", $index );
		$default = is_string( $params ) ? $params : '';
		if ( is_object( $var ) ) {
			$var = (array) $var;
		}
		$default = is_array( $params ) && isset( $params['default'] ) ? $params['default'] : $default;
		if ( count( $index ) > 1 ) {
			$val = $var;
			foreach ( $index as $key ) {
				$val = is_array( $val ) && isset( $val[ $key ] ) ? $val[ $key ] : '__not__set__';
				if ( $val === '__not__set__' ) {
					return $default;
				}
			}
		} else {
			$val = isset( $var[ $index[0] ] ) ? $var[ $index[0] ] : $default;
		}
		$validate = is_array( $params ) && isset( $params['validate'] ) && ! $validate ? $params['validate'] : $validate;
		if ( $validate ) {
			if ( ! is_array( $val ) ) {
				$val = __::sanitize_var( $val, $validate );
			} else {
				$val = __::sanitize_array( $val, $validate );
			}
		}

		return $val;
	}

	/**
	 * @usage Validate and sanitize input data
	 *
	 * @param $var
	 * @param array $params
	 *
	 * @return int|null|string
	 */
	static function query_var( $var, $params_or_validate = array(), $default = null ) {
		global $wp_query;

		$params = $params_or_validate;

		$_var = explode( "/", $var );
		if ( count( $_var ) > 1 ) {
			$val = $_REQUEST;
			foreach ( $_var as $key ) {
				$val = is_array( $val ) && isset( $val[ $key ] ) ? $val[ $key ] : false;
			}
		} else {
			$default = $default ?: ( isset( $params['default'] ) ? $params['default'] : null );
			$val     = isset( $_REQUEST[ $var ] ) ? $_REQUEST[ $var ] : null;
			if ( ! $val ) {
				$val = isset( $wp_query->query_vars[ $var ] ) ? $wp_query->query_vars[ $var ] : $default;
			}
		}
		$validate = is_string( $params ) ? $params : '';
		$validate = is_array( $params ) && isset( $params['validate'] ) ? $params['validate'] : $validate;

		if ( ! is_array( $val ) ) {
			$val = __::sanitize_var( $val, $validate );
		} else {
			$val = __::sanitize_array( $val, $validate );
		}

		return $val;
	}

	static function timeStamp( $date, $format = true ) {
		if ( $format === false ) {
			return strtotime( $date );
		}
		if ( $format === true ) {
			$format = get_option( 'date_format' ) . ' ' . get_option( 'time_format' );
		}
		$dateobj = \DateTime::createFromFormat( $format, $date );

		return $dateobj->getTimestamp();
	}

	/**
	 * Sanitize an array or any single value
	 *
	 * @param $array
	 *
	 * @return mixed
	 */
	static function sanitize_array( $array, $sanitize = '' ) {
		if ( ! is_array( $array ) ) {
			return esc_attr( $array );
		}
		foreach ( $array as $key => &$value ) {
			$validate = is_array( $sanitize ) && isset( $sanitize[ $key ] ) ? $sanitize[ $key ] : $sanitize;
			if ( is_array( $value ) ) {
				__::sanitize_array( $value, $validate );
			} else {
				$value = __::sanitize_var( $value, $validate );
			}
			$array[ $key ] = &$value;
		}

		return $array;
	}

	/**
	 * @param $value
	 * @param string $sanitize
	 *
	 * @return array|float|int|mixed|string|string[]|null
	 */
	static function sanitize_var( $value, $sanitize = '' ) {
		if ( is_array( $value ) ) {
			return __::sanitize_array( $value, $sanitize );
		} else {
			switch ( $sanitize ) {
				case 'int':
				case 'num':
					return (int) $value;

				case 'double':
				case 'float':
					return (double) ( $value );

				case 'esc_html':
					$value = esc_sql( esc_html( $value ) );
					break;

				case 'txt':
				case 'str':
					$value = sanitize_text_field( $value );
					break;

				case 'esc_attr':
					$value = esc_attr( $value );
					break;

				case 'kses':
					$allowedtags = wp_kses_allowed_html( 'post' );
					/*$allowedtags['div'] = array('class' => true);
					$allowedtags['strong'] = array('class' => true);
					$allowedtags['b'] = array('class' => true);
					$allowedtags['i'] = array('class' => true);
					$allowedtags['a'] = array('class' => true, 'href' => true);
					$allowedtags['ul'] = array('class' => true);
					$allowedtags['ol'] = array('class' => true);
					$allowedtags['li'] = array('class' => true);
					$allowedtags['hr'] = array('class' => true);
					$allowedtags['table'] = array('class' => true);
					$allowedtags['tr'] = array('class' => true);
					$allowedtags['th'] = array('class' => true);
					$allowedtags['thead'] = array('class' => true);
					$allowedtags['tfoot'] = array('class' => true);
					$allowedtags['tbody'] = array('class' => true);
					$allowedtags['td'] = array('class' => true);*/
					$value = wp_kses( $value, $allowedtags );
					break;

				case 'serverpath':
					$value = realpath( $value );
					$value = str_replace( "\\", "/", $value );
					break;

				case 'txts':
					$value = sanitize_textarea_field( $value );
					break;

				case 'url':
					$value = sanitize_url( urldecode( $value ) );
					break;

				case 'noscript':
				case 'escs':
					$value = wpdm_escs( $value );
					break;

				case 'filename':
					$value = sanitize_file_name( $value );
					break;

				case 'alpha':
					$value = preg_replace( "/([^a-zA-Z])/", '', $value );
					break;

				case 'alphanum':
					$value = preg_replace( "/([^a-zA-Z0-9])/", '', $value );
					break;

				case 'username':
					$value = preg_replace( "/([^a-zA-Z0-9_\-\s])/", '', $value );
					break;

				case 'html':

					break;

				default:
					$value = esc_sql( esc_attr( $value ) );
					break;
			}
			$value = __::escs( $value );
		}

		return $value;
	}

	/**
	 * @usage Escape script tag
	 *
	 * @param $html
	 *
	 * @return null|string|string[]
	 */
	static function escs( $html ) {
		return preg_replace( '#<script(.*?)>(.*?)</script>#is', '', $html );
	}

	/**
	 * @return bool
	 */
	static function is_ajax() {
		return ( isset( $_SERVER['HTTP_X_REQUESTED_WITH'] ) && strtolower( $_SERVER['HTTP_X_REQUESTED_WITH'] ) == 'xmlhttprequest' );
	}

	/**
	 * Validate URL
	 *
	 * @param $url
	 *
	 * @return mixed|void
	 */
	static function is_url( $url ) {
		$result = (bool) wp_http_validate_url( $url );

		return apply_filters( '__is_url', $result, $url );
	}

	/**
	 * @usage Post with cURL
	 *
	 * @param $url
	 * @param $data (array)
	 * @param $headers (array)
	 *
	 * @return bool|mixed|string
	 */
	static function remote_post( $url, $data, $headers = [] ) {

		$response = wp_remote_post( $url, array(
				'method'      => 'POST',
				'sslverify'   => false,
				'timeout'     => 5,
				'redirection' => 5,
				'httpversion' => '1.0',
				'blocking'    => true,
				'headers'     => $headers,
				'body'        => $data,
				'cookies'     => array()
			)
		);
		$body     = wp_remote_retrieve_body( $response );

		return $body;
	}

	/**
	 * @usage Get with cURL
	 *
	 * @param $url
	 * @param $headers (array)
	 *
	 * @return bool|mixed|string
	 */
	static function remote_get( $url, $headers = [] ) {
		$content  = "";
		$response = wp_remote_get( $url, array( 'timeout' => 5, 'sslverify' => false, 'headers' => $headers ) );
		if ( is_array( $response ) ) {
			$content = $response['body'];
		} else {
			$content = Messages::error( $response->get_error_message(), - 1 );
		}

		return $content;
	}

	static function hex2rgb( $hex, $array = false ) {
		list( $r, $g, $b ) = sscanf( $hex, "#%02x%02x%02x" );

		return $array ? [ 'r' => $r, 'g' => $g, 'b' => $b ] : "$r, $g, $b";
	}

	/**
	 * @usage Quote all elements in an array
	 *
	 * @param $values
	 *
	 * @return mixed
	 */
	static function quote_all_array( $values ) {
		foreach ( $values as $key => $value ) {
			if ( is_array( $value ) ) {
				$values[ $key ] = self::quote_all_array( $value );
			} else {
				$values[ $key ] = self:: quote_it( $value );
			}
		}

		return $values;
	}

	/**
	 * @usage Quoate a value
	 *
	 * @param $value
	 *
	 * @return array|string
	 */
	static function quote_it( $value ) {
		if ( is_null( $value ) ) {
			return "NULL";
		}
		$value = '"' . esc_sql( $value ) . '"';

		return $value;
	}


	/**
	 * Splice associative array
	 *
	 * @param $input
	 * @param $offset
	 * @param $length
	 * @param $replacement
	 */
	static function array_splice_assoc( &$input, $offset, $length, $replacement ) {
		$replacement = (array) $replacement;
		$key_indices = array_flip( array_keys( $input ) );
		if ( isset( $input[ $offset ] ) && is_string( $offset ) ) {
			$offset = $key_indices[ $offset ];
		}
		if ( isset( $input[ $length ] ) && is_string( $length ) ) {
			$length = $key_indices[ $length ] - $offset;
		}

		$input = array_slice( $input, 0, $offset, true )
		         + $replacement
		         + array_slice( $input, $offset + $length, null, true );
	}

	/**
	 * @param $email
	 * @param $skipDNS
	 *
	 * @return bool
	 */
	static function isValidEmail( $email, $skipDNS = true ) {
		$isValid = true;
		if ( ! is_string( $email ) ) {
			return false;
		}
		$atIndex = strrpos( $email, "@" );
		if ( is_bool( $atIndex ) && ! $atIndex ) {
			$isValid = false;
		} else {
			$domain    = substr( $email, $atIndex + 1 );
			$local     = substr( $email, 0, $atIndex );
			$localLen  = strlen( $local );
			$domainLen = strlen( $domain );
			if ( $localLen < 1 || $localLen > 64 ) {
				// local part length exceeded
				$isValid = false;
			} else if ( $domainLen < 1 || $domainLen > 255 ) {
				// domain part length exceeded
				$isValid = false;
			} else if ( $local[0] == '.' || $local[ $localLen - 1 ] == '.' ) {
				// local part starts or ends with '.'
				$isValid = false;
			} else if ( preg_match( '/\\.\\./', $local ) ) {
				// local part has two consecutive dots
				$isValid = false;
			} else if ( ! preg_match( '/^[A-Za-z0-9\\-\\.]+$/', $domain ) ) {
				// character not valid in domain part
				$isValid = false;
			} else if ( preg_match( '/\\.\\./', $domain ) ) {
				// domain part has two consecutive dots
				$isValid = false;
			} else if ( ! preg_match( '/^(\\\\.|[A-Za-z0-9!#%&`_=\\/$\'*+?^{}|~.-])+$/', str_replace( "\\\\", "", $local ) ) ) {
				// character not valid in local part unless
				// local part is quoted
				if ( ! preg_match( '/^"(\\\\"|[^"])+"$/', str_replace( "\\\\", "", $local ) ) ) {
					$isValid = false;
				}
			}

			if ( ! $skipDNS ) {
				if ( $isValid && ! ( checkdnsrr( $domain, "MX" ) || checkdnsrr( $domain, "A" ) ) ) {
					// domain not found in DNS
					$isValid = false;
				}
			}
		}

		return $isValid;
	}


	static function mnemonicNumberFormat( $number, $plus = true ) {
		if ( $number > 1000000 ) {
			$number = number_format( ( $number / 1000000 ), 1 );
			$number = $number > (int) $number && $plus ? (int) $number . 'M+' : (int) $number . 'M';

			return $number;
		}
		if ( $number > 1000 ) {
			$number = number_format( ( $number / 1000 ), 1 );
			$number = $number > (int) $number && $plus ? (int) $number . 'K+' : (int) $number . 'K';

			return $number;
		}

		return $number;
	}

	static function timezoneOffset() {
		$offet = get_option( 'gmt_offset' );
		if ( $offet ) {
			return $offet * 3600;
		}
		$timezone_string = get_option( 'timezone_string' );
		if ( ! $timezone_string ) {
			return 0;
		}
		$timezone = timezone_open( $timezone_string );
		$datetime = date_create( "now", timezone_open( get_option( 'timezone_string' ) ) );

		return timezone_offset_get( $timezone, $datetime );
	}

	/**
	 * @param $bytes
	 * @param $precision
	 *
	 * @return string
	 */
	static function formatBytes( $bytes, $precision = 2 ) {
		$base     = log( $bytes, 1024 );
		$suffixes = array( 'B', 'KB', 'MB', 'GB', 'TB' );

		return round( pow( 1024, $base - floor( $base ) ), $precision ) . ' ' . $suffixes[ floor( $base ) ];

	}

	static function convertToBytes( $sizeString ) {
		$sizeUnits = [ 'B', 'KB', 'MB', 'GB', 'TB', 'PB', 'EB', 'ZB', 'YB' ];

		// Extract numeric value and unit from the input string
		preg_match( '/^([\d.]+)\s*(' . implode( '|', $sizeUnits ) . ')$/i', $sizeString, $matches );

		if ( ! $matches ) {
			// Invalid input format
			return false;
		}

		$size = (float) $matches[1];
		$unit = strtoupper( $matches[2] );

		// Convert to bytes based on the unit
		$power = array_search( $unit, $sizeUnits );
		$bytes = $size * ( 1024 ** $power );

		return $bytes;
	}

	static function isAuthentic( $nonce_var, $nonce_key, $access_level, $is_ajax = true ) {
		$nonce_var = __::sanitize_var( $nonce_var, 'txt' );
		if ( $is_ajax ) {
			if ( ! check_ajax_referer( $nonce_key, $nonce_var, false ) ) {
				wp_send_json( [
					'success' => false,
					'message' => esc_attr__( 'Referer verification failed', 'attire' )
				] );
			}
		}
		if ( ! wp_verify_nonce( wpdm_query_var( $nonce_var ), $nonce_key ) ) {
			wp_send_json( [
				'success' => false,
				'message' => __( 'Security token is expired! Refresh the page and try again.', 'attire' )
			] );
		}
		if ( ! current_user_can( $access_level ) ) {
			wp_send_json( [
				'success' => false,
				'message' => __( "You are not allowed to execute this action!", 'attire' )
			] );
		}
	}

	function requestURI() {
		$HTTP_HOST   = sanitize_text_field( $_SERVER['HTTP_HOST'] );
		$REQUEST_URI = sanitize_text_field( $_SERVER['REQUEST_URI'] );
		$uri         = ( isset( $_SERVER['HTTPS'] ) && $_SERVER['HTTPS'] === 'on' ? "https" : "http" ) . "://{$HTTP_HOST}{$REQUEST_URI}";
		$uri         = esc_url_raw( $uri );

		return $uri;
	}
}
