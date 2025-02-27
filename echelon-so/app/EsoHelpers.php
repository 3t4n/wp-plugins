<?php

if ( ! defined( 'ABSPATH' ) ) exit; // Exit if accessed directly

if ( !class_exists('EsoHelpers') ) {

    final class EsoHelpers {

        /*
        * Get Breakpoints
        */

        public static function get_breakpoints($as_int = false) {
            if (function_exists('siteorigin_panels_setting')) {
                $settings = siteorigin_panels_setting();
                if ($as_int == true) {
                    $break_points['tablet'] = $settings['tablet-width'];
                    $break_points['mobile'] = $settings['mobile-width'];
                } else {
                    $break_points['tablet'] = ($settings['tablet-width'] + 1) . 'px';
                    $break_points['mobile'] = ($settings['mobile-width'] + 1) . 'px';
                }
            } else {
                if ($as_int == true) {
                    $break_points['tablet'] = 1024;
                    $break_points['mobile'] = 768;
                } else {
                    $break_points['tablet'] = '1024px';
                    $break_points['mobile'] = '768px';
                }
            }

            return $break_points;

        }

        /*
        * Setup default palette colors
        */

        public static function get_palette_colors() {
            $return['color_1'] = (isset(ECHELONSO_OPTIONS['custom_palette_1']) ? ECHELONSO_OPTIONS['custom_palette_1'] : '#000000');
            $return['color_2'] = (isset(ECHELONSO_OPTIONS['custom_palette_2']) ? ECHELONSO_OPTIONS['custom_palette_2'] : '#ffffff');
            $return['color_3'] = (isset(ECHELONSO_OPTIONS['custom_palette_3']) ? ECHELONSO_OPTIONS['custom_palette_3'] : '#dd3333');
            $return['color_4'] = (isset(ECHELONSO_OPTIONS['custom_palette_4']) ? ECHELONSO_OPTIONS['custom_palette_4'] : '#dd9933');
            $return['color_5'] = (isset(ECHELONSO_OPTIONS['custom_palette_5']) ? ECHELONSO_OPTIONS['custom_palette_5'] : '#eeee22');
            return apply_filters('eso_palette_colors', $return);
        }

        /*
        * Check if a customiser option is enabled
        */

        public static function is_option_enabled($option) {
            if ( !isset(ECHELONSO_OPTIONS[$option]) || isset(ECHELONSO_OPTIONS[$option]) && !empty(ECHELONSO_OPTIONS[$option]) ) {
                return true;
            }
            return false;
        }

        /*
        * Check if array key exists and equals value
        */

        public static function key_equals($key, $value) {
            if ( isset($key) && $key == $value) {
                return true;
            }
            return false;
        }

        /*
        * Get a list of available mage sizes
        */

        public static function image_sizes() {
            $sizes = get_intermediate_image_sizes();
            foreach ($sizes as $k => $v) {
                $return[$v] = $v;
            }
            $return['0'] = '-';
            return $return;
        }

        /*
        * Get a list of available mage sizes
        */

        public static function get_layout_select_options() {
            $args = array(
                'post_type'=> 'echelonso_layout',
                'posts_per_page' => -1,
                'orderby' => 'post_title',
                'order' => 'ASC'
            );
            $the_query = new WP_Query( $args );
            $options = array();
            $options[0] = __('None', 'echelon-so');
            if ( $the_query->have_posts() ) {
                foreach ($the_query->posts as $k => $v) {
                    $options[$v->ID] = $v->post_title;
                }
            }
            return $options;
        }

        /*
        * Get a stand baner for each widget
        */

        public static function widget_banner( $banner_url, $widget_meta ) {

            $widgets = array(
                'eso-acf-field',
                'eso-before-after',
                'eso-button',
                'eso-card',
                'eso-comment',
                'eso-count-query-result',
                'eso-counter',
                'eso-cover',
                'eso-custom-loop',
                'eso-description-list',
                'eso-divider',
                'eso-feature',
                'eso-filter',
                'eso-heading',
                'eso-icon-list',
                'eso-label',
                'eso-lightbox-component-image',
                'eso-lightbox-gallery',
                'eso-modal',
                'eso-nav',
                'eso-navigator',
                'eso-off-canvas',
                'eso-overlay',
                'eso-post-box',
                'eso-pricing',
                'eso-product-box',
                'eso-product-category-box',
                'eso-radial',
                'eso-reuse-layout',
                'eso-slabtext',
                'eso-slider',
                'eso-slideshow',
                'eso-smooth-scroll',
                'eso-subnav',
                'eso-tabs',
                'eso-text',
                'eso-text-rotator',
                'eso-template-tag',
                'eso-twitter-feed',
                'eso-typewriter',
                'eso-video',
                'eso-woocommerce-tag',
            );

            if ( in_array($widget_meta['ID'], $widgets) ) {
                return plugin_dir_url( __FILE__ ) . '../inc/widget-icon.png?v=' . ECHELONSO_VERSION;
            }

            return $banner_url;

        }

        /*
        * Widget fields class prefixes
        */

        public static function widget_fields_class_prefixes( $class_prefixes ) {
            $class_prefixes[] = 'Echelon_';
            return $class_prefixes;
        }

        /**
        * Widget fields class paths
        */

        public static function widget_fields_class_paths( $class_paths ) {
            $class_paths[] = plugin_dir_path( __FILE__ ) . '../custom-fields/';
            return $class_paths;
        }

        public static function custom_plugin_row_meta( $links, $file ) {
            if ( strpos( $file, 'echelon-so.php' ) !== false ) {
                $new_links['eso_prime'] = '<a target="_blank" style="color: #3db634;" href="https://echelonwidgets.com/prime/">Get Prime</a>';
                $new_links['eso_support'] = '<a href="https://wordpress.org/support/plugin/echelon-so/" target="_blank">Support</a>';
                $links = array_merge( $links, $new_links );
            }
            return $links;
        }

        /*
        * Register Reusable Layouts CPT and Taxes
        */

        public static function reusable_layouts_cpt_tax() {

            if (self::is_option_enabled('echelon_layouts')) {

                register_taxonomy(
                    'echelonso_layout_cat',
                    'echelonso_layout',
                    array(
                        'hierarchical' => true,
                        'label' => __('Categories', 'echelon-so'),
                        'query_var' => true,
                        'has_archive' => false,
                        'show_in_nav_menus' => false,
                        'show_admin_column' => true
                    )
                );

                register_taxonomy(
                    'echelonso_layout_tag',
                    'echelonso_layout',
                    array(
                        'hierarchical' => false,
                        'label' => __('Tags', 'echelon-so'),
                        'query_var' => true,
                        'has_archive' => false,
                        'show_in_nav_menus' => false,
                        'show_admin_column' => true
                    )
                );

                register_post_type( 'echelonso_layout', array(
                    'label'  => __('Echelon Layouts', 'echelon-so'),
                    'public' => true,
                    'has_archive' => false,
                    'show_in_nav_menus' => false,
                    'menu_position' => 80,
                    'menu_icon' => 'dashicons-layout',
                    'exclude_from_search' => true
                ));
            }

        }

        /*
        * Widget folders
        */

        public static function widget_folders($folders) {
            $folders['echelonso_widgets'] = plugin_dir_path(__FILE__) . '../widgets/';
            if (class_exists('WooCommerce')) {
                $folders['echelonso_widgets_woo'] = plugin_dir_path(__FILE__) . '../widgets-woo/';
            }
            return $folders;
        }

        public static function widget_groups($tabs) {
            $tabs[] = array(
                'title' => __('E: Widgets', EsoWidgetFormPart::text_domain()),
                'filter' => array(
                    'groups' => array('eso')
                )
            );
            $tabs[] = array(
                'title' => __('E: WC Widgets', EsoWidgetFormPart::text_domain()),
                'filter' => array(
                    'groups' => array('eso_woo')
                )
            );
            return $tabs;
        }

        /**
        * CSS for the header
        */

        public static function get_head_css() {
            ob_start();
            ?>
            <style type="text/css">
            body {
                overflow-x: hidden;
            }
            .eso-animate-hidden .so-panel {
                visibility:hidden;
            }
            .eso-animate-hidden .so-panel.eso-animate-visible {
                visibility: visible;
            }
            .eso-animate-hidden-widget {
                visibility:hidden;
            }
            .eso-animate-hidden-widget.eso-animate-visible-widget {
                visibility: visible;
            }
            @media only screen and (max-width: <?php echo self::get_breakpoints()['mobile']; ?>) {
                .eso-hide-mobile {
                    display: none !important;
                }
            }
            @media only screen and (min-width: <?php echo self::get_breakpoints()['mobile']; ?>) and (max-width: <?php echo self::get_breakpoints()['tablet']; ?>){
                .eso-hide-tablet {
                    display: none !important;
                }
            }
            @media only screen and (min-width: <?php echo self::get_breakpoints()['tablet']; ?>){
                .eso-hide-desktop {
                    display: none !important;
                }
            }
            .eso-line-height-1 { line-height: 1 }
            .eso-line-height-1-25 { line-height: 1.25 }
            .eso-line-height-1-5 { line-height: 1.5 }
            .eso-line-height-1-75 { line-height: 1.75 }
            .eso-line-height-2 { line-height: 2 }
            .uk-position-center-wide {
                top: 50%;
                left: 50%;
                transform: translate(-50%,-50%);
                width: 100%;
                max-width: 100%;
                box-sizing: border-box;
            }
            .eso-animated-gradient { position: relative; }
            .eso-animated-gradient .gradient-canvas { position: absolute; display: block; width: 100%; height: 100%; top: 0; right: 0; bottom: 0; left: 0; z-index: 0; }
            .eso-animated-gradient div { position: relative; z-index: 1;}
            </style>
            <?php
            $str = str_replace(array("\r","\n"),'',trim(ob_get_clean()));
            $str = str_replace("			", ' ', $str);
            $str = str_replace("  ", ' ', $str);
            return $str;
        }

        public static function wp_head() {
            echo self::get_head_css();
        }

    } // end class

} // end class exsists
