<?php defined( 'ABSPATH' ) or die( 'No script kiddies please!' );?>
<input type="hidden" id="wpmi_current_menu_id" value="<?php esc_attr_e($current_menu_id);?>"/>
<input type="hidden" id="wpmi_menu_name" value="<?php esc_attr_e($menu_name);?>"/>
<input type="hidden" id="wpmi_menu_slug" value="<?php esc_attr_e($menu_slug);?>"/>
<p class="description"><?php _e( 'Please enable WP Menu Icons Lite option in order to add menu icon for each menu items. For More Details, click ', 'ak-menu-icons-lite' ); ?><a href="https://accesspressthemes.com/documentation/wp-menu-icons-lite/" target="_blank"><?php _e('View Documentation','ak-menu-icons-lite');?></a></p>
<table>
<tr>
   <td>
   	<label for="wpmi_enable_menu_icon"><?php _e( 'Enable WP Menu Icons Lite?','ak-menu-icons-lite');?>
   </label>
  </td>
   <td>
     <div class="wpmi-switch">
        <input type='checkbox' name='icon_options[<?php echo 'menuid_'.$current_menu_id; ?>][enable_menu_icon]' id="wpmi_enable_menu_icon" value='1' <?php if($enable_menu_icon) echo 'checked';?>/>
        <label for="wpmi_enable_menu_icon"></label>
     </div>
   </td>
</tr>
 </table>
 <p class="button-controls wp-clearfix">
  <span class="list-controls wpmi_success"></span>
  <span class='wpmi-loader' style="display:none;">
  <img src="<?php echo esc_attr(WPMICONSLITE_IMG_DIR);?>ajaxloader.gif"/>
  </span>
 	<span class="add-to-menu">
  <input name="submit" id="submit" class="button wp-menu-icon-settings-save" value="Save Settings" type="submit">
  </span>
  <div class="wpmicon-spinner spinner" style="float:none;"></div>
 </p>