<div class="shopcred-pro-woo-builder-wrapper">
    <div class="shopcred-pro-settings-page shopcred-pro-settings-page__general">
        <div class="avaliable-controls__header first">
            <div class="cx-vui-subtitle"><?php _e( 'Shop Page', 'shop-cred-pro' ); ?></div>
            <a href="<?php echo get_admin_url(); ?>/edit.php?post_type=spc-pro-woo-builder" target="_blank" class="spc-admin-block-docs-button">Create New Template</a>
        </div>

        <cx-vui-switcher
            name="enable_spc_shop_page_template"
            label="<?php _e( 'Enable Custom Shop Page', 'shop-cred-pro' ); ?>"
            description=""
            :wrapper-css="[ 'equalwidth' ]"
            return-true="true"
            return-false="false"
            v-model="pageOptions['enable_spc_shop_page_template'].value"
        >
        </cx-vui-switcher>

        <cx-vui-select
            v-if="'true' === pageOptions['enable_spc_shop_page_template'].value"
            name="spc_shop_page_template"
            label="<?php _e( 'Shop Page', 'shop-cred-pro' ); ?>"
            description="<?php _e( 'Select Shop Page from the Woo Builder', 'shop-cred-pro' ); ?>"
            :wrapper-css="[ 'equalwidth' ]"
            size="fullwidth"
            :options-list="pageOptions.spc_shop_page_template.options"
            v-model="pageOptions.spc_shop_page_template.value"
        >
        </cx-vui-select>
        
        <!----> 
        <div class="avaliable-controls__header">
            <div class="cx-vui-subtitle"><?php echo esc_html__( 'Single Product Page Templete', 'shopcred'); ?> <span class="notice-small-text"><a href="https://wpshopcred.com/shopcred-pro/" target="_blank"><?php echo esc_html__( 'Available in PRO', 'shopcred'); ?></a></span></div>
        </div>
        <div class="cx-vui-component cx-vui-component--equalwidth cx-vui-switcher--deactive spc-pro-modal-trigger">
            <div class="cx-vui-component__meta">
                <label class="cx-vui-component__label" for="cx_enable_spc_single_shop_page_template"><?php echo esc_html__( 'Enable Custom Single Product Page', 'shopcred'); ?></label> <!---->
            </div>
            <div class="cx-vui-component__control">
                <div tabindex="0" class="cx-vui-switcher cx-vui-switcher--off" id="cx_enable_spc_single_shop_page_template">
                    <input type="hidden" checked="checked" name="enable_spc_single_shop_page_template" class="cx-vui-switcher__input" value="false"> 
                    <div class="cx-vui-switcher__panel"></div>
                    <div class="cx-vui-switcher__trigger"></div>
                </div>
            </div>
        </div>
        <!----> 
        <div class="avaliable-controls__header">
            <div class="cx-vui-subtitle"><?php echo esc_html__( 'Custom Cart Page', 'shopcred'); ?> <span class="notice-small-text"><a href="https://wpshopcred.com/shopcred-pro/" target="_blank"><?php echo esc_html__( 'Available in PRO', 'shopcred'); ?></a></span></div>
        </div>
        <div class="cx-vui-component cx-vui-component--equalwidth cx-vui-switcher--deactive spc-pro-modal-trigger">
            <div class="cx-vui-component__meta">
                <label class="cx-vui-component__label" for="cx_enable_spc_cart_page_template"><?php echo esc_html__( 'Enable Custom Cart Page', 'shopcred'); ?></label> <!---->
            </div>
            <div class="cx-vui-component__control">
                <div tabindex="0" class="cx-vui-switcher cx-vui-switcher--off" id="cx_enable_spc_cart_page_template">
                    <input type="hidden" checked="checked" name="enable_spc_cart_page_template" class="cx-vui-switcher__input" value="false"> 
                    <div class="cx-vui-switcher__panel"></div>
                    <div class="cx-vui-switcher__trigger"></div>
                </div>
            </div>
        </div>
        <!----> 
        <div class="avaliable-controls__header">
            <div class="cx-vui-subtitle"><?php echo esc_html__( 'Custom Checkout Page', 'shopcred'); ?> <span class="notice-small-text"><a href="https://wpshopcred.com/shopcred-pro/" target="_blank"><?php echo esc_html__( 'Available in PRO', 'shopcred'); ?></a></span></div>
        </div>
        <div class="cx-vui-component cx-vui-component--equalwidth cx-vui-switcher--deactive spc-pro-modal-trigger">
            <div class="cx-vui-component__meta">
                <label class="cx-vui-component__label" for="cx_enable_spc_checkout_page_template"><?php echo esc_html__( 'Enable Custom Checkout Page', 'shopcred'); ?></label> <!---->
            </div>
            <div class="cx-vui-component__control">
                <div tabindex="0" class="cx-vui-switcher cx-vui-switcher--off" id="cx_enable_spc_checkout_page_template">
                    <input type="hidden" checked="checked" name="enable_spc_checkout_page_template" class="cx-vui-switcher__input" value="false"> 
                    <div class="cx-vui-switcher__panel"></div>
                    <div class="cx-vui-switcher__trigger"></div>
                </div>
            </div>
        </div>
        <!----> 
        <div class="avaliable-controls__header">
            <div class="cx-vui-subtitle"><?php echo esc_html__( 'Custom My Account Page', 'shopcred'); ?> <span class="notice-small-text"><a href="https://wpshopcred.com/shopcred-pro/" target="_blank"><?php echo esc_html__( 'Available in PRO', 'shopcred'); ?></a></span></div>
        </div>
        <div class="cx-vui-component cx-vui-component--equalwidth cx-vui-switcher--deactive spc-pro-modal-trigger">
            <div class="cx-vui-component__meta">
                <label class="cx-vui-component__label" for="cx_enable_spc_myaccount_page_template"><?php echo esc_html__( 'Enable Custom My Account Page', 'shopcred'); ?></label> <!---->
            </div>
            <div class="cx-vui-component__control">
                <div tabindex="0" class="cx-vui-switcher cx-vui-switcher--off" id="cx_enable_spc_myaccount_page_template">
                    <input type="hidden" checked="checked" name="enable_spc_myaccount_page_template" class="cx-vui-switcher__input" value="false"> 
                    <div class="cx-vui-switcher__panel"></div>
                    <div class="cx-vui-switcher__trigger"></div>
                </div>
            </div>
        </div>
        <!----> 
        <div class="avaliable-controls__header">
            <div class="cx-vui-subtitle"><?php echo esc_html__( 'Custom Thankyou Page', 'shopcred'); ?> <span class="notice-small-text"><a href="https://wpshopcred.com/shopcred-pro/" target="_blank"><?php echo esc_html__( 'Available in PRO', 'shopcred'); ?></a></span></div>
        </div>
        <div class="cx-vui-component cx-vui-component--equalwidth cx-vui-switcher--deactive spc-pro-modal-trigger">
            <div class="cx-vui-component__meta">
                <label class="cx-vui-component__label" for="cx_enable_spc_thankyou_page_template"><?php echo esc_html__( 'Enable Thank You Page', 'shopcred'); ?></label> <!---->
            </div>
            <div class="cx-vui-component__control">
                <div tabindex="0" class="cx-vui-switcher cx-vui-switcher--off" id="cx_enable_spc_thankyou_page_template">
                    <input type="hidden" checked="checked" name="enable_spc_thankyou_page_template" class="cx-vui-switcher__input" value="false"> 
                    <div class="cx-vui-switcher__panel"></div>
                    <div class="cx-vui-switcher__trigger"></div>
                </div>
            </div>
        </div>
        <!---->
    </div>				
</div>