<?php
/*
 * YouTube Embeds Shortcode
 */

function mstoic_shortcodes_ajax_youtube_embeds() {

	ob_start();

	?>

	<script type="text/javascript">

		var data = '',
			inputBoxTemp;

		data += mstoic_shortcodes_h3('Enter Details for embedding the YouTube video');

		// YouTube URL
		inputBoxTemp = {
			divClass: '',
			divId: '',
			inputClass: 'youtube-embeds',
			inputId: 'url',
			optionTitle: 'Video URL',
			optionDesc: 'Enter the URL of the YouTube video',
			type: 'url'
		};
		data += mstoic_shortcodes_input_box_half(inputBoxTemp);

		// Start time
		inputBoxTemp = {
			divClass: '',
			divId: '',
			inputClass: 'youtube-embeds',
			inputId: 'start',
			optionTitle: 'Start Time (seconds)',
			optionDesc: 'Start the YouTube video from a particaular time.',
			type: 'number'
		};
		data += mstoic_shortcodes_input_box_half(inputBoxTemp);

		// End time
		inputBoxTemp = {
			divClass: '',
			divId: '',
			inputClass: 'youtube-embeds',
			inputId: 'end',
			optionTitle: 'End Time (seconds)',
			optionDesc: 'End the YouTube video at a particaular time.',
			type: 'number'
		};
		data += mstoic_shortcodes_input_box_half(inputBoxTemp);

		// Autoplay
		inputBoxTemp = {
			checked: '',
			divClass: '',
			divId: '',
			inputClass: 'youtube-embeds',
			inputId: 'autoplay',
			inputLabel: 'Enable',
			optionTitle: 'Autoplay the YouTube video as soon as the page loads?',
			optionDesc: '',
		};
		data += mstoic_shortcodes_check_box(inputBoxTemp);

		// Submit Button
		inputBoxTemp = {
			shortcode: 'ms_youtube_embeds',
			inputName: 'Embed YouTube Video',
			livePreview: 'true',
		};
		data += mstoic_shortcodes_submit_button(inputBoxTemp);

		replaceInModalBox(data);

	</script>

	<?php

	echo ob_get_clean();

	wp_die();

}
add_action( 'wp_ajax_ajax_youtube_embeds', 'mstoic_shortcodes_ajax_youtube_embeds');

/**
 * Defining Shortcode
 */

/**
 * Prints the HTML for the Google Map.
 *
 * @return string           HTML content to display the required Google Map.
 */
function mstoic_shortcode_youtube_embeds($atts) {

	extract(shortcode_atts(array(
		'url' => '',
		'start' => '',
		'end' => '',
		'autoplay' => '',
	), $atts));

	ob_start();


	if ( $url == '' ) {
		?>
		<p class="ms-notice">YouTube Video URL can not be empty.</p>
		<?php
	} else {

		$url      = str_replace( 'watch?v=', 'embed/', $url );             // Replace watch with embed, fix for YouTube
		$start    = ( $start != '' ) ? '&amp;start=' . $start : '';          // Start YouTube video at a particular time
		$end      = ( $end != '' ) ? '&amp;end=' . $end : '';                  // End YouTube video at a particular time
		$autoplay = ( $autoplay == "TRUE" ) ? '&amp;autoplay=1' : '';   // Autoplay YouTube video at page load

		?>
		<div class="mstoic-shortcodes youtube-embeds ms_youtube_container">
			<iframe width="560"
			        height="315"
			        src="<?php echo $url; ?>?rel=0&amp;output=embed&amp;showinfo=0<?php echo $start . $end . $autoplay; ?>"
			        frameborder="0"
			        allowfullscreen></iframe>
		</div><!-- .mstoic-shortcodes.youtube-embeds -->
		<?php
	}

	return ob_get_clean();

}
add_shortcode( 'ms_youtube_embeds', 'mstoic_shortcode_youtube_embeds' );

?>