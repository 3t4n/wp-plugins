<?php
namespace QSDarkMode\Pages\Traits;

trait Switch_Style {

    function switch_style_options_save(){

       
        if ( !isset($_POST['_qs_dark_mode_switch_style_options']) || !wp_verify_nonce(sanitize_text_field( $_POST[ '_qs_dark_mode_switch_style_options' ] ), 'qs_dark_mode_general_option')) {
            wp_redirect( esc_url( $_SERVER[ 'HTTP_REFERER' ] ) );
        }
         
        if( !isset($_POST['_qs_dark_mode_switch_style_options']) ){
            wp_redirect( esc_url( $_SERVER[ 'HTTP_REFERER' ] ) ); 
        }
      
        $validate_options = $this->validate_switch_options( $_POST[ 'qs-dark-mode-switch-option' ] );
        update_option('qsf_dark_mode_switch_style_options',$validate_options);

        if ( wp_doing_ajax() ){
            
            wp_die();
        }else{

            $url        = esc_url($_SERVER["HTTP_REFERER"]);
            $return_url = add_query_arg( array(
                'tabs' => 1,
            ), $url );
            wp_redirect($return_url);
        }

    }
  
    public function switch_style_options(){

        include( dirname(__FILE__) . '/../options/switch_style.php' );
      
        $return_arr = $this->get_gen_transform_options($return_arr,'qsf_dark_mode_switch_style_options');
        return $return_arr;
    }
}