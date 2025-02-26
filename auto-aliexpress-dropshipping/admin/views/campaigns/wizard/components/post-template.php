<div class="aliexpress-box-settings-row">

    <div class="aliexpress-box-settings-col-1">
        <span class="aliexpress-settings-label"><?php esc_html_e( 'Post Template', Auto_Aliexpress::DOMAIN ); ?></span>
        <span class="aliexpress-description"><?php esc_html_e( 'Customize the dashboard as per your liking.', Auto_Aliexpress::DOMAIN ); ?></span>
    </div>

    <div class="aliexpress-box-settings-col-2">

        <label class="aliexpress-settings-label"><?php esc_html_e( 'Campaign keywords', Auto_Aliexpress::DOMAIN ); ?></label>

        <span class="aliexpress-description"><?php esc_html_e( 'Campaign keywords (search for these keywords) (comma separated).', Auto_Aliexpress::DOMAIN ); ?></span>

        <div class="aliexpress-form-field">
            <label for="aliexpress_template" id="aliexpress-feed-link" class="aliexpress-label"><?php esc_html_e( 'Feed Source Link', Auto_Aliexpress::DOMAIN ); ?></label>
            <input
                type="text"
                name="aliexpress_template"
                placeholder="<?php esc_html_e( 'Enter your Feed source link here', Auto_Aliexpress::DOMAIN ); ?>"
                value=""
                id="aliexpress_template"
                class="aliexpress-form-control"
            />
        </div>


    </div>

</div>
