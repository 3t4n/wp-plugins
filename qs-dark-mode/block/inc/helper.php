<?php

function qs_dark_mode_block_option_fix_path( $path ) {

	$windows_network_path = isset( $_SERVER['windir'] ) && in_array( substr( $path, 0, 2 ),
			array( '//', '\\\\' ),
			true );
	$fixed_path           = untrailingslashit( str_replace( array( '//', '\\' ), array( '/', '/' ), $path ) );

	if ( empty( $fixed_path ) && ! empty( $path ) ) {
		$fixed_path = '/';
	}

	if ( $windows_network_path ) {
		$fixed_path = '//' . ltrim( $fixed_path, '/' );
	}

	return $fixed_path;
}

function qs_dark_mode_block_get_block_attr($block,$return_attr = ['render_callback']){
    
	if($block == ''){
	  return false;
	}

    if(!is_array($return_attr)){
        return false;
    }

    if(!file_exists(qs_dark_mode_block_option_fix_path(QS_DARK_MODE_PLUGIN_PATH . 'block/build/blocks/'.$block.'/block.json'))){
      return false;  
	}

	$return_data = []; 
	$data = wp_json_file_decode(qs_dark_mode_block_option_fix_path(QS_DARK_MODE_PLUGIN_PATH . 'block/build/blocks/'.$block.'/block.json'), ['associative' => true]); 	
   
    foreach( $return_attr as $key ){
      if(isset($data[$key]) && $data[$key] !=''){
        $return_data[$key] = $data[$key];
      }
    }

    if(empty($return_data)){
        return false;
    }
    
    return $return_data;
}

function qs_dark_mode_ready_get_dir_list($path = 'blocks'){

	$widgets_modules = [];
	$dir_path        = QS_DARK_MODE_PLUGIN_PATH."block/build/".$path;
	$dir             = new \DirectoryIterator($dir_path);
	 
	 foreach ($dir as $fileinfo) {
		 if ($fileinfo->isDir() && !$fileinfo->isDot()) {
			 $widgets_modules[$fileinfo->getFilename()] = $fileinfo->getFilename();
			
		 }
	 }

	 return $widgets_modules;
}

add_action( 'admin_bar_menu', function(\WP_Admin_Bar $admin_bar){

	if ( ! current_user_can( 'manage_options' ) ) {
		return;
	}

	if(!did_action('enqueue_block_editor_assets')){
		return;
	}

	$admin_bar->add_menu( array(
			'id'    => 'gutenberg-qs-dark-mode-dash',
			'parent' => null,
			'group'  => null,
			'title' => sprintf(
				'<div class="qs-dm-toggle qs-dm-skip"></div>',
			),
	) );

}, 1900 );

function qs_dark_mode_css_array_to_css($rules, $wrapper='' ,$indent = 0) {
    $css = '';
    $prefix = str_repeat('  ', $indent);

    foreach ($rules as $key => $value) {
        if (is_array($value)) {
            $selector = $key;
            $properties = $value;

            $css .= $prefix . "$wrapper $selector {\n";
            $css .= $prefix . qs_dark_mode_css_array_to_css($properties, $indent + 1);
            $css .= $prefix . "}\n";
        } else {
            $property = $key;
            $css .= $prefix . "$property: $value;\n";
        }
    }

    return $css;
}