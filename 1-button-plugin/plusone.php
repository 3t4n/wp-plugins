<?php
/*
Plugin Name: +1 Button Plugin
Plugin URI: http://www.ahsan.pk/2011/06/google-1button/
Description: Adds google +1button to your wordpress blog.
Version: 1.3
Author: ahsan.pk
Author URI: http://www.ahsan.pk
License: GPL2
*/
/*  Copyright 2011  ahsan.pk

    This program is free software; you can redistribute it and/or modify
    it under the terms of the GNU General Public License, version 2, as 
    published by the Free Software Foundation.

    This program is distributed in the hope that it will be useful,
    but WITHOUT ANY WARRANTY; without even the implied warranty of
    MERCHANTABILITY or FITNESS FOR A PARTICULAR PURPOSE.  See the
    GNU General Public License for more details.

    You should have received a copy of the GNU General Public License
    along with this program; if not, write to the Free Software
    Foundation, Inc., 51 Franklin St, Fifth Floor, Boston, MA  02110-1301  USA
	
	By using this plugin you authorise to Display Adsense ads on settings page
	of this plugin.
*/
global $wp_version;

$exit_msg='+1Button plugin requires WordPress 2.8 or newer.

<a href="http://codex.wordpress.org/Upgrading_WordPress">Please

update!</a>';

if (version_compare($wp_version,"2.8","<"))

{

exit ($exit_msg);

}

function plus1_button_menu() {
	add_options_page(__('+1 Button Settings'), __('Google +1 Button Plugin'), 'manage_options', 'plus1_button', 'plus1_button_options');
}

function plus1_button_options() {
?>
	<div class="wrap">
	<div id="icon-themes" class="icon32"></div>
	<h2><strong><?php _e('+1 Button Plugin Settings'); ?></strong></h2>

	<form name="plus1_button_option_form" id="plus1_button_option_form" method="post">
	
	<h2><?php _e('+1 Button Style') ?></h2>
	
	<div style="float:left; padding: 10px">
		<input type="radio" name="plus1-button-style" value="standard" id="plus1-button-style-standard"<?php if ((get_option( 'plus1-button-style', 'standard' ) == "standard") || (!get_option( 'plus1-button-style', 'standard' ))) echo ' checked'; ?>></input>
		<label for="plus1-button-style-standard"><?php _e('Standard'); ?></label>
		<?php echo plus1_button_button('http://www.ahsan.pk'); ?>
	</div>
	<div style="float:left; padding: 10px">
		<input type="radio" name="plus1-button-style" value="small" id="plus1-button-style-small"<?php if (get_option( 'plus1-button-style', 'standard' ) == "small") echo ' checked'; ?>></input>
		<label for="plus1-button-style-small"><?php _e('Small'); ?></label>
		<?php echo plus1_button_button('http://www.ahsan.pk', 'small'); ?>
	</div>
	<div style="float:left; padding: 10px">
		<input type="radio" name="plus1-button-style" value="medium" id="plus1-button-style-medium"<?php if (get_option( 'plus1-button-style', 'standard' ) == "medium") echo ' checked'; ?>></input>
		<label for="plus1-button-style-medium"><?php _e('Medium'); ?></label>
		<?php echo plus1_button_button('http://www.ahsan.pk', 'medium'); ?>
	</div>
	<div style="float:left; padding: 10px">
		<input type="radio" name="plus1-button-style" value="tall" id="plus1-button-style-tall"<?php if (get_option( 'plus1-button-style', 'standard' ) == "tall") echo ' checked'; ?>></input>
		<label for="plus1-button-style-tall"><?php _e('Tall'); ?></label>
		<?php echo plus1_button_button('http://www.ahsan.pk', 'tall'); ?>
	</div>
	
	<h2><?php _e('+1 Button Position') ?></h2>
	<select name="plus1-button-position" id="plus1-button-position">
		<option value="top_left" <?php if ( get_option( 'plus1-button-position', 'top_left' ) == "top_left") echo ' selected'; ?>><?php _e('Top Left (float)'); ?></option>
		<option value="top_right" <?php if (get_option( 'plus1-button-position', 'top_left' ) == "top_right") echo 'selected'; ?>><?php _e('Top Right (float)'); ?></option>
		<option value="top" <?php if (get_option( 'plus1-button-position', 'top_left' ) == "top") echo 'selected'; ?>><?php _e('Top (no float)'); ?></option>
		<option value="bottom_left" <?php if (get_option( 'plus1-button-position', 'top_left' ) == "bottom_left") echo 'selected'; ?>><?php _e('Bottom Left (float)'); ?></option>
		<option value="bottom_right" <?php if (get_option( 'plus1-button-position', 'top_left' ) == "bottom_right") echo 'selected'; ?>><?php _e('Bottom Right (float)'); ?></option>
		<option value="bottom" <?php if (get_option( 'plus1-button-position', 'top_left' ) == "bottom") echo 'selected'; ?>><?php _e('Bottom (no float)'); ?></option>
	</select>
		
	<h2><?php _e('+1 Button Visibility') ?></h2>
	<p>
		<input type="checkbox" name="plus1-button-show-on-post" id="plus1-button-show-on-post" value="true"<?php if (get_option( 'plus1-button-show-on-post', true ) == true) echo ' checked'; ?>>
		<label for="plus1-button-show-on-post"><?php _e('Show the +1 button on posts'); ?></label><br />
		<input type="checkbox" name="plus1-button-show-on-page" id="plus1-button-show-on-page" value="true"<?php if (get_option( 'plus1-button-show-on-page', false ) == true) echo ' checked'; ?>>
		<label for="plus1-button-show-on-page"><?php _e('Show the +1 button on pages'); ?></label><br />
	</p>
	
	<p>
		<input type="submit" value="Save Settings" class="button-primary" />
		<input type="hidden" name="plus1-button-form-submit" value="true" />
	</p>
	
	</form>
    <p>&nbsp;</p>
    <table width="500" border="0">
      <tr>
        <td><a href="http://bit.ly/adfloat" target="_new"><img src="http://www.ahsan.pk/af.gif" width="170" height="53" /></a></td>
        <td align="left" valign="top"><p>Best adsense plugin for wordpress.<br />
          <a href="http://bit.ly/adfloat">Adsense Float</a> Give it a try</p></td>
      </tr>
    </table>
</div>
	


	
<?php
}


function plus1_button_init()
{
	if(isset($_POST['plus1-button-form-submit']))
	{
		// plus1-button-position
		// plus1-button-layout
		// plus1-button-show-on-post
		// plus1-button-show-on-page
		
		update_option('plus1-button-position', $_POST['plus1-button-position']);
		update_option('plus1-button-style', $_POST['plus1-button-style']);
		update_option('plus1-button-show-on-post', $_POST['plus1-button-show-on-post'] == 'true');
		update_option('plus1-button-show-on-page', $_POST['plus1-button-show-on-page'] == 'true');
		
		add_action('admin_notices', 'plus1_button_save_message');

	}
	
	wp_enqueue_script( 'plus1-button', 'http://apis.google.com/js/plusone.js', null, '1.0.0', true );
}

function plus1_button_save_message() { echo '<div id="message" class="updated fade">' . __('Google +1 Button Settings Saved') . '</div>'; }


function plus1_button_button( $url='', $size='', $css='' ) {

	if ( !$url )
		$url = get_permalink();
	if ( !$url )
		return;

	if ( $css )
		$tag = '<div class="plus1_button_button" style="' . $css . '"><g:plusone';
	else
		$tag = '<div class="plus1_button_button"><g:plusone';
	
	if ( $size && $size != 'standard' )
		$tag .= ' size="' . $size . '"';
	
	$tag .= ' href="' . $url . '"';
	
	$tag .= '></g:plusone></div>';
	
	return $tag;

}
function plus1_button_button_echo( $url='', $size='', $css='' ) {
	echo apply_filters( 'plus1_button_button', plus1_button_button( $url, $size, $css) );
}

add_action( 'plus1_button_button', 'plus1_button_button_echo' );

function plus1_button( $content )
{
	if ( 
			get_option('plus1-button-position', 'top_left') != 'none' 					// hide if it is set to none
		&& 	( !is_single() || get_option( 'plus1-button-show-on-post', true ) == true ) 	// show if it is a post (default: true)
		&&  ( !is_page() || get_option( 'plus1-button-show-on-page', false ) == true )	// show if it is a page (default: false)
		&& 	!is_feed() && !is_archive() && !is_search() && !is_404() 
	) {
		
		if (get_the_id() && get_post_meta(get_the_id(), 'plus1_button_disabled') == true)
			return $content;
		
		$url = get_permalink();
		$style = get_option('plus1-button-style', 'standard');
		
		
		switch( get_option('plus1-button-position', 'top_left') )
		{
			case 'top_left':
				return plus1_button_button( $url, $style, 'margin: 0 8px 8px 0; float:left;' ) . $content;
				break;
			case 'top_right':
				return plus1_button_button( $url, $style, 'margin: 0 0 8px 8px; float:right;' ) . $content;
				break;
			case 'top':
				return plus1_button_button( $url, $style ) . $content;
				break;
			case 'bottom_left':
				return $content . plus1_button_button( $url, $style, 'margin: 8px 8px 0 0; float:left;' );
				break;
			case 'bottom_right':
				return $content . plus1_button_button( $url, $style, 'margin: 8px 0 0 8px; float:right;' );
				break;
			case 'bottom':
				return $content . plus1_button_button( $url, $style );
				break;
		}
	}

	return $content;
}

function plus1_button_admin_css() {
	echo '<style type="text/css"> #plus1_button_option_form h2 { clear: both; } #plus1_button_option_form .plus1_button_button { margin: 8px; } </style>';
}

add_action('admin_head', 'plus1_button_admin_css');
add_filter('the_content', 'plus1_button');
add_action('admin_menu', 'plus1_button_menu');
add_action('init', 'plus1_button_init');


function plus1_button_add_meta_box() {
	if ( get_option( 'plus1-button-show-on-post', true ) )
		add_meta_box( 'plus1_button_meta', __('Google +1 Settings'), 'plus1_button_meta_box_content', 'post', 'advanced', 'high' );
	if ( get_option( 'plus1-button-show-on-page', false ) )
		add_meta_box( 'plus1_button_meta', __('Google +1 Settings'), 'plus1_button_meta_box_content', 'page', 'advanced', 'high' );
}

function plus1_button_meta_box_content( $post ) {
	$plus1_button_checked = get_post_meta( $post->ID, 'plus1_button_disabled', false );

	if ( empty( $plus1_button_checked ) || $plus1_button_checked === false )
		$plus1_button_checked = ' checked="checked"';
	else
		$plus1_button_checked = '';

	echo '<p><label for="enable_post_plus1_button"><input name="enable_post_plus1_button" id="enable_post_plus1_button" value="1"' . $plus1_button_checked . ' type="checkbox"> ' . __('Show the +1 button on this post.') . '</label><input type="hidden" name="plus1_button_status_hidden" value="1" /></p>';
}

function plus1_button_meta_box_save( $post_id ) {
	if ( defined('DOING_AUTOSAVE') && DOING_AUTOSAVE )
		return $post_id;

	// Record plus1_button disable
	if ( 'post' == $_POST['post_type'] || 'page' == $_POST['post_type'] ) {
		if ( current_user_can( 'edit_post', $post_id ) ) {
			if ( isset( $_POST['plus1_button_status_hidden'] ) ) {
				if ( !isset( $_POST['enable_post_plus1_button'] ) )
					update_post_meta( $post_id, 'plus1_button_disabled', 1 );
				else
					delete_post_meta( $post_id, 'plus1_button_disabled' );
			}
		}
	}

  return $post_id;
}

function plus1_button_plugin_settings( $links ) {
	$settings_link = '<a href="options-general.php?page=plus1_button">'.__('Settings').'</a>';
	array_unshift( $links, $settings_link );
	return $links;
}

function plus1_button_add_plugin_settings($links, $file) {
	if ( $file == basename( dirname( __FILE__ ) ).'/'.basename( __FILE__ ) ) {
		$links[] = '<a href="options-general.php?page=plus1_button">' . __('Settings') . '</a>';
		$links[] = '<a href="http://www.ahsan.pk/2011/06/google-1button/">' . __('Support') . '</a>';
	}
	
	return $links;
}

add_action( 'admin_init', 'plus1_button_add_meta_box' );
add_action( 'save_post', 'plus1_button_meta_box_save' );
add_action( 'plugin_action_links_'.basename( dirname( __FILE__ ) ).'/'.basename( __FILE__ ), 'plus1_button_plugin_settings', 10, 4 );
add_filter( 'plugin_row_meta', 'plus1_button_add_plugin_settings', 10, 2 );






?>