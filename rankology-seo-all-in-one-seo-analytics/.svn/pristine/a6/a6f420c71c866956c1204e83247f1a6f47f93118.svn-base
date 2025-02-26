<?php defined('ABSPATH') or exit('Please don&rsquo;t call the plugin directly. Thanks :)'); ?>

<div class="wrap-rich-snippets-products">
    <div class="rankology-notice">
        <p>
            <?php /* translators: %s: link documentation */
            printf(__('Learn more about the <strong>Product schema</strong> from the <a href="%s" target="_blank">Google official documentation website</a><span class="dashicons dashicons-redo"></span>', 'wp-rankology'), 'https://developers.google.com/search/docs/data-types/product'); ?>
        </p>
    </div>

    <?php
        if (is_plugin_active('woocommerce/woocommerce.php')) {
            if (('no' == get_option('woocommerce_enable_reviews') && get_option('woocommerce_enable_reviews')) || ('no' == get_option('woocommerce_enable_review_rating') && get_option('woocommerce_enable_review_rating')) || ('no' == get_option('woocommerce_review_rating_required') && get_option('woocommerce_review_rating_required')))
            { ?>
                <div class="rankology-notice">
                    <p>
                        <?php esc_html_e('To automatically add <strong>aggregateRating</strong> and <strong>Review</strong> properties to your schema, you have to enable <strong>User Reviews</strong> from WooCommerce settings.', 'wp-rankology'); ?>
                    </p>
                    <p>
                        <?php /* translators: %s: link to plugin settings page */
                            printf(__('Please activate these options from <strong>WC settings</strong>, <strong>Products</strong>, <a href="%s"><strong>General tab</strong></a>:', 'wp-rankology'), admin_url('admin.php?page=wc-settings&tab=products'));
                        ?>
                    </p>
                    <ul>
                <?php
            }
                    if ('no' == get_option('woocommerce_enable_reviews') && get_option('woocommerce_enable_reviews')) { ?>
                        <li>
                            <span class="dashicons dashicons-minus"></span>
                            <?php esc_html_e('Enable product reviews', 'wp-rankology'); ?>
                        </li>
                        <?php }
                        if ('no' == get_option('woocommerce_enable_review_rating') && get_option('woocommerce_enable_review_rating')) { ?>
                        <li>
                            <span class="dashicons dashicons-minus"></span>
                            <?php esc_html_e('Enable star rating on reviews', 'wp-rankology'); ?>
                        </li>
                        <?php }
                        if ('no' == get_option('woocommerce_review_rating_required') && get_option('woocommerce_review_rating_required')) { ?>
                        <li>
                            <span class="dashicons dashicons-minus"></span>
                            <?php esc_html_e('Star ratings should be required, not optional', 'wp-rankology'); ?>
                            <?php }
                                if (('no' == get_option('woocommerce_enable_reviews') && get_option('woocommerce_enable_reviews')) || ('no' == get_option('woocommerce_enable_review_rating') && get_option('woocommerce_enable_review_rating')) || ('no' == get_option('woocommerce_review_rating_required') && get_option('woocommerce_review_rating_required'))) {
                                    echo '</ul></div>';
                                }

                            //WooCommerce Structured data
                            if ('1' !== rankology_fno_get_service('OptionPro')->getWCDisableSchemaOutput()) { ?>
                                <div class="rankology-notice is-error">
                                    <p>
                                        <?php
                                            /* translators: %s: link to plugin settings page */
                                            printf(__('You have not deactivated the default WooCommerce structured data type from our <a href="%s"><strong>General settings > WooCommerce tab</strong></a>. It\'s recommended to disable it to avoid any conflicts with your product schemas.', 'wp-rankology'), admin_url('admin.php?page=rankology-fno-page#tab=tab_rankology_woocommerce'));
                                        ?>
                                    </p>
                                </div>
                                <?php }
                            } else { ?>
                <div class="rankology-notice is-error">
                    <p>
                        <?php esc_html_e('WooCommerce is not enabled on your site. Some properties like <strong>aggregateRating</strong> and <strong>Review</strong> will not work out of the box.', 'wp-rankology'); ?>
                    </p>
                </div>
                <?php } ?>

                <p>
                    <label for="rankology_fno_rich_snippets_product_name_meta">
                        <?php esc_html_e('Product name', 'wp-rankology'); ?>
                    </label>
                    <?php echo rankology_schemas_mapping_array('rankology_fno_rich_snippets_product_name', 'default'); ?>
                    <span class="description"><?php esc_html_e('The name of your product', 'wp-rankology'); ?></span>
                </p>
                <p>
                    <label for="rankology_fno_rich_snippets_product_description_meta"><?php esc_html_e('Product description', 'wp-rankology'); ?></label>
                    <?php echo rankology_schemas_mapping_array('rankology_fno_rich_snippets_product_description', 'default'); ?>
                    <span class="description"><?php esc_html_e('The description of the product', 'wp-rankology'); ?></span>
                </p>
                <p>
                    <label for="rankology_fno_rich_snippets_product_img_meta"><?php esc_html_e('Thumbnail', 'wp-rankology'); ?></label>
                    <?php echo rankology_schemas_mapping_array('rankology_fno_rich_snippets_product_img', 'image'); ?>
                    <span class="description"><?php esc_html_e('Pictures clearly showing the product, e.g. against a white background, are preferred.', 'wp-rankology'); ?></span>
                </p>
                <p>
                    <label for="rankology_fno_rich_snippets_product_price_meta">
                        <?php esc_html_e('Product price', 'wp-rankology'); ?>
                    </label>
                    <?php echo rankology_schemas_mapping_array('rankology_fno_rich_snippets_product_price', 'default'); ?>
                    <span class="description"><?php esc_html_e('e.g. 30', 'wp-rankology'); ?></span>
                </p>
                <p>
                    <label for="rankology_fno_rich_snippets_product_price_valid_date"><?php esc_html_e('Product price valid until', 'wp-rankology'); ?></label>
                    <?php echo rankology_schemas_mapping_array('rankology_fno_rich_snippets_product_price_valid_date', 'date'); ?>
                    <span class="description"><?php esc_html_e('e.g. YYYY-MM-DD', 'wp-rankology'); ?></span>
                </p>
                <p>
                    <label for="rankology_fno_rich_snippets_product_sku_meta">
                        <?php esc_html_e('Product SKU', 'wp-rankology'); ?></label>
                    <?php echo rankology_schemas_mapping_array('rankology_fno_rich_snippets_product_sku', 'default'); ?>
                    <span class="description"><?php esc_html_e('e.g. 0446310786', 'wp-rankology'); ?></span>
                </p>
                <p>
                    <label for="rankology_fno_rich_snippets_product_global_ids_meta">
                        <?php esc_html_e('Product Global Identifiers type', 'wp-rankology'); ?></label>
                    <?php echo rankology_schemas_mapping_array('rankology_fno_rich_snippets_product_global_ids', 'default'); ?>
                    <span class="description"><?php esc_html_e('e.g. gtin8', 'wp-rankology'); ?></span>
                </p>
                <p>
                    <label for="rankology_fno_rich_snippets_product_global_ids_value_meta">
                        <?php esc_html_e('Product Global Identifiers', 'wp-rankology'); ?></label>
                    <?php echo rankology_schemas_mapping_array('rankology_fno_rich_snippets_product_global_ids_value', 'default'); ?>
                    <span class="description"><?php esc_html_e('e.g. 925872', 'wp-rankology'); ?></span>
                </p>
                <p>
                    <label for="rankology_fno_rich_snippets_product_brand_meta">
                        <?php esc_html_e('Product Brand', 'wp-rankology'); ?></label>
                    <?php echo rankology_schemas_mapping_array('rankology_fno_rich_snippets_product_brand', 'default'); ?>
                    <span class="description"><?php esc_html_e('e.g. Apple', 'wp-rankology'); ?></span>
                </p>
                <p>
                    <label for="rankology_fno_rich_snippets_product_price_currency_meta">
                        <?php esc_html_e('Product currency', 'wp-rankology'); ?>
                    </label>
                    <?php echo rankology_schemas_mapping_array('rankology_fno_rich_snippets_product_price_currency', 'default'); ?>
                    <span class="description"><?php esc_html_e('e.g. USD, EUR', 'wp-rankology'); ?></span>
                </p>
                <p>
                    <label for="rankology_fno_rich_snippets_product_condition_meta"><?php esc_html_e('Product Condition', 'wp-rankology'); ?></label>
                    <?php echo rankology_schemas_mapping_array('rankology_fno_rich_snippets_product_condition', 'default'); ?>
                    <span class="description"><?php esc_html_e('<strong>Authorized values:</strong> "NewCondition", "UsedCondition", "DamagedCondition", "RefurbishedCondition"', 'wp-rankology'); ?></span>
                </p>
                <p>
                    <label for="rankology_fno_rich_snippets_product_availability_meta"><?php esc_html_e('Product Availability', 'wp-rankology'); ?></label>
                    <?php echo rankology_schemas_mapping_array('rankology_fno_rich_snippets_product_availability', 'default'); ?>
                    <span class="description"><?php esc_html_e('<strong>Authorized values:</strong> "InStock", "InStoreOnly", "OnlineOnly", "LimitedAvailability", "SoldOut", "OutOfStock", "Discontinued", "PreOrder", "PreSale"', 'wp-rankology'); ?></span>
                </p>
                <p>
                    <label for="rankology_fno_rich_snippets_product_positive_notes"><?php esc_html_e('Positive Notes', 'wp-rankology'); ?></label>
                    <?php echo rankology_schemas_mapping_array('rankology_fno_rich_snippets_product_positive_notes', 'default'); ?>
                </p>
                <p>
                    <label for="rankology_fno_rich_snippets_product_negative_notes"><?php esc_html_e('Negative Notes', 'wp-rankology'); ?></label>
                    <?php echo rankology_schemas_mapping_array('rankology_fno_rich_snippets_product_negative_notes', 'default'); ?>
                </p>
                <p>
                    <label for="rankology_fno_rich_snippets_product_energy_consumption"><?php esc_html_e('Energy Consumption', 'wp-rankology'); ?></label>
                    <?php echo rankology_schemas_mapping_array('rankology_fno_rich_snippets_product_energy_consumption', 'default'); ?>
                </p>
    </div>
