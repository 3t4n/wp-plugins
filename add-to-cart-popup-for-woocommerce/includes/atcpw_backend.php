<?php

if (!defined('ABSPATH'))
  exit;

if (!class_exists('ATCPW_admin_menu')) {

    class ATCPW_admin_menu {

        protected static $ATCPW_instance;

        function atcpw_submenu_page() {
            add_menu_page(__( 'woocommerce Add To Cart Popup', 'Add To Cart Popup Settings' ),esc_html__('Add To Cart Popup Settings','add-to-cart-popup-settings'),'manage_options','add-to-cart-popup',array($this, 'ATCPW_callback'));
        }        

        function ATCPW_callback() {
            global $atcpw_comman;
            ?>
            <div class="wrap">
                <h2>Add To Cart Popup Settings</h2>
                <?php if(isset($_REQUEST['message'])  && $_REQUEST['message'] == 'success'){ ?>
                    <div class="notice notice-success is-dismissible"> 
                        <p><strong>Record updated successfully.</strong></p>
                    </div>
                <?php } ?>
            </div>
            <div class="atcpw-container">
                <form method="post" >
                    <?php wp_nonce_field( 'atcpw_nonce_action', 'atcpw_nonce_field' ); ?>
                    <ul class="atcpw-tabs">
                        <li class="tab-link atcpw-current" data-tab="atcpw-tab-general"><?php echo __( 'General Settings', 'add-to-cart-popup-woocommerce' );?></li>
                        <li class="tab-link" data-tab="atcpw-tab-other"><?php echo __( 'Custom Style', 'add-to-cart-popup-woocommerce' );?></li>
                        <li class="tab-link" data-tab="atcpw-tab-translations"><?php echo __( 'Translations', 'add-to-cart-popup-woocommerce' );?></li>
                    </ul>
                    <div id="atcpw-tab-general" class="tab-content atcpw-current">
                        <div class="cover_div">
                            <h2>Popup cart</h2>
                            <table class="data_table">
                                <tr>
                                    <th>Ajax Add To Cart</th>
                                    <td>
                                        <input type="checkbox" name="atcpw_comman[atcpw_ajax_cart]" value="yes" <?php if ($atcpw_comman['atcpw_ajax_cart'] == "yes" ) { echo 'checked="checked"'; } ?>>
                                        <strong>Add to cart without page refresh.</strong>
                                    </td>
                                </tr>
                                <tr>
                                    <th>Auto Open Cart</th>
                                    <td>
                                        <input type="checkbox" name="atcpw_comman[atcpw_auto_open]" value="yes" <?php if ($atcpw_comman['atcpw_auto_open'] == "yes" ) { echo 'checked="checked"'; } ?>>
                                        <strong>After Add to Cart Immeditaliy Open</strong>
                                    </td>
                                </tr>
                                <tr>
                                    <th>Trigger to class open cart </th>
                                    <td>
                                        <input type="checkbox" name="atcpw_comman[atcpw_trigger_class]" value="yes" <?php if ($atcpw_comman['atcpw_trigger_class'] == "yes" ) { echo 'checked="checked"'; } ?>>
                                        <strong>After Enable trigger then cart open automatically</strong>
                                        <p class="atcpw-tips">Note:If Enable then You need to add this class <strong>atcpw_trigger</strong> where you want to add triggers.</p>
                                    </td>
                                </tr>
                            </table>
                        </div>
                        <div class="cover_div">
                            <h2>Cart Popup Header</h2>
                            <table class="data_table">
                                <tr>
                                    <th>Show in Header</th>
                                    <td>
                                        <input type="checkbox" name="atcpw_comman[atcpw_header_cart_icon]" value="yes" <?php if ($atcpw_comman['atcpw_header_cart_icon'] == "yes" ) { echo 'checked="checked"'; } ?>>
                                        <strong>Basket Icon</strong><br/>
                                        <input type="checkbox" name="atcpw_comman[atcpw_header_close_icon]" value="yes" <?php if ($atcpw_comman['atcpw_header_close_icon'] == "yes" ) { echo 'checked="checked"'; } ?>>
                                        <strong>Close Icon</strong><br/>
                                    </td>
                                </tr>
                                <tr>
                                    <th>Show Freeshipping in Header</th>
                                    <td>
                                        <input type="checkbox" name="atcpw_comman[atcpw_freeshiping_herder]" value="yes" <?php if ($atcpw_comman['atcpw_freeshiping_herder'] == "yes" ) { echo 'checked="checked"'; } ?>>
                                        <strong>Basket Icon</strong>
                                    </td>
                                </tr>
                                <tr>
                                    <th>Show after Freeshipping Text in Header</th>
                                    <td>
                                        <input type="text" class="regular-text" name="atcpw_comman[atcpw_freeshiping_herder_txt]" value="<?php echo esc_attr($atcpw_comman['atcpw_freeshiping_herder_txt']); ?>" >
                                        <span class="ocwg_desc">Use tag <strong>{shipping_total}</strong> for Shipping rate</span>
                                                                            
                                    </td>
                                </tr>
                                <tr>
                                    <th>Show Freeshipping Text in Header</th>
                                    <td>
                                        <input type="text" class="regular-text" name="atcpw_comman[atcpw_freeshiping_then_herder_txt]" value="<?php echo esc_attr($atcpw_comman['atcpw_freeshiping_then_herder_txt']); ?>" >
                                        <span class="ocwg_desc">get Freeshipping text</span>
                                                                            
                                    </td>
                                </tr>
                            </table>
                        </div>
                        <div class="cover_div">
                            <h2>Cart Loop</h2>
                            <table class="data_table">
                                <tr>
                                    <th>Show in Loop</th>
                                    <td>
                                        <input type="checkbox" name="atcpw_comman[atcpw_loop_img]" value="yes" <?php if ($atcpw_comman['atcpw_loop_img'] == "yes" ) { echo 'checked="checked"'; } ?>>
                                        <strong>Product Image</strong><br/>
                                        <input type="checkbox" name="atcpw_comman[atcpw_loop_product_name]" value="yes" <?php if ($atcpw_comman['atcpw_loop_product_name'] == "yes" ) { echo 'checked="checked"'; } ?>>
                                        <strong>Product Name</strong><br/>
                                        <input type="checkbox" name="atcpw_comman[atcpw_loop_product_price]" value="yes" <?php if ($atcpw_comman['atcpw_loop_product_price'] == "yes" ) { echo 'checked="checked"'; } ?>>
                                        <strong>Product Price</strong><br/>
                                        <input type="checkbox" name="atcpw_comman[atcpw_loop_total]" value="yes" <?php if ($atcpw_comman['atcpw_loop_total'] == "yes" ) { echo 'checked="checked"'; } ?>>
                                        <strong>Product Total</strong><br/>
                                        <input type="checkbox" name="atcpw_comman[atcpw_loop_link]" value="yes" <?php if ($atcpw_comman['atcpw_loop_link'] == "yes" ) { echo 'checked="checked"'; } ?>>
                                        <strong>Link to Product Page</strong><br/>
                                        <input type="checkbox" name="atcpw_comman[atcpw_loop_delete]" value="yes" <?php if ($atcpw_comman['atcpw_loop_delete'] == "yes" ) { echo 'checked="checked"'; } ?>>
                                        <strong>Delete Product</strong><br/>
                                    </td>
                                </tr>

                                <tr>
                                    <th>Display Qty Box</th>
                                    <td>
                                        <input type="checkbox" name="atcpw_comman[atcpw_qty_box]" value="yes" <?php if ($atcpw_comman['atcpw_qty_box'] == "yes" ) { echo 'checked="checked"'; } ?>>
                                        <strong>Display Product Qty box.</strong>
                                    </td>
                                </tr>
                                
                            </table>
                        </div>
                        <div class="cover_div">
                            <h2>Footer Settings</h2>
                            <table class="data_table">
                                <tr>
                                    <th>Show Shipping Total </th>
                                    <td>
                                        <input type="checkbox" name="atcpw_comman[atcpw_total_shipping_option]" value="yes" <?php if ($atcpw_comman['atcpw_total_shipping_option'] == "yes" ) { echo 'checked="checked"'; } ?>>
                                        <strong>Show Shipping Total.</strong>
                                    </td>
                                </tr>
                                <tr>
                                    <th>Show Discount </th>
                                    <td>
                                        <input type="checkbox" name="atcpw_comman[atcpw_discount_show_cart]" value="yes" <?php if ($atcpw_comman['atcpw_discount_show_cart'] == "yes" ) { echo 'checked="checked"'; } ?>>
                                        <strong>Show Discount in cart</strong>
                                    </td>
                                </tr>
                                <tr>
                                    <th>Show Tax Total </th>
                                    <td>
                                        <input type="checkbox" name="atcpw_comman[atcpw_total_tax_option]" value="yes" <?php if ($atcpw_comman['atcpw_total_tax_option'] == "yes" ) { echo 'checked="checked"'; } ?>>
                                        <strong>Show Tax Total.</strong>
                                    </td>
                                </tr>
                                <tr>
                                    <th>Show All Total </th>
                                    <td>
                                        <input type="checkbox" name="atcpw_comman[atcpw_total_all_option]" value="yes" <?php if ($atcpw_comman['atcpw_total_all_option'] == "yes" ) { echo 'checked="checked"'; } ?>>
                                        <strong>Show All Total.</strong>
                                    </td>
                                </tr>
                                
                                
                                <tr>
                                    <th>Show ViewCart Button</th>
                                    <td>
                                        <input type="checkbox" name="atcpw_comman[atcpw_cart_option]" value="yes" <?php if ($atcpw_comman['atcpw_cart_option'] == "yes" ) { echo 'checked="checked"'; } ?>>
                                        <strong>Show Viewcart Button.</strong>
                                    </td>
                                </tr>
                                <tr>
                                    <th>Show Checkout Button</th>
                                    <td>
                                        <input type="checkbox" name="atcpw_comman[atcpw_checkout_option]" value="yes" <?php if ($atcpw_comman['atcpw_checkout_option'] == "yes" ) { echo 'checked="checked"'; } ?>>
                                        <strong>Show Checkout Button.</strong>
                                    </td>
                                </tr>
                                <tr>
                                    <th>Show Continue Shopping Button</th>
                                    <td>
                                        <input type="checkbox" name="atcpw_comman[atcpw_conshopping_option]" value="yes" <?php if ($atcpw_comman['atcpw_conshopping_option'] == "yes" ) { echo 'checked="checked"'; } ?>>
                                        <strong>Show Continue Shopping Button.</strong>
                                    </td>
                                </tr>
                                
                            </table>
                        </div>
                        <div class="cover_div">
                            <h2>Cart Product Slider</h2>
                            <table class="data_table">
                                 <tr>
                                    <th>Product Slider on Desktop</th>
                                    <td>
                                        <input type="checkbox" name="atcpw_comman[atcpw_prodslider_desktop]" value="yes" <?php if ($atcpw_comman['atcpw_prodslider_desktop'] == "yes" ) { echo 'checked="checked"'; } ?>>
                                        <strong>Enable Product Slider on Desktop</strong>
                                    </td>
                                </tr>
                                <tr>
                                    <th>Product Slider on Mobile</th>
                                    <td>
                                        <input type="checkbox" name="atcpw_comman[atcpw_prodslider_mobile]" value="yes" <?php if ($atcpw_comman['atcpw_prodslider_mobile'] == "yes" ) { echo 'checked="checked"'; } ?>>
                                        <strong>Enable Product Slider on Mobile</strong>
                                    </td>
                                </tr>

                                <tr>
                                    <th>Select Product</th>
                                    <td>
                                        <select id="atcpw_select_product" name="atcpw_select2[]" multiple="multiple" style="width:100%;max-width:15em;">
                                            <?php 
                                                $productsa = get_option('atcpw_select2');
                                                foreach ($productsa as $value) {
                                                    $productc = wc_get_product( $value );
                                                    if ( $productc && $productc->is_in_stock() && $productc->is_purchasable() ) {
                                                        $title = $productc->get_name();
                                                        ?>
                                                            <option value="<?php echo esc_attr($value); ?>" selected="selected"><?php echo $title; ?></option>
                                                        <?php   
                                                    }
                                                }
                                            ?>
                                       </select> 
                                    </td>
                                </tr>   
                            </table>
                        </div>
                        <div class="cover_div">
                            <h2>Cart basket</h2>
                            <table class="data_table">
                                <tr>
                                    <th>Enable </th>
                                    <td>
                                        <select name="atcpw_comman[atcpw_cart_show_hide]" class="regular-text">
                                                <option value="atcpw_cart_show" <?php if ($atcpw_comman['atcpw_cart_show_hide'] == "atcpw_cart_show" ) { echo 'selected'; } ?>>Always Show</option>
                                                <option value="atcpw_cart_hide" <?php if ($atcpw_comman['atcpw_cart_show_hide'] == "atcpw_cart_hide" ) { echo 'selected'; } ?>>Always Hide</option>
                                        </select>
                                    </td>
                                </tr>
                                <tr>
                                    <th>Cart Icon</th>
                                    <td>
                                        <input type="checkbox" name="atcpw_comman[atcpw_show_cart_icn]" value="yes" <?php if ($atcpw_comman['atcpw_show_cart_icn'] == "yes" ) { echo 'checked="checked"'; } ?>>
                                        <strong>Show Cart Icon</strong>
                                    </td>
                                </tr>   
                                <tr>
                                    <th>On Cart & Checkout Page</th>
                                    <td>
                                        <input type="checkbox" name="atcpw_comman[atcpw_cart_check_page]" value="yes" <?php if ($atcpw_comman['atcpw_cart_check_page'] == "yes" ) { echo 'checked="checked"'; } ?>>
                                        <strong>Show Cart Basket on cart and checkout pages.</strong>
                                    </td>
                                </tr>
                                <tr>
                                    <th>Cart on Mobile</th>
                                    <td>
                                        <input type="checkbox" name="atcpw_comman[atcpw_mobile]" value="yes" <?php if ($atcpw_comman['atcpw_mobile'] == "yes" ) { echo 'checked="checked"'; } ?>>
                                        <strong>Show Cart on mobile device.</strong>
                                    </td>
                                </tr> 
                                <tr>
                                    <th>Product Count</th>
                                    <td>
                                        <input type="checkbox" name="atcpw_comman[atcpw_product_cnt]" value="yes" <?php if ($atcpw_comman['atcpw_product_cnt'] == "yes" ) { echo 'checked="checked"'; } ?>>
                                        <strong>Show Product Count.</strong>
                                    </td>
                                </tr>

                                <tr>
                                    <th>Basket Count Type</th>
                                    <td>
                                        <select name="atcpw_comman[atcpw_product_cnt_type]" class="regular-text">
                                                <option value="sum_qty" <?php if ($atcpw_comman['atcpw_product_cnt_type'] == "sum_qty" ) { echo 'selected'; } ?>>Sum of Quantity of all the products</option>
                                                <option value="num_qty" <?php if ($atcpw_comman['atcpw_product_cnt_type'] == "num_qty" ) { echo 'selected'; } ?>>Number of products</option>
                                        </select>
                                    </td>
                                </tr> 
                                <tr>
                                    <th>Basket Product ordering</th>
                                    <td>
                                        <select name="atcpw_comman[atcpw_cart_ordering]" class="regular-text">
                                                <option value="asc" <?php if ($atcpw_comman['atcpw_cart_ordering'] == "asc" ) { echo 'selected'; } ?>>Recently added item at last (Asc)</option>
                                                <option value="desc" <?php if ($atcpw_comman['atcpw_cart_ordering'] == "desc" ) { echo 'selected'; } ?>>Recently added item on top (Desc)</option>
                                        </select>
                                    </td>
                                </tr> 
                                <tr>
                                    <th>Hide Basket Pages</th>
                                    <td>
                                        <input type="text" class="regular-text" name="atcpw_comman[atcpw_on_pages]" value="<?php echo esc_attr($atcpw_comman['atcpw_on_pages']); ?>">
                                        <strong>Do not show basket on pages.</strong>
                                        <strong>Use page id separated by comma. For eg: 31,41,51</strong>
                                    </td>
                                </tr> 
                            </table>
                        </div> 
                        <div class="cover_div">
                            <table class="data_table">
                                <h2>All Urls Set</h2>
                                <tr>
                                    <th>Continue Shopping Button Link</th>
                                    <td>
                                        <input type="text" class="regular-text" placeholder="Add Link For Countinue Shopping" name="atcpw_comman[atcpw_conshipping_link]" value="<?php echo esc_attr($atcpw_comman['atcpw_conshipping_link']); ?>">
                                        <strong>Use "#" for the same page</strong>
                                    </td>
                                </tr>
                                <tr>
                                    <th>Custom Cart Button Link</th>
                                    <td>
                                        <input type="text" class="regular-text" placeholder="Add Link For Cart Button" name="atcpw_comman[atcpw_orgcart_link]" value="<?php echo esc_attr($atcpw_comman['atcpw_orgcart_link']); ?>">
                                        <strong>if is empty then going cart page</strong>
                                    </td>
                                </tr>
                                <tr>
                                    <th>Custom checkout Button Link</th>
                                    <td>
                                        <input type="text" class="regular-text" placeholder="Add Link For Checkout Button" name="atcpw_comman[atcpw_orgcheckout_link]" value="<?php echo esc_attr($atcpw_comman['atcpw_orgcheckout_link']); ?>">
                                        <strong>if is empty then going checkout page</strong>
                                    </td>
                                </tr>
                                
                            </table>
                        </div>  
                    </div>
                    <div id="atcpw-tab-other" class="tab-content">
                        <div class="cover_div">
                            <h2>Header Setting</h2>
                            <table class="data_table">
                                <tr>
                                    <th>Header Font Size</th>
                                    <td>
                                        <input type="number" class="regular-text" name="atcpw_comman[atcpw_head_ft_size]" value="<?php echo esc_attr($atcpw_comman['atcpw_head_ft_size']); ?>">
                                    </td>
                                </tr>
                                <tr>
                                    <th>Header Font Color</th>
                                    <td>
                                        <input type="text" class="color-picker" data-alpha="true" data-default-color="<?php echo esc_attr($atcpw_comman['atcpw_head_ft_clr']); ?>" name="atcpw_comman[atcpw_head_ft_clr]" value="<?php echo esc_attr($atcpw_comman['atcpw_head_ft_clr']); ?>"/>
                                    </td>
                                </tr>
                                <tr>
                                    <th>Header cart icon</th>
                                    <td class="ocwqv_icon_choice">
                                            
                                            <input type="radio" name="atcpw_comman[oatcpw_shop_icon]" id="shop_icon_1" value="shop_icon_1" <?php if ($atcpw_comman['oatcpw_shop_icon'] == "shop_icon_1" ) { echo 'checked'; } ?>>
                                            <label for="shop_icon_1">
                                                <span class="shop_icon shop_icon_1"></span>
                                            </label>
                    
                                            <input type="radio" name="atcpw_comman[oatcpw_shop_icon]" id="shop_icon_2" value="shop_icon_2" <?php if ($atcpw_comman['oatcpw_shop_icon'] == "shop_icon_2" ) { echo 'checked'; } ?>>
                                            <label for="shop_icon_2">
                                                <span class="shop_icon shop_icon_2"></span>
                                            </label>

                                            <input type="radio" name="atcpw_comman[oatcpw_shop_icon]" id="shop_icon_3" value="shop_icon_3"  <?php if ($atcpw_comman['oatcpw_shop_icon'] == "shop_icon_3" ) { echo 'checked'; } ?>>
                                            <label for="shop_icon_3">
                                                <span class="shop_icon shop_icon_3"></span>
                                            </label>
                                        
                                            <input type="radio" name="atcpw_comman[oatcpw_shop_icon]" id="shop_icon_4" value="shop_icon_4" <?php if ($atcpw_comman['oatcpw_shop_icon'] == "shop_icon_4" ) { echo 'checked'; } ?>>
                                            <label for="shop_icon_4">
                                                <span class="shop_icon shop_icon_4"></span>
                                            </label>

                                            <input type="radio" name="atcpw_comman[oatcpw_shop_icon]" id="shop_icon_5" value="shop_icon_5"  <?php if ($atcpw_comman['oatcpw_shop_icon'] == "shop_icon_5" ) { echo 'checked'; } ?>>
                                            <label for="shop_icon_5">
                                                <span class="shop_icon shop_icon_5"></span>
                                            </label> 

                                            <input type="radio" name="atcpw_comman[oatcpw_shop_icon]" id="shop_icon_6" value="shop_icon_6"  <?php if ($atcpw_comman['oatcpw_shop_icon'] == "shop_icon_6" ) { echo 'checked'; } ?>>
                                            <label for="shop_icon_6">
                                                <span class="shop_icon shop_icon_6"></span>
                                            </label>
                                    </td>
                                    
                                </tr>
                                <tr>
                                    <th>Header cart icon Color</th>
                                    <td>
                                        <input type="text" class="color-picker" data-alpha="true" data-default-color="<?php echo esc_attr($atcpw_comman['atcpw_header_cart_icon_clr']); ?>" name="atcpw_comman[atcpw_header_cart_icon_clr]" value="<?php echo esc_attr($atcpw_comman['atcpw_header_cart_icon_clr']); ?>"/>
                                    </td>
                                </tr>
                                <tr>
                                    <th>Header cart icon</th>
                                    <td class="ocwqv_icon_choice_close">
                                            
                                            <input type="radio" name="atcpw_comman[oatcpw_close_icon]" id="close_icon" value="close_icon" <?php if ($atcpw_comman['oatcpw_close_icon'] == "close_icon" ) { echo 'checked'; } ?>>
                                            <label for="close_icon">
                                                <span class="close_icons close_icon"></span>
                                            </label>
                    
                                            <input type="radio" name="atcpw_comman[oatcpw_close_icon]" id="close_icon_1" value="close_icon_1" <?php if ($atcpw_comman['oatcpw_close_icon'] == "close_icon_1" ) { echo 'checked'; } ?>>
                                            <label for="close_icon_1">
                                                <span class="close_icons close_icon_1"></span>
                                            </label>

                                            <input type="radio" name="atcpw_comman[oatcpw_close_icon]" id="close_icon_2" value="close_icon_2"  <?php if ($atcpw_comman['oatcpw_close_icon'] == "close_icon_2" ) { echo 'checked'; } ?>>
                                            <label for="close_icon_2">
                                                <span class="close_icons close_icon_2"></span>
                                            </label>
                                        
                                            <input type="radio" name="atcpw_comman[oatcpw_close_icon]" id="close_icon_3" value="close_icon_3" <?php if ($atcpw_comman['oatcpw_close_icon'] == "close_icon_3" ) { echo 'checked'; } ?>>
                                            <label for="close_icon_3">
                                                <span class="close_icons close_icon_3"></span>
                                            </label>

                                            <input type="radio" name="atcpw_comman[oatcpw_close_icon]" id="close_icon_4" value="close_icon_4"  <?php if ($atcpw_comman['oatcpw_close_icon'] == "close_icon_4" ) { echo 'checked'; } ?>>
                                            <label for="close_icon_4">
                                                <span class="close_icons close_icon_4"></span>
                                            </label> 
                                            <input type="radio" name="atcpw_comman[oatcpw_close_icon]" id="close_icon_5" value="close_icon_5"  <?php if ($atcpw_comman['oatcpw_close_icon'] == "close_icon_5" ) { echo 'checked'; } ?>>
                                            <label for="close_icon_5">
                                                <span class="close_icons close_icon_5"></span>
                                            </label> 

                                    </td>
                                    
                                </tr>
                                 <tr>
                                    <th>Header Close icon Color</th>
                                    <td>
                                        <input type="text" class="color-picker" data-alpha="true" data-default-color="<?php echo esc_attr($atcpw_comman['atcpw_header_close_icon_clr']); ?>" name="atcpw_comman[atcpw_header_close_icon_clr]" value="<?php echo esc_attr($atcpw_comman['atcpw_header_close_icon_clr']); ?>"/>
                                    </td>
                                </tr>

                                <tr>
                                    <th>Show Freeshipping Text in Header color</th>
                                    <td>
                                        <input type="text" class="color-picker" data-alpha="true" data-default-color="<?php echo esc_attr($atcpw_comman['atcpw_header_shipping_text_color']); ?>" name="atcpw_comman[atcpw_header_shipping_text_color]" value="<?php echo esc_attr($atcpw_comman['atcpw_header_shipping_text_color']); ?>"/>
                                    </td>
                                </tr>
                                

                            </table>
                        </div>
                        <div class="cover_div">
                            <h2>Cart Loop Setting</h2>
                            <table class="data_table">
                                <tr>
                                    <th>Product Title Font Size</th>
                                    <td>
                                        <input type="number" class="regular-text" name="atcpw_comman[atcpw_product_ft_size]" value="<?php echo esc_attr($atcpw_comman['atcpw_product_ft_size']); ?>">
                                    </td>
                                </tr>
                                <tr>
                                    <th>Product Title Font Color</th>
                                    <td>
                                        <input type="text" class="color-picker" data-alpha="true" data-default-color="<?php echo esc_attr($atcpw_comman['atcpw_product_ft_clr']); ?>" name="atcpw_comman[atcpw_product_ft_clr]" value="<?php echo esc_attr($atcpw_comman['atcpw_product_ft_clr']); ?>"/>
                                    </td>
                                </tr>
                            </table>
                        </div>
                         <div class="cover_div">
                            <h2>Empty Cart</h2>
                            <table class="data_table">
                                <tr>
                                    <th>Cart Empty show/hide all cart detail</th>
                                    <td>
                                        <select name="atcpw_comman[atcpw_cart_empty_hide_show]" class="regular-text">
                                                <option value="show" <?php if ($atcpw_comman['atcpw_cart_empty_hide_show'] == "show" ) { echo 'selected'; } ?>>Show All Detail</option>
                                                <option value="hide" <?php if ($atcpw_comman['atcpw_cart_empty_hide_show'] == "hide" ) { echo 'selected'; } ?>>Hide All Detail</option>
                                        </select>
                                    </td>
                                </tr>
                            
                            </table>
                        </div>
                        <div class="cover_div">
                            <h2>Popup cart</h2>
                            <table class="data_table">
                                <tr>
                                    <td>
                                        <h3>Delete Setting</h3>
                                    </td>
                                </tr>
                                <tr>
                                    <th>Delete Icons</th>
                                    <td class="ocwqv_icon_choice">
                                            <input type="radio" name="atcpw_comman[oatcpw_delete_icon]" value="ocpc_trash" <?php if ($atcpw_comman['oatcpw_delete_icon'] == "ocpc_trash" ) { echo 'checked'; } ?>>
                                            <label>
                                                <span class="ocpc_trashs ocpc_trash"></span>
                                            </label>
                                            <input type="radio" name="atcpw_comman[oatcpw_delete_icon]" value="trash_1" <?php if ($atcpw_comman['oatcpw_delete_icon'] == "trash_1" ) { echo 'checked'; } ?>>
                                            <label>
                                                <span class="ocpc_trashs trash_1"></span>
                                            </label>
                    
                                            <input type="radio" name="atcpw_comman[oatcpw_delete_icon]" value="trash_2" <?php if ($atcpw_comman['oatcpw_delete_icon'] == "trash_2" ) { echo 'checked'; } ?>>
                                            <label>
                                                <span class="ocpc_trashs trash_2"></span>
                                            </label>

                                            <input type="radio" name="atcpw_comman[oatcpw_delete_icon]" value="trash_3"  <?php if ($atcpw_comman['oatcpw_delete_icon'] == "trash_3" ) { echo 'checked'; } ?>>
                                            <label>
                                                <span class="ocpc_trashs trash_3"></span>
                                            </label>
                                        
                                            <input type="radio" name="atcpw_comman[oatcpw_delete_icon]" value="trash_4" <?php if ($atcpw_comman['oatcpw_delete_icon'] == "trash_4" ) { echo 'checked'; } ?>>
                                            <label>
                                                <span class="ocpc_trashs trash_4"></span>
                                            </label>

                                            <input type="radio" name="atcpw_comman[oatcpw_delete_icon]" value="trash_5"  <?php if ($atcpw_comman['oatcpw_delete_icon'] == "trash_5" ) { echo 'checked'; } ?>>
                                            <label>
                                                <span class="ocpc_trashs trash_5"></span>
                                            </label> 

                                            <input type="radio" name="atcpw_comman[oatcpw_delete_icon]" value="trash_6"  <?php if ($atcpw_comman['oatcpw_delete_icon'] == "trash_6" ) { echo 'checked'; } ?>>
                                            <label>
                                                <span class="ocpc_trashs trash_6"></span>
                                            </label>
                                    </td>
                                </tr>
                                <tr>
                                    <th>Delete icon Color</th>
                                    <td>
                                        <input type="text" class="color-picker" data-alpha="true" data-default-color="<?php echo esc_attr($atcpw_comman['atcpw_delect_icon_clr']); ?>" name="atcpw_comman[atcpw_delect_icon_clr]" value="<?php echo esc_attr($atcpw_comman['atcpw_delect_icon_clr']); ?>"/>
                                    </td>
                                </tr>
                                <tr>
                                    <td>
                                        <h3>Slider Product Settings</h3>
                                    </td>
                                </tr>
                                <tr>
                                    <th>Product Font Size</th>
                                    <td>
                                        <input type="number" class="regular-text" name="atcpw_comman[atcpw_sld_product_ft_size]" value="<?php echo esc_attr($atcpw_comman['atcpw_sld_product_ft_size']); ?>">
                                    </td>
                                </tr>
                                <tr>
                                    <th>Product Font Color</th>
                                    <td>
                                        <input type="text" class="color-picker" data-alpha="true" data-default-color="<?php echo esc_attr($atcpw_comman['atcpw_sld_product_ft_clr']); ?>" name="atcpw_comman[atcpw_sld_product_ft_clr]" value="<?php echo esc_attr($atcpw_comman['atcpw_sld_product_ft_clr']); ?>"/>
                                    </td>
                                </tr>
                            </table>
                        </div>
                        <div class="cover_div">
                            <h2>Shipping Text Customize</h2>
                            <table class="data_table">
                                 <tr>
                                    <th>Shipping Text</th>
                                    <td>
                                        <input type="text" class="regular-text" name="atcpw_comman[atcpw_ship_txt]" value="<?php echo esc_attr($atcpw_comman['atcpw_ship_txt']); ?>">
                                    </td>
                                </tr>
                                <tr>
                                    <th>Shipping Text Font Size</th>
                                    <td>
                                        <input type="number" class="regular-text" name="atcpw_comman[atcpw_ship_ft_size]" value="<?php echo esc_attr($atcpw_comman['atcpw_ship_ft_size']); ?>">
                                    </td>
                                </tr>
                                <tr>
                                    <th>Shipping Text Font Color</th>
                                    <td>
                                        <input type="text" class="color-picker" data-alpha="true" data-default-color="<?php echo esc_attr($atcpw_comman['atcpw_ship_ft_clr']); ?>" name="atcpw_comman[atcpw_ship_ft_clr]" value="<?php echo esc_attr($atcpw_comman['atcpw_ship_ft_clr']); ?>"/>
                                    </td>
                                </tr>
                            </table>
                        </div>

                        <div class="cover_div">
                            <h2>Footer Button Settings</h2>
                            <table class="data_table">
                                <tr>
                                    <th>Footer Buttons Color</th>
                                    <td>
                                        <input type="text" class="color-picker" data-alpha="true" data-default-color="<?php echo esc_attr($atcpw_comman['atcpw_ft_btn_clr']); ?>" name="atcpw_comman[atcpw_ft_btn_clr]" value="<?php echo esc_attr($atcpw_comman['atcpw_ft_btn_clr']); ?>"/>
                                    </td>
                                </tr>
                                <tr>
                                    <th>Footer Buttons Text Color</th>
                                    <td>
                                        <input type="text" class="color-picker" data-alpha="true" data-default-color="<?php echo esc_attr($atcpw_comman['atcpw_ft_btn_txt_clr']); ?>" name="atcpw_comman[atcpw_ft_btn_txt_clr]" value="<?php echo esc_attr($atcpw_comman['atcpw_ft_btn_txt_clr']); ?>"/>
                                    </td>
                                </tr>
                                <tr>
                                    <th>Footer Buttons Margin</th>
                                    <td>
                                        <input type="number" class="regular-text" name="atcpw_comman[atcpw_ft_btn_mrgin]" value="<?php echo esc_attr($atcpw_comman['atcpw_ft_btn_mrgin']); ?>">
                                    </td>
                                </tr>
                            </table>
                        </div>              
                        <div class="cover_div">
                            <h2>Cart basket</h2>
                            <table class="data_table">
                                <tr>
                                        <th>Popup cart Basket Icon</th>

                                        <td class="ocwqv_icon_choice">
                                            <input type="radio" name="atcpw_comman[ocpc_atcpw_icon]" value="atcpw_qatcpw_icon" <?php if ($atcpw_comman['ocpc_atcpw_icon'] == "atcpw_qatcpw_icon" ) { echo 'checked'; } ?>>
                                            <label>
                                                <span class="atcpw_qatcpw_icons atcpw_qatcpw_icon"></span>
                                            </label>
                                            <input type="radio" name="atcpw_comman[ocpc_atcpw_icon]" value="ocpc_atcpw_icon_1" <?php if ($atcpw_comman['ocpc_atcpw_icon'] == "ocpc_atcpw_icon_1" ) { echo 'checked'; } ?>>
                                            <label>
                                                <span class="atcpw_qatcpw_icons ocpc_atcpw_icon_1"></span>
                                            </label>
                    
                                            <input type="radio" name="atcpw_comman[ocpc_atcpw_icon]" value="ocpc_atcpw_icon_4" <?php if ($atcpw_comman['ocpc_atcpw_icon'] == "ocpc_atcpw_icon_4" ) { echo 'checked'; } ?>>
                                            <label>
                                                <span class="atcpw_qatcpw_icons ocpc_atcpw_icon_4"></span>
                                            </label>

                                            <input type="radio" name="atcpw_comman[ocpc_atcpw_icon]" value="ocpc_atcpw_icon_2"  <?php if ($atcpw_comman['ocpc_atcpw_icon'] == "ocpc_atcpw_icon_2" ) { echo 'checked'; } ?>>
                                            <label>
                                                <span class="atcpw_qatcpw_icons ocpc_atcpw_icon_2"></span>
                                            </label>
                                        
                                            <input type="radio" name="atcpw_comman[ocpc_atcpw_icon]" value="ocpc_atcpw_icon_5" <?php if ($atcpw_comman['ocpc_atcpw_icon'] == "ocpc_atcpw_icon_5" ) { echo 'checked'; } ?>>
                                            <label>
                                                <span class="atcpw_qatcpw_icons ocpc_atcpw_icon_5"></span>
                                            </label>

                                            <input type="radio" name="atcpw_comman[ocpc_atcpw_icon]" value="ocpc_atcpw_icon_3"  <?php if ($atcpw_comman['ocpc_atcpw_icon'] == "ocpc_atcpw_icon_3" ) { echo 'checked'; } ?>>
                                            <label>
                                                <span class="atcpw_qatcpw_icons ocpc_atcpw_icon_3"></span>
                                            </label> 

                                            <input type="radio" name="atcpw_comman[ocpc_atcpw_icon]" value="ocpc_atcpw_icon_6"  <?php if ($atcpw_comman['ocpc_atcpw_icon'] == "ocpc_atcpw_icon_6" ) { echo 'checked'; } ?>>
                                            <label>
                                                <span class="atcpw_qatcpw_icons ocpc_atcpw_icon_6"></span>
                                            </label>
                                        </td>
                                </tr>
                                <tr>
                                    <th>Popup cart Basket Shape</th>
                                    <td>
                                        <select name="atcpw_comman[atcpw_basket_shape]" class="regular-text">
                                            <option value="square" <?php  if($atcpw_comman['atcpw_basket_shape'] == "square" || empty($atcpw_comman['atcpw_basket_shape'])){ echo "selected"; } ?>>Square</option>
                                            <option value="round" <?php if($atcpw_comman['atcpw_basket_shape'] == "round"){ echo "selected"; } ?>>Round</option>
                                            
                                        </select>
                                    </td>
                                </tr> 
                                <tr>
                                    <th>Basket Position</th>
                                    <td>
                                        <select name="atcpw_comman[atcpw_basket_position]" class="regular-text">
                                            <option value="top-left" <?php if($atcpw_comman['atcpw_basket_position'] == "top-left"){ echo "selected"; } ?>>Top Left</option>
                                            <option value="top-right" <?php if($atcpw_comman['atcpw_basket_position'] == "top-right"){ echo "selected"; } ?>>Top Right</option>
                                            <option value="bottom-left" <?php  if($atcpw_comman['atcpw_basket_position'] == "bottom-left" || empty($atcpw_comman['atcpw_basket_position'])){ echo "selected"; } ?>>Bottom Left</option>
                                            <option value="bottom-right" <?php  if($atcpw_comman['atcpw_basket_position'] == "bottom-right" || empty($atcpw_comman['atcpw_basket_position'])){ echo "selected"; } ?>>Bottom Right</option>
                                        </select>
                                    </td>
                                </tr> 
                                <tr>
                                    <th>Basket Count  Position</th>
                                    <td>
                                        <select name="atcpw_comman[atcpw_basket_count_position]" class="regular-text">
                                            <option value="top-left" <?php if($atcpw_comman['atcpw_basket_count_position'] == "top"){ echo "selected"; } ?>>Top Left</option>
                                            <option value="bottom-right" <?php  if($atcpw_comman['atcpw_basket_count_position'] == "bottom-right" || empty($atcpw_comman['atcpw_basket_count_position'])){ echo "selected"; } ?>>Bottom Right</option>
                                            <option value="bottom-left" <?php if($atcpw_comman['atcpw_basket_count_position'] == "bottom-left"){ echo "selected"; } ?>>Bottom Left</option>
                                            <option value="top-right" <?php  if($atcpw_comman['atcpw_basket_count_position'] == "top-right" || empty($atcpw_comman['atcpw_basket_count_position'])){ echo "selected"; } ?>>Top-right</option>
                                        </select>
                                    </td>
                                </tr>     
                                
                               
                                <tr>
                                    <th>Basket Icon Size</th>
                                    <td>
                                        <input type="number" class="regular-text" name="atcpw_comman[atcpw_basket_icn_size]" value="<?php echo esc_attr($atcpw_comman['atcpw_basket_icn_size']); ?>">
                                    </td>
                                </tr> 
                                <tr>
                                    <th>Basket Offset ↨</th>
                                    <td>
                                       <input type="number" class="regular-text" name="atcpw_comman[atcpw_basket_off_vertical]" value="<?php echo esc_attr($atcpw_comman['atcpw_basket_off_vertical']); ?>">
                                    </td>
                                </tr>
                                <tr>
                                    <th>Basket Offset ⟷</th>
                                    <td>
                                       <input type="number" class="regular-text" name="atcpw_comman[atcpw_basket_off_horizontal]" value="<?php echo esc_attr($atcpw_comman['atcpw_basket_off_horizontal']); ?>">
                                    </td>
                                </tr>

                                <tr>
                                    <th>Basket Background Color</th>
                                    <td>
                                        <input type="text" class="color-picker" data-alpha="true" data-default-color="<?php echo esc_attr($atcpw_comman['atcpw_basket_bg_clr']); ?>" name="atcpw_comman[atcpw_basket_bg_clr]" value="<?php echo esc_attr($atcpw_comman['atcpw_basket_bg_clr']); ?>"/>
                                    </td>

                                </tr>
                                <tr>
                                    <th>Basket Color</th>
                                    <td>
                                        <input type="text" class="color-picker" data-alpha="true" data-default-color="<?php echo esc_attr($atcpw_comman['atcpw_basket_clr']); ?>" name="atcpw_comman[atcpw_basket_clr]" value="<?php echo esc_attr($atcpw_comman['atcpw_basket_clr']); ?>"/>
                                    </td>

                                </tr>
                                <tr>
                                    <th>Count Background Color</th>
                                    <td>
                                        <input type="text" class="color-picker" data-alpha="true" data-default-color="<?php echo esc_attr($atcpw_comman['atcpw_cnt_bg_clr']); ?>" name="atcpw_comman[atcpw_cnt_bg_clr]" value="<?php echo esc_attr($atcpw_comman['atcpw_cnt_bg_clr']); ?>"/>
                                    </td>
                                </tr> 
                                <tr>
                                    <th>Count Text Color</th>
                                    <td>
                                        <input type="text" class="color-picker" data-alpha="true" data-default-color="<?php echo esc_attr($atcpw_comman['atcpw_cnt_txt_clr']); ?>" name="atcpw_comman[atcpw_cnt_txt_clr]" value="<?php echo esc_attr($atcpw_comman['atcpw_cnt_txt_clr']); ?>"/>
                                    </td>
                                </tr>
                                <tr>
                                    <th>Count Text Size</th>
                                    <td>
                                        <input type="number" class="regular-text" name="atcpw_comman[atcpw_cnt_txt_size]" value="<?php echo esc_attr($atcpw_comman['atcpw_cnt_txt_size']); ?>">
                                    </td>
                                </tr> 
                                
                            </table>
                        </div>
                    </div>
                    <div id="atcpw-tab-translations" class="tab-content">
                        <div class="cover_div">
                            <h2>Translations</h2>
                            <table class="data_table">
                                <tr>
                                    <td>
                                        <h3>Title Settings</h3>
                                    </td>
                                </tr>
                                <tr>
                                    <th>Head Title</th>
                                    <td>
                                        <input type="text" class="regular-text" name="atcpw_comman[atcpw_head_title]" value="<?php echo esc_attr($atcpw_comman['atcpw_head_title']); ?>">
                                    </td>
                                </tr>
                                <tr>
                                    <th>QTY Text</th>
                                    <td>
                                        <input type="text" class="regular-text" name="atcpw_comman[atcpw_qty_text]" value="<?php echo esc_attr($atcpw_comman['atcpw_qty_text']); ?>">
                                    </td>
                                </tr>
                                <tr>
                                    <th>Cart is empty Text</th>
                                    <td>
                                        <input type="text" class="regular-text" name="atcpw_comman[atcpw_cart_is_empty]" value="<?php echo esc_attr($atcpw_comman['atcpw_cart_is_empty']); ?>">
                                    </td>
                                </tr>
                                <tr>
                                    <td>
                                        <h3>Product Slider Settings</h3>
                                    </td>
                                </tr>
                                <tr>
                                    <th>Add to Cart Button Text</th>
                                    <td>
                                        <input type="text" class="regular-text" name="atcpw_comman[atcpw_slider_atcbtn_txt]" value="<?php echo esc_attr($atcpw_comman['atcpw_slider_atcbtn_txt']); ?>">
                                    </td>
                                </tr>
                                <tr>
                                    <th>View Options Button Text</th>
                                    <td>
                                        <input type="text" class="regular-text" name="atcpw_comman[atcpw_slider_vwoptbtn_txt]" value="<?php echo esc_attr($atcpw_comman['atcpw_slider_vwoptbtn_txt']); ?>">
                                    </td>
                                </tr>
                                <tr>
                                    <th>Slider Hedding Text</th>
                                    <td>
                                        <input type="text" class="regular-text" name="atcpw_comman[atcpw_slider_heading_text]" value="<?php echo esc_attr($atcpw_comman['atcpw_slider_heading_text']); ?>">
                                    </td>
                                </tr>
                                <tr>
                                    <td>
                                        <h3>Cart Footer Settings</h3>
                                    </td>
                                </tr>
                                <tr>
                                    <th>Subtotal Text</th>
                                    <td>
                                        <input type="text" class="regular-text" name="atcpw_comman[atcpw_subtotal_txt]" value="<?php echo esc_attr($atcpw_comman['atcpw_subtotal_txt']); ?>">
                                    </td>
                                </tr>
                                <tr>
                                    <th>Empty Cart Button Text</th>
                                    <td>
                                        <input type="text" class="regular-text" name="atcpw_comman[atcpw_empty_cart_button_text]" value="<?php echo esc_attr($atcpw_comman['atcpw_empty_cart_button_text']); ?>">
                                    </td>
                                </tr>
                                <tr>
                                    <th>View Cart Button Text</th>
                                    <td>
                                        <input type="text" class="regular-text" name="atcpw_comman[atcpw_cart_txt]" value="<?php echo esc_attr($atcpw_comman['atcpw_cart_txt']); ?>">
                                    </td>
                                </tr>
                                <tr>
                                    <th>Checkout Button Text</th>
                                    <td>
                                        <input type="text" class="regular-text" name="atcpw_comman[atcpw_checkout_txt]" value="<?php echo esc_attr($atcpw_comman['atcpw_checkout_txt']); ?>">
                                    </td>
                                </tr>
                                <tr>
                                    <th>Continue Shopping Button Text</th>
                                    <td>
                                        <input type="text" class="regular-text" name="atcpw_comman[atcpw_conshipping_txt]" value="<?php echo esc_attr($atcpw_comman['atcpw_conshipping_txt']); ?>">
                                    </td>
                                </tr>
                                <tr>
                                    <th>Shipping</th>
                                    <td>
                                        <input type="text" class="regular-text" name="atcpw_comman[atcpw_shipping_text_trans]" value="<?php echo esc_attr($atcpw_comman['atcpw_shipping_text_trans']); ?>">
                                    </td>
                                </tr>
                                <tr>
                                    <th>Tax</th>
                                    <td>
                                        <input type="text" class="regular-text" name="atcpw_comman[atcpw_apply_taxt_testx]" value="<?php echo esc_attr($atcpw_comman['atcpw_apply_taxt_testx']); ?>">
                                    </td>
                                </tr>
                                 <tr>
                                    <th>Discount Text</th>
                                    <td>
                                        <input type="text" class="regular-text" name="atcpw_comman[atcpw_discount_text_trans]" value="<?php echo esc_attr($atcpw_comman['atcpw_discount_text_trans']); ?>">
                                    </td>
                                </tr>
                                <tr>
                                    <th>Total</th>
                                    <td>
                                        <input type="text" class="regular-text" name="atcpw_comman[atcpw_apply_total_text]" value="<?php echo esc_attr($atcpw_comman['atcpw_apply_total_text']); ?>">
                                    </td>
                                </tr>

                            </table>
                        </div>
                    </div>
                    <input type="hidden" name="action" value="atcpw_save_option">
                    <input type="submit" value="Save changes" name="submit" class="button-primary" id="atcpw-btn-space">
                </form>  
            </div>
            <?php
        }

        function atcpw_recursive_sanitize_text_field($array) {  
            if(!empty($array)) {
                foreach ( $array as $key => $value ) {
                    if ( is_array( $value ) ) {
                        $value = $this->atcpw_recursive_sanitize_text_field($value);
                    }else{
                        $value = sanitize_text_field( $value );
                    }
                }
            }
            return $array;
        }

        function atcpw_save_options() {
            if( current_user_can('administrator') ) {
                if(isset($_REQUEST['action']) && $_REQUEST['action'] == 'atcpw_save_option') {
                    if(!isset( $_POST['atcpw_nonce_field'] ) || !wp_verify_nonce( $_POST['atcpw_nonce_field'], 'atcpw_nonce_action' ) ){
                        print 'Sorry, your nonce did not verify.';
                        exit;
                    } else {
                        if(!empty($_REQUEST['atcpw_comman'])){
                            $isecheckbox = array(
                                'atcpw_header_cart_icon',
                                'atcpw_header_close_icon',
                                'atcpw_freeshiping_herder',
                                'atcpw_loop_img',
                                'atcpw_loop_product_name',
                                'atcpw_loop_product_price',
                                'atcpw_loop_total',
                                'atcpw_loop_link',
                                'atcpw_loop_delete',
                                'atcpw_auto_open',
                                'atcpw_trigger_class',
                                'atcpw_ajax_cart',
                                'atcpw_qty_box',
                                'atcpw_total_shipping_option',
                                'atcpw_discount_show_cart',
                                'atcpw_total_tax_option',
                                'atcpw_total_all_option',
                                'atcpw_cart_option',
                                'atcpw_checkout_option',
                                'atcpw_conshopping_option',
                                'atcpw_prodslider_desktop',
                                'atcpw_prodslider_mobile',
                                'atcpw_show_cart_icn',
                                'atcpw_cart_check_page',
                                'atcpw_mobile',
                                'atcpw_product_cnt',

                            );

                            foreach ($isecheckbox as $key_isecheckbox => $value_isecheckbox) {
                                if(!isset($_REQUEST['atcpw_comman'][$value_isecheckbox])){
                                    $_REQUEST['atcpw_comman'][$value_isecheckbox] ='no';
                                }
                            }
                            
                            foreach ($_REQUEST['atcpw_comman'] as $key_atcpw_comman => $value_atcpw_comman) {
                                update_option($key_atcpw_comman, sanitize_text_field($value_atcpw_comman), 'yes');
                            }
                        }

                        if(isset($_REQUEST['atcpw_select2'])) {
                            $atcpw_select2 = $this->atcpw_recursive_sanitize_text_field($_REQUEST['atcpw_select2'] );
                            update_option('atcpw_select2', $atcpw_select2, 'yes');
                        }


                        wp_redirect( admin_url( '/admin.php?page=add-to-cart-popup' ) );
                        exit;
                    }
                }
            }
        }

        function atcpw_product_ajax() {
          
            $return = array();
            $post_types = array( 'product','product_variation');

            $search_results = new WP_Query( array( 
                's'=> sanitize_text_field($_GET['q']),
                'post_status' => 'publish',
                'post_type' => $post_types,
                'posts_per_page' => -1,
                'meta_query' => array(
                    array(
                        'key' => '_stock_status',
                        'value' => 'instock',
                        'compare' => '=',
                    )
                )
            ));
             

            if( $search_results->have_posts() ) :
               while( $search_results->have_posts() ) : $search_results->the_post();   
                  $productc = wc_get_product( $search_results->post->ID );
                  if ( $productc && $productc->is_in_stock() && $productc->is_purchasable() ) {
                     $title = $search_results->post->post_title;
                     $price = $productc->get_price_html();
                     $return[] = array( $search_results->post->ID, $title, $price);   
                  }
               endwhile;
            endif;
            echo json_encode( $return );
            die;
        }

        function ATCPW_support_and_rating_notice() {
            $screen = get_current_screen();
            // print_r($screen);
            if( 'add-to-cart-popup' == $screen->parent_file) {
                ?>
                <div class="atcpw_ratess_open">
                    <div class="atcpw_rateus_notice">
                        <div class="atcpw_rtusnoti_left">
                            <h3>Rate Us</h3>
                            <label>If you like our plugin, </label>
                            <a target="_blank" href="#">
                                <label>Please vote us</label>
                            </a>
                            <label>, so we can contribute more features for you.</label>
                        </div>
                        <div class="atcpw_rtusnoti_right">
                            <img src="<?php echo ATCPW_PLUGIN_DIR;?>/assets/images/review.png" class="atcpw_review_icon">
                        </div>
                    </div>
                    <div class="atcpw_support_notice">
                        <div class="atcpw_rtusnoti_left">
                            <h3>Having Issues?</h3>
                            <label>You can contact us at</label>
                            <a target="_blank" href="https://xthemeshop.com/contact/">
                                <label>Our Support Forum</label>
                            </a>
                        </div>
                        <div class="atcpw_rtusnoti_right">
                            <img src="<?php echo ATCPW_PLUGIN_DIR;?>/assets/images/support.png" class="atcpw_review_icon">
                        </div>
                    </div>
                </div>
                <div class="atcpw_donate_main">
                   <img src="<?php echo ATCPW_PLUGIN_DIR;?>/assets/images/coffee.svg">
                   <h3>Buy me a Coffee !</h3>
                   <p>If you like this plugin, buy me a coffee and help support this plugin !</p>
                   <div class="atcpw_donate_form">
                      <a class="button button-primary ocwg_donate_btn" href="https://www.paypal.com/paypalme/shayona163/" data-link="https://www.paypal.com/paypalme/shayona163/" target="_blank">Buy me a coffee !</a>
                   </div>
                </div>
                <?php
            }
        }

        function admin_custom_icon_css() {
            ?>
            <style type="text/css">
                .shop_icon_1 {
                    mask: url(<?php echo esc_url(ATCPW_PLUGIN_DIR.'/assets/images/shop_icon_1.svg');?>) no-repeat center / contain;
                    -webkit-mask: url(<?php echo esc_url(ATCPW_PLUGIN_DIR.'/assets/images/shop_icon_1.svg');?>) no-repeat center / contain;
                }
                .shop_icon_2 {
                    mask: url(<?php echo esc_url(ATCPW_PLUGIN_DIR.'/assets/images/shop_icon_2.svg');?>) no-repeat center / contain;
                    -webkit-mask: url(<?php echo esc_url(ATCPW_PLUGIN_DIR.'/assets/images/shop_icon_2.svg');?>) no-repeat center / contain;
                }
                .shop_icon_3 {
                    mask: url(<?php echo esc_url(ATCPW_PLUGIN_DIR.'/assets/images/shop_icon_3.svg');?>) no-repeat center / contain;
                    -webkit-mask: url(<?php echo esc_url(ATCPW_PLUGIN_DIR.'/assets/images/shop_icon_3.svg');?>) no-repeat center / contain;
                }
                .shop_icon_4 {
                    mask: url(<?php echo esc_url(ATCPW_PLUGIN_DIR.'/assets/images/shop_icon_4.svg');?>) no-repeat center / contain;
                    -webkit-mask: url(<?php echo esc_url(ATCPW_PLUGIN_DIR.'/assets/images/shop_icon_4.svg');?>) no-repeat center / contain;
                }
                .shop_icon_5 {
                    mask: url(<?php echo esc_url(ATCPW_PLUGIN_DIR.'/assets/images/shop_icon_5.svg');?>) no-repeat center / contain;
                    -webkit-mask: url(<?php echo esc_url(ATCPW_PLUGIN_DIR.'/assets/images/shop_icon_5.svg');?>) no-repeat center / contain;
                }
                .shop_icon_6 {
                    mask: url(<?php echo esc_url(ATCPW_PLUGIN_DIR.'/assets/images/shop_icon_6.svg');?>) no-repeat center / contain;
                    -webkit-mask: url(<?php echo esc_url(ATCPW_PLUGIN_DIR.'/assets/images/shop_icon_6.svg');?>) no-repeat center / contain;
                }

                .close_icon {
                    mask: url(<?php echo esc_url(ATCPW_PLUGIN_DIR.'/assets/images/close_icon.svg');?>) no-repeat center / contain;
                    -webkit-mask: url(<?php echo esc_url(ATCPW_PLUGIN_DIR.'/assets/images/close_icon.svg');?>) no-repeat center / contain;
                }
                .close_icon_1 {
                    mask: url(<?php echo esc_url(ATCPW_PLUGIN_DIR.'/assets/images/close_icon_1.svg');?>) no-repeat center / contain;
                    -webkit-mask: url(<?php echo esc_url(ATCPW_PLUGIN_DIR.'/assets/images/close_icon_1.svg');?>) no-repeat center / contain;
                }
                .close_icon_2 {
                    mask: url(<?php echo esc_url(ATCPW_PLUGIN_DIR.'/assets/images/close_icon_2.svg');?>) no-repeat center / contain;
                    -webkit-mask: url(<?php echo esc_url(ATCPW_PLUGIN_DIR.'/assets/images/close_icon_2.svg');?>) no-repeat center / contain;
                }
                .close_icon_3 {
                    mask: url(<?php echo esc_url(ATCPW_PLUGIN_DIR.'/assets/images/close_icon_3.svg');?>) no-repeat center / contain;
                    -webkit-mask: url(<?php echo esc_url(ATCPW_PLUGIN_DIR.'/assets/images/close_icon_3.svg');?>) no-repeat center / contain;
                }
                .close_icon_4 {
                    mask: url(<?php echo esc_url(ATCPW_PLUGIN_DIR.'/assets/images/close_icon_4.svg');?>) no-repeat center / contain;
                    -webkit-mask: url(<?php echo esc_url(ATCPW_PLUGIN_DIR.'/assets/images/close_icon_4.svg');?>) no-repeat center / contain;
                }
                .close_icon_5 {
                    mask: url(<?php echo esc_url(ATCPW_PLUGIN_DIR.'/assets/images/close_icon_5.svg');?>) no-repeat center / contain;
                    -webkit-mask: url(<?php echo esc_url(ATCPW_PLUGIN_DIR.'/assets/images/close_icon_5.svg');?>) no-repeat center / contain;
                }

                .ocpc_trash {
                    mask: url(<?php echo esc_url(ATCPW_PLUGIN_DIR.'/assets/images/ocpc_trash.svg');?>) no-repeat center / contain;
                    -webkit-mask: url(<?php echo esc_url(ATCPW_PLUGIN_DIR.'/assets/images/ocpc_trash.svg');?>) no-repeat center / contain;
                }
                .trash_1 {
                    mask: url(<?php echo esc_url(ATCPW_PLUGIN_DIR.'/assets/images/trash_1.svg');?>) no-repeat center / contain;
                    -webkit-mask: url(<?php echo esc_url(ATCPW_PLUGIN_DIR.'/assets/images/trash_1.svg');?>) no-repeat center / contain;
                }
                .trash_2 {
                    mask: url(<?php echo esc_url(ATCPW_PLUGIN_DIR.'/assets/images/trash_2.svg');?>) no-repeat center / contain;
                    -webkit-mask: url(<?php echo esc_url(ATCPW_PLUGIN_DIR.'/assets/images/trash_2.svg');?>) no-repeat center / contain;
                }
                .trash_3 {
                    mask: url(<?php echo esc_url(ATCPW_PLUGIN_DIR.'/assets/images/trash_3.svg');?>) no-repeat center / contain;
                    -webkit-mask: url(<?php echo esc_url(ATCPW_PLUGIN_DIR.'/assets/images/trash_3.svg');?>) no-repeat center / contain;
                }
                .trash_4 {
                    mask: url(<?php echo esc_url(ATCPW_PLUGIN_DIR.'/assets/images/trash_4.svg');?>) no-repeat center / contain;
                    -webkit-mask: url(<?php echo esc_url(ATCPW_PLUGIN_DIR.'/assets/images/trash_4.svg');?>) no-repeat center / contain;
                }
                .trash_5 {
                    mask: url(<?php echo esc_url(ATCPW_PLUGIN_DIR.'/assets/images/trash_5.svg');?>) no-repeat center / contain;
                    -webkit-mask: url(<?php echo esc_url(ATCPW_PLUGIN_DIR.'/assets/images/trash_5.svg');?>) no-repeat center / contain;
                }
                .trash_6 {
                    mask: url(<?php echo esc_url(ATCPW_PLUGIN_DIR.'/assets/images/trash_6.svg');?>) no-repeat center / contain;
                    -webkit-mask: url(<?php echo esc_url(ATCPW_PLUGIN_DIR.'/assets/images/trash_6.svg');?>) no-repeat center / contain;
                }

                .atcpw_qatcpw_icon {
                    mask: url(<?php echo esc_url(ATCPW_PLUGIN_DIR.'/assets/images/atcpw_qatcpw_icon.svg');?>) no-repeat center / contain;
                    -webkit-mask: url(<?php echo esc_url(ATCPW_PLUGIN_DIR.'/assets/images/atcpw_qatcpw_icon.svg');?>) no-repeat center / contain;
                }
                .ocpc_atcpw_icon_1 {
                    mask: url(<?php echo esc_url(ATCPW_PLUGIN_DIR.'/assets/images/ocpc_atcpw_icon_1.svg');?>) no-repeat center / contain;
                    -webkit-mask: url(<?php echo esc_url(ATCPW_PLUGIN_DIR.'/assets/images/ocpc_atcpw_icon_1.svg');?>) no-repeat center / contain;
                }
                .ocpc_atcpw_icon_2 {
                    mask: url(<?php echo esc_url(ATCPW_PLUGIN_DIR.'/assets/images/ocpc_atcpw_icon_2.svg');?>) no-repeat center / contain;
                    -webkit-mask: url(<?php echo esc_url(ATCPW_PLUGIN_DIR.'/assets/images/ocpc_atcpw_icon_2.svg');?>) no-repeat center / contain;
                }
                .ocpc_atcpw_icon_3 {
                    mask: url(<?php echo esc_url(ATCPW_PLUGIN_DIR.'/assets/images/ocpc_atcpw_icon_3.svg');?>) no-repeat center / contain;
                    -webkit-mask: url(<?php echo esc_url(ATCPW_PLUGIN_DIR.'/assets/images/ocpc_atcpw_icon_3.svg');?>) no-repeat center / contain;
                }
                .ocpc_atcpw_icon_4 {
                    mask: url(<?php echo esc_url(ATCPW_PLUGIN_DIR.'/assets/images/ocpc_atcpw_icon_4.svg');?>) no-repeat center / contain;
                    -webkit-mask: url(<?php echo esc_url(ATCPW_PLUGIN_DIR.'/assets/images/ocpc_atcpw_icon_4.svg');?>) no-repeat center / contain;
                }
                .ocpc_atcpw_icon_5 {
                    mask: url(<?php echo esc_url(ATCPW_PLUGIN_DIR.'/assets/images/ocpc_atcpw_icon_5.svg');?>) no-repeat center / contain;
                    -webkit-mask: url(<?php echo esc_url(ATCPW_PLUGIN_DIR.'/assets/images/ocpc_atcpw_icon_5.svg');?>) no-repeat center / contain;
                }
                .ocpc_atcpw_icon_6 {
                    mask: url(<?php echo esc_url(ATCPW_PLUGIN_DIR.'/assets/images/ocpc_atcpw_icon_6.svg');?>) no-repeat center / contain;
                    -webkit-mask: url(<?php echo esc_url(ATCPW_PLUGIN_DIR.'/assets/images/ocpc_atcpw_icon_6.svg');?>) no-repeat center / contain;
                }
            </style>
            <?php
        }

        function init() {
            add_action( 'admin_menu',  array($this, 'atcpw_submenu_page'));
            add_action( 'init',  array($this, 'atcpw_save_options'));
            add_action( 'wp_ajax_nopriv_atcpw_product_ajax',array($this, 'atcpw_product_ajax') );
            add_action( 'wp_ajax_atcpw_product_ajax', array($this, 'atcpw_product_ajax') );
            add_action( 'admin_notices', array($this, 'ATCPW_support_and_rating_notice' ));
            add_action( 'admin_head', array($this,'admin_custom_icon_css'));
        }

        public static function ATCPW_instance() {
            if (!isset(self::$ATCPW_instance)) {
                self::$ATCPW_instance = new self();
                self::$ATCPW_instance->init();
            }
            return self::$ATCPW_instance;
        }
    }
    ATCPW_admin_menu::ATCPW_instance();
}