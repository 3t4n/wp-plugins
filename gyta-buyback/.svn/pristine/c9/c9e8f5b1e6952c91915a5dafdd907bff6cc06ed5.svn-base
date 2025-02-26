<?php

if ( ! defined( 'ABSPATH' ) ) die("No cheating!");

?>
<style>
	.logoBackground {
		position: absolute;
		top: 50px;
		right: 50px;
		width: 300px;
		height: 300px;
	}
	.gytah1label {
		padding-left: 45px;
        background: url(<?php echo plugin_dir_url( __FILE__ ); ?>../images/Gyta-Buyback-Logo-2.png);
        background-size: contain;
        background-repeat: no-repeat;
    }
</style>

<div class='wrap'>
	<div class='gytah1label'>
		<h1 class=''>
			Gyta BuyBack
		</h1>
	</div>
	<div id='dashboard-widgets-wrap'>
		<div id='dashboard-widgets' class='metabox-holder'>
			<!-- 
			<div class='logoBackground'>
				<img src="<?php echo plugin_dir_url( __FILE__ ); ?>../images/300px.png">
			</div>
			-->
			
			<div class='postbox-container'>
				<div class='meta-box-sortables ui-sortable'>
					<div class='postbox'>
						<div class="postbox-header">
							<h2 class="hndle ui-sortable-handle">Internal Links</h2>
						</div>
						<div class='inside '>
							<?php if (wcpti_isWooCommerceActivated()) { ?>
								<a href="admin.php?page=wc-settings&tab=wcpti_settings_tab" >Settings</a>
								<br><br>
								<a href="edit.php?post_type=product">Products</a>
								<br><br>
								<a href="edit.php?post_type=product&page=product_attributes">Product Attributes</a>
							<?php } else { ?>
								<i>WooCommerce must be installed and activated first</i>
							<?php } ?>
						</div>

					</div>
				</div>
			</div>
			
			<div class='postbox-container'>
				<div class='meta-box-sortables ui-sortable'>
					<div class='postbox'>
						<div class="postbox-header">
							<h2 class="hndle ui-sortable-handle">External Links</h2>
						</div>
						<div class='inside'>
							<a href="https://gytabuyback.com/documentation-overview/" target="_blank">Gyta BuyBack Documentation</a>
							<br><br>
							<a href="https://gytabuyback.com/forum" target="_blank">Gyta BuyBack Forum</a>
							<br><br>
							<a href="https://www.easypost.com" target="_blank">EasyPost</a>
							
						</div>

					</div>
				</div>
			</div>
			<!--
			<div class='postbox-container'>
				<div class='meta-box-sortables ui-sortable'>
					<div class='postbox'>
						<div class="postbox-header">
							<h2 class="hndle ui-sortable-handle">Internationalization</h2>
						</div>
						<div class='inside'>
							Can you help translate Gyta BuyBack into your language?  Or would you like to see your country added to the list of country options?  Contact us!
							<br><br>
							Looking for a shipping carrier that isn't currently offered?  Assuming it is supported by <a href="https://www.easypost.com/service-levels-and-parcels" target="_blank">EasyPost</a> it can be easily added.
							<br><br>
							Please <a href="admin.php?page=wcpti-menu-contact">send a message</a> if you can help with any of these internationalization efforts!
						</div>

					</div>
				</div>
			</div>
			-->
			<?php if (wcpti_fs()->is_free_plan() ) { ?>
				<div class='postbox-container'>
					<div class='meta-box-sortables ui-sortable'>
						<div class='postbox'>
							<div class="postbox-header">
								<h2 class="hndle ui-sortable-handle">Upgrade</h2>
							</div>
							<div class='inside'>
								Features you're missing out on:
								<br><br>
								* Premium Support
								<br>
								* Venmo Payment Method
								<br>
								* Zelle Payment Method
								<br>
								* Interac eTransfer Payment Method
								<br>
								* Tracking Number in admin order-view
								<br>
								* Link to Shipping Label in admin order-view
								<br>
								* Hide unneeded product variation fields to make editing prices easier
								<br>
								<br>
								<a href="admin.php?page=wcpti-menu-pricing">Upgrade now</a>!
								
							</div>

						</div>
					</div>
				</div>
			<?php } ?>
			
			
			
		</div>
	</div>
</div>
