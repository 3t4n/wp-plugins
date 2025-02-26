<?php

defined('ABSPATH') || exit;

global $anipo;

if (isset($_POST['submit']) && isset($_POST['anipo_settings_nonce']) && check_admin_referer('anipo_settings', 'anipo_settings_nonce')) {
    if (isset($_POST['pay-in-place-checkbox'])) {
        $is_pay_in_place_checked = sanitize_text_field(wp_unslash($_POST['pay-in-place-checkbox'])) ?? 0;
    } else {
        $is_pay_in_place_checked = 0;
    }
    if (isset($_POST['fare-at-destination-checkbox'])) {
        $is_fare_at_destination_checked = sanitize_text_field(wp_unslash($_POST['fare-at-destination-checkbox'])) ?? 0;
    } else {
        $is_fare_at_destination_checked = 0;
    }
    if (isset($_POST['print-factor-checkbox'])) {
        $is_checked = sanitize_text_field(wp_unslash($_POST['print-factor-checkbox'])) ?? 0;
    } else {
        $is_checked = 0;
    }
    $anipo->update_pay_in_place_setting($is_pay_in_place_checked);
    $anipo->update_fare_at_destination_setting($is_fare_at_destination_checked);
    $anipo->update_print_factor_setting($is_checked);
    if (isset($_POST['anipo-print-radio'])) {
        $print_type = intval(sanitize_text_field(wp_unslash($_POST['anipo-print-radio']))) ?? 1;
    } else {
        $print_type = 1;
    }
    $anipo->update_print_type_setting($print_type);
    if (isset($_POST['anipo-box-size-radio'])) {
        $box_size_id = intval(sanitize_text_field(wp_unslash($_POST['anipo-box-size-radio']))) ?? 1;
    } else {
        $box_size_id = 1;
    }
    $anipo->update_box_size_id_setting($box_size_id);
    if (isset($_POST['anipo-send-type-radio'])) {
        $send_type = intval(sanitize_text_field(wp_unslash($_POST['anipo-send-type-radio']))) ?? 1;
    } else {
        $send_type = 1;
    }
    $anipo->update_send_type_setting($send_type);
}

$is_checked = $anipo->get_print_factor_setting();
$is_pay_in_place_checked = $anipo->get_pay_in_place_setting();
$is_fare_at_destination_checked = $anipo->get_fare_at_destination_setting();
$print_type = $anipo->get_print_type_setting();
$box_size_id = $anipo->get_box_size_id_setting();
$send_type = $anipo->get_send_type_setting();

?>

<h1><?php esc_html_e('Settings Form', 'anipo') ?></h1>
<form id="settings-form" method="POST" action="" class="anipo-settings-form">
    <label for="pay-in-place-checkbox" class="anipo-label"><?php esc_html_e('Pay In Place', 'anipo') ?> :
        <input type="checkbox" id="pay-in-place-checkbox" name="pay-in-place-checkbox"
               onchange="anipoUpdateCheckboxValue(this)" <?php if (intval($is_pay_in_place_checked) === 1) {
            echo 'checked';
        } ?> value="<?php echo esc_attr($is_pay_in_place_checked) ?>"></label>
    <label for="fare-at-destination-checkbox" class="anipo-label"><?php esc_html_e('Fare At Destination', 'anipo') ?> :
        <input type="checkbox" id="fare-at-destination-checkbox" name="fare-at-destination-checkbox"
               onchange="anipoUpdateCheckboxValue(this)" <?php if (intval($is_fare_at_destination_checked) === 1) {
            echo 'checked';
        } ?> value="<?php echo esc_attr($is_fare_at_destination_checked) ?>"></label>
    <label for="print-factor-checkbox" class="anipo-label"><?php esc_html_e('Show Factor In Print', 'anipo') ?> :
        <input type="checkbox" id="print-factor-checkbox" name="print-factor-checkbox"
               onchange="anipoUpdateCheckboxValue(this)" <?php if (intval($is_checked) === 1) {
            echo 'checked';
        } ?> value="<?php echo esc_attr($is_checked) ?>"></label>
    <div class="anipo-label">
        <h6 class="anipo-label-font"><?php esc_html_e('Select Send Type', 'anipo') ?> :</h6>
        <label for="anipo-send-type-radio-1" class="anipo-image-wrapper"><input id="anipo-send-type-radio-1" name="anipo-send-type-radio" value="1"
                                                                            type="radio" <?php if ($send_type === 1) echo 'checked'; ?>><?php esc_html_e('Vanguard', 'anipo') ?></label>
        <label for="anipo-send-type-radio-3" class="anipo-image-wrapper"><input id="anipo-send-type-radio-3" name="anipo-send-type-radio" value="3"
                                                                            type="radio" <?php if ($send_type === 3) echo 'checked'; ?>><?php esc_html_e('Special', 'anipo') ?></label>
    </div>
    <div class="anipo-label">
        <h6 class="anipo-label-font"><?php esc_html_e('Select Print Type', 'anipo') ?> :</h6>
        <label for="anipo-print-radio-1" class="anipo-image-wrapper"><input id="anipo-print-radio-1" name="anipo-print-radio" value="1"
                                                type="radio" <?php if ($print_type === 1) echo 'checked'; ?>><?php esc_html_e('Type 1', 'anipo') ?> <img class="anipo-print-type-image" src="<?php echo ANIPO_URL . 'admin/assets/images/TypeOne.jpg'; ?>"  alt="Type 1"/></label>
        <label for="anipo-print-radio-2" class="anipo-image-wrapper"><input id="anipo-print-radio-2" name="anipo-print-radio" value="2"
                                                type="radio" <?php if ($print_type === 2) echo 'checked'; ?>><?php esc_html_e('Type 2', 'anipo') ?> <img class="anipo-print-type-image" src="<?php echo ANIPO_URL . 'admin/assets/images/TypeTwo.jpg'; ?>"  alt="Type 2"/></label>
        <label for="anipo-print-radio-3" class="anipo-image-wrapper"><input id="anipo-print-radio-3" name="anipo-print-radio" value="3"
                                                type="radio" <?php if ($print_type === 3) echo 'checked'; ?>><?php esc_html_e('Mailing Label', 'anipo') ?> <img class="anipo-print-type-image" src="<?php echo ANIPO_URL . 'admin/assets/images/TypeThree.jpg'; ?>"  alt="Mailing Label"/></label>
    </div>
    <div class="anipo-label anipo-label-grid">
        <h6 class="anipo-label-font"><?php esc_html_e('Select The Package Size', 'anipo') ?> :</h6>
        <label for="anipo-box-size-radio-1" class="anipo-image-wrapper"><input id="anipo-box-size-radio-1" name="anipo-box-size-radio" value="1"
                                                                            type="radio" <?php if ($box_size_id === 1) echo 'checked'; ?>><?php esc_html_e('Size 1', 'anipo') ?> (150*100*100 mm)</label>
        <label for="anipo-box-size-radio-2" class="anipo-image-wrapper"><input id="anipo-box-size-radio-2" name="anipo-box-size-radio" value="2"
                                                                            type="radio" <?php if ($box_size_id === 2) echo 'checked'; ?>><?php esc_html_e('Size 2', 'anipo') ?> (200*150*100 mm)</label>
        <label for="anipo-box-size-radio-3" class="anipo-image-wrapper"><input id="anipo-box-size-radio-3" name="anipo-box-size-radio" value="3"
                                                                            type="radio" <?php if ($box_size_id === 3) echo 'checked'; ?>><?php esc_html_e('Size 3', 'anipo') ?> (200*200*150 mm)</label>
        <label for="anipo-box-size-radio-4" class="anipo-image-wrapper"><input id="anipo-box-size-radio-4" name="anipo-box-size-radio" value="4"
                                                                            type="radio" <?php if ($box_size_id === 4) echo 'checked'; ?>><?php esc_html_e('Size 4', 'anipo') ?> (300*200*200 mm)</label>
        <label for="anipo-box-size-radio-5" class="anipo-image-wrapper"><input id="anipo-box-size-radio-5" name="anipo-box-size-radio" value="5"
                                                                            type="radio" <?php if ($box_size_id === 5) echo 'checked'; ?>><?php esc_html_e('Size 5', 'anipo') ?> (350*250*200 mm)</label>
        <label for="anipo-box-size-radio-6" class="anipo-image-wrapper"><input id="anipo-box-size-radio-6" name="anipo-box-size-radio" value="6"
                                                                            type="radio" <?php if ($box_size_id === 6) echo 'checked'; ?>><?php esc_html_e('Size 6', 'anipo') ?> (450*250*200 mm)</label>
        <label for="anipo-box-size-radio-7" class="anipo-image-wrapper"><input id="anipo-box-size-radio-7" name="anipo-box-size-radio" value="7"
                                                                            type="radio" <?php if ($box_size_id === 7) echo 'checked'; ?>><?php esc_html_e('Size 7', 'anipo') ?> (400*300*250 mm)</label>
        <label for="anipo-box-size-radio-8" class="anipo-image-wrapper"><input id="anipo-box-size-radio-8" name="anipo-box-size-radio" value="8"
                                                                            type="radio" <?php if ($box_size_id === 8) echo 'checked'; ?>><?php esc_html_e('Size 8', 'anipo') ?> (450*400*300 mm)</label>
        <label for="anipo-box-size-radio-9" class="anipo-image-wrapper"><input id="anipo-box-size-radio-9" name="anipo-box-size-radio" value="9"
                                                                            type="radio" <?php if ($box_size_id === 9) echo 'checked'; ?>><?php esc_html_e('Size 9', 'anipo') ?> (550*450*350 mm)</label>
        <label for="anipo-box-size-radio-10" class="anipo-image-wrapper"><input id="anipo-box-size-radio-10" name="anipo-box-size-radio" value="10"
                                                                            type="radio" <?php if ($box_size_id === 10) echo 'checked'; ?>><?php esc_html_e('Size 10 (Larger Dimensions)', 'anipo') ?></label>
    </div>
    <?php
    wp_nonce_field('anipo_settings', 'anipo_settings_nonce');
    ?>
    <br><input type="submit" name="submit" class="anipo-button" value="<?php esc_attr_e('Submit', 'anipo'); ?>"/>
</form>
