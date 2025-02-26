<?php // Flipdish Ordedring - Settings on update

// If this file is called directly, abort.
if ( ! defined( 'ABSPATH' ) ) {

	die;

}


/**
 * on_flipdish_ordering_update() Runs if a setting is modified in settings
 * Adds/removes Apple Pay
 * domain association file to/from .well-known folder.
 */
function on_flipdish_ordering_update( $old_values, $new_values ) {
	// Check if Apple Pay value has changed
	if ( $old_values['fd_apple_pay'] !== $new_values['fd_apple_pay'] ) {

		update_apple_pay_files( $new_values['fd_apple_pay'] );

	}

}
add_action( 'update_option_flipdish_ordering_options', 'on_flipdish_ordering_update', 10, 2 );


// Update Apple Pay files - Add/Remove
function update_apple_pay_files( $new_value ) {

	// Check if adding or not
	$is_adding = 1 === $new_value ? true : false;

	// Get paths
	$root_dir        = get_home_path();
	$dest_dir        = $root_dir . '.well-known';
	$dest_dir_exists = is_dir( $dest_dir );
	$cert_origin     = dirname( __FILE__ ) . '/assets/apple-developer-merchantid-domain-association';
	$cert_dest       = $dest_dir . '/apple-developer-merchantid-domain-association';

	if ( $is_adding ) {
		// Client adding Apple pay

		// Check if .well-known folder exists
		if ( ! $dest_dir_exists ) {
			if ( ! mkdir( $dest_dir ) ) {
				wp_die( esc_html_e( 'Oops.. There was an error creating the .well-known folder' ) );
			}
		}

		// Add Apple pay domain association file to folder
		if ( ! copy( $cert_origin, $cert_dest ) ) {
			wp_die( esc_html_e( 'Oops.. There was an error enabling Apple Pay' ) );
		}
	} else {
		// Client removing Apple pay
		if ( $dest_dir_exists && file_exists( $cert_dest ) ) {
			if ( ! unlink( $cert_dest ) ) {
				wp_die( esc_html_e( 'Oops.. There was an error disabling Apple Pay' ) );
			}
		}
	}
}


// Set data to default options
function flipdish_ordering_reset_data() {

	// Remove Apple pay file if turned on
	$options             = get_option( 'flipdish_ordering_options', flipdish_ordering_options_default() );
	$apple_pay_status    = $options['fd_apple_pay'];
	$apple_pay_is_active = 1 === $apple_pay_status ? true : false;

	if ( $apple_pay_is_active ) {
		update_apple_pay_files( false );
	}

	$default_options = flipdish_ordering_options_default();

	update_option( 'flipdish_ordering_options', $default_options );
	update_option( 'FLIPDISH_ORDERING_VERSION', FLIPDISH_ORDERING_VERSION );

	wp_redirect( admin_url( 'admin.php?page=flipdish-ordering' ) );
	exit();
}
add_action( 'admin_post_flipdish_ordering_reset_data', 'flipdish_ordering_reset_data' );
