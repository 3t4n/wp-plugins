<?php

/**
 * Provide a admin area view for the plugin
 *
 * This file is used to markup the admin-facing aspects of the plugin.
 *
 * @link       www.acewebx.com
 * @since      1.0.0
 *
 * @package    Ace_Twilio_For_Woocommerce
 * @subpackage Ace_Twilio_For_Woocommerce/admin/partials
 */

$checkbox_value = '';
$pending_enable = '';
$processing_payment = '';
$complete_payment = '';
$on_hold = '';
$cancelled = '';
$refunded = '';
$failed      = '';
$sid         = '';
$auth        = '';
$from_number = '';
$to_number   = '';

$ace_twilio_setting_data  =  get_option('ace_twilio_setting_data');


if (!empty($ace_twilio_setting_data)) {
    $enable        =  $ace_twilio_setting_data['ace_twilio_enable_de'];
    if ($enable == 'on') {
        $checkbox_value = 'checked="checked"';
    }

    $pending_enable      =  $ace_twilio_setting_data['ace_payment_twilio_enabled']['pending'];
    if ($pending_enable == 'on') {
        $pending_enable = 'checked="checked"';
    }

    $processing_payment =  $ace_twilio_setting_data['ace_payment_twilio_enabled']['processing'];
    if ($processing_payment == 'on') {
        $processing_payment = 'checked="checked"';
    }

    $complete_payment =  $ace_twilio_setting_data['ace_payment_twilio_enabled']['completed'];


    if ($complete_payment == 'on') {
        $complete_payment = 'checked="checked"';
    }

    $on_hold =  $ace_twilio_setting_data['ace_payment_twilio_enabled']['on-hold'];
    if ($on_hold == 'on') {
        $on_hold = 'checked="checked"';
    }

    $cancelled =  $ace_twilio_setting_data['ace_payment_twilio_enabled']['cancelled'];
    if ($cancelled == 'on') {
        $cancelled = 'checked="checked"';
    }

    $refunded =  $ace_twilio_setting_data['ace_payment_twilio_enabled']['refunded'];
    if ($refunded == 'on') {
        $refunded = 'checked="checked"';
    }

    $failed =  $ace_twilio_setting_data['ace_payment_twilio_enabled']['failed'];
    if ($failed == 'on') {
        $failed = 'checked="checked"';
    }


    $sid            =  $ace_twilio_setting_data['ace_twilio_sid'];
    $auth           =  $ace_twilio_setting_data['ace_twilio_auth'];
    $from_number    =  $ace_twilio_setting_data['ace_from_twilio_number'];
    $ace_from_country_code   = isset($ace_twilio_setting_data['ace_from_country_code']) ? $ace_twilio_setting_data['ace_from_country_code'] : "";
    $ace_to_country_code   =  isset($ace_twilio_setting_data['ace_to_country_code']) ? $ace_twilio_setting_data['ace_to_country_code'] : "";
} else {

    $ace_twilio_setting_data['ace_twilio_message'] = [
        'pending'    => '',
        'processing' => '',
        'completed'  => '',
        'on-hold'    => '',
        'cancelled'  => '',
        'refunded'   => '',
        'failed'     => '',
    ];
}
?>
<h1> Twilio Setting </h1>
<div class="ace_twilio_setting_page">
    <form class="form" method="post">
        <div class="ace_twilio_label">
            <label for="ace_twilio_enable"><strong class="ace_twilio_lable">Enable SMS Notifications</strong></label>
        </div>
        <div class="ace_twilio_content">
            <input type="checkbox" id="ace_twilio_enable_de" name="ace_twilio_enable_de" <?php echo $checkbox_value; ?>><label for="ace_twilio_enable_de"><i>Enable the Twilio SMS</i></label>
        </div>

        <div class="ace_twilio_label">
            <strong class="ace_twilio_lable">Account SID</strong>
        </div>
        <div class="ace_twilio_content">
            <input type="text" name="ace_twilio_sid" class="ace_twilio_cr" value="<?php echo $sid; ?>"><i class="aceInfo">Enter the Twilio Account SID ( Enter Vaild Twilio Account SID )</i>
            <?php if (!empty($error) && isset($error['ace_twilio_sid'])) {
                echo '<p class="aceError">' . $error['ace_twilio_sid'] . '</p>';
            } ?>
        </div>

        <div class="ace_twilio_label">
            <strong class="ace_twilio_lable">Auth Token</strong>
        </div>
        <div class="ace_twilio_content">
            <input type="text" name="ace_twilio_auth" class="ace_twilio_cr" value="<?php echo $auth; ?>"><i class="aceInfo">Enter the Twilio Account Auth Token ( Enter Vaild Twilio Account Auth Token )</i>
            <?php if (!empty($error) && isset($error['ace_twilio_auth'])) {
                echo '<p class="aceError">' . $error['ace_twilio_auth'] . '</p>';
            } ?>
        </div>

        <div class="ace_twilio_label">
            <strong class="ace_twilio_lable">From Number</strong>
        </div>
        <div class="ace_twilio_content">
            <select name="ace_from_country_code">
                <option value="">-- Select Country --</option>
                <?php foreach ($countryCodes as $key => $country) {
                    $countrySelected = "";
                    if (isset($_POST['ace_from_country_code']) && $_POST['ace_from_country_code'] ==  $country['code']) {
                        $countrySelected = "selected";
                    } else if ($ace_from_country_code && $ace_from_country_code == $country['code']) {
                        $countrySelected = "selected";
                    } ?>
                    <option value="<?php echo $country['code']; ?>" <?php echo $countrySelected; ?>>(+ <?php echo $country['code']; ?>) <?php echo $country['name']; ?></option>
                <?php } ?>

            </select>
            <?php if (isset($_POST['ace_from_twilio_number'])) {
                $fromNumber = $_POST['ace_from_twilio_number'];
            } else if ($from_number) {
                $fromNumber = $from_number;
            } ?>
            <input type="number" name="ace_from_twilio_number" class="ace_twilio_input" value="<?php echo $fromNumber; ?>"><i class="aceInfo">SMS From Phone Number( Twilio Register Phone Number )</i>
            <?php if (!empty($error) && isset($error['from_phone'])) {
                echo '<p class="aceError">' . $error['from_phone'] . '</p>';
            }
            if (!empty($error) && isset($error['from_length'])) {
                echo '<p class="aceError2">' . $error['from_length'] . '</p>';
            }
            ?>
        </div>

        <div class="ace_twilio_label_status">
            <strong class="ace_twilio_lable">Send SMS Notifications for these statuses</strong>
        </div>
        <div class="ace_twilio_content_status">
            <input type="checkbox" class="custom-control-input" name="pending_payment" id="pending_payment" <?php echo $pending_enable; ?>><label for="pending_payment"><i>Pending Payment</i></label></br></br>
            <input type="checkbox" class="custom-control-input" name="processing_payment" id="processing_payment" <?php echo $processing_payment; ?>><label for="processing_payment"><i>Processing Payment</i></label></br></br>
            <input type="checkbox" class="custom-control-input" name="complete_payment" id="complete_payment" <?php echo $complete_payment; ?>><label for="complete_payment"><i>Complete Payment</i></label></br></br>
            <input type="checkbox" class="custom-control-input" name="on_hold" id="on_hold" <?php echo $on_hold; ?>><label for="on_hold"><i>On Hold</i></label></br></br>
            <input type="checkbox" class="custom-control-input" name="cancelled" id="cancelled" <?php echo $cancelled; ?>><label for="cancelled"><i>Cancelled</i></label></br></br>
            <input type="checkbox" class="custom-control-input" name="refunded" id="refunded" <?php echo $refunded; ?>><label for="refunded"><i>Refunded</i></label></br></br>
            <input type="checkbox" class="custom-control-input" name="failed" id="failed" <?php echo $failed; ?>><label for="failed"><i>Failed</i></label>

            <?php
            if (!empty($error) && isset($error['payment_notification'])) {
                echo '<p class="error2">' . $error['payment_notification'] . '</p>';
            }
            ?>
        </div>

        <div class="ace_twilio_label">
            <strong class="ace_twilio_lable">Pending SMS Message</strong>
        </div>
        <div class="ace_twilio_content">
            <textarea name="ace_pending_mess"><?php echo $ace_twilio_setting_data['ace_twilio_message']['pending']; ?></textarea>
            <?php
            if (!empty($error) && isset($error['ace_pending_mess'])) {
                echo '<p class="error3">' . $error['ace_pending_mess'] . '</p>';
            }
            ?>
        </div>

        <div class="ace_twilio_label">
            <strong class="ace_twilio_lable">Processing SMS Message</strong>
        </div>
        <div class="ace_twilio_content">
            <textarea name="ace_processing_mess"><?php echo $ace_twilio_setting_data['ace_twilio_message']['processing']; ?></textarea>
            <?php
            if (!empty($error) && isset($error['ace_processing_mess'])) {
                echo '<p class="error3">' . $error['ace_processing_mess'] . '</p>';
            }
            ?>
        </div>

        <div class="ace_twilio_label">
            <strong class="ace_twilio_lable">Complete SMS Message</strong>
        </div>
        <div class="ace_twilio_content">
            <textarea name="ace_complete_mess"><?php echo $ace_twilio_setting_data['ace_twilio_message']['completed']; ?></textarea>
            <?php
            if (!empty($error) && isset($error['ace_complete_mess'])) {
                echo '<p class="error3">' . $error['ace_complete_mess'] . '</p>';
            }
            ?>
        </div>

        <div class="ace_twilio_label">
            <strong class="ace_twilio_lable">On Hold SMS Message</strong>
        </div>
        <div class="ace_twilio_content">
            <textarea name="ace_hold_mess"><?php echo $ace_twilio_setting_data['ace_twilio_message']['on-hold']; ?></textarea>
            <?php
            if (!empty($error) && isset($error['ace_hold_mess'])) {
                echo '<p class="error3">' . $error['ace_hold_mess'] . '</p>';
            }
            ?>
        </div>

        <div class="ace_twilio_label">
            <strong class="ace_twilio_lable">Cancelled SMS Message</strong>
        </div>
        <div class="ace_twilio_content">
            <textarea name="ace_cancelled_mess"><?php echo $ace_twilio_setting_data['ace_twilio_message']['cancelled']; ?></textarea>
            <?php
            if (!empty($error) && isset($error['ace_cancelled_mess'])) {
                echo '<p class="error3">' . $error['ace_cancelled_mess'] . '</p>';
            }
            ?>
        </div>

        <div class="ace_twilio_label">
            <strong class="ace_twilio_lable">Refunded SMS Message</strong>
        </div>
        <div class="ace_twilio_content">
            <textarea name="ace_refunded_mess"><?php echo $ace_twilio_setting_data['ace_twilio_message']['refunded']; ?></textarea>
            <?php
            if (!empty($error) && isset($error['ace_refunded_mess'])) {
                echo '<p class="error3">' . $error['ace_refunded_mess'] . '</p>';
            }
            ?>
        </div>

        <div class="ace_twilio_label">
            <strong class="ace_twilio_lable">Failed SMS Message</strong>
        </div>
        <div class="ace_twilio_content">
            <textarea name="ace_failed_mess"><?php echo $ace_twilio_setting_data['ace_twilio_message']['failed']; ?></textarea>
            <?php
            if (!empty($error) && isset($error['ace_failed_mess'])) {
                echo '<p class="error3">' . $error['ace_failed_mess'] . '</p>';
            }
            ?>
        </div>
        <input type="submit" class="ace_twilio_save" name="submit" value="Save Change">
    </form>
</div>