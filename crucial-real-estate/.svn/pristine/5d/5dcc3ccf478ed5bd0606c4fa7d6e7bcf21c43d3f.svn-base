<?php
/**
 * Property Gallery Meta Fields
 *
 */

// Exit if accessed directly.
if ( ! defined('ABSPATH') ) {
    exit;
}

class Cre_Property_Gallery_Fields {

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
            'id'            => 'property-gallery',
            'title'         => esc_html__('Gallery', 'crucial-real-estate'),
            'post_types'    => ['property'],
            'context'       => 'normal',
            'priority'      => 'high',
            'fields'        => [
                [
                    'name'             => esc_html__('Property Gallery Images', 'crucial-real-estate'),
                    'id'               => "cre_property_images",
                    'desc'              => wp_kses(__('To add more gallery image, please use our official <a href="https://aarambhathemes.com/themes/real-home-pro/" target="_blank">Real Home Pro</a> theme offer by <a href="https://aarambhathemes.com/" target="_blank">Aarambhathemes</a>', 'crucial-real-estate'), array(
                        'a' => array(
                            'href'   => array(),
                            'target' => array(),
                        ),
                    )),
                    'type'             => 'image_advanced',
                    'max_file_uploads' => 4,
                ]
            ],
        );

        return apply_filters('cre_property_gallery_fields', $meta_boxes);
    }
}

/**
 * Initialize cre property gallery fields class.
 */
function cre_property_gallery_fields() {
    return Cre_Property_Gallery_Fields::instance();
}
cre_property_gallery_fields();
