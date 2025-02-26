<?php

$FSSCTableName = $wpdb->prefix."fssc_config";
$wpdb->query("CREATE TABLE IF NOT EXISTS " . $FSSCTableName . " (config_id INT( 11 ) NOT NULL AUTO_INCREMENT PRIMARY KEY);");

fssc_sql_alter (DB_NAME, $FSSCTableName, 'config_name', 'VARCHAR( 255 ) NOT NULL');
fssc_sql_alter (DB_NAME, $FSSCTableName, 'config_value', 'TEXT NOT NULL');

fssc_sql_insert($FSSCTableName, 'config_name', 'StoreRequiresLogin', 'config_name, config_value', "'StoreRequiresLogin', '0'");
fssc_sql_insert($FSSCTableName, 'config_name', 'PurchaseRequiresLogin', 'config_name, config_value', "'PurchaseRequiresLogin', '0'");
fssc_sql_insert($FSSCTableName, 'config_name', 'SubCategoryDisplay', 'config_name, config_value', "'SubCategoryDisplay', '1'");
fssc_sql_insert($FSSCTableName, 'config_name', 'AllowProductPages', 'config_name, config_value', "'AllowProductPages', '1'");
fssc_sql_insert($FSSCTableName, 'config_name', 'CatalogHomeDisplayThumbnails', 'config_name, config_value', "'CatalogHomeDisplayThumbnails', '1'");
fssc_sql_insert($FSSCTableName, 'config_name', 'CatalogHomeList', 'config_name, config_value', "'CatalogHomeList', 'Vertical'");
fssc_sql_insert($FSSCTableName, 'config_name', 'POAddress', 'config_name, config_value', "'POAddress', 'Company Name
123 Fake Street
Nowhere, State
12345 Country'");
fssc_sql_insert($FSSCTableName, 'config_name', 'TrackingNotification', 'config_name, config_value', "'TrackingNotification', 'Hello [customer-first-name],

Thank you for your order at [blog-name].

Your order has shipped and can be tracked here: [tracking-number]

Please feel free to contact our sales team regarding any questions.

Thanks!

[blog-name] Sales Team'");
fssc_sql_insert($FSSCTableName, 'config_name', 'DisplayCategoryPageProductDescription', 'config_name, config_value', "'DisplayCategoryPageProductDescription', '1'");
fssc_sql_insert($FSSCTableName, 'config_name', 'DisplayCategoryPageProductNumber', 'config_name, config_value', "'DisplayCategoryPageProductNumber', '1'");
fssc_sql_insert($FSSCTableName, 'config_name', 'DisplayCategoryPageProductStock', 'config_name, config_value', "'DisplayCategoryPageProductStock', '1'");
fssc_sql_insert($FSSCTableName, 'config_name', 'DisplayCategoryPageProductPicture', 'config_name, config_value', "'DisplayCategoryPageProductPicture', '1'");
fssc_sql_insert($FSSCTableName, 'config_name', 'DisplayCategoryPageProductPrice', 'config_name, config_value', "'DisplayCategoryPageProductPrice', '1'");
fssc_sql_insert($FSSCTableName, 'config_name', 'DisplayCategoryPageProductBuyButton', 'config_name, config_value', "'DisplayCategoryPageProductBuyButton', '1'");
fssc_sql_insert($FSSCTableName, 'config_name', 'PercentageIncreasePricing', 'config_name, config_value', "'PercentageIncreasePricing', '0'");
fssc_sql_insert($FSSCTableName, 'config_name', 'ProductBuyButtonText', 'config_name, config_value', "'ProductBuyButtonText', 'Buy Now'");
fssc_sql_insert($FSSCTableName, 'config_name', 'CategoryBreadCrumbDisplay', 'config_name, config_value', "'CategoryBreadCrumbDisplay', '1'");
fssc_sql_insert($FSSCTableName, 'config_name', 'ProductBreadCrumbDisplay', 'config_name, config_value', "'ProductBreadCrumbDisplay', '1'");
fssc_sql_insert($FSSCTableName, 'config_name', 'PaymentEnablePayPal', 'config_name, config_value', "'PaymentEnablePayPal', '1'");
fssc_sql_insert($FSSCTableName, 'config_name', 'PaymentEnablePayPalPro', 'config_name, config_value', "'PaymentEnablePayPalPro', '0'");
fssc_sql_insert($FSSCTableName, 'config_name', 'PaymentEnableGoogleCheckout', 'config_name, config_value', "'PaymentEnableGoogleCheckout', '0'");
fssc_sql_insert($FSSCTableName, 'config_name', 'PaymentEnableEmailOrder', 'config_name, config_value', "'PaymentEnableEmailOrder', '0'");
fssc_sql_insert($FSSCTableName, 'config_name', 'PaymentEnableFaxOrder', 'config_name, config_value', "'PaymentEnableFaxOrder', '0'");
fssc_sql_insert($FSSCTableName, 'config_name', 'PaymentEnableCreditCard', 'config_name, config_value', "'PaymentEnableCreditCard', '0'");
fssc_sql_insert($FSSCTableName, 'config_name', 'CheckoutButtonText', 'config_name, config_value', "'CheckoutButtonText', 'Complete Order'");
fssc_sql_insert($FSSCTableName, 'config_name', 'OrderRecipient', 'config_name, config_value', "'OrderRecipient', '".get_bloginfo('admin_email')."'");
fssc_sql_insert($FSSCTableName, 'config_name', 'OrderSenderName', 'config_name, config_value', "'OrderSenderName', '".get_bloginfo('name')."'");
fssc_sql_insert($FSSCTableName, 'config_name', 'OrderSenderEmail', 'config_name, config_value', "'OrderSenderEmail', '".get_bloginfo('admin_email')."'");
fssc_sql_insert($FSSCTableName, 'config_name', 'OrderThankYouMessage', 'config_name, config_value', "'OrderThankYouMessage', 'Thank you for your order. A customer service representative will contact you shortly.'");
fssc_sql_insert($FSSCTableName, 'config_name', 'TaxName1', 'config_name, config_value', "'TaxName1', 'not set'");
fssc_sql_insert($FSSCTableName, 'config_name', 'TaxName2', 'config_name, config_value', "'TaxName2', 'not set'");
fssc_sql_insert($FSSCTableName, 'config_name', 'TaxName3', 'config_name, config_value', "'TaxName3', 'not set'");
fssc_sql_insert($FSSCTableName, 'config_name', 'ShippingType', 'config_name, config_value', "'ShippingType', 'Fixed'");
fssc_sql_insert($FSSCTableName, 'config_name', 'PayPalEmailAddress', 'config_name, config_value', "'PayPalEmailAddress', ''");
fssc_sql_insert($FSSCTableName, 'config_name', 'Currency', 'config_name, config_value', "'Currency', '1'");
fssc_sql_insert($FSSCTableName, 'config_name', 'PriceTSeparator', 'config_name, config_value', "'PriceTSeparator', ','");
fssc_sql_insert($FSSCTableName, 'config_name', 'PriceCSeparator', 'config_name, config_value', "'PriceCSeparator', '.'");
fssc_sql_insert($FSSCTableName, 'config_name', 'EnableSSL', 'config_name, config_value', "'EnableSSL', '0'");
fssc_sql_insert($FSSCTableName, 'config_name', 'EnableAnalyticsEcommerce', 'config_name, config_value', "'EnableAnalyticsEcommerce', '0'");
fssc_sql_insert($FSSCTableName, 'config_name', 'CheckoutErrorNotification', 'config_name, config_value', "'CheckoutErrorNotification', '0'");
fssc_sql_insert($FSSCTableName, 'config_name', 'EnableMultiCurrency', 'config_name, config_value', "'EnableMultiCurrency', '0'");
fssc_sql_insert($FSSCTableName, 'config_name', 'EnableIPtoCountry', 'config_name, config_value', "'EnableIPtoCountry', '0'");
fssc_sql_insert($FSSCTableName, 'config_name', 'DefaultCountry', 'config_name, config_value', "'DefaultCountry', '1'");
fssc_sql_insert($FSSCTableName, 'config_name', 'ShippingFixedRate', 'config_name, config_value', "'ShippingFixedRate', '0'");
fssc_sql_insert($FSSCTableName, 'config_name', 'MinimumProductPrice', 'config_name, config_value', "'MinimumProductPrice', '0'");
fssc_sql_insert($FSSCTableName, 'config_name', 'MaxThumbnailSize', 'config_name, config_value', "'MaxThumbnailSize', '100'");
fssc_sql_insert($FSSCTableName, 'config_name', 'MaxStandardPictureSize', 'config_name, config_value', "'MaxStandardPictureSize', '160'");
fssc_sql_insert($FSSCTableName, 'config_name', 'ShowPHeaderPagination', 'config_name, config_value', "'ShowPHeaderPagination', '1'");
fssc_sql_insert($FSSCTableName, 'config_name', 'ShowFHeaderPagination', 'config_name, config_value', "'ShowFHeaderPagination', '1'");
fssc_sql_insert($FSSCTableName, 'config_name', 'DefaultProductsPerPage', 'config_name, config_value', "'DefaultProductsPerPage', '10'");
fssc_sql_insert($FSSCTableName, 'config_name', 'ProductList', 'config_name, config_value', "'ProductList', 'vertical'");
fssc_sql_insert($FSSCTableName, 'config_name', 'ProductDetails', 'config_name, config_value', "'ProductDetails', 'Simple'");
fssc_sql_insert($FSSCTableName, 'config_name', 'FireStormAPI', 'config_name, config_value', "'FireStormAPI', ''");
fssc_sql_insert($FSSCTableName, 'config_name', 'PaymentEnableAuthorizeNet', 'config_name, config_value', "'PaymentEnableAuthorizeNet', '0'");
fssc_sql_insert($FSSCTableName, 'config_name', 'FeaturedProductTemplate', 'config_name, config_value', "'FeaturedProductTemplate', 'horizontal'");
fssc_sql_insert($FSSCTableName, 'config_name', 'DisplayCategoryPageProductBrand', 'config_name, config_value', "'DisplayCategoryPageProductBrand', '1'");
fssc_sql_insert($FSSCTableName, 'config_name', 'GoogleAnalyticsID', 'config_name, config_value', "'GoogleAnalyticsID', ''");
fssc_sql_insert($FSSCTableName, 'config_name', 'OrderEmailMessage', 'config_name, config_value', "'OrderEmailMessage', 'Thank you for your order. A customer service representative will contact you shortly.'");
fssc_sql_insert($FSSCTableName, 'config_name', 'ProductIdentification', 'config_name, config_value', "'ProductIdentification', 'Part Number'");
fssc_sql_insert($FSSCTableName, 'config_name', 'ShipperZipCode', 'config_name, config_value', "'ShipperZipCode', ''");
fssc_sql_insert($FSSCTableName, 'config_name', 'ShippingCountry', 'config_name, config_value', "'ShippingCountry', 'US'");
fssc_sql_insert($FSSCTableName, 'config_name', 'ShippingPercentageRate', 'config_name, config_value', "'ShippingPercentageRate', ''");
fssc_sql_insert($FSSCTableName, 'config_name', 'ShippingIncreaseType', 'config_name, config_value', "'ShippingIncreaseType', ''");
fssc_sql_insert($FSSCTableName, 'config_name', 'ShippingIncreaseValue', 'config_name, config_value', "'ShippingIncreaseValue', ''");
fssc_sql_insert($FSSCTableName, 'config_name', 'DefaultShippingLength', 'config_name, config_value', "'DefaultShippingLength', '10'");
fssc_sql_insert($FSSCTableName, 'config_name', 'DefaultShippingWidth', 'config_name, config_value', "'DefaultShippingWidth', '10'");
fssc_sql_insert($FSSCTableName, 'config_name', 'DefaultShippingHeight', 'config_name, config_value', "'DefaultShippingHeight', '3'");
fssc_sql_insert($FSSCTableName, 'config_name', 'OrderSubTotalDecreaseType', 'config_name, config_value', "'OrderSubTotalDecreaseType', ''");
fssc_sql_insert($FSSCTableName, 'config_name', 'OrderSubTotalDecreaseValue', 'config_name, config_value', "'OrderSubTotalDecreaseValue', '0'");
fssc_sql_insert($FSSCTableName, 'config_name', 'OrderSubTotalDecreaseMinOrder', 'config_name, config_value', "'OrderSubTotalDecreaseMinOrder', '0'");
fssc_sql_insert($FSSCTableName, 'config_name', 'RequireTaxId', 'config_name, config_value', "'RequireTaxId', 'Hide'");
fssc_sql_insert($FSSCTableName, 'config_name', 'RequireResaleCertificate', 'config_name, config_value', "'RequireResaleCertificate', 'Hide'");
fssc_sql_insert($FSSCTableName, 'config_name', 'PONumber', 'config_name, config_value', "'PONumber', '1000'");
fssc_sql_insert($FSSCTableName, 'config_name', 'EnablePO', 'config_name, config_value', "'EnablePO', 'No'");
fssc_sql_insert($FSSCTableName, 'config_name', 'POSubject', 'config_name, config_value', "'POSubject', 'Purchase Order'");
fssc_sql_insert($FSSCTableName, 'config_name', 'POSpecialInstructions', 'config_name, config_value', "'POSpecialInstructions', ''");
fssc_sql_insert($FSSCTableName, 'config_name', 'OrderNumber', 'config_name, config_value', "'OrderNumber', '1000'");
fssc_sql_insert($FSSCTableName, 'config_name', 'IShipperZipCode', 'config_name, config_value', "'IShipperZipCode', ''");
fssc_sql_insert($FSSCTableName, 'config_name', 'ShippingGeneric', 'config_name, config_value', "'ShippingGeneric', 'No'");
fssc_sql_insert($FSSCTableName, 'config_name', 'DefaultCatOrder', 'config_name, config_value', "'DefaultCatOrder', 'order'");
fssc_sql_insert($FSSCTableName, 'config_name', 'ListingsTemplate', 'config_name, config_value', "'ListingsTemplate', 'vertical'");
fssc_sql_insert($FSSCTableName, 'config_name', 'DetailsTemplate', 'config_name, config_value', "'DetailsTemplate', 'default'");
fssc_sql_insert($FSSCTableName, 'config_name', 'Theme', 'config_name, config_value', "'Theme', 'default'");
fssc_sql_insert($FSSCTableName, 'config_name', 'ShowWelcome', 'config_name, config_value', "'ShowWelcome', 'yes'");
fssc_sql_insert($FSSCTableName, 'config_name', 'TopSellersTemplate', 'config_name, config_value', "'TopSellersTemplate', 'horizontal'");
fssc_sql_insert($FSSCTableName, 'config_name', 'MostPopularTemplate', 'config_name, config_value', "'MostPopularTemplate', 'horizontal'");
fssc_sql_insert($FSSCTableName, 'config_name', 'NewProductsTemplate', 'config_name, config_value', "'NewProductsTemplate', 'horizontal'");
fssc_sql_insert($FSSCTableName, 'config_name', 'ViewCartCheckoutText', 'config_name, config_value', "'ViewCartCheckoutText', 'Proceed to Checkout'");
fssc_sql_insert($FSSCTableName, 'config_name', 'ViewCartContinueShoppingText', 'config_name, config_value', "'ViewCartContinueShoppingText', 'Continue Shopping'");
fssc_sql_insert($FSSCTableName, 'config_name', 'ViewCartContinueShoppingLink', 'config_name, config_value', "'ViewCartContinueShoppingLink', '0'");
fssc_sql_insert($FSSCTableName, 'config_name', 'SupportedCreditCards', 'config_name, config_value', "'SupportedCreditCards', ''");
fssc_sql_insert($FSSCTableName, 'config_name', 'EnableBrands', 'config_name, config_value', "'EnableBrands', 'TRUE'");
fssc_sql_insert($FSSCTableName, 'config_name', 'EnablePayPalExpress', 'config_name, config_value', "'EnablePayPalExpress', 'FALSE'");
fssc_sql_insert($FSSCTableName, 'config_name', 'PaymentGateway', 'config_name, config_value', "'PaymentGateway', ''");
fssc_sql_insert($FSSCTableName, 'config_name', 'ContactManagement', 'config_name, config_value', "'ContactManagement', ''");
fssc_sql_insert($FSSCTableName, 'config_name', 'EnableInventoryManagement', 'config_name, config_value', "'EnableInventoryManagement', '1'");
fssc_sql_insert($FSSCTableName, 'config_name', 'InventoryWarnLimit', 'config_name, config_value', "'InventoryWarnLimit', '3'");
fssc_sql_insert($FSSCTableName, 'config_name', 'InventoryOutofStockWarning', 'config_name, config_value', "'InventoryOutofStockWarning', '0'");
fssc_sql_insert($FSSCTableName, 'config_name', 'InventoryLowStockWarning', 'config_name, config_value', "'InventoryLowStockWarning', '0'");
fssc_sql_insert($FSSCTableName, 'config_name', 'CartHomeRedirect', 'config_name, config_value', "'CartHomeRedirect', ''");
fssc_sql_insert($FSSCTableName, 'config_name', 'CountryLock', 'config_name, config_value', "'CountryLock', '0'");
fssc_sql_insert($FSSCTableName, 'config_name', 'DigitalDownloadDirectory', 'config_name, config_value', "'DigitalDownloadDirectory', 'downloads'");
fssc_sql_insert($FSSCTableName, 'config_name', 'DigitalDownloadConfirmMessage', 'config_name, config_value', "'DigitalDownloadConfirmMessage', 'Please use the following link(s) to download your digital download(s):'");
fssc_sql_insert($FSSCTableName, 'config_name', 'ListingsPerLine', 'config_name, config_value', "'ListingsPerLine', '25'");
fssc_sql_insert($FSSCTableName, 'config_name', 'RemoveDecimals', 'config_name, config_value', "'RemoveDecimals', '0'");	
fssc_sql_insert($FSSCTableName, 'config_name', 'CategoryToolBar', 'config_name, config_value', "'CategoryToolBar', '0'");	
fssc_sql_insert($FSSCTableName, 'config_name', 'ProductToolBar', 'config_name, config_value', "'ProductToolBar', '0'");	
fssc_sql_insert($FSSCTableName, 'config_name', 'PayPalExpressUsername', 'config_name, config_value', "'PayPalExpressUsername', ''");
fssc_sql_insert($FSSCTableName, 'config_name', 'PayPalExpressPassword', 'config_name, config_value', "'PayPalExpressPassword', ''");
fssc_sql_insert($FSSCTableName, 'config_name', 'PayPalExpressSignature', 'config_name, config_value', "'PayPalExpressSignature', ''");
fssc_sql_insert($FSSCTableName, 'config_name', 'PayPalExpressEnvironment', 'config_name, config_value', "'PayPalExpressEnvironment', 'live'");
fssc_sql_insert($FSSCTableName, 'config_name', 'AlwaysShowBuyButton', 'config_name, config_value', "'AlwaysShowBuyButton', '0'");

fssc_sql_insert($FSSCTableName, 'config_name', 'ProFunctionsL', 'config_name, config_value', "'ProFunctionsL', ''");
fssc_sql_insert($FSSCTableName, 'config_name', 'MultiCurrencyL', 'config_name, config_value', "'MultiCurrencyL', ''");
fssc_sql_insert($FSSCTableName, 'config_name', 'UserTypesL', 'config_name, config_value', "'UserTypesL', ''");
fssc_sql_insert($FSSCTableName, 'config_name', 'GFLikesL', 'config_name, config_value', "'GFLikesL', ''");
fssc_sql_insert($FSSCTableName, 'config_name', 'ReviewsL', 'config_name, config_value', "'ReviewsL', ''");
fssc_sql_insert($FSSCTableName, 'config_name', 'AmazonL', 'config_name, config_value', "'AmazonL', ''");
fssc_sql_insert($FSSCTableName, 'config_name', 'DistributorsL', 'config_name, config_value', "'DistributorsL', ''");
fssc_sql_insert($FSSCTableName, 'config_name', 'GoogleShoppingL', 'config_name, config_value', "'GoogleShoppingL', ''");
fssc_sql_insert($FSSCTableName, 'config_name', 'AffiliatesL', 'config_name, config_value', "'AffiliatesL', ''");
fssc_sql_insert($FSSCTableName, 'config_name', 'ProductFinderL', 'config_name, config_value', "'ProductFinderL', ''");
fssc_sql_insert($FSSCTableName, 'config_name', 'MailChimpL', 'config_name, config_value', "'MailChimpL', ''");
fssc_sql_insert($FSSCTableName, 'config_name', 'StatisticsL', 'config_name, config_value', "'StatisticsL', ''");
fssc_sql_insert($FSSCTableName, 'config_name', 'LicensesL', 'config_name, config_value', "'LicensesL', ''");
fssc_sql_insert($FSSCTableName, 'config_name', 'FedExL', 'config_name, config_value', "'FedExL', ''");
fssc_sql_insert($FSSCTableName, 'config_name', 'FPDFL', 'config_name, config_value', "'FPDFL', ''");
fssc_sql_insert($FSSCTableName, 'config_name', 'UPSL', 'config_name, config_value', "'UPSL', ''");


$FSSCTableName = $wpdb->prefix."fssc_categories";
$wpdb->query("CREATE TABLE IF NOT EXISTS " . $FSSCTableName . " (categories_id INT( 11 ) NOT NULL AUTO_INCREMENT PRIMARY KEY);");

fssc_sql_alter (DB_NAME, $FSSCTableName, 'parent_id', 'INT( 11 ) NOT NULL');
fssc_sql_alter (DB_NAME, $FSSCTableName, 'categories_name', 'VARCHAR( 255 ) NOT NULL');
fssc_sql_alter (DB_NAME, $FSSCTableName, 'categories_description', 'TEXT NOT NULL');
fssc_sql_alter (DB_NAME, $FSSCTableName, 'categories_url', 'VARCHAR( 255 ) NOT NULL');
fssc_sql_alter (DB_NAME, $FSSCTableName, 'categories_visibility', 'TINYINT( 1 ) NOT NULL');
fssc_sql_alter (DB_NAME, $FSSCTableName, 'categories_order', 'INT( 11 ) NOT NULL');
fssc_sql_alter (DB_NAME, $FSSCTableName, 'categories_custom_order', 'VARCHAR( 255 ) DEFAULT "" NOT NULL');
fssc_sql_alter (DB_NAME, $FSSCTableName, 'categories_product_count', 'INT( 11 ) NOT NULL');
fssc_sql_alter (DB_NAME, $FSSCTableName, 'categories_toolbar', "tinyint(1) NOT NULL default '1'");
fssc_sql_alter (DB_NAME, $FSSCTableName, 'categories_meta_description', 'VARCHAR( 255 ) NOT NULL');
fssc_sql_alter (DB_NAME, $FSSCTableName, 'categories_meta_keywords', 'VARCHAR( 255 ) NOT NULL');


if ($wpdb->get_var("SELECT COUNT(categories_id) FROM $FSSCTableName") == 0) {
	$wpdb->query("INSERT INTO ".$FSSCTableName." (categories_id, parent_id, categories_name, categories_url, categories_visibility, categories_order, categories_product_count) VALUES (1, 0, '".$wpdb->escape('My Category')."', '".$wpdb->escape('my-category')."', 1, 1, 1); ");
}



$FSSCTableName = $wpdb->prefix."fssc_currencies";
$wpdb->query("CREATE TABLE IF NOT EXISTS " . $FSSCTableName . " (currency_id INT( 11 ) NOT NULL AUTO_INCREMENT PRIMARY KEY);");

fssc_sql_alter (DB_NAME, $FSSCTableName, 'currency_name', 'VARCHAR( 255 ) NOT NULL');
fssc_sql_alter (DB_NAME, $FSSCTableName, 'currency_code', 'VARCHAR( 255 ) NOT NULL');
fssc_sql_alter (DB_NAME, $FSSCTableName, 'currency_enabled', 'TINYINT( 1 ) NOT NULL');

if ($wpdb->get_var("SELECT COUNT(currency_id) FROM $FSSCTableName") == 0) {
	fssc_sql_insert($FSSCTableName, 'currency_name', 'USD', 'currency_name, currency_enabled', "'USD', 1");
	fssc_sql_insert($FSSCTableName, 'currency_name', 'CAD', 'currency_name, currency_enabled', "'CAD', 0");
	fssc_sql_insert($FSSCTableName, 'currency_name', 'GBP', 'currency_name, currency_enabled', "'GBP', 0");
	fssc_sql_insert($FSSCTableName, 'currency_name', 'EUR', 'currency_name, currency_enabled', "'EUR', 0");
	fssc_sql_insert($FSSCTableName, 'currency_name', 'AUD', 'currency_name, currency_enabled', "'AUD', 0");
	fssc_sql_insert($FSSCTableName, 'currency_name', 'JPY', 'currency_name, currency_enabled', "'JPY', 0");
	fssc_sql_insert($FSSCTableName, 'currency_name', 'AED', 'currency_name, currency_enabled', "'AED', 0");
	fssc_sql_insert($FSSCTableName, 'currency_name', 'AFN', 'currency_name, currency_enabled', "'AFN', 0");
	fssc_sql_insert($FSSCTableName, 'currency_name', 'ALL', 'currency_name, currency_enabled', "'ALL', 0");
	fssc_sql_insert($FSSCTableName, 'currency_name', 'AMD', 'currency_name, currency_enabled', "'AMD', 0");
	fssc_sql_insert($FSSCTableName, 'currency_name', 'ANG', 'currency_name, currency_enabled', "'ANG', 0");
	fssc_sql_insert($FSSCTableName, 'currency_name', 'AOA', 'currency_name, currency_enabled', "'AOA', 0");
	fssc_sql_insert($FSSCTableName, 'currency_name', 'ARS', 'currency_name, currency_enabled', "'ARS', 0");
	fssc_sql_insert($FSSCTableName, 'currency_name', 'AUD', 'currency_name, currency_enabled', "'AUD', 0");
	fssc_sql_insert($FSSCTableName, 'currency_name', 'AWG', 'currency_name, currency_enabled', "'AWG', 0");
	fssc_sql_insert($FSSCTableName, 'currency_name', 'AZN', 'currency_name, currency_enabled', "'AZN', 0");
	fssc_sql_insert($FSSCTableName, 'currency_name', 'BAM', 'currency_name, currency_enabled', "'BAM', 0");
	fssc_sql_insert($FSSCTableName, 'currency_name', 'BBD', 'currency_name, currency_enabled', "'BBD', 0");
	fssc_sql_insert($FSSCTableName, 'currency_name', 'BDT', 'currency_name, currency_enabled', "'BDT', 0");
	fssc_sql_insert($FSSCTableName, 'currency_name', 'BGN', 'currency_name, currency_enabled', "'BGN', 0");
	fssc_sql_insert($FSSCTableName, 'currency_name', 'BHD', 'currency_name, currency_enabled', "'BHD', 0");
	fssc_sql_insert($FSSCTableName, 'currency_name', 'BIF', 'currency_name, currency_enabled', "'BIF', 0");
	fssc_sql_insert($FSSCTableName, 'currency_name', 'BMD', 'currency_name, currency_enabled', "'BMD', 0");
	fssc_sql_insert($FSSCTableName, 'currency_name', 'BND', 'currency_name, currency_enabled', "'BND', 0");
	fssc_sql_insert($FSSCTableName, 'currency_name', 'BOB', 'currency_name, currency_enabled', "'BOB', 0");
	fssc_sql_insert($FSSCTableName, 'currency_name', 'BRL', 'currency_name, currency_enabled', "'BRL', 0");
	fssc_sql_insert($FSSCTableName, 'currency_name', 'BSD', 'currency_name, currency_enabled', "'BSD', 0");
	fssc_sql_insert($FSSCTableName, 'currency_name', 'BTN', 'currency_name, currency_enabled', "'BTN', 0");
	fssc_sql_insert($FSSCTableName, 'currency_name', 'BWP', 'currency_name, currency_enabled', "'BWP', 0");
	fssc_sql_insert($FSSCTableName, 'currency_name', 'BYR', 'currency_name, currency_enabled', "'BYR', 0");
	fssc_sql_insert($FSSCTableName, 'currency_name', 'BZD', 'currency_name, currency_enabled', "'BZD', 0");
	fssc_sql_insert($FSSCTableName, 'currency_name', 'CDF', 'currency_name, currency_enabled', "'CDF', 0");
	fssc_sql_insert($FSSCTableName, 'currency_name', 'CHF', 'currency_name, currency_enabled', "'CHF', 0");
	fssc_sql_insert($FSSCTableName, 'currency_name', 'CLP', 'currency_name, currency_enabled', "'CLP', 0");
	fssc_sql_insert($FSSCTableName, 'currency_name', 'CNY', 'currency_name, currency_enabled', "'CNY', 0");
	fssc_sql_insert($FSSCTableName, 'currency_name', 'COP', 'currency_name, currency_enabled', "'COP', 0");
	fssc_sql_insert($FSSCTableName, 'currency_name', 'CRC', 'currency_name, currency_enabled', "'CRC', 0");
	fssc_sql_insert($FSSCTableName, 'currency_name', 'CUC', 'currency_name, currency_enabled', "'CUC', 0");
	fssc_sql_insert($FSSCTableName, 'currency_name', 'CUP', 'currency_name, currency_enabled', "'CUP', 0");
	fssc_sql_insert($FSSCTableName, 'currency_name', 'CVE', 'currency_name, currency_enabled', "'CVE', 0");
	fssc_sql_insert($FSSCTableName, 'currency_name', 'CZK', 'currency_name, currency_enabled', "'CZK', 0");
	fssc_sql_insert($FSSCTableName, 'currency_name', 'DJF', 'currency_name, currency_enabled', "'DJF', 0");
	fssc_sql_insert($FSSCTableName, 'currency_name', 'DKK', 'currency_name, currency_enabled', "'DKK', 0");
	fssc_sql_insert($FSSCTableName, 'currency_name', 'DOP', 'currency_name, currency_enabled', "'DOP', 0");
	fssc_sql_insert($FSSCTableName, 'currency_name', 'DZD', 'currency_name, currency_enabled', "'DZD', 0");
	fssc_sql_insert($FSSCTableName, 'currency_name', 'EGP', 'currency_name, currency_enabled', "'EGP', 0");
	fssc_sql_insert($FSSCTableName, 'currency_name', 'ERN', 'currency_name, currency_enabled', "'ERN', 0");
	fssc_sql_insert($FSSCTableName, 'currency_name', 'ETB', 'currency_name, currency_enabled', "'ETB', 0");
	fssc_sql_insert($FSSCTableName, 'currency_name', 'FJD', 'currency_name, currency_enabled', "'FJD', 0");
	fssc_sql_insert($FSSCTableName, 'currency_name', 'FKP', 'currency_name, currency_enabled', "'FKP', 0");
	fssc_sql_insert($FSSCTableName, 'currency_name', 'GEL', 'currency_name, currency_enabled', "'GEL', 0");
	fssc_sql_insert($FSSCTableName, 'currency_name', 'GGP', 'currency_name, currency_enabled', "'GGP', 0");
	fssc_sql_insert($FSSCTableName, 'currency_name', 'GHS', 'currency_name, currency_enabled', "'GHS', 0");
	fssc_sql_insert($FSSCTableName, 'currency_name', 'GIP', 'currency_name, currency_enabled', "'GIP', 0");
	fssc_sql_insert($FSSCTableName, 'currency_name', 'GMD', 'currency_name, currency_enabled', "'GMD', 0");
	fssc_sql_insert($FSSCTableName, 'currency_name', 'GNF', 'currency_name, currency_enabled', "'GNF', 0");
	fssc_sql_insert($FSSCTableName, 'currency_name', 'GTQ', 'currency_name, currency_enabled', "'GTQ', 0");
	fssc_sql_insert($FSSCTableName, 'currency_name', 'GYD', 'currency_name, currency_enabled', "'GYD', 0");
	fssc_sql_insert($FSSCTableName, 'currency_name', 'HKD', 'currency_name, currency_enabled', "'HKD', 0");
	fssc_sql_insert($FSSCTableName, 'currency_name', 'HNL', 'currency_name, currency_enabled', "'HNL', 0");
	fssc_sql_insert($FSSCTableName, 'currency_name', 'HRK', 'currency_name, currency_enabled', "'HRK', 0");
	fssc_sql_insert($FSSCTableName, 'currency_name', 'HTG', 'currency_name, currency_enabled', "'HTG', 0");
	fssc_sql_insert($FSSCTableName, 'currency_name', 'HUF', 'currency_name, currency_enabled', "'HUF', 0");
	fssc_sql_insert($FSSCTableName, 'currency_name', 'IDR', 'currency_name, currency_enabled', "'IDR', 0");
	fssc_sql_insert($FSSCTableName, 'currency_name', 'ILS', 'currency_name, currency_enabled', "'ILS', 0");
	fssc_sql_insert($FSSCTableName, 'currency_name', 'IMP', 'currency_name, currency_enabled', "'IMP', 0");
	fssc_sql_insert($FSSCTableName, 'currency_name', 'INR', 'currency_name, currency_enabled', "'INR', 0");
	fssc_sql_insert($FSSCTableName, 'currency_name', 'IQD', 'currency_name, currency_enabled', "'IQD', 0");
	fssc_sql_insert($FSSCTableName, 'currency_name', 'IRR', 'currency_name, currency_enabled', "'IRR', 0");
	fssc_sql_insert($FSSCTableName, 'currency_name', 'ISK', 'currency_name, currency_enabled', "'ISK', 0");
	fssc_sql_insert($FSSCTableName, 'currency_name', 'JEP', 'currency_name, currency_enabled', "'JEP', 0");
	fssc_sql_insert($FSSCTableName, 'currency_name', 'JMD', 'currency_name, currency_enabled', "'JMD', 0");
	fssc_sql_insert($FSSCTableName, 'currency_name', 'JOD', 'currency_name, currency_enabled', "'JOD', 0");
	fssc_sql_insert($FSSCTableName, 'currency_name', 'JPY', 'currency_name, currency_enabled', "'JPY', 0");
	fssc_sql_insert($FSSCTableName, 'currency_name', 'KES', 'currency_name, currency_enabled', "'KES', 0");
	fssc_sql_insert($FSSCTableName, 'currency_name', 'KGS', 'currency_name, currency_enabled', "'KGS', 0");
	fssc_sql_insert($FSSCTableName, 'currency_name', 'KHR', 'currency_name, currency_enabled', "'KHR', 0");
	fssc_sql_insert($FSSCTableName, 'currency_name', 'KMF', 'currency_name, currency_enabled', "'KMF', 0");
	fssc_sql_insert($FSSCTableName, 'currency_name', 'KPW', 'currency_name, currency_enabled', "'KPW', 0");
	fssc_sql_insert($FSSCTableName, 'currency_name', 'KRW', 'currency_name, currency_enabled', "'KRW', 0");
	fssc_sql_insert($FSSCTableName, 'currency_name', 'KWD', 'currency_name, currency_enabled', "'KWD', 0");
	fssc_sql_insert($FSSCTableName, 'currency_name', 'KYD', 'currency_name, currency_enabled', "'KYD', 0");
	fssc_sql_insert($FSSCTableName, 'currency_name', 'KZT', 'currency_name, currency_enabled', "'KZT', 0");
	fssc_sql_insert($FSSCTableName, 'currency_name', 'LAK', 'currency_name, currency_enabled', "'LAK', 0");
	fssc_sql_insert($FSSCTableName, 'currency_name', 'LBP', 'currency_name, currency_enabled', "'LBP', 0");
	fssc_sql_insert($FSSCTableName, 'currency_name', 'LKR', 'currency_name, currency_enabled', "'LKR', 0");
	fssc_sql_insert($FSSCTableName, 'currency_name', 'LRD', 'currency_name, currency_enabled', "'LRD', 0");
	fssc_sql_insert($FSSCTableName, 'currency_name', 'LSL', 'currency_name, currency_enabled', "'LSL', 0");
	fssc_sql_insert($FSSCTableName, 'currency_name', 'LTL', 'currency_name, currency_enabled', "'LTL', 0");
	fssc_sql_insert($FSSCTableName, 'currency_name', 'LVL', 'currency_name, currency_enabled', "'LVL', 0");
	fssc_sql_insert($FSSCTableName, 'currency_name', 'LYD', 'currency_name, currency_enabled', "'LYD', 0");
	fssc_sql_insert($FSSCTableName, 'currency_name', 'MAD', 'currency_name, currency_enabled', "'MAD', 0");
	fssc_sql_insert($FSSCTableName, 'currency_name', 'MDL', 'currency_name, currency_enabled', "'MDL', 0");
	fssc_sql_insert($FSSCTableName, 'currency_name', 'MGA', 'currency_name, currency_enabled', "'MGA', 0");
	fssc_sql_insert($FSSCTableName, 'currency_name', 'MKD', 'currency_name, currency_enabled', "'MKD', 0");
	fssc_sql_insert($FSSCTableName, 'currency_name', 'MMK', 'currency_name, currency_enabled', "'MMK', 0");
	fssc_sql_insert($FSSCTableName, 'currency_name', 'MNT', 'currency_name, currency_enabled', "'MNT', 0");
	fssc_sql_insert($FSSCTableName, 'currency_name', 'MOP', 'currency_name, currency_enabled', "'MOP', 0");
	fssc_sql_insert($FSSCTableName, 'currency_name', 'MRO', 'currency_name, currency_enabled', "'MRO', 0");
	fssc_sql_insert($FSSCTableName, 'currency_name', 'MUR', 'currency_name, currency_enabled', "'MUR', 0");
	fssc_sql_insert($FSSCTableName, 'currency_name', 'MVR', 'currency_name, currency_enabled', "'MVR', 0");
	fssc_sql_insert($FSSCTableName, 'currency_name', 'MWK', 'currency_name, currency_enabled', "'MWK', 0");
	fssc_sql_insert($FSSCTableName, 'currency_name', 'MXN', 'currency_name, currency_enabled', "'MXN', 0");
	fssc_sql_insert($FSSCTableName, 'currency_name', 'MYR', 'currency_name, currency_enabled', "'MYR', 0");
	fssc_sql_insert($FSSCTableName, 'currency_name', 'MZN', 'currency_name, currency_enabled', "'MZN', 0");
	fssc_sql_insert($FSSCTableName, 'currency_name', 'NAD', 'currency_name, currency_enabled', "'NAD', 0");
	fssc_sql_insert($FSSCTableName, 'currency_name', 'NGN', 'currency_name, currency_enabled', "'NGN', 0");
	fssc_sql_insert($FSSCTableName, 'currency_name', 'NIO', 'currency_name, currency_enabled', "'NIO', 0");
	fssc_sql_insert($FSSCTableName, 'currency_name', 'NOK', 'currency_name, currency_enabled', "'NOK', 0");
	fssc_sql_insert($FSSCTableName, 'currency_name', 'NPR', 'currency_name, currency_enabled', "'NPR', 0");
	fssc_sql_insert($FSSCTableName, 'currency_name', 'NZD', 'currency_name, currency_enabled', "'NZD', 0");
	fssc_sql_insert($FSSCTableName, 'currency_name', 'OMR', 'currency_name, currency_enabled', "'OMR', 0");
	fssc_sql_insert($FSSCTableName, 'currency_name', 'PAB', 'currency_name, currency_enabled', "'PAB', 0");
	fssc_sql_insert($FSSCTableName, 'currency_name', 'PEN', 'currency_name, currency_enabled', "'PEN', 0");
	fssc_sql_insert($FSSCTableName, 'currency_name', 'PGK', 'currency_name, currency_enabled', "'PGK', 0");
	fssc_sql_insert($FSSCTableName, 'currency_name', 'PHP', 'currency_name, currency_enabled', "'PHP', 0");
	fssc_sql_insert($FSSCTableName, 'currency_name', 'PKR', 'currency_name, currency_enabled', "'PKR', 0");
	fssc_sql_insert($FSSCTableName, 'currency_name', 'PLN', 'currency_name, currency_enabled', "'PLN', 0");
	fssc_sql_insert($FSSCTableName, 'currency_name', 'PYG', 'currency_name, currency_enabled', "'PYG', 0");
	fssc_sql_insert($FSSCTableName, 'currency_name', 'QAR', 'currency_name, currency_enabled', "'QAR', 0");
	fssc_sql_insert($FSSCTableName, 'currency_name', 'RON', 'currency_name, currency_enabled', "'RON', 0");
	fssc_sql_insert($FSSCTableName, 'currency_name', 'RSD', 'currency_name, currency_enabled', "'RSD', 0");
	fssc_sql_insert($FSSCTableName, 'currency_name', 'RUB', 'currency_name, currency_enabled', "'RUB', 0");
	fssc_sql_insert($FSSCTableName, 'currency_name', 'RWF', 'currency_name, currency_enabled', "'RWF', 0");
	fssc_sql_insert($FSSCTableName, 'currency_name', 'SAR', 'currency_name, currency_enabled', "'SAR', 0");
	fssc_sql_insert($FSSCTableName, 'currency_name', 'SBD', 'currency_name, currency_enabled', "'SBD', 0");
	fssc_sql_insert($FSSCTableName, 'currency_name', 'SCR', 'currency_name, currency_enabled', "'SCR', 0");
	fssc_sql_insert($FSSCTableName, 'currency_name', 'SDG', 'currency_name, currency_enabled', "'SDG', 0");
	fssc_sql_insert($FSSCTableName, 'currency_name', 'SEK', 'currency_name, currency_enabled', "'SEK', 0");
	fssc_sql_insert($FSSCTableName, 'currency_name', 'SGD', 'currency_name, currency_enabled', "'SGD', 0");
	fssc_sql_insert($FSSCTableName, 'currency_name', 'SHP', 'currency_name, currency_enabled', "'SHP', 0");
	fssc_sql_insert($FSSCTableName, 'currency_name', 'SLL', 'currency_name, currency_enabled', "'SLL', 0");
	fssc_sql_insert($FSSCTableName, 'currency_name', 'SOS', 'currency_name, currency_enabled', "'SOS', 0");
	fssc_sql_insert($FSSCTableName, 'currency_name', 'SPL', 'currency_name, currency_enabled', "'SPL', 0");
	fssc_sql_insert($FSSCTableName, 'currency_name', 'SRD', 'currency_name, currency_enabled', "'SRD', 0");
	fssc_sql_insert($FSSCTableName, 'currency_name', 'STD', 'currency_name, currency_enabled', "'STD', 0");
	fssc_sql_insert($FSSCTableName, 'currency_name', 'SVC', 'currency_name, currency_enabled', "'SVC', 0");
	fssc_sql_insert($FSSCTableName, 'currency_name', 'SYP', 'currency_name, currency_enabled', "'SYP', 0");
	fssc_sql_insert($FSSCTableName, 'currency_name', 'SZL', 'currency_name, currency_enabled', "'SZL', 0");
	fssc_sql_insert($FSSCTableName, 'currency_name', 'THB', 'currency_name, currency_enabled', "'THB', 0");
	fssc_sql_insert($FSSCTableName, 'currency_name', 'TJS', 'currency_name, currency_enabled', "'TJS', 0");
	fssc_sql_insert($FSSCTableName, 'currency_name', 'TMT', 'currency_name, currency_enabled', "'TMT', 0");
	fssc_sql_insert($FSSCTableName, 'currency_name', 'TND', 'currency_name, currency_enabled', "'TND', 0");
	fssc_sql_insert($FSSCTableName, 'currency_name', 'TOP', 'currency_name, currency_enabled', "'TOP', 0");
	fssc_sql_insert($FSSCTableName, 'currency_name', 'TRY', 'currency_name, currency_enabled', "'TRY', 0");
	fssc_sql_insert($FSSCTableName, 'currency_name', 'TTD', 'currency_name, currency_enabled', "'TTD', 0");
	fssc_sql_insert($FSSCTableName, 'currency_name', 'TVD', 'currency_name, currency_enabled', "'TVD', 0");
	fssc_sql_insert($FSSCTableName, 'currency_name', 'TWD', 'currency_name, currency_enabled', "'TWD', 0");
	fssc_sql_insert($FSSCTableName, 'currency_name', 'TZS', 'currency_name, currency_enabled', "'TZS', 0");
	fssc_sql_insert($FSSCTableName, 'currency_name', 'UAH', 'currency_name, currency_enabled', "'UAH', 0");
	fssc_sql_insert($FSSCTableName, 'currency_name', 'UGX', 'currency_name, currency_enabled', "'UGX', 0");
	fssc_sql_insert($FSSCTableName, 'currency_name', 'UYU', 'currency_name, currency_enabled', "'UYU', 0");
	fssc_sql_insert($FSSCTableName, 'currency_name', 'UZS', 'currency_name, currency_enabled', "'UZS', 0");
	fssc_sql_insert($FSSCTableName, 'currency_name', 'VEF', 'currency_name, currency_enabled', "'VEF', 0");
	fssc_sql_insert($FSSCTableName, 'currency_name', 'VND', 'currency_name, currency_enabled', "'VND', 0");
	fssc_sql_insert($FSSCTableName, 'currency_name', 'VUV', 'currency_name, currency_enabled', "'VUV', 0");
	fssc_sql_insert($FSSCTableName, 'currency_name', 'WST', 'currency_name, currency_enabled', "'WST', 0");
	fssc_sql_insert($FSSCTableName, 'currency_name', 'XAF', 'currency_name, currency_enabled', "'XAF', 0");
	fssc_sql_insert($FSSCTableName, 'currency_name', 'XCD', 'currency_name, currency_enabled', "'XCD', 0");
	fssc_sql_insert($FSSCTableName, 'currency_name', 'XDR', 'currency_name, currency_enabled', "'XDR', 0");
	fssc_sql_insert($FSSCTableName, 'currency_name', 'XOF', 'currency_name, currency_enabled', "'XOF', 0");
	fssc_sql_insert($FSSCTableName, 'currency_name', 'XPF', 'currency_name, currency_enabled', "'XPF', 0");
	fssc_sql_insert($FSSCTableName, 'currency_name', 'YER', 'currency_name, currency_enabled', "'YER', 0");
	fssc_sql_insert($FSSCTableName, 'currency_name', 'ZAR', 'currency_name, currency_enabled', "'ZAR', 0");
	fssc_sql_insert($FSSCTableName, 'currency_name', 'ZMK', 'currency_name, currency_enabled', "'ZMK', 0");
	fssc_sql_insert($FSSCTableName, 'currency_name', 'ZWD', 'currency_name, currency_enabled', "'ZWD', 0");	
}



$FSSCTableName = $wpdb->prefix."fssc_products_pricing";
$wpdb->query("CREATE TABLE IF NOT EXISTS " . $FSSCTableName . " (pricing_id INT( 11 ) NOT NULL AUTO_INCREMENT PRIMARY KEY);");

fssc_sql_alter (DB_NAME, $FSSCTableName, 'products_id', 'INT( 11 ) NOT NULL');
fssc_sql_alter (DB_NAME, $FSSCTableName, 'variation_id', 'INT( 11 ) NOT NULL DEFAULT "0"');
fssc_sql_alter (DB_NAME, $FSSCTableName, 'currency_id', 'INT( 11 ) NOT NULL DEFAULT "1"');
fssc_sql_alter (DB_NAME, $FSSCTableName, 'user_type_id', 'INT( 11 ) NOT NULL DEFAULT "-2"');
fssc_sql_alter (DB_NAME, $FSSCTableName, 'products_price', 'DECIMAL( 20,2 ) NOT NULL DEFAULT "0.00"');
fssc_sql_alter (DB_NAME, $FSSCTableName, 'products_instant_rebate', 'DECIMAL( 20,2 ) NOT NULL DEFAULT "0.00"');

if ($wpdb->get_var("SELECT COUNT(products_id) FROM $FSSCTableName") == 0) {
	fssc_sql_insert($FSSCTableName, 'products_id', '1', 'products_id, currency_id, user_type_id, products_price', "1, 1, -2, '50.00'");
}



$FSSCTableName = $wpdb->prefix."fssc_brands";
$wpdb->query("CREATE TABLE IF NOT EXISTS " . $FSSCTableName . " (brand_id INT( 11 ) NOT NULL AUTO_INCREMENT PRIMARY KEY);");

fssc_sql_alter (DB_NAME, $FSSCTableName, 'brand_name', "VARCHAR( 255 ) NOT NULL");
fssc_sql_alter (DB_NAME, $FSSCTableName, 'brand_url', "VARCHAR( 255 ) NOT NULL");
fssc_sql_alter (DB_NAME, $FSSCTableName, 'brand_description', "text NOT NULL");
fssc_sql_alter (DB_NAME, $FSSCTableName, 'brand_visibility', "TINYINT( 1 ) NOT NULL");
fssc_sql_alter (DB_NAME, $FSSCTableName, 'brand_widget_featured', "TINYINT( 1 ) NOT NULL");
fssc_sql_alter (DB_NAME, $FSSCTableName, 'brand_product_count', "INT( 11 ) NOT NULL");
fssc_sql_alter (DB_NAME, $FSSCTableName, 'brand_enable_tabs', "TINYINT( 1 ) DEFAULT '0' NOT NULL");
fssc_sql_alter (DB_NAME, $FSSCTableName, 'brand_tab_1', "VARCHAR( 255 ) NOT NULL");
fssc_sql_alter (DB_NAME, $FSSCTableName, 'brand_tab_2', "VARCHAR( 255 ) NOT NULL");
fssc_sql_alter (DB_NAME, $FSSCTableName, 'brand_tab_3', "VARCHAR( 255 ) NOT NULL");
fssc_sql_alter (DB_NAME, $FSSCTableName, 'brand_tab_4', "VARCHAR( 255 ) NOT NULL");
fssc_sql_alter (DB_NAME, $FSSCTableName, 'brand_tab_5', "VARCHAR( 255 ) NOT NULL");
fssc_sql_alter (DB_NAME, $FSSCTableName, 'brand_tab_6', "VARCHAR( 255 ) NOT NULL");
fssc_sql_alter (DB_NAME, $FSSCTableName, 'brand_meta_title', "VARCHAR( 255 ) NOT NULL");
fssc_sql_alter (DB_NAME, $FSSCTableName, 'brand_meta_description', "VARCHAR( 255 ) NOT NULL");
fssc_sql_alter (DB_NAME, $FSSCTableName, 'brand_meta_keywords', "VARCHAR( 255 ) NOT NULL");

if ($wpdb->get_var("SELECT COUNT(brand_id) FROM $FSSCTableName") == 0) {
	$wpdb->query("INSERT INTO ".$FSSCTableName." (brand_id, brand_name, brand_url, brand_visibility, brand_product_count) VALUES (1, '".$wpdb->escape('My Brand')."', '".$wpdb->escape('my-brand')."', 1, 1); ");
	fssc_sql_insert($FSSCTableName, 'brand_id', '1', 'brand_id, brand_name, brand_url, brand_visibility, brand_product_count', "1, 'My Brand', 'my-brand', 1, 1");
}






$FSSCTableName = $wpdb->prefix."fssc_orders";
$wpdb->query("CREATE TABLE IF NOT EXISTS " . $FSSCTableName . " (orders_id INT( 11 ) NOT NULL AUTO_INCREMENT PRIMARY KEY);");

fssc_sql_alter (DB_NAME, $FSSCTableName, 'users_id', "INT( 11 ) NOT NULL");
fssc_sql_alter (DB_NAME, $FSSCTableName, 'users_code', "VARCHAR( 255 ) NOT NULL");
fssc_sql_alter (DB_NAME, $FSSCTableName, 'customer_name', "VARCHAR( 255 ) NOT NULL");
fssc_sql_alter (DB_NAME, $FSSCTableName, 'customer_first_name', "VARCHAR( 255 ) NOT NULL");
fssc_sql_alter (DB_NAME, $FSSCTableName, 'customer_last_name', "VARCHAR( 255 ) NOT NULL");
fssc_sql_alter (DB_NAME, $FSSCTableName, 'customer_company', "VARCHAR( 255 ) NOT NULL");
fssc_sql_alter (DB_NAME, $FSSCTableName, 'customer_address1', "VARCHAR( 255 ) NOT NULL");
fssc_sql_alter (DB_NAME, $FSSCTableName, 'customer_address2', "VARCHAR( 255 ) NOT NULL");
fssc_sql_alter (DB_NAME, $FSSCTableName, 'customer_city', "VARCHAR( 255 ) NOT NULL");
fssc_sql_alter (DB_NAME, $FSSCTableName, 'customer_stateprov', "VARCHAR( 255 ) NOT NULL");
fssc_sql_alter (DB_NAME, $FSSCTableName, 'customer_zippostal', "VARCHAR( 255 ) NOT NULL");
fssc_sql_alter (DB_NAME, $FSSCTableName, 'customer_phone', "VARCHAR( 255 ) NOT NULL");
fssc_sql_alter (DB_NAME, $FSSCTableName, 'customer_email', "VARCHAR( 255 ) NOT NULL");
fssc_sql_alter (DB_NAME, $FSSCTableName, 'customer_country', "VARCHAR( 255 ) NOT NULL");
fssc_sql_alter (DB_NAME, $FSSCTableName, 'customer_website', "VARCHAR( 255 ) NOT NULL");
fssc_sql_alter (DB_NAME, $FSSCTableName, 'shipping_first_name', "VARCHAR( 255 ) NOT NULL");
fssc_sql_alter (DB_NAME, $FSSCTableName, 'shipping_last_name', "VARCHAR( 255 ) NOT NULL");
fssc_sql_alter (DB_NAME, $FSSCTableName, 'shipping_company', "VARCHAR( 255 ) NOT NULL");
fssc_sql_alter (DB_NAME, $FSSCTableName, 'shipping_address1', "VARCHAR( 255 ) NOT NULL");
fssc_sql_alter (DB_NAME, $FSSCTableName, 'shipping_address2', "VARCHAR( 255 ) NOT NULL");
fssc_sql_alter (DB_NAME, $FSSCTableName, 'shipping_city', "VARCHAR( 255 ) NOT NULL");
fssc_sql_alter (DB_NAME, $FSSCTableName, 'shipping_stateprov', "VARCHAR( 255 ) NOT NULL");
fssc_sql_alter (DB_NAME, $FSSCTableName, 'shipping_zippostal', "VARCHAR( 255 ) NOT NULL");
fssc_sql_alter (DB_NAME, $FSSCTableName, 'shipping_phone', "VARCHAR( 255 ) NOT NULL");
fssc_sql_alter (DB_NAME, $FSSCTableName, 'shipping_different', "TINYINT(11) NOT NULL");
fssc_sql_alter (DB_NAME, $FSSCTableName, 'customer_cardnumber', "VARCHAR( 255 ) NOT NULL");
fssc_sql_alter (DB_NAME, $FSSCTableName, 'customer_special_instructions', "text NOT NULL");
fssc_sql_alter (DB_NAME, $FSSCTableName, 'shipping_cost', "DECIMAL(20,2) NOT NULL");
fssc_sql_alter (DB_NAME, $FSSCTableName, 'shipping_type', "VARCHAR( 255 ) NOT NULL");
fssc_sql_alter (DB_NAME, $FSSCTableName, 'orders_taxes', "VARCHAR( 255 ) NOT NULL");
fssc_sql_alter (DB_NAME, $FSSCTableName, 'orders_total', "DECIMAL(20,2) NOT NULL");
fssc_sql_alter (DB_NAME, $FSSCTableName, 'orders_products', "text NOT NULL");
fssc_sql_alter (DB_NAME, $FSSCTableName, 'orders_avs', "VARCHAR( 255 ) NOT NULL");
fssc_sql_alter (DB_NAME, $FSSCTableName, 'customer_ip', "VARCHAR( 255 ) NOT NULL");
fssc_sql_alter (DB_NAME, $FSSCTableName, 'orders_overview', "text NOT NULL");
fssc_sql_alter (DB_NAME, $FSSCTableName, 'orders_number', "INT(11) NOT NULL");
fssc_sql_alter (DB_NAME, $FSSCTableName, 'orders_tracking', "VARCHAR( 255 ) NOT NULL");
fssc_sql_alter (DB_NAME, $FSSCTableName, 'orders_finalprice', "decimal( 20,2 ) NOT NULL");
fssc_sql_alter (DB_NAME, $FSSCTableName, 'orders_status', "VARCHAR( 255 ) NOT NULL default 'Pending'");
fssc_sql_alter (DB_NAME, $FSSCTableName, 'orders_last_modified', "timestamp NOT NULL default CURRENT_TIMESTAMP");
fssc_sql_alter (DB_NAME, $FSSCTableName, 'orders_date_added', "timestamp NOT NULL default '0000-00-00 00:00:00'");




$FSSCTableName = $wpdb->prefix."fssc_products";
$wpdb->query("CREATE TABLE IF NOT EXISTS " . $FSSCTableName . " (products_id INT( 11 ) NOT NULL AUTO_INCREMENT PRIMARY KEY);");

fssc_sql_alter (DB_NAME, $FSSCTableName, 'products_part_number', "VARCHAR(255) NOT NULL");
fssc_sql_alter (DB_NAME, $FSSCTableName, 'products_name', "text NOT NULL");
fssc_sql_alter (DB_NAME, $FSSCTableName, 'products_description', "text NOT NULL");
fssc_sql_alter (DB_NAME, $FSSCTableName, 'products_special_notice', "text NOT NULL");
fssc_sql_alter (DB_NAME, $FSSCTableName, 'products_price', 'DECIMAL( 20,2 ) NOT NULL DEFAULT "0.00"');
fssc_sql_alter (DB_NAME, $FSSCTableName, 'products_price_label', "VARCHAR(255) NOT NULL");
fssc_sql_alter (DB_NAME, $FSSCTableName, 'products_sale_discount', "DECIMAL(20,2) NOT NULL");
fssc_sql_alter (DB_NAME, $FSSCTableName, 'products_rebate_instant', "DECIMAL(20,2) NOT NULL");
fssc_sql_alter (DB_NAME, $FSSCTableName, 'products_rebate_mailin', "DECIMAL(20,2) NOT NULL");
fssc_sql_alter (DB_NAME, $FSSCTableName, 'products_msrp', "decimal(20,2) NOT NULL default '0.00'");
fssc_sql_alter (DB_NAME, $FSSCTableName, 'products_add_to_cart', "decimal(20,2) NOT NULL default '0.00'");
fssc_sql_alter (DB_NAME, $FSSCTableName, 'products_warranty', "VARCHAR(255) NOT NULL");
fssc_sql_alter (DB_NAME, $FSSCTableName, 'products_url', "VARCHAR(255) NOT NULL");
fssc_sql_alter (DB_NAME, $FSSCTableName, 'products_package_weight', "decimal(20,2) NOT NULL");
fssc_sql_alter (DB_NAME, $FSSCTableName, 'products_weight', "decimal(20,2) NOT NULL");
fssc_sql_alter (DB_NAME, $FSSCTableName, 'products_origin_zip', "int(11) NOT NULL");
fssc_sql_alter (DB_NAME, $FSSCTableName, 'products_visibility', "tinyint(1) NOT NULL default '0'");
fssc_sql_alter (DB_NAME, $FSSCTableName, 'products_discontinued', "tinyint(1) NOT NULL default '0'");
fssc_sql_alter (DB_NAME, $FSSCTableName, 'products_show_details', "tinyint(1) NOT NULL default '1'");
fssc_sql_alter (DB_NAME, $FSSCTableName, 'products_featured', "tinyint(1) NOT NULL default '0'");
fssc_sql_alter (DB_NAME, $FSSCTableName, 'products_pricematch', "tinyint(1) NOT NULL default '0'");
fssc_sql_alter (DB_NAME, $FSSCTableName, 'products_availability', "VARCHAR(255) NOT NULL");
fssc_sql_alter (DB_NAME, $FSSCTableName, 'products_free_shipping', "tinyint(1) NOT NULL default '0'");
fssc_sql_alter (DB_NAME, $FSSCTableName, 'products_extra_shipping', "decimal(20,2) NOT NULL default '0.00'");
fssc_sql_alter (DB_NAME, $FSSCTableName, 'products_electronic_download', "VARCHAR(255) NOT NULL");
fssc_sql_alter (DB_NAME, $FSSCTableName, 'products_electronic_download_ext', "VARCHAR(255) NOT NULL");
fssc_sql_alter (DB_NAME, $FSSCTableName, 'products_buy_button_link', "VARCHAR(255) NOT NULL");
fssc_sql_alter (DB_NAME, $FSSCTableName, 'products_buy_button_text', "VARCHAR(255) NOT NULL");
fssc_sql_alter (DB_NAME, $FSSCTableName, 'products_download_limit', "INT(11) NOT NULL");
fssc_sql_alter (DB_NAME, $FSSCTableName, 'products_download_version', "VARCHAR(255) NOT NULL");
fssc_sql_alter (DB_NAME, $FSSCTableName, 'products_download_button', "TINYINT(1) NOT NULL default '0'");
fssc_sql_alter (DB_NAME, $FSSCTableName, 'products_toolbar', "tinyint(1) NOT NULL default '1'");
fssc_sql_alter (DB_NAME, $FSSCTableName, 'products_meta_description', "VARCHAR(255) NOT NULL");
fssc_sql_alter (DB_NAME, $FSSCTableName, 'products_meta_keywords', "VARCHAR(255) NOT NULL");
fssc_sql_alter (DB_NAME, $FSSCTableName, 'products_custom_tab1', "VARCHAR(255) NOT NULL");
fssc_sql_alter (DB_NAME, $FSSCTableName, 'products_custom_tab1_value', "VARCHAR(255) NOT NULL");
fssc_sql_alter (DB_NAME, $FSSCTableName, 'products_custom_tab2', "VARCHAR(255) NOT NULL");
fssc_sql_alter (DB_NAME, $FSSCTableName, 'products_custom_tab2_value', "VARCHAR(255) NOT NULL");
fssc_sql_alter (DB_NAME, $FSSCTableName, 'products_custom_tab3', "VARCHAR(255) NOT NULL");
fssc_sql_alter (DB_NAME, $FSSCTableName, 'products_custom_tab3_value', "VARCHAR(255) NOT NULL");
fssc_sql_alter (DB_NAME, $FSSCTableName, 'products_inventory', "INT(11) NOT NULL");
fssc_sql_alter (DB_NAME, $FSSCTableName, 'products_addtocarts', "INT(11) NOT NULL");
fssc_sql_alter (DB_NAME, $FSSCTableName, 'products_views', "INT(11) NOT NULL");
fssc_sql_alter (DB_NAME, $FSSCTableName, 'products_purchased', "INT(11) NOT NULL");
fssc_sql_alter (DB_NAME, $FSSCTableName, 'products_last_updated', "timestamp NOT NULL default CURRENT_TIMESTAMP");
fssc_sql_alter (DB_NAME, $FSSCTableName, 'products_date_added', "timestamp NOT NULL default '0000-00-00 00:00:00'");

if ($wpdb->get_var("SELECT COUNT(products_id) FROM $FSSCTableName") == 0) {
	$wpdb->query("INSERT INTO ".$FSSCTableName." (products_id, products_price, products_part_number, products_name, products_url, products_description, products_visibility, products_featured, products_sale_discount) 
								VALUES (1, '50.00', '".$wpdb->escape('PROD001')."', '".$wpdb->escape('My First Product')."', '".$wpdb->escape('my-first-product')."', '".$wpdb->escape('My First Product Description')."', 1, 1, '10.00'); ");
}



$FSSCTableName = $wpdb->prefix."fssc_products_variations";
$wpdb->query("CREATE TABLE IF NOT EXISTS " . $FSSCTableName . " (variation_id INT( 11 ) NOT NULL AUTO_INCREMENT PRIMARY KEY);");

fssc_sql_alter (DB_NAME, $FSSCTableName, 'products_id', "INT( 11 ) NOT NULL");
fssc_sql_alter (DB_NAME, $FSSCTableName, 'variation_rebate_instant', "DECIMAL(20,2) NOT NULL");
fssc_sql_alter (DB_NAME, $FSSCTableName, 'variation_order', "INT( 11 ) NOT NULL");
fssc_sql_alter (DB_NAME, $FSSCTableName, 'variation_name', "VARCHAR( 255 ) NOT NULL");
fssc_sql_alter (DB_NAME, $FSSCTableName, 'variation_price', "DECIMAL(20,2) NOT NULL DEFAULT '0.00'");



$FSSCTableName = $wpdb->prefix."fssc_products_features";
$wpdb->query("CREATE TABLE IF NOT EXISTS " . $FSSCTableName . " (features_id INT( 11 ) NOT NULL AUTO_INCREMENT PRIMARY KEY);");

fssc_sql_alter (DB_NAME, $FSSCTableName, 'products_id', "INT( 11 ) NOT NULL");
fssc_sql_alter (DB_NAME, $FSSCTableName, 'features_order', "INT( 11 ) NOT NULL");
fssc_sql_alter (DB_NAME, $FSSCTableName, 'features_feature', "VARCHAR( 255 ) NOT NULL");



$FSSCTableName = $wpdb->prefix."fssc_products_accessories";
$wpdb->query("CREATE TABLE IF NOT EXISTS " . $FSSCTableName . " (products_id INT( 11 ) NOT NULL);");

fssc_sql_alter (DB_NAME, $FSSCTableName, 'accessory_id', "INT( 11 ) NOT NULL");
fssc_sql_alter (DB_NAME, $FSSCTableName, 'accessory_order', "INT( 11 ) NOT NULL");



$FSSCTableName = $wpdb->prefix."fssc_products_related";
$wpdb->query("CREATE TABLE IF NOT EXISTS " . $FSSCTableName . " (products_id INT( 11 ) NOT NULL);");

fssc_sql_alter (DB_NAME, $FSSCTableName, 'related_id', "INT( 11 ) NOT NULL");
fssc_sql_alter (DB_NAME, $FSSCTableName, 'related_order', "INT( 11 ) NOT NULL");



$FSSCTableName = $wpdb->prefix."fssc_products_images";
$wpdb->query("CREATE TABLE IF NOT EXISTS " . $FSSCTableName . " (images_id INT( 11 ) NOT NULL AUTO_INCREMENT PRIMARY KEY);");

fssc_sql_alter (DB_NAME, $FSSCTableName, 'products_id', "int(11) NOT NULL");



$FSSCTableName = $wpdb->prefix."fssc_products_to_categories";
$wpdb->query("CREATE TABLE IF NOT EXISTS " . $FSSCTableName . " (association_id INT( 11 ) NOT NULL AUTO_INCREMENT PRIMARY KEY);");

fssc_sql_alter (DB_NAME, $FSSCTableName, 'products_id', "INT(11) NOT NULL");
fssc_sql_alter (DB_NAME, $FSSCTableName, 'categories_id', "INT(11) NOT NULL");
fssc_sql_alter (DB_NAME, $FSSCTableName, 'products_order', "INT(11) NOT NULL");
fssc_sql_alter (DB_NAME, $FSSCTableName, 'custom_name', "VARCHAR (255) NOT NULL default ''");
fssc_sql_alter (DB_NAME, $FSSCTableName, 'short_description', "TEXT NOT NULL");

if ($wpdb->get_var("SELECT COUNT(products_id) FROM $FSSCTableName") == 0) {
	$wpdb->query("INSERT INTO ".$FSSCTableName." (products_id, categories_id, products_order) VALUES (1, 1, 1); ");
}



$FSSCTableName = $wpdb->prefix."fssc_products_to_brands";
$wpdb->query("CREATE TABLE IF NOT EXISTS " . $FSSCTableName . " (products_id INT(11) NOT NULL);");

fssc_sql_alter (DB_NAME, $FSSCTableName, 'brand_id', "INT(11) NOT NULL");
fssc_sql_alter (DB_NAME, $FSSCTableName, 'brand_tabs', "INT(11) NOT NULL");
fssc_sql_alter (DB_NAME, $FSSCTableName, 'products_order', "INT(11) NOT NULL");

if ($wpdb->get_var("SELECT COUNT(products_id) FROM $FSSCTableName") == 0) {
	$wpdb->query("INSERT INTO ".$FSSCTableName." (products_id, brand_id, products_order) VALUES (1, 1, 1); ");
}



$FSSCTableName = $wpdb->prefix."fssc_downloads";
$wpdb->query("CREATE TABLE IF NOT EXISTS " . $FSSCTableName . " (purchase_id INT( 11 ) NOT NULL AUTO_INCREMENT PRIMARY KEY);");

fssc_sql_alter (DB_NAME, $FSSCTableName, 'orders_number', "INT(11) NOT NULL");
fssc_sql_alter (DB_NAME, $FSSCTableName, 'products_id', "int(11) NOT NULL");
fssc_sql_alter (DB_NAME, $FSSCTableName, 'user_id', "INT(11) NOT NULL");
fssc_sql_alter (DB_NAME, $FSSCTableName, 'user_type', "int(11) NOT NULL default '-2'");
fssc_sql_alter (DB_NAME, $FSSCTableName, 'user_ip', "VARCHAR(255) NOT NULL");
fssc_sql_alter (DB_NAME, $FSSCTableName, 'download_initial_version', "VARCHAR(255) NOT NULL");
fssc_sql_alter (DB_NAME, $FSSCTableName, 'downloads', "INT(11) NOT NULL");
fssc_sql_alter (DB_NAME, $FSSCTableName, 'download_limit', "INT(11) NOT NULL");
fssc_sql_alter (DB_NAME, $FSSCTableName, 'download_date', "timestamp NOT NULL default CURRENT_TIMESTAMP");



$FSSCTableName = $wpdb->prefix."fssc_downloads_history";
$wpdb->query("CREATE TABLE IF NOT EXISTS " . $FSSCTableName . " (download_id INT( 11 ) NOT NULL AUTO_INCREMENT PRIMARY KEY);");

fssc_sql_alter (DB_NAME, $FSSCTableName, 'products_id', "int(11) NOT NULL");
fssc_sql_alter (DB_NAME, $FSSCTableName, 'user_id', "INT(11) NOT NULL");
fssc_sql_alter (DB_NAME, $FSSCTableName, 'user_type', "int(11) NOT NULL default '-2'");
fssc_sql_alter (DB_NAME, $FSSCTableName, 'user_ip', "VARCHAR(255) NOT NULL");
fssc_sql_alter (DB_NAME, $FSSCTableName, 'download_version', "VARCHAR(255) NOT NULL");
fssc_sql_alter (DB_NAME, $FSSCTableName, 'download_date', "timestamp NOT NULL default CURRENT_TIMESTAMP");



$FSSCTableName = $wpdb->prefix."fssc_users_basket";
$wpdb->query("CREATE TABLE IF NOT EXISTS " . $FSSCTableName . " (basket_id INT( 11 ) NOT NULL AUTO_INCREMENT PRIMARY KEY);");

fssc_sql_alter (DB_NAME, $FSSCTableName, 'users_id', "INT(11) NOT NULL default '0'");
fssc_sql_alter (DB_NAME, $FSSCTableName, 'users_code', "VARCHAR(255) NOT NULL");
fssc_sql_alter (DB_NAME, $FSSCTableName, 'products_id', "INT(11) NOT NULL");
fssc_sql_alter (DB_NAME, $FSSCTableName, 'variation_id', "INT(11) NOT NULL");
fssc_sql_alter (DB_NAME, $FSSCTableName, 'coupon_id', "INT(11) NOT NULL");
fssc_sql_alter (DB_NAME, $FSSCTableName, 'products_quantity', "INT(11) NOT NULL");
fssc_sql_alter (DB_NAME, $FSSCTableName, 'products_free_shipping', "tinyint(1) NOT NULL default '0'");
fssc_sql_alter (DB_NAME, $FSSCTableName, 'products_electronic_download', "tinyint(1) NOT NULL default '0'");
fssc_sql_alter (DB_NAME, $FSSCTableName, 'products_price', "decimal(20,2) NOT NULL");
fssc_sql_alter (DB_NAME, $FSSCTableName, 'products_price_option', "VARCHAR( 255 ) NOT NULL");
fssc_sql_alter (DB_NAME, $FSSCTableName, 'fixed_quantity', "tinyint(1) NOT NULL default '0'");
fssc_sql_alter (DB_NAME, $FSSCTableName, 'parent_basket_id', "INT(11) NOT NULL");
fssc_sql_alter (DB_NAME, $FSSCTableName, 'last_updated', "timestamp NOT NULL default CURRENT_TIMESTAMP");
fssc_sql_alter (DB_NAME, $FSSCTableName, 'date_added', "timestamp NOT NULL default '0000-00-00 00:00:00'");



$FSSCTableName = $wpdb->prefix."fssc_provinces";
$wpdb->query("CREATE TABLE IF NOT EXISTS " . $FSSCTableName . " (province_id INT( 11 ) NOT NULL AUTO_INCREMENT PRIMARY KEY);");

fssc_sql_alter (DB_NAME, $FSSCTableName, 'province_name', "VARCHAR(255) NOT NULL");
fssc_sql_alter (DB_NAME, $FSSCTableName, 'country_id', "INT(11) NOT NULL");
fssc_sql_alter (DB_NAME, $FSSCTableName, 'taxvalue1', "DECIMAL(20,2) NOT NULL");
fssc_sql_alter (DB_NAME, $FSSCTableName, 'taxvalue2', "DECIMAL(20,2) NOT NULL");
fssc_sql_alter (DB_NAME, $FSSCTableName, 'taxvalue3', "DECIMAL(20,2) NOT NULL");
fssc_sql_alter (DB_NAME, $FSSCTableName, 'province_visibility', "TINYINT(1) NOT NULL DEFAULT 1");

fssc_sql_insert($FSSCTableName, 'province_name', 'Alberta', 'province_name, country_id', "'Alberta', '2'");
fssc_sql_insert($FSSCTableName, 'province_name', 'British Columbia', 'province_name, country_id', "'British Columbia', '2'");
fssc_sql_insert($FSSCTableName, 'province_name', 'Manitoba', 'province_name, country_id', "'Manitoba', '2'");
fssc_sql_insert($FSSCTableName, 'province_name', 'New Brunswick', 'province_name, country_id', "'New Brunswick', '2'");
fssc_sql_insert($FSSCTableName, 'province_name', 'Newfoundland and Labrador', 'province_name, country_id', "'Newfoundland and Labrador', '2'");
fssc_sql_insert($FSSCTableName, 'province_name', 'Northwest Territories', 'province_name, country_id', "'Northwest Territories', '2'");
fssc_sql_insert($FSSCTableName, 'province_name', 'Nova Scotia', 'province_name, country_id', "'Nova Scotia', '2'");
fssc_sql_insert($FSSCTableName, 'province_name', 'Nunavut', 'province_name, country_id', "'Nunavut', '2'");
fssc_sql_insert($FSSCTableName, 'province_name', 'Ontario', 'province_name, country_id', "'Ontario', '2'");
fssc_sql_insert($FSSCTableName, 'province_name', 'Prince Edward Island', 'province_name, country_id', "'Prince Edward Island', '2'");
fssc_sql_insert($FSSCTableName, 'province_name', 'Quebec', 'province_name, country_id', "'Quebec', '2'");
fssc_sql_insert($FSSCTableName, 'province_name', 'Saskatchewan', 'province_name, country_id', "'Saskatchewan', '2'");
fssc_sql_insert($FSSCTableName, 'province_name', 'Yukon', 'province_name, country_id', "'Yukon', '2'");
fssc_sql_insert($FSSCTableName, 'province_name', 'Alabama', 'province_name, country_id', "'Alabama', '1'");
fssc_sql_insert($FSSCTableName, 'province_name', 'Alaska', 'province_name, country_id', "'Alaska', '1'");
fssc_sql_insert($FSSCTableName, 'province_name', 'Arizona', 'province_name, country_id', "'Arizona', '1'");
fssc_sql_insert($FSSCTableName, 'province_name', 'Arkansas', 'province_name, country_id', "'Arkansas', '1'");
fssc_sql_insert($FSSCTableName, 'province_name', 'California', 'province_name, country_id', "'California', '1'");
fssc_sql_insert($FSSCTableName, 'province_name', 'Colorado', 'province_name, country_id', "'Colorado', '1'");
fssc_sql_insert($FSSCTableName, 'province_name', 'Connecticut', 'province_name, country_id', "'Connecticut', '1'");
fssc_sql_insert($FSSCTableName, 'province_name', 'Delaware', 'province_name, country_id', "'Delaware', '1'");
fssc_sql_insert($FSSCTableName, 'province_name', 'Florida', 'province_name, country_id', "'Florida', '1'");
fssc_sql_insert($FSSCTableName, 'province_name', 'Georgia', 'province_name, country_id', "'Georgia', '1'");
fssc_sql_insert($FSSCTableName, 'province_name', 'Hawaii', 'province_name, country_id', "'Hawaii', '1'");
fssc_sql_insert($FSSCTableName, 'province_name', 'Idaho', 'province_name, country_id', "'Idaho', '1'");
fssc_sql_insert($FSSCTableName, 'province_name', 'Illinois', 'province_name, country_id', "'Illinois', '1'");
fssc_sql_insert($FSSCTableName, 'province_name', 'Indiana', 'province_name, country_id', "'Indiana', '1'");
fssc_sql_insert($FSSCTableName, 'province_name', 'Iowa', 'province_name, country_id', "'Iowa', '1'");
fssc_sql_insert($FSSCTableName, 'province_name', 'Kansas', 'province_name, country_id', "'Kansas', '1'");
fssc_sql_insert($FSSCTableName, 'province_name', 'Kentucky', 'province_name, country_id', "'Kentucky', '1'");
fssc_sql_insert($FSSCTableName, 'province_name', 'Louisiana', 'province_name, country_id', "'Louisiana', '1'");
fssc_sql_insert($FSSCTableName, 'province_name', 'Maine', 'province_name, country_id', "'Maine', '1'");
fssc_sql_insert($FSSCTableName, 'province_name', 'Maryland', 'province_name, country_id', "'Maryland', '1'");
fssc_sql_insert($FSSCTableName, 'province_name', 'Massachusetts', 'province_name, country_id', "'Massachusetts', '1'");
fssc_sql_insert($FSSCTableName, 'province_name', 'Michigan', 'province_name, country_id', "'Michigan', '1'");
fssc_sql_insert($FSSCTableName, 'province_name', 'Minnesota', 'province_name, country_id', "'Minnesota', '1'");
fssc_sql_insert($FSSCTableName, 'province_name', 'Mississippi', 'province_name, country_id', "'Mississippi', '1'");
fssc_sql_insert($FSSCTableName, 'province_name', 'Missouri', 'province_name, country_id', "'Missouri', '1'");
fssc_sql_insert($FSSCTableName, 'province_name', 'Montana', 'province_name, country_id', "'Montana', '1'");
fssc_sql_insert($FSSCTableName, 'province_name', 'Nebraska', 'province_name, country_id', "'Nebraska', '1'");
fssc_sql_insert($FSSCTableName, 'province_name', 'Nevada', 'province_name, country_id', "'Nevada', '1'");
fssc_sql_insert($FSSCTableName, 'province_name', 'New Hampshire', 'province_name, country_id', "'New Hampshire', '1'");
fssc_sql_insert($FSSCTableName, 'province_name', 'New Jersey', 'province_name, country_id', "'New Jersey', '1'");
fssc_sql_insert($FSSCTableName, 'province_name', 'New Mexico', 'province_name, country_id', "'New Mexico', '1'");
fssc_sql_insert($FSSCTableName, 'province_name', 'New York', 'province_name, country_id', "'New York', '1'");
fssc_sql_insert($FSSCTableName, 'province_name', 'North Carolina', 'province_name, country_id', "'North Carolina', '1'");
fssc_sql_insert($FSSCTableName, 'province_name', 'North Dakota', 'province_name, country_id', "'North Dakota', '1'");
fssc_sql_insert($FSSCTableName, 'province_name', 'Ohio', 'province_name, country_id', "'Ohio', '1'");
fssc_sql_insert($FSSCTableName, 'province_name', 'Oklahoma', 'province_name, country_id', "'Oklahoma', '1'");
fssc_sql_insert($FSSCTableName, 'province_name', 'Oregon', 'province_name, country_id', "'Oregon', '1'");
fssc_sql_insert($FSSCTableName, 'province_name', 'Pennsylvania', 'province_name, country_id', "'Pennsylvania', '1'");
fssc_sql_insert($FSSCTableName, 'province_name', 'Rhode Island', 'province_name, country_id', "'Rhode Island', '1'");
fssc_sql_insert($FSSCTableName, 'province_name', 'South Carolina', 'province_name, country_id', "'South Carolina', '1'");
fssc_sql_insert($FSSCTableName, 'province_name', 'South Dakota', 'province_name, country_id', "'South Dakota', '1'");
fssc_sql_insert($FSSCTableName, 'province_name', 'Tennessee', 'province_name, country_id', "'Tennessee', '1'");
fssc_sql_insert($FSSCTableName, 'province_name', 'Texas', 'province_name, country_id', "'Texas', '1'");
fssc_sql_insert($FSSCTableName, 'province_name', 'Utah', 'province_name, country_id', "'Utah', '1'");
fssc_sql_insert($FSSCTableName, 'province_name', 'Vermont', 'province_name, country_id', "'Vermont', '1'");
fssc_sql_insert($FSSCTableName, 'province_name', 'Virginia', 'province_name, country_id', "'Virginia', '1'");
fssc_sql_insert($FSSCTableName, 'province_name', 'Washington', 'province_name, country_id', "'Washington', '1'");
fssc_sql_insert($FSSCTableName, 'province_name', 'West Virginia', 'province_name, country_id', "'West Virginia', '1'");
fssc_sql_insert($FSSCTableName, 'province_name', 'Wisconsin', 'province_name, country_id', "'Wisconsin', '1'");
fssc_sql_insert($FSSCTableName, 'province_name', 'Wyoming', 'province_name, country_id', "'Wyoming', '1'");



$FSSCTableName = $wpdb->prefix."fssc_countries";
$wpdb->query("CREATE TABLE IF NOT EXISTS " . $FSSCTableName . " (country_id INT(11) NOT NULL AUTO_INCREMENT PRIMARY KEY);");

fssc_sql_alter (DB_NAME, $FSSCTableName, 'country_name', "VARCHAR(255) NOT NULL");
fssc_sql_alter (DB_NAME, $FSSCTableName, 'country_url', "VARCHAR(255) NOT NULL");
fssc_sql_alter (DB_NAME, $FSSCTableName, 'country_code', "VARCHAR(255) DEFAULT 'NA' NOT NULL");
fssc_sql_alter (DB_NAME, $FSSCTableName, 'currency_code', "VARCHAR(255) DEFAULT '1' NOT NULL");
fssc_sql_alter (DB_NAME, $FSSCTableName, 'currency_percentage', "INT(11) NOT NULL");
fssc_sql_alter (DB_NAME, $FSSCTableName, 'country_hostip_code', "VARCHAR(3) NOT NULL");
fssc_sql_alter (DB_NAME, $FSSCTableName, 'country_input_field', "TINYINT(1) NOT NULL DEFAULT '0'");
fssc_sql_alter (DB_NAME, $FSSCTableName, 'country_visibility', "TINYINT(1) NOT NULL DEFAULT 1");
fssc_sql_alter (DB_NAME, $FSSCTableName, 'country_payment_gateway', "VARCHAR(255) NOT NULL DEFAULT 'Use Default'");

fssc_sql_insert($FSSCTableName, 'country_name', 'United States', 'country_name, country_url, country_code, currency_code, currency_percentage, country_hostip_code, country_input_field', "'".$wpdb->escape('United States')."', '".$wpdb->escape('united-states')."', 'US', '1', '0', 'US', 1");
fssc_sql_insert($FSSCTableName, 'country_name', 'Canada', 'country_name, country_url, country_code, currency_code, currency_percentage, country_hostip_code, country_input_field', "'".$wpdb->escape('Canada')."', '".$wpdb->escape('canada')."', 'CA', '2', '0', 'CA', 1");
fssc_sql_insert($FSSCTableName, 'country_name', 'United Kingdom', 'country_name, country_url', "'".$wpdb->escape('United Kingdom')."', '".$wpdb->escape('united-kingdom')."'");



$FSSCTableName = $wpdb->prefix."fssc_shipping_costs";
$wpdb->query("CREATE TABLE IF NOT EXISTS " . $FSSCTableName . " (shipping_cost_id INT(11) NOT NULL AUTO_INCREMENT PRIMARY KEY);");

fssc_sql_alter (DB_NAME, $FSSCTableName, 'shipping_cost_cost', "DECIMAL(20,2) NOT NULL");
fssc_sql_alter (DB_NAME, $FSSCTableName, 'shipping_cost_range1', "VARCHAR(25) NOT NULL");
fssc_sql_alter (DB_NAME, $FSSCTableName, 'shipping_cost_range2', "VARCHAR(25) NOT NULL");
fssc_sql_alter (DB_NAME, $FSSCTableName, '', "");
fssc_sql_alter (DB_NAME, $FSSCTableName, '', "");

if ($wpdb->get_var("SELECT COUNT(shipping_cost_id) FROM $FSSCTableName") == 0) {
	$wpdb->query("INSERT INTO ".$FSSCTableName." (shipping_cost_id, shipping_cost_cost, shipping_cost_range1, shipping_cost_range2) VALUES (1, '5.00', '0.01', '9.99'); ");
	$wpdb->query("INSERT INTO ".$FSSCTableName." (shipping_cost_id, shipping_cost_cost, shipping_cost_range1, shipping_cost_range2) VALUES (2, '15.00', '10.00', '49.99'); ");
	$wpdb->query("INSERT INTO ".$FSSCTableName." (shipping_cost_id, shipping_cost_cost, shipping_cost_range1, shipping_cost_range2) VALUES (3, '25.00', '50.00', '99,99'); ");
	$wpdb->query("INSERT INTO ".$FSSCTableName." (shipping_cost_id, shipping_cost_cost, shipping_cost_range1, shipping_cost_range2) VALUES (4, '30.00', '100.00', '199.99'); ");
	$wpdb->query("INSERT INTO ".$FSSCTableName." (shipping_cost_id, shipping_cost_cost, shipping_cost_range1, shipping_cost_range2) VALUES (5, '35.00', '200.00', '9999999'); ");
}



$FSSCTableName = $wpdb->prefix."fssc_promo_two";
$wpdb->query("CREATE TABLE IF NOT EXISTS " . $FSSCTableName . " (promo_id INT(11) NOT NULL AUTO_INCREMENT PRIMARY KEY);");

fssc_sql_alter (DB_NAME, $FSSCTableName, 'products_id', "INT(11) NOT NULL");
fssc_sql_alter (DB_NAME, $FSSCTableName, 'products_count', "INT(11) NOT NULL");
fssc_sql_alter (DB_NAME, $FSSCTableName, 'discount_type', "VARCHAR(255) NOT NULL DEFAULT '0'");
fssc_sql_alter (DB_NAME, $FSSCTableName, 'discount_value', "INT(11) NOT NULL");
fssc_sql_alter (DB_NAME, $FSSCTableName, 'user_type_id', "INT(11) NOT NULL");



$FSSCTableName = $wpdb->prefix."fssc_coupons";
$wpdb->query("CREATE TABLE IF NOT EXISTS " . $FSSCTableName . " (coupon_id INT(11) NOT NULL AUTO_INCREMENT PRIMARY KEY);");

fssc_sql_alter (DB_NAME, $FSSCTableName, 'coupon_code', "VARCHAR(255) NOT NULL");
fssc_sql_alter (DB_NAME, $FSSCTableName, 'coupon_value', "DECIMAL(20,2) NOT NULL default '0.00'");
fssc_sql_alter (DB_NAME, $FSSCTableName, 'user_type_id', "INT(11) NOT NULL");



$FSSCTableName = $wpdb->prefix."fssc_users_to_discounts";
$wpdb->query("CREATE TABLE IF NOT EXISTS " . $FSSCTableName . " (discount_id INT(11) NOT NULL AUTO_INCREMENT PRIMARY KEY);");

fssc_sql_alter (DB_NAME, $FSSCTableName, 'ID', "INT(11) NOT NULL");
fssc_sql_alter (DB_NAME, $FSSCTableName, 'discount_percent', "DECIMAL(20,2) NOT NULL default '0.00'");



$FSSCTableName = $wpdb->prefix."users";
fssc_sql_alter (DB_NAME, $FSSCTableName, 'first_name', "VARCHAR(255) NOT NULL");
fssc_sql_alter (DB_NAME, $FSSCTableName, 'last_name', "VARCHAR(255) NOT NULL");
fssc_sql_alter (DB_NAME, $FSSCTableName, 'company_name', "VARCHAR(255) NOT NULL");
fssc_sql_alter (DB_NAME, $FSSCTableName, 'company_tax_id', "VARCHAR(255) NOT NULL");
fssc_sql_alter (DB_NAME, $FSSCTableName, 'address', "VARCHAR(255) NOT NULL");
fssc_sql_alter (DB_NAME, $FSSCTableName, 'city', "VARCHAR(255) NOT NULL");
fssc_sql_alter (DB_NAME, $FSSCTableName, 'stateprov', "VARCHAR(255) NOT NULL");
fssc_sql_alter (DB_NAME, $FSSCTableName, 'zippostal', "VARCHAR(255) NOT NULL");
fssc_sql_alter (DB_NAME, $FSSCTableName, 'country', "VARCHAR(255) NOT NULL");
fssc_sql_alter (DB_NAME, $FSSCTableName, 'phone_number', "VARCHAR(255) NOT NULL");
fssc_sql_alter (DB_NAME, $FSSCTableName, 'fax_number', "VARCHAR(255) NOT NULL");
fssc_sql_alter (DB_NAME, $FSSCTableName, 'taxid', "VARCHAR(255) NOT NULL");
fssc_sql_alter (DB_NAME, $FSSCTableName, 'resalecert', "VARCHAR(255) NOT NULL");
fssc_sql_alter (DB_NAME, $FSSCTableName, 'item_shipping_location', "VARCHAR(255) NOT NULL");
fssc_sql_alter (DB_NAME, $FSSCTableName, 'sfirst_name', "VARCHAR(255) NOT NULL");
fssc_sql_alter (DB_NAME, $FSSCTableName, 'slast_name', "VARCHAR(255) NOT NULL");
fssc_sql_alter (DB_NAME, $FSSCTableName, 'scompany', "VARCHAR(255) NOT NULL");
fssc_sql_alter (DB_NAME, $FSSCTableName, 'saddress', "VARCHAR(255) NOT NULL");
fssc_sql_alter (DB_NAME, $FSSCTableName, 'scity', "VARCHAR(255) NOT NULL");
fssc_sql_alter (DB_NAME, $FSSCTableName, 'scountry', "VARCHAR(255) NOT NULL");
fssc_sql_alter (DB_NAME, $FSSCTableName, 'sstateprov', "VARCHAR(255) NOT NULL");
fssc_sql_alter (DB_NAME, $FSSCTableName, 'szippostal', "VARCHAR(255) NOT NULL");
fssc_sql_alter (DB_NAME, $FSSCTableName, 'sphone', "VARCHAR(255) NOT NULL");
fssc_sql_alter (DB_NAME, $FSSCTableName, 'fssc_users_type', "INT(11) NOT NULL");


if (function_exists(fssc_sql_pro_features)) { fssc_sql_pro_features(); }
if (function_exists(fssc_sql_pro_styling)) { fssc_sql_pro_styling(); }
if (function_exists(fssc_sql_distributors)) { fssc_sql_distributors(); }
if (function_exists(fssc_sql_amazon)) { fssc_sql_amazon(); }
if (function_exists(fssc_sql_fedex)) { fssc_sql_fedex(); }
if (function_exists(fssc_sql_googlebase)) { fssc_sql_googlebase(); }
if (function_exists(fssc_sql_mailchimp)) { fssc_sql_mailchimp(); }
if (function_exists(fssc_sql_finder)) { fssc_sql_finder();  }
if (function_exists(fssc_sql_reviews)) { fssc_sql_reviews(); }
if (function_exists(fssc_sql_stats)) { fssc_sql_stats(); }
if (function_exists(fssc_sql_ups)) { fssc_sql_ups(); }
if (function_exists(fssc_sql_user_types)) { fssc_sql_user_types(); }
if (function_exists(fssc_sql_google_checkout)) { fssc_sql_google_checkout(); }
if (function_exists(fssc_sql_paypal_pro)) { fssc_sql_paypal_pro(); }
if (function_exists(fssc_sql_authorizenet)) { fssc_sql_authorizenet(); }
if (function_exists(fssc_sql_licenses)) { fssc_sql_licenses(); }

?>