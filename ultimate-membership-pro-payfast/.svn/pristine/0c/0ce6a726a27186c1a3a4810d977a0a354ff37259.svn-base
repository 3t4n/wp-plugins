<form action="<?php esc_html_e( $data['form_target']);?>" method="post" class="ump-payfast-js-form" >

   <input type="hidden" name="merchant_id" value="<?php esc_html_e( $data['merchant_id']);?>" />
   <input type="hidden" name="merchant_key" value="<?php esc_html_e( $data['merchant_key']);?>" />

   <input type="hidden" name="amount" value="<?php esc_html_e( $data['amount']);?>" />
   <input type="hidden" name="item_name" value="<?php esc_html_e( $data['item_name']);?>" />
   <input type="hidden" name="item_description" value="<?php esc_html_e( $data['item_description']);?>" />
   <input type="hidden" name="custom_str1" value="<?php esc_html_e( $data['custom_str1']);?>" />

   <input type="hidden" name="name_first" value="<?php esc_html_e( $data['name_first'] );?>" />
   <input type="hidden" name="name_last" value="<?php esc_html_e( $data['name_last'] );?>" />
   <input type="hidden" name="email_address" value="<?php esc_html_e( $data['email_address'] );?>" />
   <input type="hidden" name="email_confirmation" value="<?php esc_html_e( $data['email_confirmation'] );?>" />

   <input type="hidden" name="return_url" value="<?php esc_html_e( $data['return_url'] );?>" />
   <input type="hidden" name="cancel_url" value="<?php esc_html_e( $data['cancel_url'] );?>" />
   <input type="hidden" name="notify_url" value="<?php esc_html_e( $data['notify_url'] );?>" />

   <?php if ( !empty( $data['subscription_type'] ) ):?>
      <input type="hidden" name="subscription_type" value="<?php esc_html_e( $data['subscription_type'] );?>" />
      <input type="hidden" name="recurring_amount" value="<?php esc_html_e( $data['recurring_amount'] );?>" />
      <input type="hidden" name="frequency" value="<?php esc_html_e( $data['frequency'] );?>" />
      <input type="hidden" name="cycles" value="<?php esc_html_e( $data['cycles'] );?>" />
      <input type="hidden" name="subscription_notify_email" value="<?php esc_html_e( $data['subscription_notify_email'] );?>" />
      <input type="hidden" name="subscription_notify_webhook" value="<?php esc_html_e( $data['subscription_notify_webhook'] );?>" />
   <?php endif;?>

</form>

<script>
  document.forms[0].submit();
</script>
