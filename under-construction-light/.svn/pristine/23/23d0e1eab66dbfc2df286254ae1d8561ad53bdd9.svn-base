<?php
/**
 * Under Construction Light
 *
 * Plugin Name: Under Construction Light
 * Plugin URI:  https://wordpress.org/plugins/under-construction-light
 * Description: Light weight plugin which helps to hide website from visitors and display under construction page.
 * Version:     1.0.0
 * Author:      Saurav Sharma
 * Author URI:  https://phpesperto.com/saurav-sharma
 * License:     GPLv2 or later
 * License URI: http://www.gnu.org/licenses/old-licenses/gpl-2.0.html
 * Text Domain: under-construction-light
 * Domain Path: /languages
 * Requires at least: 4.9
 * Tested up to: 8.3
 * Requires PHP: 7.3
 *
 * This program is free software; you can redistribute it and/or modify it under the terms of the GNU
 * General Public License version 2, as published by the Free Software Foundation. You may NOT assume
 * that you can use any other version of the GPL.
 *
 * This program is distributed in the hope that it will be useful, but WITHOUT ANY WARRANTY; without
 * even the implied warranty of MERCHANTABILITY or FITNESS FOR A PARTICULAR PURPOSE.
 */
function ucl_register_options_function() {
    add_options_page('Under Construction', 'Under Construction', 'manage_options', 'ucl_options', 'ucl_options_setting_page');
}
add_action('admin_menu', 'ucl_register_options_function');

function ucl_options_setting_page() {
    ?>
    <h1> <?php esc_html_e( 'Under Construction Light Settings', 'under-construction-light' ); ?> </h1>
    <form method="POST" action="options.php">
    <?php
    settings_fields( 'ucl-page' );
    do_settings_sections( 'ucl-page' );
    submit_button();
    ?>
    </form>
    <div class="gdpmain_buy_paypal">
		<form action="https://www.paypal.com/cgi-bin/webscr" method="post" target="_top">
			<input type="hidden" name="cmd" value="_s-xclick">
			<input type="hidden" name="hosted_button_id" value="AF5FFTLYGZDMW">
			<input type="image" src="<?php echo plugin_dir_url( dirname( __FILE__ ) ) . 'under-construction-light/assets/images/buy-coffee.gif'; ?>" border="0" name="submit" alt="PayPal – The safer, easier way to pay online!">
			<img alt="" border="0" src="https://www.paypalobjects.com/en_GB/i/scr/pixel.gif" width="1" height="1">
		</form>
	</div>
    <?php
}


add_action( 'admin_init', 'ucl_fields_settings_page_init' );

function ucl_fields_settings_page_init() {

    add_settings_section(
        'ucl_page_setting_section', __( '', 'ucl-plugin' ), 'ucl_setting_section_callback_function', 'ucl-page'
    );

	add_settings_field( 
		'ucl_phpespeto_field',  __( 'Select Image', 'ucl-plugin' ), 'ucl_setting_phpesperto_function', 'ucl-page', 'ucl_page_setting_section'
	);
    
    add_settings_field( 
		'ucl_phpespeto_field2',  __( 'Enable/Disable', 'ucl-plugin' ), 'ucl_enable_disable_phpesperto_function', 'ucl-page', 'ucl_page_setting_section'
	);

	register_setting( 'ucl-page', 'ucl_phpespeto_field' );
	register_setting( 'ucl-page', 'ucl_phpespeto_field2' );
}


function ucl_setting_section_callback_function() {
    // jQuery
	wp_enqueue_script('jquery');
	// This will enqueue the Media Uploader script
	wp_enqueue_media();
    // CSS
    wp_enqueue_style( 'ucl_phpesperto', plugins_url( '/assets/css/style.css', __FILE__ ));
   // JavaScript
   wp_enqueue_script( 'ucl_phpesperto', plugins_url( '/assets/js/script.js', __FILE__ ),array('jquery'));
}



function ucl_enable_disable_phpesperto_function() {
    ?>
    <div class="button b2" id="button-16">
          <input type="checkbox" class="<?php esc_html_e( 'checkbox', 'under-construction-light' ); ?>" name="<?php esc_html_e( 'ucl_phpespeto_field2', 'under-construction-light' ); ?>" value="1" <?php if(get_option( 'ucl_phpespeto_field2' )==1) { echo 'checked'; } ?>>
          <div class="knobs"></div>
          <div class="layer"></div>
        </div>
    <?php
}

function ucl_setting_phpesperto_function() {
    ?>
	<input type="text" name="ucl_phpespeto_field" id="ucl_phpespeto_field" class="regular-text" value="<?php echo esc_attr(get_option( 'ucl_phpespeto_field' )); ?>">
    <input type="button" name="ucl_phpespeto_field" id="upload-btn" class="button-secondary" value="Upload Image">
    
    <?php
}

function ucl_enqueue_wp_media_script() {
    wp_enqueue_media();
}
add_action( 'admin_enqueue_scripts', 'ucl_enqueue_wp_media_script' );


function under_construction_light_maintenance_mode() {
	global $pagenow;
	if ( $pagenow !== 'wp-login.php' && ! current_user_can( 'manage_options' ) && ! is_admin() && get_option( 'ucl_phpespeto_field2' )==1 ) {
		header( sanitize_text_field($_SERVER["SERVER_PROTOCOL"]) . ' 503 Service Temporarily Unavailable', true, 503 );
		header( 'Content-Type: text/html; charset=utf-8' );
		if ( file_exists( plugin_dir_path( __FILE__ ) . 'template.php' ) ) {
			require_once( plugin_dir_path( __FILE__ ) . 'template.php' );
		}
		die();
	}
}

add_action( 'wp_loaded', 'under_construction_light_maintenance_mode' );