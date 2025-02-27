<?php
$teams = carbon_get_post_meta( get_the_ID(), 'team_items' );
$team_hover_image = carbon_get_post_meta( get_the_ID(), 'team_hover_image_all' ); 
$team_use_arrow = carbon_get_post_meta( get_the_ID(), 'team_use_arrow' );
$team_use_pagination = carbon_get_post_meta( get_the_ID(), 'team_use_pagination' );

wp_enqueue_style( 'ta-team-awesome-swiper', plugin_dir_url(__DIR__ ) . 'css/swiper.css', array(), '', 'all' );
wp_enqueue_style( 'ta-team-awesome-hovers', plugin_dir_url(__DIR__ ) . 'css/hovers.css', array(), '', 'all' ); ?>

<div id="style-enam" class="team-content main-container team-post-<?php echo esc_attr(get_the_ID()); ?> style-enam has-card">
	<div class="swiper-container<?php if($team_use_pagination == true) { ?> has-pagination<?php } ?>">
		<div class="swiper-wrapper">
			<?php 
			foreach ( $teams as $team ) {
			$team_items_socials = $team['team_items_socials']; ?>
			<div class="swiper-slide team-block-item">
				<div class="item-wrap">
					<figure class="<?php if(!empty($team_hover_image)) { echo esc_attr($team_hover_image); } else { ?>imghvr-reveal-down<?php } ?>">
						<?php echo wp_get_attachment_image( $team['team_item_img'], 'full' ); ?>
						<figcaption>
							<div class="caption-inside">
								<ul class="socials">
									<?php 
									foreach ($team_items_socials as $team_items_social) {
										if(!empty($team_items_social['team_item_social_link'])) {
											$icon = "";
											if (!empty($team_items_social['team_item_social_icon']))
											{
												$icon = $team_items_social['team_item_social_icon']['class'];
											} ?>
									<li class="social-item">
										<a href="<?php echo esc_url($team_items_social['team_item_social_link']); ?>" class="link-social">
											<i class="icon6 <?php echo esc_attr($icon); ?>"></i>
										</a>
									</li>
									<?php }
									} ?>
								</ul>
							</div>
						</figcaption>
					</figure>

					<div class="teamy__content">
						<?php team_title_view($team['team_item_name']); ?>
						<?php team_job_view($team['team_job']); ?>
					</div>
				</div>
			</div>
			<?php } ?>
		</div>
	    <div class="swiper-pagination"></div>
	    <?php if($team_use_arrow == true) { ?>
	    <!-- Add Arrows -->
	    <div class="swiper-button-next"></div>
	    <div class="swiper-button-prev"></div>
	    <?php } ?>
	</div>
</div>

<?php wp_enqueue_script( 'ta-team-awesome-swiper-min', plugin_dir_url(__DIR__ ) . 'js/swiper.min.js', array( 'jquery' ), '', false ); ?>

<?php team_style_script(get_the_ID()); ?>