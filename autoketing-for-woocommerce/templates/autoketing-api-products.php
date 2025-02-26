<?php
use AutoketingProduct\Autoketing_Product;
if( isset( $agr_query ) && !empty( $agr_query ) ){
    if( isset( $agr_query['action'] ) ){
        $action = $agr_query['action'];
        $page = isset( $agr_query['page'] ) ? $agr_query['page'] : 1;
        $post_per_page = isset( $agr_query['item'] ) ? $agr_query['item'] : -1;
        $id = isset( $agr_query['id'] ) ? $agr_query['id'] : 0;
        switch ( $action ) {
            case 'get-all':
                autoketing_get_all_product( $page,$post_per_page );        
                break;
            case  'get-detail':
               autoketing_get_detail_product( $id );
                break;
            default:
                 autoketing_get_count_product();       
        }
        
    }
    
}

function autoketing_get_all_product( $page, $item ) {
    $all_post = new WP_Query( array(
        'post_type' => 'product',
        'posts_per_page' => $item,
        'post_status' => 'publish',
        'paged' => $page
    ) );
    $all_product = array();
    while ( $all_post->have_posts() ) : $all_post->the_post();
        $product_id = get_the_ID();
        $product = wc_get_product( $product_id );
        $thumbnail = get_the_post_thumbnail_url();
        $url = get_permalink();
        $quantily = $product->stock_quantity != null ? $product->stock_quantity : 1;
        $autoketing_pro = new Autoketing_Product( $product->name,$product->price,$product->regular_price,$product->sale_price,
            $quantily, $thumbnail, $url );
        array_push($all_product,$autoketing_pro );
    endwhile;
    echo wp_json_encode( $all_product );
}

function autoketing_get_detail_product( $id ) {
    $product = wc_get_product( $id );
    $thumbnail = get_the_post_thumbnail_url( $id );
    $url = get_permalink( $id );
    $quantily = $product->stock_quantity != null ? $product->stock_quantity : 1;
    $autoketing_pro_detail = new Autoketing_Product( $product->name,$product->price,$product->regular_price,$product->sale_price,
            $quantily, $thumbnail, $url );
     echo wp_json_encode( $autoketing_pro_detail );
}
function autoketing_get_count_product(){
    $all_product = get_posts(array(
        'post_type' => 'product',
        'numberposts' => -1,
        'post_status' => 'publish',
    ));
    $count_product = count($all_product);
    $array_count = ['count_product' => $count_product];
    echo wp_json_encode($array_count);
}
die();

