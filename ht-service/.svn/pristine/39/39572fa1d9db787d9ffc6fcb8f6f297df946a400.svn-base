<?php
/**
 * Template Name: Service Single Page
 *
 * @link https://codex.wordpress.org/Template_Hierarchy
 *
 * @package htservice
 */

get_header();

?>

<div class="page-wrapper clear htservice-details">
	<div class="container">
		<div class="row">
			<?php
				if ( have_posts() ) : 
                        while( have_posts() ):the_post();
                            $short_des = get_post_meta( get_the_ID(),'_htservice_service_short_des', true ); 
                            $service_icon = get_post_meta( get_the_ID(),'_htservice_service_icon', true ); 
                            $service_icon_img = get_post_meta( get_the_ID(),'_htservice_service_icon_img', true ); 
                            $htservice_related_service_style = htservice_get_option( 'htservice_related_service_style', 'settings' );
                    	?>
                    	<div class="col-md-4">
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
                        </div>
                    <?php endwhile; ?>
                    <!-- Pagination -->
					<div class="col-md-12">
						<div class="ht-service-pagination">
							<?php  htservice_pagination();?>
						</div>
					</div>
				<?php endif; ?>
        </div>
	</div>
</div>

<?php

get_footer();