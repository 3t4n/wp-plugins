<?php
namespace QSDarkMode\Pages\Traits;

trait Theme_Preset {

    function theme_color_preset_options_save(){
        
        if ( !isset($_POST['_qs_dark_mode_theme_preset_options']) || !wp_verify_nonce(sanitize_text_field($_POST['_qs_dark_mode_theme_preset_options']), 'qs_dark_mode_general_option')) {
           
            wp_redirect( esc_url( $_SERVER["HTTP_REFERER"] ));
        }
         
        if( !isset($_POST['_qs_dark_mode_theme_preset_options']) ){

            wp_redirect( esc_url( $_SERVER["HTTP_REFERER"] )); 
        }
        
        if( !isset($_POST['qs-dark-mode-preset-option']) ){

            wp_redirect( esc_url($_SERVER[ 'HTTP_REFERER' ])); 
        }
        
        $validate_options = $this->validate_switch_options( $_POST[ 'qs-dark-mode-preset-option' ] );
        update_option('qsf_dark_mode_theme_preset_options',$validate_options);

        if ( wp_doing_ajax() ){
            wp_die();
        }else{

            $url        = esc_url($_SERVER[ 'HTTP_REFERER' ]);
            $return_url = add_query_arg( array(
                'tabs' => 2,
            ), $url );

            wp_redirect($return_url);
        }
    }
    public function theme_color_preset_options(){

        include( dirname(__FILE__) . '/../options/theme_color.php' );
        $return_arr = $this->get_gen_transform_options($return_arr,'qsf_dark_mode_theme_preset_options');
        return $return_arr;
    }
}