<?php

class AIEA_Modules {
	
	private static $_instance = null;
	
	public function __construct() {
		
		// Mega menu
		$this->modules();
		
	}
	
	public function modules() {
		
		$saved_modules = get_option( 'aiea_modules' );				
		
		if( !empty( $saved_modules ) ) {
			
			if( isset( $saved_modules['header-footer'] ) && $saved_modules['header-footer'] == 'on' ) {
			
				// Header & footer
				require_once ( AIEA_DIR . 'core/header-footer/class.header-footer.php' );
				
			}
			
			if( isset( $saved_modules['mega-menu'] ) && $saved_modules['mega-menu'] == 'on' ) {
					
				// Mega menu
				require_once ( AIEA_DIR . 'core/mega-menu/class.module-mega-menu.php' );
				
			}
			
		}
		
	}
	
	public function get_post_by_title( $page_title, $output = OBJECT, $post_type = 'post' ) {
		
		global $wpdb;
		
		$page_title = esc_sql( $page_title );
		$post_type = esc_sql( $post_type );
		
		$post = $wpdb->get_var( $wpdb->prepare( "SELECT ID FROM $wpdb->posts WHERE post_title = '$page_title' AND post_type='$post_type'" ) );
		if ( $post ) return get_post($post, $output);

		return null;
		
	}
	
	public static function instance() {

		if ( is_null( self::$_instance ) ) {
			self::$_instance = new self();
		}
		return self::$_instance;

	}
	
} 
function aiea_modules() {
	return AIEA_Modules::instance();
}

$inc_modules = aiea_modules(); 