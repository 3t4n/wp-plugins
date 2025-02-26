<?php
// // Include WordPress core files to access WordPress functions
// require_once('../../../../wp-load.php');
// // Your database query to get stock data
// // $query = "
// //     SELECT $wpdb->posts.ID as product_id, $wpdb->posts.post_title as product_title, $wpdb->postmeta.meta_value as stock_quantity
// //     FROM $wpdb->posts
// //     JOIN $wpdb->postmeta ON $wpdb->posts.ID = $wpdb->postmeta.post_id
// //     WHERE $wpdb->posts.post_type = 'product'
// //     AND $wpdb->postmeta.meta_key = '_stock'
// //     AND $wpdb->posts.post_status = 'publish';
// // ";

// // // Perform the query
// // $results = $wpdb->get_results($query, ARRAY_A);
// // Get out of stock products.
// // Fetch all published products
// $products = wc_get_products(array(
//     'status' => 'publish',
//     'stock_status' => 'instock',
// ));
// $shop_page_url = wc_get_page_permalink('shop');


// // Convert products to an array for JSON encoding
// $results = array();
// foreach ($products as $product) {
//     $results[] = array(
//         'id'    => $product->get_id(),
//         'name'  => $product->get_name(),
//         'slug'  => $product->get_slug(),
//         'price' => $product->get_price(),
//         'shop_url'=>$shop_page_url,
//         // Add more product data as needed
//     );
// }



// Output the results as JSON
echo json_encode($results);