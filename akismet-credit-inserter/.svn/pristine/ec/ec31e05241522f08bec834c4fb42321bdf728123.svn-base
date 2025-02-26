<?php

/* <WP Plugin Data>
 * Plugin Name: Akismet Credit Inserter
 * Version: 1.0.1
 * Plugin URI: http://www.darcynorman.net/wordpress/akismet-credit-inserter/
 * Description: Adds a small "Spam prevention powered by Akismet" to the footer of every blog to abide by Akismet licensing terms.
 * Author: D'Arcy Norman
 * Author URI: http://www.darcynorman.net/
 */

/*
Using the plugin.

1) Place the akismet-credit-inserter.php file in wp-content/mu-plugins or, I suppose, in wp-content/plugins (but then it would need to be manually activated for each site...)
2) there is no step 2
*/

		
function wp_akismet_credit_insert() {
	echo '<div id="akismet-credit-insert" style="text-align: center; clear: both;"><p>Spam prevention powered by <a href="http://akismet.com">Akismet</a></p></div>';
}



add_action('wp_footer', 'wp_akismet_credit_insert'); /* automatically insert the text in the footer of every blog */

?>