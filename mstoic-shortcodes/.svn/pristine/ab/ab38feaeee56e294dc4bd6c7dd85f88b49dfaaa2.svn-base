<?php
/*
 * Expendable Box Shortcode
 */

function mstoic_shortcodes_ajax_expendable_box() {

	ob_start();

	?>

	<script type="text/javascript">

		var data = '',
			inputBoxTemp;

		data += mstoic_shortcodes_h3('Enter Details for the Expendable box');

		// Heading
		inputBoxTemp = {
			divClass: '',
			divId: '',
			inputClass: 'expendable-box-inputs',
			inputId: 'heading',
			optionTitle: '(optional)',
			optionDesc: 'Enter the heading of the box',
			type: 'text'
		};
		data += mstoic_shortcodes_input_box_half(inputBoxTemp);

		// Text When Hidden
		inputBoxTemp = {
			divId: '',
			inputClass: 'expendable-box-inputs',
			inputId: 'hidden_text',
			optionTitle: 'All Time Text',
			optionDesc: 'Text to display when the box is not expanded',
		};
		data += mstoic_shortcodes_input_editor(inputBoxTemp);

		// Text When Visible
		inputBoxTemp = {
			divId: '',
			inputClass: 'expendable-box-inputs',
			inputId: 'visible_text',
			optionTitle: 'Expanded Text',
			optionDesc: 'Text to display when the box is expanded (Don\'t include the text when the box is not expanded)',
		};
		data += mstoic_shortcodes_input_editor(inputBoxTemp);

		// Button Text
		inputBoxTemp = {
			divClass: '',
			divId: '',
			inputClass: 'expendable-box-inputs',
			inputId: 'button_show_text',
			optionTitle: 'Button to show the text',
			optionDesc: 'Text to display for showing the box.',
			type: 'text',
			default: 'Show More',
		};
		data += mstoic_shortcodes_input_box_half(inputBoxTemp);

		// Button Text
		inputBoxTemp = {
			divClass: '',
			divId: '',
			inputClass: 'expendable-box-inputs',
			inputId: 'button_hide_text',
			optionTitle: 'Button to hide the text',
			optionDesc: 'Text to display for hiding the box.',
			type: 'text',
			default: 'Hide More Content',
		};
		data += mstoic_shortcodes_input_box_half(inputBoxTemp);

		// Submit Button
		inputBoxTemp = {
			shortcode: 'ms_expendable_box',
			inputName: 'Get Expendable Box',
			livePreview: 'true',
		};
		data += mstoic_shortcodes_submit_button(inputBoxTemp);

		replaceInModalBox(data);

	</script>

	<?php

	echo ob_get_clean();

	wp_die();

}
add_action( 'wp_ajax_ajax_expendable_box', 'mstoic_shortcodes_ajax_expendable_box');

/**
 * Defining Shortcode
 */

/**
 * Prints the HTML for the Expendable Box
 *
 * @return string           HTML content to display the expendable box.
 */
function mstoic_shortcode_expendable_box($atts) {

	extract(shortcode_atts(array(
		'heading' => '',
		'hidden_text' => '',
		'visible_text' => '',
		'button_show_text' => 'Show More',
		'button_hide_text' => 'Hide More Content',
	), $atts));

	ob_start();

	?>

	<div class="mstoic-shortcodes expendable-box">

		<?php if ($heading!='') { ?>
			<h3><?php echo $heading; ?></h3>
		<?php } ?>

		<?php if ($hidden_text!='') { ?>
			<div class="default-text">
				<p><?php echo $hidden_text; ?></p>
			</div><!-- .default-text -->
		<?php } ?>

		<?php if ($visible_text!='') { ?>
			<div class="hidden-text ms-hide">
				<p><?php echo $visible_text; ?></p>
			</div><!-- .hidden-text -->
		<?php } ?>

		<?php if ($button_show_text!='') { ?>
			<div class="ms-button">
				<button class="button-show-text" type="button"><?php echo $button_show_text; ?></button>
			</div><!-- .button-text -->
		<?php } ?>

		<?php if ($button_hide_text!='') { ?>
			<div class="ms-button">
				<button class="button-hide-text ms-hide" type="button"><?php echo $button_hide_text; ?></button>
			</div><!-- .button-text -->
		<?php } ?>

	</div>

	<?php

	return ob_get_clean();

}
add_shortcode( 'ms_expendable_box', 'mstoic_shortcode_expendable_box' );

?>