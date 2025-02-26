<?php
/*
Plugin Name: AppMarx Partners Widget
Plugin URI: http://appmarx.com
Description: AppMarx Partners Widget settings
Version: 1.0
Author: AppMarx
*/

if( !is_admin() ) {
	add_action('wp_print_scripts', 'appmarx_filter_footer');
}
add_action('admin_menu', 'appmarx_config_page');
add_action('wp_footer', 'appmarx_add_noscript');

function appmarx_filter_footer() {
	$appmarx_widget_path = get_option('AppMarxWidgetPath');
	$apparx_widget_enabled = get_option('AppMarxWidgetIsEnabled');
	
	if ($appmarx_widget_path != '' and $apparx_widget_enabled) {
		wp_enqueue_script('AppMarxWidget', $appmarx_widget_path, false, false, true );
	}
}
function appmarx_add_noscript() {
	echo "<noscript><a href='http://appmarx.com/'>AppMarx Partners Widget</a></noscript>";
}
function appmarx_config_page() {
	add_submenu_page('themes.php', __('AppMarx Widget Configuration'), __('AppMarx Widget'), 'manage_options', 'appmarx_key_config', 'appmarx_config');
}

function appmarx_config() {
	$appmarx_widget_path = get_option('AppMarxWidgetPath');
	$appmarx_widget_enabled = get_option('AppMarxWidgetIsEnabled');

	if (isset($_POST['submit'])) {
		if (isset($_POST['appmarxtoolbarpath']))
		{
			$appmarx_widget_path = $_POST['appmarxtoolbarpath'];
			if ($_POST['appmarx_widget_enabled'] == 'on')
			{
				$appmarx_widget_enabled = 1;
			}
			else
			{
				$appmarx_widget_enabled = 0;
			}
		}
		else
		{
			$appmarx_widget_path = '';
			$appmarx_widget_enabled = 0;
		}
		update_option('AppMarxWidgetPath', $appmarx_widget_path);
		update_option('AppMarxWidgetIsEnabled', $appmarx_widget_enabled);
		echo "<div id=\"updatemessage\" class=\"updated fade\"><p>AppMarx Widget settings updated successfully.</p></div>\n";
		echo "<script type=\"text/javascript\">setTimeout(function(){jQuery('#updatemessage').hide('slow');}, 2000);</script>";	
	}
	?>
	<div class="wrap">
		<h2>WordPress AppMarx Partners Widget Configuration</h2>
		<div class="postbox-container">
			<div class="metabox-holder">	
				<div class="meta-box-sortables">
					<form action="" method="post" id="appmarx_conf">
					<div id="appmarx_settings" class="postbox">
						<div class="handlediv" title="Click to toggle"><br /></div>
						<h3 class="hndle"><span>AppMarx Widget Settings</span></h3>
						<div class="inside">
							<table class="form-table">
								<tr><th valign="top" scrope="row"><label for="appmarxtoolbarpath">AppMarx Widget Path:</label></th>
								<td valign="top"><input id="appmarxtoolbarpath" name="appmarxtoolbarpath" type="text" size="20" value="<?php echo $appmarx_widget_path; ?>"/></td></tr>
								<tr><th valign="top" scrope="row">AppMarx Widget On/Off:</th>
								<td valign="top"><input type="checkbox" id="appmarx_widget_enabled" name="appmarx_widget_enabled" <?php echo ($appmarx_widget_enabled ? 'checked="checked"' : ''); ?> /> <label for="appmarx_widget_enabled">Enable/Disable the AppMarx Partners Widget</label><br/></td></tr>
							</table>
						</div>
					</div>
					<div class="submit"><input type="submit" class="button-primary" name="submit" value="Update Toolbar &raquo;" /></div>
					</form>
				</div>
			</div>
		</div>
	</div>
	<?php
} 
?>
