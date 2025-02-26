<?php
if (!defined('ABSPATH')) {
	return '';
}

extract($args);

$input_type = $data['input_type'] ?? '';
$label = $data['label'] ?? '';
$placeholder = $data['placeholder'] ?? '';



?>

<div class="qsd-prodcut-grid-with-side-bar-<?php echo esc_attr($input_type); ?>">
	<h3 class="qsd-prodcut-grid-with-side-bar-titel">
		<?php echo esc_html($label); ?>
	</h3>
	<div class="qsd-prodcut-grid-with-side-bar-<?php echo esc_attr($input_type); ?>-item">
		<div class="qsd-form-item">
			<input class="qsd-form-input" type="tel" placeholder="<?php echo esc_attr($placeholder); ?>" name="<?php echo esc_attr($input_type); ?>" value="<?php echo esc_attr($get_val); ?>" min="0">
		</div>
	</div>
</div>