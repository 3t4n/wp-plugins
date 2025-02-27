<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="<?php echo plugin_dir_url(__FILE__) . 'Frameworks.css'; ?>">
    <title>Framework Settings</title>
</head>
<body>
    <div class="seers-cms-frameworks-container">
        <div class="seers-cms-frameworks-card">
            <h2 class="seers-cms-frameworks-heading"><?php echo __('Framework', $this->textdomain);?></h2>
            <hr>
            <div class="seers-cms-frameworks-menu">
            <div class="seers-cms-frameworks-setting">
                <label for="Child-privacy">
                    <?php echo __('Child Privacy', $this->textdomain); ?>  
                    
                    <span class="tooltiphtml" style="font-size:20px;">
                        <span><img class="seers-cms-frameworks-info-icon" src="<?php echo plugin_dir_url(__FILE__) . '../../images/info icon.png'; ?>" alt="info-icon"></span>
                        <span class="tooltiptext">
                            <?php echo __('The Child Privacy mode will show layers of banners for age-appropriate child consent.', $this->textdomain); ?> 
                            <!-- <a href="https://support.seersco.com/en/child-privacy" target="_blank">
                                <?php echo __('Learn more...', $this->textdomain);?>
                            </a> -->
                        </span>
                    </span>
                    <span class="seers-cms-frameworks-premium"><?php echo __('PREMIUM', $this->textdomain);?></span>
                </label>
                
                <div class="toggle-frameworks">
                    <div class="toggle-frameworks-switch seers-paid-feature-opener <?php echo ((get_option('SCCBPP_cookie_consent_child_privacy') === true || get_option('SCCBPP_cookie_consent_child_privacy') === 'true') ? "opton" : "" );?>" name="childprivacy"></div>
                </div>
            </div>

            <div class="seers-cms-frameworks-setting">
                <label for="Do-Not-Track">
                    <?php echo __('Do Not Track', $this->textdomain); ?>  
                    <span class="tooltiphtml" style="font-size:20px;">
                        <span><img class="seers-cms-frameworks-info-icon" src="<?php echo plugin_dir_url(__FILE__) . '../../images/info icon.png'; ?>" alt="info-icon"></span>
                        <span class="tooltiptext">
                            <?php echo __('When enabled, visitors who are using a browser that sends a Do Not Track signal will have their signal automatically applied to their consent settings.', $this->textdomain); ?> 
                        </span>
                    </span>
                    <span class="seers-cms-frameworks-premium"><?php echo __('PREMIUM', $this->textdomain);?></span>
                </label>
                <div class="toggle-frameworks">
                    <div class="toggle-frameworks-switch seers-paid-feature-opener <?php echo ((get_option('SCCBPP_do_not_track') === true || get_option('SCCBPP_do_not_track') === 'true') ? 'opton' : ''); ?>" name="donottrack"></div>
                </div>
            </div>
            <div class="seers-cms-frameworks-setting">
                <label for="iab-tcf-v2">
                    <?php echo __('IAB TCF V2', $this->textdomain); ?>  
                    <span class="tooltiphtml" style="font-size:20px;">
                        <span><img class="seers-cms-frameworks-info-icon" src="<?php echo plugin_dir_url(__FILE__) . '../../images/info icon.png'; ?>" alt="info-icon"></span>
                        <span class="tooltiptext">
                            <?php echo __('When enabled, Seers CMP will implement the IAB Global Privacy Platform and IAB EU TCF 2.x Frameworks along with their respective APIs.', $this->textdomain); ?>  
                        </span>
                    </span>
                    <span class="seers-cms-frameworks-premium"><?php echo __('PREMIUM', $this->textdomain);?></span>
                </label>
                <div class="toggle-frameworks">
                    <div class="toggle-frameworks-switch seers-paid-feature-opener <?php echo ((get_option('SCCBPP_cookie_consent_iab_tcf') === true || get_option('SCCBPP_cookie_consent_iab_tcf') === 'true') ? 'opton' : ''); ?>" name="iabtcf"></div>
                </div>
            </div>
            <div class="seers-cms-frameworks-setting">
                <label for="do-not-sell">
                    <?php echo __('Do Not Sell (CPRA)', $this->textdomain); ?>  
                    <span class="tooltiphtml" style="font-size:20px;">
                        <span><img class="seers-cms-frameworks-info-icon" src="<?php echo plugin_dir_url(__FILE__) . '../../images/info icon.png'; ?>" alt="info-icon"></span>
                        <span class="tooltiptext">
                            <?php echo __('When enabled, visitors who are using a browser that sends a Do Not Sell Signal will have their signal automatically applied to their consent settings', $this->textdomain); ?> 
                        </span>
                    </span>
                    <span class="seers-cms-frameworks-premium"><?php echo __('PREMIUM', $this->textdomain);?></span>
                </label>
                <div class="toggle-frameworks">
                    <div class="toggle-frameworks-switch seers-paid-feature-opener <?php echo ((get_option('SCCBPP_cookie_consent_do_not_sell') === true || get_option('SCCBPP_cookie_consent_do_not_sell') === 'true') ? 'opton' : ''); ?>" name="donotsell"></div>
                </div>
            </div>
            <div class="seers-cms-frameworks-setting">
                <label for="google-consent-mode">
                    <?php echo __('Google consent mode V2', $this->textdomain); ?>  
                    <span class="tooltiphtml" style="font-size:20px;">
                        <span><img class="seers-cms-frameworks-info-icon" src="<?php echo plugin_dir_url(__FILE__) . '../../images/info icon.png'; ?>" alt="info-icon"></span>
                        <span class="tooltiptext">
                            <?php echo __('When enabled, Google Consent Mode V2 for Google Analytics is supported. GCM must be implemented via your Google configuration for this option to function.', $this->textdomain); ?> 
                        </span>
                    </span>
                    <span class="seers-cms-frameworks-premium"><?php echo __('PREMIUM', $this->textdomain);?></span>
                </label>
                <div class="toggle-frameworks">
                    <div class="toggle-frameworks-switch seers-paid-feature-opener <?php echo ((get_option('SCCBPP_cookie_consent_google_consent') === true || get_option('SCCBPP_cookie_consent_google_consent') === 'true') ? 'opton' : ''); ?>" name="googleconsent"></div>
                </div>
            </div>
            <div class="seers-cms-frameworks-setting">
                <label for="facebook-consent-mode">
                    <?php echo __('Facebook Consent Mode', $this->textdomain); ?>  
                    <span class="tooltiphtml" style="font-size:20px;">
                        <span><img class="seers-cms-frameworks-info-icon" src="<?php echo plugin_dir_url(__FILE__) . '../../images/info icon.png'; ?>" alt="info-icon"></span>
                        <span class="tooltiptext">
                            <?php echo __('Activate FCM API to pause sending pixel signals to Facebook.', $this->textdomain); ?> 
                        </span>
                    </span>
                    <span class="seers-cms-frameworks-premium"><?php echo __('PREMIUM', $this->textdomain);?></span>
                </label>
                <div class="toggle-frameworks">
                    <div class="toggle-frameworks-switch seers-paid-feature-opener <?php echo ((get_option('SCCBPP_cookie_consent_facebook_consent') === true || get_option('SCCBPP_cookie_consent_facebook_consent') === 'true') ? 'opton' : ''); ?>" name="facebookconsent"></div>
                </div>
            </div>
            <div class="seers-cms-frameworks-setting">
                <label for="global-privacy-control">
                    <?php echo __('Global Privacy Control (GPC)', $this->textdomain); ?>  
                    <span class="tooltiphtml" style="font-size:20px;">
                        <span><img class="seers-cms-frameworks-info-icon" src="<?php echo plugin_dir_url(__FILE__) . '../../images/info icon.png'; ?>" alt="info-icon"></span>
                        <span class="tooltiptext">
                            <?php echo __('When enabled, visitors who are using a browser or extension that is GPC compliant will have their signal automatically applied to their consent settings.', $this->textdomain); ?> 
                        </span>
                    </span>
                    <span class="seers-cms-frameworks-premium"><?php echo __('PREMIUM', $this->textdomain);?></span>
                </label>
                <div class="toggle-frameworks">
                    <div class="toggle-frameworks-switch seers-paid-feature-opener <?php echo ((get_option('SCCBPP_cookie_consent_global_privacy_control') === true || get_option('SCCBPP_cookie_consent_global_privacy_control') === 'true') ? 'opton' : ''); ?>" name="globalprivacycontrol"></div>
                </div>
            </div>
            </div>
            <hr>
            <!-- <button class="seers-cms-frameworks-save-btn"><?php echo __('Save Changes', $this->textdomain);?></button> -->
        </div>
    </div>
</body>
</html>
