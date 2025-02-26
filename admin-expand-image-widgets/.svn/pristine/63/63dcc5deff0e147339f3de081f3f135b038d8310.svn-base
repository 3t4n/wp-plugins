<?php
/**
 * Plugin Name: Admin Expand Image Widgets
 * Plugin URI: https://wpjohnny.com/admin-expand-image-widgets/
 * Description: Auto-expand image widgets on Dashboard Widgets page, making images visible in classic mode (not Gutenberg mode).
 * Author: <a href="https://wpjohnny.com">WPJohnny</a>, <a href="https://profiles.wordpress.org/zeroneit/">zerOneIT</a>
 * Donate link: https://www.paypal.me/wpjohnny
 * Version: 0.1.4
 * License:      GPL v2 or later
 * License URI:  https://www.gnu.org/licenses/gpl-2.0.txt
 */

if ( ! defined( 'ABSPATH' ) ) {
	exit;
}

add_action( 'admin_footer-widgets.php', 'aeiw_print_script' );
/**
 * Print the script to expand the widgets.
 *
 * @since 0.1.0
 * @return void
 */
function aeiw_print_script() {
	?>

	<script type="text/javascript">
		jQuery(document).ready(function() {
			jQuery('.widget-liquid-right div[id*="media_image"]').each(function(){
				jQuery(this).find('.widget-title-action').trigger('click');
			});
		});
	</script>

	<?php
}
