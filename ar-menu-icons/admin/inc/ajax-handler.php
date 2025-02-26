<?php
if ( !class_exists('ARMICN_Nav') ) {
    class ARMICN_AJAX_HANDLER {

        function __construct() {
            // Register AJAX handlers
            $this->register_ajax_handlers();
        }

        private function register_ajax_handlers() {

            $ajax_actions = [
                'armicn_get_icon_settings' => 'armicn_get_icon_settings',
                'armicn_get_icon_styles_tab_contents' => 'armicn_get_icon_styles_tab_contents',
                'armicn_update_icon_options' => 'armicn_update_icon_options',
                'armicn_delete_icon' => 'armicn_delete_icon',
            ];

            foreach ( $ajax_actions as $action => $callback ) {
                add_action( "wp_ajax_$action", [ $this, $callback ] );
                add_action( "wp_ajax_nopriv_$action", [ $this, $callback ] );
            }
            
        }

        // Ensure the wp_mail functionality is initialized
        public function ensure_wp_mail_functionality() {
            // If wp_mail isn't working, we may force WordPress to load necessary components
            if (!function_exists('wp_mail')) {
                // Force WordPress to load the necessary files
                require_once(ABSPATH . 'wp-includes/pluggable.php');
            }
        }

        public function armicn_update_icon_options() {
            check_ajax_referer('armicn_nonce', 'nonce');

            if ( isset($_POST['settings'], $_POST['menu_id'], $_POST['menu_item_id']) ) {
                $menu_id = absint(sanitize_text_field(wp_unslash($_POST['menu_id'])));
                $menu_item_id = sanitize_text_field(wp_unslash($_POST['menu_item_id']));
                $settings = !empty($_POST['settings']) ? array_map('sanitize_text_field', wp_unslash($_POST['settings'])) : [];

                $meta_data = ['content' => $settings];

                if ( isset($_POST['css']) && !empty($_POST['css']) ) {
                    $meta_data['css'] = array_map('sanitize_text_field', wp_unslash($_POST['css']));
                }

                update_post_meta( $menu_item_id, 'ar_menu_icons', $meta_data );

                wp_send_json_success([
                    'message' => esc_html__('Successfully Icon saved', 'ar-menu-icons')
                ]);
            }

            wp_die();
        }

        public function armicn_delete_icon() {
            check_ajax_referer('armicn_nonce', 'nonce');

            if ( isset($_POST['menu_item_id']) ) {
                $menu_item_id = sanitize_text_field(wp_unslash($_POST['menu_item_id']));
                $ar_menu_icons = get_post_meta($menu_item_id, 'ar_menu_icons', true);

                if ( $ar_menu_icons ) {
                    delete_post_meta($menu_item_id, 'ar_menu_icons');
                    wp_send_json_success($ar_menu_icons, 200);
                } else {
                    wp_send_json_error($ar_menu_icons, 404);
                }
            }

            wp_die();
        }

        public function armicn_get_icon_settings() {

            check_ajax_referer('armicn_nonce', 'nonce');

            if ( isset($_POST['menu_item_id']) ) {
                $menu_item_id = sanitize_text_field(wp_unslash($_POST['menu_item_id']));
                $icon_source = isset($_POST['icon_source']) ? sanitize_text_field(wp_unslash($_POST['icon_source'])) : 'dashicon';
                $item_settings = get_post_meta($menu_item_id, 'ar_menu_icons', true);
                wp_send_json_success( $item_settings );
            }
            wp_die();
        }


    }

    new ARMICN_AJAX_HANDLER();
}




	



   