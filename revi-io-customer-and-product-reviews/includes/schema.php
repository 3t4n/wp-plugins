<?php

if (!defined('ABSPATH')) {
    exit;
}

// Structured Meta Data
function revi_schema_product()
{
    if (get_option('REVI_SUBSCRIPTION') < 2 || !is_product()) {
        return;
    }

    global $product;
    $product_data = is_a($product, 'WC_Product') ? $product : wc_get_product(get_the_id());

    if (!is_a($product_data, 'WC_Product')) {
        return;
    }

    $reviProductsModel = new reviProductsModel();
    $productInfo = $reviProductsModel->getReviProduct($product_data->get_id());
    $brand_name = esc_html(revi_get_product_attribute_or_meta($product_data, PRODUCT_BRAND));
    $gtin = esc_html(revi_get_product_attribute_or_meta($product_data, PRODUCT_EAN, 'EAN'));
    $comments = [];
    // $comments = $reviReviewsModel->getProductComments($product_data->get_id(), REVI_DEFAULT_LANGUAGE);

    $productData = [
        "@context" => "http://schema.org",
        "@type" => "Product",
        "name" => esc_html($product_data->get_name()),
        "sku" => esc_html($product_data->get_sku()),
        "offers" => revi_get_offers_data($product_data),
        "url" => esc_url(get_permalink($product_data->get_id())),
    ];

    if (!empty($brand_name)) {
        $productData["brand"] = ["@type" => "Brand", "name" => $brand_name];
    }

    if (!empty($gtin)) {
        $productData["gtin13"] = $gtin;
    }

    if ($product_description = wp_strip_all_tags($product_data->get_short_description())) {
        $productData["description"] = esc_html($product_description);
    }

    if ($thumbnail_url = get_the_post_thumbnail_url($product_data->get_id(), 'full')) {
        $productData["image"] = esc_url($thumbnail_url);
    }

    if (isset($productInfo->num_reviews) && $productInfo->num_reviews > 0) {
        $productData["aggregateRating"] = revi_get_aggregate_rating($productInfo);

        if (!empty($comments)) {
            $productData["review"] = array_map('revi_map_comments_to_schema', $comments);
        }
    }

    echo '<!-- ReviProductSchema --><script type="application/ld+json">' . wp_kses_post(json_encode($productData, JSON_PRETTY_PRINT | JSON_UNESCAPED_SLASHES)) . '</script>';
}

function revi_get_product_attribute_or_meta($product_data, $attributes, $prefix = '')
{
    foreach ($attributes as $attr) {
        $value = $product_data->get_attribute($attr) ?: get_post_meta($product_data->get_id(), $attr, true);
        if (!empty($value)) {
            return $value;
        }

        if ($prefix) {
            for ($i = 0; $i < 200; $i++) {
                $value = $product_data->get_attribute($prefix . $i);
                if (!empty($value)) {
                    return $value;
                }
            }
        }
    }
    return '';
}

function revi_get_offers_data($product_data)
{
    $offers = [];
    if ($product_data->is_type('variable')) {
        $variations = $product_data->get_available_variations();
        foreach ($variations as $variation) {
            $variation_product = new WC_Product_Variation($variation['variation_id']);
            $offers[] = [
                "@type" => "Offer",
                "availability" => "http://schema.org/" . ($variation_product->is_in_stock() ? 'InStock' : 'OutOfStock'),
                "price" => wc_get_price_including_tax($variation_product),
                "priceValidUntil" => date('Y-m-d', strtotime('+1 year')),
                "priceCurrency" => get_woocommerce_currency(),
                "sku" => esc_html($variation_product->get_sku()),
                "url" => esc_url(get_permalink($variation_product->get_id())),
                "seller" => [
                    "@type" => "Organization",
                    "name" => get_option('blogname'),
                    "url" => get_site_url()
                ]
            ];
        }
    } else {
        $offers[] = [
            "@type" => "Offer",
            "availability" => "http://schema.org/" . ($product_data->is_in_stock() ? 'InStock' : 'OutOfStock'),
            "price" => wc_get_price_including_tax($product_data),
            "priceValidUntil" => date('Y-m-d', strtotime('+1 year')),
            "priceCurrency" => get_woocommerce_currency(),
            "sku" => esc_html($product_data->get_sku()),
            "url" => esc_url(get_permalink($product_data->get_id())),
            "seller" => [
                "@type" => "Organization",
                "name" => get_option('blogname'),
                "url" => get_site_url()
            ]
        ];
    }
    return $offers;
}

function revi_map_comments_to_schema($comment)
{
    return [
        "@type" => "Review",
        "reviewRating" => [
            "@type" => "Rating",
            "ratingValue" => esc_html($comment->rating),
            "bestRating" => "5"
        ],
        "author" => [
            "@type" => "Person",
            "name" => esc_html(!empty($comment->customer_firstname) ? $comment->customer_firstname : 'Anonymous'),
        ],
        "datePublished" => esc_html($comment->date),
        "description" => esc_html($comment->comment),
    ];
}

function revi_get_aggregate_rating($productInfo)
{
    return [
        "@type" => "AggregateRating",
        "bestRating" => "5",
        "ratingValue" => esc_html($productInfo->avg_rating),
        "reviewCount" => esc_html($productInfo->num_reviews),
    ];
}
