<?php


//Blocks

function qs_dark_mode_block_register_block_init() {

    if ( ! function_exists( 'register_block_type' ) ) {
        // Block editor is not available.
        return;
    }
    
	if(!file_exists(QS_DARK_MODE_PLUGIN_PATH . 'block/build/blocks')){
       return;
	}
	
	$blocks = qs_dark_mode_ready_get_dir_list('blocks');
    
	if(is_array($blocks)){
		foreach($blocks as $item){
			
            $get_render_attr  = qs_dark_mode_block_get_block_attr($item,['render_callback']);
            if(is_array( $get_render_attr )){
                register_block_type( QS_DARK_MODE_PLUGIN_PATH . 'block/build/blocks/'.$item, $get_render_attr );	    
            }else{
                register_block_type( QS_DARK_MODE_PLUGIN_PATH . 'block/build/blocks/'.$item);	    
            } 
			
		
		}
	}
 	
}

// Hook: Editor assets.
add_action( 'init', 'qs_dark_mode_block_register_block_init' );


