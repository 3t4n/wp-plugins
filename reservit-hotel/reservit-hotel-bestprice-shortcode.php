<?php
/*
 *      Reservit Hotel Best Price Shortcode
 *      Version: 3.0
 *      By Reservit
 *
 *      Contact: http://www.reservit.com/hebergement
 *      Created: 2024
 *      Modified: 20/12/2024
 *
 *      Copyright (c) 2017, Reservit. All rights reserved.
 *
 *      Licensed under the GPLv2 license - https://www.gnu.org/licenses/gpl-2.0.html
 *
 */
include_once plugin_dir_path(__FILE__) . '/reservit-hotel-language.php';

class Reservit_Hotel_Bestprice_Shortcode
{

    protected static $instance;

    public static function instance()
    {
        if (!self::$instance) {
            self::$instance = new self;
        }
        return self::$instance;
    }

    public function init()
    {
        add_shortcode('reservit_best_price', [$this, 'render_best_price_shortcode']);
    }

    function is_widget_used_and_active($widget_id_base)
    {
        $sidebars_widgets = wp_get_sidebars_widgets();

        foreach ($sidebars_widgets as $sidebar_id => $widgets) {
            if (is_array($widgets)) {
                foreach ($widgets as $widget_id) {
                    if (strpos($widget_id, $widget_id_base) === 0) {
                        return true;
                    }
                }
            }
        }
        return false;
    }

    public function render_best_price_shortcode($atts = [])
    {
        
        wp_enqueue_script('rsvit_hotel_script', plugins_url('reservit-hotel.js', __FILE__), array('jquery'), '3.0', true);
        wp_localize_script('rsvit_hotel_script', 'rsvitHotelScript', array('reservitClickUrl' => plugins_url('', __FILE__),),);
        add_action('wp_enqueue_scripts', array(Reservit_Hotel_Bestprice_Tools::class, 'add_rsvit_hotel_widget_css'));

        /*if ($this->is_widget_used_and_active('reservit_hotel_bestprice'))
            return '';*/
            
        ob_start();
        if (file_exists(plugin_dir_path(__FILE__) . '/views/render-best-price.php'))
            include_once plugin_dir_path(__FILE__) . '/views/render-best-price.php';
        return ob_get_clean();
    }
}
