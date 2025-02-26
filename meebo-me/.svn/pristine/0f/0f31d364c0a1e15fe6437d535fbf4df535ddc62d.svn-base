<?php
/**********************************************************************
*					Admin Page							*
*********************************************************************/

function meebome_options() {

	if(!get_option(meebome_widget_id))
	{
		add_option('meebome_widget_id', '', 'meebo me Widget ID');
		add_option('meebome_widget_size', '', 'Size of the meebo me widget');
	}

	if($_POST['meebome_save']){
		update_option('meebome_widget_id', $_POST['meebo_widget_id']);
		update_option('meebome_widget_size', $_POST['meebo_widget_size']);
		
		echo '<div id="message" class="updated fade"><p>meebo me options saved successfully.</p></div>';
	}

	if($_POST['meebome_default']){
		update_option('meebome_widget_id', '');
		update_option('meebome_widget_size', 'regular');
		
		echo '<div id="message" class="updated fade"><p>meebo me options set to Default.</p></div>';
	}
?>


<div class="wrap">
  <h2>
    <?php _e("meebo me Plugin for WordPress"); ?>
  </h2>
  <div style="border: #ccc 1px solid; padding: 10px">
    <fieldset class="options">
    <legend>
    <h3>
      <?php _e('Preview'); ?>
    </h3>
    </legend>
    <p><?php if (function_exists('echo_meebome')) echo_meebome() ?></p>
    </fieldset>
  </div>
  <div style="border: #ccc 1px solid; padding: 10px">
    <fieldset class="options">
    <legend>
    <h3>
      <?php _e('Support the Development'); ?>
    </h3>
    </legend>
    <p>If you find <a href="http://ajaydsouza.com/wordpress/plugins/meebo-me-plugin/" title="Visit the Bad Behavior Stats homepage">meebo me WordPress Plugin</a> useful, please do <a href="https://www.paypal.com/cgi-bin/webscr?cmd=_xclick&amp;business=donate@ajaydsouza.com&amp;item_name=meebo%20me%20Plugin%20for%20WordPress%20(From%20WP-Admin)&amp;no_shipping=1&amp;return=http://www.ajaydsouza.com/wordpress/plugins/meebo-me-plugin/&amp;cancel_return=http://www.ajaydsouza.com/wordpress/plugins/meebo-me-plugin/&amp;cn=Note%20to%20Author&amp;tax=0&amp;currency_code=USD&amp;bn=PP-DonationsBF&amp;charset=UTF-8" title="Donate via PayPal">drop in your contribution</a>. (<a href="http://ajaydsouza.com/donate/" title="Some reasons why you should donate">Why should you?</a>)</p>
    </fieldset>
  </div>
  <form method="post" id="meebome_options" style="border: #ccc 1px solid; padding: 10px">
    <fieldset class="options">
    <legend>
    <h3>
      <?php _e('Options'); ?>
    </h3>
    </legend>
    <table width="100%" cellspacing="2" cellpadding="5">
      <tr style="background: #ccc;">
        <th><?php _e('Parameter'); ?></th>
        <th><?php _e('Value'); ?></th>
        <th><?php _e('Description'); ?></th>
      </tr>
      <tr>
        <td><var>Widget ID</var></td>
        <td><input name="meebo_widget_id" type="text" id="meebo_widget_id" value="<?php echo get_option('meebome_widget_id') ?>" size="10" maxlength="10" /></td>
        <td><?php _e('This is the 10 character ID in src attribute of the <code>embed</code> tag. e.g. In <code>&lt;embed src=&quot;http://widget.meebo.com/mm.swf?vvjWAFUxUI&quot;</code> the ID is <strong><code>vvjWAFUxUI</code></strong>. Create a new widget from <a href="http://meebome.com"></a>'); ?>.</td>
      </tr>
      <tr>
        <td><var>Size</var></td>
        <td><p>
            <label>
            <input name="meebo_widget_size" type="radio" value="small" <?php if((get_option('meebome_widget_size'))=='small') { echo('checked="checked"'); } ?> />
            small (160 x 250 px)</label>
            <br />
            <label>
            <input name="meebo_widget_size" type="radio" value="regular" <?php if((get_option('meebome_widget_size'))=='regular') { echo('checked="checked"'); } ?> />
            regular (190 x 275 px)</label>
            <br />
            <label>
            <input type="radio" name="meebo_widget_size" value="super" <?php if((get_option('meebome_widget_size'))=='super') { echo('checked="checked"'); } ?> />
            super-size (250 x 300 px)</label>
          </p></td>
        <td><?php _e('Select the size of the Meebo Widget'); ?>.</td>
      </tr>
      <tr>
        <td><input type="submit" name="meebome_save" id="meebome_save" value="Update Options" /></td>
        <td><input type="reset" name="meebome_reset" id="meebome_reset" value="Reset Form" /></td>
        <td align="right"><input name="meebome_default" type="submit" id="meebome_default" value="Default Options" style="border:#FF0000 1px solid" onclick="if (!confirm('Do you want to set meebo me Plugin options to Default?')) return false;" /></td>
      </tr>
    </table>
    </fieldset>
  </form>
</div>

<?php
}

function meebome_adminmenu() {
	if (function_exists('current_user_can')) {
		// In WordPress 2.x
		if (current_user_can('manage_options')) {
			$meebome_is_admin = true;
		}
	} else {
		// In WordPress 1.x
		global $user_ID;
		if (user_can_edit_user($user_ID, 0)) {
			$meebome_is_admin = true;
		}
	}

	if ((function_exists('add_options_page'))&&($meebome_is_admin)) {
		add_options_page(__("meebo me Options"), __("meebo me"), 9, 'meebome_options', 'meebome_options');
		}
}

add_action('admin_menu', 'meebome_adminmenu');

?>