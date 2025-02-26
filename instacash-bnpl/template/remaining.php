<?php

/**
 * Remaining amount notification for installment payment.
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
<div id="IC" class="remain-wrapper">
    <?php
        // Translators: %s as the remaining amount for bnpl.
        print wp_kses_post(sprintf(__('For installment payments %s needed.', 'instacash-bnpl'), wc_price($cart_min - $total)));
        if ($info) :
    ?>
        <div class="remain-info-icon" title="<?php echo esc_html($info); ?>">
            <svg fill="gray" version="1.1" id="Capa_1" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" width="16px" height="16px" viewBox="0 0 416.979 416.979" xml:space="preserve">
                <g>
                    <path d="M356.004,61.156c-81.37-81.47-213.377-81.551-294.848-0.182c-81.47,81.371-81.552,213.379-0.181,294.85 c81.369,81.47,213.378,81.551,294.849,0.181C437.293,274.636,437.375,142.626,356.004,61.156z M237.6,340.786 c0,3.217-2.607,5.822-5.822,5.822h-46.576c-3.215,0-5.822-2.605-5.822-5.822V167.885c0-3.217,2.607-5.822,5.822-5.822h46.576 c3.215,0,5.822,2.604,5.822,5.822V340.786z M208.49,137.901c-18.618,0-33.766-15.146-33.766-33.765 c0-18.617,15.147-33.766,33.766-33.766c18.619,0,33.766,15.148,33.766,33.766C242.256,122.755,227.107,137.901,208.49,137.901z"/>
                </g>
            </svg>
        </div>
    <?php endif; ?>
    <?php if ($details) : ?>
        <div><a href="<?php echo esc_url($details); ?>"><?php esc_html_e('Details', 'instacash-bnpl'); ?></a></div>
    <?php endif; ?>
    <div class="remain-title">
        <small><?php echo wp_kses_post(wc_price($cart_min)); ?></small>
    </div>
    <div class="remain-progress">
        <div class="remain-progress-line"></div>
    </div>
    <div class="remain-amount-wrapper">
        <small class="remain-amount"><?php echo wp_kses_post(wc_price($total)); ?></small>
    </div>
</div>
