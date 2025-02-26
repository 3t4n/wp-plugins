<?php

function access_spring_include_res()
{
	/* Register global styles & scripts */
	wp_enqueue_style('access_spring_styles', plugins_url('/css/style.css', __FILE__));

	wp_enqueue_script('access_spring_script', plugins_url('/js/script.js', __FILE__), array('jquery'));
}

add_action('wp_enqueue_scripts', 'access_spring_include_res');

