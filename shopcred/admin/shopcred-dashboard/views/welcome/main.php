<div
	class="shopcred-dashboard-welcome-page"
	:class="{ 'proccesing-state': proccesingState }"
>
	<div class="shopcred-dashboard-welcome-page__sidebar">
		<div class="shopcred-dashboard-page__panel shopcred-dashboard-welcome-page__updates">
			<div class="shopcred-dashboard-page__panel-header">
    
            <shopcred-admin-category 
            :config="innerComponentConfigCategory"
            ></shopcred-admin-category>
            
			</div>
			<div class="shopcred-dashboard-page__panel-content">
				<div class="shopcred-dashboard-welcome-page__short-info"></div>
			</div>
			<div class="shopcred-dashboard-page__panel-controls">
				
			</div>
		</div>
	
		<shopcred-dashboard-inner-component
			:config="innerComponentConfig"
		></shopcred-dashboard-inner-component>
	</div>
	<div class="shopcred-dashboard-welcome-page__content">

        <div class="subpage-content-wrapper-dashboard">
            <div class="shopcred-dashboard-page__panel shopcred-dashboard-welcome-page__more-plugins subpage-content">
                <div id="general" class="spc-dashboard-tab active">
                    <div class="spc-row spc-admin-general-wrapper">
                        <!--preview image end-->
                        
                        <div class="spc-admin-general-inner">
                            <div class="spc-admin-block-wrapper">

                                <div class="spc-admin-block spc-admin-block-banner">
                                    <div class="spc-admin-block-header-icon">
                                        <svg width="20" height="20" viewBox="0 0 20 20" fill="none" xmlns="http://www.w3.org/2000/svg">
                                            <path d="M16 1C15.2044 1 14.4413 1.31607 13.8787 1.87868C13.3161 2.44129 13 3.20435 13 4V16C13 16.7956 13.3161 17.5587 13.8787 18.1213C14.4413 18.6839 15.2044 19 16 19C16.7956 19 17.5587 18.6839 18.1213 18.1213C18.6839 17.5587 19 16.7956 19 16C19 15.2044 18.6839 14.4413 18.1213 13.8787C17.5587 13.3161 16.7956 13 16 13H4C3.20435 13 2.44129 13.3161 1.87868 13.8787C1.31607 14.4413 1 15.2044 1 16C1 16.7956 1.31607 17.5587 1.87868 18.1213C2.44129 18.6839 3.20435 19 4 19C4.79565 19 5.55871 18.6839 6.12132 18.1213C6.68393 17.5587 7 16.7956 7 16V4C7 3.20435 6.68393 2.44129 6.12132 1.87868C5.55871 1.31607 4.79565 1 4 1C3.20435 1 2.44129 1.31607 1.87868 1.87868C1.31607 2.44129 1 3.20435 1 4C1 4.79565 1.31607 5.55871 1.87868 6.12132C2.44129 6.68393 3.20435 7 4 7H16C16.7956 7 17.5587 6.68393 18.1213 6.12132C18.6839 5.55871 19 4.79565 19 4C19 3.20435 18.6839 2.44129 18.1213 1.87868C17.5587 1.31607 16.7956 1 16 1Z" stroke="black" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"/>
                                        </svg>
                                    </div>
                                    <div class="spc-admin-block-header">
                                        <h4 class="spc-admin-title"><?php _e( 'Contribute to ShopCred', 'shopcred' ); ?></h4>
                                        <p><?php _e( 'Please feel free to report any issues in our Github repo about ShopCred. Send pull requests at', 'shopcred' ); ?> <a href="https://github.com/mmaumio/shopcred" target="_blank"><?php _e( 'Github.', 'shopcred' ); ?></a></p>
                                        <a href="https://github.com/mmaumio/shopcred/issues/new" class="spc-admin-block-contribution-button" target="_blank"><?php _e( 'Report Bug', 'shopcred' ); ?></a>
                                    </div>
                                </div>
                                <!--preview image end-->
                                <div class="spc-admin-block spc-admin-block-docs">

                                    <div class="spc-admin-block-header-icon">
                                        <svg width="24" height="24" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">
                                            <path d="M22 3H16C14.9391 3 13.9217 3.42143 13.1716 4.17157C12.4214 4.92172 12 5.93913 12 7V21C12 20.2044 12.3161 19.4413 12.8787 18.8787C13.4413 18.3161 14.2044 18 15 18H22V3Z" stroke="black" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"/>
                                            <path d="M2 3H8C9.06087 3 10.0783 3.42143 10.8284 4.17157C11.5786 4.92172 12 5.93913 12 7V21C12 20.2044 11.6839 19.4413 11.1213 18.8787C10.5587 18.3161 9.79565 18 9 18H2V3Z" stroke="black" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"/>
                                        </svg>
                                    </div>
                                    <div class="spc-admin-block-header">
                                        <h4 class="spc-admin-title"><?php _e( 'Documentation', 'shopcred' ); ?></h4>
                                        <p><?php _e( 'Get yourself used to with the easy to read documentation we have till now. We\'re always working to make it easier for you.', 'shopcred' ); ?></p>
                                        <a href="https://wpshopcred.com/docs" class="spc-admin-block-docs-button" target="_blank"><?php _e( 'Documentation', 'shopcred' ); ?></a>
                                    </div>
                                </div>
                                <div class="spc-admin-block spc-admin-block-contribution">
                                    <div class="spc-admin-block-header-icon">
                                        <svg width="24" height="24" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">
                                            <path d="M16 21V19C16 17.9391 15.5786 16.9217 14.8284 16.1716C14.0783 15.4214 13.0609 15 12 15H5C3.93913 15 2.92172 15.4214 2.17157 16.1716C1.42143 16.9217 1 17.9391 1 19V21" stroke="black" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"/>
                                            <path d="M17 11L19 13L23 9" stroke="black" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"/>
                                            <path d="M8.5 11C10.7091 11 12.5 9.20914 12.5 7C12.5 4.79086 10.7091 3 8.5 3C6.29086 3 4.5 4.79086 4.5 7C4.5 9.20914 6.29086 11 8.5 11Z" stroke="black" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"/>
                                        </svg>
                                    </div>
                                    <div class="spc-admin-block-header">
                                        <h4 class="spc-admin-title"><?php _e( 'Customer Support', 'shopcred' ); ?></h4>
                                        <p><?php _e( 'We are always here to listen your beautiful voice. A dedicated support team is on your way to the rescue, the moment you need us.', 'shopcred' ); ?></p>
                                        <a href="https://wordpress.org/support/plugin/shopcred/" class="spc-admin-block-support-button" target="_blank"><?php _e( 'Get Support', 'shopcred' ); ?></a>
                                    </div>
                                </div>
                                <div class="spc-admin-block spc-admin-block-support">
                                    <div class="spc-admin-block-header-icon">
                                        <svg width="24" height="22" viewBox="0 0 24 22" fill="none" xmlns="http://www.w3.org/2000/svg">
                                            <path d="M20.84 3.61012C20.3292 3.09912 19.7228 2.69376 19.0554 2.4172C18.3879 2.14064 17.6725 1.99829 16.95 1.99829C16.2275 1.99829 15.5121 2.14064 14.8446 2.4172C14.1772 2.69376 13.5708 3.09912 13.06 3.61012L12 4.67012L10.94 3.61012C9.9083 2.57842 8.50903 1.99883 7.05 1.99883C5.59096 1.99883 4.19169 2.57842 3.16 3.61012C2.1283 4.64181 1.54871 6.04108 1.54871 7.50012C1.54871 8.95915 2.1283 10.3584 3.16 11.3901L4.22 12.4501L12 20.2301L19.78 12.4501L20.84 11.3901C21.351 10.8794 21.7563 10.2729 22.0329 9.60547C22.3095 8.93801 22.4518 8.2226 22.4518 7.50012C22.4518 6.77763 22.3095 6.06222 22.0329 5.39476C21.7563 4.7273 21.351 4.12087 20.84 3.61012V3.61012Z" stroke="black" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"/>
                                        </svg>
                                    </div>
                                    <div class="spc-admin-block-header">
                                        <h4 class="spc-admin-title"><?php _e( 'Show your Love', 'shopcred' ); ?></h4>
                                        <p><?php _e( 'We are continiously working to make "ShopCred" better, everyday. Your kind feedback will surely encourage us to move forward with the development.', 'shopcred' ); ?></p>
                                        <a href="https://wordpress.org/plugins/shopcred/#reviews" class="spc-admin-block-header-button" target="_blank"><?php _e( 'Leave a Review', 'shopcred' ); ?></a>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <!-- <div class="shopcred-pro-block-wrapper" style="display: none;">Hello There Pro Content</div>
                        <div class="shopcred-filter-block-wrapper" style="display: none;">Hello There</div> -->
                    </div>
                    <!--spc-row end-->
                </div>
            </div>


            <div class="spc-pro-modal-content-wrapper" style="display: none;">
                <div class="spc-pro-modal-content">
                    <a href="javascript:void(0);" class="spc-pro-modal-close-trigger"><span class="dashicons dashicons-dismiss"></span></a>
                    <h3><?php echo esc_html__( 'Upgrade to Any Paid Plans to Unlock the Features', 'shopcred'); ?></h3>
                    <a class="shopcred-dashboard-plugin-item-link spc-pro-modal-close-trigger-from-buy-now" href="https://wpshopcred.com/shopcred-pro/" target="_blank"><?php echo esc_html__('Check it Out', 'shopcred'); ?></a>
                </div>
            </div>
            <div class="shopcred-pro-block-wrapper" style="display: none;">
                <div class="shopcred-available-blocks-page shopcred-available-blocks-page__available-addons">
                    <div class="available-widgets">
                        <div class="available-widgets__option-info">
                            <div class="available-widgets__option-info-name"><?php echo esc_html__( 'Single Product Blocks', 'shopcred'); ?> <span class="notice-small-text"><a href="https://wpshopcred.com/shopcred-pro/" target="_blank"><?php echo esc_html__( 'Available in PRO', 'shopcred'); ?></a></span></div>
                            <div class="available-widgets__option-info-desc"><?php echo esc_html__( 'These Blocks will be available when editing the single product template', 'shopcred'); ?></div>
                        </div>
                        <div class="available-widgets__controls spc-tmpl-settings">
                            <div class="available-widgets__control">
                                <div class="cx-vui-component cx-vui-component--equalwidth cx-vui-switcher--deactive spc-pro-modal-trigger">
                                <div class="cx-vui-component__meta">
                                    <label class="cx-vui-component__label" for="cx_single-product-available-widget-spc/woo-product"><?php echo esc_html__( 'Product Image', 'shopcred'); ?></label>
                                </div>
                                <div class="cx-vui-component__control">
                                    <div tabindex="0" class="cx-vui-switcher cx-vui-switcher--off" id="cx_single-product-available-widget-spc/woo-product">
                                        <input type="hidden" checked="" name="single-product-available-widget-spc/woo-product" class="cx-vui-switcher__input" value="true"> 
                                        <div class="cx-vui-switcher__panel"></div>
                                        <div class="cx-vui-switcher__trigger"></div>
                                    </div>
                                </div>
                                </div>
                            </div>
                            <div class="available-widgets__control">
                                <div class="cx-vui-component cx-vui-component--equalwidth cx-vui-switcher--deactive spc-pro-modal-trigger">
                                <div class="cx-vui-component__meta">
                                    <label class="cx-vui-component__label" for="cx_single-product-available-widget-spc/woo-product"><?php echo esc_html__( 'Product Title', 'shopcred'); ?></label>
                                </div>
                                <div class="cx-vui-component__control">
                                    <div tabindex="0" class="cx-vui-switcher cx-vui-switcher--off" id="cx_single-product-available-widget-spc/woo-product">
                                        <input type="hidden" checked="" name="single-product-available-widget-spc/woo-product" class="cx-vui-switcher__input" value="true"> 
                                        <div class="cx-vui-switcher__panel"></div>
                                        <div class="cx-vui-switcher__trigger"></div>
                                    </div>
                                </div>
                                </div>
                            </div>
                            <div class="available-widgets__control">
                                <div class="cx-vui-component cx-vui-component--equalwidth cx-vui-switcher--deactive spc-pro-modal-trigger">
                                <div class="cx-vui-component__meta">
                                    <label class="cx-vui-component__label" for="cx_single-product-available-widget-spc/woo-product"><?php echo esc_html__( 'Product Breadcrumbs', 'shopcred'); ?></label>
                                </div>
                                <div class="cx-vui-component__control">
                                    <div tabindex="0" class="cx-vui-switcher cx-vui-switcher--off" id="cx_single-product-available-widget-spc/woo-product">
                                        <input type="hidden" checked="" name="single-product-available-widget-spc/woo-product" class="cx-vui-switcher__input" value="true"> 
                                        <div class="cx-vui-switcher__panel"></div>
                                        <div class="cx-vui-switcher__trigger"></div>
                                    </div>
                                </div>
                                </div>
                            </div>
                        </div>
                        <div class="available-widgets__controls spc-tmpl-settings">
                            <div class="available-widgets__control">
                                <div class="cx-vui-component cx-vui-component--equalwidth cx-vui-switcher--deactive spc-pro-modal-trigger">
                                <div class="cx-vui-component__meta">
                                    <label class="cx-vui-component__label" for="cx_single-product-available-widget-spc/woo-product"><?php echo esc_html__( 'Product Price', 'shopcred'); ?></label>
                                </div>
                                <div class="cx-vui-component__control">
                                    <div tabindex="0" class="cx-vui-switcher cx-vui-switcher--off" id="cx_single-product-available-widget-spc/woo-product">
                                        <input type="hidden" checked="" name="single-product-available-widget-spc/woo-product" class="cx-vui-switcher__input" value="true"> 
                                        <div class="cx-vui-switcher__panel"></div>
                                        <div class="cx-vui-switcher__trigger"></div>
                                    </div>
                                </div>
                                </div>
                            </div>
                            <div class="available-widgets__control">
                                <div class="cx-vui-component cx-vui-component--equalwidth cx-vui-switcher--deactive spc-pro-modal-trigger">
                                <div class="cx-vui-component__meta">
                                    <label class="cx-vui-component__label" for="cx_single-product-available-widget-spc/woo-product"><?php echo esc_html__( 'Product Rating', 'shopcred'); ?></label>
                                </div>
                                <div class="cx-vui-component__control">
                                    <div tabindex="0" class="cx-vui-switcher cx-vui-switcher--off" id="cx_single-product-available-widget-spc/woo-product">
                                        <input type="hidden" checked="" name="single-product-available-widget-spc/woo-product" class="cx-vui-switcher__input" value="true"> 
                                        <div class="cx-vui-switcher__panel"></div>
                                        <div class="cx-vui-switcher__trigger"></div>
                                    </div>
                                </div>
                                </div>
                            </div>
                            <div class="available-widgets__control">
                                <div class="cx-vui-component cx-vui-component--equalwidth cx-vui-switcher--deactive spc-pro-modal-trigger">
                                <div class="cx-vui-component__meta">
                                    <label class="cx-vui-component__label" for="cx_single-product-available-widget-spc/woo-product"><?php echo esc_html__( 'Product Add To Cart', 'shopcred'); ?></label>
                                </div>
                                <div class="cx-vui-component__control">
                                    <div tabindex="0" class="cx-vui-switcher cx-vui-switcher--off" id="cx_single-product-available-widget-spc/woo-product">
                                        <input type="hidden" checked="" name="single-product-available-widget-spc/woo-product" class="cx-vui-switcher__input" value="true"> 
                                        <div class="cx-vui-switcher__panel"></div>
                                        <div class="cx-vui-switcher__trigger"></div>
                                    </div>
                                </div>
                                </div>
                            </div>
                        </div>
                        <div class="available-widgets__controls spc-tmpl-settings">
                            <div class="available-widgets__control">
                                <div class="cx-vui-component cx-vui-component--equalwidth cx-vui-switcher--deactive spc-pro-modal-trigger">
                                <div class="cx-vui-component__meta">
                                    <label class="cx-vui-component__label" for="cx_single-product-available-widget-spc/woo-product"><?php echo esc_html__( 'Product Meta', 'shopcred'); ?></label>
                                </div>
                                <div class="cx-vui-component__control">
                                    <div tabindex="0" class="cx-vui-switcher cx-vui-switcher--off" id="cx_single-product-available-widget-spc/woo-product">
                                        <input type="hidden" checked="" name="single-product-available-widget-spc/woo-product" class="cx-vui-switcher__input" value="true"> 
                                        <div class="cx-vui-switcher__panel"></div>
                                        <div class="cx-vui-switcher__trigger"></div>
                                    </div>
                                </div>
                                </div>
                            </div>
                            <div class="available-widgets__control">
                                <div class="cx-vui-component cx-vui-component--equalwidth cx-vui-switcher--deactive spc-pro-modal-trigger">
                                <div class="cx-vui-component__meta">
                                    <label class="cx-vui-component__label" for="cx_single-product-available-widget-spc/woo-product"><?php echo esc_html__( 'Product Short Description', 'shopcred'); ?></label>
                                </div>
                                <div class="cx-vui-component__control">
                                    <div tabindex="0" class="cx-vui-switcher cx-vui-switcher--off" id="cx_single-product-available-widget-spc/woo-product">
                                        <input type="hidden" checked="" name="single-product-available-widget-spc/woo-product" class="cx-vui-switcher__input" value="true"> 
                                        <div class="cx-vui-switcher__panel"></div>
                                        <div class="cx-vui-switcher__trigger"></div>
                                    </div>
                                </div>
                                </div>
                            </div>
                            <div class="available-widgets__control">
                                <div class="cx-vui-component cx-vui-component--equalwidth cx-vui-switcher--deactive spc-pro-modal-trigger">
                                <div class="cx-vui-component__meta">
                                    <label class="cx-vui-component__label" for="cx_single-product-available-widget-spc/woo-product"><?php echo esc_html__( 'Product Tabs', 'shopcred'); ?></label>
                                </div>
                                <div class="cx-vui-component__control">
                                    <div tabindex="0" class="cx-vui-switcher cx-vui-switcher--off" id="cx_single-product-available-widget-spc/woo-product">
                                        <input type="hidden" checked="" name="single-product-available-widget-spc/woo-product" class="cx-vui-switcher__input" value="true"> 
                                        <div class="cx-vui-switcher__panel"></div>
                                        <div class="cx-vui-switcher__trigger"></div>
                                    </div>
                                </div>
                                </div>
                            </div>
                        </div>
                        <div class="available-widgets__controls spc-tmpl-settings">
                            <div class="available-widgets__control">
                                <div class="cx-vui-component cx-vui-component--equalwidth cx-vui-switcher--deactive spc-pro-modal-trigger">
                                <div class="cx-vui-component__meta">
                                    <label class="cx-vui-component__label" for="cx_single-product-available-widget-spc/woo-product"><?php echo esc_html__( 'Product Stock', 'shopcred'); ?></label>
                                </div>
                                <div class="cx-vui-component__control">
                                    <div tabindex="0" class="cx-vui-switcher cx-vui-switcher--off" id="cx_single-product-available-widget-spc/woo-product">
                                        <input type="hidden" checked="" name="single-product-available-widget-spc/woo-product" class="cx-vui-switcher__input" value="true"> 
                                        <div class="cx-vui-switcher__panel"></div>
                                        <div class="cx-vui-switcher__trigger"></div>
                                    </div>
                                </div>
                                </div>
                            </div>
                            <div class="available-widgets__control">
                                <div class="cx-vui-component cx-vui-component--equalwidth cx-vui-switcher--deactive spc-pro-modal-trigger">
                                <div class="cx-vui-component__meta">
                                    <label class="cx-vui-component__label" for="cx_single-product-available-widget-spc/woo-product"><?php echo esc_html__( 'Product Related', 'shopcred'); ?></label>
                                </div>
                                <div class="cx-vui-component__control">
                                    <div tabindex="0" class="cx-vui-switcher cx-vui-switcher--off" id="cx_single-product-available-widget-spc/woo-product">
                                        <input type="hidden" checked="" name="single-product-available-widget-spc/woo-product" class="cx-vui-switcher__input" value="true"> 
                                        <div class="cx-vui-switcher__panel"></div>
                                        <div class="cx-vui-switcher__trigger"></div>
                                    </div>
                                </div>
                                </div>
                            </div>
                            <div class="available-widgets__control">
                                <div class="cx-vui-component cx-vui-component--equalwidth cx-vui-switcher--deactive spc-pro-modal-trigger">
                                <div class="cx-vui-component__meta">
                                    <label class="cx-vui-component__label" for="cx_single-product-available-widget-spc/woo-product"><?php echo esc_html__( 'Product Navigation', 'shopcred'); ?></label>
                                </div>
                                <div class="cx-vui-component__control">
                                    <div tabindex="0" class="cx-vui-switcher cx-vui-switcher--off" id="cx_single-product-available-widget-spc/woo-product">
                                        <input type="hidden" checked="" name="single-product-available-widget-spc/woo-product" class="cx-vui-switcher__input" value="true"> 
                                        <div class="cx-vui-switcher__panel"></div>
                                        <div class="cx-vui-switcher__trigger"></div>
                                    </div>
                                </div>
                                </div>
                            </div>
                        </div>
                        <div class="available-widgets__option-info">
                            <div class="available-widgets__option-info-name"><?php echo esc_html__( 'Cart Blocks', 'shopcred'); ?> <span class="notice-small-text"><a href="https://wpshopcred.com/shopcred-pro/" target="_blank"><?php echo esc_html__( 'Available in PRO', 'shopcred'); ?></a></span></div>
                            <div class="available-widgets__option-info-desc"><?php echo esc_html__( 'These Blocks will be available on Cart page', 'shopcred'); ?></div>
                        </div>
                        <div class="available-widgets__controls spc-tmpl-settings">
                            <div class="available-widgets__control">
                                <div class="cx-vui-component cx-vui-component--equalwidth cx-vui-switcher--deactive spc-pro-modal-trigger">
                                <div class="cx-vui-component__meta">
                                    <label class="cx-vui-component__label" for="cx_single-product-available-widget-spc/woo-product"><?php echo esc_html__( 'Cart Table', 'shopcred'); ?></label>
                                </div>
                                <div class="cx-vui-component__control">
                                    <div tabindex="0" class="cx-vui-switcher cx-vui-switcher--off" id="cx_single-product-available-widget-spc/woo-product">
                                        <input type="hidden" checked="" name="single-product-available-widget-spc/woo-product" class="cx-vui-switcher__input" value="true"> 
                                        <div class="cx-vui-switcher__panel"></div>
                                        <div class="cx-vui-switcher__trigger"></div>
                                    </div>
                                </div>
                                </div>
                            </div>
                            <div class="available-widgets__control">
                                <div class="cx-vui-component cx-vui-component--equalwidth cx-vui-switcher--deactive spc-pro-modal-trigger">
                                <div class="cx-vui-component__meta">
                                    <label class="cx-vui-component__label" for="cx_single-product-available-widget-spc/woo-product"><?php echo esc_html__( 'Cart Total', 'shopcred'); ?></label>
                                </div>
                                <div class="cx-vui-component__control">
                                    <div tabindex="0" class="cx-vui-switcher cx-vui-switcher--off" id="cx_single-product-available-widget-spc/woo-product">
                                        <input type="hidden" checked="" name="single-product-available-widget-spc/woo-product" class="cx-vui-switcher__input" value="true"> 
                                        <div class="cx-vui-switcher__panel"></div>
                                        <div class="cx-vui-switcher__trigger"></div>
                                    </div>
                                </div>
                                </div>
                            </div>
                        </div>
                        <div class="available-widgets__option-info">
                            <div class="available-widgets__option-info-name"><?php echo esc_html__( 'Checkout Blocks', 'shopcred'); ?> <span class="notice-small-text"><a href="https://wpshopcred.com/shopcred-pro/" target="_blank"><?php echo esc_html__( 'Available in PRO', 'shopcred'); ?></a></span></div>
                            <div class="available-widgets__option-info-desc"><?php echo esc_html__( 'These Blocks will be available on Checkout page', 'shopcred'); ?></div>
                        </div>
                        <div class="available-widgets__controls spc-tmpl-settings">
                            <div class="available-widgets__control">
                                <div class="cx-vui-component cx-vui-component--equalwidth cx-vui-switcher--deactive spc-pro-modal-trigger">
                                <div class="cx-vui-component__meta">
                                    <label class="cx-vui-component__label" for="cx_single-product-available-widget-spc/woo-product"><?php echo esc_html__( 'Checkout Additional Form', 'shopcred'); ?></label>
                                </div>
                                <div class="cx-vui-component__control">
                                    <div tabindex="0" class="cx-vui-switcher cx-vui-switcher--off" id="cx_single-product-available-widget-spc/woo-product">
                                        <input type="hidden" checked="" name="single-product-available-widget-spc/woo-product" class="cx-vui-switcher__input" value="true"> 
                                        <div class="cx-vui-switcher__panel"></div>
                                        <div class="cx-vui-switcher__trigger"></div>
                                    </div>
                                </div>
                                </div>
                            </div>
                            <div class="available-widgets__control">
                                <div class="cx-vui-component cx-vui-component--equalwidth cx-vui-switcher--deactive spc-pro-modal-trigger">
                                <div class="cx-vui-component__meta">
                                    <label class="cx-vui-component__label" for="cx_single-product-available-widget-spc/woo-product"><?php echo esc_html__( 'Checkout Billing Form', 'shopcred'); ?></label>
                                </div>
                                <div class="cx-vui-component__control">
                                    <div tabindex="0" class="cx-vui-switcher cx-vui-switcher--off" id="cx_single-product-available-widget-spc/woo-product">
                                        <input type="hidden" checked="" name="single-product-available-widget-spc/woo-product" class="cx-vui-switcher__input" value="true"> 
                                        <div class="cx-vui-switcher__panel"></div>
                                        <div class="cx-vui-switcher__trigger"></div>
                                    </div>
                                </div>
                                </div>
                            </div>
                            <div class="available-widgets__control">
                                <div class="cx-vui-component cx-vui-component--equalwidth cx-vui-switcher--deactive spc-pro-modal-trigger">
                                <div class="cx-vui-component__meta">
                                    <label class="cx-vui-component__label" for="cx_single-product-available-widget-spc/woo-product"><?php echo esc_html__( 'Checkout Coupon', 'shopcred'); ?></label>
                                </div>
                                <div class="cx-vui-component__control">
                                    <div tabindex="0" class="cx-vui-switcher cx-vui-switcher--off" id="cx_single-product-available-widget-spc/woo-product">
                                        <input type="hidden" checked="" name="single-product-available-widget-spc/woo-product" class="cx-vui-switcher__input" value="true"> 
                                        <div class="cx-vui-switcher__panel"></div>
                                        <div class="cx-vui-switcher__trigger"></div>
                                    </div>
                                </div>
                                </div>
                            </div>
                        </div>
                        <div class="available-widgets__controls spc-tmpl-settings">
                            <div class="available-widgets__control">
                                <div class="cx-vui-component cx-vui-component--equalwidth cx-vui-switcher--deactive spc-pro-modal-trigger">
                                <div class="cx-vui-component__meta">
                                    <label class="cx-vui-component__label" for="cx_single-product-available-widget-spc/woo-product"><?php echo esc_html__( 'Checkout Login Form', 'shopcred'); ?></label>
                                </div>
                                <div class="cx-vui-component__control">
                                    <div tabindex="0" class="cx-vui-switcher cx-vui-switcher--off" id="cx_single-product-available-widget-spc/woo-product">
                                        <input type="hidden" checked="" name="single-product-available-widget-spc/woo-product" class="cx-vui-switcher__input" value="true"> 
                                        <div class="cx-vui-switcher__panel"></div>
                                        <div class="cx-vui-switcher__trigger"></div>
                                    </div>
                                </div>
                                </div>
                            </div>
                            <div class="available-widgets__control">
                                <div class="cx-vui-component cx-vui-component--equalwidth cx-vui-switcher--deactive spc-pro-modal-trigger">
                                <div class="cx-vui-component__meta">
                                    <label class="cx-vui-component__label" for="cx_single-product-available-widget-spc/woo-product"><?php echo esc_html__( 'Checkout Order Review', 'shopcred'); ?></label>
                                </div>
                                <div class="cx-vui-component__control">
                                    <div tabindex="0" class="cx-vui-switcher cx-vui-switcher--off" id="cx_single-product-available-widget-spc/woo-product">
                                        <input type="hidden" checked="" name="single-product-available-widget-spc/woo-product" class="cx-vui-switcher__input" value="true"> 
                                        <div class="cx-vui-switcher__panel"></div>
                                        <div class="cx-vui-switcher__trigger"></div>
                                    </div>
                                </div>
                                </div>
                            </div>
                            <div class="available-widgets__control">
                                <div class="cx-vui-component cx-vui-component--equalwidth cx-vui-switcher--deactive spc-pro-modal-trigger">
                                <div class="cx-vui-component__meta">
                                    <label class="cx-vui-component__label" for="cx_single-product-available-widget-spc/woo-product"><?php echo esc_html__( 'Checkout Payment', 'shopcred'); ?></label>
                                </div>
                                <div class="cx-vui-component__control">
                                    <div tabindex="0" class="cx-vui-switcher cx-vui-switcher--off" id="cx_single-product-available-widget-spc/woo-product">
                                        <input type="hidden" checked="" name="single-product-available-widget-spc/woo-product" class="cx-vui-switcher__input" value="true"> 
                                        <div class="cx-vui-switcher__panel"></div>
                                        <div class="cx-vui-switcher__trigger"></div>
                                    </div>
                                </div>
                                </div>
                            </div>
                        </div>
                        <div class="available-widgets__controls spc-tmpl-settings">
                            <div class="available-widgets__control">
                                <div class="cx-vui-component cx-vui-component--equalwidth cx-vui-switcher--deactive spc-pro-modal-trigger">
                                <div class="cx-vui-component__meta">
                                    <label class="cx-vui-component__label" for="cx_single-product-available-widget-spc/woo-product"><?php echo esc_html__( 'Checkout Shipping Form', 'shopcred'); ?></label>
                                </div>
                                <div class="cx-vui-component__control">
                                    <div tabindex="0" class="cx-vui-switcher cx-vui-switcher--off" id="cx_single-product-available-widget-spc/woo-product">
                                        <input type="hidden" checked="" name="single-product-available-widget-spc/woo-product" class="cx-vui-switcher__input" value="true"> 
                                        <div class="cx-vui-switcher__panel"></div>
                                        <div class="cx-vui-switcher__trigger"></div>
                                    </div>
                                </div>
                                </div>
                            </div>
                        </div>
                        <div class="available-widgets__option-info">
                            <div class="available-widgets__option-info-name"><?php echo esc_html__( 'My Account Blocks', 'shopcred'); ?> <span class="notice-small-text"><a href="https://wpshopcred.com/shopcred-pro/" target="_blank"><?php echo esc_html__( 'Available in PRO', 'shopcred'); ?></a></span></div>
                            <div class="available-widgets__option-info-desc"><?php echo esc_html__( 'These Blocks will be available on My Account page', 'shopcred'); ?></div>
                        </div>
                        <div class="available-widgets__controls spc-tmpl-settings">
                            <div class="available-widgets__control">
                                <div class="cx-vui-component cx-vui-component--equalwidth cx-vui-switcher--deactive spc-pro-modal-trigger">
                                <div class="cx-vui-component__meta">
                                    <label class="cx-vui-component__label" for="cx_single-product-available-widget-spc/woo-product"><?php echo esc_html__( 'My Account', 'shopcred'); ?></label>
                                </div>
                                <div class="cx-vui-component__control">
                                    <div tabindex="0" class="cx-vui-switcher cx-vui-switcher--off" id="cx_single-product-available-widget-spc/woo-product">
                                        <input type="hidden" checked="" name="single-product-available-widget-spc/woo-product" class="cx-vui-switcher__input" value="true"> 
                                        <div class="cx-vui-switcher__panel"></div>
                                        <div class="cx-vui-switcher__trigger"></div>
                                    </div>
                                </div>
                                </div>
                            </div>
                            <div class="available-widgets__control">
                                <div class="cx-vui-component cx-vui-component--equalwidth cx-vui-switcher--deactive spc-pro-modal-trigger">
                                <div class="cx-vui-component__meta">
                                    <label class="cx-vui-component__label" for="cx_single-product-available-widget-spc/woo-product"><?php echo esc_html__( 'My Account Login Form', 'shopcred'); ?></label>
                                </div>
                                <div class="cx-vui-component__control">
                                    <div tabindex="0" class="cx-vui-switcher cx-vui-switcher--off" id="cx_single-product-available-widget-spc/woo-product">
                                        <input type="hidden" checked="" name="single-product-available-widget-spc/woo-product" class="cx-vui-switcher__input" value="true"> 
                                        <div class="cx-vui-switcher__panel"></div>
                                        <div class="cx-vui-switcher__trigger"></div>
                                    </div>
                                </div>
                                </div>
                            </div>
                        </div>
                        <div class="available-widgets__option-info">
                            <div class="available-widgets__option-info-name"><?php echo esc_html__( 'Thank You Blocks', 'shopcred'); ?> <span class="notice-small-text"><a href="https://wpshopcred.com/shopcred-pro/" target="_blank"><?php echo esc_html__( 'Available in PRO', 'shopcred'); ?></a></span></div>
                            <div class="available-widgets__option-info-desc"><?php echo esc_html__( 'These Blocks will be available on Thank You page', 'shopcred'); ?></div>
                        </div>
                        <div class="available-widgets__controls spc-tmpl-settings">
                            <div class="available-widgets__control">
                                <div class="cx-vui-component cx-vui-component--equalwidth cx-vui-switcher--deactive spc-pro-modal-trigger">
                                <div class="cx-vui-component__meta">
                                    <label class="cx-vui-component__label" for="cx_single-product-available-widget-spc/woo-product"><?php echo esc_html__( 'Thankyou Address Details', 'shopcred'); ?></label>
                                </div>
                                <div class="cx-vui-component__control">
                                    <div tabindex="0" class="cx-vui-switcher cx-vui-switcher--off" id="cx_single-product-available-widget-spc/woo-product">
                                        <input type="hidden" checked="" name="single-product-available-widget-spc/woo-product" class="cx-vui-switcher__input" value="true"> 
                                        <div class="cx-vui-switcher__panel"></div>
                                        <div class="cx-vui-switcher__trigger"></div>
                                    </div>
                                </div>
                                </div>
                            </div>
                            <div class="available-widgets__control">
                                <div class="cx-vui-component cx-vui-component--equalwidth cx-vui-switcher--deactive spc-pro-modal-trigger">
                                <div class="cx-vui-component__meta">
                                    <label class="cx-vui-component__label" for="cx_single-product-available-widget-spc/woo-product"><?php echo esc_html__( 'Thankyou Order', 'shopcred'); ?></label>
                                </div>
                                <div class="cx-vui-component__control">
                                    <div tabindex="0" class="cx-vui-switcher cx-vui-switcher--off" id="cx_single-product-available-widget-spc/woo-product">
                                        <input type="hidden" checked="" name="single-product-available-widget-spc/woo-product" class="cx-vui-switcher__input" value="true"> 
                                        <div class="cx-vui-switcher__panel"></div>
                                        <div class="cx-vui-switcher__trigger"></div>
                                    </div>
                                </div>
                                </div>
                            </div>
                            <div class="available-widgets__control">
                                <div class="cx-vui-component cx-vui-component--equalwidth cx-vui-switcher--deactive spc-pro-modal-trigger">
                                <div class="cx-vui-component__meta">
                                    <label class="cx-vui-component__label" for="cx_single-product-available-widget-spc/woo-product"><?php echo esc_html__( 'Thankyou Order Details', 'shopcred'); ?></label>
                                </div>
                                <div class="cx-vui-component__control">
                                    <div tabindex="0" class="cx-vui-switcher cx-vui-switcher--off" id="cx_single-product-available-widget-spc/woo-product">
                                        <input type="hidden" checked="" name="single-product-available-widget-spc/woo-product" class="cx-vui-switcher__input" value="true"> 
                                        <div class="cx-vui-switcher__panel"></div>
                                        <div class="cx-vui-switcher__trigger"></div>
                                    </div>
                                </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <div class="shopcred-pro-woo-builder-wrapper" style="display: none;">
                <div class="shopcred-pro-settings-page shopcred-pro-settings-page__general">
                    <div class="avaliable-controls__header">
                        <div class="cx-vui-subtitle"><?php echo esc_html__( 'Shop Page Templete', 'shopcred'); ?> <span class="notice-small-text"><a href="https://wpshopcred.com/shopcred-pro/" target="_blank"><?php echo esc_html__( 'Available in PRO', 'shopcred'); ?></a></span></div>
                    </div>
                    <div class="cx-vui-component cx-vui-component--equalwidth cx-vui-switcher--deactive spc-pro-modal-trigger">
                        <div class="cx-vui-component__meta">
                            <label class="cx-vui-component__label" for="cx_enable_spc_shop_page_template"><?php echo esc_html__( 'Enable Custom Shop Page', 'shopcred'); ?></label> <!---->
                        </div>
                        <div class="cx-vui-component__control">
                            <div tabindex="0" class="cx-vui-switcher cx-vui-switcher--off" id="cx_enable_spc_shop_page_template">
                                <input type="hidden" checked="checked" name="enable_spc_shop_page_template" class="cx-vui-switcher__input" value="false"> 
                                <div class="cx-vui-switcher__panel"></div>
                                <div class="cx-vui-switcher__trigger"></div>
                            </div>
                        </div>
                    </div>
                    <!----> 
                    <div class="avaliable-controls__header">
                        <div class="cx-vui-subtitle"><?php echo esc_html__( 'Single Product Page Templete', 'shopcred'); ?> <span class="notice-small-text"><a href="https://wpshopcred.com/shopcred-pro/" target="_blank">Available in PRO</a></span></div>
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
            
            <div class="shopcred-filter-block-wrapper" style="display: none;">
                <div class="shopcred-available-blocks-page shopcred-available-blocks-page__available-addons">
                    <div class="available-widgets">
                        <div class="available-widgets__option-info">
                            <div class="available-widgets__option-info-name"><?php echo esc_html__( 'Product Filter Block', 'shopcred'); ?> <span class="notice-small-text"><a href="https://wpshopcred.com/shopcred-filter/" target="_blank"><?php echo esc_html__( 'Available in PRO', 'shopcred'); ?></a></span></div>
                            <div class="available-widgets__option-info-desc"><?php echo esc_html__( 'These Blocks will be available Any Pages', 'shopcred'); ?></div>
                        </div>
                        <div class="available-widgets__controls spc-tmpl-settings">
                            <div class="available-widgets__control">
                                <div class="cx-vui-component cx-vui-component--equalwidth cx-vui-switcher--deactive spc-filter-modal-trigger">
                                <div class="cx-vui-component__meta">
                                    <label class="cx-vui-component__label" for="cx_single-product-available-widget-spc/woo-product"><?php echo esc_html__( 'Woo Filter', 'shopcred'); ?></label>
                                </div>
                                <div class="cx-vui-component__control">
                                    <div tabindex="0" class="cx-vui-switcher cx-vui-switcher--off" id="cx_single-product-available-widget-spc/woo-product">
                                        <input type="hidden" checked="" name="single-product-available-widget-spc/woo-product" class="cx-vui-switcher__input" value="true"> 
                                        <div class="cx-vui-switcher__panel"></div>
                                        <div class="cx-vui-switcher__trigger"></div>
                                    </div>
                                </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>


	</div>
</div>
