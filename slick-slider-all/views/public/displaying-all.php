<div class="wp_slick_slider_all_wrapper cs_slick_slider_all_<?php echo $slider_id; ?>">
	<div class="wp_slick_slider_all_inner">
		<?php
    
    foreach ( $the_query->posts as $k => $v ):
    $feature_image = get_the_post_thumbnail_url( $v->ID );
    $excerpt = $v->post_excerpt;
    $content = $v->post_content;
    if ( empty($excerpt) ) {
	    $content_scratched = wp_trim_words($content,'20');
    } else {
	    $content_scratched = $excerpt;
    }
    ?>
      <div class="wp_slick_slider_all_item">
        <div class="wp_slick_slider_all_item_img">
          <a href="<?php echo get_permalink($v->ID); ?>"><img src="<?php echo $feature_image; ?>" alt="<?php echo $v->post_title; ?>"></a>
        </div>
        <div class="wp_slick_slider_all_item_description">
          <h3><a href="<?php echo get_permalink($v->ID); ?>"><?php echo $v->post_title; ?></a></h3>
          <?php if ( $a['show_description'] === 'true' ): ?>
          <p><?php echo $content_scratched; ?></p>
          <?php endif; ?>
        </div>
      </div>
		<?php endforeach; ?>
    <?php wp_reset_postdata(); ?>
	</div>
</div>

<script>
  jQuery(document).ready(function( $ ) {

    $('.wp_slick_slider_all_wrapper.cs_slick_slider_all_<?php echo $slider_id; ?> .wp_slick_slider_all_inner').slick({
      slidesToShow: 1,
      slidesToScroll: 1,
      swipe: <?php echo $a['swipe']; ?>,
      arrows: true,
      //dots: true,
      mobileFirst: true,
      infinite: false,
      nextArrow: '<button type="button" class="slick-next"><i class="fa fa-chevron-right" aria-hidden="true"></i></button>',
      prevArrow: '<button type="button" class="slick-prev"><i class="fa fa-chevron-left" aria-hidden="true"></i></button>',
      responsive: [
        {
          breakpoint: 1200,
          settings: {
            slidesToShow: <?php echo $responsive_final['large']; ?>
          }
        },
        {
          breakpoint: 768,
          settings: {
            slidesToShow: <?php echo $responsive_final['medium']; ?>
          }
        },
        {
          breakpoint: 576,
          settings: {
            slidesToShow: <?php echo $responsive_final['small']; ?>
          }
        },
        {
          breakpoint: 100,
          settings: {
            slidesToShow: <?php echo $responsive_final['exsmall']; ?>
          }
        }
      ]
    });

  });
</script>