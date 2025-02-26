<?php
/*
 * Counters Shortcode
 */

function mstoic_shortcodes_counters_count_php() {

	mstoic_shortcodes_h3('Enter Number of Counters');

	mstoic_shortcodes_input_box_half(
		array(
			'input-id' => 'counters-count',
			'option-title' => 'Number of counters',
			'option-desc' => 'Number of counters you want to display.',
			'type' => 'number',
		)
	);

	mstoic_shortcodes_submit_button(
		array(
			'input-id' => 'ms_counter_count_get_button',
			'input-name' => 'Fill Info',
		)
	);

}

function mstoic_shortcodes_ajax_counters() {

	ob_start();

	mstoic_shortcodes_counters_count_php();

	?>
	
	<script type="text/javascript">

		var counterCount = 0,
			data,
			inputBoxTemp;
		jQuery(document).on('click', '#ms_counter_count_get_button', function () {

			counterCount = parseInt(jQuery('#counters-count').val());

			data = '';

			for (var i = 1; i <= counterCount; i++) {
				//console.log(i);
				data += mstoic_shortcodes_h3('Enter Details for Counter: ' + i);

				inputBoxTemp = {
					divId: '',
					inputClass: 'counter_text',
					inputId: 'counter_text_' + i,
					optionTitle: 'Counter Text',
					optionDesc: '',
					type: ''
				};

				data += mstoic_shortcodes_input_box_half(inputBoxTemp);

				inputBoxTemp = {
					divId: '',
					inputClass: 'counter_number',
					inputId: 'counter_number_' + i,
					optionTitle: 'Count Value',
					optionDesc: '',
					type: 'number'
				};

				data += mstoic_shortcodes_input_box_half(inputBoxTemp);

			}

			data += mstoic_shortcodes_h3('Customize Colors:');

			// Color for the circle border
			inputBoxTemp = {
				divClass: 'mstoic-color-picker',
				divId: '',
				inputClass: 'mstoic-color-field',
				inputId: 'counter_color',
				optionTitle: 'Color For The Outer Circle',
				optionDesc: '',
				type: 'text'
			};
			data += mstoic_shortcodes_input_box_half(inputBoxTemp);

			// Color for the circle background
			inputBoxTemp = {
				divClass: 'mstoic-color-picker',
				divId: '',
				inputClass: 'mstoic-color-field',
				inputId: 'counter_color_background',
				optionTitle: 'Background for the counter',
				optionDesc: '',
				type: 'text'
			};
			data += mstoic_shortcodes_input_box_half(inputBoxTemp);

			// Color for the circle heading text
			inputBoxTemp = {
				divClass: 'mstoic-color-picker',
				divId: '',
				inputClass: 'mstoic-color-field',
				inputId: 'counter_color_heading_text',
				optionTitle: 'Text color for the counter heading',
				optionDesc: '',
				type: 'text'
			};
			data += mstoic_shortcodes_input_box_half(inputBoxTemp);

			// Color for the circle description text
			inputBoxTemp = {
				divClass: 'mstoic-color-picker',
				divId: '',
				inputClass: 'mstoic-color-field',
				inputId: 'counter_color_value_text',
				optionTitle: 'Text color for the counter value',
				optionDesc: '',
				type: 'text'
			};
			data += mstoic_shortcodes_input_box_half(inputBoxTemp);

			// Submit Button
			inputBoxTemp = {
				shortcode: 'ms_get_counters',
				inputName: 'Get Counters',
				livePreview: 'true',
				dataOne: counterCount,
			};
			data += mstoic_shortcodes_submit_button(inputBoxTemp);

			replaceInModalBox(data);

		});

		//console.log(data);

		//jQuery.ajax({
		//
		//	url: ajaxurl,
		//	data: { action: 'mstoic_shortcodes_counters_input_values', msCounterCount: $('#counters-count').val() },
		//	type: 'post'
		//
		//}).success(function (response) {
		//
		//	console.log(response);
		//
		//});

		//});

	</script>

	<?php

	echo ob_get_clean();

	wp_die();

}
add_action( 'wp_ajax_ajax_counters', 'mstoic_shortcodes_ajax_counters');

/**
 * Defining Shortcode
 */

/**
 * Prints some HTML to add the counters.
 *
 * @return string           HTML content to display the counters.
 */
function mstoic_shortcode_counters($atts) {

	extract(shortcode_atts(array(
		'count' => '0',
		'counter_color' => '',
		'counter_color_background' => '',
		'counter_color_heading_text' => '',
		'counter_color_value_text' => '',
	), $atts));
	for ( $i = 1; $i <= $count; $i++ ) {
		extract(shortcode_atts(array(
			'counter_text_' . $i => '',
			'counter_number_' . $i => '',
		), $atts));
	}

	ob_start();

	$countID = ($count > 5) ? 5 : $count;

	?>

	<div class="mstoic-shortcodes-counters count-<?php echo $countID; ?> cf" data-count="<?php echo $countID; ?>">

		<?php for ( $i = 1; $i <= $count; $i++ ) { ?><div class="counter-outer">

				<div
					class="counter"
					style="
						border-color: <?php echo ($counter_color !='' ? $counter_color : ''); ?>;
						background: <?php echo ($counter_color_background !='' ? $counter_color_background : ''); ?>;"
				>

					<span class="text" style="color: <?php echo $counter_color_heading_text; ?>"><?php echo ${'counter_text_' . $i}; ?></span>
					<span class="count" style="color: <?php echo $counter_color_value_text; ?>"><?php echo ${'counter_number_' . $i}; ?></span>

				</div><!-- .counter -->

			</div><!-- .counter-outer --><?php } ?>

	</div><!-- .mstoic-shortcodes-counters -->

	<?php

	return ob_get_clean();

}
add_shortcode( 'ms_counters', 'mstoic_shortcode_counters' );

?>
