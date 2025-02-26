<?php
namespace QSDarkMode\Pages\Traits;

trait Custom_Css {

    function custom_css_options_save(){

               
        if ( !isset($_POST['_qs_dark_mode_custom_css_option']) || !wp_verify_nonce(sanitize_text_field($_POST['_qs_dark_mode_custom_css_option']), 'qs_dark_mode_general_option')) {
            wp_redirect(esc_url($_SERVER["HTTP_REFERER"]));
        }
     
        if( !isset($_POST['_qs_dark_mode_custom_css_option']) ){
            wp_redirect($_SERVER["HTTP_REFERER"]); 
        }
        
        $validate_options =  str_replace('\\' , '',$this->validate_advanced_options($_POST['qs-dark-mode-custom-css-option']));
       
        update_option('qsf_dark_mode_custom_css_options',$validate_options);
        //qs_dark_mode_make_css_file();
        if ( wp_doing_ajax() ){
            
            wp_die();
        }else{

            $url        = esc_url($_SERVER["HTTP_REFERER"]);
            $return_url = add_query_arg( array(
                'tabs' => 5,
            ), $url );
            wp_redirect($return_url);
        }
    }
    public function custom_css_options(){

        include( dirname(__FILE__) . '/../options/custom_css.php' );
        $return_arr = $this->get_gen_transform_options($return_arr,'qsf_dark_mode_custom_css_options');
        return $return_arr;
    }
}