<?php

if ( ! defined('ABSPATH')) {
    exit;
} // Exit if accessed directly

if ( ! class_exists('GiftySettings')) {

    class GiftySettings
    {
        public function options_page_render()
        {
            // check user capabilities
            if ( ! current_user_can('manage_options')) {
                return;
            }

            $errors = false;

            // get the current settings values
            $module_code            = get_option('gifty_module_code', null);
            $module_icon_visibility = get_option('gifty_module_icon_visibility', 1);

            // handle form posts
            if (array_key_exists('submit_settings', $_POST)) {

                check_admin_referer('update-gifty-options');

                $module_code            = sanitize_key($_POST['module_code']);
                $module_icon_visibility = sanitize_key($_POST['module_icon_visibility']);

                // validate if code has valid pattern
                if (strlen($module_code) !== 13 || ! ctype_alnum($module_code)) {
                    $errors = true;
                }

                // validate if code exists
                if ($errors === false) {
                    $response_code = wp_remote_retrieve_response_code(wp_remote_get('https://dashboard.gifty.nl/api/widget/' . $module_code));

                    if ($response_code !== 200) {
                        $errors = true;
                    }
                }

                if ($errors === false) {
                    update_option('gifty_module_code', $module_code);
                    update_option('gifty_module_icon_visibility', $module_icon_visibility);

                    add_settings_error('gifty_messages', 'gifty_message', __('The settings are saved', 'gifty'),
                        'updated');
                } else {
                    add_settings_error('gifty_messages', 'gifty_message',
                        __('The integration code is invalid', 'gifty'), 'error');
                }
            }

            // show error/update messages
            settings_errors('gifty_messages');

            include('options_form.php');
        }

        public function menu_metabox_register($object)
        {
            add_meta_box(
                'gifty-menu-triggers',
                esc_html__('Gifty order module', 'gifty'),
                [$this, 'menu_metabox_render'],
                'nav-menus',
                'side',
                'low'
            );

            return $object;
        }

        public function menu_metabox_render($object, $args)
        {
            // check user capabilities
            if ( ! current_user_can('manage_options')) {
                return;
            }

            global $nav_menu_selected_id;

            // Create an array of objects that imitate Post objects
            $triggers = [
                (object)[
                    'ID'               => 1,
                    'db_id'            => 0,
                    'menu_item_parent' => 0,
                    'object_id'        => 1,
                    'post_parent'      => 0,
                    'type'             => 'gifty',
                    'object'           => 'gifty-trigger-open',
                    'type_label'       => 'Gifty',
                    'title'            => __('Gift card', 'gifty'),
                    'url'              => '',
                    'target'           => '',
                    'attr_title'       => '',
                    'description'      => '',
                    'classes'          => [],
                    'xfn'              => '',
                ]
            ];

            $db_fields = ['parent' => 'parent', 'id' => 'post_parent'];
            $walker    = new Walker_Nav_Menu_Checklist($db_fields);

            include('menu_metabox.php');
        }
    }
}