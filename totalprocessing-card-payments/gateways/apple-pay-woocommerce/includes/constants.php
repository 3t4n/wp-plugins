<?php

if ( ! defined( 'ABSPATH' ) ){ exit; }

define( 'TP_APPLEPAY_VERSION', '1.0.86' );
define( 'TP_APPLEPAY_PREFIX', 'tp_applepay_' );
define( 'TP_APPLEPAY_GATEWAY_ID', 'wc_tpapv2' );
define( 'TP_APPLEPAY_GATEWAY_TITLE', 'Applepay via Total processing' );
define( 'TP_APPLEPAY_GATEWAY_DESCRIPTION', 'Apple Pay button customisable in your payment flow. Shoppers can decide to continue with the normal checkout, or checkout with Apple Pay.' );
define( 'TP_APPLEPAY_GATEWAY_MERCHANT_SESSION_VALIDATION_URL', 'https://tpap2.totalprocessing.com/session' );
define( 'TP_APPLEPAY_GATEWAY_DOMAIN_VALIDATION_URL', 'https://applepay-v2.totalprocessing.com/service/registerWcMerchant.php' );
define( 'TP_APPLEPAY_GATEWAY_DECRYPTION_ENDPOINT', 'https://tpap2.totalprocessing.com/decrypt' );
define( 'TP_APPLEPAY_GATEWAY_DOMAIN_VERIFY_FILENAME', 'apple-developer-merchantid-domain-association' );
define( 'TP_APPLEPAY_DEBUG_CONTACT_EMAIL', 'plugins@totalprocessing.com' );
define( 'TP_APPLEPAY_SUPPORT_EMAIL', 'support@totalprocessing.com' );
