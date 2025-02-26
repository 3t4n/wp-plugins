<?php

use Stripe\Webhook;
use Stripe\ErrorObject;


class DyDo_Stripe_Webhooks
{

	/**
	 * @param string $url
	 * @param array  $enabled_events
	 * @return ErrorObject|Webhook|null
	 */
	public static function create(string $url, array $enabled_events)
	{
		$webhook = new DyDo_StripeAPI_Webhooks();
		$result = $webhook->create(
			array(
				'url'            => $url,
				'enabled_events' => $enabled_events,
			)
		);
		if ($result instanceof ErrorObject) {
			return $result;
		}
		return $result;
	}

	/**
	 * @param string $webhook_id
	 * @return ErrorObject|Webhook|null
	 */
	public static function retrieve(string $webhook_id)
	{
		$webhook = new DyDo_StripeAPI_Webhooks();
		$result = $webhook->retrieve($webhook_id);
		if ($result instanceof ErrorObject) {
			return $result;
		}
		return $result;
	}

	/**
	 * @param string $webhook_id
	 * @return ErrorObject|Webhook|null
	 */
	public static function delete(string $webhook_id)
	{
		$webhook = new DyDo_StripeAPI_Webhooks();
		$result = $webhook->delete($webhook_id);
		if ($result instanceof ErrorObject) {
			return $result;
		}
		return $result;
	}
}
