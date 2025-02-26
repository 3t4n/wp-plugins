<?php

// Populate the sections and settings of the options page

function bs_video_section_text() {

	echo "<p>" . __( 'Set up your slideshow using the options below.Use ShortCode [bs_video_slider]', 'bs_video_slider' ) . "</p>";
}

function bs_video_slider_speed() {
	$barrel_options = get_option( 'barrel_video_slider_options' );
	echo "<input id='slide_speed' name='barrel_video_slider_options[slider_speed]' size='20' type='text' value='{$barrel_options['slider_speed']}' />";
}

function bs_video_slider_loop() {
	$barrel_options = get_option( 'barrel_video_slider_options' );
	echo "<select id='slider_loop' name='barrel_video_slider_options[slider_loop]'>";
	$know = array( 'true', 'false' );
	foreach ( $know as $v ) {
		echo '<option value="' . $v . '"';
		if ( $v == $barrel_options['slider_loop'] ) {
			echo 'selected="selected"';
		}

		echo '>' . $v . '</option>';
	}

	echo "</select>";
}

function bs_video_slider_effect() {
	$barrel_options = get_option( 'barrel_video_slider_options' );
	echo "<select id='slider_effect' name='barrel_video_slider_options[slider_effect]'>";
	$know = array( 'horizontal', 'vertical', 'fade' );
	foreach ( $know as $v ) {
		echo '<option value="' . $v . '"';
		if ( $v == $barrel_options['slider_effect'] ) {
			echo 'selected="selected"';
		}

		echo '>' . $v . '</option>';
	}

	echo "</select>";
}

function bs_video_slider_arrow() {
	$barrel_options = get_option( 'barrel_video_slider_options' );
	echo "<select id='slider_arrow' name='barrel_video_slider_options[slider_arrow]'>";
	$know = array( 'true', 'false' );
	foreach ( $know as $v ) {
		echo '<option value="' . $v . '"';
		if ( $v == $barrel_options['slider_arrow'] ) {
			echo 'selected="selected"';
		}

		echo '>' . $v . '</option>';
	}

	echo "</select>";
}

function bs_video_slider_random() {
	$barrel_options = get_option( 'barrel_video_slider_options' );
	echo "<select id='slider_arrow' name='barrel_video_slider_options[slider_random]'>";
	$know = array( 'true', 'false' );
	foreach ( $know as $v ) {
		echo '<option value="' . $v . '"';
		if ( $v == $barrel_options['slider_random'] ) {
			echo 'selected="selected"';
		}

		echo '>' . $v . '</option>';
	}

	echo "</select>";
}
function bs_video_slider_pager() {
	$barrel_options = get_option( 'barrel_video_slider_options' );
	echo "<select id='slider_pager' name='barrel_video_slider_options[slider_pager]'>";
	$know = array( 'true', 'false' );
	foreach ( $know as $v ) {
		echo '<option value="' . $v . '"';
		if ( $v == $barrel_options['slider_pager'] ) {
			echo 'selected="selected"';
		}

		echo '>' . $v . '</option>';
	}

	echo "</select>";
}
?>

<div class="wrap">

	<div id="icon-edit" class="icon32"><br /></div>

	<h2><?php _e( 'Barrel Video Slider Settings', 'bs_video_slider' ); ?></h2>

	<form action="options.php" method="post">

		<?php
		settings_fields( 'barrel_video_slider_options' );

		do_settings_sections( 'barrelslider' );
		?>

		<p class="submit">
			<input name="Submit" type="submit" class="button-primary" value="<?php _e( 'Save Changes', 'bs_video_slider' ) ?>" />
		</p>

	</form>
</div><!-- .wrap -->