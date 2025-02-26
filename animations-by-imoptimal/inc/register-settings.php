<?php
add_action( 'admin_menu', 'imoanim_add_admin_menu' );
add_action( 'admin_init', 'imoanim_meta_init' );
add_action( 'admin_init', 'imoanim_settings_init' );

function write_here_activation_actions(){
    do_action( 'wp_writehere_extension_activation' );
}
register_activation_hook( __FILE__, 'write_here_activation_actions' );
// Set default values here
function write_here_default_options(){
    $default = array(
        'imoanim_numbers_field'     => 1,
        'imoanim_minification_field'   => 0
    );
    update_option( 'imoanim_meta', $default );
}
add_action( 'wp_writehere_extension_activation', 'write_here_default_options' );

if(!function_exists('imoanim_add_admin_menu')) {
    function imoanim_add_admin_menu() {

        add_submenu_page( 'options-general.php', // parent menu item - general settings in this case
                         'Animations by Imoptimal', // plugin's menu item title
                         'Animations by Imoptimal', // plugin's settings page title
                         'activate_plugins', // (user role) capability - restricted to admins
                         'imoanim_animations', // menu slug
                         'imoanim_options_page' ); //output function
    }
}

if(!function_exists('imoanim_meta_init')) {
    function imoanim_meta_init() {

        register_setting( 'imoanim_meta_group', // option group
                         'imoanim_meta', // option name
                         'imoanim_validate_meta' // validate function
                        );
        // Number of groups selection section
        add_settings_section(
            'imoanim_numbers_section', // id
            '', // title
            'imoanim_settings_section_callback', // callback function 
            'imoanim_meta_group' // option group
        );

        add_settings_field( 
            'imoanim_numbers_field', // id
            'a) ' . esc_html__( 'Choose how many groups of items you need (to target with different type of animation)', 'imoptimal_animation' ), // title
            'imoanim_numbers_render', // callback function
            'imoanim_meta_group', // option group
            'imoanim_numbers_section' // field output section
        );
        // Minification section
        add_settings_section(
            'imoanim_minification_section',
            '',
            'imoanim_settings_section_callback',
            'imoanim_meta_group'
        );

        add_settings_field( 
            'imoanim_minification_field',
            'b) ' . esc_html__( 'Choose if the plugin files (styles and scripts) will be loaded in regular or minified version', 'imoptimal_animation' ),
            'imoanim_minification_render',
            'imoanim_meta_group',
            'imoanim_minification_section'
        );
    }
}

if(!function_exists('imoanim_settings_init')) {
    function imoanim_settings_init() { 

        register_setting( 'imoanim_animations_group', // option group
                         'imoanim_settings', // option name
                         'imoanim_validate_settings' // validate function
                        );

        $defaults = array(
            'imoanim_numbers_field'   => '1',
        );
        $options = wp_parse_args( get_option( 'imoanim_meta', $defaults), $defaults );
        $numberChoosen = $options['imoanim_numbers_field'];
        // Main section loop
        for ($i = 1; $i <= $numberChoosen; $i++) {

            add_settings_section(
                'imoanim_animations_group_section_' . $i, // id
                '<div class="imo-collapsible">
            <div class="group-title">' . esc_html__( 'Animation Group', 'imoptimal_animation' ) . ' #' . $i . '</div> 
            <div class="imo-info"></div> 
            <div class="collapsible-icon"></div>
            </div>',  // title
                'imoanim_settings_section_callback', // callback function 
                'imoanim_animations_group' // option group
            );

            add_settings_field( 
                'imoanim_items_' . $i, // id
                '1. ' . esc_html__( 'Items to animate (use CSS selectors). Separate individual items by commas', 'imoptimal_animation' ),  // title
                'imoanim_items_render',  // callback function
                'imoanim_animations_group', // option group
                'imoanim_animations_group_section_' . $i, // field output section
                array( // Args
                    'index' => $i,
                )
            );

            add_settings_field( 
                'imoanim_animation_type_'  . $i, 
                '2. ' .esc_html__('Select the animation type', 'imoptimal_animation' ), 
                'imoanim_animation_type_render', 
                'imoanim_animations_group', 
                'imoanim_animations_group_section_' . $i,
                array( // Args
                    'index' => $i,
                )
            );

            add_settings_field( 
                'imoanim_animation_duration_'  . $i, 
                '3. ' .esc_html__('Choose the duration of the animation', 'imoptimal_animation' ), 
                'imoanim_animation_duration_render', 
                'imoanim_animations_group', 
                'imoanim_animations_group_section_' . $i,
                array( // Args
                    'index' => $i,
                ) 
            );

            add_settings_field( 
                'imoanim_animation_repetition_'  . $i, 
                '4. ' . esc_html__('Choose the repetition count of the animation', 'imoptimal_animation' ), 
                'imoanim_animation_repetition_render', 
                'imoanim_animations_group', 
                'imoanim_animations_group_section_' . $i,
                array( // Args
                    'index' => $i,
                )
            );

            add_settings_field( 
                'imoanim_timing_'  . $i, 
                '5. ' . esc_html__('Choose the speed curve of the selected animation', 'imoptimal_animation' ), 
                'imoanim_animation_timing_render', 
                'imoanim_animations_group', 
                'imoanim_animations_group_section_' . $i,
                array( // Args
                    'index' => $i,
                )
            );

            add_settings_field( 
                'imoanim_delay_'  . $i, 
                '6. ' . esc_html__('Choose the delay of animation when entering screens viewport', 'imoptimal_animation' ), 
                'imoanim_animation_delay_render', 
                'imoanim_animations_group', 
                'imoanim_animations_group_section_' . $i,
                array( // Args
                    'index' => $i,
                )
            );

            add_settings_field( 
                'imoanim_reanimation_'  . $i, 
                '7. ' . esc_html__('Choose if the animation will be triggered repeatedly every time selected items enter screens viewport. There is also an option to trigger animation on mouse hover or screen tap instead.', 'imoptimal_animation' ), 
                'imoanim_reanimation_render', 
                'imoanim_animations_group', 
                'imoanim_animations_group_section_' . $i,
                array( // Args
                    'index' => $i,
                )
            );
        }
    }
}

if(!function_exists('imoanim_validate_settings')) {
    function imoanim_validate_settings( $input ) {

        // Create our array for storing the validated options
        $output = array();

        foreach( $input as $key => $value ) {

            // Check to see if the current option has a value. If so, process it.
            if( isset( $input[$key] ) ) {

                // Strip all HTML and PHP tags and properly handle quoted strings
                $output[$key] = sanitize_textarea_field( $input[ $key ] );

            } // end if
        } // end foreach
        // Return the array processing any additional functions filtered by this action
        return apply_filters( 'imoanim_settings', $output, $input );
    }
}

if(!function_exists('imoanim_validate_meta')) {
    function imoanim_validate_meta( $input ) {

        // Create our array for storing the validated options
        $output = array();

        foreach( $input as $key => $value ) {

            // Check to see if the current option has a value. If so, process it.
            if( isset( $input[$key] ) ) {

                // Strip all HTML and PHP tags and properly handle quoted strings
                $output[$key] = sanitize_textarea_field( $input[ $key ] );

            } // end if
        } // end foreach
        // Return the array processing any additional functions filtered by this action
        return apply_filters( 'imoanim_meta', $output, $input );
    }
}

if(!function_exists('imoanim_settings_section_callback')) {
    function imoanim_settings_section_callback() {
    }
}

?>