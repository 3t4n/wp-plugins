<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Consent Banner Settings</title>
    <link rel="stylesheet" href="<?php echo plugin_dir_url(__FILE__) . 'Visuals.css'; ?>">
</head>
<body>
    <div class="seers-cms-visual-container">
        <div class="seers-cms-visual-settings">
            <p class="seers-cms-visual-font-setting seers-cms-visual-heading"><?php esc_html_e('Accept Button &nbsp; ', $this->textdomain);?><span class="tooltip" data-title="<?php echo __('This text will appear on the button that the user can click to “accept” the storage of their terminal equipment.', $this->textdomain); ?>" style="font-size:20px;"><img class="seers-cms-visuals-info-icon" src="<?php echo plugin_dir_url(__FILE__) . '../../images/info icon.png'; ?>" alt="info-icon"></span></p>
            <div class="seers-cms-visual-setting-group">
                <label class="seers-cms-visual-font-setting"><?php esc_html_e('Text & Colour&nbsp; ', $this->textdomain);?><span class="tooltip" data-title="<?php echo __('Edit the text & its colour of “Accept” button', $this->textdomain); ?>" style="font-size:20px;"><img class="seers-cms-visuals-info-icon" src="<?php echo plugin_dir_url(__FILE__) . '../../images/info icon.png'; ?>" alt="info-icon"></span></label>
                <div class="seers-cms-visual-options">
                <input class="seers-cms-visual-btn seers-cms-visual-disable seers-cms-visual-white-color" 
                    type="text" 
                    name="accept_btn_text"
                    id="accept_btn_text" 
                    placeholder="<?php echo __('Allow All', $this->textdomain); ?>"
                    value="<?php if(get_option('SCCBPP_cookie_consent_accept_btn_text') && get_option('SCCBPP_cookie_consent_accept_btn_text')!=''){ esc_html_e(get_option('SCCBPP_cookie_consent_accept_btn_text')); }else{  echo __('Allow All', $this->textdomain); }?>" 
                    onchange="setColorDummyButton(this, 'value', 'accept_all')"
                    style="text-align: center;">
                    
                    <div style="position: relative; display: inline-block;">
                    <input type="color" name="agree_text_color" id="agree_text_color"
                    value="<?php if(get_option('SCCBPP_cookie_consent_agree_text_color') && get_option('SCCBPP_cookie_consent_agree_text_color')!=''){ esc_html_e(trim(get_option('SCCBPP_cookie_consent_agree_text_color'))); }else{ echo "#FFFFFF"; }?>"
                    class="seers-banner-custom-color" onchange="setColorDummyButton(this, 'text', 'accept_all')"
                        style="margin: 0px; width: 70px; height: 35px;">
                    <img class="seers-cms-visual-img-edit" 
                        src="<?php echo plugin_dir_url(__FILE__) . '../../images/edit-grey.png'; ?>" 
                        alt="edit"
                        style="position: absolute; right: 26px; top: 45%; transform: translateY(-50%); pointer-events: none;">
                </div>
                </div>
            </div>
            <div class="seers-cms-visual-setting-group">
                <label class="seers-cms-visual-font-setting"><?php esc_html_e('Button Colour&nbsp; ', $this->textdomain);?><span class="tooltip" data-title="<?php echo __('Change the “Accept” button colour', $this->textdomain); ?>" style="font-size:20px;"><img class="seers-cms-visuals-info-icon" src="<?php echo plugin_dir_url(__FILE__) . '../../images/info icon.png'; ?>" alt="info-icon"></span></label>
                <div class="seers-cms-visual-options">
                <?php 
                    $agree_text_color = get_option('SCCBPP_cookie_consent_agree_text_color') ?: "#fff";
                    $agree_button_color = get_option('SCCBPP_cookie_consent_agree_btn_color') ?: "#3b6ef8";
                    $agree_button_text = get_option('SCCBPP_cookie_consent_accept_btn_text') ?: __('Allow All', $this->textdomain); 
                ?>

                <button class="seers-cms-visual-btn seers-cms-visual-color seers-cms-visual-blue-color" 
                        style="background-color: <?php echo esc_html(trim($agree_button_color)); ?> !important; color: <?php echo esc_html(trim($agree_text_color)); ?> !important;">
                    <?php 
                        esc_html_e($agree_button_text); 
                    ?>
                </button>



                    <div style="position: relative; display: inline-block;">
                    <input type="color" name="agree_btn_color" id="agree_btn_color"
                        value="<?php if(get_option('SCCBPP_cookie_consent_agree_btn_color') && get_option('SCCBPP_cookie_consent_agree_btn_color')!=''){ esc_html_e(trim(get_option('SCCBPP_cookie_consent_agree_btn_color'))); }else{ echo "#3B6EF8"; }?>"
                        class="seers-banner-custom-color" onchange="setColorDummyButton(this, 'background', 'accept_all')"
                        style="margin: 0px; width: 70px; height: 35px;">
                    <img class="seers-cms-visual-img-edit" 
                        src="<?php echo plugin_dir_url(__FILE__) . '../../images/edit-grey.png'; ?>" 
                        alt="edit"
                        style="position: absolute; right: 26px; top: 45%; transform: translateY(-50%); pointer-events: none;">
                </div>
                </div>
            </div>
            
            
            <div class="seers-cms-visuals-settings-setting">
                <p class="seers-cms-visual-font-setting seers-cms-visual-heading"><?php esc_html_e('Reject Button&nbsp; ', $this->textdomain);?><span class="tooltip" data-title="<?php echo __('This text will appear on the button that the user can click to “decline” the storage of cookies on their terminal equipment.', $this->textdomain); ?>" style="font-size:20px;"><img class="seers-cms-visuals-info-icon" src="<?php echo plugin_dir_url(__FILE__) . '../../images/info icon.png'; ?>" alt="info-icon"></span></p>
                <div class="seers-cms-visual-options seers-cms-visuals-settings-input-field">
                <input type="checkbox" class="seers-paid-feature-opener" id="child-privacy" name="allowrejectbutton" checked>
            </div>
            </div>
            <div class="seers-cms-visual-setting-group">
                <label class="seers-cms-visual-font-setting"><?php esc_html_e('Text & Colour&nbsp; ', $this->textdomain);?><span class="tooltip" data-title="<?php echo __('Edit the text & its colour of “Reject” button', $this->textdomain); ?>" style="font-size:20px;"><img class="seers-cms-visuals-info-icon" src="<?php echo plugin_dir_url(__FILE__) . '../../images/info icon.png'; ?>" alt="info-icon"></span></label>
                <div class="seers-cms-visual-options">
                    <!-- <button class="seers-cms-visual-btn seers-cms-visual-disable seers-cms-visual-white-color">Disable All</button> -->
                    <input class="seers-cms-visual-btn seers-cms-visual-disable seers-cms-visual-white-color" 
                    type="text" 
                    name="reject_btn_text"
                    id="reject_btn_text" 
                    placeholder="<?php echo __('Disable All', $this->textdomain); ?>"
                    value="<?php if(get_option('SCCBPP_cookie_consent_reject_btn_text') && get_option('SCCBPP_cookie_consent_reject_btn_text')!=''){ esc_html_e(get_option('SCCBPP_cookie_consent_reject_btn_text')); }else{  echo __('Disable All', $this->textdomain); }?>" 
                    onchange="setColorDummyButton(this, 'value', 'reject_all')"
                    style="text-align: center;">
                    <div style="position: relative; display: inline-block;">
                    <input type="color" name="disagree_text_color" id="disagree_text_color"
                        value="<?php if(get_option('SCCBPP_cookie_consent_disagree_text_color') && get_option('SCCBPP_cookie_consent_disagree_text_color')!=''){ esc_html_e(trim(get_option('SCCBPP_cookie_consent_disagree_text_color'))); }else{ echo "#FFFFFF"; }?>"
                        class="seers-banner-custom-color" onchange="setColorDummyButton(this, 'text', 'reject_all')"
                        style="margin: 0px; width: 70px; height: 35px;">
                    <img class="seers-cms-visual-img-edit" 
                        src="<?php echo plugin_dir_url(__FILE__) . '../../images/edit-grey.png'; ?>" 
                        alt="edit"
                        style="position: absolute; right: 26px; top: 45%; transform: translateY(-50%); pointer-events: none;">
                </div>
                </div>
                
            </div>
            <div class="seers-cms-visual-setting-group">
                <label class="seers-cms-visual-font-setting"><?php esc_html_e('Button Colour&nbsp; ', $this->textdomain);?><span class="tooltip" data-title="<?php echo __('Change the “Reject” button colour', $this->textdomain); ?>" style="font-size:20px;"><img class="seers-cms-visuals-info-icon" src="<?php echo plugin_dir_url(__FILE__) . '../../images/info icon.png'; ?>" alt="info-icon"></span></label>
                <div class="seers-cms-visual-options">
                    <!-- <button class="seers-cms-visual-btn seers-cms-visual-color seers-cms-visual-blue-color">Disable All</button> -->
                    <?php 
                    $disagree_text_color = get_option('SCCBPP_cookie_consent_disagree_text_color') ?: "#fff";
                    $disagree_button_color = get_option('SCCBPP_cookie_consent_disagree_btn_color') ?: "#3b6ef8";
                    $disagree_button_text = get_option('SCCBPP_cookie_consent_reject_btn_text') ?: __('Disable All', $this->textdomain); 
                ?>

                <button class="seers-cms-visual-btn seers-cms-visual-color seers-cms-visual-blue-color" 
                        style="background-color: <?php echo esc_html(trim($disagree_button_color)); ?> !important; color: <?php echo esc_html(trim($disagree_text_color)); ?> !important;">
                    <?php 
                        esc_html_e($disagree_button_text); 
                    ?>
                </button>
                    <div style="position: relative; display: inline-block;">
                    <input type="color" name="disagree_btn_color" id="disagree_btn_color"
                        value="<?php if(get_option('SCCBPP_cookie_consent_disagree_btn_color') && get_option('SCCBPP_cookie_consent_disagree_btn_color')!=''){ esc_html_e(trim(get_option('SCCBPP_cookie_consent_disagree_btn_color'))); }else{ echo "#3B6EF8"; }?>"
                        class="seers-banner-custom-color" onchange="setColorDummyButton(this, 'background', 'reject_all')"
                        style="margin: 0px; width: 70px; height: 35px;">
                    <img class="seers-cms-visual-img-edit" 
                        src="<?php echo plugin_dir_url(__FILE__) . '../../images/edit-grey.png'; ?>" 
                        alt="edit"
                        style="position: absolute; right: 26px; top: 45%; transform: translateY(-50%); pointer-events: none;">
                </div>
                </div>
            </div>

            <p class="seers-cms-visual-heading seers-cms-visual-font-setting"><?php esc_html_e('Cookie Settings Button&nbsp; ', $this->textdomain);?><span class="tooltip" data-title="<?php echo __('This text will expand the cookie banner downward, showing the categories of cookies and details of each cookie within the respective category.', $this->textdomain); ?>" style="font-size:20px;"><img class="seers-cms-visuals-info-icon" src="<?php echo plugin_dir_url(__FILE__) . '../../images/info icon.png'; ?>" alt="info-icon"></span></p>
            <div class="seers-cms-visual-setting-group">
                <label class="seers-cms-visual-font-setting"><?php esc_html_e('Text & Colour&nbsp; ', $this->textdomain);?><span class="tooltip" data-title="<?php echo __('Edit the text & its colour of “Cookie Setting”', $this->textdomain); ?>" style="font-size:20px;"><img class="seers-cms-visuals-info-icon" src="<?php echo plugin_dir_url(__FILE__) . '../../images/info icon.png'; ?>" alt="info-icon"></span></label>
                <div class="seers-cms-visual-options">
                    <!-- <button class="seers-cms-visual-btn seers-cms-visual-color seers-cms-visual-white-color">Preference</button> -->
                    <input class="seers-cms-visual-btn seers-cms-visual-disable seers-cms-visual-white-color" 
                    type="text" 
                    name="setting_btn_text"
                    id="setting_btn_text" 
                    placeholder="<?php echo __('Preference', $this->textdomain); ?>"
                    value="<?php if(get_option('SCCBPP_cookie_consent_setting_btn_text') && get_option('SCCBPP_cookie_consent_setting_btn_text')!=''){ esc_html_e(get_option('SCCBPP_cookie_consent_setting_btn_text')); }else{  echo __('Preference', $this->textdomain); }?>" 
                    onchange="setColorDummyButton(this, 'value', 'setting_pref')"
                    style="text-align: center;">
                    <div style="position: relative; display: inline-block;">
                    <input type="color" name="preferences_text_color" id="preferences_text_color"
                        value="<?php if(get_option('SCCBPP_cookie_consent_preferences_text_color') && get_option('SCCBPP_cookie_consent_preferences_text_color')!=''){ esc_html_e(trim(get_option('SCCBPP_cookie_consent_preferences_text_color'))); }else{ echo "#000000"; }?>"
                        class="seers-banner-custom-color" onchange="setColorDummyButton(this, 'text', 'setting_pref')"
                        style="margin: 0px; width: 70px; height: 35px;">
                    <img class="seers-cms-visual-img-edit" 
                        src="<?php echo plugin_dir_url(__FILE__) . '../../images/edit-grey.png'; ?>" 
                        alt="edit"
                        style="position: absolute; right: 26px; top: 45%; transform: translateY(-50%); pointer-events: none;">
                </div>
                </div>
            </div>
            <div class="seers-cms-visual-setting-group">
                <label class="seers-cms-visual-font-setting"><?php esc_html_e('Button Colour&nbsp; ', $this->textdomain);?><span class="tooltip" data-title="<?php echo __('Change the “Cookie Setting” button colour', $this->textdomain); ?>" style="font-size:20px;"><img class="seers-cms-visuals-info-icon" src="<?php echo plugin_dir_url(__FILE__) . '../../images/info icon.png'; ?>" alt="info-icon"></span></label>
                <div class="seers-cms-visual-options">
                    <!-- <button class="seers-cms-visual-btn seers-cms-visual-color seers-cms-visual-blue-color">Preference</button> -->
                    <?php 
                    $setting_text_color = get_option('SCCBPP_cookie_consent_preferences_text_color') ?: "#3b6ef8";
                    $setting_button_color = get_option('SCCBPP_cookie_consent_preferences_btn_color') ?: "#fff";
                    $setting_button_text = get_option('SCCBPP_cookie_consent_setting_btn_text') ?: __('Preference', $this->textdomain); 
                ?>

                <button class="seers-cms-visual-btn seers-cms-visual-color seers-cms-visual-blue-color" 
                        style="background-color: <?php echo esc_html(trim($setting_button_color)); ?> !important; color: <?php echo esc_html(trim($setting_text_color)); ?> !important;">
                    <?php 
                        esc_html_e($setting_button_text); 
                    ?>
                </button>
                    <div style="position: relative; display: inline-block;">
                    <input type="color" name="setting_btn_color" id="setting_btn_color"
                        value="<?php if(get_option('SCCBPP_cookie_consent_preferences_btn_color') && get_option('SCCBPP_cookie_consent_preferences_btn_color')!=''){ esc_html_e(trim(get_option('SCCBPP_cookie_consent_preferences_btn_color'))); }else{ echo "#FFFFFF"; }?>"
                        class="seers-banner-custom-color" onchange="setColorDummyButton(this, 'background', 'setting_pref')"
                        style="margin: 0px; width: 70px; height: 35px;">
                    <img class="seers-cms-visual-img-edit" 
                        src="<?php echo plugin_dir_url(__FILE__) . '../../images/edit-grey.png'; ?>" 
                        alt="edit"
                        style="position: absolute; right: 26px; top: 45%; transform: translateY(-50%); pointer-events: none;">
                </div>
                </div>
            </div>
            
            
            <div class="seers-cms-visual-setting-group-res">
                <p class="seers-cms-visual-heading seers-cms-visual-font-setting"><?php esc_html_e('Banner Text&nbsp; ', $this->textdomain);?><span class="tooltip" data-title="<?php echo __('This text will appear on the banner', $this->textdomain); ?>" style="font-size:20px;"><img class="seers-cms-visuals-info-icon" src="<?php echo plugin_dir_url(__FILE__) . '../../images/info icon.png'; ?>" alt="info-icon"></span></p>
                <div class="seers-cms-visual-options-res">
                    <textarea class=" seers-cms-visual-banner-text"><?php if(get_option('SCCBPP_cookie_consent_body_text') && get_option('SCCBPP_cookie_consent_body_text')!=''){ esc_html_e(get_option('SCCBPP_cookie_consent_body_text')); }else{ esc_html_e( "We use cookies to ensure you get the best experience", $this->textdomain);} ?></textarea>
                </div>
            </div>
            <div class="seers-cms-visual-setting-group">
                <label class="seers-cms-visual-heading seers-cms-visual-font-setting"><?php esc_html_e('Banner Text Colour &nbsp; ', $this->textdomain);?><span class="tooltip" data-title="<?php echo __('Change the banner text colour', $this->textdomain); ?>" style="font-size:20px;"><img class="seers-cms-visuals-info-icon" src="<?php echo plugin_dir_url(__FILE__) . '../../images/info icon.png'; ?>" alt="info-icon"></span></label>
                <div class="seers-cms-visual-options">
                <div style="position: relative; display: inline-block;">
                    <input type="color" name="body_color" id="body_color"
                        value="<?php if(get_option('SCCBPP_cookie_consent_body_text_color') && get_option('SCCBPP_cookie_consent_body_text_color')!=''){ esc_html_e(trim(get_option('SCCBPP_cookie_consent_body_text_color'))); }else{ echo "#000000"; }?>"
                        class="seers-banner-custom-color"
                        style="margin: 0px; width: 70px; height: 35px;">
                    <img class="seers-cms-visual-img-edit" 
                        src="<?php echo plugin_dir_url(__FILE__) . '../../images/edit-grey.png'; ?>" 
                        alt="edit"
                        style="position: absolute; right: 26px; top: 45%; transform: translateY(-50%); pointer-events: none;">
                </div>
            </div>
            </div>
            <div class="seers-cms-visual-setting-group">
                <label class="seers-cms-visual-heading seers-cms-visual-font-setting"><?php esc_html_e('Banner Background Colour&nbsp; ', $this->textdomain);?><span class="tooltip" data-title="<?php echo __('Change the banner background colour', $this->textdomain); ?>" style="font-size:20px;"><img class="seers-cms-visuals-info-icon" src="<?php echo plugin_dir_url(__FILE__) . '../../images/info icon.png'; ?>" alt="info-icon"></span></label>
                <div class="seers-cms-visual-options">
                <div style="position: relative; display: inline-block;">
                <input type="color" name="banner_bg_color" id="banner_bg_color"
                    value="<?php if(get_option('SCCBPP_cookie_consent_banner_bg_color') && get_option('SCCBPP_cookie_consent_banner_bg_color')!=''){ esc_html_e(trim(get_option('SCCBPP_cookie_consent_banner_bg_color'))); }else{ echo "#FFFFFF"; }?>"
                        class="seers-banner-custom-color"
                        style="margin: 0px; width: 70px; height: 35px;">
                    <img class="seers-cms-visual-img-edit" 
                        src="<?php echo plugin_dir_url(__FILE__) . '../../images/edit-grey.png'; ?>" 
                        alt="edit"
                        style="position: absolute; right: 26px; top: 45%; transform: translateY(-50%); pointer-events: none;">
                </div>
                    
                </div>
            </div>
            <div class="seers-cms-visual-setting-group-res">
            <p class="seers-cms-visual-font-setting">Button Style&nbsp; <span class="tooltip" data-title="<?php echo __('Select the shape of the buttons that appear on banner', $this->textdomain); ?>" style="font-size:20px;"><img class="seers-cms-visuals-info-icon" src="<?php echo plugin_dir_url(__FILE__) . '../../images/info icon.png'; ?>" alt="info-icon"></span></p>
            <div class="seers-cms-visual-options-res seers-cms-visual-button-style">
                <!-- <button class="seers-cms-visual-btn seers-cms-visual-style seers-cms-visual-default">Default</button>
                <button class="seers-cms-visual-btn seers-cms-visual-style seers-cms-visual-flat">Flat</button>
                <button class="seers-cms-visual-btn seers-cms-visual-style seers-cms-visual-rounded">Rounded</button>
                <button class="seers-cms-visual-btn seers-cms-visual-style seers-cms-visual-stroke">Stroke</button> -->
                <div class="seers-pr btn-group" style="flex-basis: 100%;" role="group">
                    <button
                        class="seers-select-btn btn-default <?php if(!get_option('SCCBPP_cookie_consent_button_type') || get_option('SCCBPP_cookie_consent_button_type') == '' || get_option('SCCBPP_cookie_consent_button_type')=='cbtn_default'){ echo "active"; }?><?php //echo (( get_option('SCCBPP_cookie_consent_id') === false || get_option('SCCBPP_cookie_consent_id') == '') ? ' seers-paid-feature-opener' : ""); ?>"
                        style="width:100px !important;" type="button" id="cbtn_default" name="btn_style_default"><?php echo __('Default', $this->textdomain); ?></button>
                    <button
                        class="seers-select-btn btn-flat <?php if(get_option('SCCBPP_cookie_consent_button_type')=='cbtn_flat'){ echo "active"; }?>"
                        style="width:100px !important;" type="button" id="cbtn_flat"><?php echo __('Flat', $this->textdomain); ?></button>
                    <button
                        class="seers-select-btn btn-round <?php if(get_option('SCCBPP_cookie_consent_button_type')=='cbtn_rounded'){ echo "active"; }?>"
                        style="width:100px !important;" type="button" id="cbtn_rounded"><?php echo __('Rounded', $this->textdomain); ?></button>
                    <button
                        class="seers-select-btn btn-stroke <?php if(get_option('SCCBPP_cookie_consent_button_type')=='cbtn_stroke'){ echo "active"; }?>"
                        style="width:100px !important;" type="button" id="cbtn_stroke"><?php echo __('Stroke', $this->textdomain); ?></button>
                        <?php ?>
                </div>
            </div>
        </div>
        <div class="seers-cms-visual-setting-group-res">
            <p class=" seers-cms-visual-font-setting">Display Style&nbsp; <span class="tooltip" data-title="<?php echo __('Choose the display style of your banner', $this->textdomain); ?>" style="font-size:20px;"><img class="seers-cms-visuals-info-icon" src="<?php echo plugin_dir_url(__FILE__) . '../../images/info icon.png'; ?>" alt="info-icon"></span></p>
            <div class="seers-cms-visual-options-res seers-cms-visual-button-style">
                <!-- <button class="seers-cms-visual-btn seers-cms-visual-style seers-cms-visual-banner"><img class="seers-cms-visuals-banner-position-im" src="<?php echo plugin_dir_url(__FILE__) . '../../images/BannerActive.svg'; ?>">Banner</button>
                <button class="seers-cms-visual-btn seers-cms-visual-style seers-cms-visual-modal"><img class="seers-cms-visuals-banner-position-im" src="<?php echo plugin_dir_url(__FILE__) . '../../images/ModalNotActive.svg'; ?>">Modal</button>
                <button class="seers-cms-visual-btn seers-cms-visual-style seers-cms-visual-tooltip"><img class="seers-cms-visuals-banner-position-im" src="<?php echo plugin_dir_url(__FILE__) . '../../images/tooltipNotActive.svg'; ?>">Tooltip</button> -->
                <div class="seers-pr btn-group-display" style="flex-basis: 100%;" role="group">
                                            <button
                                                class="seers-select-display-btn btn-banner <?php if(!get_option('SCCBPP_cookie_consent_banner_position') || get_option('SCCBPP_cookie_consent_banner_position') == '' || get_option('SCCBPP_cookie_consent_banner_position') == 'seers-cmp-banner-bar' || get_option('SCCBPP_cookie_consent_banner_position') == 'seers-cmp-top-bar' || get_option('SCCBPP_cookie_consent_banner_position') == 'seers-cmp-top-hanging-bar' || get_option('SCCBPP_cookie_consent_banner_position') == 'seers-cmp-banner-hanging-bar' || get_option('SCCBPP_cookie_consent_banner_position') == 'seers-cmp-banner-preference-bar' || get_option('SCCBPP_cookie_consent_banner_position') == 'seers-cmp-preference-bottom-hanging-bar'){ echo "active"; }?>"
                                                style="width:136px !important;" type="button" id="cbtn_default" name="btn_style_default"><span class="seers-banner bannerpos"></span><?php echo __('Banner', $this->textdomain); ?></button>
                                            <button
                                                class="seers-select-display-btn btn-modal <?php if(get_option('SCCBPP_cookie_consent_banner_position') == 'seers-cmp-middle-bar' || get_option('SCCBPP_cookie_consent_banner_position') == 'seers-cmp-preference-universal-bar'){ echo "active"; }?>"
                                                style="width:136px !important;" type="button" id="cbtn_flat"><span class="seers-modal"></span><?php echo __('Modal', $this->textdomain); ?></button>
                                            <button
                                                class="seers-select-display-btn btn-tooltip <?php if(get_option('SCCBPP_cookie_consent_banner_position') == 'seers-cmp-top-left-bar' || get_option('SCCBPP_cookie_consent_banner_position') == 'seers-cmp-top-right-bar' || get_option('SCCBPP_cookie_consent_banner_position') == 'seers-cmp-left-bar' || get_option('SCCBPP_cookie_consent_banner_position') == 'seers-cmp-right-bar'){ echo "active"; }?>"
                                                style="width:136px !important;" type="button" id="cbtn_rounded"><span class="dashicons dashicons-minus tooltipicon"></span><?php echo __('Tooltip', $this->textdomain); ?></button>
                                            <?php ?>

                                        </div>
            </div>
            </div>
            <div class="seers-cms-visual-setting-group-res display-position">
            <p class="seers-cms-visual-font-setting"><?php esc_html_e('Position&nbsp; ', $this->textdomain);?><span class="tooltip" data-title="<?php echo __('Choose  the position or placement of the banner', $this->textdomain); ?>" style="font-size:20px;"><img class="seers-cms-visuals-info-icon" src="<?php echo plugin_dir_url(__FILE__) . '../../images/info icon.png'; ?>" alt="info-icon"></span></p>
            <div class="seers-cms-visual-options-res seers-cms-visual-button-style">
                <!-- <button class="seers-cms-visual-btn seers-cms-visual-style seers-cms-visual-top"><img class="seers-cms-visuals-banner-position-im" src="<?php echo plugin_dir_url(__FILE__) . '../../images/BannerTopNotActive.svg'; ?>">Top</button>
                <button class="seers-cms-visual-btn seers-cms-visual-style seers-cms-visual-bottom"><img class="seers-cms-visuals-banner-position-im" src="<?php echo plugin_dir_url(__FILE__) . '../../images/BannerBottomActiveBlue.svg'; ?>">Bottom</button> -->
                <div class="seers-pr btn-group-position" style="flex-basis: 100%;" role="group">
                                            <button
                                                class="seers-select-display-btn btn-top <?php if(get_option('SCCBPP_cookie_consent_banner_position')=='seers-cmp-top-bar'){ echo "active"; }?><?php //echo (( get_option('SCCBPP_cookie_consent_id') === false || get_option('SCCBPP_cookie_consent_id') == '') ? ' seers-paid-feature-opener' : ""); ?>"
                                                style="width:136px !important;" type="button" id="cbtn_default" name="btn_style_default"><span class="seers-banner bannertpos"></span><?php echo __('Top', $this->textdomain); ?></button>
                                            <button
                                                class="seers-select-display-btn btn-bottom <?php if(get_option('SCCBPP_cookie_consent_banner_position')=='seers-cmp-banner-bar'){ echo "active"; }?>"
                                                style="width:136px !important;" type="button" id="cbtn_flat"><span class="seers-banner bannerbpos"></span><?php echo __('Bottom', $this->textdomain); ?></button>
                                            <button
                                                class="seers-select-display-btn btn-bottomleft <?php if(get_option('SCCBPP_cookie_consent_banner_position') == 'seers-cmp-left-bar'){ echo "active"; }?>"
                                                style="width:136px !important;" type="button" id="cbtn_rounded"><span class="seers-bottomleft"></span><?php echo __('Bottom Left', $this->textdomain); ?></button>
                                            <button
                                                class="seers-select-display-btn btn-bottomright <?php if(!get_option('SCCBPP_cookie_consent_banner_position') || get_option('SCCBPP_cookie_consent_banner_position') == '' || get_option('SCCBPP_cookie_consent_banner_position')=='seers-cmp-right-bar'){ echo "active"; }?>"
                                                style="width:136px !important;" type="button" id="cbtn_rounded"><span class="seers-bottomright"></span><?php echo __('Bottom Right', $this->textdomain); ?></button>
                                                <button
                                                class="seers-select-display-btn btn-topleft <?php if(get_option('SCCBPP_cookie_consent_banner_position')=='seers-cmp-top-left-bar'){ echo "active"; }?>"
                                                type="button" id="cbtn_rounded"><span class="seers-topleft"></span><?php echo __('Top Left', $this->textdomain); ?></button>
                                            <button
                                                class="seers-select-display-btn btn-topright <?php if(get_option('SCCBPP_cookie_consent_banner_position')=='seers-cmp-top-right-bar'){ echo "active"; }?>"
                                                type="button" id="cbtn_rounded"><span class="seers-topright"></span><?php echo __('Top Right', $this->textdomain); ?></button>
                                            <button
                                                class="seers-select-display-btn btn-hangingtop <?php if(get_option('SCCBPP_cookie_consent_banner_position')=='seers-cmp-top-hanging-bar'){ echo "active"; }?><?php //echo (( get_option('SCCBPP_cookie_consent_id') === false || get_option('SCCBPP_cookie_consent_id') == '') ? ' seers-paid-feature-opener' : ""); ?>"
                                                style="width:136px !important;" type="button" id="cbtn_default" name="btn_style_default"><span class="seers-banner bannerhangingtpos"></span><?php echo __('Top Hanging', $this->textdomain); ?></button>
                                            <button
                                                class="seers-select-display-btn btn-hangingbottom <?php if(get_option('SCCBPP_cookie_consent_banner_position')=='seers-cmp-banner-hanging-bar'){ echo "active"; }?>"
                                                style="width:136px !important;" type="button" id="cbtn_flat"><span class="seers-banner bannerhangingbpos"></span><?php echo __('Bottom Hanging', $this->textdomain); ?></button>
                                            <button
                                                class="seers-select-display-btn btn-preference <?php if(get_option('SCCBPP_cookie_consent_banner_position')=='seers-cmp-banner-preference-bar'){ echo "active"; }?><?php //echo (( get_option('SCCBPP_cookie_consent_id') === false || get_option('SCCBPP_cookie_consent_id') == '') ? ' seers-paid-feature-opener' : ""); ?>"
                                                style="width:136px !important;" type="button" id="cbtn_default" name="btn_style_default"><span class="seers-banner preferencetpos"></span><?php echo __('First Preference', $this->textdomain); ?></button>
                                            <button
                                                class="seers-select-display-btn btn-hangingpreference <?php if(get_option('SCCBPP_cookie_consent_banner_position')=='seers-cmp-preference-bottom-hanging-bar'){ echo "active"; }?>"
                                                style="width:136px !important;" type="button" id="cbtn_flat"><span class="seers-banner hangingpreferencebpos"></span><?php echo __('Hang Preference', $this->textdomain); ?></button>
                                            <button
                                                class="seers-select-display-btn btn-universal <?php if(get_option('SCCBPP_cookie_consent_banner_position')=='seers-cmp-preference-universal-bar'){ echo "active"; }?>"
                                                style="width:136px !important;" type="button" id="cbtn_flat"><span class="seers-modal universalbpos"></span><?php echo __('Universal', $this->textdomain); ?></button>
                                            <button
                                                class="seers-select-display-btn btn-modal-bar <?php if(get_option('SCCBPP_cookie_consent_banner_position')=='seers-cmp-middle-bar'){ echo "active"; }?>"
                                                style="width:136px !important;" type="button" id="cbtn_flat"><span class="seers-modal modalbarbpos"></span><?php echo __('Standard', $this->textdomain); ?></button>
                                            <?php //} ?>

                                        </div>
            </div>
            </div>
            
            <div class="seers-cms-visual-setting-group-res">
                <p class="seers-cms-visual-font-setting"><?php esc_html_e('Cookie Preferences Logo&nbsp; ', $this->textdomain);?><span class="tooltip" data-title="<?php echo __('Add logo of your business', $this->textdomain); ?>" style="font-size:20px;"><img class="seers-cms-visuals-info-icon" src="<?php echo plugin_dir_url(__FILE__) . '../../images/info icon.png'; ?>" alt="info-icon"></span><span class="seers-cms-dashboard-premium"><?php esc_html_e('PREMIUM', $this->textdomain);?></span></p>
                <div class="seers-cms-visual-options-res">
                    <div class="seers-cms-visual-logo"><?php esc_html_e('Logo will show here', $this->textdomain);?></div>
                    <button class="seers-cms-visual-btn seers-cms-visual-upload seers-paid-feature-opener" name="seersbannerlogo"><?php esc_html_e('Upload', $this->textdomain);?></button>
                </div>
            </div>
            
            
            <div class="seers-cms-visual-setting-group-res">
                <p class="seers-cms-visual-font-setting"><?php esc_html_e('Choose Font & Size&nbsp; ', $this->textdomain);?><span class="tooltip" data-title="<?php echo __('Change the font style and size of your text', $this->textdomain); ?>" style="font-size:20px;"><img class="seers-cms-visuals-info-icon" src="<?php echo plugin_dir_url(__FILE__) . '../../images/info icon.png'; ?>" alt="info-icon"></span></p>
                <div class="seers-cms-visual-options-res">
                <!-- <p class="seers-cms-visual-btn seers-cms-visual-font-style">Arial <img class="seers-cms-visual-img-dropdown" src="<?php echo plugin_dir_url(__FILE__) . '../../images/down-arrow.png'; ?>"></p> -->
                <!-- <p class="seers-cms-visual-btn seers-cms-visual-font-size">12 <img class="seers-cms-visual-img-dropdown-fontsize" src="<?php echo plugin_dir_url(__FILE__) . '../../images/down-arrow.png'; ?>"></p> -->
                                        <div class="seers-pr">
                                            <select class="seers-input fm  seers-cms-visuals-fonts"  id="seers_fonts_fm" name="seers_fonts_fm">
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
                                            <select class="seers-input fs  seers-cms-visuals-fonts-size" id="seers_fonts_fs" name="seers_fonts_fs">
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
            </div>

            
            <div class="seers-cms-visual-powered-by">
                <p class="seers-cms-visual-font-setting"><?php esc_html_e('Powered by Seers &nbsp; ', $this->textdomain);?><span class="tooltip" data-title="<?php echo __('Show or hide powered by Seers on preference centre of banner', $this->textdomain); ?>" style="font-size:20px;"><img class="seers-cms-visuals-info-icon" src="<?php echo plugin_dir_url(__FILE__) . '../../images/info icon.png'; ?>" alt="info-icon"></span><span class="seers-cms-dashboard-premium"><?php esc_html_e('PREMIUM', $this->textdomain);?></span></p>
                <div class="seers-cms-visual-options ">
                <span class="seers-cms-visual-premium seers-paid-feature-opener" name="seerspoweredby"><?php esc_html_e('APPLY', $this->textdomain);?></span>
            </div>
            </div>
        </div>
        <hr class="seers-cms-visual-space">
        <button class="seers-cms-visual-save-btn" id="setting_save_new"><?php esc_html_e('Save Changes', $this->textdomain);?></button>
    </div>
</body>
</html>
