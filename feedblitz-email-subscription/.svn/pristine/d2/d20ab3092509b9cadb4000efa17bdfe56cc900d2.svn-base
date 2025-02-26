<?php
class DW_Widget extends WP_Widget {  //openning class DW_Widget
    /**
     * Prints a basic text input for widget forms
     */
	  //insert code here
	   
		
		
		 
    function text_field($name, $value, $label = null) {
		
        if(!$label) { $label =  ucwords($name); }
		$label = explode('_', $label ); 
		?>
        
        <p>
            <label for="<?php echo $this->get_field_id($name); ?>">
                <?php foreach($label as $label){			
						echo $label.' ';
			}  ?>:
                <input class="widefat"
                       id="<?php echo $this->get_field_id($name); ?>"
                       name="<?php echo $this->get_field_name($name); ?>"
                       type="text" value="<?php echo $value; ?>" />
            </label>
        </p>
    <?php }
	 function text_area($name, $value, $label = null) {
        if(!$label) { $label =  ucwords($name); }
		$label = explode('_', $label ); ?>
        
        <p>
            <label for="<?php echo $this->get_field_id($name); ?>">
                <?php foreach($label as $label){			
						echo $label.' ';
					}  
					?>:
                <textarea class="widefat"
                       id="<?php echo $this->get_field_id($name); ?>"
                       name="<?php echo $this->get_field_name($name); ?>"
                       type="text"><?php echo $value; ?></textarea>
            </label>
        </p>
    <?php }
	
	
} //closing of class DW_Widget
?>
