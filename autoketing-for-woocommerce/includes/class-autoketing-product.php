<?php
namespace AutoketingProduct;
if( ! class_exists( 'Autoketing_Product' ) ){ 
    class Autoketing_Product{
        public $name;
        public $regular_price;
        public $price;
        public $sale_price;
        public $quantily;
        public $thumbnail;
        public $url;
        public function __construct( $name,$price,$regular_price,$sale_price,$quantily,$thumbnail,$url ) {
            $this->name = $name;
            $this->price = $price;
            $this->regular_price = $regular_price;
            $this->sale_price = $sale_price;
            $this->quantily = $quantily;
            $this->thumbnail = $thumbnail;
            $this->url = $url;
        }
    }
}