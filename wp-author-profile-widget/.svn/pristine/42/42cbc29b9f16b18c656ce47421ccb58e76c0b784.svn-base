<?php 
function wpauthor_customize_register( $wp_customize ) {
    //All our sections, settings, and controls will be added here
    
/**
	 * ************** Add panel **************
	 */
    $panel = 'wpauthor_customizer_panel';
    $wp_customize->add_panel(  $panel, 
        array(
            'priority'       => 22,
            'title'            => __( 'WP Author Profile Widget', 'wpauthor' ),
            'description'      => __( 'You can best appearence if you open the Quick view before customize.', 'wpauthor' ),
        ) 
    );

/**
 * ************** Add Sections **************
 */
 $wp_customize->add_section( 'wpauthor_general_section', array(
     'title'       => __( 'WP Author Profile Widget', 'wpauthor' ),
     'priority'    => 11,
     //'panel'       =>  $panel, // No need now
 ) );

 $wp_customize->add_setting( 'wpauthor_label', array(
    'transport' => 'postMessage',
    'type' => 'option',
    'default' => 'Read Article',
    'sanitize_callback' => 'sanitize_text_field',
) );

$wp_customize->add_control( 'wpauthor_label', array(
    'type' => 'text',
    'section' => 'wpauthor_general_section', // Add a default or your own section
    'label' => __( 'Read More Title','wpauthor' ),
    'priority' => 1,
) );




$wp_customize->add_setting(
    'read_more_color', //give it an ID
    array(
      'transport' => 'refresh',
      'default' => '', // Give it a default
      'sanitize_callback' => 'sanitize_hex_color',
      'type' => 'option'
    )
  );

$wp_customize->add_control(
    new WP_Customize_Color_Control(
        $wp_customize,
        'read_more_color', //give it an ID
        array(
            'label'      => __( 'Read More Color', 'wpauthor' ), 
            'section'    => 'wpauthor_general_section',  
            'settings'   => 'read_more_color'
        )
   )
 );

 $wp_customize->add_setting(
    'wpauthor_social_color', //give it an ID
    array(
      'transport' => 'refresh',
      'default' => '', // Give it a default
      'sanitize_callback' => 'sanitize_hex_color',
      'type' => 'option'
    )
  );

$wp_customize->add_control(
    new WP_Customize_Color_Control(
        $wp_customize,
        'wpauthor_social_color', //give it an ID
        array(
            'label'      => __( 'Social Color', 'wpauthor' ), 
            'section'    => 'wpauthor_general_section',  
            'settings'   => 'wpauthor_social_color'
        )
   )
 );

 $wp_customize->add_setting( 'wpauthor_text_font_size', array(
    'transport' => 'refresh',
    'type' => 'option',
    'default' => '16px',
    'sanitize_callback' => 'sanitize_text_field',
) );

$wp_customize->add_control( 'wpauthor_text_font_size', array(
    'type' => 'number',
    'section' => 'wpauthor_general_section', // Add a default or your own section
    'label' => __( 'Read More Font Size (px)','wpauthor' ),
    'priority' => 10,
) );

$wp_customize->add_setting( 'wpauthor_social_font_size', array(
    'transport' => 'refresh',
    'type' => 'option',
    'default' => '16px',
    'sanitize_callback' => 'sanitize_text_field',
) );

$wp_customize->add_control( 'wpauthor_social_font_size', array(
    'type' => 'number',
    'section' => 'wpauthor_general_section', // Add a default or your own section
    'label' => __( 'Social Font Size (px)','wpauthor' ),
    'priority' => 10,
) );

$wp_customize->add_setting( 'wpauthor_social_top_margin', array(
    'transport' => 'refresh',
    'type' => 'option',
    'default' => '15px',
    'sanitize_callback' => 'sanitize_text_field',
) );

$wp_customize->add_control( 'wpauthor_social_top_margin', array(
    'type' => 'number',
    'section' => 'wpauthor_general_section', // Add a default or your own section
    'label' => __( 'Social Margin Top (px)','wpauthor' ),
    'priority' => 10,
) );

//Designation

$wp_customize->add_setting( 'wpauthor_designation', array(
    'transport' => 'refresh',
    'type' => 'option',
    'default' => '18px',
    'sanitize_callback' => 'sanitize_text_field',
) );

$wp_customize->add_control( 'wpauthor_designation', array(
    'type' => 'number',
    'section' => 'wpauthor_general_section', // Add a default or your own section
    'label' => __( 'Designation Font Size (px)','wpauthor' ),
    'priority' => 12,
) );
//Author Title

$wp_customize->add_setting( 'wpauthor_title', array(
    'transport' => 'refresh',
    'type' => 'option',
    'default' => '22px',
    'sanitize_callback' => 'sanitize_text_field',
) );


$wp_customize->add_control( 'wpauthor_title', array(
    'type' => 'number',
    'section' => 'wpauthor_general_section', // Add a default or your own section
    'label' => __( 'Author Title Font Size (px)','wpauthor' ),
    'priority' => 12,
) );
//Author Bio

$wp_customize->add_setting( 'wpauthor_bio', array(
    'transport' => 'refresh',
    'type' => 'option',
    'default' => '16px',
    'sanitize_callback' => 'sanitize_text_field',
) );


$wp_customize->add_control( 'wpauthor_bio', array(
    'type' => 'number',
    'section' => 'wpauthor_general_section', // Add a default or your own section
    'label' => __( 'Author Bio Font Size (px)','wpauthor' ),
    'priority' => 12,
) );


 }

 add_action( 'customize_register', 'wpauthor_customize_register' );

 function wpauthor_customize_css()
{
    ?>
         <style type="text/css">
             .about-footer a { color: <?php echo get_option('read_more_color','#333333'); ?>; }
             ul.social-icons li a i { color: <?php echo get_option('wpauthor_social_color','#333333') . '!important'; ?> ; }
             .about-footer .more { font-size: <?php echo get_option('wpauthor_text_font_size','16px') . 'px !important'; ?> ; }
             .about-footer .social-icons a i { font-size: <?php echo get_option('wpauthor_social_font_size','16px') . 'px !important'; ?> ; }
             .about-footer ul.social-icons { margin-top: <?php echo get_option('wpauthor_social_top_margin','15px') . 'px !important'; ?> ; }
             .widget_wp_author_widget .waw-author-designation { font-size: <?php echo get_option('wpauthor_designation','18px') . 'px !important'; ?> ; }
             .widget_wp_author_widget .waw-author-title a { font-size: <?php echo get_option('wpauthor_title','22px') . 'px !important'; ?> ; }
             .widget_wp_author_widget .waw-author-bio p { font-size: <?php echo get_option('wpauthor_bio','16px') . 'px'; ?> ; }
         </style>
    <?php
}
add_action( 'wp_head', 'wpauthor_customize_css');