<?php if ( ! defined( 'ABSPATH' )  ) { die; } // Cannot access directly.

//
// Set a unique slug-like ID
//
$prefix = '_maan_elementor_addons';

//
// Create options
//
CSF::createOptions( $prefix, array(
    'menu_title' => 'Maan Addons',
    'framework_title' => 'Maan Elementor Addons',
    'menu_slug'  => 'maan-elementor-addons',
    'menu_icon'  => 'data:image/png;base64,iVBORw0KGgoAAAANSUhEUgAAAA8AAAAPCAYAAAA71pVKAAAAGXRFWHRTb2Z0d2FyZQBBZG9iZSBJbWFnZVJlYWR5ccllPAAAAYpJREFUeNpiYBiSgBGZs+XQVYGdXAIOpzm4DYDcAyd0BA6AxH+U9DoAKYc/bBwXPgtIHpAsC/qAovlp36aEi2L8/UuY+QUu8IowMHMwMxj+/fRg5ta1DH8/vFX49fsXw1MhSYbPukYfPqvJFLo76SxghJoc8Oo/4/p+ATmGlQpGDO/ZuBhUfn5m2HtuHcOPpw8ZKox8GO7yiTL8Z2Rk0Pj6hkFYS5bhroxYIAtI8/9fP/vvf/7KMMsojOErCxvYJfEvbzNwPn/I4OycxnBZUArutfNCMgyqHz4z8Egy9zOBBP59/aSwRUYbpnEDEAdavnv84TSXEEwjyI+BILnfjEwML1m4GH59/q0A1szw7x9yuF1kCBfboPL904WrQtIwsQsgMbAcFPz/95+BBVc0PJFSZLj/4z/eqMKm+QGIeCwpwvDw7X+scjDAhCZ5Aepnhot8Ag8e8omga9oAVYNic6Pgz++gQFkA9Bs4Aex787/wFRcfzI8LwCRIbuUrRyaG/wlAnsDApW2AAAMACI6MqbEJIR0AAAAASUVORK5CYII=',
    'show_in_customizer'  => true,
    'show_bar_menu'  => false,
    'nav'  => 'inline',
    'footer_credit'  => 'Thanks for using <a href="https://maantheme.com">Maan Elementor Addons</a>',
    'footer_text'  => 'Addons Options',
) );

//
// Create a section
//
CSF::createSection( $prefix, array(
    'title'  => 'Welcome',
    'icon'   => 'fas fa-home',
    'fields' => array(

    )
) );
CSF::createSection( $prefix, array(
    'title'  => 'Features',
    'icon'   => 'fas fa-rocket',
    'fields' => array(
        array(
            'id'    => 'maan_addons_call_to_action',
            'type'  => 'switcher',
            'title' => 'Call To Action',
        ),
        array(
            'id'    => 'maan_addons_service',
            'type'  => 'switcher',
            'title' => 'Service',
        ),
        array(
            'id'    => 'maan_addons_team',
            'type'  => 'switcher',
            'title' => 'Team',
        ),
    )
) );
