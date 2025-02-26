<?php 

class Autocomplete_Woocommerce_Order_Status_Completed{

    public function __construct() {
        add_action( 'woocommerce_thankyou', [$this, 'awordc_woocommerce_auto_complete_order'] );
    }
    public function awordc_woocommerce_auto_complete_order( $order_id ) {
        if ( ! $order_id ) {
            return;
        }
    
        $order = wc_get_order( $order_id );
        $order->update_status( 'completed' );
    }

}

new Autocomplete_Woocommerce_Order_Status_Completed();

?>