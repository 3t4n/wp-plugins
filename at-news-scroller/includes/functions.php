<?php

        function at_scroll_plugin_compiler_file( $options, $css, $changed_values ) {
		    global $wp_filesystem;
		    $file_css = dirname(__FILE__) . '/../style/style.css';
		    $file_js = dirname(__FILE__) . '/../js/init.js';
		    $data = $options;
		    ob_start(); // Capture all output (output buffering)
			require('style.php'); // Generate CSS
			$css_file_content = ob_get_clean(); // Get generated CSS (output buffering)
		 	ob_end_flush();

		 	ob_start(); // Capture all output (output buffering)
			require('init.js.php'); // Generate js
			$js_file_content = ob_get_clean(); // Get generated js (output buffering)
		 	ob_end_flush();

		    if( empty( $wp_filesystem ) ) {
		        require_once( ABSPATH .'/wp-admin/includes/file.php' );
		        WP_Filesystem();
		        
		    }
		 
		    if( $wp_filesystem ) {
		        $wp_filesystem->put_contents($file_css,$css_file_content,FS_CHMOD_FILE );
		        $wp_filesystem->put_contents($file_js,$js_file_content,FS_CHMOD_FILE );
		    }
        }



add_action( 'at_ticker_code', 'at_scroll_plugin_mod' );
function at_scroll_plugin_mod() {
  	global $at_news_scroller;
  	require_once(dirname(__FILE__)."/ticker.php");
}

define('AT_NEWS_PLUGIN_URL',  plugin_dir_url(__FILE__) );   
define('CSS_URL', AT_NEWS_PLUGIN_URL . '../style/style.css');  
// Add header hook for user to load css by plugin
add_action('wp_head','hook_css');
function hook_css() {
	  	echo  "<link rel='stylesheet' href='". CSS_URL ."' type='text/css' media='all' />". "\n" ;
		wp_register_script( 'at_ticker_init_js', AT_NEWS_PLUGIN_URL."../js/init.js" ,array('jquery'),"2.1.1",true);
  		wp_enqueue_script( 'at_ticker_init_js');
}

add_shortcode('at-scroll-code', 'at_scroll_plugin_mod'); // [at-scroll-code]
?>