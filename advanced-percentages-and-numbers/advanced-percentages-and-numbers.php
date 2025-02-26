<?php
   /*
   Plugin Name: Advanced Percentages and Numbers
   Plugin URI:
   description: An advanced way to display percentages and stats on your Wordpress Website.
   Version: 1.0.3
   Author: Toast Plugins
   Author URI: https://www.toastplugins.co.uk/
   */
?>
<?php include dirname(__FILE__). '/backend/backend.php'; ?>
<?php include dirname(__FILE__). '/frontend/shortcode-builder.php'; ?>
<?php function toast_perc_enqueue_frontend_scripts(){

wp_enqueue_script( 'toast_perc_frontend_scripts', plugin_dir_url( __FILE__ ) . 'frontend/script.js', array('jquery'), 'null', false );
wp_enqueue_style( 'toast_perc_frontend_styles', plugin_dir_url( __FILE__ ) . 'frontend/style.css', array(), 'null', false );
} ?>
<?php add_action('wp_enqueue_scripts', 'toast_perc_enqueue_frontend_scripts'); ?>
<?php function toast_perc_enqueue_backend_scripts(){

wp_enqueue_script( 'toast_perc_backend_scripts', plugin_dir_url( __FILE__ ) . 'backend/script.js', array('jquery', 'wp-color-picker'), 'null', false );
wp_enqueue_style( 'toast_perc_backend_styles', plugin_dir_url( __FILE__ ) . 'backend/style.css', array(), 'null', false );
wp_enqueue_style( 'wp-color-picker' );
} ?>
<?php add_action('admin_enqueue_scripts', 'toast_perc_enqueue_backend_scripts'); ?>