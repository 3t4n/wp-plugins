<?php

require_once( dirname( __FILE__ ) . '/../../includes/utils.php' );

function resermy_get_wp_url_query_params() {
	return '?wp=true&wpsid=' . resermy_get_site_id() . '&wpat=' . resermy_get_login_token();
}


function resermy_print_admin_page_intro_styles() {
	wp_enqueue_style( 'resermy_admin_intro_styles', plugin_dir_url( __FILE__ ) . 'resermy_admin_intro.css' );
}

function resermy_print_admin_page_full_styles() {
	wp_enqueue_style( 'resermy_admin_full_styles', plugin_dir_url( __FILE__ ) . 'resermy_admin_full.css' );
}

function resermy_render_page_admin_intro() {
	wp_register_style( 'resermy_admin_intro_styles', plugin_dir_url( __FILE__ ) . 'resermy_admin_intro.css' );
	echo file_get_contents( dirname( __FILE__ ) . '/resermy_admin_intro.html', true );
}


function resermy_render_page_quick_start() {
	resermy_render_page_admin( '/quick-start', '&nsn=' . get_bloginfo( 'name' ) . '&nce=' . get_bloginfo( 'admin_email' ) );
}

function resermy_render_page_admin( $url_path, $query_params = '' ) {
	echo '<div class="resermy_wp_page_admin">
			<iframe src="' . constant( 'resermy_var_admin_root_url' ) . $url_path . resermy_get_wp_url_query_params() . $query_params . '"></iframe>
    </div>';
}