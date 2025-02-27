<?php
$teams = carbon_get_post_meta( get_the_ID(), 'team_items' );
$team_style_choice_grid_col = carbon_get_post_meta( get_the_ID(), 'team_style_choice_grid_col' );

wp_enqueue_style( 'ta-team-awesome-hovers', plugin_dir_url(__DIR__ ) . 'css/hovers.css', array(), '', 'all' ); ?>

<div id="style-enam" class="team-post-<?php echo esc_attr(get_the_ID()); ?> team-content main-container grid grid-cols-12 style-enam">
	<?php 
	$team_anzim = 0;
	foreach ( $teams as $team ) {
		$team_anzim++;

	$team_hover_image = $team['team_hover_image'];
	$team_items_socials = $team['team_items_socials'];
	$team_6_hover_color = $team['team_6_hover_color']; ?>
	<style>.style-enam .team-count-<?php echo esc_attr($team_anzim); ?> [class^='imghvr-'] figcaption:after, .style-enam .team-count-<?php echo esc_attr($team_anzim); ?> [class*=' imghvr-'] figcaption:after { background-color: <?php echo esc_attr($team_6_hover_color); ?> }</style>
	<div class="team-block-item<?php if(!empty($team_style_choice_grid_col)) { ?> col-span-<?php echo esc_attr($team_style_choice_grid_col); ?><?php } else { ?> col-span-4<?php } ?> team-count-<?php echo esc_attr($team_anzim); ?> sm:col-span-12">
		<div class="item-wrap">
			
			<figure class="<?php if(!empty($team_hover_image)) { echo esc_attr($team_hover_image); } else { ?>imghvr-reveal-down<?php } ?>">
				<?php echo wp_get_attachment_image( $team['team_item_img'], 'full' ); ?>
				<figcaption style="background-image: url();">
					<div class="caption-inside">
						<div class="teamy__content">
							<?php team_title_view($team['team_item_name']); ?>
							<?php team_job_view($team['team_job']); ?>
						</div>
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
		</div>
	</div>
	<?php } ?>
</div>