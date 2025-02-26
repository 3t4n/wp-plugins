<?php
/************************
 * Simple Youtube Responsive - Backend area 
 ************************/

// Prevent accessed directly
if ( !defined('ABSPATH') ){
	die;
}

// Enable shortcode on Widget
add_filter( 'widget_text', 'do_shortcode' );


// Plugins link to shortcode
if( !function_exists('eirudo_ytresponsive_plugin_actionlinks') ){
	function eirudo_ytresponsive_plugin_actionlinks( $links ){
		$helpLinks = array(
			'<a href="'.admin_url( 'admin.php?page=eirudo_ytresponsive_shortcode' ).'">Shortcodes</a>',
		);
		return array_merge( $links, $helpLinks );
	}
}
add_filter( 'plugin_action_links_' . plugin_basename(__FILE__), 'eirudo_ytresponsive_plugin_actionlinks' );

// Scripts printed
if( !function_exists('eirudo_ytresponsive_scripts') ){
	function eirudo_ytresponsive_scripts(){
		if( $GLOBALS['erdyt_options']['css'] == 'header' ){
			wp_enqueue_style( 'simple-youtube-responsive', EIRUDO_YTRESPONSIVE_URL . 'css/yt-responsive.css', array(), EIRUDO_YTRESPONSIVE_VER );
		}else if( $GLOBALS['erdyt_options']['css'] == 'inline' ){
			$erdyt_inline_css = file_get_contents( EIRUDO_YTRESPONSIVE_DIR . 'css/yt-responsive.css' );
			wp_register_style( 'simple-youtube-responsive-inline', false );
			wp_enqueue_style( 'simple-youtube-responsive-inline' );
			wp_add_inline_style( 'simple-youtube-responsive-inline', $erdyt_inline_css );
		}
		
		if( $GLOBALS['erdyt_options']['js'] == 'footer' ){
			wp_enqueue_script( 'simple-youtube-responsive', EIRUDO_YTRESPONSIVE_URL . 'js/yt-responsive.min.js', array(), EIRUDO_YTRESPONSIVE_VER, true );
		}else if( $GLOBALS['erdyt_options']['js'] == 'inline' ){
			add_action( 'wp_footer', function(){
				$erdyt_inline_js = file_get_contents( EIRUDO_YTRESPONSIVE_DIR . 'js/yt-responsive.min.js' );
				echo '<script>'.$erdyt_inline_js.'</script>';
			});
		}
	}
}
add_action( 'wp_enqueue_scripts', 'eirudo_ytresponsive_scripts' );