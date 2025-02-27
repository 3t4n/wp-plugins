<?php 
if ( ! defined( 'ABSPATH' ) ) exit; // Exit if accessed directly 

function digages_get_enabled_bank_accounts() {
    $option_name = 'digages_direct_bank_accounts';
    $serialized_data = get_option($option_name);

    if ($serialized_data) {
        $bank_accounts = maybe_unserialize($serialized_data);

        // Filter the bank accounts where 'enabled' is 1 or true
        $enabled_accounts = array_filter($bank_accounts, function($account) {
            return isset($account['enabled']) && ($account['enabled'] == 1 || $account['enabled'] === true);
        });

        // For debugging
        //error_log('Enabled bank accounts: ' . print_r($enabled_accounts, true));

        return array_values($enabled_accounts); // Re-index the array
    }

    return array();
}
?>