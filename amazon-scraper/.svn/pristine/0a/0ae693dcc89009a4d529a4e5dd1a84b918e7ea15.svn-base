<?php
	/* 
		Plugin Name: Amazon Scraper
		Description: Pull the title, description, and image from any Amazon product page using only the product's ASIN number. Also used to automatically embed your amazon affiliate link.
		Author: Matt Wolfe
		Version: 1.1
		Author URI: http://www.mattwolfe.net
	*/

	global $wpdb;
	
	add_action('admin_menu', 'amazon_admin_actions');	// Adding admin menu
	
	// Function to include admin page
	function amazon_admin() {  
		include('amazon-admin.php');  
	}
	
	// Function to create admin page to menu
	function amazon_admin_actions() {  
		add_menu_page('Amazon Scraper', 'Amazon Scraper', 1, 'amazon_admin_page', 'amazon_admin');
		
	}


	// Adding the shortcode functionality
	add_shortcode('azr-link', 'amazon_data_handler');
	
	function amazon_data_handler($asin) {
		if(in_array  ('soap', get_loaded_extensions())) {
   		
		extract(shortcode_atts(array('asin' => ''), $asin));

		include 'settings.php';

		require_once 'lib/AmazonECS.class.php';

		try {

			$amazonEcs = new AmazonECS(AWS_API_KEY, AWS_API_SECRET_KEY, AWS_COUNTRY, AWS_ASSOCIATE_TAG);	// Instantiation
			$amazonEcs->associateTag(AWS_ASSOCIATE_TAG);	// Double setting Amazon associate tag
			
			$response = $amazonEcs->responseGroup('Large')->lookup($asin);	// Looking up data based on asin/isbn
    
			$product_array = object_to_array($response);	// Parsing object into multi-dimensional array

			// Assigning attributes to variables
			$product_title = $product_array['Items']['Item']['ItemAttributes']['Title'];
			$product_image = $product_array['Items']['Item']['MediumImage']['URL'];
			$product_link = 'http://www.amazon.'.AWS_COUNTRY.'/dp/' . $asin . '/?tag=' . AWS_ASSOCIATE_TAG;
			$product_author_array = $product_array['Items']['Item']['ItemAttributes']['Author'];
			
			// Testing depth of array for product description
			if (is_array($product_array['Items']['Item']['EditorialReviews']['EditorialReview'][0])) {
				$product_description = $product_array['Items']['Item']['EditorialReviews']['EditorialReview'][0]['Content'];
			} else if (is_array($product_array['Items']['Item']['EditorialReviews']['EditorialReview'][0][0])) {
				$product_description = $product_array['Items']['Item']['EditorialReviews']['EditorialReview'][0][0]['Content'];
			} else {
				$product_description = $product_array['Items']['Item']['EditorialReviews']['EditorialReview']['Content'];
			}
	
	
			// If multiple authors in array, concatenate into a string for display
			if (is_array($product_author_array)) {
				foreach ($product_author_array as $product_author_single) {
					$product_author = $product_author_single . ', ' . $product_author;
				}
			} else {
				$product_author = $product_author_array;
			}
			
			// Echoing out post
			echo '<p><a href="' . $product_link . '"><img src="' . $product_image . '" alt="' . $product_title . '" style="float: left; margin: 0px 7px 7px 0px;" /></a><a href="' . $product_link . '">' . $product_title . '</a><br /><strong>' . $product_author . '</strong><br />' . $product_description . '</p><div style="clear: both;"></div>';
		
		} catch(Exception $e) {
			echo $e->getMessage();	// Catching exception and echoing error message
		}
		
		return; // Returning nothing
		
		}else{
   			echo "<p>SOAP is not installed on your server. Contact your server administrator.</p>";
   			return false;
   		}
	}

	
	// Function for parsing objects into multi-dimensional arrays
	function object_to_array($d) {
		if (is_object($d)) {
			$d = get_object_vars($d);
		}
		if (is_array($d)) {
			return array_map(__FUNCTION__, $d);
		}
		else {
			return $d;
		}
	}
	
	
	// Function for creating database table for use in Amazon settings
	function create_amazon_table() {
		
		global $wpdb;
	
		$table_name = $wpdb->prefix . 'amazon_settings';
		
		$sql = "CREATE TABLE IF NOT EXISTS `$table_name` (`amazon_id` bigint(20) unsigned NOT NULL, `api_key` varchar(255) COLLATE utf8_unicode_ci NOT NULL, `secret_key` varchar(255) COLLATE utf8_unicode_ci NOT NULL, `associate_id` varchar(255) COLLATE utf8_unicode_ci NOT NULL, `country` varchar(255) COLLATE utf8_unicode_ci NOT NULL, PRIMARY KEY  (amazon_id), UNIQUE KEY amazon_id (amazon_id)) ENGINE=MyISAM DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;";
		
		require_once(ABSPATH . 'wp-admin/includes/upgrade.php');
		dbDelta($sql);
	
	}
	
	
	register_activation_hook(__FILE__,'create_amazon_table');	// Creating database table on plugin load

?>