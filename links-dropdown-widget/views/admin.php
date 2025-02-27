<?php
	$links_category = linkdrop_categories_to_array('link_category');
	ksort($links_category);
?>

<p>
	<label for="<?php echo $this->get_field_id('title'); ?>">
		<?php _e('Title:', 'linkdrop'); ?></label>
	<input class="widefat" id="<?php echo $this->get_field_id('title'); ?>" name="<?php echo $this->get_field_name('title'); ?>" type="text" value="<?php echo $title; ?>" />
</p>

<p>
	<label for="<?php echo $this->get_field_id('default_option'); ?>">
		<?php _e('Default Option:', 'linkdrop'); ?></label>
	<input class="widefat" id="<?php echo $this->get_field_id('default_option'); ?>" name="<?php echo $this->get_field_name('default_option'); ?>" type="text" value="<?php echo $default_option; ?>" />
</p>

<p>
	<label for="<?php echo $this->get_field_id('link_cat'); ?>">
		<?php _e('Link Category:', 'linkdrop'); ?></label>
	<select class="widefat"
		id="<?php echo $this->get_field_id('link_cat'); ?>"
		name="<?php echo $this->get_field_name('link_cat'); ?>">
			<?php foreach ($links_category as $key => $cat ): ?>
				<option <?php selected($link_cat, $key) ?> value="<?php echo $key ?>"><?php echo $cat ?></option>
			<?php endforeach ?>
		</select>
	</select>
</p>

<p>
	<label for="<?php echo $this->get_field_id('open_same_window'); ?>">
		<input <?php checked($open_same_window, 1) ?>
		type="checkbox" name="<?php echo $this->get_field_name('open_same_window') ?>"
		id="<?php echo $this->get_field_id('open_same_window') ?>" value="1">
		<?php _e('Open links in same window', 'linkdrop'); ?></label>
</p>