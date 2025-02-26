<?php
/**
 * Ajax callback function for storing the 3veta booking domain name
 */
function veta_save_booking_page_name() {
	check_ajax_referer( 'craZy_wOrld', 'security' );
	if ( ! current_user_can( 'manage_options' ) ) {
		echo json_encode( [
			'status'  => 0,
			'message' => __( 'Access denied', '3veta' )
		], JSON_NUMERIC_CHECK );
	}

	if ( empty( $_POST['url'] ) ) {
		echo json_encode( [
			'status'  => 0,
			'message' => __( 'Please fill the your booking page URL.', '3veta' )
		], JSON_NUMERIC_CHECK );
	}

	$url = esc_url_raw( $_POST['url'] . '.3veta.com/booking', [ 'https', 'http' ] );

	$status = update_option( '3veta_booking_page', $url );
	if ( ! $status ) {
		$message = __( 'There was a problem, please try again', '3veta' );
		$status  = 0;
	} else {
		$message = __( 'Saved!', '3veta' );
		$status  = 1;
	}

	echo json_encode( [
		'status'  => $status,
		'message' => $message
	], JSON_NUMERIC_CHECK );
	wp_die();
}

add_action( 'wp_ajax_veta_save_booking_page', 'veta_save_booking_page_name' );

/**
 * Checks if the current page's content has the full page shortcode for 3veta and adds a loader for the time the iframe is loaded
 *
 * @param string $content
 *
 * @return mixed|string
 */
function veta_add_loader_for_full_page_iframe( $content ) {

	if ( strpos( $content, '[3veta type="full"]' ) !== false || strpos( $content, "[3veta type='full']" ) !== false ) {

		$initial_loader = '<div class="veta-page-loader-mask"><div class="veta-page-loader"></div></div>';

		$style = '<style>
			html {
			    overflow: hidden !important;
			}
			.veta-page-loader-mask {
			  position:fixed;
              top:0;
              left:0;
              bottom:0;
              right:0;
              width:100% !important;
              height:100% !important;
              margin: 0 !important;
		      padding: 0 !important;
		      max-width: 100% !important;
			  max-height: 100% !important;
              overflow:hidden;
              z-index:999999;
              display: flex;
              justify-content: center;
              align-items: center;
              background:rgb(255, 255, 255);
			}
			.veta-page-loader {
			  background-color: #9c27b0;
			  display: inline-block;
			  width: 2rem;
			  height: 2rem;
			  border-radius: 50%;
			  opacity: 0;
			  -webkit-animation: spinner-grow .75s linear infinite;
			  animation: spinner-grow .75s linear infinite;
			}
			@-webkit-keyframes spinner-grow{
				0%{-webkit-transform:scale(0);transform:scale(0)}
				50%{opacity:1;-webkit-transform:none;transform:none}
			}
			@keyframes spinner-grow{
				0%{-webkit-transform:scale(0);transform:scale(0)}
				50%{opacity:1;-webkit-transform:none;transform:none}
			}</style> ';

		return $style . $initial_loader . $content;
	}

	return $content;
}

add_filter( 'the_content', 'veta_add_loader_for_full_page_iframe', 1, 10 );
