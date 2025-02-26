<?php

use Stripe\ErrorObject;

if (!is_user_logged_in()) {
	return;
}

$dydo_wc_exists      = get_option('dydo_woocommerce_enabled');
$timezone  = isset($_COOKIE['dydo_tz']) ? $_COOKIE['dydo_tz'] : date_default_timezone_get();
$recurring_donations = dydo_get_donations(
	array(
		'WHERE',
		array('user_id', '=', strval(get_current_user_id())),
		array('GROUP BY user_id, subscription_id, customer_id, amount, next_payment_attempt, started_date'),
		array('ORDER BY start_date DESC'),

	),
	'SELECT user_id, subscription_id, customer_id, amount, next_payment_attempt,   DATE_FORMAT(CONVERT_TZ( FROM_UNIXTIME(start_date) , "' . date_default_timezone_get() . '","' . $timezone . '"),"%%m/%%d/%%Y %%h:%%i %%p") AS started_date ',
	DYDO_SUBSCRIPTION_TABLENAME
);
$onetime_donations = dydo_get_donations(
	array(
		'INNER JOIN ' . DYDO_PAYMENT_GATEWAY_TABLENAME . ' pg ON pg.id = dydo_gateways_id',
		'WHERE',
		array('user_id', '=', get_current_user_id()), 'AND', array('amount', '>', '0')
	),
	'SELECT *',
	DYDO_ONETIME_DONATION_TABLENAME
); ?>
<? if (dydo_get_global_settings()['payment_gateway'] === 'stripe') : ?>
	<!-- <div class="dydo_row">
		<div class="dydo_col-xs-12">
			<h5 style="margin-bottom: 21px">Manage payments methods</h5>
		</div>

        <div class="dydo_col-xs-4">
			<button class="dydo_submit-one-time-donation__button dydo_open-modal" data-screen="MANAGE_PAYMENT_METHOD">
				Manage payment methods
			</button>
		</div>
	</div> -->
<? endif; ?>
<div class="dydo_row">
	<div class="dydo_col-xs-12 dydo_col-sm-6">
		<h5 style="margin-bottom: 21px">One Time Donations</h5>
		<?php if ($onetime_donations) : ?>
			<?php foreach ($onetime_donations as $donation) : ?>
				<form class="dydo_submit-one-time-donation">
					<div class="dydo_row dydo_middle-xs">
						<div class="dydo_col-xs-6">
							<h3 class="dydo_submit-one-time-donation__amount">
								<?php echo esc_html((float) $donation->amount . ' '); ?>
							</h3>
							<i style="font-size: 12px; color: #4F4F4F; margin-bottom: 5px"><?php echo  esc_html($donation->payment_gateway); ?></i>
							<div class="dydo_submit-one-time-donation__date">
								<?php echo esc_html(wp_date('m/d/Y', strtotime($donation->created_at))); ?>
							</div>
						</div>
						<div class="dydo_col-xs-6 dydo_end-xs">
							<input type="hidden" name="amount" value="<?php echo esc_attr((float) $donation->amount); ?>" />
							<?php if ($dydo_wc_exists) : ?>
								<input type="hidden" name="action" value="wc_add_donation" />
								<input type="hidden" name="pid" value="<?php echo esc_attr(dydo_get_options_array()['donations']['product_id']); ?>" />
							<?php endif; ?>
							<?php if ($dydo_wc_exists && $donation->payment_gateway === 'woocommerce') : ?>
								<button class="dydo_submit-one-time-donation__button">Donate again ></button>
							<?php endif; ?>
							<?php if ($donation->payment_gateway === 'stripe') : ?>
								<button class="dydo_submit-one-time-donation__button dydo_open-modal" data-donation-type="onetime">
									Donate again >
								</button>
							<?php endif; ?>
						</div>
					</div>
				</form>
			<?php endforeach; ?>
		<?php else : ?>
			<?php echo do_shortcode('[dydo_button label="Add Donation" type="onetime"]'); ?>
		<?php endif; ?>
	</div>

	<div class="dydo_col-xs-12 dydo_col-sm-6">
		<h5 style="margin-bottom: 21px">Recurring Donations</h5>
		<?php
		if ($recurring_donations) : ?>
			<?php foreach ($recurring_donations as $key => $donation) :
				$subcription         = DyDo_Stripe_Subscriptions::get($donation->subscription_id);
				$subscription_status = strtolower(trim($subcription->status));
				$next_invoice        = DyDo_Stripe_Invoices::upcoming(
					array(
						'customer'                => $subcription->customer,
						'subscription'            => $subcription->id,
					)
				);
			?>
				<div class="dydo_subscription <?php echo esc_attr($subscription_status === 'active' || $subscription_status === 'trialing' ? 'dydo_subscription--active' : ''); ?>" data-subscription="<?php echo esc_attr(json_encode(['id' => $donation->subscription_id, 'amount' => $donation->amount, 'nextPaymentAttempt' => $donation->next_payment_attempt])) ?>">
					<?php if (!$subcription instanceof ErrorObject &&  isset($subcription) && !empty($subcription)) : ?>
						<div class="dydo_row">
							<div class="dydo_col-xs-3 dydo_col-md-3">
								<h3 class="dydo_subscription__amount">
									<?php echo esc_html((float) $donation->amount . ' ' . strtoupper($subcription->currency)); ?>
								</h3>
								<?php if ($subscription_status !== 'canceled') : ?>
									<div class="dydo_subscription__amount_edit">
										<span>
											<a href="#" class="dydo_open-modal" data-subscription-id="<?php echo esc_attr($subcription->id) ?>" data-mode="edit" data-screen="UPDATE_SUBSCRIPTION_AMOUNT">
												Edit amount
											</a>
										</span>
									</div>
								<?php endif; ?>
							</div>
							<div class="dydo_col-xs-6 dydo_col-md-7">
								<span class="dydo_subscription__interval <?php echo esc_attr($subscription_status === 'active' || $subscription_status === 'trialing' ? 'dydo_subscription__interval--active' : ''); ?>">
									<?php
									$interval       = ucfirst($subcription->plan->interval);
									$interval_count = $subcription->plan->interval_count;
									if ($subcription->plan->interval_count > 1) {
										echo esc_html("Each {$interval_count} {$interval}s");
									} else {
										echo  esc_html("Each {$interval}");
									}
									?>
								</span>
								<span class="dydo_subscription__status <?php echo esc_attr($subscription_status  !== 'canceled' ? 'dydo_subscription__status--active' : ''); ?>">
									<?php echo esc_html(ucfirst($subscription_status)); ?>
									<?php echo esc_html($subcription->pause_collection != null ? '(payment paused)' : ''); ?>
								</span>
							</div>
							<div class="dydo_col-md-2 dydo_col-xs-3 dydo_row dydo_middle-xs dydo_end-xs">
								<?php if ($subscription_status !== 'canceled') : ?>
									<label class="dydo_subscription-slider" for="dydo-recurring-donation-<?php echo esc_attr($key); ?>">
										<input type="checkbox" aria-label="Active" name="subscription-status" class="dydo_subscription-slider__input dydo_change-status-recuring-donation" id="dydo-recurring-donation-<?php echo esc_attr($key); ?>" data-subscription-id="<?php echo esc_attr($subcription->id); ?>" <?php echo esc_attr($subcription->pause_collection == null ? 'checked' : ''); ?> />
										<span class="dydo_subscription-slider__switch"> </span>
									</label>
								<?php endif; ?>
							</div>
						</div>
						<div class="dydo_row" style="margin-top: 0.2rem;">
							<div class="dydo_col-xs-6 dydo_col-md-3">
								<div class="dydo_subscription__date">
									<span>Started:</span>
									<?php if ($donation->started_date) {
										echo esc_html($donation->started_date);
									} else {
										// echo esc_html(wp_date('m/d/Y h:m A', $subcription->start_date));
									}
									?>
								</div>
							</div>
							<div class="dydo_col-xs-6 dydo_col-md-9">
								<div class="dydo_subscription__date">
									<span>Next invoice:</span>
									<?php if ($donation->next_payment_attempt) {
										$next_payment_attempt = wp_date('m/d/Y h:i A', $donation->next_payment_attempt, new DatetimeZone($timezone));
										echo esc_html($next_payment_attempt);
									} else {
										echo  esc_html(wp_date('m/d/Y h:i A', $next_invoice->next_payment_attempt, new DatetimeZone($timezone)));
									}
									?>
								</div>
								<?php if ($subscription_status !== 'canceled') : ?>

									<div class="dydo_subscription__date_edit">
										<span>
											<a href="#" class="dydo_open-modal" data-subscription-id="<?php echo esc_attr($subcription->id) ?>" data-mode="edit" data-screen="UPDATE_SUBSCRIPTION_DATE">
												Edit Subscription Date
											</a>
										</span>
									</div>
									<div class="dydo_subscription__cancel">
										<span>
											<a href="#" class="dydo_open-modal" data-subscription-id="<?php echo esc_attr($subcription->id) ?>" data-mode="edit" data-screen="CANCEL_SUBSCRIPTION">
												Cancel Subscription
											</a>
										</span>
									</div>
									<div class="dydo_subscription__change_payment_method">
										<span>
											<a href="#" class="dydo_open-modal" data-subscription-id="<?php echo esc_attr($subcription->id) ?>" data-mode="edit" data-screen="UPDATE_PAYMENT_METHOD_SUBSCRIPTION">
												Change payment method
											</a>
										</span>
									</div>
								<?php
								endif;
								?>
							</div>
						</div>
					<?php else : ?>
						<p>Subscription not found. Please reload or contact with site admin. </p>
					<?php endif; ?>
				</div>
			<?php endforeach; ?>
		<?php else : ?>
			<?php echo do_shortcode('[dydo_button label="Add Donation" type="recurring"]'); ?>
		<?php endif; ?>
	</div>
</div>
