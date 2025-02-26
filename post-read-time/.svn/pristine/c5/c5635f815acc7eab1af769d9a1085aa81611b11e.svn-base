<?php
/**
* Plugin Name: Post read time
* Plugin URI: https://www.popeating.it
* Description: Calculate and add reading time in minute to posts.
* Version: 1.2.6
* Author: Lorenzo Noccioli
* Author URI: https://www.popeating.it
**/

if ( ! defined( 'ABSPATH' ) ) exit;
if ( ! defined( 'WPINC' ) ) {
	die;
}

load_plugin_textdomain( 'post-read-time', false, basename( dirname( __FILE__ ) ) . '/languages/' );


function activate_post_read_time() {
	require_once plugin_dir_path( __FILE__ ) . 'includes/class-activator.php';
	Post_Read_Time_Activator::activate();
}

register_activation_hook(__FILE__, 'activate_post_read_time');

add_action('admin_init', 'post_read_time_act_redirect');



function post_read_time_act_redirect() {
	if (get_option('post-read-time_do_activation_redirect', false)) {
		delete_option('post-read-time_do_activation_redirect');
		if(!isset($_GET['activate-multi']))
		{
			wp_redirect("/wp-admin/options-general.php?page=post-read-time");
		}
	}
}

function deactivate_post_read_time() {
	require_once plugin_dir_path( __FILE__ ) . 'includes/class-deactivator.php';
	Post_Read_Time_Deactivator::deactivate();
}

register_deactivation_hook(__FILE__, 'deactivate_post_read_time');

require_once plugin_dir_path( __FILE__ ) . 'admin/class-admin.php';
$plugin_admin = new PRT_Admin();

add_action( 'admin_menu', array( $plugin_admin, 'add_options_page' ) );
add_action('admin_init', array( $plugin_admin, 'options_update'));

add_filter( 'plugin_action_links_' . plugin_basename(__FILE__), array($plugin_admin, 'add_action_links'));

require_once plugin_dir_path( __FILE__ ) . 'public/class-public.php';
$plugin_public = new PRT_Frontend($plugin_admin->plugin_name, $plugin_admin->plugin_version);
add_action( 'wp_enqueue_scripts', array($plugin_public, 'enqueue_styles' ));


function time_in_minutes($post_id) {
	$plugin_admin = new PRT_Admin();
	$plugin_public = new PRT_Frontend($plugin_admin->plugin_name, $plugin_admin->plugin_version);
	$value=$plugin_public->calculate_time_to_read($post_id);
	echo $value;
}

function get_time_in_minutes($post_id) {
	$plugin_admin = new PRT_Admin();
	$plugin_public = new PRT_Frontend($plugin_admin->plugin_name, $plugin_admin->plugin_version);
	$value=$plugin_public->calculate_time_to_read($post_id);
	return $value;
}
function prt_sh_time() {
	$cid=get_the_ID();
	$sh_min=get_time_in_minutes($cid);
	return $sh_min;
}

add_shortcode( 'post_read_time', 'prt_sh_time' );

$plugin_public->run();

