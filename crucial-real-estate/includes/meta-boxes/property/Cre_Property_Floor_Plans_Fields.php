<?php
/**
 * Property Floor Plans Meta Fields
 *
 */

// Exit if accessed directly.
if ( ! defined('ABSPATH') ) {
    exit;
}

class Cre_Property_Floor_Plans_Fields {

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
            'id'            => 'property-floor-plans',
            'title'         => esc_html__('Floor Plans', 'crucial-real-estate'),
            'post_types'    => ['property'],
            'context'       => 'normal',
            'priority'      => 'high',
            'fields'        => [
                [
                    'id'         => 'cre_floor_plans',
                    'name'       => esc_html__('Add Floor Details', 'crucial-real-estate'),
                    'type'       => 'fieldset_text',
                    'max_clone'  => 2,
                    'clone'      => true,
                    'sort_clone' => true,
                    'options'    => array(
                        'cre_floor_plan_name'           => esc_html__('Floor Name', 'crucial-real-estate'),
                        'cre_floor_plan_desc'           => esc_html__('Description', 'crucial-real-estate'),
                        'cre_floor_plan_price'          => esc_html__('Floor Price ( Only digits )', 'crucial-real-estate'),
                        'cre_floor_plan_price_postfix'  => esc_html__('Price Postfix ( Example: Monthly or Per Night )', 'crucial-real-estate'),
                        'cre_floor_plan_size'           => esc_html__('Floor Size ( Only digits )', 'crucial-real-estate'),
                        'cre_floor_plan_size_postfix'   => esc_html__('Size Postfix ( Example: sq ft)', 'crucial-real-estate'),
                        'cre_floor_plan_bedrooms'       => esc_html__('Bedrooms ( Example: 4)', 'crucial-real-estate'),
                        'cre_floor_plan_bathrooms'      => esc_html__('Bathrooms ( Example: 2)', 'crucial-real-estate')
                    ),
                ],
                [
                    'type' => 'heading',
                    'desc'      => wp_kses(__('To add more field please use our official <a href="https://aarambhathemes.com/themes/real-home-pro/" target="_blank">Real Home Pro</a> theme offer by <a href="https://aarambhathemes.com/" target="_blank">Aarambhathemes</a>', 'crucial-real-estate'), array(
                        'a' => array(
                            'href'   => array(),
                            'target' => array(),
                        ),
                    )),
                ]
            ],

        );

        return apply_filters('cre_property_floor_plans_fields', $meta_boxes);
    }
}

/**
 * Initialize cre property floor plans fields class.
 */
function cre_property_floor_plans_fields() {
    return Cre_Property_Floor_Plans_Fields::instance();
}
cre_property_floor_plans_fields();
