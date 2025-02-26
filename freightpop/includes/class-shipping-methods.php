<?php

class FreightPop_Shipping_Methods {

    public function process_shipping_methods($rate_response) {
        $rates = $rate_response['Data']['Rates'];
        $available_methods = [];

        foreach ($rates as $data) {
            $available_methods['freightpop_shipping_' . $data['Id']] = new WC_Shipping_Rate(
                'freightpop_shipping_' . $data['Id'],
                $data['Carrier'] . " (" . $data['Service'] . ")",
                $data['ListCost'],
                [],
                'freightpop_shipping'
            );
        }

        return $available_methods;
    }
}
?>