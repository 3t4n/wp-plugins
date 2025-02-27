<?php

	// Exit if accessed directly
	if (!defined('ABSPATH')) {
	    exit;
	}

	function tppost_slider_register_shortcode($atts, $content = null){
		extract(shortcode_atts( array(
			'post_styles'     => 'style1',
			'category'        => '-1',
			'show_items'      => '4',
			'order_by'        => 'date',
			'order'           => 'DESC',
			'number'          => '-1',
			'show_pagination' => 'true',
			'auto_play'       => 'true',
		), $atts));

	    // Sanitize values
	    $post_styles      = sanitize_text_field( $atts['post_styles'] );
	    $category         = intval( $atts['category'] );
	    $show_items       = intval( $atts['show_items'] );
	    $order_by         = sanitize_key( $atts['order_by'] ); // `date`, `title`, etc.
	    $order            = strtoupper( sanitize_key( $atts['order'] ) ); // Make sure it is in uppercase
	    $number           = intval( $atts['number'] );
	    $show_pagination  = filter_var( $atts['show_pagination'], FILTER_VALIDATE_BOOLEAN );
	    $auto_play        = filter_var( $atts['auto_play'], FILTER_VALIDATE_BOOLEAN );

	    // Set default arguments for the query
	    $args = array(
	        'post_type'      => 'post',
	        'posts_per_page' => $number,
	        'orderby'        => $order_by,
	        'order'          => $order,
	    );

	    // Add category filtering if specified
	    if ( $category > -1 ) {
	        $args['tax_query'] = array(
	            array(
	                'taxonomy' => 'category',
	                'field'    => 'id',
	                'terms'    => $category,
	            ),
	        );
	    }

		$psrndn = rand(1,1000);
		// 	query posts
		
		$tppostslider_query = new WP_Query( $args );
		
			if($post_styles=="style1"){ ?>
				<script type="text/javascript">
					jQuery(document).ready(function($) {
						$("#tppost-main-slider-<?php echo esc_attr( $psrndn ); ?>").owlCarousel({
							autoplay:<?php echo esc_attr($auto_play); ?>,
							loop:false,
							margin:10,
							nav:false,
							autoplayHoverPause: true,
							dots: true,
							responsive:{
								0:{
									items:1
								},
								600:{
									items:3
								},
								1000:{
									items:<?php echo esc_attr($show_items); ?>
								}
							}
						});
					});	
				</script>
				<style type="text/css">
					.tps_single_slider_items-<?php echo esc_attr( $psrndn ); ?> {
						border-bottom: medium none;
						box-shadow: none;
						margin: 0 10px;
						transition: all 0.4s ease-in-out 0s;
					}
					.tps_single_slider_items-<?php echo esc_attr( $psrndn ); ?> .tps_single_slider_items_post_images-<?php echo esc_attr( $psrndn ); ?>{
						position: relative;
						overflow: hidden;
					}
					.tps_single_slider_items-<?php echo esc_attr( $psrndn ); ?> .tps_single_slider_items_post_images-<?php echo esc_attr( $psrndn ); ?>:before{
						content: "";
						width: 100%;
						height: 100%;
						position: absolute;
						top: 0;
						left: 0;
						background: rgba(0, 0, 0, 0);
						transition: all 0.4s linear 0s;
					}
					.tps_single_slider_items-<?php echo esc_attr( $psrndn ); ?>:hover .tps_single_slider_items_post_images-<?php echo esc_attr( $psrndn ); ?>:before{
						background: rgba(0, 0, 0, 0.6);
					}
					.tps_single_slider_items-<?php echo esc_attr( $psrndn ); ?> .tps_single_slider_items_post_images-<?php echo esc_attr( $psrndn ); ?> img{
						width: 100%;
						height: auto;
					}
					.tps_single_slider_items-<?php echo esc_attr( $psrndn ); ?> img {
					  border-radius: 0;
					  box-shadow: none;
					}
					.tps_single_slider_items-<?php echo esc_attr( $psrndn ); ?> .tps_single_slider_items_category-<?php echo esc_attr( $psrndn ); ?> {
						width: 100%;
						font-size: 16px;
						color: #fff;
						line-height: 11px;
						text-align: center;
						text-transform: capitalize;
						padding: 11px 0;
						background: #ff9412;
						position: absolute;
						bottom: 0;
						left: -100%;
						transition: all 0.5s ease-in-out 0s;
					}
					.tps_single_slider_items-<?php echo esc_attr( $psrndn ); ?>:hover .tps_single_slider_items_category-<?php echo esc_attr( $psrndn ); ?>{
						left: 0;
					}
					.tps_single_slider_items-<?php echo esc_attr( $psrndn ); ?> .tps_single_slider_item_reviews-<?php echo esc_attr( $psrndn ); ?>{
						padding: 20px 20px;
						background: #fff;
						position: relative;
					}
					.tps_single_slider_items-<?php echo esc_attr( $psrndn ); ?> .tps_single_slider_item_post_title-<?php echo esc_attr( $psrndn ); ?>{
						margin: 0;
					}
					.tps_single_slider_item_reviews-<?php echo esc_attr( $psrndn ); ?> h3.tps_single_slider_item_post_title-<?php echo esc_attr( $psrndn ); ?> {
					  font-size: 15px;
					}
					.tps_single_slider_items-<?php echo esc_attr( $psrndn ); ?> .tps_single_slider_item_post_title-<?php echo esc_attr( $psrndn ); ?> a{
						border-bottom: medium none;
						color: #ff9412;
						display: inline-block;
						font-size: 15px;
						font-weight: normal;
						letter-spacing: 2px;
						margin-bottom: 25px;
						text-decoration: none;
						transition: all 0.3s linear 0s;
						box-shadow: none;
					}
					.tps_single_slider_items-<?php echo esc_attr( $psrndn ); ?> .tps_single_slider_item_post_title-<?php echo esc_attr( $psrndn ); ?> a:hover{
						text-decoration: none;
						color: #555;
					}
					.tps_single_slider_items-<?php echo esc_attr( $psrndn ); ?> .tps_single_slider_item_description-<?php echo esc_attr( $psrndn ); ?>{
						font-size: 15px;
						color: #555;
						line-height: 26px;
					}
					.tps_single_slider_items-<?php echo esc_attr( $psrndn ); ?> .tps_single_slider_items_category-<?php echo esc_attr( $psrndn ); ?> > a {
					  border: medium none;
					  box-shadow: none;
					  color: #000;
					  margin-right: 8px;
					  text-decoration: none;
					}
					.tps_single_slider_items-<?php echo esc_attr( $psrndn ); ?> .tps_single_slider_items_category-<?php echo esc_attr( $psrndn ); ?> > a:hover {
					  color: #fff;
					}
					.tps_single_slider_item_reviews-<?php echo esc_attr( $psrndn ); ?> .tps_single_slider_admin_description-<?php echo esc_attr( $psrndn ); ?>{
						margin-top: 20px;
					}
					.tps_single_slider_admin_description-<?php echo esc_attr( $psrndn ); ?> span{
						display: inline-block;
						font-size: 14px;
					}
					.tps_single_slider_admin_description-<?php echo esc_attr( $psrndn ); ?> span i{
						margin-right: 5px;
						color: #999;
					}
					.tps_single_slider_admin_description-<?php echo esc_attr( $psrndn ); ?> span a{
						color: #999;
						text-transform: uppercase;
					}
					.tps_single_slider_admin_description-<?php echo esc_attr( $psrndn ); ?> span a:hover{
						text-decoration: none;
						color: #ff9412;
					}
					.tps_single_slider_admin_description-<?php echo esc_attr( $psrndn ); ?> span.comments{
						float: right;
					}
					@media only screen and (max-width: 359px) {
						.tps_single_slider_items-<?php echo esc_attr( $psrndn ); ?> .tps_single_slider_items_category-<?php echo esc_attr( $psrndn ); ?>{
							font-size: 13px;
						}
					}
				</style>

				<div class="tppost-slider-area<?php echo esc_attr( $psrndn ); ?>">
					<div id="tppost-main-slider-<?php echo esc_attr( $psrndn ); ?>" class="owl-carousel">
						<?php
						// Creating a new side loop
						while ( $tppostslider_query->have_posts() ) : $tppostslider_query->the_post();
							
						$catid = get_the_ID();
						$cats = get_the_category($catid);
						
						setup_postdata( $post );
						$excerpt = get_the_excerpt();
						?>
						
						<div class="tps_single_slider_items-<?php echo esc_attr( $psrndn ); ?>">
							<div class="tps_single_slider_items_post_images-<?php echo esc_attr( $psrndn ); ?>">
								<?php if ( has_post_thumbnail() ) { ?>
									<div class="tps-slider-thumb">
										<a href="<?php the_permalink(); ?>"><?php the_post_thumbnail(); ?></a>
									</div>
								<?php } ?>
								<div class="tps_single_slider_items_category-<?php echo esc_attr( $psrndn ); ?>">
									<?php foreach ( $cats as $cat ){ ?>
										<a href="<?php get_category_link($cat->cat_ID); ?>"><?php echo $cat->name; ?></a>
									<?php } ?>
								</div>
							</div>
							<div class="tps_single_slider_item_reviews-<?php echo esc_attr( $psrndn ); ?>">
								<h3 class="tps_single_slider_item_post_title-<?php echo esc_attr( $psrndn ); ?>"><a href="<?php the_permalink(); ?>"><?php the_title(); ?></a></h3>
								<div class="tps_single_slider_item_description-<?php echo esc_attr( $psrndn ); ?>"><?php echo the_excerpt(); ?>
								</div>
								<div class="tps_single_slider_admin_description-<?php echo esc_attr( $psrndn ); ?>">
									<span><i class="fa fa-user"></i> <a href="<?php echo get_author_posts_url( get_the_author_meta( 'ID' ), get_the_author_meta( 'user_nicename' ) ); ?>"><?php echo get_the_author(); ?></a></span>
								</div>
							</div>
						</div>
						<?php endwhile; wp_reset_postdata(); ?>	
					</div>
				</div>
				<div class="clearfix"></div>
			<?php }if($post_styles=="style2") { ?>

				<script type="text/javascript">
					jQuery(document).ready(function($) {
						$("#tppost-main-slider-<?php echo esc_attr( $psrndn ); ?>").owlCarousel({
						autoPlay: <?php echo esc_attr( $auto_play ); ?>,
						stopOnHover: true,
						items : <?php echo esc_attr( $show_items ); ?>,
						itemsDesktop : [1199,3],
						itemsDesktopSmall : [979,3],
						navigation : false,
						navigationText : ["‹","›"],
						paginationNumbers: false,
						pagination: <?php echo esc_attr( $show_pagination ); ?>,
						});
					});
				</script>
				
				<style type="text/css">
					.post_slider_<?php echo esc_attr( $psrndn ); ?>_style_two{
						padding: 0 15px;
					}
					.post_slider_<?php echo esc_attr( $psrndn ); ?>_style_two .post_slider_<?php echo esc_attr( $psrndn ); ?>_style_img{
						position: relative;
					}
					.post_slider_<?php echo esc_attr( $psrndn ); ?>_style_two .post_slider_<?php echo esc_attr( $psrndn ); ?>_style_img > a{
						display:block;
					}
					.post_slider_<?php echo esc_attr( $psrndn ); ?>_style_two .post_slider_<?php echo esc_attr( $psrndn ); ?>_style_img img{
						border-radius: 0;
						box-shadow: none;
						height: auto;
						width: 100%;
					}
					.post_slider_<?php echo esc_attr( $psrndn ); ?>_style_two .post_slider_<?php echo esc_attr( $psrndn ); ?>_style_img:hover:before{
						content: "";
						position: absolute;
						width: 100%;
						height:100%;
						background-color: rgba(220, 0, 90, 0.6);
					}
					.post_slider_<?php echo esc_attr( $psrndn ); ?>_style_two .post_slider_<?php echo esc_attr( $psrndn ); ?>_style_img:hover:after{
						opacity: 1;
						transform: scale(1);
					}
					.post_slider_<?php echo esc_attr( $psrndn ); ?>_style_two .post_slider_<?php echo esc_attr( $psrndn ); ?>_style_title{
						margin-bottom: 10px;
						margin-top: 10px;
					}
					.post_slider_<?php echo esc_attr( $psrndn ); ?>_style_two .post_slider_<?php echo esc_attr( $psrndn ); ?>_style_title > a{
						color:#222;
						display: block;
						font-size: 17px;
						font-weight: 600;
						text-transform: uppercase;
						text-decoration:none;
						border-bottom:none;
						box-shadow: none;
					}
					.post_slider_<?php echo esc_attr( $psrndn ); ?>_style_two .post_slider_<?php echo esc_attr( $psrndn ); ?>_style_title > a:hover{
						text-decoration: none;
						color:#dc005a;
					}
					.post_slider_<?php echo esc_attr( $psrndn ); ?>_style_two .post_slider_<?php echo esc_attr( $psrndn ); ?>_style_bar{
						padding: 0;
						list-style: none;
					}
					.post_slider_<?php echo esc_attr( $psrndn ); ?>_style_two .post_slider_<?php echo esc_attr( $psrndn ); ?>_style_bar > li{
						display: inline-block;
						margin: 0 15px 0 0;
					}
					.post_slider_<?php echo esc_attr( $psrndn ); ?>_style_two .post_slider_<?php echo esc_attr( $psrndn ); ?>_style_post_date,
					.post_slider_<?php echo esc_attr( $psrndn ); ?>_style_two .post_slider_<?php echo esc_attr( $psrndn ); ?>_style_post_author,
					.post_slider_<?php echo esc_attr( $psrndn ); ?>_style_two .post_slider_<?php echo esc_attr( $psrndn ); ?>_style_post_author > a{
						color:#8f8f8f;
						font-size: 12px;
						margin-right: 16px;
						text-transform: uppercase;
						font-style: italic;
						text-decoration:none;
					}
					.post_slider_<?php echo esc_attr( $psrndn ); ?>_style_two .post_slider_<?php echo esc_attr( $psrndn ); ?>_style_post_date > i,
					.post_slider_<?php echo esc_attr( $psrndn ); ?>_style_two .post_slider_<?php echo esc_attr( $psrndn ); ?>_style_post_author > i{
						margin-right: 5px;
					}
					.post_slider_<?php echo esc_attr( $psrndn ); ?>_style_two .post_slider_<?php echo esc_attr( $psrndn ); ?>_style_post_author > a:hover{
						color:#dc005a;
					}
					.post_slider_<?php echo esc_attr( $psrndn ); ?>_style_two .post_slider_<?php echo esc_attr( $psrndn ); ?>_style_post_description{
						color:#8f8f8f;
						font-size: 14px;
						line-height: 24px;
						padding-top: 5px;
					}
					.post_slider_<?php echo esc_attr( $psrndn ); ?>_style_two .post_slider_<?php echo esc_attr( $psrndn ); ?>_style_post_description:before{
						content: "";
						display: block;
						border-top: 4px solid #dc005a;
						padding-bottom: 12px;
						width: 50px;
					}
				</style>

				<div class="tppost-slider-area<?php echo esc_attr( $psrndn ); ?>">
					<div id="tppost-main-slider-<?php echo esc_attr( $psrndn ); ?>" class="owl-carousel">
						<?php
						// Creating a new side loop
						while ( $tppostslider_query->have_posts() ) : $tppostslider_query->the_post();
							$catid = get_the_ID();
							$cats = get_the_category($catid);
							
							setup_postdata( $post );
							$excerpt = get_the_excerpt();
						?>
						
						<div class="post_slider_<?php echo esc_attr( $psrndn ); ?>_style_two">
							<div class="post_slider_<?php echo esc_attr( $psrndn ); ?>_style_img">
								<?php if ( has_post_thumbnail() ){ ?>
									<div class="tps-slider-thumb-style2">
									<a href="<?php the_permalink(); ?>"><?php the_post_thumbnail(); ?></a>
									</div>
								<?php } ?>
							</div>
							<h5 class="post_slider_<?php echo esc_attr( $psrndn ); ?>_style_title">
								<a href="<?php the_permalink(); ?>"><?php the_title(); ?></a>
							</h5>
							<ul class="post_slider_<?php echo esc_attr( $psrndn ); ?>_style_bar">
								<li class="post_slider_<?php echo esc_attr( $psrndn ); ?>_style_post_date">
								<i class="fa fa-calendar"></i> <?php echo get_the_date(); ?></li>
								<li class="post_slider_<?php echo esc_attr( $psrndn ); ?>_style_post_author">
								<i class="fa fa-user"></i>
								<a href="<?php echo get_author_posts_url( get_the_author_meta( 'ID' ), get_the_author_meta( 'user_nicename' ) ); ?>"><?php echo get_the_author(); ?></a></li>
							</ul>
							<?php the_excerpt(); ?>
						</div>
						<?php endwhile; wp_reset_postdata(); ?>
								
					</div>
				</div>
			<div class="clearfix"></div>
			<?php }if($post_styles=="style3"){ ?>
				<script type="text/javascript">
					jQuery(document).ready(function($) {
						$("#tppost-main-slider-<?php echo esc_attr( $psrndn ); ?>").owlCarousel({
						autoPlay: <?php echo esc_attr( $auto_play ); ?>,
						stopOnHover: true,
						items : <?php echo esc_attr( $show_items ); ?>,
						itemsDesktop : [1199,3],
						itemsDesktopSmall : [979,3],
						navigation : false,
						navigationText : ["‹","›"],
						paginationNumbers: false,
						pagination: <?php echo esc_attr( $show_pagination ); ?>,
						});
					});
				</script>
				
				<style type="text/css">
					.post_slider_<?php echo esc_attr( $psrndn ); ?>_style3{
						border: 1px solid #eee;
						padding: 20px;
						margin: 0 15px;
						position: relative;
					}
					.post_slider_<?php echo esc_attr( $psrndn ); ?>_style3:before{
						content: "";
						border-top:1px solid transparent;
						position: absolute;
						top:0;
						left:0;
						width: 100%;
						transition:all 0.3s ease-in-out 0s;
					}
					.post_slider_<?php echo esc_attr( $psrndn ); ?>_style3:hover:before{
						border-top: 1px solid #3398db;
					}
					.post_slider_<?php echo esc_attr( $psrndn ); ?>_style3:hover{
						border-top: 1px solid #3398db;
					}
					.post_slider_<?php echo esc_attr( $psrndn ); ?>_style3 .post_slider_<?php echo esc_attr( $psrndn ); ?>_style3_img > img{
						width: 100%;
						height:auto;
					}
					.post_slider_<?php echo esc_attr( $psrndn ); ?>_style3 .post_slider_<?php echo esc_attr( $psrndn ); ?>_style3_title > a{
						font-size: 20px;
						text-transform: capitalize;
						color:#333;
						transition:all 0.3s ease-in-out 0s;
						text-decoration:none;
						border-bottom:none;
						box-shadow: none;
					}
					.post_slider_<?php echo esc_attr( $psrndn ); ?>_style3 .post_slider_<?php echo esc_attr( $psrndn ); ?>_style3_title > a:hover{
						text-decoration: none;
						color:#3398db;
						text-decoration:none;
					}
					.tps-slider-thumb-style3 a img {
					  border-radius: 0;
					  box-shadow: none;
					}
					.post_slider_<?php echo esc_attr( $psrndn ); ?>_style3 .post_slider_<?php echo esc_attr( $psrndn ); ?>_style3_bars{
						padding: 0;
						list-style: none;
						overflow: hidden;
					}
					.post_slider_<?php echo esc_attr( $psrndn ); ?>_style3 .post_slider_<?php echo esc_attr( $psrndn ); ?>_style3_bars > li{
						border-right: 1px solid #999;
						display: inline-block;
						float: left;
						margin: 0;
						padding: 0 10px;
					}
					.post_slider_<?php echo esc_attr( $psrndn ); ?>_style3 .post_slider_<?php echo esc_attr( $psrndn ); ?>_style3_bars > li:first-child{
						padding: 0 10px 0 0;
					}
					.post_slider_<?php echo esc_attr( $psrndn ); ?>_style3 .post_slider_<?php echo esc_attr( $psrndn ); ?>_style3_bars > li:last-child{
						border: 0px none;
					}
					.post_slider_<?php echo esc_attr( $psrndn ); ?>_style3 .post_slider_<?php echo esc_attr( $psrndn ); ?>_style3_dates,
					.post_slider_<?php echo esc_attr( $psrndn ); ?>_style3 .post_slider_<?php echo esc_attr( $psrndn ); ?>_style3_autors,
					.post_slider_<?php echo esc_attr( $psrndn ); ?>_style3 .comment{
						color:#3398db;
						text-transform: uppercase;
						font-size: 11px;
					}
					.post_slider_<?php echo esc_attr( $psrndn ); ?>_style3 .post_slider_<?php echo esc_attr( $psrndn ); ?>_style3_autors > a,
					.post_slider_<?php echo esc_attr( $psrndn ); ?>_style3 .comment > a,
					.post_slider_<?php echo esc_attr( $psrndn ); ?>_style3 .comment > i{
						color:#999;
						transition:all 0.3s ease-in-out 0s;
					}
					.post_slider_<?php echo esc_attr( $psrndn ); ?>_style3 .post_slider_<?php echo esc_attr( $psrndn ); ?>_style3_autors > a:hover,
					.post_slider_<?php echo esc_attr( $psrndn ); ?>_style3 .comment > a:hover{
						text-decoration: none;
						color:#333;
					}
					.post_slider_<?php echo esc_attr( $psrndn ); ?>_style3 .comment > i{
						margin-right: 8px;
						font-size: 15px;
					}
					.post_slider_<?php echo esc_attr( $psrndn ); ?>_style3 .post_slider_<?php echo esc_attr( $psrndn ); ?>_style3_p_description{
						line-height: 1.7;
						color:#666;
						font-size: 13px;
						margin-bottom: 20px;
					}
					.post_slider_<?php echo esc_attr( $psrndn ); ?>_style3 .post_slider_<?php echo esc_attr( $psrndn ); ?>_style3_p_readmores{
						display: inline-block;
						padding: 10px 35px;
						background: #3398db;
						color: #ffffff;
						border-radius: 5px;
						font-size: 15px;
						font-weight: 900;
						letter-spacing: 1px;
						line-height: 20px;
						margin-bottom: 5px;
						text-transform: uppercase;
						transition:all 0.3s ease-in-out 0s;
						text-decoration:none;
					}
					.post_slider_<?php echo esc_attr( $psrndn ); ?>_style3 .post_slider_<?php echo esc_attr( $psrndn ); ?>_style3_p_readmores:hover{
						text-decoration: none;
						color:#fff;
						background: #333;
					}
					@media only screen and (max-width: 360px) {
						.post_slider_<?php echo esc_attr( $psrndn ); ?>_style3_bars > li:last-child{
							margin-top: 8px;
							padding: 0;
						}
					}
				</style>
				<div class="tppost-slider-area<?php echo esc_attr( $psrndn ); ?>">
					<div id="tppost-main-slider-<?php echo esc_attr( $psrndn ); ?>" class="owl-carousel">
						<?php
						// Creating a new side loop
						while ( $tppostslider_query->have_posts() ) : $tppostslider_query->the_post();
							$catid = get_the_ID();
							$cats = get_the_category($catid);
							setup_postdata( $post );
							$excerpt = get_the_excerpt();
						?>

						<div class="post_slider_<?php echo esc_attr( $psrndn ); ?>_style3">
							<div class="post_slider_<?php echo esc_attr( $psrndn ); ?>_style3_img">
								<?php if ( has_post_thumbnail() ) { ?>
									<div class="tps-slider-thumb-style3">
									<a href="<?php the_permalink(); ?>"><?php the_post_thumbnail(); ?></a>
									</div>
								<?php } ?>
							</div>
							<h5 class="post_slider_<?php echo esc_attr( $psrndn ); ?>_style3_title"><a href="<?php the_permalink(); ?>"><?php the_title(); ?></a></h5>
							<ul class="post_slider_<?php echo esc_attr( $psrndn ); ?>_style3_bars">
								<li class="post_slider_<?php echo esc_attr( $psrndn ); ?>_style3_dates"><?php echo get_the_date(); ?></li>
								<li class="post_slider_<?php echo esc_attr( $psrndn ); ?>_style3_autors"><a href="<?php echo get_author_posts_url( get_the_author_meta( 'ID' ), get_the_author_meta( 'user_nicename' ) ); ?>"><?php echo get_the_author(); ?></a></li>
							</ul><?php the_excerpt(); ?>
							<a href="<?php the_permalink(); ?>" class="post_slider_<?php echo esc_attr( $psrndn ); ?>_style3_p_readmores">more</a>
						</div>

						<?php endwhile; wp_reset_postdata(); ?>
								
					</div>
				</div>
				<div class="clearfix"></div>
			<?php
		}
	}
	add_shortcode('tppostslider', 'tppost_slider_register_shortcode');