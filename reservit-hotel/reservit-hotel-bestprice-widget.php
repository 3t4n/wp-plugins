<?php
/*
 *      Reservit Hotel Best Price Widget
 *      Version: 1.9
 *      By Reservit
 *
 *      Contact: http://www.reservit.com/hebergement
 *      Created: 2017
 *      Modified: 15/05/2019
 *
 *      Copyright (c) 2017, Reservit. All rights reserved.
 *
 *      Licensed under the GPLv2 license - https://www.gnu.org/licenses/gpl-2.0.html
 *
 */
include_once plugin_dir_path(__FILE__) . '/reservit-hotel-language.php';
include_once plugin_dir_path(__FILE__) . '/reservit-hotel-tools.php';
class Reservit_Hotel_Bestprice_Widget extends WP_Widget {

    /**
     * New instance Reservit_Hotel-Bestprice widget
     *
     * @access public
     */
    public function __construct() {

        $widget_ops = array(
            'description' => esc_html__('A room best price widget for your hotel by Reservit', 'reservit-hotel'),
        );

        parent::__construct('reservit_hotel_bestprice', 'Reservit Hotel', $widget_ops);

        //Js for Reservit hotel bestprice widget
        wp_enqueue_script('rsvit_hotel_script', plugins_url('reservit-hotel.js', __FILE__), array('jquery'), '3.0', true);
        //localise the plugin directory for later use in js
        wp_localize_script('rsvit_hotel_script', 'rsvitHotelScript', array('reservitClickUrl' => plugins_url('', __FILE__),));

        add_action('wp_enqueue_scripts', array(Reservit_Hotel_Bestprice_Tools::class, 'add_rsvit_hotel_widget_css'));
    }

    //widget
    public function widget($args, $instance) {
        echo esc_html( $args['before_widget']);
        echo esc_html( $args['before_title']);
        echo esc_html( $args['after_title']);
        if(file_exists(plugin_dir_path(__FILE__) . '/views/render-best-price.php'))
            include_once plugin_dir_path(__FILE__) . '/views/render-best-price.php';
        echo esc_html( $args['after_widget']);
    }

}
