<div class="AS_gmap_widget">
	<p><label for="<?php echo $this->get_field_id('title'); ?>">Map Widget Title:</label>
	<input type="text" id="<?php echo $this->get_field_id('title'); ?>" name="<?php echo $this->get_field_name('title'); ?>" value="<?php echo esc_attr($instance['title']); ?>" class="widefat"></p>

	<p><label for="<?php echo $this->get_field_id('width'); ?>">Map Width:</label>
	<input type="number" id="<?php echo $this->get_field_id('width'); ?>" name="<?php echo $this->get_field_name('width'); ?>" value="<?php echo esc_attr($instance['width']); ?>" class="widefat"></p>

	<p><label for="<?php echo $this->get_field_id('height'); ?>">Map Height:</label>
	<input type="number" id="<?php echo $this->get_field_id('height'); ?>" name="<?php echo $this->get_field_name('height'); ?>" value="<?php echo esc_attr($instance['height']); ?>" class="widefat"></p>

	<p><label for="<?php echo $this->get_field_id('zoom'); ?>">Map Zoom:</label>
	<input type="number" id="<?php echo $this->get_field_id('zoom'); ?>" name="<?php echo $this->get_field_name('zoom'); ?>" value="<?php echo esc_attr($instance['zoom']); ?>" class="widefat"></p>

	<p><label for="<?php echo $this->get_field_id('latitude'); ?>">Map Latitude:</label>
	<input type="number" id="<?php echo $this->get_field_id('latitude'); ?>" name="<?php echo $this->get_field_name('latitude'); ?>" value="<?php echo esc_attr($instance['latitude']); ?>" class="widefat"></p>

	<p><label for="<?php echo $this->get_field_id('longitude'); ?>">Map Longitude:</label>
	<input type="number" id="<?php echo $this->get_field_id('longitude'); ?>" name="<?php echo $this->get_field_name('longitude'); ?>" value="<?php echo esc_attr($instance['longitude']); ?>" class="widefat"></p>

	<p>To find your Latitude and Longitude go <a target="_blank" href="http://www.latlong.net/" style="color:#1E8CBE">here</a></p>

</div>