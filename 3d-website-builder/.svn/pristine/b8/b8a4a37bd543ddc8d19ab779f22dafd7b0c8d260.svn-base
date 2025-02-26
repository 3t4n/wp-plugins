<?php
/**
* Version:     1.0.0
* Author:      Keivan Kamali
* copyright :  © 2024 Keivan Kamali all rights reserved
*/
if(!defined('ABSPATH')) exit();
?>
<div class="wb3d_panel wb3d_displaynone" id="nav_div">
      <div id="nav_header0" >
            <input type="button" id="nav_submit" value="<?php esc_attr_e('OK', 'wb3d'); ?>">
            <label id="nav_label0">Navigation (Folder:nav) Ver:1.0.0</label>
            <img src="<?php echo esc_url(wb3d_plagin_images_URL);?>close3.png" id="nav_close2">
      </div>
      <div id="nav_div5">
            <fieldset class="fieldset_block" id="nav_fieldset"  >
                  <legend><?php esc_html_e('Menu', 'wb3d'); ?> </legend>
                  <div style="" id="nav_upload">
                        <label id="nav_label_ver"><?php esc_html_e('Type', 'wb3d'); ?></label>
                        <select id="nav_ver">
                              <option value="1"><?php esc_html_e('Vertical', 'wb3d'); ?></option>
                              <option value="0"><?php esc_html_e('Horizontal', 'wb3d'); ?></option>
                        </select>
                        <label id="nav_label_padding"><?php esc_html_e('Padding', 'wb3d'); ?></label>
                        <input id="nav_padding" type="number" value="0"> 
                  </div>
            </fieldset>
      </div>
</div>


<?php




function wb3d_create_nav($level,$cu,$sn,$idm,$B,$T,$wslide,$name,$y){
      global $wb3d_html;
      global $wb3d_setting;
      $ver_="ver_".$y;
      for($i=0;$i<$wb3d_setting[$sn]["num"];$i++){
            $wb3d_html.='<div class="wb3d_nav wb3d_pointer wb3d_absolute wb3d_radius" id="wb3dr-'.$idm.'-'.$i.'" style="overflow:hidden;border-radius:50%;"></div>';
      }
}


?>