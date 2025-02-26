<?php
/*
  Plugin Name: Easy PayPal Buttons
  Plugin URI: http://easypaypalbuttons.moondeveloper.com/
  Description:Easy PayPal Buttons Provide Buy, Donate and Subscribe functionality. It Works With Any type of Paypal account. Super Easy to Use and Setup.
  Version: 1.0
  Author: SALAHUDEEN
  Author URI: http://moondeveloper.com/
 */
?>
<?php
// Exit if accessed directly 
  if (!defined('ABSPATH'))
    exit;

  include_once 'admin/admin.php';


// register shortcode
add_shortcode('easy_paypal_button', 'easy_paypal_button'); 
// function that runs when shortcode is called
function easy_paypal_button($attr) {

	?>
	<!-- ==================== DONATE FORM =========================== --> 
<?php
if ($attr['btn_type']=='donate') {
?>
<form action="https://www.paypal.com/cgi-bin/webscr" method="post" target="_top">
<input type="hidden" name="cmd" value="<?php echo esc_html ($attr['donation_amount']); ?>" />
<input type="hidden" name="business" value="<?php echo esc_html ($attr['email']); ?>" />
<input type="hidden" name="item_name" value="<?php echo esc_html ($attr['item_name']); ?>" />
<input type="hidden" name="currency_code" value="<?php echo esc_html ($attr['currency']); ?>" />
 <?php  
if ($attr['img_id']=='donate-btn-1') {
$src=plugin_dir_url( dirname( __FILE__ ) ) .'easy-paypal-buttons/admin/imgs/d26.png';
}

?>
 <input type="image" name="" src="<?php echo esc_html ($src); ?>" value="submit" style="max-width:<?php echo esc_html ($attr['max-width']); ?>;">

</form>
<?php
}
 ?>
<!-- ==================== SUBSCRIBE FORM =========================== --> 
<?php
if ($attr['btn_type']=='subscribe') {
?>
<form action="https://www.paypal.com/cgi-bin/webscr" method="post" target="_top">
<input type="hidden" name="cmd" value="_xclick-subscriptions">
<input type="hidden" name="business" value="<?php echo esc_html ($attr['email']); ?>">
<input type="hidden" name="lc" value="US">
<input type="hidden" name="item_name" value="<?php echo esc_html ($attr['item_name']); ?>">
<input type="hidden" name="no_note" value="1">
<input type="hidden" name="src" value="1">
<input type="hidden" name="a3" value="<?php echo esc_html ($attr['donation_amount']); ?>">
<input type="hidden" name="p3" value="1">
<input type="hidden" name="t3" value="M">
<input type="hidden" name="currency_code" value="<?php echo esc_html ($attr['currency']); ?>">
<input type="hidden" name="bn" value="PP-SubscriptionsBF:btn_subscribeCC_LG.gif:NonHostedGuest">
<?php
if ($attr['img_id']=='sub-btn-1') {
$src= plugin_dir_url( dirname( __FILE__ ) ) . 'easy-paypal-buttons/admin/imgs/subs/s3.PNG';
}

 ?>
 <input type="image" name="paypal_submit" src="<?php echo esc_html ($src); ?>" value="submit" style="max-width:<?php echo esc_html ($attr['max-width']); ?>;">
</form>
<?php
}  
?>
<!-- ==================== BUY FORM =========================== -->
<?php
if ($attr['btn_type']=='buy') {
?>
<form action="https://www.paypal.com/cgi-bin/webscr" method="post" target="_top">
<input type="hidden" name="cmd" value="_xclick">
<input type="hidden" name="business" value="<?php echo esc_html ($attr['email']); ?>">
<input type="hidden" name="lc" value="US">
<input type="hidden" name="item_name" value="<?php echo esc_html ($attr['item_name']); ?>">
<input type="hidden" name="amount" value="10.00">
<input type="hidden" name="currency_code" value="<?php echo esc_html ($attr['currency']); ?>">
<input type="hidden" name="button_subtype" value="services">
<input type="hidden" name="no_note" value="0">
<input type="hidden" name="bn" value="PP-BuyNowBF:btn_buynowCC_LG.gif:NonHostedGuest">

<?php 
if ($attr['img_id']=='buy-btn-1') {
$src=plugin_dir_url( dirname( __FILE__ ) ) . 'easy-paypal-buttons/admin/imgs/buy/b27.png'; 
}

?>
 <input type="image" name="" src="<?php echo esc_html ($src); ?>" value="submit" style="max-width:<?php echo esc_html ($attr['max-width']); ?>;">

</form>
    <?php 
  }
  ?>


<?php
}




