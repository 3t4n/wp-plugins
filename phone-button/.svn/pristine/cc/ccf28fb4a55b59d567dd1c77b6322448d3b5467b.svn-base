<?php if ( ! defined( 'ABSPATH' ) ) exit; // Exit if accessed directly ?>
<?php

// ========================================================================================================
// Get all the data and ouput it into the page
// ========================================================================================================

$getting_plugin_data = get_option($wp_options_name);

if( !empty($getting_plugin_data) ) {

    // ----------------------------------------------
    // breaking the string into to 2 variables. the array namd and vakue  
    // ----------------------------------------------  
    
    $break_array = explode("***", $getting_plugin_data);

    $item_name = explode("####", $break_array[0]);
    $key_name = explode("####", $break_array[1]);

    $array_count = count($key_name);

    // ----------------------------------------------
    // creating an organized array with all values
    // ----------------------------------------------      

    for($count_number = 0; $count_number < $array_count; $count_number++) {
    	$phone_btn_data_array[ $item_name[$count_number] ] = $key_name[$count_number];
    } // for($count_number = 0; $count_number < $array_count; $count_number++) {

    // ----------------------------------------------
    // gettting all the plugin data
    // ----------------------------------------------   

    $display_button_checkbox = intval($phone_btn_data_array['display_button_checkbox']);
    $phone_number = $phone_btn_data_array['phone_number'];
    $button_width = intval($phone_btn_data_array['button_width']);
    $button_height = intval($phone_btn_data_array['button_height']);
    $border_radius = esc_attr($phone_btn_data_array['border_radius']);
    $horizontal_position = esc_attr($phone_btn_data_array['horizontal_position']);
    $horizontal_spacing = esc_attr($phone_btn_data_array['horizontal_spacing']);
    $vertical_position = esc_attr($phone_btn_data_array['vertical_position']);
    $vertical_spacing = esc_attr($phone_btn_data_array['vertical_spacing']);
    $background_color = esc_attr($phone_btn_data_array['background_color']);
    $background_position = esc_attr($phone_btn_data_array['background_position']);
    $button_z_index = intval($phone_btn_data_array['button_z_index']);
    $button_border = esc_attr($phone_btn_data_array['button_border']);
    $icon_image_url = esc_url($phone_btn_data_array['icon_image_url']);
    $hide_button_on_desktop = intval($phone_btn_data_array['hide_button_on_desktop']);
    $hide_button_on_mobile = intval($phone_btn_data_array['hide_button_on_mobile']);
    $mobile_width = intval($phone_btn_data_array['mobile_width']);
    $mobile_button_position_checkbox = intval($phone_btn_data_array['mobile_button_position_checkbox']);
    $mobile_horizontal_position = esc_attr($phone_btn_data_array['mobile_horizontal_position']);
    $mobile_horizontal_spacing = esc_attr($phone_btn_data_array['mobile_horizontal_spacing']);
    $mobile_vertical_position = esc_attr($phone_btn_data_array['mobile_vertical_position']);
    $mobile_vertical_spacing = esc_attr($phone_btn_data_array['mobile_vertical_spacing']);
     
    // ----------------------------------------------
    // dealing with exclude or include pages
    // ----------------------------------------------

    $phone_btn_exclude_option = esc_attr($phone_btn_data_array['exclude_option']);
    $exclude_ids = esc_attr($phone_btn_data_array['exclude_ids']);

    // creating an array with all the ids
    $phone_btn_exclude_ids_array = [];
    $exclude_ids_explode = explode( ',', $exclude_ids);
    
    foreach($exclude_ids_explode as $exclude_id) {

        $exclude_id = intval( trim($exclude_id) );

        if( !empty($exclude_id) ) {
            $phone_btn_exclude_ids_array[] = $exclude_id;
        } // if( !empty($exclude_id) ) {

    } // foreach($exclude_ids_explode as $exclude_id) {


    // making sure the back to top button active 
    if( $display_button_checkbox == 1 ) {
    
        // ----------------------------------------------
        // create button css code
        // ----------------------------------------------

        $button_html_code = "<a href='tel:" . $phone_number . "' class='yydev-phone-button activeButtons' data-activevalue='#phone-button'><span></span></a>";

        // ----------------------------------------------
        // create button css code
        // ----------------------------------------------

        $phone_btn_style = '';

        // dealing with button style
        $phone_btn_style .= '<style>';
            $phone_btn_style .= 'a.yydev-phone-button {';

                $phone_btn_style .= 'background:' . $background_color . ';';
                $phone_btn_style .= 'width:' . $button_width . 'px;';
                $phone_btn_style .= 'height:' . $button_height . 'px;';
                $phone_btn_style .= 'border-radius:' . $border_radius . ';';
                $phone_btn_style .= $horizontal_position . ':' . $horizontal_spacing . ';';
                $phone_btn_style .= $vertical_position . ':' . $vertical_spacing . ';';
                $phone_btn_style .= 'border:' . $button_border . ';';
                $phone_btn_style .= 'position:fixed;';
                $phone_btn_style .= 'text-indent:-9999px;';

                $current_button_z_index = "9999";
                if(!empty($button_z_index)) { $current_button_z_index = $button_z_index; }
                $phone_btn_style .= 'z-index:' . $current_button_z_index . ';';

                // if we hide this one desktop
                if($hide_button_on_desktop == 1) {        
                    $phone_btn_style .= 'display:none;';
                } else { // if($hide_button_on_desktop == 1) {
                    $phone_btn_style .= 'display:block;';
                } // } else { // if($hide_button_on_desktop == 1) {

           $phone_btn_style .= '}';

            $phone_btn_style .= 'a.yydev-phone-button span {';

                $phone_btn_style .= 'display:block;';
                $phone_btn_style .= 'height: 100%;';
                $phone_btn_style .= 'width: 100%;';
                $phone_btn_style .= 'background: transparent url(' . $icon_image_url .') no-repeat;';

                $current_background_position = "50% 50%";
                if(!empty($background_position)) { $current_background_position = $background_position; }
                $phone_btn_style .= 'background-position: ' .  $current_background_position . ';';

           $phone_btn_style .= '}';

            // -------------------------------------------
           // dealing with button mobile style
           // -------------------------------------------
           $phone_btn_style .= '@media only screen and (max-width: ' . $mobile_width . 'px) {';

                $phone_btn_style .= 'a.yydev-phone-button {';

                    if($mobile_button_position_checkbox == 1 ) {
                        $phone_btn_style .= $horizontal_position . ':auto;';
                        $phone_btn_style .= $vertical_position . ':auto;';
                        $phone_btn_style .= $mobile_horizontal_position . ':' . $mobile_horizontal_spacing . ';';
                        $phone_btn_style .= $mobile_vertical_position . ':' . $mobile_vertical_spacing . ';';
                    } // if($mobile_button_position_checkbox == 1 ) {

                    // if the button is showed only on desktop
                    if($hide_button_on_mobile == 1) {
                        $phone_btn_style .= 'display:none;';
                    } else { // if($hide_button_on_mobile == 0) {
                        $phone_btn_style .= 'display:block;';
                    } // } else { // if($hide_button_on_mobile == 0) {

                $phone_btn_style .= '}';

           $phone_btn_style .= '}';

       $phone_btn_style .= '</style>';

        // ----------------------------------------------
        // add css and javascript code to header
        // ----------------------------------------------   

        add_action( 'wp_head', function() use ($phone_btn_style, $phone_btn_exclude_option, $phone_btn_exclude_ids_array) {
        	 
            $page_id = yydev_phone_btn_find_page_id();
            $phone_btn_exclude_option = $phone_btn_exclude_option; // checking if we should exclude or include pages
            $exclude_ids = $phone_btn_exclude_ids_array; // pages we should display on or ignore
            $output_phone_button = 1;

            // incase we exclude pages
            if( $phone_btn_exclude_option === 'exclude' ) {

                // incase we choose to exclude an id
                if( in_array( $page_id, $exclude_ids) ) {
                    $output_phone_button = 0;
                } // if( in_array( $page_id, $exclude_ids) ) {

            } // if( $phone_btn_exclude_option === 'exclude' ) {

            // incase we exclude pages
            if( $phone_btn_exclude_option === 'include' ) {

                // incase we choose to include only on some pages
                if( !in_array( $page_id, $exclude_ids) ) {
                    $output_phone_button = 0;
                } // if( !in_array( $page_id, $exclude_ids) ) {

            } // if( $phone_btn_exclude_option === 'exclude' ) {

            // checking if we should output the button
            if( $output_phone_button ) {

                // echo css code to page
                echo $phone_btn_style;

            } // if( $output_phone_button ) {

        }); // add_action( 'wp_head', function() use ($phone_btn_style, $phone_btn_exclude_option, $phone_btn_exclude_ids_array) {

        // ----------------------------------------------
        // add the button html to footer
        // ---------------------------------------------- 

        add_action( 'wp_footer', function() use ($button_html_code, $phone_btn_exclude_option, $phone_btn_exclude_ids_array) {
        	 
            $page_id = yydev_phone_btn_find_page_id();
            $phone_btn_exclude_option = $phone_btn_exclude_option; // checking if we should exclude or include pages
            $exclude_ids = $phone_btn_exclude_ids_array; // pages we should display on or ignore
            $output_phone_button = 1;

            // incase we exclude pages
            if( $phone_btn_exclude_option === 'exclude' ) {

                // incase we choose to exclude an id
                if( in_array( $page_id, $exclude_ids) ) {
                    $output_phone_button = 0;
                } // if( in_array( $page_id, $exclude_ids) ) {

            } // if( $phone_btn_exclude_option === 'exclude' ) {

            // incase we exclude pages
            if( $phone_btn_exclude_option === 'include' ) {

                // incase we choose to include only on some pages
                if( !in_array( $page_id, $exclude_ids) ) {
                    $output_phone_button = 0;
                } // if( !in_array( $page_id, $exclude_ids) ) {

            } // if( $phone_btn_exclude_option === 'exclude' ) {

            // checking if we should output the button
            if( $output_phone_button ) {

                // echo html button
                echo $button_html_code;

            } // if( $output_phone_button ) {   

        }); // add_action( 'wp_footer', function() use ($button_html_code, $phone_btn_exclude_option, $phone_btn_exclude_ids_array) {

    } // if( $display_button_checkbox == 1 ) {

} // if( !empty($getting_plugin_data) ) {

