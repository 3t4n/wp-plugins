<?php
/**
 * @package Add plugin search button
 * @version 0.1
 */
/*
Plugin Name: Add plugin search button
Plugin URI: http://blog.mkzyk.com/add-plugin-search-btn/
Description: This will display the search button of the plug-in install pages.
Author: mkzyk
Version: 0.1
Author URI: http://blog.mkzyk.com/
*/
function display_plugin_search_btn() {
	echo <<<EOL
	<script type="text/javascript">
	window.onload = function(){
		var element = document.getElementById('search-submit');
		element.classList.remove('screen-reader-text');
	}
</script>
EOL;
}

add_action( 'admin_print_scripts-plugin-install.php', 'display_plugin_search_btn' );

?>
