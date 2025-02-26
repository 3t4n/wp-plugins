<?php
if (!defined('ABSPATH')) exit;
$shopid = sanitize_text_field(get_option('accessibility_shopid'));
$token = get_option('accessibility_tokken');
$accessibility_url = get_option('accessibility_url');
$data = array('shopid' => $shopid, 'language' => true);
$content = assistant_api_call('/getShopData', $data, 'get');

$subscription_content = assistant_api_call('/wordpress/checkSubscriptionAndUpdate', $data, 'post');
$subscription_status = $subscription_content['status'];
// $subscription_status = 500;
if ($subscription_status != '200') {
    require_once 'plan-list.php';
    return;
}

if (empty($accessibility_url)) {
    update_option('accessibility_url', sanitize_text_field($content['data']['url']));
}

if ($content) {
    $access_by_admin = $content['data']['access_by_admin'];
    $current_plan = $content['data']['plan'];
    $trial_day = $content['data']['trail_day'];
    $is_installation_popup_shown = $content['data']['is_installation_popup_shown'];
    $is_plan_select_popup_shown = $content['data']['is_plan_select_popup_shown'];
    if ($is_installation_popup_shown == 0 && $is_plan_select_popup_shown == 0) {
        require_once 'installation-popup.php';
    }
    if ($is_plan_select_popup_shown == 0 && $trial_day == '1' && !empty($current_plan) && $is_installation_popup_shown == 1) {
        require_once 'thanyou-popup.php';
    }
}

if (empty($current_plan)) {
    require_once 'plan-list.php';
} else {
    $created_at = $content['data']['created_at']; // '2024-11-07 14:32:49'
    $trial_day = $content['data']['trail_day'];
    $created_date = new DateTime($created_at);
    $current_date = new DateTime();
    // Add 7 days to the created_at date to get the trial end date
    $end_date = clone $created_date;
    $end_date->add(new DateInterval('P7D'));
    $interval = $current_date->diff($end_date);
    $remaining_days = $interval->format('%r%a');
    if ($created_at && $trial_day != 1 && $access_by_admin != '1') {
        if ($interval->days <= 7 && $interval->invert == 0) {
            echo "<p class='free-trial-note'>You are on a 7-day trial. " . esc_html($remaining_days) . " days remaining. Trial ends on " . esc_html($end_date->format('Y-m-d H:i:s')) . ".</p>";
        } else {
            echo "<p class='free-trial-note'>Your 7-day free trial has ended. Please subscribe to continue. Trial ended on " . esc_html($end_date->format('Y-m-d H:i:s')) . ".</p>";
        }
    }else{
        echo "<p class='free-trial-note'>You have admin access</p>";
    }
?>
    <div class="ada-cc-languages">
        <!-- header -->

        <div class="ada-cc-logo">
            <div class="ada-cc-icon">
                <img src="<?php echo esc_url(plugin_dir_url(dirname(__FILE__)) . '/assets/square-icon-svg-file-1.png'); ?>" alt="">
            </div>
            <div class="ada-cc-name">
                <p class="ada-cc-text">Accessibility by CartCoders</p>
            </div>
        </div>

        <div class="ada-cc-searchmain">
            <div class="ada-cc-left">
                <div class="ada-cc-top">
                    <p> <span style="color: #bfcad8;">Pages</span> /Languages</p>
                </div>
                <div class="ada-cc-bottom">
                    <p class="ada-cc-dash-text">Languages</p>
                </div>
            </div>
        </div>

        <div class="ada-cc-manage-languages-back">
            <div class="ada-cc-manage-languages-head">
                <h2 class="heading">Manage Languages</h2>
            </div>

            <div class="ada-cc-manage-languages-table-back">
                <div class="ada-cc-manage-languages-table">
                    <table class="ada-cc-manage-languages-list-table" cellspaing="0" cellpadding="0">
                        <tr>
                            <th>Name</th>
                            <th>Code</th>
                            <th>Default</th>
                            <th>Visible</th>
                            <th>Action</th>
                        </tr>
                        <?php
                        if ($content['data']['language_data']) {
                            foreach ($content['data']['language_data'] as $getdata) {
                        ?>
                                <tr>
                                    <td>
                                        <div class="ada-cc-languages-icon-name">
                                            <span class="ada-cc-languages-flag">
                                                <img src="<?php echo esc_url(plugin_dir_url(dirname(__FILE__)) . 'assets/' . $getdata['language_code'] . '.png'); ?>" alt="languages-flag" class="icon">
                                            </span>
                                            <span class="ada-cc-languages-name"><?php echo esc_html($getdata['language_name']); ?></span>
                                        </div>
                                    </td>
                                    <td><?php echo esc_html($getdata['language_code']); ?></td>

                                    <td>
                                        <?php if ($getdata['is_default'] == 1) { ?>
                                            <img src="<?php echo esc_url(plugin_dir_url(dirname(__FILE__)) . '/assets/correct-icon.png'); ?>" alt="correct icon" class="ada-cc-icon">
                                        <?php } else { ?>
                                            <img src="<?php echo esc_url(plugin_dir_url(dirname(__FILE__)) . '/assets/un-correct-icon.png'); ?>" alt="un-correct-icon" class="ada-cc-icon">
                                        <?php } ?>
                                    </td>

                                    <td>
                                        <?php if ($getdata['is_visible'] == 1) { ?>
                                            <img src="<?php echo esc_url(plugin_dir_url(dirname(__FILE__)) . '/assets/correct-icon.png'); ?>" alt="correct icon" class="ada-cc-icon">
                                        <?php } else { ?>
                                            <img src="<?php echo esc_url(plugin_dir_url(dirname(__FILE__)) . '/assets/un-correct-icon.png'); ?>" alt="un-correct-icon" class="ada-cc-icon">
                                        <?php } ?>
                                    </td>

                                    <td>
                                        <a class="edit-btn" href=""
                                            data-language="<?php echo esc_attr($getdata['language_code']); ?>"
                                            data-languagecode="<?php echo esc_attr($getdata['id']); ?>"
                                            data-shop_id="<?php echo esc_attr($getdata['shop_id']); ?>">
                                            <img src="<?php echo esc_url(plugin_dir_url(dirname(__FILE__)) . '/assets/edit-icon.png'); ?>" alt="languages edit icon" class="ada-cc-edit-icon ada-cc-icon">
                                        </a>
                                    </td>
                                </tr>
                        <?php }
                        } ?>
                    </table>
                </div>
            </div>
        </div>


        <!-- contactus-footer-line -->

        <div class="ada-cc-contactus-footer">
            <p class="ada-cc-contactus-line">Have questions or need assistance? <a href="https://assistance.cartcoders.com?domain=accessibility-assistant.cartcoders.com" target="_blank"> Contact us</a></p>
        </div>

    </div>
<?php } ?>