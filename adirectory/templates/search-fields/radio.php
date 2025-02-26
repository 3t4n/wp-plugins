<?php
if (!defined('ABSPATH')) {
	return '';
}

extract($args);

$input_type = $data['input_type'] ?? '';
$label = $data['label'] ?? '';
$placeholder = $data['placeholder'] ?? '';
if (in_array($input_type, adqs_all_custom_filter_fields())) {
	$fieldid = $data['fieldid'] ?? '';
	$input_type =  "{$input_type}_{$fieldid}";
	$get_val = $_REQUEST[$input_type] ?? '';
}

if (!empty($data['options'] ?? [])):
?>

	<div class="qsd-prodcut-grid-with-side-bar-<?php echo esc_attr($input_type); ?>">
		<h3 class="qsd-prodcut-grid-with-side-bar-titel">
			<?php echo esc_html($label); ?>
		</h3>
		<div class="qsd-prodcut-grid-with-side-bar-<?php echo esc_attr($input_type); ?>-item">
			<div class="qsd-form-item">
				<div class="qsd-form-wrap qsd-field-inline">
					<?php foreach ($data['options'] as $option): ?>
						<div class="qsd-form-check-control">
							<input type="radio" id="<?php echo esc_attr($option['id'] ?? ''); ?>" name="<?php echo esc_attr($input_type); ?>" value="<?php echo esc_attr($option['value'] ?? ''); ?>" <?php checked($option['value'] ?? '', $get_val); ?>>
							<label for="<?php echo esc_attr($option['id'] ?? ''); ?>"><?php echo esc_attr($option['value'] ?? ''); ?></label>
						</div>
					<?php endforeach; ?>
				</div>
			</div>
		</div>
	</div>
<?php endif; ?>