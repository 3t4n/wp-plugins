<?php
/**
* Version:     1.0.0
* Author:      Keivan Kamali
* copyright :  © 2024 Keivan Kamali all rights reserved
*/
if(!defined('ABSPATH')) exit();
?>
<div class="wb3d_panel wb3d_displaynone" id="vscrollslider_div">
      <div id="vscrollslider_header0" >
            <input type="button" id="vscrollslider_submit" value="<?php esc_attr_e('OK', 'wb3d'); ?>">
            <label id="vscrollslider_label0">Vertical Scroll Slider Ver:1.0.0</label>  
            <img src="<?php echo esc_url(wb3d_plagin_images_URL);?>close3.png" id="vscrollslider_close2">
      </div>

      <div id="vscrollslider_div2">
            <fieldset class="fieldset_block" id="vscrollslider_fieldset"  >
                  <legend><?php esc_html_e('Menu', 'wb3d'); ?></legend>
                  <div style="" id="vscrollslider_upload">
                        <input id="vscrollslider_upload_button1" type="button"  value="<?php esc_attr_e('Upload Picture', 'wb3d'); ?>">
                        <input type="text"  id="vscrollslider_upload_link1" >
                        <img src="<?php echo esc_url(wb3d_plagin_images_URL);?>noimage.png"  id="vscrollslider_upload_pic1">
                        <input id="vscrollslider_upload_button2" type="button"  value="<?php esc_attr_e('Upload Picture (Handle)', 'wb3d'); ?>">
                        <input type="text"  id="vscrollslider_upload_link2" >
                        <img src="<?php echo esc_url(wb3d_plagin_images_URL);?>noimage.png"  id="vscrollslider_upload_pic2">
                        <label id="vscrollslider_handle_label"><?php esc_html_e('Effect(Handle)', 'wb3d'); ?></label>  
                        <select id="vscrollslider_selectmenu"></select>
                  </div>
                  <div id="vscrollslider_div_overflow">
                        <label   for="vscrollslider_overflow1"><?php esc_html_e('Overflow:hidden', 'wb3d'); ?></label>
                        <input type="checkbox" id="vscrollslider_overflow1"  class="chackboxclass">
                  </div> 
            </fieldset>
      </div>
</div>

<?php

function wb3d_create_vscrollslider($level,$cu,$sn,$idm,$B,$T,$wslide,$name,$y,$dlnum,$aa,$w_0,$name_0,$y_0){
  
      global $wb3d_html;

      $img_="img_".$y;
      $img2_="img2_".$y;
      $src1=$B[$img_] ;
      $src2=$B[$img2_] ;
      if($src1!=""){
            $wb3d_html.='<img class="wb3d_absolute" id="wb3de1-'.$idm.'-2"  src="'.$src1.'"  style=" width:100%;height:100%;top:0px;left:0px;z-index:1;"/>';
      }
      $wb3d_html.='<div class="wb3d_absolute" id="wb3df-'.$idm.'-2" >';
      if($src2!=""){
            $wb3d_html.='<img class="pointer wb3d_absolute" id="wb3de-'.$idm.'-2"  src="'.$src2.'"  style=" width:100%;height:100%;top:0px;left:0px;z-index:1;"/>';
      }
      else{
            $wb3d_html.='<div class="pointer wb3d_absolute" id="wb3de-'.$idm.'-2"  style=" width:100%;height:100%;top:0px;left:0px;z-index:1;"/></div>';
      }

      $wb3d_html.="</div>";
}


?>