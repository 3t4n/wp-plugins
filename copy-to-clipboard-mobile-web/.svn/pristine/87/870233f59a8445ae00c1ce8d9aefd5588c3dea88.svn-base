<?php

class pw_clippy_settings {
	// Name of the array
	protected $option_name = 'pw-clippy';

	// Default values
	protected $op = array(
		'via_link' => 'post'
	);
	
	public function __construct(){
		// Listen for the activate event
		register_activation_hook(PW_CLIPPY_FILE, array($this, 'installpwclippy'));
		
		// Listen for the activate event
		register_deactivation_hook(PW_CLIPPY_FILE, array($this, 'deactivate'));
		
		add_action('admin_init', array($this,'admin_init'));
		
		add_action('admin_menu', array($this, 'add_page'));
	}

	public function installpwclippy() {
		if(!get_option($this->option_name)) {
			add_option($this->option_name, $this->op);
		}
	}
	
	public function deactivate() {
		delete_option($this->option_name);
	}
	
	// White list our options using the Settings API
	public function admin_init() {
		register_setting('pw-clippy_list_options', $this->option_name, array($this, 'validate'));
	}
	
	public function validate($input) {
		$valid = array();
		$valid['via_link'] = sanitize_text_field($input['via_link']);

		if (strlen($valid['via_link']) == 0) {
			add_settings_error(
					'via_link',                     // Setting title
					'pw-clippy-via_link_texterror',            // Error ID
					'Please Select which link to be appeneded after copied Text',     // Error message
					'error'                         // Type of message
			);

			// Set it to the default value
			$valid['via_link'] = $this->op['via_link'];
		}
		
		return $valid;
	}
	
	// Add entry in the settings menu
	public function add_page() {
		add_options_page('Copy To Clipboard', 'Copy To Clipboard', 'manage_options', 'pw-clippy_list_options', array($this, 'options_do_page'));
	}
	
	// Print the menu page itself
	function options_do_page() {		
		$options = get_option($this->option_name);
		?>
		<div class="wrap">
			<h2>Copy To Clipboard Settings</h2>
			<form method="post" action="options.php">
				<?php settings_fields('pw-clippy_list_options'); ?>
				
				</br>
				Define which link to append after copied text.
				<table class="form-table">
					<tr valign="top"><th scope="row">Via Link Type:</th>
						<td>
						<input type="radio" name="<?php echo $this->option_name?>[via_link]" value="post" <?php if($options['via_link'] == 'post') echo "checked"; ?> />post
						<input type="radio" name="<?php echo $this->option_name?>[via_link]" value="homepage" <?php if($options['via_link'] == 'homepage') echo "checked"; ?>/>homepage
						<input type="radio" name="<?php echo $this->option_name?>[via_link]" value="none" <?php if($options['via_link'] == 'none') echo "checked"; ?>/>none
						</td>
					</tr>
				</table>
				<p class="submit">
					<input type="submit" class="button-primary" value="<?php _e('Save Changes') ?>" />
				</p>
			</form>
		</div>
<?php		
	}

}