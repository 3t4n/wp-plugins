<?php

/**
 * Handle API connection to OLM for sending and getting Purcashe information.
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
 * Communication handler class.
 */
class Handler
{
    /**
     * Loan application handler API key.
     *
     * @var string
     */
    protected $apiKey;

    /**
     * Request handler class.
     *
     * @var Request
     */
    protected $request;

    /**
     * Init class.
     *
     * @param string $apiKey
     */
    public function __construct($apiKey)
    {
        $this->apiKey     = $apiKey;
        $this->request    = new Request();
    }

    /**
     * Get available offers from API.
     *
     * @return bool|\InstaCash\Psr\Http\Message\ResponseInterface
     */
    public function getOffers()
    {
        return Transport::send(
            $this->apiKey,
            [],
            'GET',
            'available-offers'
        );
    }

    /**
     * Send calculation data.
     *
     * @param int $offerId
     * @param int $amount
     *
     * @return bool|\InstaCash\Psr\Http\Message\ResponseInterface
     */
    public function sendCalculationRequest($offerId, $amount)
    {
        return Transport::send(
            $this->apiKey,
            $this->request->getCalculationRequest($amount)->getRequestArray(),
            'GET',
            'calculation/' . $offerId
        );
    }

    /**
     * Send Application data.
     *
     * @param array<string>     $payment
     * @param array<string>     $customer
     * @param array<int|string> $items
     *
     * @return bool|\InstaCash\Psr\Http\Message\ResponseInterface
     */
    public function sendApplicationRequest($payment, $customer, $items)
    {
        return Transport::send(
            $this->apiKey,
            $this->request->getPurcasheRequest($payment)->addCustomer($customer)->addItems($items)->getRequestJsonArray(),
            'POST',
            'application'
        );
    }

    /**
     * Get Application Status.
     *
     * @param string $type
     * @param string $requestId
     *
     * @return bool|\InstaCash\Psr\Http\Message\ResponseInterface
     */
    public function getStatus($type, $requestId)
    {
        return Transport::send(
            $this->apiKey,
            '',
            'GET',
            $type . '/' . $requestId
        );
    }

    /**
     * Delete Application.
     *
     * @param string $purchaseId
     *
     * @return bool|\InstaCash\Psr\Http\Message\ResponseInterface
     */
    public function deleteApplication($purchaseId)
    {
        return Transport::send(
            $this->apiKey,
            '',
            'DELETE',
            'application/' . $purchaseId
        );
    }
}
