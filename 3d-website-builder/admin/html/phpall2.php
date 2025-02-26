
<?php
/**
* Author : Keivan Kamali
*/
if(!defined('ABSPATH')) exit();
?>

<div id="wb3d_0">
      <label class="wb3d_displaynone" id="wb3d_download_addon" ><?php esc_html_e('Copy New Modules From Pro Version', 'wb3d'); ?></label> 
      <div class="wb3d_displaynone" id='divscrolltop2'><?php esc_html_e('V:', 'wb3d'); ?>
            <input disabled="disabled" type="number" min="0" id='spinnertop' value="0">
      </div>
      <div class="wb3d_displaynone" id='divsize_w_h'><?php esc_html_e('W/H:', 'wb3d'); ?>
            <input disabled="disabled"  type="number" min="0" id='size_w_h'>
      </div>
      <div class="wb3d_displaynone" id='divStatus'><?php esc_html_e('Status:', 'wb3d'); ?>
            <input disabled="disabled"  type="number" min="0" id='Status'>
      </div>
      <div id="wb3d_fullscrean2"  class="wb3d_displaynone">
            <img id="wb3d_fullscrean_img2" src="<?php echo esc_url(wb3d_plagin_images_URL);?>/1.gif">    
            <div id="wb3d_fullscrean_">
                  <img id="wb3d_fullscrean_close2" src="<?php echo esc_url(wb3d_plagin_images_URL);?>close3.png" class="imgbuttom img40 pointer">
            </div>
      </div>
    
      <div  id="wb3dh_0">
            <?php 
            echo wp_kses_post($GLOBALS['wb3d_html']);

            ?>

      </div>
</div>




