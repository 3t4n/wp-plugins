<?php
/*
 * Google Maps Shortcode
 */

function mstoic_shortcodes_ajax_google_maps() {

	ob_start();

	?>

	<script type="text/javascript">

		var data = '',
			inputBoxTemp;

		data += mstoic_shortcodes_h3('Enter Location for Your Google Map');

		// Google Maps Search Term
		inputBoxTemp = {
			divClass: '',
			divId: '',
			inputClass: '',
			inputId: 'google-maps-search-term',
			optionTitle: 'Location',
			optionDesc: 'Enter the Google Maps location, like <strong>Mstoic Tech Park</strong>',
			type: 'text'
		};
		data += mstoic_shortcodes_input_box_half(inputBoxTemp);

		// Submit Button
		inputBoxTemp = {
			shortcode: 'ms_get_google_map',
			inputName: 'Get Google Map',
			livePreview: 'true',
		};
		data += mstoic_shortcodes_submit_button(inputBoxTemp);

		replaceInModalBox(data);

	</script>

	<?php

	echo ob_get_clean();

	wp_die();

}
add_action( 'wp_ajax_ajax_google_maps', 'mstoic_shortcodes_ajax_google_maps');

/**
 * Defining Shortcode
 */

/**
 * Prints the HTML for the Google Map.
 *
 * @return string           HTML content to display the required Google Map.
 */
function mstoic_shortcode_google_map($atts) {

	extract(shortcode_atts(array(
		'search_term' => '',
	), $atts));

	ob_start();

		global $ms_opt;

	if ($ms_opt['google_maps_api_key'] == 'AIzaSyAuHQmj9v3utIpdTWdzHalLLLaJBrIo6eg') {
		?>
		<p class="note">You are using <a target="_blank" href="http://mstoicthemes.com/">our</a> Google Maps API key. Please generate your own API key from <a target="_blank" href="https://developers.google.com/maps/documentation/embed/guide#api_key">here</a> and update it <a target="_blank" href="<?php echo home_url( '/wp-admin/themes.php?page=mstoic_shortcodes_options#ms_opt-google_maps_api_key' ); ?>">here</a>.</p>
		<?php
	}

		if ( !empty($ms_opt['google_maps_api_key'])  && !empty($search_term) ) {

			?>

			<div class="mstoic-shortcodes google-map">

				<?php

				$url = esc_url('https://www.google.com/maps/embed/v1/place?key=' . $ms_opt['google_maps_api_key'] . '&q=' . $search_term);

				echo '<iframe height="450" width="600" style="border:0" src="' . $url . '"></iframe>';

				?>

			</div><!-- .mstoic-shortcodes.google-map -->

			<?php

		}

	return ob_get_clean();

}
add_shortcode( 'ms_google_map', 'mstoic_shortcode_google_map' );

?>