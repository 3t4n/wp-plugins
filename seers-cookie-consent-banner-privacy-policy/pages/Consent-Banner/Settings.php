<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="<?php echo plugin_dir_url(__FILE__) . 'Settings.css'; ?>">
    <title>Settings</title>
</head>
<body>
    <div class="seers-cms-appearance-settings-container">
        <div class="seers-cms-appearance-settings-card">
            <div class="seers-cms-appearance-settings-menu">
            <div class="seers-cms-appearance-settings-setting">
                <label for="child-privacy"><?php echo __('Cookie Banner ', $this->textdomain);?><span class="seers-cms-appearance-settings-show-hide"><?php echo __('(Show/Hide)', $this->textdomain);?></span> <span class="tooltiphtml" style="font-size:20px;">
                        <span><img class="seers-cms-frameworks-info-icon" src="<?php echo plugin_dir_url(__FILE__) . '../../images/info icon.png'; ?>" alt="info-icon"></span>
                        <span class="tooltiptext">
                            <?php echo __('Allow Cookie Banner to be displayed on your website', $this->textdomain); ?> 
                        </span>
                    </span></label>
                <div class="seers-cms-appearance-settings-input-field">
                    <label class="seers-cms-settings-toggle" style="width: 0;">
                    <?php if(get_option('SCCBPP_cookie_consent_is_active') == true || get_option('SCCBPP_cookie_consent_is_active') == ''){?>
                        <input class="seers-cms-settings-toggle-checkbox" type="checkbox" name="banner_check"
                        id="banner_check" checked>
                        <?php }else{ ?>
                        <input class="seers-cms-settings-toggle-checkbox" type="checkbox" name="banner_check"
                        id="banner_check">
                    <?php } ?>
                    </label>
            </div>
            </div>
            <div class="seers-cms-appearance-settings-setting">
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
                <label for="global-privacy-control"><?php echo __('Show Badge ', $this->textdomain);?><span class="tooltiphtml" style="font-size:20px;">
                        <span><img class="seers-cms-frameworks-info-icon" src="<?php echo plugin_dir_url(__FILE__) . '../../images/info icon.png'; ?>" alt="info-icon"></span>
                        <span class="tooltiptext">
                            <?php echo __('Show a badge to enable cookie banner appear post consent', $this->textdomain); ?> 
                        </span>
                    </span>
                <?php if ( $userplan && !empty($userplanname) && !$enablebade ) {
                                                    echo '<span class="dashicons dashicons-lock"></span>';
                                                }?>
                </label>
                <div class="seers-cms-appearance-settings-input-field">
                <label class="seers-cms-settings-toggle" style="width: 0;">
                                                <?php if ( (get_option('SCCBPP_cookie_consent_id') !== false || get_option('SCCBPP_cookie_consent_id') !== 'false' || get_option('SCCBPP_cookie_consent_id') != '') && 
                                                        ($userplan && !empty($userplanname) && $enablebade ) ) { ?>
                                                <?php if(get_option('SCCBPP_cookie_consent_show_badge') === 'true' || get_option('SCCBPP_cookie_consent_show_badge') === true || get_option('SCCBPP_cookie_consent_show_badge') === 1){?>
                                                <input class="seers-cms-settings-toggle-checkbox" type="checkbox" name="show_badge" id="show_badge"
                                                        checked>
                                                <?php } else { ?>
                                                <input class="seers-cms-settings-toggle-checkbox" type="checkbox" name="show_badge"
                                                       id="show_badge">
                                                <?php } ?>
                                                <?php } else if ( (get_option('SCCBPP_cookie_consent_id') === false || get_option('SCCBPP_cookie_consent_id') === 'false' || get_option('SCCBPP_cookie_consent_id') == '') ) {?>
                                                    <?php if(get_option('SCCBPP_cookie_consent_show_badge') === 'true' || get_option('SCCBPP_cookie_consent_show_badge') === true || get_option('SCCBPP_cookie_consent_show_badge') === 1){?>
                                                    <input class="seers-cms-settings-toggle-checkbox" type="checkbox" name="show_badge" id="show_badge"
                                                            checked>
                                                    <?php } else { ?>
                                                    <input class="seers-cms-settings-toggle-checkbox" type="checkbox" name="show_badge"
                                                           id="show_badge">
                                                    <?php } ?>
                                                <?php } ?>
                                            </label>
            </div>
        </div>
            <!-- <div class="seers-cms-appearance-settings-setting">
                <label for="facebook-consent"><span class="seers-cms-appearance-settings-premium">PREMIUM</span></label>
                <input type="checkbox" id="facebook-consent">
            </div> -->
            
            <div class="seers-cms-appearance-settings-setting">
                <label for="manage-badge-customization"><?php echo __('Manage Badge Customization ', $this->textdomain);?><span class="tooltiphtml" style="font-size:20px;">
                        <span><img class="seers-cms-frameworks-info-icon" src="<?php echo plugin_dir_url(__FILE__) . '../../images/info icon.png'; ?>" alt="info-icon"></span>
                        <span class="tooltiptext">
                            <?php echo __('Manage Badge Customization', $this->textdomain); ?> 
                        </span>
                    </span><span class="seers-cms-appearance-settings-premium"><?php echo __('PREMIUM', $this->textdomain);?></span></label>
                <div class="seers-cms-appearance-settings-input-field">
                <input type="checkbox" id="manage-badge-customization" class="seers-paid-feature-opener" name="managebadgecustomization">
            </div>
            </div>
            <div class="seers-cms-appearance-settings-setting">
                <label for="record-consent"><?php echo __('Record Consent ', $this->textdomain);?><span class="tooltiphtml" style="font-size:20px;">
                        <span><img class="seers-cms-frameworks-info-icon" src="<?php echo plugin_dir_url(__FILE__) . '../../images/info icon.png'; ?>" alt="info-icon"></span>
                        <span class="tooltiptext">
                            <?php echo __('Turn on to record the consent of users', $this->textdomain); ?> 
                        </span>
                    </span><span class="seers-cms-appearance-settings-premium"><?php echo __('PREMIUM', $this->textdomain);?></span></label>
                <div class="seers-cms-appearance-settings-input-field">
                <input type="checkbox" id="record-consent" class="seers-paid-feature-opener" name="recordconsent">
            </div>
            </div>
            <div class="seers-cms-appearance-settings-setting">
                <label for="sub-domain-setting"><?php echo __('Sub-Domains Setting ', $this->textdomain);?><span class="tooltiphtml" style="font-size:20px;">
                        <span><img class="seers-cms-frameworks-info-icon" src="<?php echo plugin_dir_url(__FILE__) . '../../images/info icon.png'; ?>" alt="info-icon"></span>
                        <span class="tooltiptext">
                            <?php echo __('Covers all subdomain under the selected domain', $this->textdomain); ?> 
                        </span>
                    </span><span class="seers-cms-appearance-settings-premium"><?php echo __('PREMIUM', $this->textdomain);?></span></label>
                <div class="seers-cms-appearance-settings-input-field ">
                <input type="checkbox" id="sub-domain-setting" class="seers-paid-feature-opener" name="subdomain">
            </div>
            </div>
            <div class="seers-cms-appearance-settings-setting">
                <label for="google-additional-consent"><?php echo __('Consent Frequency ', $this->textdomain);?><span class="tooltiphtml" style="font-size:20px;">
                        <span><img class="seers-cms-frameworks-info-icon" src="<?php echo plugin_dir_url(__FILE__) . '../../images/info icon.png'; ?>" alt="info-icon"></span>
                        <span class="tooltiptext">
                            <?php echo __('Choose how many time you want consent from user', $this->textdomain); ?> 
                        </span>
                    </span></label>
                <!-- <input type="checkbox" id="google-additional-consent"> -->
                <div class="seers-cms-appearance-settings-input-field">
                <div class="seers-cms-appearance-settings-dropdown">
                <div class="seers-pr">
                                            <select class="seers-cms-settings-cosent-frequency seers-cms-input fm" id="cookies_expiry" name="cookies_expiry">
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
            </div>
            </div>
            
        </div>
            <hr class="seers-cms-appearance-settings-hr">
            <button class="seers-cms-appearance-settings-save-btn"  id="setting_save"><?php echo __('Save Changes', $this->textdomain);?></button>
        </div>
    </div>
</body>
</html>
