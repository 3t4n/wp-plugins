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

//AD()->Helper->dd($data);

if (!empty($data['options'] ?? [])):
?>

	<div class="qsd-prodcut-grid-with-side-bar-<?php echo esc_attr($input_type); ?>">
		<h3 class="qsd-prodcut-grid-with-side-bar-titel">
			<?php echo esc_html($label); ?>
		</h3>
		<div class="qsd-prodcut-grid-with-side-bar-<?php echo esc_attr($input_type); ?>-item">
			<div class="qsd-form-item">
				<select name="<?php echo esc_attr($input_type); ?>" class="qsd-form-select">
					<option value=""><?php echo sprintf(esc_html__('Select %s', 'adirectory'), $label); ?></option>
					<?php foreach ($data['options'] as $option): ?>
						<div class="qsd-form-check-control">
							<option value="<?php echo esc_attr($option['value'] ?? ''); ?>" <?php selected($option['value'] ?? '', $get_val); ?>><?php echo esc_attr(ucfirst($option['value'] ?? '')); ?></option>
						</div>
					<?php endforeach; ?>
				</select>

			</div>
		</div>
	</div>
<?php endif; ?>