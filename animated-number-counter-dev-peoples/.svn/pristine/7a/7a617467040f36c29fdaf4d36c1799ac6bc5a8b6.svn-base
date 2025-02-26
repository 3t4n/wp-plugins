<?php

$dv_counter_option_page = 'dp-counter-settings';

/**
 * Add option page
 */
add_action('admin_menu', 'devpeoples_add_option_page');
function devpeoples_add_option_page() {

  global $dv_counter_option_page;
	add_options_page(__('Animated Number Counter'), __('Animated Number Counter'), 'manage_options', $dv_counter_option_page, 'devpeoples_option_page');  
}

/**
 * Render option page
 */
function devpeoples_option_page() {

  global $dv_counter_option_page;
  
?>

  <div class="wrap">
		<h2><?php _e('Counter Settings') ?></h2>
		<form method="post" enctype="multipart/form-data" action="options.php">
      <?php 
      
        settings_fields('dv_counter_options');
        do_settings_sections($dv_counter_option_page);
			?>
			<p class="submit">  
				<input type="submit" class="button-primary" value="<?php _e('Save Changes') ?>"/>  
			</p>
		</form>
	</div>

<?php
}

/**
 * Register settings
 */
add_action('admin_init', 'devpeoples_register_settings');
function devpeoples_register_settings() {

  global $dv_counter_option_page;
  
	register_setting('dv_counter_options', 'dv_counter_options', 'dv_counter_validate_settings');
	add_settings_section('dv_counter_section_1', __('Start number'), '', $dv_counter_option_page);
 
	$start_number = array(
		'type'      => 'text',
		'id'        => 'start_number',
		'desc'      => '',
		'label_for' => 'start_number'
	);
 
	$increment = array(
		'type'      => 'text',
		'id'        => 'increment',
		'desc'      => '',
		'label_for' => 'increment'
  );
  
	$time = array(
		'type'      => 'text',
		'id'        => 'time',
		'desc'      => '',
		'label_for' => 'time'
  );
  
	$title = array(
		'type'      => 'text',
		'id'        => 'title',
		'desc'      => '',
		'label_for' => 'title'
  );
  
	$desc = array(
		'type'      => 'text',
		'id'        => 'desc',
		'desc'      => '',
		'label_for' => 'desc'
  );
  
	$video = array(
		'type'      => 'text',
		'id'        => 'video',
		'desc'      => 'If the field is empty, the default value will be used',
		'label_for' => 'video'
  );
  
	add_settings_field('start_number', __('Start number'), 'dv_counter_display_settings', $dv_counter_option_page, 'dv_counter_section_1', $start_number);
	add_settings_field('increment', __('Increment number'), 'dv_counter_display_settings', $dv_counter_option_page, 'dv_counter_section_1', $increment);
	add_settings_field('time', __('Duration time'), 'dv_counter_display_settings', $dv_counter_option_page, 'dv_counter_section_1', $time);
	add_settings_field('title', __('Title'), 'dv_counter_display_settings', $dv_counter_option_page, 'dv_counter_section_1', $title);
	add_settings_field('desc', __('Description'), 'dv_counter_display_settings', $dv_counter_option_page, 'dv_counter_section_1', $desc);
	add_settings_field('video', __('Video'), 'dv_counter_display_settings', $dv_counter_option_page, 'dv_counter_section_1', $video);
}

/**
 * Render settings
 */
function dv_counter_display_settings($args) {

	extract($args);
 
	$option_name  = 'dv_counter_options';
	$option       = get_option($option_name);
 
	switch ($type) {  
		case 'text':  
			$option[ $id ] = esc_attr(stripslashes($option[ $id ]));
			echo "<input class='regular-text' type='text' id='$id' name='" . $option_name . "[$id]' value='$option[$id]' />";  
			echo ($desc != '') ? "<br /><span class='description'>$desc</span>" : "";  
    break;
    
		case 'textarea':  
			$option[$id] = esc_attr( stripslashes($option[$id]) );
			echo "<textarea class='code large-text' cols='50' rows='10' type='text' id='$id' name='" . $option_name . "[$id]'>$option[$id]</textarea>";  
			echo ($desc != '') ? "<br /><span class='description'>$desc</span>" : "";  
    break;
    
		case 'checkbox':
			$checked = ($option[$id] == 'on') ? " checked='checked'" :  '';  
			echo "<label><input type='checkbox' id='$id' name='" . $option_name . "[$id]' $checked /> ";  
			echo ($desc != '') ? $desc : "";
			echo "</label>";  
    break;
    
		case 'select':
			echo "<select id='$id' name='" . $option_name . "[$id]'>";
			foreach($vals as $v=>$l){
				$selected = ($option[$id] == $v) ? "selected='selected'" : '';  
				echo "<option value='$v' $selected>$l</option>";
			}
			echo ($desc != '') ? $desc : "";
			echo "</select>";  
    break;
    
		case 'radio':
			echo "<fieldset>";
			foreach($vals as $v => $l) {
				$checked = ($option[$id] == $v) ? "checked='checked'" : '';  
				echo "<label><input type='radio' name='" . $option_name . "[$id]' value='$v' $checked />$l</label><br />";
			}
			echo "</fieldset>";  
		break; 
	}
}

/**
 * Validation settings
 */
function dv_counter_validate_settings($input) {

	foreach ($input as $key => $val) {
		$valid_input[ $key ] = trim($val);
  }
  
	return $valid_input;
}