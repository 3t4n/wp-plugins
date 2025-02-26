<?php
    global $wpdb;
    $table= $wpdb->prefix.'aplbcp_setting';
    $aplbcpSettingSql="SELECT * FROM $table";
    $aplbcpSettingRow=$wpdb->get_results($aplbcpSettingSql);

?>
        <form action="admin.php?page=aplbcp-products-settings" method="post">
        <h1 class="wp-heading-inline" style="display: inline-block;">Settings</h1>

        <button type="submit" class="addNewButton" style="display: inline-block;" name="updateSettingBtn">Update Settings</button>
        <hr class="wp-header-end">
        <?php
        if(isset($_GET['updatedsuccess']) && $_GET['updatedsuccess']=="1")
            {
            ?>
            <div class="aplbcp-alert-success">
                Setting Updated Successfully!
            </div>
            <?php
            }
        ?>
        <div class="container">
            <div class="aplbcp-settings">
                <div class="note" style="color:red; margin-left:10px;">  
                    <strong>Note: All value are in Pixel(PX).</strong>
                </div>
                <div class="aplbcp-settings-items">
                    <div>
                        <label class="aplbcp-settings-label">Product Button Text</label>
                        <input class="aplbcp-settings-input" name="aplbcp_product_button_text" type="text" value="<?php echo esc_attr($aplbcpSettingRow[0]->aplbcp_button_text); ?>" />
                    </div>
                    <div>
                        <label class="aplbcp-settings-label">Want to show the product price?</label>
                        <input id="yes" class="aplbcp-settings-input-radio" name="aplbcp_product_price_show" <?php if($aplbcpSettingRow[0]->aplbcp_price_show=='Y'){ echo "checked"; } ?> type="radio" value="Y" />
                        <label for="yes">Yes</label> <br />
                        <input id="no" class="aplbcp-settings-input-radio" name="aplbcp_product_price_show" <?php if($aplbcpSettingRow[0]->aplbcp_price_show=='N'){ echo "checked"; } ?> type="radio" value="N" />
                        <label for="no">No</label> <br />
                    </div>
                    <div>
                        <label class="aplbcp-settings-label">Product Price Symbol</label>
                        <input class="aplbcp-settings-input" name="aplbcp_product_price_symbol" type="text" value="<?php echo esc_attr($aplbcpSettingRow[0]->aplbcp_price_symbol); ?>" />
                    </div>
                    <div>
                        <label class="aplbcp-settings-label">Header Background Color</label>
                        <input class="aplbcp-settings-input" name="aplbcp_header_bg" type="color" value="<?php echo esc_attr($aplbcpSettingRow[0]->aplbcp_header_bg); ?>" />
                    </div>
                    <div>
                        <label class="aplbcp-settings-label">Header Text Color</label>
                        <input class="aplbcp-settings-input" name="aplbcp_header_color" type="color" value="<?php echo esc_attr($aplbcpSettingRow[0]->aplbcp_header_color); ?>" />
                    </div>
                    <div>
                        <label class="aplbcp-settings-label">Header Font Size</label>
                        <input class="aplbcp-settings-input" name="aplbcp_header_font_size" type="number" value="<?php echo esc_attr($aplbcpSettingRow[0]->aplbcp_header_font_size); ?>" />
                    </div>
                    <!-- <div>
                        <label class="aplbcp-settings-label">Product Images Width</label>
                        <input class="aplbcp-settings-input" name="aplbcp_product_img_width" type="number" />
                    </div> -->
                    <div>
                        <label class="aplbcp-settings-label">Product Images Height</label>
                        <input class="aplbcp-settings-input" name="aplbcp_product_img_hieght" type="number" value="<?php echo esc_attr($aplbcpSettingRow[0]->aplbcp_product_img_hieght); ?>" />
                    </div>
                    <div>
                        <label class="aplbcp-settings-label">Product Title Color</label>
                        <input class="aplbcp-settings-input" name="aplbcp_product_title_color" type="color" value="<?php echo esc_attr($aplbcpSettingRow[0]->aplbcp_product_title_color); ?>"  />
                    </div>
                    <div>
                        <label class="aplbcp-settings-label">Product Title Font Size</label>
                        <input class="aplbcp-settings-input" name="aplbcp_product_title_font_size" type="number" value="<?php echo esc_attr($aplbcpSettingRow[0]->aplbcp_product_title_font_size); ?>"  />
                    </div>
                    <div>
                        <label class="aplbcp-settings-label">Product Description Font Size</label>
                        <input class="aplbcp-settings-input" name="aplbcp_product_desc_font_size" type="number" value="<?php echo esc_attr($aplbcpSettingRow[0]->aplbcp_product_desc_font_size); ?>"  />
                    </div>
                    <div>
                        <label class="aplbcp-settings-label">Product Button Background Color</label>
                        <input class="aplbcp-settings-input" name="aplbcp_button_bg" type="color" value="<?php echo esc_attr($aplbcpSettingRow[0]->aplbcp_button_bg); ?>"  />
                    </div>
                    <div>
                        <label class="aplbcp-settings-label">Product Button Text Color</label>
                        <input class="aplbcp-settings-input" name="aplbcp_button_color" type="color" value="<?php echo esc_attr($aplbcpSettingRow[0]->aplbcp_button_color); ?>"  />
                    </div>
                    <div>
                        <label class="aplbcp-settings-label">Product Button Border Color</label>
                        <input class="aplbcp-settings-input" name="aplbcp_button_border_color" type="color" value="<?php echo esc_attr($aplbcpSettingRow[0]->aplbcp_button_border_color); ?>"  />
                    </div>
                    <div>
                        <label class="aplbcp-settings-label">Product Button Border Width</label>
                        <input class="aplbcp-settings-input" name="aplbcp_button_border_width" type="number" value="<?php echo esc_attr($aplbcpSettingRow[0]->aplbcp_button_border_width); ?>"  />
                    </div>
                    <div>
                        <label class="aplbcp-settings-label">Product Button Border Radius</label>
                        <input class="aplbcp-settings-input" name="aplbcp_button_radius" type="number" value="<?php echo esc_attr($aplbcpSettingRow[0]->aplbcp_button_radius); ?>"  />
                    </div>
                    <div>
                        <label class="aplbcp-settings-label">Product Button Hover Background Color</label>
                        <input class="aplbcp-settings-input" name="aplbcp_button_hover_bg" type="color" value="<?php echo esc_attr($aplbcpSettingRow[0]->aplbcp_button_hover_bg); ?>"  />
                    </div>
                    <div>
                        <label class="aplbcp-settings-label">Product Button Hover Text Color</label>
                        <input class="aplbcp-settings-input" name="aplbcp_button_hover_color" type="color" value="<?php echo esc_attr($aplbcpSettingRow[0]->aplbcp_button_hover_color); ?>"  />
                    </div>
                    <div>
                        <label class="aplbcp-settings-label">Product Button Hover Border Color</label>
                        <input class="aplbcp-settings-input" name="aplbcp_button_hover_border_color" type="color" value="<?php echo esc_attr($aplbcpSettingRow[0]->aplbcp_button_hover_border_color); ?>"  />
                    </div>
                    <div>
                        <label class="aplbcp-settings-label">Product Button Hover Border Width</label>
                        <input class="aplbcp-settings-input" name="aplbcp_button_hover_border_width" type="number" value="<?php echo esc_attr($aplbcpSettingRow[0]->aplbcp_button_hover_border_width); ?>"  />
                    </div>
                    <div>
                        <label class="aplbcp-settings-label">Product Button Hover Shadow</label>
                        <input class="aplbcp-settings-input" name="aplbcp_button_hover_shadow" type="text" value="<?php echo esc_attr($aplbcpSettingRow[0]->aplbcp_button_hover_shadow); ?>"  />
                    </div>
                </div>
            </div>
        </div>
        </form>