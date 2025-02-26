<?php
get_header();
?>

<div class="container">
	<div class="row">
		<div class="col-md-12">
			<div class="col-md-4">
				<div class="main-offer-category">
					<div class="category-header">Categories</div>
					<div class="offer-categories-list">
						<div class="white-block-content">
						<?php
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
							   echo '<ul class="offer-categories">';

							   foreach ($categories as $category) { ?>
								  <li class="<?php echo $_GET["category"] == $category->slug ? 'active-cat' : ''; ?>"><a href="<?php echo get_post_type_archive_link( "offer" )."?category=".$category->slug; ?>"><?php echo $category->name; ?></a></li>
								 <?php
							   }
							   if(isset($_GET['category'])){
								   echo '<li><a href="'.get_post_type_archive_link( "offer" ).'">All</a></li>';
							   }
							   echo '</ul>';
						   ?>
						 </div>
					</div>
				</div>
			</div>
			<div class="col-md-8 store_deals_grid" >
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
					'prev_next' => true,
					'type' => 'array'
				);

				$offer_page = true;
				$page_links = paginate_links( $pagination_args );
				if( $offers->have_posts() ){ 
					?>
					<div class="deal-list-header">
					<Strong>Deals & Discounts</Strong>
					</div>
					<div class="row masonry">
						<div class="col-sm-12">
							<?php include('offer-loop.php'); ?>
						</div>
					</div>
					<?php if(!empty($page_links)){ ?>
					<div class="AMS-pagination pull-right">
						  <ul class="pagination">
							<?php foreach($page_links as $pagination_page){ ?>
							<li class="page-item"><?php echo $pagination_page; ?></li>
							<?php } ?>
						  </ul>
					</div>
					<?php } ?>
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
</div>

<?php
get_footer();
?>

