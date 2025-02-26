<?php 
if(!defined('ABSPATH')) exit();
?>

<div class="wb3d_panel wb3d_displaynone" id="afterbefore_div">
      <div id="afterbefore_header0" >
            <input type="button" id="afterbefore_submit" value="<?php esc_attr_e('OK', 'wb3d'); ?>">
            <label id="afterbefore_label0">After Before (Folder:afterbefore) Ver:1.0.0</label>
            <img alt="" src="<?php echo esc_url(wb3d_plagin_images_URL);?>close3.png" id="afterbefore_close2">
      </div>
      <div id="afterbefore_div2">
            <fieldset class="fieldset_block" id="afterbefore_fieldset"  >
                  <legend><?php esc_html_e('Menu', 'wb3d'); ?></legend>
                  <div style="" id="afterbefore_upload">
                        <input id="afterbefore_upload_button1" type="button"  value="<?php esc_attr_e('Upload image 1', 'wb3d'); ?>">
                        <input type="text"  id="afterbefore_upload_link1" >
                        <img alt="" src="<?php echo esc_url(wb3d_plagin_images_URL);?>noimage.png"  id="afterbefore_upload_afterbefore1">
                        <input id="afterbefore_upload_button2" type="button"  value="<?php esc_attr_e('Upload image 2', 'wb3d'); ?>" >
                        <input type="text"  id="afterbefore_upload_link2"  >
                        <img alt="" src="<?php echo esc_url(wb3d_plagin_images_URL);?>noimage.png"  id="afterbefore_upload_afterbefore2">  
                  </div>
                  <select id="afterbefore_vertical">
                        <option value="0"><?php esc_html_e('Vertical', 'wb3d'); ?></option>
                        <option value="1"><?php esc_html_e('Horizontal', 'wb3d'); ?></option>
                  </select>
            </fieldset>
      </div>
</div>


<?php


function wb3d_create_afterbefore($level,$cu,$sn,$idm,$B,$T,$wslide,$name,$y){
      global $wb3d_html;

      $image1_="image1_".$y;
      $image2_="image2_".$y;
      $ver_="ver_".$y;

      $wb3d_html.='<img class="wb3d_absolute" id="wb3d20-'.$idm.'" src="'.$B[$image1_] .'"  style=" width:100%;height:100%;top:0px;left:0px;z-index:1;"/>';

      if($B[$ver_]===1){
            $wb3d_html.='<div class="wb3d_absolute"  id="wb3d21-'.$idm.'" style="height:100%;width:50%;top:0px;left:0px;z-index:2;overflow:hidden;border-right:1px solid #fff;">';
            $wb3d_html.='<img class="wb3d_absolute" id="wb3d22-'.$idm.'" src="'.$B[$image2_] .'" style="height:100%;width:200%;top:0px;left:0px;"/>';
            $wb3d_html.='</div>';
      }
      else{
            $wb3d_html.='<div class="wb3d_absolute" id="wb3d21-'.$idm.'" style="height:50%;width:100%;top:0px;left:0px;z-index:2;overflow:hidden;border-bottom:1px solid #fff;">';
            $wb3d_html.='<img class="wb3d_absolute" id="wb3d22-'.$idm.'" src="'.$B[$image2_] .'" style="height:200%;width:100%;top:0px;left:0px;"/>';
            $wb3d_html.='</div>';
      }
}


?>