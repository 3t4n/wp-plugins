<?php

use Stripe\ErrorObject;
use Stripe\Invoice;

class DyDo_Stripe_Invoices
{

	/**
	 * @param array $params
	 *
	 * @return Invoice
	 */
	public static function upcoming($params)
	{
		$invoice = new DyDo_StripeAPI_Invoices();
		return $invoice->upcoming($params);
	}

	/**
	 * @param string $invoice_id
	 *
	 * @return Invoice
	 */
	public static function retrieve($invoice_id)
	{
		$invoice = new DyDo_StripeAPI_Invoices();
		return $invoice->retrieve($invoice_id);
	}

	/**
	 * @param array $parameters
	 *
	 * @return Invoice
	 */
	public static function list_all_invoices(string $customer_id = '', string $subscription_id = '', string $status = '')
	{
		$parameters = array();
		if (
			$customer_id !== '' && isset($customer_id)
			&& !is_null($customer_id)
		) {
			$parameters['customer'] = $customer_id;
		}
		if (
			$subscription_id !== '' && isset($subscription_id)
			&& !is_null($subscription_id)
		) {
			$parameters['subscription'] = $subscription_id;
		}

		if (
			$status !== '' && isset($status)
			&& !is_null($status)
		) {
			$parameters['status'] = $status;
		}
		$invoice = new DyDo_StripeAPI_Invoices();
		if ($invoice instanceof ErrorObject) {
			if (strpos(strtolower($invoice->message), 'api') !== false) {
				throw new Exception("Api key missing or invalid", 1);
			}
			return false;
		}
		return $invoice->list_all_invoices($parameters);
	}
}
