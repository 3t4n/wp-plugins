<?php
/*
Plugin Name: Restore Bundled jQuery
Version: 0.2-trunk
Plugin URI: http://wpdevel.wordpress.com/2011/02/10/if-your-menus-or-widgets-screens-broke/
Description: Restores and enforces the bundled jQuery in the admin.
Author: Sergey Biryukov
Author URI: http://profiles.wordpress.org/sergeybiryukov/
*/

class Restore_Bundled_jQuery {
	var $jquery;
	
	function Restore_Bundled_jQuery() {
		add_action( 'wp_default_scripts', array( $this, 'remember_jquery' ) );
	}

	function remember_jquery($scripts) {
		$this->jquery = $scripts->query('jquery');
		add_filter( 'script_loader_src', array( $this, 'restore_jquery' ), 50, 2 );
	}

	function restore_jquery($src, $handle) {
		global $wp_scripts;

		if ( is_admin() && 'jquery' == $handle )
			$src = add_query_arg( 'ver', $this->jquery->ver, $wp_scripts->base_url . $this->jquery->src );

		return $src;
	}
}

new Restore_Bundled_jQuery;
?>