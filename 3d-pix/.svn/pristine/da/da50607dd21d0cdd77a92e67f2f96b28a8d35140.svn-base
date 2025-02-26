<?php
/*
Plugin Name: 3D Pix
Plugin URI: http://nductiv.com/plugins
Description: This plugin adds the shortcode [3dpix] which embeds a 3D image from Phereo.com into your post. It also adds a 3D Pix icon to the tinymce editor to insert that shortcode and set options. See the Settings page for the shortcode syntax.
Author: Tony Asch
Version: 1.0.1
Author URI: http://nductiv.com/

Copyright (c) 2010-2011 Tony Asch

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

class tdPix {

	function tdPix() {
		global $wp_version;
		// The current version
		define('tdPix_VERSION', '1.0.1');
		
		// Check for WP2.6 installation
		if (!defined ('IS_WP26'))
			define('IS_WP26', version_compare($wp_version, '2.6', '>=') );
		
		//This works only in WP2.6 or higher
		if ( IS_WP26 == FALSE) {
			add_action('admin_notices', create_function('', 'echo \'<div id="message" class="error fade"><p><strong>' . __('Sorry, 3D Pix works only under WordPress 2.6 or higher',"cetsHW") . '</strong></p></div>\';'));
			return;
		}
		
		// define URL
		define('tdPix_ABSPATH', WP_PLUGIN_DIR.'/'.plugin_basename( dirname(__FILE__) ).'/' );
		define('tdPix_URLPATH', WP_PLUGIN_URL.'/'.plugin_basename( dirname(__FILE__) ).'/' );
		//define('tdPix_TAXONOMY', 'wt_tag');
		
		include_once (dirname (__FILE__)."/lib/shortcodes.php");
		include_once (dirname (__FILE__)."/tinymce/tinymce.php");
		
	}

}

	function tdpix_settings(){
		add_options_page('3D Pix','3D Pix',9,basename(__FILE__),'tdpix_settings_page');
	}
	
	function tdpix_settings_page(){
		
	?>
		<div class="wrap">
		<h2>3D Pix</h2>
		by: <a target="_blank" href="http://nductiv.com/plugins">Nductiv</a><br/><br/>
		Shortcode to embed a 3D image from <a target="_blank" href="http://phereo.com">Phereo.com</a> into a post or page<br/>
		Notice that there's a button <img src="/plugins/3dPix/tinymce/tdPix.gif" /> in the page and post editors to insert this shortcode and set the parameters.<br/>
		<Blockquote> 
		[3dpix id="<i>4d37dbde378501ef25a80300</i>" width="<i>600</i>" height="<i>400</i>" mode="<i>anaglyph</i>"]<br/>
		</Blockquote> 
		Where the parameters are:<br/>
		<Blockquote> 
		id - <i>the Phereo.com image number...you can find this in the Phereo.com URL or Embed Code (Required)</i><br/>
		width - <i>width in pixels of the embedded 3D picture (Optional)</i><br/>
		height - <i>height in pixels of the embedded 3D picture (Optional)</i><br/>
		mode - <i>3D display mode: anaglyph, parallel, crossed, vinterlaced, hinterlaced, chinterlaced, animated, or nvidia (Optional)</i></Blockquote>
		If the optional parameters are not specificed in the post/page shortcode,<br/>
		the defaults set on this page will be used.<br/>
		<h3>Default Settings for 3D Pix</h3>
		<form action="options.php" method="post">
		<?php wp_nonce_field('update-options'); ?>
			<table class="form-table" >
			<tbody>
				<tr><th>Width: </th> <td> <input type="text" name="tdpix_width" id="tdpix_width" size="5" value="<?php echo get_option('tdpix_width') ?>" />px</td></tr>
				<tr><th>Height: </th> <td>  <input type="text" name="tdpix_height" size="5" id="tdpix_height" value="<?php echo get_option('tdpix_height') ?>" />px</td></tr>
				<tr><th>3D Mode: </th> <td>
					<select name="tdpix_mode">
					<option value="anaglyph" <?php if (get_option('tdpix_mode') == 'anaglyph') echo 'selected="selected"'; ?>>Anaglyph</option>
					<option value="parallel" <?php if (get_option('tdpix_mode') == 'parallel') echo 'selected="selected"'; ?>>Parallel</option>
					<option value="crossed" <?php if (get_option('tdpix_mode') == 'crossed') echo 'selected="selected"'; ?>>Crossed</option>
					<option value="vinterlaced" <?php if (get_option('tdpix_mode') == 'vinterlaced') echo 'selected="selected"'; ?>>Vertical Interlaced</option>
					<option value="hinterlaced" <?php if (get_option('tdpix_mode') == 'hinterlaced') echo 'selected="selected"'; ?>>Horizontal Interlaced</option>
					<option value="chinterlaced" <?php if (get_option('tdpix_mode') == 'chinterlaced') echo 'selected="selected"'; ?>>Checkerboard</option>
					<option value="animated" <?php if (get_option('tdpix_mode') == 'animated') echo 'selected="selected"'; ?>>Wiggle</option>
					<option value="nvidia" <?php if (get_option('tdpix_mode') == 'nvidia') echo 'selected="selected"'; ?>>Nvidia 3D Vision</option>
					</select>
					</td></tr>
				</tbody>
			</table>
			<p class="submit">
				<input type="hidden" value="update" name="action">
				<input type="hidden" value="tdpix_height,tdpix_width,tdpix_mode" name="page_options">
				<input type="submit" value="<?php _e('Save Changes') ?>" name="Submit">
			</p>
		</form>
		
		</div>
	<?php	
	}
	
/**
 * Add Settings link to plugin
 */
	 function tdpix_add_settings_link($links, $file) {
		static $this_plugin;
		
		if (!$this_plugin) $this_plugin = plugin_basename(__FILE__);

		if ($file == $this_plugin){
			$settings_link = '<a href="admin.php?page=tdPix.php">'.__("Settings", "3dPix").'</a>';
			array_unshift($links, $settings_link);
		}
		return $links;
	 }

	
	function tdpix_install(){
		add_option('tdpix_height','400');
		add_option('tdpix_width','500');
		add_option('tdpix_mode','anaglyph');
	}
	function tdpix_uninstall(){
		delete_option('tdpix_height');
		delete_option('tdpix_width');
		delete_option('tdpix_mode');
	}



// Start this plugin once all other plugins are fully loaded

	add_action( 'plugins_loaded', create_function( '', 'global $tdPix; $tdPix = new tdPix();' ) );

	register_activation_hook(__FILE__,'tdpix_install');
	register_deactivation_hook(__FILE__,'tdpix_uninstall');
	
	add_action('admin_menu','tdpix_settings');
	add_filter('plugin_action_links', 'tdpix_add_settings_link', 10, 2 );

?>