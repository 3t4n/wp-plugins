<?php
/*
Plugin Name: azurecurve BBCode
Plugin URI: http://development.azurecurve.co.uk/plugins/bbcode

Description: Allows some common BB code to be used in place of html on pages and posts.
Version: 2.0.4

Author: azurecurve
Author URI: http://development.azurecurve.co.uk

This program is free software; you can redistribute it and/or
modify it under the terms of the GNU General Public License
as published by the Free Software Foundation; either version 2
of the License, or (at your option) any later version.

This program is distributed in the hope that it will be useful,
but WITHOUT ANY WARRANTY; without even the implied warranty of
MERCHANTABILITY or FITNESS FOR A PARTICULAR PURPOSE. See the
GNU General Public License for more details.

You should have received a copy of the GNU General Public License
along with this program; if not, write to the Free Software
Foundation, Inc., 51 Franklin Street, Fifth Floor, Boston, MA 02110-1301, USA.

The full copy of the GNU General Public License is available here: http://www.gnu.org/licenses/gpl.txt

*/

function azc_bbcode_bold($atts, $content = null) {
	return "<span class='azc_bbc_bold'>".do_shortcode($content)."</span>";
}
add_shortcode( 'b', 'azc_bbcode_bold' );
add_shortcode( 'B', 'azc_bbcode_bold' );

function azc_bbcode_italic($atts, $content = null) {
	return "<span class='azc_bbc_italic'>".do_shortcode($content)."</span>";
}
add_shortcode( 'i', 'azc_bbcode_italic' );
add_shortcode( 'I', 'azc_bbcode_italic' );

function azc_bbcode_underline($atts, $content = null) {
	return "<span class='azc_bbc_underline'>".do_shortcode($content)."</span>";
}
add_shortcode( 'u', 'azc_bbcode_underline' );
add_shortcode( 'U', 'azc_bbcode_underline' );

function azc_bbcode_ol($atts, $content = null) {
	return "<ol class='azc_bbc_ol'>".do_shortcode($content)."</ol>";
}
add_shortcode( 'ol', 'azc_bbcode_ol' );
add_shortcode( 'OL', 'azc_bbcode_ol' );

function azc_bbcode_ul($atts, $content = null) {
	return "<ul class='azc_bbc_ul'>".do_shortcode($content)."</ul>";
}
add_shortcode( 'ul', 'azc_bbcode_ul' );
add_shortcode( 'UL', 'azc_bbcode_ul' );

function azc_bbcode_li($atts, $content = null) {
	return "<li class='azc_bbc_li'>".do_shortcode($content)."</li>";
}
add_shortcode( 'li', 'azc_bbcode_li' );
add_shortcode( 'LI', 'azc_bbcode_li' );

function azc_bbcode_table($atts, $content = null) {
	return "<table class='azc_bbc_table'>".do_shortcode($content)."</table>";
}
add_shortcode( 'table', 'azc_bbcode_table' );
add_shortcode( 'TABLE', 'azc_bbcode_table' );

function azc_bbcode_tr($atts, $content = null) {
	return "<tr class='azc_bbc_tr'>".do_shortcode($content)."</tr>";
}
add_shortcode( 'tr', 'azc_bbcode_tr' );
add_shortcode( 'TR', 'azc_bbcode_tr' );

function azc_bbcode_th($atts, $content = null) {
	return "<th class='azc_bbc_th'>".do_shortcode($content)."</th>";
}
add_shortcode( 'th', 'azc_bbcode_th' );
add_shortcode( 'TH', 'azc_bbcode_th' );

function azc_bbcode_td($atts, $content = null) {
	return "<td class='azc_bbc_td'>".do_shortcode($content)."</td>";
}
add_shortcode( 'td', 'azc_bbcode_td' );
add_shortcode( 'TD', 'azc_bbcode_td' );

function azc_bbcode_strike($atts, $content = null) {
	return "<span class='azc_bbc_strike'>".do_shortcode($content)."</span>";
}
add_shortcode( 'strike', 'azc_bbcode_strike' );
add_shortcode( 'STRIKE', 'azc_bbcode_strike' );
add_shortcode( 's', 'azc_bbcode_strike' );
add_shortcode( 'S', 'azc_bbcode_strike' );

function azc_bbcode_url($atts, $content = null) {
	if (empty($atts)){
		$return = "<a class='azc_bbc_url' href='$content'>".$content."</a>";
	}else{
		$attribs = implode('',$atts);
		$url = substr ( $attribs, 1);
		$url = str_replace("'", '', str_replace('"', '', $url));
		
		$return = "<a href='$url' class='azc_bbc_url'>".$content."</a>";
	}
	return $return;
}
add_shortcode( 'url', 'azc_bbcode_url' );
add_shortcode( 'URL', 'azc_bbcode_url' );
add_shortcode( 'link', 'azc_bbcode_url' );
add_shortcode( 'LINK', 'azc_bbcode_url' );

function azc_bbcode_color($atts, $content = null) {
	if (empty($atts)){
		$color = 'black';
	}else{
		$attribs = implode('',$atts);
		$color = str_replace("'", '', str_replace('"', '', substr ( $attribs, 1)));
		if(ctype_xdigit($color)) {
			$color = '#'.$color;
		}
	}
	return "<span style='color: $color; '>".do_shortcode($content)."</span>";
}
add_shortcode( 'color', 'azc_bbcode_color' );
add_shortcode( 'COLOR', 'azc_bbcode_color' );
add_shortcode( 'colour', 'azc_bbcode_color' );
add_shortcode( 'COLOUR', 'azc_bbcode_color' );


function azc_bbcode_quote($atts, $content = null) {
	if (empty($atts)){
		$return_quote = "<blockquote class='azc_bbc_quote'>".do_shortcode($content)."</blockquote>";
	}else{
		$attribs = implode('',$atts);
		$cite = str_replace("'", '', str_replace('"', '', substr ( $attribs, 1)));
		$return_quote = "<div class='azc_bbc_quote'>$cite wrote:<blockquote class='azc_bbc_quote'>".do_shortcode($content)."</blockquote></div>";
	}
	return $return_quote;
}
add_shortcode( 'q', 'azc_bbcode_quote' );
add_shortcode( 'Q', 'azc_bbcode_quote' );
add_shortcode( 'quote', 'azc_bbcode_quote' );
add_shortcode( 'QUOTE', 'azc_bbcode_quote' );
add_shortcode( 'blockquote', 'azc_bbcode_quote' );
add_shortcode( 'BLOCKQUOTE', 'azc_bbcode_quote' );


function azc_bbcode_code($atts, $content = null) {
	return "<pre class='azc_bbc_code'><code class='azc_bbc_code'>".do_shortcode($content)."</code></pre>";
}
add_shortcode( 'code', 'azc_bbcode_code' );
add_shortcode( 'CODE', 'azc_bbcode_code' );

function azc_bbcode_size($atts, $content = null) {
	if (empty($atts)){
		$size = '1em';
	}else{
		$attribs = implode('',$atts);
		$size = str_replace("'", '', str_replace('"', '', substr ( $attribs, 1)));
	}
	return "<span style='font-size: $size;'>".do_shortcode($content)."</span>";
}
add_shortcode( 'size', 'azc_bbcode_size' );
add_shortcode( 'SIZE', 'azc_bbcode_size' );


function azc_bbcode_img($atts, $content = null) {
	if (empty($atts)){
		$title = '';
	}else{
		$attribs = implode('',$atts);
		$title = str_replace("'", '', str_replace('"', '', substr ( $attribs, 1)));
	}
	if (strlen($title) > 0) { $title = "title='$title' alt='$title'"; }
	return "<img class='azc_bbc_image' src='$content' $title />";
}
add_shortcode( 'img', 'azc_bbcode_img' );
add_shortcode( 'IMG', 'azc_bbcode_img' );

function azc_bbcode_centre($atts, $content = null) {
	return "<center class='azc_bbc_center'>".do_shortcode($content)."</center>";
}
add_shortcode( 'center', 'azc_bbcode_centre' );
add_shortcode( 'CENTER', 'azc_bbcode_centre' );
add_shortcode( 'centre', 'azc_bbcode_centre' );
add_shortcode( 'CENTRE', 'azc_bbcode_centre' );

function azc_bbc_load_css(){
	wp_enqueue_style( 'azurecurve-bbcode', plugins_url( 'style.css', __FILE__ ) );
}
add_action('wp_enqueue_scripts', 'azc_bbc_load_css');

// Add Action Link
function azc_bb_plugin_action_links($links, $file) {
    static $this_plugin;

    if (!$this_plugin) {
        $this_plugin = plugin_basename(__FILE__);
    }

    if ($file == $this_plugin) {
        $settings_link = '<a href="' . get_bloginfo('wpurl') . '/wp-admin/admin.php?page=azc-bb">'.__('Settings' ,'azc-bb').'</a>';
        array_unshift($links, $settings_link);
    }

    return $links;
}
add_filter('plugin_action_links', 'azc_bb_plugin_action_links', 10, 2);

// azurecurve menu
if (!function_exists('azc_create_plugin_menu')){
	function azc_create_plugin_menu() {
		global $admin_page_hooks;
		
		if ( empty ( $admin_page_hooks['azc-menu-test'] ) ){
			add_menu_page( "azurecurve Plugins"
							,"azurecurve"
							,'manage_options'
							,"azc-plugin-menus"
							,"azc_plugin_menus"
							,plugins_url( '/images/Favicon-16x16.png', __FILE__ ) );
			add_submenu_page( "azc-plugin-menus"
								,"Plugins"
								,"Plugins"
								,'manage_options'
								,"azc-plugin-menus"
								,"azc_plugin_menus" );
		}
	}
	add_action("admin_menu", "azc_create_plugin_menu");
}

function azc_create_bbcode_plugin_menu() {
	global $admin_page_hooks;
    
	add_submenu_page( "azc-plugin-menus"
						,"BBCode"
						,"BBCode"
						,'manage_options'
						,"azc-bbcode"
						,"azc_bbcode_settings" );
}
add_action("admin_menu", "azc_create_bbcode_plugin_menu");

function azc_bbcode_settings() {
	if (!current_user_can('manage_options')) {
		$error = new WP_Error('not_found', __('You do not have sufficient permissions to access this page.' , 'azc_bbcode'), array('response' => '200'));
		if(is_wp_error($error)){
			wp_die($error, '', $error->get_error_data());
		}
    }
	?>
	<div id="azc-t-general" class="wrap">
			<h2>azurecurve BBCode</h2>

				<table class="form-table">
					<tr>
						<th scope="row" colspan="2">
							<label for="explanation">
								azurecurve BBCode <?php _e('provides the following shortcodes for converting into BB Codes when used on posts and pages:', 'azc_bbcode'); ?>
							</label>
						</th>
					</tr>
					<tr><th scope="row">Bold</th><td>[b][/b]</td></tr>
					<tr><th scope="row">Italic</th><td>[i][/i]</td></tr>
					<tr><th scope="row">Underline</th><td>[u][/u]</td></tr>
					<tr><th scope="row">Center Text</th><td>[center]centered text[/center]</td></tr>
					<tr><th scope="row">Strike</th><td>[s]strike this out[/s] [strike]strike this out[/strike]</td></tr>
					<tr><th scope="row">Quote</th><td>[quote]Lorem ipsum dolor sit amet, consectetuer adipiscing elit,[/quote] [quote=NAME]Lorem ipsum dolor sit amet[/quote]</td></tr>
					<tr><th scope="row">Color</th><td>[color="red"]red[/color] [color="ff0000"]hex red[/color] [color=#ff0000]hex red[/color]</td></tr>
					<tr><th scope="row">Font Size</th><td>[size=12pt]12pt font size[/size] [size=1.2em]1.2em font size[/size] [size=12px]12px font size[/size]</td></tr>
					<tr><th scope="row">Image</th><td>[img]http://s.wordpress.org/style/images/codeispoetry.png[/img] [img=Code is Poetry]http://s.wordpress.org/style/images/codeispoetry.png[/img]</td></tr>
					<tr><th scope="row">URL</th><td>[url]http://development.org/[/url] [url=http://development.org/]WordPress[/url] [link]http://development.org/[/link] [link=http://development.org/]WordPress[/link]</td></tr>
					<tr><th scope="row">Ordered List</th><td>[ol][li][/li][li][/li][/ol]</td></tr>
					<tr><th scope="row">Unordered List</th><td>[ul][li][/li][li][/li][/ul]</td></tr>
					<tr><th scope="row">Tables</th><td>[table][tr][th][/th][th][/th][/tr][tr][td][/td][td][/td][/tr][tr][td][/td][td][/td][/tr][/table]</td></tr>
					<tr><th scope="row">Code</th><td>[code]function azc_bbcode_bold($atts, $content = null) { return "<span class='azc_bbc_bold'>".do_shortcode($content)."</span>"; }[/code]</td></tr>
					<tr>
						<th scope="row" colspan="2">
							<label for="additional-plugins">
								azurecurve <?php _e('has the following plugins which allow shortcodes to be used in comments and widgets:', 'azc_bbcode'); ?>
							</label>
							<ul class='azc_plugin_index'>
								<li>
									<?php
									if ( is_plugin_active( 'azurecurve-shortcodes-in-comments/azurecurve-shortcodes-in-comments.php' ) ) {
										echo "<a href='admin.php?page=azc-sic' class='azc_plugin_index'>Shortcodes in Comments</a>";
									}else{
										echo "<a href='https://wordpress.org/plugins/azurecurve-shortcodes-in-comments/' class='azc_plugin_index'>Shortcodes in Comments</a>";
									}
									?>
								</li>
								<li>
									<?php
									if ( is_plugin_active( 'azurecurve-shortcodes-in-widgets/azurecurve-shortcodes-in-widgets.php' ) ) {
										echo "<a href='admin.php?page=azc-siw' class='azc_plugin_index'>Shortcodes in Widgets</a>";
									}else{
										echo "<a href='https://wordpress.org/plugins/azurecurve-shortcodes-in-widgets/' class='azc_plugin_index'>Shortcodes in Widgets</a>";
									}
									?>
								</li>
							</ul>
						</th>
					</tr>
				</table>
	</div>
<?php }

if (!function_exists('azc_plugin_index_load_css')){
	function azc_plugin_index_load_css(){
		wp_enqueue_style( 'azurecurve_plugin_index', plugins_url( 'pluginstyle.css', __FILE__ ) );
	}
	add_action('admin_head', 'azc_plugin_index_load_css');
}

if (!function_exists('azc_plugin_menus')){
	function azc_plugin_menus() {
		echo "<h3>azurecurve Plugins";
		
		echo "<div style='display: block;'><h4>Active</h4>";
		echo "<span class='azc_plugin_index'>";
		if ( is_plugin_active( 'azurecurve-bbcode/azurecurve-bbcode.php' ) ) {
			echo "<a href='admin.php?page=azc-bbcode' class='azc_plugin_index'>BBCode</a>";
		}
		if ( is_plugin_active( 'azurecurve-comment-validator/azurecurve-comment-validator.php' ) ) {
			echo "<a href='admin.php?page=azc-cv' class='azc_plugin_index'>Comment Validator</a>";
		}
		if ( is_plugin_active( 'azurecurve-conditional-links/azurecurve-conditional-page-links.php' ) ) {
			echo "<a href='admin.php?page=azc-cl' class='azc_plugin_index'>Conditional Links</a>";
		}
		if ( is_plugin_active( 'azurecurve-display-after-post-content/azurecurve-display-after-post-content.php' ) ) {
			echo "<a href='admin.php?page=azc-dapc' class='azc_plugin_index'>Display After Post Content</a>";
		}
		if ( is_plugin_active( 'azurecurve-filtered-categories/azurecurve-filtered-categories.php' ) ) {
			echo "<a href='admin.php?page=azc-fc' class='azc_plugin_index'>Filtered Categories</a>";
		}
		if ( is_plugin_active( 'azurecurve-flags/azurecurve-flags.php' ) ) {
			echo "<a href='admin.php?page=azc-f' class='azc_plugin_index'>Flags</a>";
		}
		if ( is_plugin_active( 'azurecurve-floating-featured-image/azurecurve-floating-featured-image.php' ) ) {
			echo "<a href='admin.php?page=azc-ffi' class='azc_plugin_index'>Floating Featured Image</a>";
		}
		if ( is_plugin_active( 'azurecurve-get-plugin-info/azurecurve-get-plugin-info.php' ) ) {
			echo "<a href='admin.php?page=azc-gpi' class='azc_plugin_index'>Get Plugin Info</a>";
		}
		if ( is_plugin_active( 'azurecurve-icons/azurecurve-icons.php' ) ) {
			echo "<a href='admin.php?page=azc-f' class='azc_plugin_index'>Icons</a>";
		}
		if ( is_plugin_active( 'azurecurve-insult-generator/azurecurve-insult-generator.php' ) ) {
			echo "<a href='admin.php?page=azc-ig' class='azc_plugin_index'>Insult Generator</a>";
		}
		if ( is_plugin_active( 'azurecurve-mobile-detection/azurecurve-mobile-detection.php' ) ) {
			echo "<a href='admin.php?page=azc-md' class='azc_plugin_index'>Mobile Detection</a>";
		}
		if ( is_plugin_active( 'azurecurve-multisite-favicon/azurecurve-multisite-favicon.php' ) ) {
			echo "<a href='admin.php?page=azc-msf' class='azc_plugin_index'>Multisite Favicon</a>";
		}
		if ( is_plugin_active( 'azurecurve-page-index/azurecurve-page-index.php' ) ) {
			echo "<a href='admin.php?page=azc-pi' class='azc_plugin_index'>Page Index</a>";
		}
		if ( is_plugin_active( 'azurecurve-posts-archive/azurecurve-posts-archive.php' ) ) {
			echo "<a href='admin.php?page=azc-pa' class='azc_plugin_index'>Posts Archive</a>";
		}
		if ( is_plugin_active( 'azurecurve-rss-feed/azurecurve-rss-feed.php' ) ) {
			echo "<a href='admin.php?page=azc-rssf' class='azc_plugin_index'>RSS Feed</a>";
		}
		if ( is_plugin_active( 'azurecurve-rss-suffix/azurecurve-rss-suffix.php' ) ) {
			echo "<a href='admin.php?page=azc-rsss' class='azc_plugin_index'>RSS Suffix</a>";
		}
		if ( is_plugin_active( 'azurecurve-series-index/azurecurve-series-index.php' ) ) {
			echo "<a href='admin.php?page=azc-si' class='azc_plugin_index'>Series Index</a>";
		}
		if ( is_plugin_active( 'azurecurve-shortcodes-in-comments/azurecurve-shortcodes-in-comments.php' ) ) {
			echo "<a href='admin.php?page=azc-sic' class='azc_plugin_index'>Shortcodes in Comments</a>";
		}
		if ( is_plugin_active( 'azurecurve-shortcodes-in-widgets/azurecurve-shortcodes-in-widgets.php' ) ) {
			echo "<a href='admin.php?page=azc-siw' class='azc_plugin_index'>Shortcodes in Widgets</a>";
		}
		if ( is_plugin_active( 'azurecurve-tag-cloud/azurecurve-tag-cloud.php' ) ) {
			echo "<a href='admin.php?page=azc-tc' class='azc_plugin_index'>Tag Cloud</a>";
		}
		if ( is_plugin_active( 'azurecurve-taxonomy-index/azurecurve-taxonomy-index.php' ) ) {
			echo "<a href='admin.php?page=azc-ti' class='azc_plugin_index'>Taxonomy Index</a>";
		}
		if ( is_plugin_active( 'azurecurve-theme-switcher/azurecurve-theme-switcher.php' ) ) {
			echo "<a href='admin.php?page=azc-ts' class='azc_plugin_index'>Theme Switcher</a>";
		}
		if ( is_plugin_active( 'azurecurve-timelines/azurecurve-timelines.php' ) ) {
			echo "<a href='admin.php?page=azc-t' class='azc_plugin_index'>Timelines</a>";
		}
		if ( is_plugin_active( 'azurecurve-toggle-showhide/azurecurve-toggle-showhide.php' ) ) {
			echo "<a href='admin.php?page=azc-tsh' class='azc_plugin_index'>Toggle Show/Hide</a>";
		}
		echo "</span></div>";
		echo "<p style='clear: both' />";
		
		echo "<div style='display: block;'><h4>Other Available Plugins</h4>";
		echo "<span class='azc_plugin_index'>";
		if ( !is_plugin_active( 'azurecurve-bbcode/azurecurve-bbcode.php' ) ) {
			echo "<a href='https://wordpress.org/plugins/azurecurve-bbcode/' class='azc_plugin_index'>BBCode</a>";
		}
		if ( !is_plugin_active( 'azurecurve-comment-validator/azurecurve-comment-validator.php' ) ) {
			echo "<a href='https://wordpress.org/plugins/azurecurve-comment-validator/' class='azc_plugin_index'>Comment Validator</a>";
		}
		if ( !is_plugin_active( 'azurecurve-conditional-links/azurecurve-conditional-page-links.php' ) ) {
			echo "<a href='https://wordpress.org/plugins/azurecurve-conditional-links/' class='azc_plugin_index'>Conditional Links</a>";
		}
		if ( !is_plugin_active( 'azurecurve-display-after-post-content/azurecurve-display-after-post-content.php' ) ) {
			echo "<a href='https://wordpress.org/plugins/azurecurve-display-after-post-content/' class='azc_plugin_index'>Display After Post Content</a>";
		}
		if ( !is_plugin_active( 'azurecurve-filtered-categories/azurecurve-filtered-categories.php' ) ) {
			echo "<a href='https://wordpress.org/plugins/azurecurve-filtered-categories/' class='azc_plugin_index'>Filtered Categories</a>";
		}
		if ( !is_plugin_active( 'azurecurve-flags/azurecurve-flags.php' ) ) {
			echo "<a href='https://wordpress.org/plugins/azurecurve-flags/' class='azc_plugin_index'>Flags</a>";
		}
		if ( !is_plugin_active( 'azurecurve-floating-featured-image/azurecurve-floating-featured-image.php' ) ) {
			echo "<a href='https://wordpress.org/plugins/azurecurve-floating-featured-image/' class='azc_plugin_index'>Floating Featured Image</a>";
		}
		if ( !is_plugin_active( 'azurecurve-get-plugin-info/azurecurve-get-plugin-info.php' ) ) {
			echo "<a href='https://wordpress.org/plugins/azurecurve-get-plugin-info/' class='azc_plugin_index'>Get Plugin Info</a>";
		}
		if ( !is_plugin_active( 'azurecurve-icons/azurecurve-icons.php' ) ) {
			echo "<a href='https://wordpress.org/plugins/azurecurve-icons/' class='azc_plugin_index'>Icons</a>";
		}
		if ( !is_plugin_active( 'azurecurve-insult-generator/azurecurve-insult-generator.php' ) ) {
			echo "<a href='https://wordpress.org/plugins/azurecurve-insult-generator/' class='azc_plugin_index'>Insult Generator</a>";
		}
		if ( !is_plugin_active( 'azurecurve-mobile-detection/azurecurve-mobile-detection.php' ) ) {
			echo "<a href='https://wordpress.org/plugins/azurecurve-mobile-detection/' class='azc_plugin_index'>Mobile Detection</a>";
		}
		if ( !is_plugin_active( 'azurecurve-multisite-favicon/azurecurve-multisite-favicon.php' ) ) {
			echo "<a href='https://wordpress.org/plugins/azurecurve-multisite-favicon/' class='azc_plugin_index'>Multisite Favicon</a>";
		}
		if ( !is_plugin_active( 'azurecurve-page-index/azurecurve-page-index.php' ) ) {
			echo "<a href='https://wordpress.org/plugins/azurecurve-page-index/' class='azc_plugin_index'>Page Index</a>";
		}
		if ( !is_plugin_active( 'azurecurve-posts-archive/azurecurve-posts-archive.php' ) ) {
			echo "<a href='https://wordpress.org/plugins/azurecurve-posts-archive/' class='azc_plugin_index'>Posts Archive</a>";
		}
		if ( !is_plugin_active( 'azurecurve-rss-feed/azurecurve-rss-feed.php' ) ) {
			echo "<a href='https://wordpress.org/plugins/azurecurve-rss-feed/' class='azc_plugin_index'>RSS Feed</a>";
		}
		if ( !is_plugin_active( 'azurecurve-rss-suffix/azurecurve-rss-suffix.php' ) ) {
			echo "<a href='https://wordpress.org/plugins/azurecurve-rss-suffix/' class='azc_plugin_index'>RSS Suffix</a>";
		}
		if ( !is_plugin_active( 'azurecurve-series-index/azurecurve-series-index.php' ) ) {
			echo "<a href='https://wordpress.org/plugins/azurecurve-series-index/' class='azc_plugin_index'>Series Index</a>";
		}
		if ( !is_plugin_active( 'azurecurve-shortcodes-in-comments/azurecurve-shortcodes-in-comments.php' ) ) {
			echo "<a href='https://wordpress.org/plugins/azurecurve-shortcodes-in-comments/' class='azc_plugin_index'>Shortcodes in Comments</a>";
		}
		if ( !is_plugin_active( 'azurecurve-shortcodes-in-widgets/azurecurve-shortcodes-in-widgets.php' ) ) {
			echo "<a href='https://wordpress.org/plugins/azurecurve-shortcodes-in-widgets/' class='azc_plugin_index'>Shortcodes in Widgets</a>";
		}
		if ( !is_plugin_active( 'azurecurve-tag-cloud/azurecurve-tag-cloud.php' ) ) {
			echo "<a href='https://wordpress.org/plugins/azurecurve-tag-cloud/' class='azc_plugin_index'>Tag Cloud</a>";
		}
		if ( !is_plugin_active( 'azurecurve-taxonomy-index/azurecurve-taxonomy-index.php' ) ) {
			echo "<a href='https://wordpress.org/plugins/azurecurve-taxonomy-index/' class='azc_plugin_index'>Taxonomy Index</a>";
		}
		if ( !is_plugin_active( 'azurecurve-theme-switcher/azurecurve-theme-switcher.php' ) ) {
			echo "<a href='https://wordpress.org/plugins/azurecurve-theme-switcher/' class='azc_plugin_index'>Theme Switcher</a>";
		}
		if ( !is_plugin_active( 'azurecurve-timelines/azurecurve-timelines.php' ) ) {
			echo "<a href='https://wordpress.org/plugins/azurecurve-timelines/' class='azc_plugin_index'>Timelines</a>";
		}
		if ( !is_plugin_active( 'azurecurve-toggle-showhide/azurecurve-toggle-showhide.php' ) ) {
			echo "<a href='https://wordpress.org/plugins/azurecurve-toggle-showhide/' class='azc_plugin_index'>Toggle Show/Hide</a>";
		}
		echo "</span></div>";
	}
}

?>