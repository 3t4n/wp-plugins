<?php
/**
 * Template Name: Service Single Page
 *
 * @link https://codex.wordpress.org/Template_Hierarchy
 *
 * @package htservice
 */

get_header();?>
<div class="page-wrapper clear">
	<?php
		while ( have_posts() ) : the_post();
			$relatedtitle = htservice_get_option( 'htservice_posts_related_title', 'settings' );
			$htservice_featured_image_show = htservice_get_option( 'htservice_featured_image_show', 'settings' );
			$htservice_title_show = htservice_get_option( 'htservice_title_show', 'settings' );
			$htservice_related_service_show = htservice_get_option( 'htservice_related_service_show', 'settings' );
			$htservice_related_service_style = htservice_get_option( 'htservice_related_service_style', 'settings' );
	?>
		<!-- Service Details Area Start -->
		<div class="ht-service-detals-area">
			<div class="container">
				<div class="ht-service-detals-content">
					<?php if($htservice_featured_image_show =='yes'){?>
					<div class="ht-servie-details-image">
						<?php the_post_thumbnail(); ?>
					</div> 
					<?php } 

					 if($htservice_title_show =='yes'){?> 
					<h3>
                        <?php the_title();?>
                    </h3>
                    <?php } ?>
					<div class="ht-service-details-content">
	                    <?php the_content(); ?>
	                </div> 
				</div>
			</div>
		</div>
		<!-- Service Details Area End -->
		<!-- Related Service Area Start -->
		<?php
          
		$related = array(
		    'post_type'  => 'htservice',
		    'post__not_in' =>array(get_the_ID()),
		    'posts_per_page' =>-1,
		);
		$relatedd = new WP_Query($related);

		if($htservice_related_service_show =='yes' && !empty( $relatedd )){
		?>
		<div class="related-area-ht-service">
			<div class="container">
				<?php if(!empty($relatedtitle)){?>
					<div class="htrelated-title">
						<h3><?php echo esc_html($relatedtitle);?> </h3>
					</div>
				<?php } ?>
                <div class="related-service-active indicator-style-two">
					<?php
                        while($relatedd->have_posts()): $relatedd->the_post();
                            $short_des = get_post_meta( get_the_ID(),'_htservice_service_short_des', true ); 
                            $service_icon = get_post_meta( get_the_ID(),'_htservice_service_icon', true ); 
                            $service_icon_img = get_post_meta( get_the_ID(),'_htservice_service_icon_img', true ); 
                    	?>
                    	<div class="<?php echo esc_attr( $htservice_related_service_style ) ?>">
							<div class="ht-service-box">
								<div class="ht-service-image">
									<?php 
									if( $htservice_related_service_style =='ht_service_style2' && !empty( $service_icon_img )){ ?>
										<img src="<?php echo esc_attr( $service_icon_img ); ?>" alt="<?php echo esc_attr( the_title() ); ?>">
										<?php
										}elseif ( $htservice_related_service_style =='ht_service_style2 ht_hover_box' && !empty( $service_icon )) { ?>
											<i class="<?php echo esc_attr( $service_icon ); ?>"></i>
											<?php
										}else{
									the_post_thumbnail('htservice_img550x348'); }?>
								</div>
								<div class="ht-service-content">
									<h3><a href="<?php the_permalink(); ?>"><?php the_title();?></a></h3>
									<p><?php echo esc_html( $short_des ); ?></p>
								</div>
							</div>
						</div>


                    <?php endwhile; ?>
                </div>
            </div>
		</div>
		<!-- Related Service Area End -->
	<?php
}
		endwhile; // End of the loop.
	?>
</div><!-- #primary -->
<?php
get_footer();