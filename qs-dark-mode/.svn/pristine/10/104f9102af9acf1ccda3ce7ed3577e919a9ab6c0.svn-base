<?php
namespace QSDarkMode\Pages\Traits;

trait Custom_ELement {

    function custom_element_options_save(){
        
        if ( !isset($_POST['_qs_dark_mode_custom_element_option']) || !wp_verify_nonce(sanitize_text_field($_POST['_qs_dark_mode_custom_element_option']), 'qs_dark_mode_general_option')) {
            wp_redirect(esc_url($_SERVER["HTTP_REFERER"]));
        }
         
        if( !isset($_POST['_qs_dark_mode_custom_element_option']) ){
            wp_redirect(esc_url($_SERVER["HTTP_REFERER"])); 
        }
     
        $validate_options = $this->validate_switch_options($_POST['qs-dark-mode-custom-element-option']);
        update_option('qsf_dark_mode_custom_element_options',$validate_options);
        if ( wp_doing_ajax() ){
            
            wp_die();
        }else{

            $url        = esc_url($_SERVER['HTTP_REFERER']);
            $return_url = add_query_arg( array(
                'tabs' => 3,
            ), $url );
            wp_redirect($return_url);
        }
    }
    public function custom_element_options(){

        include( dirname(__FILE__) . '/../options/custom_element.php' );
        $return_arr = $this->get_gen_transform_options($return_arr,'qsf_dark_mode_custom_element_options');
        return $return_arr;
    }
}