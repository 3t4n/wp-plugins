<?php

namespace Smeechos\Simple_GDPR_Cookies\Includes\Settings;

if ( ! defined( 'ABSPATH' ) ) exit; // Exit if accessed directly

class Content_Settings extends Settings_Parent
{
    /**
     * Adds the array of fields to the content section of the plugin.
     */
    public function add_fields()
    {
        $fields = [
            [
                'id' => 'simple_gdpr_cookies_heading_display',
                'title' => 'Heading Text Display',
                'callback' => 'radio_display',
                'page' => $this->get_page_name(),
                'section' => $this->get_setting_id(),
                'args' => [
                    'option'    => 'heading_display',
                    'radio_1'   => 'Hidden',
                    'radio_2'   => 'Shown'
                ]
            ],
            [
                'id' => 'simple_gdpr_cookies_heading_text',
                'title' => 'Heading Text',
                'callback' => 'text_display',
                'page' => $this->get_page_name(),
                'section' => $this->get_setting_id(),
                'args' => [
                    'option'    => 'heading_text'
                ]
            ],
            [
                'id' => 'simple_gdpr_cookies_body_text',
                'title' => 'Body Text',
                'callback' => 'textarea_display',
                'page' => $this->get_page_name(),
                'section' => $this->get_setting_id(),
                'args' => [
                    'option'    => 'body_text'
                ]
            ],
            [
                'id' => 'simple_gdpr_cookies_text_color',
                'title' => 'Text Color',
                'callback' => 'color_display',
                'page' => $this->get_page_name(),
                'section' => $this->get_setting_id(),
                'args' => [
                    'option'    => 'text_color'
                ]
            ],
            [
                'id' => 'simple_gdpr_cookies_user_consent',
                'title' => 'User Consent Settings',
                'callback' => 'radio_display',
                'page' => $this->get_page_name(),
                'section' => $this->get_setting_id(),
                'args' => [
                    'option'    => 'user_consent',
                    'radio_1'   => 'Default',
                    'radio_2'   => 'Choice',
                    'description'   => __( 'Default will display an &#10005; at the top right of the modal,
                    while choice will display accept and decline buttons.', 'simple_gdpr_cookies' )
                ]
            ],
            [
                'id' => 'simple_gdpr_cookies_close_button_color_options',
                'title' => 'Close Button Color',
                'callback' => 'color_display',
                'page' => $this->get_page_name(),
                'section' => $this->get_setting_id(),
                'args' => [
                    'option'    => 'close_button_color'
                ]
            ],
            [
                'id' => 'simple_gdpr_cookies_close_button_hover_options',
                'title' => 'Close Button Hover Color',
                'callback' => 'color_display',
                'page' => $this->get_page_name(),
                'section' => $this->get_setting_id(),
                'args' => [
                    'option'    => 'close_button_hover'
                ]
            ],
            [
                'id' => 'simple_gdpr_cookies_accept_button_options',
                'title' => 'Accept Button Options',
                'callback' => 'button_display',
                'page' => $this->get_page_name(),
                'section' => $this->get_setting_id(),
                'args' => [
                    'option'    => 'accept_button'
                ]
            ],
            [
                'id' => 'simple_gdpr_cookies_decline_button_options',
                'title' => 'Decline Button Options',
                'callback' => 'button_display',
                'page' => $this->get_page_name(),
                'section' => $this->get_setting_id(),
                'args' => [
                    'option'    => 'decline_button'
                ]
            ],
        ];

        foreach( $fields as $field ) {
            $this->add_field(
                $field['id'],
                $field['title'],
                $field['callback'],
                $field['page'],
                $field['section'],
                $field['args']
            );
        }
    }
}