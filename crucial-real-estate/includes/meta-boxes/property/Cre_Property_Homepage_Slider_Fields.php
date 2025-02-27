<?php
/**
 * Property Homepage Slider Meta Fields
 *
 */

// Exit if accessed directly.
if ( ! defined('ABSPATH') ) {
    exit;
}

class Cre_Property_Homepage_Slider_Fields {

    public static $_instance;

    public function __construct() {

        add_action('rwmb_meta_boxes', array($this, 'meta_boxes'));
    }

    public static function instance() {
        if (is_null(self::$_instance)) {
            self::$_instance = new self();
        }
        return self::$_instance;
    }

    /**
     * Contains property related meta box declarations
     *
     * @param array $meta_boxes
     *
     * @return array
     */
    public function meta_boxes($meta_boxes) {

        // Property meta boxes
        $meta_boxes[] = array(
            'id'            => 'property-homepage-slider',
            'title'         => esc_html__('Homepage Slider', 'crucial-real-estate'),
            'post_types'    => ['property'],
            'context'       => 'normal',
            'priority'      => 'high',
            'fields'        => [
                [
                    'name'    => esc_html__('Do you want to add this property in Homepage Slider ?', 'crucial-real-estate'),
                    'id'      => "cre_add_in_slider",
                    'type'    => 'radio',
                    'std'     => 'no',
                    'options' => array(
                        'yes' => esc_html__('Yes ', 'crucial-real-estate'),
                        'no'  => esc_html__('No', 'crucial-real-estate'),
                    )
                ]
            ],

        );

        return apply_filters('cre_property_homepage_slider_fields', $meta_boxes);
    }
}

/**
 * Initialize cre property homepage slider fields class.
 */
function cre_property_homepage_slider_fields() {
    return Cre_Property_Homepage_Slider_Fields::instance();
}
cre_property_homepage_slider_fields();
