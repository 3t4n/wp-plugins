<?php
if (!defined('ABSPATH')) {
    exit;
}
include plugin_dir_path(__FILE__) . '../header/header.php'
?>
<?php
if (isset($_SERVER['REQUEST_URI'])) {
    $S_URI = sanitize_text_field($_SERVER['REQUEST_URI']);
    if(get_option('SCCBPP_cookie_consent_url')!=''){
        $D_URL = get_option('SCCBPP_cookie_consent_url');
    }else{
        $D_URL = get_site_url();
    }
    if(get_option('SCCBPP_cookie_consent_email')!=''){
        $admin_Email = get_option('SCCBPP_cookie_consent_email');
    }else{
        $admin_Email = get_option('admin_email');
    }

    if (!empty($_POST['SCCBPP_cookie_consent_email'])) {
        $admin_Email = sanitize_email($_POST['SCCBPP_cookie_consent_email']);
    }
}
?>
<?php 
$userplan = get_option('SCCBPP_cookie_consent_userplan');
$userplanname = ((!empty($userplan->plan) && $userplan->plan->name ) ? $userplan->plan->name : ((!empty($userplan->data) && !empty($userplan->data->plan) && $userplan->data->plan->name ) ? $userplan->data->plan->name : '' ) ) ;
?>
<!--tabs-->
<style>
.seers-flex-container {
    display: flex;
    flex-direction: row;
    align-items: center;
    justify-content: space-between;
    padding: 5px 0px 15px 0px;
}

.seers-flex-item-1 {
    flex-grow: 1;
}

.seers-flex-item-2 {
    flex-grow: 2;
}

.seers-checkbox-terms {
    display: flex;
    flex-direction: column;
}

.seers-activate-button {
    display: flex;
    flex-direction: column;
}

.seers-select-btn.active {
    background-color: #6CC04A;
    border: 0px solid !important;
    color: white !important;
}

.seers-select-display-btn.active {
    border: 0.0625rem solid #209ce9;
    color: #209ce9;
    background-color: rgba(32,156,233,.05);
    font-weight: 700;
}

.seers-select-display-btn.active span:before {
    color: #209ce9;
}

.seers-select-display-btn.active span.tooltipicon, .seers-select-display-btn.active span.iconborder {
    border: 1px solid #209ce9;
}

#setting_message_success {
    color: green !important;
    margin-top: 0px;
    /*font-size:18px;*/
    position: absolute;
    left:220px;
}

#setting_message_error {
    color: red !important;
    margin-top: 0px;
    /*font-size:18px;*/
    position: absolute;
    left:220px;
}

#policy_message_success, .seers-successmsg {
    color: green !important;
    text-align: center !important;
    font-size:18px !important;
    /*font-size:18px;*/
}

#policy_message_error, .seers-errorsmsg {
    color: red !important;
    text-align: center !important;
    font-size:18px !important;
    /*font-size:18px;*/
}

.seers-setting-heading {
    font-size: 23px;
    font-weight: 400;
    margin: 0.2em;
}

#wpcontent {
    padding-left: 0px;
}
.seers-wordpress-main-cms {
    display: flex;
}
.seers-wordpress-main-cms-pages {
    width: 100%;
    padding: 0px;
    margin: 0px;
}

/* Account Setup */
.seers-wordpress-main-cms-account-pages {
    /* width: 80%;
    padding: 15px 45px 25px;
    margin: auto;
    margin-top: 30px;
    background: #fff; */
    margin : 65px;
    padding: 0px 0px;
}
.seers-cms-account-create-exist {
    display: flex;
    background-color: #f5f5f5;
}
.seers-cms-account-heading {
    padding-left: 20px;
    padding-top: 10px;
}
.seers-cms-create-account-url {
    margin-left: 25px !important;
    border-radius: 10px !important;
    padding: 2px 10px !important;
    width: 270px !important;
}
.seers-cms-create-account-email {
    margin-left: 17px !important;
    border-radius: 10px !important;
    padding: 2px 10px !important;
    width: 270px !important;
    background-color: #f0f0f1 !important;
}
.seers-cms-already-account-key {
    margin-left: 17px !important;
    border-radius: 10px !important;
    padding: 2px 10px !important;
    width: 270px !important;
    background-color: #f0f0f1 !important;
}

label[for="SCCBPP_cookie_consent_email"] {
    padding-top: 10px;
    padding-bottom: 10px;
    display: block !important;
}
.seers-cms-create-account-container {
    display: flex !important;
    flex-direction: column !important;
    align-items: start !important;
    justify-content: space-between !important;
    padding: 5px 0px 15px 0px !important;
}
.seers-cms-account-update-butt {
width: 180px;
}
.seers-cms-account-create-butt {
    margin-top: 18px;
    padding: 10px 10px;
    border: 0px;
    color: #fff !important;
    background-color: #0061fe !important;
    border-radius: 8px;
    font-size: 14px;
    font-weight: bold;
}
.seers-cms-account-link {
    color: #0061fe !important;
}
/* a:hover {
    color: #0061fe !important;
} */

.seers-cms-create-account-key {
    margin-left: 17px !important;
    border-radius: 10px !important;
    padding: 2px 10px !important;
    width: 380px !important;
    background-color: #f0f0f1 !important;
}
.seersinfotext {
    font-weight: bold;
    color: #0061fe !important;
    display: block !important;
    margin: 40px 0 15px 0;
}
.seers-cms-account-navigation-link li {
    padding-right: 20px;
    font-size: 14px;
    font-weight: bold;
    margin: 0;
}
/* .seers-cms-account-navigation-link li:hover {
    color: #0061fe;
} */
.createaccount {
    background-color: #f0f0f1;
    padding: 14px 20px;
}
.alreadyesiting {
    background-color: #f0f0f1;
    padding: 14px 20px;
}
.seers-cms-account-active {
    background-color: #fff;
    color: #3c434a;
    border-bottom: 4px solid #0061fe;
}
.seers-cms-account-active-content {
    background-color: #fff;
    padding: 35px 40px;
}
.seers-banner-custom-color:after {
    display: none;
}
.seers-cmp-paid-popup-content .seers-cmp-paid-popup-footer .seers-cmp-paid-popup-footer-block .seers-cmp-btn {
    background: #0061fe !important;
    font-family: "Arial";
    font-weight: 500;
    font-size: 13px;
    color: #fff;
    border: none;
    padding: 11px 14px;
    line-height: 1.5em;
    white-space: nowrap;
    text-decoration: none;
    text-align: center;
    text-transform: capitalize;
    border-radius: 10px !important;
    -webkit-border-radius: 10px !important;
    width: 120px;
}
input {
    font-size: 13px;
}
@media screen and (max-width: 1050px) {
    .seers-cms-create-account-key {
    margin-left: 0px !important;
    border-radius: 10px !important;
    padding: 2px 10px !important;
    width: 380px !important;
    background-color: #f0f0f1 !important;
    margin-top: 15px;
}
}
@media screen and (max-width: 782px) {
    .auto-fold #wpcontent {
        padding-left: 0px;
    }
}
@media screen and (max-width: 440px) {
    .seers-wordpress-main-cms-account-pages {
    margin: 5px;
    padding: 14px 5px;
}
.seers-cms-account-heading {
    padding-left: 0px;
    padding-top: 0px;
}
.seers-cms-account-active-content {
    background-color: #fff;
    padding: 35px 5px;
}
}

</style>

<div class="seers-wordpress-main">
    <div class="seers-wordpress-main-cms">
        <?php include plugin_dir_path(__FILE__) . '../sidebar/sidebar.php'; ?>

        <!-- Dashboard is shown by default -->
        <div id="loader"></div>
        <div class="content-section seers-wordpress-main-cms-pages" data-page="Dashboard" style="display: block;">
            <?php include plugin_dir_path(__FILE__) . '../pages/Dashboard/Dashboard.php'; ?>
        </div>
        <div class="content-section seers-wordpress-main-cms-pages" data-page="Account" style="display: none;">
            <h1 class="seers-cms-account-heading">Account Setup</h1>
        <div class="seers-content-col tile-style seers-wordpress-main-cms-account-pages">
                            
                            <ul class="seers-cms-account-navigation-link tab-ul-sub seers-cms-account-create-exist">
                                <li class=" createaccount tactive seers-cms-account-active" style="border-top-left-radius: 10px;border-top-right-radius: 10px; margin-right: 2px">
                                    <label for="bannersett"><?php esc_html_e('Create Account', $this->textdomain);?></label>
                                </li>
                                <li class=" alreadyesiting" style="border-top-right-radius: 10px;border-top-left-radius: 10px;">
                                    <label for="visualsett"><?php esc_html_e('Already Existing', $this->textdomain);?></label>
                                </li>

                            </ul>
                            <div class="seers-tab-countainer">

                                <div class="createaccount seers-cms-account-active-content" style="display:block;">
                                    <form method="post" id="wp_plugin" action="<?php echo esc_url(str_replace('%7E', '~', $S_URI)); ?>">
                                        <fieldset>
                                            <?php if (get_option('SCCBPP_cookie_consent_id') !='') {?>
                                            <div style="color:#0C9A9A;  font-family: Arial; font-size: 13px;">
                                                <?php echo __('Your Seers Cookie Consent banner is activated.',$this->textdomain); ?>
                                            </div>
                                            <?php } else if (get_option('SCCBPP_cookie_consent_msg')) {?>
                                            <div style="color:#f00; font-family: Arial; font-size: 13px;">
                                                <?php echo __('Your Seers Cookie Consent Banner is NOT activated because',$this->textdomain); ?> <?php if(get_option('SCCBPP_cookie_consent_msg')){
                                                        esc_html_e(get_option('SCCBPP_cookie_consent_msg'));
                                                    }?> </div>
                                            <?php } ?>

                                            <label for="SCCBPP_cookie_consent_url"><span>URL</span>
                                                <input class="seers-cms-create-account-url" type="text" id="SCCBPP_cookie_consent_url"
                                                    name="SCCBPP_cookie_consent_url" class="input-field"
                                                    value="<?php esc_html_e($D_URL);  ?>" readonly>
                                            </label>
                                            <label
                                                class="SCCBPP_cookie_consent_email" for="SCCBPP_cookie_consent_email"><span><?php echo __('Email',$this->textdomain); ?></span>
                                                <input class="seers-cms-create-account-email" type="text" id="SCCBPP_cookie_consent_email"
                                                    name="SCCBPP_cookie_consent_email" class="input-field"
                                                    value="<?php esc_html_e($admin_Email); ?>">
                                            </label>
                                            <div class="seers-flex-container seers-cms-create-account-container">
                                                <?php if (get_option('SCCBPP_cookie_consent_id') !='') {?>
                                                <div class="seers-checkbox-terms">
                                                    <div class="seers-checkbox">
                                                        <input type="checkbox" name="seers_term_condition"
                                                            id="seers_term_condition" value="terms" class="number" checked>
                                                        <?php esc_html_e('I agree Seers',$this->textdomain); ?>
                                                        <a href="https://seersco.com/terms-conditions/" target="_blank"><?php echo __('Terms & Condition',$this->textdomain);?>
                                                        </a>
                                                        <?php echo __('and',$this->textdomain);?> <a
                                                            href="https://seersco.com/privacy-policy/" target="_blank"><?php echo __('Privacy Policy',$this->textdomain); ?></a>,
                                                    </div>
                                                    <div class="seers-checkbox">
                                                        <input type="checkbox" name="seers_term_condition_url"
                                                            id="seers_term_condition_url" value="sterms" class="number" checked>
                                                        <?php esc_html_e('I agree Seers to use my email and url to create an account and power the cookie banner.',$this->textdomain); ?>
                                                    </div>
                                                </div>
                                                <?php }else{?>
                                                <div class="seers-checkbox-terms">
                                                    <div class="seers-checkbox">
                                                        <input type="checkbox" name="seers_term_condition"
                                                            id="seers_term_condition" value="terms" class="number">
                                                        <?php esc_html_e('I agree Seers',$this->textdomain); ?>
                                                        <a href="https://seersco.com/terms-conditions/" target="_blank"><?php esc_html_e('Terms & Condition',$this->textdomain);?>
                                                        </a>
                                                        <?php esc_html_e('and',$this->textdomain);?>
                                                        <a
                                                            href="https://seersco.com/privacy-policy/" target="_blank"><?php esc_html_e('Privacy Policy',$this->textdomain); ?></a>,
                                                    </div>
                                                    <div class="seers-checkbox">
                                                        <input type="checkbox" name="seers_term_condition_url"
                                                            id="seers_term_condition_url" value="sterms" class="number">
                                                        <?php esc_html_e('I agree Seers to use my email and url to create an account and power the cookie banner.',$this->textdomain); ?>
                                                    </div>
                                                </div>
                                                <?php }?>
                                                <div class="seers-activate-button "><input class="seers-cms-account-create-butt" type="submit" name="SCCBPP_cookieid"
                                                        id="SCCBPP_cookieid" disabled
                                                        value="<?php esc_html_e('Create Premium Account',$this->textdomain); ?>"
                                                        style="clear: both;"></div>
                                            </div>
                                            <label for="SCCBPP_cookie_consent_id"> <span><?php echo __('Cookie ID',$this->textdomain); ?></span>&nbsp;
                                                (<?php echo __('Seers Cookie ID will be received automatically after account creation',$this->textdomain); ?>)
                                                <input class="seers-cms-create-account-key" type="text" id="SCCBPP_cookie_consent_id" name="SCCBPP_cookie_consent_id"
                                                    class="input-field"
                                                    value="<?php esc_html_e(get_option('SCCBPP_cookie_consent_id')); ?>"
                                                    readonly>
                                            </label>
                                            <label class="notice notice-info bold seersinfotext"><?php echo sprintf(__('Important Note: Your domain name without the www and https:// will be used as your password to access the seers <a class="seers-cms-account-link" href="%s" target="_blank">dashboard</a>.',$this->textdomain), 'https://seersco.com/business/dashboard'); ?></label>
                                            <input name="SCCBPP_update_setting" type="hidden"
                                                value="<?php esc_html_e(wp_create_nonce('SCCBPP-cookie-consent')); ?>" />


                                        </fieldset>
                                    </form>
                                </div>
                                <div class="alreadyesiting seers-cms-account-active-content">
                                    <form method="post" id="wp_plugin_already" action="<?php echo esc_url(str_replace('%7E', '~', $S_URI)); ?>">
                                        <fieldset>
                                            <?php if (get_option('SCCBPP_cookie_consent_id') !='') {?>
                                            <div style="color:#0C9A9A;  font-family: Arial; font-size: 12px;">
                                                <?php echo __('Your Seers Cookie Consent banner is activated.',$this->textdomain); ?>
                                            </div>
                                            <?php } else if (get_option('SCCBPP_cookie_consent_existing_msg')) {?>
                                            <div style="color:#f00; font-family: Arial; font-size: 12px;">
                                                <?php echo __('Your Seers Cookie Consent Banner is NOT activated because',$this->textdomain); ?> <?php if(get_option('SCCBPP_cookie_consent_msg')){
                                                        esc_html_e(get_option('SCCBPP_cookie_consent_existing_msg'));
                                                    }?> </div>
                                            <?php } ?>

                                            <h3><?php echo __('Account already exists with Seers?',$this->textdomain); ?></h3>
                                            <label for="SCCBPP_cookie_consent_id"> <span><?php echo __('Cookie ID',$this->textdomain); ?></span>&nbsp;
                                                <input class="seers-cms-already-account-key" type="text" id="SCCBPP_cookie_consent_already_id" name="SCCBPP_cookie_consent_already_id"
                                                    class="input-field"
                                                    value="<?php echo ((!empty($_POST['SCCBPP_cookie_consent_already_id'])) ? filter_var($_POST['SCCBPP_cookie_consent_already_id'], FILTER_SANITIZE_STRING, FILTER_FLAG_STRIP_LOW) : esc_html__(get_option('SCCBPP_cookie_consent_id') )); ?>" />
                                            </label>
                                            <div class="seers-activate-button seers-cms-account-update-butt"><input class="seers-cms-account-create-butt" type="submit" name="SCCBPP_save_cookieid"
                                                        id="SCCBPP_save_cookieid"
                                                        value="<?php esc_html_e('Update Cookie ID',$this->textdomain); ?>"
                                                        style="clear: both;"></div>


                                            <input name="SCCBPP_existing_account" type="hidden"
                                                value="<?php esc_html_e(wp_create_nonce('SCCBPP-cookie-consent-already')); ?>" />
                                        </fieldset>
                                    </form>
                                </div>
                            </div>
                            
                            
                        </div>
        </div>
        <!-- All other content sections are hidden initially -->
        <div class="content-section seers-wordpress-main-cms-pages" data-page="Consent-Banner" style="display: none;">
            <?php include plugin_dir_path(__FILE__) . '../pages/Consent-Banner/General.php'; ?>
        </div>
        <div class="content-section seers-wordpress-main-cms-pages" data-page="General" style="display: none;">
            <?php include plugin_dir_path(__FILE__) . '../pages/Consent-Banner/General.php'; ?>
        </div>
        <div class="content-section seers-wordpress-main-cms-pages" data-page="Appearance" style="display: none;">
            <?php include plugin_dir_path(__FILE__) . '../pages/Consent-Banner/Settings.php'; ?>
        </div>
        <div class="content-section seers-wordpress-main-cms-pages" data-page="Settings" style="display: none;">
            <?php include plugin_dir_path(__FILE__) . '../pages/Consent-Banner/Settings.php'; ?>
        </div>
        <div class="content-section seers-wordpress-main-cms-pages" data-page="Visuals" style="display: none;">
            <?php include plugin_dir_path(__FILE__) . '../pages/Consent-Banner/Visuals.php'; ?>
        </div>
        <div class="content-section seers-wordpress-main-cms-pages" data-page="Tracking-Manager" style="display: none;">
            <?php include plugin_dir_path(__FILE__) . '../pages/Tracking-Manager/Tracking-Manager.php'; ?>
        </div>
        <div class="content-section seers-wordpress-main-cms-pages" data-page="Frameworks" style="display: none;">
            <?php include plugin_dir_path(__FILE__) . '../pages/Frameworks/Frameworks.php'; ?>
        </div>
        <div class="content-section seers-wordpress-main-cms-pages" data-page="Privacy-Policy" style="display: none;">
            <?php include plugin_dir_path(__FILE__) . '../pages/Privacy-Policy/Privacy-Policy.php'; ?>
        </div>
        <div class="content-section seers-wordpress-main-cms-pages" data-page="Reports" style="display: none;">
            <?php include plugin_dir_path(__FILE__) . '../pages/Reports/Reports.php'; ?>
        </div>
        <div class="content-section seers-wordpress-main-cms-pages" data-page="UserGuide" style="display: none;">
            <?php include plugin_dir_path(__FILE__) . '../pages/UserGuide/UserGuide.php'; ?>
        </div>
    </div>
    <div class="seers-wordpress-plugin-hol" style="display:none !important">
                    <div class="seers-plugin-main-cont">

    <div class="pc-tab">
        <input checked="checked" id="tab1" type="radio" name="pct" />
        <input id="tab2" type="radio" name="pct" />
        <input id="tab3" type="radio" name="pct" />
        <input id="tab4" type="radio" name="pct" />
        <input id="tab5" type="radio" name="pct" />
        <nav>
            <ul class="tab-ul">
                <?php //by Shoaib commenting this if because this section is also visible for free user
//if (get_option('SCCBPP_cookie_consent_id') !='') {?>
                <li class="tab1">
                    <label for="tab1"><?php esc_html_e('Settings', $this->textdomain);?></label>
                </li>
                <!-- <li class="tab2">
                    <label for="tab2"><?php esc_html_e('Policy', $this->textdomain);?></label>
                </li>
                <li class="tab3">
                    <label for="tab3"><?php esc_html_e('Account Setup', $this->textdomain);?></label>
                </li>
                <?php //} ?>
                <li class="tab4">
                    <label for="tab4"><?php esc_html_e('Advance Features', $this->textdomain);?></label>
                </li>
                <li class="tab5">
                    <label for="tab5"><?php esc_html_e('User Guide', $this->textdomain);?></label>
                </li> -->

            </ul>
        </nav>
        <section>
            <!--Banner Setting tab-->
            <div class="tab1">

                <div class="seers-wordpress-plugin-hol seers-tabs-content seers-banner-setting">


                    <form name="banner_setting" id="banner_setting" method="post">
                        <ul class="tab-ul-sub">
                            <li class="bannersett">
                                <label for="bannersett"><?php esc_html_e('Banner Settings', $this->textdomain);?></label>
                            </li>
                            <li class="visualsett">
                                <label for="visualsett"><?php esc_html_e('Visual Settings', $this->textdomain);?></label>
                            </li>

                        </ul>
                        <div class="seers-tab-countainer">
                            
                            <div class="bannersett">
                                
                                <!-- BannerSettings-->
                                <!--<h1><?php //echo __('Banner Settings', $this->textdomain); ?></h1>-->
                                <div class="section-setting">
                                    <!------------------------------------------------------->
                                    <!--Banner:-->
                                    <div class="seers-panel seers-mb-30">
                                        <div class="seers-pl" style="display:flex; align-items:center;"><label class="seers-label" style="margin:0;"><?php echo __('Banner', $this->textdomain); ?>: &nbsp;</label><span class="tooltip" data-title="<?php echo __('Enable/disable Cookie banner', $this->textdomain); ?>" style="font-size:20px;"><span class="dashicons dashicons-info-outline"></span></span></div>
                                        <div class="seers-pr">
                                            <label class="toggle">
                                                <?php if(get_option('SCCBPP_cookie_consent_is_active') == true || get_option('SCCBPP_cookie_consent_is_active') == ''){?>
                                                <input class="toggle-checkbox" type="checkbox" name="banner_check"
                                                    id="banner_check" checked>
                                                <?php }else{ ?>
                                                <input class="toggle-checkbox" type="checkbox" name="banner_check"
                                                    id="banner_check">
                                                <?php } ?>
                                                <div class="toggle-switch"></div>
                                            </label>
                                        </div>
                                    </div>
                                    <!--Banner End-->
                                    <!------------------------------------------------------->
                                    <!--Cookies Expiry:-->
                                    <div class="seers-panel seers-mb-30">

                                        <div class="seers-pl" style="display:flex; align-items:center;"><label class="seers-label" style="margin:0;"><?php echo __('Consent Frequency', $this->textdomain); ?>: &nbsp;</label> <span class="tooltiphtml" style="font-size:20px;"><span class="dashicons dashicons-info-outline"></span> <span class="tooltiptext"><?php echo __('Consent expiry limit', $this->textdomain); ?> <a href="https://support.seersco.com/en/consent-frequency" target="_blank"><?php echo __('Learn more...', $this->textdomain);?></a></span></span></div>
                                        <div class="seers-pr">
                                            <select class="seers-input fm" id="cookies_expiry" name="cookies_expiry">
                                                <option value="0" <?php if (get_option('SCCBPP_cookie_consent_cookies_expiry')) {if(get_option('SCCBPP_cookie_consent_cookies_expiry')==='0' || get_option('SCCBPP_cookie_consent_cookies_expiry') <= 0) { echo "selected"; } } ?>>
                                                    <?php echo __('Always', $this->textdomain); ?>
                                                </option>
                                                <option value="1" <?php if(get_option('SCCBPP_cookie_consent_cookies_expiry')=='1' || (get_option('SCCBPP_cookie_consent_cookies_expiry') > 0 && get_option('SCCBPP_cookie_consent_cookies_expiry') <= 1)){ echo "selected"; } else { echo "selected"; } ?>>
                                                    <?php echo __('Daily', $this->textdomain); ?>
                                                </option>
                                                <option value="7" <?php if(get_option('SCCBPP_cookie_consent_cookies_expiry')=='7' || (get_option('SCCBPP_cookie_consent_cookies_expiry') > 1 && get_option('SCCBPP_cookie_consent_cookies_expiry') <= 7)){ echo "selected"; } ?>>
                                                    <?php echo __('Weekly', $this->textdomain); ?>
                                                </option>
                                                <option value="30" <?php if(get_option('SCCBPP_cookie_consent_cookies_expiry')=='30' || (get_option('SCCBPP_cookie_consent_cookies_expiry') > 7 && get_option('SCCBPP_cookie_consent_cookies_expiry') <= 30)){ echo "selected"; } ?>>
                                                    <?php echo __('Monthly', $this->textdomain); ?>
                                                </option>
                                                <option value="90" <?php if(get_option('SCCBPP_cookie_consent_cookies_expiry')=='90' || (get_option('SCCBPP_cookie_consent_cookies_expiry') > 30 && get_option('SCCBPP_cookie_consent_cookies_expiry') <= 90)){ echo "selected"; } ?>>
                                                    <?php echo __('Quarterly', $this->textdomain); ?>
                                                </option>
                                                <option value="365" <?php if(get_option('SCCBPP_cookie_consent_cookies_expiry')=='365' || (get_option('SCCBPP_cookie_consent_cookies_expiry') > 90 && get_option('SCCBPP_cookie_consent_cookies_expiry') <= 365)){ echo "selected"; } ?>>
                                                    <?php echo __('Yearly', $this->textdomain); ?>
                                                </option>
                                            </select>
                                        </div>
                                    </div>
                                    <!--Cookies Expiry End-->
                                    <!------------------------------------------------------->
                                    <!--Language:-->
                                    <div class="seers-panel seers-mb-30">
                                        <div class="seers-pl" style="display:flex; align-items:center;"><label class="seers-label" style="margin:0;" ><?php echo __('Language', $this->textdomain); ?>: &nbsp;</label><span class="tooltip" data-title="<?php echo __('You can select language from your wordpress Settings > General.', $this->textdomain); ?>" style="font-size:20px;"><span class="dashicons dashicons-info-outline"></span></span></div>
                                        <div class="seers-pr">
                                            <input type="hidden" id="cookies_lang" name="cookies_lang" value="<?php echo ((version_compare($this->wpcurversion,'4.7.0', '>=')) ? get_user_locale() : get_locale());?>" />


                                                    <?php if (get_locale()=='en') { ?>
                                                    <div data-value="en" lang="en"
                                                        data-continue="Continue" data-installed="1">English (United States)</div>
                                                    <?php } else if (get_locale()=='ar') { ?>
                                                        <div data-value="ar" lang="ar"
                                                        data-continue="المتابعة">العربية</div>
                                                    <?php } else if (get_locale()=='ary') { ?>
                                                        <div data-value="ary" lang="ar"
                                                        data-continue="المتابعة">العربية المغربية</div>
                                                    <?php } else if (get_locale()=='bg_BG') { ?>
                                                        <div data-value="bg_BG" lang="bg"
                                                        data-continue="Напред">Български</div>
                                                    <?php } else if (get_locale()=='cs_CZ') { ?>
                                                        <div data-value="cs_CZ" lang="cs"
                                                        data-continue="Pokračovat">Čeština</div>
                                                    <?php } else if (get_locale()=='da_DK') { ?>
                                                        <div data-value="da_DK" lang="da"
                                                        data-continue="Fortsæt">Dansk</div>
                                                    <?php } else if (get_locale()=='de_DE_formal') { ?>
                                                        <div data-value="de_DE_formal" lang="de"
                                                        data-continue="Weiter">Deutsch (Sie)</div>
                                                    <?php } else if (get_locale()=='de_CH') { ?>
                                                        <div data-value="de_CH" lang="de"
                                                        data-continue="Weiter">Deutsch (Schweiz)</div>
                                                    <?php } else if (get_locale()=='de_CH_informal') { ?>
                                                        <div data-value="de_CH_informal" lang="de"
                                                        data-continue="Weiter">Deutsch (Schweiz, Du)</div>
                                                    <?php } else if (get_locale()=='de_DE') { ?>
                                                        <div data-value="de_DE" lang="de"
                                                        data-continue="Weiter">Deutsch</div>
                                                    <?php } else if (get_locale()=='de_AT') { ?>
                                                        <div data-value="de_AT" lang="de"
                                                        data-continue="Weiter">Deutsch (Österreich)</div>
                                                    <?php } else if (get_locale()=='el') { ?>
                                                        <div data-value="el" lang="el"
                                                        data-continue="Συνέχεια">Ελληνικά</div>
                                                    <?php } else if (get_locale()=='en_CA') { ?>
                                                        <div data-value="en_CA" lang="en"
                                                        data-continue="Continue">English (Canada)</div>
                                                    <?php } else if (get_locale()=='en_ZA') { ?>
                                                        <div data-value="en_ZA" lang="en"
                                                        data-continue="Continue">English (South Africa)</div>
                                                    <?php } else if (get_locale()=='en_AU') { ?>
                                                        <div data-value="en_AU" lang="en"
                                                        data-continue="Continue">English (Australia)</div>
                                                    <?php } else if (get_locale()=='en_NZ') { ?>
                                                        <div data-value="en_NZ" lang="en"
                                                        data-continue="Continue">English (New Zealand)</div>
                                                    <?php } else if (get_locale()=='en_GB') { ?>
                                                        <div data-value="en_GB" lang="en"
                                                        data-continue="Continue">English (UK)</div>
                                                    <?php } else if (get_locale()=='en_GB') { ?>
                                                        <div data-value="es_PE" lang="es"
                                                        data-continue="Continuar">Español de Perú</div>
                                                    <?php } else if (get_locale()=='es_PE') { ?>
                                                        <div data-value="es_PE" lang="es"
                                                        data-continue="Continuar">Español de Perú</div>
                                                    <?php } else if (get_locale()=='es_ES') { ?>
                                                        <div data-value="es_ES" lang="es"
                                                        data-continue="Continuar">Español</div>
                                                    <?php } else if (get_locale()=='es_MX') { ?>
                                                        <div data-value="es_MX" lang="es"
                                                        data-continue="Continuar">Español de México</div>
                                                    <?php } else if (get_locale()=='es_CL') { ?>
                                                        <div data-value="es_CL" lang="es"
                                                        data-continue="Continuar">Español de Chile</div>
                                                    <?php } else if (get_locale()=='es_CL') { ?>
                                                        <div data-value="es_CL" lang="es"
                                                        data-continue="Continuar">Español de Chile</div>
                                                    <?php } else if (get_locale()=='es_CO') { ?>
                                                        <div data-value="es_CO" lang="es"
                                                        data-continue="Continuar">Español de Colombia</div>
                                                    <?php } else if (get_locale()=='es_PR') { ?>
                                                        <div data-value="es_PR" lang="es"
                                                        data-continue="Continuar">Español de Puerto Rico</div>
                                                    <?php } else if (get_locale()=='es_UY') { ?>
                                                        <div data-value="es_UY" lang="es"
                                                        data-continue="Continuar">Español de Uruguay</div>
                                                    <?php } else if (get_locale()=='es_GT') { ?>
                                                        <div data-value="es_GT" lang="es"
                                                             data-continue="Continuar">Español de Guatemala</div>>
                                                    <?php } else if (get_locale()=='es_AR') { ?>
                                                        <div data-value="es_AR" lang="es"
                                                        data-continue="Continuar">Español de Argentina</div>
                                                    <?php } else if (get_locale()=='es_VE') { ?>
                                                        <div data-value="es_VE" lang="es"
                                                        data-continue="Continuar">Español de Venezuela</div>
                                                    <?php } else if (get_locale()=='es_CR') { ?>
                                                        <div data-value="es_CR" lang="es"
                                                        data-continue="Continuar">Español de Costa Rica</div>
                                                    <?php } else if (get_locale()=='et') { ?>
                                                        <div data-value="et" lang="et"
                                                        data-continue="Jätka">Eesti</div>
                                                    <?php } else if (get_locale()=='eu') { ?>
                                                        <div data-value="eu" lang="eu"
                                                        data-continue="Jarraitu">Euskara</div>
                                                    <?php } else if (get_locale()=='ga') { ?>
                                                        <div data-value="ga" lang="ga"
                                                        data-continue="Jarraitu">Irish</div>
                                                    <?php } else if (get_locale()=='fr_BE') { ?>
                                                        <div data-value="fr_BE" lang="fr"
                                                        data-continue="Continuer">Français de Belgique</div>
                                                    <?php } else if (get_locale()=='fr_CA') { ?>
                                                        <div data-value="fr_CA" lang="fr"
                                                        data-continue="Continuer">Français du Canada</div>
                                                    <?php } else if (get_locale()=='fr_FR') { ?>
                                                        <div data-value="fr_FR" lang="fr"
                                                        data-continue="Continuer">Français</div>
                                                    <?php } else if (get_locale()=='gd') { ?>
                                                        <div data-value="gd" lang="gd"
                                                        data-continue="Lean air adhart">Gàidhlig</div>
                                                    <?php } else if (get_locale()=='hr') { ?>
                                                        <div data-value="hr" lang="hr"
                                                        data-continue="Nastavi">Hrvatski</div>
                                                    <?php } else if (get_locale()=='hu_HU') { ?>
                                                        <div data-value="hu_HU" lang="hu"
                                                        data-continue="Folytatás">Magyar</div>
                                                    <?php } else if (get_locale()=='it_IT') { ?>
                                                        <div data-value="it_IT" lang="it"
                                                        data-continue="Continua">Italiano</div>
                                                    <?php } else if (get_locale()=='lv') { ?>
                                                        <div data-value="lv" lang="lv"
                                                        data-continue="Turpināt">Latviešu valoda</div>
                                                    <?php } else if (get_locale()=='pl_PL') { ?>
                                                        <div data-value="pl_PL" lang="pl"
                                                        data-continue="Kontynuuj">Polski</div>
                                                    <?php } else if (get_locale()=='pt_AO') { ?>
                                                        <div data-value="pt_AO" lang="pt"
                                                        data-continue="Continuar">Português de Angola</div>
                                                    <?php } else if (get_locale()=='pt_BR') { ?>
                                                        <div data-value="pt_BR" lang="pt"
                                                        data-continue="Continuar">Português do Brasil</div>
                                                    <?php } else if (get_locale()=='pt_PT') { ?>
                                                        <div data-value="pt_PT" lang="pt"
                                                        data-continue="Continuar">Português</div>
                                                    <?php } else if (get_locale()=='pt_PT_ao90') { ?>
                                                        <div data-value="pt_PT_ao90" lang="pt"
                                                        data-continue="Continuar">Português (AO90)</div>
                                                    <?php } else if (get_locale()=='ro_RO') { ?>
                                                        <div data-value="ro_RO" lang="ro"
                                                        data-continue="Continuă">Română</div>
                                                    <?php } else if (get_locale()=='sk_SK') { ?>
                                                        <div data-value="sk_SK" lang="sk"
                                                        data-continue="Pokračovať">Slovenčina</div>
                                                    <?php } else if (get_locale()=='sl_SI') { ?>
                                                        <div data-value="sl_SI" lang="sl"
                                                        data-continue="Nadaljuj">Slovenščina</div>
                                                    <?php } else if (get_locale()=='sq') { ?>
                                                        <div data-value="sq" lang="sq"
                                                        data-continue="Vazhdo">Shqip</div>
                                                    <?php } else if (get_locale()=='sv_SE') { ?>
                                                        <div data-value="sv_SE" lang="sv"
                                                        data-continue="Fortsätt">Svenska</div>
                                                    <?php } else if (get_locale()=='tr_TR') { ?>
                                                        <div data-value="tr_TR" lang="tr"
                                                        data-continue="Devam">Türkçe</div>
                                                    <?php } else if (get_locale()=='uk') { ?>
                                                        <div data-value="uk" lang="uk"
                                                        data-continue="Продовжити">Українська</div>
                                                    <?php } else if (get_locale()=='zh_CN') { ?>
                                                        <div data-value="zh_CN" lang="zh"
                                                        data-continue="继续">简体中文</div>
                                                    <?php } else if (get_locale()=='zh_TW') { ?>
                                                        <div data-value="zh_TW" lang="zh"
                                                        data-continue="繼續">繁體中文</div>
                                                    <?php } else if (get_locale()=='zh_HK') { ?>
                                                        <div data-value="zh_HK" lang="zh"
                                                        data-continue="繼續">香港中文版 </div>
                                                    <?php } else { ?>
                                                        <div data-value="en" lang="en" selected
                                                        data-continue="Continue" data-installed="1">English (United States)</div>
                                                    <?php } ?>

                                        </div>
                                    </div>
                                    <!--Language: End-->
                                    <!------------------------------------------------------->
                                    <!--Show Badge-->
                                    <?php 
                                    $enablebade = true;
                                    if(!empty($userplan->data) && !empty($userplan->data->feature)) {
                                        $key=array_search("banner_customization", array_column($userplan->data->feature, 'name'));
                                        
                                        if($userplan->data->feature[$key]->value) {
                                            $enablebade = true;
                                        } else {
                                            $enablebade = false;
                                        }
                                    }

                                    ?>
                                    <div class="seers-panel seers-mb-30">
                                        <div class="seers-pl" style="display:flex; align-items:center;"><label class="seers-label" style="margin:0;" ><?php echo __('Show Badge', $this->textdomain); ?>: &nbsp;</label><span class="tooltip" data-title="<?php echo __('Show a badge to enable the cookie banner to appear post consent.', $this->textdomain); ?>" style="font-size:20px;"><span class="dashicons dashicons-info-outline"></span></span>
                                            <?php if ( $userplan && !empty($userplanname) && !$enablebade ) {
                                                    echo '<span class="dashicons dashicons-lock"></span>';
                                                }?>
                                        </div>
                                        <div class="seers-pr">
                                            <label class="toggle">
                                                <?php if ( (get_option('SCCBPP_cookie_consent_id') !== false || get_option('SCCBPP_cookie_consent_id') !== 'false' || get_option('SCCBPP_cookie_consent_id') != '') && 
                                                        ($userplan && !empty($userplanname) && $enablebade ) ) { ?>
                                                <?php if(get_option('SCCBPP_cookie_consent_show_badge') === 'true' || get_option('SCCBPP_cookie_consent_show_badge') === true || get_option('SCCBPP_cookie_consent_show_badge') === 1){?>
                                                <input class="toggle-checkbox 123" type="checkbox" name="show_badge" id="show_badge"
                                                        checked>
                                                <?php } else { ?>
                                                <input class="toggle-checkbox 456" type="checkbox" name="show_badge"
                                                       id="show_badge">
                                                <?php } ?>
                                                <?php } else if ( (get_option('SCCBPP_cookie_consent_id') === false || get_option('SCCBPP_cookie_consent_id') === 'false' || get_option('SCCBPP_cookie_consent_id') == '') ) {?>
                                                    <?php if(get_option('SCCBPP_cookie_consent_show_badge') === 'true' || get_option('SCCBPP_cookie_consent_show_badge') === true || get_option('SCCBPP_cookie_consent_show_badge') === 1){?>
                                                    <input class="toggle-checkbox 789" type="checkbox" name="show_badge" id="show_badge"
                                                            checked>
                                                    <?php } else { ?>
                                                    <input class="toggle-checkbox 146" type="checkbox" name="show_badge"
                                                           id="show_badge">
                                                    <?php } ?>
                                                <?php } ?>

                                                <div class="toggle-switch <?php echo (( ( !empty($userplanname) && !$enablebade ) ) ? 'seers-paid-feature-opener" name="badge' : ""); ?>"></div>
                                            </label>
                                        </div>
                                    </div>
                                    <!--Show Badge End-->
                                </div>
                                <!-- Banner Settings End-->
                                
                            </div>
                            <div class="visualsett">
                                
                                <!-- Visual Settings-->
                                <!--<h1><?php //echo __('Visual Settings', $this->textdomain); ?></h1>-->
                                <div class="section-setting">
                                    <!--Body:-->
                                    <div class="seers-panel seers-mb-30">
                                        <!-- <div class="seers-pl"><label class="seers-label">Banner Text:</label></div> -->
                                        <div class="seers-pl"><label class="seers-label" style="margin:0; display:flex;" ><?php echo __('Banner Text', $this->textdomain); ?>: &nbsp; <span class="tooltip" data-title="<?php echo __('Text to appear on the banner:', $this->textdomain); ?>" style="font-size:20px;"><span class="dashicons dashicons-info-outline"></span></span></label></div>
                                        <div class="seers-pr">
                                            <textarea class="seers-textarea" rows="4" cols="50" name="body_text"
                                                id="body_text"><?php if(get_option('SCCBPP_cookie_consent_body_text') && get_option('SCCBPP_cookie_consent_body_text')!=''){ esc_html_e(get_option('SCCBPP_cookie_consent_body_text')); }else{ esc_html_e( "We use cookies to ensure you get the best experience", $this->textdomain);} ?></textarea>
                                            <div><?php echo __('Body text will not appears when google banner will be active. Google banner can be set from seersco.com user dashboard', $this->textdomain);?></div>     
                                        </div>
                                    </div>
                                    
                                    <div class="seers-panel seers-mb-30">
                                        <!-- <div class="seers-pl"><label class="seers-label">Banner Text:</label></div> -->
                                        <div class="seers-pl"><label class="seers-label" style="margin:0; display:flex;" ><?php echo __('Banner Text', $this->textdomain) . ' ' . __('Colour', $this->textdomain); ?>: &nbsp; <span class="tooltip" data-title="<?php echo __('The text colour to appear on the banner:', $this->textdomain); ?>" style="font-size:20px;"><span class="dashicons dashicons-info-outline"></span></span></label></div>
                                        <div class="seers-color-width">
                                            <div class="color-pick-hol" style="display: flex; align-items: center;">
                                                <input type="color" name="body_color" id="body_color"
                                                    value="<?php if(get_option('SCCBPP_cookie_consent_body_text_color') && get_option('SCCBPP_cookie_consent_body_text_color')!=''){ esc_html_e(trim(get_option('SCCBPP_cookie_consent_body_text_color'))); }else{ echo "#000000"; }?>"
                                                    class="seers-banner-custom-color">
                                            </div>
                                        </div>
                                    </div>
                                    <!------------------------------------------------------->
                                    <!--Logo color:-->
                                    <div class="seers-panel seers-mb-30">
                                        <!-- <div class="seers-pl"><label class="seers-label">Banner Background</label></div> -->
                                        <div class="seers-pl"><label class="seers-label" style="margin:0; display:flex;" ><?php echo __('Banner Background', $this->textdomain); ?>: &nbsp; <span class="tooltip" data-title="<?php echo __('You can change the background colour of the banner:', $this->textdomain); ?>" style="font-size:20px;"><span class="dashicons dashicons-info-outline"></span></span></label></div>
                                        <div class="seers-color-width">    
                                            <div class="color-pick-hol" style="display: flex; align-items: center;">
                                            <!-- <div class="color-pick-hol">
                                                <label class="seers-color-label">Colour:</label> -->
                                                <input type="color" name="banner_bg_color" id="banner_bg_color"
                                                    value="<?php if(get_option('SCCBPP_cookie_consent_banner_bg_color') && get_option('SCCBPP_cookie_consent_banner_bg_color')!=''){ esc_html_e(trim(get_option('SCCBPP_cookie_consent_banner_bg_color'))); }else{ echo "#FFFFFF"; }?>"
                                                    class="seers-banner-custom-color">
                                            </div>
                                        </div>
                                    </div>
                                    <!--logo color end:-->
                                    <!------------------------------------------------------->
                                    <!--Accept Button:-->
                                    <div class="seers-panel seers-buttons seers-mb-30">
                                        <!-- <div class="seers-pl"><label class="seers-label">Accept Button:</label></div> -->
                                        <div><label class="seers-label" style="margin:0; display:flex;font-weight: bold;" ><?php echo __('Accept Button', $this->textdomain); ?>: &nbsp; <span class="tooltip" data-title="<?php echo __('You can change text colour, button colour and text of the \'Accept All\' button', $this->textdomain); ?>" style="font-size:20px;"><span class="dashicons dashicons-info-outline"></span></span></label></div>
                                        <div class="seers-mb-10">
                                            <div class="seers-pl"><label class="seers-label" style="margin:0; display:flex;" ><?php echo  __('Text Colour', $this->textdomain); ?>: &nbsp; <span class="tooltip" data-title="<?php echo __('The text colour to appear on the \'Accept All\' button:', $this->textdomain); ?>" style="font-size:20px;"><span class="dashicons dashicons-info-outline"></span></span></label></div>
                                            <div class="seers-color-width">
                                                <div class="color-pick-hol" style="display: flex; align-items: center;">
                                                <!-- <div class="color-pick-hol">
                                                    <label class="seers-color-label">Text Colour:</label> -->
                                                    <input type="color" name="agree_text_color" id="agree_text_color"
                                                        value="<?php if(get_option('SCCBPP_cookie_consent_agree_text_color') && get_option('SCCBPP_cookie_consent_agree_text_color')!=''){ esc_html_e(trim(get_option('SCCBPP_cookie_consent_agree_text_color'))); }else{ echo "#FFFFFF"; }?>"
                                                        class="seers-banner-custom-color" onchange="setColorDummyButton(this, 'text', 'accept_all')">
                                                </div>
                                            </div>
                                            
                                        </div>
                                        <div>
                                            <div class="seers-pl"><label class="seers-label" style="margin:0; display:flex;" ><?php echo __('Button Colour', $this->textdomain); ?>: &nbsp; <span class="tooltip" data-title="<?php echo __('The \'Accept All\' button colour to appear on the banner:', $this->textdomain); ?>" style="font-size:20px;"><span class="dashicons dashicons-info-outline"></span></span></label></div>
                                            <div class="seers-pr">
                                                <input type="color" name="agree_btn_color" id="agree_btn_color"
                                                    value="<?php if(get_option('SCCBPP_cookie_consent_agree_btn_color') && get_option('SCCBPP_cookie_consent_agree_btn_color')!=''){ esc_html_e(trim(get_option('SCCBPP_cookie_consent_agree_btn_color'))); }else{ echo "#3B6EF8"; }?>"
                                                    class="seers-banner-custom-color" onchange="setColorDummyButton(this, 'background', 'accept_all')">
                                                <input class="seers-input btn-input" type="text" name="accept_btn_text"
                                                    id="accept_btn_text" placeholder="<?php echo __('Allow All', $this->textdomain); ?>"
                                                    value="<?php if(get_option('SCCBPP_cookie_consent_accept_btn_text') && get_option('SCCBPP_cookie_consent_accept_btn_text')!=''){ esc_html_e(get_option('SCCBPP_cookie_consent_accept_btn_text')); }else{  echo __('Allow All', $this->textdomain); }?>" onchange="setColorDummyButton(this, 'value', 'accept_all')">
                                                <button class="seers-btn" type="button" id="accept_all" style="background-color:<?php if(get_option('SCCBPP_cookie_consent_agree_btn_color') && get_option('SCCBPP_cookie_consent_agree_btn_color')!=''){ esc_html_e(trim(get_option('SCCBPP_cookie_consent_agree_btn_color'))); }else{ echo "#3B6EF8"; }?>; color: <?php if(get_option('SCCBPP_cookie_consent_agree_text_color') && get_option('SCCBPP_cookie_consent_agree_text_color')!=''){ esc_html_e(trim(get_option('SCCBPP_cookie_consent_agree_text_color'))); }else{ echo "#FFFFFF"; }?>"><?php if(get_option('SCCBPP_cookie_consent_accept_btn_text') && get_option('SCCBPP_cookie_consent_accept_btn_text')!=''){ esc_html_e(get_option('SCCBPP_cookie_consent_accept_btn_text')); }else{  echo __('Allow All', $this->textdomain); }?></button>
                                            </div>
                                            
                                        </div>
                                        
                                    </div>
                                    <!--Accept Button:-->
                                    <!------------------------------------------------------->
                                    <!--Reject Button::-->
                                    <div class="seers-panel seers-buttons seers-mb-30">
                                        <!-- <div class="seers-pl"><label class="seers-label">Reject Button:</label></div> -->
                                        <div><label class="seers-label" style="margin:0; display:flex;font-weight: bold;" ><?php echo __('Reject Button', $this->textdomain); ?>: &nbsp; <span class="tooltip" data-title="<?php echo __('You can change text colour, button colour and text of the \'Reject All\' button', $this->textdomain);?>" style="font-size:20px;"><span class="dashicons dashicons-info-outline"></span></span></label></div>
                                        
                                        <div class="seers-mb-10">
                                            <div class="seers-pl"><label class="seers-color-label" style="margin:0;" ><?php echo __('Text Colour', $this->textdomain); ?>: &nbsp; <span class="tooltip" data-title="<?php echo __('The text colour to appear on the \'Reject All\' button:', $this->textdomain); ?>" style="font-size:20px;"><span class="dashicons dashicons-info-outline"></span></span></label></div>
                                            <div class="seers-color-width">
                                                <div class="color-pick-hol" style="display: flex; align-items: center;">
                                                <!-- <div class="color-pick-hol">
                                                    <label class="seers-color-label">Text Colour:</label> -->
                                                    <input type="color" name="disagree_text_color" id="disagree_text_color"
                                                    value="<?php if(get_option('SCCBPP_cookie_consent_disagree_text_color') && get_option('SCCBPP_cookie_consent_disagree_text_color')!=''){ esc_html_e(trim(get_option('SCCBPP_cookie_consent_disagree_text_color'))); }else{ echo "#FFFFFF"; }?>"
                                                    class="seers-banner-custom-color" onchange="setColorDummyButton(this, 'text', 'reject_all')">
                                                </div>
                                            </div>
                                            
                                        </div>
                                        <div>
                                            <div class="seers-pl"><label class="seers-color-label" style="margin:0;" ><?php echo __('Button Colour', $this->textdomain); ?>: &nbsp; <span class="tooltip" data-title="<?php echo __('The \'Reject All\' button colour to appear on the banner:', $this->textdomain); ?>" style="font-size:20px;"><span class="dashicons dashicons-info-outline"></span></span></label></div>
                                            <div class="seers-pr">
                                                <input type="color" name="disagree_btn_color" id="disagree_btn_color"
                                                    value="<?php if(get_option('SCCBPP_cookie_consent_disagree_btn_color') && get_option('SCCBPP_cookie_consent_disagree_btn_color')!=''){ esc_html_e(trim(get_option('SCCBPP_cookie_consent_disagree_btn_color'))); }else{ echo "#3B6EF8"; }?>"
                                                    class="seers-banner-custom-color" onchange="setColorDummyButton(this, 'background', 'reject_all')">
                                                <input class="seers-input btn-input" type="text" name="reject_btn_text"
                                                    id="reject_btn_text" placeholder="<?php echo __('Disable All', $this->textdomain); ?>"
                                                    value="<?php if(get_option('SCCBPP_cookie_consent_reject_btn_text') && get_option('SCCBPP_cookie_consent_reject_btn_text')!=''){ esc_html_e(get_option('SCCBPP_cookie_consent_reject_btn_text')); }else{ echo __('Disable All', $this->textdomain); }?>" onchange="setColorDummyButton(this, 'value', 'reject_all')">
                                                <button class="seers-btn" type="button" id="reject_all" style="background-color:<?php if(get_option('SCCBPP_cookie_consent_disagree_btn_color') && get_option('SCCBPP_cookie_consent_disagree_btn_color')!=''){ esc_html_e(trim(get_option('SCCBPP_cookie_consent_disagree_btn_color'))); }else{ echo "#3B6EF8"; }?>; color: <?php if(get_option('SCCBPP_cookie_consent_disagree_text_color') && get_option('SCCBPP_cookie_consent_disagree_text_color')!=''){ esc_html_e(trim(get_option('SCCBPP_cookie_consent_disagree_text_color'))); }else{ echo "#FFFFFF"; }?>"><?php if(get_option('SCCBPP_cookie_consent_reject_btn_text') && get_option('SCCBPP_cookie_consent_reject_btn_text')!=''){ esc_html_e(get_option('SCCBPP_cookie_consent_reject_btn_text')); }else{ echo __('Disable All', $this->textdomain); }?></button>
                                            </div>
                                            
                                        </div>
                                        
                                        
                                    </div>
                                    <!--Reject Button::-->
                                    <!------------------------------------------------------->
                                    <!--banner Settings Button:-->
                                    <div class="seers-panel seers-buttons seers-mb-30">
                                        <!-- <div class="seers-pl"><label class="seers-label">Setting Button:</label></div> -->
                                        <div><label class="seers-label" style="margin:0; display:flex;font-weight: bold;" ><?php echo __('Setting Button', $this->textdomain); ?>: &nbsp; <span class="tooltip" data-title="<?php echo __('You can change text colour and text of the \'Setting\' button', $this->textdomain); ?>" style="font-size:20px;"><span class="dashicons dashicons-info-outline"></span></span></label></div>
                                        
                                        <div class="seers-mb-10">
                                            <div class="seers-pl"><label class="seers-color-label" style="margin:0;" ><?php echo __('Text Colour', $this->textdomain); ?>: &nbsp; <span class="tooltip" data-title="<?php echo __('The text colour to appear on the \'Setting\' button:', $this->textdomain); ?>" style="font-size:20px;"><span class="dashicons dashicons-info-outline"></span></span></label></div>
                                            <div class="seers-color-width">
                                                <div class="color-pick-hol" style="display: flex; align-items: center;">
                                                <!-- <div class="color-pick-hol">
                                                    <label class="seers-color-label">Text Colour:</label> -->
                                                    <input type="color" name="preferences_text_color" id="preferences_text_color"
                                                    value="<?php if(get_option('SCCBPP_cookie_consent_preferences_text_color') && get_option('SCCBPP_cookie_consent_preferences_text_color')!=''){ esc_html_e(trim(get_option('SCCBPP_cookie_consent_preferences_text_color'))); }else{ echo "#000000"; }?>"
                                                    class="seers-banner-custom-color" onchange="setColorDummyButton(this, 'text', 'setting_pref')">
                                                </div>
                                            </div>
                                            
                                        </div>
                                        <div>
                                            <div class="seers-pl"><label class="seers-color-label" style="margin:0;" ><?php echo __('Button Colour', $this->textdomain); ?>: &nbsp; <span class="tooltip" data-title="<?php echo __('The \'Setting\' button colour to appear on the banner:', $this->textdomain); ?>" style="font-size:20px;"><span class="dashicons dashicons-info-outline"></span></span></label></div>
                                            <div class="seers-pr">
                                                <input type="color" name="setting_btn_color" id="setting_btn_color"
                                                    value="<?php if(get_option('SCCBPP_cookie_consent_preferences_btn_color') && get_option('SCCBPP_cookie_consent_preferences_btn_color')!=''){ esc_html_e(trim(get_option('SCCBPP_cookie_consent_preferences_btn_color'))); }else{ echo "#FFFFFF"; }?>"
                                                    class="seers-banner-custom-color" onchange="setColorDummyButton(this, 'background', 'setting_pref')">
                                                <input class="seers-input btn-input" type="text" name="setting_btn_text"
                                                    id="setting_btn_text" placeholder="Setting"
                                                    value="<?php if(get_option('SCCBPP_cookie_consent_setting_btn_text') && get_option('SCCBPP_cookie_consent_setting_btn_text')!=''){ esc_html_e(get_option('SCCBPP_cookie_consent_setting_btn_text')); }else{ echo __("Preference", $this->textdomain); }?>" onchange="setColorDummyButton(this, 'value', 'setting_pref')">
                                                <button class="seers-btn seers-setting-btn" type="button"
                                                id="setting_pref" style="background-color:<?php if(get_option('SCCBPP_cookie_consent_preferences_btn_color') && get_option('SCCBPP_cookie_consent_preferences_btn_color')!=''){ esc_html_e(trim(get_option('SCCBPP_cookie_consent_preferences_btn_color'))); }else{ echo "#FFFFFF"; }?>; color: <?php if(get_option('SCCBPP_cookie_consent_preferences_text_color') && get_option('SCCBPP_cookie_consent_preferences_text_color')!=''){ esc_html_e(trim(get_option('SCCBPP_cookie_consent_preferences_text_color'))); }else{ echo "#000000"; }?>"><?php if(get_option('SCCBPP_cookie_consent_setting_btn_text') && get_option('SCCBPP_cookie_consent_setting_btn_text')!=''){ esc_html_e(get_option('SCCBPP_cookie_consent_setting_btn_text')); }else{ echo __("Preference", $this->textdomain); }?></button>
                                            </div>
                                            
                                        </div>
                                        
                                    </div>
                                    <!--banner Settings End-->
                                    <!------------------------------------------------------->
                                    <!--Fonts-->
                                    <div class="seers-panel seers-mb-30">
                                        <!-- <div class="seers-pl"><label class="seers-label">Fonts:</label></div> -->
                                        <div class="seers-pl"><label class="seers-label" style="margin:0;" ><?php echo __('Fonts', $this->textdomain); ?>: &nbsp; <span class="tooltip" data-title="<?php echo __('You can select a font for the text of the banner:', $this->textdomain); ?>" style="font-size:20px;"><span class="dashicons dashicons-info-outline"></span></span></label></div>
                                        <div class="seers-pr">
                                            <select class="seers-input fm" id="seers_fonts_fm" name="seers_fonts_fm">
                                                <option value="arial"
                                                    <?php if (get_option('SCCBPP_cookie_consent_font_style')) { if(get_option('SCCBPP_cookie_consent_font_style')=='arial' || get_option('SCCBPP_cookie_consent_font_style')==''){ echo "selected"; } } else { echo "selected"; } ?>>
                                                    Arial</option>
                                                <option value="cursive"
                                                    <?php if(get_option('SCCBPP_cookie_consent_font_style')=='cursive'){ echo "selected"; } ?>>
                                                    Cursive</option>
                                                <option value="fantasy"
                                                    <?php if(get_option('SCCBPP_cookie_consent_font_style')=='fantasy'){ echo "selected"; } ?>>
                                                    Fantasy</option>
                                                <option value="monospace"
                                                    <?php if(get_option('SCCBPP_cookie_consent_font_style')=='monospace'){ echo "selected"; } ?>>
                                                    Monospace</option>
                                                <option value="sans-serif"
                                                    <?php if(get_option('SCCBPP_cookie_consent_font_style')=='sans-serif'){ echo "selected"; } ?>>
                                                    Sans Serif</option>
                                                <option value="serif"
                                                    <?php if(get_option('SCCBPP_cookie_consent_font_style')=='serif'){ echo "selected"; } ?>>
                                                    Serif</option>
                                                <option value="none"
                                                    <?php if(get_option('SCCBPP_cookie_consent_font_style')=='none'){ echo "selected"; } ?>>
                                                    None</option>
                                                <option value="inherit"
                                                    <?php if(get_option('SCCBPP_cookie_consent_font_style')=='inherit'){ echo "selected"; } ?>>
                                                    Default</option>
                                            </select>
                                            <select class="seers-input fs" id="seers_fonts_fs" name="seers_fonts_fs">
                                                <option value="8"
                                                    <?php if(get_option('SCCBPP_cookie_consent_font_size')=='8' || get_option('SCCBPP_cookie_consent_font_size', $this->defaultfontsize)==8){ echo "selected"; } ?>>
                                                    8</option>
                                                <option value="10"
                                                    <?php if(get_option('SCCBPP_cookie_consent_font_size')=='10' || get_option('SCCBPP_cookie_consent_font_size', $this->defaultfontsize)==10){ echo "selected"; } ?>>
                                                    10</option>
                                                <option value="12"
                                                    <?php if(get_option('SCCBPP_cookie_consent_font_size')=='12' || get_option('SCCBPP_cookie_consent_font_size', $this->defaultfontsize)==12){ echo "selected"; } ?>>
                                                    12</option>
                                                <option value="14"
                                                    <?php if(get_option('SCCBPP_cookie_consent_font_size')=='14' || get_option('SCCBPP_cookie_consent_font_size', $this->defaultfontsize)==14){ echo "selected"; } ?>>
                                                    14</option>
                                                <option value="16"
                                                    <?php if(get_option('SCCBPP_cookie_consent_font_size')=='16' || get_option('SCCBPP_cookie_consent_font_size', $this->defaultfontsize)==16){ echo "selected"; } ?>>
                                                    16</option>
                                            </select>
                                        </div>
                                    </div>
                                    <!--Fonts End-->
                                    <!------------------------------------------------------->
                                    <!--Select Button-->
                                    <div class="seers-panel seers-mb-30">
                                        <!-- <div class="seers-pl"><label class="seers-label">Select Button:</label></div> -->
                                        <div class="seers-pl"><label class="seers-label" style="margin:0;" ><?php echo __('Select Button', $this->textdomain); ?>: &nbsp; <span class="tooltip" data-title="<?php echo __('You can select the shape of the buttons that appear on the banner.', $this->textdomain); ?>" style="font-size:20px;"><span class="dashicons dashicons-info-outline"></span></span>
                                                <?php /*if ( get_option('SCCBPP_cookie_consent_id') === false || get_option('SCCBPP_cookie_consent_id') == '')*/ if (false) { 
                                                echo '<span class="dashicons dashicons-lock"></span>';
                                            } ?>
                                            </label>
                                        </div>
                                        <div class="seers-pr btn-group" role="group">
                                            <button
                                                class="seers-select-btn btn-default <?php if(!get_option('SCCBPP_cookie_consent_button_type') || get_option('SCCBPP_cookie_consent_button_type') == '' || get_option('SCCBPP_cookie_consent_button_type')=='cbtn_default'){ echo "active"; }?><?php //echo (( get_option('SCCBPP_cookie_consent_id') === false || get_option('SCCBPP_cookie_consent_id') == '') ? ' seers-paid-feature-opener' : ""); ?>"
                                                type="button" id="cbtn_default" name="btn_style_default"><?php echo __('Default', $this->textdomain); ?></button>
                                            <?php /*if ( get_option('SCCBPP_cookie_consent_id') === false || get_option('SCCBPP_cookie_consent_id') == '') { ?>
                                            <input type="button"
                                                class="seers-select-btn btn-flat <?php if(get_option('SCCBPP_cookie_consent_button_type')=='cbtn_flat'){ echo "active"; }?> seers-paid-feature-opener"
                                                type="button" name="btn_style_flat" value="<?php echo __('Flat', $this->textdomain); ?>">
                                            <input type="button"
                                                class="seers-select-btn btn-round <?php if(get_option('SCCBPP_cookie_consent_button_type')=='cbtn_rounded'){ echo "active"; }?> seers-paid-feature-opener"
                                                type="button" name="btn_style_rounded" value="<?php echo __('Rounded', $this->textdomain); ?>">
                                            <input type="button"
                                                class="seers-select-btn btn-stroke <?php if(get_option('SCCBPP_cookie_consent_button_type')=='cbtn_stroke'){ echo "active"; }?> seers-paid-feature-opener"
                                                type="button" name="btn_style_stroke" value="<?php echo __('Stroke', $this->textdomain); ?>">
                                            <?php } else {*/ ?>
                                            <button
                                                class="seers-select-btn btn-flat <?php if(get_option('SCCBPP_cookie_consent_button_type')=='cbtn_flat'){ echo "active"; }?>"
                                                type="button" id="cbtn_flat"><?php echo __('Flat', $this->textdomain); ?></button>
                                            <button
                                                class="seers-select-btn btn-round <?php if(get_option('SCCBPP_cookie_consent_button_type')=='cbtn_rounded'){ echo "active"; }?>"
                                                type="button" id="cbtn_rounded"><?php echo __('Rounded', $this->textdomain); ?></button>
                                            <button
                                                class="seers-select-btn btn-stroke <?php if(get_option('SCCBPP_cookie_consent_button_type')=='cbtn_stroke'){ echo "active"; }?>"
                                                type="button" id="cbtn_stroke"><?php echo __('Stroke', $this->textdomain); ?></button>
                                            <?php //} ?>

                                        </div>
                                    </div>
                                    <!--Select Button End-->
                                    <!------------------------------------------------------->
                                    <!--Select Button-->
                                    <div class="seers-panel seers-mb-30">
                                        <div class="seers-pl"><label class="seers-label" style="margin:0;" ><?php echo __('Display Style', $this->textdomain); ?>: &nbsp; <span class="tooltip" data-title="" style="font-size:20px;"><span class="dashicons dashicons-info-outline"></span></span>
                                            </label>
                                        </div>
                                        <div class="seers-pr btn-group-display" role="group">
                                            <button
                                                class="seers-select-display-btn btn-banner <?php if(!get_option('SCCBPP_cookie_consent_banner_position') || get_option('SCCBPP_cookie_consent_banner_position') == '' || get_option('SCCBPP_cookie_consent_banner_position') == 'seers-cmp-banner-bar' || get_option('SCCBPP_cookie_consent_banner_position') == 'seers-cmp-top-bar'){ echo "active"; }?>"
                                                type="button" id="cbtn_default" name="btn_style_default"><span class="seers-banner bannerpos"></span><?php echo __('Banner', $this->textdomain); ?></button>
                                            <button
                                                class="seers-select-display-btn btn-modal <?php if(get_option('SCCBPP_cookie_consent_banner_position') == 'seers-cmp-middle-bar'){ echo "active"; }?>"
                                                type="button" id="cbtn_flat"><span class="seers-modal"></span><?php echo __('Modal', $this->textdomain); ?></button>
                                            <button
                                                class="seers-select-display-btn btn-tooltip <?php if(get_option('SCCBPP_cookie_consent_banner_position') == 'seers-cmp-top-left-bar' || get_option('SCCBPP_cookie_consent_banner_position') == 'seers-cmp-top-right-bar' || get_option('SCCBPP_cookie_consent_banner_position') == 'seers-cmp-left-bar' || get_option('SCCBPP_cookie_consent_banner_position') == 'seers-cmp-right-bar'){ echo "active"; }?>"
                                                type="button" id="cbtn_rounded"><span class="dashicons dashicons-minus tooltipicon"></span><?php echo __('Tooltip', $this->textdomain); ?></button>
                                            <?php //} ?>

                                        </div>
                                    </div>
                                    <!--Select Button End-->
                                    <!------------------------------------------------------->
                                    <!--Select Button-->
                                    <div class="seers-panel seers-mb-30 display-position">
                                        <div class="seers-pl"><label class="seers-label" style="margin:0;" ><?php echo __('Position', $this->textdomain); ?>: &nbsp; <span class="tooltip" data-title="<?php echo __('Place of Banner.', $this->textdomain); ?>" style="font-size:20px;"><span class="dashicons dashicons-info-outline"></span></span>
                                            </label>
                                        </div>
                                        <div class="seers-pr btn-group-position" role="group">
                                            <button
                                                class="seers-select-display-btn btn-top <?php if(get_option('SCCBPP_cookie_consent_banner_position')=='seers-cmp-top-bar'){ echo "active"; }?><?php //echo (( get_option('SCCBPP_cookie_consent_id') === false || get_option('SCCBPP_cookie_consent_id') == '') ? ' seers-paid-feature-opener' : ""); ?>"
                                                type="button" id="cbtn_default" name="btn_style_default"><span class="seers-banner bannertpos"></span><?php echo __('Top', $this->textdomain); ?></button>
                                            <button
                                                class="seers-select-display-btn btn-bottom <?php if(get_option('SCCBPP_cookie_consent_banner_position')=='seers-cmp-banner-bar'){ echo "active"; }?>"
                                                type="button" id="cbtn_flat"><span class="seers-banner bannerbpos"></span><?php echo __('Bottom', $this->textdomain); ?></button>
                                            <button
                                                class="seers-select-display-btn btn-bottomleft <?php if(get_option('SCCBPP_cookie_consent_banner_position') == 'seers-cmp-left-bar'){ echo "active"; }?>"
                                                type="button" id="cbtn_rounded"><span class="seers-bottomleft"></span><?php echo __('Bottom Left', $this->textdomain); ?></button>
                                            <button
                                                class="seers-select-display-btn btn-bottomright <?php if(!get_option('SCCBPP_cookie_consent_banner_position') || get_option('SCCBPP_cookie_consent_banner_position') == '' || get_option('SCCBPP_cookie_consent_banner_position')=='seers-cmp-right-bar'){ echo "active"; }?>"
                                                type="button" id="cbtn_rounded"><span class="seers-bottomright"></span><?php echo __('Bottom Right', $this->textdomain); ?></button>
                                                <button
                                                class="seers-select-display-btn btn-topleft <?php if(get_option('SCCBPP_cookie_consent_banner_position')=='seers-cmp-top-left-bar'){ echo "active"; }?>"
                                                type="button" id="cbtn_rounded"><span class="seers-topleft"></span><?php echo __('Top Left', $this->textdomain); ?></button>
                                            <button
                                                class="seers-select-display-btn btn-topright <?php if(get_option('SCCBPP_cookie_consent_banner_position')=='seers-cmp-top-right-bar'){ echo "active"; }?>"
                                                type="button" id="cbtn_rounded"><span class="seers-topright"></span><?php echo __('Top Right', $this->textdomain); ?></button>
                                            <?php //} ?>

                                        </div>
                                    </div>
                                    <!--Select Button End-->
                                    
                                </div>
                                <!-- Visual Settings End-->
                                
                            </div>
                            
                        </div>
                        
                        <!------------------------------------------------------->
                        <!--Preview buttons-->

                        <div class="seers-panel seers-tab-footer">

                            <div class=""></div>
                            <div class="seers-pr ">
                                <p id="setting_message_success" class="seers_messages"></p>
                                <p id="setting_message_error" class="seers_messages"></p>
                                <div id="loader"></div>
                                <div class="seers_btn_div">
                                    <a href="<?php echo $D_URL;  ?>" target="_blank"
                                        class="seers-btn-preview  s-save"><?php echo __('PREVIEW', $this->textdomain); ?></a>
                                    <button class="seers-btn-preview" type="button" id="setting_save"><?php echo __('SAVE', $this->textdomain); ?></button>
                                </div>


                            </div>
                        </div>
                        <!--Preview buttons End-->
                        
                    </form>
                </div>
            </div>
            <!--Banner Setting tab End-->


        </section>
    </div>
                        </div>
            
            <div class="seers-plugin-sidebar-cont">
                <div class="seers-content-col tile-style">
                    <h3 class="title-two">
                        <?php echo __('Data Privacy &amp;
                        Compliance. Solved', $this->textdomain); ?></h3>
                    <p><?php echo __('Trust worlds leading privacy and consent management platform to help companies comply
                        with GDPR, PECR, CCPA and ePrivacy', $this->textdomain); ?></p> <a href="https://seersco.com/price-plan" target="_blank"
                        class="btn btn-green-bg"><?php echo __('START PREMIUM TODAY', $this->textdomain); ?></a>
                </div>
                <div class="seers-content-col tile-style">
                    <div class="seers-headingbg">
                        <h3 class="title-two-right"><?php echo 'Seers ' . '<span class="seers-greentext">' .  __('Premium Plan', $this->textdomain) . '</span>'; ?></h3>
                    </div>
                    
                    <ul class="branding">
                        <li class="text-white"><?php echo __('Branding', $this->textdomain); ?><span><?php echo __('Restyle Cookie Consent with your own branding, logos, colours etc', $this->textdomain); ?></span></li>
                        <li class="text-white multilanguage"><?php echo __('Multi Lingual', $this->textdomain); ?><span><?php echo __('28 languages to choose from. Offer localised text with control of location and languages', $this->textdomain); ?></span></li>
                        <li class="text-white consentlog"><?php echo __('Consent Log', $this->textdomain); ?><span><?php echo __('As per GDPR article 30 demonstrate that data subject consent was received', $this->textdomain); ?></span></li>
                        <li class="text-white cookiepolicy"><?php echo __('Cookie Policy', $this->textdomain); ?><span><?php echo __("Setting up your Privacy Policies is something every business needs to comply with. It used to be a hassle & cost a fortune. We've solved that.", $this->textdomain); ?></span></li>
                        <li class="text-white priorconsent"><?php echo __('Prior Consent', $this->textdomain); ?><span><?php echo __('By law, you must gain prior consent before any cookies drop. Our banner is one of the few that is compliant', $this->textdomain); ?></span></li>
                        <li class="text-white bannerdesigns"><?php echo __('6+ Design Layouts', $this->textdomain); ?><span><?php echo __('6 Consent banner designs to choose from', $this->textdomain); ?></span></li>
                        <li class="text-white customerservice"><?php echo __('Customer Support', $this->textdomain); ?><span><?php echo __('We pride ourselves on our one-to-one customer support. We will bend over backwards to assist you', $this->textdomain); ?></span></li>
                        <li class="text-white cusomization"><?php echo __('Banner Customisation', $this->textdomain); ?><span><?php echo __("Fully customisable - choose your banner's position, size, colour, buttons, texts, fonts etc", $this->textdomain); ?></span></li>
                        <li class="text-white subdomain"><?php echo __('Subdomains', $this->textdomain); ?><span><?php echo __('Have multiple subdomains? We have you covered with multi-subdomain support', $this->textdomain); ?></span></li>
                    </ul> <a href="https://seersco.com/price-plan" target="_blank" class="btn btn-green-bg"><?php echo __('START PREMIUM
                        TODAY', $this->textdomain); ?></a>
                </div>
            </div>
            </div>
</div>
<!--tabs end-->
<!--by Shoaib paid popup start-->
<div id="seers-paid-cmp-overlay" class="seers-paid-cmp-overlay"></div>
<div class="seers-cmp-paid-popup-content seers-cmp-paid-popup-no-active" id="seers-cmp-paid-popup-content"> <span class="seers-cmp-paid-popup-close" title="close">×</span>
    <div class="seers-cmp-paid-body-text">
        <h3 class="seers-cmp-paid-title" id="seers-paid-popup-title">
        <?php echo __('Premium Plan', $this->textdomain); ?>
    </h3>
        <div class="seers-cmp-policy-banner-text-large-block">
            <p class="seers-cmp-paid-text" id="seers-paid-popup-bodytext"> <?php echo __('Only the users with a paid account can avail this feature.', $this->textdomain); ?> </p>
        </div>
    </div>
    <div class="seers-cmp-paid-popup-footer">
        <div class="seers-cmp-paid-popup-footer-block"> <a href="#" class="seers-cmp-btn" id="paid-popup-btnok" lang="en" tabindex="0" style="border-radius: 10px !important; -webkit-border-radius: 10px !important; font-weight: 500 !important; font-size: 13px; border: none; padding: 11px 14px;"> 
                <?php echo __('Ok', $this->textdomain); ?>
             </a> <a href="#" class="seers-cmp-btn" id="paid-popup-btnaccount" lang="en" tabindex="1" style="border-radius: 10px !important; -webkit-border-radius: 10px !important; font-weight: 500 !important; font-size: 13px; border: none; padding: 11px 14px;"> 
                <?php echo __('Account Setup', $this->textdomain); ?>
             </a> </div>
    </div>
</div>
<!--paid popup end-->

<!-- by Shoaib confirmation popup start --->
<div class="seers-cmp-paid-popup-content seers-cmp-paid-popup-no-active" id="seers-cmp-confirm-popup-content"> <span class="seers-cmp-confirm-popup-close" title="close">×</span>
    <div class="seers-cmp-paid-body-text">
        <div class="seers-cmp-policy-banner-text-large-block">
            <p class="seers-cmp-paid-text" id="seers-paid-confirmmsg-bodytext" style="color: #0061fe !important;"> <?php echo __('Only the users with a paid account can avail this feature.', $this->textdomain); ?> </p>
        </div>
    </div>
    <div class="seers-cmp-paid-popup-footer">
        <div class="seers-cmp-paid-popup-footer-block"> <a href="#" class="seers-cmp-btn" id="confirm-popup-btnok" lang="en" tabindex="0" style="border-radius: 10px !important; -webkit-border-radius: 10px !important; font-weight: 500 !important; font-size: 13px; border: none; padding: 11px 14px;"> 
                <?php echo __('Ok', $this->textdomain); ?>
             </a> </div>
    </div>
</div>
<!-- confirmation popup end --->

<!-- by Shoaib login popup start --->
<div class="seers-cmp-paid-popup-content seers-cmp-paid-popup-no-active" id="seers-cmp-login-popup-content"> <span class="seers-cmp-login-popup-close" title="close">×</span>
    <div class="seers-cmp-paid-body-text">
        <div class="seers-cmp-policy-banner-text-large-block loginform">
            <div id="loginloader"></div>
            <h3 class="seers-cmp-paid-title" id="seers-paid-popup-title">
                <?php echo __('Provide Seersco.com Login Credentials', $this->textdomain); ?>
            </h3>
            <div class="errorsmsgs"></div>
            <div class="form-group">
                <input type="email" id="email" name="email" class="form-control box-shadow-same-2 " value="<?php esc_html_e($admin_Email); ?>" autocomplete="off" autocapitalize="off" placeholder="<?php echo __('Email');?>" autocorrect="off" spellcheck="false" required="true">
            </div>
            <div class="form-group">
                <input type="password" id="password" name="password" class="form-control box-shadow-same-2 " value="" autocomplete="off" autocapitalize="off" placeholder="<?php echo __('Password');?>" autocorrect="off" spellcheck="false" required="true">
            </div>
        </div>
    </div>
    <div class="seers-cmp-paid-popup-footer">
        <div class="seers-cmp-paid-popup-footer-block"> <a href="#" class="seers-cmp-btn" id="seers-cms-confirm-popup-btnlogin" lang="en" tabindex="0"> 
                <?php echo __('Login', $this->textdomain); ?>
             </a> </div>
    </div>
</div>
<!-- login popup end --->

<!-- by Shoaib banner priority start --->
<div class="seers-cmp-paid-popup-content seers-cmp-paid-popup-no-active" id="seers-cmp-bannersetting-popup-content"> <span class="seers-cmp-bannersetting-popup-close" title="close">×</span>
    <div class="seers-cmp-paid-body-text">
        <h3 class="seers-cmp-paid-title" id="seers-paid-popup-title">
        <?php echo __('Banner Settings', $this->textdomain); ?>
    </h3>
        <div class="seers-cmp-policy-banner-text-large-block">
            <p class="seers-cmp-paid-text" id="seers-paid-popup-bodytext"> <?php echo __('Want to import settings from seersco.com or keep wordpress banner settings.', $this->textdomain); ?> </p>
        </div>
    </div>
    <div class="seers-cmp-paid-popup-footer">
        <div class="seers-cmp-paid-popup-footer-block"> <a href="#" class="seers-cmp-btn seers-keepseetingsbtn" id="paid-popup-keepwp" lang="en" tabindex="0"> 
                <?php echo __('Keep WP Seetings', $this->textdomain); ?>
             </a> <a href="#" class="seers-cmp-btn seers-keepseetingsbtn" id="paid-popup-getseersco" lang="en" tabindex="1"> 
                <?php echo __('Seersco.com Settings', $this->textdomain); ?>
             </a> </div>
    </div>
</div>
<script>
    document.addEventListener('DOMContentLoaded', function() {
        const createAccountLi = document.querySelector('.createaccount');
        const alreadyExistingLi = document.querySelector('.alreadyesiting');
        document.getElementById('loader').style.display = 'block';

        function toggleActiveClass() {
            if (this === createAccountLi) {
                createAccountLi.classList.add('seers-cms-account-active', 'tactive');
                alreadyExistingLi.classList.remove('seers-cms-account-active', 'tactive');
            } else if (this === alreadyExistingLi) {
                alreadyExistingLi.classList.add('seers-cms-account-active', 'tactive');
                createAccountLi.classList.remove('seers-cms-account-active', 'tactive');
            }
        }

        createAccountLi.addEventListener('click', toggleActiveClass);
        alreadyExistingLi.addEventListener('click', toggleActiveClass);
    });
    window.onload = function() {
    document.getElementById('loader').style.display = 'none';
};
</script>
<!--banner setting priority popup end-->
<script>

    let curuserplan = "<?php echo $userplanname;?>";
    let showloginpopup = "<?php echo $showloginpopup;?>";
    let popupforbanner = "<?php echo $processtype;?>";
    let showthetab = "<?php echo $currenttab;?>";
    
    let banneractiveind = 1;
    let modalactiveind = 11;
    let tooltipactiveind = 3;
    
    <?php 
    if(get_option('SCCBPP_cookie_consent_banner_position')=='seers-cmp-top-bar'){
        ?>banneractiveind = 0;<?php 
    } else if(get_option('SCCBPP_cookie_consent_banner_position')=='seers-cmp-banner-bar') {
        ?>banneractiveind = 1;<?php
    } else if(get_option('SCCBPP_cookie_consent_banner_position')=='seers-cmp-top-hanging-bar') {
        ?>banneractiveind = 6;<?php
    } else if(get_option('SCCBPP_cookie_consent_banner_position')=='seers-cmp-banner-hanging-bar') {
        ?>banneractiveind = 7;<?php
    } else if(get_option('SCCBPP_cookie_consent_banner_position')=='seers-cmp-banner-preference-bar') {
        ?>banneractiveind = 8;<?php
    } else if(get_option('SCCBPP_cookie_consent_banner_position')=='seers-cmp-preference-bottom-hanging-bar') {
        ?>banneractiveind = 9;<?php
    }
    ?>

    <?php 
    if(get_option('SCCBPP_cookie_consent_banner_position')=='seers-cmp-middle-bar'){
        ?>modalactiveind = 11;<?php 
    } else if(get_option('SCCBPP_cookie_consent_banner_position')=='seers-cmp-preference-universal-bar') {
        ?>modalactiveind = 10;<?php
    }
    ?>
        
    <?php 
    /*if (get_option('SCCBPP_cookie_consent_banner_position')=='seers-cmp-top-left-bar') {
        ?>tooltipactiveind = 2;<?php 
    } else if(get_option('SCCBPP_cookie_consent_button_type')=='seers-cmp-top-right-bar') {
        ?>tooltipactiveind = 3;<?php
    } else if(get_option('SCCBPP_cookie_consent_button_type')=='seers-cmp-left-bar') {
        ?>tooltipactiveind = 4;<?php
    } else if(get_option('SCCBPP_cookie_consent_button_type')=='seers-cmp-right-bar') {
        ?>tooltipactiveind = 5;<?php
    }*/
    
    if(get_option('SCCBPP_cookie_consent_banner_position')=='seers-cmp-left-bar') {
        ?>tooltipactiveind = 2;<?php
    } else if(get_option('SCCBPP_cookie_consent_banner_position')=='seers-cmp-right-bar') {
        ?>tooltipactiveind = 3;<?php
    } else if (get_option('SCCBPP_cookie_consent_banner_position')=='seers-cmp-top-left-bar') {
        ?>tooltipactiveind = 4;<?php 
    } else if(get_option('SCCBPP_cookie_consent_banner_position')=='seers-cmp-top-right-bar') {
        ?>tooltipactiveind = 5;<?php
    }
    ?>
    
    let gotopriceplan = false;
    // Get the seers-cmp-paid-popup
    var cmpnbannersettingmodal = document.getElementById("seers-cmp-bannersetting-popup-content");
    var cmpnloginmodal = document.getElementById("seers-cmp-login-popup-content");
    var cmpnconfirmmodal = document.getElementById("seers-cmp-confirm-popup-content");
    var cmpnsentmodal = document.getElementById("seers-cmp-paid-popup-content");
    var cmpnsentmodaloverlay = document.getElementById("seers-paid-cmp-overlay");
    // Get the button that opens the seers-cmp-default-banner
    var seersOpenelements = document.querySelectorAll(".seers-paid-feature-opener");
    // Get the <span> element that seers-cmp-paid-popup-close the seers-cmp-default-banner
    var seersClosespan = document.getElementsByClassName("seers-cmp-paid-popup-close")[0];
    var seersCloseconfirmspan = document.getElementsByClassName("seers-cmp-confirm-popup-close")[0];
    var seersCloseloginspan = document.getElementsByClassName("seers-cmp-login-popup-close")[0];
    var seersClosebannersettingspan = document.getElementsByClassName("seers-cmp-bannersetting-popup-close")[0];

    var seerspopuptitle = document.getElementById("seers-paid-popup-title");
    var seerspopupbodytext = document.getElementById("seers-paid-popup-bodytext");
    var seersconfirmpopupbodytext = document.getElementById("seers-paid-confirmmsg-bodytext");
    var seerspopupokbtn = document.getElementById("paid-popup-btnok");
    var seerspopupaccbtn = document.getElementById("paid-popup-btnaccount");
    var seerspopupconfirmokbtn = document.getElementById("confirm-popup-btnok");
    var seerspopupconfirmloginbtn = document.getElementById("seers-cms-confirm-popup-btnlogin");
    var seerspopupbannerkeepwpbtn = document.getElementById("paid-popup-keepwp");
    var seerspopupbannerkeepseersbtn = document.getElementById("paid-popup-getseersco");
    // When the user clicks the element, open the seers-cmp-paid-popup

    seersCloseconfirmspan.onclick = function () {
        cmpnconfirmmodal.classList.remove("seers-cmp-paid-popup-active");
        cmpnconfirmmodal.classList.add("seers-cmp-paid-popup-no-active");
        cmpnsentmodaloverlay.classList.remove("seers-cmp-paid-overlay-active");
    }
    
    seerspopupconfirmokbtn.onclick = function () {
        cmpnconfirmmodal.classList.remove("seers-cmp-paid-popup-active");
        cmpnconfirmmodal.classList.add("seers-cmp-paid-popup-no-active");
        cmpnsentmodaloverlay.classList.remove("seers-cmp-paid-overlay-active");

    }
    
    seersCloseloginspan.onclick = function () {
        cmpnloginmodal.classList.remove("seers-cmp-paid-popup-active");
        cmpnloginmodal.classList.add("seers-cmp-paid-popup-no-active");
        cmpnsentmodaloverlay.classList.remove("seers-cmp-paid-overlay-active");
    }
    
    seersClosebannersettingspan.onclick = function () {
        cmpnbannersettingmodal.classList.remove("seers-cmp-paid-popup-active");
        cmpnbannersettingmodal.classList.add("seers-cmp-paid-popup-no-active");
        cmpnsentmodaloverlay.classList.remove("seers-cmp-paid-overlay-active");
    }
</script>
<script type="text/javascript">
    function setColorDummyButton(telement, styleattr, eleid){
        
        if( styleattr === 'background' )
            document.getElementById(eleid).style.backgroundColor =  telement.value;
        else if( styleattr === 'text' )
            document.getElementById(eleid).style.color =  telement.value;
        else if( styleattr === 'value' )
            document.getElementById(eleid).innerText =  telement.value;
    }
    
(function() {

    if (document.getElementById('enable_policy').checked == false) {
        document.getElementById('show-cookie-policy-url').style.display = "none";
    }
    let numberGroup = document.querySelectorAll(".number");
    numberGroupfunc = function() {
        let pass = false;
        [].map.call(numberGroup, function(elem) {
            if (elem.checked == false) {
                pass = true;
            }
        });
        if (pass) {
            document.getElementById('SCCBPP_cookieid').disabled = true;
        } else {
            document.getElementById('SCCBPP_cookieid').disabled = false;
        }
    };
    [].map.call(numberGroup, function(elem) {
        elem.addEventListener("click", numberGroupfunc, false);
    });
    
    document.getElementById('SCCBPP_cookie_consent_email').addEventListener('change', function() {
        let checkboxes = document.getElementsByClassName("number");
        checkboxes[0].checked = false;
        checkboxes[1].checked = false;
    });

    document.getElementById('enable_policy').addEventListener('change', function() {
        if (document.getElementById('enable_policy').checked == true) {
            document.getElementById('show-cookie-policy-url').style.display = "block";
            document.getElementById('enable_policy').checked = true;
        } else {
            document.getElementById('show-cookie-policy-url').style.display = "none";
            document.getElementById('enable_policy').checked = false;
        }
    });


    document.getElementById('policyloader').style.display = "none";
    document.getElementById('cookie_policy').addEventListener('click', function(e) {
        e.preventDefault();
        var enable_policy = document.getElementById('enable_policy').value;
        var cookies_url = document.getElementById('cookies_url').value;

        if (document.getElementById('enable_policy').checked == true) {
            enable_policy = 'true';
        } else {
            enable_policy = 'false';
        }
        
        

        var params = "action=cookies_policy&seerspolicynonce=<?php echo wp_create_nonce( 'seers-policy-call' );?>&enable_policy=" + enable_policy + "&cookies_url=" + cookies_url;
        httpRequest = new XMLHttpRequest()
        httpRequest.open('POST', ajaxurl)
        httpRequest.setRequestHeader('Content-Type', 'application/x-www-form-urlencoded');
        httpRequest.send(params);
        
        document.getElementById('policyloader').style.display = "block";
        httpRequest.onreadystatechange = function() {
            // Process the server response here.
            if (httpRequest.readyState === XMLHttpRequest.DONE) {
                if (httpRequest.status === 200) {
                    /*document.getElementById('policy_message_success').innerHTML = httpRequest
                        .responseText;*/
                
                    document.getElementById('policyloader').style.display = "none";
                    
                    let responsetext = httpRequest.responseText;
                    
                    seersconfirmpopupbodytext.innerText = responsetext;

                    seersconfirmpopupbodytext.classList.remove("seers-errorsmsg");
                    seersconfirmpopupbodytext.classList.add("seers-successmsg");
                    cmpnconfirmmodal.classList.add("seers-cmp-paid-popup-active");
                    cmpnconfirmmodal.classList.remove("seers-cmp-paid-popup-no-active");
                    cmpnsentmodaloverlay.classList.add("seers-cmp-paid-overlay-active");
                    
                    if(responsetext.includes("login again")){
                        window.location.reload();
                    }
                
                } else {
                    /*document.getElementById('policy_message_error').innerHTML = httpRequest
                        .responseText;*/
                
                    sssdocument.getElementById('policyloader').style.display = "none";
                
                    seersconfirmpopupbodytext.innerText = httpRequest.responseText;

                    seersconfirmpopupbodytext.classList.remove("seers-successmsg");
                    seersconfirmpopupbodytext.classList.add("seers-errorsmsg");
                    cmpnconfirmmodal.classList.add("seers-cmp-paid-popup-active");
                    cmpnconfirmmodal.classList.remove("seers-cmp-paid-popup-no-active");
                    cmpnsentmodaloverlay.classList.add("seers-cmp-paid-overlay-active");
                }
            }
        }
    });


})();

/********** Tabs3 Ajax Response ***************/



/*********** Tabs2 Post Ajax response. **************/
//$('#loader').hide();
document.getElementById('loader').style.display = "none";
// document.getElementById('setting_save.setAttribute("disabled", "true");

document.getElementById("setting_save_new").addEventListener('click', function(e) {
    e.preventDefault();

    var bannerVal = '';
    var show_badge = '';
    if (document.getElementById('banner_check').checked) {
        bannerVal = 'true';
    } else {
        bannerVal = 'false';
    }
    if (document.getElementById('show_badge') && document.getElementById('show_badge').checked) {
        show_badge = 'true';
    } else {
        show_badge = 'false';
    }
    //let selectedBtnVal = document.getElementsByClassName("active");
    let selectedBtnVal = document.getElementsByClassName("seers-select-btn active");
    if (selectedBtnVal.length > 0) {
        selectedBtnVal = selectedBtnVal[0].getAttribute("id");
    } else {
        selectedBtnVal = null
    }
    
    let postionbtngroup = document.querySelectorAll(".btn-group-position button");
        let currentindex = Array.prototype.indexOf.call(postionbtngroup, document.querySelectorAll(".btn-group-position button.active")[0]);
        let modalmiddle = ((document.querySelectorAll(".seers-cms-visual-setting-group-res.display-position")[0].style.display === 'none') ? true : false );
        let postionselected = 'seers-cmp-banner-bar';
        
        // if (modalmiddle) {
        //     postionselected = 'seers-cmp-middle-bar';
        // } else {
            /*if (currentindex === 0) {
                postionselected = 'seers-cmp-top-bar';
            } else if (currentindex === 1) {
                postionselected = 'seers-cmp-banner-bar';
            } else if (currentindex === 2) {
                postionselected = 'seers-cmp-top-left-bar';
            } else if (currentindex === 3) {
                postionselected = 'seers-cmp-top-right-bar';
            } else if (currentindex === 4) {
                postionselected = 'seers-cmp-left-bar';
            } else if (currentindex === 5) {
                postionselected = 'seers-cmp-right-bar';
            }*/
            
            if (currentindex === 0) {
                postionselected = 'seers-cmp-top-bar';
            } else if (currentindex === 1) {
                postionselected = 'seers-cmp-banner-bar';
            } else if (currentindex === 2) {
                postionselected = 'seers-cmp-left-bar';
            } else if (currentindex === 3) {
                postionselected = 'seers-cmp-right-bar';
            } else if (currentindex === 4) {
                postionselected = 'seers-cmp-top-left-bar';
            } else if (currentindex === 5) {
                postionselected = 'seers-cmp-top-right-bar';
            } else if (currentindex === 6) {
                postionselected = 'seers-cmp-top-hanging-bar';
            } else if (currentindex === 7) {
                postionselected = 'seers-cmp-banner-hanging-bar';
            } else if (currentindex === 8) {
                postionselected = 'seers-cmp-banner-preference-bar';
            } else if (currentindex === 9) {
                postionselected = 'seers-cmp-preference-bottom-hanging-bar';
            } else if (currentindex === 10) {
                postionselected = 'seers-cmp-preference-universal-bar';
            } else if (currentindex === 11) {
                postionselected = 'seers-cmp-middle-bar';
            }
        // }

    var params = "action=cookies_setting&seerscoosettingnonce=<?php echo wp_create_nonce( 'seers-cooksetting-call' );?>&banners=" + bannerVal + "&cookies_expiry=" + document.getElementById(
            'cookies_expiry').value + "&cookies_lang=" + document.getElementById('cookies_lang').value +
        "&show_badge=" + show_badge + "&banner_bg_color=" + document.getElementById('banner_bg_color').value +
        "&body_text_color=" + document.getElementById('body_color').value + "&body_text=" + document.getElementById(
            'body_text').value + "&agree_btn_color=" + document.getElementById('agree_btn_color').value +
        "&agree_text_color=" + document.getElementById('agree_text_color').value + "&accept_btn_text=" +
        document.getElementById('accept_btn_text').value + "&disagree_text_color=" + document.getElementById(
            'disagree_text_color').value + "&disagree_btn_color=" + document.getElementById(
            'disagree_btn_color').value + "&reject_btn_text=" + document.getElementById('reject_btn_text')
        .value + "&preferences_text_color=" + document
        .getElementById('preferences_text_color').value + "&setting_btn_color=" + document
        .getElementById('setting_btn_color').value + "&setting_btn_text=" + document.getElementById(
            'setting_btn_text').value + "&seers_fonts_fm=" + document.getElementById('seers_fonts_fm').value +
        "&seers_fonts_fs=" + document.getElementById('seers_fonts_fs').value + "&selectedBtn=" + selectedBtnVal + "&seers_bannerposition=" + postionselected;
    httpRequest = new XMLHttpRequest()
    httpRequest.open('POST', ajaxurl)
    httpRequest.setRequestHeader('Content-Type', 'application/x-www-form-urlencoded');
    httpRequest.send(params);
    // beforeSend:
    document.getElementById('loader').style.display = "block";
    document.getElementById('setting_save_new').disabled = true;
    httpRequest.onreadystatechange = function() {
        // Process the server response here.
        if (httpRequest.readyState === XMLHttpRequest.DONE) {
            // complete:
            document.getElementById('loader').style.display = "none";
            document.getElementById('setting_save_new').disabled = false;
            let data = JSON.parse(httpRequest.response)
            if (this.readyState == 4 && httpRequest.status === 200) {
            //document.getElementById('setting_message_success').innerHTML = data.resp_message;
            seersconfirmpopupbodytext.innerText = data.resp_message;
            
            if(data.resp_message.includes("login again")){
                window.location.reload();
            } else {
                seersconfirmpopupbodytext.classList.remove("seers-errorsmsg");
                seersconfirmpopupbodytext.classList.add("seers-successmsg");
                cmpnconfirmmodal.classList.add("seers-cmp-paid-popup-active");
                cmpnconfirmmodal.classList.remove("seers-cmp-paid-popup-no-active");
                cmpnsentmodaloverlay.classList.add("seers-cmp-paid-overlay-active");


                document.getElementById('accept_btn_text').value = data.accept_btn_text;
                document.getElementById('reject_btn_text').value = data.reject_btn_text;
                document.getElementById('setting_btn_text').value = data.setting_btn_text;
                document.getElementById('body_text').innerHTML = data.bodyText;
                document.getElementById('setting_save_new').disabled = false;
            }
                
            
            } else {
                //document.getElementById('setting_message_error').innerHTML = data.resp_message;
                
                seersconfirmpopupbodytext.innerText = data.resp_message;

                seersconfirmpopupbodytext.classList.remove("seers-successmsg");
                seersconfirmpopupbodytext.classList.add("seers-errorsmsg");
                cmpnconfirmmodal.classList.add("seers-cmp-paid-popup-active");
                cmpnconfirmmodal.classList.remove("seers-cmp-paid-popup-no-active");
                cmpnsentmodaloverlay.classList.add("seers-cmp-paid-overlay-active");
            }
        }
    }
});

document.getElementById("setting_save").addEventListener('click', function(e) {
    e.preventDefault();

    var bannerVal = '';
    var show_badge = '';
    if (document.getElementById('banner_check').checked) {
        bannerVal = 'true';
    } else {
        bannerVal = 'false';
    }
    if (document.getElementById('show_badge') && document.getElementById('show_badge').checked) {
        show_badge = 'true';
    } else {
        show_badge = 'false';
    }
    // let selectedBtnVal = document.getElementsByClassName("active");
    let selectedBtnVal = document.getElementsByClassName("seers-select-btn active");
    if (selectedBtnVal.length > 0) {
        selectedBtnVal = selectedBtnVal[0].getAttribute("id");
    } else {
        selectedBtnVal = null
    }
    
    let postionbtngroup = document.querySelectorAll(".btn-group-position button");
        let currentindex = Array.prototype.indexOf.call(postionbtngroup, document.querySelectorAll(".btn-group-position button.active")[0]);
        let modalmiddle = ((document.querySelectorAll(".seers-cms-visual-setting-group-res.display-position")[0].style.display === 'none') ? true : false );
        let postionselected = 'seers-cmp-banner-bar';
        
        // if (modalmiddle) {
        //     postionselected = 'seers-cmp-middle-bar';
        // } else {
            /*if (currentindex === 0) {
                postionselected = 'seers-cmp-top-bar';
            } else if (currentindex === 1) {
                postionselected = 'seers-cmp-banner-bar';
            } else if (currentindex === 2) {
                postionselected = 'seers-cmp-top-left-bar';
            } else if (currentindex === 3) {
                postionselected = 'seers-cmp-top-right-bar';
            } else if (currentindex === 4) {
                postionselected = 'seers-cmp-left-bar';
            } else if (currentindex === 5) {
                postionselected = 'seers-cmp-right-bar';
            }*/
            
            if (currentindex === 0) {
                postionselected = 'seers-cmp-top-bar';
            } else if (currentindex === 1) {
                postionselected = 'seers-cmp-banner-bar';
            } else if (currentindex === 2) {
                postionselected = 'seers-cmp-left-bar';
            } else if (currentindex === 3) {
                postionselected = 'seers-cmp-right-bar';
            } else if (currentindex === 4) {
                postionselected = 'seers-cmp-top-left-bar';
            } else if (currentindex === 5) {
                postionselected = 'seers-cmp-top-right-bar';
            } else if (currentindex === 6) {
                postionselected = 'seers-cmp-top-hanging-bar';
            } else if (currentindex === 7) {
                postionselected = 'seers-cmp-banner-hanging-bar';
            }  else if (currentindex === 8) {
                postionselected = 'seers-cmp-banner-preference-bar';
            } else if (currentindex === 9) {
                postionselected = 'seers-cmp-preference-bottom-hanging-bar';
            } else if (currentindex === 10) {
                postionselected = 'seers-cmp-preference-universal-bar';
            } else if (currentindex === 11) {
                postionselected = 'seers-cmp-middle-bar';
            }
        // }

    var params = "action=cookies_setting&seerscoosettingnonce=<?php echo wp_create_nonce( 'seers-cooksetting-call' );?>&banners=" + bannerVal + "&cookies_expiry=" + document.getElementById(
            'cookies_expiry').value + "&cookies_lang=" + document.getElementById('cookies_lang').value +
        "&show_badge=" + show_badge + "&banner_bg_color=" + document.getElementById('banner_bg_color').value +
        "&body_text_color=" + document.getElementById('body_color').value + "&body_text=" + document.getElementById(
            'body_text').value + "&agree_btn_color=" + document.getElementById('agree_btn_color').value +
        "&agree_text_color=" + document.getElementById('agree_text_color').value + "&accept_btn_text=" +
        document.getElementById('accept_btn_text').value + "&disagree_text_color=" + document.getElementById(
            'disagree_text_color').value + "&disagree_btn_color=" + document.getElementById(
            'disagree_btn_color').value + "&reject_btn_text=" + document.getElementById('reject_btn_text')
        .value + "&preferences_text_color=" + document
        .getElementById('preferences_text_color').value + "&setting_btn_color=" + document
        .getElementById('setting_btn_color').value + "&setting_btn_text=" + document.getElementById(
            'setting_btn_text').value + "&seers_fonts_fm=" + document.getElementById('seers_fonts_fm').value +
        "&seers_fonts_fs=" + document.getElementById('seers_fonts_fs').value + "&selectedBtn=" + selectedBtnVal + "&seers_bannerposition=" + postionselected;
    httpRequest = new XMLHttpRequest()
    httpRequest.open('POST', ajaxurl)
    httpRequest.setRequestHeader('Content-Type', 'application/x-www-form-urlencoded');
    httpRequest.send(params);
    // beforeSend:
    document.getElementById('loader').style.display = "block";
    document.getElementById('setting_save').disabled = true;
    httpRequest.onreadystatechange = function() {
        // Process the server response here.
        if (httpRequest.readyState === XMLHttpRequest.DONE) {
            // complete:
            document.getElementById('loader').style.display = "none";
            document.getElementById('setting_save').disabled = false;
            let data = JSON.parse(httpRequest.response)
            if (this.readyState == 4 && httpRequest.status === 200) {
            //document.getElementById('setting_message_success').innerHTML = data.resp_message;
            seersconfirmpopupbodytext.innerText = data.resp_message;
            
            if(data.resp_message.includes("login again")){
                window.location.reload();
            } else {
                seersconfirmpopupbodytext.classList.remove("seers-errorsmsg");
                seersconfirmpopupbodytext.classList.add("seers-successmsg");
                cmpnconfirmmodal.classList.add("seers-cmp-paid-popup-active");
                cmpnconfirmmodal.classList.remove("seers-cmp-paid-popup-no-active");
                cmpnsentmodaloverlay.classList.add("seers-cmp-paid-overlay-active");


                document.getElementById('accept_btn_text').value = data.accept_btn_text;
                document.getElementById('reject_btn_text').value = data.reject_btn_text;
                document.getElementById('setting_btn_text').value = data.setting_btn_text;
                document.getElementById('body_text').innerHTML = data.bodyText;
                document.getElementById('setting_save').disabled = false;
            }
                
            
            } else {
                //document.getElementById('setting_message_error').innerHTML = data.resp_message;
                
                seersconfirmpopupbodytext.innerText = data.resp_message;

                seersconfirmpopupbodytext.classList.remove("seers-successmsg");
                seersconfirmpopupbodytext.classList.add("seers-errorsmsg");
                cmpnconfirmmodal.classList.add("seers-cmp-paid-popup-active");
                cmpnconfirmmodal.classList.remove("seers-cmp-paid-popup-no-active");
                cmpnsentmodaloverlay.classList.add("seers-cmp-paid-overlay-active");
            }
        }
    }
});

/*** Preference Button actions End ***/
let btnGroup = document.querySelectorAll(".btn-group button")
btnGroupfunc = function() {
    [].map.call(btnGroup, function(elem) {
        elem.classList.remove("active")
    });
    this.classList.add("active");
};
[].map.call(btnGroup, function(elem) {
    elem.addEventListener("click", btnGroupfunc, false);
});

/*** Display Buttons actions ***/
let btnDisGroup = document.querySelectorAll(".btn-group-display button");
let postionbtns = document.querySelectorAll(".btn-group-position button");
postionbtns[0].style.display = 'inline-block';
postionbtns[1].style.display = 'inline-block';
postionbtns[2].style.display = 'none';
postionbtns[3].style.display = 'none';
postionbtns[4].style.display = 'none';
postionbtns[5].style.display = 'none';
postionbtns[6].style.display = 'inline-block';
postionbtns[7].style.display = 'inline-block';
postionbtns[8].style.display = 'inline-block';
postionbtns[9].style.display = 'inline-block';
postionbtns[10].style.display = 'none';
postionbtns[11].style.display = 'none';

let activedisplaybtn=document.querySelector('.seers-select-display-btn.active');
let activeelementclases = activedisplaybtn.classList.value;

/*postionbtns[4].style.display = 'none';
postionbtns[5].style.display = 'none';*/

postionbtns[0].classList.remove("active");
postionbtns[1].classList.remove("active");
postionbtns[2].classList.remove("active");
postionbtns[3].classList.remove("active");

postionbtns[4].classList.remove("active");
postionbtns[5].classList.remove("active");
postionbtns[6].classList.remove("active");
postionbtns[7].classList.remove("active");
postionbtns[8].classList.remove("active");
postionbtns[9].classList.remove("active");
postionbtns[10].classList.remove("active");
postionbtns[11].classList.remove("active");

postionbtns[banneractiveind].classList.add("active");

if (activeelementclases.includes("btn-tooltip")) {
    postionbtns[0].style.display = 'none';
    postionbtns[1].style.display = 'none';
    postionbtns[2].style.display = 'inline-block';
    postionbtns[3].style.display = 'inline-block';
    postionbtns[4].style.display = 'inline-block';
    postionbtns[5].style.display = 'inline-block';
    postionbtns[6].style.display = 'none';
    postionbtns[7].style.display = 'none';
    postionbtns[8].style.display = 'none';
    postionbtns[9].style.display = 'none';
    postionbtns[10].style.display = 'none';
    postionbtns[11].style.display = 'none';
    postionbtns[banneractiveind].classList.remove("active");
    postionbtns[tooltipactiveind].classList.add("active");
    postionbtns[modalactiveind].classList.remove("active");
}else if (activeelementclases.includes("btn-modal")) {
    // document.getElementsByClassName("display-position")[0].style.display = 'none';
        postionbtns[0].style.display = 'none';
        postionbtns[1].style.display = 'none';
        postionbtns[2].style.display = 'none';
        postionbtns[3].style.display = 'none';
        postionbtns[4].style.display = 'none';
        postionbtns[5].style.display = 'none';
        postionbtns[6].style.display = 'none';
        postionbtns[7].style.display = 'none';
        postionbtns[8].style.display = 'none';
        postionbtns[9].style.display = 'none';
        postionbtns[10].style.display = 'inline-block';
        postionbtns[11].style.display = 'inline-block';
    postionbtns[banneractiveind].classList.remove("active");
    postionbtns[tooltipactiveind].classList.remove("active");
    postionbtns[modalactiveind].classList.add("active");
}

btnGroupDisfunc = function() {
    [].map.call(btnDisGroup, function(elem) {
        elem.classList.remove("active")
    });
    this.classList.add("active");
    
    let currentindex = Array.prototype.indexOf.call(btnDisGroup, this);
    
    if (currentindex === 0) {
        document.getElementsByClassName("display-position")[0].style.display = 'flex';
        let postionbtns = document.querySelectorAll(".btn-group-position button");
        postionbtns[0].style.display = 'inline-block';
        postionbtns[1].style.display = 'inline-block';
        postionbtns[2].style.display = 'none';
        postionbtns[3].style.display = 'none';
        postionbtns[4].style.display = 'none';
        postionbtns[5].style.display = 'none';
        postionbtns[6].style.display = 'inline-block';
        postionbtns[7].style.display = 'inline-block';
        postionbtns[8].style.display = 'inline-block';
        postionbtns[9].style.display = 'inline-block';
        postionbtns[10].style.display = 'none';
        postionbtns[11].style.display = 'none';
        
        
        postionbtns[0].classList.remove("active");
        postionbtns[1].classList.remove("active");
        postionbtns[2].classList.remove("active");
        postionbtns[3].classList.remove("active");
        postionbtns[4].classList.remove("active");
        postionbtns[5].classList.remove("active");
        postionbtns[6].classList.remove("active");
        postionbtns[7].classList.remove("active");
        postionbtns[8].classList.remove("active");
        postionbtns[9].classList.remove("active");
        postionbtns[10].classList.remove("active");
        postionbtns[11].classList.remove("active");
        
        postionbtns[banneractiveind].classList.add("active");
        
    } else if (currentindex === 1) {
        document.getElementsByClassName("display-position")[0].style.display = 'flex';
        let postionbtns = document.querySelectorAll(".btn-group-position button");
        postionbtns[0].style.display = 'none';
        postionbtns[1].style.display = 'none';
        postionbtns[2].style.display = 'none';
        postionbtns[3].style.display = 'none';
        postionbtns[4].style.display = 'none';
        postionbtns[5].style.display = 'none';
        postionbtns[6].style.display = 'none';
        postionbtns[7].style.display = 'none';
        postionbtns[8].style.display = 'none';
        postionbtns[9].style.display = 'none';
        postionbtns[10].style.display = 'inline-block';
        postionbtns[11].style.display = 'inline-block';

        postionbtns[0].classList.remove("active");
        postionbtns[1].classList.remove("active");
        postionbtns[2].classList.remove("active");
        postionbtns[3].classList.remove("active");
        postionbtns[4].classList.remove("active");
        postionbtns[5].classList.remove("active");
        postionbtns[6].classList.remove("active");
        postionbtns[7].classList.remove("active");
        postionbtns[8].classList.remove("active");
        postionbtns[9].classList.remove("active");
        postionbtns[10].classList.remove("active");
        postionbtns[11].classList.remove("active");

        postionbtns[modalactiveind].classList.add("active");

    } else if (currentindex === 2) {
        document.getElementsByClassName("display-position")[0].style.display = 'flex';
        let postionbtns = document.querySelectorAll(".btn-group-position button");
        postionbtns[0].style.display = 'none';
        postionbtns[1].style.display = 'none';
        postionbtns[2].style.display = 'inline-block';
        postionbtns[3].style.display = 'inline-block';
        postionbtns[4].style.display = 'inline-block';
        postionbtns[5].style.display = 'inline-block';
        postionbtns[6].style.display = 'none';
        postionbtns[7].style.display = 'none';
        postionbtns[8].style.display = 'none';
        postionbtns[9].style.display = 'none';
        postionbtns[10].style.display = 'none';
        postionbtns[11].style.display = 'none';

        
        
        postionbtns[0].classList.remove("active");
        postionbtns[1].classList.remove("active");
        postionbtns[2].classList.remove("active");
        postionbtns[3].classList.remove("active");
        postionbtns[4].classList.remove("active");
        postionbtns[5].classList.remove("active");
        postionbtns[6].classList.remove("active");
        postionbtns[7].classList.remove("active");
        postionbtns[8].classList.remove("active");
        postionbtns[9].classList.remove("active");
        postionbtns[10].classList.remove("active");
        postionbtns[11].classList.remove("active");
        
        postionbtns[tooltipactiveind].classList.add("active");
    }
    
    //console.log(btnDisGroup);
    //console.log(Array.prototype.indexOf.call(btnDisGroup, this));
};
[].map.call(btnDisGroup, function(elem) {
    elem.addEventListener("click", btnGroupDisfunc, false);
});

/*** Position Button actions End ***/
let btnPosGroup = document.querySelectorAll(".btn-group-position button")
btnPosGroupfunc = function() {
    [].map.call(btnPosGroup, function(elem) {
        elem.classList.remove("active")
    });
    this.classList.add("active");
};
[].map.call(btnPosGroup, function(elem) {
    elem.addEventListener("click", btnPosGroupfunc, false);
});
</script>

<script>
        showPaidpopup = function(ev) {
            ev.preventDefault();
            e = ev || window.event;
            let target = e.target || e.srcElement, text = target.textContent || target.innerText;
            //console.log("Target:" , target);
            //console.log("Target Name:" , target.getAttribute('name'));
            //console.log(target.className);
            gotopriceplan = false;
            seerspopupaccbtn.innerText= "<?php echo __('Account Setup', $this->textdomain);?>";
            
            
            if (target.getAttribute('name') == 'cookies_lang') {
                // now show the language popup
                //seerspopupbodytext.innerText = 'Multilanguage feature is available after account creation';
                seerspopupbodytext.innerText = '<?php echo __('Only the users with a paid account can avail this feature.', $this->textdomain); ?>';
                
                cmpnsentmodal.classList.add("seers-cmp-paid-popup-active");
                cmpnsentmodal.classList.remove("seers-cmp-paid-popup-no-active");
                cmpnsentmodaloverlay.classList.add("seers-cmp-paid-overlay-active");
                
            } else if (target.getAttribute('name') == 'childprivacy' || target.getAttribute('name') == 'googleconsent' || target.getAttribute('name') == 'facebookconsent' || target.getAttribute('name') == 'ownlogo' || target.getAttribute('name') == 'autoblocktracking' || target.getAttribute('name') == 'donottrack' || target.getAttribute('name') == 'iabtcf' || target.getAttribute('name') == 'donotsell' || target.getAttribute('name') == 'globalprivacycontrol' || target.getAttribute('name') == 'trackingmanager' || target.getAttribute('name') == 'cookiepolicy' || target.getAttribute('name') == 'privacypolicy' || target.getAttribute('name') == 'reports' || target.getAttribute('name') == 'recentslogs' || target.getAttribute('name') == 'regulation' || target.getAttribute('name') == 'subdomain' || target.getAttribute('name') == 'recordconsent' || target.getAttribute('name') == 'allowrejectbutton' || target.getAttribute('name') == 'seersbannerlogo' || target.getAttribute('name') == 'seerspoweredby' || target.getAttribute('name') == 'managebadgecustomization' || target.getAttribute('name') == 'languageautoregionaldetection' || target.getAttribute('name') == 'headerpremium' || target.getAttribute('name') == 'dashboardpremium') {
                // now show the language popup
                //seerspopupbodytext.innerText = 'Only premium accounts can use the show badge feature';
                seerspopupbodytext.innerText = '<?php echo __('To unlock these feature click on "Create Premium Account" button.', $this->textdomain); ?>';
                
                cmpnsentmodal.classList.add("seers-cmp-paid-popup-active");
                cmpnsentmodal.classList.remove("seers-cmp-paid-popup-no-active");
                cmpnsentmodaloverlay.classList.add("seers-cmp-paid-overlay-active");
                
                if(curuserplan !== '' && curuserplan !== 'free') {
                    gotopriceplan = true;
                    seerspopupbodytext.innerText = "<?php echo __('You can update this option by Seers\'s Dashboard and only if you have the Pro+ or Ultimate plan.', $this->textdomain); ?>";
                    seerspopupaccbtn.innerText= "<?php echo __('Price Plans', $this->textdomain);?>";
                }
                    
            } else if (typeof target.getAttribute('name') == 'undefined') {
                // now show the language popup
                //seerspopupbodytext.innerText = 'Only premium accounts can use the show badge feature';
                seerspopupbodytext.innerText = '<?php echo __('Only the users with a paid account can avail this feature.', $this->textdomain); ?>';
                
                cmpnsentmodal.classList.add("seers-cmp-paid-popup-active");
                cmpnsentmodal.classList.remove("seers-cmp-paid-popup-no-active");
                cmpnsentmodaloverlay.classList.add("seers-cmp-paid-overlay-active");
            } else if (target.getAttribute('name').indexOf("btn_style") > -1) {
                // now show the language popup
                //seerspopupbodytext.innerText = 'Only premium accounts can select different button styles';
                seerspopupbodytext.innerText = '<?php echo __('Only the users with a paid account can avail this feature.', $this->textdomain); ?>';
                
                cmpnsentmodal.classList.add("seers-cmp-paid-popup-active");
                cmpnsentmodal.classList.remove("seers-cmp-paid-popup-no-active");
                cmpnsentmodaloverlay.classList.add("seers-cmp-paid-overlay-active");
                
            }
            
            
            
        };
        //console.log(seersOpenelements);
        [].map.call(seersOpenelements, function(elem) {
            elem.addEventListener("click", showPaidpopup, false);
        });
        /*seersOpenbtn.onclick = function () {
                cmpnsentmodal.classList.add("seers-cmp-cookie-banner-active");
                cmpnsentmodal.classList.remove("seers-cmp-cookie-banner-no-active");
                cmpnsentmodaloverlay.classList.add("seers-cmp-overlay-active");
            }*/
            // When the user clicks on <span> (x), seers-cmp-default-banner-close the seers-cmp-default-banner
        seersClosespan.onclick = function () {
            cmpnsentmodal.classList.remove("seers-cmp-paid-popup-active");
            cmpnsentmodal.classList.add("seers-cmp-paid-popup-no-active");
            cmpnsentmodaloverlay.classList.remove("seers-cmp-paid-overlay-active");
        }
        seerspopupokbtn.onclick = function () {
            cmpnsentmodal.classList.remove("seers-cmp-paid-popup-active");
            cmpnsentmodal.classList.add("seers-cmp-paid-popup-no-active");
            cmpnsentmodaloverlay.classList.remove("seers-cmp-paid-overlay-active");
        }
        seerspopupaccbtn.onclick = function () {
            cmpnsentmodal.classList.remove("seers-cmp-paid-popup-active");
            cmpnsentmodal.classList.add("seers-cmp-paid-popup-no-active");
            cmpnsentmodaloverlay.classList.remove("seers-cmp-paid-overlay-active");
        
            if(gotopriceplan) {
                gotopriceplan = false;
                window.open("https://seersco.com/price-plan", "_blank");
            } else {

                //make first tab active
                // document.getElementsByName("pct")[2].checked = true;
                document.querySelectorAll('[data-page="Account"]')[0].click();
                document.getElementById('seerscreateaccoun').click();

            }
        }
</script>

<script>
    let tablis = document.querySelectorAll(".tab-ul-sub li");
    let tabscotent = document.querySelectorAll(".seers-tab-countainer > div");
    let pctclicked = document.querySelectorAll('input[name="pct"]');
        
    function openFirstTab () {
        let currenttabid = document.querySelector('input[name="pct"]:checked').id;
        let currenttabind = currenttabid.replace(/\D/g, '');
        if(currenttabind)
            currenttabind = parseInt(currenttabind);
        let arrtabs = [1,3,5];
        

        for (let inl = 0; inl < arrtabs.length; inl++) {

            currenttabind = arrtabs[inl];

            let tabliscur = document.querySelectorAll(".tab" + currenttabind + " div .tab-ul-sub li");
            let tabscotentr = document.querySelectorAll(".tab" + currenttabind + " .seers-tab-countainer > div");

            if (tabscotentr.length > 0)
            {
                if ( currenttabind === 5 ){
                    tabscotentr[1].style = "";
                    tabscotentr[0].style = "display:flex";
                } else {
                    tabscotentr[1].style = "";
                    tabscotentr[0].style = "display:block";
                }
            }
                

            //set first element active
            if (tabliscur.length > 0 && !tabliscur[0].classList.contains('tactive')) {
                tabliscur[1].classList.remove("tactive");
                tabliscur[0].classList.add("tactive");
            }

        }
    }
    
    openFirstTab();
    
    
    
    subTabfunc = function() {
        let currelemind = 0;
        let self = this;
        
        [].map.call(tablis, function(elem, index) {
            document.querySelectorAll(".tab-ul-sub li")[index].classList.remove("tactive");
            tabscotent[index].style = "";
            
            if (typeof self.classList[0] !== 'undefined' && elem.classList.contains(self.classList[0])) {
                currelemind = index;
            }
        });
        
        
        this.classList.add("tactive");
        if (tabscotent.length > 0)
        {
            
            if (tabscotent[currelemind].classList.contains("video-main-hol")) {
                tabscotent[currelemind].style = "display:flex";
            } else {
                tabscotent[currelemind].style = "display:block";
            }
            
        }
        
    };
    [].map.call(tablis, function(elem) {
        elem.addEventListener("click", subTabfunc, false);
    });
    
    [].map.call(pctclicked, function(elem) {
        elem.addEventListener("click", function() {
            openFirstTab();
        }, false);
    });
</script>
<script>
    let alreadyexists_showpopup = "<?php echo ((get_option("SCCBPP_cookie_consent_existing_show_popup") && $showloginpopup === 'no') ? "y" : "n" ); ?>";
    let createaccount_showpopup = "<?php echo ((get_option("SCCBPP_cookie_consent_show_popup") && $showloginpopup === 'no') ? "y" : "n" ); ?>";
    
    seersconfirmpopupbodytext.innerText = "<?php echo ((get_option("SCCBPP_cookie_consent_existing_show_popup")) ?  get_option("SCCBPP_cookie_consent_existing_msg") : get_option("SCCBPP_cookie_consent_msg") ); ?>";
    
    if(alreadyexists_showpopup === "y" || createaccount_showpopup === "y" ) {
        document.getElementsByName("pct")[2].checked = true;
        
        let msgclassadd = '';
        let msgclassremove = '';
        let createdmsgtype = "<?php echo get_option("SCCBPP_cookie_consent_msgtype");?>";
        let existingmsgtype = "<?php echo get_option("SCCBPP_cookie_consent_existing_msgtype");?>";
        
        if (alreadyexists_showpopup === "y") {
            msgclassadd = ((existingmsgtype === 'success') ? "seers-successmsg" : "seers-errorsmsg" );
            msgclassremove = ((existingmsgtype === 'success') ? "seers-errorsmsg" : "seers-successmsg" );
        } else if (createaccount_showpopup === "y"){
            msgclassadd = ((createdmsgtype === 'success') ? "seers-successmsg" : "seers-errorsmsg" );
            msgclassremove = ((createdmsgtype === 'success') ? "seers-errorsmsg" : "seers-successmsg" );
        } 
        
        seersconfirmpopupbodytext.classList.remove(msgclassremove);
        seersconfirmpopupbodytext.classList.add(msgclassadd);
        cmpnconfirmmodal.classList.add("seers-cmp-paid-popup-active");
        cmpnconfirmmodal.classList.remove("seers-cmp-paid-popup-no-active");
        cmpnsentmodaloverlay.classList.add("seers-cmp-paid-overlay-active");
        
        let ulelem = document.getElementsByClassName("tab3")[1].getElementsByClassName("tab-ul-sub");
        let sulis = ulelem[0].getElementsByTagName("li");

        
        if(alreadyexists_showpopup === "y") {
            sulis[0].classList.remove("tactive");
            sulis[1].classList.add("tactive");
            
            sulis[1].click();
        } else if(createaccount_showpopup === "y") {
            sulis[1].classList.remove("tactive");
            sulis[0].classList.add("tactive");
            
            sulis[0].click();
        }
    }
                
    
</script>
<script>
    document.addEventListener("DOMContentLoaded", function() {
    var seerspopupconfirmloginbtn = document.getElementById("seers-cms-confirm-popup-btnlogin");
    
    seerspopupconfirmloginbtn.onclick = function () {
        // console.log("hello");
        let email = document.getElementById("email").value;
        let password = document.getElementById("password").value;
        let errormsgs = "";
        let wrongpassword = "<?php echo __('Please enter valid Password.', $this->textdomain);?>";
        
        document.getElementById('loginloader').style.display = "block";
        
        if (!email || email.length <= 0) {
            
            if (!errormsgs) {
                errormsgs = "<ul>";
            }
            
            errormsgs += "<li>";
            errormsgs += "<?php echo __('Email is required.', $this->textdomain); ?>";
            errormsgs += "</li>";
        } else if (! /^[a-zA-Z0-9.!#$%&'*+/=?^_`{|}~-]+@[a-zA-Z0-9-]+(?:\.[a-zA-Z0-9-]+)*$/.test(email)) {
            if (!errormsgs) {
                errormsgs = "<ul>";
            }
            
            errormsgs += "<li>";
            errormsgs += "<?php echo __('Please enter a valid email address.', $this->textdomain); ?>";
            errormsgs += "</li>";
        }
        
        if (!password || password.length <= 0) {
            
            if (!errormsgs) {
                errormsgs = "<ul>";
            }
            
            errormsgs += "<li>";
            errormsgs += "<?php echo __('Password is required.', $this->textdomain); ?>";
            errormsgs += "</li>";
        }
        
        
        let errorelem = document.getElementsByClassName("errorsmsgs")[0];
        if (errormsgs) {
            errormsgs += "</ul>";
            errorelem.innerHTML = errormsgs;
            document.getElementById('loginloader').style.display = "none";
        } else {
            errorelem.innerHTML = "";
            
            var params = "action=login_api&seersloginonce=<?php echo wp_create_nonce( 'seers-login-call' );?>&email=" + encodeURIComponent(email) + "&password=" + password;
            
            httpRequest = new XMLHttpRequest()
            httpRequest.open('POST', ajaxurl)
            httpRequest.setRequestHeader('Content-Type', 'application/x-www-form-urlencoded');
            httpRequest.send(params);

            
            httpRequest.onreadystatechange = function() {
                // Process the server response here.
                if (httpRequest.readyState === XMLHttpRequest.DONE) {
                    let resdata = JSON.parse(httpRequest.response);
                    if (httpRequest.status === 200) {
                        /*document.getElementById('policy_message_success').innerHTML = httpRequest
                            .responseText;*/

                        document.getElementById('loginloader').style.display = "none";
                        
                        if (typeof resdata.message !== "undefined" && resdata.message.includes("Ask for password")) {
                            errorelem.innerHTML = "<ul><li>" + wrongpassword + "</li></ul>";
                        } else if (typeof resdata.message !== "undefined" && resdata.message.includes("email must be a valid")) {
                            errorelem.innerHTML = "<ul><li>" + resdata.message + "</li></ul>";
                        } else {
                            let curtag = document.querySelector("[name='pct']:checked").id;
                            let arrnooftag = curtag.match(/\d+/);
                            let nooftag = -1;
                            
                            if (arrnooftag.length > 0) {
                                nooftag = arrnooftag[0];
                            }
                            
                            
                            if (nooftag === 1 || nooftag === "1") {
                                cmpnloginmodal.classList.remove("seers-cmp-paid-popup-active");
                                cmpnloginmodal.classList.add("seers-cmp-paid-popup-no-active");
                                cmpnsentmodaloverlay.classList.remove("seers-cmp-paid-overlay-active");
                                
                                document.getElementById("banner_setting").submit();
                            } else if (nooftag === 2 || nooftag === "2") {
                                cmpnloginmodal.classList.remove("seers-cmp-paid-popup-active");
                                cmpnloginmodal.classList.add("seers-cmp-paid-popup-no-active");
                                cmpnsentmodaloverlay.classList.remove("seers-cmp-paid-overlay-active");
                                
                                document.getElementById("cookie_policy").submit();
                            } else if (nooftag === 3 || nooftag === "3") {
                                let currentform = document.getElementsByClassName(document.querySelector("[name='pct']:checked").id)[1].getElementsByClassName("tab-ul-sub")[0].querySelectorAll("li.tactive")[0].classList[0];

                                if (currentform === "alreadyesiting") {

                                    document.getElementById("SCCBPP_save_cookieid").click();

                                } else if (currentform === "createaccount") {

                                    document.getElementById("wp_plugin").submit();

                                }
                                
                                cmpnloginmodal.classList.remove("seers-cmp-paid-popup-active");
                                cmpnloginmodal.classList.add("seers-cmp-paid-popup-no-active");
                                cmpnsentmodaloverlay.classList.remove("seers-cmp-paid-overlay-active");
                            }
                            
                            
                        }
                        
                        

                    } else {
                        /*document.getElementById('policy_message_error').innerHTML = httpRequest
                            .responseText;*/

                        sssdocument.getElementById('loginloader').style.display = "none";

                        errorelem.innerHTML = "<ul><li>" + resdata.message + "</li></ul>";
                    }
                }
            }
            
        }
        
        //ajax call and nonce will be wp_create_nonce( 'seers-login-call' )
    };
});

</script>
<script>
    
    if(showloginpopup === "yes" ) {
        
        document.getElementById('loginloader').style.display = "none";
        
        
        cmpnloginmodal.classList.add("seers-cmp-paid-popup-active");
        cmpnloginmodal.classList.remove("seers-cmp-paid-popup-no-active");
        cmpnsentmodaloverlay.classList.add("seers-cmp-paid-overlay-active");
        
        let ulelem = document.getElementsByClassName("tab3")[1].getElementsByClassName("tab-ul-sub");
        let sulis = ulelem[0].getElementsByTagName("li");
        
        if(showthetab === "already_existing") {
            document.getElementsByName("pct")[2].checked = true;
            sulis[0].classList.remove("tactive");
            sulis[1].classList.add("tactive");
            sulis[1].click();
        } else if(showthetab === "create_account") {
            document.getElementsByName("pct")[2].checked = true;
            sulis[1].classList.remove("tactive");
            sulis[0].classList.add("tactive");
            sulis[0].click();
            document.getElementById("seers_term_condition").checked = true;
            document.getElementById("seers_term_condition_url").checked = true;
        }
    } else {
        let ulelem = document.getElementsByClassName("tab3")[1].getElementsByClassName("tab-ul-sub");
        let sulis = ulelem[0].getElementsByTagName("li");
        
        if(showthetab === "already_existing" && alreadyexists_showpopup === 'n') {
            document.getElementsByName("pct")[2].checked = true;
            sulis[0].classList.remove("tactive");
            sulis[1].classList.add("tactive");
            sulis[1].click();
        } else if(showthetab === "create_account" && createaccount_showpopup === 'n') {
            document.getElementsByName("pct")[2].checked = true;
            sulis[1].classList.remove("tactive");
            sulis[0].classList.add("tactive");
            sulis[0].click();
        }
    } 
    
    seerspopupconfirmloginbtn.onclick = function () {
        // now login ther user with provided credentails first verify the givent email and password they must not empty and validated.
        // console.log("hello");
        let email = document.getElementById("email").value;
        let password = document.getElementById("password").value;
        let errormsgs = "";
        let wrongpassword = "<?php echo __('Please enter valid Password.', $this->textdomain);?>";
        
        document.getElementById('loginloader').style.display = "block";
        
        if (!email || email.length <= 0) {
            
            if (!errormsgs) {
                errormsgs = "<ul>";
            }
            
            errormsgs += "<li>";
            errormsgs += "<?php echo __('Email is required.', $this->textdomain); ?>";
            errormsgs += "</li>";
        } else if (! /^[a-zA-Z0-9.!#$%&'*+/=?^_`{|}~-]+@[a-zA-Z0-9-]+(?:\.[a-zA-Z0-9-]+)*$/.test(email)) {
            if (!errormsgs) {
                errormsgs = "<ul>";
            }
            
            errormsgs += "<li>";
            errormsgs += "<?php echo __('Please enter a valid email address.', $this->textdomain); ?>";
            errormsgs += "</li>";
        }
        
        if (!password || password.length <= 0) {
            
            if (!errormsgs) {
                errormsgs = "<ul>";
            }
            
            errormsgs += "<li>";
            errormsgs += "<?php echo __('Password is required.', $this->textdomain); ?>";
            errormsgs += "</li>";
        }
        
        
        let errorelem = document.getElementsByClassName("errorsmsgs")[0];
        if (errormsgs) {
            errormsgs += "</ul>";
            errorelem.innerHTML = errormsgs;
            document.getElementById('loginloader').style.display = "none";
        } else {
            errorelem.innerHTML = "";
            
            var params = "action=login_api&seersloginonce=<?php echo wp_create_nonce( 'seers-login-call' );?>&email=" + encodeURIComponent(email) + "&password=" + password;
            
            httpRequest = new XMLHttpRequest()
            httpRequest.open('POST', ajaxurl)
            httpRequest.setRequestHeader('Content-Type', 'application/x-www-form-urlencoded');
            httpRequest.send(params);

            
            httpRequest.onreadystatechange = function() {
                // Process the server response here.
                if (httpRequest.readyState === XMLHttpRequest.DONE) {
                    let resdata = JSON.parse(httpRequest.response);
                    if (httpRequest.status === 200) {
                        /*document.getElementById('policy_message_success').innerHTML = httpRequest
                            .responseText;*/

                        document.getElementById('loginloader').style.display = "none";
                        
                        if (typeof resdata.message !== "undefined" && resdata.message.includes("Ask for password")) {
                            errorelem.innerHTML = "<ul><li>" + wrongpassword + "</li></ul>";
                        } else if (typeof resdata.message !== "undefined" && resdata.message.includes("email must be a valid")) {
                            errorelem.innerHTML = "<ul><li>" + resdata.message + "</li></ul>";
                        } else {
                            let curtag = document.querySelector("[name='pct']:checked").id;
                            let arrnooftag = curtag.match(/\d+/);
                            let nooftag = -1;
                            
                            if (arrnooftag.length > 0) {
                                nooftag = arrnooftag[0];
                            }
                            
                            
                            if (nooftag === 1 || nooftag === "1") {
                                cmpnloginmodal.classList.remove("seers-cmp-paid-popup-active");
                                cmpnloginmodal.classList.add("seers-cmp-paid-popup-no-active");
                                cmpnsentmodaloverlay.classList.remove("seers-cmp-paid-overlay-active");
                                
                                document.getElementById("banner_setting").submit();
                            } else if (nooftag === 2 || nooftag === "2") {
                                cmpnloginmodal.classList.remove("seers-cmp-paid-popup-active");
                                cmpnloginmodal.classList.add("seers-cmp-paid-popup-no-active");
                                cmpnsentmodaloverlay.classList.remove("seers-cmp-paid-overlay-active");
                                
                                document.getElementById("cookie_policy").submit();
                            } else if (nooftag === 3 || nooftag === "3") {
                                let currentform = document.getElementsByClassName(document.querySelector("[name='pct']:checked").id)[1].getElementsByClassName("tab-ul-sub")[0].querySelectorAll("li.tactive")[0].classList[0];

                                if (currentform === "alreadyesiting") {

                                    document.getElementById("SCCBPP_save_cookieid").click();

                                } else if (currentform === "createaccount") {

                                    document.getElementById("wp_plugin").submit();

                                }
                                
                                cmpnloginmodal.classList.remove("seers-cmp-paid-popup-active");
                                cmpnloginmodal.classList.add("seers-cmp-paid-popup-no-active");
                                cmpnsentmodaloverlay.classList.remove("seers-cmp-paid-overlay-active");
                            }
                            
                            
                        }
                        
                        

                    } else {
                        /*document.getElementById('policy_message_error').innerHTML = httpRequest
                            .responseText;*/

                        sssdocument.getElementById('loginloader').style.display = "none";

                        errorelem.innerHTML = "<ul><li>" + resdata.message + "</li></ul>";
                    }
                }
            }
            
        }
        
        //ajax call and nonce will be wp_create_nonce( 'seers-login-call' )
    }
                
    
</script>

<script>
    
    if(popupforbanner === "popupconsent" ) {
        
        
        cmpnbannersettingmodal.classList.add("seers-cmp-paid-popup-active");
        cmpnbannersettingmodal.classList.remove("seers-cmp-paid-popup-no-active");
        cmpnsentmodaloverlay.classList.add("seers-cmp-paid-overlay-active");
    }
    
    let banneroptions = '';
    
    seerspopupbannerkeepwpbtn.onclick = function () {
        banneroptions = 'keepwp';
        
        cmpnbannersettingmodal.classList.remove("seers-cmp-paid-popup-active");
        cmpnbannersettingmodal.classList.add("seers-cmp-paid-popup-no-active");
        cmpnsentmodaloverlay.classList.remove("seers-cmp-paid-overlay-active");
        
        var bannerVal = '';
        var show_badge = '';
        if (document.getElementById('banner_check').checked) {
            bannerVal = 'true';
        } else {
            bannerVal = 'false';
        }
        if (document.getElementById('show_badge') && document.getElementById('show_badge').checked) {
            show_badge = 'true';
        } else {
            show_badge = 'false';
        }
        //let selectedBtnVal = document.getElementsByClassName("active");
        let selectedBtnVal = document.getElementsByClassName("seers-select-btn active");
        if (selectedBtnVal.length > 0) {
            selectedBtnVal = selectedBtnVal[0].getAttribute("id");
        } else {
            selectedBtnVal = null
        }
        
        let postionbtngroup = document.querySelectorAll(".btn-group-position button");
        let currentindex = Array.prototype.indexOf.call(postionbtngroup, document.querySelectorAll(".btn-group-position button.active")[0]);
        let modalmiddle = ((document.querySelectorAll(".seers-cms-visual-setting-group-res.display-position")[0].style.display === 'none') ? true : false );
        let postionselected = 'seers-cmp-banner-bar';
        
        if (modalmiddle) {
            postionselected = 'seers-cmp-middle-bar';
        } else {
            if (currentindex === 0) {
                postionselected = 'seers-cmp-top-bar';
            } else if (currentindex === 1) {
                postionselected = 'seers-cmp-banner-bar';
            } else if (currentindex === 2) {
                postionselected = 'seers-cmp-left-bar';
            } else if (currentindex === 3) {
                postionselected = 'seers-cmp-right-bar';
            } else if (currentindex === 4) {
                postionselected = 'seers-cmp-top-left-bar';
            } else if (currentindex === 5) {
                postionselected = 'seers-cmp-top-right-bar';
            } else if (currentindex === 6) {
                postionselected = 'seers-cmp-top-hanging-bar';
            } else if (currentindex === 7) {
                postionselected = 'seers-cmp-banner-hanging-bar';
            }  else if (currentindex === 8) {
                postionselected = 'seers-cmp-banner-preference-bar';
            } else if (currentindex === 9) {
                postionselected = 'seers-cmp-preference-bottom-hanging-bar';
            } else if (currentindex === 10) {
                postionselected = 'seers-cmp-preference-universal-bar';
            }
            
            /*if (currentindex === 0) {
                postionselected = 'seers-cmp-top-bar';
            } else if (currentindex === 1) {
                postionselected = 'seers-cmp-banner-bar';
            } else if (currentindex === 2) {
                postionselected = 'seers-cmp-top-left-bar';
            } else if (currentindex === 3) {
                postionselected = 'seers-cmp-top-right-bar';
            } else if (currentindex === 4) {
                postionselected = 'seers-cmp-left-bar';
            } else if (currentindex === 5) {
                postionselected = 'seers-cmp-right-bar';
            }*/
        }

        var params = "action=cookies_setting&seerscoosettingnonce=<?php echo wp_create_nonce( 'seers-cooksetting-call' );?>&banners=" + bannerVal + "&cookies_expiry=" + document.getElementById(
                'cookies_expiry').value + "&cookies_lang=" + document.getElementById('cookies_lang').value +
            "&show_badge=" + show_badge + "&banner_bg_color=" + document.getElementById('banner_bg_color').value +
            "&body_text_color=" + document.getElementById('body_color').value + "&body_text=" + document.getElementById(
                'body_text').value + "&agree_btn_color=" + document.getElementById('agree_btn_color').value +
            "&agree_text_color=" + document.getElementById('agree_text_color').value + "&accept_btn_text=" +
            document.getElementById('accept_btn_text').value + "&disagree_text_color=" + document.getElementById(
                'disagree_text_color').value + "&disagree_btn_color=" + document.getElementById(
                'disagree_btn_color').value + "&reject_btn_text=" + document.getElementById('reject_btn_text')
            .value + "&preferences_text_color=" + document
            .getElementById('preferences_text_color').value + "&setting_btn_color=" + document
            .getElementById('setting_btn_color').value + "&setting_btn_text=" + document.getElementById(
                'setting_btn_text').value + "&seers_fonts_fm=" + document.getElementById('seers_fonts_fm').value +
            "&seers_fonts_fs=" + document.getElementById('seers_fonts_fs').value + "&selectedBtn=" + selectedBtnVal + "&keepbansetting=" + banneroptions + "&seers_bannerposition=" + postionselected;
        httpRequest = new XMLHttpRequest()
        httpRequest.open('POST', ajaxurl)
        httpRequest.setRequestHeader('Content-Type', 'application/x-www-form-urlencoded');
        httpRequest.send(params);
        // beforeSend:
        document.getElementById('loader').style.display = "block";
        document.getElementById('setting_save').disabled = true;
        httpRequest.onreadystatechange = function() {
            // Process the server response here.
            if (httpRequest.readyState === XMLHttpRequest.DONE) {
                // complete:
                document.getElementById('loader').style.display = "none";
                document.getElementById('setting_save').disabled = false;
                let data = JSON.parse(httpRequest.response)
                if (this.readyState == 4 && httpRequest.status === 200) {
                //document.getElementById('setting_message_success').innerHTML = data.resp_message;
                seersconfirmpopupbodytext.innerText = data.resp_message;

                if(data.resp_message.includes("login again")){
                    window.location.reload();
                } else {
                    seersconfirmpopupbodytext.classList.remove("seers-errorsmsg");
                    seersconfirmpopupbodytext.classList.add("seers-successmsg");
                    cmpnconfirmmodal.classList.add("seers-cmp-paid-popup-active");
                    cmpnconfirmmodal.classList.remove("seers-cmp-paid-popup-no-active");
                    cmpnsentmodaloverlay.classList.add("seers-cmp-paid-overlay-active");


                    document.getElementById('accept_btn_text').value = data.accept_btn_text;
                    document.getElementById('reject_btn_text').value = data.reject_btn_text;
                    document.getElementById('setting_btn_text').value = data.setting_btn_text;
                    document.getElementById('body_text').innerHTML = data.bodyText;
                    document.getElementById('setting_save').disabled = false;
                }


                } else {
                    //document.getElementById('setting_message_error').innerHTML = data.resp_message;

                    seersconfirmpopupbodytext.innerText = data.resp_message;

                    seersconfirmpopupbodytext.classList.remove("seers-successmsg");
                    seersconfirmpopupbodytext.classList.add("seers-errorsmsg");
                    cmpnconfirmmodal.classList.add("seers-cmp-paid-popup-active");
                    cmpnconfirmmodal.classList.remove("seers-cmp-paid-popup-no-active");
                    cmpnsentmodaloverlay.classList.add("seers-cmp-paid-overlay-active");
                }
            }
        }
    }
    
    seerspopupbannerkeepseersbtn.onclick = function () {
        banneroptions = 'keepseers';
        
        cmpnbannersettingmodal.classList.remove("seers-cmp-paid-popup-active");
        cmpnbannersettingmodal.classList.add("seers-cmp-paid-popup-no-active");
        cmpnsentmodaloverlay.classList.remove("seers-cmp-paid-overlay-active");
        
        var bannerVal = '';
        var show_badge = '';
        if (document.getElementById('banner_check').checked) {
            bannerVal = 'true';
        } else {
            bannerVal = 'false';
        }
        if (document.getElementById('show_badge') && document.getElementById('show_badge').checked) {
            show_badge = 'true';
        } else {
            show_badge = 'false';
        }
        //let selectedBtnVal = document.getElementsByClassName("active");
        let selectedBtnVal = document.getElementsByClassName("seers-select-btn active");
        if (selectedBtnVal.length > 0) {
            selectedBtnVal = selectedBtnVal[0].getAttribute("id");
        } else {
            selectedBtnVal = null
        }
        
        let postionbtngroup = document.querySelectorAll(".btn-group-position button");
        let currentindex = Array.prototype.indexOf.call(postionbtngroup, document.querySelectorAll(".btn-group-position button.active")[0]);
        let modalmiddle = ((document.querySelectorAll(".seers-cms-visual-setting-group-res.display-position")[0].style.display === 'none') ? true : false );
        let postionselected = 'seers-cmp-banner-bar';
        
        if (modalmiddle) {
            postionselected = 'seers-cmp-middle-bar';
        } else {
            if (currentindex === 0) {
                postionselected = 'seers-cmp-top-bar';
            } else if (currentindex === 1) {
                postionselected = 'seers-cmp-banner-bar';
            } else if (currentindex === 2) {
                postionselected = 'seers-cmp-left-bar';
            } else if (currentindex === 3) {
                postionselected = 'seers-cmp-right-bar';
            } else if (currentindex === 4) {
                postionselected = 'seers-cmp-top-left-bar';
            } else if (currentindex === 5) {
                postionselected = 'seers-cmp-top-right-bar';
            } else if (currentindex === 6) {
                postionselected = 'seers-cmp-top-hanging-bar';
            } else if (currentindex === 7) {
                postionselected = 'seers-cmp-banner-hanging-bar';
            }  else if (currentindex === 8) {
                postionselected = 'seers-cmp-banner-preference-bar';
            } else if (currentindex === 9) {
                postionselected = 'seers-cmp-preference-bottom-hanging-bar';
            } else if (currentindex === 10) {
                postionselected = 'seers-cmp-preference-universal-bar';
            }
            
            /*if (currentindex === 0) {
                postionselected = 'seers-cmp-top-bar';
            } else if (currentindex === 1) {
                postionselected = 'seers-cmp-banner-bar';
            } else if (currentindex === 2) {
                postionselected = 'seers-cmp-top-left-bar';
            } else if (currentindex === 3) {
                postionselected = 'seers-cmp-top-right-bar';
            } else if (currentindex === 4) {
                postionselected = 'seers-cmp-left-bar';
            } else if (currentindex === 5) {
                postionselected = 'seers-cmp-right-bar';
            }*/
        }

        var params = "action=cookies_setting&seerscoosettingnonce=<?php echo wp_create_nonce( 'seers-cooksetting-call' );?>&banners=" + bannerVal + "&cookies_expiry=" + document.getElementById(
                'cookies_expiry').value + "&cookies_lang=" + document.getElementById('cookies_lang').value +
            "&show_badge=" + show_badge + "&banner_bg_color=" + document.getElementById('banner_bg_color').value +
            "&body_text_color=" + document.getElementById('body_color').value + "&body_text=" + document.getElementById(
                'body_text').value + "&agree_btn_color=" + document.getElementById('agree_btn_color').value +
            "&agree_text_color=" + document.getElementById('agree_text_color').value + "&accept_btn_text=" +
            document.getElementById('accept_btn_text').value + "&disagree_text_color=" + document.getElementById(
                'disagree_text_color').value + "&disagree_btn_color=" + document.getElementById(
                'disagree_btn_color').value + "&reject_btn_text=" + document.getElementById('reject_btn_text')
            .value + "&preferences_text_color=" + document
            .getElementById('preferences_text_color').value + "&setting_btn_color=" + document
            .getElementById('setting_btn_color').value + "&setting_btn_text=" + document.getElementById(
                'setting_btn_text').value + "&seers_fonts_fm=" + document.getElementById('seers_fonts_fm').value +
            "&seers_fonts_fs=" + document.getElementById('seers_fonts_fs').value + "&selectedBtn=" + selectedBtnVal + "&keepbansetting=" + banneroptions + "&seers_bannerposition=" + postionselected;
        httpRequest = new XMLHttpRequest()
        httpRequest.open('POST', ajaxurl)
        httpRequest.setRequestHeader('Content-Type', 'application/x-www-form-urlencoded');
        httpRequest.send(params);
        // beforeSend:
        document.getElementById('loader').style.display = "block";
        document.getElementById('setting_save').disabled = true;
        httpRequest.onreadystatechange = function() {
            // Process the server response here.
            if (httpRequest.readyState === XMLHttpRequest.DONE) {
                // complete:
                document.getElementById('loader').style.display = "none";
                document.getElementById('setting_save').disabled = false;
                let data = JSON.parse(httpRequest.response)
                if (this.readyState == 4 && httpRequest.status === 200) {
                //document.getElementById('setting_message_success').innerHTML = data.resp_message;
                seersconfirmpopupbodytext.innerText = data.resp_message;

                if(data.resp_message.includes("login again")){
                    window.location.reload();
                } else {
                    seersconfirmpopupbodytext.classList.remove("seers-errorsmsg");
                    seersconfirmpopupbodytext.classList.add("seers-successmsg");
                    cmpnconfirmmodal.classList.add("seers-cmp-paid-popup-active");
                    cmpnconfirmmodal.classList.remove("seers-cmp-paid-popup-no-active");
                    cmpnsentmodaloverlay.classList.add("seers-cmp-paid-overlay-active");


                    document.getElementById('accept_btn_text').value = data.accept_btn_text;
                    document.getElementById('reject_btn_text').value = data.reject_btn_text;
                    document.getElementById('setting_btn_text').value = data.setting_btn_text;
                    document.getElementById('body_text').innerHTML = data.bodyText;
                    document.getElementById('setting_save').disabled = false;
                }


                } else {
                    //document.getElementById('setting_message_error').innerHTML = data.resp_message;

                    seersconfirmpopupbodytext.innerText = data.resp_message;

                    seersconfirmpopupbodytext.classList.remove("seers-successmsg");
                    seersconfirmpopupbodytext.classList.add("seers-errorsmsg");
                    cmpnconfirmmodal.classList.add("seers-cmp-paid-popup-active");
                    cmpnconfirmmodal.classList.remove("seers-cmp-paid-popup-no-active");
                    cmpnsentmodaloverlay.classList.add("seers-cmp-paid-overlay-active");
                }
            }
        }
    }
                
    
</script>
<?php 
if (get_option("SCCBPP_cookie_consent_existing_show_popup")) {
    update_option("SCCBPP_cookie_consent_existing_show_popup", false);
    update_option("SCCBPP_cookie_consent_existing_msg", "");
}
    
if (get_option("SCCBPP_cookie_consent_show_popup")) {
    update_option("SCCBPP_cookie_consent_show_popup", false);
    update_option("SCCBPP_cookie_consent_msg", "");
}
 
?>
<?php
if (isset($_POST['SCCBPP_cookieid'])) {
    $doupdatesettings = 0;
    if (!isset($_POST['SCCBPP_update_setting']) || !wp_verify_nonce(sanitize_text_field($_POST['SCCBPP_update_setting']), 'SCCBPP-cookie-consent')) {
        echo 'Sorry, your nonce did not verify.';
        return;
    }
    
    if (isset($_POST['SCCBPP_cookie_consent_email'])) {
        $cookieEmail = sanitize_text_field($_POST['SCCBPP_cookie_consent_email']);
        update_option('SCCBPP_cookie_consent_email', $cookieEmail);
        ++$doupdatesettings;
    }
    if (isset($_POST['SCCBPP_cookie_consent_url'])) {
        $cookieurl = sanitize_text_field($_POST['SCCBPP_cookie_consent_url']);
        update_option('SCCBPP_cookie_consent_url', $cookieurl);
        $doupdatesettings++;
    }
    
    return;
}