<?php
namespace WooCommerce\NoFraud\Api;

if (!defined('ABSPATH')) {
	exit; // Exit if accessed directly
}

use WooCommerce\NoFraud\Common\Debug;
use WooCommerce\NoFraud\Common\Environment;
use WooCommerce\NoFraud\Common\Database;
use WooCommerce\NoFraud\Payment\Transactions\Transaction_Scheduler;
use WooCommerce\NoFraud\Payment\Transactions\Transaction_Manager;
use WooCommerce\NoFraud\Payment\Transactions\Constants;

class Api {

    /**
     * Registers the class's hooks and actions with WordPress.
     */
    public static function register() {
        $instance = new self();

        $woocommerce_nofraud_enable_rest_api = get_option('woocommerce_nofraud_enable_rest_api', false);
        if (!empty($woocommerce_nofraud_enable_rest_api)) {
            add_action( 'rest_api_init', function () {
                register_rest_route( 'nf', '/transactions/refresh/', array(
                    'methods'  => 'GET',
                    'callback' => [ get_called_class(), 'transactions_refresh' ],
                ));

                register_rest_route( 'nf', '/transactions/reprocess/run/(?P<startdate>[0-9-]+)/(?P<enddate>[0-9-]+)/', [
                    'methods'  => 'GET',
                    'callback' => [ get_called_class(), 'reprocess_transactions_run' ],
                    'args'     => [
                        'startdate' => [
                            'required'          => true,
                            'validate_callback' => function ($param, $request, $key) {
                                // Validate the MySQL datetime format
                                return (bool) preg_match('/^\d{4}-\d{2}-\d{2}$/', $param);
                            },
                            'sanitize_callback' => 'sanitize_text_field',
                            'description'       => 'MySQL datetime string in the format YYYY-MM-DD',
                        ],
                        'enddate' => [
                            'required'          => true,
                            'validate_callback' => function ($param, $request, $key) {
                                // Validate the MySQL datetime format
                                return (bool) preg_match('/^\d{4}-\d{2}-\d{2}$/', $param);
                            },
                            'sanitize_callback' => 'sanitize_text_field',
                            'description'       => 'MySQL datetime string in the format YYYY-MM-DD',
                        ],
                    ],
                    'permission_callback' => '__return_true',
                ]);

                register_rest_route( 'nf', '/transactions/reprocess/count/(?P<startdate>[0-9-]+)/(?P<enddate>[0-9-]+)/', [
                    'methods'  => 'GET',
                    'callback' => [ get_called_class(), 'reprocess_transactions_count' ],
                    'args'     => [
                        'startdate' => [
                            'required'          => true,
                            'validate_callback' => function ($param, $request, $key) {
                                // Validate the MySQL datetime format
                                return (bool) preg_match('/^\d{4}-\d{2}-\d{2}$/', $param);
                            },
                            'sanitize_callback' => 'sanitize_text_field',
                            'description'       => 'MySQL datetime string in the format YYYY-MM-DD',
                        ],
                        'enddate' => [
                            'required'          => true,
                            'validate_callback' => function ($param, $request, $key) {
                                // Validate the MySQL datetime format
                                return (bool) preg_match('/^\d{4}-\d{2}-\d{2}$/', $param);
                            },
                            'sanitize_callback' => 'sanitize_text_field',
                            'description'       => 'MySQL datetime string in the format YYYY-MM-DD',
                        ],
                    ],
                    'permission_callback' => '__return_true',
                ]);

                register_rest_route( 'nf', '/transactions/reprocess/completed/', [
                    'methods'  => 'GET',
                    'callback' => [ get_called_class(), 'reprocess_transactions_count_completed' ],
                    'args'     => [
                    ],
                    'permission_callback' => '__return_true',
                ]);
            });
        }

        add_action('woocommerce_rest_prepare_shop_order_object', [$instance, 'nf_add_data_to_rest_api'], 10, 3);
    }

    /**
     * Callback function to handle the reprocessing of transactions.
     *
     * @param WP_REST_Request $request The REST request.
     * @return WP_REST_Response The response.
     */
    public static function reprocess_transactions_run($request) {
        $startdate = $request->get_param('startdate');
        $enddate = $request->get_param('enddate');

        global $wpdb;

        $startdate = $request->get_param('startdate') . ' 00:00:00';
        $enddate = $request->get_param('enddate') . ' 23:59:59';

        // fetch count of all orders placed in this range that are eligible for reprocessing
        $nfTransactionsTable = $wpdb->prefix . "nf_transactions";
        $wcOrdersTable = $wpdb->prefix . "wc_orders";
        $sql = $wpdb->prepare("
            SELECT 
                nft.*
            FROM 
                {$wcOrdersTable} wco
            INNER JOIN 
                {$nfTransactionsTable} nft 
            ON
                (
                    nft.meta_value = 'reprocess'
                    OR
                    nft.meta_value = 'gatewaydisabled'
                )
                AND            
                nft.meta_key = '_nofraud_transaction_review_status'
                AND
                nft.order_id = wco.id    
            WHERE
                wco.date_created_gmt <= %s  
                AND
                wco.date_created_gmt >= %s
                AND
                wco.status NOT IN ('wc-completed', 'wc-cancelled', 'wc-refunded', 'wc-failed')
                AND
                wco.type = 'shop_order'
        ", $enddate, $startdate);

        if ('yes' !== get_option('woocommerce_custom_orders_table_enabled')) {
            $wcPostsTable = $wpdb->prefix . "posts";
            $sql = $wpdb->prepare("
            SELECT 
                nft.*
            FROM 
                {$wcPostsTable} wpt
            INNER JOIN 
                {$nfTransactionsTable} nft 
            ON
                (
                    nft.meta_value = 'reprocess'
                    OR
                    nft.meta_value = 'gatewaydisabled'
                )
                AND            
                nft.meta_key = '_nofraud_transaction_review_status'
                AND
                nft.order_id = wpt.id    
            WHERE
                wpt.post_date_gmt <= %s  
                AND
                wpt.post_date_gmt >= %s
                AND
                wpt.post_status NOT IN ('wc-completed', 'wc-cancelled', 'wc-refunded', 'wc-failed')
                AND
                wpt.post_type = 'shop_order'
        ", $enddate, $startdate);
        }

        $results = $wpdb->get_results($sql, ARRAY_A);

        $count = 0;
        if ($results === null) {
            $response_data = [
                'message'  => 'Error encountered running reprocessing',
                'success'  => false,
                'startdate' => $startdate,
                'enddate' => $enddate,
                'wpdb_error' => $wpdb->last_error,
            ];

            return new \WP_REST_Response($response_data, 200);
        }

        $transaction_agent = new Transaction_Manager();
        $count = 0;
        if (!empty($results)) {
            foreach ($results as $nftTransactionObj) {
                $reprocessCount = Database::get_nf_data($nftTransactionObj['order_id'],Constants::TRANSACTION_STATUS_REPROCESS_COUNT_KEY, false);
                if (!empty($reprocessCount)) {
                    $reprocessCount = $reprocessCount + 1;
                }
                else {
                    $reprocessCount = 1;
                }

                // limit reproess attempts to 2 at most
                if ($reprocessCount < 3) {
                    Database::update_nf_data($nftTransactionObj['order_id'],Constants::TRANSACTION_STATUS_KEY, Constants::TRANSACTION_STATUS_REPROCESS);
                    Database::update_nf_data($nftTransactionObj['order_id'],Constants::TRANSACTION_STATUS_REPROCESS_COUNT_KEY, $reprocessCount);
                    $transaction_agent->evaluate_transaction($nftTransactionObj['order_id'], [
                        'TRANSACTION_REVIEW_REFRESH_LIMIT' => (Transaction_Manager::TRANSACTION_REVIEW_REFRESH_LIMIT*4),
                        'MARK_REPROCESSED' => true
                    ]);

                    // only mark completed if evaluated
                    if (Database::get_nf_data($nftTransactionObj['order_id'],Constants::TRANSACTION_STATUS_KEY) == Constants::TRANSACTION_STATUS_REPROCESS_EVALUATED) {
                        Database::update_nf_data($nftTransactionObj['order_id'],Constants::TRANSACTION_STATUS_KEY, Constants::TRANSACTION_STATUS_REPROCESS_COMPLETE);
                    }

                    $count++;
                }
                else {
                    Database::update_nf_data($nftTransactionObj['order_id'],Constants::TRANSACTION_STATUS_KEY, Constants::TRANSACTION_STATUS_REPROCESS_FAILED);
                }
            }
        }

        $response_data = [
            'message'  => 'Reprocessing run finished successfully.',
            'success'  => true,
            'startdate' => $startdate,
            'enddate' => $enddate,
            'count' => $count,
        ];

        return new \WP_REST_Response($response_data, 200);
    }

    /**
     * Callback function to fetch how many transactions are eligible for reprocessing
     *
     * @param WP_REST_Request $request The REST request.
     * @return WP_REST_Response The response.
     */
    public static function reprocess_transactions_count($request) {
        global $wpdb;

        $startdate = $request->get_param('startdate') . ' 00:00:00';
        $enddate = $request->get_param('enddate') . ' 23:59:59';

        // fetch count of all orders placed in this range that are eligible for reprocessing
        $nfTransactionsTable = $wpdb->prefix . "nf_transactions";
        $wcOrdersTable = $wpdb->prefix . "wc_orders";
        $sql = $wpdb->prepare("
            SELECT 
                count(distinct(nft.order_id)) as totalCount
            FROM 
                {$wcOrdersTable} wco
            INNER JOIN 
                {$nfTransactionsTable} nft 
            ON
                (
                    nft.meta_value = 'reprocess'
                    OR
                    nft.meta_value = 'gatewaydisabled'
                )
                AND            
                nft.meta_key = '_nofraud_transaction_review_status'
                AND
                nft.order_id = wco.id    
            WHERE
                wco.date_created_gmt <= %s  
                AND
                wco.date_created_gmt >= %s
                AND
                wco.status NOT IN ('wc-completed', 'wc-cancelled', 'wc-refunded', 'wc-failed')
                AND
                wco.type = 'shop_order'
        ", $enddate, $startdate);
        if ('yes' !== get_option('woocommerce_custom_orders_table_enabled')) {
            $wcPostsTable = $wpdb->prefix . "posts";
            $sql = $wpdb->prepare("
            SELECT 
                count(distinct(nft.order_id)) as totalCount
            FROM 
                {$wcPostsTable} wpt
            INNER JOIN 
                {$nfTransactionsTable} nft 
            ON
                (
                    nft.meta_value = 'reprocess'
                    OR
                    nft.meta_value = 'gatewaydisabled'
                )
                AND            
                nft.meta_key = '_nofraud_transaction_review_status'
                AND
                nft.order_id = wpt.id    
            WHERE
                wpt.post_date_gmt <= %s  
                AND
                wpt.post_date_gmt >= %s
                AND
                wpt.post_status NOT IN ('wc-completed', 'wc-cancelled', 'wc-refunded', 'wc-failed')
                AND
                wpt.post_type = 'shop_order'
        ", $enddate, $startdate);
        }

        $results = $wpdb->get_results($sql, ARRAY_A);

        $count = 0;
        if ($results === null) {
            $response_data = [
                'message'  => 'Reprocess eligible count failed',
                'success'  => false,
                'startdate' => $startdate,
                'enddate' => $enddate,
                'wpdb_error' => $wpdb->last_error,
            ];

            return new \WP_REST_Response($response_data, 200);
        }

        $sampleData = [];
        if (!empty($results)) {
            $count = $results[0]['totalCount'];

            $sql = $wpdb->prepare("
                SELECT 
                    wco.id as order_id, wco.type, wco.date_created_gmt, wco.status, nft.meta_key, nft.meta_value
                FROM 
                    {$wcOrdersTable} wco
                INNER JOIN 
                    {$nfTransactionsTable} nft 
                ON
                    (
                        nft.meta_value = 'reprocess'
                        OR
                        nft.meta_value = 'gatewaydisabled'
                    )
                    AND            
                    nft.meta_key = '_nofraud_transaction_review_status'
                    AND
                    nft.order_id = wco.id    
                WHERE
                    wco.date_created_gmt <= %s  
                    AND
                    wco.date_created_gmt >= %s
                    AND
                    wco.status NOT IN ('wc-completed', 'wc-cancelled', 'wc-refunded', 'wc-failed')
                    AND
                    wco.type = 'shop_order'
                LIMIT 3
            ", $enddate, $startdate);
            if ('yes' !== get_option('woocommerce_custom_orders_table_enabled')) {
                $wcPostsTable = $wpdb->prefix . "posts";
                $sql = $wpdb->prepare("
                SELECT 
                    wpt.id as order_id, wpt.post_type, wpt.post_date_gmt, wpt.post_status, nft.meta_key, nft.meta_value
                FROM 
                    {$wcPostsTable} wpt
                INNER JOIN 
                    {$nfTransactionsTable} nft 
                ON
                    (
                        nft.meta_value = 'reprocess'
                        OR
                        nft.meta_value = 'gatewaydisabled'
                    )
                    AND            
                    nft.meta_key = '_nofraud_transaction_review_status'
                    AND
                    nft.order_id = wpt.id    
                WHERE
                    wpt.post_date_gmt <= %s  
                    AND
                    wpt.post_date_gmt >= %s
                    AND
                    wpt.post_status NOT IN ('wc-completed', 'wc-cancelled', 'wc-refunded', 'wc-failed')
                    AND
                    wpt.post_type = 'shop_order'
                LIMIT 3
            ", $enddate, $startdate);
            }
            $sampleData = $wpdb->get_results($sql, ARRAY_A);
        }

        $response_data = [
            'message'  => 'Reprocess eligible count succeeded. Note that just because an order is in this list does not mean it is fully eligible to be reprocessed. There are further checks to determine eligibility and some orders can be failed out.',
            'success'  => true,
            'startdate' => $startdate,
            'enddate' => $enddate,
            'count' => $count,
            'sample' => $sampleData,
        ];

        return new \WP_REST_Response($response_data, 200);
    }

    /**
     * Callback function to fetch reprocess completion data
     *
     * @param WP_REST_Request $request The REST request.
     * @return WP_REST_Response The response.
     */
    public static function reprocess_transactions_count_completed($request) {
        global $wpdb;

        $startdate = $request->get_param('startdate') . ' 00:00:00';
        $enddate = $request->get_param('enddate') . ' 23:59:59';

        // fetch count of all orders placed in this range that are eligible for reprocessing
        $nfTransactionsTable = $wpdb->prefix . "nf_transactions";
        $wcOrdersTable = $wpdb->prefix . "wc_orders";
        $sql = $wpdb->prepare("
            SELECT 
                nft.meta_value, count(distinct(nft.order_id)) as totalCount
            FROM    
                {$nfTransactionsTable} nft 
            WHERE
                (
                    nft.meta_value = 'reprocess'
                    OR
                    nft.meta_value = 'reprocessfailed'                    
                    OR
                    nft.meta_value = 'reprocessevaluated'                    
                    OR
                    nft.meta_value = 'reprocesscomplete'
                )
                AND            
                nft.meta_key = '_nofraud_transaction_review_status'
            GROUP BY
                nft.meta_value    
        ", $enddate, $startdate);
        $results = $wpdb->get_results($sql, ARRAY_A);

        $count = 0;
        if ($results === null) {
            $response_data = [
                'message'  => 'Reprocess totals count failed',
                'success'  => false,
                'wpdb_error' => $wpdb->last_error,
            ];

            return new \WP_REST_Response($response_data, 200);
        }
        $completed_count = 0;
        $reprocessing_count = 0;
        $failed_noteligible_count = 0;
        $evaluated_but_not_completed_count = 0;
        if (!empty($results)) {
            foreach ($results as $resultObj) {
                if ($resultObj['meta_value'] === Constants::TRANSACTION_STATUS_REPROCESS) {
                    $reprocessing_count = $resultObj['totalCount'];
                }
                if ($resultObj['meta_value'] === Constants::TRANSACTION_STATUS_REPROCESS_COMPLETE) {
                    $completed_count = $resultObj['totalCount'];
                }
                if ($resultObj['meta_value'] === Constants::TRANSACTION_STATUS_REPROCESS_FAILED) {
                    $failed_noteligible_count = $resultObj['totalCount'];
                }
                if ($resultObj['meta_value'] === Constants::TRANSACTION_STATUS_REPROCESS_EVALUATED) {
                    $evaluated_but_not_completed_count = $resultObj['totalCount'];
                }
            }
        }

        $response_data = [
            'message'  => 'Reprocess completed count succeeded. evaluated_but_not_completed_count should be 0.',
            'success'  => true,
            'completed_count' => $completed_count,
            'reprocessing_count' => $reprocessing_count,
            'failed_noteligible_count' => $failed_noteligible_count,
            'evaluated_but_not_completed_count' => $evaluated_but_not_completed_count,
        ];

        return new \WP_REST_Response($response_data, 200);
    }

    /**
     * Force refreshes transactions
     *
     * @return array
     */
    public static function transactions_refresh( \WP_REST_Request $request ) {
        $transaction_scheduler = Transaction_Scheduler::register();
        $transaction_scheduler->refresh_transaction_reviews();
        return [
            'success' => true,
        ];
    }

	/**
	 * Get Merchant.
	 *
	 * @return stdObject|false NoFraud Merchant.
	 *
	 * @since 2.1.0
	 */
	public static function get_merchant() {
		$api_key = get_option('woocommerce_nofraud_api_key', '');
		if (empty($api_key)) {
			return false;
		}

		$url = Environment::get_service_url('api') . '/v1/internal/merchants';
		$args = [
			'timeout' => 30,
			'redirection' => 5,
			'blocking' => true,
			'headers' => [
				'nf-token' => $api_key,
			],
		];

		$response = wp_remote_get($url, $args);
		return self::get_response_body($response);
	}
    
    /**
     * Get transaction screening result
     *
     * @param int $transaction_review_id NoFraud transaction review id.
     * @return stdObject|false NoFraud transaction screening result
     *
     * @since 3.0.0
     */
    public static function get_transaction_screening_result( $transaction_review_id ) {
        Debug::add_debug_message([
            'function' => 'get_transaction_screening_result:start',
            'transaction_review_id' => $transaction_review_id,
        ]);

        $api_key = get_option('woocommerce_nofraud_api_key', '');
        if (empty($api_key)) {
            return false;
        }
    
        $additional_transaction_data = [
            'nf_token' => $api_key,
            'transaction_id' => $transaction_review_id,
        ];
    
        $url = Environment::get_service_url('portal-api') . '/api/v1/transaction-update/override-status';
        $args = [
            'body' => json_encode($additional_transaction_data),
            'timeout' => 60,
            'redirection' => 5,
            'blocking' => true,
            'headers' => [
                'Content-Type' => 'application/json',
            ],
            'cookies' => [],
        ];
    
        $additional_response = wp_remote_post($url, $args);
        $additional_response_body = self::get_response_body($additional_response);

        Debug::add_debug_message([
            'function' => 'get_transaction_screening_result:end',
            'apiEndpoint' => $url,
            'transaction_review_id' => $transaction_review_id,
            'response' => $additional_response,
        ]);

        return $additional_response_body;
    }
	
	/**
	 * Get transaction review.
	 *
	 * @param int $transaction_review_id NoFraud transaction review id.
	 * @return stdObject|false NoFraud transaction review.
	 *
	 * @since 2.1.0
	 */
	public static function get_transaction_review( $transaction_review_id ) {
        Debug::add_debug_message([
            'function' => 'get_transaction_review:start',
            'transaction_review_id' => $transaction_review_id,
        ]);

		$api_key = get_option('woocommerce_nofraud_api_key', '');
		if (empty($api_key)) {
			return false;
		}

		$url = Environment::get_service_url('api') . '/status_by_url/' . $api_key . '/' . $transaction_review_id;
		$args = [
			'timeout' => 30,
			'redirection' => 5,
			'blocking' => true,
			'headers' => [
				'nf-token' => $api_key,
			],
		];

		$response = wp_remote_get($url, $args);
        $response_body = self::get_response_body($response);

        Debug::add_debug_message([
            'function' => 'get_transaction_review:end',
            'apiEndpoint' => $url,
            'transaction_review_id' => $transaction_review_id,
            'response_body' => $response_body,
        ]);

        return $response_body;
	}

	/**
	 * Post transaction review.
	 *
	 * @param array $transaction_data NoFraud transaction data.
	 * @return stdObject|false NoFraud transaction review.
	 *
	 * @since 2.1.0
	 */
	public static function post_transaction_review( $transaction_data ) {
        Debug::add_debug_message([
            'function' => 'post_transaction_review:start',
            'transaction_data' => $transaction_data,
        ]);

		$api_key = get_option('woocommerce_nofraud_api_key', '');
		if (empty($api_key)) {
			return false;
		}

		$url = Environment::get_service_url('api');
		$args = [
			'body' => json_encode($transaction_data),
			'timeout' => 60,
			'redirection' => 5,
			'blocking' => true,
			'headers' => [
				'Content-Type' => 'application/json',
				'nf-token' => $api_key,
			],
			'cookies' => [],
		];

		$response = wp_remote_post($url, $args);
        $response_body = self::get_response_body($response);

        Debug::add_debug_message([
            'function' => 'post_transaction_review:end',
            'apiEndpoint' => $url,
            'invoiceNumber' => $transaction_data['order']['invoiceNumber'],
            'response' => $response,
        ]);

		return $response_body;
	}

	/**
	 * Cancel transaction review.
	 *
	 * @param string $transaction_review_id NoFraud transaction review id.
	 * @return stdObject|false NoFraud cancel transaction response.
	 *
	 * @since 2.1.4
	 */
	public static function cancel_transaction_review( $transaction_review_id ) {
        Debug::add_debug_message([
            'function' => 'cancel_transaction_review:start',
            'transaction_review_id' => $transaction_review_id,
        ]);

		$api_key = get_option('woocommerce_nofraud_api_key', '');
		if (empty($api_key)) {
			return false;
		}

		$url = Environment::get_service_url('portal-api') . '/api/v1/transaction-update/cancel-transaction';
		$body = json_encode([
			'nf_token' => $api_key,
			'transaction_id' => $transaction_review_id,
		]);
		$args = [
			'body' => $body,
			'timeout' => 30,
			'redirection' => 5,
			'blocking' => true,
			'headers' => [
				'Content-Type' => 'application/json',
			],
		];

		$response = wp_remote_post($url, $args);

        Debug::add_debug_message([
            'function' => 'cancel_transaction_review:end',
            'apiEndpoint' => $url,
            'transaction_review_id' => $transaction_review_id,
            'response' => $response,
        ]);

		return self::get_response_body($response);
	}
    
    /**
     * Update transaction address
     *
     * @param string $transaction_review_id NoFraud transaction review id.
     * @param array $woocommerce_transaction_data NoFraud request body
     * @return stdObject|false NoFraud transaction review.
     *
     * @since 2.1.0
     */
    public static function update_transaction_address( $transaction_review_id, $woocommerce_transaction_data ) {
        Debug::add_debug_message([
            'function' => 'update_transaction_address:start',
            'transaction_review_id' => $transaction_review_id,
        ]);

        $api_key = get_option('woocommerce_nofraud_api_key', '');
        if (empty($api_key)) {
            return false;
        }
        
        //set up defaults if fields left blank
        $woocommerce_transaction_data['shipTo']['firstName'] = (!empty($woocommerce_transaction_data['shipTo']['firstName'])) ? $woocommerce_transaction_data['shipTo']['firstName'] : '';
        $woocommerce_transaction_data['shipTo']['lastName'] = (!empty($woocommerce_transaction_data['shipTo']['lastName'])) ? $woocommerce_transaction_data['shipTo']['lastName'] : '';
        $woocommerce_transaction_data['shipTo']['company'] = (!empty($woocommerce_transaction_data['shipTo']['company'])) ? $woocommerce_transaction_data['shipTo']['company'] : '';
        $woocommerce_transaction_data['shipTo']['address'] = (!empty($woocommerce_transaction_data['shipTo']['address'])) ? $woocommerce_transaction_data['shipTo']['address'] : '';
        $woocommerce_transaction_data['shipTo']['city'] = (!empty($woocommerce_transaction_data['shipTo']['city'])) ? $woocommerce_transaction_data['shipTo']['city'] : '';
        $woocommerce_transaction_data['shipTo']['state'] = (!empty($woocommerce_transaction_data['shipTo']['state'])) ? $woocommerce_transaction_data['shipTo']['state'] : '';
        $woocommerce_transaction_data['shipTo']['zip'] = (!empty($woocommerce_transaction_data['shipTo']['zip'])) ? $woocommerce_transaction_data['shipTo']['zip'] : '';
        $woocommerce_transaction_data['shipTo']['country'] = (!empty($woocommerce_transaction_data['shipTo']['country'])) ? $woocommerce_transaction_data['shipTo']['country'] : '';
        
        //build appropriate body package from $woocommerce_transaction_data
        $transaction_data = [
			'nf_token' => $api_key,
			'transaction_id' => $transaction_review_id,
            'update_data' => [
                'shipTo' => [
                    'firstName' => $woocommerce_transaction_data['shipTo']['firstName'],
                    'lastName' => $woocommerce_transaction_data['shipTo']['lastName'],
                    'company' => $woocommerce_transaction_data['shipTo']['company'],
                    'address' => $woocommerce_transaction_data['shipTo']['address'],
                    'city' => $woocommerce_transaction_data['shipTo']['city'],
                    'state' => $woocommerce_transaction_data['shipTo']['state'],
                    'zip' => $woocommerce_transaction_data['shipTo']['zip'],
                    'country' => $woocommerce_transaction_data['shipTo']['country'],
                ],
            ]
        ];
        
        $url = Environment::get_service_url('portal-api') . '/api/v1/transaction-update/update-data';
        $args = [
            'body' => json_encode($transaction_data),
            'timeout' => 60,
            'redirection' => 5,
            'blocking' => true,
            'headers' => [
                'Content-Type' => 'application/json',
            ],
            'cookies' => [],
        ];
        
        $response = wp_remote_post($url, $args);

        Debug::add_debug_message([
            'function' => 'update_transaction_address:end',
            'apiEndpoint' => $url,
            'transaction_review_id' => $transaction_review_id,
            'response' => $response,
        ]);

        return self::get_response_body($response);
    }

	/**
	 * Get Response body.
	 *
	 * @param string $caller_function_name The caller function's name.
	 * @return string|false The response body.
	 */
	private static function get_response_body( $response ) {
		if (is_wp_error($response)) {
			$error_message = $response->get_error_message();
			// debug_backtrace() is to find the function name of the caller of this function.
			error_log('NoFraud error: ' . debug_backtrace(false, 2)[1]['function'] . ': ' . print_r($error_message, true));

            Debug::add_debug_message([
                'function' => 'get_response_body:error',
                'error' => $error_message,
            ]);

			return false;
		}

		$response_code = wp_remote_retrieve_response_code($response);
		$response_body = wp_remote_retrieve_body($response);
		if (200 !== $response_code && 404 !== $response_code) {
			// debug_backtrace() is to find the function name of the caller of this function.
			error_log('NoFraud error: ' . debug_backtrace(false, 2)[1]['function'] . ': Response code is "' . $response_code . '" with body "' . $response_body . '"');

            Debug::add_debug_message([
                'function' => 'get_response_body:error',
                'response_code' => $response_code,
                'response_body' => $response_body,
            ]);

			return false;
		}

		return $response_body ? json_decode($response_body) : $response_body;
	}

    /**
     * Add NoFraud metadata to woocommerce_rest_prepare_shop_order_object
     *
     * @since 4.5.0
     */
    function nf_add_data_to_rest_api( $response, $object, $request ) {

        if (empty($response->data['id'])) {
            return $response;
        }

        // Add custom field to the API response
        $custom_data = array(
            Constants::TRANSACTION_REVIEW_REFRESHABLE_KEY => Database::get_nf_data($response->data['id'], Constants::TRANSACTION_REVIEW_REFRESHABLE_KEY),
            Constants::TRANSACTION_REVIEW_KEY => Database::get_nf_data($response->data['id'], Constants::TRANSACTION_REVIEW_KEY),
            Constants::TRANSACTION_STATUS_KEY => Database::get_nf_data($response->data['id'], Constants::TRANSACTION_STATUS_KEY),
        );

        // Add the custom data to the response
        $response->data['nofraud_data'] = $custom_data;

        return $response;
    }
}

Api::register();
