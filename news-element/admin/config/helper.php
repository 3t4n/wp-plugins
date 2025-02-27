<?php 
class khobish_process_op {

    function __construct() {
        
        add_action('init', array($this,'thepack_add_image_sizes' ));     
    }                    

    function thepack_add_image_sizes() {

        $options = get_option( '_khbsh' ); 
        $imgsizes = $options['image_size'];

        if (! empty($imgsizes) && sizeof($imgsizes) > 0) {
            foreach ( $imgsizes as $imgsize ) {       
                    $crop = $imgsize['crop']=='on' ? 'true' : 'false';            
                    add_image_size( $imgsize['name'], $imgsize['width'], $imgsize['height'], $crop );                    
            }
        }
    } 

}

new khobish_process_op();


