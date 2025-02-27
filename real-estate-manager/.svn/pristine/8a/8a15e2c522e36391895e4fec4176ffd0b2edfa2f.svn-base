<?php get_header();
    global $wp_query;
    $curauth = $wp_query->get_queried_object();
    $author_info = $curauth;
    $author_id = $curauth->ID;
?>
<section id="rem-agent-page" class="ich-settings-main-wrap">
	<div class="">
		<div class="row">				

			<div class="col-sm-12 col-md-12">
				<div class="row">
					<div class="col-sm-4 col-md-4">
						<!-- . Agent Box -->
						<div class="agent-box-card grey">
							<div class="image-content">
								<div class="image image-fill">
									<?php do_action( 'rem_agent_picture', $author_id ); ?>
								</div>						
							</div>
							<div class="info-agent">
								<div class="text text-center">
									<i class="fa fa-quote-left"></i>
										<?php echo get_user_meta( $author_id, 'rem_user_tagline', true ); ?>
									<i class="fa fa-quote-right"></i>
								</div>
								<ul class="contact">
									<li><a class="icon" href="<?php echo get_user_meta( $author_id, 'rem_facebook_url', true ); ?>"><i class="fa fa-facebook"></i></a></li>
									<li><a class="icon" href="<?php echo get_user_meta( $author_id, 'rem_twitter_url', true ); ?>"><i class="fa fa-google-plus"></i></a></li>
									<li><a class="icon" href="<?php echo get_user_meta( $author_id, 'rem_googleplus_url', true ); ?>"><i class="fa fa-twitter"></i></a></li>
									<li><a class="icon" href="<?php echo get_user_meta( $author_id, 'rem_linkedin_url', true ); ?>"><i class="fa fa-linkedin"></i></a></li>
									<li><a class="icon" href="<?php echo get_author_posts_url( $author_id ); ?>"><i class="fa fa-info-circle"></i></a></li>
								</ul>
							</div>
						</div>

						<div class="skill-box">
							<?php
								$author_skills = get_user_meta( $author_id, 'rem_user_skills', true );
								$allskills = explode(PHP_EOL, $author_skills);
								if (is_array($allskills)) {
									foreach ($allskills as $skill) {
										$single_skill = explode(',', $skill);
										if (isset($single_skill[0]) && isset($single_skill[1])) {
												?>
												<div class="skillbar" data-percent="<?php echo trim($single_skill[1]); ?>%">
													<div class="skillbar-title"><span><?php echo $single_skill[0]; ?></span></div>
													<div class="skillbar-bar"></div>
													<div class="skill-bar-percent"><?php echo trim($single_skill[1]); ?>%</div>
												</div>
										<?php }
										
									}
								}
							?>
						</div>

					</div>				
					<div class="col-sm-8 col-md-8">
						<div class="section-title line-style no-margin">
							<h1 class="name title">
								<?php echo get_user_meta( $author_id, 'first_name', true ); ?>
								<?php echo get_user_meta( $author_id, 'last_name', true ); ?>
							</h1>
						</div>
						<span class="text">
							<?php echo get_user_meta( $author_id, 'description', true ); ?>
						</span>
						<hr>
						<form class="form-contact" method="post" action="" id="contact-agent" role="form" data-toggle="validator" data-ajaxurl="<?php echo admin_url( 'admin-ajax.php' ); ?>">
							<div class="row">
								<div class="col-md-6 col-sm-12">
									<input type="hidden" name="agent_id" value="<?php echo $author_id; ?>">
									<input type="hidden" name="action" value="rem_contact_agent">				
									<input name="client_name" id="name" type="text" class="form-control" placeholder="Name *" required>
								</div>
								<div class="col-md-6 col-sm-12">
									<input type="email" class="form-control" name="client_email" id="email" placeholder="Email *" required>
								</div>
								<div class="col-md-12 col-sm-12">
									<input name="subject" id="subject" type="text" class="form-control" placeholder="Subject *">
								</div>
								<div class="col-md-12 col-sm-12">
									<textarea name="client_msg" id="text-message" class="form-control text-form" placeholder="Your message *" required></textarea>
								</div>
								<div class="col-md-12 col-sm-12">
									<button type="submit" class="btn btn-default btn-lg"><span class=""></span> SEND MESSAGE</button>
								</div>
							</div><!-- /.row -->
						</form><!-- /.form -->	
						<br>
						<div class="alert with-icon alert-info sending-email" style="display:none;" role="alert">
							<i class="icon fa fa-info"></i>
							<span class="msg"><?php _e( 'Sending Email, Please Wait...', 'landz' ); ?></span>
						</div>								
					</div><!-- /.col-md-8 -->
				</div>

			</div>

			<?php if(0){ ?>
				<div class="col-sm-4 col-md-3">
					<?php if ( is_active_sidebar( 'agent-sidebar' )  ) : ?>
						<aside id="secondary" class="sidebar widget-area" role="complementary">
							<?php dynamic_sidebar( 'agent-sidebar' ); ?>
						</aside>
					<?php endif; ?>						
				</div>
			<?php } ?>					
		</div>

		<?php 
		$property_args = array(
			'posts_per_page' => 10,
			'post_type' => 'rem_property',
			'author' => $author_id,
		);
		$the_query = new WP_Query( $property_args ); ?>

		<?php if ( $the_query->have_posts() ) : ?>
			<div class="section-title line-style no-margin">
				<h3 class="title"><?php _e( 'My Properties', 'wcp-rem' ); ?></h3>
			</div>

			<div class="my-property" data-navigation=".my-property-nav">
				<div class="crsl-wrap">

				<?php while ( $the_query->have_posts() ) : $the_query->the_post(); ?>
					<figure class="crsl-item">
						<?php do_action('rem_property_box', $post->ID, 3) ?>
					</figure>

				<?php endwhile; ?>

				</div>
				<div class="my-property-nav">
					<p class="button-container">
						<a href="#" class="next">next</a>
						<a href="#" class="previous">previous</a>
					</p>
				</div>

			</div><!-- /.my-property slide -->

			<?php wp_reset_postdata(); ?>

		<?php else : ?>
			
		<?php endif; ?>



	</div><!-- ./container -->
</section>
<?php get_footer(); ?>