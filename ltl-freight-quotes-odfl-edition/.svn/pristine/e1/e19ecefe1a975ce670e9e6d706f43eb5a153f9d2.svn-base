<?php
/**
 * WooCommerce Version Update Changes
 * @package     Woocommerce ODFL Edition
 * @author      <https://eniture.com/>
 * @copyright   Copyright (c) 2017, Eniture
 */
if ( ! defined( 'ABSPATH' ) ) {
    exit; 
}

/**
 * ODFL WooCommerce Version Update Changes Class
 */
class ODFL_Woo_Update_Changes 
{
    /**
     * wooCommerce version number
     * @var int 
     */
    public $WooVersion;

    /**
     * ODFL WooCommerce Version Update Changes Class Constructor
     */
    function __construct() 
    {
        if (!function_exists('get_plugins'))
            require_once( ABSPATH . 'wp-admin/includes/plugin.php' );

        $plugin_folder     = get_plugins('/' . 'woocommerce');
        $plugin_file       = 'woocommerce.php';
        $this->WooVersion  = $plugin_folder[$plugin_file]['Version'];
    }

    /**
     * ODFL WooCommerce Version For Postcode
     * @return int/boolian
     */
    function odfl_postcode()
    { 
        $sPostCode = "";
        switch ($this->WooVersion) 
        {  
            case ($this->WooVersion <= '2.7'):
                $sPostCode = WC()->customer->get_postcode();
                break;
            case ($this->WooVersion >= '3.0'):
                $sPostCode = WC()->customer->get_billing_postcode();
                break;

            default:
                break;
        }
        return $sPostCode;
    }

    /**
     * ODFL WooCommerce Version For State
     * @return int/boolian
     */
    function odfl_getState()
    { 
        $sState = "";
        switch ($this->WooVersion) 
        {  
            case ($this->WooVersion <= '2.7'):
                $sState = WC()->customer->get_state();
                break;
            case ($this->WooVersion >= '3.0'):
                $sState = WC()->customer->get_billing_state();
                break;

            default:
                break;
        }
        return $sState;
    }

    /**
     * ODFL WooCommerce Version For City
     * @return int/boolian
     */
    function odfl_getCity()
    { 
        $sCity = "";
        switch ($this->WooVersion) 
        {  
            case ($this->WooVersion <= '2.7'):
                $sCity = WC()->customer->get_city();
                break;
            case ($this->WooVersion >= '3.0'):
                $sCity = WC()->customer->get_billing_city();
                break;

            default:
                break;
        }
        return $sCity;
    }

    /**
     * ODFL WooCommerce Version For Country
     * @return int/boolian
     */
    function odfl_getCountry()
    { 
        $sCountry = "";
        switch ($this->WooVersion) 
        {  
            case ($this->WooVersion <= '2.7'):
                $sCountry = WC()->customer->get_country();
                break;
            case ($this->WooVersion >= '3.0'):
                $sCountry = WC()->customer->get_billing_country();
                break;

            default:
                break;
        }
        return $sCountry;
    }
}