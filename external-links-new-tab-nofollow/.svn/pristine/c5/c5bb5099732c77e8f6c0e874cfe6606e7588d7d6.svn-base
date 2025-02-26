<?php
/**
 *
 * @link              http://vagelis.dev
 * @since             1.0.0
 * @package           External links in new tab
 *
 * @wordpress-plugin
 * Plugin Name:       External links new tab - nofollow
 * Plugin URI:        http://woorelated.eboxnet.com/external-links
 * Description:       Forces all external links of your website to open in a new tab/window, also adds nofollow.
 * Version:           1.1.5
 * Author:            Vagelis P.
 * Author URI:        http://vagelis.dev
 * License:           GPL-2.0+
 * License URI:       http://www.gnu.org/licenses/gpl-2.0.txt
 * Text Domain:       external-links-in-new-tab
 * Domain Path:       /languages
 */

// If this file is called directly, abort.
if (!defined('WPINC'))
{
	die;
}
// check if function name already exits and if not create the function
if (!function_exists('oint_open_new_tab')) {
	function oint_open_new_tab() {
		?>
		 <!-- Eternal links in blank // Plugin -->
			<script>
			    jQuery(document).ready(function($) {
			    $('a').not('[href*="mailto:"], [href*="tel:"], [href*="#"], [href*=""] ').each(function () {
					var mylink = new RegExp('/' + window.location.host + '/');
					if ( ! mylink.test(this.href) ) {
						$(this).attr('target', '_blank');
						$(this).attr('rel', 'nofollow');
					}
				});
			});
			</script>
		 <?php
	}
}
// hook in footer
add_action( 'wp_footer', 'oint_open_new_tab' );
