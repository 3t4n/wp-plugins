<?php
/*
 * Box With a Heading and an Icon
 */

function mstoic_shortcodes_ajax_box_heading_icon() {

	ob_start();

	?>

	<script type="text/javascript">

		var data = '',
			inputBoxTemp;

		data += mstoic_shortcodes_h3('Enter Details for the Content Box');

		// Heading
		inputBoxTemp = {
			divClass: '',
			divId: '',
			inputClass: 'box-heading-icon-inputs',
			inputId: 'heading',
			optionTitle: 'Heading',
			optionDesc: 'Enter the heading of the box',
			type: 'text'
		};
		data += mstoic_shortcodes_input_box_half(inputBoxTemp);

		// Text
		inputBoxTemp = {
			divId: '',
			inputClass: 'box-heading-icon-inputs',
			inputId: 'text',
			optionTitle: 'Box Content',
			optionDesc: 'Text for the box',
		};
		data += mstoic_shortcodes_input_editor(inputBoxTemp);

		fa = {
			inputId: 'icon',
			inputClass: 'box-heading-icon-inputs',
			optionTitle: 'Icon for Heading (Optional)',
			optionDesc: 'This icon will be displayed on the left side of the heading.',
		}
		data += mstoic_shortcodes_font_awesome(fa);

		// Color for the Font Awesome icon
		inputBoxTemp = {
			divClass: 'mstoic-color-picker',
			divId: '',
			inputClass: 'box-heading-icon-inputs mstoic-color-field',
			inputId: 'icon_color',
			optionTitle: 'Color for the icon',
			optionDesc: '',
			type: 'text'
		};
		data += mstoic_shortcodes_input_box_half(inputBoxTemp);

		// Submit Button
		inputBoxTemp = {
			shortcode: 'ms_box_heading_icon',
			inputName: 'Get Box',
			livePreview: 'true',
		};
		data += mstoic_shortcodes_submit_button(inputBoxTemp);

		replaceInModalBox(data);

	</script>

	<?php

	echo ob_get_clean();

	wp_die();

}
add_action( 'wp_ajax_ajax_box_heading_icon', 'mstoic_shortcodes_ajax_box_heading_icon');

/**
 * Defining Shortcode
 */

/**
 * Prints the HTML for the Box with heading and icon
 *
 * @return string           HTML content to display the box
 */
function mstoic_shortcode_box_heading_icon($atts) {

	extract(shortcode_atts(array(
		'heading' => 'Heading',
		'text' => 'Some random content',
		'icon' => '',
		'icon_color' => '',
	), $atts));

	ob_start();

	$class = ( $icon == '' ) ? '' : 'icon';

	?>

	<div class="mstoic-shortcodes box-heading-icon <?php echo $class; ?>">

		<?php if ($heading!='') { ?>
			<h3><?php if ($icon!="") {?><i class="fa <?php echo $icon; ?>" style="color: <?php echo $icon_color; ?>"></i><?php } ?><?php echo $heading; ?></h3>
		<?php } ?>

		<?php if ($text!='') { ?>
			<div class="text">
				<p><?php echo $text; ?></p>
			</div><!-- .text -->
		<?php } ?>

	</div>

	<?php

	return ob_get_clean();

}
add_shortcode( 'ms_box_heading_icon', 'mstoic_shortcode_box_heading_icon' );

?>