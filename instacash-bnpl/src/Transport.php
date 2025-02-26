<?php

/**
 * Transport http messages.
 * php version 7.4.33
 *
 * @category Woocommerce-plugin
 * @package  instacashBnpl
 * @author   Fintrous Group Kft. <fintrous.com>
 * @license  GNU General Public License v3.0
 * @link     https://instacash.hu/
 */

namespace InstaCash\BNPL;

use Exception;
use InstaCash\GuzzleHttp\Client;

if ( ! defined( 'ABSPATH' ) ) exit; // Exit if accessed directly

/**
 * Transport handler class.
 */
class Transport
{
    private const ROUTE = '/api/bnpl/external/';

    private const ERROR = 'Instacash service error: %s';

    /**
     * cURL data transport to OLM API.
     *
     * @param string                                           $apiKey
     * @param string|false|array<array<int|string>|int|string> $request
     * @param string                                           $method
     * @param string                                           $type
     *
     * @return bool|\InstaCash\Psr\Http\Message\ResponseInterface
     * @throws Exception
     */
    public static function send($apiKey, $request, $method, $type = '')
    {
        $options  = (array) \get_option(Config::OPTIONS_NAME);
        $mode     = ($options['test_mode'] === 'yes');
        $client   = new Client(['base_uri' => Config::getServer($mode) . self::ROUTE]);
        $bodyType = 'POST' === $method ? 'body' : 'query';

        try {
            return $client->request(
                $method,
                $type,
                [
                    'headers' => [
                        'Content-Type' => 'application/json; charset=UTF-8',
                        'X-API-KEY'    => $apiKey
                    ],
                    $bodyType => $request
                ]
            );
        } catch (Exception $e) {
            // Using WC's own logger so that the log is also available online.
            $logger = wc_get_logger();
            $logger->error(sprintf(self::ERROR, $e->getMessage()), ['source' => Config::LOG_NAME]);

            // log error message into standard log.
            // error_log(sprintf(self::ERROR, $e->getMessage()));
            return false;
        }
    }

    /**
     * In some cases, it may be necessary to send a notification.
     *
     * @param string $message
     * @param string $nonce
     *
     * @return bool|\InstaCash\Psr\Http\Message\ResponseInterface
     * @throws Exception
     */
    public static function sendNotification($message, $nonce)
    {
        if (!wp_verify_nonce($nonce, Config::NONCE_KEY)) {

            $logger = wc_get_logger();
            $logger->error(sprintf(self::ERROR, 'Nonce error'), ['source' => Config::LOG_NAME]);

            return false;
        }

        $client  = new Client(['base_uri' => Config::NOTIFICATION_CHANNEL]);

        try {
            return $client->request(
                'POST',
                '',
                [
                    'headers' => [
                        'Content-Type' => 'application/json; charset=UTF-8'
                    ],
                    'body'    => wp_json_encode( [ 'text' => $message ] )
                ]
            );
        } catch (Exception $e) {

            $logger = wc_get_logger();
            $logger->error(sprintf(self::ERROR, $e->getMessage()), ['source' => Config::LOG_NAME]);

            return false;
        }
    }
}
