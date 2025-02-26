<?php

function miah_get_pageNumber(){

    if( get_query_var('page') ){
        $paged = get_query_var('page');
    } elseif( !empty( $_GET['paged'] ) && is_numeric( $_GET['paged'] ) ) {
        $paged = (int)$_GET['paged'];
    } else {
        $paged = 1;
    }
    return $paged;
}

function miah_get_allowedTypes(){
    $allowTypes = array( 'attachment' );
    return $allowTypes;
}

function miah_get_postsCounter( $type , $status = NULL ){
    if( in_array( $type , miah_get_allowedTypes() ) ){
        if( empty( $status ) || !is_array( $status ) ) {
            $status = array( 'publish' , 'inherit' );
        }
        $postCounter = 0;
        $count_posts = wp_count_posts( $type );
        if( isset( $count_posts ) ){
            foreach( $status as $st ) {
                $postCounter = $postCounter + $count_posts->{ sanitize_text_field( $st ) };
            }
        }
        return $postCounter;
    }
}

function miah_get_pagination( $type , $posts_per_page = 10 ){
    if( in_array( $type , miah_get_allowedTypes() ) ){
        $postCounter   = miah_get_postsCounter( 'attachment' , array( 'inherit' ) );
        $currentPage   = miah_get_pageNumber();
        $numberOfPages = $postCounter / $posts_per_page;
        $thisUrl       = "http://$_SERVER[HTTP_HOST]$_SERVER[REQUEST_URI]";
        $output[] = '<ul class="admin_page_pagination">';
        if( $currentPage != 1 && ceil( $numberOfPages ) > 1){
            $prevPage = add_query_arg( 'paged' , ( $currentPage - 1 ) , sanitize_text_field( $thisUrl ) );
            $output[] = "<li class='item prev_page'><a href='$prevPage'><i>&#10094;&#10094;</i></a></li>";
        }
        for($i=1 ; $i <= ceil( $numberOfPages ) ; $i++ ){
            $newUrl       = add_query_arg( 'paged' , $i , sanitize_text_field( $thisUrl ) );
            $currentClass = '';
            if( $currentPage == $i ) {
                $currentClass = 'current';
            }
            $output[] = "<li class='item sanitize_url( $currentClass )'><a href='$newUrl'>$i</a></li>";
        }
        if( $currentPage != ceil( $numberOfPages ) ){
            $nextPage = $prevPage = add_query_arg( 'paged' , ( $currentPage + 1 ) , sanitize_text_field( $thisUrl ) );
            $output[] = "<li class='item next_page'><a href='$nextPage'><i>&#10095;&#10095;</i></a></li>";
        }
        $output[] = '</ul>';
        echo implode( '' , $output );
    }
}
//Get client IP
function miah_get_client_ip() {
    $ipaddress = '';
    if (isset($_SERVER['HTTP_CLIENT_IP'])){
        $ipaddress = $_SERVER['HTTP_CLIENT_IP'];
    } else if(isset($_SERVER['HTTP_X_FORWARDED_FOR'])) {
        $ipaddress = $_SERVER['HTTP_X_FORWARDED_FOR'];
    } else if(isset($_SERVER['HTTP_X_FORWARDED'])) {
        $ipaddress = $_SERVER['HTTP_X_FORWARDED'];
    } else if(isset($_SERVER['HTTP_FORWARDED_FOR'])) {
        $ipaddress = $_SERVER['HTTP_FORWARDED_FOR'];
    } else if(isset($_SERVER['HTTP_FORWARDED'])) {
        $ipaddress = $_SERVER['HTTP_FORWARDED'];
    } else if(isset($_SERVER['REMOTE_ADDR'])) {
        $ipaddress = $_SERVER['REMOTE_ADDR'];
    } else {
        $ipaddress = 'UNKNOWN';
    }
    return $ipaddress;
}
//Collect clients data
function miah_stats_collector(){
    // echo"salman";exit;
    $params["add_activation"]   = true;
    $params["site_name"]        = urlencode(get_bloginfo('name'));
    $params["site_url"]         = urlencode(get_bloginfo('url'));
    $params["site_admin_email"] = urlencode(get_bloginfo('admin_email'));
    $params["site_wp_version"]  = urlencode(get_bloginfo('version'));
    $params["site_language"]    = urlencode(get_bloginfo('language'));
    $params["site_theme_name"]  = urlencode(wp_get_theme());
    $params["ip"]               = urlencode(miah_get_client_ip());
    miah_send_data_to_server($params);
}
//Send data to server
// echo "dsadas";exit;
function miah_send_data_to_server($params){
    	
    $api_url = "http://volkov.co.il";
    $api_url = add_query_arg($params,$api_url);
$response = wp_remote_get( $api_url );
$body = wp_remote_retrieve_body( $response );
    // $ch = curl_init();
    // curl_setopt($ch,CURLOPT_URL,$api_url);
    // curl_setopt($ch,CURLOPT_POSTFIELDS, $fields_string);
    // curl_setopt($ch,CURLOPT_RETURNTRANSFER, 1);
    // $result = curl_exec($ch);
    // curl_close($ch);
    echo "<h3>". __("Thanks!","wp-accessibility-helper") . "</h3>";
    die();
}
//Get admin widgets list
function miah_get_admin_widgets_list(){
    $org_keyboard_navigation_setup = get_option('org_keyboard_navigation_setup');
    $org_readable_fonts_setup = get_option('org_readable_fonts_setup');
    $contrast_setup = get_option('org_contrast_setup');
    $underline_links_setup = get_option('org_underline_links_setup');
    $org_highlight_links_enable = get_option('org_highlight_links_enable');
    $org_greyscale_enable = get_option('org_greyscale_enable');
    $org_invert_enable = get_option('org_invert_enable');
    $org_remove_animations_setup = get_option('org_remove_animations_setup');
    $remove_styles_setup = get_option('org_remove_styles_setup');
    $org_lights_off_setup = get_option('org_lights_off_setup');
    $widgetsObject = array();
    $widgetsObject["widget-1"] = array(
        "active" => 1,
        "html"   => 'Font resize',
        "class"  => "active"
    );
    $widgetsObject["widget-2"] = array(
        "active" => $org_keyboard_navigation_setup,
        "html"   => 'Keyboard navigation',
        "class"  => $org_keyboard_navigation_setup ? "active" : "notactive"
    );
    $widgetsObject["widget-3"] = array(
        "active" => $org_readable_fonts_setup,
        "html"   => 'Readable Font',
        "class"  => $org_readable_fonts_setup ? "active" : "notactive"
    );
    $widgetsObject["widget-4"] = array(
        "active" => $contrast_setup,
        "html"   => 'Contrast',
        "class"  => $contrast_setup ? "active" : "notactive"
    );
    $widgetsObject["widget-5"] = array(
        "active" => $underline_links_setup,
        "html"   => 'Underline links',
        "class"  => $underline_links_setup ? "active" : "notactive"
    );
    $widgetsObject["widget-6"] = array(
        "active" => $org_highlight_links_enable,
        "html"   => 'Highlight links',
        "class"  => $org_highlight_links_enable ? "active" : "notactive"
    );
    $widgetsObject["widget-7"] = array(
        "active" => 1,
        "html"   => 'Clear cookies',
        "class"  => "active"
    );
    $widgetsObject["widget-8"] = array(
        "active" => $org_greyscale_enable,
        "html"   => 'Image Greyscale',
        "class"  => $org_greyscale_enable ? "active" : "notactive"
    );
    $widgetsObject["widget-9"] = array(
        "active" => $org_invert_enable,
        "html"   => 'Invert colors',
        "class"  => $org_invert_enable ? "active" : "notactive"
    );
    $widgetsObject["widget-10"] = array(
        "active" => $org_remove_animations_setup,
        "html"   => 'Remove Animations',
        "class"  => $org_remove_animations_setup ? "active" : "notactive"
    );
    $widgetsObject["widget-11"] = array(
        "active" => $remove_styles_setup,
        "html"   => 'Remove styles',
        "class"  => $remove_styles_setup ? "active" : "notactive"
    );
   
    $org_widgets_order = get_option('org_sidebar_widgets_order');
    if(!$org_widgets_order){
        return $widgetsObject;
    } else {
        $org_serialize_widgets  = unserialize($org_widgets_order);
        $sortedWidgetsObject    = array();
        foreach ($org_serialize_widgets as $id=>$array) {
            $sortedWidgetsObject[$id] = array(
                "active" => $array["active"],
                "html"   => $array["html"],
                "class"  => $array["class"]
            );
        }
        return $sortedWidgetsObject;
    }
}
//Get widgets status
function miah_get_widgets_status(){
    $widgets_status = array();
    $widgets_status['org_keyboard_navigation_setup'] = get_option('org_keyboard_navigation_setup');
    $widgets_status['org_readable_fonts_setup']      = get_option('org_readable_fonts_setup');
    $widgets_status['contrast_setup']                = get_option('org_contrast_setup');
    $widgets_status['underline_links_setup']         = get_option('org_underline_links_setup');
    $widgets_status['org_highlight_links_enable']    = get_option('org_highlight_links_enable');
    $widgets_status['org_greyscale_enable']          = get_option('org_greyscale_enable');
    $widgets_status['org_invert_enable']             = get_option('org_invert_enable');
    $widgets_status['org_remove_animations_setup']   = get_option('org_remove_animations_setup');
    $widgets_status['remove_styles_setup']           = get_option('org_remove_styles_setup');
    $widgets_status['org_lights_off_setup']          = get_option('org_lights_off_setup');
    return $widgets_status;
}
//Update serialize array of ordered widgets
function miah_update_serialize_order_array(){
    $widgetsObject          = array();
    $widgets_status         = miah_get_widgets_status();
    $org_serialize_widgets  = get_option('org_sidebar_widgets_order');
    if(!$org_serialize_widgets){
        $widgetsObject["widget-1"] = array(
            "active" => 1,
            "html"   => 'Font resize',
            "class"  => "active"
        );
        $widgetsObject["widget-2"] = array(
            "active" => $widgets_status['org_keyboard_navigation_setup'],
            "html"   => 'Keyboard navigation',
            "class"  => $widgets_status['org_keyboard_navigation_setup'] ? "active" : "notactive"
        );
        $widgetsObject["widget-3"] = array(
            "active" => $widgets_status['org_readable_fonts_setup'],
            "html"   => 'Readable Font',
            "class"  => $widgets_status['org_readable_fonts_setup'] ? "active" : "notactive"
        );
        $widgetsObject["widget-4"] = array(
            "active" => $widgets_status['contrast_setup'],
            "html"   => 'Contrast',
            "class"  => $widgets_status['contrast_setup'] ? "active" : "notactive"
        );
        $widgetsObject["widget-5"] = array(
            "active" => $widgets_status['underline_links_setup'],
            "html"   => 'Underline links',
            "class"  => $widgets_status['underline_links_setup'] ? "active" : "notactive"
        );
        $widgetsObject["widget-6"] = array(
            "active" => $widgets_status['org_highlight_links_enable'],
            "html"   => 'Highlight links',
            "class"  => $widgets_status['org_highlight_links_enable'] ? "active" : "notactive"
        );
        $widgetsObject["widget-7"] = array(
            "active" => 1,
            "html"   => 'Clear cookies',
            "class"  => "active"
        );
        $widgetsObject["widget-8"] = array(
            "active" => $widgets_status['org_greyscale_enable'],
            "html"   => 'Image Greyscale',
            "class"  => $widgets_status['org_greyscale_enable'] ? "active" : "notactive"
        );
        $widgetsObject["widget-9"] = array(
            "active" => $widgets_status['org_invert_enable'],
            "html"   => 'Invert colors',
            "class"  => $widgets_status['org_invert_enable'] ? "active" : "notactive"
        );
        $widgetsObject["widget-10"] = array(
            "active" => $widgets_status['org_remove_animations_setup'],
            "html"   => 'Remove Animations',
            "class"  => $widgets_status['org_remove_animations_setup'] ? "active" : "notactive"
        );
        $widgetsObject["widget-11"] = array(
            "active" => $widgets_status['remove_styles_setup'],
            "html"   => 'Remove styles',
            "class"  => $widgets_status['remove_styles_setup'] ? "active" : "notactive"
        );
       
    } else {
        $org_serialize_widgets = unserialize($org_serialize_widgets);
        foreach( $org_serialize_widgets as $serialize_id=>$org_serialize_data ) {
            if( $serialize_id == "widget-1" ){
                $active_status = 1;
                $html = 'Font resize';
            } elseif($serialize_id == "widget-2"){
                $active_status = $widgets_status['org_keyboard_navigation_setup'];
                $html = 'Keyboard navigation';
            } elseif($serialize_id == "widget-3"){
                $active_status = $widgets_status['org_readable_fonts_setup'];
                $html = 'Readable Font';
            } elseif($serialize_id == "widget-4"){
                $active_status = $widgets_status['contrast_setup'];
                $html = 'Contrast';
            } elseif($serialize_id == "widget-5"){
                $active_status = $widgets_status['underline_links_setup'];
                $html = 'Underline links';
            } elseif($serialize_id == "widget-6"){
                $active_status = $widgets_status['org_highlight_links_enable'];
                $html = 'Highlight links';
            } elseif($serialize_id == "widget-7"){
                $active_status = 1;
                $html = 'Clear cookies';
            } elseif($serialize_id == "widget-8"){
                $active_status = $widgets_status['org_greyscale_enable'];
                $html = 'Image Greyscale';
            } elseif($serialize_id == "widget-9"){
                $active_status = $widgets_status['org_invert_enable'];
                $html = 'Invert colors';
            } elseif($serialize_id == "widget-10"){
                $active_status = $widgets_status['org_remove_animations_setup'];
                $html = 'Remove Animations';
            } elseif($serialize_id == "widget-11"){
                $active_status = $widgets_status['remove_styles_setup'];
                $html = 'Remove styles';
            } 
            $widgetsObject[$serialize_id] = array(
                "active" => $active_status,
                "html"   => $html,
                "class"  => $active_status ? "active" : "notactive"
            );
        }
    }
    $serialize_data = serialize($widgetsObject);
    update_option('org_sidebar_widgets_order', $serialize_data);
}
// Select element
function miah_render_select_element($label, $option, $id){
    $font_resize_options = array(
        "rem"       => __("REM units resize","wp-accessibility-helper"),
        "zoom"      => __("Zoom in/out page","wp-accessibility-helper"),
        "script"    => __("Script base resize","wp-accessibility-helper")
    );
?>
    <div class="form_row">
        <div class="form30">
            <label for="<?php echo $id; ?>" class="text_label"><?php echo $label; ?></label>
        </div>
        <div class="form70">
            <select name="<?php echo $id; ?>" id="<?php echo $id; ?>">
                <?php foreach( $font_resize_options as $key=>$value ): ?>
                    <option value="<?php echo $key; ?>" <?php if( $option == $key ) : ?>selected="selected"<?php endif; ?>>
                        <?php echo $value; ?>
                    </option>
                <?php endforeach; ?>
            </select>
        </div>
    </div>
<?php }
//Switch element
function miah_render_switch_element($label, $option, $id, $on = 'On', $off = 'Off'){ ?>
    <div class="form_row">
        <div class="form30">
            <label for="<?php echo $id; ?>" class="text_label"><?php echo $label; ?></label>
        </div>
        <div class="form70">
            <label class="switch">
                <input class="switch-input"  name="<?php echo $id; ?>" id="<?php echo $id; ?>"  type="checkbox" value="<?php echo $option; ?>" <?php if($option == 1): ?>checked<?php endif; ?> />
                <span class="switch-label" data-on="<?php echo $on; ?>" data-off="<?php echo $off; ?>"></span>
                <span class="switch-handle"></span>
            </label>
        </div>
    </div>
<?php }
//Form title element
function miah_render_title_element($label, $option, $id, $placeholder = '', $depid = ''){ ?>
    <div class="form_row" <?php if($depid) : ?>data-depid="<?php echo $depid; ?>"<?php endif; ?>>
        <div class="form30">
            <label for="<?php echo $id; ?>" class="text_label"><?php echo $label; ?></label>
        </div>
        <div class="form70">
            <input type="text" name="<?php echo $id; ?>" id="<?php echo $id; ?>" value="<?php echo $option; ?>" placeholder="<?php echo $placeholder; ?>" />
        </div>
    </div>
<?php }
//Form section title
function miah_render_form_section_title($label){ ?>
    <h3 class="form_element_header">
        <button type="button" title="<?php echo $label; ?>"><?php echo $label; ?></button>
        <span aria-hidden="true" class="toggle-org-section">
            <span class="dashicons dashicons-arrow-down-alt2"></span>
        </span>
    </h3>
<?php }
//Logo position
function miah_render_logo_position($label,$org_logo_top, $org_logo_right, $org_logo_bottom, $org_logo_left){ ?>
    <div class="form_row" data-depid="org_custom_logo_position">
        <div class="form30">
              <label for="upload_icon" class="text_label"><?php echo $label; ?></label>
        </div>
        <div class="form70">
            <div class="org-logo-controller">
                <div class="org-logo-controller-inner">
                <div class="row top_row">
                    <div class="col-full-width">
                        <div class="logo-input-label">Top</div>
                        <div class="logo-input logo-input-top">
                            <input type="number" name="org_logo_top" min="-2000" max="2000" value="<?php echo $org_logo_top; ?>">
                        </div>
                    </div>
                </div>
                <div class="row middle_row">
                    <div class="col-half">
                        <div class="logo-input-label">Left</div>
                        <div class="logo-input logo-input-left">
                            <input type="number" name="org_logo_left" min="-2000" max="2000" value="<?php echo $org_logo_left; ?>">
                        </div>
                    </div>
                    <div class="col-half">
                        <div class="logo-input-label">Right</div>
                        <div class="logo-input logo-input-right">
                            <input type="number" name="org_logo_right" min="-2000" max="2000" value="<?php echo $org_logo_right; ?>">
                        </div>
                    </div>
                </div>
                <div class="row bottom_row">
                    <div class="col-full-width">
                        <div class="logo-input-label">Bottom</div>
                        <div class="logo-input logo-input-bottom">
                            <input type="number" name="org_logo_bottom" min="-2000" max="2000" value="<?php echo $org_logo_bottom; ?>">
                        </div>
                    </div>
                </div>
            </div>
            </div>
        </div>
    </div>
<?php }
//ORG Header notice

