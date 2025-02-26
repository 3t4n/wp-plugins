<?php 

//kein zugriff bei direktem Aufruf
if ( !defined( 'ABSPATH' ) ) {
	exit;

}
add_shortcode( 'aa_rating', 'aa_rating_display' );

function aa_rating_display( $atts, $content = null ) {

	ob_start();

	$post_id = $atts['id'];

	//Bildberechnung für optimale div Höhe

	$image = esc_html( get_post_meta( $post_id, 'aa_rating_image', true ) );

	$image_info 	= getimagesize( $image );
	$image_width 	= $image_info[0];
	$image_height	= $image_info[1];

	$factor = $image_height / $image_width;

	$image_height = round( $factor * 200, 0 );

	if ( $image_width >= 200 ) {
		$image_width = 200;
		$image_height = $image_width * $factor;
	}


	?>

	<?php

	//prüfen, ob Bewertung veröffentlicht wurde. Wenn nicht abbrechen. 
	if ( get_post_status( $post_id ) != publish ) {
		return;
	}

	?>
	<div class="rating-container">
		<div class="top">
			<!-- Rating Title -->
			<div class="rating-title-bg">
				<div class="rating-title">
					<?php
						echo esc_html( get_post_meta( $post_id, 'aa_rating_title', true ) );
					?>
				</div>
			</div>
		</div>

		<div class="middle">

			<!-- Rating Image --> 
			<div class="rating-image">
				<a href="<?php echo esc_html( get_post_meta( $post_id, 'aa_rating_button_link', true ) ); ?>">
					<img class="rating-img" src="<?php echo $image; ?>">
				</a>
			</div>

			<!-- Rating Pro and Contra -->
			<div class="rating-arguments">
				<!-- Rating Pro --> 
				<div class="rating-pro">
					<div class="pro-heading"><?php echo __( 'Pro', 'affiliate-rating-for-amazon' ) ?></div>
					<ul>
						<?php 
							$complete = explode( "\n", esc_html( get_post_meta( $post_id, 'aa_rating_pro', true ) ) );
							foreach( $complete as $single ) {
								if( trim( $single ) == '' ) continue;
								echo '<li>' . $single . '</li>';
							}
						?>
					</ul>
				</div>

				<!-- Rating Contra -->
				<div class="rating-contra">
					<div class="contra-heading"><?php echo __( 'Contra', 'affiliate-rating-for-amazon' ); ?></div>
					<ul>
						<?php 
							$complete = explode( "\n", esc_html( get_post_meta( $post_id, 'aa_rating_contra', true ) ) );
							foreach( $complete as $single ) {
								if( trim( $single ) == '' ) continue;
								echo '<li>' . $single . '</li>';
							}
						?>
					</ul>
				</div>
			</div>
		</div>
		<div class="review">
			<div class="rating-result"> <?php echo __( 'Review: ', 'affiliate-rating-for-amazon' ) ?></div>
				<?php echo get_post_meta( $post_id, 'aa_rating_review', true ); ?>
		</div>

		<!-- Bewerung -->
		<?php 
			$percent = (float) get_post_meta( $post_id, 'aa_rating_percent', true );
			//umrechnung % in Sterne
			$stars = round( $percent / 10 / 2, 1);
			//volle Sterne
			$stars_full = floor ( $stars );
			//halbe Sterne
			$stars_half = round( ( $stars - $stars_full ), 0 );
			//leere Sterne
			$stars_empty = 5 - $stars_full - $stars_half;

			if ( get_post_meta( $post_id, 'aa_rating_stars_check', true) === null ) {

		?>
			<!-- Balken Bewertung -->
			<div class="bottom">
				<div class="rating-result"> <?php echo __( 'Result: ', 'affiliate-rating-for-amazon' ) ?></div>
				<div class="rating-percent-number"> <?php echo $percent; ?>%</div>
				<div class="rating-percent">
					<div class="rating-bar-bg">
						<div class="rating-bar" style="width: <?php echo $percent; ?>%"></div>
					</div>
				</div>

				<!-- Button Link -->
				<div class="rating-button-text">
					<a target="_blank" href="<?php echo get_post_meta( $post_id, 'aa_rating_button_link', true ); ?>" class="button-btn1" id="button-btn1-<?php echo $post_id; ?>"> 
						<?php echo get_post_meta( $post_id, 'aa_rating_button_text', true ); ?>
					</a>
				</div>

			</div>
			<?php
			}
			else {
			?>

			<!-- Sterne Bewertung -->
			<div class="bottom">
				<div class="rating-result"> <?php echo __( 'Result: ', 'affiliate-rating-for-amazon' ) ?></div>
				<div class="star-rating" title="<?php echo $stars . __( ' of 5 stars', 'aa_rating_image' ); ?>">
				<?php
					//volle Sterne
					for ( $i = 1; $i <= $stars_full; $i++ )
					{
						?>
						<div class="star star-full"></div>
						<?php 
					}

					//halbe Sterne
					for ( $i = 1; $i <= $stars_half; $i++ )
					{
						?>
						<div class="star star-half"></div>
						<?php 
					}

					//leere Sterne
					for ( $i = 1; $i <= $stars_empty; $i++ )
					{
						?>
						<div class="star star-empty"></div>
						<?php 
					}
				?>
				</div>

				<!-- Button Link -->
				<div class="rating-button-text">
					<a target="_blank" href="<?php echo get_post_meta( $post_id, 'aa_rating_button_link', true ); ?>" class="button-btn1" id="button-btn1-<?php echo $post_id; ?>"> 
						<?php echo get_post_meta( $post_id, 'aa_rating_button_text', true ); ?>
					</a>
				</div>

			</div>

			<?php
			}
			?>

	</div>
	<?php

$output = ob_get_clean();
return $output;

}
