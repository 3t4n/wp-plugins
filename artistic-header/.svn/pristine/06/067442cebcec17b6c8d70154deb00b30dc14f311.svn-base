<?php
/**
*Plugin Name: Artistic Header
*Plugin URI: http://wordpress.org/plugins/artistic-header/
*Description: Set your image as background for header and choose text color.
*Version: 1.0
*Author: Shalaeva
*Author URI: http://withzest.ru
*/
/**
*Adding file with translations
*
*@return bool TRUE as textdomain well loaded or FALSE on failure
*/
function artistic_header_plugin_init(){
	load_plugin_textdomain( 'artistic-header', false, dirname( plugin_basename( __FILE__ ) ). '/languages' ); 
}
add_action('plugins_loaded', 'artistic_header_plugin_init');

/**
*Adding section to select header background image and header text color.
*/
add_action( 'customize_register', function( $customizer ) {
    $customizer->add_section(
        'header_background',
        array(
            'title'     => __( 'Header background', 'artistic-header' ),
            'priority'  => 11
        )
    );
    $customizer->add_setting(
        'upload_image'
    );
    $customizer->add_control(
        new WP_Customize_Image_Control(
            $customizer,
            'upload_image',
            array(
                'label' => __( 'Upload image', 'artistic-header' ),
                'section' => 'header_background',
                'settings' => 'upload_image'
            )
        )
    );
    $customizer->add_section(
        'header_text_color',
        array(
            'title'     => __( 'Header text color', 'artistic-header' ),
            'priority'  => 11
        )
    );
    $customizer->add_setting(
        'select_color',
        array(
            'default'           => '#000000',
            'sanitize_callback' => 'sanitize_hex_color',
        )
    );
    $customizer->add_control(
        new WP_Customize_Color_Control(
            $customizer,
            'select_color',
            array(
                'label'     => __( 'Select color', 'artistic-header' ),
                'section'   => 'header_text_color',
                'settings'  => 'select_color',
           )
        )
    );
} );
?>