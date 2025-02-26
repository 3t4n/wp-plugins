<?php
// FIND PAGE IDS
$FSSCPages['Products'] = $wpdb->get_var("SELECT ID FROM ".$wpdb->prefix."posts WHERE post_content LIKE '%[fssc-products]%' AND post_status = 'publish' LIMIT 1"); $FSSCPages['ProductsURL'] = $wpdb->get_var("SELECT post_name FROM ".$wpdb->prefix."posts WHERE post_content LIKE '%[fssc-products]%' AND post_status = 'publish' LIMIT 1"); 
$FSSCPages['ViewCart'] = $wpdb->get_var("SELECT ID FROM ".$wpdb->prefix."posts WHERE post_content LIKE '%[fssc-view-cart]%' AND post_status = 'publish' LIMIT 1"); $FSSCPages['ViewCartURL'] = $wpdb->get_var("SELECT post_name FROM ".$wpdb->prefix."posts WHERE post_content LIKE '%[fssc-view-cart]%' AND post_status = 'publish' LIMIT 1"); 
$FSSCPages['Checkout'] = $wpdb->get_var("SELECT ID FROM ".$wpdb->prefix."posts WHERE post_content LIKE '%[fssc-checkout]%' AND post_status = 'publish' LIMIT 1"); $FSSCPages['CheckoutURL'] = $wpdb->get_var("SELECT post_name FROM ".$wpdb->prefix."posts WHERE post_content LIKE '%[fssc-checkout]%' AND post_status = 'publish' LIMIT 1"); 
$FSSCPages['Brand'] = $wpdb->get_var("SELECT ID FROM ".$wpdb->prefix."posts WHERE post_content LIKE '%[fssc-brand]%' AND post_status = 'publish' LIMIT 1"); $FSSCPages['BrandURL'] = $wpdb->get_var("SELECT post_name FROM ".$wpdb->prefix."posts WHERE post_content LIKE '%[fssc-brand]%' AND post_status = 'publish' LIMIT 1"); 
$FSSCPages['Finder'] = $wpdb->get_var("SELECT ID FROM ".$wpdb->prefix."posts WHERE post_content LIKE '%[fssc-product-finder]%' AND post_status = 'publish' LIMIT 1"); $FSSCPages['FinderURL'] = $wpdb->get_var("SELECT post_name FROM ".$wpdb->prefix."posts WHERE post_content LIKE '%[fssc-product-finder]%' AND post_status = 'publish' LIMIT 1"); 
$FSSCPages['MyAccount'] = $wpdb->get_var("SELECT ID FROM ".$wpdb->prefix."posts WHERE post_content LIKE '%[fssc-my-account]%' AND post_status = 'publish' LIMIT 1"); $FSSCPages['MyAccountURL'] = $wpdb->get_var("SELECT post_name FROM ".$wpdb->prefix."posts WHERE post_content LIKE '%[fssc-my-account]%' AND post_status = 'publish' LIMIT 1"); 

// GET CONFIG VALUES
$sql = mysql_query("SELECT * FROM ".$wpdb->prefix."fssc_config");
while($dbfscartconfig = mysql_fetch_array($sql)) {
	$fscartconfig[$dbfscartconfig['config_name']] = $dbfscartconfig['config_value'];
}

// GET STYLES VALUES
if (function_exists(fssc_prostyling_config)) { $fscartstyle = fssc_prostyling_config(); }

// REDIRECT IF NEEDED
if ('http://'.$_SERVER["SERVER_NAME"].$_SERVER['REQUEST_URI'] == get_option('home').'/'.$FSSCPages['ProductsURL'].'/' && $fscartconfig['CartHomeRedirect'] != '') {
	$FSSCRedirect = get_option('home').'/'.$FSSCPages['ProductsURL'].'/'.$wpdb->get_var("SELECT categories_url FROM ".$wpdb->prefix."fssc_categories WHERE categories_id = ".$fscartconfig['CartHomeRedirect']).'/';
	header("LOCATION: ".$FSSCRedirect);
}

// GENERATE USER CODE
if (!isset($_SESSION['users_code'])) {
	$_SESSION['users_code'] = fssc_random_user_id();
}

// SETUP COUNTRY
if (!isset($_SESSION['fssccountry'])) {
	$_SESSION['fssccountry'] = $fscartconfig['DefaultCountry'];
}

// SETUP CURRENCY 
if (!isset($_SESSION['currencycode']) || $_SESSION['currencycode'] == '') {
	$_SESSION['currencycode'] = $wpdb->get_var("SELECT currency_name FROM ".$wpdb->prefix."fssc_currencies WHERE currency_id = ".$fscartconfig['Currency']);
}
if (isset($_GET)) { if (function_exists('fssc_currency_change')) {fssc_currency_change(); } }


// SHOW WELCOME
if ($fscartconfig['ShowWelcome'] == 'yes' && !isset($_GET['showwelcome'])) {
	function fssc_show_welcome() {
		echo '<div class="updated fade">
					<p><strong>Thank you for installing the FireStorm E-Commerce Plugin</strong></p>
					<p>The plugin has automatically created pages for Products, View Cart and Checkout. If these pages are missing <a hre="http://localhost/FSSC/wp-admin/admin.php?page=fssc-config&pagescheck=true">click here</a></p>
					<p>To setup the plugin, follow these steps:<br />
					1) <a href="admin.php?page=fssc-config">Enable the features you need and turn off the ones you don\'t</a>.<br />
					2) <a href="http://www.firestormplugins.com/extensions/e-commerce/" target="_blank">Download the free styling extension (limited time offer)</a>.<br />
					2) <a href="admin.php?page=fssc-config&f=style">Style the plugin to match your theme</a>.<br />
					3) <a href="admin.php?page=fssc-config&f=gateways">Enable your payment options</a>.<br />
					4) <a href="admin.php?page=fssc-categories">Add your categories</a>.<br />
					5) <a href="admin.php?page=fssc-products">Add your products</a>.<br />
					6) Start selling!
					</p>
					<p style="text-align: right;"><a href="'.get_option('home').'/wp-admin/admin.php?page=fssc-config&showwelcome=no">hide this message</a></p>
					</div>';
	}
	add_action('admin_notices', 'fssc_show_welcome');
	return;
}
// PERMALINKS WARNING
$FSREPPermalinkStructure = $wpdb->get_var("SELECT option_value FROM ".$wpdb->prefix."options WHERE option_name = 'permalink_structure'");
if ($FSREPPermalinkStructure == '' && !isset($_POST['submit'])) {
	function fssc_permalink_warning() {
		echo '<div class="updated fade"><p><strong>Ecommerce Plugin Error: </strong> Permalinks cannot be set to default for the FireStorm Ecommerce Plugin to function.</p></div>';
	}
	add_action('admin_notices', 'fssc_permalink_warning');
	return;
}
?>
