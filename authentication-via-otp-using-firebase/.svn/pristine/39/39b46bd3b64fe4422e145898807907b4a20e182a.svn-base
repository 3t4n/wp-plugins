<div id="fa-main-opt-login">
    <a href="#modal-opened" class="fa-link-1" id="modal-closed"><?php echo esc_html_e($settings_config['login_btn_text'] ? $settings_config['login_btn_text'] : 'Continue with Phone', 'authentication-via-otp-using-Firebase') ?></a>

    <div class="fa-modal-container" id="modal-opened">
        <div class="fa-modal">
            <?php
            if ($missing_config == 0) {
            ?>
                <div class="fa-modal__details">
                    <h3 class="fa-modal__title"><?php echo esc_html_e($settings_config['step1_title_text'] ? $settings_config['step1_title_text'] : 'Enter Your Phone Number', 'authentication-via-otp-using-Firebase') ?></h3>
                </div>
                <div class="error"></div>
                <div class="success"></div>
                <form class="form-signin" accept="#">
                    <div class="input-phone-div">
                        <input type="tel" id="inputPhone" class="form-control" placeholder="8123456789">
                        <?php
                        if ($settings_config['email_required'] == 'yes') {
                        ?>
                            <input type="email" id="inputemail" class="form-control" placeholder="john@gmail.com">
                        <?php
                        }
                        ?>
                        <div id="recaptcha-container"></div>
                        <div>
                            <button class="modal__btn" type="button" id="phoneloginbtn"><?php echo esc_html_e($settings_config['otp_btn_text'] ? $settings_config['otp_btn_text'] : 'SEND OTP', 'authentication-via-otp-using-Firebase') ?></button>
                        </div>
                    </div>
                    <div class="input-otp-div">
                        <input type="otp" id="inputOtp" class="form-control" placeholder="Conformation Code">
                        <button class="modal__btn" type="button" id="verifyotp"><?php echo esc_html_e($settings_config['verify_btn_text'] ? $settings_config['verify_btn_text'] : 'VERIFY OTP', 'authentication-via-otp-using-Firebase') ?></button>
                        <div class="back_resend_otp">
                            <button class="modal__btn change_phone_number" type="button"><?php echo esc_html_e($settings_config['change_btn_text'] ? $settings_config['change_btn_text'] : 'Change Number', 'authentication-via-otp-using-Firebase') ?></button>
                            <button class="modal__btn" type="button" id="resend_otp"><?php echo esc_html_e($settings_config['resend_btn_text'] ? $settings_config['resend_btn_text'] : 'Resend OTP', 'authentication-via-otp-using-Firebase') ?></button>
                        </div>
                    </div>
                </form>
            <?php
            } else {
            ?>
                <div class="fa-modal__details">
                    <h3 class="fa-modal__title"><?php echo esc_html_e($error_message); ?></h3>
                </div>
            <?php
            }
            ?>

            <a href="#modal-closed" class="fa-link-2"></a>
        </div>
    </div>
</div>