<?php
/*
 * Images Slider
 */

function mstoic_shortcodes_ajax_slider_images() {

	ob_start();

	?>

	<script type="text/javascript">

		var data = '',
			inputBoxTemp;

		data += mstoic_shortcodes_h3('Enter Configuration for Slider');

		// Interval between slides
		inputBoxTemp = {
			divId: '',
			inputClass: 'slider_images',
			inputId: 'slider_interval',
			optionTitle: 'Interval Duration',
			optionDesc: 'Gap between slides (in seconds)',
			type: 'number'
		};
		data += mstoic_shortcodes_input_box_half(inputBoxTemp);

		// Transition Duration
		inputBoxTemp = {
			divId: '',
			inputClass: 'slider_images',
			inputId: 'transition_duration',
			optionTitle: 'Transition Duration',
			optionDesc: 'Duration of the transition (in seconds)',
			type: 'number'
		};
		data += mstoic_shortcodes_input_box_half(inputBoxTemp);

		// Number of slides
		inputBoxTemp = {
			divId: '',
			inputClass: 'slider_images',
			inputId: 'slides_count',
			optionTitle: 'Number of slides',
			optionDesc: 'Total number of slides',
			type: 'number'
		};
		data += mstoic_shortcodes_input_box_half(inputBoxTemp);

		// Height in pixels
		inputBoxTemp = {
			divId: '',
			inputClass: 'slider_images',
			inputId: 'slider_height',
			optionTitle: 'Maximum height of the slider',
			optionDesc: 'in pixels',
			type: 'number'
		};
		data += mstoic_shortcodes_input_box_half(inputBoxTemp);

		// Height in pixels
		inputBoxTemp = {
			divId: '',
			inputClass: 'slider_images',
			inputId: 'slider_width',
			optionTitle: 'Maximum width of the slider',
			optionDesc: 'in pixels',
			type: 'number'
		};
		data += mstoic_shortcodes_input_box_half(inputBoxTemp);

		// Next Button
		inputBoxTemp = {
			inputName: 'Next Step',
			inputID: 'ms_slider_images_next'
		};
		data += mstoic_shortcodes_next_button(inputBoxTemp);

		replaceInModalBox(data);

		var slides_count,
			transition_duration,
			slider_interval,
			shortcode = '',
			data = '';
		jQuery(document).off('click', '#ms_slider_images_next').on('click', '#ms_slider_images_next', function () {

			// Slider Interval
			shortcode = '["' + jQuery('#slider_interval').val() + '"';

			// Transition Duration
			shortcode += ', "' + jQuery('#transition_duration').val() + '"';

			// Slides Count
			shortcode += ', "' + jQuery('#slides_count').val() + '"';

			// Slider Height
			//shortcode += ', "' + jQuery('#slider_height').val() + '"';

			// Slider Width
			//shortcode += ', "' + jQuery('#slider_width').val() + '"';

			shortcode += ']';

			console.log(shortcode);

			for(var i=1; i<=jQuery('#slides_count').val(); i++) {

				data += mstoic_shortcodes_h3('Details for slide '+i+':');

				//Images
				inputBoxTemp = {
					divClass: 'slider_images',
					divId: '',
					inputClass: 'slider_images_input',
					inputId: 'slide_image_' + i,
					optionTitle: 'Image URL',
					optionDesc: 'Type/Paste the image URL or Upload the Image',
					type: 'number',
				};
				data += mstoic_shortcodes_image(inputBoxTemp);

			}

			// Submit Button
			inputBoxTemp = {
				shortcode: 'ms_slider_images',
				inputName: 'Get Slider',
				//livePreview: 'true',
				dataOne: shortcode,
			};
			data += mstoic_shortcodes_submit_button(inputBoxTemp);

			replaceInModalBox(data);

		});

	</script>

	<?php

	echo ob_get_clean();

	wp_die();

}
add_action( 'wp_ajax_ajax_slider_images', 'mstoic_shortcodes_ajax_slider_images');

/**
 * Defining Shortcode
 */

/**
 * Prints some HTML to add the Facebook Like Box.
 *
 * @return string           HTML content to display the like box.
 */
function mstoic_shortcode_slider_images($atts, $content) {

	extract(shortcode_atts(array(
		'interval' => 1,
		'duration' => 1,
		'count' => 0,
	), $atts));

	ob_start();

	?>

	<div class="mstoic-slider ms_slider" data-count="<?php echo $count; ?>" data-duration="<?php echo $duration; ?>" data-interval="<?php echo $interval; ?>">

		<?php echo do_shortcode($content); ?>

	</div>

	<?php

	return ob_get_clean();

}
add_shortcode( 'ms_slider_images', 'mstoic_shortcode_slider_images' );


function mstoic_shortcode_slider_image($atts, $content) {
	return '<img src="'.$content.'" />';
}
add_shortcode( 'ms_slider_image', 'mstoic_shortcode_slider_image' );

?>