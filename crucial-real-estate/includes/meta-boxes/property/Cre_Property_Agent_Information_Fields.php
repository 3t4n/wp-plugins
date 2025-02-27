<?php
/**
 * Property Agent Information Meta Fields
 *
 */

// Exit if accessed directly.
if ( ! defined('ABSPATH') ) {
    exit;
}

class Cre_Property_Agent_Information_Fields {

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
            'id'            => 'property-agent-information',
            'title'         => esc_html__('Agent Information', 'crucial-real-estate'),
            'post_types'    => ['property'],
            'context'       => 'normal',
            'priority'      => 'high',
            'fields'        => [
                [
                    'name'    => esc_html__('What to display in agent information box ?', 'crucial-real-estate'),
                    'id'      => "cre_agent_display_option",
                    'type'    => 'radio',
                    'std'     => 'none',
                    'options' => array(
                        'my_profile_info' => esc_html__('Author information.', 'crucial-real-estate'),
                        'agent_info'      => esc_html__('Agent Information. ( Select the agent below )', 'crucial-real-estate'),
                        'none'            => esc_html__('None. ( Hide information box )', 'crucial-real-estate'),
                    )
                ],
                [
                    'name'     => esc_html__('Agents', 'crucial-real-estate'),
                    'id'       => "cre_agents",
                    'type'     => 'select',
                    'options'  => cre_get_agents_array(),
                    'multiple' => true
                ]
            ],

        );

        return apply_filters('cre_property_agent_information_fields', $meta_boxes);
    }
}

/**
 * Initialize cre property agent information fields class.
 */
function cre_property_agent_information_fields() {
    return Cre_Property_Agent_Information_Fields::instance();
}
cre_property_agent_information_fields();
