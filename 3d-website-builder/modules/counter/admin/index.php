<?php 
if(!defined('ABSPATH')) exit();
?>
<div class="wb3d_panel wb3d_displaynone" id="counter_div">
      <div id="counter_header0" >
            <input type="button" id="counter_submit" value="<?php esc_attr_e('OK', 'wb3d'); ?>">
            <label id="counter_label0">Counter (Folder:counter) Ver:1.0.0</label>
            <img src="<?php echo esc_url(wb3d_plagin_images_URL);?>close3.png" id="counter_close2">
      </div>
      <div id="counter_s1">
            <fieldset class="fieldset_block" id="counter_fieldset"  >
                  <legend><?php esc_html_e('Menu', 'wb3d'); ?></legend>
                  <div id="counter_menu" >

                        <label id="counter_label_reset" ><?php esc_html_e('Reset (Out of range)', 'wb3d'); ?></label>
                        <input  type="checkbox" name="counter_reset" id="counter_reset" class="chackboxclass">

                        <label id="counter_label_text" ><?php esc_html_e('Number', 'wb3d'); ?></label>
                        <input type="text" name="counter_text" id="counter_text" value="0">                        

                        <label id="counter_label_atext" ><?php esc_html_e('Additional text', 'wb3d'); ?></label>
                        <input type="text"  id="counter_atext" value="+">

                        <label id="counter_label_time" ><?php esc_html_e('Time', 'wb3d'); ?></label>
                        <input type="number" name="counter_time" id="counter_time" value="10">
                        <label id="counter_label_fontsize" ><?php esc_html_e('Font Size', 'wb3d'); ?></label>
                        <input  name="counter_fontsize" id="counter_fontsize" type="number" min="1" max="300" value="17">
                        <label id="counter_label_fontname"><?php esc_html_e('Font', 'wb3d'); ?></label>
                        <input type="text" name="counter_fontname" id="counter_fontname" value="Arial" >
                        <label id="counter_label_left_padding"><?php esc_html_e('Left Padding', 'wb3d'); ?></label>
                        <input id="counter_left_padding" type="number" value="20">
                        <label id="counter_label_right_padding"><?php esc_html_e('Right Padding', 'wb3d'); ?></label>
                        <input id="counter_right_padding" type="number" value="20">
                        <label id="counter_label_top_padding" ><?php esc_html_e('Top Padding', 'wb3d'); ?></label>
                        <input id="counter_top_padding" type="number" value="10">
                        <label id="counter_label_bottom_padding" ><?php esc_html_e('Bottom Padding', 'wb3d'); ?></label>
                        <input id="counter_bottom_padding" type="number" value="10">
                        <label id="counter_label_fontweight"><?php esc_html_e('Font Weight', 'wb3d'); ?></label>
                        <input  name="counter_fontweight" id="counter_fontweight" type="number" value="100" step="100" max="900" min="100">
                        <label id="counter_label_line_height" ><?php esc_html_e('Line-Height', 'wb3d'); ?></label>
                        <input type="number" title="0 is normal"  name="counter_line_height" id="counter_line_height" min="0" max="100" value="0" step="0.1">
                        <label id="counter_label_decoration"><?php esc_html_e('Text-Decoration', 'wb3d'); ?></label>
                        <select id="counter_decoration">
                              <option value="none" selected=""><?php esc_html_e('None', 'wb3d'); ?></option>
                              <option value="underline"><?php esc_html_e('Underline', 'wb3d'); ?></option>
                              <option value="overline"><?php esc_html_e('Overline', 'wb3d'); ?></option>
                              <option value="line-through"><?php esc_html_e('Line through', 'wb3d'); ?></option>
                        </select>
                  </div>
            </fieldset>
            <div id="counter_demo">
            <div id="counter_demo1">
            <div id="counter_demo2"></div>
            </div>
            </div>
      </div>
</div>


<?php






function wb3d_create_counter($level,$cu,$sn,$idm,$B,$T,$wslide,$name,$y){

}


?>