<?php 
namespace Fattura24;

defined('ABSPATH') || die;

use Automattic\WooCommerce\Blocks\Package;
use Automattic\WooCommerce\StoreApi\Schemas\V1\CheckoutSchema;
use Automattic\WooCommerce\StoreApi\Schemas\V1\CartSchema;
use Automattic\WooCommerce\StoreApi\StoreApi;
use Automattic\WooCommerce\StoreApi\Schemas\ExtendSchema;

class Fattura24BillingBlock_Blocks_Extend_Store_Endpoint {
    
    private static $extend;

    const IDENTIFIER = 'fattura24-billing-block';

    public static function init() {
        self::$extend = StoreApi::container()->get(ExtendSchema::class);
        self::extend_store();
    }

    public static function extend_store() {
        if (is_callable([self::$extend, 'register_endpoint_data'])) {
            self::$extend->register_endpoint_data(
                [
                    'endpoint' => CheckoutSchema::IDENTIFIER,
                    'namespace' => self::IDENTIFIER,
                    'schema_callback' => [self::class, 'extend_checkout_schema'],
                    'schema_type' => ARRAY_A,
                ]
            );
        }
    }

    public static function extend_checkout_schema() {
        return array(
            'billing_checkbox' => array(
                'description' => __('I would like to receive an invoice', 'fattura24'),
                'type'        => array('boolean', 'false'),
                'readonly'    => true
            ),
            'billing_fiscalcode' => array(
                'description' => __('VAT Number', 'fattura24'),
                'type'        => array('string', 'null'),
                'readonly'    => true,
            ),
            'billing_vatcode' => array(
                'description' => __('Fiscal code', 'fattura24'),
                'type'        => array('string', 'null'),
                'readonly'    => true,
            ),
            'billing_pecaddress' => array(
                'description' => __('PEC address', 'fattura24'),
                'type'        => array('string', 'null'),
                'readonly'    => true,
            ),
            'billing_recipientcode' => array(
                'description' => __('SDI Code', 'fattura24'),
                'type'        => array('string', 'null'),
                'readonly'    => true,
            )
        );
    }
}