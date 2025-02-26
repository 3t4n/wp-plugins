<?php

if ( ! defined( 'ABSPATH' ) ) exit;

function numbered_pagination_form() {

    if ( ! current_user_can('manage_options') ) exit('Unable to access.');
	
	$options = get_option('numbered_pagination_settings');
	   
		?>
	<form action='' method='post' accept-charset='UTF-8' id='numbered_pagination_select' >

	<table class='form-table'>
	<tbody>
	
	<tr>
	<th scope='row'>
	<label><?php echo __('Show previous and next buttons', 'numbered-pagination'); ?></label>
	</th>
	<td>
	<input type='checkbox' name='prev_next' value='1' <?php echo checked($options['prev_next'], 1); ?>></br>
	</td>
	</tr>
	
	<tr>
	<th scope='row'>
	<label><?php echo __('Text for previous', 'numbered-pagination'); ?></label>
	</th>
	<td>
	<input type='text' name='previous_text' value='<?php echo esc_attr($options['previous_text']); ?>' maxlength="20"></br>
	</td>
	</tr>
	
	<tr>
	<th scope='row'>
	<label><?php echo __('Text for next', 'numbered-pagination'); ?></label>
	</th>
	<td>
	<input type='text' name='next_text' value='<?php echo esc_attr($options['next_text']); ?>' maxlength="20"></br>
	</td>
	</tr>
	
	<tr>
	<th scope='row'>
	<label><?php echo __('Choose number of range', 'numbered-pagination'); ?></label>
	</th>
	<td>
	 <input type='number' name='default_range' min='0' value='<?php echo esc_attr($options['default_range']); ?>'></br>
	 <p class="description" id="tagline-description"><?php echo __('Setting to 0, will show only previous and next buttons.', 'numbered-pagination'); ?></p>
	</td>
	</tr>
	
	<tr>
	<th scope='row'>
	<label><?php echo __('Check to show all pages', 'numbered-pagination'); ?></label>
	</th>
	<td>
	<input type='checkbox' name='show_all' value='1' <?php echo checked($options['show_all'], 1); ?>></br>
	</td>
	</tr>
	
	<tr>
	<th scope='row'>
	<label><?php echo __('Align', 'numbered-pagination'); ?></label>
	</th>
	<td>
	<select name="align" form="numbered_pagination_select">

	<?php 
	$left = __('left', 'numbered-pagination'); 
	$center = __('center', 'numbered-pagination');
	$right = __('right', 'numbered-pagination');
	?>
	
    <?php $align_select = array($left, $center, $right); ?>
	
	<?php foreach($align_select as $current_align): if($current_align == $options['align']): echo '<option value="'.esc_attr($current_align).'">'.$current_align.'</option>'; endif; endforeach; ?>
	
	<?php foreach($align_select as $al): if($al !== $options['align']): echo '<option value="'.esc_attr($al).'">'.$al.'</option>'; endif; endforeach; ?>	

	</select>
	</td>
	</tr>
	
	<tr>
	<th scope='row'>
	<label><?php echo __('Font size', 'numbered-pagination'); ?></label>
	</th>
	<td>
	 <input type='number' name='font_size' min='8' max='150' value='<?php echo esc_attr($options['font_size']); ?>'>
	 <p class="description" id="tagline-description"><?php echo __('Value in px.', 'numbered-pagination'); ?></p>

	</td>
	</tr>
	
	<tr>
	<th scope='row'>
	<label><?php echo __('Color', 'numbered-pagination'); ?></label>
	</th>
	<td>
    <input type="text" value="<?php echo esc_attr($options['color']); ?>" name="color" class="color-field" data-default-color="#eaeaea" />	
	</td>
	</tr>
	
	<tr>
	<th scope='row'>
	<label><?php echo __('Text color', 'numbered-pagination'); ?></label>
	</th>
	<td>
    <input type="text" value="<?php echo esc_attr($options['text_color']); ?>" name="text_color" class="color-field" data-default-color="#3f3f3f" />	
	</td>
	</tr>
	
	<tr>
	<th scope='row'>
	<label><?php echo __('Current color', 'numbered-pagination'); ?></label>
	</th>
	<td>
    <input type="text" value="<?php echo esc_attr($options['current_color']); ?>" name="current_color" class="color-field" data-default-color="#3f3f3f" />	
	</td>
	</tr>
	
	<tr>
	<th scope='row'>
	<label><?php echo __('Current text color', 'numbered-pagination'); ?></label>
	</th>
	<td>
    <input type="text" value="<?php echo esc_attr($options['current_text_color']); ?>" name="current_text_color" class="color-field" data-default-color="#ffffff" />	
	</td>
	</tr>
	
	<tr>
	<th scope='row'>
	<label><?php echo __('Hover color', 'numbered-pagination'); ?></label>
	</th>
	<td>
    <input type="text" value="<?php echo esc_attr($options['hover_color']); ?>" name="hover_color" class="color-field" data-default-color="#3f3f3f" />	
	</td>
	</tr>
	
	<tr>
	<th scope='row'>
	<label><?php echo __('Hover text color', 'numbered-pagination'); ?></label>
	</th>
	<td>
    <input type="text" value="<?php echo esc_attr($options['hover_text_color']); ?>" name="hover_text_color" class="color-field" data-default-color="#ffffff" />	
	</td>
	</tr>
	
	<tr>
	<th scope='row'>
	<label><?php echo __('Add shortcode', 'numbered-pagination'); ?></label>
	</th>
	<td>
    <kbd>do_shortcode( '[numbered-pagination]' );</kbd>
	</td>
	</tr>
	
	</tbody>
	</table>
		<?php
	 
		submit_button( __('Save Changes', 'numbered-pagination') );
		?>
		
    <?php wp_nonce_field( 'numbered_pagination_nonce_action', 'numbered_pagination_nonce_field' ); ?>

	</form>
	
	<?php

 
}






