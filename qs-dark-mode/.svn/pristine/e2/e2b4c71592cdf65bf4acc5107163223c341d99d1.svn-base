<?php 



if( !function_exists('qs_dark_mode_errors') ){
    
    function qs_dark_mode_errors(){
        static $wp_error; // Will hold global variable safely
        return isset($wp_error) ? $wp_error : ($wp_error = new WP_Error(null, null, null));
    }
}

if( !function_exists('qs_dark_mode_active') ){

    function qs_dark_mode_active(){

        $option = get_option('qsf_dark_mode_general_options');
       
        if($option && isset($option['enable_frontend_dark_mode']) && esc_html($option['enable_frontend_dark_mode']) == 'on'){
          
          return apply_filters( 'qs_dark_mode_active', true );  
        }
      
        return false;
    }
}

if( !function_exists( 'qs_dark_mode_default' ) ){

    function qs_dark_mode_default($default = false){

        $option = get_option( 'qsf_dark_mode_general_options' );
        
        if($option && isset($option['enable_frontend_fefault_dark_mode'])){

            if(esc_html($option['enable_frontend_fefault_dark_mode']) == 'on'){
                return true;  
            }

            return false;  
        }

        return $default;

    }
}

if( !function_exists( 'qs_dark_mode_dashboard_active' ) ){

    function qs_dark_mode_dashboard_active(){

        $option = get_option('qsf_dark_mode_general_options');
       
        if($option && isset($option['enable_backend_dark_mode']) && esc_html($option['enable_backend_dark_mode']) == 'on'){
          
            return true;  
        }

        return false;

    }
}

if( !function_exists( 'qs_dark_mode_switch_enable' ) ){

    function qs_dark_mode_switch_enable(){

        $option = get_option('qsf_dark_mode_general_options');
        
        if($option && isset($option['enable_dark_mode_swicth']) && esc_html( $option['enable_dark_mode_swicth'] ) == 'on'){
           
           return true;  
        }

        return false;

    }
}

if( !function_exists( 'qs_dark_mode_switch_position' ) ){

    function qs_dark_mode_switch_position($default = 'bottom-right'){

        $option = get_option('qsf_dark_mode_switch_style_options');
        
        if( $option && isset($option['switch_position']) && esc_html( $option['switch_position'] ) != '' ){
           
           return $option['switch_position'];  
        }

        return $default;

    }
}

if( !function_exists( 'qs_dark_mode_switch_preset' ) ){

    function qs_dark_mode_switch_preset($default = 'qs-dark-mood-layout-3'){

        $option = get_option('qsf_dark_mode_switch_style_options');
        
        if( $option && isset($option['switch_preset']) && esc_html($option['switch_preset']) != '' ){
           
           return $option['switch_preset'];  
        }

        return $default;

    }
}



// lite
if( !function_exists( 'qs_dark_mode_switch_dark_text' ) ){

    function qs_dark_mode_switch_dark_text($default = 'dark'){

        $option = get_option('qsf_dark_mode_switch_style_options');
        
        if( $option && isset($option['switch_dark_text']) && esc_html($option['switch_dark_text']) != '' ){
           
           return ($option['switch_dark_text']);  
        }

        return $default;

    }
}

// lite
if( !function_exists( 'qs_dark_mode_switch_light_text' ) ){

    function qs_dark_mode_switch_light_text($default = 'light'){

        $option = get_option('qsf_dark_mode_switch_style_options');
        
        if( $option && isset($option['switch_light_text']) && esc_html($option['switch_light_text']) != '' ){
           
           return ($option['switch_light_text']);  
        }

        return $default;

    }
}


if( !function_exists( 'qs_dark_mode_theme_preset' ) ){

    function qs_dark_mode_theme_preset($default = 'one'){

        $option = get_option('qsf_dark_mode_theme_preset_options');
        
        if( $option && isset($option['theme_color_preset']) && esc_html($option['theme_color_preset']) != '' ){
         
           return qs_dark_mode_get_preset_content($option['theme_color_preset']);
        }

        return $default;

    }
}

if( !function_exists( 'qs_dark_mode_theme_box_shadow' ) ){

    function qs_dark_mode_theme_box_shadow($default = false){

        $option = get_option('qsf_dark_mode_theme_preset_options');
        
        if( $option && isset($option['theme_box_shadow']) && esc_html( $option[ 'theme_box_shadow' ] ) == 'on' ){
           
           return true;  
        }

        return $default;

    }
}

if( !function_exists( 'qs_dark_mode_theme_gradient_color' ) ){

    function qs_dark_mode_theme_gradient_color($default = false){

        $option = get_option('qsf_dark_mode_theme_preset_options');
        
        if( $option && isset($option['theme_gradient_color']) && esc_html( $option['theme_gradient_color'] ) == 'on' ){
           
           return true;  
        }

        return $default;

    }
}

 
if( !function_exists( 'qs_dark_mode_theme_background_color' ) ){

    function qs_dark_mode_theme_background_color($default = ''){

        $option = get_option('qsf_dark_mode_theme_preset_options');
        
        if( $option && isset($option['theme_background_color']) && esc_html( $option[ 'theme_background_color' ] ) != '' ){
           
           return $option['theme_background_color'];  
        }

        return $default;

    }
}

if( !function_exists( 'qs_dark_mode_theme_text_color' ) ){

    function qs_dark_mode_theme_text_color($default = ''){

        $option = get_option( 'qsf_dark_mode_theme_preset_options' );
        
        if( $option && isset($option['theme_text_color']) && esc_html( $option['theme_text_color'] ) != '' ){
           
           return $option['theme_text_color'];  
        }

        return $default;

    }
}

if( !function_exists( 'qs_dark_mode_theme_title_color' ) ){

    function qs_dark_mode_theme_title_color($default = ''){

        $option = get_option('qsf_dark_mode_theme_preset_options');
        
        if( $option && isset($option['theme_title_color']) && esc_html( $option['theme_title_color'] ) != '' ){
           
           return $option['theme_title_color'];  
        }

        return $default;

    }
}

if( !function_exists( 'qs_dark_mode_theme_icon_color' ) ){

    function qs_dark_mode_theme_icon_color($default = ''){

        $option = get_option('qsf_dark_mode_theme_preset_options');
      
        if( $option && isset($option['theme_icon_color']) && esc_html($option['theme_icon_color']) != '' ){
           
           return $option['theme_icon_color'];  
        }

        return $default;

    }
}

if( !function_exists( 'qs_dark_mode_theme_border_color' ) ){

    function qs_dark_mode_theme_border_color($default = ''){

        $option = get_option( 'qsf_dark_mode_theme_preset_options' );
        
        if( $option && isset($option['theme_border_color']) && esc_html( $option['theme_border_color'] ) != '' ){
           
           return $option['theme_border_color'];  
        }

        return $default;

    }
}

if( !function_exists( 'qs_dark_mode_theme_link_color' ) ){

    function qs_dark_mode_theme_link_color($default = ''){

        $option = get_option( 'qsf_dark_mode_theme_preset_options' );
        
        if( $option && isset($option['theme_link_color']) && esc_html( $option['theme_link_color'] ) != '' ){
           
           return $option['theme_link_color'];  
        }

        return $default;

    }
}

if( !function_exists( 'qs_dark_mode_theme_button_color' ) ){

    function qs_dark_mode_theme_button_color($default = ''){

        $option = get_option( 'qsf_dark_mode_theme_preset_options' );
        
        if( $option && isset($option['theme_button_color']) && esc_html($option['theme_button_color'] ) != '' ){
           
           return $option['theme_button_color'];  
        }

        return $default;

    }
}


if( !function_exists( 'qs_dark_mode_custom_element_exclude' ) ){

    function qs_dark_mode_custom_element_exclude($default = ''){

        $option = get_option( 'qsf_dark_mode_custom_element_options' );
        
        if( $option && isset($option['exclude_custom_element']) && esc_html($option['exclude_custom_element']) != '' ){
           
           return $option['exclude_custom_element'];  
        }

        return $default;

    }
}

if( !function_exists( 'qs_dark_mode_custom_element_include' ) ){

    function qs_dark_mode_custom_element_include($default = ''){

        $option = get_option( 'qsf_dark_mode_custom_element_options' );
        
        if( $option && isset($option['include_custom_element']) && esc_html($option['include_custom_element']) != '' ){
           
           return $option['include_custom_element'];  
        }

        return $default;

    }
}

if( !function_exists( 'qs_dark_mode_custom_css' ) ){

    function qs_dark_mode_custom_css($default = ''){

        $option = get_option( 'qsf_dark_mode_custom_css_options' );
        
        if( $option && isset($option['css']) && esc_html($option['css']) != '' ){
           
           return str_replace('\\' , '', $option['css'] );  
        }

        return $default;

    }
}



 // lite
 if( !function_exists('qs_dark_mode_dashboard_color_scheme') ){

    function qs_dark_mode_dashboard_color_scheme( $default = 'style1' ){
        $option = get_option( 'qsf_dark_mode_advanced_options' );
        
        if( $option && isset($option['dashboard_color_scheme']) &&  esc_html($option['dashboard_color_scheme']) !='' ){
           
          return qs_dark_mode_get_preset_content( esc_html($option['dashboard_color_scheme']) );
        }

        return $default;
    }
 }

 if( !function_exists('qs_dark_mode_adv_image_opacity') ){

    function qs_dark_mode_adv_image_opacity( $default = 1 ){

        $option = get_option( 'qsf_dark_mode_advanced_options' );
      
        if( $option && isset($option['image_opacity']) &&  esc_html( $option['image_opacity'] ) !='' ){
          return  esc_html( $option[ 'image_opacity' ] );
        }

        return $default;
    }
 }

 if( !function_exists('qs_dark_mode_adv_image_filter') ){

    function qs_dark_mode_adv_image_filter( $default = 'invert' ){

        $option = get_option( 'qsf_dark_mode_advanced_options' );
        if( $option && isset($option['image_filter']) &&  esc_html( $option['image_opacity'] ) !='' ){
          return  esc_html( $option[ 'image_filter' ] );
        }

        return $default;
    }
 }

 if( !function_exists('qs_dark_mode_adv_image_filter_value') ){

    function qs_dark_mode_adv_image_filter_value( $default = 'invert' ){

        $option = get_option( 'qsf_dark_mode_advanced_options' );
        if( $option && isset($option['image_filter_value']) &&  esc_html( $option['image_filter_value'] ) !='' ){
          return  esc_html( $option[ 'image_filter_value' ] );
        }

        return $default;
    }
 }
 
 if( !function_exists('qsf_dark_mode_swap_images_options_enable') ){

    function qsf_dark_mode_swap_images_options_enable( $key = '' ){

        $option = get_option( 'qsf_dark_mode_swap_images_options' );

        if( $option && isset($option['enable_swap_images']) && esc_html( $option['enable_swap_images'] ) !='' ){
          return $option[ 'enable_swap_images' ] == 'on'? true :false;
        }

        return false;
    }
 }

 if( !function_exists('qsf_dark_mode_swap_images_lists') ){

    function qsf_dark_mode_swap_images_lists( ){

        $option = get_option( 'qsf_dark_mode_swap_images_options' );
       
        if( $option && isset($option['swap_images']) && is_array($option['swap_images']) ){

            $swap_image = [];
       
            $single_normal_loop = $option['swap_images']['normal'];
            $single_dark_loop   = $option['swap_images']['dark'];
            
            foreach($single_normal_loop as $k => $link){
              
               $swap_image[$link] = isset($single_dark_loop[$k]) ? $single_dark_loop[$k]: '#';

            }

          return $swap_image;

        }

        return [];
    }
 }
 
 if( !function_exists('qs_dark_mode_adv_include_custom_element') ){

    function qs_dark_mode_adv_include_custom_element( $default = '' ){

        $option = get_option( 'qsf_dark_mode_advanced_options' );
        if( $option && isset($option['include_custom_element']) &&  esc_html( $option['include_custom_element'] ) !='' ){
          return  esc_html( $option[ 'include_custom_element' ] );
        }

        return $default;
    }
 }


if( !function_exists( 'qs_dark_mode_make_css_file' ) ){
    function qs_dark_mode_make_css_file(){

        global $wp_filesystem; 
        $path = QS_DARK_MODE_PLUGIN_PATH.'assets/custom-css/custom.css';
        if (empty($wp_filesystem)) {
            require_once (ABSPATH . '/wp-admin/includes/file.php');
            WP_Filesystem();
        }

        $css_content = stripslashes(qs_dark_mode_custom_css());
       
        $wp_filesystem->mkdir( QS_DARK_MODE_PLUGIN_PATH.'assets/custom-css' ); // Make a new directory folder if folder not their
                    
        if(!$wp_filesystem->put_contents( $path , $css_content , 0644) ) {
            return __('Failed to create css file','qs-dark-mode');
        }

    }
}
if( !function_exists( 'qs_dark_mode_get_front_css_content' ) ){
    function qs_dark_mode_get_front_css_content(){

        global $wp_filesystem; 
        $path = QS_DARK_MODE_PLUGIN_PATH.'assets/css/frontend.css';
        if (empty($wp_filesystem)) {
            require_once (ABSPATH . '/wp-admin/includes/file.php');
            WP_Filesystem();
        }
        
        $path = apply_filters( 'qs_dark_mode_frontend_css_path_mod', $path );
       
        $content_ =  $wp_filesystem->get_contents( $path );
        
        $content_ = apply_filters('qs_dark_mode_added_custom_css',$content_);

        return ($content_);

    }
}

if( !function_exists( 'qs_dark_mode_get_front_js_content' ) ){
    function qs_dark_mode_get_front_js_content(){

        global $wp_filesystem; 
        $path = QS_DARK_MODE_PLUGIN_PATH.'assets/js/frontend.js';
        if (empty($wp_filesystem)) {
            require_once (ABSPATH . '/wp-admin/includes/file.php');
            WP_Filesystem();
        }
  
        $path = apply_filters( 'qs_dark_mode_fnd_filter', $path );
       
        $content_ =  $wp_filesystem->get_contents( $path );
    
        return ($content_);

    }
}

// lite
if( !function_exists( 'qs_dark_mode_get_preset_content' ) ){
    function qs_dark_mode_get_preset_content( $style = 'style1' ){

        global $wp_filesystem; 
        $path = apply_filters( 'qs_dark_mode_bin_presets_dir_path', QS_DARK_MODE_PLUGIN_PATH.'bin/presets.php' ) ;
       
        if( ! file_exists($path)){
          return;    
        }

        require $path;
        $return_content = null; 
        $return_content = isset( $qs_presets[ $style ] )? $qs_presets[ $style ]:null; 
        return wp_json_encode($return_content);
    }
}



 
if( !function_exists( 'qs_dark_mode_custom_css_load' ) ){
    function qs_dark_mode_custom_css_load(){
        return true;
    }
}

if( !function_exists('qs_dark_mode_get_post_types') ){

    function qs_dark_mode_get_post_types() {
        global $wp_post_types;
        return array_keys( $wp_post_types );
    }

}

if( !function_exists('qs_dark_mode_is_blog') ){

 function qs_dark_mode_is_blog(){
 
    global $wp_query;

    if ( isset( $wp_query ) && (bool) $wp_query->is_posts_page ) {
        return get_option( 'page_for_posts' );
    }

    if(is_home()){
        return true;
    }
 
    return false;
 }

}
 

if ( ! function_exists( 'qs_dark_mode_is_woocommerce_activated' ) ) {
	function qs_dark_mode_is_woocommerce_activated() {
		if ( class_exists( 'woocommerce' ) ) { return true; } else { return false; }
	}
}

if ( ! function_exists( 'qs_dark_mode_preset_list' ) ) {
 function qs_dark_mode_preset_list(){
    $style_preset_list = [
        [
            'src'   => QS_DARK_MODE_IMG.'/presets/style1.png',
            'title' => __( 'One', 'qs-dark-mode' ),
            'pro'   => 0,
            'value' => 'style1'
         ],
         [
            'src'   => QS_DARK_MODE_IMG.'/presets/style2.png',
            'title' => __( 'Two', 'qs-dark-mode' ),
            'pro'   => 0,
            'value' => 'style2'
         ],
         
         [
            'src'   => QS_DARK_MODE_IMG.'/presets/style3.png',
            'title' => __( 'Three', 'qs-dark-mode' ),
            'pro'   => 0,
            'value' => 'style3'
         ],
         [
            'src'   => QS_DARK_MODE_IMG.'/presets/style4.png',
            'title' => __( 'Four', 'qs-dark-mode' ),
            'pro'   => 0,
            'value' => 'style4'
         ],
         [
            'src'   => QS_DARK_MODE_IMG.'/presets/style5.png',
            'title' => __( 'Five', 'qs-dark-mode' ),
            'pro'   => 1,
            'value' => 'five'
         ],
         [
            'src'   => QS_DARK_MODE_IMG.'/presets/style6.png',
            'title' => __( 'Six', 'qs-dark-mode' ),
            'pro'   => 1,
            'value' => 'six'
         ],
         [
            'src'   => QS_DARK_MODE_IMG.'/presets/style7.png',
            'title' => __( 'Seven', 'qs-dark-mode' ),
            'pro'   => 1,
            'value' => 'seven'
         ],
    
         [
            'src'   => QS_DARK_MODE_IMG.'/presets/style8.png',
            'title' => __( 'Eight', 'qs-dark-mode' ),
            'pro'   => 1,
            'value' => 'eight'
         ],
    
         [
            'src'   => QS_DARK_MODE_IMG.'/presets/style9.png',
            'title' => __( 'Nine', 'qs-dark-mode' ),
            'pro'   => 1,
            'value' => 'nine'
         ],
    
         [
            'src'   => QS_DARK_MODE_IMG.'/presets/style10.png',
            'title' => __( 'Ten', 'qs-dark-mode' ),
            'pro'   => 1,
            'value' => 'ten'
         ],
   

      ];

      return apply_filters( 'qs_dark_mode/presets_color/new', $style_preset_list ) ;
 }
}
 












