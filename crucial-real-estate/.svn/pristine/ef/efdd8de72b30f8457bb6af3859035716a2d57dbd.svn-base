<?php
/**
 * Property Location Meta Fields
 *
 */

// Exit if accessed directly.
if ( ! defined('ABSPATH') ) {
    exit;
}

class Cre_Property_Location_Fields {

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
            'id'            => 'property-location',
            'title'         => esc_html__('Location', 'crucial-real-estate'),
            'post_types'    => ['property'],
            'context'       => 'normal',
            'priority'      => 'high',
            'fields'        => [
                [
                    'id'            => "cre_property_location",
                    'type'          => 'osm',
                    'api_key'       => false,
                    'std'           => esc_html(get_option('cre_property_default_location', '25.7308309,-80.44414899999998')),
                    'zoom'          => 14,
                    'style'         => 'width: 95%; height: 400px',
                    'address_field' => "cre_property_map_address"
                ],
                [
                    'id'      => "cre_property_map_address",
                    'name'    => esc_html__('Property Location at Google Map', 'crucial-real-estate'),
                    'desc'    => esc_html__('Leaving it empty will hide the map open button on property address section.', 'crucial-real-estate'),
                    'type'    => 'text',
                    'std'     => esc_textarea(get_option('cre_property_default_address', esc_html__('15421 Southwest 39th Terrace, Miami, FL 33185, USA', 'crucial-real-estate') ) )
                ],
                [
                    'id'      => "cre_property_address",
                    'name'    => esc_html__('Property Address', 'crucial-real-estate'),
                    'type'    => 'text',
                    'std'     => ''
                ],
                [
                    'id'      => "cre_property_city",
                    'name'    => esc_html__('City', 'crucial-real-estate'),
                    'type'    => 'text',
                    'std'     => ''
                ],
                [
                    'id'      => "cre_property_area",
                    'name'    => esc_html__('Area', 'crucial-real-estate'),
                    'type'    => 'text',
                    'std'     => ''
                ],
                [
                    'id'      => "cre_property_state",
                    'name'    => esc_html__('State', 'crucial-real-estate'),
                    'type'    => 'text',
                    'std'     => ''
                ],
                [
                    'id'      => "cre_property_zip",
                    'name'    => esc_html__('Zip', 'crucial-real-estate'),
                    'type'    => 'text',
                    'std'     => ''
                ],
                [
                    'id'      => "cre_property_country",
                    'name'    => esc_html__('Country', 'crucial-real-estate'),
                    'type'    => 'text',
                    'std'     => ''
                ]
            ],
        );

        return apply_filters('cre_property_location_fields', $meta_boxes);
    }
}

/**
 * Initialize cre property location fields class.
 */
function cre_property_location_fields() {
    return Cre_Property_Location_Fields::instance();
}
cre_property_location_fields();
