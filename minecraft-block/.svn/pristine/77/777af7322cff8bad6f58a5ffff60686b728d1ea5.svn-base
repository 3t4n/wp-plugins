<?php
/**
 * @package Minecraft Block
 */
/*
Plugin Name: Minecraft Block
Plugin URI: http://drewgourley.com/the-minecraft-block-plugin
Description: Used by millions, Minecraft is quite possibly the best way in the world to <strong>make worlds out of cubes</strong>. To display a minecraft cube on your site: 1) Click the "Activate" link to the left of this description, 2) Choose a block from the Minecraft Block Options Screen</a>, and 3) Enjoy.
Version: 2.0
Author: Drew Gourley
Author URI: http://drewgourley.com/
License: GPLv2 or later
 */

/*
This program is free software; you can redistribute it and/or
modify it under the terms of the GNU General Public License
as published by the Free Software Foundation; either version 2
of the License, or (at your option) any later version.

This program is distributed in the hope that it will be useful,
but WITHOUT ANY WARRANTY; without even the implied warranty of
MERCHANTABILITY or FITNESS FOR A PARTICULAR PURPOSE.  See the
GNU General Public License for more details.

You should have received a copy of the GNU General Public License
along with this program; if not, write to the Free Software
Foundation, Inc., 51 Franklin Street, Fifth Floor, Boston, MA  02110-1301, USA.
 */

$minecraft_block_defaults = apply_filters('minecraft_block_defaults', array(
	'enable' => 1,
	'div' => 'minecraft-container',
	'block' => 'grass',
	'url' => 'http://www.minecraft.net'
));
$minecraft_block_settings = get_option('minecraft_block_settings');
$minecraft_block_settings = wp_parse_args($minecraft_block_settings, $minecraft_block_defaults);
add_action('admin_init', 'minecraft_block_register_settings');
function minecraft_block_register_settings() {
	register_setting('minecraft_block_settings', 'minecraft_block_settings', 'minecraft_block_settings_validate');
}
add_action('admin_menu', 'add_minecraft_block_options_menu');
function add_minecraft_block_options_menu() {
	add_menu_page('Minecraft Block Options', 'Minecraft Block', 8, 'minecraft_block', 'minecraft_block_admin_page', plugins_url('images/icon_minecraft.png', __FILE__), 123);
    add_submenu_page('minecraft_block', 'Settings', 'Settings', 8, 'minecraft_block', 'minecraft_block_admin_page');
}

function minecraft_block_admin_page() { ?>
<div class="wrap">
	<?php minecraft_block_settings_update_check(); ?>
	<?php screen_icon('minecraft-block'); ?>
	<h2><?php _e('Minecraft Block Options'); ?></h2>
	<form method="post" action="options.php">
		<?php settings_fields('minecraft_block_settings'); 
		global $minecraft_block_settings; $options = $minecraft_block_settings; ?>
		<table class="form-table">
			<tr valign="top"><th scope="row">Place Auto-Block</th>
			<td><input name="minecraft_block_settings[enable]" type="checkbox" value="1" <?php checked('1', $options['enable']); ?> /> <label for="minecraft_block_settings[enable]">Check this box if you want to enable an Automatic Minecraft Block in the footer.</label></td>
			</tr>
			<tr valign="top"><th scope="row">Other Ways to Create Blocks</th>
			<td>
				You may also place blocks directly in your posts using a shotcode, for example:
				<pre>[minecraft texture='grass' id='minecraft-grass']</pre>
				You may also program blocks into your templates using a template tag, for example:
				<pre>minecraft_block_create('grass', 'minecraft-grass')</pre>
				For detailed instructions on how to use the plugin, visit the <a href="http://drewgourley.com/blog/minecraft-block/" target="_blank">plugin site</a>.
			</td>
			</tr>
			<tr><th scope="row">Block Container ID</th>
			<td>Please indicate what you would like the Auto-Block container ID to be:<br />
				<input type="text" name="minecraft_block_settings[div]" value="<?php echo $options['div'] ?>" />
			</td></tr>
			<tr><th scope="row">Block Texture</th>
			<td>Please select the texture of the auto-block:<br />
				<select name="minecraft_block_settings[texture]" class="texture">
					<option value="grass" <?php selected('grass', $options['texture']); ?>>Grass</option>
					<option value="dirt" <?php selected('dirt', $options['texture']); ?>>Dirt</option>
					<option value="gravel" <?php selected('gravel', $options['texture']); ?>>Gravel</option>
					<option value="sand" <?php selected('sand', $options['texture']); ?>>Sand</option>
					<option value="sandstone" <?php selected('sandstone', $options['texture']); ?>>Sandstone</option>
					<option value="mossy" <?php selected('mossy', $options['texture']); ?>>Mossy Cobblestone</option>
					<option value="cobblestone" <?php selected('cobblestone', $options['texture']); ?>>Cobblestone</option>
					<option value="stone" <?php selected('stone', $options['texture']); ?>>Stone</option>
					<option value="coal" <?php selected('coal', $options['texture']); ?>>Coal</option>
					<option value="lapis" <?php selected('lapis', $options['texture']); ?>>Lapis Lazuli</option>
					<option value="iron" <?php selected('iron', $options['texture']); ?>>Iron</option>
					<option value="redstone" <?php selected('redstone', $options['texture']); ?>>Redstone</option>
					<option value="gold" <?php selected('gold', $options['texture']); ?>>Gold</option>
					<option value="diamond" <?php selected('diamond', $options['texture']); ?>>Diamond</option>
					<option value="obsidian" <?php selected('obsidian', $options['texture']); ?>>Obsidian</option>
					<option value="bedrock" <?php selected('bedrock', $options['texture']); ?>>Bedrock</option>
					<option value="wood" <?php selected('wood', $options['texture']); ?>>Wood</option>
					<option value="plank" <?php selected('plank', $options['texture']); ?>>Plank</option>
					<option value="brick" <?php selected('brick', $options['texture']); ?>>Brick</option>
					<option value="glass" <?php selected('glass', $options['texture']); ?>>Glass</option>
					<option value="tnt" <?php selected('tnt', $options['texture']); ?>>TNT</option>
					<option value="table" <?php selected('table', $options['texture']); ?>>Crafting Table</option>
					<option value="chest" <?php selected('chest', $options['texture']); ?>>Chest</option>
					<option value="bookshelf" <?php selected('bookshelf', $options['texture']); ?>>Bookshelf</option>
					<option value="creeper" <?php selected('creeper', $options['texture']); ?>>Creeper</option>
					<option value="pig" <?php selected('pig', $options['texture']); ?>>Pig</option>
					<option value="skeleton" <?php selected('skeleton', $options['texture']); ?>>Skeleton</option>
					<option value="player" <?php selected('player', $options['texture']); ?>>Player</option>
				</select>
			</td></tr>
			<tr><th scope="row">Block Link URL</th>
			<td>Customize the link URL of the auto-block:<br />
				<input type="text" name="minecraft_block_settings[url]" style="width:400px" value="<?php echo $options['url'] ?>" />
			</td></tr>
			<tr><th scope="row">Block Preview</th>
			<td>
				<?php minecraft_block_create(false, 'minecraft-block-preview'); ?>
			</td></tr>
		</table>
		<input type="hidden" name="minecraft_block_settings[update]" value="Updated" />
		<p class="submit">
			<input type="submit" class="button-primary" value="<?php _e('Save Settings') ?>" />
		</p>
	</form>
	<form method="post" action="options.php">
		<?php settings_fields('minecraft_block_settings'); 
		global $minecraft_block_defaults; 
		foreach( (array)$minecraft_block_defaults as $key => $value ) : ?>
		<input type="hidden" name="minecraft_block_settings[<?php echo $key; ?>]" value="<?php echo $value; ?>" />
		<?php endforeach; ?>
		<input type="hidden" name="minecraft_block_settings[update]" value="Reset" />
		<p class="submit">
			<input type="submit" class="button" value="<?php _e('Reset Settings') ?>" />
		</p>
	</form>
</div>
<?php }

function minecraft_block_settings_update_check() {
	global $minecraft_block_settings;
	if(isset($minecraft_block_settings['update'])) {
		echo '<div class="updated fade" id="message"><p>Minecraft Block '.$minecraft_block_settings['update'].'.</p></div>';
		unset($minecraft_block_settings['update']);
		update_option('minecraft_block_settings', $minecraft_block_settings);
	}
}

function minecraft_block_settings_validate($input) {
	$input['enable'] = ($input['enable'] == 1 ? 1 : 0);
	$input['texture'] = wp_filter_nohtml_kses($input['texture']);
	$input['div'] = wp_filter_nohtml_kses($input['div']);
	$input['url'] = clean_url($input['url']);
	return $input;
}

function minecraft_block_create($texture = false, $id = false, $class = false, $url = false, $echo = true) {
	global $minecraft_block_settings;
	if ( !$texture ) { $texture = $minecraft_block_settings['texture']; }
	if ( $texture == '') { $texture = 'dirt'; }
	if ( !$id ) { $id = $minecraft_block_settings['div']; }
	if ( $class ) { $class = ' class="' . $class . '"'; } else { $class = ''; }
	if ( !$url ) { $url = $minecraft_block_settings['url']; }
	if ( $url == '' ) { $url = 'http://www.minecraft.net'; }; 
	$block = '
<!-- The Minecraft Block Plugin by Drew Gourley, http://drewgourley.com/the-minecraft-block-plugin | Minecraft is Awesome http://www.minecraft.net -->
<div id="' . $id . '"' . $class . '>
	<div class="minecraft ' . $texture . '">	
		<div class="cube">
			<!--bottom-->
			<div class="face six"><a href="' . $url . '" target="_blank"></a></div>
			<!--back-->
			<div class="face five"><a href="' . $url . '" target="_blank"></a></div>
			<!--left-->
			<div class="face four"><a href="' . $url . '" target="_blank"></a></div>
			<!--top-->
			<div class="face one"><a href="' . $url . '" target="_blank"></a></div>
			<!--right-->
			<div class="face two"><a href="' . $url . '" target="_blank"></a></div>
			<!--front-->
			<div class="face three"><a href="' . $url . '" target="_blank"></a></div>
		</div>	
	</div>
</div>
';
	if ( $echo ) { echo $block; } else { return $block; };
}
function minecraft_block_autoblock() {
	global $minecraft_block_settings; 
	if($minecraft_block_settings['enable']) { 
		add_action('wp_footer', 'minecraft_block_create'); 
	}
}
add_action('init', 'minecraft_block_autoblock');
function minecraft_block_style() {
	wp_enqueue_style('minecraft-block', plugins_url('css/block.css', __FILE__), 'screen');
}
add_action('wp_enqueue_scripts', 'minecraft_block_style');
function minecraft_admin_style() {
	wp_enqueue_style('minecraft-admin', plugins_url('css/admin.css', __FILE__), 'screen');
	if ( $_GET['page'] == 'minecraft_block' ) {
		wp_enqueue_style('minecraft-block', plugins_url('css/block.css', __FILE__), 'screen');
		wp_enqueue_script('minecraft-block-switcher', plugins_url('js/admin.js', __FILE__), array('jquery'));
	}
}
add_action('admin_enqueue_scripts', 'minecraft_admin_style');

class minecraft_block_shortcode {
	function minecraft_block_shortcode() {
		global $wp_version;
		// The current version
		define('MINECRAFT_BLOCK_VERSION', '1.0');
		// Check for WP2.6 installation
		if (!defined ('IS_WP26'))
			define('IS_WP26', version_compare($wp_version, '2.6', '>=') );
		//This works only in WP2.6 or higher
		if ( IS_WP26 == FALSE) {
			add_action('admin_notices', create_function('', 'echo \'<div id="message" class="error fade"><p><strong>' . __('Sorry, the Minecraft Block Shortcode works only under WordPress 2.6 or higher') . '</strong></p></div>\';'));
			return;
		}
		// define URL
		define('MINECRAFT_BLOCK_ABSPATH', WP_PLUGIN_DIR.'/'.plugin_basename( dirname(__FILE__) ).'/' );
		define('MINECRAFT_BLOCK_URLPATH', WP_PLUGIN_URL.'/'.plugin_basename( dirname(__FILE__) ).'/' );
		include_once (dirname (__FILE__)."/lib/shortcodes.php");
		include_once (dirname (__FILE__)."/tinymce/tinymce.php");
	}
}
// Start this plugin once all other plugins are fully loaded
add_action( 'plugins_loaded', create_function( '', 'global $minecraft_block_shortcode; $minecraft_block_shortcode = new minecraft_block_shortcode();' ) );
?>