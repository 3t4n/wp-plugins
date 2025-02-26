<?php defined( 'ABSPATH' ) or die( 'No script kiddies please!' );
$enable_animation = (isset($wpmi_menu_settings['wpmi_icon_settings']['icon_settings']['enable_animation']) && $wpmi_menu_settings['wpmi_icon_settings']['icon_settings']['enable_animation'] == 1)?1:0;
$hover_animation_effect = (isset($wpmi_menu_settings['wpmi_icon_settings']['icon_settings']['hover_animation_effect']) && $wpmi_menu_settings['wpmi_icon_settings']['icon_settings']['hover_animation_effect'] != '')?esc_attr($wpmi_menu_settings['wpmi_icon_settings']['icon_settings']['hover_animation_effect']):'';
?>
<div class="wpmi-animation-options">
  <div class="wpmi-settings_title"><h4><?php _e('Animation Settings','ak-menu-icons-lite');?></h4></div>
  <table class="widefat wpmi-table-options wpmi-iconsettings-table">
	<tr>
		 <td class="wpmi_meta_table">
			<label for="enable_animation"><?php _e("Enable Animation", 'ak-menu-icons-lite') ?></label>
		 </td>
		 <td> 
		 	 <div class="wpmi-switch">
	          <input type='checkbox' class='wpmi_input_options' id="enable_animation"
	           name='wpmi_icon_settings[icon_settings][enable_animation]' value='1' <?php echo checked($enable_animation,1, 0); ?>/>
	          <label for="enable_animation"></label>
	        </div>
         <p class="description"><?php _e("Note: Enable to display divider line between icon and menu title", 'ak-menu-icons-lite'); ?></p>
		 </td>
	</tr>	
	<tr>
		 <td class="wpmi_meta_table">
			<label><?php _e("Hover Animation Effect", 'ak-menu-icons-lite') ?></label>
		 </td>
		 <td> 
		 	<select class="wpmi-hanimationeffect" name="wpmi_icon_settings[icon_settings][hover_animation_effect]">
               <option value="hvr-icon-back" <?php selected( $hover_animation_effect, 'hvr-icon-back' ); ?>><?php _e("Icon Back", 'ak-menu-icons-lite') ?></option>
               <option value="hvr-icon-forward" <?php selected( $hover_animation_effect, 'hvr-icon-forward' ); ?>><?php _e("Icon Forward", 'ak-menu-icons-lite') ?></option>
               <option value="hvr-icon-down" <?php selected( $hover_animation_effect, 'hvr-icon-down' ); ?>><?php _e("Icon Downward", 'ak-menu-icons-lite') ?></option>
               <option value="hvr-icon-up" <?php selected( $hover_animation_effect, 'hvr-icon-up' ); ?>><?php _e("Icon Up", 'ak-menu-icons-lite') ?></option>
               <option value="hvr-icon-grow" <?php selected( $hover_animation_effect, 'hvr-icon-grow' ); ?>><?php _e("Icon Grow", 'ak-menu-icons-lite') ?></option>
               <option value="hvr-icon-pulse" <?php selected( $hover_animation_effect, 'hvr-icon-pulse' ); ?>><?php _e("Icon Pulse", 'ak-menu-icons-lite') ?></option>
		 	</select>
		 </td>
	</tr>
    <tr>
     <td class="wpmi_meta_table">
      <label><?php _e("Preview", 'ak-menu-icons-lite') ?></label>
     </td>
     <td> 
     <?php
      $animation_effect = (isset($wpmi_menu_settings['wpmi_icon_settings']['icon_settings']['hover_animation_effect']) && $wpmi_menu_settings['wpmi_icon_settings']['icon_settings']['hover_animation_effect'] != '')?esc_attr($wpmi_menu_settings['wpmi_icon_settings']['icon_settings']['hover_animation_effect']):'hvr-icon-back';
     ?>
      <div class="wpmicon-animation-preview <?php echo $animation_effect;?>">
        <i class="fa fa-home hvr-icon" aria-hidden="true"></i> <span>Home</span>
      </div>
     </td>
  </tr>
  </table>
</div>