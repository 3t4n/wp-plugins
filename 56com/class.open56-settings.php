<?php
class open56_settings {
	var $main; // main Add From Server instance.
	var $package = 'open56';
	var $name = '56视频上传';

	function __construct() {
	}

	function render() {
		echo '<div class="wrap">';
		screen_icon('options-general');
		echo '<h2>' . __($this->name.' Settings', $this->package) . '</h2>';
		echo '<form method="post" action="options.php">';
		settings_fields( $this->package );
		$uac = get_option('frmsvr_uac', 'allusers');
		?>
		<table class="form-table">
			<tr valign="top">
				<td><fieldset>
                应用id(appid)：<input name="open56_appkey" class="large-text code" value="<?php echo esc_attr(get_option('open56_appkey', '')); ?>" />
				<br />
				应用密匙(secret):<input name="open56_secrect" class="large-text code" value="<?php echo esc_attr(get_option('open56_secrect', '')); ?>" />
				<br />
				</fieldset>
				</td>
			</tr>
		</table>
		<?php
		submit_button( __('Save Changes', $this->package), 'primary', 'submit');
		echo '</form>';
		echo '</div>';
	}
}
