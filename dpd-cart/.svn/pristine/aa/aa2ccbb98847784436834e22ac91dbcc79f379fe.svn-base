<?php

class DPDCart_Product_page extends DPDCart_ShortCode_Abstract
{
    public function __construct()
    {
        parent::__construct();
        add_shortcode('dpdcart-product-page', array($this, 'render'));
    }

    public function render()
    {
        $dpd = new DPD_Cart_API();
        if (isset($_GET['dpd_id'])) {
            $product = $dpd->product($_GET['dpd_id']);
            if ($product) {
                return $this->product_render($product);
            } else {
                return "Invalid Product ID";
            }
        } else {
            return "No Product Selected";
        }
    }

    private function product_render($product)
    {
        return sprintf("<div class='dpd-single-product'> <div class='dpd-image-data'> %s 
                                <div class='product-right'><h3 class='dpd-product-title'>%s  <small>SKU: %s</small></h3>
                                %s %s %s</div></div><div class='full-description'>%s</div></div>",
            $this->image_render($product),
            $product['name'], $product['sku'],
            $this->render_description($product['description'], $this->options['product_short_description']),
            $this->button_render($product['id'], $product['prices'][0]['id'],true),
            $this->price_render($product,true),
            $product['long_description']
        );
    }


}

new DPDCart_Product_page();