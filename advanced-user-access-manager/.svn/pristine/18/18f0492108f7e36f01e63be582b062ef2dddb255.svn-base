<?php

// Exit if accessed directly
if ( ! defined( 'ABSPATH' ) ) {
	exit;
}

function auam_login_page_inline_style() { 
	$login_form_title = get_option( 'auam_login_form_title' );
	$login_bg_color = get_option( 'auam_login_bg_color' );
	$login_form_bg_color = get_option( 'auam_login_form_bg_color' );
	$login_form_text_color = get_option( 'auam_login_form_text_color' );
	$login_form_btn_bg_color = get_option( 'auam_login_form_btn_bg_color' );
	$login_form_btn_text_color = get_option( 'auam_login_form_btn_text_color' );

	if ( $login_form_bg_color ) {
		?>
			<style type="text/css">
				.auam-login #login, .auam-login #login form {
					background: <?php echo esc_attr( $login_form_bg_color['login_form_bg_color'] ); ?> !important; 
					color: <?php echo esc_attr( $login_form_text_color['login_form_text_color'] ); ?> !important;

				}

				#nav a, #backtoblog a, h1 a {
					color: <?php echo esc_attr( $login_form_text_color['login_form_text_color'] ); ?> !important;
				}

				.submit .button {
					background: <?php echo esc_attr( $login_form_btn_bg_color['login_form_btn_bg_color'] ); ?> !important;
					color: <?php echo esc_attr( $login_form_btn_text_color['login_form_btn_text_color'] ); ?> !important;
				}

			</style>
		<?php
	}

	if ( $login_form_title['login_form_title'] ) {
		?>
			<style type="text/css">
				.auam-login #login h1 a {
					text-indent: inherit;
					background: none;
					height: auto;
					width: auto;
					
				}

			</style>
		<?php
	} else {
		?>
			<style type="text/css">
				.auam-login #login h1 a {
					background-image: url(<?php echo esc_url( wp_get_attachment_url( get_option( 'auam_login_form_logo' ) ) ); ?>);
					height: 65px;
					width: 100%;
					background-size: auto;
					background-repeat: no-repeat;
					padding-bottom: 0;
					

				}

			</style>
		<?php
	}

	$settings = auam_user_access_get_settings();
	$enable_bg_image = $settings['enable_bg_image'];

	if ( 'yes' !== $enable_bg_image ) {
		?>
			<style type="text/css">
				body.auam-login { 
					background: <?php echo esc_attr( $login_bg_color['login_bg_color'] ); ?> !important; 
				}

			</style>
		<?php
	} 

	if ( 'yes' === $enable_bg_image ) {
		?>
			<style type="text/css">
				body.auam-login { 
					background: url(<?php echo esc_url( wp_get_attachment_url( get_option( 'auam_login_bg_image' ) ) ); ?>) !important;
					background-repeat: no-repeat !important;
					background-size: cover !important;
					background-position: center !important;

				}

			</style>
		<?php
	} 

	?>

<?php }

add_action( 'login_enqueue_scripts', 'auam_login_page_inline_style' );