<?php
/**
 * Plugin Customizer
 *
 * @package    awesome_instagram_feed
 * @subpackage awesome_instagram_feed/inc
 */

/**
 * Add postMessage support for site title and description for the Theme Customizer.
 *
 * @param WP_Customize_Manager $wp_customize Theme Customizer object.
 */
function awesome_instagram_feed_customize_register( $wp_customize ) {
    $aif_options = awesome_instagram_feed_options();


    $wp_customize->add_section(
        'awesome_instagram_feed_options',
        array(
            'title' => esc_html__( 'Awesome Instagram Feed Options','awesome-instagram-feed' ),
            'capability'=>'edit_theme_options',
            'priority' => 1,
        )
    );


        $wp_customize->add_setting( 'awesome_instagram_feed_options[instagram_feed_style]', array(
          'capability' => 'edit_theme_options',
          'default' => 'slider',
          'type' => 'option',
        ) );

        $wp_customize->add_control( 'awesome_instagram_feed_options[instagram_feed_style]', array(
          'type' => 'radio',
          'section' => 'awesome_instagram_feed_options', // Add a default or your own section
          'label' =>esc_attr( __('Choose Instagram Style', 'awesome-instagram-feed') ),
          'description' => esc_attr( __('Choose Either Grid or Slider Style', 'awesome-instagram-feed') ),
          'choices' => array(
            'slider' => esc_attr( __('Slider Style', 'awesome-instagram-feed') ),
            'grid' => esc_attr( __('Grid Style', 'awesome-instagram-feed') ),
          ),
        ) );

        $wp_customize->add_setting('awesome_instagram_feed_options[instagram_feed_username]',
        array(
            'default' => $aif_options['instagram_feed_username'],
            'type' => 'option',
            'sanitize_callback' => 'sanitize_text_field',
        ));
        $wp_customize->add_control('awesome_instagram_feed_options[instagram_feed_username]',
        array(
            'label' => esc_html__('Instagram Username', 'awesome-instagram-feed'),
            'description' => esc_attr( __('Enter Instagram Username without @', 'awesome-instagram-feed') ),
            'section' => 'awesome_instagram_feed_options',
            'type' => 'text',
        ));

        $wp_customize->add_setting('awesome_instagram_feed_options[instagram_feed_accesstoken]',
        array(
            'default' => $aif_options['instagram_feed_accesstoken'],
            'type' => 'option',
            'sanitize_callback' => 'sanitize_text_field',
        ));
        $wp_customize->add_control('awesome_instagram_feed_options[instagram_feed_accesstoken]',
        array(
            'label' => esc_html__('Instagram Acess Token', 'awesome-instagram-feed'),
            'description' => esc_attr( __('Enter Instagram Acess Token', 'awesome-instagram-feed') ),
            'section' => 'awesome_instagram_feed_options',
            'type' => 'text',
        ));

        $wp_customize->add_setting('awesome_instagram_feed_options[instagram_feed_clientid]',
        array(
            'default' => $aif_options['instagram_feed_clientid'],
            'type' => 'option',
            'sanitize_callback' => 'sanitize_text_field',
        ));
        $wp_customize->add_control('awesome_instagram_feed_options[instagram_feed_clientid]',
        array(
            'label' => esc_html__('Instagram Client ID', 'awesome-instagram-feed'),
            'description' => esc_attr( __('Enter Instagram Client ID', 'awesome-instagram-feed') ),
            'section' => 'awesome_instagram_feed_options',
            'type' => 'text',
        ));

        $wp_customize->add_setting('awesome_instagram_feed_options[instagram_title]',
        array(
            'default' => $aif_options['instagram_title'],
            'type' => 'option',
            'sanitize_callback' => 'sanitize_text_field',
        ));
        $wp_customize->add_control('awesome_instagram_feed_options[instagram_title]',
        array(
            'label' => esc_html__('Instagram Title', 'awesome-instagram-feed'),
            'section' => 'awesome_instagram_feed_options',
            'type' => 'text',
        ));

        $wp_customize->add_setting('awesome_instagram_feed_options[instagram_url]',
        array(
            'default' => $aif_options['instagram_url'],
            'type' => 'option',
            'sanitize_callback' => 'sanitize_text_field',
        ));
        $wp_customize->add_control('awesome_instagram_feed_options[instagram_url]',
        array(
            'label' => esc_html__('Instagram url', 'awesome-instagram-feed'),
            'description' => esc_attr( __('Enter Instagram URL', 'awesome-instagram-feed') ),
            'section' => 'awesome_instagram_feed_options',
            'type' => 'text',
        ));

}
add_action( 'customize_register', 'awesome_instagram_feed_customize_register' );



/**
 * Binds JS handlers to make Theme Customizer preview reload changes asynchronously.
 */
function awesome_instagram_feed_customize_preview_js() {
	wp_enqueue_script( 'ng-slider-customizer', plugin_dir_path( __FILE__ ) . '/js/customizer.js', array( 'customize-preview' ), '20151215', true );
}
add_action( 'customize_preview_init', 'awesome_instagram_feed_customize_preview_js' );




