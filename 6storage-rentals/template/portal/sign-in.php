<?php
    use SixStorageOnline\Base\Six_Storage_SettingsKeys;
    $obj = new Six_Storage_SettingsKeys(); 
?>
<style>
    .six-storage-primary-background-color{
        background-color:<?php echo esc_html(get_option($obj->six_storage_online_primary_color)); ?> !important;
    }
    .six-storage-secondary-background-color{
        background-color:<?php echo esc_html(get_option($obj->six_storage_online_secondary_color)); ?> !important;
    }
    .six_storage_online_text_color{
        color:<?php echo esc_html(get_option($obj->six_storage_online_text_color)); ?> !important;
    }
    .six-storage-text-border-bottom-color{
        border-bottom-color:<?php echo esc_html(get_option($obj->six_storage_online_text_color)); ?> !important;
    }
    .six-storage-primary-color{
        color:<?php echo esc_html(get_option($obj->six_storage_online_primary_color)); ?> !important;
    }
    .six-storage-secondary-color{
        color:<?php echo esc_html(get_option($obj->six_storage_online_secondary_color)); ?> !important;
    }

    .six-storage-primary-border-bottom-color{
        border-bottom-color:<?php echo esc_html(get_option($obj->six_storage_online_primary_color)); ?> !important; 
    }
    .six-storage-primary-border-left-color{
        border-left-color:<?php echo esc_html(get_option($obj->six_storage_online_primary_color)); ?> !important;
    }
    .six-storage-secondary-border-left-color{
        border-left-color:<?php echo esc_html(get_option($obj->six_storage_online_secondary_color)); ?> !important;
    }

    .six-storage-primary-border-color{
        border-color:<?php echo esc_html(get_option($obj->six_storage_online_primary_color)); ?> !important;
        color:<?php echo esc_html(get_option($obj->six_storage_online_primary_color)); ?> !important;
    }
    .six-storage-secondary-border-color{
        border-color:<?php echo esc_html(get_option($obj->six_storage_online_secondary_color)); ?> !important;
        color:<?php echo esc_html(get_option($obj->six_storage_online_secondary_color)); ?> !important;
    }

    .six-storage-primary-background{
        background:<?php echo esc_html(get_option($obj->six_storage_online_primary_color)); ?> !important;
    }
    .six-storage-secondary-background{
        background:<?php echo esc_html(get_option($obj->six_storage_online_secondary_color)); ?> !important;
    }

.reset-val-class{
            font-size: 0.8rem;
    }
    .key-icon-wrap{
        text-align:center;
    }
    .reset-btn-wrap{
        padding-bottom: 30px;
    }
    .reset-header{
        font-weight: 500;
        margin-top: 10px;
    }
    .green_tick{
        height: 12px;
        width: 12px;
    }

</style>
<div id="six-storage-sign-in-one-load-container" class="six-storage-online-root-class" style="display:none;">
    <div id="six-storage-sign-in-short-code" class="six-storage-grid-container-root">
        <div  id="six-storage-loading-container" style="display: none"></div>
        <div class="six-storage-grid-container">
            <div class="six-storage-grid-row six-storage-grid-mb30">
                <h5 class="cc six-storage-fs-title six-storage-text-center six_storage_online_text_color six-storage-grid-w-100" id="six-storage-sign-in-header"><!--Login--><?php esc_html_e('Login','6storage-rentals'); ?></h5>
                <hr class="six-storage-grid-title-hr six-storage-grid-d-flex six-storage-text-border-bottom-color">
            </div>
            <div class="six-storage-grid-row grid-col-md-6 six-storage-mx-auto" id="six-storage-unit-lists">
                <div class="six-storage-grid-col-md-12">
                    <div class="six-storage-text-center" style="display: none;position:relative;bottom:20px;" id="six-storage-sign-in-response"></div>
                </div>
                <div class="six-storage-grid-col-md-12" id="six-storage-sign-in-body">
                    <form onsubmit="event.preventDefault()" class="six-storage-grid-shadow-md cc six-storage-grid-p0 border-0" data-url="<?php echo esc_attr(admin_url('admin-ajax.php')) ?>" autocomplete="off" id="six-storage-sign-in-form" action="post">

<!-- Hubspot Ignore Form -->
<label for="cc-num" style="display:none;">credit card HubspotCollectedFormsWorkaround</label>
                        <input name="cc-num" style="display:none;" required="" value="HubspotCollectedFormsWorkaround" id="cc-num" />
                        <!--  -->
                                            <div class="six-storage-form-row six-storage-row cc six-storage-grid-mb0  six-storage-grid-pb0">
                            <div class="six-storage-s12">
                                <div class="six-storage-input-field cc">
                                    <i class="six-storage-material-icons notranslate six-storage-primary-color six-storage-prefix six-storage-grey-text">perm_identity</i>
                                    <input type="text" class="cc" id="six-storage-username" aria-describedby="six-storage-inputGroupPrepend" />
                                    <label class="cc" for="six-storage-username"><?php esc_html_e('Username/Email','6storage-rentals'); ?></label>
                                    <div style="display: none;" id="six-storage-username-err" class="six-storage-invalid-feedback">
                                        <?php esc_html_e('Please Enter Username/Email','6storage-rentals'); ?>
                                    </div>
                                </div>
                            </div>
                            <div class="six-storage-s12">
                                <div class="six-storage-input-field cc six-storage-password-type-toggle">
                                    <i class="six-storage-material-icons notranslate six-storage-prefix six-storage-grey-text six-storage-primary-color">fingerprint</i>
                                    <input type="password" class="cc" id="six-storage-password" aria-describedby="six-storage-inputGroupPrepend" />
                                    <label  class="cc" for="six-storage-password"> <?php esc_html_e('Password','6storage-rentals'); ?></label>
                                    <a class="six-storage-waves-effect six-storage-password-icon six-storage-prefix  six-storage-grid-shadow-none six-storage-transparent six-storage-text-center six-storage-right-0"><i class="six-storage-material-icons notranslate six-storage-grey-text six-storage-grid-position-relative " toggle="six-storage-password" onclick="return sixStorageTogglePasswordVisibility(this);">remove_red_eye</i></a>
                                    <div style="display: none;" id="six-storage-password-err" class="six-storage-invalid-feedback">
                                        <?php esc_html_e('Please Enter Password','6storage-rentals'); ?>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="six-storage-text-center six-storage-clearfix six-storage-grid-pb15">
                            <button class="six-storage-waves-effect cc six-storage-waves-light six-storage-btn cc six-storage-primary-background six-storage-signupsubmit-btn" id="six-storage-sign-in-btn" type="submit" onclick="return sixStorageSignIn();"><span class="show-default"><?php esc_html_e('Login','6storage-rentals'); ?></span></button>
                            <p class="cc six-storage-text-center six-storage-grid-mb0"><a class="six-storage-grid-col-md-12 six-storage-modal-footer-text  six-storage-font-size-14 six-storage-text-decoration-none" id="six-storage-forgotpwd" href="javascript:void(0)" onclick="sixStorageForgotPasswordModal();"> <?php esc_html_e('Forgot Your Password?','6storage-rentals'); ?></a></p>                          
                            <p class="cc six-storage-text-center six-storage-grid-mb0"><a class="six-storage-grid-col-md-12 six-storage-modal-footer-text six-storage-font-size-14 six-storage-text-decoration six-storage-waves-effect six-storage-waves-light six-storage-modal-trigger six-storage-font-weight" data-target="sixstorageknowmoretext" id="six-storage-knowmore" href="javascript:void(0)"> <?php esc_html_e('Having trouble logging in?','6storage-rentals'); ?></a></p>
                        </div>
                    </form>
                </div>
                <?php 
                    if (function_exists('pll_get_post')) {
                        $dashboard_translated_Page = get_permalink(pll_get_post(get_option('six_storage_dashboard_page_id')));
                        echo "<input type='hidden' id='six-storage-dashboard-url' value=". esc_attr($dashboard_translated_Page).">";
                    }
                    else{
                        $dashboard_url = get_permalink(get_option('six_storage_dashboard_page_id'));
                        echo "<input type='hidden' id='six-storage-dashboard-url' value=". esc_attr($dashboard_url).">";
                    }
                ?>
            </div>
        </div>
        <div class="six-storage-alert-wrapper six-storage-d-none" id="six-storage-success-msg">
            <div class="six-storage-alert-box green lighten-1 six-storage-grid-d-flex six-storage-justify-content-between  six-storage-align-items-center" id="six-storage-dv-alert">
                <div class="six-storage-text-section six-storage-grid-d-flex six-storage-align-items-center">
                    <div class="six-storage-icon-alert-box green six-storage-lighten-3 six-storage-rounded-circle six-storage-grid-mr10 six-storage-grid-d-flex six-storage-align-items-center six-storage-justify-content-center">
                        <i class="six-storage-material-icons notranslate six-storage-white-text six-storage-font-size-30" id="six-storage-alert-icon">thumb_up</i>
                    </div>
                    <p class="cc six-storage-alert-text six-storage-font-weight-bold six-storage-grid-m0 six-storage-white-text six-storage-alert-message" id="six-storage-alert-message"> <?php esc_html_e('Successfully Updated','6storage-rentals'); ?></p>
                </div>
                <div class="six-storage-action-close" onclick="sixStorageCloseAlert();">
                    <a class="six-storage-btn-floating six-storage-btn-large six-storage-waves-effect six-storage-waves-light six-storage-transparent six-storage-icon-alert-box six-storage-flexbox-important six-storage-align-items-center six-storage-justify-content-center six-storage-rounded-circle six-storage-text-decoration-none">
                        <i class="six-storage-material-icons notranslate six-storage-white-text">close</i>
                    </a>
                </div>
            </div>
        </div>
        <div class="six-storage-modal" id="six-storage-browser-compatibility-modal" style="display:none">
            <div class="six-storage-modal-container-header">
                <div class="six-storage-title" >
                    <?php esc_html_e('Better Browser, Better Experience ','6storage-rentals'); ?>
                </div>
                <div >
                    <button id="six-storage-browser-comp-btn"    class="six-storage-modal-close six-storage-waves-effect six-storage-waves-red btn-flat cc">&times;</button>
                </div>
            </div>
            <div class="six-storage-modal-content six-storage-text-center" id="six-storage-browser-compatibility-Body">
                <img class="cc" width="300" src=" <?php echo SIX_STORAGE_PLUGIN_FILE?>/assets/images/undraw_mobile_browsers_lib5.svg" alt="Browser Compatiblity ">
                <p  class="cc six-storage-grey-text six-storage-grid-mt15 six-storage-text-title"> <?php esc_html_e('Improve your experience, in one of the up to date version of the chrome, Firefox and Edge','6storage-rentals'); ?></p>

                <button class="six-storage-waves-effect six-storage-waves-light six-storage-btn cc secondary six-storage-modal-close" onclick="localStorage.setItem('ieBrowserLoaded', true);" id="six-storage-browser-comp-btn" ><?php esc_html_e('Ok','6storage-rentals'); ?></button>
            </div>
        </div>
        <div id="sixstorageknowmoretext" class="six-storage-modal">

        <div class="six-storage-float-right"> 
                    <button class="six-storage-modal-close six-storage-waves-effect six-storage-waves-red six-storage-btn-flat six-storage-black-text six-storage-sign-in-close-btn">×</button>
                </div>
            <div class="six-storage-modal-content">
               
                <p class="six-storage-six-storage-font-size-15 six-storage-grid-mt15"><?php esc_html_e('1. Password is case-sensitive.','6storage-rentals'); ?></p>
                <p class="six-storage-six-storage-font-size-15"><?php esc_html_e('2. Check to make sure there are no extra spaces before or after your email or password.','6storage-rentals'); ?></p>
                <p class="six-storage-six-storage-font-size-15"><?php esc_html_e('3. Enter your password manually instead of copying and pasting it.','6storage-rentals'); ?></p>
            </div>
        </div>
        
    </div>
<div id="six-storage-reset-password" class="six-storage-grid-container-root"  style="display: none">
        <div  id="six-storage-loading-container" style="display: none"></div>
        <input type="hidden" id="valid-password-flag" name="hidden" value="0">
        <div class="six-storage-grid-container">
            <div class="key-icon-wrap">
                <img src="<?php echo SIX_STORAGE_PLUGIN_FILE?>assets/images/resetpassword-key-icon.png" alt="S8" class="six-storage-grid-img-fluid cc six-storage-unitImg">
            </div>
            <div class="six-storage-grid-row six-storage-grid-mb30">
                <h5 class="six-storage-fs-title six-storage-text-center six_storage_online_text_color six-storage-grid-w-100 reset-header" id="six-storage-sign-in-header"><!--Login--><?php esc_html_e('Reset your password','6storage-rentals'); ?></h5>
                <hr class="six-storage-grid-title-hr six-storage-grid-d-flex six-storage-text-border-bottom-color">
            </div>
            <div class="six-storage-grid-row grid-col-md-6 six-storage-mx-auto" id="six-storage-unit-lists">
                <div class="six-storage-grid-col-md-12">
                    <div class="six-storage-text-center" style="display: none;position:relative;bottom:20px;" id="six-storage-sign-in-response"></div>
                </div>
                <div class="six-storage-grid-col-md-12" id="six-storage-sign-in-body">
                    <form onsubmit="event.preventDefault()" class="six-storage-grid-shadow-md cc six-storage-grid-p0 border-0" data-url="http://tatvasoft.local/wp-admin/admin-ajax.php" autocomplete="off" id="six-storage-sign-in-form" action="post"><div class="six-storage-form-row six-storage-row cc six-storage-grid-pb0  six-storage-grid-mb0">
                        <div class="six-storage-col-md-12   ">
                            <div class="six-storage-s12">
                                <div class="six-storage-input-field cc six-storage-password-type-toggle">

                                    <input type="hidden" id="token-value" name="token" value="">

                                    <label class="cc six-storage-active" for="six-storage-password">New Password</label>
                                    <input type="password" class="cc" id="six-storage-pwd" aria-describedby="six-storage-inputGroupPrepend" placeholder="Enter a new password" maxlength="25" onkeyup="validatePassword()">                                    
                                    <a id="six-storage-pwd-eye" class="six-storage-waves-effect six-storage-password-icon six-storage-prefix six-storage-grid-shadow-none six-storage-transparent six-storage-text-center six-storage-right-0"><i class="six-storage-material-icons notranslate six-storage-grey-text six-storage-grid-position-relative " toggle="six-storage-password" onclick="return sixStorageTogglePasswordVisibility(this);">remove_red_eye</i></a>
                                    <div style="display: none;" id="six-storage-password-err" class="six-storage-invalid-feedback">
                                    Please Enter Password</div>
                                    <div id="validate-conditions" style="display:none;">
                                        <p id="val-length" class="reset-val-class">
                                            <span style="display: inline-block;"><img class="green_tick" src=" <?php echo SIX_STORAGE_PLUGIN_FILE?>/assets/images/checkmark-icon.png" alt="Validation Green Tick" style="display:none;"></span>  Must be at lease 8 characters</p>

                                            <p id="val-lowercase" class="reset-val-class"><span style="display: inline-block;"><img class="green_tick" src=" <?php echo SIX_STORAGE_PLUGIN_FILE?>/assets/images/checkmark-icon.png" alt="Validation Green Tick" style="display:none;"></span> One Lower One Character(a-z) </p>
                                            <p id="val-upercase" class="reset-val-class"><span style="display: inline-block;"><img class="green_tick" src=" <?php echo SIX_STORAGE_PLUGIN_FILE?>/assets/images/checkmark-icon.png" alt="Validation Green Tick" style="display:none;"></span> One Upper One Character(A-Z)</p>
                                            <p id="val-symbol" class="reset-val-class"><span style="display: inline-block;"><img class="green_tick" src=" <?php echo SIX_STORAGE_PLUGIN_FILE?>/assets/images/checkmark-icon.png" alt="Validation Green Tick" style="display:none;"></span> One number, symbol or special characters(!@#$..)</p>
                                        </div>

                                    </div>
                                </div>
                                <div class="six-storage-s12">
                                    <div class="six-storage-input-field cc six-storage-password-type-toggle">

                                        <label class="cc six-storage-active" for="six-storage-password">Confirm Password</label>
                                        <input type="password" class="cc" id="six-storage-confirm-password" aria-describedby="six-storage-inputGroupPrepend" placeholder="Confirm your new password" maxlength="25">                                  
                                        <a id="six-storage-cpwd-eye" class="six-storage-waves-effect six-storage-password-icon six-storage-prefix six-storage-grid-shadow-none six-storage-transparent six-storage-text-center six-storage-right-0"><i class="six-storage-material-icons notranslate six-storage-grey-text six-storage-grid-position-relative " toggle="six-storage-password" onclick="return sixStorageTogglePasswordVisibility(this);">remove_red_eye</i></a>
                                        <div style="display: none;" id="six-storage-password-err" class="six-storage-invalid-feedback">
                                        Please Enter Password                                    </div>
                                    </div>
                                </div>

                            </div>
                        </div>
                        <div class="six-storage-col-md-12 six-storage-clearfix six-storage-bg-white six-storage-show-forgotpwd six-storage-grid-pt0 six-storage-text-center reset-btn-wrap">
                            <button style="width:300" class="six-storage-waves-effect six-storage-waves-light six-storage-btn cc six-storage-secondary-background-color six-storage-resetpwd-submit six-storage-grid-mb0" type="submit" onclick="return sixStoragesetResetPasswordSave();">Reset my password</button>
                        </div>
                    </form>
                </div>
                <input type="hidden" id="six-storage-dashboard-url" value="http://tatvasoft.local/online-dashboard/">            
            </div>
        </div>
    </div>
    <div class="six-storage-row cc">
            <div class="cc six-storage-col six-storage-s12 six-storage-m12 six-storage-brand-name-div">
                <p class="cc six-storage-poweredBysigninfooter sixStoragefloatright"><b> Powered by </b> <a class="cc" href="https://www.6storage.com/" target="_blank">6Storage</a>
            </div>
        </div> 
</div>