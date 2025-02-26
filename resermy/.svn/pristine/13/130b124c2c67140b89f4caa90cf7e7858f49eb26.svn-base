<?php

require_once( dirname( __FILE__ ) . '/../includes/utils.php' );

function resermy_init_client() {
	add_shortcode( 'resermy', 'resermy_render_form_shortcode' );
}

function resermy_render_form_shortcode() {
	$storeId = resermy_get_store_id();
	if ( ! $storeId ) {
		return '<div id="resermy-root" class="resermy-root">Missing store ID</div>';
	}

	// Styling
	wp_enqueue_style( 'resermy_client_form_font', 'https://fonts.googleapis.com/css?family=Raleway:400,700&subset=latin-ext' );
	wp_enqueue_style( 'resermy_client_form_component', constant( 'resermy_var_admin_form_css_url' ) );
	wp_enqueue_style( 'resermy_client_form', plugin_dir_url( __FILE__ ) . 'css/resermy_client_form.css' );

	// Init script
	wp_enqueue_script( 'resermy_client_form_init', plugin_dir_url( __FILE__ ) . 'js/resermy_form_init.js' );
	$params = array( 'storeId' => $storeId );
	wp_localize_script( 'resermy_client_form_init', 'ResermyFormInitParams', $params );

	// ReactJS
	wp_enqueue_script( 'resermy_client_form_js', constant( 'resermy_var_admin_form_js_url' ) );

	return '<div id="resermy-root" class="resermy-root">
		<div style="text-align: center">
			<div id="resermy-lds-ring"><div></div><div></div><div></div><div></div></div>
		</div>
	</div>';
}

