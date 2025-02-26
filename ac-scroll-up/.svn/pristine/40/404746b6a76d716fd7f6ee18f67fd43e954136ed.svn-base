<?php 
// create custom plugin settings menu
add_action('admin_menu', 'ac_scroll_create_menu');

function ac_scroll_create_menu() {

	//create new top-level menu
	add_options_page('Ac Plugin Settings', 'Ac-Scroll-Up', 'administrator', __FILE__, 'ac_scrl_settings_page');

	//call register settings function
	add_action( 'admin_init', 'register_myscrlsettings' );
}


function register_myscrlsettings() {
	//register our settings
	register_setting( 'ac-settings-group', 'background_color' );
	register_setting( 'ac-settings-group', 'font_color' );
	register_setting( 'ac-settings-group', 'plugin_options' ,'drop_down1', 'Select Color', 'setting_dropdown_fn2', __FILE__, 'main_section' );
	//add_settings_field();

}

// DROP-DOWN-BOX - Name: plugin_options[dropdown1]
function  setting_dropdown_fn2() {
	$options = get_option('plugin_options');
	$items = array("<i class='fa fa-facebook'></i>", "Green", "Blue", "Orange", "White", "Violet", "Yellow");
	echo "<select id='drop_down1' name='plugin_options[dropdown1]'>";
	foreach($items as $item) {
		$selected = ($options['dropdown1']==$item) ? 'selected="selected"' : '';
		echo "<option value='$item' $selected>$item</option>";
	}
	echo "</select>";
}


function ac_scrl_settings_page() {
?>
<div class="wrap">
<h2>Ac-Scroll-Up</h2>

	<form method="post" action="options.php">

		<?php settings_fields( 'ac-settings-group' ); ?>
		<?php do_settings_sections( 'ac-settings-group' ); ?>
		
		<table class="form-table">	
			<tr valign="top">
			<th scope="row">Background-Color</th>
			<td><input type="text" class="color-field" name="background_color" value="<?php echo esc_attr( get_option('background_color') ); ?>" /></td>
			</tr>
			 
			<tr valign="top">
			<th scope="row">Font-Color</th>
			<td><input type="text" class="color-field" name="font_color" value="<?php echo esc_attr( get_option('font_color') ); ?>" /></td>
			</tr>		
		</table>
		
		<?php submit_button(); ?>

	</form>
</div>

<?php } ?>