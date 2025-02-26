<?php defined( 'ABSPATH' ) or die( 'No script kiddies please!' );
$fsize = (isset($wpmi_menu_settings['wpmi_icon_settings']['icon_settings']['font_size']) && $wpmi_menu_settings['wpmi_icon_settings']['icon_settings']['font_size'] != '')?$wpmi_menu_settings['wpmi_icon_settings']['icon_settings']['font_size']:'16';
$fcolor = (isset($wpmi_menu_settings['wpmi_icon_settings']['icon_settings']['font_color']) && $wpmi_menu_settings['wpmi_icon_settings']['icon_settings']['font_color'] != '')?$wpmi_menu_settings['wpmi_icon_settings']['icon_settings']['font_color']:'';
$fhcolor = (isset($wpmi_menu_settings['wpmi_icon_settings']['icon_settings']['font_hcolor']) && $wpmi_menu_settings['wpmi_icon_settings']['icon_settings']['font_hcolor'] != '')?$wpmi_menu_settings['wpmi_icon_settings']['icon_settings']['font_hcolor']:'';
$fhcolor = (isset($wpmi_menu_settings['wpmi_icon_settings']['icon_settings']['font_hcolor']) && $wpmi_menu_settings['wpmi_icon_settings']['icon_settings']['font_hcolor'] != '')?$wpmi_menu_settings['wpmi_icon_settings']['icon_settings']['font_hcolor']:'';

$label_font_size = (isset($wpmi_menu_settings['wpmi_icon_settings']['icon_settings']['label_font_size']) && $wpmi_menu_settings['wpmi_icon_settings']['icon_settings']['label_font_size'] != '')?$wpmi_menu_settings['wpmi_icon_settings']['icon_settings']['label_font_size']:'12';
$label_fcolor = (isset($wpmi_menu_settings['wpmi_icon_settings']['icon_settings']['label_fcolor']) && $wpmi_menu_settings['wpmi_icon_settings']['icon_settings']['label_fcolor'] != '')?$wpmi_menu_settings['wpmi_icon_settings']['icon_settings']['label_fcolor']:'';
$label_fhcolor = (isset($wpmi_menu_settings['wpmi_icon_settings']['icon_settings']['label_fhcolor']) && $wpmi_menu_settings['wpmi_icon_settings']['icon_settings']['label_fhcolor'] != '')?$wpmi_menu_settings['wpmi_icon_settings']['icon_settings']['label_fhcolor']:'';
?>
<div class="wpmi-icon-options">
  <div class="wpmi-settings_title">
  	<h4>
    <?php _e('Custom Icon Settings','ak-menu-icons-lite');?>
  	<p class="description"><?php _e("Set custom color for menu icon individually.", 'ak-menu-icons-lite') ?></p>
    </h4>
  </div>
  <table class="widefat wpmi-table-options wpmi-iconsettings-table">
	<tr>
		 <td class="wpmi_meta_table">
			<label><?php _e("Font Size", 'ak-menu-icons-lite') ?></label>
		 </td>
		 <td> 
	       <input type='number' name='wpmi_icon_settings[icon_settings][font_size]' 
			value="<?php echo intval($fsize);?>"/>
		 </td>
	</tr>	
	<tr>
		 <td class="wpmi_meta_table">
			<label><?php _e("Font Color", 'ak-menu-icons-lite') ?></label>
		 </td>
		 <td> 
	       <input type='text' class="wpmi-color-picker" name='wpmi_icon_settings[icon_settings][font_color]' 
			value="<?php echo esc_attr($fcolor);?>"/>
		 </td>
	</tr>	
	<tr>
		 <td class="wpmi_meta_table">
			<label><?php _e("Font Hover Color", 'ak-menu-icons-lite') ?></label>
		 </td>
		 <td> 
	       <input type='text' class="wpmi-color-picker" name='wpmi_icon_settings[icon_settings][font_hcolor]' 
			value="<?php echo esc_attr($fhcolor);?>"/>
		 </td>
	</tr>	
  </table>
</div>
<div class="wpmi-icon-options">  
<div class="wpmi-settings_title">
	<h4><?php _e('Menu Label Settings','ak-menu-icons-lite');?>
	<p class="description"><?php _e("Set custom color for menu label individually.", 'ak-menu-icons-lite') ?></p></h4>
</div>
<table class="widefat wpmi-table-options wpmi-iconsettings-table">	 
    	<tr>
		 <td class="wpmi_meta_table">
			<label><?php _e("Font Size", 'ak-menu-icons-lite') ?></label>
		 </td>
		 <td> 
	       <input type='number' name='wpmi_icon_settings[icon_settings][label_font_size]' 
			value="<?php echo intval($label_font_size);?>"/>
		 </td>
	</tr>
     <tr>
	 <td class="wpmi_meta_table">
		<label><?php _e("Font Color", 'ak-menu-icons-lite') ?></label>
	 </td>
	 <td> 
       <input type='text' class="wpmi-color-picker" name='wpmi_icon_settings[icon_settings][label_fcolor]' 
		value="<?php echo esc_attr($label_fcolor);?>"/>
	 </td>
	</tr>
	 <tr>
	 <td class="wpmi_meta_table">
		<label><?php _e("Font Hover Color", 'ak-menu-icons-lite') ?></label>
	 </td>
	 <td> 
       <input type='text' class="wpmi-color-picker" name='wpmi_icon_settings[icon_settings][label_fhcolor]' 
		value="<?php echo esc_attr($label_fhcolor);?>"/>
	 </td>
	</tr>
  </table>
</div>