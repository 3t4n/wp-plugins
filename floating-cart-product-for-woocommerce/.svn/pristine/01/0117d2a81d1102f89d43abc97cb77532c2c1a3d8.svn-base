<?php
add_action( 'admin_menu','fcpfw_submenu_page');
function fcpfw_submenu_page() {
    add_submenu_page( 'woocommerce', 'Floating Cart', 'Floating Cart', 'manage_options', 'floating-cart','fcpfw_callback');
}

function fcpfw_callback() {
    global $fcpfw_comman , $ocwqv_qfcpfw_icon;?>

        <div class="wrap">
            <h2>Cart Setting</h2>
            <div class="card fcpfw_notice">
                <h2>Please help us spread the word & keep the plugin up-to-date</h2>
                <p>
                    <a class="button-primary button" title="Support Floating Cart Product" target="_blank" href="https://www.plugin999.com/support/">Support</a>
                    <a class="button-primary button" title="Rate Floating Cart Product" target="_blank" href="https://wordpress.org/support/plugin/floating-cart-product-for-woocommerce/reviews/?filter=5">Rate the plugin ★★★★★</a>
                </p>
            </div>
            <?php if(isset($_REQUEST['message']) && $_REQUEST['message'] == 'success'){ ?>
                <div class="notice notice-success is-dismissible"> 
                    <p><strong>Record updated successfully.</strong></p>
                </div>
            <?php } ?>
        </div>
        <div class="fcpfw_container">
            <form method="post" >
                <?php wp_nonce_field( 'fcpfw_nonce_action', 'fcpfw_nonce_field' ); ?>
                <ul class="nav-tab-wrapper woo-nav-tab-wrapper">
                    <li class="nav-tab" data-tab="fcpfw-tab-general">General Settings</li>
                    <li class="nav-tab" data-tab="fcpfw-tab-other">Custom Style</li>
                    <li class="nav-tab" data-tab="fcpfw-tab-translations">Translations</li>
                </ul>
                <div id="fcpfw-tab-general" class="tab-content current">
                    <div class="postbox">
                            <div class="postbox-header inside">
                                <h2>Show Cart Basket</h2>
                            </div>  
                        <div class="inside">
                            <table class="data_table">
                                <tr>
                                    <th>Display All Pages</th>
                                    <td>
                                        <input type="checkbox" class="fcpfw_all_pages" name="fcpfw_comman[fcpfw_all_pages]" value="yes" checked disabled>
                                        <label>All Page</label><br>
                                        <label class="fcpfw_comman_link">This Option Available in <a href="https://www.plugin999.com/plugin/floating-cart-product-for-woocommerce/" target="_blank">Pro Version</a></label>
                                    </td>
                                </tr>
                                <tr class="fcpfw_single_pages">
                                    <th>Selected Pages</th>
                                    <td class="scpfw_visibility_on_pages">
                                        <input type="checkbox" name="fcpfw_comman[fcpfw_display_home_page]" value="yes"  checked disabled>
                                        <label>Display On Home Page</label></br>

                                        <input type="checkbox" class="fcpfw_display_shop_page" name="fcpfw_comman[fcpfw_display_shop_page]" value="yes" checked disabled>
                                        <label>Display On Shop Page</label></br>

                                        <input type="checkbox" class="fcpfw_display_product_page" name="fcpfw_comman[fcpfw_display_product_page]" value="yes"checked disabled>
                                        <label>Display On Single Product Page</label></br>

                                        <input type="checkbox" name="fcpfw_comman[fcpfw_display_cart_page]" value="yes" checked disabled>
                                        <label>Display On Cart Page</label></br>

                                        <input type="checkbox" name="fcpfw_comman[fcpfw_display_checkout_page]" value="yes" checked disabled>
                                        <label>Display On Checkout Page</label></br>

                                        <input type="checkbox" name="fcpfw_comman[product_cat_page]" value="yes" checked disabled>
                                        <label>Product Category Page</label><br>

                                        <input type="checkbox" name="fcpfw_comman[product_tag_page]" value="yes" checked disabled>
                                        <label>Product Tag Page</label><br>
                                        <label class="fcpfw_comman_link">This Option Available in <a href="https://www.plugin999.com/plugin/floating-cart-product-for-woocommerce/" target="_blank">Pro Version</a></label>
                                    </td>
                                </tr>
                            </table>
                        </div>
                    </div>
                    <div class="postbox">
                         
                        <div class="postbox-header inside">
                            <h2>Side cart</h2>
                        </div>
                        <div class="inside">
                            <table class="data_table">
                            
                                <tr>
                                    <th>Auto Open Cart</th>
                                    <td>
                                        <input type="checkbox" name="fcpfw_comman[fcpfw_auto_open]" value="yes" <?php if ($fcpfw_comman['fcpfw_auto_open'] == "yes" ) { echo 'checked="checked"'; } ?>>
                                        <strong>After Add to Cart Immeditaliy Open</strong>
                                    </td>
                                </tr>
                                <tr>
                                    <th>Trigger to class open cart</th>
                                    <td>
                                        <input type="checkbox" name="fcpfw_comman[fcpfw_trigger_class]" value="yes" <?php if ($fcpfw_comman['fcpfw_trigger_class'] == "yes" ) { echo 'checked="checked"'; } ?>>
                                        <strong>After Enable trigger then side cart open automatically</strong>
                                        <p class="fcpfw-tips">Note:If Enable then You need to add this class <strong>fcpfw_trigger</strong>where you want to add triggers.</p>
                                    </td>
                                </tr>
                            </table>
                        </div>
                    </div>
                    <div class="postbox">
                        
                        <div class="postbox-header inside">
                            <h2>Cart Header</h2>
                        </div>
                        <div class="inside">
                            <table class="data_table">
                                <tr>
                                    <th>Show in Header</th>
                                    <td>
                                        <input type="checkbox" name="fcpfw_comman[fcpfw_header_cart_icon]" value="yes" <?php if ($fcpfw_comman['fcpfw_header_cart_icon'] == "yes" ) { echo 'checked="checked"'; } ?>>
                                        <strong>Basket Icon</strong><br/>
                                        <input type="checkbox" name="fcpfw_comman[fcpfw_header_close_icon]" value="yes" <?php if ($fcpfw_comman['fcpfw_header_close_icon'] == "yes" ) { echo 'checked="checked"'; } ?>>
                                        <strong>Close Icon</strong><br/>
                                    </td>
                                </tr>
                                <tr>
                                    <th>Show Freeshipping in Header</th>
                                    <td>
                                        <input type="checkbox" name="fcpfw_comman[fcpfw_freeshiping_herder]" value="yes" <?php if ($fcpfw_comman['fcpfw_freeshiping_herder'] == "yes" ) { echo 'checked="checked"'; } ?>>
                                    </td>
                                </tr>
                                <tr>
                                    <th>Show after Freeshipping Text in Header</th>
                                    <td>
                                        <input type="text" name="fcpfw_comman[fcpfw_freeshiping_herder_txt]" value="<?php echo esc_attr($fcpfw_comman['fcpfw_freeshiping_herder_txt']); ?>" >
                                        <span class="ocwg_desc">Use tag {shipping_total} for Shipping rate</span>
                                                                            
                                    </td>
                                </tr>
                                <tr>
                                    <th>Show Freeshipping Text in Header</th>
                                    <td>
                                        <input type="text" name="fcpfw_comman[fcpfw_freeshiping_then_herder_txt]" value="<?php echo esc_attr($fcpfw_comman['fcpfw_freeshiping_then_herder_txt']); ?>" >
                                        <span class="ocwg_desc">get Freeshipping text</span>
                                                                            
                                    </td>
                                </tr>
                            </table>
                        </div>
                    </div>
                    <div class="postbox">
                         
                            <div class="postbox-header inside">
                                <h2>Cart Loop</h2>
                            </div>
                        <div class="inside">
                            <table class="data_table">
                                <tr>
                                    <th>Show in Loop</th>
                                    <td>
                                        <input type="checkbox" name="fcpfw_comman[fcpfw_loop_img]" value="yes" <?php if ($fcpfw_comman['fcpfw_loop_img'] == "yes" ) { echo 'checked="checked"'; } ?>>
                                        <strong>Product Image</strong><br/>
                                        <input type="checkbox" name="fcpfw_comman[fcpfw_loop_product_name]" value="yes" <?php if ($fcpfw_comman['fcpfw_loop_product_name'] == "yes" ) { echo 'checked="checked"'; } ?>>
                                        <strong>Product Name</strong><br/>
                                        <input type="checkbox" name="fcpfw_comman[fcpfw_loop_product_price]" value="yes" <?php if ($fcpfw_comman['fcpfw_loop_product_price'] == "yes" ) { echo 'checked="checked"'; } ?>>
                                        <strong>Product Price</strong><br/>
                                        <input type="checkbox" name="fcpfw_comman[fcpfw_loop_total]" value="yes" <?php if ($fcpfw_comman['fcpfw_loop_total'] == "yes" ) { echo 'checked="checked"'; } ?>>
                                        <strong>Product Total</strong><br/>
                                        <input type="checkbox" name="fcpfw_comman[fcpfw_loop_variation]" value="yes" <?php if ($fcpfw_comman['fcpfw_loop_variation'] == "yes" ) { echo 'checked="checked"'; } ?>>
                                        <strong>Product Variations</strong><br/>
                                        <input type="checkbox" name="fcpfw_comman[fcpfw_loop_link]" value="yes" <?php if ($fcpfw_comman['fcpfw_loop_link'] == "yes" ) { echo 'checked="checked"'; } ?>>
                                        <strong>Link to Product Page</strong><br/>
                                        <input type="checkbox" name="fcpfw_comman[fcpfw_loop_delete]" value="yes" <?php if ($fcpfw_comman['fcpfw_loop_delete'] == "yes" ) { echo 'checked="checked"'; } ?>>
                                        <strong>Delete Product</strong><br/>
                                    </td>
                                </tr>

                                <tr>
                                    <th>Display Qty Box</th>
                                    <td>
                                        <input type="checkbox" name="fcpfw_comman[fcpfw_qty_box]" value="yes" <?php if ($fcpfw_comman['fcpfw_qty_box'] == "yes" ) { echo 'checked="checked"'; } ?>>
                                        <strong>Display Product Qty box.</strong>
                                    </td>
                                </tr>
                                
                            </table>
                        </div>
                    </div>
                    <div class="postbox">
                            <div class="postbox-header inside">
                                <h2>Footer Settings</h2>
                            </div>
                        <div class="inside">
                            <table class="data_table">
                                <tr>
                                    <th>Show Shipping Total </th>
                                    <td>
                                        <input type="checkbox" name="fcpfw_total_shipping_option"  disabled>
                                        <strong>Show Shipping Total.</strong>
                                        <label class="fcpfw_comman_link">This Option Available in  <a href="https://www.plugin999.com/plugin/floating-cart-product-for-woocommerce/" target="_blank">Pro Version</a></label>
                                    </td>
                                </tr>
                                <tr>
                                    <th>Show Discount </th>
                                    <td>
                                        <input type="checkbox" name="fcpfw_discount_show_cart" disabled>
                                        <strong>Show Discount in cart</strong>
                                        <label class="fcpfw_comman_link">This Option Available in  <a href="https://www.plugin999.com/plugin/floating-cart-product-for-woocommerce/" target="_blank">Pro Version</a></label>
                                    </td>
                                </tr>
                                <tr>
                                    <th>Show Tax Total </th>
                                    <td>
                                        <input type="checkbox" name="fcpfw_total_tax_option" disabled>
                                        <strong>Show Tax Total.</strong>
                                         <label class="fcpfw_comman_link">This Option Available in  <a href="https://www.plugin999.com/plugin/floating-cart-product-for-woocommerce/" target="_blank">Pro Version</a></label>
                                    </td>
                                </tr>
                                <tr>
                                    <th>Show All Total </th>
                                    <td>
                                        <input type="checkbox" name="fcpfw_total_all_option" value="yes" disabled>
                                        <strong>Show All Total.</strong>
                                        <label class="fcpfw_comman_link">This Option Available in <a href="https://www.plugin999.com/plugin/floating-cart-product-for-woocommerce/" target="_blank">Pro Version</a></label>
                                    </td>
                                </tr>
                                
                                
                                <tr>
                                    <th>Show ViewCart Button</th>
                                    <td>
                                        <input type="checkbox" name="fcpfw_comman[fcpfw_cart_option]" value="yes" <?php if ($fcpfw_comman['fcpfw_cart_option'] == "yes" ) { echo 'checked="checked"'; } ?>>
                                        <strong>Show Viewcart Button.</strong>
                                    </td>
                                </tr>
                                <tr>
                                    <th>Show Checkout Button</th>
                                    <td>
                                        <input type="checkbox" name="fcpfw_comman[fcpfw_checkout_option]" value="yes" <?php if ($fcpfw_comman['fcpfw_checkout_option'] == "yes" ) { echo 'checked="checked"'; } ?>>
                                        <strong>Show Checkout Button.</strong>
                                    </td>
                                </tr>
                                <tr>
                                    <th>Show Continue Shopping Button</th>
                                    <td>
                                        <input type="checkbox" name="fcpfw_comman[fcpfw_conshipping_option]" value="yes" <?php if ($fcpfw_comman['fcpfw_conshipping_option'] == "yes" ) { echo 'checked="checked"'; } ?>>
                                        <strong>Show Continue Shopping Button.</strong>
                                    </td>
                                </tr>
                                
                            </table>
                        </div>
                    </div>
                    <div class="postbox">
                        
                            <div class="postbox-header inside">
                                <h2>Coupon Field</h2>
                            </div>
                         <div class="inside">
                            <table class="data_table">
                                <tr>
                                    <th>Coupon Field on Mobile</th>
                                    <td>
                                        <input type="checkbox" name="fcpfw_comman[fcpfw_coupon_field_mobile]" value="yes" <?php if ($fcpfw_comman['fcpfw_coupon_field_mobile'] == "yes" ) { echo 'checked="checked"'; } ?>>
                                        <strong>Enable Coupon Field on Mobile</strong>
                                    </td>
                                </tr> 
                                
                            </table>
                        </div>
                    </div>
                    <div class="postbox">
                        
                        <div class="postbox-header inside">
                            <h2>Cart Product Slider</h2>
                        </div>
                        <div class="inside">
                            <table class="data_table">
                                 <tr>
                                    <th>Product Slider on Desktop</th>
                                    <td>
                                        <input type="checkbox" name="fcpfw_prodslider_desktop" disabled>
                                        <strong>Enable Product Slider on Desktop</strong>
                                        <label class="fcpfw_comman_link">This Option Available in <a href="https://www.plugin999.com/plugin/floating-cart-product-for-woocommerce/" target="_blank">Pro Version</a></label>
                                    </td>
                                </tr>
                                <tr>
                                    <th>Product Slider on Mobile</th>
                                    <td>
                                        <input type="checkbox" name="fcpfw_prodslider_mobile" value="yes" disabled>
                                        <strong>Enable Product Slider on Mobile</strong>
                                        <label class="fcpfw_comman_link">This Option Available in  <a href="https://www.plugin999.com/plugin/floating-cart-product-for-woocommerce/" target="_blank">Pro Version</a></label>
                                    </td>
                                </tr>

                                <tr>
                                    <th>Select Product</th>
                                    <td>
                                        <select id="fcpfw_select_product" name="fcpfw_select2[]" multiple="multiple" style="width:100%;max-width:15em;" disabled>
                                            <?php 
                                                $productsa = get_option('fcpfw_select2');
                                                if(!empty($productsa)){
                                                    foreach ($productsa as $value) {
                                                        $productc = wc_get_product( $value );
                                                        if ( !empty($productc) && $productc->is_in_stock() && $productc->is_purchasable() ) {
                                                            $title = $productc->get_name();
                                                            ?>
                                                                <option value="<?php echo esc_attr($value); ?>" selected="selected"><?php echo esc_attr($title); ?></option>
                                                            <?php   
                                                        }
                                                    }
                                                }
                                            ?>
                                       </select> 
                                       <label class="fcpfw_comman_link">This Option Available in <a href="https://www.plugin999.com/plugin/floating-cart-product-for-woocommerce/" target="_blank">Pro Version</a></label>
                                    </td>
                                </tr>   
                            </table>
                        </div>
                    </div>
                    <div class="postbox">
                        
                        
                        <div class="postbox-header inside">
                            <h2>Cart basket</h2>
                        </div>
                         <div class="inside">
                            <table class="data_table">
                                <tr>
                                    <th>Enable</th>
                                    <td>
                                        <select name="fcpfw_comman[fcpfw_cart_show_hide]">
                                                <option value="fcpfw_cart_show" <?php if ($fcpfw_comman['fcpfw_cart_show_hide'] == "fcpfw_cart_show" ) { echo 'selected'; } ?>>Always Show</option>
                                                <option value="fcpfw_cart_hide" <?php if ($fcpfw_comman['fcpfw_cart_show_hide'] == "fcpfw_cart_hide" ) { echo 'selected'; } ?>>Always Hide</option>
                                        </select>
                                    </td>
                                </tr>
                                <tr>
                                    <th>Cart basket Hide</th>
                                    <td>
                                        <input type="checkbox" name="fcpfw_cart_empty" value="yes" disabled>
                                        <strong>If Cart is Empty Then Cart Basket Hide</strong>
                                        <label class="fcpfw_comman_link">This Option Available in <a href="https://www.plugin999.com/plugin/floating-cart-product-for-woocommerce/" target="_blank">Pro Version</a></label>
                                    </td>
                                </tr>
                                <tr>
                                    <th>Cart Icon</th>
                                    <td>
                                        <input type="checkbox" name="fcpfw_comman[fcpfw_show_cart_icn]" value="yes" checked disabled>
                                        <strong>Show Cart Icon</strong>
                                        <label class="fcpfw_comman_link">This Option Available in  <a href="https://www.plugin999.com/plugin/floating-cart-product-for-woocommerce/" target="_blank">Pro Version</a></label>
                                    </td>
                                </tr>   
                                <tr>
                                    <th>On Cart & Checkout Page</th>
                                    <td>
                                        <input type="checkbox" name="fcpfw_comman[fcpfw_cart_check_page]"   disabled>
                                        <strong>Show Cart Basket on cart and checkout pages.</strong>
                                         <label class="fcpfw_comman_link">This Option Available in  <a href="https://www.plugin999.com/plugin/floating-cart-product-for-woocommerce/" target="_blank">Pro Version</a></label>
                                    </td>
                                </tr>
                                <tr>
                                    <th>Cart on Mobile</th>
                                    <td>
                                        <input type="checkbox" name="fcpfw_comman[fcpfw_mobile]" value="yes" <?php if ($fcpfw_comman['fcpfw_mobile'] == "yes" ) { echo 'checked="checked"'; } ?>>
                                        <strong>Show Cart on mobile device.</strong>
                                    </td>
                                </tr> 
                                <tr>
                                    <th>Product Count</th>
                                    <td>
                                        <input type="checkbox" name="fcpfw_comman[fcpfw_product_cnt]" value="yes" <?php if ($fcpfw_comman['fcpfw_product_cnt'] == "yes" ) { echo 'checked="checked"'; } ?>>
                                        <strong>Show Product Count.</strong>
                                    </td>
                                </tr>

                                <tr>
                                    <th>Basket Count Type</th>
                                    <td>
                                        <select name="fcpfw_comman[fcpfw_product_cnt_type]">
                                                <option value="sum_qty" <?php if ($fcpfw_comman['fcpfw_product_cnt_type'] == "sum_qty" ) { echo 'selected'; } ?>>Sum of Quantity of all the products</option>
                                                <option value="num_qty" <?php if ($fcpfw_comman['fcpfw_product_cnt_type'] == "num_qty" ) { echo 'selected'; } ?>>Number of products</option>
                                        </select>
                                    </td>
                                </tr> 
                                <tr>
                                    <th>Basket Product ordering</th>
                                    <td>
                                        <select name="fcpfw_comman[fcpfw_cart_ordering]">
                                                <option value="asc" <?php if ($fcpfw_comman['fcpfw_cart_ordering'] == "asc" ) { echo 'selected'; } ?>>Recently added item at last (Asc)</option>
                                                <option value="desc" <?php if ($fcpfw_comman['fcpfw_cart_ordering'] == "desc" ) { echo 'selected'; } ?>>Recently added item on top (Desc)</option>
                                        </select>
                                    </td>
                                </tr> 
                                <tr>
                                    <th>Hide Basket Pages</th>
                                    <td>
                                        <input type="text" name="fcpfw_on_pages" value="" disabled>
                                        <strong>Do not show basket on pages.</strong>
                                        <strong>Use page id separated by comma. For eg: 31,41,51</strong>
                                        <label class="fcpfw_comman_link">This Option Available in <a href="https://www.plugin999.com/plugin/floating-cart-product-for-woocommerce/" target="_blank">Pro Version</a></label>
                                    </td>
                                </tr> 
                            </table>
                         </div>
                    </div> 
                    <div class="postbox">
                        <div class="postbox-header inside">
                            <h2>All Urls Set</h2>
                        </div>
                        <div class="inside">
                            <table class="data_table">
                                
                                <tr>
                                    <th>Continue Shopping Button Link</th>
                                    <td>
                                        <input type="text" name="fcpfw_comman[fcpfw_conshipping_link]" value="<?php echo esc_attr($fcpfw_comman['fcpfw_conshipping_link']); ?>">
                                        <strong>Use "#" for the same page</strong>
                                    </td>
                                </tr>
                                <tr>
                                    <th>Empty Cart Button Link</th>
                                    <td>
                                        <input type="text" name="fcpfw_comman[fcpfw_emptycart_link]" value="<?php echo esc_attr($fcpfw_comman['fcpfw_emptycart_link']); ?>">
                                        <strong>Use "#" for the same page</strong>
                                    </td>
                                </tr>
                                <tr>
                                    <th>Custom Cart Button Link</th>
                                    <td>
                                        <input type="text" name="fcpfw_comman[fcpfw_orgcart_link]" value="<?php echo esc_attr($fcpfw_comman['fcpfw_orgcart_link']); ?>">
                                        <strong>if is empty then going cart page</strong>
                                    </td>
                                </tr>
                                <tr>
                                    <th>Custom checkout Button Link</th>
                                    <td>
                                        <input type="text" name="fcpfw_comman[fcpfw_orgcheckout_link]" value="<?php echo esc_attr($fcpfw_comman['fcpfw_orgcheckout_link']); ?>">
                                        <strong>if is empty then going checkout page</strong>
                                    </td>
                                </tr>
                                
                            </table>
                        </div>
                    </div>  
                </div>
                <div id="fcpfw-tab-other" class="tab-content">
                    <div class="postbox">
                        <div class="postbox-header">
                             <h2>Important Setting</h2>
                        </div>
                        <div class="inside">
                            <table class="data_table">
                                <tr>
                                    <th>Side Cart Width</th>
                                    <td>
                                        <input type="text" name="fcpfw_comman[fcpfw_sidecart_width]" value="<?php echo esc_attr($fcpfw_comman['fcpfw_sidecart_width']); ?>">
                                        <strong>(in px - eg. 350)</strong>
                                    </td>
                                </tr>
                                <tr>
                                    <th>Side Cart Height</th>
                                    <td>
                                        <select name="fcpfw_comman[fcpfw_cart_height]">
                                                <option value="full" <?php if ($fcpfw_comman['fcpfw_cart_height'] == "full" ) { echo 'selected'; } ?>>Full</option>
                                                <option value="auto" <?php if ($fcpfw_comman['fcpfw_cart_height'] == "auto" ) { echo 'selected'; } ?>>Auto</option>
                                        </select>
                                    </td>
                                </tr>
                                 <tr>
                                    <th>Open Side Cart From</th>
                                    <td>
                                        <select name="fcpfw_comman[fcpfw_cart_open_from]">
                                                <option value="right" <?php if ($fcpfw_comman['fcpfw_cart_open_from'] == "right" ) { echo 'selected'; } ?>>Right</option>
                                                <option value="left" <?php if ($fcpfw_comman['fcpfw_cart_open_from'] == "left" ) { echo 'selected'; } ?>>Left</option>
                                        </select>
                                    </td>
                                </tr>

                            </table>
                        </div>
                    </div>
                    <div class="postbox">
                            <div class="postbox-header">
                                <h2>Header Setting</h2>
                            </div>
                        <div class="inside">
                            <table class="data_table">
                                <tr>
                                    <th>Header Font Size</th>
                                    <td>
                                        <input type="number" name="fcpfw_comman[fcpfw_head_ft_size]" value="<?php echo esc_attr($fcpfw_comman['fcpfw_head_ft_size']); ?>">
                                    </td>
                                </tr>
                                <tr>
                                    <th>Header Font Color</th>
                                    <td>
                                        <?php 
                                            if( !empty($fcpfw_comman['fcpfw_head_ft_clr'])) {
                                                $fcpfw_head_ft_clr = '#000000';
                                            }
                                        ?>
                                        <input type="text" class="color-picker" data-alpha="true" data-default-color="<?php echo esc_attr($fcpfw_head_ft_clr);?>" name="fcpfw_comman[fcpfw_head_ft_clr]" value="<?php echo esc_attr($fcpfw_comman['fcpfw_head_ft_clr']);?>"/>
                                    </td>
                                </tr>
                                <tr>
                                    <th>Header cart icon</th>
                                    <td class="ocwqv_icon_choice">
                                            
                                            <input type="radio" name="fcpfw_comman[ofcpfw_shop_icon]" value="shop_icon_1" <?php if ($fcpfw_comman['ofcpfw_shop_icon'] == "shop_icon_1" ) { echo 'checked'; } ?>>
                                            <label>
                                                <?php 
                                                echo html_entity_decode(esc_attr($ocwqv_qfcpfw_icon['shop_icon_1'])); ?>
                                            </label>
                    
                                            <input type="radio" name="fcpfw_comman[ofcpfw_shop_icon]" value="shop_icon_2" <?php if ($fcpfw_comman['ofcpfw_shop_icon'] == "shop_icon_2" ) { echo 'checked'; } ?>>
                                            <label>
                                                  <?php echo html_entity_decode(esc_attr($ocwqv_qfcpfw_icon['shop_icon_2'])); ?>
                                            </label>

                                            <input type="radio" name="fcpfw_comman[ofcpfw_shop_icon]" value="shop_icon_3"  <?php if ($fcpfw_comman['ofcpfw_shop_icon'] == "shop_icon_3" ) { echo 'checked'; } ?>>
                                            <label>
                                                  <?php echo html_entity_decode(esc_attr($ocwqv_qfcpfw_icon['shop_icon_3'])); ?>
                                            </label>
                                        
                                            <input type="radio" name="fcpfw_comman[ofcpfw_shop_icon]" value="shop_icon_4" <?php if ($fcpfw_comman['ofcpfw_shop_icon'] == "shop_icon_4" ) { echo 'checked'; } ?>>
                                            <label>
                                                 <?php echo html_entity_decode(esc_attr($ocwqv_qfcpfw_icon['shop_icon_4'])); ?>
                                            </label>

                                            <input type="radio" name="fcpfw_comman[ofcpfw_shop_icon]" value="shop_icon_5"  <?php if ($fcpfw_comman['ofcpfw_shop_icon'] == "shop_icon_5" ) { echo 'checked'; } ?>>
                                            <label>
                                               <?php echo html_entity_decode(esc_attr($ocwqv_qfcpfw_icon['shop_icon_5'])); ?>
                                            </label> 

                                            <input type="radio" name="fcpfw_comman[ofcpfw_shop_icon]" value="shop_icon_6"  <?php if ($fcpfw_comman['ofcpfw_shop_icon'] == "shop_icon_6" ) { echo 'checked'; } ?>>
                                            <label>
                                                <?php echo html_entity_decode(esc_attr($ocwqv_qfcpfw_icon['shop_icon_6'])); ?>
                                            </label>
                                    </td>
                                    
                                </tr>
                                <tr>
                                    <th>Header cart icon Color</th>
                                    <td>
                                        <?php 
                                            if( !empty($fcpfw_comman['fcpfw_header_cart_icon_clr'])) {
                                                $fcpfw_header_cart_icon_clr = '#000000';
                                            }
                                        ?>
                                        <input type="text" class="color-picker" data-alpha="true" data-default-color="<?php echo esc_attr($fcpfw_header_cart_icon_clr); ?>" name="fcpfw_comman[fcpfw_header_cart_icon_clr]" value="<?php echo esc_attr($fcpfw_comman['fcpfw_header_cart_icon_clr']); ?>"/>
                                    </td>
                                </tr>
                                <tr>
                                    <th>Header cart close icon</th>
                                    <td class="ocwqv_icon_choice_close">
                                            
                                            <input type="radio" name="fcpfw_comman[ofcpfw_close_icon]" value="close_icon" <?php if ($fcpfw_comman['ofcpfw_close_icon'] == "close_icon" ) { echo 'checked'; } ?>>
                                            <label>
                                               <?php echo html_entity_decode(esc_attr($ocwqv_qfcpfw_icon['close_icon'])); ?>
                                            </label>
                    
                                            <input type="radio" name="fcpfw_comman[ofcpfw_close_icon]" value="close_icon_1" <?php if ($fcpfw_comman['ofcpfw_close_icon'] == "close_icon_1" ) { echo 'checked'; } ?>>
                                            <label>
                                                  <?php echo html_entity_decode(esc_attr($ocwqv_qfcpfw_icon['close_icon_1'])); ?>
                                            </label>

                                            <input type="radio" name="fcpfw_comman[ofcpfw_close_icon]" value="close_icon_2"  <?php if ($fcpfw_comman['ofcpfw_close_icon'] == "close_icon_2" ) { echo 'checked'; } ?>>
                                            <label>
                                                  <?php echo html_entity_decode(esc_attr($ocwqv_qfcpfw_icon['close_icon_2'])); ?>
                                            </label>
                                        
                                            <input type="radio" name="fcpfw_comman[ofcpfw_close_icon]" value="close_icon_3" <?php if ($fcpfw_comman['ofcpfw_close_icon'] == "close_icon_3" ) { echo 'checked'; } ?>>
                                            <label>
                                                 <?php echo html_entity_decode(esc_attr($ocwqv_qfcpfw_icon['close_icon_3'])); ?>
                                            </label>

                                            <input type="radio" name="fcpfw_comman[ofcpfw_close_icon]" value="close_icon_4"  <?php if ($fcpfw_comman['ofcpfw_close_icon'] == "close_icon_4" ) { echo 'checked'; } ?>>
                                            <label>
                                               <?php echo html_entity_decode(esc_attr($ocwqv_qfcpfw_icon['close_icon_4'])); ?>
                                            </label> 
                                            <input type="radio" name="fcpfw_comman[ofcpfw_close_icon]" value="close_icon_5"  <?php if ($fcpfw_comman['ofcpfw_close_icon'] == "close_icon_5" ) { echo 'checked'; } ?>>
                                            <label>
                                               <?php echo html_entity_decode(esc_attr($ocwqv_qfcpfw_icon['close_icon_5'])); ?>
                                            </label> 

                                    </td>
                                    
                                </tr>
                                 <tr>
                                    <th>Header Close icon Color</th>
                                    <td>
                                        <?php 
                                            if( !empty($fcpfw_comman['fcpfw_header_close_icon_clr'])) {
                                                $fcpfw_header_close_icon_clr = '#000000';
                                            }
                                        ?>
                                        <input type="text" class="color-picker" data-alpha="true" data-default-color="<?php echo esc_attr($fcpfw_header_close_icon_clr); ?>" name="fcpfw_comman[fcpfw_header_close_icon_clr]" value="<?php echo esc_attr($fcpfw_comman['fcpfw_header_close_icon_clr']); ?>"/>
                                    </td>
                                </tr>

                                <tr>
                                    <th>Show Freeshipping Text in Header color</th>
                                    <td>
                                        <?php 
                                            if( !empty($fcpfw_comman['fcpfw_header_shipping_text_color'])) {
                                                $fcpfw_header_shipping_text_color = '#000000';
                                            }
                                        ?>
                                        <input type="text" class="color-picker" data-alpha="true" data-default-color="<?php echo esc_attr($fcpfw_header_shipping_text_color); ?>" name="fcpfw_comman[fcpfw_header_shipping_text_color]" value="<?php echo esc_attr($fcpfw_comman['fcpfw_header_shipping_text_color']); ?>"/>
                                    </td>
                                </tr>
                                

                            </table>
                        </div>
                    </div>
                    <div class="postbox">
                            
                         
                            <div class="postbox-header">
                                <h2>Cart Loop Setting</h2>
                            </div>
                        <div class="inside">
                            <table class="data_table">
                                <tr>
                                    <th>Product Title Font Size</th>
                                    <td>
                                        <input type="number" name="fcpfw_comman[fcpfw_product_ft_size]" value="<?php echo esc_attr($fcpfw_comman['fcpfw_product_ft_size']); ?>">
                                    </td>
                                </tr>
                                <tr>
                                    <th>Product Title Font Color</th>
                                    <td>
                                        <?php 
                                            if( !empty($fcpfw_comman['fcpfw_product_ft_clr'])) {
                                                $fcpfw_product_ft_clr = '#000000';
                                            }
                                        ?>
                                        <input type="text" class="color-picker" data-alpha="true" data-default-color="<?php echo esc_attr($fcpfw_product_ft_clr); ?>" name="fcpfw_comman[fcpfw_product_ft_clr]" value="<?php echo esc_attr($fcpfw_comman['fcpfw_product_ft_clr']); ?>"/>
                                    </td>
                                </tr>
                            </table>
                        </div>
                    </div>
                     <div class="postbox">
                            
                        <div class="postbox-header">
                            <h2>Empty Cart</h2>
                        </div>
                        <div class="inside">
                            <table class="data_table">
                                <tr>
                                    <th>Cart Empty show/hide all cart detail</th>
                                    <td>
                                        <select name="fcpfw_comman[fcpfw_cart_empty_hide_show]" disabled>
                                                <option value="show" <?php if ($fcpfw_comman['fcpfw_cart_empty_hide_show'] == "show" ) { echo 'selected'; } ?>>Show All Detail</option>
                                                <option value="hide" <?php if ($fcpfw_comman['fcpfw_cart_empty_hide_show'] == "hide" ) { echo 'selected'; } ?>>Hide All Detail</option>
                                        </select>
                                        <label class="fcpfw_comman_link">This Option Available in <a href="https://www.plugin999.com/plugin/floating-cart-product-for-woocommerce/" target="_blank">Pro Version</a></label>
                                    </td>
                                </tr>
                            
                            </table>
                        </div>
                    </div>
                    <div class="postbox">
                        
                         <div class="postbox-header">
                            <h2>Side cart</h2>
                         </div>
                        <div class="inside">
                            <table class="data_table">
                                <tr>
                                    <td>
                                        <h3>Delete Setting</h3>
                                    </td>
                                </tr>
                                <tr>
                                    <th>Delete Icons</th>
                                    <td class="ocwqv_icon_choice">
                                            <input type="radio" name="fcpfw_comman[ofcpfw_delete_icon]" value="ocwqv_trash" <?php if ($fcpfw_comman['ofcpfw_delete_icon'] == "ocwqv_trash" ) { echo 'checked'; } ?>>
                                            <label>
                                                  <?php echo html_entity_decode(esc_attr($ocwqv_qfcpfw_icon['ocwqv_trash'])); ?>
                                            </label>
                                            <input type="radio" name="fcpfw_comman[ofcpfw_delete_icon]" value="trash_1" <?php if ($fcpfw_comman['ofcpfw_delete_icon'] == "trash_1" ) { echo 'checked'; } ?>>
                                            <label>
                                               <?php echo html_entity_decode(esc_attr($ocwqv_qfcpfw_icon['trash_1'])); ?>
                                            </label>
                    
                                            <input type="radio" name="fcpfw_comman[ofcpfw_delete_icon]" value="trash_2" <?php if ($fcpfw_comman['ofcpfw_delete_icon'] == "trash_2" ) { echo 'checked'; } ?>>
                                            <label>
                                                  <?php echo html_entity_decode(esc_attr($ocwqv_qfcpfw_icon['trash_2'])); ?>
                                            </label>

                                            <input type="radio" name="fcpfw_comman[ofcpfw_delete_icon]" value="trash_3"  <?php if ($fcpfw_comman['ofcpfw_delete_icon'] == "trash_3" ) { echo 'checked'; } ?>>
                                            <label>
                                                  <?php echo html_entity_decode(esc_attr($ocwqv_qfcpfw_icon['trash_3'])); ?>
                                            </label>
                                        
                                            <input type="radio" name="fcpfw_comman[ofcpfw_delete_icon]" value="trash_4" <?php if ($fcpfw_comman['ofcpfw_delete_icon'] == "trash_4" ) { echo 'checked'; } ?>>
                                            <label>
                                                 <?php echo html_entity_decode(esc_attr($ocwqv_qfcpfw_icon['trash_4'])); ?>
                                            </label>

                                            <input type="radio" name="fcpfw_comman[ofcpfw_delete_icon]" value="trash_5"  <?php if ($fcpfw_comman['ofcpfw_delete_icon'] == "trash_5" ) { echo 'checked'; } ?>>
                                            <label>
                                               <?php echo html_entity_decode(esc_attr($ocwqv_qfcpfw_icon['trash_5'])); ?>
                                            </label> 

                                            <input type="radio" name="fcpfw_comman[ofcpfw_delete_icon]" value="trash_6"  <?php if ($fcpfw_comman['ofcpfw_delete_icon'] == "trash_6" ) { echo 'checked'; } ?>>
                                            <label>
                                                <?php echo html_entity_decode(esc_attr($ocwqv_qfcpfw_icon['trash_6'])); ?>
                                            </label>
                                    </td>
                                </tr>
                                <tr>
                                    <th>Delete icon Color</th>
                                    <td>
                                        <?php 
                                            if( !empty($fcpfw_comman['fcpfw_delect_icon_clr'])) {
                                                $fcpfw_delect_icon_clr = '#000000';
                                            }
                                        ?>
                                        <input type="text" class="color-picker" data-alpha="true" data-default-color="<?php echo esc_attr($fcpfw_delect_icon_clr); ?>" name="fcpfw_comman[fcpfw_delect_icon_clr]" value="<?php echo esc_attr($fcpfw_comman['fcpfw_delect_icon_clr']); ?>"/>
                                    </td>
                                </tr>
                                 <tr>
                                    <td>
                                        <h3>Coupon Field Settings</h3>
                                    </td>
                                </tr>
                                <tr>
                                    <th>Coupon icon</th>
                                    <td class="ocwqv_icon_choice">
                                           
                                            <input type="radio" name="fcpfw_comman[fcpfw_coupon_icon]" value="coupon" <?php if ($fcpfw_comman['fcpfw_coupon_icon'] == "coupon" ) { echo 'checked'; } ?>>
                                            <label>
                                               <?php echo html_entity_decode(esc_attr($ocwqv_qfcpfw_icon['coupon'])); ?>
                                            </label>
                    
                                            <input type="radio" name="fcpfw_comman[fcpfw_coupon_icon]" value="coupon_1" <?php if ($fcpfw_comman['fcpfw_coupon_icon'] == "coupon_1" ) { echo 'checked'; } ?>>
                                            <label>
                                                  <?php echo html_entity_decode(esc_attr($ocwqv_qfcpfw_icon['coupon_1'])); ?>
                                            </label>

                                            <input type="radio" name="fcpfw_comman[fcpfw_coupon_icon]" value="coupon_2"  <?php if ($fcpfw_comman['fcpfw_coupon_icon'] == "coupon_2" ) { echo 'checked'; } ?>>
                                            <label>
                                                  <?php echo html_entity_decode(esc_attr($ocwqv_qfcpfw_icon['coupon_2'])); ?>
                                            </label>
                                        
                                            <input type="radio" name="fcpfw_comman[fcpfw_coupon_icon]" value="coupon_3" <?php if ($fcpfw_comman['fcpfw_coupon_icon'] == "coupon_3" ) { echo 'checked'; } ?>>
                                            <label>
                                                 <?php echo html_entity_decode(esc_attr($ocwqv_qfcpfw_icon['coupon_3'])); ?>
                                            </label>

                                            <input type="radio" name="fcpfw_comman[fcpfw_coupon_icon]" value="coupon_4"  <?php if ($fcpfw_comman['fcpfw_coupon_icon'] == "coupon_4" ) { echo 'checked'; } ?>>
                                            <label>
                                               <?php echo html_entity_decode(esc_attr($ocwqv_qfcpfw_icon['coupon_4'])); ?>
                                            </label> 

                                            <input type="radio" name="fcpfw_comman[fcpfw_coupon_icon]" value="coupon_5"  <?php if ($fcpfw_comman['fcpfw_coupon_icon'] == "coupon_5" ) { echo 'checked'; } ?>>
                                            <label>
                                                <?php echo html_entity_decode(esc_attr($ocwqv_qfcpfw_icon['coupon_5'])); ?>
                                            </label>
                                    </td>
                                    
                                </tr>
                                <tr>
                                    <th>Apply Coupon icon Color</th>
                                    <td>
                                        <?php 
                                            if( !empty($fcpfw_comman['fcpfw_apply_cpn_icon_clr'])) {
                                                $fcpfw_apply_cpn_icon_clr = '#000000';
                                            }
                                        ?>
                                        <input type="text" class="color-picker" data-alpha="true" data-default-color="<?php echo esc_attr($fcpfw_apply_cpn_icon_clr); ?>" name="fcpfw_comman[fcpfw_apply_cpn_icon_clr]" value="<?php echo esc_attr($fcpfw_comman['fcpfw_apply_cpn_icon_clr']); ?>"/>
                                    </td>
                                </tr> 
                               
                                <tr>
                                    <th>Apply Coupon Font Color</th>
                                    <td>
                                        <?php 
                                            if( !empty($fcpfw_comman['fcpfw_apply_cpn_ft_clr'])) {
                                                $fcpfw_apply_cpn_ft_clr = '#000000';
                                            }
                                        ?>
                                        <input type="text" class="color-picker" data-alpha="true" data-default-color="<?php echo esc_attr($fcpfw_apply_cpn_ft_clr); ?>" name="fcpfw_comman[fcpfw_apply_cpn_ft_clr]" value="<?php echo esc_attr($fcpfw_comman['fcpfw_apply_cpn_ft_clr']); ?>"/>
                                    </td>
                                </tr>
                                <tr>
                                    <th>Apply Button Text Color</th>
                                    <td>
                                        <?php 
                                            if( !empty($fcpfw_comman['fcpfw_applybtn_cpn_ft_clr'])) {
                                                $fcpfw_applybtn_cpn_ft_clr = '#ffffff';
                                            }
                                        ?>
                                        <input type="text" class="color-picker" data-alpha="true" data-default-color="<?php echo esc_attr($fcpfw_applybtn_cpn_ft_clr); ?>" name="fcpfw_comman[fcpfw_applybtn_cpn_ft_clr]" value="<?php echo esc_attr($fcpfw_comman['fcpfw_applybtn_cpn_ft_clr']); ?>"/>
                                    </td>
                                </tr>
                                <tr>
                                    <th>Apply Button Background Color</th>
                                    <td>
                                        <?php 
                                            if( !empty($fcpfw_comman['fcpfw_applybtn_cpn_bg_clr'])) {
                                                $fcpfw_applybtn_cpn_bg_clr = '#000000';
                                            }
                                        ?>
                                        <input type="text" class="color-picker" data-alpha="true" data-default-color="<?php echo esc_attr($fcpfw_applybtn_cpn_bg_clr); ?>" name="fcpfw_comman[fcpfw_applybtn_cpn_bg_clr]" value="<?php echo esc_attr($fcpfw_comman['fcpfw_applybtn_cpn_bg_clr']); ?>"/>
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
                                        <input type="number" name="fcpfw_comman[fcpfw_sld_product_ft_size]" value="<?php echo esc_attr($fcpfw_comman['fcpfw_sld_product_ft_size']); ?>">
                                    </td>
                                </tr>
                                <tr>
                                    <th>Product Font Color</th>
                                    <td>
                                        <?php 
                                            if( !empty($fcpfw_comman['fcpfw_sld_product_ft_clr'])) {
                                                $fcpfw_sld_product_ft_clr = '#000000';
                                            }
                                        ?>
                                        <input type="text" class="color-picker" data-alpha="true" data-default-color="<?php echo esc_attr($fcpfw_sld_product_ft_clr); ?>" name="fcpfw_comman[fcpfw_sld_product_ft_clr]" value="<?php echo esc_attr($fcpfw_comman['fcpfw_sld_product_ft_clr']); ?>"/>
                                    </td>
                                </tr>
                            </table>
                        </div>
                    </div>
                    <div class="postbox">
                        <div class="postbox-header"> 
                            <h2>Shipping Text Customize</h2>
                        </div>
                        <div class="inside">
                            <table class="data_table">
                                 <tr>
                                    <th>Shipping Text</th>
                                    <td>
                                        <input type="text" name="fcpfw_comman[fcpfw_ship_txt]" value="<?php echo esc_attr($fcpfw_comman['fcpfw_ship_txt']); ?>">
                                    </td>
                                </tr>
                                <tr>
                                    <th>Shipping Text Font Size</th>
                                    <td>
                                        <input type="number" name="fcpfw_comman[fcpfw_ship_ft_size]" value="<?php echo esc_attr($fcpfw_comman['fcpfw_ship_ft_size']); ?>">
                                    </td>
                                </tr>
                                <tr>
                                    <th>Shipping Text Font Color</th>
                                    <td>
                                        <?php 
                                            if( !empty($fcpfw_comman['fcpfw_ship_ft_clr'])) {
                                                $fcpfw_ship_ft_clr = '#000000';
                                            }
                                        ?>
                                        <input type="text" class="color-picker" data-alpha="true" data-default-color="<?php echo esc_attr($fcpfw_ship_ft_clr); ?>" name="fcpfw_comman[fcpfw_ship_ft_clr]" value="<?php echo esc_attr($fcpfw_comman['fcpfw_ship_ft_clr']); ?>"/>
                                    </td>
                                </tr>
                            </table>
                        </div>
                    </div>

                    <div class="postbox">
                         
                          
                         <div class="postbox-header">
                             <h2>Footer Button Settings</h2>
                         </div>
                        <div class="inside">
                            <table class="data_table">
                                <tr>
                                    <th>Button Row</th>
                                    <td>
                                        <select name="fcpfw_comman[fcpfw_footer_button_row]">
                                            <option value="one" <?php if($fcpfw_comman['fcpfw_footer_button_row'] == "one"){ echo "selected"; } ?>>One in a row ( 1+1+1 )</option>
                                            <option value="two_one" <?php if($fcpfw_comman['fcpfw_footer_button_row'] == "two_one"){ echo "selected"; } ?>>Two in first row ( 2 + 1 )</option>
                                            <option value="one_two" <?php if($fcpfw_comman['fcpfw_footer_button_row'] == "one_two"){ echo "selected"; } ?>>Two in last row ( 1 + 2 )</option>
                                            <option value="three" <?php if($fcpfw_comman['fcpfw_footer_button_row'] == "three"){ echo "selected"; } ?>>Three in one row( 3 )</option>
                                        </select>
                                    </td>
                                </tr>
                                <tr>
                                    <th>Footer Buttons Color</th>
                                    <td>
                                        <?php 
                                            if( !empty($fcpfw_comman['fcpfw_ft_btn_clr'])) {
                                                $fcpfw_ft_btn_clr = '#000000';
                                            }
                                        ?>
                                        <input type="text" class="color-picker" data-alpha="true" data-default-color="<?php echo esc_attr($fcpfw_ft_btn_clr); ?>" name="fcpfw_comman[fcpfw_ft_btn_clr]" value="<?php echo esc_attr($fcpfw_comman['fcpfw_ft_btn_clr']); ?>"/>
                                    </td>
                                </tr>
                                <tr>
                                    <th>Footer Buttons Text Color</th>
                                    <td>
                                        <?php 
                                            if( !empty($fcpfw_comman['fcpfw_ft_btn_txt_clr'])) {
                                                $fcpfw_ft_btn_txt_clr = '#ffffff';
                                            }
                                        ?>
                                        <input type="text" class="color-picker" data-alpha="true" data-default-color="<?php echo esc_attr($fcpfw_ft_btn_txt_clr); ?>" name="fcpfw_comman[fcpfw_ft_btn_txt_clr]" value="<?php echo esc_attr($fcpfw_comman['fcpfw_ft_btn_txt_clr']); ?>"/>
                                    </td>
                                </tr>
                                <tr>
                                    <th>Footer Buttons Margin</th>
                                    <td>
                                        <input type="number" name="fcpfw_comman[fcpfw_ft_btn_mrgin]" value="<?php echo esc_attr($fcpfw_comman['fcpfw_ft_btn_mrgin']); ?>">
                                    </td>
                                </tr>
                            </table>
                        </div>
                    </div>              
                    <div class="postbox">
                        <div class="postbox-header">
                                <h2>Cart basket</h2>
                        </div>
                        <div class="inside">
                             <table class="data_table">
                                <tr>
                                        <th>Side cart Basket Icon</th>

                                        <td class="ocwqv_icon_choice">
                                            <input type="radio" name="fcpfw_comman[ocwqv_fcpfw_icon]" value="ocwqv_qfcpfw_icon" <?php if ($fcpfw_comman['ocwqv_fcpfw_icon'] == "ocwqv_qfcpfw_icon" ) { echo 'checked'; } ?>>
                                            <label>
                                                  <?php echo html_entity_decode(esc_attr($ocwqv_qfcpfw_icon['ocwqv_qfcpfw_icon'])); ?>
                                            </label>
                                            <input type="radio" name="fcpfw_comman[ocwqv_fcpfw_icon]" value="ocwqv_fcpfw_icon_1" <?php if ($fcpfw_comman['ocwqv_fcpfw_icon'] == "ocwqv_fcpfw_icon_1" ) { echo 'checked'; } ?>>
                                            <label>
                                               <?php echo html_entity_decode(esc_attr($ocwqv_qfcpfw_icon['ocwqv_fcpfw_icon_1'])); ?>
                                            </label>
                    
                                            <input type="radio" name="fcpfw_comman[ocwqv_fcpfw_icon]" value="ocwqv_fcpfw_icon_4" <?php if ($fcpfw_comman['ocwqv_fcpfw_icon'] == "ocwqv_fcpfw_icon_4" ) { echo 'checked'; } ?>>
                                            <label>
                                                  <?php echo html_entity_decode(esc_attr($ocwqv_qfcpfw_icon['ocwqv_fcpfw_icon_4'])); ?>
                                            </label>

                                            <input type="radio" name="fcpfw_comman[ocwqv_fcpfw_icon]" value="ocwqv_fcpfw_icon_2"  <?php if ($fcpfw_comman['ocwqv_fcpfw_icon'] == "ocwqv_fcpfw_icon_2" ) { echo 'checked'; } ?>>
                                            <label>
                                                  <?php echo html_entity_decode(esc_attr($ocwqv_qfcpfw_icon['ocwqv_fcpfw_icon_2'])); ?>
                                            </label>
                                        
                                            <input type="radio" name="fcpfw_comman[ocwqv_fcpfw_icon]" value="ocwqv_fcpfw_icon_5" <?php if ($fcpfw_comman['ocwqv_fcpfw_icon'] == "ocwqv_fcpfw_icon_5" ) { echo 'checked'; } ?>>
                                            <label>
                                                 <?php echo html_entity_decode(esc_attr($ocwqv_qfcpfw_icon['ocwqv_fcpfw_icon_5'])); ?>
                                            </label>

                                            <input type="radio" name="fcpfw_comman[ocwqv_fcpfw_icon]" value="ocwqv_fcpfw_icon_3"  <?php if ($fcpfw_comman['ocwqv_fcpfw_icon'] == "ocwqv_fcpfw_icon_3" ) { echo 'checked'; } ?>>
                                            <label>
                                               <?php echo html_entity_decode(esc_attr($ocwqv_qfcpfw_icon['ocwqv_fcpfw_icon_3'])); ?>
                                            </label> 

                                            <input type="radio" name="fcpfw_comman[ocwqv_fcpfw_icon]" value="ocwqv_fcpfw_icon_6"  <?php if ($fcpfw_comman['ocwqv_fcpfw_icon'] == "ocwqv_fcpfw_icon_6" ) { echo 'checked'; } ?>>
                                            <label>
                                                <?php echo html_entity_decode(esc_attr($ocwqv_qfcpfw_icon['shop_icon_4'])); ?>
                                            </label>
                                        </td>
                                </tr>
                                <tr>
                                    <th>Side cart Basket Shape</th>
                                    <td>
                                        <select name="fcpfw_comman[fcpfw_basket_shape]">
                                            <option value="square" <?php  if($fcpfw_comman['fcpfw_basket_shape'] == "square" || empty($fcpfw_comman['fcpfw_basket_shape'])){ echo "selected"; } ?>>Square</option>
                                            <option value="round" <?php if($fcpfw_comman['fcpfw_basket_shape'] == "round"){ echo "selected"; } ?>>Round</option>
                                            
                                        </select>
                                    </td>
                                </tr> 
                                <tr>
                                    <th>Basket Position</th>
                                    <td>
                                        <select name="fcpfw_comman[fcpfw_basket_position]">
                                            <option value="top" <?php if($fcpfw_comman['fcpfw_basket_position'] == "top"){ echo "selected"; } ?>>Top</option>
                                            <option value="bottom" <?php  if($fcpfw_comman['fcpfw_basket_position'] == "bottom" || empty($fcpfw_comman['fcpfw_basket_position'])){ echo "selected"; } ?>>Bottom</option>
                                        </select>
                                    </td>
                                </tr> 
                                <tr>
                                    <th>Basket Count  Position</th>
                                    <td>
                                        <select name="fcpfw_comman[fcpfw_basket_count_position]">
                                            <option value="top-left" <?php if($fcpfw_comman['fcpfw_basket_count_position'] == "top"){ echo "selected"; } ?>>Top Left</option>
                                            <option value="bottom-right" <?php  if($fcpfw_comman['fcpfw_basket_count_position'] == "bottom-right" || empty($fcpfw_comman['fcpfw_basket_count_position'])){ echo "selected"; } ?>>Bottom Right</option>
                                            <option value="bottom-left" <?php if($fcpfw_comman['fcpfw_basket_count_position'] == "bottom-left"){ echo "selected"; } ?>>Bottom Left</option>
                                            <option value="top-right" <?php  if($fcpfw_comman['fcpfw_basket_count_position'] == "top-right" || empty($fcpfw_comman['fcpfw_basket_count_position'])){ echo "selected"; } ?>>Top-right</option>
                                        </select>
                                    </td>
                                </tr>     
                                
                               
                                <tr>
                                    <th>Basket Icon Size</th>
                                    <td>
                                        <input type="number" name="fcpfw_comman[fcpfw_basket_icn_size]" value="<?php echo esc_attr($fcpfw_comman['fcpfw_basket_icn_size']); ?>">
                                    </td>
                                </tr> 
                                <tr>
                                    <th>Basket Offset ↨</th>
                                    <td>
                                       <input type="number" name="fcpfw_comman[fcpfw_basket_off_vertical]" value="<?php echo esc_attr($fcpfw_comman['fcpfw_basket_off_vertical']); ?>">
                                    </td>
                                </tr>
                                <tr>
                                    <th>Basket Offset ⟷</th>
                                    <td>
                                       <input type="number" name="fcpfw_comman[fcpfw_basket_off_horizontal]" value="<?php echo esc_attr($fcpfw_comman['fcpfw_basket_off_horizontal']); ?>">
                                    </td>
                                </tr>

                                <tr>
                                    <th>Basket Background Color</th>
                                    <td>
                                        <?php 
                                            if( !empty($fcpfw_comman['fcpfw_basket_bg_clr'])) {
                                                $fcpfw_basket_bg_clr = '#ffffff';
                                            }
                                        ?>
                                        <input type="text" class="color-picker" data-alpha="true" data-default-color="<?php echo esc_attr($fcpfw_basket_bg_clr); ?>" name="fcpfw_comman[fcpfw_basket_bg_clr]" value="<?php echo esc_attr($fcpfw_comman['fcpfw_basket_bg_clr']); ?>"/>
                                    </td>

                                </tr>
                                <tr>
                                    <th>Basket Color</th>
                                    <td>
                                        <?php 
                                            if( !empty($fcpfw_comman['fcpfw_basket_clr'])) {
                                                $fcpfw_basket_clr = '#000000';
                                            }
                                        ?>
                                        <input type="text" class="color-picker" data-alpha="true" data-default-color="<?php echo esc_attr($fcpfw_basket_clr); ?>" name="fcpfw_comman[fcpfw_basket_clr]" value="<?php echo esc_attr($fcpfw_comman['fcpfw_basket_clr']); ?>"/>
                                    </td>

                                </tr>
                                <tr>
                                    <th>Count Background Color</th>
                                    <td>
                                        <?php 
                                            if( !empty($fcpfw_comman['fcpfw_cnt_bg_clr'])) {
                                                $fcpfw_cnt_bg_clr = '#000000';
                                            }
                                        ?>
                                        <input type="text" class="color-picker" data-alpha="true" data-default-color="<?php echo esc_attr($fcpfw_cnt_bg_clr); ?>" name="fcpfw_comman[fcpfw_cnt_bg_clr]" value="<?php echo esc_attr($fcpfw_comman['fcpfw_cnt_bg_clr']); ?>"/>
                                    </td>
                                </tr> 
                                <tr>
                                    <th>Count Text Color</th>
                                    <td>
                                        <?php 
                                            if( !empty($fcpfw_comman['fcpfw_cnt_txt_clr'])) {
                                                $fcpfw_cnt_txt_clr = '#ffffff';
                                            }
                                        ?>
                                        <input type="text" class="color-picker" data-alpha="true" data-default-color="<?php echo esc_attr($fcpfw_cnt_txt_clr); ?>" name="fcpfw_comman[fcpfw_cnt_txt_clr]" value="<?php echo esc_attr($fcpfw_comman['fcpfw_cnt_txt_clr']); ?>"/>
                                    </td>
                                </tr>
                                <tr>
                                    <th>Count Text Size</th>
                                    <td>
                                        <input type="number" name="fcpfw_comman[fcpfw_cnt_txt_size]" value="<?php echo esc_attr($fcpfw_comman['fcpfw_cnt_txt_size']); ?>">
                                    </td>
                                </tr> 
                                
                            </table>
                        </div>
                    </div>
                </div>
                <div id="fcpfw-tab-translations" class="tab-content">
                    <div class="postbox">
                            <div class="postbox-header">
                                <h2>Translations</h2>                               
                            </div>
                        <div class="inside">
                            <table class="data_table">
                                <tr>
                                    <td>
                                        <h3>Title Settings</h3>
                                    </td>
                                </tr>
                                <tr>
                                    <th>Head Title</th>
                                    <td>
                                        <input type="text" name="fcpfw_comman[fcpfw_head_title]" value="<?php echo esc_attr($fcpfw_comman['fcpfw_head_title']); ?>">
                                    </td>
                                </tr>
                                <tr>
                                    <th>QTY Text</th>
                                    <td>
                                        <input type="text" name="fcpfw_comman[fcpfw_qty_text]" value="<?php echo esc_attr($fcpfw_comman['fcpfw_qty_text']); ?>">
                                    </td>
                                </tr>
                                <tr>
                                    <td>
                                        <h3>Coupon Settings</h3>
                                    </td>
                                </tr>
                                <tr>
                                    <th>Cart is empty Text</th>
                                    <td>
                                        <input type="text" name="fcpfw_comman[fcpfw_cart_is_empty]" value="<?php echo esc_attr($fcpfw_comman['fcpfw_cart_is_empty']); ?>">
                                    </td>
                                </tr>
                                <tr>
                                    <th>Apply Coupon Text</th>
                                    <td>
                                        <input type="text" name="fcpfw_comman[fcpfw_apply_cpn_txt]" value="<?php echo esc_attr($fcpfw_comman['fcpfw_apply_cpn_txt']); ?>">
                                    </td>
                                </tr>
                                <tr>
                                    <th>Apply Coupon Placeholder Text</th>
                                    <td>
                                        <input type="text" name="fcpfw_comman[fcpfw_apply_cpn_plchldr_txt]" value="<?php echo esc_attr($fcpfw_comman['fcpfw_apply_cpn_plchldr_txt']); ?>">
                                    </td>
                                </tr>
                                <tr>
                                    <th>Apply Coupon Apply Button Text</th>
                                    <td>
                                        <input type="text" name="fcpfw_comman[fcpfw_apply_cpn_apbtn_txt]" value="<?php echo esc_attr($fcpfw_comman['fcpfw_apply_cpn_apbtn_txt']); ?>">
                                    </td>
                                </tr>
                                <tr>
                                    <th>Coupon Field Empty Text</th>
                                    <td>
                                        <input type="text" name="fcpfw_comman[fcpfw_cpnfield_empty_txt]" value="<?php echo esc_attr($fcpfw_comman['fcpfw_cpnfield_empty_txt']); ?>">
                                    </td>
                                </tr>
                                <tr>
                                    <th>Coupon Already Applied Text</th>
                                    <td>
                                        <input type="text" name="fcpfw_comman[fcpfw_cpn_alapplied_txt]" value="<?php echo esc_attr($fcpfw_comman['fcpfw_cpn_alapplied_txt']); ?>">
                                    </td>
                                </tr>
                                <tr>
                                    <th>Invalid Coupon Code Text</th>
                                    <td>
                                        <input type="text" name="fcpfw_comman[fcpfw_invalid_coupon_txt]" value="<?php echo esc_attr($fcpfw_comman['fcpfw_invalid_coupon_txt']); ?>">
                                    </td>
                                </tr>
                                <tr>
                                    <th>Coupon Applied Successfully Text</th>
                                    <td>
                                        <input type="text" name="fcpfw_comman[fcpfw_coupon_applied_suc_txt]" value="<?php echo esc_attr($fcpfw_comman['fcpfw_coupon_applied_suc_txt']); ?>">
                                    </td>
                                </tr>
                                <tr>
                                    <th>Coupon Removed Successfully Text</th>
                                    <td>
                                        <input type="text" name="fcpfw_comman[fcpfw_coupon_removed_suc_txt]" value="<?php echo esc_attr($fcpfw_comman['fcpfw_coupon_removed_suc_txt']); ?>">
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
                                        <input type="text" name="fcpfw_comman[fcpfw_slider_atcbtn_txt]" value="<?php echo esc_attr($fcpfw_comman['fcpfw_slider_atcbtn_txt']); ?>" disabled>
                                        <label class="fcpfw_comman_link">This Option Available in  <a href="https://www.plugin999.com/plugin/floating-cart-product-for-woocommerce/" target="_blank">Pro Version</a></label>
                                    </td>
                                </tr>
                                <tr>
                                    <th>View Options Button Text</th>
                                    <td>
                                        <input type="text" name="fcpfw_comman[fcpfw_slider_vwoptbtn_txt]" value="<?php echo esc_attr($fcpfw_comman['fcpfw_slider_vwoptbtn_txt']); ?>" disabled>
                                        <label class="fcpfw_comman_link">This Option Available in  <a href="https://www.plugin999.com/plugin/floating-cart-product-for-woocommerce/" target="_blank">Pro Version</a></label>
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
                                        <input type="text" name="fcpfw_comman[fcpfw_subtotal_txt]" value="<?php echo esc_attr($fcpfw_comman['fcpfw_subtotal_txt']); ?>">
                                    </td>
                                </tr>
                                
                                <tr>
                                    <th>View Cart Button Text</th>
                                    <td>
                                        <input type="text" name="fcpfw_comman[fcpfw_cart_txt]" value="<?php echo esc_attr($fcpfw_comman['fcpfw_cart_txt']); ?>">
                                    </td>
                                </tr>
                                <tr>
                                    <th>Checkout Button Text</th>
                                    <td>
                                        <input type="text" name="fcpfw_comman[fcpfw_checkout_txt]" value="<?php echo esc_attr($fcpfw_comman['fcpfw_checkout_txt']); ?>">
                                    </td>
                                </tr>
                                <tr>
                                    <th>Continue Shopping Button Text</th>
                                    <td>
                                        <input type="text" name="fcpfw_comman[fcpfw_conshipping_txt]" value="<?php echo esc_attr($fcpfw_comman['fcpfw_conshipping_txt']); ?>">
                                    </td>
                                </tr>
                                <tr>
                                    <th>Shipping</th>
                                    <td>
                                        <input type="text" name="fcpfw_comman[fcpfw_shipping_text_trans]" value="<?php echo esc_attr($fcpfw_comman['fcpfw_shipping_text_trans']); ?>" disabled>
                                        <label class="fcpfw_comman_link">This Option Available in  <a href="https://www.plugin999.com/plugin/floating-cart-product-for-woocommerce/" target="_blank">Pro Version</a></label>
                                    </td>
                                </tr>
                                <tr>
                                    <th>Tax</th>
                                    <td>
                                        <input type="text" name="fcpfw_comman[fcpfw_apply_taxt_testx]" value="<?php echo esc_attr($fcpfw_comman['fcpfw_apply_taxt_testx']); ?>" disabled>
                                        <label class="fcpfw_comman_link">This Option Available in <a href="https://www.plugin999.com/plugin/floating-cart-product-for-woocommerce/" target="_blank">Pro Version</a></label>
                                    </td>
                                </tr>
                                 <tr>
                                    <th>Discount Text</th>
                                    <td>
                                        <input type="text" name="fcpfw_comman[fcpfw_discount_text_trans]" value="<?php echo esc_attr($fcpfw_comman['fcpfw_discount_text_trans']); ?>"disabled>
                                        <label class="fcpfw_comman_link">This Option Available in  <a href="https://www.plugin999.com/plugin/floating-cart-product-for-woocommerce/" target="_blank">Pro Version</a></label>
                                    </td>
                                </tr>
                                <tr>
                                    <th>Total</th>
                                    <td>
                                        <input type="text" name="fcpfw_comman[fcpfw_apply_total_text]" value="<?php echo esc_attr($fcpfw_comman['fcpfw_apply_total_text']); ?>" disabled>
                                        <label class="fcpfw_comman_link">This Option Available in <a href="https://www.plugin999.com/plugin/floating-cart-product-for-woocommerce/" target="_blank">Pro Version</a></label>
                                    </td>
                                </tr>

                            </table>
                        </div>
                    </div>
                </div>
                <input type="hidden" name="action" value="fcpfw_save_option">
                <input type="submit" value="Save changes" name="submit" class="button-primary" id="fcpfw-btn-space">
            </form>  
        </div>
    <?php
}

function fcpfw_recursive_sanitize_text_field($array) {
    if(!empty($array)) {
        foreach ( $array as $key => $value ) {
            if ( is_array( $value ) ) {
                $value = fcpfw_recursive_sanitize_text_field($value);
            }else{
                $value = sanitize_text_field( $value );
            }
        }
    }
    return $array;
}

add_action( 'init', 'fcpfw_save_options');
function fcpfw_save_options() {
    if( current_user_can('administrator') ) {
        if(isset($_REQUEST['action']) && $_REQUEST['action'] == 'fcpfw_save_option') {
            if(!isset( $_POST['fcpfw_nonce_field'] ) || !wp_verify_nonce( $_POST['fcpfw_nonce_field'], 'fcpfw_nonce_action' ) ){
                print 'Sorry, your nonce did not verify.';
                exit;
            } else {

                if(!empty($_REQUEST['fcpfw_comman'])){
                    $isecheckbox = array(
                        'fcpfw_header_cart_icon',
                        'fcpfw_header_close_icon',
                        'fcpfw_freeshiping_herder',
                        'fcpfw_loop_img',
                        'fcpfw_loop_product_name',
                        'fcpfw_loop_product_price',
                        'fcpfw_loop_total',
                        'fcpfw_loop_variation',
                        'fcpfw_loop_link',
                        'fcpfw_loop_delete',
                        'fcpfw_auto_open',
                        'fcpfw_trigger_class',
                        'fcpfw_ajax_cart',
                        'fcpfw_qty_box',
                        'fcpfw_cart_option',
                        'fcpfw_checkout_option',
                        'fcpfw_conshipping_option',
                        'fcpfw_coupon_field_mobile',
                        'fcpfw_show_cart_icn',
                        'fcpfw_mobile',
                        'fcpfw_product_cnt',
                        'fcpfw_all_pages',
                        'fcpfw_display_home_page',
                        'fcpfw_display_shop_page',
                        'fcpfw_display_product_page',
                        'fcpfw_display_cart_page',
                        'fcpfw_display_checkout_page',
                        'product_cat_page',
                        'product_tag_page',
                    );

                    foreach ($isecheckbox as $key_isecheckbox => $value_isecheckbox) {
                        if(!isset($_REQUEST['fcpfw_comman'][$value_isecheckbox])){
                            $_REQUEST['fcpfw_comman'][$value_isecheckbox] ='no';
                        }
                    }
                    
                    foreach ($_REQUEST['fcpfw_comman'] as $key_fcpfw_comman => $value_fcpfw_comman) {
                        update_option($key_fcpfw_comman, sanitize_text_field($value_fcpfw_comman), 'yes');
                    }
                }

                // if(isset($_REQUEST['fcpfw_select2'])) {
                //     $fcpfw_select2 = fcpfw_recursive_sanitize_text_field($_REQUEST['fcpfw_select2'] );
                //     update_option('fcpfw_select2', $fcpfw_select2, 'yes');
                // }


                wp_redirect( admin_url( '/admin.php?page=floating-cart&message=success' ) );
                exit;
            }
        }
    }
}

add_action( 'wp_ajax_FCPFW_product_ajax','FCPFW_product_ajax');
add_action( 'wp_ajax_nopriv_FCPFW_product_ajax','FCPFW_product_ajax');
function FCPFW_product_ajax() {
    if ( ! isset( $_REQUEST['nonce'] ) || ! wp_verify_nonce( $_REQUEST['nonce'], 'fcpfw_ajax_nonce' ) ) {
        wp_die( 'Security check failed. Nonce is invalid.' );
    }
    
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
        ) );
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