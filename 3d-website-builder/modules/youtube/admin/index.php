<?php 
if(!defined('ABSPATH')) exit();
?>


<div class="wb3d_panel wb3d_displaynone" id="youtube_div">
      <div id="youtube_header0" >
            <input type="button" id="youtube_submit" value="<?php esc_attr_e('OK', 'wb3d'); ?>">
            <label id="youtube_label0">Youtube (Folder:youtube) Ver:1.0.0</label>
            <img src="<?php echo esc_url(wb3d_plagin_images_URL);?>close3.png" id="youtube_close2">
      </div>
      <div id="youtube_div2">
            <fieldset class="fieldset_block" id="youtube_fieldset"  >
                  <legend><?php esc_html_e('Menu', 'wb3d'); ?></legend>
                  <div id="youtube_upload">
                        <label id="youtube_id_label" for="youtube_id"><?php esc_html_e('Youtube Id :', 'wb3d'); ?></label>
                        <input type="text"  id="youtube_id" >
                  </div>
            </fieldset>
      </div>
</div>


<?php

function wb3d_create_youtube($level,$cu,$sn,$idm,$B,$T,$wslide,$name,$y){
      
      global $wb3d_html;
      $wb3d_html.='<video class="wb3d_absolute" id="video-'.$idm.'"   style=" width:100%;height:100%;top:0px;left:0px;z-index:1;"></video>';
}


?>