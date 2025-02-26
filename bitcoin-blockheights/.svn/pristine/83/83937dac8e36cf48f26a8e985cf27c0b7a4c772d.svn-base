<?php
global $wpdb;
 
if(isset($_POST['bcbh_but_submit'])){
  $blockheight_active = sanitize_text_field($_POST['blockheight_active']);
  $blockheight_label_text = sanitize_text_field($_POST['blockheight_label_text']);
  $blockheight_font_size = sanitize_text_field($_POST['blockheight_font_size']);
  $blockheight_color = sanitize_hex_color($_POST['blockheight_color']);
  $blockheight_datefix = sanitize_text_field($_POST['blockheight_datefix']);
  $blockheight_missing = sanitize_text_field($_POST['blockheight_missing']);
  update_option("blockheight_active", $blockheight_active);
  update_option("blockheight_label_text", $blockheight_label_text);
  update_option("blockheight_font_size", $blockheight_font_size);
  update_option("blockheight_color", $blockheight_color);
  update_option("blockheight_datefix", $blockheight_datefix);
  update_option("blockheight_missing", $blockheight_missing);

}

$b_active =  get_option( 'blockheight_active' ); 
$b_label_text =  get_option( 'blockheight_label_text' ); 
$b_font_size =  get_option( 'blockheight_font_size' ); 
$b_color =  get_option( 'blockheight_color' ); 
$b_fix =  get_option( 'blockheight_datefix' ); 
$b_missing =  get_option( 'blockheight_missing' ); 


?>
<h1>Blockheight Settings</h1>
<form class="widefat fixed" cellspacing="0" method='post' action=''>
  <table>
  	 <tr>
      <td>Enable</td>
      <td><input type='checkbox'  <?php if($b_active==='on') echo esc_html('checked');?> name='blockheight_active'></td>
    </tr>
     <tr>
      <td>Label Text</td>
      <td><input type="text" name="blockheight_label_text"  value="<?php echo esc_html($b_label_text); ?>"> 
    <small>Default <pre><code>Default  &#x20BF;lockheight:</code></pre></small>
    </td>
    </tr>
    <tr>

      <td>Display on updates if creation height is missing?</td>
      <td><input type='radio' value="yes"  <?php if($b_missing=='yes') echo esc_html('checked');?> name='blockheight_missing'>Yes
      <input type='radio' value="no"    <?php if($b_missing=='no') echo esc_html('checked');?> name='blockheight_missing'>No</td>
    </tr>
    <tr>
      <td>Font Size</td>
      <td>
      	<select name="blockheight_font_size">
           <option value="8px" <?php if($b_font_size==='8px') echo  esc_html('selected="selected"');?>>8px</option>
           <option value="10px" <?php if($b_font_size==='10px') echo  esc_html('selected="selected"');?>>10px</option>
           <option value="12px" <?php if($b_font_size==='12px') echo  esc_html('selected="selected"');?>>12px</option>
           <option value="14px" <?php if($b_font_size==='14px') echo  esc_html('selected="selected"');?>>14px</option>
           <option value="16px" <?php if($b_font_size==='16px') echo  esc_html('selected="selected"');?>>16px</option>
           <option value="18px" <?php if($b_font_size==='18px') echo  esc_html('selected="selected"');?>>18px</option>
           <option value="20px" <?php if($b_font_size==='20px') echo  esc_html('selected="selected"');?>>20px</option>
        </select>
    </td>
    </tr>
    <tr>
    	<td>Color</td>
    	<td><input type="color" value="<?php echo   esc_html($b_color); ?>" name="blockheight_color"></td>
    </tr>

    <tr>
    	<td>Display method</td>
 
      <td>
      <select name="blockheight_datefix">
      <option value="0" <?php if($b_fix==='0') echo esc_html('selected="selected"');?>>Auto</option>
           <option value="1" <?php if($b_fix==='1') echo esc_html('selected="selected"');?>>Method 1</option>
           <option value="2" <?php if($b_fix==='2') echo esc_html('selected="selected"');?>>Method 2</option>
           <option value="shortd" <?php if($b_fix==='shortd') echo esc_html('selected="selected"');?>>By Shortcode</option>
</select>  
      
     
    <small>Try another option if not show properly under date. Shortcode [blockheight]</small>
    </td>
    </tr>
    <tr>
     <td>&nbsp;</td>
     <td><input class="button" type='submit' name='bcbh_but_submit' value='Update'></td>
    </tr>
 </table>
</form>
