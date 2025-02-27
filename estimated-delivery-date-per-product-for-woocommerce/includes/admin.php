<?php
add_action( 'admin_menu','esdppfw_submenu_page');
function esdppfw_submenu_page() {
    add_submenu_page( 'woocommerce', 'Product Est Date', 'Product Est Date', 'manage_options', 'product-estdate','esdppfw_product_est_date_callback_func');
}

function esdppfw_product_est_date_callback_func(){
	?>
		<div class="wrap">
            <h2><?php echo __( 'Product Est Date Setting', 'estimated-shipping-date-per-product-for-woocommerce' );?></h2>
            <?php if(isset($_REQUEST['message'])  && $_REQUEST['message'] == 'success'){ ?>
                <div class="notice notice-success is-dismissible"> 
                    <p><strong><?php echo __( 'Setting saved successfully.', 'estimated-shipping-date-per-product-for-woocommerce' );?></strong></p>
                </div>
            <?php } ?>
        </div>
        <div class="esdppfw_container">
        	<form method="post">
              
        		<ul class="nav-tab-wrapper woo-nav-tab-wrapper">
                    <li class="nav-tab" data-tab="esdppfw-tab-general"><?php echo __( 'General Settings', 'estimated-shipping-date-per-product-for-woocommerce' );?></li>
                </ul>
                <div id="esdppfw-tab-general" class="tab-content current">
                	<div class="postbox">
                		<div class="inside">
                			<table class="form-table">
                				<tr>
                					<th><?php echo __( 'Enabled Delivery Date', 'estimated-shipping-date-per-product-for-woocommerce' ); ?></th>
                					<td><input type="checkbox" name="est_delvry_date" value="yes"<?php checked('yes',get_option('est_delvry_date','yes')); ?>><strong><?php echo __( 'Enable/Disable', 'estimated-shipping-date-per-product-for-woocommerce' ); ?></strong></td>
                				</tr>
                				<tr>
                					<th><?php echo __( 'Delivery Time', 'estimated-shipping-date-per-product-for-woocommerce' ); ?></th>
                					<td><input type="text" name="est_delvry_date_all_pro" value="<?php echo esc_attr(get_option('est_delvry_date_all_pro','2')); ?>"><p class="description"><?php echo __( 'in day', 'estimated-shipping-date-per-product-for-woocommerce' ); ?></p></td>
                				</tr>
                                <tr>
                                    <th><?php echo __('Order Dispatch Delay Days', 'estimated-shipping-date-per-product-for-woocommerce'); ?></th>
                                    <td><input type="text" name="est_dispatch_date_all_pro" value="<?php echo esc_attr(get_option('est_dispatch_date_all_pro', '1')); ?>"><p class="description"><?php echo __('in day', 'estimated-shipping-date-per-product-for-woocommerce'); ?></p></td>
                                </tr>
                				<tr>
                					<th><?php echo __( 'Display on Single Product Page', 'estimated-shipping-date-per-product-for-woocommerce' ); ?></th>
                					<td><input type="checkbox" name="est_date_display_single_pro" value="yes"<?php checked('yes',get_option('est_date_display_single_pro','yes')); ?>><strong><?php echo __( 'Enable/Disable', 'estimated-shipping-date-per-product-for-woocommerce' ); ?></strong></td>
                				</tr>
                				<tr>
                					<th><?php echo __( 'Delivery Text Position on Single Product Page', 'estimated-shipping-date-per-product-for-woocommerce' ); ?></th>
                					<td>
                						<select name="delvry_text_position_sinpro">
	                						<option value="single_pro_sum"<?php selected('single_pro_sum',get_option('delvry_text_position_sinpro','single_pro_sum')); ?>><?php echo __( 'Single Product Summary', 'estimated-shipping-date-per-product-for-woocommerce' ); ?></option>
	                						<option value="before_atc_btn"<?php selected('before_atc_btn',get_option('delvry_text_position_sinpro','single_pro_sum')); ?>><?php echo __( 'Before Add to Cart Button', 'estimated-shipping-date-per-product-for-woocommerce' ); ?></option>
	                						<option value="after_atc_quantity"<?php selected('after_atc_quantity',get_option('delvry_text_position_sinpro','single_pro_sum')); ?>><?php echo __( 'After Add to Cart Quantity', 'estimated-shipping-date-per-product-for-woocommerce' ); ?></option>
	                						<option value="after_atc_btn"<?php selected('after_atc_btn',get_option('delvry_text_position_sinpro','single_pro_sum')); ?>><?php echo __( 'After Add to Cart Button', 'estimated-shipping-date-per-product-for-woocommerce' ); ?></option>
	                						<option value="pro_meta_start"<?php selected('pro_meta_start',get_option('delvry_text_position_sinpro','single_pro_sum')); ?>><?php echo __( 'Product meta Start', 'estimated-shipping-date-per-product-for-woocommerce' ); ?></option>
	                						<option value="pro_meta_end"<?php selected('pro_meta_end',get_option('delvry_text_position_sinpro')); ?>><?php echo __( 'Product meta end', 'estimated-shipping-date-per-product-for-woocommerce' ); ?></option>
                						</select>
                					</td>
                				</tr>
                                <tr>
                                    <th><?php echo __('Display Option For Single Product Page', 'estimated-shipping-date-per-product-for-woocommerce'); ?></th>
                                    <td>
                                        <span style="margin-right: 15px;">
                                            <input type="radio" name="single_pro_display_opt" value="delivery_text" <?php checked('delivery_text', get_option('single_pro_display_opt', 'both')); ?> />
                                            <strong>Delivery Text</strong>
                                        </span>
                                        <span style="margin-right: 15px;">
                                            <input type="radio" name="single_pro_display_opt" value="delivery_widget" <?php checked('delivery_widget', get_option('single_pro_display_opt', 'both')); ?> />
                                            <strong>Delivery Widget</strong>
                                        </span>
                                        <span style="margin-right: 15px;">
                                            <input type="radio" name="single_pro_display_opt" value="both" <?php checked('both', get_option('single_pro_display_opt', 'both')) ?> />
                                            <strong>Both</strong>
                                        </span>
                                    </td>
                                </tr>
                				<tr>
                					<th><?php echo __( 'Delivery Text Background Color For Single Products', 'estimated-shipping-date-per-product-for-woocommerce' ); ?></th>
                					<td><input type="text" class="color-picker" data-alpha="true" data-default-color="#f5f5f5" name="single_pro_delivry_text_bg" value="<?php echo esc_attr(get_option('single_pro_delivry_text_bg','#f5f5f5')); ?>"/></td>
                				</tr>
                				<tr>
                					<th><?php echo __( 'Delivery Text Color For Single Products', 'estimated-shipping-date-per-product-for-woocommerce' ); ?></th>
                					<td><input type="text" class="color-picker" data-alpha="true" data-default-color="#ff0000" name="single_pro_delivry_text_color" value="<?php echo esc_attr(get_option('single_pro_delivry_text_color','#ff0000')); ?>"/></td>
                				</tr>
                                <!-- order-shipping-delivery icons and text -->
                                <tr>
                                    <th><?php echo __('Delivery Widget Order Icon For Single Products', 'estimated-shipping-date-per-product-for-woocommerce'); ?></th>
                                    <td>
                                        <span style="margin-right: 15px;">
                                            <input type="radio" name="single_pro_order_icon" value="shopping-cart" <?php checked('shopping-cart', get_option('single_pro_order_icon', 'shopping-cart')); ?> id="ord-icon1">
                                            <label for="ord-icon1">
                                                <svg aria-hidden="true" height="1.5em" fill="#000000" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 576 512">
                                                    <path fill-rule="evenodd" d="M0 24C0 10.7 10.7 0 24 0H69.5c22 0 41.5 12.8 50.6 32h411c26.3 0 45.5 25 38.6 50.4l-41 152.3c-8.5 31.4-37 53.3-69.5 53.3H170.7l5.4 28.5c2.2 11.3 12.1 19.5 23.6 19.5H488c13.3 0 24 10.7 24 24s-10.7 24-24 24H199.7c-34.6 0-64.3-24.6-70.7-58.5L77.4 54.5c-.7-3.8-4-6.5-7.9-6.5H24C10.7 48 0 37.3 0 24zM128 464a48 48 0 1 1 96 0 48 48 0 1 1 -96 0zm336-48a48 48 0 1 1 0 96 48 48 0 1 1 0-96z"/>
                                                </svg>
                                            </label>
                                        </span>
                                        <span style="margin-right: 15px;">
                                            <input type="radio" name="single_pro_order_icon" value="shopping-bag" <?php checked('shopping-bag', get_option('single_pro_order_icon', 'shopping-cart')); ?> id="ord-icon2">
                                            <label for="ord-icon2">
                                                <svg aria-hidden="true" height="1.5em" fill="#000000" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 448 512">
                                                    <path fill-rule="evenodd" d="M160 112c0-35.3 28.7-64 64-64s64 28.7 64 64v48H160V112zm-48 48H48c-26.5 0-48 21.5-48 48V416c0 53 43 96 96 96H352c53 0 96-43 96-96V208c0-26.5-21.5-48-48-48H336V112C336 50.1 285.9 0 224 0S112 50.1 112 112v48zm24 48a24 24 0 1 1 0 48 24 24 0 1 1 0-48zm152 24a24 24 0 1 1 48 0 24 24 0 1 1 -48 0z"/>
                                                </svg>
                                            </label>
                                        </span>
                                        <span style="margin-right: 15px;">
                                            <input type="radio" name="single_pro_order_icon" value="shopping-basket" <?php checked('shopping-basket', get_option('single_pro_order_icon', 'shopping-cart')); ?> id="ord-icon3">
                                            <label for="ord-icon3">
                                                <svg aria-hidden="true" height="1.5em" fill="#000000" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 576 512">
                                                    <path fill-rule="evenodd" d="M253.3 35.1c6.1-11.8 1.5-26.3-10.2-32.4s-26.3-1.5-32.4 10.2L117.6 192H32c-17.7 0-32 14.3-32 32s14.3 32 32 32L83.9 463.5C91 492 116.6 512 146 512H430c29.4 0 55-20 62.1-48.5L544 256c17.7 0 32-14.3 32-32s-14.3-32-32-32H458.4L365.3 12.9C359.2 1.2 344.7-3.4 332.9 2.7s-16.3 20.6-10.2 32.4L404.3 192H171.7L253.3 35.1zM192 304v96c0 8.8-7.2 16-16 16s-16-7.2-16-16V304c0-8.8 7.2-16 16-16s16 7.2 16 16zm96-16c8.8 0 16 7.2 16 16v96c0 8.8-7.2 16-16 16s-16-7.2-16-16V304c0-8.8 7.2-16 16-16zm128 16v96c0 8.8-7.2 16-16 16s-16-7.2-16-16V304c0-8.8 7.2-16 16-16s16 7.2 16 16z"/>
                                                </svg>
                                            </label>
                                        </span>
                                    </td>
                                </tr>
                                
                                <tr>
                                    <th><?php echo __('Delivery Widget Shipping Icon For Single Products', 'estimated-shipping-date-per-product-for-woocommerce'); ?></th>
                                    <td>
                                        <span style="margin-right: 15px;">
                                            <input type="radio" name="single_pro_shipping_icon" value="shipping-fast" <?php checked('shipping-fast', get_option('single_pro_shipping_icon', 'shipping-fast')); ?> id="ship-icon1">
                                            <label for="ship-icon1">
                                                <svg aria-hidden="true" height="1.5em" fill="#000000" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 640 512">
                                                    <path fill-rule="evenodd" d="M112 0C85.5 0 64 21.5 64 48V96H16c-8.8 0-16 7.2-16 16s7.2 16 16 16H64 272c8.8 0 16 7.2 16 16s-7.2 16-16 16H64 48c-8.8 0-16 7.2-16 16s7.2 16 16 16H64 240c8.8 0 16 7.2 16 16s-7.2 16-16 16H64 16c-8.8 0-16 7.2-16 16s7.2 16 16 16H64 208c8.8 0 16 7.2 16 16s-7.2 16-16 16H64V416c0 53 43 96 96 96s96-43 96-96H384c0 53 43 96 96 96s96-43 96-96h32c17.7 0 32-14.3 32-32s-14.3-32-32-32V288 256 237.3c0-17-6.7-33.3-18.7-45.3L512 114.7c-12-12-28.3-18.7-45.3-18.7H416V48c0-26.5-21.5-48-48-48H112zM544 237.3V256H416V160h50.7L544 237.3zM160 368a48 48 0 1 1 0 96 48 48 0 1 1 0-96zm272 48a48 48 0 1 1 96 0 48 48 0 1 1 -96 0z"/>
                                                </svg>
                                            </label>
                                        </span>
                                        <span style="margin-right: 15px;">
                                            <input type="radio" name="single_pro_shipping_icon" value="truck" <?php checked('truck', get_option('single_pro_shipping_icon', 'shipping-fast')); ?> id="ship-icon2">
                                            <label for="ship-icon2">
                                                <svg aria-hidden="true" height="1.5em" fill="#000000" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 640 512">
                                                    <path fill-rule="evenodd" d="M48 0C21.5 0 0 21.5 0 48V368c0 26.5 21.5 48 48 48H64c0 53 43 96 96 96s96-43 96-96H384c0 53 43 96 96 96s96-43 96-96h32c17.7 0 32-14.3 32-32s-14.3-32-32-32V288 256 237.3c0-17-6.7-33.3-18.7-45.3L512 114.7c-12-12-28.3-18.7-45.3-18.7H416V48c0-26.5-21.5-48-48-48H48zM416 160h50.7L544 237.3V256H416V160zM112 416a48 48 0 1 1 96 0 48 48 0 1 1 -96 0zm368-48a48 48 0 1 1 0 96 48 48 0 1 1 0-96z"/>
                                                </svg>
                                            </label>
                                        </span>
                                        <span style="margin-right: 15px;">
                                            <input type="radio" name="single_pro_shipping_icon" value="dolly-flatbed" <?php checked('dolly-flatbed', get_option('single_pro_shipping_icon', 'shipping-fast')); ?> id="ship-icon3">
                                            <label for="ship-icon3">
                                                <svg aria-hidden="true" height="1.5em" fill="#000000" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 640 512">
                                                    <path fill-rule="evenodd" d="M32 0C14.3 0 0 14.3 0 32S14.3 64 32 64H48c8.8 0 16 7.2 16 16V368c0 44.2 35.8 80 80 80h18.7c-1.8 5-2.7 10.4-2.7 16c0 26.5 21.5 48 48 48s48-21.5 48-48c0-5.6-1-11-2.7-16H450.7c-1.8 5-2.7 10.4-2.7 16c0 26.5 21.5 48 48 48s48-21.5 48-48c0-5.6-1-11-2.7-16H608c17.7 0 32-14.3 32-32s-14.3-32-32-32H144c-8.8 0-16-7.2-16-16V80C128 35.8 92.2 0 48 0H32zM192 80V272c0 26.5 21.5 48 48 48H560c26.5 0 48-21.5 48-48V80c0-26.5-21.5-48-48-48H464V176c0 5.9-3.2 11.3-8.5 14.1s-11.5 2.5-16.4-.8L400 163.2l-39.1 26.1c-4.9 3.3-11.2 3.6-16.4 .8s-8.5-8.2-8.5-14.1V32H240c-26.5 0-48 21.5-48 48z"/>
                                                </svg>
                                            </label>
                                        </span>
                                    </td>
                                </tr>
                                
                                <tr>
                                    <th><?php echo __('Delivery Widget Delivery Icon For Single Products', 'estimated-shipping-date-per-product-for-woocommerce'); ?></th>
                                    <td>
                                        <span style="margin-right: 15px;">
                                            <input type="radio" name="single_pro_delivery_icon" value="truck-loading" <?php checked('truck-loading', get_option('single_pro_delivery_icon', 'truck-loading')); ?> id="delivery-icon1">
                                            <label for="delivery-icon1">
                                                <svg aria-hidden="true" height="1.5em" fill="#000000" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 640 512">
                                                    <path fill-rule="evenodd" d="M640 0V400c0 61.9-50.1 112-112 112c-61 0-110.5-48.7-112-109.3L48.4 502.9c-17.1 4.6-34.6-5.4-39.3-22.5s5.4-34.6 22.5-39.3L352 353.8V64c0-35.3 28.7-64 64-64H640zM576 400a48 48 0 1 0 -96 0 48 48 0 1 0 96 0zM23.1 207.7c-4.6-17.1 5.6-34.6 22.6-39.2l46.4-12.4 20.7 77.3c2.3 8.5 11.1 13.6 19.6 11.3l30.9-8.3c8.5-2.3 13.6-11.1 11.3-19.6l-20.7-77.3 46.4-12.4c17.1-4.6 34.6 5.6 39.2 22.6l41.4 154.5c4.6 17.1-5.6 34.6-22.6 39.2L103.7 384.9c-17.1 4.6-34.6-5.6-39.2-22.6L23.1 207.7z"/>
                                                </svg>
                                            </label>
                                        </span>
                                        <span style="margin-right: 15px;">
                                            <input type="radio" name="single_pro_delivery_icon" value="map-marker-alt" <?php checked('map-marker-alt', get_option('single_pro_delivery_icon', 'truck-loading')); ?> id="delivery-icon2">
                                            <label for="delivery-icon2">
                                                <svg aria-hidden="true" height="1.5em" fill="#000000" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 384 512">
                                                    <path fill-rule="evenodd" d="M215.7 499.2C267 435 384 279.4 384 192C384 86 298 0 192 0S0 86 0 192c0 87.4 117 243 168.3 307.2c12.3 15.3 35.1 15.3 47.4 0zM192 128a64 64 0 1 1 0 128 64 64 0 1 1 0-128z"/>
                                                </svg>
                                            </label>
                                        </span>
                                        <span style="margin-right: 15px;">
                                            <input type="radio" name="single_pro_delivery_icon" value="map-marked-alt" <?php checked('map-marked-alt', get_option('single_pro_delivery_icon', 'truck-loading')); ?> id="delivery-icon3">
                                            <label for="delivery-icon3">
                                                <svg aria-hidden="true" height="1.5em" fill="#000000" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 576 512">
                                                    <path fill-rule="evenodd" d="M408 120c0 54.6-73.1 151.9-105.2 192c-7.7 9.6-22 9.6-29.6 0C241.1 271.9 168 174.6 168 120C168 53.7 221.7 0 288 0s120 53.7 120 120zm8 80.4c3.5-6.9 6.7-13.8 9.6-20.6c.5-1.2 1-2.5 1.5-3.7l116-46.4C558.9 123.4 576 135 576 152V422.8c0 9.8-6 18.6-15.1 22.3L416 503V200.4zM137.6 138.3c2.4 14.1 7.2 28.3 12.8 41.5c2.9 6.8 6.1 13.7 9.6 20.6V451.8L32.9 502.7C17.1 509 0 497.4 0 480.4V209.6c0-9.8 6-18.6 15.1-22.3l122.6-49zM327.8 332c13.9-17.4 35.7-45.7 56.2-77V504.3L192 449.4V255c20.5 31.3 42.3 59.6 56.2 77c20.5 25.6 59.1 25.6 79.6 0zM288 152a40 40 0 1 0 0-80 40 40 0 1 0 0 80z"/>
                                                </svg>
                                            </label>
                                        </span>
                                    </td>
                                </tr>
                                
                                <tr>
                                    <th><?php echo __('Delivery Widget Background Color For Single Products', 'estimated-shipping-date-per-product-for-woocommerce'); ?></th>
                                    <td><input type="text" class="color-picker" data-alpha="true" data-default-color="#ffffff" name="single_pro_delivry_widget_bg" value="<?php echo esc_attr(get_option('single_pro_delivry_widget_bg', '#ffffff')); ?>"></td>
                                </tr>
                                <tr>
                                    <th><?php echo __('Delivery Widget Text Color For Single Products', 'estimated-shipping-date-per-product-for-woocommerce'); ?></th>
                                    <td><input type="text" class="color-picker" data-alpha="true" data-default-color="#000000" name="single_pro_delivry_widget_color" value="<?php echo esc_attr(get_option('single_pro_delivry_widget_color','#000000')); ?>"/></td>
                                </tr>
                                <tr>
                                    <th><?php echo __('Delivery Widget Border Color', 'estimated-shipping-date-per-product-for-woocommerce'); ?></th>
                                    <td><input type="text" class="color-picker" data-alpha="true" data-default-color="#cdcdcd" name="single_pro_delivry_widget_border_color" value="<?php echo esc_attr(get_option('single_pro_delivry_widget_border_color', '#cdcdcd')); ?>"/></td>
                                </tr>
                                <!-- ./order-shipping-delivery icons and text end -->
                				<tr>
                					<th><?php echo __( 'Display on Cart Page And Checkout Page', 'estimated-shipping-date-per-product-for-woocommerce' ); ?></th>
                					<td><input type="checkbox" name="est_display_on_cartpage" value="yes"<?php checked('yes',get_option('est_display_on_cartpage','yes')); ?>><strong><?php echo __( 'Enable/Disable', 'estimated-shipping-date-per-product-for-woocommerce' ); ?></strong></td>
                				</tr>
                				<tr>
                					<th><?php echo __( 'Display on Order Page/ Order Email', 'estimated-shipping-date-per-product-for-woocommerce' ); ?></th>
                					<td><input type="checkbox" name="est_display_on_orderpage" value="yes"<?php checked('yes',get_option('est_display_on_orderpage','yes')); ?>><strong><?php echo __( 'Enable/Disable', 'estimated-shipping-date-per-product-for-woocommerce' ); ?></strong></td>
                				</tr>
                				<tr>
                					<th><?php echo __( 'Hide if Product is Out of Stock?', 'estimated-shipping-date-per-product-for-woocommerce' ); ?></th>
                					<td><input type="checkbox" name="hide_outofstock_product" value="yes" <?php checked('yes',get_option('hide_outofstock_product','')); ?> disabled><strong><?php echo __( 'Enable/Disable', 'estimated-shipping-date-per-product-for-woocommerce' ); ?></strong><label class="esdppfw_comman_link"><?php echo __('This Option Available in ','estimated-shipping-date-per-product-for-woocommerce');?> <a href="https://www.topsmodule.com/product/estimated-delivery-date-per-product-for-woocommerce/" target="_blank"><?php echo esc_html('Pro Version','estimated-shipping-date-per-product-for-woocommerce'); ?></a></label></td>
                				</tr>
                				<tr>
                					<th><?php echo __( 'Hide if Product is Backorder?', 'estimated-shipping-date-per-product-for-woocommerce' ); ?></th>
                					<td><input type="checkbox" name="hide_product_backorder" value="yes" <?php checked('yes',get_option('hide_product_backorder','')); ?> disabled><strong><?php echo __( 'Enable/Disable', 'estimated-shipping-date-per-product-for-woocommerce' ); ?></strong><label class="esdppfw_comman_link"><?php echo __('This Option Available in ','estimated-shipping-date-per-product-for-woocommerce');?> <a href="https://www.topsmodule.com/product/estimated-delivery-date-per-product-for-woocommerce/" target="_blank"><?php echo esc_html('Pro Version','estimated-shipping-date-per-product-for-woocommerce'); ?></a></label></td>
                				</tr>
                				
                				
                				
                				<tr>
                					<th><?php echo __( 'Delivery Date Format', 'estimated-shipping-date-per-product-for-woocommerce' ); ?></th>
                					<td>
                						<input type="text" name="delvry_date_format" value="d,F Y" readonly>
                						<label class="esdppfw_comman_link"><?php echo __('This Option Available in ','estimated-shipping-date-per-product-for-woocommerce');?> <a href="https://www.topsmodule.com/product/estimated-delivery-date-per-product-for-woocommerce/" target="_blank"><?php echo esc_html('Pro Version','estimated-shipping-date-per-product-for-woocommerce'); ?></a></label>
                						<p class="description"><?php echo __( 'Example', 'estimated-shipping-date-per-product-for-woocommerce' ); ?></p>
                						<p class="description"><?php echo __( 'd - The day of the month (from 01 to 31)', 'estimated-shipping-date-per-product-for-woocommerce' ); ?></p>
                						<p class="description"><?php echo __( 'D - A textual representation of a day (three letters)', 'estimated-shipping-date-per-product-for-woocommerce' ); ?></p>
                						<p class="description"><?php echo __( 'j - The day of the month without leading zeros (1 to 31)', 'estimated-shipping-date-per-product-for-woocommerce' ); ?></p>
                						<p class="description"><?php echo __( 'F - A full textual representation of a month (January through December)', 'estimated-shipping-date-per-product-for-woocommerce' ); ?></p>
                						<p class="description"><?php echo __( 'l (lowercase "L") - A full textual representation of a day', 'estimated-shipping-date-per-product-for-woocommerce' ); ?></p>
                						<p class="description"><?php echo __( 'm - A numeric representation of a month (from 01 to 12)', 'estimated-shipping-date-per-product-for-woocommerce' ); ?></p>
                						<p class="description"><?php echo __( 'M - A short textual representation of a month (three letters)', 'estimated-shipping-date-per-product-for-woocommerce' ); ?></p>
                						<p class="description"><?php echo __( 'n - A numeric representation of a month, without leading zeros (1 to 12)', 'estimated-shipping-date-per-product-for-woocommerce' ); ?></p>
                						<p class="description"><?php echo __( 'Y - A four digit representation of a year', 'estimated-shipping-date-per-product-for-woocommerce' ); ?></p>
                						<p class="description"><?php echo __( 'y - A two digit representation of a year', 'estimated-shipping-date-per-product-for-woocommerce' ); ?></p>

                					</td>
                				</tr>
                                <tr>
                                    <th colspan="2"><h3>Translation</h3></th>
                                </tr>
                                <tr>
                                    <th><?php echo __('Delivery Widget Delivery Text For Single Products', 'estimated-shipping-date-per-product-for-woocommerce'); ?></th>
                                    <td>
                                        <input type="text" name="single_pro_delivery_text" value="<?php echo esc_attr(get_option('single_pro_delivery_text', 'Delivered')); ?>" readonly >
                                        <label class="esdppfw_comman_link"><?php echo __('This Option Available in ','estimated-shipping-date-per-product-for-woocommerce');?> <a href="https://www.topsmodule.com/product/estimated-delivery-date-per-product-for-woocommerce/" target="_blank"><?php echo esc_html('Pro Version','estimated-shipping-date-per-product-for-woocommerce'); ?></a></label>
                                    </td>
                                </tr>
                                <tr>
                                    <th><?php echo __('Delivery Widget Shipping Text For Single Products', 'estimated-shipping-date-per-product-for-woocommerce'); ?></th>
                                    <td>
                                        <input type="text" name="single_pro_shipping_text" value="<?php echo esc_attr(get_option('single_pro_shipping_text', 'Shipping')); ?>" readonly>
                                        <label class="esdppfw_comman_link"><?php echo __('This Option Available in ','estimated-shipping-date-per-product-for-woocommerce');?> <a href="https://www.topsmodule.com/product/estimated-delivery-date-per-product-for-woocommerce/" target="_blank"><?php echo esc_html('Pro Version','estimated-shipping-date-per-product-for-woocommerce'); ?></a></label>
                                    </td>
                                </tr>
                                <tr>
                                    <th><?php echo __('Delivery Widget Order Text For Single Products', 'estimated-shipping-date-per-product-for-woocommerce'); ?></th>
                                    <td>
                                        <input type="text" name="single_pro_order_text" value="<?php echo esc_attr(get_option('single_pro_order_text', 'Ordered')); ?>" readonly>
                                        <label class="esdppfw_comman_link"><?php echo __('This Option Available in ','estimated-shipping-date-per-product-for-woocommerce');?> <a href="https://www.topsmodule.com/product/estimated-delivery-date-per-product-for-woocommerce/" target="_blank"><?php echo esc_html('Pro Version','estimated-shipping-date-per-product-for-woocommerce'); ?></a></label>
                                    </td>
                                </tr>
                                <tr>
                                    <th><?php echo __( 'For All Products Delivery Text For Order Page', 'estimated-shipping-date-per-product-for-woocommerce' ); ?></th>
                                    <td>
                                        <input type="text" name="delvry_text_order_page" value="<?php echo esc_attr(get_option('delvry_text_order_page','your order will be delivery on')); ?>" readonly>
                                        <label class="esdppfw_comman_link"><?php echo __('This Option Available in ','estimated-shipping-date-per-product-for-woocommerce');?> <a href="https://www.topsmodule.com/product/estimated-delivery-date-per-product-for-woocommerce/" target="_blank"><?php echo esc_html('Pro Version','estimated-shipping-date-per-product-for-woocommerce'); ?></a></label>
                                    </td>
                                </tr>
                                <tr>
                                    <th><?php echo __( 'For All Products Delivery Text For Cart And Checkout Page', 'estimated-shipping-date-per-product-for-woocommerce' ); ?></th>
                                    <td>
                                        <input type="text" name="delvry_text_cart_checkout" value="<?php echo esc_attr(get_option('delvry_text_cart_checkout','your order will be delivery on')); ?>" readonly>
                                        <label class="esdppfw_comman_link"><?php echo __('This Option Available in ','estimated-shipping-date-per-product-for-woocommerce');?> <a href="https://www.topsmodule.com/product/estimated-delivery-date-per-product-for-woocommerce/" target="_blank"><?php echo esc_html('Pro Version','estimated-shipping-date-per-product-for-woocommerce'); ?></a></label>

                                    </td>
                                </tr>
                                <tr>
                                    <th><?php echo __( 'For All Products Delivery Text For Product Page', 'estimated-shipping-date-per-product-for-woocommerce' ); ?></th>
                                    <td>
                                        <input type="text" name="delvry_text_pro_page" value="<?php echo esc_attr(get_option('delvry_text_pro_page','this item will be delivery on')); ?>" readonly>
                                        <label class="esdppfw_comman_link"><?php echo __('This Option Available in ','estimated-shipping-date-per-product-for-woocommerce');?> <a href="https://www.topsmodule.com/product/estimated-delivery-date-per-product-for-woocommerce/" target="_blank"><?php echo esc_html('Pro Version','estimated-shipping-date-per-product-for-woocommerce'); ?></a></label>
                                    </td>
                                </tr>
                			</table>
                		</div>
                	</div>
                </div>
                <?php wp_nonce_field('esdppfw_save_options', 'esdppfw_nonce'); ?>
                <input type="hidden" name="estdateaction" value="est_date_save_option">
                <input type="submit" value="Save changes" name="submit" class="button-primary">
        	</form>
        </div>
	<?php
}

add_action('init','esdppfw_save_product_est_date');
function esdppfw_save_product_est_date(){
	if (isset($_REQUEST['estdateaction']) && $_REQUEST['estdateaction'] == 'est_date_save_option') {
        if (isset($_REQUEST['esdppfw_nonce']) && wp_verify_nonce($_REQUEST['esdppfw_nonce'], 'esdppfw_save_options')) {
			if (isset($_REQUEST['est_delvry_date'])) {
				update_option('est_delvry_date',sanitize_text_field($_REQUEST['est_delvry_date']));
			}else{
				update_option('est_delvry_date','');
			}
			
			if (isset($_REQUEST['est_delvry_date_all_pro'])) {
				update_option('est_delvry_date_all_pro',sanitize_text_field($_REQUEST['est_delvry_date_all_pro']));
			}else{
				update_option('est_delvry_date_all_pro','');
			}

            if (isset($_REQUEST['est_dispatch_date_all_pro'])) {
                update_option('est_dispatch_date_all_pro', sanitize_text_field($_REQUEST['est_dispatch_date_all_pro']));
            }else{
                update_option('est_dispatch_date_all_pro', '');
            }

			if (isset($_REQUEST['est_date_display_single_pro'])) {
				update_option('est_date_display_single_pro',sanitize_text_field($_REQUEST['est_date_display_single_pro']));
			}else{
				update_option('est_date_display_single_pro','');
			}

			if (isset($_REQUEST['delvry_text_position_sinpro'])) {
				update_option('delvry_text_position_sinpro',sanitize_text_field($_REQUEST['delvry_text_position_sinpro']));
			}else{
				update_option('delvry_text_position_sinpro','');
			}

            if (isset($_REQUEST['single_pro_display_opt'])) {
                update_option('single_pro_display_opt', sanitize_text_field($_REQUEST['single_pro_display_opt']));
            }else{
                update_option('single_pro_display_opt', '');
            }

			if (isset($_REQUEST['single_pro_delivry_text_bg'])) {
				update_option('single_pro_delivry_text_bg',sanitize_text_field($_REQUEST['single_pro_delivry_text_bg']));
			}else{
				update_option('single_pro_delivry_text_bg','');
			}

			if (isset($_REQUEST['single_pro_delivry_text_color'])) {
				update_option('single_pro_delivry_text_color',sanitize_text_field($_REQUEST['single_pro_delivry_text_color']));
			}else{
				update_option('single_pro_delivry_text_color','');
			}

            // order-ship-delivery
            if (isset($_REQUEST['single_pro_order_icon'])) {
                update_option('single_pro_order_icon', sanitize_text_field($_REQUEST['single_pro_order_icon']));
            }else{
                update_option('single_pro_order_icon', '');
            }

            if (isset($_REQUEST['single_pro_order_text'])) {
                update_option('single_pro_order_text', sanitize_text_field($_REQUEST['single_pro_order_text']));
            }else{
                update_option('single_pro_order_text', '');
            }

            if (isset($_REQUEST['single_pro_shipping_icon'])) {
                update_option('single_pro_shipping_icon', sanitize_text_field($_REQUEST['single_pro_shipping_icon']));
            }else{
                update_option('single_pro_shipping_icon', '');
            }

            if (isset($_REQUEST['single_pro_shipping_text'])) {
                update_option('single_pro_shipping_text', sanitize_text_field($_REQUEST['single_pro_shipping_text']));
            }else{
                update_option('single_pro_shipping_text', '');
            }

            if (isset($_REQUEST['single_pro_delivery_icon'])) {
                update_option('single_pro_delivery_icon', sanitize_text_field($_REQUEST['single_pro_delivery_icon']));
            }else{
                update_option('single_pro_delivery_icon', '');
            }

            if (isset($_REQUEST['single_pro_delivery_text'])) {
                update_option('single_pro_delivery_text', sanitize_text_field($_REQUEST['single_pro_delivery_text']));
            }else {
                update_option('single_pro_delivery_text', '');
            }

            if (isset($_REQUEST['single_pro_delivry_widget_bg'])) {
                update_option('single_pro_delivry_widget_bg', sanitize_text_field($_REQUEST['single_pro_delivry_widget_bg']));
            }else{
                update_option('single_pro_delivry_widget_bg', '');
            }

            if (isset($_REQUEST['single_pro_delivry_widget_color'])) {
                update_option('single_pro_delivry_widget_color', sanitize_text_field($_REQUEST['single_pro_delivry_widget_color']));
            }else{
                update_option('single_pro_delivry_widget_color', '');
            }

            if (isset($_REQUEST['single_pro_delivry_widget_border_color'])) {
                update_option('single_pro_delivry_widget_border_color', sanitize_text_field($_REQUEST['single_pro_delivry_widget_border_color']));
            }else{
                update_option('single_pro_delivry_widget_border_color', '');
            }
            // order-ship-delivery

			if (isset($_REQUEST['est_display_on_cartpage'])) {
				update_option('est_display_on_cartpage',sanitize_text_field($_REQUEST['est_display_on_cartpage']));
			}else{
				update_option('est_display_on_cartpage','');
			}

			if (isset($_REQUEST['est_display_on_orderpage'])) {
				update_option('est_display_on_orderpage',sanitize_text_field($_REQUEST['est_display_on_orderpage']));
			}else{
				update_option('est_display_on_orderpage','');
			}

			if (isset($_REQUEST['delvry_text_pro_page'])) {
				update_option('delvry_text_pro_page',sanitize_text_field($_REQUEST['delvry_text_pro_page']));
			}else{
				update_option('delvry_text_pro_page','');
			}

			if (isset($_REQUEST['delvry_text_cart_checkout'])) {
				update_option('delvry_text_cart_checkout',sanitize_text_field($_REQUEST['delvry_text_cart_checkout']));
			}else{
				update_option('delvry_text_cart_checkout','');
			}

			if (isset($_REQUEST['delvry_text_order_page'])) {
				update_option('delvry_text_order_page',sanitize_text_field($_REQUEST['delvry_text_order_page']));
			}else{
				update_option('delvry_text_order_page','');
			}

			wp_redirect( admin_url( '/admin.php?page=product-estdate&message=success' ) );
            exit;
		}
	}
	
}

/* Single Product Setting */

// Add custom product setting tab.
add_action('woocommerce_product_data_tabs','esdppfw_custom_product_data_tab');
function esdppfw_custom_product_data_tab($tabs){
	$tabs['esdppfw_product_data'] = array(
		'label'    =>  __( 'Product Est Date', 'estimated-shipping-date-per-product-for-woocommerce' ),
		'target'   => 'esdppfw_product_data',
		'priority' => 75,
	);
	return $tabs;
}

add_action( 'woocommerce_product_data_panels', 'esdppfw_custom_tab_callback_func' );
function esdppfw_custom_tab_callback_func(){
	?>
	<div id="esdppfw_product_data" class="panel woocommerce_options_panel">
		<div class="options_group">
            <p class="form-field">
                <label><?php echo __('Enabled Delivery Date:', 'estimated-shipping-date-per-product-for-woocommerce'); ?></label>
                <?php 
                    if (metadata_exists('post', get_the_id(), 'single_pro_est_delvry_date')) {
                        $single_pro_est_delvry_date =  get_post_meta(get_the_id(), 'single_pro_est_delvry_date', true);
                    }else{
                        $single_pro_est_delvry_date = 'yes';
                    }
                ?>
                <input type="checkbox" name="single_pro_est_delvry_date" value="yes" <?php checked('yes', $single_pro_est_delvry_date); ?> />
                <strong><?php echo __( 'Enable/Disable', 'estimated-shipping-date-per-product-for-woocommerce' ); ?></strong>
            </p>
			<p class="form-field">
				<label><?php echo __( 'Delivery Time:', 'estimated-shipping-date-per-product-for-woocommerce' ); ?></label>
				<?php 
					$est_date_delivry_time = get_post_meta(get_the_id(),'est_date_delivry_time',true);
					if (empty($est_date_delivry_time)) {
						$est_date_delvrytime = '2';
					}else{
						$est_date_delvrytime = $est_date_delivry_time;
					}
				?>
				<input type="text" class="short" name="est_date_delivry_time" value="<?php echo esc_attr($est_date_delvrytime); ?>" disabled>
				<span class="description">
                    <?php echo __( 'In Day', 'estimated-shipping-date-per-product-for-woocommerce' ); ?>
                        <label class="esdppfw_comman_link"><?php echo __('This Option Available in ','estimated-shipping-date-per-product-for-woocommerce');?> <a href="https://www.topsmodule.com/product/estimated-delivery-date-per-product-for-woocommerce/" target="_blank"><?php echo esc_html('Pro Version','estimated-shipping-date-per-product-for-woocommerce'); ?></a></label>
               </span>
                
			</p>
            <p class="form-field">
                <label><?php echo __( 'Order Dispatch Delay Days:', 'estimated-shipping-date-per-product-for-woocommerce' ); ?></label>
                <?php 
                    $est_date_dispatch_time = get_post_meta(get_the_id(), 'est_date_dispatch_time', true);
                    if (empty($est_date_dispatch_time)) {
                        $est_date_dispatchtime = '1';
                    }else{
                        $est_date_dispatchtime = $est_date_dispatch_time;
                    }
                ?>
                <input type="text" class="short" name="est_date_dispatch_time" value="<?php echo esc_attr($est_date_dispatchtime); ?>" disabled>
                <span class="description">
                    <?php echo __( 'In Day', 'estimated-shipping-date-per-product-for-woocommerce' ); ?>
                    <label class="esdppfw_comman_link"><?php echo __('This Option Available in ','estimated-shipping-date-per-product-for-woocommerce');?> <a href="https://www.topsmodule.com/product/estimated-delivery-date-per-product-for-woocommerce/" target="_blank"><?php echo esc_html('Pro Version','estimated-shipping-date-per-product-for-woocommerce'); ?></a></label>
                </span>
                
            </p>
			<p class="form-field">
				<label><?php echo __( 'Delivery Date Text:', 'estimated-shipping-date-per-product-for-woocommerce' ); ?></label>
				<?php 
					$delivry_datetext = get_post_meta(get_the_id(),'delivry_datetext',true);
					if (empty($delivry_datetext)) {
						$est_date_datetext = 'This item will be delivery on';
					}else{
						$est_date_datetext = $delivry_datetext;
					}
				?>
				<input type="text" class="short" name="delivry_datetext" value="<?php echo esc_attr($est_date_datetext); ?>" disabled>
			</p>
			<p class="form-field">
				<label><?php echo __( 'Delivery Text For Out Of Stock:', 'estimated-shipping-date-per-product-for-woocommerce' ); ?></label>
				<?php 
					$delvry_text_outstock = get_post_meta(get_the_id(),'delvry_text_outstock',true);
					if (empty($delvry_text_outstock)) {
						$est_date_text_outstock = 'This item will be delivery on';
					}else{
						$est_date_text_outstock = $delvry_text_outstock;
					}
				?>
				<input type="text" class="short" name="delvry_text_outstock" value="<?php echo esc_attr($est_date_text_outstock); ?>" disabled>
                <span class="description">
                        <label class="esdppfw_comman_link"><?php echo __('This Option Available in ','estimated-shipping-date-per-product-for-woocommerce');?> <a href="https://www.topsmodule.com/product/estimated-delivery-date-per-product-for-woocommerce/" target="_blank"><?php echo esc_html('Pro Version','estimated-shipping-date-per-product-for-woocommerce'); ?></a></label>
                </span>
			</p>
			<p class="form-field">
				<label><?php echo __( 'Delivery text on Order Page:', 'estimated-shipping-date-per-product-for-woocommerce' ); ?></label>
				<?php 
					$delvry_text_orderpage = get_post_meta(get_the_id(),'delvry_text_orderpage',true);
					if (empty($delvry_text_orderpage)) {
						$est_date_text_orderpage = 'Your order will be delivery on';
					}else{
						$est_date_text_orderpage = $delvry_text_orderpage;
					}
				?>
				<input type="text" class="short" name="delvry_text_orderpage" value="<?php echo esc_attr($est_date_text_orderpage); ?>" disabled>
                <span class="description">
                 <label class="esdppfw_comman_link"><?php echo __('This Option Available in ','estimated-shipping-date-per-product-for-woocommerce');?> <a href="https://www.topsmodule.com/product/estimated-delivery-date-per-product-for-woocommerce/" target="_blank"><?php echo esc_html('Pro Version','estimated-shipping-date-per-product-for-woocommerce'); ?></a></label>
                 </span>
			</p>
		</div>
	</div>
	<?php
}

// add_action('save_post','esdppfw_save_product_est_date_val');
add_action( 'woocommerce_process_product_meta',  'esdppfw_save_product_est_date_val' );
function esdppfw_save_product_est_date_val($post){
	if (isset($_REQUEST['single_pro_est_delvry_date'])) {
        update_post_meta($post, 'single_pro_est_delvry_date', sanitize_text_field($_REQUEST['single_pro_est_delvry_date']));
    }else{
        update_post_meta($post, 'single_pro_est_delvry_date', '');
    }
    
    if (isset($_REQUEST['est_date_delivry_time'])) {
		update_post_meta($post,'est_date_delivry_time',sanitize_text_field($_REQUEST['est_date_delivry_time']));
	}else{
		update_post_meta($post,'est_date_delivry_time','');
	}

    if (isset($_REQUEST['est_date_dispatch_time'])) {
        update_post_meta($post, 'est_date_dispatch_time', sanitize_text_field($_REQUEST['est_date_dispatch_time']));
    }else{
        update_post_meta($post, 'est_date_dispatch_time', '');
    }

	if (isset($_REQUEST['delivry_datetext'])) {
		update_post_meta($post,'delivry_datetext',sanitize_text_field($_REQUEST['delivry_datetext']));
	}else{
		update_post_meta($post,'delivry_datetext','');
	}

	if (isset($_REQUEST['delvry_text_outstock'])) {
		update_post_meta($post,'delvry_text_outstock',sanitize_text_field($_REQUEST['delvry_text_outstock']));
	}else{
		update_post_meta($post,'delvry_text_outstock','');
	}

	if (isset($_REQUEST['delvry_text_orderpage'])) {
		update_post_meta($post,'delvry_text_orderpage',sanitize_text_field($_REQUEST['delvry_text_orderpage']));
	}else{
		update_post_meta($post,'delvry_text_orderpage','');
	}

}