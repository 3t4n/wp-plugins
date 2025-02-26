<?php

   function aistore_get_wallet_rechargeable_product()
    {
        if (!wc_get_product(get_option('_aistore_rech_product'))) {
            Aistore_Install::create_product();
        }
		
		return wc_get_product(get_option('_aistore_rech_product'));
    }
	
	
 
	 

//


class Aistore_Install
{
    
    
    /**
     * Plugin install
     * @return void
     */
    public static function install()
    {
		

        self::create_tables();
       self::cteate_product_if_not_exist();
    }
    
    /**
     * plugins table creation
     * @global object $wpdb
     */
    private static function create_tables()
    {
        global $wpdb;
        $wpdb->show_errors();
        require_once(ABSPATH . 'wp-admin/includes/upgrade.php');
   $charset_collate = $wpdb->get_charset_collate();
	
		
        $tables = "CREATE TABLE {$wpdb->base_prefix}recharge ( 
		`id` int(10) NOT NULL AUTO_INCREMENT, 
		`user_id` int(10) NOT NULL, 
		`recharge_number` varchar(10) NOT NULL,
		`recharge_operator` varchar(25) NOT NULL,
		`recharge_amount` int(5) NOT NULL, 
		`start_balance` int(10) NOT NULL,
		`end_balance` int(10) NOT NULL,
		`description` varchar(200) NOT NULL,
		`url_hit` varchar(250) NOT NULL,
		`url_response` varchar(1000) NOT NULL,
		`message` varchar(250) NOT NULL, 
		`api_resp_id` varchar(250) NOT NULL,
		`operator_transaction_id` varchar(250) NOT NULL,
		`status_url` varchar(500) NOT NULL,
		`status_response` varchar(500) NOT NULL,
		`ip_address` varchar(20) NOT NULL, 
		`status` varchar(10) NOT NULL DEFAULT 'Success', 
		`Error` varchar(10) NOT NULL, 
		PRIMARY KEY (`id`) 
        )$charset_collate;";
		 

		
        dbDelta($tables);
    }
   
    /**
     * Create rechargeable product if not exist
     */
    public static function cteate_product_if_not_exist()
    {
        if (!wc_get_product(get_option('_aistore_rech_product'))) {
            self::create_product();
        }
    }
    
	
   private static function create_product()
	{
		
$objProduct = new WC_Product();

$objProduct->set_name('Recharge/Bill Pay Product'); //Set product name.
$objProduct->set_status('publish'); //Set product status.

                         
$objProduct->set_catalog_visibility('hidden'); //Set catalog visibility.                   | string $visibility Options: 'hidden', 'visible', 'search' and 'catalog'.
$objProduct->set_description('This used by Recharge/Bill Pay plugin '); //Set product description.
$objProduct->set_short_description('This used by Recharge/Bill Pay plugin  '); //Set product short description.
 
$objProduct->set_price(1.00); //Set the product's active price.
$objProduct->set_regular_price(1.00); //Set the product's regular price.
$objProduct->set_sale_price(1.00); //Set the product's sale price.


$objProduct->set_manage_stock(false); //Set if product manage stock.                         | bool
$objProduct->set_stock_quantity(100); //Set number of items available for sale.
$objProduct->set_stock_status('instock'); //Set stock status.                               | string $status 'instock', 'outofstock' and 'onbackorder'
 
 

$new_product_id = $objProduct->save(); //Saving the data to create new product, it will return product ID.
   update_option('_aistore_rech_product', $new_product_id);

	}
    
    
    
    
}

new Aistore_Install();



?>