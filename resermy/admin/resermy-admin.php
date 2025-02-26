<?php

require_once( dirname( __FILE__ ) . '/../includes/utils.php' );
require_once( dirname( __FILE__ ) . '/pages/resermy-admin.php' );

function resermy_show_plugin_error() {
	wp_enqueue_script( 'resermy_client_form_init', plugin_dir_url( __FILE__ ) . 'js/resermy_admin_error.js' );
}

function resermy_handle_init_error() {
	add_action( "admin_bar_menu", 'resermy_show_plugin_error' );;
}

function resermy_init_admin() {
	$site_id = resermy_get_site_id();

	$response = wp_remote_post( constant( 'resermy_var_api_wp_address_url' ), array(
		'body'    =>
			array(
				'wpsid' => $site_id,
				'wpat'  => resermy_get_login_token(),
				'wph'   => site_url()
			),
		'timeout' => 60
	) );

	if ( is_wp_error( $response ) ) {
		return resermy_handle_init_error();
	}
	$http_code = wp_remote_retrieve_response_code( $response );
	if ( $http_code !== 200 ) {
		return resermy_handle_init_error();
	}

	$body    = ( json_decode( stripslashes( wp_remote_retrieve_body( $response ) ), false ) );
	$payload = $body->payload;

	resermy_set_login_token( $payload->wpat );
	if ( isset( $payload->sid ) ) {
		resermy_set_store_id( $payload->sid );
	} else {
		resermy_unset_store_id();
	}

	$store_id = resermy_get_store_id();
	if ( is_string( $store_id ) ) {
		add_action( 'admin_menu', function () use ( $payload ) {
			resermy_generate_menu_exists( $payload->wpms );
		} );
	} else {
		add_action( 'admin_menu', 'resermy_generate_menu_new' );
	}
}

$resermy_main_menu_slug = 'resermy_admin';

function resermy_generate_menu_new() {
	global $resermy_main_menu_slug;
	$menu = add_menu_page(
		'Get Started',
		'Resermy',
		'manage_options',
		$resermy_main_menu_slug,
		'resermy_render_page_quick_start',
		plugin_dir_url( __FILE__ ) . 'images/logo_menu_block.png'
	);
	add_action( 'admin_print_styles-' . $menu, 'resermy_print_admin_page_full_styles' );

	$submenu = add_submenu_page(
		$resermy_main_menu_slug,
		'Get Started',
		'Get Started',
		'manage_options',
		$resermy_main_menu_slug
	);
	add_action( 'admin_print_styles-' . $submenu, 'resermy_print_admin_page_full_styles' );

	// About
	resermy_add_about_resermy_plugin();
}

function resermy_generate_menu_exists( $menu_items ) {
	global $resermy_main_menu_slug;

	$menu = add_menu_page(
		'Resermy',
		'Resermy',
		'manage_options',
		$resermy_main_menu_slug,
		function () {
			resermy_render_page_admin( "/" );
		},
		plugin_dir_url( __FILE__ ) . '/images/logo_menu_block.png'
	);
	add_action( 'admin_print_styles-' . $menu, 'resermy_print_admin_page_full_styles' );

	// Calendar
	$calendar_sub_menu = add_submenu_page(
		$resermy_main_menu_slug,
		'Calendar',
		'Calendar',
		'manage_options',
		$resermy_main_menu_slug
	);
	add_action( 'admin_print_styles-' . $calendar_sub_menu, 'resermy_print_admin_page_full_styles' );


	for ( $i = 0; $i < sizeof( $menu_items ); $i ++ ) {
		$menu_item = $menu_items[ $i ];
		$sub_menu  = add_submenu_page(
			$resermy_main_menu_slug,
			$menu_item->label,
			$menu_item->label,
			'manage_options',
			'resermy_' . $menu_item->id,
			function () use ( $menu_item ) {
				resermy_render_page_admin( $menu_item->url );
			}
		);
		add_action( 'admin_print_styles-' . $sub_menu, 'resermy_print_admin_page_full_styles' );

	}

	// About
	resermy_add_about_resermy_plugin();
}

function resermy_add_about_resermy_plugin() {
	global $resermy_main_menu_slug;

	// About
	$about_menu = add_submenu_page(
		$resermy_main_menu_slug,
		'Help',
		'Help',
		'manage_options',
		"resermy_intro",
		'resermy_render_page_admin_intro'
	);
	add_action( 'admin_print_styles-' . $about_menu, 'resermy_print_admin_page_intro_styles' );
}