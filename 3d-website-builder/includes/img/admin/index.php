<?php
/**
* Author URI:  https://3dwebsitebuilder.com/
* Author : Keivan Kamali
*/
if(!defined('ABSPATH')) exit();
?>
<div class="wb3d_panel wb3d_displaynone" id="img_div">
	<div id="img_header0" >
		<input type="button" id="img_submit" value="<?php esc_attr_e('OK', 'wb3d'); ?>">
		<label id="img_label0">Image (Folder:img) ver 1.0.0</label>  
		<img alt="" src="<?php echo (esc_url(wb3d_plagin_images_URL).'close3.png');?>" id="img_close2">
	</div>

	<div id="img_div_0" >
		<fieldset class="fieldset_block" id="img_fieldset"  >
			<legend><?php esc_html_e('Menu', 'wb3d'); ?></legend>
			<div style="" id="img_upload">
				<input id="img_upload_button1" type="button"  value="<?php esc_attr_e('Upload first Image', 'wb3d'); ?>">
				<input type="text"  id="img_upload_link1" >
				<img alt=""  id="img_upload_img1">
				<input id="img_upload_button2" type="button"  value="<?php esc_attr_e('Upload Secound Image', 'wb3d'); ?>" >
                        <label   id="img_note"><?php esc_html_e('The second image becomes active in the specified time/scroll range ', 'wb3d'); ?></label>
				<input type="text"  id="img_upload_link2"  >
				<img alt=""  id="img_upload_img2">
				<input type="text"  id="img_title"  >
				<label id="img_title_label" ><?php esc_html_e('Title', 'wb3d'); ?></label>

				<input type="text"  id="img_alt"  >
				<label id="img_alt_label" ><?php esc_html_e('Alt', 'wb3d'); ?></label>
				<div id="img_zoom_div">
					<label   for="img_zoom_input"><?php esc_html_e('zoom by hover ', 'wb3d'); ?></label>
					<input type="checkbox" name="zoom" id="img_zoom_input" >
				</div>
				<div id="img_div_full">
					<label   for="img_full_input"><?php esc_html_e('Full Screan ', 'wb3d'); ?></label>
					<input type="checkbox" id="img_full_input" >
				</div>    
			</div>
		</fieldset>
	</div>
</div>

<?php

function wb3d_create_img($level,$cu,$sn,$idm,$B,$T,$wslide,$name,$y){
  
      global $wb3d_html;

      $full="full-".$y;

      if($B[$full]){
            $wb3d_html.='<div id="wb3dfullscrean-'.$idm.'" class="wb3d_pointer imgbuttom wb3d_absolute"  style="overflow:hidden;background-image: url('.esc_url(wb3d_plagin_URL).'includes/img/images/full.png);background-size: 100% 100%;top:5px;left:5px;z-index:110;width:14px;height:14px"></div>';  
      }


      $img1_="img1_".$y;
      $src1=esc_html($B[$img1_]) ;

      $title_="title_".$y;
      $alt_="alt_".$y;

      if(!isset($B[$title_])){
            $B[$title_]='';
      }
      if(!isset($B[$alt_])){
            $B[$alt_]='';
      }

      $title=' title="'.esc_attr($B[$title_]).'" ';
      $alt=' alt="'.esc_attr($B[$alt_]).'" ';

      $wb3d_html.='<img class="wb3d_absolute" '.$title.$alt.' id="wb3dimg-'.$idm.'" src="'.$src1.'"  style=" width:100%;height:100%;top:0px;left:0px;z-index:1;"/>';

}


?>