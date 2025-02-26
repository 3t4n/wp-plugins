<?php

defined('ABSPATH') or exit('Please don&rsquo;t call the plugin directly. Thanks :)');

function rankology_get_schema_metaboxe_product($rankology_fno_rich_snippets_data, $key_schema = 0) {
    $options_currencies = rankology_get_options_schema_currencies();

    $rankology_fno_rich_snippets_product_name = isset($rankology_fno_rich_snippets_data['_rankology_fno_rich_snippets_product_name']) ? $rankology_fno_rich_snippets_data['_rankology_fno_rich_snippets_product_name'] : '';
    $rankology_fno_rich_snippets_product_description = isset($rankology_fno_rich_snippets_data['_rankology_fno_rich_snippets_product_description']) ? $rankology_fno_rich_snippets_data['_rankology_fno_rich_snippets_product_description'] : '';
    $rankology_fno_rich_snippets_product_img = isset($rankology_fno_rich_snippets_data['_rankology_fno_rich_snippets_product_img']) ? $rankology_fno_rich_snippets_data['_rankology_fno_rich_snippets_product_img'] : '';
    $rankology_fno_rich_snippets_product_price = isset($rankology_fno_rich_snippets_data['_rankology_fno_rich_snippets_product_price']) ? $rankology_fno_rich_snippets_data['_rankology_fno_rich_snippets_product_price'] : '';
    $rankology_fno_rich_snippets_product_price_valid_date = isset($rankology_fno_rich_snippets_data['_rankology_fno_rich_snippets_product_price_valid_date']) ? $rankology_fno_rich_snippets_data['_rankology_fno_rich_snippets_product_price_valid_date'] : '';
    $rankology_fno_rich_snippets_product_sku = isset($rankology_fno_rich_snippets_data['_rankology_fno_rich_snippets_product_sku']) ? $rankology_fno_rich_snippets_data['_rankology_fno_rich_snippets_product_sku'] : '';
    $rankology_fno_rich_snippets_product_brand = isset($rankology_fno_rich_snippets_data['_rankology_fno_rich_snippets_product_brand']) ? $rankology_fno_rich_snippets_data['_rankology_fno_rich_snippets_product_brand'] : '';
    $rankology_fno_rich_snippets_product_global_ids = isset($rankology_fno_rich_snippets_data['_rankology_fno_rich_snippets_product_global_ids']) ? $rankology_fno_rich_snippets_data['_rankology_fno_rich_snippets_product_global_ids'] : '';
    $rankology_fno_rich_snippets_product_global_ids_value = isset($rankology_fno_rich_snippets_data['_rankology_fno_rich_snippets_product_global_ids_value']) ? $rankology_fno_rich_snippets_data['_rankology_fno_rich_snippets_product_global_ids_value'] : '';
    $rankology_fno_rich_snippets_product_price_currency = isset($rankology_fno_rich_snippets_data['_rankology_fno_rich_snippets_product_price_currency']) ? $rankology_fno_rich_snippets_data['_rankology_fno_rich_snippets_product_price_currency'] : '';
    $rankology_fno_rich_snippets_product_condition = isset($rankology_fno_rich_snippets_data['_rankology_fno_rich_snippets_product_condition']) ? $rankology_fno_rich_snippets_data['_rankology_fno_rich_snippets_product_condition'] : '';
    $rankology_fno_rich_snippets_product_availability = isset($rankology_fno_rich_snippets_data['_rankology_fno_rich_snippets_product_availability']) ? $rankology_fno_rich_snippets_data['_rankology_fno_rich_snippets_product_availability'] : '';
    $rankology_fno_rich_snippets_product_positive_notes = isset($rankology_fno_rich_snippets_data['_rankology_fno_rich_snippets_product_positive_notes']) ? $rankology_fno_rich_snippets_data['_rankology_fno_rich_snippets_product_positive_notes'] : [];
    $rankology_fno_rich_snippets_product_negative_notes = isset($rankology_fno_rich_snippets_data['_rankology_fno_rich_snippets_product_negative_notes']) ? $rankology_fno_rich_snippets_data['_rankology_fno_rich_snippets_product_negative_notes'] : [];
    $rankology_fno_rich_snippets_product_energy_consumption = isset($rankology_fno_rich_snippets_data['_rankology_fno_rich_snippets_product_energy_consumption']) ? $rankology_fno_rich_snippets_data['_rankology_fno_rich_snippets_product_energy_consumption'] : 'none';


    ?>
<div class="wrap-rich-snippets-item wrap-rich-snippets-products">
    <div class="rankology-notice">
        <p>
            <?php esc_html_e('Add markup to your product pages so Google can provide detailed product information in rich Search results - including Image Search. Users can see price, availability... right on Search results.', 'wp-rankology'); ?>
        </p>
    </div>
    <div class="rankology-notice is-warning">
        <ul class="advice rankology-list">
            <li><?php esc_html_e('<strong>Use markup for a specific product, not a category or list of products.</strong> For example, "shoes in our shop" is not a specific product.', 'wp-rankology'); ?>
            </li>
            <li><?php esc_html_e('<strong>Adult-related products are not supported.</strong>', 'wp-rankology'); ?>
            </li>
            <li><?php esc_html_e('<strong>Works best with WooCommerce: we automatically add aggregateRating properties from user reviews (you have to enable this option from WooCommerce settings).</strong>', 'wp-rankology'); ?>
            </li>
        </ul>
    </div>
    <p>
        <label for="rankology_fno_rich_snippets_product_name_meta">
            <?php esc_html_e('Product name', 'wp-rankology'); ?>
        </label>
        <input type="text" id="rankology_fno_rich_snippets_product_name_meta"
            name="rankology_fno_rich_snippets_data[<?php echo $key_schema; ?>][rankology_fno_rich_snippets_product_name]"
            placeholder="<?php echo esc_html__('The name of your product', 'wp-rankology'); ?>"
            aria-label="<?php esc_html_e('Product name', 'wp-rankology'); ?>"
            value="<?php echo $rankology_fno_rich_snippets_product_name; ?>" />
        <span class="description"><?php esc_html_e('Default: product title', 'wp-rankology'); ?></span>
    </p>
    <p>
        <label for="rankology_fno_rich_snippets_product_description_meta">
            <?php esc_html_e('Product description', 'wp-rankology'); ?>
        </label>
        <textarea id="rankology_fno_rich_snippets_product_description_meta"
            name="rankology_fno_rich_snippets_data[<?php echo $key_schema; ?>][rankology_fno_rich_snippets_product_description]"
            placeholder="<?php echo esc_html__('The description of the product', 'wp-rankology'); ?>"
            aria-label="<?php esc_html_e('Product description', 'wp-rankology'); ?>"><?php echo $rankology_fno_rich_snippets_product_description; ?></textarea>
        <span class="description"><?php esc_html_e('Default: product excerpt', 'wp-rankology'); ?></span>
    </p>
    <p>
        <label for="rankology_fno_rich_snippets_product_img_meta">
            <?php esc_html_e('Thumbnail', 'wp-rankology'); ?>
        </label>
        <span class="description"><?php esc_html_e('Pictures clearly showing the product, e.g. against a white background, are preferred', 'wp-rankology'); ?></span>
        <input id="rankology_fno_rich_snippets_product_img_meta" type="text"
            name="rankology_fno_rich_snippets_data[<?php echo $key_schema; ?>][rankology_fno_rich_snippets_product_img]"
            placeholder="<?php echo esc_html__('Select your image', 'wp-rankology'); ?>"
            aria-label="<?php esc_html_e('Thumbnail', 'wp-rankology'); ?>"
            value="<?php echo $rankology_fno_rich_snippets_product_img; ?>" />
        <input id="rankology_fno_rich_snippets_product_img"
            class="<?php echo rankology_btn_secondary_classes(); ?> rankology_media_upload"
            type="button"
            value="<?php esc_html_e('Upload an Image', 'wp-rankology'); ?>" />
        <span class="description"><?php esc_html_e('Default: product image', 'wp-rankology'); ?></span>
    </p>
    <p>
        <label for="rankology_fno_rich_snippets_product_price_meta">
            <?php esc_html_e('Product price', 'wp-rankology'); ?>
        </label>
        <input type="text" id="rankology_fno_rich_snippets_product_price_meta"
            name="rankology_fno_rich_snippets_data[<?php echo $key_schema; ?>][rankology_fno_rich_snippets_product_price]"
            placeholder="<?php echo esc_html__('e.g. 30', 'wp-rankology'); ?>"
            aria-label="<?php esc_html_e('Product price', 'wp-rankology'); ?>"
            value="<?php echo $rankology_fno_rich_snippets_product_price; ?>" />
        <span class="description"><?php esc_html_e('Default: active product price', 'wp-rankology'); ?></span>
    </p>
    <p>
        <label for="rankology-date-picker6">
            <?php esc_html_e('Product price valid until', 'wp-rankology'); ?>
        </label>
        <input id="rankology-date-picker6" type="text"
            name="rankology_fno_rich_snippets_data[<?php echo $key_schema; ?>][rankology_fno_rich_snippets_product_price_valid_date]"
            class="rankology-date-picker"
            placeholder="<?php echo esc_html__('e.g. YYYY-MM-DD', 'wp-rankology'); ?>"
            aria-label="<?php esc_html_e('Product price valid until', 'wp-rankology'); ?>"
            value="<?php echo $rankology_fno_rich_snippets_product_price_valid_date; ?>" />
        <span class="description"><?php esc_html_e('Default: sale price dates To field', 'wp-rankology'); ?></span>
    </p>
    <p>
        <label for="rankology_fno_rich_snippets_product_sku_meta">
            <?php esc_html_e('Product SKU', 'wp-rankology'); ?>
        </label>
        <input type="text" id="rankology_fno_rich_snippets_product_sku_meta"
            name="rankology_fno_rich_snippets_data[<?php echo $key_schema; ?>][rankology_fno_rich_snippets_product_sku]"
            placeholder="<?php echo esc_html__('e.g. 0446310786', 'wp-rankology'); ?>"
            aria-label="<?php esc_html_e('Product SKU', 'wp-rankology'); ?>"
            value="<?php echo $rankology_fno_rich_snippets_product_sku; ?>" />
        <span class="description"><?php esc_html_e('Default: product SKU', 'wp-rankology'); ?></span>
    </p>
    <p>
        <label for="rankology_fno_rich_snippets_product_global_ids_meta">
            <?php esc_html_e('Product Global Identifiers type', 'wp-rankology'); ?>
        </label>
        <select id="rankology_fno_rich_snippets_product_global_ids_meta"
            name="rankology_fno_rich_snippets_data[<?php echo $key_schema; ?>][rankology_fno_rich_snippets_product_global_ids]">
            <option <?php selected('none', $rankology_fno_rich_snippets_product_global_ids); ?>
                value="none"><?php esc_html_e('Select a global identifier', 'wp-rankology'); ?>
            </option>
            <option <?php selected('gtin8', $rankology_fno_rich_snippets_product_global_ids); ?>
                value="gtin8"><?php esc_html_e('gtin8 (ean8)', 'wp-rankology'); ?>
            </option>
            <option <?php selected('gtin12', $rankology_fno_rich_snippets_product_global_ids); ?>
                value="gtin12"><?php esc_html_e('gtin12 (ean12)', 'wp-rankology'); ?>
            </option>
            <option <?php selected('gtin13', $rankology_fno_rich_snippets_product_global_ids); ?>
                value="gtin13"><?php esc_html_e('gtin13 (ean13)', 'wp-rankology'); ?>
            </option>
            <option <?php selected('gtin14', $rankology_fno_rich_snippets_product_global_ids); ?>
                value="gtin14"><?php esc_html_e('gtin14 (ean14)', 'wp-rankology'); ?>
            </option>
            <option <?php selected('mpn', $rankology_fno_rich_snippets_product_global_ids); ?>
                value="mpn"><?php esc_html_e('mpn', 'wp-rankology'); ?>
            </option>
            <option <?php selected('isbn', $rankology_fno_rich_snippets_product_global_ids); ?>
                value="isbn"><?php esc_html_e('isbn', 'wp-rankology'); ?>
            </option>
        </select>
    </p>
    <p>
        <label for="rankology_fno_rich_snippets_product_global_ids_value_meta">
            <?php esc_html_e('Product Global Identifier value', 'wp-rankology'); ?>
        </label>
        <input type="text" id="rankology_fno_rich_snippets_product_global_ids_value_meta"
            name="rankology_fno_rich_snippets_data[<?php echo $key_schema; ?>][rankology_fno_rich_snippets_product_global_ids_value]"
            placeholder="<?php echo esc_html__('e.g. 925872', 'wp-rankology'); ?>"
            aria-label="<?php esc_html_e('Product Global Identifiers', 'wp-rankology'); ?>"
            value="<?php echo $rankology_fno_rich_snippets_product_global_ids_value; ?>" />
    </p>
    <p>
        <label for="rankology_fno_rich_snippets_product_brand_meta">
            <?php esc_html_e('Product Brand', 'wp-rankology'); ?>
        </label>
        <?php
                $serviceWpData = rankology_get_service('WordPressData');
    $rankology_get_taxonomies = [];
    if ($serviceWpData && method_exists($serviceWpData, 'getTaxonomies')) {
        $rankology_get_taxonomies = $serviceWpData->getTaxonomies();
    }
    if ( ! empty($rankology_get_taxonomies)) {
        ?>
        <select id="rankology_fno_rich_snippets_product_brand_meta"
            name="rankology_fno_rich_snippets_data[<?php echo $key_schema; ?>][rankology_fno_rich_snippets_product_brand]">
            <option <?php selected('none', $rankology_fno_rich_snippets_product_brand); ?>
                value="none">
                <?php esc_html_e('Select a taxonomy', 'wp-rankology'); ?>
            </option>

            <?php foreach ($rankology_get_taxonomies as $key => $value) { ?>
            <option <?php selected($key, $rankology_fno_rich_snippets_product_brand); ?>
                value="<?php echo $key; ?>"><?php echo $key; ?>
            </option>
            <?php } ?>
        </select>
        <?php
    } ?>
    </p>
    <p>
        <label for="rankology_fno_rich_snippets_product_price_currency_meta">
            <?php esc_html_e('Product currency', 'wp-rankology'); ?>
        </label>
        <select id="rankology_fno_rich_snippets_product_price_currency_meta"
            name="rankology_fno_rich_snippets_data[<?php echo $key_schema; ?>][rankology_fno_rich_snippets_product_price_currency]">
            <?php foreach ($options_currencies as $item) { ?>
            <option <?php selected($item['value'], $rankology_fno_rich_snippets_product_price_currency); ?>
                value="<?php echo $item['value']; ?>">
                <?php echo $item['label']; ?>
            </option>
            <?php } ?>
        </select>
    </p>
    <p>
        <label for="rankology_fno_rich_snippets_product_condition_meta"><?php esc_html_e('Product Condition', 'wp-rankology'); ?>
        </label>
        <select id="rankology_fno_rich_snippets_product_condition_meta"
            name="rankology_fno_rich_snippets_data[<?php echo $key_schema; ?>][rankology_fno_rich_snippets_product_condition]">
            <option <?php selected('NewCondition', $rankology_fno_rich_snippets_product_condition); ?>
                value="NewCondition"><?php esc_html_e('New', 'wp-rankology'); ?>
            </option>
            <option <?php selected('UsedCondition', $rankology_fno_rich_snippets_product_condition); ?>
                value="UsedCondition"><?php esc_html_e('Used', 'wp-rankology'); ?>
            </option>
            <option <?php selected('DamagedCondition', $rankology_fno_rich_snippets_product_condition); ?>
                value="DamagedCondition"><?php esc_html_e('Damaged', 'wp-rankology'); ?>
            </option>
            <option <?php selected('RefurbishedCondition', $rankology_fno_rich_snippets_product_condition); ?>
                value="RefurbishedCondition"><?php esc_html_e('Refurbished', 'wp-rankology'); ?>
            </option>
        </select>
        <span class="description"><?php esc_html_e('Default: new', 'wp-rankology'); ?></span>
    </p>
    <p>
        <label for="rankology_fno_rich_snippets_product_availability_meta"><?php esc_html_e('Product Availability', 'wp-rankology'); ?>
        </label>
        <select id="rankology_fno_rich_snippets_product_availability_meta"
            name="rankology_fno_rich_snippets_data[<?php echo $key_schema; ?>][rankology_fno_rich_snippets_product_availability]">
            <option <?php selected('InStock', $rankology_fno_rich_snippets_product_availability); ?>
                value="InStock"><?php esc_html_e('In Stock', 'wp-rankology'); ?>
            </option>
            <option <?php selected('InStoreOnly', $rankology_fno_rich_snippets_product_availability); ?>
                value="InStoreOnly"><?php esc_html_e('In Store Only', 'wp-rankology'); ?>
            </option>
            <option <?php selected('OnlineOnly', $rankology_fno_rich_snippets_product_availability); ?>
                value="OnlineOnly"><?php esc_html_e('Online Only', 'wp-rankology'); ?>
            </option>
            <option <?php selected('LimitedAvailability', $rankology_fno_rich_snippets_product_availability); ?>
                value="LimitedAvailability"><?php esc_html_e('Limited Availability', 'wp-rankology'); ?>
            </option>
            <option <?php selected('SoldOut', $rankology_fno_rich_snippets_product_availability); ?>
                value="SoldOut"><?php esc_html_e('Sold Out', 'wp-rankology'); ?>
            </option>
            <option <?php selected('OutOfStock', $rankology_fno_rich_snippets_product_availability); ?>
                value="OutOfStock"><?php esc_html_e('Out Of Stock', 'wp-rankology'); ?>
            </option>
            <option <?php selected('Discontinued', $rankology_fno_rich_snippets_product_availability); ?>
                value="Discontinued"><?php esc_html_e('Discontinued', 'wp-rankology'); ?>
            </option>
            <option <?php selected('PreOrder', $rankology_fno_rich_snippets_product_availability); ?>
                value="PreOrder"><?php esc_html_e('Pre Order', 'wp-rankology'); ?>
            </option>
            <option <?php selected('PreSale', $rankology_fno_rich_snippets_product_availability); ?>
                value="PreSale"><?php esc_html_e('Pre Sale', 'wp-rankology'); ?>
            </option>
        </select>
    </p>

    <p>
        <label for="_rankology_fno_rich_snippets_product_energy_consumption"><?php esc_html_e('Energy Consumption', 'wp-rankology'); ?>
        </label>
        <select id="_rankology_fno_rich_snippets_product_energy_consumption"
            name="rankology_fno_rich_snippets_data[<?php echo $key_schema; ?>][rankology_fno_rich_snippets_product_energy_consumption]">
            <option <?php selected('none', $rankology_fno_rich_snippets_product_energy_consumption); ?>
                value="none"><?php esc_html_e('Select an Energy Consumption', 'wp-rankology'); ?>
            </option>
            <option <?php selected('https://schema.org/EUEnergyEfficiencyCategoryA3Plus', $rankology_fno_rich_snippets_product_energy_consumption); ?>
                value="https://schema.org/EUEnergyEfficiencyCategoryA3Plus"><?php esc_html_e('A+++', 'wp-rankology'); ?>
            </option>
            <option <?php selected('https://schema.org/EUEnergyEfficiencyCategoryA2Plus', $rankology_fno_rich_snippets_product_energy_consumption); ?>
                value="https://schema.org/EUEnergyEfficiencyCategoryA2Plus"><?php esc_html_e('A++', 'wp-rankology'); ?>
            </option>
            <option <?php selected('https://schema.org/EUEnergyEfficiencyCategoryA1Plus', $rankology_fno_rich_snippets_product_energy_consumption); ?>
                value="https://schema.org/EUEnergyEfficiencyCategoryA1Plus"><?php esc_html_e('A+', 'wp-rankology'); ?>
            </option>
            <option <?php selected('https://schema.org/EUEnergyEfficiencyCategoryA', $rankology_fno_rich_snippets_product_energy_consumption); ?>
                value="https://schema.org/EUEnergyEfficiencyCategoryA"><?php esc_html_e('A', 'wp-rankology'); ?>
            </option>
            <option <?php selected('https://schema.org/EUEnergyEfficiencyCategoryB', $rankology_fno_rich_snippets_product_energy_consumption); ?>
                value="https://schema.org/EUEnergyEfficiencyCategoryB"><?php esc_html_e('B', 'wp-rankology'); ?>
            </option>
            <option <?php selected('https://schema.org/EUEnergyEfficiencyCategoryC', $rankology_fno_rich_snippets_product_energy_consumption); ?>
                value="https://schema.org/EUEnergyEfficiencyCategoryC"><?php esc_html_e('C', 'wp-rankology'); ?>
            </option>
            <option <?php selected('https://schema.org/EUEnergyEfficiencyCategoryD', $rankology_fno_rich_snippets_product_energy_consumption); ?>
                value="https://schema.org/EUEnergyEfficiencyCategoryD"><?php esc_html_e('D', 'wp-rankology'); ?>
            </option>
            <option <?php selected('https://schema.org/EUEnergyEfficiencyCategoryE', $rankology_fno_rich_snippets_product_energy_consumption); ?>
                value="https://schema.org/EUEnergyEfficiencyCategoryE"><?php esc_html_e('E', 'wp-rankology'); ?>
            </option>
            <option <?php selected('https://schema.org/EUEnergyEfficiencyCategoryF', $rankology_fno_rich_snippets_product_energy_consumption); ?>
                value="https://schema.org/EUEnergyEfficiencyCategoryF"><?php esc_html_e('F', 'wp-rankology'); ?>
            </option>
            <option <?php selected('https://schema.org/EUEnergyEfficiencyCategoryG', $rankology_fno_rich_snippets_product_energy_consumption); ?>
                value="https://schema.org/EUEnergyEfficiencyCategoryG"><?php esc_html_e('G', 'wp-rankology'); ?>
            </option>
        </select>
    </p>

    <?php


    //if( isset($_GET['post']) && get_post_type( $_GET['post']) !== 'product' && is_plugin_active('woocommerce/woocommerce.php') ){

        ?>
        <p>
            <label for="rankology_fno_rich_snippets_product_positive_notes">
                <?php esc_html_e('Positive notes', 'wp-rankology'); ?>
            </label>
        </p>
        <div id="wrap-positive-notes" data-count="<?php echo count($rankology_fno_rich_snippets_product_positive_notes); ?>">


            <?php foreach ($rankology_fno_rich_snippets_product_positive_notes as $key => $value) {
                    $name = isset($value['name']) ? esc_attr($value['name']) : null;
                    ?>
                <div class="positive_notes">
                    <h3 class="accordion-section-title" tabindex="0">
                        <?php if (empty($name)) { ?>
                            <span style="color:red">
                            <?php esc_html_e('Empty Statement', 'wp-rankology'); ?>
                            </span>
                        <?php } else {
                            echo $name;
                        }
                        ?>
                    </h3>
                    <div class="accordion-section-content">
                        <div class="inside">
                            <p>
                                <label
                                    for="rankology_fno_rich_snippets_data[<?php echo $key_schema; ?>][rankology_fno_rich_snippets_product_positive_notes][<?php echo $key; ?>][name]">
                                    <?php esc_html_e('Name (required)', 'wp-rankology'); ?>
                                </label>
                                <input
                                    id="rankology_fno_rich_snippets_data[<?php echo $key_schema; ?>][rankology_fno_rich_snippets_product_positive_notes][<?php echo $key; ?>][name]"
                                    type="text"
                                    name="rankology_fno_rich_snippets_data[<?php echo $key_schema; ?>][rankology_fno_rich_snippets_product_positive_notes][<?php echo $key; ?>][name]"
                                    placeholder="<?php echo esc_html__('Enter your name', 'wp-rankology'); ?>"
                                    aria-label="<?php esc_html_e('Name', 'wp-rankology'); ?>"
                                    value="<?php echo $name; ?>" />
                            </p>
                            <p>
                                <a href="#" class="remove-positive-note button">
                                    <?php esc_html_e('Remove statement', 'wp-rankology'); ?>
                                </a>
                            </p>
                        </div>
                    </div>
                </div>
                <?php
            } ?>
        </div>
        <p>
            <a href="#" id="add-positive-note" class="add-positive-note <?php echo rankology_btn_secondary_classes(); ?>"><?php esc_html_e('Add statement', 'wp-rankology'); ?></a>
        </p>

        <template
            id="schema-template-positive-note">
            <div class="positive_notes">
                <h3 class="accordion-section-title" tabindex="0">
                    <span style="color:red">
                        <?php esc_html_e('Empty Statement', 'wp-rankology'); ?>
                    </span>
                </h3>
                <div class="accordion-section-content">
                    <div class="inside">
                        <p>
                            <label
                                for="rankology_fno_rich_snippets_data[<?php echo $key_schema; ?>][rankology_fno_rich_snippets_product_positive_notes][X][name]">
                                <?php esc_html_e('Name (required)', 'wp-rankology'); ?>
                            </label>
                            <input
                                id="rankology_fno_rich_snippets_data[<?php echo $key_schema; ?>][rankology_fno_rich_snippets_product_positive_notes][X][name]"
                                type="text"
                                name="rankology_fno_rich_snippets_data[<?php echo $key_schema; ?>][rankology_fno_rich_snippets_product_positive_notes][X][name]"
                                placeholder="<?php echo esc_html__('Enter your name', 'wp-rankology'); ?>"
                                aria-label="<?php esc_html_e('Name', 'wp-rankology'); ?>"
                                value="" />
                        </p>
                        <p>
                            <a href="#" class="remove-positive-note button">
                                <?php esc_html_e('Remove statement', 'wp-rankology'); ?>
                            </a>
                        </p>
                    </div>
                </div>
            </div>
        </template>

        <p>
            <label for="rankology_fno_rich_snippets_product_negative_notes">
                <?php esc_html_e('Negative notes', 'wp-rankology'); ?>
            </label>
        </p>
        <div id="wrap-negative-notes" data-count="<?php echo count($rankology_fno_rich_snippets_product_negative_notes); ?>">


            <?php foreach ($rankology_fno_rich_snippets_product_negative_notes as $key => $value) {
                    $name = isset($value['name']) ? esc_attr($value['name']) : null;
                    ?>
                <div class="negative_notes">
                    <h3 class="accordion-section-title" tabindex="0">
                        <?php if (empty($name)) { ?>
                            <span style="color:red">
                            <?php esc_html_e('Empty Statement', 'wp-rankology'); ?>
                            </span>
                        <?php } else {
                            echo $name;
                        }
                        ?>
                    </h3>
                    <div class="accordion-section-content">
                        <div class="inside">
                            <p>
                                <label
                                    for="rankology_fno_rich_snippets_data[<?php echo $key_schema; ?>][rankology_fno_rich_snippets_product_negative_notes][<?php echo $key; ?>][name]">
                                    <?php esc_html_e('Name (required)', 'wp-rankology'); ?>
                                </label>
                                <input
                                    id="rankology_fno_rich_snippets_data[<?php echo $key_schema; ?>][rankology_fno_rich_snippets_product_negative_notes][<?php echo $key; ?>][name]"
                                    type="text"
                                    name="rankology_fno_rich_snippets_data[<?php echo $key_schema; ?>][rankology_fno_rich_snippets_product_negative_notes][<?php echo $key; ?>][name]"
                                    placeholder="<?php echo esc_html__('Enter your name', 'wp-rankology'); ?>"
                                    aria-label="<?php esc_html_e('Name', 'wp-rankology'); ?>"
                                    value="<?php echo $name; ?>" />
                            </p>
                            <p>
                                <a href="#" class="remove-negative-note button">
                                    <?php esc_html_e('Remove statement', 'wp-rankology'); ?>
                                </a>
                            </p>
                        </div>
                    </div>
                </div>
                <?php
            }

            ?>
        </div>
        <p>
            <a href="#" id="add-negative-note" class="add-negative-note <?php echo rankology_btn_secondary_classes(); ?>"><?php esc_html_e('Add statement', 'wp-rankology'); ?></a>
        </p>

        <template
            id="schema-template-negative-note">
            <div class="negative_notes">
                <h3 class="accordion-section-title" tabindex="0">
                    <span style="color:red">
                        <?php esc_html_e('Empty Statement', 'wp-rankology'); ?>
                    </span>
                </h3>
                <div class="accordion-section-content">
                    <div class="inside">
                        <p>
                            <label
                                for="rankology_fno_rich_snippets_data[<?php echo $key_schema; ?>][rankology_fno_rich_snippets_product_negative_notes][X][name]">
                                <?php esc_html_e('Name (required)', 'wp-rankology'); ?>
                            </label>
                            <input
                                id="rankology_fno_rich_snippets_data[<?php echo $key_schema; ?>][rankology_fno_rich_snippets_product_negative_notes][X][name]"
                                type="text"
                                name="rankology_fno_rich_snippets_data[<?php echo $key_schema; ?>][rankology_fno_rich_snippets_product_negative_notes][X][name]"
                                placeholder="<?php echo esc_html__('Enter your name', 'wp-rankology'); ?>"
                                aria-label="<?php esc_html_e('Name', 'wp-rankology'); ?>"
                                value="" />
                        </p>
                        <p>
                            <a href="#" class="remove-negative-note button">
                                <?php esc_html_e('Remove statement', 'wp-rankology'); ?>
                            </a>
                        </p>
                    </div>
                </div>
            </div>
        </template>

    <?php
    //}
?>
</div>
<?php
}
