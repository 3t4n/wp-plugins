<?php 
if(!defined('ABSPATH')) exit();
?>

<div class="wb3d_panel wb3d_displaynone" id="video_div">
      <div id="video_header0" >
            <input type="button" id="video_submit" value="<?php esc_attr_e('OK', 'wb3d'); ?>">
            <label id="video_label0">Video (Folder:video) Ver:1.0.0</label>
            <img src="<?php echo esc_url(wb3d_plagin_images_URL);?>close3.png" id="video_close2">
      </div>
      <div id="video_div5" >
            <fieldset class="fieldset_block" id="video_fieldset"  >
                  <legend><?php esc_html_e('Menu', 'wb3d'); ?> </legend>
                  <div style="" id="video_upload">
                        <input id="video_upload_button1" type="button"  value="<?php esc_attr_e('Upload Your Video', 'wb3d'); ?>">
                        <input type="text"  id="video_upload_link1" >
                        <input id="video_upload_image" type="button"  value="<?php esc_attr_e('Upload Demo Picture', 'wb3d'); ?>" >
                        <input type="text"  id="video_upload_link2"  >
                        <img src="<?php echo esc_url(wb3d_plagin_images_URL);?>noimage.png"  id="video_upload_image2">
                        <div id="video_mute_div">
                              <label   for="video_mute_input"><?php esc_html_e('Mute :', 'wb3d'); ?></label>
                              <input type="checkbox" name="zoom" id="video_mute_input"  class="chackboxclass">
                        </div>
                        <div id="video_div_loop">
                              <label   for="video_loop_input"><?php esc_html_e('Loop', 'wb3d'); ?></label>
                              <input type="checkbox" id="video_loop_input"  class="chackboxclass">
                        </div>
                        <div id="video_div_control">
                              <label   for="video_control_input"><?php esc_html_e('Control', 'wb3d'); ?></label>
                              <input type="checkbox" id="video_control_input"  class="chackboxclass">
                        </div>
                        <div id="video_div_download">
                              <label   for="video_download_input"><?php esc_html_e('Download', 'wb3d'); ?></label>
                              <input type="checkbox" id="video_download_input"  class="chackboxclass">
                        </div>  
                  </div>
            </fieldset>
      </div>
</div>


<?php





function wb3d_create_video($level,$cu,$sn,$idm,$B,$T,$wslide,$name,$y){
      global $wb3d_html;

      $control_="control-".$y;

      if($B[$control_]==1){
            $control_=' controls ';
      }
      else{
            $control_=' ';
      }

      $loop="loop-".$y;

      if($B[$loop]==1){
            $loop=' loop ';
      }
      else{
            $loop=' ';
      }

      
      $download_="download-".$y;
      if($B[$download_]!=1){
            $download_='controlsList="nodownload" ';
      }
      else{
            $download_=' ';
      }


      $mute="mute-".$y;
      if($B[$mute]==1){
            $mute=' muted '; 
      }
      else{
            $mute=' ';
      }

      $image_="image_".$y;
      if($B[$image_]!=""){
            $poster=' poster="'.$B[$image_].'"';
      }
      else{
            $poster=' ';;
      }
      $video_="video_".$y;
      $image2_="image2_".$y;
      $src1=$B[$video_] ;

      $wb3d_html.='<video class="wb3d_absolute" '.$poster.$control_.$mute.$download_.$loop.' preload="auto"  src="'.$src1.'" id="wb3d2-'.$idm.'"   style=" width:100%;height:100%;top:0px;left:0px;z-index:1;">';

      $wb3d_html.='</video>';

}


?>