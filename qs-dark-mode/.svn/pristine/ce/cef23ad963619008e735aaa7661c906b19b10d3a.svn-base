<?php


 $exclude_base = [
            
    'page'     => esc_html__('Pages','qs-dark-mode'),
    'posts'    => esc_html__('Posts','qs-dark-mode'),
    'category' => esc_html__('Category','qs-dark-mode'),
    'tags'     => esc_html__('Tags','qs-dark-mode'),
    'author'   => esc_html__('Author','qs-dark-mode'),
    '4_0_4'      => esc_html__('404','qs-dark-mode'),
    'search'   => esc_html__('Search','qs-dark-mode'),
 ];
 
$exclude_option = array_merge($exclude_base,qs_dark_mode_get_post_types());

$css_arr = [

    'css' => [
        'demo_link' => '#',
        'lavel'     => esc_html__('Custom Css','qs-dark-mode' ),
        'default'   => '',
        'is_pro'    => 0,
        'type'      => 'textarea',
        'value'     => '',
        'help'      => esc_html__('Provide Comma seperated css selectors that you would like to skip ','qs-dark-mode')
       
    ],
    
    'exclude_page' => [

        'demo_link' => '#',
        'lavel'     => esc_html__( 'Exclude Pages','qs-dark-mode' ),
        'default'   => '',
        'is_pro'    => 1,
        'type'      => 'select2',
        'value'     => [], // must be array
        'options'   => $exclude_option
       
       
    ],
  
];

$return_arr = apply_filters( 'qs_dark_mode_custom_css_opts' , $css_arr );