<?php
/**
* Author URI:  https://3dwebsitebuilder.com/
* copyright :  © 2024 Keivan Kamali all rights reserved
*/
if(!defined('ABSPATH')) exit();
?>
<div class="wb3d_panel wb3d_displaynone" id="imgsvg_div">
	<div id="imgsvg_header0" >
		<input type="button" id="imgsvg_submit" value="<?php esc_attr_e('OK', 'wb3d'); ?>">
		<label id="imgsvg_label0"><?php esc_html_e('Image-Svg (Folder:imgsvg) ver 1.0.0', 'wb3d'); ?></label>  
		<img alt="" src="<?php echo (esc_url(wb3d_plagin_images_URL).'close3.png');?>" id="imgsvg_close2">
	</div>

	<div id="imgsvg_div_0" >
		<fieldset class="fieldset_block" id="imgsvg_fieldset"  >
			<legend><?php esc_html_e('Menu', 'wb3d'); ?></legend>
			<div style="" id="imgsvg_upload">
				<input id="imgsvg_upload_button1" type="button"  value="<?php esc_attr_e('Upload first Image', 'wb3d'); ?>">
				<input type="text"  id="imgsvg_upload_link1" >
				<img alt=""  id="imgsvg_upload_img1">
				<select id="imgsvg_eff"  ></select>
				<label id="imgsvg_eff_label" ><?php esc_html_e('Effect', 'wb3d'); ?></label>
				<select id="imgsvg_rotate"  >
					<option value="0"><?php esc_html_e('No', 'wb3d'); ?></option>
					<option value="1"><?php esc_html_e('Yes', 'wb3d'); ?></option>
				</select>
				<label id="imgsvg_rotate_label" ><?php esc_html_e('Rotate', 'wb3d'); ?></label>
				<select id="imgsvg_click"  >
					<option value="0"><?php esc_html_e('SVG Tag', 'wb3d'); ?></option>
					<option value="1"><?php esc_html_e('ClipPath', 'wb3d'); ?></option>
				</select>
				<label id="imgsvg_click_label" ><?php esc_html_e('Clickable', 'wb3d'); ?></label>
				<input type="number" min="0.1" step="0.1" id="imgsvg_speed">
				<label id="imgsvg_speed_label" ><?php esc_html_e('Time', 'wb3d'); ?></label>
				<input type="number" id="imgsvg_x">
				<label id="imgsvg_x_label" ><?php esc_html_e('X', 'wb3d'); ?></label>
				<input type="number" id="imgsvg_y">
				<label id="imgsvg_y_label" ><?php esc_html_e('Y', 'wb3d'); ?></label>
				<p id="imgsvg_note" ><?php esc_html_e('If you want the SVG to be smaller or larger in the box, follow the path.', 'wb3d'); ?></p>
				<p id="imgsvg_note2" ><?php esc_html_e('Left menu-> Selected slide-> Selected layer-> Effect width\Effect height', 'wb3d'); ?></p>
			</div>
		</fieldset>
	</div>
</div>

<?php

function wb3d_create_imgsvg($level,$cu,$sn,$idm,$B,$T,$wslide,$name,$y){

}


?>