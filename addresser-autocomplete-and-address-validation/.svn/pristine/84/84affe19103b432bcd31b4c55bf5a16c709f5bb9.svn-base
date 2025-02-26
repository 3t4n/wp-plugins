<?php 
//add_action( 'woocommerce_before_checkout_billing_form', 'ts_checkout_before_customer_details', 10 );

function ts_checkout_before_customer_details(){
	$checkoutEnable = get_option( 'wc_addressers_tab_checkout_page' );
	if($checkoutEnable == 'yes'){
		echo '<div class="addresser-serach">
				<p class="form-row form-row-wide" id="addresser_search" data-priority="30">
				<span class="woocommerce-input-wrapper">
					<input type="text" class="input-text" name="addresser-search-checkout" id="addresser-search-checkout" placeholder="Type Your Address Here" autocomplete="organization">
					</span>
				</p>
				<div id="addresser-lists"></div>
		</div>';
	}

}
?>