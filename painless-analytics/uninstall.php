<?php
/*
* Uninstall for Painless Analytics plugin
*/

if ( ! defined( 'ABSPATH' ) ) exit; // Exit if accessed directly

if (!defined('WP_UNINSTALL_PLUGIN')) {
    die('Access denied');
}

/**
 * class painlessAnalyticsUninstall
 */
class painlessAnalyticsUninstall
{
    /**
     * painlessAnalyticsUninstall constructor.
     */
    public function __construct()
    {
        // Uninstall stuff here
    }
}

new painlessAnalyticsUninstall();

// eof