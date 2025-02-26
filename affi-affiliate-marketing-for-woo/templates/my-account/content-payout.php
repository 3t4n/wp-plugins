<?php
if ( ! defined( 'ABSPATH' ) ) exit; // Exit if accessed directly

use AffiAffiliate\Inc\Data;
use AffiAffiliate\Inc\QueryDB;

$user_id         = get_current_user_id();
$payment_request = Data::instance()->get_param( 'payment_request' );
$woo_payments    = WC()->payment_gateways->payment_gateways();
$payment_method  = Data::instance()->get_param( 'payment_method' );
$payment_fee     = (float) Data::instance()->get_param( 'payment_fee' );

$count_payouts = QueryDB::instance()->get_total_payout_by_user( $user_id );
$p_per_page    = isset( $payout_per_page ) && ! empty( $payout_per_page ) ? (int) $payout_per_page : 20;
$p_page        = isset( $_REQUEST['affi-page'] ) && ! empty( $_REQUEST['affi-page'] ) ? (int) wc_clean( wp_unslash( $_REQUEST['affi-page'] ) ) : 1;// phpcs:ignore WordPress.Security.NonceVerification.Recommended, WordPress.Security.ValidatedSanitizedInput.InputNotSanitized
$p_offset      = 0;
if ( $p_page && $p_page > 1 ) {
	$p_offset = $p_per_page * ( $p_page - 1 );
}
$get_payouts = QueryDB::instance()->get_payouts( [
	'ids_user' => (string) $user_id,
	'limit'    => $p_per_page,
	'offset'   => $p_offset,
] );

$get_aff_info = QueryDB::instance()->get_affiliate_by_user_id( (int) $user_id );
$date_format  = get_option( 'date_format' );
$time_format  = get_option( 'time_format' );
$gmt_offset   = get_option( 'gmt_offset' );

$available_balance = (float) $get_aff_info['earning'] - (float) $get_aff_info['balance'];
$request_title     = esc_html__( 'Request', 'affi-affiliate-marketing-for-woo' );
$disable_request   = false;
if ( $available_balance <= 0 ) {
	$request_title   = esc_html__( 'No balance available to request', 'affi-affiliate-marketing-for-woo' );
	$disable_request = true;
} elseif ( $available_balance <= $payment_fee ) {
	$request_title   = esc_html__( 'The balance must be higher than the payment fee to request', 'affi-affiliate-marketing-for-woo' );
	$disable_request = true;
}

?>
<div class="affi-card-body affi-card-body-payout">
	<?php
	if ( $user_id ) {
		?>
        <div class="affi-table affi-MyAccount-payouts">
            <div class="affi-table-thead">
                <div class="affi-table-tr">
                    <div class="affi-table-th affi-payouts-table__header affi-table-th-center affi-payouts-table__header-transaction_id">
                        <span class="nobr"><?php echo esc_html__( 'Id', 'affi-affiliate-marketing-for-woo' ); ?></span>
                    </div>
                    <div class="affi-table-th affi-payouts-table__header affi-table-th-center affi-payouts-table__header-amount">
                        <span class="nobr"><?php echo esc_html__( 'Amount', 'affi-affiliate-marketing-for-woo' ); ?></span>
                    </div>
                    <div class="affi-table-th affi-payouts-table__header affi-table-th-center affi-payouts-table__header-status">
                        <span class="nobr"><?php echo esc_html__( 'Status', 'affi-affiliate-marketing-for-woo' ); ?></span>
                    </div>
                    <div class="affi-table-th affi-payouts-table__header affi-table-th-center affi-payouts-table__header-payment">
                        <span class="nobr"><?php echo esc_html__( 'Payment', 'affi-affiliate-marketing-for-woo' ); ?></span>
                    </div>
                    <div class="affi-table-th affi-payouts-table__header affi-table-th-center affi-payouts-table__header-date">
                        <span class="nobr"><?php echo esc_html__( 'Date', 'affi-affiliate-marketing-for-woo' ); ?></span>
                    </div>

                </div>
            </div>
			<?php
			if ( ! empty( $get_payouts ) ) { ?>
                <div class="affi-table-tbody">
					<?php
					foreach ( $get_payouts as $payout ) {
//						$transaction_id = isset( $payout['transaction_id'] ) ? sanitize_text_field( $payout['transaction_id'] ) : '';
						$transaction_id = isset( $payout['id'] ) ? sanitize_text_field( $payout['id'] ) : '';
						$amount         = isset( $payout['amount'] ) ? sanitize_text_field( $payout['amount'] ) : '';
						$status         = isset( $payout['status'] ) ? sanitize_text_field( $payout['status'] ) : '';
						$payment        = isset( $payout['payment'] ) ? sanitize_text_field( $payout['payment'] ) : '';
						$date_created   = isset( $payout['date_created'] ) ? ( is_numeric( $payout['date_created'] ) ? $payout['date_created'] : 0 ) : 0;
						?>
                        <div class="affi-table-tr affi-payouts-table__row ">
                            <div class="affi-table-td affi-payouts-table__cell affi-table-td-center affi-payouts-table__cell-transaction_id "
                                 data-title="Transaction id"><?php echo esc_html( $transaction_id ); ?></div>
                            <div class="affi-table-td affi-payouts-table__cell affi-table-td-center affi-payouts-table__cell-amount"
                                 data-title="Amount"><?php echo wc_price( $amount );// phpcs:ignore WordPress.Security.EscapeOutput.OutputNotEscaped ?></div>
                            <div class="affi-table-td affi-payouts-table__cell affi-table-td-center affi-payouts-table__cell-status"
                                 data-title="Status"><?php echo esc_html( $status ); ?></div>
                            <div class="affi-table-td affi-payouts-table__cell affi-table-td-center affi-payouts-table__cell-payment "
                                 data-title="Payment"><?php echo esc_html( $payment ); ?></div>
                            <div class="affi-table-td affi-payouts-table__cell affi-table-td-center affi-payouts-table__cell-date"
                                 data-title="Date">
                                <time datetime="<?php echo esc_attr( date_i18n( "{$date_format} {$time_format}", ( $date_created ) + $gmt_offset * 3600 ) ); ?>"><?php echo esc_html( date_i18n( "{$date_format} {$time_format}", ( $date_created ) + $gmt_offset * 3600 ) ); ?></time>
                            </div>
                        </div>
						<?php
					}
					?>

                </div>
				<?php
			} else {
				?>
                <div class="affi-notifications-table__row affi-row-empty ">
                    <div class="affi-table-empty"><?php echo esc_html__( 'No Data', 'affi-affiliate-marketing-for-woo' ); ?></div>
                </div>
				<?php
			} ?>
            <div class="affi-account-paging-wrap">
				<?php
				$total_page = $count_payouts % $p_per_page == 0 ?
					intdiv( $count_payouts, $p_per_page ) :
					intdiv( $count_payouts, $p_per_page ) + 1;
				if ( $total_page > 1 ) {
					?>
                    <div class="affi-account-paging">
						<?php for ( $p = 1; $p <= $total_page; $p ++ ) {
							$cr_url = add_query_arg( [ 'affi-page' => $p ] );
							if ( $p == 1 || $p == $total_page ) { ?>
                                <div class="affi-account-pages <?php
								if ( $p == $p_page )
									echo esc_attr( 'affi-account-page-active' ) ?>" data-page="<?php
								echo esc_attr( $p ) ?>"
                                     data-link="<?php echo esc_attr( $cr_url ) ?>"><?php echo esc_html( $p ) ?></div>
								<?php continue;
							}
							if ( $p <= $p_page ) {
								if ( $p < $p_page - 2 ) {
									continue;
								}
								if ( $p > $p_page - 2 ) {
									?>
                                    <div class="affi-account-pages <?php
									if ( $p == $p_page )
										echo esc_attr( 'affi-account-page-active' ) ?>" data-page="<?php
									echo esc_attr( $p ) ?>"
                                         data-link="<?php echo esc_attr( $cr_url ) ?>"><?php echo esc_html( $p ) ?></div>
									<?php
									continue;
								}
								if ( $p == $p_page - 2 ) {
									if ( $p != 2 ) {
										?>
                                        <div class="affi-account-pages-break">...</div>
									<?php } ?>
                                    <div class="affi-account-pages <?php
									if ( $p == $p_page )
										echo esc_attr( 'affi-account-page-active' ) ?>" data-page="<?php
									echo esc_attr( $p ) ?>"
                                         data-link="<?php echo esc_attr( $cr_url ) ?>"><?php echo esc_html( $p ) ?></div>
									<?php
									continue;
								}
							} else {
								if ( $p > $p_page + 2 ) {
									continue;
								}
								if ( $p < $p_page + 2 ) {
									?>
                                    <div class="affi-account-pages <?php
									if ( $p == $p_page )
										echo esc_attr( 'affi-account-page-active' ) ?>" data-page="<?php
									echo esc_attr( $p ) ?>"
                                         data-link="<?php echo esc_attr( $cr_url ) ?>"><?php echo esc_html( $p ) ?></div>
									<?php
									continue;
								}
								if ( $p == $p_page + 2 ) {
									?>
                                    <div class="affi-account-pages <?php
									if ( $p == $p_page )
										echo esc_attr( 'affi-account-page-active' ) ?>" data-page="<?php
									echo esc_attr( $p ) ?>"
                                         data-link="<?php echo esc_attr( $cr_url ) ?>"><?php echo esc_html( $p ) ?></div>
									<?php if ( $p + 1 != $total_page ) {
										?>
                                        <div class="affi-account-pages-break">...</div>
									<?php }
									continue;
								}
							}
						} ?>
                    </div>
				<?php } ?>
            </div>
        </div>
        <div class="affi-table affi-payment-info-wrap affi-hidden">
            <div class="affi-payment-label-wrap"><?php esc_html_e( 'Accepted payment method: ', 'affi-affiliate-marketing-for-woo' );
				$payment_text = '';
				foreach ( $payment_method as $p_code ) {
					if ( isset( $woo_payments[ $p_code ] ) ) {
						$payment_text .= empty( $payment_text ) ? $woo_payments[ $p_code ]->method_title : ', ' . $woo_payments[ $p_code ]->method_title;
					}
				}
				echo esc_html( $payment_text );
				?></div>
            <div class="affi-payment-label-wrap"><?php esc_html_e( 'Your payment info', 'affi-affiliate-marketing-for-woo' ); ?></div>
            <div class="affi-payment-data-wrap">
                <textarea class="affi-payment-data"><?php echo esc_html( $get_aff_info['payment_info'] ); ?></textarea>
            </div>
            <div class="affi-payment-info-btn-wrap" data-user="<?php echo esc_attr( $user_id ); ?>">
                <div class=" affi-icon icon_loading affi-hidden"></div>
                <div class="affi-payment-info-btn" data-user="<?php echo esc_attr( $user_id ); ?>">
					<?php esc_html_e( 'Update', 'affi-affiliate-marketing-for-woo' ); ?>
                </div>
            </div>
        </div>
		<?php if ( $payment_request ) { ?>
            <div class="affi-table affi-request-payout-wrap affi-hidden">
                <div class="affi-payment-label-wrap">
					<?php echo sprintf( 'The balance must exceed %s. There will be a %s processing fee per withdrawal.',
						wc_price( floatval( $payment_fee + 1 ) ), wc_price( floatval( $payment_fee ) ) );// phpcs:ignore WordPress.Security.EscapeOutput.OutputNotEscaped ?>
                </div>
                <div class="affi-request-line affi-request-available-wrap">
                    <div class="affi-request-available-label-wrap"><?php esc_html_e( 'Available balance', 'affi-affiliate-marketing-for-woo' ); ?></div>
                    <div class="affi-request-available-data-wrap">
                        <div class="affi-request-available-data"><?php
							echo wc_price( $available_balance );// phpcs:ignore WordPress.Security.EscapeOutput.OutputNotEscaped ?>
                        </div>
                    </div>
                </div>
                <div class="affi-request-line affi-request-balance-wrap">
                    <div class="affi-request-balance-label-wrap"><?php esc_html_e( 'Request balance', 'affi-affiliate-marketing-for-woo' ); ?></div>
                    <div class="affi-request-balance-data-wrap">
                        <input type="number" class="affi-request-balance-data"
                               min="<?php echo esc_attr( $payment_fee ); ?>"
                               max="<?php echo esc_attr( $available_balance ); ?>"/>
                    </div>
                </div>
                <div class="affi-request-payout-btn-wrap<?php echo ! $disable_request ? '' : ' affi-disable' ?>"
                     data-user="<?php echo esc_attr( $user_id ); ?>">
                    <div class="affi-icon icon_loading affi-hidden"></div>
                    <div class="affi-request-payout-btn" data-user="<?php echo esc_attr( $user_id ); ?>">
						<?php echo esc_html( $request_title ); ?>
                    </div>
                </div>
            </div>
		<?php }
	}

	?>
</div>