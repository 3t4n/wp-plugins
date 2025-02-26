<?php
/*

**************************************************************************

Plugin Name:  Add Style To Post
Plugin URI:   http://www.arefly.com/add-style-to-post/
Description:  Add custom style to a post by shortcode in post's content.
Version:      1.0.1
Author:       Arefly
Author URI:   http://www.arefly.com/
Text Domain:  add-style-to-post
Domain Path:  /lang/

**************************************************************************

	Copyright 2014  Arefly  (email : eflyjason@gmail.com)

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

**************************************************************************/

define("ADD_STYLE_TO_POST_PLUGIN_URL", plugin_dir_url( __FILE__ ));
define("ADD_STYLE_TO_POST_FULL_DIR", plugin_dir_path( __FILE__ ));
define("ADD_STYLE_TO_POST_TEXT_DOMAIN", "add-style-to-post");

/* Plugin Localize */
function add_style_to_post_load_plugin_textdomain() {
	load_plugin_textdomain(ADD_STYLE_TO_POST_TEXT_DOMAIN, false, dirname(plugin_basename( __FILE__ )).'/lang/');
}
add_action('plugins_loaded', 'add_style_to_post_load_plugin_textdomain');

function add_style_to_post_wp_head() {
	if (!is_singular()) return;
	global $post;
	if (!empty($post->post_content)) {
		$regex = get_shortcode_regex();
		preg_match_all('/'.$regex.'/', $post->post_content, $matches);
		if (!empty($matches[2]) && in_array('style', $matches[2])) {
			$style = trim(do_shortcode(shortcode_unautop($matches[5][0])));
			?>
<style>
<?php echo $style; ?>
</style>
<?php
		}
	}
}
add_action('wp_head', 'add_style_to_post_wp_head');

// NOTE: This function is just for stop print out the shortcode content, no other usage.
function add_style_to_post_shortcode(){
	return;						// Return nothing
}
add_shortcode('style', 'add_style_to_post_shortcode');
