<?php

/*
Plugin Name: Buntify
Plugin URI: http://simonwheatley.co.uk/wordpress/buntify
Description: Adds some lovely patriotic bunting and a MIDI clip of Rool Britannia to your WordPress site to celebrate any UK holiday requiring additional patriotism.
Version: 1.0
Author: <a href="http://simonwheatley.co.uk/wordpress/">Simon Wheatley</a>, adapted from <a href="http://www.tomscott.com/buntify/">Tom Scott's Buntify</a>
*/
 
/*  Copyright 2011 Simon Wheatley

This program is free software; you can redistribute it and/or modify
it under the terms of the GNU General Public License as published by
the Free Software Foundation; either version 2 of the License, or
(at your option) any later version.

This program is distributed in the hope that it will be useful,
but WITHOUT ANY WARRANTY; without even the implied warranty of
MERCHANTABILITY or FITNESS FOR A PARTICULAR PURPOSE.  See the
GNU General Public License for more details.

You should have received a copy of the GNU General Public License
along with this program; if not, write to the Free Software
Foundation, Inc., 59 Temple Place, Suite 330, Boston, MA  02111-1307  USA

*/

/**
 * Hooks the WP admin_init action to initiate some settings.
 *
 * @return void
 **/
function buntify_admin_init(  ) {
	register_setting( 'buntify_options', 'buntify_options' );
}
add_action( 'admin_init', 'buntify_admin_init' );

/**
 * Hooks the WP admin_menu action to add the options page.
 *
 * @return void
 **/
function buntify_admin_menu(  ) {
	add_theme_page( 'Buntify', 'Buntify Options', 'manage_options', 'buntify_options', 'buntify_options' );
}
add_action( 'admin_menu', 'buntify_admin_menu' );

/**
 * Callback function to provide the HTML for the options page.
 *
 * @return void
 * @author Simon Wheatley
 **/
function buntify_options() {
	$options = get_option( 'buntify_options' );
?>
	<div class="wrap">
		<h2>Buntify Options</h2>
		<form method="post" action="options.php">
			<?php settings_fields('buntify_options'); ?>
			<table class="form-table">
				<tr valign="top">
					<th scope="row">Play the music</th>
					<td>
						<select name="buntify_options[music]">
							<option value="loop">All the time</option>
							<option value="never" <?php selected( $options[ 'music' ], 'never' ); ?>>Never</option>
						</select>
					</td>
				</tr>
			</table>
			<p class="submit">
			<input type="submit" class="button-primary" value="<?php _e('Save Changes') ?>" />
			</p>
		</form>
	</div>
<?php
}

/**
 * Hooks the WP admin_notices action to encourage the admin to greater heights
 * of patriotism.
 *
 * @return void
 **/
function buntify_admin_notices() {
	$screen = get_current_screen();
	if ( $screen->id == 'appearance_page_buntify_options' && isset( $_GET[ 'settings-updated' ] ) ) {
		$options = get_option( 'buntify_options' );
		switch( $options[ 'music' ] ) {
			case 'never':
				$message = "Settings updated and you have turned OFF the music. Most un-patriotic, but it's your website.";
				break;
			default:
				$message = "Settings updated and Rule Brittania will play on each and every page on your website. Congratulations, you are a true patriot and now everybody knows it.";
				break;
		}
		echo '<div class="updated settings-error"><p>' . $message . '</p></div>';
	}
}
add_action( 'admin_notices', 'buntify_admin_notices' );

/**
 * Hooks the WP wp_footer action to add BUNTING and MIDIfied ROOL BRITANNIA
 * to make your website even more happy about the Royal Wedding.
 *
 * @return void
 **/
function buntify_wp_footer(  ) {
	$options = get_option( 'buntify_options' );
?><div style="position: fixed; top: 0; left: 0; width: 200px; height: 100%; pointer-events:none; background: url(http://www.tomscott.com/buntify/bunting_l.png) top left repeat-y;"></div><div style="position: fixed; top: 0; right: 0; width: 200px; height: 100%; pointer-events:none; background: url(http://www.tomscott.com/buntify/bunting_r.png) top right repeat-y;"></div><div style="position: fixed; bottom: 0; left: 0; width: 100%; height: 200px; pointer-events:none; background: url(http://www.tomscott.com/buntify/bunting_d.png) bottom center no-repeat;"></div>
<?php if ( $options[ 'music' ] == 'loop' ) : ?>
	<embed autostart="true" loop="true" volume="100" hidden="false" src="http://www.tomscott.com/buntify/rulebrit.mid"></embed>
<?php endif; ?>	
<?php	
}
add_action( 'wp_footer', 'buntify_wp_footer' );

?>