<?php
/**
 * WooCommerce display functions for site wide.
 * 
 */

function essdrs_easy_schema_woocommerce_output() {	

    if ( is_product() ) {  
    global $product;

    $titlegrab = get_the_title();
    $productname = $product->get_title();
    $producturl = $product->get_permalink(get_the_ID());
    $productimageurl =  wp_get_attachment_url( $product->get_image_id() ); 
    $productdesc = $product->get_description(); // Grabs the product description
    $productdesc= wp_strip_all_tags($productdesc, $remove_breaks = true); // strip out all html tags from product description and white space -> fix for schema compatibility for descriptions containing html and apostrophes
    $productsku = $product->get_sku();
    $productprice = $product->get_price();
    $productratingValue = $product->get_average_rating(); 
    $productratingCount = $product->get_rating_count(); 
    $Productcurrency = esc_attr( get_option( 'jsonschema_currency' ) );
    //return stock status and create a schema stock status
    $get_stock = $product->get_stock_status();
        if ( $get_stock == 'instock'){      
            $stock_status = 'https://schema.org/InStock';  
         }
         
        if ( $get_stock == 'outofstock'){      
            $stock_status = 'https://schema.org/OutOfStock';  
         }  

    echo '
<!-- WooCommerce Schema output by Easy Schema https://wordpress.org/plugins/easy-schema-structured-data-rich-snippets/ -->
<script type="application/ld+json">
{
  "@context": "https://schema.org/", 
  "@type": "Product", 
  "name": "'. $productname .'",
  "image": "'. $productimageurl .'",
  "description": "'. $productdesc .'",
  "sku": "'. $productsku .'",
  "offers": {
    "@type": "Offer",
    "priceCurrency": "'. $Productcurrency .'",
    "price": "'. $productprice .'",
    "url": "'. $producturl .'",
    "availability": "'. $stock_status .'",
    "itemCondition": "https://schema.org/NewCondition"
  },
  "aggregateRating": {
    "@type": "AggregateRating",
    "ratingValue": "'. $productratingValue .'",
    "bestRating": "5",
    "worstRating": "1",
    "ratingCount": "'. $productratingCount .'"
  }
}
</script>';
    }
}
add_shortcode( 'JSONSchema-product-schema', 'essdrs_easy_schema_woocommerce_output' ); //Shortcode for users that want to only output product Schema on certain areas.

// Has the user made the schema output active for the product page? This is controlled by a radio option
$jsonschema_activated = esc_attr( get_option( 'jsonschema_product_active' ) );  
if ( $jsonschema_activated == 1 ) {
    
    // if user has checked the yes box, output the Schema to the footer, this is conditional to it being a product page in WooCommerce
    add_action( 'wp_footer', 'essdrs_easy_schema_woocommerce_output' );
    
}

//Has the user decided to remove the Schema added by WooCommerce? This is controlled by a radio option
function essdrs_easy_schema_remove_woo_schema() {
    
  remove_action( 'wp_footer', array( WC()->structured_data, 'output_structured_data' ), 10 ); // Frontend pages
  
}

$jsonschema_remove_woocommerce_schema = esc_attr( get_option( 'jsonschema_remove_woo_schema' ) );  
if ( $jsonschema_remove_woocommerce_schema == 1 ) {
    
    // if user has checked the yes box, this will remove WooCommerce Schema
    add_action( 'init', 'essdrs_easy_schema_remove_woo_schema' );

}