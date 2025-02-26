<div class="aliexpress-box-settings-row">

    <div class="aliexpress-box-settings-col-1">
        <span class="aliexpress-settings-label"><?php esc_html_e( 'Campaign Name', Auto_Aliexpress::DOMAIN ); ?></span>
    </div>

    <div class="aliexpress-box-settings-col-2">

        <div>
            <input
                type="text"
                name="aliexpress_campaign_name"
                placeholder="<?php esc_html_e( 'Enter your Campaign Name here', Auto_Aliexpress::DOMAIN ); ?>"
                value="<?php if(isset($settings['aliexpress_campaign_name'])){echo $settings['aliexpress_campaign_name'];}?>"
                id="aliexpress_campaign_name"
                class="aliexpress-form-control"
                aria-labelledby="aliexpress_campaign_name"
            />
        </div>


    </div>

</div>
