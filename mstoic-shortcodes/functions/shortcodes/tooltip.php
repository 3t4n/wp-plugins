<?php
/*
 * Tooltip
 */

function mstoic_shortcodes_ajax_tooltip() {

	ob_start();

	?>

	<script type="text/javascript">

		var data = '',
			inputBoxTemp;

		data += mstoic_shortcodes_h3('Enter Details for the Tooltip');

		// Text Before Tooltip
		inputBoxTemp = {
			divId: '',
			inputClass: 'ms-tooltip',
			inputId: 'before_tooltip',
			optionTitle: 'Text Before The Tooltip',
			optionDesc: '',
			default: 'I am the text that comes before the tooltip.',
		};
		data += mstoic_shortcodes_input_editor(inputBoxTemp);

		// Text After Tooltip
		inputBoxTemp = {
			divId: '',
			inputClass: 'ms-tooltip',
			inputId: 'after_tooltip',
			optionTitle: 'Text After The Tooltip',
			optionDesc: '',
			default: 'I am the text that comes after the tooltip.',
		};
		data += mstoic_shortcodes_input_editor(inputBoxTemp);

		// Text
		inputBoxTemp = {
			divClass: '',
			divId: '',
			inputClass: 'ms-tooltip',
			inputId: 'text',
			optionTitle: 'Tooltip Text',
			optionDesc: 'The text that will display the tooltip',
			type: 'text'
		};
		data += mstoic_shortcodes_input_box_half(inputBoxTemp);

		// Text
		inputBoxTemp = {
			divId: '',
			inputClass: 'ms-tooltip',
			inputId: 'tooltip_data',
			optionTitle: 'Tooltip Data',
			optionDesc: 'The complete data that will be displayed when someone hovers over the <strong>Tooltip Text</strong>',
		};
		data += mstoic_shortcodes_input_editor(inputBoxTemp);

		// Submit Button
		inputBoxTemp = {
			shortcode: 'ms_tooltip',
			inputName: 'Get Tooltip',
			livePreview: 'true',
		};
		data += mstoic_shortcodes_submit_button(inputBoxTemp);

		replaceInModalBox(data);

	</script>

	<?php

	echo ob_get_clean();

	wp_die();

}
add_action( 'wp_ajax_ajax_tooltip', 'mstoic_shortcodes_ajax_tooltip');

/**
 * Defining Shortcode
 */

/**
 * Prints the HTML for the Box with heading and icon
 *
 * @return string           HTML content to display the box
 */
function mstoic_shortcode_tooltip($atts) {

	extract(shortcode_atts(array(
		'after_tooltip' => '',
		'before_tooltip' => '',
		'text' => 'Tooltip',
		'tooltip_data' => '',
		'direction' => 'top',
	), $atts));

	ob_start();

	?>

	<p class="tooltip-container">
		<span><?php echo $before_tooltip; ?></span>
		<span class="mstoic-shortcodes tooltip <?php echo $direction; ?>">
			<span class="tooltip-item"><?php echo $text; ?></span>
			<span class="tooltip-content">
				<span class="tooltip-text"><?php echo $tooltip_data; ?></span>
			</span>
		</span>
		<span><?php echo $after_tooltip; ?></span>
	</p>

	<?php

	return ob_get_clean();

}
add_shortcode( 'ms_tooltip', 'mstoic_shortcode_tooltip' );

?>