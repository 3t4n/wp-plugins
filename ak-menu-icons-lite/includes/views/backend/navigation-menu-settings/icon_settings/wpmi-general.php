<?php defined( 'ABSPATH' ) or die( 'No script kiddies please!' );
$disable_desktop = (isset($wpmi_menu_settings['wpmi_icon_settings']['general_settings']['disable_desktop']) && $wpmi_menu_settings['wpmi_icon_settings']['general_settings']['disable_desktop'] == 'true')?'true':'false';
$disable_menu_label = (isset($wpmi_menu_settings['wpmi_icon_settings']['general_settings']['disable_menu_label']) && $wpmi_menu_settings['wpmi_icon_settings']['general_settings']['disable_menu_label'] == 'true')?'true':'false';
$icon_position = (isset($wpmi_menu_settings['wpmi_icon_settings']['general_settings']['icon_position']) && $wpmi_menu_settings['wpmi_icon_settings']['general_settings']['icon_position'] != '')?esc_attr($wpmi_menu_settings['wpmi_icon_settings']['general_settings']['icon_position']):'left';
?>
<div class="wpmi-general-options">
  <div class="wpmi-settings_title"><h4><?php _e('General Settings','ak-menu-icons-lite');?></h4></div>
  <table class="widefat wpmi-table-optipns">
	<tr>
	<td class="wpmi_meta_table">
		<label for="wpmi_disable_icon_on_desktop"><?php _e("Disable Icon On Desktop?", 'ak-menu-icons-lite') ?></label>
	</td>
	  <td> 
       <div class="wpmi-switch">
          <input type='checkbox' class='wpmi_input_options' id="wpmi_disable_icon_on_desktop"
           name='wpmi_icon_settings[general_settings][disable_desktop]' value='true' <?php echo checked($disable_desktop,'true', false ); ?>/>
          <label for="wpmi_disable_icon_on_desktop"></label>
        </div>
         <p class="description"><?php _e("Note: Enable this option in order to hide this menu's icon on desktop version.", 'ak-menu-icons-lite'); ?></p>
	  </td>
	</tr>	
	<tr>
	<td class="wpmi_meta_table">
		<label for="wpmi-hide-label"><?php _e("Hide Menu Name", 'ak-menu-icons-lite') ?></label>
	</td>
	  <td> 
	  	 <div class="wpmi-switch">
          <input type='checkbox' class='wpmi_input_options' id="wpmi-hide-label"
           name='wpmi_icon_settings[general_settings][disable_menu_label]' value='true' <?php echo checked($disable_menu_label,'true', false ); ?>/>
          <label for="wpmi-hide-label"></label>
        </div>
         <p class="description"><?php _e("Note: Check to hide menu item's name in frontend.", 'ak-menu-icons-lite'); ?></p>
	  </td>
	</tr>
  <tr>
	<td class="wpmi_meta_table">
		<label for="wpmi-hide-label"><?php _e("Icon Position", 'ak-menu-icons-lite') ?></label>
	</td>
	  <td> 
        <select name='wpmi_icon_settings[general_settings][icon_position]' class='wpmi_set_icon_position'>
	        <option value='left' <?php echo selected( $icon_position, 'left', false );?>><?php _e("Left Of Menu Title", 'ak-menu-icons-lite'); ?></option>
	        <option value='right' <?php echo selected( $icon_position, 'right', false );?>><?php _e("Right Of Menu Title", 'ak-menu-icons-lite'); ?></option>
        <select>
        	 <p class="description"><?php _e("Set Icon Position as left, right of menu title.", 'ak-menu-icons-lite'); ?></p>
	  </td>
	</tr> 
  </table>
</div>