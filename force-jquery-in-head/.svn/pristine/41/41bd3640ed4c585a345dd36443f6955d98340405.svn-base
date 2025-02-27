<?php
/*
* Plugin Name: Force jQuery in Head
* Description: This Simple plugin helps you to add the jQuery in top of the head in the theme.
* Plugin URI:      https://adrishya.co
* Description:     This Simple plugin helps you to add the jQuery in top of the head in the theme.
* Author:          Jagdish Sarma
* Author URI:      https://jagdish.info
* Version:         1.0.4
*/
/* Start Adding Functions Below this Line */

function jqueryforcehead(){
wp_enqueue_script('jquery', false, array(), false, false);
}
add_filter('wp_enqueue_scripts','jqueryforcehead',1);