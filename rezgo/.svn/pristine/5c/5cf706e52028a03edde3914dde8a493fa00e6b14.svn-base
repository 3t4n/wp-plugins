<?php 
	// This is the booking receipt page
	require('rezgo/include/page_header.php');

	// start a session
	session_start();

	// start a new instance of RezgoSite
	$site = new RezgoSite();

	if (isset($_REQUEST['parent_url'])) {
		$site->base = '/' . $site->requestStr('parent_url');
	}
		
	// grab and decode the trans_num if it was set
	$trans_num = $site->decode(sanitize_text_field($_REQUEST['trans_num']));

	// send the user home if they shouldn't be here
	if(!$trans_num) $site->sendTo($site->base);
	
	// empty the cart
	$site->clearCart();
	
	$site->setMetaTags('<meta name="robots" content="noindex, nofollow">');
?>

<?php echo $site->getTemplate('frame_header'); ?>

<?php echo $site->getTemplate('booking_thank_you'); ?>

  <?php
		$ga_add_transaction = "
			ga('ecommerce:addTransaction', {
				'id': '$trans_num',
				'affiliation': '$c',
				'revenue': '$cart_total',
				'currency': '".$site->getBookingCurrency()."'
			});
		";
	?>

<?php echo $site->getTemplate('frame_footer'); ?>