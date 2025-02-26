<!-- Paybox plugins install configuration -->
<?php
$plugins = array(
	'woocommerce' => array(
		'file_path' => 'paybox-woocommerce-gateway/paybox-woocommerce-gateway.php',
		'required' => true,
		'name' => 'WooCommerce Paybox Payment gateway',
		'slug' => 'paybox-woocommerce',
		'depend' => 'WooCommerce',
		'author' => 'Paybox Verifone',
		'wordpress_org_name' => 'paybox-woocommerce-gateway',
		),
	// 'wp-e-commerce' => array(
	// 	'file_path' => 'paybox-by-verifone-for-wp-e-commerce/paybox-by-verifone-for-wp-e-commerce.php',
	// 	'required' => true,
	// 	'name' => 'WP eCommerce Paybox Payment gateway',
	// 	'slug' => 'paybox-wp-e-commerce',
	// 	'depend' => 'Wp E-Commerce',
	// 	'author' => 'Paybox Verifone',
	// 	'wordpress_org_name' => 'paybox-by-verifone-for-wp-e-commerce',
	// 	),
	);
