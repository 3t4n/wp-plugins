<?php
/**
 * @package whatsapp aio
 * This is the summary for a DocBlo.
 *
 * This is the description for a DocBlock. This text may contain
 * multiple lines and even some _markdown_.
 *
 * * Markdown style lists function too
 * * Just try this out once
 *
 * The section after the description contains the tags; which provide
 * structured meta-data concerning the given element.
 *
 * @author  Mike van Riel <me@mikevanriel.com>
 *
 * @since 1.0
 *
 * @param int    $example  This is an example function/method parameter description.
 * @param string $example2 This is a second example.
 **/

if ( ! function_exists( 'mywhatsapp_register_settings' ) ) {
	function mywhatsapp_register_settings() {
		
		add_option( 'mywhatsapp_option_name', 'This is my option value.' );

		add_option( 'text', 'This is my option value.' );

		add_option( 'Waiowhatsapphelpbut', 'test button' );

		add_option( 'floatingwhatsapp', '0' );

		add_option( 'onlyfloatmobile', '0' );

		add_option( 'Waiowhatsapphelpshortcss', '1' );


		register_setting( 'mywhatsapp_options_group', 'floatingwhatsapp', 'mywhatsapp_callback' );

		register_setting( 'mywhatsapp_options_group', 'Waiowhatsapphelpbut', 'mywhatsapp_callback' );

		register_setting( 'mywhatsapp_options_group', 'text', 'mywhatsapp_callback' );

		register_setting( 'mywhatsapp_options_group', 'onlyfloatmobile', 'mywhatsapp_callback' );

		register_setting( 'mywhatsapp_options_group', 'mywhatsapp_option_name', 'mywhatsapp_callback' );

	}
}
if ( ! function_exists( 'mywhatsapp_callback' ) ) {
	function mywhatsapp_callback( $safebaby ) {
		$safebaby = sanitize_text_field( $safebaby );
		return $safebaby;
	}
}

add_action( 'admin_init', 'mywhatsapp_register_settings' );

if ( ! function_exists( 'mywhatsapp_register_options_page' ) ) {
	function mywhatsapp_register_options_page() {
			add_menu_page(
				'whatsapp support',
				'Whatsapp Button',
				'manage_options',
				'waiowhatsapp',
				array( 'Waiowhatsapphelp', 'waiowhatsapp_options_page' )
			);
			
	}
}

add_action( 'admin_menu', 'mywhatsapp_register_options_page' );
