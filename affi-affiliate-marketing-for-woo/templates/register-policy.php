<?php
if ( ! defined( 'ABSPATH' ) ) exit; // Exit if accessed directly
use AffiAffiliate\Inc\QueryDB;

$user_data       = wp_get_current_user();
$account_upgrade = 1;
if ( ! $user_data->exists() ) {
	$account_upgrade = 0;
}
$user_id      = $user_data->ID;
$aff_info     = QueryDB::instance()->get_affiliate_by_user_id( $user_id );
$payment_info = is_array( $aff_info ) ? $aff_info['payment_info'] : '';
$registered   = $aff_info ? $aff_info : false;
if ( is_array( $aff_info ) && isset( $aff_info['status'] ) ) {
	switch ( $aff_info['status'] ) {
		case 'pending':
			$af_notice = esc_html__( 'Your request is being checked, please wait.', 'affi-affiliate-marketing-for-woo' );
			break;
		case 'reject':
			$af_notice = esc_html__( 'Your request has been denied.', 'affi-affiliate-marketing-for-woo' );
			break;
		default:
			$af_notice = '';
	}
} else {
	$af_notice = '';
}
?>
<div class="affi-register-affiliate-container <?php echo esc_html( $class ) ?>">
    <div class="affi-register-affiliate-layout"></div>
    <div class="affi-register-affiliate-content-wrap">
        <div class="affi-policy-header"><?php esc_html_e( 'Register as Affiliate', 'affi-affiliate-marketing-for-woo' ); ?></div>
        <div class="affi-policy-content-wrap"><?php echo esc_html( $policy_text ) ?></div>
        <div class="affi-policy-info-wrap">
            <div class="affi-policy-info-label"><?php echo esc_html( $policy_label ) ?></div>
            <textarea class="affi-policy-info-area"
                      name="affi_register_policy_info_area"><?php echo wp_kses_post( $payment_info ) ?></textarea>
        </div>
        <label class="affi-policy-input-label">
			<?php esc_html_e( 'Accept the policy', 'affi-affiliate-marketing-for-woo' ); ?>
            <input type="checkbox" class="affi-policy-input" name="affi_register_policy_input"/>
        </label>
        <div class="affi-policy-button-wrap">
            <div class="affi-policy-button affi-policy-button-reject"><?php echo esc_html__( 'Reject', 'affi-affiliate-marketing-for-woo' ) ?></div>
            <div class="affi-policy-button affi-policy-button-accept<?php echo esc_attr( $account_upgrade ? ' affi-upgrade-button' : '' ) ?>">
				<?php echo esc_html__( 'Accept', 'affi-affiliate-marketing-for-woo' ) ?>
            </div>
        </div>
    </div>
</div>
<?php
if ( $account_upgrade ) {
	?>
    <div class="affi-upgrade-policy-button-wrap">
        <div class="affi-upgrade-policy-notice"><?php echo esc_html( $af_notice ) ?></div>
        <div class="affi-upgrade-policy-button" data-id="<?php echo esc_attr( $user_id ) ?>">
			<?php echo $registered ? esc_html__( 'Update affiliate info', 'affi-affiliate-marketing-for-woo' ) :
				esc_html__( 'Register as affiliate', 'affi-affiliate-marketing-for-woo' ) ?>
        </div>
    </div>
	<?php
}
?>
