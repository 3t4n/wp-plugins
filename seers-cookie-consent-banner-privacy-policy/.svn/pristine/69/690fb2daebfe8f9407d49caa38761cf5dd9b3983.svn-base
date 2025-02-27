<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>GDPR Cookie Banner Dashboard</title>
    <link rel="stylesheet" href="<?php echo plugin_dir_url(__FILE__) . 'Account.css'; ?>">
</head>
<body>
<div class="seers-content-col tile-style">
                            <h1>Seers Cookie Consent Solution</h1>
                            
                            <ul class="tab-ul-sub">
                                <li class="createaccount tactive">
                                    <label for="bannersett"><?php esc_html_e('Create Account', $this->textdomain);?></label>
                                </li>
                                <li class="alreadyesiting">
                                    <label for="visualsett"><?php esc_html_e('Already Existing', $this->textdomain);?></label>
                                </li>

                            </ul>
                            <div class="seers-tab-countainer">

                                <div class="createaccount" style="display:block;">
                                    <form method="post" id="wp_plugin" action="<?php echo esc_url(str_replace('%7E', '~', $S_URI)); ?>">
                                        <fieldset>
                                            <?php if (get_option('SCCBPP_cookie_consent_id') !='') {?>
                                            <div style="color:#0C9A9A;  font-family: Arial; font-size: 12px;">
                                                <?php echo __('Your Seers Cookie Consent banner is activated.',$this->textdomain); ?>
                                            </div>
                                            <?php } else if (get_option('SCCBPP_cookie_consent_msg')) {?>
                                            <div style="color:#f00; font-family: Arial; font-size: 12px;">
                                                <?php echo __('Your Seers Cookie Consent Banner is NOT activated because',$this->textdomain); ?> <?php if(get_option('SCCBPP_cookie_consent_msg')){
                                                        esc_html_e(get_option('SCCBPP_cookie_consent_msg'));
                                                    }?> </div>
                                            <?php } ?>

                                            <label for="SCCBPP_cookie_consent_url"><span>URL</span>
                                                <input type="text" id="SCCBPP_cookie_consent_url"
                                                    name="SCCBPP_cookie_consent_url" class="input-field"
                                                    value="<?php esc_html_e($D_URL);  ?>" readonly>
                                            </label>
                                            <label
                                                for="SCCBPP_cookie_consent_email"><span><?php echo __('Email',$this->textdomain); ?></span>
                                                <input type="text" id="SCCBPP_cookie_consent_email"
                                                    name="SCCBPP_cookie_consent_email" class="input-field"
                                                    value="<?php esc_html_e($admin_Email); ?>">
                                            </label>
                                            <div class="seers-flex-container">
                                                <?php if (get_option('SCCBPP_cookie_consent_id') !='') {?>
                                                <div class="seers-checkbox-terms">
                                                    <div class="seers-checkbox">
                                                        <input type="checkbox" name="seers_term_condition"
                                                            id="seers_term_condition" value="terms" class="number" checked>
                                                        <?php esc_html_e('I agree Seers',$this->textdomain); ?>
                                                        <a href="https://seersco.com/terms-and-conditions.html" target="_blank"><?php echo __('Terms & Condition',$this->textdomain);?>
                                                        </a>
                                                        <?php echo __('and',$this->textdomain);?> <a
                                                            href="https://seersco.com/privacy-policy.html" target="_blank"><?php echo __('Privacy Policy',$this->textdomain); ?></a>,
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
                                                        <a href="https://seersco.com/terms-and-conditions.html" target="_blank"><?php esc_html_e('Terms & Condition',$this->textdomain);?>
                                                        </a>
                                                        <?php esc_html_e('and',$this->textdomain);?>
                                                        <a
                                                            href="https://seersco.com/privacy-policy.html" target="_blank"><?php esc_html_e('Privacy Policy',$this->textdomain); ?></a>,
                                                    </div>
                                                    <div class="seers-checkbox">
                                                        <input type="checkbox" name="seers_term_condition_url"
                                                            id="seers_term_condition_url" value="sterms" class="number">
                                                        <?php esc_html_e('I agree Seers to use my email and url to create an account and power the cookie banner.',$this->textdomain); ?>
                                                    </div>
                                                </div>
                                                <?php }?>
                                                <div class="seers-activate-button"><input type="submit" name="SCCBPP_cookieid"
                                                        id="SCCBPP_cookieid" disabled
                                                        value="<?php esc_html_e('Create Premium Account',$this->textdomain); ?>"
                                                        style="clear: both;"></div>
                                            </div>
                                            <label for="SCCBPP_cookie_consent_id"> <span><?php echo __('Cookie ID',$this->textdomain); ?></span>&nbsp;
                                                (<?php echo __('Seers Cookie ID will be received automatically after account creation',$this->textdomain); ?>)
                                                <input type="text" id="SCCBPP_cookie_consent_id" name="SCCBPP_cookie_consent_id"
                                                    class="input-field"
                                                    value="<?php esc_html_e(get_option('SCCBPP_cookie_consent_id')); ?>"
                                                    readonly>
                                            </label>
                                            <label class="notice notice-info bold seersinfotext"><?php echo sprintf(__('Important Note: Your domain name without the www and https:// will be used as your password to access the seers <a href="%s" target="_blank">dashboard</a>.',$this->textdomain), 'https://seersco.com/business/dashboard'); ?></label>
                                            <input name="SCCBPP_update_setting" type="hidden"
                                                value="<?php esc_html_e(wp_create_nonce('SCCBPP-cookie-consent')); ?>" />


                                        </fieldset>
                                    </form>
                                </div>
                                <div class="alreadyesiting">
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
                                                <input type="text" id="SCCBPP_cookie_consent_already_id" name="SCCBPP_cookie_consent_already_id"
                                                    class="input-field"
                                                    value="<?php echo ((!empty($_POST['SCCBPP_cookie_consent_already_id'])) ? filter_var($_POST['SCCBPP_cookie_consent_already_id'], FILTER_SANITIZE_STRING, FILTER_FLAG_STRIP_LOW) : esc_html__(get_option('SCCBPP_cookie_consent_id') )); ?>" />
                                            </label>
                                            <div class="seers-activate-button"><input type="submit" name="SCCBPP_save_cookieid"
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
                                    console.log("create account");
                                    sulis[1].classList.remove("tactive");
                                    sulis[0].classList.add("tactive");
                                    sulis[0].click();
                                }
                            }
                        </script>
</body>
</html>
