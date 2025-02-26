<?php
/*==================
 SINGLE BLOG POST
==================*/
get_header();
the_post();
$post_id = get_the_ID();
?>
<section>
    <div class="container">
        <div class="row">
			<div class="col-md-4 store-details">
				<div class="store-info text-center">
					<a href="<?php echo get_post_meta( get_the_ID(), 'store_tracking_url', true ) ?>" target="_blank" rel="nofollow">
					<?php the_post_thumbnail( 'full', array( 'class' => '' ) ); ?>
					</a>
				  <a href="<?php echo get_post_meta( get_the_ID(), 'store_tracking_url', true ) ?>"  link="<?php echo "#cpn-".get_the_ID(); ?>"  id="shop-now" target="_blank">
					<?php echo get_post_meta( get_the_ID(), 'store_tracking_url', true ) ?>
				  </a>

			   </div>
			   <?php $content = get_the_content();  ?>
				<?php 
				if( !empty( $content ) ):
				?>
				
			   <div class="store-description">
				  <h5>Description</h5>
				  <div class="card">
                    <div class="white-block-content">
						<Strong><?php the_title(); ?></Strong>
						<div class="read-more">
							<div class="read-more-content">
								<?php the_content(); ?>
							</div>
						</div>
                    </div>
				  </div>
			   </div>
				<?php
				 endif;
				   $args = array(
					   'type'                     => 'dining',
					   'child_of'                 => 0,
					   'parent'                   => '',
					   'orderby'                  => 'name',
					   'order'                    => 'ASC',
					   'hide_empty'               => 1,
					   'hierarchical'             => 1,
					   'taxonomy'                 => 'offer_category',
					   'pad_counts'               => false
				   );
				   $categories = get_categories($args);
				 if(!empty($categories)):
				?>
			   <div class="store-categories">
				  <h5>Categories</h5>
				  <div class="card">
                    <div class="white-block-content">
					<?php
						   echo '<ul class="offer-categories">';
						   foreach ($categories as $category) { ?>
							  <li class="<?php echo $_GET["category"] == $category->slug ? 'active-cat' : ''; ?>"><a href="<?php echo get_permalink()."?category=".$category->slug; ?>"><?php echo $category->name; ?></a></li>
							 <?php
						   }
						   echo '</ul>';
					 ?>
					 </div>
				  </div>
			   </div>
				<?php
				endif;
				?>
			<?php
				$store_facebook = get_post_meta( $post_id, 'store_facebook', true );
				$store_twitter = get_post_meta( $post_id, 'store_twitter', true );
				$store_google = get_post_meta( $post_id, 'store_google', true );
			
				if(!empty( $store_facebook ) || !empty( $store_twitter ) || !empty( $store_google )){
			?>
			   <div class="share-store">
				  <h5>Social Network</h5>
				  <div class="card">
					<ul class="list-unstyled list-inline store-social-networks">
						<?php
						
						if( !empty( $store_facebook ) ){
							?>
							<li>
								<a href="<?php echo esc_url( $store_facebook ) ?>" target="_blank" class="share">
									<i class="fa fa-facebook"></i>
								</a>
							</li>
							<?php
						}
						
						if( !empty( $store_twitter ) ){
							?>
							<li>
								<a href="<?php echo esc_url( $store_twitter ) ?>" target="_blank" class="share">
									<i class="fa fa-twitter"></i>
								</a>
							</li>
							<?php
						}
						
						if( !empty( $store_google ) ){
							?>
							<li>
								<a href="<?php echo esc_url( $store_google ) ?>" target="_blank" class="share">
									<i class="fa fa-google-plus"></i>
								</a>
							</li>
							<?php
						}
						?>
					</ul>
				  </div>
			   </div>
		   <?php } ?>
			</div>

			<div class="col-md-8 store_deals_grid">
                <?php
                $cur_page = get_query_var( 'page' ) ? get_query_var( 'page' ) : 1; //get curent page
                $offers_per_page = 5;
				$args = array(
                    'post_type'     => 'offer',
                    'posts_per_page'=> $offers_per_page,
                    'post_status'   => 'publish',
                    'orderby' 		=> array( 'meta_value_num' => 'ASC', 'date' =>'DESC' ),
                    'paged'         => $cur_page,
                    'order'         => 'ASC',
					'meta_query'    => array(
						'relation' => 'AND',
						array(
							'key' => 'store',
							'value' => get_the_ID(),
							'compare' => '='
						),
						array(
							'key' => 'offer_start_date',
							'value' => current_time( 'timestamp' ),
							'compare' => '<='
						),
						array(
							'key' => 'offer_expire_date',
							'value' => current_time( 'timestamp' ),
							'compare' => '>='
						)
					)
                );
				
				if(isset($_GET['category'])){
					$args["tax_query"] = array(
							array(
								'taxonomy' => 'offer_category',
								'field' => 'slug',
								'terms' => $_GET['category']
							)
						);
				}
                $offers = new WP_Query( $args );

                $page_links_total =  $offers->max_num_pages;
                $pagination_args = array(
                    'end_size' => 2,
                    'mid_size' => 2,
                    'format' => '?page=%#%',
                    'total' => $page_links_total,
                    'current' => $cur_page, 
                    'prev_next' => false,
                    'type' => 'array'
                );

                $page_links = paginate_links( $pagination_args );

                if( $offers->have_posts() ){ 
                    ?>
					<div class="deal-list-header">
					<Strong><?php the_title(); ?>	–&nbsp;Deals & Discounts</Strong>
					</div>
					<div class="row masonry">
						<div class="col-sm-12">
							<?php include('offer-loop.php'); ?>
						</div>
					</div>
                    <?php
                }
                else{
                    ?>
                    <div class="white-block">
                        <div class="white-block-content">
                            <p class="nothing-found"><?php echo _( 'Currently there are no deals for this store.' ); ?></p>
                        </div>
                    </div>
                    <?php
                }
                ?>
			
			</div>
        </div>
    </div>
</section>
<?php
get_footer();
?>