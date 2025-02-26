<?php
/**
* Version:     1.0.0
* Author:      Keivan Kamali
* copyright :  © 2024 Keivan Kamali all rights reserved
*/
if(!defined('ABSPATH')) exit();
?>

<div class="wb3d_panel wb3d_displaynone" id="ajaxwb3d_div">
      <label class="wb3d_displaynone" id="ajaxwb3d_id_alert1" ><?php esc_html_e('Please select a 3WB object', 'wb3d'); ?></label>
      <label class="wb3d_displaynone" id="ajaxwb3d_id_alert2" ><?php esc_html_e('Please install module ', 'wb3d'); ?></label>

      <div id="ajaxwb3d_header0" >
            <label id="ajaxwb3d_label0">3D Website Builder (Folder:ajaxwb3d) Ver:1.0.0</label>
            <img src="<?php echo esc_url(wb3d_plagin_images_URL);?>close3.png" id="ajaxwb3d_close2">
      </div>
      <div id="div_ajaxwb3d_submit" >
            <input type="button" id="ajaxwb3d_submit" value="<?php esc_attr_e('OK', 'wb3d'); ?>">
      </div>
      <div id="ajaxwb3d_wb3dg" >
            <fieldset class="fieldset_block" id="ajaxwb3d_fieldset"  >
                  <legend><?php esc_html_e('Menu', 'wb3d'); ?></legend>
                  <div  id="ajaxwb3d_upload">
                        <label id="ajaxwb3d_id_label" for="ajaxwb3d_id"><?php esc_html_e('Select project', 'wb3d'); ?></label>
                        <select id="ajaxwb3d_id" ></select> 
                        <div id="ajaxwb3d_ajax">
                              <label   for="ajaxwb3d_checkbox_ajax"><?php esc_html_e('Ajax:', 'wb3d'); ?></label>
                              <input type="checkbox"  id="ajaxwb3d_checkbox_ajax"  class="chackboxclass">
                        </div>
                        <div id="ajaxwb3d_reverse">
                              <label   for="ajaxwb3d_checkbox_reverse"><?php esc_html_e('Reverse Scroll:', 'wb3d'); ?></label>
                              <input type="checkbox"  id="ajaxwb3d_checkbox_reverse"  class="chackboxclass">
                        </div>
                        <div id="ajaxwb3d_overflow">
                              <label   for="ajaxwb3d_checkbox_overflow"><?php esc_html_e('Overflow : hidden', 'wb3d'); ?></label>
                              <input type="checkbox"  id="ajaxwb3d_checkbox_overflow"  class="chackboxclass">
                        </div>
                        <div id="ajaxwb3d_reset">
                              <label   for="ajaxwb3d_checkbox_reset"><?php esc_html_e('Reset ', 'wb3d'); ?></label>
                              <input type="checkbox"  id="ajaxwb3d_checkbox_reset"  class="chackboxclass">
                        </div>
                        <div id="ajaxwb3d_scroll_change_slide">
                              <label   for="ajaxwb3d_checkbox_change_slide"><?php esc_html_e('Change Slide BY Scroll:', 'wb3d'); ?></label>
                              <input type="checkbox"  id="ajaxwb3d_checkbox_change_slide"  class="chackboxclass">
                        </div>
                        <fieldset id="ajaxwb3d_fieldset2" class="fieldset_block" >
                              <legend><?php esc_html_e('Connect to parent.s Scroll', 'wb3d'); ?></legend>
                              <label id="ajaxwb3d_label_active_vscroll" ><?php esc_html_e('Active Vscroll', 'wb3d'); ?></label>
                              <input  type="checkbox" id="ajaxwb3d_active_vscroll">


                              <label id="ajaxwb3d_label_active_vscroll_mt" ><?php esc_html_e('Margin Top %', 'wb3d'); ?></label>
                              <input  type="number" id="ajaxwb3d_active_vscroll_mt" min="0" max="99">

                              <label id="ajaxwb3d_label_active_vscroll_mt2" ><?php esc_html_e('Margin Top %', 'wb3d'); ?></label>
                              <input  type="number" id="ajaxwb3d_active_vscroll_mt2" min="0" max="99">


                              <label id="ajaxwb3d_label_active_vscroll_mt3" ><?php esc_html_e('Margin Top %', 'wb3d'); ?></label>
                              <input  type="number" id="ajaxwb3d_active_vscroll_mt3" min="0" max="99">

                              <label id="ajaxwb3d_label_active_vscroll_mt4" ><?php esc_html_e('Margin Top %', 'wb3d'); ?></label>
                              <input  type="number" id="ajaxwb3d_active_vscroll_mt4" min="0" max="99">
                              <label style="display:none;" id="ajaxwb3d_attention" ><?php esc_html_e('Attention: When you select active scroll just show 1 slide', 'wb3d'); ?></label>
                        </fieldset>
                  </div>
            </fieldset>
      </div>
</div>


<?php





function wb3d_create_ajaxwb3d($level,$cu,$sn,$idm,$B,$T,$wslide,$name,$y,   $dlnum,$aa,$w_0,$name_0,$y_0){
               
 
      global $wb3d_html;
      global $wb3d_dataslide;
      global $wb3d_layers;
      global $wb3d_setting;

      $wb3d_html.='<div class="wb3d_waiting" id="wb3d_waiting-'.$idm.'" >';
      $wb3d_html.='<div class="wb3d_waiting3" id="wb3d_waiting3-'.$idm.'" >';
      $wb3d_html.='<img src="'.esc_url(wb3d_plagin_images_URL).'1.gif">';
      $wb3d_html.='</div>';
      $wb3d_html.='</div>';



      $tmp= "slider_".$y ;
      $sn2=$B[$tmp];

      $ajax_= "ajax_".$y ;
      $ajax_=$B[$ajax_];
      $parent=0;
      if($ajax_===0){
            for( $p=0;$p<$wb3d_setting[$sn2]["num"];$p++){
                  $ff=$wb3d_dataslide[$sn2][$p][0]['slide_of_location'];
                  $aa=&$wb3d_dataslide[$sn2][$p];
                  $wb3d_layers[$sn2.'-'.$ff]=$aa[0]['layer'];
                  for( $i=0;$i<  $wb3d_layers[$sn2.'-'.$ff];$i++){
                        if($i==0){
                              wb3d_create_slider(1,$cu,$ff,"",$sn2,$wslide,$name,$y,$B,"main");
                        }
                        else{
                              wb3d_createlayer(1,$cu,$sn2,$ff,$i,$aa,$wslide,$name,$y,$parent,"main");

                        }
                  }
                  $wb3d_html.='</div>';
            }
      }
}


?>