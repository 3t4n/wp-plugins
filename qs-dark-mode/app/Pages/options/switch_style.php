<?php

$switch_presets = [

    [
       'src'   => QS_DARK_MODE_IMG.'/switchs/style1.png',
       'title' => esc_html__( 'One', 'qs-dark-mode' ),
       'pro'   => 0,
       'value' => 'qs-dark-mood-layout-1'
    ],
    [
       'src'   => QS_DARK_MODE_IMG.'/switchs/style2.png',
       'title' => esc_html__( 'Two', 'qs-dark-mode' ),
       'pro'   => 0,
       'value' => 'qs-dark-mood-layout-2'
    ],
    [
       'src'   => QS_DARK_MODE_IMG.'/switchs/style3.png',
       'title' => esc_html__( 'Three', 'qs-dark-mode' ),
       'pro'   => 0,
       'value' => 'qs-dark-mood-layout-3'
    ],
    [
       'src'   => QS_DARK_MODE_IMG.'/switchs/style4.png',
       'title' => esc_html__( 'Four', 'qs-dark-mode' ),
       'pro'   => 0,
       'value' => 'qs-dark-mood-layout-4'
    ],
    [
       'src'   => QS_DARK_MODE_IMG.'/switchs/style5.png',
       'title' => esc_html__( 'Five', 'qs-dark-mode' ),
       'pro'   => 1,
       'value' => 'qs-dark-mood-layout-5'
    ],
    [
       'src'   => QS_DARK_MODE_IMG.'/switchs/style6.png',
       'title' => esc_html__( 'Six', 'qs-dark-mode' ),
       'pro'   => 1,
       'value' => 'qs-dark-mood-layout-6'
    ],
    [
       'src'   => QS_DARK_MODE_IMG.'/switchs/style7.png',
       'title' => esc_html__( 'Seven', 'qs-dark-mode' ),
       'pro'   => 1,
       'value' => 'qs-dark-mood-layout-7'
    ],
    [
       'src'   => QS_DARK_MODE_IMG.'/switchs/style8.png',
       'title' => esc_html__( 'Eight', 'qs-dark-mode' ),
       'pro'   => 1,
       'value' => 'qs-dark-mood-layout-8'
    ],
    [
       'src'   => QS_DARK_MODE_IMG.'/switchs/style9.png',
       'title' => esc_html__( 'Nine', 'qs-dark-mode' ),
       'pro'   => 1,
       'value' => 'qs-dark-mood-layout-9'
    ], 

    [
       'src'   => QS_DARK_MODE_IMG.'/switchs/style10.png',
       'title' => esc_html__( 'Ten', 'qs-dark-mode' ),
       'pro'   => 1,
       'value' => 'qs-dark-mood-layout-10'
    ], 
    // duplicate array item for more and change value and image link
  
];

$switch_presets = apply_filters('qs_dark_mode_switch_presets',$switch_presets);

$switch_arr = [

    'enable_dark_mode_swicth_in_menu' => [
        'demo_link' => '#',
        'lavel'     => esc_html__( 'Switch In Menu','qs-dark-mode' ),
        'default'   => 0,
        'is_pro'    => 1,
        'type'      => 'switch'
    ],
   
    'menu_switch_position' => [
        'demo_link' => '#',
        'lavel'     => esc_html__( 'Header Menu','qs-dark-mode' ),
        'default'   => '',
        'is_pro'    => 1,
        'type'      => 'select',
        'value'     => '',
        'options'   => function_exists('qs_dark_mode_registered_nav_menus')?qs_dark_mode_registered_nav_menus() :[]
    ], 
    
    'menu_switch_position_top' => [
        'demo_link' => '#',
        'lavel'     => esc_html__( 'Menu Switch Padding ( Top Bottom)','qs-dark-mode' ),
        'default'   => '',
        'is_pro'    => 1,
        'min'       => '-300',
        'max'       => '500',
        'type'      => 'range',
        'value'     => '',
        'help'      => esc_html__('Give swicth header position top in px')
    ],

    'menu_switch_position_left' => [
        'demo_link' => '#',
        'lavel'     => esc_html__( 'Menu Switch Padding (Left Right)','qs-dark-mode' ),
        'default'   => '',
        'is_pro'    => 1,
        'min'       => '-300',
        'max'       => '500',
        'type'      => 'range',
        'value'     => '',
        'help'      => esc_html__('Give swicth header position top in px')
    ],
    
    'switch_position' => [
        'demo_link' => '#',
        'lavel'     => esc_html__( 'Floating Switch Position','qs-dark-mode' ),
        'default'   => 'bottom-right',
        'is_pro'    => 0,
        'type'      => 'select',
        'value'     => '',
        'options' => [

            'top-right'     => esc_html__( 'Top Right', 'qs-dark-mode' ),
            'top-left'      => esc_html__( 'Top Left', 'qs-dark-mode' ),
            'top-center'    => esc_html__( 'Top Center', 'qs-dark-mode' ),
            'bottom-right'  => esc_html__( 'Bottom Right', 'qs-dark-mode' ),
            'bottom-left'   => esc_html__( 'Bottom Left', 'qs-dark-mode' ),
            'bottom-center' => esc_html__( 'Bottom Center', 'qs-dark-mode' ),

        ]
        
    ],
    
    'switch_preset' => [

        'demo_link' => '#',
        'lavel'     => esc_html__( 'Switch Preset','qs-dark-mode' ),
        'default'   => 'one',
        'is_pro'    => 0,
        'value'     => 'one',
        'type'      => 'image-choose',
        'options'   => $switch_presets

    ],

    'switch_light_image' => [

        'demo_link' => '#',
        'lavel'     => esc_html__( 'Light Image','qs-dark-mode' ),
        'default'   => '',
        'is_pro'    => 1,
        'value'     => '',
        'type'      => 'image_upload'

    ],
    
    'switch_dark_image' => [

        'demo_link' => '#',
        'lavel'     => esc_html__( 'Dark Image','qs-dark-mode' ),
        'default'   => '',
        'is_pro'    => 1,
        'value'     => '',
        'type'      => 'image_upload'

    ],

    'switch_dark_text' => [

        'demo_link' => '#',
        'lavel'     => esc_html__( 'Dark Text','qs-dark-mode' ),
        'default'   => '',
        'is_pro'    => 0,
        'value'     => '',
        'type'      => 'text'

    ],

    'switch_light_text' => [

        'demo_link' => '#',
        'lavel'     => esc_html__( 'Light Text','qs-dark-mode' ),
        'default'   => '',
        'is_pro'    => 0,
        'value'     => '',
        'type'      => 'text',

    ],
 
    'enable_switch_custom_style' => [
        'demo_link' => '#',
        'lavel'     => esc_html__( 'Custom Style','qs-dark-mode' ),
        'default'   => 0,
        'is_pro'    => 1,
        'value'     => '',
        'type'      => 'switch'
    ],

    'switch_heading' => [
        
        'lavel'     => esc_html__( 'Switch Style','qs-dark-mode' ),
        'default'   => '',
        'is_pro'    => 0,
        'value'     => '',
        'type'      => 'label',
    ],


    'switch_container_height' => [
        'demo_link' => '#',
        'lavel'     => esc_html__( 'Container Height','qs-dark-mode' ),
        'default'   => '',
        'is_pro'    => 0,
        'value'     => '',
        'type'      => 'number',
        'help' => esc_html__('size in pixel','qs-dark-mode')
    ],

    'switch_container_width' => [
        'demo_link' => '#',
        'lavel'     => esc_html__( 'Container Width','qs-dark-mode' ),
        'default'   => '',
        'is_pro'    => 0,
        'value'     => '',
        'type'      => 'number',
        'help' => esc_html__('size in pixel','qs-dark-mode')
    ],

    'switch_container_bg_color' => [
        'demo_link' => '#',
        'lavel'     => esc_html__( 'Container Dark Background','qs-dark-mode' ),
        'default'   => '',
        'is_pro'    => 0,
        'value'     => '',
        'type'      => 'color',
    ],
    'switch_container_bg_light_color' => [
        'demo_link' => '#',
        'lavel'     => esc_html__( 'Container Light Background','qs-dark-mode' ),
        'default'   => '',
        'is_pro'    => 0,
        'value'     => '',
        'type'      => 'color'
    ],

    'switch_container_border_color' => [
        'demo_link' => '#',
        'lavel'     => esc_html__( 'Container Border','qs-dark-mode' ),
        'default'   => '',
        'is_pro'    => 0,
        'value'     => '',
        'type'      => 'color'
    ],

    'switch_label_height' => [
        'demo_link' => '#',
        'lavel'     => esc_html__( 'Height','qs-dark-mode' ),
        'default'   => '',
        'is_pro'    => 0,
        'value'     => '',
        'type'      => 'number',
        'help' => esc_html__('Size in Pixel','qs-dark-mode' )
    ],

    'switch_label_width' => [
        'demo_link' => '#',
        'lavel'     => esc_html__( 'Width','qs-dark-mode' ),
        'default'   => '',
        'is_pro'    => 0,
        'value'     => '',
        'type'      => 'number',
        'help' => esc_html__('Size in Pixel','qs-dark-mode')
    ],
    
    'switch_bg_color' => [
        'demo_link' => '#',
        'lavel'     => esc_html__( 'Switch Background','qs-dark-mode' ),
        'default'   => '',
        'is_pro'    => 0,
        'value'     => '',
        'type'      => 'color'
        
    ],
    
    'switch_color' => [

        'demo_link' => '#',
        'lavel'     => esc_html__( 'Switch Color','qs-dark-mode' ),
        'default'   => '',
        'is_pro'    => 0,
        'value'     => '',
        'type'      => 'color'
        
    ],
   

];
$return_arr = apply_filters( 'qs_dark_mode_theme_switchs_preser_opts', $switch_arr );