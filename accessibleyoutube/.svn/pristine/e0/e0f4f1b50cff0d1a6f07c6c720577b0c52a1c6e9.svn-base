<?php
if ( !defined('WP_LOAD_PATH') ) {

	/** classic root path if wp-content and plugins is below wp-config.php */
	$classic_root = dirname(dirname(dirname(dirname(__FILE__)))) . '/' ;

	if (file_exists( $classic_root . 'wp-load.php') )
	define( 'WP_LOAD_PATH', $classic_root);
	else
	if (file_exists( $path . 'wp-load.php') )
	define( 'WP_LOAD_PATH', $path);
	else
	exit("Could not find wp-load.php");
}

require_once( WP_LOAD_PATH . 'wp-load.php');

if ( !current_user_can('edit_pages') && !current_user_can('edit_posts') )
wp_die(__("Not accessible enough ;-)"));

?>
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<title>AccessibleYouTube</title>
<meta http-equiv="Content-Type"
	content="<?php bloginfo('html_type'); ?>; charset=<?php echo get_option('blog_charset'); ?>" />
<script language="javascript" type="text/javascript"
	src="<?php echo site_url(); ?>/wp-includes/js/tinymce/tiny_mce_popup.js"></script>
<script language="javascript" type="text/javascript"
	src="<?php echo site_url(); ?>/wp-includes/js/tinymce/utils/mctabs.js"></script>
<script language="javascript" type="text/javascript"
	src="<?php echo site_url(); ?>/wp-includes/js/tinymce/utils/form_utils.js"></script>
<script language="javascript" type="text/javascript"
	src="<?php echo WP_PLUGIN_URL; ?>/accessibleyoutube/tinymce.js"></script>
<base target="_self" />
</head>
<body id="link"
	onload="tinyMCEPopup.executeOnLoad('init();');document.body.style.display='';document.getElementById('yt_titel').focus();"
	style="display: none;">
	<form name="accessibleyoutube" id="accessibleyoutube" action="#">
		<div class="tabs">
			<ul>
				<li id="accessibleyoutube_tab" class="current"><span><a
						href="javascript:mcTabs.displayTab('accessibleyoutube_tab','eerstetab');"
						onmousedown="return false;"><?php echo _e("Voeg een video toe") ?>
					</a> </span></li>
			</ul>
		</div>

		<div class="panel_wrapper" style="height: auto;">
			<div id="eerstetab" class="panel current" style="height: auto;">
				<br />
				<table border="0" cellpadding="4" cellspacing="0">
					<tr>
						<td nowrap="nowrap"><?php _e("YouTube Video ID:"); ?></td>
						<td><input type="text" id="yt_id" value="" maxlength="12"
							name="yt_id" size="30" /> (ie. RWF86D_UNxc)</td>
					</tr>
					<tr>
						<td><?php _e("Breedte/hoogte"); ?></td>
						<td><input type="text" id="yt_width" value="480" name="yt_width"
							size="4" />/<input type="text" id="yt_height" value="320"
							name="yt_height" size="4" /></td>
					</tr>
				</table>
			</div>
		</div>
		<div class="mceActionPanel">
			<div style="float: left">
				<input type="button" id="cancel" name="cancel"
					value="<?php _e("Annuleren"); ?>" onclick="tinyMCEPopup.close();" />
			</div>

			<div style="float: right">
				<input type="submit" id="insert" name="insert"
					value="<?php _e("Invoegen"); ?>" onclick="ay_linktoevoegen();" />
			</div>
		</div>

	</form>
</body>
</html>
