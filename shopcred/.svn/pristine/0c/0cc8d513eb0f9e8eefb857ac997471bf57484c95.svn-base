<div
	class="shopcred-dashboard-settings-page"
	:class="{ 'proccesing-state': proccesingState }"
>
	<div class="shopcred-dashboard-settings-page__inner shopcred-dashboard-page__panel">
		<div class="spc-plugin-right-sidebar">
			<div class="spc-plugin-settings">
				<h4 class="spc-plugin-settings-heading">
					<?php echo esc_html__( 'Plugin Settings', 'shopcred'); ?>
				</h4>
				<div class="subpage-category-list">
					<plugin-settings-toggle
						v-for="( categoryData, index ) in categoryList"
						:key="`category-${ categoryData.slug }`"
						:config="categoryData"
					></plugin-settings-toggle>
				</div>
			</div>
		</div>
		<div class="subpage-content-wrapper">
			<div class="subpage-content">
				<component
					:is="subpage"
				></component>
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
