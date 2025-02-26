<?php
//=================================== Settings Menu ====================================
add_action('admin_menu', 'afpw_admin_menu');

function afpw_admin_menu() {
    $page_title = 'Author Facebook Page Widget Settings';
    $menu_title = 'Author Facebook Page Widget';
    $capability = 'manage_options';
    $menu_slug = 'afpw-settings';
    $function = 'afpw_settings';
    add_options_page($page_title, $menu_title, $capability, $menu_slug, $function);
}

function afpw_settings() {
    if (!current_user_can('manage_options')) {
        wp_die('You do not have sufficient permissions to access this page.');
    }

    // Here is where you could start displaying the HTML needed for the settings
    // page, or you could include a file that handles the HTML output for you.
?>
<div id="afpw">
	<h2>Author Facebook Page Widget Settings</h2>

	<form method="post" action="options.php">
	<?php wp_nonce_field('update-options') ?>
	<p>
	<label for="afpw_fb_app_id"><strong>Facebook App ID:</strong></label><br />
	<input type="text" id="afpw_fb_app_id" name="afpw_fb_app_id" size="45" value="<?php echo get_option('afpw_fb_app_id'); ?>" /></p>
	<p><input id="afpw_enable_authors_fb_page" name="afpw_enable_authors_fb_page" type="checkbox" <?php if(get_option('afpw_enable_authors_fb_page')){ echo 'checked'; } ?>/> <label for="afpw_enable_authors_fb_page"><strong>Enable Facebook Page Widget for Author's?:</strong></label>
	</p>

	<p><input type="submit" name="Submit" value="Update Options" /></p>
	<input type="hidden" name="action" value="update" />
	<input type="hidden" name="page_options" value="afpw_fb_app_id,afpw_enable_authors_fb_page" />
	</form>
</div>
<?php } ?>