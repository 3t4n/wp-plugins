<?php
/*
 * Buttons Shortcode
 */

function mstoic_shortcodes_ajax_buttons() {

	ob_start();

	?>

	<script type="text/javascript">

		var data = '',
			inputBoxTemp;

		data += mstoic_shortcodes_h3('Choose Configuration for your Button');

		// Button Label
		inputBoxTemp = {
			divClass: '',
			divId: '',
			inputClass: 'ms_buttons',
			inputId: 'button_label',
			optionTitle: 'Button Label',
			optionDesc: 'Like: <strong>Download</strong>',
			type: 'text'
		};
		data += mstoic_shortcodes_input_box_half(inputBoxTemp);

		// Button Link
		inputBoxTemp = {
			divClass: '',
			divId: '',
			inputClass: 'ms_buttons',
			inputId: 'button_link',
			optionTitle: 'Button Link',
			optionDesc: 'Optional',
			type: 'url'
		};
		data += mstoic_shortcodes_input_box_half(inputBoxTemp);

		// Background for the button
		inputBoxTemp = {
			divClass: 'mstoic-color-picker',
			divId: '',
			inputClass: 'ms_buttons mstoic-color-field',
			inputId: 'button_background',
			optionTitle: 'Background color of the button',
			optionDesc: '',
			type: 'text'
		};
		data += mstoic_shortcodes_input_box_half(inputBoxTemp);

		// Font Color for the button
		inputBoxTemp = {
			divClass: 'mstoic-color-picker',
			divId: '',
			inputClass: 'ms_buttons mstoic-color-field',
			inputId: 'button_font_color',
			optionTitle: 'Font color of the button',
			optionDesc: '',
			type: 'text'
		};
		data += mstoic_shortcodes_input_box_half(inputBoxTemp);

		// Padding
		inputBoxTemp = {
			divClass: 'ms_slider',
			divId: '',
			inputClass: 'ms_buttons disabled',
			inputId: 'button_padding',
			optionTitle: 'Padding for the button',
			optionDesc: 'in pixels',
			min: 2,
			max: 50,
			step: 1,
			value: 5,
		};
		data += mstoic_shortcodes_slider_input(inputBoxTemp);

		// Border Radius
		inputBoxTemp = {
			divClass: 'ms_slider',
			divId: '',
			inputClass: 'ms_buttons disabled',
			inputId: 'button_border_radius',
			optionTitle: 'Border Radius',
			optionDesc: 'in percentage',
			min: 0,
			max: 50,
			step: 1,
			value: 0,
		};
		data += mstoic_shortcodes_slider_input(inputBoxTemp);

		// Border Radius
		inputBoxTemp = {
			divClass: 'ms_slider',
			divId: '',
			inputClass: 'ms_buttons disabled',
			inputId: 'button_font_size',
			optionTitle: 'Font Size',
			optionDesc: 'in em',
			min: 0.2,
			max: 10,
			step: 0.1,
			value: 1,
		};
		data += mstoic_shortcodes_slider_input(inputBoxTemp);

		// Button Style
		inputBoxTemp = {
			divClass: '',
			divId: '',
			optionTitle: 'Button Style',
			optionDesc: 'Choose the Button Style',
			selectClass: 'ms_buttons',
			selectId: 'ms_button_style',
			selectArray: [
				['simple',          'Simple Button'],
				['left-slide',      'Left Slide Effect'],
				['expand',          'Expand'],
			],
		};
		data += mstoic_shortcodes_select_box(inputBoxTemp);

		// Button Align
		inputBoxTemp = {
			divClass: '',
			divId: '',
			optionTitle: 'Button Align',
			optionDesc: 'Choose the Button Alignment',
			selectClass: 'ms_buttons',
			selectId: 'ms_button_align',
			selectArray: [
				['left',          'Left'],
				['center',        'Center'],
				['right',         'Right'],
			],
		};
		data += mstoic_shortcodes_select_box(inputBoxTemp);

		// Submit Button
		inputBoxTemp = {
			shortcode: 'ms_buttons_get_button',
			inputName: 'Get the Button',
			livePreview: 'true',
		};
		data += mstoic_shortcodes_submit_button(inputBoxTemp);

		replaceInModalBox(data);

		msjQuerySliders();

	</script>

	<?php

	echo ob_get_clean();

	wp_die();

}
add_action( 'wp_ajax_ajax_buttons', 'mstoic_shortcodes_ajax_buttons');

/**
 * Defining Shortcode
 */

/**
 * Prints some HTML to add the Facebook Like Box.
 *
 * @return string           HTML content to display the like box.
 */
function mstoic_shortcode_buttons($atts) {

	extract(shortcode_atts(array(
		'button_label' => '',
		'button_background' => '#00A7F7',
		'button_font_color' => '#FFF',
		'button_padding' => '5',
		'button_border_radius' => '0',
		'button_link' => '',
		'button_font_size' => '1',
		'ms_button_style' => 'simple',
		'ms_button_align' => 'left',
	), $atts));

	ob_start();

	if ($button_label=='') {
		?><p class="ms-error">Please provide a Button label.</p><?php
		exit;
	}

	$random_button_id = 'button' . rand(1,1000) . rand(1,1000);

	$css_id = '#' . $random_button_id;

	if ($ms_button_style == 'expand' || $ms_button_style == 'simple') {
		?>

		<div style="text-align: <?php echo $ms_button_align; ?>;" class="mstoic-shortcodes mstoic-shortcodes-buttons <?php echo $ms_button_style; ?>">
			<?php if ($button_link != '') { ?><a style="color: <?php echo $button_font_color;?>;" href="<?php echo $button_link; ?>"><?php } ?>
				<span
					style="background: <?php echo $button_background;?>;
						color: <?php echo $button_font_color;?>;
						font-size: <?php echo $button_font_size;?>em;
						padding: <?php echo $button_padding; ?>px;
						" >
					<?php echo $button_label; ?></span>
				<?php if ($button_link != '') { ?></a><?php } ?>
		</div><!-- .mstoic-shortcodes-buttons -->

		<?php
	} elseif ($ms_button_style == 'left-slide') {

		?>

		<style>
			<?php echo $css_id; ?> {
				position: relative;
				overflow: hidden;
				border: 2px solid <?php echo $button_background; ?>;
			}
			<?php echo $css_id; ?> span {
				border-radius: <?php echo $button_border_radius; ?>%;
				background: <?php echo $button_background; ?>;
				color: <?php echo $button_font_color;?>;
				font-size: <?php echo $button_font_size;?>em;
				padding: <?php echo $button_padding;?>px;
			}

			<?php echo $css_id; ?> span:hover,
			<?php echo $css_id; ?> span:focus,
            <?php echo $css_id; ?> span:before,
            <?php echo $css_id; ?> span,
			<?php echo $css_id; ?> span:hover::before {
				-webkit-transition: -webkit-transform 0.3s;
				-moz-transition: -moz-transform 0.3s;
				transition: transform 0.3s;
			}

			<?php echo $css_id; ?> span:before {
				position: absolute;
				top: 0;
				left: 0;
				z-index: -1;
				padding: <?php echo $button_padding;?>px;
				/*width: 100%;
				height: 100%;*/
				background: <?php echo $button_font_color; ?>;
				color: <?php echo $button_background; ?>;
				content: attr(data-text);
				-webkit-transform: translateX(-100%);
				-moz-transform: translateX(-100%);
				transform: translateX(-100%);
			}

			<?php echo $css_id; ?>:hover::before,
			<?php echo $css_id; ?>:focus::before {
				-webkit-transform: translateX(0%);
				-moz-transform: translateX(0%);
				transform: translateX(0%);
				z-index: 1;
			}
			<?php echo $css_id; ?>:hover span,
			<?php echo $css_id; ?>:focus span {
				 -webkit-transform: translateX(100%);
				 -moz-transform: translateX(100%);
				 transform: translateX(100%);
				 z-index: 1;
			 }
		</style>

		<div style="text-align: <?php echo $ms_button_align; ?>;" class="mstoic-shortcodes mstoic-shortcodes-buttons <?php echo $ms_button_style; ?>">
			<?php if ( $button_link != '' ) { ?>
			<a style="color: <?php echo $button_font_color; ?>; font-size: <?php echo $button_font_size; ?>em;"
			   href="<?php echo $button_link; ?>"><?php } ?>
				<span id="<?php echo $random_button_id; ?>">
					<span data-text="<?php echo $button_label; ?>">
						<?php echo $button_label; ?>
					</span>
				</span>
				<?php if ( $button_link != '' ) { ?></a><?php } ?>
		</div><!-- .mstoic-shortcodes-buttons -->

		<?php

	}

	return ob_get_clean();

}
add_shortcode( 'ms_buttons', 'mstoic_shortcode_buttons' );

?>