<?php
class qb_Birthday_Options{
	public $options;

public function __construct(){
	$this->options = get_option('qb_plugin_options');
	$this->qb_register_settings_and_fields();
}

public function qb_add_menu_page(){
	add_options_page('Happy Birthday Reminder', 'Happy Birthday Reminder', 'administrator',__FILE__, array('qb_Birthday_Options','qb_Birthday_Reminder_Options'));
}

public function qb_Birthday_Reminder_Options(){
	?>
	<div class='wrap'>
	<h2>HAPPY BIRTHDAY REMINDER</h2>
	<form method="post" action="options.php"> 
	<?php settings_fields('qb_plugin_options');?>
	<?php do_settings_sections(__FILE__); ?>
	<p class="submit">
		<input name="submit" type="submit" class="button-primary" value="Save Changes" />
		</p>
	</form>
	</div>
	<?php
}

public function qb_register_settings_and_fields(){
	register_setting('qb_plugin_options','qb_plugin_options');
	add_settings_section('qb_birthday_main_section', 'Main Settings',array($this,'qb_birthday_main_section_cb'),__FILE__);// id, title of section, cb, which page will it run
	add_settings_field('qb_email_setting_yes_no','Send Admin Email? ', array($this,'qb_admin_email_setting_yes_no'),__FILE__,'qb_birthday_main_section');
	add_settings_field('qb_admin_email','Email Address: ', array($this,'qb_admin_email_setting'),__FILE__,'qb_birthday_main_section');
	add_settings_field('qb_user_email_yes_no','Send Mail To Users? ', array($this,'qb_user_email_setting_yes_no'),__FILE__,'qb_birthday_main_section');
	add_settings_field('qb_email_subject','Email Subject: ', array($this,'qb_admin_email_subject'),__FILE__,'qb_birthday_main_section');
	add_settings_field('qb_celebrant_message','Message: ', array($this,'qb_admin_celebrant_message'),__FILE__,'qb_birthday_main_section');
 	add_settings_field('qb_max_days_diff','Days To Birthday: ', array($this,'qb_admin_max_days_diff'),__FILE__,'qb_birthday_main_section');
	add_settings_field('qb_shortcode_notification','Note: ', array($this,'qb_admin_shortcode_notification'),__FILE__,'qb_birthday_main_section');
}

public function qb_birthday_main_section_cb(){
	//return 'Hello!!!';
}

public function qb_admin_email_setting_yes_no(){
	$items=array('No','Yes');
	$options = get_option('qb_plugin_options');
	echo "<select id='qb_email_setting_yes_no' name='qb_plugin_options[qb_email_setting_yes_no]'>";
	foreach($items as $item) {
		$selected = ($options['qb_email_setting_yes_no']==$item) ? 'selected="selected"' : '';
		echo "<option value='$item' $selected>$item</option>";
	}
		echo "</select>";
}

public function qb_admin_email_setting(){
	echo "<input name='qb_plugin_options[qb_admin_email]' type='email' value='{$this->options['qb_admin_email']}' /> <br /> If left empty & option above set to Yes, email will default to the Wordpress admin email.";
}

public function qb_user_email_setting_yes_no(){
	$items=array('No','Yes');
	$options = get_option('qb_plugin_options');
	echo "<select id='qb_user_email_yes_no' name='qb_plugin_options[qb_user_email_yes_no]'>";
	foreach($items as $item) {
		$selected = ($options['qb_user_email_yes_no']==$item) ? 'selected="selected"' : '';
		echo "<option value='$item' $selected>$item</option>";
	}
		echo "</select><br />Do you want users to receive mails on their birthdays?";
}

public function qb_admin_email_subject(){
	echo "<input name='qb_plugin_options[qb_email_subject]' type='text' value='{$this->options['qb_email_subject']}' /> <br /> The subject of the mail users will receive on their birthdays.";
}

public function qb_admin_celebrant_message(){
	$options = get_option('qb_plugin_options');
	echo "<textarea name='qb_plugin_options[qb_celebrant_message]' rows='2' cols='40' type='textarea' >{$this->options['qb_celebrant_message']}</textarea><br /> Celebrants will receive the message you type here on their birthdays, preceded by their display name. Example: DISPLAY_NAME + MESSAGE.";
}

public function qb_admin_max_days_diff(){
	echo "<input name='qb_plugin_options[qb_max_days_diff]' type='number' value='{$this->options['qb_max_days_diff']}' min='0' max='30' oninput='validity.valid||(value='')'/><br /> The number of days to user's birthday for the notification to begin. Defaults to 7, if left not set.";
}

public function qb_admin_shortcode_notification(){
	?>
	<span class="description aligleft">
	<?php _e("<pre> You can place the shortcode [WPBirthday] in any post or page to display upcoming user birthdays</pre>");
	?>
	</span>
	<?php
}

}

function add_happy_birthday_options_class(){
	$wp_birthday_options=new qb_Birthday_Options();
	$wp_birthday_options->qb_add_menu_page();
}

add_action('admin_menu', 'add_happy_birthday_options_class');
add_action('admin_init', function(){
	new qb_Birthday_Options();
})

?>