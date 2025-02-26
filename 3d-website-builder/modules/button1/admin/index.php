<?php 
if(!defined('ABSPATH')) exit();
?>
<div class="wb3d_panel wb3d_displaynone" id="button1_div">
      <div id="button1_header0" >
            <input type="button" id="button1_submit" value="<?php esc_attr_e('OK', 'wb3d'); ?>">
            <label id="button1_label0">Button 1 (Folder:button1) Ver:1.0.0</label>
            <img src="<?php echo esc_url(wb3d_plagin_images_URL);?>close3.png" id="button1_close2">

      </div>
      <div id="button1_s1">
            <fieldset class="fieldset_block" id="button1_fieldset"  >
                  <legend><?php esc_html_e('Menu', 'wb3d'); ?></legend>
                  <div id="button1_menu" >
                        <label id="button1_label_text" ><?php esc_html_e('Text', 'wb3d'); ?></label>
                        <textarea name="button1_text" id="button1_text" ></textarea>
                        <label id="button1_label_tag"><?php esc_html_e('Tag', 'wb3d'); ?></label>
                        <input list="button1_list" name="button1_tag" id="button1_tag">
                        <datalist id="button1_list">
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
                        <div id="button1_font_style">
                              <img id="button1_left" class="pointer button1_style" title="Left to right" src="<?php echo esc_url(wb3d_plagin_URL);?>modules/button1/images/ltr.png" >
                              <img id="button1_justify" class="pointer button1_style" title="Justify" src="<?php echo esc_url(wb3d_plagin_URL);?>modules/button1/images/justify.png">
                              <img id="button1_center" class="pointer button1_style" title="Center" src="<?php echo esc_url(wb3d_plagin_URL);?>modules/button1/images/center.png" >
                              <img id="button1_right" class="pointer button1_style" title="Right to left" src="<?php echo esc_url(wb3d_plagin_URL);?>modules/button1/images/rtl.png" >
                        </div>
                        <label id="button1_label_fontsize" ><?php esc_html_e('Font Size', 'wb3d'); ?></label>
                        <input  name="button1_fontsize" id="button1_fontsize" type="number" min="1" max="300" value="17">
                        <label id="button1_label_fontname"><?php esc_html_e('Font', 'wb3d'); ?></label>
                        <input type="text" name="button1_fontname" id="button1_fontname" value="Arial" >
                        <label id="button1_label_left_padding"><?php esc_html_e('Left Padding', 'wb3d'); ?></label>
                        <input id="button1_left_padding" type="number" value="20">
                        <label id="button1_label_right_padding"><?php esc_html_e('Right Padding', 'wb3d'); ?></label>
                        <input id="button1_right_padding" type="number" value="20">
                        <label id="button1_label_top_padding" ><?php esc_html_e('Top Padding', 'wb3d'); ?></label>
                        <input id="button1_top_padding" type="number" value="10">
                        <label id="button1_label_bottom_padding" ><?php esc_html_e('Bottom Padding', 'wb3d'); ?></label>
                        <input id="button1_bottom_padding" type="number" value="10">
                        <label id="button1_label_fontweight"><?php esc_html_e('Font Weight', 'wb3d'); ?></label>
                        <input  name="button1_fontweight" id="button1_fontweight" type="number" value="100" step="100" max="900" min="100">
                        <label id="button1_label_line_height" ><?php esc_html_e('Line-Height', 'wb3d'); ?></label>
                        <input type="number" title="0 is normal"  name="button1_line_height" id="button1_line_height" min="0" max="100" value="0" step="0.1">
                        <label id="button1_label_decoration"><?php esc_html_e('Text-Decoration', 'wb3d'); ?></label>
                        <select id="button1_decoration">
                              <option value="none" selected=""><?php esc_html_e('None', 'wb3d'); ?></option>
                              <option value="underline"><?php esc_html_e('Underline', 'wb3d'); ?></option>
                              <option value="overline"><?php esc_html_e('Overline', 'wb3d'); ?></option>
                              <option value="line-through"><?php esc_html_e('Line through', 'wb3d'); ?></option>
                        </select>
                        <select id="button1_type_line">
                              <option value="nowrap"><?php esc_html_e('Nowrap', 'wb3d'); ?></option>
                              <option value="normal"><?php esc_html_e('Normal', 'wb3d'); ?></option>
                        </select>
                  </div>
            </fieldset>
            <div id="button1_demo">
                  <div id="button1_demo1">
                        <div id="button1_demo2"></div>
                  </div>
            </div>
      </div>
</div>


<?php






function wb3d_create_button1($level,$cu,$sn,$idm,$B,$T,$wslide,$name,$y){
      global $wb3d_html;
      $value_="text_".$y;
      $wb3d_html.=$B[$value_];
}


?>