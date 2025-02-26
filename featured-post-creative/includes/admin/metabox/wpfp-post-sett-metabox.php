<?php
/**
 * Handles testimonial metabox HTML
 *
 * @package WP Featured Post
 * @since 1.0.0
 */

if ( ! defined( 'ABSPATH' ) ) {
	exit; // Exit if accessed directly
}

global $post;

$prefix = WPFP_META_PREFIX; // Metabox prefix

// Getting saved values
$featured_box = get_post_meta( $post->ID, $prefix.'featured_post', true ); ?>
<label>
	<input type="checkbox" value="1" id="wpfp-featured-box" name="<?php echo esc_attr( $prefix ).'featured_post' ?>" <?php checked( $featured_box, 1 ); ?> />
	<span class="description"><?php esc_html_e( 'Check this box for Featured Post', 'featured-post-creative' ); ?></span>
</label>