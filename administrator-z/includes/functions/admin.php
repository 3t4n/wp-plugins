<?php
function adminz_admin_login_footer_text( $text ) {
	add_action( 'login_footer', function () use ($text) {
		$text = wp_kses_post( $text );
		echo <<<HTML
        <div style="max-width: 320px; margin: auto; text-align: center; padding: 24px 0;">
            $text
        </div>
        HTML;
	} );
}

function adminz_admin_login_logo( $image_id ) {
	add_filter( 'login_enqueue_scripts', function () use ($image_id) {
		$image_id = intval( $image_id );
		if ( !wp_attachment_is_image( $image_id ) ) {
			return;
		}
		$image_url = wp_get_attachment_image_url( $image_id, 'full' );
		if ( !$image_url ) {
			return;
		}
		$image_url = esc_url( $image_url );
		echo <<<HTML
        <style type="text/css">
            h1 a {
                background-image: url($image_url) !important; 
                background-size: contain !important; 
                width: 100% !important;
                max-width: 280px;
            }
            </style>
        HTML;
	} );
}

function adminz_admin_background( $image_id ) {
	add_action( 'login_enqueue_scripts', function () use ($image_id) {
		$image_id   = intval( $image_id );
		$attachment = get_post( $image_id );
		if ( !$attachment || $attachment->post_type !== 'attachment' || !wp_attachment_is_image( $image_id ) ) {
			return;
		}
		$image_url = wp_get_attachment_image_url( $image_id, 'full' );
		if ( !$image_url ) {
			return;
		}

		$image_url = esc_url( $image_url );
		echo <<<HTML
        <style type="text/css">
            body.login {
                background-image: url($image_url) !important;
                background-size: cover !important;
                background-position: center center !important;
            }
        </style>
        HTML;
	} );
}

function adminz_plugins_installed() {
	if ( !function_exists( 'get_plugins' ) ) {
		require_once ABSPATH . 'wp-admin/includes/plugin.php';
	}

	$plugins       = get_plugins();
	$plugins_array = [];

	foreach ( $plugins as $plugin_file => $plugin_data ) {
		$plugins_array[ $plugin_file ] = $plugin_data['Name'];
	}

	return $plugins_array;
}

function adminz_disable_plugin_update( $file ) {
	add_filter( 'site_transient_update_plugins', function ($value, $transient) use ($file) {
		if ( array_key_exists( $file, $value->response ?? [] ) ) {
			unset( $value->response[ $file ] );
		}
		return $value;
	}, 10, 2 );
}

function adminz_toggle_button( $button, $target ) {
	return <<<HTML
    <button type="button" class="adminz_toggle button" data-toggle="{$target}" style="margin-top: 15px;">
        {$button}
    </button>
    HTML;
}