<?php
$email = __( 'johny@example.com', 'customer-email-verification-for-woocommerce' );
$Try_again = __( 'Try Again', 'customer-email-verification-for-woocommerce' );

$cev_verification_widget_style = new cev_verification_widget_message();
$cev_button_color_widget_header =  get_option( 'cev_button_color_widget_header', '#212121' );
$cev_button_text_color_widget_header =  get_option( 'cev_button_text_color_widget_header', '#ffffff' );
$cev_button_text_size_widget_header =  get_option( 'cev_button_text_size_widget_header', '14' );
$cev_widget_header_image_width =  get_option( 'cev_widget_header_image_width', '150' );
$cev_button_text_header_font_size = get_option( 'cev_button_text_header_font_size', '22' );	
?>

<div class="cev-authorization-grid__visual">
	<div class="cev-authorization-grid__holder">
		<div class="cev-authorization-grid__inner">
			<div class="cev-authorization" style="background: <?php esc_html_e( get_option( 'cev_verification_popup_background_color', $cev_verification_widget_style->defaults['cev_verification_popup_background_color'] ) ); ?>;">				
				<form class="cev_pin_verification_form" method="post">    
					<section class="cev-authorization__holder">
						<div class="popup_image" style="width:<?php esc_html_e( $cev_widget_header_image_width ); ?>px;">	                                 
							<?php 
							$image = get_option( 'cev_verification_image', woo_customer_email_verification()->plugin_dir_url() . 'assets/css/images/email-verification-icon.svg' );
							if ( !empty( $image ) ) {
								?>
								<img src="<?php echo esc_url( $image ); ?>">
							<?php } ?>
						</div>
						<div class="cev-authorization__heading">
							<span class="cev-authorization__title" style="font-size: <?php esc_html_e( $cev_button_text_header_font_size ); ?>px;">
								<?php 
								$cev_verification_widget_message = new cev_verification_widget_message();
								$heading_default = __( 'Verify its you.', 'customer-email-verification-for-woocommerce' );
								$heading = get_option( 'cev_verification_header', $cev_verification_widget_message->defaults['cev_verification_header'] );
								if ( !empty( $heading ) ) {
									echo wp_kses_post( $heading );
								} else {
									echo wp_kses_post( $heading_default );
								}
								?>
							</span>
							<span class="cev-authorization__description">
								<?php
								/* translators: %s: search with $email */
								$message = sprintf(__( 'We sent verification code to <strong>%s</strong>. To verify your email address, please check your inbox and enter the code below.', 'customer-email-verification-for-woocommerce' ), $email); 
								$message = apply_filters( 'cev_verification_popup_message', $message, $email );
								echo wp_kses_post( $message );
								?>
							</span>
						</div>
						<div class="cev-pin-verification">								
						<?php 
						$code_length = get_option('cev_verification_code_length', 4);
						if ( '1' == $code_length ) {
							$digits = 4;
						} else if ( '2' == $code_length ) {
							$digits = 6;
						} else {
							// Default value in case $code_length is neither '1' nor '2'
							$digits = 4;
						}
						?>
						<div class="otp-container">
							<?php for ( $i = 1; $i <= $digits; $i++ ) : ?>
								<input type="text" maxlength="1" class="otp-input" id="otp_input_<?php echo esc_attr('otp_input_' . $i); ?>" />
							<?php endfor; ?>
						</div>
						</div>
					</section>
					<footer class="cev-authorization__footer">
						
						<?php 
						$footer_message_default = __( 'Didn’t receive an email? Try Again', 'customer-email-verification-for-woocommerce' );
						/* translators: %s: search with Try_again */
						$footer_message = sprintf(__( 'Didn’t receive an email? <strong>%s</strong>', 'customer-email-verification-for-woocommerce'), $Try_again );
						$footer_message = get_option( 'cev_verification_widget_footer', $footer_message, $Try_again );
						$footer_message = str_replace( '{cev_resend_verification}', $Try_again, $footer_message );
						if ( !empty( $footer_message ) ) {
							echo wp_kses_post(  $footer_message ); 
						} else {
							echo wp_kses_post( $footer_message_default );
						}
						?>
					</footer>
				</form>            
			</div>
		</div>
	</div>
</div>
<?php 

$cev_verification_overlay_color = get_option( 'cev_verification_popup_overlay_background_color', $cev_verification_widget_style->defaults['cev_verification_popup_overlay_background_color'] );
?>
<style>
	.cev-authorization-grid__visual{
		background-color: <?php esc_html_e( woo_customer_email_verification()->hex2rgba( $cev_verification_overlay_color, '0.7' ) ); ?>;	
	}	
	html { 
		background: none;
	}
	footer#footer {
		display: none;
	}
	.customize-partial-edit-shortcut-button {
		display: none;
	}
</style>
