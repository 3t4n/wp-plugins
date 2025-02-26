<?php
/*
 * Related Links with Pics
 */

function mstoic_shortcodes_ajax_related_posts() {

	ob_start();

	?>

	<script type="text/javascript">

		var data = '',
			inputBoxTemp;

		data += mstoic_shortcodes_h3('Display related posts with pictures.');

		data += mstoic_shortcodes_p('This shortcode allows you to display upto 8 related posts with their featured images. If the posts lack a featured image, it will automatically display the fallback image you have set <a target="_blank" href="<?php echo home_url( '/wp-admin/themes.php?page=mstoic_shortcodes_options#ms_opt-square_custom_featured_image'); ?>">here</a>.');

		for (var i=1; i<=8; i++) {
			inputBoxTemp = {
				divClass: '',
				divId: '',
				inputClass: 'related-pics-url',
				inputId: 'url-' + i,
				optionTitle: 'URL - ' + i,
				optionDesc: 'Paste the URL of the blog post from this blog.',
				type: 'text',
				default: '',
			};
			data += mstoic_shortcodes_input_box_full(inputBoxTemp);
		}

		// Submit Button
		inputBoxTemp = {
			shortcode: 'ms_related_posts',
			inputName: 'Get Related Posts',
			livePreview: 'true',
		};
		data += mstoic_shortcodes_submit_button(inputBoxTemp);

		replaceInModalBox(data);

	</script>

	<?php

	echo ob_get_clean();

	wp_die();

}
add_action( 'wp_ajax_ajax_related_posts', 'mstoic_shortcodes_ajax_related_posts');

/**
 * Defining Shortcode
 */

function mstoic_shortcode_related_posts($atts, $content) {

	extract(shortcode_atts(array(
		'count',
	), $atts));

	ob_start();

	?>

	<div class="mstoic-shortcode related-pics">
		<?php echo do_shortcode($content); ?>
	</div>

	<?php

	return ob_get_clean();

}
add_shortcode( 'ms_related_posts', 'mstoic_shortcode_related_posts' );

function mstoic_shortcode_ms_related_posts_url($atts, $content) {
	ob_start();
	$post_id = url_to_postid($content);
	if ($post_id!=0) {
		?>
		<span class="ms_related_posts_singular">
		<?php if ( has_post_thumbnail($post_id) ) {
			$thumbnail = get_the_post_thumbnail_url($post_id, array(600, 600, TRUE));
		} else {
			global $ms_opt;
			$thumbnail = $ms_opt['square_custom_featured_image']['url'];
		} ?>
			<span class="image-container">
			<img src="<?php echo $thumbnail; ?>" />
				</span>
			<p class="title"><a class="link" target="_blank" href="<?php echo $content; ?>"><?php echo substr(get_the_title($post_id), 0, 60) . '...'; ?></a></p>
		</span>
			<?php
	}
	return ob_get_clean();
}
add_shortcode( 'ms_related_posts_url', 'mstoic_shortcode_ms_related_posts_url' );

?>