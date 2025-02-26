<?php

function fssc_install() {
	global $wpdb,$fssc_version;


	require_once(ABSPATH . 'wp-admin/includes/upgrade.php');
	
	// ADD PAGES
	$Pages = array(
		'Products' => '[fssc-products]',
		'View Cart' => '[fssc-view-cart]',
		'Checkout' => '[fssc-checkout]',
		'My Account' => '[fssc-my-account]'
	);
	fssc_add_pages($Pages);
	
	$table_name = $wpdb->prefix."fssc_products";
	if($wpdb->get_var("show tables like '".$table_name."'") != $table_name) {
		
		// ADD DB STRUCTURE
		include('fssc_install_sql.php');
		
		// ADD FSREP VERSION
		add_option("fssc_db_version", $fssc_version);
	} else {
		$installed_ver = get_option( "fssc_db_version" );
		if( $installed_ver != $fssc_version ) {
			// UPDATE DB STRUCTURE
			include('fssc_install_sql.php');
			
			// UPDATE FSREP VERSION
			update_option( "fssc_db_version", $fssc_version );
		}
	}
	
	// CREATE DIRECTORIES
	if (!file_exists(ABSPATH."wp-content/uploads")) { mkdir(ABSPATH."wp-content/uploads", 0777); }
	if (!file_exists(ABSPATH."wp-content/uploads/fscart")) { mkdir(ABSPATH."wp-content/uploads/fscart", 0777); }
	if (!file_exists(ABSPATH."wp-content/uploads/fscart/downloads")) { mkdir(ABSPATH."wp-content/uploads/fscart/downloads", 0777); }
	if (!file_exists(ABSPATH."wp-content/uploads/fscart/products")) { mkdir(ABSPATH."wp-content/uploads/fscart/products", 0777); }
	if (!file_exists(ABSPATH."wp-content/uploads/fscart/products/small")) { mkdir(ABSPATH."wp-content/uploads/fscart/products/small", 0777); }
	if (!file_exists(ABSPATH."wp-content/uploads/fscart/products/enlarged")) { mkdir(ABSPATH."wp-content/uploads/fscart/products/enlarged", 0777); }
	if (!file_exists(ABSPATH."wp-content/uploads/fscart/products/temp")) { mkdir(ABSPATH."wp-content/uploads/fscart/products/temp", 0777); }
	if (!file_exists(ABSPATH."wp-content/uploads/fscart/products/additional")) { mkdir(ABSPATH."wp-content/uploads/fscart/products/additional", 0777); }
	if (!file_exists(ABSPATH."wp-content/uploads/fscart/products/additional/small")) { mkdir(ABSPATH."wp-content/uploads/fscart/products/additional/small", 0777); }
	if (!file_exists(ABSPATH."wp-content/uploads/fscart/products/additional/enlarged")) { mkdir(ABSPATH."wp-content/uploads/fscart/products/additional/enlarged", 0777); }
	if (!file_exists(ABSPATH."wp-content/uploads/fscart/products/additional/temp")) { mkdir(ABSPATH."wp-content/uploads/fscart/products/additional/temp", 0777); }
	if (!file_exists(ABSPATH."wp-content/uploads/fscart/categories/")) { mkdir(ABSPATH."wp-content/uploads/fscart/categories/", 0777); }
	if (!file_exists(ABSPATH."wp-content/uploads/fscart/categories/temp/")) { mkdir(ABSPATH."wp-content/uploads/fscart/categories/temp/", 0777); }
	if (!file_exists(ABSPATH."wp-content/uploads/fscart/categories/thumbs/")) { mkdir(ABSPATH."wp-content/uploads/fscart/categories/thumbs/", 0777); }
	if (!file_exists(ABSPATH."wp-content/uploads/fscart/categories/enlarged/")) { mkdir(ABSPATH."wp-content/uploads/fscart/categories/enlarged/", 0777); }
	if (!file_exists(ABSPATH."wp-content/uploads/fscart/brands/")) { mkdir(ABSPATH."wp-content/uploads/fscart/brands/", 0777); }
	if (!file_exists(ABSPATH."wp-content/uploads/fscart/brands/temp/")) { mkdir(ABSPATH."wp-content/uploads/fscart/brands/temp/", 0777); }
	if (!file_exists(ABSPATH."wp-content/uploads/fscart/brands/thumbs/")) { mkdir(ABSPATH."wp-content/uploads/fscart/brands/thumbs/", 0777); }
	if (!file_exists(ABSPATH."wp-content/uploads/fscart/brands/enlarged/")) { mkdir(ABSPATH."wp-content/uploads/fscart/brands/enlarged/", 0777); }
	
}
?>