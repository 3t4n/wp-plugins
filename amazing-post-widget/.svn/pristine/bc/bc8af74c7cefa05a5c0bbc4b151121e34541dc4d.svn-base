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
	<div class="fullwidth"  id="slider-id-<?php echo $widget_no; ?>">
		<?php $i=0;
		while($i<$pages_number)
		{
			$carousel_posts = new WP_Query( $argss[$i] );
			if( $carousel_posts->have_posts() && $pages_number >= $i+1 ) : ?>
			<div class="tp-carousel-posts portf-cols cols-<?php echo $columns; ?> clearfix">
				<h2 class="title hidden">Slide <?php echo $i; ?></h2>
			<?php while ( $carousel_posts->have_posts() ) : $carousel_posts->the_post(); ?>
				<div class="fullw hidden">
					<?php the_post_thumbnail('thumbnail');  ?>
					<span class="category"><?php $category = get_the_category(); 
							echo $category[0]->cat_name;
						?></span>
					<h5><?php the_title() ?></h5>
				</div>
				<div id="carou-post-<?php the_ID(); ?>" <?php post_class(); ?> style="width:<?php echo (100/$columns); ?>%;">
					<div class="margin clasic">
						<a href="<?php the_permalink(); ?>" class="thumb-link"><?php the_post_thumbnail( 'full' ); ?></a>
						<div class="text-center">
						<?php if($post_title == true): ?>
							<h4><a href="<?php the_permalink(); ?>" title="<?php the_title_attribute(); ?>"><?php the_title() ?></a></h4>
						<?php endif; ?>
						<?php if($excerpt_length != 0 && get_the_content() != '' ): ?>
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