<?php

/**
 * Admin side notice for overlapping offer settings.
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
<div class="notice notice-error is-dismissible">
    <p>
        <strong><?php esc_html_e('The conditions of the offer overlap! Matches:', 'instacash-bnpl'); ?></strong>
        <ul>
            <?php foreach ($overlaps as $overlap) : ?>
                <?php foreach ($overlap as $condition) : ?>
                    <li><?php echo esc_html($condition); ?><li>
                <?php endforeach; ?>
            </ul>
            <?php endforeach; ?>
    </p>
</div>
