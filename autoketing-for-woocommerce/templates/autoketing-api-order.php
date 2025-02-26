<?php
use AutoketingOrder\Autoketing_Order;
use AutoketingProduct\Autoketing_Product;
use AutoketingUser\Autoketing_User;
if( isset( $agr_query ) && !empty( $agr_query ) ){
    if( isset( $agr_query['action'] ) ){
        $action = $agr_query['action'];
        $page = isset( $agr_query['page'] ) ? $agr_query['page'] : 1;
        $post_per_page = isset( $agr_query['item'] ) ? $agr_query['item'] : -1;
        $id = isset( $agr_query['id'] ) ? $agr_query['id'] : 0;
        switch ( $action ) {
            case 'get-all':
                autoketing_get_all_order( $page,$post_per_page );        
                break;
            case  'get-detail':
               autoketing_get_detail_order( $id );
                break;
            default:
                 autoketing_get_count_order();       
        }
        
    }    
}
function autoketing_get_all_order( $page,$item ){
     $all_post = new WP_Query( array(
        'post_type' => 'shop_order',
        'posts_per_page' => $item,
        'post_status' => array('wc-pending','wc-processing','wc-completed','wc-on-hold'),
        'paged' => $page
    ) );
    $all_order = array();
    while ( $all_post->have_posts() ) : $all_post->the_post();
        $order_id =   get_the_ID();       
        $order = wc_get_order( $order_id );
        $status = $order->get_status();
        $date_created = $order->get_date_created();
        $items = array();
        foreach ( $order->get_items() as $item_id => $item ) {
            $product = $item->get_product();
            $product_id = $product->get_id();
            $thumbnail = get_the_post_thumbnail_url( $product_id );
            $url = get_permalink( $product_id );
            $quantily = $product->stock_quantity != null ? $product->stock_quantity : 1;
            $autoketing_product = new Autoketing_Product( $product->name,$product->price,$product->regular_price,$product->sale_price,
            $quantily, $thumbnail, $url );
            array_push( $items,$autoketing_product );
        }
        $username = $order->get_billing_first_name().' '.$order->get_billing_last_name();
        $usermail = $order->get_billing_email();
        $address = [$order->get_billing_address_1(),$order->get_billing_address_2()];
        $phone_number  = $order->get_billing_phone();
        $payment = !empty( $order->get_payment_method() ) ? $order->get_payment_method() : 'Offline Payment';
        $autoketing_user = new Autoketing_User( $username,$usermail,$address,$phone_number,$payment );
        $autoketing_order = new Autoketing_Order( $status,$date_created,$items,$autoketing_user );
        array_push( $all_order,$autoketing_order );
    endwhile;
    echo wp_json_encode( $all_order );
}
function autoketing_get_detail_order( $order_id ) {
    $order = wc_get_order( $orderid );
    $order = wc_get_order( $order_id );
    $status = $order->get_status();
    $date_created = $order->get_date_created();
    $items = array();
    foreach ( $order->get_items() as $item_id => $item ) {
        $product = $item->get_product();
        $product_id = $product->get_id();
        $thumbnail = get_the_post_thumbnail_url( $product_id );
        $url = get_permalink( $product_id );
        $quantily = $product->stock_quantity != null ? $product->stock_quantity : 1;
        $autoketing_product = new Autoketing_Product( $product->name, $product->price, $product->regular_price, $product->sale_price,
                $quantily, $thumbnail, $url );
        array_push( $items, $autoketing_product );
    }
    $username = $order->get_billing_first_name() . ' ' . $order->get_billing_last_name();
    $usermail = $order->get_billing_email();
    $address = [$order->get_billing_address_1(), $order->get_billing_address_2()];
    $phone_number = $order->get_billing_phone();
    $payment = !empty($order->get_payment_method()) ? $order->get_payment_method() : 'Offline Payment';
    $autoketing_user = new Autoketing_User($username, $usermail, $address, $phone_number, $payment);
    $autoketing_order = new Autoketing_Order($status, $date_created, $items, $autoketing_user);
    echo json_encode($autoketing_order);
}
function autoketing_get_count_order(){
    $all_order = get_posts( array(
        'post_type' => 'shop_order',
        'numberposts' => -1,
        'post_status' => array( 'wc-pending','wc-processing','wc-completed','wc-on-hold' ),
    ) );
    $count_order = count( $all_order );
    $array_count = ['count_order' => $count_order];
    echo wp_json_encode( $array_count );   
}
die();