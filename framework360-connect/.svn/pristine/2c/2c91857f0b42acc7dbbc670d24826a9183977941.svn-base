<?php
namespace Fw360Connect;

class cart {
    private $woocommerce_cart = [];

    function __construct($woocommerce_cart) {
        if(is_string($woocommerce_cart)) $woocommerce_cart = unserialize($woocommerce_cart);
        $this->woocommerce_cart = $woocommerce_cart;
    }

    public function getCart() {
        $fw360Cart = [];

        if($this->woocommerce_cart['cart']) {
            foreach($this->woocommerce_cart['cart'] as $product) {

                $productData = wc_get_product( $product['product_id'] );

                $fw360Cart[] = [
                    'type' => 'custom',
                    'id' => 'wc-' . $product['product_id'],
                    'quantity' => $product['quantity'],
                    'disable_edit' => true,
                    'customInfo' => array(
                        'name' => $productData->get_name(),
                        'details' => $productData->get_short_description(),
                        'preview' => get_the_post_thumbnail_url($product['product_id']),
                        'price' => $product['line_total'],
                        'imposta' => 'default'
                    )
                ];
            }
        }

        return $fw360Cart;
    }
}