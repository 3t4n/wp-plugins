<?php
namespace QSDarkMode\Pages\Traits;

trait Swap_Images {

    function swap_images_options_save(){


      
        if ( !isset($_POST['_qsf_dark_mode_swap_images_options']) || !wp_verify_nonce(sanitize_text_field($_POST['_qsf_dark_mode_swap_images_options']), 'qsf_dark_mode_swap_images_options')) {
            wp_redirect(esc_url($_SERVER["HTTP_REFERER"]));
        }
       
        if( !isset($_POST['_qsf_dark_mode_swap_images_options']) ){
            wp_redirect($_SERVER["HTTP_REFERER"]); 
        }
        
        $validate_options = $this->swap_validate_options($_POST[ 'qsf_dark_mode_swap_images_options' ]);
      
        update_option('qsf_dark_mode_swap_images_options',$validate_options);
   
        if ( wp_doing_ajax() ){
            
            wp_die();
        }else{

            $url        = esc_url($_SERVER["HTTP_REFERER"]);
            $return_url = add_query_arg( array(
                'tabs' => 4,
            ), $url );
            wp_redirect($return_url);
        }
    }

    public function swap_images_options(){

        include( dirname(__FILE__) . '/../options/images.php' );
        $return_arr = $this->swap_transform_inputs_options($return_arr,'qsf_dark_mode_swap_images_options');
        
        return $return_arr;
    }

    public function swap_transform_inputs_options($options = [], $key = false){

        if( !is_array($options) || $key == false ){
            return $options;
        }

        $db_option  = get_option( $key );
     
        $return_options = $options;
        
        foreach( $options as $key => $value ){

            if(isset($value['type']) && $value['type'] == 'switch'){

                if( isset($db_option[$key]) ){
                    $return_options[$key]['default'] = $db_option[$key]; 
                }else{
                    $return_options[$key]['default'] = '';    
                } 

            }elseif('swap-images' == $value['type']){

                $this_item_value = isset($db_option[$key]) ? $db_option[$key] : false;
               
                if( is_array( $this_item_value ) ){
                    $swap_image = [];
                  
                    $single_normal_loop = $this_item_value['normal'];
                    $single_dark_loop = $this_item_value['dark'];
                  
                    foreach($single_normal_loop as $k => $link){
                      
                       $swap_image[] = [
                            'normal' => $link,
                            'dark' => isset($single_dark_loop[$k]) ? $single_dark_loop[$k]: '#'
                       ];

                    }
                   
                    $return_options[$key]['options'] = $swap_image;
                } 

            }else{
                $return_options[$key] = $db_option[$key];
            }
           

        }
        return $return_options; 
    }

    public function swap_validate_options( $options = [] ){
        
        if(!is_array($options)){
            return $options;
        } 

      
       
        $return_options = [];
        
        foreach( $options as $key => $value ){
           
            if( is_array( $value ) ){

                  $filter_item = [];

                  foreach($value as $k=> $item){

                    $filter_item[$k] = ($item);

                  }

                $return_options[$key] = $filter_item; 
            }else{

                $return_options[$key] = sanitize_text_field($value); 

            }
           
           
        }
    
        return $return_options;
    }
}