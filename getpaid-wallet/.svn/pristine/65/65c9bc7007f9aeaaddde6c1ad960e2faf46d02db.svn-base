<?php
/**
 * Contains the withdrawal modal template.
 *
 */

defined( 'ABSPATH' ) || exit;

global $aui_bs5;
?>
<script type="text/javascript">
	function wpinv_wallet_process_withdrawal() {

		jQuery( '.wpinv-wallet-alert' ).addClass( 'd-none alert-success' ).removeClass( 'alert-danger' )

		// Prepare withdrawal data.
		var data = {
			email: jQuery( '#wpinv-wallet-email' ).val(),
			amount: jQuery( '#wpinv-wallet-amount' ).val(),
			_wpnonce: '<?php echo sanitize_text_field( wp_create_nonce( 'wpinv_wallet' ) ); ?>',
			action: 'wpinv_wallet_withdraw'
		}

		// Block the form.
		wpinvBlock( '#wpinv-wallet-footer-template form' );

		// Execute the withdrawal.
		jQuery.post( '<?php echo esc_url( admin_url('admin-ajax.php') ); ?>', data )

			// If it succeeded...
			.done( function( response ) {
				jQuery( '.wpinv-wallet-alert' ).text( response.data.msg ).addClass( 'alert-success' ).removeClass( 'd-none alert-danger' )
			} )

			// If it failed...
			.fail( function( jqXHR ) {
				jQuery( '.wpinv-wallet-alert' )
					.html( '<?php esc_html_e( 'Error:', 'wpinv-wallet' ); ?> ' + jqXHR.statusText )
					.removeClass( 'alert-success d-none' )
					.addClass( 'alert-danger' )
			} )

			.always(
				function() {
					wpinvUnblock( '#wpinv-wallet-footer-template form' );
				}
			)

	}
</script>

<div class="bsui">
	<div class="modal fade" id="wpinv-wallet-footer-template" tabindex="-1" role="dialog" aria-hidden="true">
		<div class="modal-dialog modal-dialog-centered modal-lg" role="checkout" style="max-width: 650px;">
			<div class="modal-content">
				<form onsubmit="wpinv_wallet_process_withdrawal(); return false;">

					<div class="modal-header">
						<h4 class="modal-title"><?php _e( 'Withdraw Funds', 'getpaid-wallet' ); ?></h4>
						<?php if( $aui_bs5 ){ ?>
							<button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="<?php esc_attr_e( 'Close', 'getpaid-wallet' ); ?>">
							</button>
						<?php }else{ ?>
							<button type="button" class="close" data-dismiss="modal" aria-label="<?php esc_attr_e( 'Close', 'getpaid-wallet' ); ?>">
								<span aria-hidden="true">&times;</span>
							</button>
						<?php } ?>
					</div>

					<div class="modal-body">

						<?php

							$tip                = '';
							$minimum_withdrawal = wpinv_sanitize_amount( wpinv_get_option( 'wpinv_wallet_minimum_withdrawal' ) );

							if ( $minimum_withdrawal > 0 ) {
								$tip = sprintf(
									__( 'Minimum withdrawal amount: %s', 'getpaid-wallet' ),
									wpinv_price( $minimum_withdrawal )
								);
							}

							$position = wpinv_currency_position();

							if ( $position == 'left_space' ) {
								$position = 'left';
							}

							if ( $position == 'right_space' ) {
								$position = 'right';
							}

							echo aui()->input(
								array(
									'name'              => 'wpinv-wallet-amount',
									'id'                => 'wpinv-wallet-amount',
									'placeholder'       => wpinv_format_amount(0),
									'value'             => wpinv_format_amount(0),
									'label'             => esc_html__( 'Amount to withdraw', 'getpaid-wallet' ),
									'label_type'        => 'vertical',
									'help_text'         => $tip,
									'input_group_right' => $position == 'right' ? wpinv_currency_symbol() : '',
									'input_group_left'  => $position == 'left' ? wpinv_currency_symbol() : '',
									'class'             => 'wpinv-wallet-amount validate',
								)
							);

							echo aui()->input(
								array(
									'name'              => 'wpinv-wallet-email',
									'id'                => 'wpinv-wallet-email',
									'placeholder'       => 'example@email.com',
									'value'             => '',
									'label'             => esc_html__( 'Your PayPal Email', 'getpaid-wallet' ),
									'label_type'        => 'vertical',
									'help_text'         => '',
									'input_group_right' => $position == 'right' ? '<span class="input-group-text"> <i class="fas fa-envelope"></i></span>' : '',
									'input_group_left'  => $position == 'left' ? '<span class="input-group-text"> <i class="fas fa-envelope"></i></span>' : '',
									'class'             => 'wpinv-wallet-email validate',
								)
							);

						?>

						<div class="alert alert-success wpinv-wallet-alert d-none" role="alert"></div>

					</div>

					<div class="modal-footer">
						<button type="submit" class="btn btn-primary"><?php _e( 'Withdraw', 'getpaid-wallet' ); ?>&nbsp;&nbsp;<i class="fas fa-arrow-right"></i></button>
					</div>

				</form>
			</div>
		</div>
	</div>
</div>
