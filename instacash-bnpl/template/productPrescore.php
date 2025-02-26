<?php

/**
 * Product indicated prescore template.
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
<div id="prescore-block">
  <div>
    <h3 class="text-default">
      <strong><?php echo esc_html($this->info['prescore']['title']); ?></strong>
      <div class="ps-amount"><span class="ps-num"><?php echo wp_kses_post($this->info['prescore']['price']); ?></span></div>
    </h3>
    <p class="text-default"><?php echo esc_html($this->info['prescore']['description']); ?></p>
    <a href="<?php echo esc_url($this->info['prescore']['url']); ?>" alt="PreScore" target="_blank"><?php esc_html_e('Start prescore', 'instacash-bnpl'); ?></a>
  </div>
</div>

