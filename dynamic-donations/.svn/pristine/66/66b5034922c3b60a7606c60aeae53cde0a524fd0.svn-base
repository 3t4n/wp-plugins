<?php

use Stripe\Collection;
use Stripe\ErrorObject;
use Stripe\Exception\ApiErrorException;
use Stripe\Subscription;

class DyDo_StripeAPI_Subscriptions extends DyDo_StripeAPI_Connect
{
    /**
     * @param string $customer_id
     * @param string $plan_id
     *
     * @return ErrorObject|Subscription|null
     */
    function create($customer_id, $plan_id, $billing_cycle_anchor= 'now')
    {
        try {
            $user = get_user_by('id', get_current_user_id());
            $params = [
                'customer' => $customer_id,
                'items'    => [
                    ['plan' => $plan_id],
                ],
                'proration_behavior' => 'none',
                'expand'   => ['latest_invoice.payment_intent'],
                'metadata'             => [
                    'wp_user_id'    => $user->ID,
                    'wp_user_email' => $user->user_email,
                ]
                ];
            if ($billing_cycle_anchor !='now' && is_numeric($billing_cycle_anchor)) {
                // $params['billing_cycle_anchor'] = $billing_cycle_anchor;
                $params['trial_end'] = $billing_cycle_anchor;
            }    
            return $this->stripe->subscriptions->create($params);
        } catch (ApiErrorException $e) {
            return $e->getError();
        }
    }

    /**
     * @param string $subscription_id
     * @param array $config
     *
     * @return ErrorObject|Subscription|null
     */
    public function update($subscription_id, $config)
    {
        try {
            return $this->stripe->subscriptions->update($subscription_id, $config);
        } catch (ApiErrorException $e) {
            return $e->getError();
        }
    }

    /**
     * @param string $subscription_id
     *
     * @return ErrorObject|Subscription|null
     */
    public function retrieve($subscription_id)
    {
        try {
            return $this->stripe->subscriptions->retrieve($subscription_id);
        } catch (ApiErrorException $e) {
            return $e->getError();
        }
    }

    /**
     * @param string $customer_id
     *
     * @return Collection|ErrorObject|null
     */
    public function all($customer_id)
    {
        try {
            return $this->stripe->subscriptions->all([
                'customer' => $customer_id,
                'limit'    => 100
            ]);
        } catch (ApiErrorException $e) {
            return $e->getError();
        }
    }

    public function cancel($subscription_id)
    {
        try {
            return $this->stripe->subscriptions->cancel(
                $subscription_id
            );
        } catch (ApiErrorException $e) {
            return $e->getError();
        }
    }
}
