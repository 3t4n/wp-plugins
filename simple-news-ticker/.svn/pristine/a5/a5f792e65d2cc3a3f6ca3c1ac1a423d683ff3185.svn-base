<div class="simple-news-ticker-container">

	<div class="simple-news-ticker-title">
		
		<?php if($title !== '') : ?>
		<span><?php echo esc_html($title); ?></span>
		<?php endif; ?>
	</div>
	<nav class="simple-news-ticker-direction-nav">
		<a href="#" class="simple-news-ticker-prev"><span><?php _e('Prev','simple-news-ticker'); ?></span></a>
		<a href="#" class="simple-news-ticker-next"><span><?php _e('Next','simple-news-ticker'); ?></span></a>
	</nav>
	<div class="simple-news-ticker-wrapper">
	
		<ul class="simple-news-ticker">
		
		<?php $rp = new WP_Query(array('showposts' => $showposts, 'nopaging' => 0, 'post_status' => 'publish', 'ignore_sticky_posts' => 1, 'category_name' => $ntax, 'category__not_in' => array($exclude), 'offset' => $offset, 'post_type' => $posttype));
		
		if ($rp->have_posts()) :  while ($rp->have_posts() ) : $rp->the_post();  ?>

			<li class="">
				<?php 

				$categories = get_the_category();
 				
 				$simple_news_ticker_title = get_the_title(); 
 				
 				if($simple_news_ticker_title): ?>
					
					<div class="">
						
						<a href="<?php the_permalink(); ?>" rel="bookmark">
							
							<?php echo wp_trim_words(get_the_title(), $titlewords); ?>
						
						</a>
					
					</div>			
				
				</li>
		
		<?php endif; ?>
					
		<?php endwhile; wp_reset_postdata(); endif; ?>
		
		</ul>

		
		<div class="clear"></div>
	
	</div>	
	
	<div class="clear"></div>

</div>	
