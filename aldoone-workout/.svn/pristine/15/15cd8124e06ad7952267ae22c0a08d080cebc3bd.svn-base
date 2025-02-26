<?php
/*
Plugin Name: AldoOne-Workout
Description: A responsive and simple way to display your workouts. Create new workouts, add exercises, descriptions, video links and copy-paste the shortcode into any post/page. This free version is NOT limited and does not contain any ad.
Author: Alaettin Dogan
Author URI: http://www.aldoone-design.de
Version: 1.0
License: GPL2
*/

// Load Style Files 
add_action( 'wp_enqueue_scripts', 'aldoOne_workout_style' );
function aldoOne_workout_style() {
	wp_enqueue_style( 'aldoOne_workout', plugins_url('assets/css/bootstrap.min.css', __FILE__));
}

require_once('meta-box-class/my-meta-box-class.php');
require_once('aldoOne_workout_posttype.php');
require_once('aldoOne_workout_metabox.php');
require_once('aldoOne_workout_view.php');
require_once('aldoOne_workout_overview.php');
?>