<?php
 


$presets_list = [
    
    'theme_color_preset' => [
        'demo_link' => '#',
        'lavel'     => esc_html__( 'Preset','qs-dark-mode' ),
        'default'   => 'one',
        'is_pro'    => 0,
        'value'     => 'style1',
        'type'      => 'image-choose',
        'options'   => apply_filters( 'qs_dark_mode_theme_preset_list', qs_dark_mode_preset_list() )
    ],

    'theme_box_shadow' => [
         'demo_link' => '#',
         'lavel'     => esc_html__( 'Box Shadow','qs-dark-mode' ),
         'default'   => 0,
         'is_pro'    => 1,
         'value'=> '',
         'type' => 'switch'
     ],


     'theme_custom_color' => [
      'demo_link' => '#',
      'lavel'     => esc_html__( 'Custom Color','qs-dark-mode' ),
      'default'   => 0,
      'is_pro'    => 1,
      'value'=> '',
      'type' => 'switch'
     ],

     'theme_background_color' => [
      'demo_link' => '#',
      'lavel'     => esc_html__( 'Background Color','qs-dark-mode' ),
      'default'   => 0,
      'is_pro'    => 1,
      'value'=> '',
      'type' => 'color'
     ],

     'theme_text_color' => [
      'demo_link' => '#',
      'lavel'     => esc_html__( 'Text Color','qs-dark-mode' ),
      'default'   => 0,
      'is_pro'    => 1,
      'value'=> '',
      'type' => 'color'
     ],

     'theme_title_color' => [
        'demo_link' => '#',
        'lavel'     => esc_html__( 'Title Color','qs-dark-mode' ),
        'default'   => 0,
        'is_pro'    => 1,
        'value'     => '',
        'type'      => 'color'
    ],

     'theme_border_color' => [
      'demo_link' => '#',
      'lavel'     => esc_html__( 'Border Color','qs-dark-mode' ),
      'default'   => 0,
      'is_pro'    => 1,
      'value'     => '',
      'type'      => 'color'
     ],

     'theme_link_color' => [
      'demo_link' => '#',
      'lavel'     => esc_html__( 'Link Color','qs-dark-mode' ),
      'default'   => 0,
      'is_pro'    => 1,
      'value'=> '',
      'type' => 'color'
     ],

     'theme_button_color' => [
      'demo_link' => '#',
      'lavel'     => esc_html__( 'Button Color','qs-dark-mode' ),
      'default'   => 0,
      'is_pro'    => 1,
      'value'=> '',
      'type' => 'color'
     ],

     'theme_icon_color' => [
        'demo_link' => '#',
        'lavel'     => esc_html__( 'Icon Color','qs-dark-mode' ),
        'default'   => 0,
        'is_pro'    => 1,
        'value'=> '',
        'type' => 'color'
    ],

];

$return_arr = apply_filters( 'qs_dark_mode_theme_color_presets_opts', $presets_list );