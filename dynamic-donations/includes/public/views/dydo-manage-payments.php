<?php

use Stripe\ErrorObject;

if (!is_user_logged_in()) {
	return;
}

if (dydo_get_global_settings()['payment_gateway'] === 'stripe') : ?>
	<div class="dydo_row">
		<div class="dydo_col-xs-12">
			<h5 style="margin-bottom: 21px">Manage payments methods</h5>
		</div>

        <div class="dydo_col-xs-4">
			<button class="dydo_submit-one-time-donation__button dydo_open-modal dydo_manage-payment-button" data-screen="MANAGE_PAYMENT_METHOD">
				Manage payment methods
			</button>
		</div>
	</div>
<? endif; ?>
