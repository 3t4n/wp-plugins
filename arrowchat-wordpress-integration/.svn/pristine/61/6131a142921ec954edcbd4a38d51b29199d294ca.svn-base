<?PHP
/*
Plugin Name: Arrowchat WordPress Integration
Plugin URI: http://www.spidermarket.com/index/plugins/arrowchat-wordpress-integration
Description: ArrowChat is a Facebook style chat plugin. It works well, and is a great addition to sites looking for a social solution. Similar to Wibiya, the Meebo toolbar and CometChat, Arrowchat functions independently from WordPress, which means that the user must install it. This plugin makes installation much easier and more streamlined by circumventing the process of having to modify theme files.
Version: 1.0.2
Author: Joshua Unseth
Author URI: http://www.spidermarket.com
*/

/*  Copyright 2011  Arrowchat Integration (email : arrowchat@spidermarket.com)

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
*/

define('arwcht_hooks_version', '1.0.2');

/**
 * Echoes whatever the user wants in the header.
 */
function arwcht_hooks_head() { echo get_option('arwcht_hooks_head'); echo get_option('arwcht_hooks_head_ubiquitous'); }

/**
 * Echoes whatever the user wants in the footer.
 */
function arwcht_hooks_footer() { echo  get_option('arwcht_hooks_footer'); echo get_option('arwcht_hooks_footer_ubiquitous'); }

/**
 * Echoes whatever the user wants in the header.
 */
function arwcht_hooks_head_admin() { echo('<style>.arrowchat-clickable-area{padding:5px 5px 5px 5px;} .arrowchat-clickable-area:hover{display:block;width:100%;background-color:#3d6f99;padding5px 5px 5px 5px;} .arrowchat-clickable-area a:link,.arrowchat-clickable-area a:visited{color:#333;text-decoration:none;} .arrowchat-clickable-area a:active,.arrowchat-clickable-area a:hover{color:#fff;text-decoration:none;}</style>');echo get_option('arwcht_hooks_head_admin'); echo get_option('arwcht_hooks_head_ubiquitous');echo ("<!--BEGIN: JAVASCRIPT HIDDEN/SHOW-->
<!--<script language=\"javascript\">
	function toggle(text) {
		var ele = text.parentNode.getElementsByTagName('DIV')[0];
		if(ele.style.display == \"block\") {
	    		ele.style.display = \"none\";
			text.innerHTML = \"Show\";
	  	}
		else {
			ele.style.display = \"block\";
			text.innerHTML = \"Hide\";
		}
	}
	</script>-->");}

/**
 * Echoes whatever the user wants in the admin footer.
 */
function arwcht_hooks_footer_admin() { echo  get_option('arwcht_hooks_footer_admin'); echo get_option('arwcht_hooks_footer_ubiquitous'); }

/**
 * The hooks options page
 */
function arwcht_hooks_options_page() {

	// implode the config option keys for use in the page_options hidden field
	$plugin_options = implode(',', array_keys(arwcht_hooks_get_default_options()));

	?>
<a href="http://junseth.arrowchat.hop.clickbank.net"><div style="width:100%;height:106px;background:url('<?php bloginfo('url'); ?>/wp-content/plugins/arrowchat-wp-integration/images/header-background.gif') repeat-x;"><div style="width: 254px; height: 33px; background: url('http://static.arrowchat.com/images/logo.png') no-repeat;overflow: hidden;padding:20px 10px;text-indent: -9999px;margin-bottom: 8px;">Arrowchat</div></div></a>
	<div class="arrowchat-clickable-area"><a href="http://junseth.arrowchat.hop.clickbank.net/"><p>
		Arrowchat Integration seamlessly integrates arrowchat into your theme without requiring you to modify any of the template files. Currently this plugin adds code to both the frontend of the site and the admin backend, which will allow an administrator to connect to his site's users even while making adjustments to the site's backend.
	</p></a></div>
		<div class="wrap">
<!--BEGIN: OBFUSCATED TEXT--><!--<a href="#" onclick="toggle(this); return false;">Show</a>
		<div  style="display: none">-->
	<form method="post" action="options.php">
		<?php
		
		// WP and WPMU 2.7+ use settings_fields(), 2.1+ use wp_nonce_field()
		if (function_exists('settings_fields')) {
		
			settings_fields('arwcht-hooks-options');
		
		} else {
		
			wp_nonce_field('update-options');
			
			?>
			<input type="hidden" name="action" value="update" />
			<input type="hidden" name="page_options" value="<?php echo $plugin_options; ?>" />
			<?php
		
		}
		
		?>
		<table class="form-table arwcht_hooks_options">
			<tr valign="top">
				<td><?php $bloginfo = get_theme_root();$position = strpos($bloginfo,'wp-content'); $rootpath = substr($bloginfo,0,$position); $address_check = "$rootpath/arrowchat/external.php"; ?>
					<?php clearstatcache(); if(file_exists("$address_check")){echo "<div style=\"font-weight:bold;color:green;\">It appears that you have uploaded ArrowChat correctly. More than likely you will not need to change the following text. If it is correct, click \"Save Changes\" and be on your merry way. Otherwise make any adjustments you might need to.</div>";?>
<h3>Header Content</h3>
<textarea rows="3" cols="85" name="arwcht_hooks_head_ubiquitous"><?php $checkoptions=htmlentities(get_option('arwcht_hooks_head_ubiquitous'));if($checkoptions == ""): unset($checkoptions); endif; if(isset($checkoptions)){echo htmlentities(get_option('arwcht_hooks_head_ubiquitous'));}else{ ?><link type="text/css" rel="stylesheet" id="arrowchat_css" media="all" href="<?php bloginfo('url') ?>/arrowchat/external.php?type=css" charset="utf-8" /><script type="text/javascript" src="<?php bloginfo('url') ?>/arrowchat/includes/js/jquery-1.3.2.min.js"></script><script type="text/javascript" src="<?php bloginfo('url') ?>/arrowchat/includes/js/jquery-ui-1.7.2.custom.min.js"></script><?php } ?></textarea>
				</td>
			</tr>
			<tr valign="top">
				<td>
					<h3>Footer Content</h3>
					<textarea rows="3" cols="85" name="arwcht_hooks_footer_ubiquitous"><?php $optionsFooterUb=htmlentities(get_option('arwcht_hooks_footer_ubiquitous'));if($optionsFooterUb == ""): unset($optionsFooterUb); endif; if(isset($optionsFooterUb)){echo htmlentities(get_option('arwcht_hooks_footer_ubiquitous'));}else{ ?><script type="text/javascript" src="<?php bloginfo('url'); ?>/arrowchat/external.php?type=djs" charset="utf-8"></script>
<script type="text/javascript" src="<?php bloginfo('url'); ?>/arrowchat/external.php?type=js" charset="utf-8"></script> <?php } ?></textarea>
				</td>
			</tr>			
			<!--<tr valign="top">
				<td>
					<h3>Site Header Content</h3>
					<textarea rows="3" cols="85" name="arwcht_hooks_head"><?php echo htmlentities(get_option('arwcht_hooks_head')); ?></textarea>
				</td>
			</tr>
			<tr valign="top">
				<td>
					<h3>Site Footer Content</h3>
					<textarea rows="3" cols="85" name="arwcht_hooks_footer"><?php echo htmlentities(get_option('arwcht_hooks_footer')); ?></textarea>
				</td>
			</tr>
			<tr valign="top">
				<td>
					<h3>Admin Header Content</h3>
					<textarea rows="3" cols="85" name="arwcht_hooks_head_admin"><?php echo htmlentities(get_option('arwcht_hooks_head_admin')); ?></textarea>
				</td>
			</tr>
			<tr valign="top">
				<td>
					<h3>Admin Footer Content</h3>
					<textarea rows="3" cols="85" name="arwcht_hooks_footer_admin"><?php echo htmlentities(get_option('arwcht_hooks_footer_admin')); ?></textarea>
				</td>
			</tr>-->
		</table>
				
		<p class="submit">
			<input type="submit" name="Submit" value="<?php _e('Save Changes') ?>" />
		</p>
<!--</div></div>-->
<?php $address_check = "$rootpath/arrowchat/install/index.php";clearstatcache(); if(file_exists("$address_check")){ ?><div style="color:red;font-weight:bold;">Make sure to delete the folder <i><?php bloginfo('url'); ?>/arrowchat/install/</i>.</div><?php } else { ?> <iframe src="<?php bloginfo('url') ?>/arrowchat" style="height:1500px;width:100%;">Your Browser does not support iFrames.</iframe> <?php } ?>
<?php } else {echo "<div style=\"font-weight:bold;color:red;\">Oops, ArrowChat is either not installed or not installed in the right directory. In order for it to work properly, you must put it in the directory <?php bloginfo('url') ?>/arrowchat. Once its installed in the correct directory, refresh this page.<br /><br />If you need to purchase arrowchat, click the banner below.<br /><a href=\"http://junseth.arrowchat.hop.clickbank.net/?s=purchase\"><img src=\"http://static.arrowchat.com/images/img-boxart.jpg\"></a></td></tr></table><p class=\"submit\"><input type=\"submit\" name=\"submit\" value=\"Refresh\" onclick=\"javascript:document.location.reload();\"></a></p>";} ?>
	</form>
	
	<p><a href="http://www.spidermarket.com/index/plugins/arrowchat-integration">Arrowchat WordPress integration</a> was created by <a href="http://www.spidermarket.com">SpiderMarket</a></p>

	</div>
	<?php

}

/**
 * Admin init
 */
function arwcht_hooks_init() {

	// register all options
	$opts = arwcht_hooks_get_default_options();
	foreach ($opts as $k=>$v) {
		register_setting('arwcht-hooks-options', $k);
	}

}

/**
 * Adds admin nav.
 */
function arwcht_hooks_admin() {

	add_options_page('Arrowchat', 'Arrowchat', 'edit_files', __FILE__, 'arwcht_hooks_options_page');

}

/**
 * Adds settings link in the plugin listing.
 */
function arwcht_hooks_filter_plugin_actions($links, $file){
	
	static $this_plugin;

	if( !$this_plugin ) $this_plugin = plugin_basename(__FILE__);

	if( $file == $this_plugin ){
		$settings_link = '<a href="options-general.php?page=arrowchat-integration/arrowchat-integration.php">' . __('Settings') . '</a>';
		$links = array_merge( array($settings_link), $links); // before other links
	}
	return $links;
	
}

/**
 * Install this plugin
 */
function arwcht_hooks_install() {
	
	// add any new options, leaving old values untouched
	$opts = arwcht_hooks_get_default_options();
	foreach($opts as $k=>$v) {
		if (get_option($k) === FALSE) {
			add_option($k, $v);
		}
	}

}

/**
 * Uninstall this plugin
 */
function arwcht_hooks_uninstall() {

	// remove options
	$opts = arwcht_hooks_get_default_options();
	foreach($opts as $k=>$v) {
		delete_option($k);
	}

}

/**
 * Default options.
 */
function arwcht_hooks_get_default_options() {

	$opts = array(
		'arwcht_hooks_version' => $arwcht_hooks_version,
		'arwcht_hooks_head' => '',
		'arwcht_hooks_footer' => '',
		'arwcht_hooks_head_admin' => '',
		'arwcht_hooks_footer_admin' => '',
		'arwcht_hooks_head_ubiquitous' => '',
		'arwcht_hooks_footer_ubiquitous' => ''
	);
	
	return $opts;

}

// install / uninstall
register_activation_hook(__FILE__,'arwcht_hooks_install');
register_deactivation_hook(__FILE__, 'arwcht_hooks_uninstall');

// admin stuff
add_action('admin_init', 'arwcht_hooks_init');
add_action('admin_menu', 'arwcht_hooks_admin');
add_filter('plugin_action_links', 'arwcht_hooks_filter_plugin_actions', 10, 2);

// do the work of this plugin!
add_action('wp_head', 'arwcht_hooks_head');
add_action('wp_footer', 'arwcht_hooks_footer');
add_action('admin_head', 'arwcht_hooks_head_admin');
add_action('admin_footer', 'arwcht_hooks_footer_admin');


?>