<?php 
$oneto_blog_disabled = get_theme_mod('oneto_blog_disabled', true); 
$oneto_blog_area_title = get_theme_mod('oneto_blog_area_title', __('Latest <span class="line-shape2 pb-1 end-auto position-relative font-weight-800">News</span>','oneto-companion'));
$oneto_blog_area_des = get_theme_mod('oneto_blog_area_des', __('Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua ut enim ad minim veniam.','oneto-companion'));
$oneto_home_blog_meta_disabled = get_theme_mod('oneto_home_blog_meta_disabled', true);
$oneto_theme_blog_category = get_theme_mod('oneto_theme_blog_category');
$activate_theme_data = wp_get_theme(); // getting current theme data
$activate_theme = $activate_theme_data->name;
if($oneto_blog_disabled == true): ?>
	<section id="theme-blog" class="theme-blog position-relative bg-white overflow-hidden py-default">
	 	<?php if($oneto_blog_area_title != null || $oneto_blog_area_des != null): ?>
		<div class="container">
			<div class="row align-items-center wow fadeInUp">
				<div class="col-sm-8 mx-auto text-center pb-4 mb-sm-5 mb-4">
					<?php if($oneto_blog_area_title != null): ?>
					<h2 class="theme-section-title font-weight-400 mb-2"><?php echo wp_kses_post( $oneto_blog_area_title ); ?></h2>
					<?php endif; ?>
					<?php if($oneto_blog_area_des != null): ?>
					<p class="theme-section-subtitle mt-3"><?php echo wp_kses_post( $oneto_blog_area_des ); ?></p>
					<?php endif; ?>
				</div>
			</div>
		</div>
		<?php endif; ?>
		<div class="container">
			<div class="row">
        <?php
        $post_args = array( 'post_type' => 'post', 'category__in' => $oneto_theme_blog_category, 'post__not_in'=>get_option("sticky_posts")) ;
			query_posts( $post_args );
			if(query_posts( $post_args ))
			{	
				while(have_posts()):the_post();
				{ ?>
				<?php if($activate_theme == 'Oneto'): ?>
					<div class="col-lg-4 col-md-12 col-sm-12">
						<article class="post">
							<div class="entry-meta">
								<?php $category_data = get_the_category_list( esc_html__( '  ', 'oneto' ) );
									if(!empty($category_data)) {
									echo '<span class="cat-links">' . $category_data . '</span>';
									} ?>
							</div>
							<header class="entry-header">
								<h5 class="entry-title"><a href="<?php the_permalink(); ?>"><?php the_title();?></a></h5>
							</header>
							<div class="entry-meta">
								<span class="posted-on">
									<a href="<?php echo esc_url(get_month_link(get_post_time('Y'),get_post_time('m'))); ?>"><time>
									<?php echo esc_html(get_the_date('M j, Y')); ?></time></a>
								</span>
								<span class="author">
									<a href="<?php echo esc_url(get_author_posts_url( get_the_author_meta( 'ID' )) );?>"><?php echo esc_html(get_the_author());?></a>	
								</span>
							</div>
							<?php if(has_post_thumbnail()): ?>
								<figure class="post-thumbnail">
								<?php $img_class = array('class' => "img-fluid");?>
								<a href="<?php the_permalink(); ?>"><?php the_post_thumbnail('',$img_class);?></a>
								</figure>
							<?php endif; ?>
								<div class="entry-content">	
									<?php the_content(__('Read More','oneto-companion')); ?>
								</div>
						</article>
					</div>
				<?php endif; ?>
					
				<?php }  
				endwhile; 
			} ?>
			</div>
			
		</div>
	</section>
<?php endif; ?>