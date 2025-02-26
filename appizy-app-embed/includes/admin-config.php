<?php
/**
 * Administration menu
 *
 * @package Appizy App Embed
 */

function appizy_menu() {
	add_submenu_page(
		'tools.php',
		__( 'App Embed', 'appizy' ),
		__( 'Appizy', 'appizy' ),
		'edit_posts',
		'appizy-app-embed',
		'appizy_tool_screen'
	);
}

add_action( 'admin_menu', 'appizy_menu' );

/**
 * Content callback for submenu
 */
function appizy_tool_screen() {
	include_once __DIR__ . DIRECTORY_SEPARATOR . 'admin-tools-screen.php';
}

