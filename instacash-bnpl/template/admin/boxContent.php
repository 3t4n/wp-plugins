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

use InstaCash\BNPL\Config;

?>
<p><?php esc_html_e('Status', 'instacash-bnpl'); ?>: <strong style="color:<?php echo esc_attr(Config::dealStates()[$status->status]['color']); ?>">
  <?php echo esc_html(Config::dealStates()[$status->status]['name']); ?></strong>
</p>
<p><?php echo esc_html(Config::dealStates()[$status->status]['desc']); ?></p>
<p><?php esc_html_e('Paid transactions', 'instacash-bnpl'); ?>: <strong><?php echo esc_attr($paid_count); ?></strong></p>
<p><?php esc_html_e('Unpaid transactions', 'instacash-bnpl'); ?>: <strong><?php echo esc_attr($unpaid_count); ?></strong></p>
<a class="button button-primary" href="<?php echo esc_url($merchantPortal); ?>" target="_blank">
  <?php esc_html_e('Merchant Portal', 'instacash-bnpl'); ?> <strong>></strong>
</a>
