<?php if ( ! defined( 'ABSPATH' ) ) exit; // Exit if accessed directly ?>
<?php

// ========================================================================================================
// Get all the data and ouput it into the page
// ========================================================================================================

    $getting_plugin_data = get_option($wp_options_name);

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
    	$mobile_line_data_array[ $item_name[$count_number] ] = $key_name[$count_number];
    } // for($count_number = 0; $count_number < $array_count; $count_number++) {

    // ----------------------------------------------
    // gettting all the plugin data
    // ----------------------------------------------   

    $phone_display_checkbox = intval($mobile_line_data_array['phone_display_checkbox']);
    $phone_button_href = esc_attr($mobile_line_data_array['phone_button_href']);
    $phone_button_text = esc_attr($mobile_line_data_array['phone_button_text']);
    $phone_background_color = esc_attr($mobile_line_data_array['phone_background_color']);
    $phone_button_width = esc_attr($mobile_line_data_array['phone_button_width']);
    $phone_button_position = intval($mobile_line_data_array['phone_button_position']);

    $email_display_checkbox = intval($mobile_line_data_array['email_display_checkbox']);
    $email_button_href = esc_attr($mobile_line_data_array['email_button_href']);
    $custom_contact_page_link = intval($mobile_line_data_array['custom_contact_page_link']);
    $email_button_text = esc_attr($mobile_line_data_array['email_button_text']);
    $email_background_color = esc_attr($mobile_line_data_array['email_background_color']);
    $email_button_width = esc_attr($mobile_line_data_array['email_button_width']);
    $email_button_position = intval($mobile_line_data_array['email_button_position']);


    $whatsapp_display_checkbox = intval($mobile_line_data_array['whatsapp_display_checkbox']);
    $whatsapp_button_href = esc_attr($mobile_line_data_array['whatsapp_button_href']);
    $whatsapp_button_text = esc_attr($mobile_line_data_array['whatsapp_button_text']);
    $whatsapp_url_message = esc_attr($mobile_line_data_array['whatsapp_url_message']);
    $whatsapp_background_color = esc_attr($mobile_line_data_array['whatsapp_background_color']);
    $whatsapp_button_width = esc_attr($mobile_line_data_array['whatsapp_button_width']);
    $whatsapp_button_position = intval($mobile_line_data_array['whatsapp_button_position']);


    $chat_display_checkbox = intval($mobile_line_data_array['chat_display_checkbox']);
    $chat_button_href = esc_attr($mobile_line_data_array['chat_button_href']);
    $chat_button_text = esc_attr($mobile_line_data_array['chat_button_text']);
    $chat_background_color = esc_attr($mobile_line_data_array['chat_background_color']);
    $chat_button_width = esc_attr($mobile_line_data_array['chat_button_width']);
    $chat_button_position = intval($mobile_line_data_array['chat_button_position']);


    $skype_display_checkbox = intval($mobile_line_data_array['skype_display_checkbox']);
    $skype_button_href = esc_attr($mobile_line_data_array['skype_button_href']);
    $skype_button_text = esc_attr($mobile_line_data_array['skype_button_text']);
    $skype_background_color = esc_attr($mobile_line_data_array['skype_background_color']);
    $skype_button_width = esc_attr($mobile_line_data_array['skype_button_width']);
    $skype_button_position = intval($mobile_line_data_array['skype_button_position']);

    $mobile_width = $mobile_line_data_array['mobile_width'];

    // ----------------------------------------------
    // dealing with exclude or include pages
    // ----------------------------------------------

    $mobile_line_exclude_option = esc_attr($mobile_line_data_array['exclude_option']);
    $exclude_ids = esc_attr($mobile_line_data_array['exclude_ids']);

    // creating an array with all the ids
    $mobile_line_exclude_ids_array = [];
    $exclude_ids_explode = explode( ',', $exclude_ids);
    
    foreach($exclude_ids_explode as $exclude_id) {

        $exclude_id = intval( trim($exclude_id) );

        if( !empty($exclude_id) ) {
            $mobile_line_exclude_ids_array[] = $exclude_id;
        } // if( !empty($exclude_id) ) {

    } // foreach($exclude_ids_explode as $exclude_id) {

        // ----------------------------------------------
        // create button css code
        // ----------------------------------------------

        $mobile_contact_code = "";

        $mobile_contact_code .= "<div class='yydev-mobile-line'>";

            $phone_output_code = '';

            if( $phone_display_checkbox == 1 ) {
                $phone_output_code .= "<a class='phone-button activeButtons' data-activevalue='#mobile-fixed' href='tel:" . $phone_button_href . "'>";
                        $phone_output_code .= "<span class='icon'></span>";

                        if( !empty($phone_button_text) ) {
                            $phone_output_code .= "<span class='button-text'>" . $phone_button_text . "</span>";
                        } // if( !empty($phone_button_text) ) {

                $phone_output_code .= "</a>";
            } // if( $phone_display_checkbox == 1 ) {
            
            $email_output_code = '';

            // getting email url to the page
            $email_button_href_output = 'mailto:' . $email_button_href; 

            // incase of custom email link
            if( !empty($custom_contact_page_link) ) {
                $email_button_href_output = $email_button_href; 
            } // if( !empty($custom_contact_page_link) ) {

            if( $email_display_checkbox == 1 ) {
                $email_output_code .= "<a class='email-button activeButtons' data-activevalue='#mobile-fixed' href='" . $email_button_href_output . "'>";
                        $email_output_code .= "<span class='icon'></span>";

                        if( !empty($email_button_text) ) {
                            $email_output_code .= "<span class='button-text'>" . $email_button_text . "</span>";
                        } // if( !empty($email_button_text) ) {

                $email_output_code .= "</a>";
            } // if( $email_display_checkbox == 1 ) {

            $whatsapp_output_code = '';

            if( $whatsapp_display_checkbox == 1 ) {

                $whatsapp_btn_url = "https://api.whatsapp.com/send?phone=" . $whatsapp_button_href;
                
                if( !empty($whatsapp_url_message) ) {
                    $whatsapp_btn_url = $whatsapp_btn_url . "&text=" . $whatsapp_url_message;
                } // if( !empty($whatsapp_url_message) ) {


                $whatsapp_output_code .= "<a class='whatsapp-button activeButtons' data-activevalue='#mobile-fixed' href='" . esc_url($whatsapp_btn_url) . "'>";
                        $whatsapp_output_code .= "<span class='icon'></span>";

                        if( !empty($whatsapp_button_text) ) {
                            $whatsapp_output_code .= "<span class='button-text'>" . $whatsapp_button_text . "</span>";
                        } // if( !empty($whatsapp_button_text) ) {

                $whatsapp_output_code .= "</a>";
            } // if( $whatsapp_display_checkbox == 1 ) {

            $chat_output_code = '';

            if( $chat_display_checkbox == 1 ) {
                $chat_output_code .= "<a class='chat-button activeButtons' data-activevalue='#mobile-fixed' href='" . $chat_button_href . "'>";
                        $chat_output_code .= "<span class='icon'></span>";

                        if( !empty($chat_button_text) ) {
                            $chat_output_code .= "<span class='button-text'>" . $chat_button_text . "</span>";
                        } // if( !empty($chat_button_text) ) {

                $chat_output_code .= "</a>";
            } // if( $chat_display_checkbox == 1 ) {

            $skype_output_code = '';

            if( $skype_display_checkbox == 1 ) {
                $skype_output_code .= "<a class='skype-button activeButtons' data-activevalue='#mobile-fixed' href='skype:" . $skype_button_href . "'>";
                        $skype_output_code .= "<span class='icon'></span>";

                        if( !empty($skype_button_text) ) {
                            $skype_output_code .= "<span class='button-text'>" . $skype_button_text . "</span>";
                        } // if( !empty($skype_button_text) ) {

                $skype_output_code .= "</a>";
            } // if( $skype_display_checkbox == 1 ) {

        $mobile_line_array = array( 
            $phone_button_position . 'phone' => $phone_output_code,
            $email_button_position . 'email' => $email_output_code,
            $whatsapp_button_position . 'whatsapp' => $whatsapp_output_code,
            $chat_button_position . 'chat' => $chat_output_code,
            $skype_button_position . 'skype' => $skype_output_code
        );

        ksort($mobile_line_array);

        foreach($mobile_line_array as $mobile_line) {
            $mobile_contact_code .= $mobile_line;
        } // foreach($mobile_line_array as $mobile_line) {

        $mobile_contact_code .= "</div><!--yydev-mobile-line-->";
        $mobile_contact_code .= "<div class='yydev-mobile-line-space'></div>";
        

        // ==============================================
        // create button css code
        // ==============================================

        $mobile_line_style = '';

        // dealing with button style
        $mobile_line_style .= '<style>';

            $mobile_line_style .= '.yydev-mobile-line, .yydev-mobile-line-space {';
                    $mobile_line_style .= 'display:none;';
            $mobile_line_style .= '}';

           // dealing with button mobile style
           $mobile_line_style .= '@media only screen and (max-width: ' . $mobile_width . 'px) {';

            $mobile_line_style .= '.yydev-mobile-line-space {';
                    $mobile_line_style .= 'display: block;';
                    $mobile_line_style .= 'height: 49px;';
            $mobile_line_style .= '}';

            $mobile_line_style .= '.yydev-mobile-line {';
                $mobile_line_style .= 'background: #008cd6;';
                $mobile_line_style .= 'text-align: center;';
                $mobile_line_style .= 'position: fixed;';
                $mobile_line_style .= 'left: 0px;';
                $mobile_line_style .= 'right: 0px;';
                $mobile_line_style .= 'bottom: 0px;';
                $mobile_line_style .= 'z-index: 9999999999999999999;';
                $mobile_line_style .= 'border-top: 3px solid #fff;';
                $mobile_line_style .= 'display: table;';
                $mobile_line_style .= 'width: 100%;';
                $mobile_line_style .= 'height: 47px;';
            $mobile_line_style .= '}';

            $mobile_line_style .= '.yydev-mobile-line a {';
                $mobile_line_style .= 'font-size: 19px;';
                $mobile_line_style .= 'line-height: 19px;';
                $mobile_line_style .= 'padding: 2px 0px 2px 0px;';
                $mobile_line_style .= 'font-weight: bold;';
                $mobile_line_style .= 'color: #fff !important;';
                $mobile_line_style .= 'font-family: Arial, "Helvetica Neue", Helvetica, sans-serif;';
                $mobile_line_style .= 'display: table-cell;';
                $mobile_line_style .= 'vertical-align: middle;';
            $mobile_line_style .= '}';

            $mobile_line_style .= '.yydev-mobile-line a {';
                $mobile_line_style .= 'text-decoration: none;';
                $mobile_line_style .= 'color: #fff;;';
            $mobile_line_style .= '}';

            $mobile_line_style .= '.yydev-mobile-line a span.icon {';
                $mobile_line_style .= 'background: url(' . plugin_dir_url(dirname(__FILE__)) . 'images/mobile-line.png' . ') no-repeat;';
                $mobile_line_style .= 'background-position: 9px 8px;';
                $mobile_line_style .= 'width: 50px;';
                $mobile_line_style .= 'height: 47px;';
                $mobile_line_style .= 'display: inline-block;';
                $mobile_line_style .= 'margin: 0px 5px 0px 5px;';
            $mobile_line_style .= '}';

            $mobile_line_style .= '.yydev-mobile-line a span.button-text {';
                $mobile_line_style .= 'display: inline-block;';
                $mobile_line_style .= 'line-height: 0px;';
                $mobile_line_style .= 'margin: -34px -2px 0px 0px;';
                $mobile_line_style .= 'padding: 0px;';
                $mobile_line_style .= 'vertical-align: middle;';
            $mobile_line_style .= '}';

            $mobile_line_style .= '.yydev-mobile-line-rtl a span.button-text {';
                $mobile_line_style .= 'margin: -34px 0px 0px 3px;';
            $mobile_line_style .= '}';

            if( $phone_display_checkbox == 1 ) {
                $mobile_line_style .= '.yydev-mobile-line a.phone-button {';
                    $mobile_line_style .= 'background: ' . $phone_background_color . ';';
                    $mobile_line_style .= 'width: ' . $phone_button_width . ';';
                $mobile_line_style .= '}';
                
                $mobile_line_style .= '.yydev-mobile-line a.phone-button span.icon {';
                    $mobile_line_style .= 'width: 40px;';
                    $mobile_line_style .= 'background-position: 3px 7px;';
                $mobile_line_style .= '}';

                $mobile_line_style .= '.yydev-mobile-line-rtl a.phone-button span.icon {';
                    $mobile_line_style .= 'background-position: -370px 7px;';
                $mobile_line_style .= '}';
            } // if( $phone_display_checkbox == 1 ) {


            if( $email_display_checkbox == 1 ) {
                $mobile_line_style .= '.yydev-mobile-line a.email-button {';
                    $mobile_line_style .= 'background: ' . $email_background_color . ';';
                    $mobile_line_style .= 'width: ' . $email_button_width . ';';
                $mobile_line_style .= '}';
                
                $mobile_line_style .= '.yydev-mobile-line a.email-button span.icon {';
                    $mobile_line_style .= 'width: 50px;';
                    $mobile_line_style .= 'background-position: -63px 7px;';
                $mobile_line_style .= '}';
            } // if( $email_display_checkbox == 1 ) {


            if( $whatsapp_display_checkbox == 1 ) {
                $mobile_line_style .= '.yydev-mobile-line a.whatsapp-button {';
                    $mobile_line_style .= 'background: ' . $whatsapp_background_color . ';';
                    $mobile_line_style .= 'width: ' . $whatsapp_button_width . ';';
                $mobile_line_style .= '}';
                
                $mobile_line_style .= '.yydev-mobile-line a.whatsapp-button span.icon {';
                    $mobile_line_style .= 'width: 45px;';
                    $mobile_line_style .= 'background-position: -148px 6px;';
                $mobile_line_style .= '}';
            } // if( $whatsapp_display_checkbox == 1 ) {


            if( $chat_display_checkbox == 1 ) {
                $mobile_line_style .= '.yydev-mobile-line a.chat-button {';
                    $mobile_line_style .= 'background: ' . $chat_background_color . ';';
                    $mobile_line_style .= 'width: ' . $chat_button_width . ';';
                $mobile_line_style .= '}';
                
                $mobile_line_style .= '.yydev-mobile-line a.chat-button span.icon {';
                    $mobile_line_style .= 'width: 46px;';
                    $mobile_line_style .= 'background-position: -226px 7px;';
                $mobile_line_style .= '}';
            } // if( $chat_display_checkbox == 1 ) {


            if( $skype_display_checkbox == 1 ) {
                $mobile_line_style .= '.yydev-mobile-line a.skype-button {';
                    $mobile_line_style .= 'background: ' . $skype_background_color . ';';
                    $mobile_line_style .= 'width: ' . $skype_button_width . ';';
                $mobile_line_style .= '}';
                
                $mobile_line_style .= '.yydev-mobile-line a.skype-button span.icon {';
                    $mobile_line_style .= 'width: 39px;';
                    $mobile_line_style .= 'background-position: -306px 7px;';
                $mobile_line_style .= '}';
            } // if( $skype_display_checkbox == 1 ) {

           $mobile_line_style .= '}';

       $mobile_line_style .= '</style>';


        // ==============================================
        // output the code into the website pages
        // ==============================================

        function yydev_mobile_line_output_content($mobile_line_style, $mobile_contact_code, $mobile_line_exclude_option, $mobile_line_exclude_ids_array) {

                // ----------------------------------------------
                // checking if we should exclude some pages 
                // ---------------------------------------------- 

                $page_id = yydev_mobile_line_find_page_id();
                $mobile_line_exclude_option = $mobile_line_exclude_option; // checking if we should exclude or include pages
                $exclude_ids = $mobile_line_exclude_ids_array; // pages we should display on or ignore
                $output_menu_now = 1;

                // incase we exclude pages
                if( $mobile_line_exclude_option === 'exclude' ) {

                    // incase we choose to exclude an id
                    if( in_array( $page_id, $exclude_ids) ) {
                        $output_menu_now = 0;
                    } // if( in_array( $page_id, $exclude_ids) ) {

                } // if( $mobile_line_exclude_option === 'exclude' ) {

                // incase we exclude pages
                if( $mobile_line_exclude_option === 'include' ) {

                    // incase we choose to include only on some pages
                    if( !in_array( $page_id, $exclude_ids) ) {
                        $output_menu_now = 0;
                    } // if( !in_array( $page_id, $exclude_ids) ) {

                } // if( $mobile_line_exclude_option === 'exclude' ) {

                // ----------------------------------------------
                // this option allow us to not show the mobile line on some pages with filter
                // ---------------------------------------------- 

                $output_contact = apply_filters( 'yydev_mobile_line_return_output', true, $page_id);

                if($output_contact && $output_menu_now) {

                    add_action( 'wp_head', function() use ($mobile_line_style){

                        // echo css code to page
                        echo $mobile_line_style;

                    }); // add_action( 'wp_footer', function() use ($yydev_accessibility_html){

                    // ----------------------------------------------
                    // add the button html to footer
                    // ---------------------------------------------- 

                    add_action( 'wp_footer', function() use ($mobile_contact_code){

                        // echo html button
                        if( is_rtl() ) { echo "<div class='yydev-mobile-line-rtl'>"; }
                            echo $mobile_contact_code; 
                        if( is_rtl() ) { echo "</div><!--yydev-mobile-line-rtl-->"; }

                    }, 99999999); // add_action( 'wp_footer', function() use ($mobile_contact_code){

                } // if($output_contact && $output_menu_now) {

        }  // function yydev_mobile_line_output_content($mobile_line_style, $mobile_contact_code) {

        // ========================================================================================================
        // add body class to array for exclude pages
        // ========================================================================================================

        add_filter( 'body_class', function($classes) use($mobile_line_exclude_ids_array, $mobile_line_exclude_option) {

            $page_id = yydev_mobile_line_find_page_id();

            // ----------------------------------------------
            // allow to overwrite the exclude mode and pages ids from the theme files with filter
            // ----------------------------------------------

            $mobile_line_exclude_ids_array = apply_filters( 'yydev_mobile_line_exclude_ids_array',  $mobile_line_exclude_ids_array);
            $mobile_line_exclude_option = apply_filters( 'yydev_mobile_line_exclude_option',  $mobile_line_exclude_option);

            // incase we exclude pages
            if( $mobile_line_exclude_option === 'exclude' ) { 
                if( in_array( $page_id, $mobile_line_exclude_ids_array) ) { $classes[] = 'yydev-mobile-line-excluded'; } 
            } // if( $mobile_line_exclude_option === 'exclude' ) {

            // incase we exclude pages
            if( $mobile_line_exclude_option === 'include' ) { 
                if( !in_array( $page_id, $mobile_line_exclude_ids_array) ) { $classes[] = 'yydev-mobile-line-excluded'; }
            } // if( $mobile_line_exclude_option === 'exclude' ) {

            return $classes;
            
        }); // add_filter( 'body_class', function($classes) use($mobile_line_exclude_ids_array) {

        // ========================================================================================================
        // adding action to wp to be able to get the page id
        // ========================================================================================================

         add_action('wp', function() use($mobile_line_style, $mobile_contact_code, $mobile_line_exclude_option, $mobile_line_exclude_ids_array) {

                // ----------------------------------------------
                // allow to overwrite the exclude mode and pages ids from the theme files with filter
                // ----------------------------------------------

                $mobile_line_exclude_ids_array = apply_filters( 'yydev_mobile_line_exclude_ids_array',  $mobile_line_exclude_ids_array);
                $mobile_line_exclude_option = apply_filters( 'yydev_mobile_line_exclude_option',  $mobile_line_exclude_option);

                // ----------------------------------------------
                // output buttons into the page
                // ----------------------------------------------

                yydev_mobile_line_output_content($mobile_line_style, $mobile_contact_code, $mobile_line_exclude_option, $mobile_line_exclude_ids_array);
         });
