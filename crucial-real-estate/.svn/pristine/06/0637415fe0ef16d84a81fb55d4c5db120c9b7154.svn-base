<?php
/**
 * Agent Detail Meta Fields
 *
 */

// Exit if accessed directly.
if ( ! defined('ABSPATH') ) {
    exit;
}

class Cre_Agent_Detail_Fields {

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
            'id'            => 'agent-details',
            'title'         => esc_html__('Agent Details', 'crucial-real-estate'),
            'post_types'    => ['agent'],
            'context'       => 'normal',
            'priority'      => 'high',
            'fields'        => [
                [
                    'name'    => esc_html__('Mobile Number', 'crucial-real-estate'),
                    'id'      => "cre_mobile_number",
                    'type'    => 'text',
                    'columns' => 6,
                    'tab'     => 'agent-contact',
                ],
                [
                    'name'    => esc_html__('Skype', 'crucial-real-estate'),
                    'id'      => "cre_skype",
                    'type'    => 'text',
                    'columns' => 6,
                    'tab'     => 'agent-contact',
                ],
                [
                    'name'    => esc_html__('Address', 'crucial-real-estate'),
                    'id'      => "cre_address",
                    'type'    => 'textarea',
                    'columns' => 12,
                    'tab'     => 'agent-contact'
                ],
                [
                    'name'    => esc_html__('Facebook URL', 'crucial-real-estate'),
                    'id'      => "cre_facebook_url",
                    'type'    => 'text',
                    'columns' => 6,
                    'tab'     => 'agent-social',
                ],
                [
                    'name'    => esc_html__('Twitter URL', 'crucial-real-estate'),
                    'id'      => "cre_twitter_url",
                    'type'    => 'text',
                    'columns' => 6,
                    'tab'     => 'agent-social',
                ]
            ],
        );

        return apply_filters('cre_agent_detail_fields', $meta_boxes);
    }
}

/**
 * Initialize cre property basic fields class.
 */
function cre_agent_detail_fields() {
    return Cre_Agent_Detail_Fields::instance();
}
cre_agent_detail_fields();
