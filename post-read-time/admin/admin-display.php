<?php

/**
 * Provide a admin area view for the plugin
 *
 * This file is used to markup the admin-facing aspects of the plugin.
 *
 * @link       http://www.popeating.it
 * @since      1.0.0
 *
 * @package    Shop_Timetable
 * @subpackage Shop_Timetable/admin/
 */
 if ( ! defined( 'ABSPATH' ) ) exit;
?>




<div class="wrap">

    <h1><?php _e('Post Read Time Setup', 'post-read-time'); ?></h1>

  
<form method="post" action="options.php"> 
<?php
$options = get_option($this->plugin_name.'_options');
do_settings_sections($this->plugin_name);
settings_fields($this->plugin_name);
$words = $options['words'];
$auto = $options['auto'];
$images = $options['images'];
$on_pages = $options['on_pages'];
$class = $options['class'];
$singular = $options['singular'];
$plural = $options['plural'];
$text_before = $options['text_before'];
$class_tb = $options['class_tb'];
$class_ta = $options['class_ta'];
$include_css = $options['include_css'];
?>

<table class="form-table">

	<tr >
	<th scope="row"><label for="<?php echo $this->plugin_name; ?>-words"><?php _e('Words per minutes', 'post-read-time'); ?></label></th>
		<td><input type="text" id="<?php echo $this->plugin_name; ?>-words" name="<?php echo $this->plugin_name.'_options'; ?>[words]" value="<?php echo $words ?>" class="small-text"/><label for="<?php echo $this->plugin_name.'_options'; ?>[words]"> <?php _e( 'Average reading word per minutes (usually between 220 and 265)', 'post-read-time' ); ?></label></td>
	</tr>
  
	<tr valign="top">
		<th scope="row"><?php esc_attr_e('Add time to read to posts', 'post-read-time'); ?></th>
		<td>
		 <fieldset>
			<legend class="screen-reader-text">
				<span><?php esc_attr_e('Automatically add time to read to posts', 'post-read-time'); ?></span>
			</legend>
			<label for="<?php echo $this->plugin_name; ?>-auto">
				<input type="checkbox" id="<?php echo $this->plugin_name; ?>-auto" name="<?php echo $this->plugin_name.'_options'; ?>[auto]" value="1" <?php checked($auto, 1); ?> />
					<?php esc_attr_e('Automatically insert time to read the post before the content', 'post-read-time'); ?>
			</label>
			</fieldset>
		</td>
	</tr>
	
		<tr valign="top">
		<th scope="row"><?php esc_attr_e('Calculate images', 'post-read-time'); ?></th>
		<td>
		 <fieldset>
			<legend class="screen-reader-text">
				<span><?php esc_attr_e('Add time spent watching images', 'post-read-time'); ?></span>
			</legend>
			<label for="<?php echo $this->plugin_name; ?>-images">
				<input type="checkbox" id="<?php echo $this->plugin_name; ?>-images" name="<?php echo $this->plugin_name.'_options'; ?>[images]" value="1" <?php checked($images, 1); ?> />
					<?php esc_attr_e('Add the time spent watching images', 'post-read-time'); ?>
			</label>
			</fieldset>
		</td>
	</tr>
  
  
  </tr>
	
	
	<tr valign="top">
		<th scope="row"><?php esc_attr_e('Show reading time on pages', 'post-read-time'); ?></th>
		<td>
		 <fieldset>
			<legend class="screen-reader-text">
				<span><?php esc_attr_e('Calculate and show reading time also on pages', 'post-read-time'); ?></span>
			</legend>
			<label for="<?php echo $this->plugin_name; ?>-on_pages">
				<input type="checkbox" id="<?php echo $this->plugin_name; ?>-on_pages" name="<?php echo $this->plugin_name.'_options'; ?>[on_pages]" value="1" <?php checked($on_pages, 1); ?> />
					<?php esc_attr_e('Calculate and show reading time also on pages', 'post-read-time'); ?>
			</label>
			</fieldset>
		</td>
	</tr>
	
	
	
		<tr >
	<th scope="row"><label for="<?php echo $this->plugin_name; ?>-text_before"><?php _e('Text before minutes', 'post-read-time'); ?></label></th>
		<td><input type="text" id="<?php echo $this->plugin_name; ?>-text_before" name="<?php echo $this->plugin_name.'_options'; ?>[text_before]" value="<?php echo $text_before ?>" class="regular-text"/><label for="<?php echo $this->plugin_name.'_options'; ?>[text_before]"> <?php _e( 'Text to print before minutes', 'post-read-time' ); ?></label></td>
	</tr>
	
	<tr >
	<th scope="row"><label for="<?php echo $this->plugin_name; ?>-singular"><?php _e('Singular for minutes', 'post-read-time'); ?></label></th>
		<td><input type="text" id="<?php echo $this->plugin_name; ?>-singular" name="<?php echo $this->plugin_name.'_options'; ?>[singular]" value="<?php echo $singular ?>" class="regular-text"/><label for="<?php echo $this->plugin_name.'_options'; ?>[singular]"> <?php _e( 'Singular to add after minutes', 'post-read-time' ); ?></label></td>
	</tr>
	
	
	<tr >
	<th scope="row"><label for="<?php echo $this->plugin_name; ?>-plural"><?php _e('Plural for minutes', 'post-read-time'); ?></label></th>
		<td><input type="text" id="<?php echo $this->plugin_name; ?>-plural" name="<?php echo $this->plugin_name.'_options'; ?>[plural]" value="<?php echo $plural ?>" class="regular-text"/><label for="<?php echo $this->plugin_name.'_options'; ?>[plural]"> <?php _e( 'Plural to add after minutes', 'post-read-time' ); ?></label></td>
	</tr>
	
	
	<tr valign="top">
		<th scope="row"><?php esc_attr_e('Include default CSS', 'post-read-time'); ?></th>
		<td>
		 <fieldset>
			<legend class="screen-reader-text">
				<span><?php esc_attr_e('Include default CSS, if you are using your own classes you can disable it', 'post-read-time'); ?></span>
			</legend>
			<label for="<?php echo $this->plugin_name; ?>-include_css">
				<input type="checkbox" id="<?php echo $this->plugin_name; ?>-include_css" name="<?php echo $this->plugin_name.'_options'; ?>[include_css]" value="1" <?php checked($include_css, 1); ?> />
					<?php esc_attr_e('Include default CSS, if you are using your own classes you can disable it', 'post-read-time'); ?>
			</label>
			</fieldset>
		</td>
	</tr>
	
	
		<tr >
	<th scope="row"><label for="<?php echo $this->plugin_name; ?>-words"><?php _e('Minutes number CSS class', 'post-read-time'); ?></label></th>
		<td><input type="text" id="<?php echo $this->plugin_name; ?>-class" name="<?php echo $this->plugin_name.'_options'; ?>[class]" value="<?php echo $class ?>" class="regular-text"/><label for="<?php echo $this->plugin_name.'_options'; ?>[class]"> <?php _e( 'Class to add to number of minutes', 'post-read-time' ); ?></label></td>
	</tr>
	
		<tr >
	<th scope="row"><label for="<?php echo $this->plugin_name; ?>-class_ta"><?php _e('Minutes text CSS class', 'post-read-time'); ?></label></th>
		<td><input type="text" id="<?php echo $this->plugin_name; ?>-class_ta" name="<?php echo $this->plugin_name.'_options'; ?>[class_ta]" value="<?php echo $class_ta ?>" class="regular-text"/><label for="<?php echo $this->plugin_name.'_options'; ?>[class_ta]"> <?php _e( 'Class to add to minutes text', 'post-read-time' ); ?></label></td>
	</tr>
	

	
			<tr >
	<th scope="row"><label for="<?php echo $this->plugin_name; ?>-class_tb"><?php _e('Text before minutes CSS class', 'post-read-time'); ?></label></th>
		<td><input type="text" id="<?php echo $this->plugin_name; ?>-class_tb" name="<?php echo $this->plugin_name.'_options'; ?>[class_tb]" value="<?php echo $class_tb ?>" class="regular-text"/><label for="<?php echo $this->plugin_name.'_options'; ?>[class_tb]"> <?php _e( 'Class to add to text before minutes', 'post-read-time' ); ?></label></td>
	</tr>
  
</table>



	<?php
         
        
		  submit_button();
		  ?>
		  </form>

    <h2 class="title"><?php _e('Usage', 'post-read-time'); ?></h2>
	<?php _e('Activating the plugin will show a reading time (based on words and images) just above the content of the post. It will be formatted according included CSS, but you can disable default CSS and assign you own classes above; every piece of the "Reading Time" sentence has its own class. Also you can change the "Reading Time:" word and the word displayed after the minutes (both in singular an plural)<br>if you need more control, the plugin offer two function you can include in your theme: <pre>&lt;?php get_time_in_minutes($id_of_post); ?&gt;</pre> that retrieve the reading time for a post and <pre>&lt;?php time_in_minutes($id_of_post); ?&gt;</pre>that print out the time in minutes<br><br><b>Shortcode</b><br>Using the following shortcode<pre>[\'post_read_time\']</pre>inside a post or a page, it will print out the read time in minutes of the current post or page.', 'post-read-time'); ?>
 </div>
 


