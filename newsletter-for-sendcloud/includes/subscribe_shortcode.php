<?php
if ( ! defined( 'ABSPATH' ) ) {
	exit; // Exit if accessed directly.
}

if ( ! function_exists( 'subscribe_shortcode' ) ) {
	function subscribe_shortcode( $atts = [], $content = null ) {
		$body = '<div class="subscribe-shortcode">';
		if ( $content ) {
			$body .= '<h4>' . $content . '</h4>';
		}
		if ( isset( $_POST['subscribe_newsletter_submit_shortcode'] ) ) {
			$body .= '<p class="success">' . __( 'Subscribe success!', 'newsletter-for-sendcloud' ) . '</p>';
		} else {
			$body .= '<form class="subscribe-form" method="post">
			<p>
				<label>' . __( 'Name', 'newsletter-for-sendcloud' ) . '</label>
				<input type="text" name="subscribe_newsletter_name" placeholder="' . __( 'Name', 'newsletter-for-sendcloud' ) . '">
			</p>
			<p>
				<label>' . __( 'Email', 'newsletter-for-sendcloud' ) . '</label>
				<input type="email" name="subscribe_newsletter_email" placeholder="' . __( 'Email', 'newsletter-for-sendcloud' ) . '">
			</p>
			<button type="submit"
					name="subscribe_newsletter_submit_shortcode">' . __( 'Subscribe', 'newsletter-for-sendcloud' ) . '</button>
		</form>';
		}
		$body .= '</div>';

		return $body;
	}
}

add_shortcode( 'subscribe', 'subscribe_shortcode' );


