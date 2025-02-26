<?php
/*
/**
 * Social Media Sections

 */
add_action( 'customize_register', 'abt_social_media' );

function abt_social_media( $wp_customize ) {
    if (abt_fs()->can_use_premium_code()){
        $wp_customize->add_section( 'home_servcies_custom_scripts', array(
            'title'    => esc_html__( 'Header/Footer Scripts', 'alley-business-toolkit' ),
            'priority' => 190,
        ) );
     
        $wp_customize->add_setting( 'custom_header_scripts', array(
            'default' => '',
        ) );
     
        $wp_customize->add_control( new WP_Customize_Code_Editor_Control( $wp_customize, 
            'custom_header_scripts', array(
                'label'     => esc_html__('Header Custom Scripts','alley-business-toolkit'),
                'code_type' => 'javascript',
                'settings'  => 'custom_header_scripts',
                'section'   => 'home_servcies_custom_scripts',
                'editor_settings' => array(
                    'quicktags' => true,
                    'tinymce'   => true,
                ),
            ) 
        ) );
        $wp_customize->add_setting( 'custom_footer_scripts', array(
            'default' => '',
        ) );
     
        $wp_customize->add_control( new WP_Customize_Code_Editor_Control( $wp_customize, 
            'custom_footer_scripts', array(
                'label'     => esc_html__('Footer Custom Scripts','alley-business-toolkit'),
                'code_type' => 'javascript',
                'settings'  => 'custom_footer_scripts',
                'section'   => 'home_servcies_custom_scripts',
                'editor_settings' => array(
                    'quicktags' => true,
                    'tinymce'   => true,
                ),
            ) 
        ) );
    }

    

  
  function abt_sanitize_url( $url ) {
    return esc_url_raw( $url );
  }

}
