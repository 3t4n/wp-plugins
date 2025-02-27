<?php

	
function wp_disclaimer_popup_function() {

	$enable = rwmb_meta( 'wpdp_enable_disclaimer', array( 'object_type' => 'setting' ), 'wpdp_settings' );
	$postID = rwmb_meta( 'wpdp_post', array( 'object_type' => 'setting' ), 'wpdp_settings' );
	$expire = rwmb_meta( 'wpdp_cookie_expiration', array( 'object_type' => 'setting' ), 'wpdp_settings' );
	$agreeText = rwmb_meta( 'wpdp_agree_text', array( 'object_type' => 'setting' ), 'wpdp_settings' );
	$deplineText = rwmb_meta( 'wpdp_decline_text', array( 'object_type' => 'setting' ), 'wpdp_settings' );
	$deplineUrl = rwmb_meta( 'wpdp_decline_url', array( 'object_type' => 'setting' ), 'wpdp_settings' );

	$alto = rwmb_meta( 'wpdp_alig', array( 'object_type' => 'setting' ), 'wpdp_settings' );

	?>
	<script>var alignTop = "<?php echo $alto; ?>";</script>
	<?php


	if ( $enable ) {

		global $post;
		$disable_single = rwmb_get_value( 'wpdp_disable_single', '', $post->ID ); // check for single disabling popup

		// WP_Query arguments
		$args = array(
			'post_type' => array( 'wp-disclaimer-popup' ),
			'p'	=>	$postID,
		);
	
		// The Query
		$query = new WP_Query( $args );
	
		// The Loop
		if ( $query->have_posts() && !$disable_single ) {
			while ( $query->have_posts() ) {
				$query->the_post();
				// do something
				echo '<div id="wp-disclaimer-popup" class="wpdp-white-popup mfp-hide">';
					include_once ( plugin_dir_path( __FILE__ ) . 'template/modal-base.php' );
				echo '</div>';
			}
		} else {
			// no posts found
		}
	
		// Restore original Post Data
		wp_reset_postdata();

	} else {

		global $post;

		$enable_single = rwmb_get_value( 'wpdp_enable_single', '', $post->ID );
		$popup_single = rwmb_get_value( 'wpdp_disclaimer_select', '', $post->ID );


		if ( $enable_single ) {

			// WP_Query arguments
			$args = array(
				'post_type' => array( 'wp-disclaimer-popup' ),
				'p'	=>	$popup_single,
			);
		
			// The Query
			$query = new WP_Query( $args );

			// The Loop
			if ( $query->have_posts() ) {
				while ( $query->have_posts() ) {
					$query->the_post();
					// do something
					echo '<div id="wp-disclaimer-popup" class="wpdp-white-popup mfp-hide">';
						include_once ( plugin_dir_path( __FILE__ ) . 'template/modal-base.php' );
					echo '</div>';
				}
			} else {
				// no posts found
			}
		
			// Restore original Post Data
			wp_reset_postdata();

		}
		

	}

   
}
add_action( 'wp_footer', 'wp_disclaimer_popup_function' );	
