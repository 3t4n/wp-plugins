<div class="fr-admin-page">
    <div class="container">
        <div class="topic"><?php echo __('Firebase Authentication', 'authentication-via-otp-using-Firebase') ?></div>
        <div>
            <h4 style="display: inline-block;">Shortcode :- </h4> <code> [fa_login_phone]</code>
        </div>
        <div class="content">
            <div class="list fa-tab-list">
                <a href="<?php echo esc_url(admin_url('admin.php?page=firebase-auth') . '&tab=fa_code') ?>" class="<?php if ($_GET['tab'] == 'fa_code' || !isset($_GET['tab'])) echo 'fa-active-tab'; ?>">
                    <label for="code" data-content="fa_code">
                        <span class="icon"><i class="fas fa-code"></i></span>
                        <span class="title"><?php echo __('Code', 'authentication-via-otp-using-Firebase') ?></span>
                    </label>
                </a>
                <a href="<?php echo esc_url(admin_url('admin.php?page=firebase-auth') . '&tab=fa_style') ?>" class="<?php if ($_GET['tab'] == 'fa_style') echo 'fa-active-tab'; ?>">
                    <label for="about" data-content="fa_style" class="">
                        <span class="icon"><i class="fas fa-paint-brush"></i></span>
                        <span class="title"><?php echo __('Style', 'authentication-via-otp-using-Firebase') ?></span>
                </a>
                <a href="<?php echo esc_url(admin_url('admin.php?page=firebase-auth') . '&tab=fa_settings') ?>" class="<?php if ($_GET['tab'] == 'fa_settings') echo 'fa-active-tab'; ?>">
                    </label>
                    <label for="about" data-content="fa_settings" class="">
                        <span class="icon"><i class="fas fa-cogs"></i></span>
                        <span class="title"><?php echo __('Settings', 'authentication-via-otp-using-Firebase') ?></span>
                    </label>
                </a>
            </div>
            <div class="text-content">
                <?php
                if (!isset($_GET['tab']) || $_GET['tab'] == 'fa_code') {
                    # code config 
                ?>
                    <div class="text" id=" fa_code">
                        <form method="POST">
                            <div>
                                <label>API KEY</label>
                                <input type="text" class="" name="apiKey" placeholder="apiKey" value="<?php echo esc_html_e($firebase_config['apiKey'], 'authentication-via-otp-using-Firebase'); ?>">
                            </div>
                            <div>
                                <label>AUTH Domain</label>
                                <input type="text" class="" name="authDomain" placeholder="authDomain" value="<?php echo esc_html_e($firebase_config['authDomain'], 'authentication-via-otp-using-Firebase'); ?>">
                            </div>
                            <div>
                                <label>Database URL</label>
                                <input type="text" class="" name="databaseURL" placeholder="databaseURL" value="<?php echo esc_html_e($firebase_config['databaseURL'], 'authentication-via-otp-using-Firebase'); ?>">
                            </div>
                            <div>
                                <label>Project Id</label>
                                <input type="text" class="" name="projectId" placeholder="projectId" value="<?php echo esc_html_e($firebase_config['projectId'], 'authentication-via-otp-using-Firebase'); ?>">
                            </div>
                            <div>
                                <label>Storage Bucket</label>
                                <input type="text" class="" name="storageBucket" placeholder="storageBucket" value="<?php echo esc_html_e($firebase_config['storageBucket'], 'authentication-via-otp-using-Firebase'); ?>">
                            </div>
                            <div>
                                <label>Messaging SenderId</label>
                                <input type="text" class="" name="messagingSenderId" placeholder="messagingSenderId" value="<?php echo esc_html_e($firebase_config['messagingSenderId'], 'authentication-via-otp-using-Firebase'); ?>">
                            </div>
                            <div>
                                <label>App Id</label>
                                <input type="text" class="" name="appId" placeholder="appId" value="<?php echo esc_html_e($firebase_config['appId'], 'authentication-via-otp-using-Firebase'); ?>">
                            </div>
                            <div>
                                <label>Measurement Id</label>
                                <input type="text" class="" name="measurementId" placeholder="measurementId" value="<?php echo esc_html_e($firebase_config['measurementId'], 'authentication-via-otp-using-Firebase'); ?>">
                            </div>
                            <input type="hidden" class="" name="formtype" value="fa_firebase_config">
                            <input type="submit" value="Submit">
                        </form>
                    </div>
                <?php
                }
                if (isset($_GET['tab']) &&  $_GET['tab'] == 'fa_style') {
                    # style config 
                ?>
                    <div class="text <?php if ($_GET['tab'] == 'fa_style') echo 'fa-active-content'; ?>" id="fa_style">
                        <form method="POST">
                            <div class="fa_style_inner">
                                <h3><?php echo __('Continue with Phone', 'authentication-via-otp-using-Firebase') ?></h3>
                                <table>
                                    <tr>
                                        <th><?php echo __('Button', 'authentication-via-otp-using-Firebase') ?></th>
                                        <th><?php echo __('Border', 'authentication-via-otp-using-Firebase') ?></th>
                                        <th><?php echo __('Text', 'authentication-via-otp-using-Firebase') ?></th>
                                        <th><?php echo __('Shadow', 'authentication-via-otp-using-Firebase') ?></th>
                                    </tr>
                                    <tr>
                                        <td>
                                            <input type="text" class="colorpicker" name="fa_button" placeholder="button" value="<?php echo esc_html_e($style_config['fa_button'], 'authentication-via-otp-using-Firebase') ?>">
                                        </td>
                                        <td>
                                            <input type="text" class="colorpicker" name="fa_button_border" placeholder="button" value="<?php echo esc_html_e($style_config['fa_button_border'], 'authentication-via-otp-using-Firebase') ?>">
                                        </td>
                                        <td>
                                            <input type="text" class="colorpicker" name="fa_button_text" placeholder="button" value="<?php echo esc_html_e($style_config['fa_button_text'], 'authentication-via-otp-using-Firebase') ?>">
                                        </td>
                                        <td>
                                            <input type="text" class="colorpicker" name="fa_button_shadow" placeholder="button" value="<?php echo esc_html_e($style_config['fa_button_shadow'], 'authentication-via-otp-using-Firebase') ?>">
                                        </td>

                                    </tr>
                                    <tr>
                                        <th><?php echo __('Button on Hover', 'authentication-via-otp-using-Firebase') ?></th>
                                        <th><?php echo __('Border on Hover', 'authentication-via-otp-using-Firebase') ?></th>
                                        <th><?php echo __('Text on Hover', 'authentication-via-otp-using-Firebase') ?></th>
                                        <th><?php echo __('Shadow on Hover', 'authentication-via-otp-using-Firebase') ?></th>
                                    </tr>
                                    <tr>
                                        <td>
                                            <input type="text" class="colorpicker" name="fa_button_hover" placeholder="button" value="<?php echo esc_html_e($style_config['fa_button_hover'], 'authentication-via-otp-using-Firebase') ?>">
                                        </td>
                                        <td>
                                            <input type="text" class="colorpicker" name="fa_button_border_hover" placeholder="button" value="<?php echo esc_html_e($style_config['fa_button_border_hover'], 'authentication-via-otp-using-Firebase') ?>">
                                        </td>
                                        <td>
                                            <input type="text" class="colorpicker" name="fa_button_text_hover" placeholder="button" value="<?php echo esc_html_e($style_config['fa_button_text_hover'], 'authentication-via-otp-using-Firebase') ?>">
                                        </td>
                                        <td>
                                            <input type="text" class="colorpicker" name="fa_button_shadow_hover" placeholder="button" value="<?php echo esc_html_e($style_config['fa_button_shadow_hover'], 'authentication-via-otp-using-Firebase') ?>">
                                        </td>
                                    </tr>
                                </table>
                            </div>
                            <div class="fa_style_inner">
                                <h3><?php echo __('Model Popup', 'authentication-via-otp-using-Firebase') ?></h3>
                                <table>
                                    <tr>
                                        <th><?php echo __('Button', 'authentication-via-otp-using-Firebase') ?></th>
                                        <th><?php echo __('Border', 'authentication-via-otp-using-Firebase') ?></th>
                                        <th><?php echo __('Text', 'authentication-via-otp-using-Firebase') ?></th>
                                        <th><?php echo __('Shadow', 'authentication-via-otp-using-Firebase') ?></th>
                                    </tr>
                                    <tr>
                                        <td>
                                            <input type="text" class="colorpicker" name="fa_pop_button" placeholder="button" value="<?php echo esc_html_e($style_config['fa_pop_button'], 'authentication-via-otp-using-Firebase') ?>">
                                        </td>
                                        <td>
                                            <input type="text" class="colorpicker" name="fa_pop_button_border" placeholder="button" value="<?php echo esc_html_e($style_config['fa_pop_button_border'], 'authentication-via-otp-using-Firebase') ?>">
                                        </td>
                                        <td>
                                            <input type="text" class="colorpicker" name="fa_pop_button_text" placeholder="button" value="<?php echo esc_html_e($style_config['fa_pop_button_text'], 'authentication-via-otp-using-Firebase') ?>">
                                        </td>
                                        <td>
                                            <input type="text" class="colorpicker" name="fa_pop_button_shadow" placeholder="button" value="<?php echo esc_html_e($style_config['fa_pop_button_shadow'], 'authentication-via-otp-using-Firebase') ?>">
                                        </td>

                                    </tr>
                                    <tr>
                                        <th><?php echo __('Button on Hover', 'authentication-via-otp-using-Firebase') ?></th>
                                        <th><?php echo __('Border on Hover', 'authentication-via-otp-using-Firebase') ?></th>
                                        <th><?php echo __('Text on Hover', 'authentication-via-otp-using-Firebase') ?></th>
                                        <th><?php echo __('Shadow on Hover', 'authentication-via-otp-using-Firebase') ?></th>
                                    </tr>
                                    <tr>
                                        <td>
                                            <input type="text" class="colorpicker" name="fa_pop_button_hover" placeholder="button" value="<?php echo esc_html_e($style_config['fa_pop_button_hover'], 'authentication-via-otp-using-Firebase') ?>">
                                        </td>
                                        <td>
                                            <input type="text" class="colorpicker" name="fa_pop_button_border_hover" placeholder="button" value="<?php echo esc_html_e($style_config['fa_pop_button_border_hover'], 'authentication-via-otp-using-Firebase') ?>">
                                        </td>
                                        <td>
                                            <input type="text" class="colorpicker" name="fa_pop_button_text_hover" placeholder="button" value="<?php echo esc_html_e($style_config['fa_pop_button_text_hover'], 'authentication-via-otp-using-Firebase') ?>">
                                        </td>
                                        <td>
                                            <input type="text" class="colorpicker" name="fa_pop_button_shadow_hover" placeholder="button" value="<?php echo esc_html_e($style_config['fa_pop_button_shadow_hover'], 'authentication-via-otp-using-Firebase') ?>">
                                        </td>
                                    </tr>
                                    <tr>
                                        <th><?php echo __('Model background', 'authentication-via-otp-using-Firebase') ?></th>
                                        <th><?php echo __('Model Text color', 'authentication-via-otp-using-Firebase') ?></th>
                                        <th><?php echo __('Model error message', 'authentication-via-otp-using-Firebase') ?></th>
                                        <th><?php echo __('Model success message', 'authentication-via-otp-using-Firebase') ?></th>
                                    </tr>
                                    <tr>
                                        <td>
                                            <input type="text" class="colorpicker" name="fa_popup_bg" placeholder="button" value="<?php echo esc_html_e($style_config['fa_popup_bg'], 'authentication-via-otp-using-Firebase') ?>">
                                        </td>
                                        <td>
                                            <input type="text" class="colorpicker" name="fa_popup_text" placeholder="button" value="<?php echo esc_html_e($style_config['fa_popup_text'], 'authentication-via-otp-using-Firebase') ?>">
                                        </td>
                                        <td>
                                            <input type="text" class="colorpicker" name="fa_popup_error" placeholder="button" value="<?php echo esc_html_e($style_config['fa_popup_error'], 'authentication-via-otp-using-Firebase') ?>">
                                        </td>
                                        <td>
                                            <input type="text" class="colorpicker" name="fa_popup_success" placeholder="button" value="<?php echo esc_html_e($style_config['fa_popup_success'], 'authentication-via-otp-using-Firebase') ?>">
                                        </td>
                                    </tr>
                                    <tr>
                                        <th><?php echo __('Loader', 'authentication-via-otp-using-Firebase') ?></th>
                                        <th><?php echo __('Loader border', 'authentication-via-otp-using-Firebase') ?></th>
                                    </tr>
                                    <tr>
                                        <td>
                                            <input type="text" class="colorpicker" name="fa_popup_loader" placeholder="button" value="<?php echo esc_html_e($style_config['fa_popup_loader'], 'authentication-via-otp-using-Firebase') ?>">
                                        </td>
                                        <td>
                                            <input type="text" class="colorpicker" name="fa_popup_loader_border" placeholder="button" value="<?php echo esc_html_e($style_config['fa_popup_loader_border'], 'authentication-via-otp-using-Firebase') ?>">
                                        </td>
                                    </tr>
                                </table>
                            </div>
                            <input type="hidden" class="" name="formtype" value="fa_style_config">
                            <input type="submit" value="Submit">
                        </form>
                        <form method="POST">
                            <input type="hidden" class="" name="formtype" value="fa_reset_style_config">
                            <input type="submit" value="Reset Style">
                        </form>
                    </div>
                <?php
                }
                if (isset($_GET['tab']) && $_GET['tab'] == 'fa_settings') {
                    # settings config
                ?>
                    <div class="text <?php if ($_GET['tab'] == 'fa_settings') echo 'fa-active-content'; ?>" id="fa_settings">
                        <form method="POST">
                            <div class="fa_style_inner">
                                <h3><?php echo __('Model Title', 'authentication-via-otp-using-Firebase') ?></h3>
                                <div>
                                    <label><?php echo __('Step 1', 'authentication-via-otp-using-Firebase') ?></label>
                                    <input type="text" class="" name="step1_title_text" placeholder="Enter Your Phone Number" value="<?php echo esc_html_e($settings_config['step1_title_text'], 'authentication-via-otp-using-Firebase'); ?>">
                                </div>
                                <div>
                                    <label><?php echo __('Step 2', 'authentication-via-otp-using-Firebase') ?></label>
                                    <input type="text" class="" name="step2_title_text" placeholder="Enter conformation code" value="<?php echo esc_html_e($settings_config['step2_title_text'], 'authentication-via-otp-using-Firebase'); ?>">
                                </div>
                            </div>
                            <div class="fa_style_inner">
                                <h3><?php echo __('Button Text', 'authentication-via-otp-using-Firebase') ?></h3>
                                <div>
                                    <label><?php echo __('Login button text', 'authentication-via-otp-using-Firebase') ?></label>
                                    <input type="text" class="" name="login_btn_text" placeholder="Continue with Phone" value="<?php echo esc_html_e($settings_config['login_btn_text'], 'authentication-via-otp-using-Firebase'); ?>">
                                </div>
                                <div>
                                    <label><?php echo __('OTP sent button text', 'authentication-via-otp-using-Firebase') ?></label>
                                    <input type="text" class="" name="otp_btn_text" placeholder="Continue with Phone" value="<?php echo esc_html_e($settings_config['otp_btn_text'], 'authentication-via-otp-using-Firebase'); ?>">
                                </div>
                                <div>
                                    <label><?php echo __('Vefify OTP button text', 'authentication-via-otp-using-Firebase') ?></label>
                                    <input type="text" class="" name="verify_btn_text" placeholder="Continue with Phone" value="<?php echo esc_html_e($settings_config['verify_btn_text'], 'authentication-via-otp-using-Firebase'); ?>">
                                </div>
                                <div>
                                    <label><?php echo __('Resent OTP button text', 'authentication-via-otp-using-Firebase') ?></label>
                                    <input type="text" class="" name="resend_btn_text" placeholder="Continue with Phone" value="<?php echo esc_html_e($settings_config['resend_btn_text'], 'authentication-via-otp-using-Firebase'); ?>">
                                </div>
                                <div>
                                    <label><?php echo __('Change number text', 'authentication-via-otp-using-Firebase') ?></label>
                                    <input type="text" class="" name="change_btn_text" placeholder="Continue with Phone" value="<?php echo esc_html_e($settings_config['change_btn_text'], 'authentication-via-otp-using-Firebase'); ?>">
                                </div>
                            </div>
                            <div class="fa_style_inner">
                                <h3><?php echo __('Message', 'authentication-via-otp-using-Firebase') ?></h3>
                                <div>
                                    <label><?php echo __('Phone error', 'authentication-via-otp-using-Firebase') ?></label>
                                    <input type="text" class="" name="fa_ph_error" placeholder="Invalid Phone Number" value="<?php echo esc_html_e($settings_config['fa_ph_error'], 'authentication-via-otp-using-Firebase'); ?>">
                                </div>
                                <div>
                                    <label><?php echo __('email error', 'authentication-via-otp-using-Firebase') ?></label>
                                    <input type="text" class="" name="fa_email_error" placeholder="Invalid Email Address" value="<?php echo esc_html_e($settings_config['fa_email_error'], 'authentication-via-otp-using-Firebase'); ?>">
                                </div>
                                <div>
                                    <label><?php echo __('OTP sent', 'authentication-via-otp-using-Firebase') ?></label>
                                    <input type="text" class="" name="fa_otp_sent" placeholder="Confirmation Code Sent Successfully" value="<?php echo esc_html_e($settings_config['fa_otp_sent'], 'authentication-via-otp-using-Firebase'); ?>">
                                </div>
                                <div>
                                    <label><?php echo __('Invalid OTP', 'authentication-via-otp-using-Firebase') ?></label>
                                    <input type="text" class="" name="fa_otp_fail" placeholder="Invalid Confirmation code" value="<?php echo esc_html_e($settings_config['fa_otp_fail'], 'authentication-via-otp-using-Firebase'); ?>">
                                </div>
                                <div>
                                    <label><?php echo __('OTP Verified', 'authentication-via-otp-using-Firebase') ?></label>
                                    <input type="text" class="" name="fa_otp_verified" placeholder="Confirmation Code Verified Successfully" value="<?php echo esc_html_e($settings_config['fa_otp_verified'], 'authentication-via-otp-using-Firebase'); ?>">
                                </div>
                            </div>
                            <div class="fa_style_inner">
                                <h3><?php echo __('Additional settings', 'authentication-via-otp-using-Firebase') ?></h3>
                                <div>
                                    <label><?php echo __('Email required', 'authentication-via-otp-using-Firebase') ?></label>
                                    <input type="checkbox" class="" name="email_required" value="yes" <?php if ($settings_config['email_required'] == 'yes') echo 'checked' ?>>
                                </div>
                                <div>
                                    <label><?php echo __('Myaccount Page', 'authentication-via-otp-using-Firebase') ?></label>
                                    <input type="checkbox" class="" name="woo_account" value="yes" <?php if ($settings_config['woo_account'] == 'yes') echo 'checked' ?>>
                                </div>
                                <div>
                                    <label for="redirect_page"><?php echo __('Choose a Redirect page:', 'authentication-via-otp-using-Firebase') ?></label>
                                    <select name="redirect_page" id="redirect_page">
                                        <?php
                                        // this is page list so no need to translate or escape
                                        echo $page_list
                                        ?>
                                    </select>
                                </div>
                            </div>
                            <input type="hidden" class="" name="formtype" value="fa_settings_config">
                            <input type="submit" value="Submit">
                        </form>
                    </div>
                <?php
                }
                ?>
            </div>
        </div>
    </div>
</div>