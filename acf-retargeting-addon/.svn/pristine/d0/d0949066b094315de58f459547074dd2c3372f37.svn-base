<?php
/**
 * Plugin Name: Advanced Custom Fields : Retargeting Field
 * Plugin URI: http://onlinemastery.co.uk/plugins/tracking
 * Description: This plugin requires <a href="https://wordpress.org/plugins/advanced-custom-fields/">Advanced Custom Fields</a> to work.<br> It enables you to add tracking and retargeting code to individual posts and pages.
 * Version: 0.3
 * Author: Online Mastery Limited
 * Author URI: http://onlinemastery.co.uk
 * License: GPL2
 */

add_action('plugins_loaded', 'retargeting_load_fields');
 
function retargeting_load_fields()
{
    if(function_exists('register_field_group') && current_user_can('manage_options'))
    {
        register_field_group(array (
            'id' => 'acf_unique-tracking-code',
            'title' => 'Unique Tracking Code',
            'fields' => array (
                array (
                    'key' => 'field_5434ce24932a8',
                    'label' => 'Enter your Retargeting or Tracking code in the box below',
                    'name' => '_unique_tracking_code',
                    'type' => 'textarea',
                    'default_value' => '',
                    'placeholder' => 'Add Tracking code here ...',
                    'prepend' => '',
                    'append' => '',
                    'formatting' => 'html',
                    'maxlength' => '',
                ),
            ),
            'location' => array (
                array (
                    array (
                        'param' => 'post_type',
                        'operator' => '==',
                        'value' => 'post',
                        'order_no' => 0,
                        'group_no' => 0,
                    ),
                ),
                array (
                    array (
                        'param' => 'post_type',
                        'operator' => '==',
                        'value' => 'page',
                        'order_no' => 0,
                        'group_no' => 1,
                    ),
                ),
            ),
            'options' => array (
                'position' => 'normal',
                'layout' => 'default',
                'hide_on_screen' => array (
                ),
            ),
            'menu_order' => 1,
        ));
    }
}
 
function unique_tracking_code_add_head_script() {
 
    if ( ! is_admin() && function_exists('the_field')) {
 
        the_field('_unique_tracking_code');
 
    }
 
}
add_action( 'wp_head', 'unique_tracking_code_add_head_script' );