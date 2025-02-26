<?php 
if(!defined('ABSPATH')) exit();
?>


<div class="wb3d_panel wb3d_displaynone" id="vscroll_div">
      <div id="vscroll_header0" >
            <input type="button" id="vscroll_submit" value="<?php esc_attr_e('OK', 'wb3d'); ?>">
            <label id="vscroll_label0">Vertical Scroll (Folder:vscroll) Ver:1.0.0</label>  
            <img src="<?php echo esc_url(wb3d_plagin_images_URL);?>close3.png" id="vscroll_close2">
      </div>

      <div id="vscroll_div2">
            <fieldset class="fieldset_block" id="vscroll_fieldset"  >
                  <legend><?php esc_html_e('Menu', 'wb3d'); ?></legend>
                  <div style="" id="vscroll_upload">
                        <input id="vscroll_upload_button1" type="button"  value="<?php esc_attr_e('Upload Picture', 'wb3d'); ?>">
                        <input type="text"  id="vscroll_upload_link1" >
                        <img src="<?php echo esc_url(wb3d_plagin_images_URL);?>noimage.png"  id="vscroll_upload_pic1">
                        <input id="vscroll_upload_button2" type="button"  value="<?php esc_attr_e('Upload Picture (Handle)', 'wb3d'); ?>">
                        <input type="text"  id="vscroll_upload_link2" >
                        <img src="<?php echo esc_url(wb3d_plagin_images_URL);?>noimage.png"  id="vscroll_upload_pic2">
                        <label id="vscroll_handle_label"><?php esc_html_e('Effect(Handle)', 'wb3d'); ?></label>  
                        <select id="vscroll_selectmenu"></select>
                  </div>
                  <div id="vscroll_div_overflow">
                        <label   for="vscroll_overflow1"><?php esc_html_e('Overflow:hidden', 'wb3d'); ?></label>
                        <input type="checkbox" id="vscroll_overflow1"  class="chackboxclass">
                  </div> 
            </fieldset>
      </div>
</div>

<?php

function wb3d_create_vscroll($level,$cu,$sn,$idm,$B,$T,$wslide,$name,$y,$dlnum,$aa,$w_0,$name_0,$y_0){
  
      global $wb3d_html;
      $m_=' onMouseDown="mouseIsDown=true;return false" onMouseUp="mouseIsDown=false" ';

      $img_="img_".$y;
      $img2_="img2_".$y;
      $src1=$B[$img_] ;
      $src2=$B[$img2_] ;

      if($src1!=""){
            $wb3d_html.='<img class="wb3d_absolute" '.$m_. ' id="wb3de1-'.$idm.'-2"  src="'.$src1.'"  style=" width:100%;height:100%;top:0px;left:0px;z-index:1;"/>';
      }
      $wb3d_html.='<div class="wb3d_absolute" '.$m_. ' id="wb3df-'.$idm.'-2" >';
      if($src2!=""){
            $wb3d_html.='<img class="wb3d_absolute" '.$m_. ' id="wb3de-'.$idm.'-2"  src="'.$src2.'"  style=" width:100%;height:100%;top:0px;left:0px;z-index:1;"/>';
      }
      else{
            $wb3d_html.='<div class="wb3d_absolute" '.$m_. ' id="wb3de-'.$idm.'-2"  style=" width:100%;height:100%;top:0px;left:0px;z-index:1;"/></div>';
      }

      $wb3d_html.="</div>";

}


?>