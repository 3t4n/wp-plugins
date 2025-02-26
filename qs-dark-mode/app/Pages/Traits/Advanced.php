<?php
namespace QSDarkMode\Pages\Traits;

trait Advanced {

    function advanced_options_save(){

               
        if ( !isset($_POST['_qs_dark_mode_advanced_option']) || !wp_verify_nonce(sanitize_text_field($_POST['_qs_dark_mode_advanced_option']), 'qs_dark_mode_general_option')) {
            wp_redirect( esc_url($_SERVER["HTTP_REFERER"]));
        }
     
        if( !isset($_POST['_qs_dark_mode_advanced_option']) ){
            wp_redirect(esc_url($_SERVER["HTTP_REFERER"])); 
        }
        
        $validate_options = $this->validate_advanced_options($_POST['qs-dark-mode-advanced-option']);
        $validate_options = apply_filters('qsf_dark_mode_advanced_options_hook',$validate_options);
        update_option('qsf_dark_mode_advanced_options',$validate_options);
        
        if ( wp_doing_ajax() ){
            wp_die();
        }else{

            $url        = esc_url($_SERVER["HTTP_REFERER"]);
            $return_url = add_query_arg( array(
                'tabs' => 6,
            ), $url );
            wp_redirect($return_url);
        }
    }
    public function advanced_options(){

        include( dirname(__FILE__) . '/../options/advanced.php' );
        $return_arr = $this->get_gen_transform_options($return_arr,'qsf_dark_mode_advanced_options');
        return $return_arr;
    }

    public function validate_advanced_options( $options = [] ){
        
        if(!is_array($options)){
            return $options;
        }
       
        $return_options = [];
        
        foreach( $options as $key => $value ){

            if( is_array( $value ) ){

                  $filter_item = [];

                  foreach($value as $k=> $item){

                    $filter_item[$k] = sanitize_text_field($item);

                  }

                $return_options[$key] = $filter_item; 
            }else{

                $return_options[$key] = sanitize_text_field($value); 

            }
           
           
        }

        return $return_options;
    }

    public function schedule_check(){

    }
}