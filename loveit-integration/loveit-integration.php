<?php
/**
 * @package LoveIt Integration
 * @version 0.4
 */
/*
Plugin Name: LoveIt Integration
Plugin URI: https://loveit.tips
Description: Official https://loveit.tips integration plugin, that will add LoveIt FAB at every post.
Version: 0.4
Author URI: http://github.com/mavarazy
Text Domain: LoveIt Integration
*/

// This just echoes the chosen line, we'll position it later
function add_loveit_button($input) {
 return $input . "<iframe src='https://loveit.tips/integration' width='80' height='100' frameBorder='0' style='position: fixed; right: 10px; bottom: 10px'/>";
}

// Now we set that function up to execute when the admin_notices action is called
add_action( 'the_content', 'add_loveit_button' );

?>
