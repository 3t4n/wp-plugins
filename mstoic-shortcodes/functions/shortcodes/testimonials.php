<?php
/*
 * Testimonials Shortcode
 */

function mstoic_shortcodes_ajax_testimonials() {

	ob_start();

	?>

	<script type="text/javascript">

		var data = '',
			inputBoxTemp;

		data += mstoic_shortcodes_h3('Enter Configuration for Testimonial Slider');

		// Interval between slides
		inputBoxTemp = {
			divId: '',
			inputClass: 'testimonials',
			inputId: 'slider_interval',
			optionTitle: 'Interval Duration',
			optionDesc: 'Gap between testimonial slides (in seconds)',
			type: 'number'
		};
		data += mstoic_shortcodes_input_box_half(inputBoxTemp);

		// Transition Duration
		inputBoxTemp = {
			divId: '',
			inputClass: 'testimonials',
			inputId: 'transition_duration',
			optionTitle: 'Transition Duration',
			optionDesc: 'Duration of the transition (in seconds)',
			type: 'number'
		};
		data += mstoic_shortcodes_input_box_half(inputBoxTemp);

		// Number of slides
		inputBoxTemp = {
			divId: '',
			inputClass: 'testimonials',
			inputId: 'slides_count',
			optionTitle: 'Number of Testimonials',
			optionDesc: 'Total number of testimonials',
			type: 'number'
		};
		data += mstoic_shortcodes_input_box_half(inputBoxTemp);

		// Next Button
		inputBoxTemp = {
			inputName: 'Next Step',
			inputID: 'ms_testimonials_next'
		};
		data += mstoic_shortcodes_next_button(inputBoxTemp);

		replaceInModalBox(data);

		var slides_count,
			transition_duration,
			slider_interval,
			shortcode = '',
			data = '';
		jQuery(document).off('click', '#ms_testimonials_next').on('click', '#ms_testimonials_next', function () {

			// Slider Interval
			shortcode = '["' + jQuery('#slider_interval').val() + '"';

			// Transition Duration
			shortcode += ', "' + jQuery('#transition_duration').val() + '"';

			// Slides Count
			shortcode += ', "' + jQuery('#slides_count').val() + '"]';


			console.log(shortcode);

			for(var i=1; i<=jQuery('#slides_count').val(); i++) {

				data += mstoic_shortcodes_h3('Details for the testimonial: '+i+':');

				// Testimonial Title
				inputBoxTemp = {
					divId: '',
					inputClass: 'testimonials',
					inputId: 'title',
					optionTitle: 'Title for the testimonial',
					optionDesc: 'A small catchy title',
					type: 'text',
					dataOne: i,
				};
				data += mstoic_shortcodes_input_box_half(inputBoxTemp);

				// Name of testimonial author
				inputBoxTemp = {
					divId: '',
					inputClass: 'testimonials',
					inputId: 'author',
					optionTitle: 'Author Name',
					optionDesc: 'Name of the person who wrote the testimonial',
					type: 'text',
					dataOne: i,
				};
				data += mstoic_shortcodes_input_box_half(inputBoxTemp);

				// Designation of testimonial author
				inputBoxTemp = {
					divId: '',
					inputClass: 'testimonials',
					inputId: 'author_designation',
					optionTitle: 'Author Designation',
					optionDesc: 'Designation of the person who wrote the testimonial.',
					type: 'text',
					dataOne: i,
				};
				data += mstoic_shortcodes_input_box_half(inputBoxTemp);

				//Images
				inputBoxTemp = {
					divClass: '',
					divId: '',
					inputClass: 'slider_images_input, testimonials',
					inputId: 'image',
					optionTitle: 'Image URL',
					optionDesc: 'Type/Paste the image URL or Upload the Image',
					type: 'number',
					dataOne: i,
				};
				data += mstoic_shortcodes_image(inputBoxTemp);

				// The Testimonial
				inputBoxTemp = {
					divId: '',
					inputClass: 'testimonials',
					inputId: 'testimonial',
					optionTitle: 'The testimonial',
					optionDesc: '',
					dataOne: i,
				};
				data += mstoic_shortcodes_input_editor(inputBoxTemp);

			} // The for loop ended

			// Submit Button
			inputBoxTemp = {
				shortcode: 'ms_testimonials',
				inputName: 'Get Testimonials',
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
add_action( 'wp_ajax_ajax_testimonials', 'mstoic_shortcodes_ajax_testimonials');

/**
 * Defining Shortcode
 */

/**
 * Prints some HTML to add the Facebook Like Box.
 *
 * @return string           HTML content to display the like box.
 */
function mstoic_shortcode_testimonials($atts, $content) {

	extract(shortcode_atts(array(
		'interval' => 1,
		'duration' => 1,
		'count' => 0,
	), $atts));

	ob_start();

	?>

	<div class="mstoic-shortcode testimonials ms_slider" data-count="<?php echo $count; ?>" data-duration="<?php echo $duration; ?>" data-interval="<?php echo $interval; ?>">

		<?php echo do_shortcode($content); ?>

	</div>

	<?php

	return ob_get_clean();

}
add_shortcode( 'ms_testimonials', 'mstoic_shortcode_testimonials' );

function mstoic_shortcode_testimonial($atts, $content) {

	extract(shortcode_atts(array(
		'title' => 'Title',
		'author' => 'Author',
		'author_designation' => 'Author Designation',
		'image' => '',
		'testimonial' => 'The Testimonial',
	), $atts));

	ob_start();

	?>

	<div class="ms_testimonial">

		<?php if ($image !="") { ?>
			<?php echo '<image src="'.$image.'" />'; ?>
		<?php } ?>
		<div class="data">
			<?php if ($title != '') { ?><p class="title"><?php echo $title; ?></p><?php } ?>
			<?php if ($testimonial != '') { ?><p class="testimonial"><?php echo $testimonial; ?></p><?php } ?>
			<div class="arrow-down"></div>
		</div>
		<div class="author_info">
			<?php if ($author != '') { ?><p class="ms_author"><?php echo $author; ?></p><?php } ?>
			<?php if ($author_designation != '') { ?><p class="ms_author_designation"><?php echo $author_designation; ?></p><?php } ?>
		</div>

	</div>

	<?php

	return ob_get_clean();
}
add_shortcode( 'ms_testimonial', 'mstoic_shortcode_testimonial' );

?>