<div class="aliexpress-box" role="document">

    <div class="aliexpress-box-header aliexpress-block-content-center">

        <div class="aliexpress-dialog-image" aria-hidden="true">

            <img src="<?php echo esc_url(AUTO_ALIEXPRESS_URL.'/assets/images/soundcloud.png'); ?>" alt="<?php esc_attr_e( 'Twitter API', Auto_Aliexpress::DOMAIN ); ?>">

        </div>

        <div class="aliexpress-box-content integration-header">

            <h3 class="aliexpress-box-title" id="dialogTitle2"><?php esc_html_e( 'Setup Twitter API', Auto_Aliexpress::DOMAIN ); ?></h3>

			<span class="aliexpress-description">
                <?php esc_html_e( 'Setup Twitter API to be used by Auto Aliexpress to display tweets on your blog.', Auto_Aliexpress::DOMAIN ); ?>
			</span>

        </div>

    </div>

    <div class="aliexpress-box-body">
        <form>

            <div class="aliexpress-form-field">
                <label class="aliexpress-label"><?php esc_html_e( 'Client ID', Auto_Aliexpress::DOMAIN ); ?></label>
                <div class="aliexpress-control-with-icon">
                    <ion-icon class="aliexpress-icon-person" name="person"></ion-icon>
                    <input name="client_id" placeholder="<?php esc_html_e( 'Client ID', Auto_Aliexpress::DOMAIN ); ?>" value="" class="aliexpress-form-control">
                </div>
            </div>

            <div class="aliexpress-form-field">
                <label class="aliexpress-label"><?php esc_html_e( 'Client Secret', Auto_Aliexpress::DOMAIN ); ?></label>
                <div class="aliexpress-control-with-icon">
                    <ion-icon class="aliexpress-icon-key" name="key"></ion-icon>
                    <input name="client_secret" placeholder="<?php esc_html_e( 'Client Secret', Auto_Aliexpress::DOMAIN ); ?>" value="" class="aliexpress-form-control">
                </div>
            </div>

            <div class="aliexpress-border-frame aliexpress-description">

                <span>
                    <?php esc_html_e( 'Follow these instructions to retrieve your Client ID and Secret.', Auto_Aliexpress::DOMAIN ); ?>
                </span>

            </div>

        </form>

    </div>

    <div class="aliexpress-box-footer aliexpress-box-footer-center">
        <button type="button" class="aliexpress-button aliexpress-addon-connect">
            <span class="aliexpress-loading-text"><?php esc_html_e( 'Connect', Auto_Aliexpress::DOMAIN ); ?></span>
        </button>
    </div>

</div>