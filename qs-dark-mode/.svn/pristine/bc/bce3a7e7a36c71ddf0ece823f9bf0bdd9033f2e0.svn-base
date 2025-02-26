<?php

$opacity = range(0, 1, 0.1);

$image_filter = [
    'none','brightness','contrast','grayscale','invert','sepia'
];

$adv_arr = [

    'image_opacity' => [
        'demo_link' => '#',
        'lavel'     => esc_html__( 'Image Opacity','qs-dark-mode' ),
        'default'   => '1',
        'is_pro'    => 0,
        'type'      => 'select',
        'value'     => '',
        'options'   => $opacity
    ],

    'image_filter' => [
        'demo_link' => '#',
        'lavel'     => esc_html__( 'Image Filter','qs-dark-mode' ),
        'default'   => '1',
        'is_pro'    => 0,
        'type'      => 'select',
        'value'     => '',
        'options'   => $image_filter
    ],

    'image_filter_value' => [
        'demo_link' => '#',
        'lavel'     => esc_html__( 'Image Filter Value','qs-dark-mode' ),
        'default'   => '1',
        'is_pro'    => 0,
        'type'      => 'select',
        'value'     => '',
        'options'   => $opacity
    ],

    'include_custom_element' => [
        'demo_link' => '#',
        'lavel'     => esc_html__( 'Image Filter Selectors','qs-dark-mode' ),
        'default'   => '',
        'is_pro'    => 1,
        'type'      => 'textarea',
        'value'     => '',
        'help'      => esc_html__(' Provide Comma seperated css selectors that will be apply in image tags','qs-dark-mode')
       
    ],

    'exclude_pages' => [

        'demo_link' => '#',
        'lavel'     => esc_html__( 'Exclude Pages','qs-dark-mode' ),
        'default'   => '',
        'is_pro'    => 1,
        'type'      => 'select2',
        'value'     => [], // musto be array type
        'options'   => [

            'blog'                => esc_html__('Blog Front page','qs-dark-mode'),
            'page'                => esc_html__('Pages','qs-dark-mode'),
            'posts'               => esc_html__('Posts','qs-dark-mode'),
            'category'            => esc_html__('Category','qs-dark-mode'),
            'archive'            => esc_html__('Archive','qs-dark-mode'),
            'tags'                => esc_html__('Tags','qs-dark-mode'),
            'author'              => esc_html__('Author','qs-dark-mode'),
            '4_0_4'                 => esc_html__('404','qs-dark-mode'),
            'search'              => esc_html__('search','qs-dark-mode'),
            'wc_shop'             => esc_html__('WC Shop','qs-dark-mode'),
            'wc_product'          => esc_html__('WC product','qs-dark-mode'),
            'wc_product_category' => esc_html__('WC product Category','qs-dark-mode'),
            'wc_product_tag'      => esc_html__('WC product Tag','qs-dark-mode'),
            'wc_checkout'         => esc_html__('WC Checkout','qs-dark-mode'),
            'wc_order_received'   => esc_html__('WC Order received','qs-dark-mode'),
            'wc_cart'             => esc_html__('WC Cart','qs-dark-mode'),
            'wc_account'          => esc_html__('WC Account','qs-dark-mode'),

        ]
       
       
    ],

    'override_exclude_page_ids' => [
        'demo_link' => '#',
        'lavel'     => esc_html__( 'Page Override Ids','qs-dark-mode' ),
        'default'   => 0,
        'is_pro'    => 1,
        'type'    => 'text',
        'placeholder' => esc_html__('10,25,58','qs-dark-mode'),
        'help' => esc_html__('Provided page id will enable dark mode / switch','qs-dark-mode')
       
    ],
    
    'schedule_dark_mode' => [
        'demo_link' => '#',
        'lavel'     => esc_html__( 'Schedule','qs-dark-mode' ),
        'default'   => 0,
        'is_pro'    => 1,
        'type'    => 'switch',
        'help' => esc_html__('Enable Dark mode between time range','qs-dark-mode')
       
    ],


    'schedule_dark_mode_start_time' => [
        'demo_link' => '#',
        'lavel'     => esc_html__( 'Start Time','qs-dark-mode' ),
        'default'   => 0,
        'is_pro'    => 1,
        'type'    => 'time',
      
    ],

    'schedule_dark_mode_end_time' => [
        'demo_link' => '#',
        'lavel'     => esc_html__( 'End Time','qs-dark-mode' ),
        'default'   => 0,
        'is_pro'    => 1,
        'type'    => 'time',
       
    ],

  
    'switch_show_in' => [

        'demo_link' => '#',
        'lavel'     => esc_html__( 'Switch show area','qs-dark-mode' ),
        'default'   => '',
        'is_pro'    => 1,
        'type'      => 'select2',
        'value'     => [], // must be array type
        'options'   => [

            'default'             => esc_html__('Default','qs-dark-mode'),
            'post_content_before' => esc_html__('Post Content Before','qs-dark-mode'),
            'post_content_after'  => esc_html__('Post Content After','qs-dark-mode'),
            'page_content_before' => esc_html__('Page Content Before','qs-dark-mode'),
            'page_content_after'  => esc_html__('Page Content After','qs-dark-mode'),
            'menu'                => esc_html__('Upcomming','qs-dark-mode'),
      
        ]
       
       
    ],

    'dashboard_color_scheme' => [
        'demo_link' => '#',
        'lavel'     => esc_html__( 'Dashboard Color Scheme','qs-dark-mode' ),
        'default'   => 'style1',
        'is_pro'    => 0,
        'type'      => 'select',
        'value'     => '',
        'options' => [

            'style1' => esc_html__( 'Default', 'qs-dark-mode' ),
            'style2' => esc_html__( 'Preset 2', 'qs-dark-mode' ),
            'style3' => esc_html__( 'Preset 3', 'qs-dark-mode' ),
            'style4' => esc_html__( 'Preset 4', 'qs-dark-mode' ),
     
        ]
    ],
 
];

$return_arr = apply_filters( 'qs_dark_mode_advanced_opts' , $adv_arr );