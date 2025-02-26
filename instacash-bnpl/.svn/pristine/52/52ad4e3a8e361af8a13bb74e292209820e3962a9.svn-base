<?php

/**
 * Handle request arrays for API communication.
 * php version 7.4.33
 *
 * @category Woocommerce-plugin
 * @package  instacashBnpl
 * @author   Fintrous Group Kft. <fintrous.com>
 * @license  GNU General Public License v3.0
 * @link     https://instacash.hu/
 */

namespace InstaCash\BNPL;

if ( ! defined( 'ABSPATH' ) ) exit; // Exit if accessed directly

/**
 * Format request from the received data.
 */
class Request
{
    /**
     * Array of request data.
     *
     * @var array<array<int|string>|int|string>
     */
    protected $requestArray;

    /**
     * Format request Array to Calculator request.
     *
     * @param int $amount
     *
     * @return Request
     */
    public function getCalculationRequest($amount)
    {
        $this->requestArray = ['value' => $amount];

        return $this;
    }

    /**
     * Format request Array to Purchase request.
     *
     * @param array<string> $payment
     *
     * @return Request
     */
    public function getPurcasheRequest($payment)
    {
        $this->requestArray = $payment;

        return $this;
    }

    /**
     * Add items to request array.
     *
     * @param array<int|string> $items
     *
     * @return Request
     */
    public function addItems($items)
    {
        $this->requestArray += ['items' => $items];
        return $this;
    }

    /**
     * Add customer to request array.
     *
     * @param array<string> $customer
     *
     * @return Request
     */
    public function addCustomer($customer)
    {
        $phoneNumber = new Phone($customer['customerPhone'], \get_locale());
        if ($phoneNumber->isValid()) {
            $customer['customerPhone'] = $phoneNumber->formatNumber();
        }

        $this->requestArray += $customer;
        return $this;
    }

    /**
     * Format request Array to updateStatus request.
     *
     * @param string $status
     *
     * @return Request
     */
    public function updatePurcasheStatusRequest($status)
    {
        $this->requestArray = [
            'status' => $status,
        ];

        return $this;
    }

    /**
     * Returns currently request array.
     *
     * @return array<array<int|string>|int|string>
     */
    public function getRequestArray()
    {
        return $this->requestArray;
    }

    /**
     * Returns currentlyrequest array in json format.
     *
     * @return string|false
     */
    public function getRequestJsonArray()
    {
        return wp_json_encode($this->requestArray);
    }
}
