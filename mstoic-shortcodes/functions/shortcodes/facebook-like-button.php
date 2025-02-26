<?php
/*
 * Facebook Like Box Shortcode
 */

function mstoic_shortcodes_ajax_fb_like_button() {

	ob_start();

	?>

	<script type="text/javascript">

		var data = '',
			inputBoxTemp;

		data += mstoic_shortcodes_h3('Enter Details for Your Facebook Like Button');

		// Facebook Page URL
		inputBoxTemp = {
			divClass: '',
			divId: '',
			inputClass: '',
			inputId: 'fb-page-url',
			optionTitle: 'URL of your Facebook page',
			optionDesc: 'http://www.facebook.com/mstoicthemes',
			type: 'url'
		};
		data += mstoic_shortcodes_input_box_half(inputBoxTemp);

		// Show Faces
		inputBoxTemp = {
			checked: 'checked',
			divClass: '',
			divId: '',
			inputId: 'ms-fb-show-faces',
			inputLabel: 'Show faces with the Like button',
			optionTitle: 'Faces',
			optionDesc: '',
		};
		data += mstoic_shortcodes_check_box(inputBoxTemp);

		// Show Share Button
		inputBoxTemp = {
			checked: 'checked',
			divClass: '',
			divId: '',
			inputId: 'ms-fb-show-share',
			inputLabel: 'Display the share button',
			optionTitle: 'Share button',
			optionDesc: '',
		};
		data += mstoic_shortcodes_check_box(inputBoxTemp);

		// Submit Button
		inputBoxTemp = {
			shortcode: 'ms_fb_like_button_get_button',
			inputName: 'Get Like Button',
			livePreview: 'true',
		};
		data += mstoic_shortcodes_submit_button(inputBoxTemp);

		replaceInModalBox(data);

	</script>

	<?php

	echo ob_get_clean();

	wp_die();

}
add_action( 'wp_ajax_ajax_fb_like_button', 'mstoic_shortcodes_ajax_fb_like_button');

/**
 * Defining Shortcode
 */

/**
 * Prints some HTML to add the Facebook Like Box.
 *
 * @return string           HTML content to display the like box.
 */
function mstoic_shortcode_fb_like_button($atts) {

	extract(shortcode_atts(array(
		'url' => '',
		'faces' => 'false',
		'share' => 'false',
	), $atts));

	ob_start();

	$height = ($faces == 'true') ? 80 : 20;

	?>

	<div class="mstoic-shortcodes-fb-like-button">

		<iframe src="https://www.facebook.com/plugins/like.php?href=<?php echo $url; ?>%2F&width=450&layout=standard&action=like&size=small&show_faces=<?php echo $faces; ?>&share=<?php echo $share; ?>&height=<?php echo $height; ?>"
		        width="450" height="<?php echo $height; ?>" style="border:none;overflow:hidden" scrolling="no" frameborder="0" allowTransparency="true"></iframe>

	</div><!-- .mstoic-shortcodes-fb-like-box -->

	<?php

	return ob_get_clean();

}
add_shortcode( 'ms_fb_like_button', 'mstoic_shortcode_fb_like_button' );

?>