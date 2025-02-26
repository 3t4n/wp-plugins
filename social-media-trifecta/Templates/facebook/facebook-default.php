
	<div id="main-facbook-wrapper">
		<div class="center">
			<span class=" fa fa-facebook"></span>
			<span class="text-holder"> <?php echo __( 'Facebook', 'social-meida-trifecta' ) ?></span>
		</div>
		<div id="triefecta-facebook-holder-default">
			<?php
			foreach ( $facebook_data->data as $data ) {

				$message               = $data->message;
				$image_link            = $data->full_picture;
				$link_to_facebook_post = $data->link;
				$creat_time            = $data->created_time;
				$fb_post_id            = $data->id;
				$message               = preg_replace( '/#(\w+)/', ' <a target="_blank" href="https://www.facebook.com/hashtag/$1">#$1</a>', $message );//convert #to links in facebook

				?>
				<div class="fb-message-wrapper-default">

					<?php echo apply_filters( 'the_content', $message ); ?>
					<?php if ( strpos( $link_to_facebook_post, 'videos' ) !== false ) {
						$class = "videos";
					} else {
						$class = 'img';
					}

					?>

				</div>
				<?php


			}
			?>
		</div>
		<?php if ( $shortcode_elements[ 'show_scroll_bar' ] == 'false' ) { ?>
			<div id="facebook-scroll-holder">
				<a id="facebook-scroll-up" href="javascript:void(0) "><span class="fa fa-angle-up"> </span>   </a>
				<a id="facebook-scroll-down" href="javascript:void(0) "><span class="fa fa-angle-down"></span></a>
			</div>
		<?php } ?>


	</div>
<?php

