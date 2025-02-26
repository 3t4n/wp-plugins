<?php
/**
 * Plugin Name: Full width editor
 * Description: Set block editor width to full width
 * Author: James Wills
 * Author URI: https://wickywills.com
 * Version: 1.0.0
 * License: GPL2+
 * License URI: http://www.gnu.org/licenses/gpl-2.0.txt
 *
 * @package Full width editor
 */


function full_width_editor() {
	$css = '
		<style>
		    body.block-editor-page .wp-block {
				max-width: none !important;
			}
	  	</style>';

	echo $css;
}
add_action('admin_head', 'full_width_editor');
