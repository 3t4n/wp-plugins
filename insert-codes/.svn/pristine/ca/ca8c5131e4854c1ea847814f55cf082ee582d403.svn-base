<?php

namespace InsertCodes\Controllers;

defined( 'ABSPATH' ) || exit; // Exit if accessed directly.

/**
 * Class Execute.
 * Execute the code snippets when needed.
 *
 * @since 1.2.0
 * @package InsertCodes\Controllers
 */
class Execute {
	/**
	 * The error message.
	 *
	 * @var string $error The error message.
	 *
	 * @since 1.2.0
	 */
	private $error;

	/**
	 * Constructor.
	 *
	 * @param string $code The code snippet.
	 * @param array  $args The arguments to pass to the code snippet.
	 *
	 * @since 1.2.0
	 */
	public function __construct( $code, $args = array() ) {
		$this->error = null;
		$this->execute( $code, $args );
	}

	/**
	 * Validate the php code snippet.
	 *
	 * @param string $code The code snippet.
	 *
	 * @since 1.2.0
	 * @return bool
	 */
	public function validate_code( $code ) {
		$tokens    = @token_get_all( '<?php ' . $code ); // phpcs:ignore WordPress.PHP.NoSilencedErrors.Discouraged
		$braces    = 0;
		$in_string = false;

		foreach ( $tokens as $token ) {
			if ( is_string( $token ) ) {
				if ( '{' === $token ) {
					++$braces;
				} elseif ( '}' === $token ) {
					--$braces;
					if ( $braces < 0 ) {
						$this->error = 'Unexpected closing brace';
						return false;
					}
				}
			} else {
				list( $id, $text ) = $token;
				if ( T_INLINE_HTML === $id ) {
					$this->error = 'Unexpected inline HTML';
					return false;
				} elseif ( T_CONSTANT_ENCAPSED_STRING === $id || T_ENCAPSED_AND_WHITESPACE === $id ) {
					$in_string = ! $in_string;
				} elseif ( T_COMMENT === $id || T_DOC_COMMENT === $id ) {
					// Ignore comments.
					continue;
				}

				if ( T_STRING === $id && ( 'die(' === $text || 'wp_die' === $text ) ) {
					$this->error = 'Usage of die() or wp_die() is not allowed';
					return false;
				}
				// phpcs:disable
				// TODO: We should add more checks to validate the code snippet like:
				// elseif ( T_VARIABLE === $id && ! $in_string && ! defined( $text ) ) {
				// $this->error = 'Invalid variable usage';
				// return false;
				// }
				// phpcs:enable
			}
		}

		if ( 0 !== $braces ) {
			$this->error = 'Unmatched braces';
			return false;
		}

		return true;
	}

	/**
	 * Execute the code snippet.
	 *
	 * @param string $code The code snippet.
	 * @param array  $args The arguments to pass to the code snippet.
	 *
	 * @since 1.2.0
	 * @return void|string
	 */
	public function execute( $code, $args = array() ) {
		// Check if the code is empty.
		if ( empty( $code ) ) {
			return;
		}

		// Default arguments.
		$defaults = array(
			'type'     => 'php',
			'location' => 'everywhere',
			'priority' => 'default',
			'hook'     => 'init',
		);
		// Parse the arguments.
		$args = wp_parse_args( $args, $defaults );

		// Check if the code type is set.
		if ( ! isset( $args['type'] ) ) {
			return;
		}

		// Check if the location is set.
		if ( ! isset( $args['location'] ) ) {
			return;
		}

		// Check if the priority is set.
		if ( ! isset( $args['priority'] ) ) {
			return;
		}

		// Check if the hook is set.
		if ( ! isset( $args['hook'] ) ) {
			return;
		}

		// Check if the hook is valid.
		if ( ! has_action( $args['hook'] ) ) {
			return;
		}

		// Check if the code type is valid.
		if ( ! in_array( $args['type'], array( 'php', 'html', 'css', 'js' ), true ) ) {
			return;
		}

		// Check if the location is valid.
		if ( ! in_array( $args['location'], array( 'everywhere', 'frontend_only', 'admin_only' ), true ) ) {
			return;
		}

		// Check if the priority is valid.
		if ( ! in_array( $args['priority'], array( 'high', 'default', 'low' ), true ) ) {
			return;
		}

		// Check if the code snippet is valid.
		if ( ! $this->validate_code( $code ) ) {
			$this->maybe_disable_snippet( $this->error );
			return;
		}

		// Don't allow executing suspicious code.
		if ( self::is_code_not_allowed( $code ) ) {
			$this->maybe_disable_snippet( __( 'Suspicious code detected. Maybe the code snippet contains a disallowed function: wp_die, die, exit, eval.', 'insert-codes' ) );
			return;
		}

		// Check the location value and return if not match.
		if ( 'frontend_only' === $args['location'] && is_admin() ) {
			return;
		}

		if ( 'admin_only' === $args['location'] && ! is_admin() ) {
			return;
		}

		$error = false;

		// Execute the code snippet based on the code type.
		switch ( $args['type'] ) {
			case 'php':
				// Execute the PHP code snippet.
				try {
					eval( $code ); // phpcs:ignore Squiz.PHP.Eval.Discouraged
				} catch ( \Error $e ) {
					$error = array(
						'message' => $e->getMessage(),
						'line'    => $e->getLine(),
					);
				}
				if ( $error ) {
					$this->maybe_disable_snippet( $error['message'], $error['line'] );
				}
				break;
		}
	}

	/**
	 * Add a method to detect suspicious code.
	 *
	 * @param string $code The code to check.
	 *
	 * @since 1.2.0
	 * @return bool
	 */
	public static function is_code_not_allowed( $code ) {
		if ( preg_match_all( '/(base64_decode|error_reporting|ini_set|eval)\s*\(/i', $code, $matches ) ) {
			if ( count( $matches[0] ) > 5 ) {
				return true;
			}
		}

		if ( preg_match( '/dns_get_record/i', $code ) ) {
			return true;
		}

		// if 'wp_die', 'die', 'exit' or 'eval' is present in the code, then remove it.
		if ( preg_match( '/(@?\\\\?(die|wp_die|exit)\s*\(?)/i', $code ) ) {
			return true;
		}

		return false;
	}

	/**
	 * Maybe disable the snippet.
	 *
	 * @param string $error The error message.
	 * @param string $line  The line number.
	 *
	 * @since 1.2.0
	 * @return void
	 */
	public function maybe_disable_snippet( $error, $line = null ) {
		update_option( 'insertcodes_enable_snippets', 'no' );

		// Add a flash notice.
		if ( $line ) {
			$error = sprintf( '%s on line %d', $error, ( absint( $line ) - 1 ) );
		}

		insertcodes()->add_flash_notice( sprintf( '%s And the PHP code snippets has been disabled.', $error ), 'error' );
	}
}
