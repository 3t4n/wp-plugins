<?php

function bugplug_init_admin() {
	add_menu_page('BugPlug Settings', 'BugPlug', 'manage_options', 'bugplug','bugplug_settings_page', plugins_url('/images/icon.png', __FILE__),2);
}

add_action('admin_menu', 'bugplug_init_admin');

function bugplug_settings_page() {?>
  <div class="wrap">
	  <h1>BugPlug</h1>
	  <form method="post" action="options.php">
		  <?php settings_fields('bugplug_settings'); ?>
		  <p>BugPlug is one of the most affordable and easily-implemented user feedback and bug tracking solutions available. Whether launching your own app/site or gathering feedback from a client, BugPlug is the most streamlined way to achieve Inbox Zero. All bugs are stored and managed on Trello. If you don't have an API key for BugPlug, <a href="https://bugplug.omatum.com/users/sign_up/" target="_blank">get starterd here</a>.</p>
		  <table>
				<tr valign="top">
					<th scope="row"><label for="bugplug_switch">Activated</label></th>
					<td>
						<input type="checkbox" id="bugplug_switch" name="bugplug_switch" <?php if (get_option('bugplug_switch')) {echo "checked";}?>>
					</td>
				</tr>
				<tr valign="top">
				  <th scope="row"><label for="bugplug_api_key">API key</label></th>
				  <td>
						<input type="text" id="bugplug_api_key" name="bugplug_api_key" value="<?=get_option('bugplug_api_key');?>"/>
					</td>
			  </tr>
				<tr valign="top">
					<th scope="row"><label for="bugplug_board">Show Trello board link after submission</label></th>
					<td>
						<input type="checkbox" id="bugplug_board" name="bugplug_board" <?php if (get_option('bugplug_board')) {echo "checked";}?>>
					</td>
				</tr>
				<tr valign="top">
					<th scope="row"><label for="bugplug_color">Circle background color</label></th>
					<td>
						<input type="color" id="bugplug_color" name="bugplug_color" value="<?=get_option('bugplug_color');?>">
					</td>
				</tr>
				<tr valign="top">
					<th scope="row"><label for="bugplug_vars">Custom variables</label></th>
					<td>
						<textarea rows="4" cols="50" id="bugplug_vars" name="bugplug_vars"><?=get_option('bugplug_vars');?></textarea><br>
						<i>Example: _bugplug.addVar({"browser":navigator.userAgent});</i>
					</td>
				</tr>
		  </table>
		  <?php  submit_button(); ?>
	  </form>
  </div>
<?php
} ?>
