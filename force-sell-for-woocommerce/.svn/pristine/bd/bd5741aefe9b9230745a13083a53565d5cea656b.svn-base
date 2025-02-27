<?php
class BeRocket_force_sell_Tripwire extends BeRocket_plugin_variations {
    public $plugin_name = 'force_sell';
    public $version_number = 10;
    public $types;
    function __construct() {
        parent::__construct();
        add_filter('berocket_force_sell_custom_post_conditions_list', array( $this, 'condition_types'));
    }
    public function condition_types($conditions) {
        $conditions[] = 'condition_product_category';
        $conditions[] = 'condition_product_attribute';
        $conditions[] = 'condition_product_age';
        $conditions[] = 'condition_product_saleprice';
        $conditions[] = 'condition_product_stockquantity';
        return $conditions;
    }
}
new BeRocket_force_sell_Tripwire();
