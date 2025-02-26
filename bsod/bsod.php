<?php
	/*
	Plugin Name: Blue Screen of the Dead for WordPress
	Plugin URI: http://wordpress.org/extend/plugins/bsod/
	Description: A replacement of your 404 page by the Windows famous BSoD
	Version: 1.1
	Author: Koka
	Author URI: http://www.kokabsolu.com
	License: GPL2
	*/
	
	add_filter('404_template', 'bsod_404_template');
	add_action('admin_menu', 'bsod_adm_menu');
	add_action('admin_init', 'bsod_init');

	function bsod_404_template() {
		if(is_404()) {
			Header('HTTP/1.0');
			return WP_CONTENT_DIR . '/plugins/bsod/404.php';
		}
	}
	
	function bsod_adm_menu() {
		add_options_page('BSoD Options', 'BSoD', 'manage_options', 'bsod-options', 'bsod_options');
	}
	
	function bsod_init() {
		register_setting('bsod-group', 'bsod_title');
		register_setting('bsod-group', 'bsod_description');
		
		add_option('bsod_title', 'ERROR 404');
		add_option('bsod_description', '
<p>
	The page is missing or never was written. You can wait and<br />
	see if it becomes available again, or you can restart your computer.
</p>
<p>
	* Send us an e-mail to notify this and try it later.<br />

	* Press CTRL+ALT+DEL to restart your computer. You will<br />
	 &nbsp; lose unsaved information in any programs that are running.
</p>');
	}
	
	function bsod_options() {
		if (!current_user_can('manage_options'))  {
			wp_die( __('You do not have sufficient permissions to access this page.') );
		}
		
		if($_POST['stage'] == 'process') {
			update_option('bsod_title', $_POST['bsod_title']);
			update_option('bsod_description', $_POST['bsod_description']);
		}
		
?>
	<div class="wrap">
		<h2>BSoD Options</h2>
		<form method="post" action="" enctype="multipart/form-data">
			<?php settings_fields('bsod-group'); ?>
			<input type="hidden" name="stage" value="process" />
			<table class="form-table">
				<tbody>
					<tr valign="top">
						<th scope="row">
							<label for="bsod_title">Title</label>
						</th>
						<td>
							<fieldset>
								<legend class="hidden">Title</legend>
								<label for="bsod_title"><input type="text" name="bsod_title" id="bsod_title" class="regular-text" value="<?php echo get_option('bsod_title'); ?>" /></label>
							</fieldset>
							<span class="setting-description">Title showed in top of 404 page</span>
						</td>
					</tr>
					<tr valign="top">
						<th scope="row">
							<label for="bsod_title">Description</label>
						</th>
						<td>
							<fieldset>
								<legend class="hidden">Description</legend>
								<label for="bsod_description">
									<textarea class="large-text code" id="bsod_description" cols="50" rows="10" name="bsod_description"><?php echo get_option('bsod_description'); ?></textarea>
								</label>
							</fieldset>
							<span class="setting-description">Text showed as content of page</span>
						</td>
					</tr>
				</tbody>
			</table>
			<p class="submit">
				<input type="submit" value="Save Changes" class="button-primary" name="Submit">
			</p>
		</form>
	</div>
<?php
	}
?>
