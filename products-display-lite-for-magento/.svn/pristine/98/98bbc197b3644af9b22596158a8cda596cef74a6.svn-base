<?php
// Exit if accessed directly
if (!defined('ABSPATH')) {
    exit; 
}

// Shortcode to display Magento product
function pdlm_display_magento_product($atts) {
    $atts = shortcode_atts([
        'sku' => '',
        'domain' => '',
        'lang' => '',
        'currency' => '€',
        'cta' => 'Buy Now!',
        'description_length' => 200,
        'hide_price' => false,
    ], $atts, 'magento_product');

    $sku = sanitize_text_field($atts['sku']);
    $domain = !empty($atts['domain']) ? sanitize_text_field($atts['domain']) : esc_attr(get_option('pdlm_domain'));
    $lang = sanitize_text_field($atts['lang']);
    $currency = sanitize_text_field($atts['currency']);
    $cta = sanitize_text_field($atts['cta']);
    $description_length = intval($atts['description_length']);

    if (!empty($product_url)) {
        $url_suffix = get_option('pdlm_url_suffix', '.html');
        $product_url = $domain . '/' . ltrim($product_url, '/') . $url_suffix;
    } else {
        $product_url = $domain . '/catalog/product/view/sku/' . urlencode($sku);
    }

    if (empty($sku)) {
        return esc_html__('SKU not provided.', 'products-display-lite-for-magento');
    }

    if (empty($domain)) {
        return esc_html__('Domain not configured.', 'products-display-lite-for-magento');
    }

    // Ensure domain starts with https://
    if (strpos($domain, 'http') !== 0) {
        $domain = 'https://' . $domain;
    }

    $access_token = get_option('pdlm_access_token');
    if (empty($access_token)) {
        return esc_html__('Access token not configured.', 'products-display-lite-for-magento');
    }

    $lang_path = $lang ? "$lang/" : '';
    $api_url = "$domain/rest/{$lang_path}V1/products/$sku";

    // Retrieve data via a GET request with authentication
    $response = wp_remote_get($api_url, [
        'headers' => [
            'Authorization' => 'Bearer ' . $access_token,
        ],
    ]);

    if (is_wp_error($response)) {
        return esc_html__('Error in request: ', 'products-display-lite-for-magento') . esc_html($response->get_error_message());
    }

    $body = wp_remote_retrieve_body($response);

    // Decode the JSON to extract data
    $data = json_decode($body);

    if (json_last_error() !== JSON_ERROR_NONE) {
        return esc_html__('Unable to load product data.', 'products-display-lite-for-magento');
    }

    // Extract desired data
    if (empty($data->name)) {
        return esc_html__('Product not found or token expired.', 'products-display-lite-for-magento');
    }

    $product_name = sanitize_text_field($data->name);
    $description = '';
    $product_url = '';
    $price = isset($data->price) ? number_format(floatval($data->price), 2) . ' ' . $currency : '';
    $hide_price = filter_var($atts['hide_price'], FILTER_VALIDATE_BOOLEAN);

    foreach ($data->custom_attributes as $attribute) {
        if ($attribute->attribute_code === 'description') {
            $description = sanitize_text_field($attribute->value);
        }
        if ($attribute->attribute_code === 'url_key') {
            $product_url = sanitize_text_field($attribute->value);
        }       
    }

    $description_short = mb_substr($description, 0, $description_length) . (strlen($description) > $description_length ? '...' : '');
    $image_url = '';

    if (!empty($data->media_gallery_entries)) {
        $image_url = esc_url($data->media_gallery_entries[0]->file);
    }
    
    if (!empty($product_url)) {
        $product_url = esc_url("$domain/" . $product_url . ".html");
    } else {
        $product_url = esc_url("$domain/catalog/product/view/sku/$sku");
    }
    
    // Display data in the front-end
    ob_start();
    ?>
    <div class="magento-product">
        <?php if ($image_url) : ?>
            <p class="magento-img-cont">
                <img src="<?php echo esc_url($domain); ?>/media/catalog/product<?php echo esc_url($image_url); ?>" 
                     alt="<?php echo esc_attr($product_name); ?>" 
                     class="magento-product-img" />
            </p>
        <?php endif; ?>
        <h3 class="magento-product-title"><?php echo esc_html($product_name); ?></h3>
        <?php if ($price && !$hide_price) : ?>
            <p class="magento-product-price price"><?php echo esc_html($price); ?></p>
        <?php endif; ?>
        <p class="magento-product-description"><?php echo esc_html($description_short); ?></p>
        <div class="magento-button-cont">
            <a href="<?php echo esc_url($product_url); ?>" 
               class="button magento-product-button" 
               target="_blank"><?php echo esc_html($cta); ?></a>
        </div>
    </div>
    <?php
    return ob_get_clean();
}

// Register shortcode
add_shortcode('magento_product', 'pdlm_display_magento_product');
?>