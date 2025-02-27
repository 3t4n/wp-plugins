<?php
/**
 * Property Video Meta Fields
 *
 */

// Exit if accessed directly.
if ( ! defined('ABSPATH') ) {
    exit;
}

class Cre_Property_Video_Fields {

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
            'id'            => 'property-video',
            'title'         => esc_html__('Video', 'crucial-real-estate'),
            'post_types'    => ['property'],
            'context'       => 'normal',
            'priority'      => 'high',
            'fields'        => [
                [
                    'id'         => 'cre_video_group',
                    'name'       => esc_html__('Add Multiple Videos', 'crucial-real-estate'),
                    'type'       => 'fieldset_text',
                    'max_clone'  => 2,
                    'clone'      => true,
                    'sort_clone' => true,
                    'options'    => array(
                        'cre_video_group_title' => esc_html__('Title', 'crucial-real-estate'),
                        'cre_video_group_url'   => esc_html__('URL', 'crucial-real-estate'),
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

        return apply_filters('cre_property_video_fields', $meta_boxes);
    }
}

/**
 * Initialize cre property video fields class.
 */
function cre_property_video_fields() {
    return Cre_Property_Video_Fields::instance();
}
cre_property_video_fields();
