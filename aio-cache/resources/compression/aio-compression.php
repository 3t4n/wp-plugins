<?php
function wp_http_compression() {
	// Don't use on WP-Admin
	if (strpos(strtolower($_SERVER['REQUEST_URI']),'/wp-admin/') !== false) 
		return false;
		
	// Don't use on plugins
	if (strpos(strtolower($_SERVER['REQUEST_URI']),'/wp-content/') !== false) 
		return false;
	
	// Don't use on Admin HTML editor
	if (stripos($uri, '/js/tinymce') !== false) 
		return false;
		
	// Check if ob_gzhandler already loaded
	if (ini_get('output_handler') == 'ob_gzhandler')
		return false;
		
	// Load HTTP Compression if correct extension is loaded
	if (extension_loaded('zlib')) 
			if(!ob_start("ob_gzhandler")) ob_start();
}
add_action('init', 'wp_http_compression');
?>
