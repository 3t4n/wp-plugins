<?php
/*
 * Twitter Follow Button Shortcode
 */

function mstoic_shortcodes_ajax_twitter_follow_button() {

	ob_start();

	?>

	<script type="text/javascript">

		var data = '',
			inputBoxTemp;

		data += mstoic_shortcodes_h3('Enter Details for Your Twitter Follow Button');

		// Twitter Handle
		inputBoxTemp = {
			divClass: '',
			divId: '',
			inputClass: '',
			inputId: 'twitter-handle',
			optionTitle: 'Twitter Handle',
			optionDesc: 'Like: <strong>mstoicThemes</strong>',
			type: 'url'
		};
		data += mstoic_shortcodes_input_box_half(inputBoxTemp);

		// Show Follower Count
		inputBoxTemp = {
			checked: 'checked',
			divClass: '',
			divId: '',
			inputId: 'ms_twitter_show_count',
			optionTitle: 'Follower Count',
			inputLabel: 'Show follower count',
			optionDesc: '',
		};
		data += mstoic_shortcodes_check_box(inputBoxTemp);

		// Show Twitter Username
		inputBoxTemp = {
			checked: 'checked',
			divClass: '',
			divId: '',
			inputId: 'ms_twitter_show_username',
			optionTitle: 'Show Username',
			inputLabel: 'Show your Twitter username',
			optionDesc: '',
		};
		data += mstoic_shortcodes_check_box(inputBoxTemp);

		// Show Large Button
		inputBoxTemp = {
			checked: 'checked',
			divClass: '',
			divId: '',
			inputId: 'ms_twitter_show_large',
			optionTitle: 'Show a Large Button',
			inputLabel: 'If checked, the large Twitter follow button will be used.',
			optionDesc: '',
		};
		data += mstoic_shortcodes_check_box(inputBoxTemp);

		// Submit Button
		inputBoxTemp = {
			shortcode: 'ms_twitter_follow_button_get_button',
			inputName: 'Get Follow Button',
			livePreview: 'true',
		};
		data += mstoic_shortcodes_submit_button(inputBoxTemp);

		replaceInModalBox(data);

	</script>

	<?php

	echo ob_get_clean();

	wp_die();

}
add_action( 'wp_ajax_ajax_twitter_follow_button', 'mstoic_shortcodes_ajax_twitter_follow_button');

/**
 * Defining Shortcode
 */

/**
 * Prints some HTML to add the Facebook Like Box.
 *
 * @return string           HTML content to display the like box.
 */
function mstoic_shortcode_twitter_follow_button($atts) {

	extract(shortcode_atts(array(
		'handle' => '',
		'count' => 'false',
		'name' => 'false',
		'large' => 'false',
	), $atts));

	ob_start();

	if ($handle=='') {
		?><p class="ms-error">Please provide a valid Twitter handle</p><?php
		exit;
	}
	if ($count=='true') {
		$count = 'data-show-count="true" ';
	} else {
		$count = 'data-show-count="false" ';
	}
	if ($name=='true') {
		$name = 'data-show-screen-name="true" ';
	} else {
		$name = 'data-show-screen-name="false" ';
	}
	if ($large=='true') {
		$large = 'data-size="large" ';
	} else {
		$large = 'data-size="small" ';
	}

	?>

	<div class="mstoic-shortcodes mstoic-shortcodes-twitter-follow-button">

		<a href="https://twitter.com/<?php echo $handle; ?>" class="twitter-follow-button" <?php echo $count . $large . $name; ?>>Follow @<?php echo $handle; ?></a>
		<script async src="//platform.twitter.com/widgets.js" charset="utf-8"></script>

	</div><!-- .mstoic-shortcodes-twitter-follow-button -->

	<?php

	return ob_get_clean();

}
add_shortcode( 'ms_twitter_follow_button', 'mstoic_shortcode_twitter_follow_button' );

?>