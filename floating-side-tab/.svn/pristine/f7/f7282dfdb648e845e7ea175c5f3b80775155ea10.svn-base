<?php
defined('ABSPATH') or die('No script kiddies please!!');
if (!class_exists('FSDT_FrontEnd')) {
    class FSDT_FrontEnd extends FSDT_Library {
        function __construct() {
            add_action('wp_footer', [$this, 'fsdt_frontend_template']);
        }

        function fsdt_frontend_template() {
            $fsdt_settings = get_option('fsdt_global_settings');
            if (isset($_GET['fsdt_menu_preview']) && $_GET['fsdt_menu_preview'] == 'true' && is_user_logged_in() && !empty($_GET['_wpnonce']) && wp_verify_nonce(sanitize_text_field(wp_unslash($_GET['_wpnonce'])), 'fsdt_preview_nonce')) {
                $fsdt_menu_id = intval($_GET['fsdt_menu_id']);
            } else {
                if (is_home()) {
                    $fsdt_menu_id = (!empty($fsdt_settings['display_menu_page']['home_page'])) ? $fsdt_settings['display_menu_page']['home_page'] : '';
                }
                if (is_single()) {

                    if (!empty($fsdt_settings)) {

                        foreach ($fsdt_settings['display_post_type_menu'] as $fsdt_post_key => $fsdt_post_type) {

                            if ($fsdt_post_key == get_post_type()) {

                                global $post;

                                $fsdt_menu_id = (!empty($fsdt_post_type)) ? $fsdt_post_type : '';

                                global $post;
                                $pid = $post->ID;
                                $fsdt_meta_details = get_post_meta($pid, 'fsdt_meta_detail', true);


                                $menu_status = (!empty($fsdt_meta_details['menu_status'])) ? $fsdt_meta_details['menu_status'] : '';

                                if ($menu_status == '') {

                                    $post_type_menu = (!empty($fsdt_meta_details['post_type_menu'])) ? $fsdt_meta_details['post_type_menu'] : '';


                                    if ($post_type_menu == 'Default' || $post_type_menu == '') {

                                        $fsdt_menu_id = (!empty($fsdt_post_type)) ? $fsdt_post_type : '';
                                    } else {

                                        $fsdt_menu_id = $post_type_menu;
                                    }
                                } else {

                                    $fsdt_menu_id = '';
                                }
                            }
                        }
                    } else {

                        global $post;
                        $fsdt_meta_details = get_post_meta($post->ID, 'fsdt_meta_detail', true);

                        $menu_status = (!empty($fsdt_meta_details['menu_status'])) ? $fsdt_meta_details['menu_status'] : '';


                        $fsdt_menu_id = (!empty($fsdt_meta_details['post_type_menu'])) ? $fsdt_meta_details['post_type_menu'] : '';
                    }
                }
            }
            if (is_page()) {

                if (!empty($fsdt_settings)) {

                    foreach ($fsdt_settings['display_post_type_menu'] as $fsdt_post_key => $fsdt_post_type) {

                        if ($fsdt_post_key == get_post_type()) {

                            global $post;

                            $fsdt_menu_id = (!empty($fsdt_post_type)) ? $fsdt_post_type : '';

                            global $post;
                            $pid = $post->ID;
                            $fsdt_meta_details = get_post_meta($pid, 'fsdt_meta_detail', true);


                            $menu_status = (!empty($fsdt_meta_details['menu_status'])) ? $fsdt_meta_details['menu_status'] : '';

                            if ($menu_status == '') {

                                $post_type_menu = (!empty($fsdt_meta_details['post_type_menu'])) ? $fsdt_meta_details['post_type_menu'] : '';


                                if ($post_type_menu == 'Default' || $post_type_menu == '') {

                                    $fsdt_menu_id = (!empty($fsdt_post_type)) ? $fsdt_post_type : '';
                                } else {

                                    $fsdt_menu_id = $post_type_menu;
                                }
                            } else {

                                $fsdt_menu_id = '';
                            }
                        }
                    }
                } else {

                    global $post;
                    $fsdt_meta_details = get_post_meta($post->ID, 'fsdt_meta_detail', true);

                    $menu_status = (!empty($fsdt_meta_details['menu_status'])) ? $fsdt_meta_details['menu_status'] : '';


                    $fsdt_menu_id = (!empty($fsdt_meta_details['post_type_menu'])) ? $fsdt_meta_details['post_type_menu'] : '';
                }
            }




            if (is_archive()) {

                $fsdt_menu_id = (!empty($fsdt_settings['display_menu_page']['archive_page'])) ? $fsdt_settings['display_menu_page']['archive_page'] : '';
            }

            $home_menu_row = $this->get_menu_row_by_id($fsdt_menu_id);

            if (!empty($home_menu_row)) {
                $home_menu_title = $home_menu_row->menu_title;
                $fsdt_menu_details = maybe_unserialize($home_menu_row->menu_details);

                $home_menu_template = (!empty($fsdt_menu_details['layout']['menu_templates'])) ? $fsdt_menu_details['layout']['menu_templates'] : '';
                $icon_animate_class = (!empty($fsdt_menu_details['layout']['icon_animation'])) ? $fsdt_menu_details['layout']['icon_animation'] : 'fsdt-animate-slide';
                $hide_mob_class = (!empty($fsdt_menu_details['layout']['hide_mobile'])) ? $fsdt_menu_details['layout']['hide_mobile'] : '';


                $menu_position = (!empty($fsdt_menu_details['layout']['menu_position'])) ? $fsdt_menu_details['layout']['menu_position'] : 'fsdt-left';

                if (!empty($home_menu_template)) {

                    if (!empty($fsdt_menu_details['menu'])) {
                        wp_enqueue_style('fst-frontend-custom', FSDT_CSS_DIR . '/fsdt-custom.css', array(), FSDT_VERSION);
                        include(FSDT_PATH . '/includes/views/frontend/icon-template-html.php');
                    }
                }
            }
        }
    }

    new FSDT_FrontEnd();
}
