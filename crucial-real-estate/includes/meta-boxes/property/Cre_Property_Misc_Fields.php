<?php
/**
 * Property Homepage Slider Meta Fields
 *
 */

// Exit if accessed directly.
if ( ! defined('ABSPATH') ) {
    exit;
}

class Cre_Property_Misc_Fields {

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
            'id'            => 'property-misc',
            'title'         => esc_html__('Misc', 'crucial-real-estate'),
            'post_types'    => ['property'],
            'context'       => 'normal',
            'priority'      => 'high',
            'fields'        => [
                [
                    'name'    => esc_html__('Property Label Text', 'crucial-real-estate'),
                    'id'      => 'cre_property_label',
                    'desc'    => esc_html__('You can add a property label to display on property thumbnails. Example: Hot Deal', 'crucial-real-estate'),
                    'type'    => 'text'
                ]
            ],

        );
        
        return apply_filters('cre_property_misc_fields', $meta_boxes);
    }
}

/**
 * Initialize cre property misc fields class.
 */
function cre_property_misc_fields() {
    return Cre_Property_Misc_Fields::instance();
}
cre_property_misc_fields();
