<?php
global $wpdb;
$table = $wpdb->prefix . 'aplbcp_setting';
$aplbcpSettingSql = "SELECT * FROM $table";
$aplbcpSettingRow = $wpdb->get_results($aplbcpSettingSql);

$aplbcpPriceShow = "N";

if ($aplbcpSettingRow[0]->aplbcp_price_show == "Y") {
    $aplbcpPriceShow = "Y";
    $aplbcpPriceSymbol = esc_attr($aplbcpSettingRow[0]->aplbcp_price_symbol);
}

if (isset($attr['product_list'])) {
    $product_id = esc_attr($attr['product_list']);
} elseif (isset($_GET['product_id'])) {
    $product_id = sanitize_text_field($_GET['product_id']);
}

$table = $wpdb->prefix . 'aplbcp_products_list';
$aplbcpProductsListSql = "SELECT * FROM $table WHERE product_id='$product_id'";
$aplbcpProductsListRow = $wpdb->get_results($aplbcpProductsListSql);

$table = $wpdb->prefix . 'aplbcp_products';
$aplbcpProductsSql = "SELECT * FROM $table WHERE product_list_id='$product_id'";
$aplbcpProductsRow = $wpdb->get_results($aplbcpProductsSql);
?>

<style>
    .aplbcp-product-header, .aplbcp-products {
        display: flex;
        flex-direction: row;
        padding: 20px;
        align-items: center;
        box-shadow: rgba(149, 157, 165, 0.2) 0px 2px 5px;
        margin: 10px;
    }

    .aplbcp-product-header {
        align-self: center;
        margin: 5px;
        background: <?php echo esc_attr($aplbcpSettingRow[0]->aplbcp_header_bg); ?> !important;
        color: <?php echo esc_attr($aplbcpSettingRow[0]->aplbcp_header_color); ?> !important;
        font-weight: bold;
        font-size: <?php echo esc_attr($aplbcpSettingRow[0]->aplbcp_header_font_size); ?>px !important;
    }

    .aplbcp-product-header-items {
        width: 33%;
        text-align: center;
    }

    .aplbcp-products-items {
        width: 33%;
        align-self: center;
        text-align: center;
        margin: 5px;
    }

    .aplbcp-products-images {
        width: auto;
        height: <?php echo esc_attr($aplbcpSettingRow[0]->aplbcp_product_img_hieght); ?>px !important;
        margin: 0 auto;
    }

    .aplbcp-products-title {
        color: <?php echo esc_attr($aplbcpSettingRow[0]->aplbcp_product_title_color); ?> !important;
        font-size: <?php echo esc_attr($aplbcpSettingRow[0]->aplbcp_product_title_font_size); ?>px !important;
        font-weight: bold;
        margin: 10px !important;
    }

    .aplbcp-products-price {
        font-size: <?php echo esc_attr($aplbcpSettingRow[0]->aplbcp_product_title_font_size); ?>px !important;
        font-weight: bold;
    }

    .aplbcp-products-desc {
        margin: 10px;
        padding: 10px;
        font-size: <?php echo esc_attr($aplbcpSettingRow[0]->aplbcp_product_desc_font_size); ?>px !important;
    }

    .aplbcp-product-buynow-btn {
        background: <?php echo esc_attr($aplbcpSettingRow[0]->aplbcp_button_bg); ?> !important;
        color: <?php echo esc_attr($aplbcpSettingRow[0]->aplbcp_button_color); ?> !important;
        padding: 10px;
        text-decoration: none;
        border-radius: <?php echo esc_attr($aplbcpSettingRow[0]->aplbcp_button_radius); ?>px !important;
        border: solid <?php echo esc_attr($aplbcpSettingRow[0]->aplbcp_button_border_width . "px " . $aplbcpSettingRow[0]->aplbcp_button_border_color); ?> !important;
        display: block;
        margin: 0 auto;
        width: 70%;
    }

    .aplbcp-product-buynow-btn:hover {
        background: <?php echo esc_attr($aplbcpSettingRow[0]->aplbcp_button_hover_bg); ?> !important;
        color: <?php echo esc_attr($aplbcpSettingRow[0]->aplbcp_button_hover_color); ?> !important;
        border: solid <?php echo esc_attr($aplbcpSettingRow[0]->aplbcp_button_hover_border_width . "px " . $aplbcpSettingRow[0]->aplbcp_button_hover_border_color); ?> !important;
        box-shadow: <?php echo esc_attr($aplbcpSettingRow[0]->aplbcp_button_hover_shadow); ?> !important;
        scale: 1.1;
        transition: 0.2s;
    }

    .aplbcp-products-desc ul {
        padding-inline-start: 20px;
        margin: 0px;
        text-align: left;
    }

    .aplbcp-product-header-for-mobile {
        display: none;
    }

    @media only screen and (max-width: 600px) {
        .aplbcp-products {
            flex-direction: column;
        }

        .aplbcp-products-items {
            width: 100%;
        }

        .aplbcp-products-desc {
            margin: 0;
        }

        .aplbcp-product-buynow-btn {
            width: auto;
        }

        .aplbcp-products-desc ul {
            padding-inline-start: 10px;
        }

        .aplbcp-product-header-for-mobile {
            display: block;
        }

        .aplbcp-product-header-for-non-mobile {
            display: none;
        }

        .aplbcp-product-header-items {
            width: 100%;
            text-align: center;
        }
    }
</style>
    <div class="aplbcp-container">
        <div class="aplbcp-product-header aplbcp-product-header-for-non-mobile">
            <div class="aplbcp-product-header-items">
                Product Name
            </div>
            <div class="aplbcp-product-header-items">
                Product Features
            </div>
            <div class="aplbcp-product-header-items">
                Buy Now
            </div>
        </div>

        <div class="aplbcp-product-header aplbcp-product-header-for-mobile">
            <div class="aplbcp-product-header-items">
                <?php echo esc_attr($aplbcpProductsListRow[0]->product_list_name); ?>
            </div>
        </div>

        <?php
        foreach ($aplbcpProductsRow as $aplbcpProducts) {
        ?>

            <div class="aplbcp-products">
                <div class="aplbcp-products-items">
                    <img class="aplbcp-products-images" src="<?php echo esc_attr(get_site_url() . "" . $aplbcpProducts->product_image); ?>">
                    <h1 class="aplbcp-products-title">
                        <?php echo esc_attr($aplbcpProducts->product_name); ?>
                    </h1>
                </div>
                <div class="aplbcp-products-items">
                    <div class="aplbcp-products-desc">
                        <?php echo wp_kses_post(str_replace('\r\n', '', $aplbcpProducts->product_desc)); ?>
                    </div>
                </div>
                <div class="aplbcp-products-items">
                    <?php
                    if ($aplbcpPriceShow == "Y") {
                    ?>
                        <h3 class="aplbcp-products-price">
                            <?php $aplbcpProductsPrice = preg_replace("/(\d+?)(?=(\d\d)+(\d)(?!\d))(\.\d+)?/i", "$1,", $aplbcpProducts->product_price); ?>
                            <?php echo esc_attr($aplbcpPriceSymbol); ?>
                            <?php echo esc_attr($aplbcpProductsPrice); ?>
                        </h3>
                    <?php
                    }
                    ?>
                    <a href="<?php echo esc_url($aplbcpProducts->buy_now_link); ?>" target="_blank" class="aplbcp-product-buynow-btn"><?php echo esc_attr($aplbcpSettingRow[0]->aplbcp_button_text); ?></a>
                </div>
            </div>

        <?php
        }
        ?>
    </div>