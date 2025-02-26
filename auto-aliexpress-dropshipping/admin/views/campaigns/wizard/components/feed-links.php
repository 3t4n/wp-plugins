<div class="aliexpress-box-settings-row">

    <div class="aliexpress-box-settings-col-1">
        <span class="aliexpress-settings-label"><?php esc_html_e( 'Feed Link', Auto_Aliexpress::DOMAIN ); ?></span>
    </div>

    <div class="aliexpress-box-settings-col-2">

        <label class="aliexpress-settings-label"><?php esc_html_e( 'Feed Source Link', Auto_Aliexpress::DOMAIN ); ?></label>


        <div class="aliexpress-form-field">
            <input
                type="text"
                name="aliexpress_feed_link"
                placeholder="<?php esc_html_e( 'Enter your feed url here', Auto_Aliexpress::DOMAIN ); ?>"
                value="<?php if(isset($settings['aliexpress_feed_link'])){echo $settings['aliexpress_feed_link'];}?>"
                id="aliexpress_feed_link"
                class="aliexpress-form-control"
            />
        </div>


    </div>

</div>
