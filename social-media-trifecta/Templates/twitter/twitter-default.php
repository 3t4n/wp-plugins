<div id="smt-twitter-main-wrapper">
	<div class="center">
		<span class=" fa fa-twitter"></span>
		<span class="text-holder"> <?php echo __( 'Twitter', 'social-meida-trifecta' ) ?></span>
	</div>
	<div id="smt-twitter-inner-wrapper">
		<?php

		foreach ( $twitter_data as $tweet ) {
			$tweet_raw          = $tweet[ 'text' ];//Containts the message
			$user_profile_image = $tweet[ 'user' ][ 'profile_image_url_https' ];
			$tweet_created_date = $tweet[ 'created_at' ];


			if ( strpos( $tweet_raw, 'RT ' ) !== false ) {
				$tweet_raw=str_replace('RT','<span class="fa-exchange fa"></span>',$tweet_raw);
				$retweet       = true;
				$retweet_class = 'retweet';
			} else {
				$retweet       = false;
				$retweet_class = '';
			}

			$tweet_finalized = $this->autolink( $tweet_raw );
			$tweeted_date = $this->get_tweet_date( $tweet );
			?>
			<div class="smt-twitter-item-wrapper clearfix <?php echo( $retweet ? $retweet_class : '' ) ?>">
				<figure class="smt-user-profile-img-wrapper"><img src="<?php echo $user_profile_image ?>"/></figure>
				<div class="smt-twitter-description-wrapper ">
					<div class="smt-twitter-message-wrapper"><?php echo $tweet_finalized; ?></div>
					<div class="smt-twitter-date-wrapper"><?php echo $tweeted_date; ?></div>
				</div>
			</div>
			<?php
		}
		?>


	</div>
</div>

