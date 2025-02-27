<?php

if (!defined('ABSPATH')) {
    exit;
}

function revi_styles()
{
    $plugin_data = get_plugin_data(WP_PLUGIN_DIR . '/revi-io-customer-and-product-reviews/revi.php');
    wp_enqueue_style('inner_css', REVI_PLUGIN_URL . 'assets/css/front.css?v=' . $plugin_data['Version']);
}

function revi_scripts()
{
    wp_enqueue_script('revi-widgets-script', REVI_WIDGETS_URL . 'embed/widget.js', array('jquery'), '1.0.0', true);
}


function revi_register_query_var($vars)
{
    $vars[] = 'revi_page';
    return $vars;
}

function revi_template_include($template)
{
    if (isset($_GET['revi_page'])) {
        if (isset($_GET['revi_page']) && $_GET['revi_page'] == "orders") {
            require_once(REVI_DIR . 'controllers/orders.php');
            new revi_orders();
        }
        if (isset($_GET['revi_page']) && $_GET['revi_page'] == "sync") {
            require_once(REVI_DIR . 'controllers/sync.php');
            new revi_sync();
        }
        if (isset($_GET['revi_page']) && $_GET['revi_page'] == "products") {
            require_once(REVI_DIR . 'controllers/products.php');
            new revi_products();
        }
        if (isset($_GET['revi_page']) && $_GET['revi_page'] == "connection") {
            require_once(REVI_DIR . 'controllers/connection.php');
            new revi_connection();
        }
    }

    return $template;
}
