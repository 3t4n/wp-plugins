<?php
defined( 'ABSPATH' ) or die( 'No script kclassdies please!' );
//$this->print_array($ap_contact_form_settings);
?>
<!-- Front end Form -->
<div class="ap-contact-form-wrap <?php if ( $ap_contact_form_settings['apcf-display-box-shadow']) echo 'apcf-box-shadow-show'; ?>">
    <form method="post" action="">
        <!-- Name Field -->
        <?php if ( $ap_contact_form_settings['apcf-display-name'] ): ?>
            <div class="ap-contact-field-wrap">
                <?php if ( !$ap_contact_form_settings['apcf-placeholder-name'] ): ?>
                    <label><?php echo esc_attr( $ap_contact_form_settings['apcf-label-name'] ); ?></label>
                <?php endif;?>
                <div class="ap-contact-field">
                    <input type="text" name="ap_contact_field[name]" class="ap-name-field <?php echo ($ap_contact_form_settings['apcf-required-name']) ? 'ap-required-field' : ''; ?>"  <?php if ($ap_contact_form_settings['apcf-placeholder-name'] ) echo 'placeholder="'.esc_attr( $ap_contact_form_settings['apcf-label-name'] ).'"'; ?>/>
                </div>
                <?php if ( $ap_contact_form_settings['apcf-required-name'] ): ?>
                    <div class="ap-error-msg" style="display:none;"><?php echo esc_attr( $ap_contact_form_settings['apcf-required-message-name'] ); ?></div>
                <?php endif ?>
            </div>
        <?php endif ?>

        <!-- Email Field -->
        <?php if ( $ap_contact_form_settings['apcf-display-email'] ): ?>
            <div class="ap-contact-field-wrap">
                <?php if ( !$ap_contact_form_settings['apcf-placeholder-email'] ): ?>
                    <label><?php echo esc_attr( $ap_contact_form_settings['apcf-label-email'] ); ?></label>
                <?php endif;?>
                <div class="ap-contact-field">
                    <input type="email" name="ap_contact_field[email]" class="ap-email-field <?php echo ($ap_contact_form_settings['apcf-required-email']) ? 'ap-required-field' : ''; ?>" <?php if ($ap_contact_form_settings['apcf-placeholder-email'] ) echo 'placeholder="'.esc_attr( $ap_contact_form_settings['apcf-label-email'] ).'"'; ?>/>
                </div>
                <?php if ( $ap_contact_form_settings['apcf-required-email'] ): ?>
                    <div class="ap-error-msg" style="display:none;"><?php echo esc_attr( $ap_contact_form_settings['apcf-required-message-email'] ); ?></div>
                <?php endif ?>
            </div>
        <?php endif ?>

        <!-- Subject Field -->
        <?php if ( $ap_contact_form_settings['apcf-display-subject'] ): ?>
            <div class="ap-contact-field-wrap">
                <?php if ( !$ap_contact_form_settings['apcf-placeholder-subject'] ): ?>
                    <label><?php echo esc_attr( $ap_contact_form_settings['apcf-label-subject'] ); ?></label>
                <?php endif;?>
                <div class="ap-contact-field">
                    <input type="text" name="ap_contact_field[subject]" class="ap-subject-field <?php echo ($ap_contact_form_settings['apcf-required-subject']) ? 'ap-required-field' : ''; ?>" <?php if ($ap_contact_form_settings['apcf-placeholder-subject'] ) echo 'placeholder="'.esc_attr( $ap_contact_form_settings['apcf-label-subject'] ).'"'; ?>/>
                </div>
                <?php if ( $ap_contact_form_settings['apcf-required-subject'] ): ?>
                    <div class="ap-error-msg" style="display:none;"><?php echo esc_attr( $ap_contact_form_settings['apcf-required-message-subject'] ); ?></div>
                <?php endif ?>
            </div>
        <?php endif ?>

        <!-- Subject Field -->
        <?php if ( $ap_contact_form_settings['apcf-display-message'] ): ?>
            <div class="ap-contact-field-wrap">
                <?php if ( !$ap_contact_form_settings['apcf-placeholder-message'] ): ?>
                    <label><?php echo esc_attr( $ap_contact_form_settings['apcf-label-message'] ); ?></label>
                <?php endif;?>
                <div class="ap-contact-field">
                    <textarea name="ap_contact_field[message]" rows="6" class="ap-message-field <?php echo ($ap_contact_form_settings['apcf-required-message']) ? 'ap-required-field' : ''; ?>" <?php if ($ap_contact_form_settings['apcf-placeholder-message'] ) echo 'placeholder="'.esc_attr( $ap_contact_form_settings['apcf-label-message'] ).'"'; ?>></textarea>
                </div>
                <?php if ( $ap_contact_form_settings['apcf-required-message'] ): ?>
                    <div class="ap-error-msg" style="display:none;"><?php echo esc_attr( $ap_contact_form_settings['apcf-required-message-message'] ); ?></div>
                <?php endif ?>
            </div>
        <?php endif ?>

        <!-- Google Recaptcha Frontend Display -->
        <input type="hidden" class="apcf-captch-flag" value="<?php esc_attr_e($ap_contact_form_settings['apcf-display-captcha']);?>">
                <input type="hidden" class="apcf-captch-site-flag" value="<?php esc_attr_e($ap_contact_form_settings['apcf-captcha-site-key']);?>">
                <input type="hidden" class="apcf-captch-secret-flag" value="<?php esc_attr_e($ap_contact_form_settings['apcf-captcha-secret-key']);?>">
        <?php
        if ( $ap_contact_form_settings['apcf-display-captcha'] ):
            if ( !empty( $ap_contact_form_settings['apcf-captcha-site-key'] ) && !empty( $ap_contact_form_settings['apcf-captcha-secret-key'] ) ):
                ?>
                <div class="ap-contact-field-wrap-captcha" data-tab="<?php if ( $ap_contact_form_settings['apcf-display-captcha'] ) echo 'show'; ?>">
                    <div class="apcf-captcha-label"><?php echo $ap_contact_form_settings['apcf-captcha-label']; ?></div>
                    <script src="https://www.google.com/recaptcha/api.js" id='recaptcha'></script>
                    <div class="g-recaptcha" id="g-recaptcha" data-sitekey="<?php echo esc_attr( $ap_contact_form_settings['apcf-captcha-site-key'] ); ?>"></div>   
                    
                </div>
            <?php endif ?>
        <?php endif ?>
        <div class="apcf-captcha-error" style="display:none;"><?php echo esc_attr( $ap_contact_form_settings['apcf-captcha-error-message'] ); ?></div>

        <!-- Submit -->
        <?php if ( $ap_contact_form_settings['apcf-display-submit'] ): ?>
            <div class="ap-contact-field-wrap">
                <div class="ap-contact-field-submit apcf-submit-form">
                    <input type="submit" name="ap_contact_field[form_submit]" value="<?php echo esc_attr( $ap_contact_form_settings['apcf-label-submit'] ); ?>"/>
                    <!-- Ajax Loader -->
                    <div class="apcf-ajax-loader" style="display:none;"><img src="<?php echo APCF_IMG_DIR . '/ajax-loader.gif'; ?>"></div>
                </div>
            </div>
        <?php endif ?>

        <!-- Success Message -->
        <div class="ap-success-message" style="display:none;"><?php echo esc_attr( $ap_contact_form_settings['apcf-success-message'] ); ?></div>
    </form>
</div>