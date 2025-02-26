<?php
if (!defined('ABSPATH')) {
    exit;
}
?>
<h3><?php echo esc_html__('Payment', 'ambikly'); ?></h3>
<div class="ambikly-payment-methods">
    <?php

    use Ambikly\Gateways\PaymentGateways;

    $active_gateways = ambikly_get_active_payment_gateways();

    $default_payment_gateway = ambikly_get_option('default_payment_gateway', 'cash_on_delivery');

    if (count($active_gateways) < 1) {

        echo '<div class="no-payment-gateways">';

        echo '<div class="ambikly-message error-message" style="display: block;">Payment gateway configuration is incomplete. Please reach out to the website administrator for assistance.</div>';

        echo '</div>';

    } else {

        echo '<ul class="ambikly-payment-gateways">';

        ambikly_get_available_gateways_list();

        echo '</ul>';
    }
    ?>
</div>