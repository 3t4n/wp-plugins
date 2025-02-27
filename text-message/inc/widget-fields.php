<?php if ( ! defined( 'ABSPATH' ) ) exit; // Exit if accessed directly  ?>

<p>

	<label>Title</label>
	<input class="widefat" name="<?php echo $this->get_field_name('title'); ?>" type="text" value="<?php echo $title; ?>" />
	
</p>	

<p>
    <label for="wpbiztext_widget_display">Display</label>
	<select  class="widefat" name="<?php echo $this->get_field_name('wpbiztext_widget_display'); ?>" id="wpbiztext_widget_display">
		<option value="link" <?php if($display_type == "link") echo 'selected="selected"'; ?> >Link</option>
		<option value="button" <?php if($display_type == "button") echo 'selected="selected"'; ?>>Button</option>	
	</select>	
	
</p>
	
<p>

	<input name="<?php echo $this->get_field_name('display_devices'); ?>" type="checkbox" id="wpbiztext_widget_show" value="1" <?php checked ($display_devices,1); ?> /> <label for="wpbiztext_widget_show">Display On All Devices</label>		
	<p>Not displaying on all devices will, by default, only show the display (button, link, or icon) on a mobile device and in Safari screens under 1024px in width.</p>
	
</p>

<p>
    <hr>
</p> 


<?php if($biz_button_fixed == "false") { 

    // only show if not checked in global settings

?>
    

    <h3> Override Global Fixed Button Options</h3>

    <p> Change settings under Fixed Options in <a href="http://dennis-bartel.com/wp-admin/admin.php?page=biz-text&tab=display">Display On Website</a>, under Biz Text.</p>

    <p>
        <input name="<?php echo $this->get_field_name('display_fixed'); ?>" type="checkbox" id="wpbiztext_widget_fix_button" value="1" <?php checked ($display_fixed,1); ?> /> <label for="wpbiztext_widget_fix_button">Fix Button On Website Pages</label>		
    </p>

    <label for="wpbiztext_widget_fix_button">Icon Instead of Button</label>
	<select  class="widefat" name="<?php echo $this->get_field_name('display_fixed_icon'); ?>" id="wpbiztext_widget_fix_button">
		
		<option value="false" <?php if($display_fixed_icon == "false") echo 'selected="selected"'; ?>>No Icon</option>
        <option value="xsmall" <?php if($display_fixed_icon == "xsmall") echo 'selected="selected"'; ?>>Extra Small</option>
        <option value="small" <?php if($display_fixed_icon == "small") echo 'selected="selected"'; ?>>Small</option>
        <option value="medium" <?php if($display_fixed_icon == "medium") echo 'selected="selected"'; ?>>Medium</option>
        <option value="large" <?php if($display_fixed_icon == "large") echo 'selected="selected"'; ?>>Large</option>
        <option value="xlarge" <?php if($display_fixed_icon == "xlarge") echo 'selected="selected"'; ?>>Extra Large</option>

	</select>	
	
</p>
	

<?php } ?>
	
				
