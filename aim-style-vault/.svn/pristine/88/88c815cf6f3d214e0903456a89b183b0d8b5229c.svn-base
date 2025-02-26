<?php 
// Version: 1.0.1
// Date: 5/7/13
// Desc: Dynamic stylesheet gets styles from the Custom Style editor. 

function aim_css_styles() {
    global $wp_query;
	$args['post_type'] = 'aim_style_vault';
	$args['posts_per_page'] = -1;
	$args['orderby'] = 'date';
	$args['order'] = 'asc';

	if(isset($wp_query)) {
	$temp = $wp_query;
	$wp_query = null;
	$wp_query = new WP_Query($args);
	while ($wp_query->have_posts()) : $wp_query->the_post();
	global $post;

	// set loop content variables for use in the stylesheet 
		$aim_custom_stylesheets = do_shortcode(get_post_meta($post->ID, 'asv_meta_box_text', true));
		$aim_custom_stylesheet = preg_replace('!/\*[^*]*\*+([^/][^*]*\*+)*/!', '', $aim_custom_stylesheets);
  	   	$aim_custom_styles = str_replace(array("\r\n", "\r", "\n", "\t", '  ', '    ', '    '), '', $aim_custom_stylesheet);
?>
		<style type="text/css" media="screen">
			<?php echo $aim_custom_styles; ?>
		</style>
 	<?php endwhile;
	$wp_query = null; 
	$wp_query = $temp;
	wp_reset_query();
	}
}

add_action('wp_head', 'aim_css_styles');