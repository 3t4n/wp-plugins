<?php
/*
 * Spacing shortcode
 */

/**
 * Prints some HTML content to clear the floats and add some spacing.
 *
 * @return string           HTML content to add some spacing.
 */
function mstoic_shortcode_space() {

	ob_start();

	?>

	<p class="mstoic-shortcodes space"></p>

	<?php

	return ob_get_clean();

}
add_shortcode( 'mstoic_shortcode_space', 'mstoic_shortcode_space' );

?>