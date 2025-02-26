<?php
/**
 * carousel Posts Widget: Default widget template
 */

// Block direct requests
if ( !defined('ABSPATH') )
	die('-1');

if ( !function_exists( 'enqueue_col_script' ) ) {	
function enqueue_col_script() {
	wp_enqueue_script( 'jquery-touchSwipe' );
	wp_enqueue_script( 'jquery-ls' );
	wp_enqueue_script( 'jquery_easing' );
}
add_action('wp_enqueue_scripts', 'enqueue_col_script');
}
wp_enqueue_script( 'jquery-touchSwipe' );
wp_enqueue_script( 'jquery-ls' );
wp_enqueue_script( 'jquery_easing' );
global $post;
$widget_no = rand(1,999);
?>
	<div class="liquid-slider"  id="slider-id-<?php echo $widget_no; ?>">
		<?php $i=0;
		while($i<$pages_number)
		{
			$carousel_posts = new WP_Query( $argss[$i] );
			if( $carousel_posts->have_posts() && $pages_number >= $i+1 ) : ?>
			<div class="tp-carousel-posts portf-cols cols-<?php echo $columns; ?> clearfix" style="margin-right:-<?php if ( $pages_number < '2' ) { echo $post_padding; } else { echo '0'; } ?>px;">
				<h2 class="title hidden">Slide <?php echo $i; ?></h2>
			<?php while ( $carousel_posts->have_posts() ) : $carousel_posts->the_post(); ?>
				<div id="carou-post-<?php the_ID(); ?>" <?php post_class(); ?> style="width:<?php echo (100/$columns); ?>%;">
					<div class="margin clasic" style="margin:0 <?php echo $post_padding; ?>px <?php echo $post_padding; ?>px 0">
						<a href="<?php echo the_permalink(); ?>">
							<?php
								if( $thumbnail == true ) {
									$thumb = get_post_thumbnail_id();
									$img_url = wp_get_attachment_url( $thumb, 'full'); //get img URL
									$timage = aq_resize( $img_url, $img_width, $img_height, true ); //resize & crop img
							?>
								<img src="<?php echo $timage; ?>" alt="">
							<?php } ?>
						</a>
						<?php if($post_title == true): ?>
							<h4><a href="<?php the_permalink(); ?>" title="<?php the_title_attribute(); ?>"><?php the_title() ?></a></h4>
						<?php endif; ?>
						<?php if($excerpt_length != '' && get_the_content() != '' ): ?>
							<p>
							<?php 
								$content = strip_shortcodes(get_the_content());
								$content = strip_tags($content);
								echo substr( $content, 0, $excerpt_length ). '...';
							?>
							</p>
						<?php endif; ?>
					</div>
				</div>
			<?php endwhile; ?>
			</div><!-- .tp-carousel-posts.two-cols -->
		<?php endif; 
		$i++;
		} ?>
	</div>
	<?php // Be sure to reset any post_data before proceeding

		wp_reset_postdata(); ?>
<?php if ( $pages_number >= '2' ) : ?>
<script type="text/javascript">
jQuery(function() {
  /* Here is the slider using default settings */
  jQuery('#slider-id-<?php echo $widget_no; ?>').liquidSlider({
		autoHeight:true,
		autoHeightEaseDuration: 800,
		slideEaseFunction: "easeInOutCubic",
		slideEaseDuration: 1000,
		// autoSlide:true,
		// autoSlideStopWhenClicked: false,
		// autoSlideInterval: 5000,
		dynamicArrows: false,
		mobileNavigation: false,
		useCSSMaxWidth: 1200
	  });
});
</script>
<?php endif; ?>