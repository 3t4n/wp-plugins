<div class="agent-box-card grey">
	<div class="image-content">
		<div class="image image-fill">
			<?php do_action( 'rem_agent_picture', $author_id ); ?>
		</div>						
	</div>
	<div class="info-agent">
		<span class="name">
			<?php echo get_user_meta( $author_id, 'first_name', true ); ?>
			<?php echo get_user_meta( $author_id, 'last_name', true ); ?>									
		</span>
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
			<li><a class="icon" href="<?php echo esc_url( get_author_posts_url( $author_id ) ); ?>"><i class="fa fa-info-circle"></i></a></li>
		</ul>
	</div>
</div>

<div class="contact-agent">
	<form method="post" id="contact-agent" action="" data-ajaxurl="<?php echo admin_url( 'admin-ajax.php' ); ?>" role="form" data-toggle="validator">
		<div class="form-group">
			<input type="hidden" name="agent_id" value="<?php echo $author_id; ?>">
			<input type="hidden" name="action" value="rem_contact_agent">
			<input type="hidden" name="property_id" value="<?php global $post; echo $post->ID; ?>">
			<input type="text" placeholder="Your Name *" class="form-control" name="client_name" id="name" required>
		</div>
		<div class="form-group">
			<input type="email" placeholder="Your Email *" class="form-control" name="client_email" id="email" required>
		</div>
		<div class="form-group">
			<textarea placeholder="Message *" rows="5" class="form-control" name="client_msg" id="text-message" required></textarea>
		</div> 
		<button class="btn btn-default" type="submit">Send Message</button>
	</form>
	<br>
	<div class="alert with-icon alert-info sending-email" style="display:none;" role="alert">
		<i class="icon fa fa-info"></i>
		<span class="msg"><?php _e( 'Sending Email, Please Wait...', 'wcp-rem' ); ?></span>
	</div>			
</div>