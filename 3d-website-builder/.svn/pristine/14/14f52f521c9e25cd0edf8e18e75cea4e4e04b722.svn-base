<?php 
if(!defined('ABSPATH')) exit();
?>

<div class="wb3d_panel wb3d_displaynone" id="panel_div">
      <div id="panel_header0" >
            <input type="button" id="panel_submit" value="<?php esc_attr_e('OK', 'wb3d'); ?>">
            <label id="panel_label0">Panel (Folder:panel) Ver:1.0.0</label>
            <img alt="close" src="<?php echo esc_url(wb3d_plagin_images_URL);?>close3.png" id="panel_close2">
      </div>
      <div id="panel_div2">
            <fieldset class="fieldset_block" id="panel_fieldset"  >
                  <legend><?php esc_html_e('Menu', 'wb3d'); ?></legend>
                  <div  id="panel_upload">
                        <div id="panel_height">
                              <label   for="panel_input_height"><?php esc_html_e('Auto Height', 'wb3d'); ?></label>
                              <input type="checkbox"  id="panel_input_height"  class="chackboxclass">
                        </div>
                        <div id="panel_relative">
                              <label title="<?php esc_html_e('With position:absolute', 'wb3d'); ?>"  for="panel_input_relative"><?php esc_html_e('Relative Block Simulation', 'wb3d'); ?></label>
                              <input type="checkbox"  id="panel_input_relative"  >
                        </div>
                        <div id="panel_relative2">
                              <label   for="panel_input_relative2"><?php esc_html_e('Real position:Relative', 'wb3d'); ?></label>
                              <input  type="checkbox"  id="panel_input_relative2" >
                        </div>
                        <div id="panel_buttom">
                              <label   for="panel_input_buttom"><?php esc_html_e('Padding-Buttom', 'wb3d'); ?></label>
                              <input type="number" id="panel_input_buttom"  >
                        </div>
                        <div id="panel_margin">
                              <label   for="panel_input_margin"><?php esc_html_e('Marginn-top', 'wb3d'); ?></label>
                              <input type="number" id="panel_input_margin" disabled="disabled" >
                        </div>
                        <div id="panel_div_overflow">
                              <label   for="panel_overflow1"><?php esc_html_e('Overflow:hidden', 'wb3d'); ?></label>
                              <input type="checkbox" id="panel_overflow1"  class="chackboxclass">
                        </div>          
                  </div>
            </fieldset>
      </div>
</div>


<?php

function wb3d_create_panel($level,$cu,$sn,$idm,$B,$T,$wslide,$name,$y,$dlnum,$aa,$w_0,$name_0,$y_0){


      global $wb3d_html;
      global $wb3d_layers;

      if($level===0){
            $wb3d_html.='<div class="wb3d_pointer wb3d_absolute" style="top: -15px;left: 0px;z-index:5">';
      }
      if($level===0){
            $wb3d_html.='<img id="lock_panel-'.$idm.'" class="imgbuttom pointer img40 wb3d_absolute" style="left:20px;width: 15px;height: 15px;" src="'.esc_url(wb3d_plagin_images_URL).'lock.png"></div>';
      }

      for($r=$dlnum+1;$r< $wb3d_layers[$sn.'-'.$wslide];$r++){
            wb3d_createlayer($level,$cu,$sn,$wslide,$r,$aa,$w_0,$name_0,$y_0,$name,"main" );
      }
}


?>