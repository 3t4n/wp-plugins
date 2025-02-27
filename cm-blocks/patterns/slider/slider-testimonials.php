<?php
/**
 * Title: Slider Testimonials
 * Slug: slider-testimonials
 * Categories: codemanas
 * Keywords: codemanas
 * Block Types: codemanas/cmblocks--slider
 */
if (!defined('ABSPATH')) {
	exit; // Exit if accessed directly
}
?>
<!-- wp:group {"align":"wide","style":{"color":{"background":"#fafafa"}},"layout":{"type":"constrained","justifyContent":"center"}} -->
<div class="wp-block-group alignwide has-background" style="background-color:#fafafa"><!-- wp:spacer {"height":"60px"} -->
	<div style="height:60px" aria-hidden="true" class="wp-block-spacer"></div>
	<!-- /wp:spacer -->

	<!-- wp:paragraph {"align":"center","style":{"elements":{"link":{"color":{"text":"#e24a01"}}},"color":{"text":"#e24a01"},"typography":{"fontStyle":"normal","fontWeight":"500","fontSize":"18px"},"spacing":{"padding":{"top":"var:preset|spacing|10","bottom":"var:preset|spacing|10"}}}} -->
	<p class="has-text-align-center has-text-color has-link-color" style="color:#e24a01;padding-top:var(--wp--preset--spacing--10);padding-bottom:var(--wp--preset--spacing--10);font-size:18px;font-style:normal;font-weight:500"><?php esc_html_e('Testimonials', 'cm-blocks'); ?></p>
	<!-- /wp:paragraph -->

	<!-- wp:heading {"textAlign":"center","style":{"typography":{"fontStyle":"normal","fontWeight":"600"},"spacing":{"margin":{"top":"0","bottom":"0"}},"color":{"text":"#303030"},"elements":{"link":{"color":{"text":"#303030"}}}},"fontFamily":"body"} -->
	<h2 class="wp-block-heading has-text-align-center has-text-color has-link-color has-body-font-family" style="color:#303030;margin-top:0;margin-bottom:0;font-style:normal;font-weight:600"><?php esc_html_e('Hear From our Customers', 'cm-blocks'); ?></h2>
	<!-- /wp:heading -->

	<!-- wp:paragraph {"align":"center","style":{"typography":{"fontSize":"1.14rem"},"color":{"text":"#737373"},"elements":{"link":{"color":{"text":"#737373"}}}}} -->
	<p class="has-text-align-center has-text-color has-link-color" style="color:#737373;font-size:1.14rem"><?php esc_html_e('Lorem ipsum dolor sit amet, consectetur adipiscing elit. Cras suscipit laoreet lorem, id sagittis ante rutrum ac. ', 'cm-blocks'); ?></p>
	<!-- /wp:paragraph -->

	<!-- wp:spacer {"height":"24px"} -->
	<div style="height:24px" aria-hidden="true" class="wp-block-spacer"></div>
	<!-- /wp:spacer -->

	<!-- wp:cmblocks/slider {"allowTouchMove":true,"autoplay":false,"buttons":false,"pagination":true,"slidesPerView":3,"spaceBetween":36,"align":"wide"} -->
	<div class="wp-block-cmblocks-slider alignwide cmblocks-slider" style="--cm-blocks-slider-navigation-color:#D8613C;--cm-blocks-slider-navigation-fontSize:24px;--cm-blocks-slider-navigation-opacity:1px;--cm-blocks-slider-pagination-active-color:#007aff;--cm-blocks-slider-pagination-inactive-color:#00000040;--cm-blocks-slider-pagination-size:12px;--cm-blocks-slider-navigation-position-top:50%;--cm-blocks-slider-navigation-position-top-transform:-50%;--cm-blocks-slider-navigation-position-width:100%"><div class="swiper" data-enable_autoplay="false" data-enable_pagination="true" data-enable_buttons="false" data-slides_per_view="3" data-space_between="36" data-loop="true" data-effect="slide" data-allow_touch_move="true" data-auto_height="true" data-pagination-type="default" data-autoplay_delay="2000" data-slides_per_group="1" data-speed="300"><div class="swiper-wrapper"><!-- wp:cmblocks/slide-item -->
				<div class="swiper-slide"><div class="cmblocks-slider__item"><!-- wp:group {"style":{"color":{"background":"#e4e4e4"},"spacing":{"padding":{"top":"var:preset|spacing|20","bottom":"var:preset|spacing|20","left":"var:preset|spacing|20","right":"var:preset|spacing|20"}},"border":{"radius":"12px"}},"layout":{"type":"constrained"}} -->
						<div class="wp-block-group has-background" style="border-radius:12px;background-color:#e4e4e4;padding-top:var(--wp--preset--spacing--20);padding-right:var(--wp--preset--spacing--20);padding-bottom:var(--wp--preset--spacing--20);padding-left:var(--wp--preset--spacing--20)"><!-- wp:paragraph {"align":"center","placeholder":"Enter Slide content.","style":{"typography":{"fontStyle":"normal","fontWeight":"800"},"color":{"text":"#303030"},"elements":{"link":{"color":{"text":"#303030"}}}},"fontSize":"large"} -->
							<p class="has-text-align-center has-text-color has-link-color has-large-font-size" style="color:#303030;font-style:normal;font-weight:800"><?php esc_html_e('Microsoft', 'cm-blocks'); ?></p>
							<!-- /wp:paragraph -->

							<!-- wp:paragraph {"align":"center","style":{"typography":{"fontSize":"1rem","fontStyle":"normal","fontWeight":"300"},"color":{"text":"#9f9f9f"},"elements":{"link":{"color":{"text":"#9f9f9f"}}}},"fontFamily":"body"} -->
							<p class="has-text-align-center has-text-color has-link-color has-body-font-family" style="color:#9f9f9f;font-size:1rem;font-style:normal;font-weight:300"><?php esc_html_e('Lorem ipsum dolor sit amet, consectetur adipiscing elit. Cras suscipit laoreet lorem, id sagittis ante rutrum ac. In vitae vulputate libero, at tincidunt nibh. Aenean luctus interdum dictum. Donec sed consectetur lorem. ', 'cm-blocks'); ?></p>
							<!-- /wp:paragraph -->

							<!-- wp:paragraph {"align":"center","style":{"typography":{"fontStyle":"normal","fontWeight":"700"},"spacing":{"margin":{"top":"var:preset|spacing|10","bottom":"0"},"padding":{"top":"0","bottom":"0","right":"0"}}}} -->
							<p class="has-text-align-center" style="margin-top:var(--wp--preset--spacing--10);margin-bottom:0;padding-top:0;padding-right:0;padding-bottom:0;font-style:normal;font-weight:700"></p>
							<!-- /wp:paragraph -->

							<!-- wp:paragraph {"align":"center","style":{"spacing":{"margin":{"top":"0","bottom":"0"}},"color":{"text":"#545454"},"elements":{"link":{"color":{"text":"#545454"}}},"typography":{"fontSize":"14px"}}} -->
							<p class="has-text-align-center has-text-color has-link-color" style="color:#545454;margin-top:0;margin-bottom:0;font-size:14px"><?php esc_html_e('CEO', 'cm-blocks'); ?></p>
							<!-- /wp:paragraph --></div>
						<!-- /wp:group -->

						<!-- wp:paragraph -->
						<p></p>
						<!-- /wp:paragraph -->

						<!-- wp:paragraph -->
						<p></p>
						<!-- /wp:paragraph --></div></div>
				<!-- /wp:cmblocks/slide-item -->

				<!-- wp:cmblocks/slide-item -->
				<div class="swiper-slide"><div class="cmblocks-slider__item"><!-- wp:group {"style":{"color":{"background":"#e4e4e4"},"spacing":{"padding":{"top":"var:preset|spacing|20","bottom":"var:preset|spacing|20","left":"var:preset|spacing|20","right":"var:preset|spacing|20"}},"border":{"radius":"12px"}},"layout":{"type":"constrained"}} -->
						<div class="wp-block-group has-background" style="border-radius:12px;background-color:#e4e4e4;padding-top:var(--wp--preset--spacing--20);padding-right:var(--wp--preset--spacing--20);padding-bottom:var(--wp--preset--spacing--20);padding-left:var(--wp--preset--spacing--20)"><!-- wp:paragraph {"align":"center","placeholder":"Enter Slide content.","style":{"typography":{"fontStyle":"normal","fontWeight":"800"},"color":{"text":"#303030"},"elements":{"link":{"color":{"text":"#303030"}}}},"fontSize":"large"} -->
							<p class="has-text-align-center has-text-color has-link-color has-large-font-size" style="color:#303030;font-style:normal;font-weight:800"><?php esc_html_e('Google', 'cm-blocks'); ?></p>
							<!-- /wp:paragraph -->

							<!-- wp:paragraph {"align":"center","style":{"typography":{"fontSize":"1rem","fontStyle":"normal","fontWeight":"300"},"color":{"text":"#9f9f9f"},"elements":{"link":{"color":{"text":"#9f9f9f"}}}},"fontFamily":"body"} -->
							<p class="has-text-align-center has-text-color has-link-color has-body-font-family" style="color:#9f9f9f;font-size:1rem;font-style:normal;font-weight:300"><?php esc_html_e('Lorem ipsum dolor sit amet, consectetur adipiscing elit. Cras suscipit laoreet lorem, id sagittis ante rutrum ac. In vitae vulputate libero, at tincidunt nibh. Aenean luctus interdum dictum. Donec sed consectetur lorem. ', 'cm-blocks'); ?></p>
							<!-- /wp:paragraph -->

							<!-- wp:paragraph {"align":"center","style":{"typography":{"fontStyle":"normal","fontWeight":"700"},"spacing":{"margin":{"top":"var:preset|spacing|10","bottom":"0"},"padding":{"top":"0","bottom":"0","right":"0"}},"color":{"text":"#303030"},"elements":{"link":{"color":{"text":"#303030"}}}},"fontFamily":"body"} -->
							<p class="has-text-align-center has-text-color has-link-color has-body-font-family" style="color:#303030;margin-top:var(--wp--preset--spacing--10);margin-bottom:0;padding-top:0;padding-right:0;padding-bottom:0;font-style:normal;font-weight:700"><?php esc_html_e('John Doe', 'cm-blocks'); ?></p>
							<!-- /wp:paragraph -->

							<!-- wp:paragraph {"align":"center","style":{"spacing":{"margin":{"top":"0","bottom":"0"}},"color":{"text":"#545454"},"elements":{"link":{"color":{"text":"#545454"}}},"typography":{"fontSize":"14px"}}} -->
							<p class="has-text-align-center has-text-color has-link-color" style="color:#545454;margin-top:0;margin-bottom:0;font-size:14px"><?php esc_html_e('Data Engineer', 'cm-blocks'); ?></p>
							<!-- /wp:paragraph --></div>
						<!-- /wp:group -->

						<!-- wp:paragraph -->
						<p></p>
						<!-- /wp:paragraph -->

						<!-- wp:paragraph -->
						<p></p>
						<!-- /wp:paragraph --></div></div>
				<!-- /wp:cmblocks/slide-item -->

				<!-- wp:cmblocks/slide-item -->
				<div class="swiper-slide"><div class="cmblocks-slider__item"><!-- wp:group {"style":{"color":{"background":"#e4e4e4"},"spacing":{"padding":{"top":"var:preset|spacing|20","bottom":"var:preset|spacing|20","left":"var:preset|spacing|20","right":"var:preset|spacing|20"}},"border":{"radius":"12px"}},"layout":{"type":"constrained"}} -->
						<div class="wp-block-group has-background" style="border-radius:12px;background-color:#e4e4e4;padding-top:var(--wp--preset--spacing--20);padding-right:var(--wp--preset--spacing--20);padding-bottom:var(--wp--preset--spacing--20);padding-left:var(--wp--preset--spacing--20)"><!-- wp:paragraph {"align":"center","placeholder":"Enter Slide content.","style":{"typography":{"fontStyle":"normal","fontWeight":"800"},"color":{"text":"#303030"},"elements":{"link":{"color":{"text":"#303030"}}}},"fontSize":"large"} -->
							<p class="has-text-align-center has-text-color has-link-color has-large-font-size" style="color:#303030;font-style:normal;font-weight:800"><?php esc_html_e('Facebook', 'cm-blocks'); ?></p>
							<!-- /wp:paragraph -->

							<!-- wp:paragraph {"align":"center","style":{"typography":{"fontSize":"1rem","fontStyle":"normal","fontWeight":"300"},"color":{"text":"#9f9f9f"},"elements":{"link":{"color":{"text":"#9f9f9f"}}}},"fontFamily":"body"} -->
							<p class="has-text-align-center has-text-color has-link-color has-body-font-family" style="color:#9f9f9f;font-size:1rem;font-style:normal;font-weight:300"><?php esc_html_e('Lorem ipsum dolor sit amet, consectetur adipiscing elit. Cras suscipit laoreet lorem, id sagittis ante rutrum ac. In vitae vulputate libero, at tincidunt nibh. Aenean luctus interdum dictum. Donec sed consectetur lorem.', 'cm-blocks'); ?></p>
							<!-- /wp:paragraph -->

							<!-- wp:paragraph {"align":"center","style":{"typography":{"fontStyle":"normal","fontWeight":"700"},"spacing":{"margin":{"top":"var:preset|spacing|10","bottom":"0"},"padding":{"top":"0","bottom":"0","right":"0"}},"color":{"text":"#303030"},"elements":{"link":{"color":{"text":"#303030"}}}},"fontFamily":"body"} -->
							<p class="has-text-align-center has-text-color has-link-color has-body-font-family" style="color:#303030;margin-top:var(--wp--preset--spacing--10);margin-bottom:0;padding-top:0;padding-right:0;padding-bottom:0;font-style:normal;font-weight:700"><?php esc_html_e('Mack Feeney', 'cm-blocks'); ?></p>
							<!-- /wp:paragraph -->

							<!-- wp:paragraph {"align":"center","style":{"spacing":{"margin":{"top":"0","bottom":"0"}},"color":{"text":"#545454"},"elements":{"link":{"color":{"text":"#545454"}}},"typography":{"fontSize":"14px"}}} -->
							<p class="has-text-align-center has-text-color has-link-color" style="color:#545454;margin-top:0;margin-bottom:0;font-size:14px"><?php esc_html_e('Marketing Manager', 'cm-blocks'); ?></p>
							<!-- /wp:paragraph --></div>
						<!-- /wp:group -->

						<!-- wp:paragraph -->
						<p></p>
						<!-- /wp:paragraph -->

						<!-- wp:paragraph -->
						<p></p>
						<!-- /wp:paragraph --></div></div>
				<!-- /wp:cmblocks/slide-item -->

				<!-- wp:cmblocks/slide-item -->
				<div class="swiper-slide"><div class="cmblocks-slider__item"><!-- wp:group {"style":{"color":{"background":"#e4e4e4"},"spacing":{"padding":{"top":"var:preset|spacing|20","bottom":"var:preset|spacing|20","left":"var:preset|spacing|20","right":"var:preset|spacing|20"}},"border":{"radius":"12px"}},"layout":{"type":"constrained"}} -->
						<div class="wp-block-group has-background" style="border-radius:12px;background-color:#e4e4e4;padding-top:var(--wp--preset--spacing--20);padding-right:var(--wp--preset--spacing--20);padding-bottom:var(--wp--preset--spacing--20);padding-left:var(--wp--preset--spacing--20)"><!-- wp:paragraph {"align":"center","placeholder":"Enter Slide content.","style":{"typography":{"fontStyle":"normal","fontWeight":"800"},"color":{"text":"#303030"},"elements":{"link":{"color":{"text":"#303030"}}}},"fontSize":"large"} -->
							<p class="has-text-align-center has-text-color has-link-color has-large-font-size" style="color:#303030;font-style:normal;font-weight:800"><?php esc_html_e('Twitter', 'cm-blocks'); ?></p>
							<!-- /wp:paragraph -->

							<!-- wp:paragraph {"align":"center","style":{"typography":{"fontSize":"1rem","fontStyle":"normal","fontWeight":"300"},"color":{"text":"#9f9f9f"},"elements":{"link":{"color":{"text":"#9f9f9f"}}}},"fontFamily":"body"} -->
							<p class="has-text-align-center has-text-color has-link-color has-body-font-family" style="color:#9f9f9f;font-size:1rem;font-style:normal;font-weight:300"><?php esc_html_e('Lorem ipsum dolor sit amet, consectetur adipiscing elit. Cras suscipit laoreet lorem, id sagittis ante rutrum ac. In vitae vulputate libero, at tincidunt nibh. Aenean luctus interdum dictum. Donec sed consectetur lorem. ', 'cm-blocks'); ?></p>
							<!-- /wp:paragraph -->

							<!-- wp:paragraph {"align":"center","style":{"typography":{"fontStyle":"normal","fontWeight":"700"},"spacing":{"margin":{"top":"var:preset|spacing|10","bottom":"0"},"padding":{"top":"0","bottom":"0","right":"0"}},"color":{"text":"#303030"},"elements":{"link":{"color":{"text":"#303030"}}}},"fontFamily":"body"} -->
							<p class="has-text-align-center has-text-color has-link-color has-body-font-family" style="color:#303030;margin-top:var(--wp--preset--spacing--10);margin-bottom:0;padding-top:0;padding-right:0;padding-bottom:0;font-style:normal;font-weight:700"><?php esc_html_e('Jack ma', 'cm-blocks'); ?></p>
							<!-- /wp:paragraph -->

							<!-- wp:paragraph {"align":"center","style":{"spacing":{"margin":{"top":"0","bottom":"0"}},"color":{"text":"#545454"},"elements":{"link":{"color":{"text":"#545454"}}},"typography":{"fontSize":"14px"}}} -->
							<p class="has-text-align-center has-text-color has-link-color" style="color:#545454;margin-top:0;margin-bottom:0;font-size:14px"><?php esc_html_e('HOD (Security)', 'cm-blocks'); ?></p>
							<!-- /wp:paragraph --></div>
						<!-- /wp:group -->

						<!-- wp:paragraph -->
						<p></p>
						<!-- /wp:paragraph -->

						<!-- wp:paragraph -->
						<p></p>
						<!-- /wp:paragraph --></div></div>
				<!-- /wp:cmblocks/slide-item --></div><div class="swiper-pagination"></div></div></div>
	<!-- /wp:cmblocks/slider -->

	<!-- wp:spacer {"height":"60px"} -->
	<div style="height:60px" aria-hidden="true" class="wp-block-spacer"></div>
	<!-- /wp:spacer --></div>
<!-- /wp:group -->
