<?php

/**
 * Deal status filter input.
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

<input type="number" placeholder="<?php esc_html_e('Paid transactions', 'instacash-bnpl'); ?>" name="<?php echo esc_attr(Config::PAID_OPTION_NAME); ?>" id="ICPaid" value="<?php echo \esc_attr($paid); ?>">
<select name="<?php echo esc_attr(Config::STATUS_OPTION_NAME); ?>" id="ICDealStatus">
    <option value=""><?php \esc_html_e('All Order status', 'instacash-bnpl'); ?></option>
    <?php foreach ($states as $index => $status) : ?>
        <option value="<?php echo \esc_attr($index); ?>" <?php echo \esc_attr($state ? \selected($index, $state, false) : ''); ?>>
            <?php echo \esc_html($status['name']); ?>
        </option>
    <?php endforeach; ?>
</select>
