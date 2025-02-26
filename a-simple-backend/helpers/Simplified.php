<?php
namespace asimplebackend\helpers;

class Simplified extends \asimplebackend\helpers\Plugin {
    public function __construct($args = array()) {
        $this->name = plugin_basename(__FILE__);
        $this->actions = array(
            'plugins_loaded'        =>  false,
            'default_product_type'  =>  false
        );
        $this->filters = array(
            'product_type_selector'     =>  array(
                'product_type_selector' =>  array(
                    'priority'  =>  99999999999
                )
            )
        );

        $this->register_plugin($this->name, __FILE__);
    }

    public function default_product_type() {
        return 'simplified_product';
    }

    public function product_type_selector($types) {
        $product['simplified_product'] = __ ('Simplified');

        return $product + $types;
    }

    public function plugins_loaded() {
        require_once(dirname(__FILE__) . '/Simplified_Product.php');
    }
}