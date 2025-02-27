<?php
use News_Element\Khobish_Helper;
// The Loop
if ( $wp_query->have_posts() ) {
	$post_count = 0;
	while ( $wp_query->have_posts() ) {
		$wp_query->the_post();
    $post_count++;
		?>
      <div class="ne-df-50">
        <div class="anim-fade">
          <div class="ne-d-flex ne-v-center ne-space-btwn post-item <?php echo Khobish_Helper::xl_post_format_icon();?>">
            <?php if ( has_post_thumbnail() ) : ?>
                <div class="ft-thumbwrap no-overflow">
                  <a href="<?php the_permalink();?>">
                    <span class="icon khbmedia xlsmall"></span>
                    <?php echo Khobish_Helper::madmag_lazy_img(get_the_ID(),$imgf);?>
                  </a>
                </div>
            <?php endif; ?>
 
              <div class="excerpt-wrap">
                <?php Khobish_Helper::ae_build_postmeta($metaf,$excerptf);?>
              </div>

          </div>
        </div>
      </div>

	 <?php } wp_reset_postdata(); } else {
	//echo 'No Loadmore';
}