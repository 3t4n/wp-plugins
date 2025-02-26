<?php
/*
Plugin Name: WP Admin 한글폰트
Plugin URI: http://850219.com
Description: 한글 Wordpress에서 Admin화면의 한글 폰트를 보완 해 줍니다.
Version: 0.1.1
Author: 김 기홍 (Kim, Ki-hong)
Author URI: http://850219.com
License: Copyright
Text Domain: admin-hangul-font
*/
add_action('admin_init', 'hangul_admin');

function hangul_admin(){
	wp_register_style('hangul.css', plugin_dir_url( __FILE__ ) . 'hangul.css');
	wp_enqueue_style('hangul.css');
}
?>