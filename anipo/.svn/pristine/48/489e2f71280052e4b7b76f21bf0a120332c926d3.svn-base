<?php

defined('ABSPATH') || exit;

?>

<div class="anipo-modal anipo-modal-overlay" id="anipo-barcode-modal" style="display: none;">
    <div class="anipo-modal-content">
        <h3><?php esc_html_e('Barcode Form', 'anipo'); ?></h3>
        <form id="custom-form" class="anipo-modal-form">
            <div class="anipo-label-parent">
                <label for="order-weight"><?php esc_html_e('Order Weight (grams)', 'anipo'); ?></label>
                <input type="text" id="order-weight" name="order-weight"/>
                <input type="hidden" name="order-id" id="order-id"/>
            </div>
            <div class="anipo-label-parent">
                <?php global $anipo; $box_size_id = $anipo->get_box_size_id_setting();?>
                <label for="order-box-size"><?php esc_html_e('Package Size', 'anipo'); ?></label>
                <select name="order-box-size" id="order-box-size">
                    <option value="1" <?php if ($box_size_id === 1) echo 'selected'; ?>><?php esc_html_e('Size 1', 'anipo') ?> (150*100*100 mm)</option>
                    <option value="2" <?php if ($box_size_id === 2) echo 'selected'; ?>><?php esc_html_e('Size 2', 'anipo') ?> (200*150*100 mm)</option>
                    <option value="3" <?php if ($box_size_id === 3) echo 'selected'; ?>><?php esc_html_e('Size 3', 'anipo') ?> (200*200*150 mm)</option>
                    <option value="4" <?php if ($box_size_id === 4) echo 'selected'; ?>><?php esc_html_e('Size 4', 'anipo') ?> (300*200*200 mm)</option>
                    <option value="5" <?php if ($box_size_id === 5) echo 'selected'; ?>><?php esc_html_e('Size 5', 'anipo') ?> (350*250*200 mm)</option>
                    <option value="6" <?php if ($box_size_id === 6) echo 'selected'; ?>><?php esc_html_e('Size 6', 'anipo') ?> (450*250*200 mm)</option>
                    <option value="7" <?php if ($box_size_id === 7) echo 'selected'; ?>><?php esc_html_e('Size 7', 'anipo') ?> (400*300*250 mm)</option>
                    <option value="8" <?php if ($box_size_id === 8) echo 'selected'; ?>><?php esc_html_e('Size 8', 'anipo') ?> (450*400*300 mm)</option>
                    <option value="9" <?php if ($box_size_id === 9) echo 'selected'; ?>><?php esc_html_e('Size 9', 'anipo') ?> (550*450*350 mm)</option>
                    <option value="10" <?php if ($box_size_id === 10) echo 'selected'; ?>><?php esc_html_e('Size 10 (Larger Dimensions)', 'anipo') ?></option>
                </select>
            </div>
            <div class="anipo-label-parent">
                <label for="order-box-type"><?php esc_html_e('Package Type', 'anipo'); ?></label>
                <select name="order-box-type" id="order-box-type">
                    <option value="0" <?php echo 'selected'; ?>><?php esc_html_e('Standard', 'anipo') ?></option>
                    <option value="1"><?php esc_html_e('Non Standard', 'anipo') ?></option>
                </select>
            </div>
            <?php
                $send_type = $anipo->get_send_type_setting();
                $is_pay_in_place_checked = $anipo->get_pay_in_place_setting();
                $is_fare_at_destination_checked = $anipo->get_fare_at_destination_setting();
                $is_payment_type_active = false;
                if (intval($is_pay_in_place_checked) === 1 || intval($is_fare_at_destination_checked) === 1) {
                    $is_payment_type_active = true;
                }
            ?>
            <div class="anipo-label-parent">
                <label for="order-send-type"><?php esc_html_e('Send Type', 'anipo'); ?></label>
                <select name="order-send-type" id="order-send-type">
                    <option value="1" <?php if ($send_type === 1) echo 'selected'; ?>><?php esc_html_e('Vanguard', 'anipo') ?></option>
                    <option value="3" <?php if ($send_type === 3) echo 'selected'; ?>><?php esc_html_e('Special', 'anipo') ?></option>
                </select>
            </div>
            <div class="anipo-label-parent" <?php if (!$is_payment_type_active) {echo 'style="display: none"';} ?>>
                <label for="anipo-payment-type"><?php esc_html_e('Payment Type', 'anipo'); ?></label>
                <select name="anipo-payment-type" id="anipo-payment-type">
                    <option value="payOnline" <?php echo 'selected'; ?>><?php esc_html_e('Pay Online', 'anipo') ?></option>
                    <?php if (intval($is_pay_in_place_checked) === 1) { ?>
                    <option value="payInPlace"><?php esc_html_e('Pay In Place', 'anipo') ?></option>
                    <?php } ?>
                    <?php if (intval($is_fare_at_destination_checked) === 1) { ?>
                    <option value="fareAtDestination"><?php esc_html_e('Fare At Destination', 'anipo') ?></option>
                    <?php } ?>
                </select>
            </div>
            <div class="anipo-button-row">
                <button type="submit"
                        class="anipo-button anipo-get-barcode-button"><?php esc_html_e('Get Barcode', 'anipo'); ?></button>
                <button class="anipo-button anipo-close-modal"><?php esc_html_e('Close', 'anipo'); ?></button>
            </div>
        </form>
    </div>
</div>
