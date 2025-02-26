<?php 
if(!defined('ABSPATH')) exit();
?>
<div class="wb3d_panel wb3d_displaynone" id="audio_div">
      <div id="audio_header0" >
            <input type="button" id="audio_submit" value="<?php esc_attr_e('OK', 'wb3d'); ?>">
            <label id="audio_label0">Audio ver:1.0.0</label>
            <img src="<?php echo esc_url(wb3d_plagin_images_URL);?>close3.png" id="audio_close2">
      </div>
      <div id="audio_div5" >
            <fieldset class="fieldset_block" id="audio_fieldset"  >
                  <legend><?php esc_html_e('Menu', 'wb3d'); ?></legend>
                  <div style="" id="audio_upload">
                        <input id="audio_upload_button1" type="button"  value="<?php esc_html_e('Upload Your Audio', 'wb3d'); ?>">
                        <input type="text"  id="audio_upload_link1" >
                        <div id="audio_div_download">
                              <label   for="audio_download_input"><?php esc_html_e('Download', 'wb3d'); ?></label>
                              <input type="checkbox" id="audio_download_input"  class="chackboxclass">
                        </div>   
                  </div>
            </fieldset>
      </div>
</div>


<?php





function wb3d_create_audio($level,$cu,$sn,$idm,$B,$T,$wslide,$name,$y){
      global $wb3d_html;
      $download_="download-".$y;
      if($B[$download_]!=1){
            $download_='controlsList="nodownload" ';
      }
      else{
            $download_=' ';
      }

      $audio_="audio_".$y;
      $src1=$B[$audio_] ;
      $wb3d_html.='<audio controls  '.$download_.' id="wb3d2-'.$idm.'" src="'.$src1.'"  style=" width:100%;height:100%;position:absolute;top:0px;left:0px;z-index:1;">';
      $wb3d_html.='Your browser does not support the audio element.';
      $wb3d_html.='</audio>';
}


?>