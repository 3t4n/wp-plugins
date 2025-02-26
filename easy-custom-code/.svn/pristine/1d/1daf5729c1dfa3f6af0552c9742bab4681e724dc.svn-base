<?php
/* ======================================================
 # Easy Custom Code (LESS/CSS/JS) - Live editing for WordPress - v1.1.2 (free version)
 # -------------------------------------------------------
 # Author: Web357
 # Copyright © 2014-2025 Web357. All rights reserved.
 # License: GNU/GPLv3, http://www.gnu.org/licenses/gpl-3.0.html
 # Website: https://www.web357.com/easy-custom-code-wordpress-plugin
 # Demo: https://demo-wordpress.web357.com/
 # Support: https://www.web357.com/support
 # Last modified: Friday 31 January 2025, 12:48:01 AM
 ========================================================= */
/**
 * Define the internationalization functionality
 */
class EasyCustomCode_fields {

	function textField($args) 
	{ 
		$options = get_option('easy_custom_code_options');
		$class = (isset($args['_class'])) ? $args['_class'] : '';
		$placeholder = (isset($args['placeholder'])) ? $args['placeholder'] : '';
		$size = (isset($args['size'])) ? $args['size'] : 10;
		$maxlength = (isset($args['maxlength'])) ? $args['maxlength'] : 50;
		$default_value = (isset($args['default_value'])) ? $args['default_value'] : '';
		$desc = (isset($args['desc'])) ? $args['desc'] : '';
		$prefix = (isset($args['prefix'])) ? $args['prefix'] : '';
		$suffix = (isset($args['suffix'])) ? $args['suffix'] : '';	
		 $isfreepro = (isset($args['isfreepro'])) ? $args['isfreepro'] : 'free'; 	
		?>
		<fieldset><?php echo (!empty($prefix) ? esc_html($prefix) : ''); ?>
		<input 
			type='text' 
			name='easy_custom_code_options[<?php echo esc_attr($args['name']); ?>]' 
			id='<?php echo esc_attr($args['label-for']); ?>' 
			class='<?php echo esc_attr($class); ?>' 
			placeholder='<?php echo wp_kses_post($placeholder); ?>'
			value='<?php echo esc_attr(isset($options[$args['name']]) ? $options[$args['name']] : $default_value); ?>'
			size='<?php echo absint($size); ?>'
			maxlength='<?php echo absint($maxlength); ?>'
			<?php  echo ( $isfreepro == 'pro' ? ' readonly disabled' : '');  ?>
			>
			<?php echo (!empty($suffix) ? esc_html($suffix) : ''); ?>
		</fieldset>
		<?php if (!empty($desc)): ?>
        <p class="description">
			<?php echo wp_kses( wp_kses_post( $desc, 'easy-custom-code' ), array( 'strong' => array(), 'br' => array() ) ); ?>
		</p>
		<?php endif; ?>
		<?php

		 
		echo ($isfreepro == 'pro') ? '<p class="w357-premium-only">Available in the <a href="https://www.web357.com/product/easy-custom-code-wordpress-plugin?utm_source=SettingsPage&utm_medium=BuyProLink&utm_content=easycustomcodewp&utm_campaign=upgrade-pro" target="_blank">PRO version</a>.</p>' : '';
		 
	}

	function imageField($args) 
	{ 
		$options = get_option( 'easy_custom_code_options' );
		$name = $args['id'];
		$width = $args['width'];
		$height = $args['height'];
		$img_id = $args['img_id'];
		$default_image = '';

		// Set variables
		if ( !empty( $options[$name] ) ) {
			$image_attributes = wp_get_attachment_image_src( $options[$name], array( $width, $height ) );
			$src = $image_attributes[0];
			$value = $options[$name];
		} else {
			$src = $default_image;
			$value = '';
		}
		?>

		<div class="w357-imageField">

			<?php if (!empty($src)): ?>
					<img data-src="<?php echo esc_url($default_image); ?>" src="<?php echo esc_url($src); ?>" width="<?php echo absint($width); ?>px" height="<?php echo absint($height); ?>px" />		
			<?php else: ?>
				<img data-src="<?php echo esc_url($default_image); ?>" src="<?php echo esc_url($src); ?>" width="<?php echo absint($width); ?>px" height="<?php echo absint($height); ?>px" style="display:none" />		
			<?php endif; ?>

			<div>
				<input type="hidden" name="easy_custom_code_options[<?php echo esc_html($name); ?>]" id="easy_custom_code_options[<?php echo esc_html($name); ?>]" value="<?php echo esc_attr($value); ?>" />
				<button type="submit" class="upload_image_button button">Upload image</button>

				<?php if (!empty($src)): ?>
					<button type="submit" class="remove_image_button button">&times;</button>
				<?php else: ?>
					<button type="submit" class="remove_image_button button" style="display:none">&times;</button>
				<?php endif; ?>

			</div>
		</div>
		
		<?php
	}

	function hiddenField($args) 
	{ 
		$options = get_option('easy_custom_code_options');
		$default_value = (isset($args['default_value'])) ? $args['default_value'] : '';
		?>
		<input 
			type='hidden' 
			name='easy_custom_code_options[<?php echo esc_attr($args['name']); ?>]' 
			value='<?php echo esc_attr(isset($options[$args['name']]) ? $options[$args['name']] : $default_value); ?>'
			>
		<?php
	}

	function textareaWordpressEditorField($args) 
	{ 
		$options = get_option('easy_custom_code_options');
	    $editor_id = $args['name']; 
		$class = (isset($args['_class'])) ? $args['_class'] : '';
		$editor_settings = array('textarea_name' => 'easy_custom_code_options['.$args['name'].']', 'editor_class' => $class);
		$default_value = (isset($args['default_value'])) ? $args['default_value'] : '';
		$content = (isset($options[$args['name']])) ? $options[$args['name']] : $default_value;
		wp_editor( $content, $editor_id, $editor_settings );
	}

	function textareaField($args) 
	{ 
		$options = get_option('easy_custom_code_options');
		$class = (isset($args['_class'])) ? $args['_class'] : '';
		$default_value = (isset($args['default_value'])) ? $args['default_value'] : '';
		?>
		
		<textarea 
			id="<?php echo esc_attr($args['name']); ?>" 
			name="easy_custom_code_options[<?php echo esc_attr($args['name']); ?>]" 
			rows="<?php echo absint($args['rows']); ?>" 
			cols="<?php echo absint($args['cols']); ?>" 
			class="<?php echo esc_attr($class); ?>"
			placeholder="<?php echo wp_kses_post($args['placeholder']); ?>"><?php echo esc_textarea(isset($options[$args['name']]) && !empty($options[$args['name']]) ? $options[$args['name']] : $default_value); ?></textarea>
		<?php
	}

	function selectField($args)
	{ 
		$name = $args['id'];
		$default_value = $args['default_value'];
		$select_options = $args['options'];
		$options = get_option('easy_custom_code_options');
		$desc = (isset($args['desc'])) ? $args['desc'] : '';
		?>
		<fieldset>
		<select name="easy_custom_code_options[<?php echo esc_html($name); ?>]">

		<?php for ($i=0;$i<count($select_options);$i++): ?>
			<option value="<?php echo esc_attr($select_options[$i]['value']); ?>" <?php echo (($select_options[$i]['value'] == (isset($options[$name]) ? $options[$name] : $default_value) ) ? 'selected' : ''); ?>><?php echo esc_html($select_options[$i]['label']); ?></option>
		<?php endfor; ?>
		</select>
		</fieldset>

		<?php if (!empty($desc)): ?>
        <p class="description">
			<?php echo wp_kses( wp_kses_post( $desc, 'easy-custom-code' ), array( 'strong' => array(), 'br' => array() ) ); ?>
		</p>
		<?php endif; ?>

		<?php
	}

	function radioField($args)
	{ 
		$name = $args['id'];
		$default_value = $args['default_value'];
		$radio_options = $args['options'];
		$field_description = (isset($args['field_description'])) ? $args['field_description'] : '';
		$options = get_option('easy_custom_code_options');	
		 $isfreepro = (isset($args['isfreepro'])) ? $args['isfreepro'] : 'free'; 	
		?>
	
		<fieldset>
		<?php
		for ($i=0;$i<count($radio_options);$i++): ?>

			<input 
				type='radio' 
				id='<?php echo esc_html($radio_options[$i]['id']); ?>' 
				name='easy_custom_code_options[<?php echo esc_html($name); ?>]' 
				value='<?php echo esc_attr($radio_options[$i]['value']); ?>'
				<?php if ( $radio_options[$i]['value'] == (isset($options[$name]) ? $options[$name] : $default_value) ) echo 'checked="checked"';  echo ( $isfreepro == 'pro' ? ' disabled="disabled"' : '');  ?>
			>
			<label for="<?php echo esc_html($radio_options[$i]['id']); ?>" style="margin-right: 10px !important;"><?php echo esc_html($radio_options[$i]['label']); ?></label>

		<?php endfor; ?>
		</fieldset>
		
		<?php 
		if (!empty($field_description)): ?>
			<p class="description"><?php echo esc_html($field_description); ?></p>
		<?php endif; ?>
		<?php

		 
		echo ($isfreepro == 'pro') ? '<p class="w357-premium-only">Available in the <a href="https://www.web357.com/product/easy-custom-code-wordpress-plugin?utm_source=SettingsPage&utm_medium=BuyProLink&utm_content=easycustomcodewp&utm_campaign=upgrade-pro" target="_blank">PRO version</a>.</p>' : '';
		 
	}

	function checkboxField($args)
	{
		$name = $args['id'];
		$default_value = $args['default_value'];
		$ckeckbox_options = $args['options'];
		$field_description = (isset($args['field_description'])) ? $args['field_description'] : '';
		$options = get_option('easy_custom_code_options');

		for ($i=0;$i<count($ckeckbox_options);$i++):
		?>

			<input 
				type='checkbox' 
				id='<?php echo esc_html($ckeckbox_options[$i]['id']); ?>' 
				name='easy_custom_code_options[<?php echo esc_html($name); ?>][]' 
				value='<?php echo esc_attr($ckeckbox_options[$i]['value']); ?>'
				<?php if (in_array($ckeckbox_options[$i]['value'], (isset($options[$name]) ? $options[$name] : $default_value))) echo 'checked="checked"'; ?>
			>
			<label for="<?php echo esc_html($ckeckbox_options[$i]['id']); ?>" style="margin-right: 10px;"><?php echo esc_html($ckeckbox_options[$i]['label']); ?></label>

		<?php endfor; ?>

		<?php if (!empty($field_description)): ?>
			<div class="w357_settings_field_description"><?php echo esc_html($field_description); ?></div>
		<?php endif; ?>
		<?php
	}
}