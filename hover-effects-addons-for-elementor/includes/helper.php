<?php 
namespace BdevsElementor\Helper;

// BDT Position
function element_pack_position() {
    $position_options = [
        ''              => esc_html__('Default', 'hover-effects-addons-for-elementor'),
        'top-left'      => esc_html__('Top Left', 'hover-effects-addons-for-elementor') ,
        'top-center'    => esc_html__('Top Center', 'hover-effects-addons-for-elementor') ,
        'top-right'     => esc_html__('Top Right', 'hover-effects-addons-for-elementor') ,
        'center'        => esc_html__('Center', 'hover-effects-addons-for-elementor') ,
        'center-left'   => esc_html__('Center Left', 'hover-effects-addons-for-elementor') ,
        'center-right'  => esc_html__('Center Right', 'hover-effects-addons-for-elementor') ,
        'bottom-left'   => esc_html__('Bottom Left', 'hover-effects-addons-for-elementor') ,
        'bottom-center' => esc_html__('Bottom Center', 'hover-effects-addons-for-elementor') ,
        'bottom-right'  => esc_html__('Bottom Right', 'hover-effects-addons-for-elementor') ,
    ];

    return $position_options;
}