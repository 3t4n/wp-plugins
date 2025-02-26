<?php 

if ( !defined( 'ABSPATH' ) ) exit;

function awar_clean_db() {
	awar_settings('delete');

	echo 'The database is clean now. '; 
	echo 'if you still see data, it might be a default or browser cached value (reloading helps), thank you '; 
	echo '<br><a href="index.php">Dashboard</a> <br> <a href="plugins.php">Plugins</a>';
	echo '<br><hr><a href="admin-ajax.php?action=awar_reset_db">Press me</a> '; 
	echo 'to fill the settings with default values';

	die;
}

function awar_reset_db() {
	awar_settings('update');

	echo 'The database is reseted '; 
	echo 'if you still see data, it might be a default or browser cached value (reloading helps), thank you';
	echo '<br><a href="index.php">Dashboard</a> <br>';
	echo '<a href="plugins.php">Plugins</a>';

	die;
}

// Just logged-in user
add_action('wp_ajax_awar_reset_db', 'awar_reset_db');
add_action('wp_ajax_awar_clean_db', 'awar_clean_db');