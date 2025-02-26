<?php 
if(!defined('ABSPATH')) exit();
?>
<div class="wb3d_panel wb3d_displaynone" id="text_div">
      <div id="text_header0" >
            <input type="button" id="text_submit" value="<?php esc_attr_e('OK', 'wb3d'); ?>">
            <label id="text_label0">Text (Folder:text) Ver:1.0.0</label>
            <img src="<?php echo esc_url(wb3d_plagin_images_URL);?>close3.png" id="text_close2">
      </div>
      <div id="text_div2">
            <fieldset class="fieldset_block" id="text_fieldset"  >
                  <legend><?php esc_html_e('Menu', 'wb3d'); ?></legend>
                  <div id="text_menu" >
                        <label id="text_label_text" ><?php esc_html_e('Text', 'wb3d'); ?></label>
                        <textarea name="text_text" id="text_text" ><?php esc_html_e('Text', 'wb3d'); ?></textarea>
                        <label id="text_label_tag"><?php esc_html_e('Tag:', 'wb3d'); ?></label>
                        <input list="text_list" name="text_tag" id="text_tag">
                        <datalist id="text_list">
                        <option selected="selected" value="div">
                        <option value="a">
                        <option value="span">
                        <option value="p">
                        <option value="h1">
                        <option value="h2">
                        <option value="h3">
                        <option value="h4">
                        <option value="h5">
                        <option value="h6">
                        </datalist>
                        <div id="text_font_style">
                              <img id="text_left" class="pointer imgbuttom text_style" title="Left to right" src="<?php echo esc_url(wb3d_plagin_URL);?>modules/text/images/ltr.png" >
                              <img id="text_justify" class="pointer imgbuttom text_style" title="Justify" src="<?php echo esc_url(wb3d_plagin_URL);?>modules/text/images/justify.png">
                              <img id="text_center" class="pointer imgbuttom text_style" title="Center" src="<?php echo esc_url(wb3d_plagin_URL);?>modules/text/images/center.png" >
                              <img id="text_right" class="pointer imgbuttom text_style" title="Right to left" src="<?php echo esc_url(wb3d_plagin_URL);?>modules/text/images/rtl.png" >
                        </div>
                        <label id="text_label_fontsize" ><?php esc_html_e('Font Size', 'wb3d'); ?></label>
                        <input  name="text_fontsize" id="text_fontsize" type="number" min="1" max="300" value="17">
                        <label id="text_label_fontname"><?php esc_html_e('Font:', 'wb3d'); ?></label>
                        <input type="text" name="text_fontname" id="text_fontname" value="Arial" >
                        <label id="text_label_left_padding"><?php esc_html_e('Padding-Left', 'wb3d'); ?></label>
                        <input id="text_left_padding" type="number" value="20">
                        <label id="text_label_right_padding"><?php esc_html_e('Padding-Right', 'wb3d'); ?></label>
                        <input id="text_right_padding" type="number" value="20" >
                        <label id="text_label_top_padding" ><?php esc_html_e('Padding-Top', 'wb3d'); ?></label>
                        <input id="text_top_padding" type="number" value="10" >
                        <label id="text_label_bottom_padding" ><?php esc_html_e('Padding-Bottom', 'wb3d'); ?></label>
                        <input id="text_bottom_padding" type="number" value="10">
                        <label id="text_label_fontweight"><?php esc_html_e('Font weight', 'wb3d'); ?></label>
                        <input  name="text_fontweight" id="text_fontweight" type="number" value="100" step="100" max="900" min="100">
                        <label id="text_label_line_height" ><?php esc_html_e('Line-height', 'wb3d'); ?></label>
                        <input type="number" title="0 is normal"  name="text_line_height" id="text_line_height" min="0" max="100" value="0" step="0.1">
                        <label id="text_label_decoration"><?php esc_html_e('Text-decoration', 'wb3d'); ?></label>
                        <select id="text_decoration">
                              <option value="none" selected=""><?php esc_html_e('None', 'wb3d'); ?></option>
                              <option value="underline"><?php esc_html_e('Underline', 'wb3d'); ?></option>
                              <option value="overline"><?php esc_html_e('Overline', 'wb3d'); ?></option>
                              <option value="line-through"><?php esc_html_e('Line through', 'wb3d'); ?></option>
                        </select>
                        <select id="text_type_line">
                              <option value="nowrap"><?php esc_html_e('Nowrap', 'wb3d'); ?></option>
                              <option value="normal"><?php esc_html_e('Normal', 'wb3d'); ?></option>
                        </select>
                  </div>
            </fieldset>
            <div id="text_demo">
                  <div id="text_demo1">
                        <div id="text_demo2"><?php esc_html_e('Text', 'wb3d'); ?></div>
                  </div>
            </div>
      </div>
</div>


<?php






function wb3d_create_text($level,$cu,$sn,$idm,$B,$T,$wslide,$name,$y){

      global $wb3d_html;
      $value_="text_".$y;
      $x=$B[$value_];
      $wb3d_html.=$x;
}


?>