<?php

/**
 * All registered action's handlers should be in app\Hooks\Handlers,
 * addAction is similar to add_action and addCustomAction is just a
 * wrapper over add_action which will add a prefix to the hook name
 * using the plugin slug to make it unique in all wordpress plugins,
 * ex: $app->addCustomAction('foo', ['FooHandler', 'handleFoo']) is
 * equivalent to add_action('slug-foo', ['FooHandler', 'handleFoo']).
 */

/**
 * $app
 * @var ExactLinks\Framework\Foundation\Application
 */


$app->addCustomAction('handle_exception', 'ExceptionHandler@handle');
$app->addAction('admin_menu', 'AdminPageHandler@addMenuPage');
$app->addAction('admin_enqueue_scripts', 'AdminPageHandler@loadAssets');
$app->addAction('admin_init', 'AdminPageHandler@adminNotice', 11);
$app->addAction('init', 'RenderHandler@initLoading');

// Daily Broken check(Automation)
$app->addAction('exactlinks_daily_broken_link_check', 'BrokenLinkCheckHandler@dailyBrokenLinkChecker');

if (php_sapi_name() != 'cli') {

    if (defined('EXACTLINKS_VERSION')) {
        $app->addAction('rest_api_init', 'GutenbergApiHandler@registerRoutes');
        $app->addAction('enqueue_block_editor_assets', 'AdminPageHandler@gutenBlocksEditorAssets');
    }

    if ( ! is_admin() && isset( $_SERVER['REQUEST_METHOD'] ) && 'GET' === $_SERVER['REQUEST_METHOD'] ) {
        $app->addAction('wp_loaded', 'FrontendHandler@redirectionURL', 0);
    }

    if (!is_admin() && get_option('exactlinks_db_active')) {
        if (defined('WC_VERSION')) {
            $app->addAction('woocommerce_checkout_create_order', 'FrontendHandler@woocommerceCampaignMeta', 10, 2);
            $app->addAction('woocommerce_checkout_order_processed', 'FrontendHandler@woocommerceCompletePurchase', 10, 1);
            $app->addAction('woocommerce_order_details_after_order_table_items', 'FrontendHandler@WooCommerceConversionItems', 10, 1);
        }
    }

    if (defined( 'EDD_VERSION' )) {
        $app->addAction( 'edd_insert_payment', 'FrontendHandler@eddCampaignMeta', 99999, 2);
        $app->addAction( 'edd_complete_purchase', 'FrontendHandler@eddCompletePurchase', 9);
    }
}

