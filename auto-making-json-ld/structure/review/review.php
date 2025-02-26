<?php

if (!defined('ABSPATH')) exit;

if (!function_exists('amJL_review')){
    function amJL_review(){
        global $post;
        $post_data = $post;
        $author_data = get_userdata( $post_data->post_author );

        $review_check = (int)get_option('review_check');

        //=====[ Basic ]=====//
        $name = get_post_meta($post->ID, 'itemName', true);

        $amJL_review = array(
            "@context"  => "https://schema.org",
            "@type"     => "Product",
            "name"      => $name,
        );

        $image = array();
        //=====[ Description ]=====//
        for((int)$i=1; $i<=5; $i++){
            $value = get_post_meta($post->ID, "reviewImage_{$i}", true);
            if($value)$image[] = $value;
        }

        $description = get_post_meta($post->ID, 'reviewDescription', true);
        $sku = get_post_meta($post->ID, 'reviewSku', true);
        $mpn = get_post_meta($post->ID, 'reviewMpn', true);
        $BrandName = get_post_meta($post->ID, 'BrandName', true);

        if($image && count($image) > 0){
            for((int)$i=0; $i<count($image); $i++){
                $amJL_review['image'][] = $image[$i];
            }
        }

        if($description)    $amJL_review['description'] = $description;

        //number of stocks
        if($sku)    $amJL_review['sku'] = $sku;

        //serial number
        if($mpn)    $amJL_review['mpn'] = $mpn;

        if($BrandName){
            $amJL_review['brand'] = array(
                "@type" => "Brand",
                "name"  => $BrandName,
            );
        }

        //=====[ Review ]=====//
        $rating_value = (get_post_meta($post->ID, 'ratingValue', true)) ? get_post_meta($post->ID, 'ratingValue', true) : 3;
        $PositiveNumber = get_post_meta($post->ID, 'PositiveNumber', true);
        $NegativeNumber = get_post_meta($post->ID, 'NegativeNumber', true);

        $amJL_review['review'] = array(
            "@type"     => "Review",
            "name"      => $name,
            "author"    => array(
                "@type" => "Person",
                "name"  => $author_data->display_name,
            ),
            "reviewRating"  => array(
                "@type"         => "Rating",
                "ratingValue"   => (double)$rating_value,
                "bestRating"    => 5,
            ),
        );

        if($PositiveNumber > 0){
            $amJL_review['review']['positiveNotes'] = array(
                "@type" => "ItemList",
            );
            $count = 1;
            for((int)$i=1; $i<=5; $i++){
                $PositiveNote = get_post_meta($post->ID, "PositiveNote_{$i}", true);
                if($PositiveNote){
                    $amJL_review['review']['positiveNotes']["itemListElement"][] = array(
                        "@type"     => "ListItem",
                        "position"  => $count,
                        "name"      => $PositiveNote,
                    );
                    $count++;
                }
            }
        }

        if($NegativeNumber > 0){
            $amJL_review['review']['negativeNotes'] = array(
                "@type" => "ItemList",
            );
            $count = 1;
            for((int)$i=1; $i<=5; $i++){
                $NegativeNote = get_post_meta($post->ID, "NegativeNote_{$i}", true);
                if($NegativeNote){
                    $amJL_review['review']['negativeNotes']["itemListElement"][] = array(
                        "@type"     => "ListItem",
                        "position"  => $count,
                        "name"      => $NegativeNote,
                    );
                    $count++;
                }
            }
        }

        //=====[ Offers ]=====//
        $item_url = get_post_meta($post->ID, 'itemURL', true);
        $priceCurrency = get_post_meta($post->ID, 'itemPriceCurrency', true);
        $price = get_post_meta($post->ID, 'itemPrice', true);
        $itemPriceValidUntil = get_post_meta($post->ID, 'itemPriceValidUntil', true);
        $itemCondition = get_post_meta($post->ID, 'itemCondition', true);
        $itemAvailability = get_post_meta($post->ID, 'itemAvailability', true);

        $amJL_review['offers'] = array(
            "@type"     => "Offer",
        );

        if($item_url){
            $amJL_review['offers'] += array(
                "url"       => $item_url,
            );
        }

        if($price && $priceCurrency){
            $amJL_review['offers'] += array(
                "priceCurrency" => $priceCurrency,
                "price"     => (double)$price,
            );
        }

        if($itemPriceValidUntil){
            $amJL_review['offers'] += array(
                "priceValidUntil"   => $itemPriceValidUntil,
            );
        }

        if($itemCondition){
            $itemCondition = "https://schema.org/{$itemCondition}";
            $amJL_review['offers'] += array(
                "itemCondition" => $itemCondition,
            );
        }

        if($itemAvailability){
            $itemAvailability = "https://schema.org/{$itemAvailability}";
            $amJL_review['offers'] += array(
                'availability' => $itemAvailability,
            );
        }
        
        //=====[ Structure data ]=====//
        if($name && $review_check === 1){
            echo "<!-- 商品レビュー -->\n";
            echo '<script type="application/ld+json">'."\n";
            echo wp_json_encode($amJL_review)."\n";
            echo '</script>'."\n\n";
        }

    }
}

add_action('wp_head', 'amJL_review', 1);