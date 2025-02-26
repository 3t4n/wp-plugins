<?php

class HelloPrintProductType extends WC_Product
{
    public string $product_type;
    public bool $is_in_stock;
    public float $price;
    public float $regular_price;
    
    public function __construct($product)
    {
        $this->product_type = 'helloprint_product';
        parent::__construct($product);
        $this->is_in_stock = true;
        $this->price = 100;
        $this->regular_price = 120;
    }
}
