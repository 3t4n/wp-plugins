<?php
/**
 * @var $portfolioID int
 * @var $view_slug string
 * @var $portfolioShowLoading
 * @var $photo_gallery_get_options
 */
if ( ! defined( 'ABSPATH' ) ) {
	exit; // Exit if accessed directly
}
?>
<section id="web_pace_portfolio_container_<?php echo esc_attr($portfolioID); ?>" data-object-name="<?php echo "images_obj_".esc_attr($portfolioID); ?>">
	<div id="web-pace-container-loading-overlay_<?php echo esc_attr($portfolioID); ?>"></div>
	<div id="web_pace_portfolio_content_<?php echo esc_attr($portfolioID); ?>"
			 class="photo-portfolio-content elastic_grid view-<?php echo esc_attr($view_slug) ?>"
		 	 data-show-loading="<?php echo esc_attr($portfolioShowLoading); ?>"
			 data-image-behaviour="<?php echo esc_attr($photo_gallery_get_options['photo_gallery_ht_view7_image_behaviour']); ?>">

	</div>
</section>