<?php
/**
 * Enqueue and handle assets
 *
 * @since      1.0.2
 * @package    Advamentor
 * @author     Themexa
 */

/*
 * Exit if accessed directly.
 */

if ( ! defined( 'ABSPATH' ) ) {
    exit;
}

/*
 * Front Assets
 */

function advamentor_enqueue_front_assets() {

    wp_enqueue_style( 'advamentor-front-bootstrap-css', plugin_dir_url( dirname( __FILE__ ) ) . 'assets/front/css/bootstrap.min.css' );
    wp_enqueue_style( 'advamentor-flipclock-styles', plugin_dir_url( dirname( __FILE__ ) ) . 'assets/front/css/flipclock.css' );
    wp_enqueue_style( 'advamentor-slick-styles', plugin_dir_url( dirname( __FILE__ ) ) . 'assets/front/css/slick.css' );
    wp_enqueue_style( 'advamentor-slick-theme-styles', plugin_dir_url( dirname( __FILE__ ) ) . 'assets/front/css/slick-theme.css' );
    wp_enqueue_style( 'advamentor-flipster-styles', plugin_dir_url( dirname( __FILE__ ) ) . 'assets/front/css/jquery.flipster.min.css' );
    wp_enqueue_style( 'advamentor-front-styles', plugin_dir_url( dirname( __FILE__ ) ) . 'assets/front/css/plugin-front-styles.css', array(), null );

    wp_enqueue_script( 'advamentor-front-popper-js', plugin_dir_url( dirname( __FILE__ ) ) . 'assets/front/js/popper.min.js', array( 'jquery' ) );
    wp_enqueue_script( 'advamentor-front-bootstrap-js', plugin_dir_url( dirname( __FILE__ ) ) . 'assets/front/js/bootstrap.min.js', array( 'jquery' ) );
    wp_enqueue_script( 'advamentor-front-scripts', plugin_dir_url( dirname( __FILE__ ) ) . 'assets/front/js/plugin-front-scripts.js', array( 'jquery' ), false );
    wp_enqueue_script( 'advamentor-flipclock', plugin_dir_url( dirname( __FILE__ ) ) . 'assets/front/js/flipclock.js', array( 'jquery' ), false );
    wp_enqueue_script( 'advamentor-typeit', plugin_dir_url( dirname( __FILE__ ) ) . 'assets/front/js/typeit.min.js', array( 'jquery' ), false );
    wp_enqueue_script( 'advamentor-typer', plugin_dir_url( dirname( __FILE__ ) ) . 'assets/front/js/typer.js', array( 'jquery' ), false, true );
    wp_enqueue_script( 'advamentor-countup', plugin_dir_url( dirname( __FILE__ ) ) . 'assets/front/js/countup.js', array( 'jquery' ), false );
    wp_enqueue_script( 'advamentor-slick', plugin_dir_url( dirname( __FILE__ ) ) . 'assets/front/js/slick.min.js', array( 'jquery' ), false );
    wp_enqueue_script( 'advamentor-flipster', plugin_dir_url( dirname( __FILE__ ) ) . 'assets/front/js/jquery.flipster.min.js', array( 'jquery' ), false );

}
add_action( 'wp_enqueue_scripts', 'advamentor_enqueue_front_assets' );

/*
 * Admin Assets
 */

function advamentor_enqueue_admin_assets( $hook ) {
	global $advamentor_admin_menu_page;
	if( $hook != $advamentor_admin_menu_page ) {
		return;
	}

	wp_enqueue_style( 'advamentor-google-fonts-poppins', 'https://fonts.googleapis.com/css?family=Poppins' );
    wp_enqueue_style( 'advamentor-admin-bootstrap-css',  plugin_dir_url( dirname( __FILE__ ) ) . 'assets/admin/css/bootstrap.min.css' );
    wp_enqueue_style( 'advamentor-admin-styles',  plugin_dir_url( dirname( __FILE__ ) ) . 'assets/admin/css/plugin-admin-styles.css' );

    wp_enqueue_script( 'jquery' );
    wp_enqueue_script( 'advamentor-admin-popper-js',  plugin_dir_url( dirname( __FILE__ ) ) . 'assets/admin/js/popper.min.js' );
    wp_enqueue_script( 'advamentor-admin-bootstrap-js',  plugin_dir_url( dirname( __FILE__ ) ) . 'assets/admin/js/bootstrap.min.js' );
    wp_enqueue_script( 'advamentor-admin-script-js',  plugin_dir_url( dirname( __FILE__ ) ) . 'assets/admin/js/plugin-admin-scripts.js' );
}
add_action( 'admin_enqueue_scripts', 'advamentor_enqueue_admin_assets' );

