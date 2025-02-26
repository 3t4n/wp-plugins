<?php defined( 'ABSPATH' ) or die( 'No script kiddies please!' );
$icon_type = (isset($wpmi_menu_settings['wpmi_icon_settings']['icon_settings']['icon_type']) && $wpmi_menu_settings['wpmi_icon_settings']['icon_settings']['icon_type'] != '')?esc_attr($wpmi_menu_settings['wpmi_icon_settings']['icon_settings']['icon_type']):'';
$icon_picker_input = (isset($wpmi_menu_settings['wpmi_icon_settings']['icon_settings']['icon_picker_input']) && $wpmi_menu_settings['wpmi_icon_settings']['icon_settings']['icon_picker_input'] != '')?esc_attr($wpmi_menu_settings['wpmi_icon_settings']['icon_settings']['icon_picker_input']):'';
?>
<div class="wpmi-icon-options">
	<div class="wpmi-settings_title"><h4><?php _e('Icon Settings','ak-menu-icons-lite');?></h4></div>
	<table class="widefat wpmi-table-options wpmi-iconsettings-table">	
		<tr>
			<td class="wpmi_meta_table">
				<label><?php _e("Available Icon Type", 'ak-menu-icons-lite') ?></label>
			</td>
			<td> 
				<select name='wpmi_icon_settings[icon_settings][icon_type]' class="wpmi-icon-type">
					<option value=''><?php _e(" - Choose Icon Type - ", 'ak-menu-icons-lite'); ?></option>
					<option value='available_font_icon' <?php echo selected( $icon_type, 'available_font_icon', false );?>><?php _e("Pre Available Font Icons", 'ak-menu-icons-lite'); ?></option>
					<select>
					</td>
				</tr>

				<tr class="wpmi-preavailable-settings" <?php if($icon_type == "" || $icon_type == "custom" || $icon_type == "apsocialicons") echo 'style="display:none;"'?>>
					<td class="wpmi_meta_table">
						<label for="icon-picker"><?php _e("Choose Icon Set", 'ak-menu-icons-lite') ?></label>
					</td>
					<td> 
						<div data-target="icon-picker" class="button icon-picker <?php if ($icon_picker_input !='') { $v = explode('|', $icon_picker_input); echo $v[0] . ' ' . $v[1]; } ?>"></div>
						<input class="icon-picker-input" type="text" name="wpmi_icon_settings[icon_settings][icon_picker_input]"
						value="<?php if ($icon_picker_input !='') { $v = explode('|', $icon_picker_input); echo $v[0] . ' ' . $v[1]; } ?>"/>
					</td>
				</tr>
			</table>
</div>