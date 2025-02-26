<?php
$message_board   = get_field( 'custom_message_ticker' );

if($message_board){ ?>

	<div class="wpscr_newsfeed" style="<?php echo esc_html( $bottom_styles ); ?>">

		<ul class="newsfeed-slider wpscr_newsfeed-slider owl-carousel owl-theme">
			
			<?php foreach($message_board as $mt_board){
				if(empty($mt_board['mt_hide'])){

					if (!empty( $mt_board['mt_image'] ) ) {
						$mt_image = wp_get_attachment_image_url($mt_board['mt_image']['ID']); 	
					}else{
						$mt_image ="";
					}
					?>

					<li class="item messageTicker">

						<?php if($logo_position == 'left' || $logo_position == "left_right") {												
							if($mt_image){	?>
								<img src="<?php echo esc_url( $mt_image ); ?>" class="wpscr_imgLeft" alt="<?php _e( $mt_board['mt_message'], 'wpscreens' ); ?>">
							<?php } 
						} 

						if($mt_board['mt_message']){ ?>

							<p class="text"><?php echo $mt_board['mt_message']; ?></p>

						<?php } 

						if($logo_position == 'right' || $logo_position == "left_right") {														
							if($mt_image){	?>

								<img src="<?php echo esc_url( $mt_image ); ?>" class="wpscr_imgRight" alt="<?php _e( $mt_board['mt_message'], 'wpscreens' ); ?>">

							<?php } 
						} ?>
					</li>
				<?php } 
			} ?>
			
		</ul>
	</div>
	<?php } ?>