<?php
defined('ABSPATH') or die('No script kiddies please!!');
if (!class_exists('FSDT_CRUD')) {
    class FSDT_CRUD {
        function __construct() {
            /**
             * FST MENU CRUD
             */
            add_action('wp_ajax_fsdt_form_save_action', [$this, 'save_fsdt_form']);
            add_action('admin_post_fsdt_delete_menu_action', array($this, 'delete_menu_tab'));
            /**
             * FST Display Menu Crud
             */
            add_action('admin_post_fsdt_display_menu_action', array($this, 'display_menu_tab'));
        }


        function delete_menu_tab() {
            if (!empty($_GET['_wpnonce']) && wp_verify_nonce(sanitize_text_field(wp_unslash($_GET['_wpnonce'])), 'fsdt_menu_delete_nonce')) {
                $menu_id = intval($_GET['menu_id']);
                global $wpdb;
                $check = $wpdb->delete(FSDT_MENU_SETTING_TABLE, array('menu_id' => $menu_id));
                if ($check) {
                    wp_redirect(admin_url('admin.php?page=floating-side-tab&message=3'));
                } else {
                    die('Something went wrong!!');
                }
            } else {
                die('Something went wrong!!');
            }
        }

        function display_menu_tab() {

            if (!empty($_POST['fsdt_display_settings_nonce_field']) && wp_verify_nonce(sanitize_text_field(wp_unslash($_POST['fsdt_display_settings_nonce_field'])), 'fsdt_display_settings_nonce')) {
                global $fsdt_library;
                $fsdt_global_settings = $fsdt_library->sanitize_array($_POST['fsdt_global_settings']);
                $fsdt_home_menu = (isset($fsdt_global_settings['display']['fsdt_home_menu'])) ? sanitize_text_field($fsdt_global_settings['display']['fsdt_home_menu']) : '';
                $fsdt_single_menu = (isset($fsdt_global_settings['display']['fsdt_single_menu'])) ? sanitize_text_field($fsdt_global_settings['display']['fsdt_single_menu']) : '';
                $fsdt_archieve_menu = (isset($fsdt_global_settings['display']['fsdt_archieve_menu'])) ? sanitize_text_field($fsdt_global_settings['display']['fsdt_archieve_menu']) : '';
                $post_type_menus = (isset($fsdt_global_settings['post_type_menu'])) ? $fsdt_global_settings['post_type_menu'] : '';
                if (!empty($post_type_menus)) {
                    foreach ($post_type_menus as $pt => $pt_value) {
                        $post_type_array[$pt] = sanitize_text_field($pt_value);
                    }
                } else {
                    $post_type_array = '';
                }
                $fsdt_global_settings = array(
                    'display_menu_page' => array(
                        'home_page' => $fsdt_home_menu,
                        'single_page' => $fsdt_single_menu,
                        'archive_page' => $fsdt_archieve_menu
                    ),
                    'display_post_type_menu' => $post_type_array
                );

                update_option('fsdt_global_settings', $fsdt_global_settings);
                wp_redirect(admin_url('admin.php?page=fsdt-settings&message=1'));
                exit;
            }
        }

        function save_fsdt_form() {

            if (!empty($_REQUEST['_wpnonce']) && wp_verify_nonce(sanitize_text_field(wp_unslash($_REQUEST['_wpnonce'])), 'fsdt-nonce')) {
                $form_data = wp_unslash($_REQUEST['form_data']); // Unable to sanitize early here without converting it to array because we are receiving the form data in serialized format through ajax and sanitization is done at line no 70
                parse_str($form_data, $form_data);
                global $fsdt_library;
                $sanitize_rule = ['custom_html' => 'html', 'iconMarkup' => 'html', 'libraryName' => 'html', 'iconText' => 'html', 'iconHtml' => 'html'];
                $form_data = $fsdt_library->sanitize_array($form_data, $sanitize_rule);
                $menu_title = sanitize_text_field($form_data['menu_title']);

                $fsdt_settings = $form_data['fsdt_settings'];
                $menu_table = FSDT_MENU_SETTING_TABLE;
                global $wpdb;
                if (!empty($form_data['menu_id'])) {
                    $menu_id = intval($form_data['menu_id']);

                    $check = $wpdb->update(
                        $menu_table,
                        array(

                            'menu_title' => $menu_title,
                            'menu_details' => maybe_serialize($fsdt_settings),

                        ),
                        array('menu_id' => $menu_id),
                        array(

                            '%s',
                            '%s',

                        ),
                        array('%d')
                    );
                    $response['status'] = 200;
                    $response['message'] = esc_html__('Menu updated successfully', 'floating-side-tab');
                } else {
                    $check = $wpdb->insert(
                        $menu_table,
                        array(

                            'menu_title' => $menu_title,
                            'menu_details' => maybe_serialize($fsdt_settings),

                        ),

                        array(

                            '%s',
                            '%s',

                        )
                    );
                    $menu_id = $wpdb->insert_id;
                    $response['status'] = 200;
                    $response['message'] = esc_html__('Menu created successfully. Redirecting ..', 'floating-side-tab');
                    $response['redirect_url'] = admin_url('admin.php?page=floating-side-tab&menu_id=' . $menu_id . '&action=edit_menu');
                }
                echo wp_json_encode($response);
                die();
            } else {
                die('No script kiddies please');
            }
        }
    }

    new FSDT_CRUD();
}
