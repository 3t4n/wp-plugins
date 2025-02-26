<?php
if( !class_exists( 'osHTML5TinyMCE' ) ):

	class osHTML5TinyMCE{
		
		var $button_name = 'oshtml5_shortcodes';
		
		function oshtml5_add_selector(){
			// Don't bother doing this stuff if the current user lacks permissions
			if ( ! current_user_can( 'edit_posts' ) && ! current_user_can( 'edit_pages' ) )
				return;
		 
		   // Add only in Rich Editor mode
			if ( get_user_option( 'rich_editing' ) == 'true' ) {
			  add_filter( 'mce_external_plugins', array( $this, 'oshtml5_register_tinymce_plugin' ) );
			  add_filter( 'mce_buttons', array( $this, 'oshtml5_register_tinymce' ) );
			}
		}
		
		function oshtml5_register_tinymce( $buttons ){
			
			array_push( $buttons, "separator", $this->button_name );
			return $buttons;
		}
		
		function oshtml5_register_tinymce_plugin( $plugin_array ){
			
			$plugin_array[$this->button_name] = get_site_url() . '/index.php?oshtml5=editor_plugin_js';
			
			if ( get_user_option( 'rich_editing' ) == 'true' ) 
			
			return $plugin_array;
		}
	}

endif;

if( !isset( $html5_shortcodes ) ){
	
	$html5_shortcodes = new osHTML5TinyMCE();
	add_action( 'admin_head', array( $html5_shortcodes, 'oshtml5_add_selector' ) );
}

?>