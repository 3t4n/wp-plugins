<?php
/*

Plugin Name:  Facebook Share Button Zero Count Fix
Plugin URI:   http://www.mindgears.de/2011/02/wordpress-plugin-facebook-share-button-zero-count-fix/
Description:  Fixes the annoying behaviour of the Facebook share buttons not to show the counter box if something is shared less than 3 times.
Version:      1.2
Author:       Bernd Zolchhofer
Author URI:   http://www.mindgears.de
License:      GPL 2

	Copyright 2011  Bernd Zolchhofer  (email : burnt@mindgears.de)

    This program is free software; you can redistribute it and/or modify
    it under the terms of the GNU General Public License, version 2, as 
    published by the Free Software Foundation.

    This program is distributed in the hope that it will be useful,
    but WITHOUT ANY WARRANTY; without even the implied warranty of
    MERCHANTABILITY or FITNESS FOR A PARTICULAR PURPOSE.  See the
    GNU General Public License for more details.
	
*/


add_action('wp_head', 'fb_sharebutton_zerofix');
add_action('admin_menu', 'fb_sharebutton_zerofix_admin_menu');

function fb_sharebutton_zerofix() {
		echo '<script type="text/javascript">' . "\n";
		echo '	//<![CDATA[' . "\n";
		echo '	jQuery(document).ready(function(){' . "\n";
		echo '	jQuery(".fb_share_no_count .fb_share_count_inner").text("' . get_option('fb_sharebutton_zerofix_count') . '");' . "\n";
		echo '	jQuery(".fb_share_no_count").removeClass("fb_share_no_count");' . "\n";
		echo '	});' . "\n";
		echo '	//]]>' . "\n";
		echo '</script>' . "\n";	
}





function fb_sharebutton_zerofix_admin_menu() {
  add_options_page('FB Share Zero Count Fix', 'FB Share Zero Fix', 'manage_options', 'facebook_sharebutton_zerocount_fix', 'fb_sharebutton_zerofix_options');
}





function fb_sharebutton_zerofix_options() {
	
	if (!current_user_can('manage_options')) {
		wp_die( __('You do not have sufficient permissions to access this page.') );
	}
	
	?>
	<div class="wrap">
		<h2>Facebook Share Button Zero Count Fix Options</h2>
		<form method="post" action="options.php">
			<?php wp_nonce_field('update-options'); ?>
			<table class="form-table">
				<tr valign="top">
					<th scope="row"><label for="option_fb_sharebutton_zerofix_count">Show this count instead of nothing:</label></th>
					<td>
						<select id="option_fb_sharebutton_zerofix_count" name="fb_sharebutton_zerofix_count" size="1">
							<option<?php if (get_option('fb_sharebutton_zerofix_count') == 0) { echo ' selected'; } ?>>0</option>
							<option<?php if (get_option('fb_sharebutton_zerofix_count') == 1) { echo ' selected'; } ?>>1</option>
							<option<?php if (get_option('fb_sharebutton_zerofix_count') == 2) { echo ' selected'; } ?>>2</option>
						</select>
					</td>
				</tr>
			</table>
			<input type="hidden" name="action" value="update" />
			<input type="hidden" name="page_options" value="fb_sharebutton_zerofix_count" />
			<p class="submit">
				<input type="submit" value="Update Options" />
			</p>
			<p>Plugin by Bernd Zolchhofer - <a href="http://www.mindgears.de" target="_blank">www.mindgears.de</a></p>
		</form>
	</div>
	<?php
}
?>
