<?php

/**
 * Admin side options page of plugin.
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
<h2>
    <?php echo esc_html($this->method_title); ?>
    <?php wc_back_link(__('Return to payments', 'instacash-bnpl'), admin_url('admin.php?page=wc-settings&tab=checkout')); ?>
</h2>

<?php
  echo wp_kses_post(wpautop($this->get_method_description()));
if ('' !== $this->get_option('api_key')) :
    ?>

  <div class="sync-offers" style="padding-bottom: 1.5rem;">
      <h4><?php esc_html_e('Sync data with servers to getting offers.', 'instacash-bnpl'); ?></h4>
      <input type="hidden" name="<?php echo esc_attr(self::NONCE_KEY); ?>" value="<?php echo esc_attr(wp_create_nonce(self::NONCE_KEY)); ?>"/>
      <input type="submit" name="bnplSyncAction" class="button button-primary" value="<?php esc_html_e('Sync available BNPL offers', 'instacash-bnpl'); ?>"/>
  </div>

<?php endif; ?>

<section class="InstaCash-options">
  <table class="form-table">
    <?php $this->generate_settings_html(); ?>
  </table>
</section>
