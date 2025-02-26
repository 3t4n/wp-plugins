<?php 

if( !function_exists("atomica_vision_product_color_key") ) { 
    function atomica_vision_product_color_key() { return "atomica_vision_product_color"; }
}

if( !function_exists("atomica_vision_product_settings_save") ) { 
    function atomica_vision_product_settings_save( $post_id ) {
        $key = atomica_vision_product_color_key(); 
        $product = wc_get_product( $post_id );
        
        if(
            !isset($_POST[$key])
            || !isset($_POST['atomicavision_nonce'])
            || !wp_verify_nonce( sanitize_text_field( wp_unslash ( $_POST['atomicavision_nonce'] ) ) , $key )
        ){
            return; 
        }

        $color = sanitize_text_field( wp_unslash ( $_POST[$key] ) );
    
        $colorParts = explode(",", $color);
        
        if(count($colorParts) !== 5 && $color !== ""){
            return; 
        }
    
        $product->update_meta_data($key, $color );
         
        $product->save();
         
    }
}