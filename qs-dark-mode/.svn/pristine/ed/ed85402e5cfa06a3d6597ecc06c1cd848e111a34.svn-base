<?php
namespace QSDarkMode\Pages\Traits;

trait General {

    public function generel_dm_options( $all = false ){

        include( dirname(__FILE__) . '/../options/general.php' );
       
        if($all){
           
            return $return_arr;
        }
      
        $return_arr = $this->get_transform_options($return_arr,'qsf_dark_mode_general_options');
       
        return $return_arr;
    }

	function general_components_options(){
          
       
        // Verify if the nonce is valid
        if ( !isset($_POST['_qs_dark_mode_general_option']) || !wp_verify_nonce(sanitize_text_field($_POST['_qs_dark_mode_general_option']), 'qs_dark_mode_general_option')) {
            wp_redirect(esc_url($_SERVER["HTTP_REFERER"]));
        }
    
       
        if( !isset($_POST['_qs_dark_mode_general_option']) ){
            wp_redirect( esc_url($_SERVER["HTTP_REFERER"]) ); 
        }
        
        // Save
        if( isset($_POST['qsf_dark_mode_general_options']['all-enable']) ){
           
            $validate_options = $this->validate_all_options( $this->components(true),true );
           
        }else{
           
            $validate_options = $this->validate_options( $_POST['qsf_dark_mode_general_options'] );
      
        }
       
      
        update_option('qsf_dark_mode_general_options',$validate_options);
       
        if ( wp_doing_ajax() ){
            
            wp_die();
        }else{

            $url        = esc_url( $_SERVER[ 'HTTP_REFERER' ] );
            $return_url = add_query_arg( array(
                'tabs' => 0
            ), $url );

            wp_redirect($return_url);
        }
        
    }

}