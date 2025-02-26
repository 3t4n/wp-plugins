<?php
// Public resources
add_action('wp_enqueue_scripts', 'imoanim_public_resources');

if(!function_exists('imoanim_public_resources')) {
    function imoanim_public_resources() {

        wp_register_script('imoanim-public-script', plugin_dir_url( __FILE__ ) . '../js/imoanim-public.js', array('jquery'), false);
        wp_register_script('imoanim-public-script-min', plugin_dir_url( __FILE__ ) . '../js/imoanim-public-min.js', array('jquery'), false);
        
        // Passing php option variables into the javascript
        $defaultEmptyArray = array();
        $options_array =  wp_parse_args( get_option( 'imoanim_settings', $defaultEmptyArray), $defaultEmptyArray );

        // Dividing single array into groups of 7 (based on number of fields)
        $divided_array = array_chunk($options_array, 7, true);

        // Reset array keys to numbers
        $numeric_array = array_map('array_values', $divided_array);

        // Set up function to change key names in a multidimensional array (all levels)
        if(!function_exists('imoanim_change_keys')) {
            function imoanim_change_keys($arr, $set) {
                //$arr => original array
                //$set => array containing old keys as keys and new keys as values
                if (is_array($arr) && is_array($set)) {
                    $newArr = array();
                    foreach ($arr as $k => $v) {
                        $key = array_key_exists( $k, $set) ? $set[$k] : $k;
                        $newArr[$key] = is_array($v) ? imoanim_change_keys($v, $set) : $v;
                    }
                    return $newArr;
                }
                return $arr;
            }
        }

        $renamed_array = imoanim_change_keys($numeric_array, array(
            '0' => 'imoanim_items',
            '1' => 'imoanim_animation_type',
            '2' => 'imoanim_animation_duration',
            '3' => 'imoanim_animation_repetition',
            '4' => 'imoanim_animation_timing',
            '5' => 'imoanim_animation_delay',
            '6' => 'imoanim_reanimation'
        ));

        // Reset first level keys to index numbers
        $reset_array = array_values($renamed_array);

        wp_localize_script('imoanim-public-script', 'imoanimPhp', $reset_array);
        wp_localize_script('imoanim-public-script-min', 'imoanimPhp', $reset_array);
        
        $defaults = array(
            'imoanim_minification_field'   => '0',
        );
        $options = wp_parse_args( get_option( 'imoanim_meta', $defaults), $defaults );
        $optionsMeta = $options['imoanim_minification_field'];

        if ($optionsMeta == 1) { // if minified selected

            wp_enqueue_script('imoanim-public-script-min');

        } else { // not minified

            wp_enqueue_script('imoanim-public-script');

        }

    }
}

// Admin resources
add_action('admin_enqueue_scripts', 'imoanim_admin_resources');

if(!function_exists('imoanim_admin_resources')) {
    function imoanim_admin_resources($hook) {
        // used print_r(get_current_screen();) under ID = $hook
        if ( 'settings_page_imoanim_animations' != $hook ) {
            return;
        }

        $defaults = array(
            'imoanim_minification_field'   => '0',
        );
        $options = wp_parse_args( get_option( 'imoanim_meta', $defaults), $defaults );
        $optionsMeta = $options['imoanim_minification_field'];

        wp_register_script('imoanim-admin-script', plugin_dir_url( __FILE__ ) . '../js/imoanim-admin.js', array('jquery'), true);
        wp_register_script('imoanim-admin-script-min', plugin_dir_url( __FILE__ ) . '../js/imoanim-admin-min.js', array('jquery'), true);

        $translateEmpty = esc_html__('No items selected', 'imoptimal_animation');
        $translateSelected = esc_html__('Selected item(s) to be animated: ', 'imoptimal_animation');

        wp_localize_script('imoanim-admin-script', 'imoanimPhp', array(
            'empty' => $translateEmpty,
            'selected' => $translateSelected
        ));

        wp_localize_script('imoanim-admin-script-min', 'imoanimPhp', array(
            'empty' => $translateEmpty,
            'selected' => $translateSelected
        ));
        
        if ($optionsMeta == 1) { // if minified selected

            wp_enqueue_script('imoanim-admin-script-min');
            wp_enqueue_style('imoanim-admin-style-min', plugin_dir_url( __FILE__ ) . '../css/imoanim-admin-min.css', array());

        } else { // not minified

            wp_enqueue_script('imoanim-admin-script');
            wp_enqueue_style('imoanim-admin-style', plugin_dir_url( __FILE__ ) . '../css/imoanim-admin.css', array());

        }
    }
}
?>