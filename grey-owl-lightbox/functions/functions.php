<?php
add_action( 'wp_footer', 'grey_owl_lightbox_html_code' );
function grey_owl_lightbox_html_code(){
    require_once GOL_MAIN_DIR . 'inc/lightbox.php';
}
/**************************************************
*  grey owl register script to head or footer
**************************************************/
function grey_owl_register_script_head_or_footer(){
    $param = true;
    return apply_filters( 'enqueue_script_head_or_footer', $param );
}
/*************************************************
* add css styles and javascript to dashboard
*************************************************/
add_action( 'admin_enqueue_scripts', 'grey_owl_lightbox_admin_scripts' );
function grey_owl_lightbox_admin_scripts() {
    global $pagenow;
    /* style css */
    wp_register_style('gol-font-style', GOL_MAIN_DIR_URL . 'css/grey-owl-icon-font-style.css', array(), '1.4' );
    wp_enqueue_style('gol-font-style');
    if( $pagenow == 'tools.php' && isset( $_GET['page'] ) && $_GET['page'] == 'grey-owl-lightbox' ){
        /*  styles  */
        wp_register_style( 'gol-admin-style', GOL_MAIN_DIR_URL . '/css/gol-admin-style.css', false, '1.0.0');
        wp_enqueue_style( 'gol-admin-style' );
        /*  javascriptS  */
        //wp_enqueue_media();
        wp_enqueue_script( 'jquery' );
        wp_enqueue_script( 'wp-color-picker' );
        // wp_enqueue_script( 'main-scripts', get_template_directory_uri() . '/admin/js/main-scripts.js' );
        wp_enqueue_script( 'gol-scripts', GOL_MAIN_DIR_URL . '/js/gol-admin-scripts.js', array( 'wp-color-picker' ), false, true  );
    }
    if( gol_is_settings_page() ){
        require_once GOL_MAIN_DIR . 'functions/enqueue.php';
        require_once GOL_MAIN_DIR . 'functions/enqueue-data.php';
    }
}
/*************************************************
* add css styles and javascript to website
*************************************************/
add_action( 'wp_enqueue_scripts', 'grey_owl_lightbox_enqueue_scripts' );
function grey_owl_lightbox_enqueue_scripts(){
    require_once GOL_MAIN_DIR . 'functions/enqueue.php';
    require_once GOL_MAIN_DIR . 'functions/enqueue-data.php';
}
gol_set_callback( 'gery_owl_get_oembed_data_json', function( $params ){
    $result = array(
        'html'        => '',
        'resize_el_w' => '',
        'resize_el_h' => '',
        'parameters'  => array(),
        'error'       => true,
        'data_oembed' => (object) array(),
        'message'     => ''
    );
    if( isset( $params['embed_url'] ) && $params['embed_url'] ){
        $oembed = _wp_oembed_get_object();
        $args = array();
        if( isset( $params['max_width'] ) && $params['max_width'] ){
            $args['width'] = $params['max_width'];
        }
        $oembed_obj = $oembed->get_data( $params['embed_url'], $args );
        if( $oembed_obj ){
            $result['data_oembed'] = $oembed_obj;
            $result['html'] = $oembed_obj->html;
            $result['resize_el_w'] = $oembed_obj->width;
            $result['resize_el_h'] = $oembed_obj->height;
            $result['error'] = false;
        };
    }
    wp_send_json( $result );
});
function gol_get_page_links_array(){
    return array(
        'settings' => array(
            'name'         => esc_html__('settings', 'greyowl'),
            'url'          => GOL_PAGE_OPTIONS . '&part=settings',
            'plugins_page' => true,
        ),
        'documentation' => array(
            'name'         => esc_html__('documentation', 'greyowl'),
            'url'          => GOL_PAGE_OPTIONS . '&part=documentation',
            'plugins_page' => true,
        ),
        'shortcode' => array(
            'name'         => esc_html__('shortcode', 'greyowl'),
            'url'          => GOL_PAGE_OPTIONS . '&part=shortcode',
            'plugins_page' => false,
        ),
    );
}
function gol_is_settings_page(){
    global $pagenow;
    $is_settings_page = false;
    if( $pagenow == 'tools.php' && isset( $_GET['page'] ) && $_GET['page'] == 'grey-owl-lightbox' ){
        if( !isset( $_GET['part'] ) || ( isset( $_GET['part'] ) && $_GET['part'] == 'settings' ) ){
            $is_settings_page = true;
        }
    }
    return $is_settings_page;
}
function gol_array_value_esc_html( $data_array = array() ){
    $clean_array = array();
    if( $data_array ){
        foreach ( $data_array as $key => $value ) {
            if( is_string( $value ) ){
                $clean_array[ sanitize_key( $key ) ] = esc_attr( $value );
            } elseif ( is_array( $value ) ) {
                $clean_array[ sanitize_key( $key ) ] = gol_array_value_esc_html( $value );
            }
        }
    }
    return $clean_array;
}
/*************************************************
* register callback function
*************************************************/
function gol_set_callback( $fn_key, $callback ){
    GreyOwllightboxOBJ::set_ajax_callback( $fn_key, $callback );
}
/*************************************************
* register callback function
*************************************************/
function gol_callback_parameters( $callback_params = array() ){
    $params = $callback_params;
    GreyOwllightboxOBJ::set_ajax_callback_parameters( $params );
}
/**************************************************
*  grey owl shortcode button
**************************************************/
add_shortcode( 'gol_button', 'grey_owl_shortcode_button' );
function grey_owl_shortcode_button( $arg ){
    $video_url = ( isset( $arg['video_url'] ) ) ? $arg['video_url'] : '';
    if( $video_url ){
        if( isset( $arg['type'] ) && $arg['type'] == 'link' ){
            $tag_start = '<a href ="#"';
            $tag_end   = '</a>';
        } else {
            $tag_start = '<button';
            $tag_end   = '</button>';
        }
        $button_class = ( isset( $arg['class'] ) ) ? ' class="'.$arg['class'].'"' : '';
        $video_width  = ( isset( $arg['video_width'] ) ) ? $arg['video_width'] : '960';
        $button_title = ( isset( $arg['button_title'] ) ) ? ' title ="'.$arg['button_title'].'" aria-label="'.$arg['button_title'].'"' : '';
        $button_text  = ( isset( $arg['button_text'] ) ) ? $arg['button_text'] : '';
        $link = $tag_start.$button_class.' go-lightbox data-go-video-url="'.$video_url.'" data-go-video-width="'.$video_width.'"'.$button_title.'>'.$button_text.$tag_end;
        return  $link;
    }
}
