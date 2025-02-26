<?php

use Stripe\Collection;
use Stripe\ErrorObject;
use Stripe\Subscription;

class DyDo_Stripe_Subscriptions
{

	/**
	 * @return Collection|ErrorObject|null
	 */
	public static function all()
	{
		$subscriptions = new DyDo_StripeAPI_Subscriptions();

		// Get customer
		$customer = DyDo_Stripe_Customers::retrieve();
		if ($customer instanceof ErrorObject) {
			return $customer;
		}
		// Get all subscriptions
		return $subscriptions->all($customer->id);
	}

	/**
	 * @return Collection|ErrorObject|null
	 */
	public static function all_by_customer($customer_id)
	{
		$subscriptions = new DyDo_StripeAPI_Subscriptions();
		$all_subscriptions = $subscriptions->all($customer_id);
		if ($all_subscriptions  instanceof ErrorObject) {
			if (strpos(strtolower($all_subscriptions->message), 'api') !== false) {
				throw new Exception("Api key missing or invalid", 1);
			}
			return false;
		}
		// Get all subscriptions
		return $all_subscriptions;
	}

	/**
	 * @param string $subscription_id
	 *
	 * @return ErrorObject|Subscription|null
	 */
	public static function get($subscription_id)
	{
		$subscriptions = new DyDo_StripeAPI_Subscriptions();

		// Get all subscriptions
		return $subscriptions->retrieve($subscription_id);
	}

	/**
	 * @param $plan_id
	 *
	 * @return ErrorObject|Subscription|null
	 */
	public static function create($plan_id, $billing_cycle_anchor)
	{
		$subscriptions = new DyDo_StripeAPI_Subscriptions();

		// Get customer
		$customer = DyDo_Stripe_Customers::retrieve();
		if ($customer instanceof ErrorObject) {
			return $customer;
		}

		// Create subscription
		return $subscriptions->create($customer->id, $plan_id, $billing_cycle_anchor);
	}

	/**
	 * @param string $subscription_id
	 * @param array  $data
	 *
	 * @return ErrorObject|Subscription|null
	 */
	public static function update($subscription_id, $data)
	{
		$subscriptions = new DyDo_StripeAPI_Subscriptions();
		$result =  $subscriptions->update($subscription_id, $data);
		if ($result instanceof ErrorObject) {
			return $result;
		}
		return  $result;
	}

	/**
	 * @param string $subscription_id
	 *
	 * @return ErrorObject|Subscription|null
	 */
	public static function subscribe($subscription_id)
	{
		return self::update(
			$subscription_id,
			array(
				'pause_collection' => '',
			)
		);
	}

	/**
	 * @param string $subscription_id
	 *
	 * @return ErrorObject|Subscription|null
	 */
	public static function unsubscribe($subscription_id)
	{
		return self::update(
			$subscription_id,
			array(
				'pause_collection' => array('behavior' => 'void'),
			)
		);
	}

	/**
	 * @param string $subscription_id
	 * @param string $new_date
	 * @return ErrorObject|Subscription|null
	 */
	public static function update_subscription_date($subscription_id, $new_date)
	{
		$result =  self::update(
			$subscription_id,
			array(
				'trial_end'          => $new_date,
				'proration_behavior' => 'none',
			)
		);

		if ($result  instanceof ErrorObject) {
			return $result;
		}

		dydo_update_donation(
			array(
				'next_payment_attempt' => $new_date,
				'updated_at' => wp_date('Y-m-d H:i:s')
			),
			array(
				'subscription_id' => $subscription_id,
			),
			DYDO_SUBSCRIPTION_TABLENAME
		);
		return $result;
	}

	/**
	 * @param string $subscription_id
	 * @param string $new_amount
	 * @return ErrorObject|Subscription|null
	 */

	public static function update_subscription_amount($subscription_id, $new_amount)
	{
		$subscription = self::get($subscription_id);
		$old_price    = DyDo_Stripe_Prices::retrieve($subscription->items->data[0]->plan->id);
		$old_price    = json_decode(json_encode($old_price), true);
		$plan         = array(
			'amount'   => $new_amount,
			'period'   => array(
				'mode'          => $old_price['recurring']['interval'],
				'interval'      => $old_price['recurring']['interval'],
				'intervalCount' => $old_price['recurring']['interval_count'],
			),
			'currency' => $old_price['currency'],
		);
		$product      = DyDo_Stripe_Products::create($new_amount);

		if ($product instanceof ErrorObject) {
			return $product;
		}

		$plan = DyDo_Stripe_Plans::create($product->id, $plan);
		if ($plan instanceof ErrorObject) {
			return $plan;
		}

		$subs_update = self::update(
			$subscription_id,
			array(
				'cancel_at_period_end' => false,
				'proration_behavior'   => 'none',
				'items'                => array(
					array(
						'id'    => $subscription->items->data[0]->id,
						'price' => $plan->id,
					),
				),
			)
		);

		if ($subs_update instanceof ErrorObject) {
			return $subs_update;
		}

		dydo_update_donation(
			array(
				'amount' => $new_amount,
				'updated_at' =>  wp_date('Y-m-d H:i:s')
			),
			array(
				'subscription_id' => $subscription_id,
			),
			DYDO_SUBSCRIPTION_TABLENAME
		);
		return $subs_update;
	}

		/**
	 * @param string $subscription_id
	 * @param string $payment_method_id
	 * @return ErrorObject|Subscription|null
	 */

	 public static function update_subscription_payment_method($subscription_id, $payment_method_id)
	 {
 
		 $subs_update = self::update(
			 $subscription_id,
			 array(
				 'default_payment_method' => $payment_method_id,
			 )
		 );

		 if ($subs_update instanceof ErrorObject) {
			throw new Exception($subs_update->message);
		 }

		 return $subs_update;
	 }

	public static function cancel_subscription($subscription_id)
	{
		$subscriptions = new DyDo_StripeAPI_Subscriptions();
		$result =  $subscriptions->cancel(
			$subscription_id
		);

		if ($result  instanceof ErrorObject) {
			throw new Exception($result->message);
		}

		dydo_update_donation(
			array(
				'active' => 0,
			),
			array(
				'subscription_id' => $subscription_id,
			),
			DYDO_SUBSCRIPTION_TABLENAME
		);
		return $result;
	}
}
