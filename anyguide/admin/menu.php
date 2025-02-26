<?php

add_action('admin_menu', 'anyguide_menu');


function anyguide_menu(){
	add_menu_page('anyguide-snippet', 'AnyRoad', 'manage_options', 'anyguide-manage','anyguide_snippets',plugins_url('assets/images/button16.png', dirname(__FILE__)));

	add_submenu_page('anyguide-manage', 'Anyguide Snippets', 'My Snippets', 'manage_options', 'anyguide-manage',   'anyguide_snippets');
	add_submenu_page('anyguide-manage', 'Anyguide Snippets', 'Settings', 'manage_options', 'anyguide-settings', 'anyguide_settings');
	add_submenu_page('anyguide-manage', 'Anyguide Snippets', 'Help',     'manage_options', 'anyguide-help',     'anyguide_help');
}

function anyguide_snippets(){
	$formflag = 0; // class="current" on item

	// Add Snippet
	if(isset($_GET['action']) && $_GET['action']=='snippet-add' ) {
		require( dirname( __FILE__ ) . '/header.php' );
		require( dirname( __FILE__ ) . '/snippet-add.php' );
		require( dirname( __FILE__ ) . '/footer.php' );
		$formflag=1;
	}

	// Edit Snippet
	if(isset($_GET['action']) && $_GET['action']=='snippet-edit' ) {
		require( dirname( __FILE__ ) . '/header.php' );
		include(dirname( __FILE__ ) . '/snippet-edit.php');
		require( dirname( __FILE__ ) . '/footer.php' );
		$formflag=1;
	}

	// Delete Snippet
	if(isset($_GET['action']) && $_GET['action']=='snippet-delete' ) {
		include(dirname( __FILE__ ) . '/snippet-delete.php');
		$formflag=1;
	}

	if($formflag == 0){
		require( dirname( __FILE__ ) . '/header.php' );
		require( dirname( __FILE__ ) . '/snippets.php' );
		require( dirname( __FILE__ ) . '/footer.php' );
	}
}

function anyguide_settings() {
	require( dirname( __FILE__ ) . '/header.php' );
	require( dirname( __FILE__ ) . '/settings.php' );
	require( dirname( __FILE__ ) . '/footer.php' );
}

function anyguide_about() {
	require( dirname( __FILE__ ) . '/header.php' );
	require( dirname( __FILE__ ) . '/about.php' );
	require( dirname( __FILE__ ) . '/footer.php' );
}

function anyguide_help() {
	require( dirname( __FILE__ ) . '/header.php' );
	require( dirname( __FILE__ ) . '/help.php' );
	require( dirname( __FILE__ ) . '/footer.php' );
}

function anyguide_admin_queue() {
	$array = array("anyguide-manage","anyguide-settings", "anyguide-help", "anyguide-about");

	if(0 < count(array_intersect(array_map('strtolower', explode(' ', $_GET['page'])), $array))) {
		wp_enqueue_script('jquery');

		// List Files
		wp_register_script('mixpanel',               plugins_url('assets/js/mixpanel.js', dirname(__FILE__)));
		wp_register_script('mixpanel_events',        plugins_url('assets/js/mixpanel_events.js', dirname(__FILE__)));
		wp_register_script('intercom',             plugins_url('assets/js/intercom.js', dirname(__FILE__)));
		wp_register_script('anyguide_notice_script', plugins_url('assets/js/notice.js', dirname(__FILE__)));
		wp_register_style('anyroad_design',          plugins_url('assets/css/anyroad_design.css', dirname(__FILE__)));
		wp_register_script('bootstrap_collapse', plugins_url('assets/js/bootstrap-collapse.js', dirname(__FILE__)));

		// CDN
		wp_register_style('bootstrap', 'https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css');
		wp_register_style('opensans', 'https://fonts.googleapis.com/css?family=Open+Sans:400,700');
		wp_register_style('fontawesome', 'https://maxcdn.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css');


		// Enqueue Styles
		wp_enqueue_style('opensans');
		wp_enqueue_style('anyroad_design');
		wp_enqueue_style('bootstrap');
		wp_enqueue_style('fontawesome');

		// Enqueue Javascripts
		wp_enqueue_script('bootstrap_collapse');
		wp_enqueue_script('mixpanel');
		wp_enqueue_script('mixpanel_events');
		wp_enqueue_script('anyguide_notice_script');
		wp_enqueue_script('intercom');
	}

	wp_register_style('global', plugins_url('assets/css/global.css', dirname(__FILE__) ));
	wp_enqueue_style('global');
}

function anyguide_integration() {
	wp_enqueue_script('integration', 'https://www.anyguide.com/assets/integration.js');
	wp_enqueue_script('integration');
}

add_action('admin_enqueue_scripts', 'anyguide_admin_queue');
add_action('wp_enqueue_scripts', 'anyguide_integration');

?>