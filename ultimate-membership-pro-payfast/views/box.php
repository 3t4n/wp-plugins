<?php $pay_stat = ihc_check_payment_status( $data['slug'] ); ?>
<div class="iump-payment-box-wrap">
   <a href="<?php esc_html_e( admin_url( 'admin.php?page=ihc_manage&tab=ump_payfast' ));?>">
      <div class="iump-payment-box <?php esc_html_e( $data['pay_stat']['active']); ?>">
          <div class="iump-payment-box-title">PayFast</div>
          <div class="iump-payment-box-type"><?php esc_html_e( 'PayFast - OffSite payment solution', 'ultimate-membership-pro-payfast' );?></div>
          <div class="iump-payment-box-bottom"><?php esc_html_e( 'Settings:', 'ultimate-membership-pro-payfast' );?> <span><?php esc_html_e( $data['pay_stat']['settings']); ?></span></div>
      </div>
   </a>
</div>
