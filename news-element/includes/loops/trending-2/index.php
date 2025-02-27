<?php
use News_Element\Khobish_Helper;

// The Loop
if ( $wp_query->have_posts() ) {
	$post_count = 0;
	while ( $wp_query->have_posts() ) {
		$wp_query->the_post();
    $post_count++;  
		?>
      <div class="anim-fade">

        <article class="post-item">
            <div class="excerpt-wrap">
              <?php Khobish_Helper::ae_build_postmeta($metaf,0);?>
            </div>
            <?php Khobish_Helper::counter($per_page,$paged,$post_count);?>
        </article>

      </div>
	 <?php } wp_reset_postdata(); } else {
	//echo 'No Loadmore';
}