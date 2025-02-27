<?php
/**
 * Post,Page,Property and Agent Sidebar Meta Fields
 *
 */

// Exit if accessed directly.
if ( ! defined('ABSPATH') ) {
    exit;
}

class Cre_Sidebar_Fields {

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

        // Agent meta boxes
        $meta_boxes[] = array(
            'id'            => 'sidebar-layout',
            'title'         => esc_html__('Sidebar Layout', 'crucial-real-estate'),
            'post_types'    => ['post','page','property','agent'],
            'context'       => 'normal',
            'priority'      => 'low',
            'fields'        => [
                [
                    'name'    => esc_html__( 'Choose Layout', 'crucial-real-estate' ),
                    'desc'    => esc_html__( 'Select unique layout for this page. To change the default value, go to customizer and related page sidebar setting.', 'crucial-real-estate'),
                    'id'      => 'cre_global_sidebar_layout',
                    'type'    => 'radio',
                    'std'     => 'default',
                    'options' => array(
                        'default'   => esc_html__( 'Default', 'crucial-real-estate' ),
                        'right'     => esc_html__( 'Right', 'crucial-real-estate' ),
                        'left'      => esc_html__( 'Left', 'crucial-real-estate' ),
                        'none'      => esc_html__( 'None', 'crucial-real-estate' ),
                    ),
                ]
            ],
        );

        return apply_filters('cre_sidebar_fields', $meta_boxes);
    }
}

/**
 * Initialize cre_sidebar_fields class.
 */
function cre_sidebar_fields() {
    return Cre_Sidebar_Fields::instance();
}
cre_sidebar_fields();
