<?php

/**
 * Admin side notice for onboard.
 * php version 7.4.33
 *
 * @category Woocommerce-plugin
 * @package  instacashBnpl
 * @author   Fintrous Group Kft. <fintrous.com>
 * @license  GNU General Public License v3.0
 * @link     https://instacash.hu/
 */

if ( ! defined( 'ABSPATH' ) ) exit; // Exit if accessed directly

?>
<div id="merchantNotice" class="notice InstaCash-notice is-dismissible">
    <div class="flex">
        <div class="vertical-center">
            <?php require 'logo.svg'; ?>
        </div>
        <div class="col">
            <p class="onboarding-title">
                <?php esc_html_e('Thank you for choosing the InstaCash`s payment solution!', 'instacash-bnpl'); ?>
            </p>
            <p>
                <?php esc_html_e('Easy installment payments! Boost sales in your webshop.', 'instacash-bnpl'); ?><br/>
                <?php esc_html_e('You can acquire new customers and encourage your existing customers to buy again with installment payments that can be customized to your own brand of instacash.', 'instacash-bnpl'); ?><br/>
                <?php esc_html_e('Feel free to contact us regarding the data required to use the module!', 'instacash-bnpl'); ?>
            </p>
        </div>
        <div class="vertical-center">
            <a href="<?php print esc_url($merchantPortal); ?>" target="_blank" class="ic-primary ic-btn">
                <?php esc_html_e('More info', 'instacash-bnpl'); ?>
            </a>
        </div>
    </div>
</div>
