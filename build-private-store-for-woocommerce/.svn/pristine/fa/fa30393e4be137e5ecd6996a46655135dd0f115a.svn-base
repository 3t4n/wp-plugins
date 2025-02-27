<?php
add_filter( 'gettext','BPSFW_translate_woocommerce_strings', 999, 3 );
function BPSFW_translate_woocommerce_strings( $translated, $untranslated, $domain ) {
global $bpsfw_comman;
if ( ! is_admin() && 'woocommerce' === $domain ) {
  switch ( $translated ) {         
    case 'Login':         
      $translated = $bpsfw_comman['bpsfw_login_form_title'];
    break;         
    case 'Register':         
      $translated = $bpsfw_comman['bpsfw_registration_form_title'];
    break;
  }
}             
return $translated;         
}

add_action( 'woocommerce_before_customer_login_form', 'bpsfw_user_register_success_message' );
function bpsfw_user_register_success_message() {
  global $bpsfw_comman;
  if (isset( $_REQUEST['confirm_approve'] ) == 'false') {
  ?>
      <?php 
      wc_add_notice($bpsfw_comman['bpsfw_registration_successful_message'], 'success' );
      ?>
  <?php
  }
}
function bpsfw_send_user_registered_mail_notification( $customer_id ) {
  $user = get_userdata( $customer_id );
  if ( $user ) {
    $username = $user->user_login;

    global $bpsfw_comman;

    // Check if the key exists in the array before using it
    if ( ! empty( $bpsfw_comman['bpsfw_user_regi_email'] ) &&  $bpsfw_comman['bpsfw_user_regi_email_notification'] == 'yes' ) {
        $bpsfw_user_regi_email = explode(', ', $bpsfw_comman['bpsfw_user_regi_email']);
        $bpsfw_user_regi_email_subject = $bpsfw_comman['bpsfw_user_regi_email_subject'];
        $bpsfw_user_regi_email_msg = $bpsfw_comman['bpsfw_user_regi_email_msg'];
        $admin_message = str_replace("{customer_name}",$username,$bpsfw_user_regi_email_msg);

        if(is_array($bpsfw_user_regi_email) && count($bpsfw_user_regi_email) > 0){
          foreach($bpsfw_user_regi_email as $emailaddress){
            $to = $emailaddress;
            $register_subject = $bpsfw_user_regi_email_subject;
            $register_messagebody = $admin_message;
            $headers = array( 'Content-Type: text/html; charset=UTF-8' );

            wp_mail( $to, $register_subject, $register_messagebody, $headers );
          }
        }
    }
  }
}
add_action( 'woocommerce_created_customer', 'bpsfw_send_user_registered_mail_notification' );
function bpsfw_redirect_to_shop_after_login($redirect) {
  global $bpsfw_comman;

  $bpsfw_redirect_url = $bpsfw_comman['bpsfw_redirect_url'];

  if(!empty($bpsfw_redirect_url)){
    wp_redirect($bpsfw_redirect_url);
    exit;
  } 

  return $redirect;
}
add_action('woocommerce_login_redirect', 'bpsfw_redirect_to_shop_after_login',10,2);