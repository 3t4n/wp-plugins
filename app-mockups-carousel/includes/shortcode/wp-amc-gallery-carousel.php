<?php
/**
 * 'app_mc_carousel' Shortcode
 * 
 * @package Swiper Slider and Carousel
 * @since 1.0.0
 */

// Exit if accessed directly
if ( !defined( 'ABSPATH' ) ) exit;

function wp_amc_gallery_carousel( $atts, $content ) {
	
	extract(shortcode_atts(array(
		'id'				=> '',
		'device'            => 'iphone-white'
	), $atts));
	
	// Taking some globals
	global $post;
	
	$device 	= !empty($device) ? $device 	: 'iphone-white';
	// Taking some variables
	$unique 		= wp_amc_get_unique();
	$gallery_id 	= !empty($id) ? $id	: $post->ID;

	$prefix = WP_AMC_META_PREFIX; // Metabox prefix	
	
	$arrow				= get_post_meta( $gallery_id, $prefix.'arrow_carousel', true );
	$arrow 				= ($arrow == 'false') ? 'false' : 'true';
	
	$pagination 		= get_post_meta( $gallery_id, $prefix.'pagination_carousel', true );
	$pagination 		= ($pagination == 'false') ? 'false' : 'true';

	$pagination_type 	= get_post_meta( $gallery_id, $prefix.'pagination_type_carousel', true );
	$pagination_type 	= ($pagination_type == 'fraction') ? 'fraction' : 'bullets';
	
	$speed 				= get_post_meta( $gallery_id, $prefix.'speed_carousel', true );
	$speed 				= (!empty($speed)) ? $speed : '300';

	$autoplay 			= get_post_meta( $gallery_id, $prefix.'autoplay_carousel', true );
	$autoplay 			= ($autoplay == 'false') ? 'false' : 'true';
	
	$autoplay_speed		= get_post_meta( $gallery_id, $prefix.'autoplay_speed_carousel', true );
	$autoplay_speed 	= (!empty($autoplay_speed)) ? $autoplay_speed : '3000';
	
	$auto_stop			= get_post_meta( $gallery_id, $prefix.'auto_stop_carousel', true );
	$auto_stop 			= ($auto_stop == 'true') ? 'true' : 'false';

	$loop				= get_post_meta( $gallery_id, $prefix.'loop_carousel', true );
	$loop 				= ($loop == 'true') ? 'true' : 'false';

	// Slider configuration
	$slider_conf = compact('pagination','pagination_type', 'speed','autoplay','autoplay_speed','auto_stop','loop');

	// Enqueue required script
	wp_enqueue_script( 'wpos-swiper-jquery' );
	wp_enqueue_script( 'wp-amc-public-js' );

	// Getting gallery images
	$images = get_post_meta($gallery_id, $prefix.'gallery_id', true);

	ob_start();
	
	if( $images ): ?>
		
		<div class="wpamc-carousel-wrap wpamc-row-clearfix">		
			<div id="wpamc-carousel-<?php echo $unique; ?>" class="swiper-container wpamc-swiper-carousel-wrapper">				
				<div class="swiper-wrapper wpamc-swiper-carousel">					
					<?php foreach( $images as $image ): 
						
						$post_mata_data 	= get_post($image);
						$image_lsider 		= wp_get_attachment_image_src( $image, 'large' );
						$image_link 		= get_post_meta($image, $prefix.'attachment_link',true); ?>
						
						<div class="amc-slide swiper-slide swiper-slide" style="width:273px">						 	
							<?php if (!empty($image_link)) { ?>
								<a href="<?php echo $image_link; ?>"><img src="<?php echo $image_lsider[0]; ?>" alt="slider image" /> </a>
							<?php } else { ?>
								<img src="<?php echo $image_lsider[0]; ?>" alt="slider image" />
							<?php } ?>	
						</div>
					<?php endforeach; ?>
					 
				</div>				
				<div class="wpamc-carousel-conf"><?php echo json_encode( $slider_conf ); ?></div><!-- end of-slider-conf -->
				<?php if($device == "iphone-white") { ?>
					<div class="player-overlay"><img src="<?php echo WP_AMC_URL; ?>/assets/images/iphone-white.png" /></div>
				<?php } else {	 ?>
					<div class="player-overlay"><img src="<?php echo WP_AMC_URL; ?>/assets/images/iphone-black.png" /></div>
				<?php } if($pagination == 'true'){ ?>				
					<div class="swiper-pagination"></div>
				<?php } ?>
	        
		        <!-- Add Arrows -->
		        <?php if($arrow == 'true'){ ?>			    
			        <div class="swiper-button-next"></div>
			        <div class="swiper-button-prev"></div>
			    <?php } ?>
			</div><!-- end .msacwl-carousel -->
		</div><!-- end .msacwl-carousel-wrap -->
	<?php endif;
	
	$content .= ob_get_clean();
	return $content;
}

// 'meta_gallery_carousel' Shortcode
add_shortcode( 'app_mc_carousel', 'wp_amc_gallery_carousel' );