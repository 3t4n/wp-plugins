<?php
function fssc_config() {
	global $fscartconfig,$fscartstyle,$wpdb,$FSSCExtensions;
	
	if (isset($_GET['showwelcome'])) {
		$wpdb->query("UPDATE ".$wpdb->prefix."fssc_config SET config_value = 'no' WHERE config_name = 'ShowWelcome'");
	}
	
	if (!isset($_GET['f'])) {
		$SettingsPage = 'config';
	} else {
		$SettingsPage = $_GET['f'];
	}

	echo '<div class="wrap">';
	echo '<form name="update-fssc-config" action="#" method="POST">';
	echo '<h2>FireStorm Shopping Cart Configuration</h2>';
	echo '<div class="nav-tabs-nav">';
	echo '<div class="nav-tabs-wrapper">';
	echo '<div class="nav-tabs">';
	echo '<span class="nav-tab'; if ($SettingsPage == 'config') { echo ' nav-tab-active" style="background-color: #fafafa; border-bottom: none;'; } echo '"><a href="admin.php?page=fssc-config&f=config" style="text-decoration: none; color: #333333;'; if ($SettingsPage == 'config') { echo ' font-weight: bold;'; } echo '">Configuration</a></span>';
	echo '<span class="nav-tab'; if ($SettingsPage == 'features') { echo ' nav-tab-active" style="background-color: #fafafa; border-bottom: none;'; } echo '"><a href="admin.php?page=fssc-config&f=features" style="text-decoration: none; color: #333333;'; if ($SettingsPage == 'features') { echo ' font-weight: bold;'; } echo '">Features</a></span>';
	echo '<span class="nav-tab'; if ($SettingsPage == 'style') { echo ' nav-tab-active" style="background-color: #fafafa; border-bottom: none;'; } echo '"><a href="admin.php?page=fssc-config&f=style" style="text-decoration: none; color: #333333;'; if ($SettingsPage == 'style') { echo ' font-weight: bold;'; } echo '">Styling</a></span>';
	echo '<span class="nav-tab'; if ($SettingsPage == 'text') { echo ' nav-tab-active" style="background-color: #fafafa; border-bottom: none;'; } echo '"><a href="admin.php?page=fssc-config&f=text" style="text-decoration: none; color: #333333;'; if ($SettingsPage == 'text') { echo ' font-weight: bold;'; } echo '">Text</a></span>';
	echo '<span class="nav-tab'; if ($SettingsPage == 'orders') { echo ' nav-tab-active" style="background-color: #fafafa; border-bottom: none;'; } echo '"><a href="admin.php?page=fssc-config&f=orders" style="text-decoration: none; color: #333333;'; if ($SettingsPage == 'orders') { echo ' font-weight: bold;'; } echo '">Orders</a></span>';
	echo '<span class="nav-tab'; if ($SettingsPage == 'members') { echo ' nav-tab-active" style="background-color: #fafafa; border-bottom: none;'; } echo '"><a href="admin.php?page=fssc-config&f=members" style="text-decoration: none; color: #333333;'; if ($SettingsPage == 'members') { echo ' font-weight: bold;'; } echo '">Members</a></span>';
	echo '<span class="nav-tab'; if ($SettingsPage == 'shipping') { echo ' nav-tab-active" style="background-color: #fafafa; border-bottom: none;'; } echo '"><a href="admin.php?page=fssc-config&f=shipping" style="text-decoration: none; color: #333333;'; if ($SettingsPage == 'shipping') { echo ' font-weight: bold;'; } echo '">Shipping</a></span>';
	echo '<span class="nav-tab'; if ($SettingsPage == 'gateways') { echo ' nav-tab-active" style="background-color: #fafafa; border-bottom: none;'; } echo '"><a href="admin.php?page=fssc-config&f=gateways" style="text-decoration: none; color: #333333;'; if ($SettingsPage == 'gateways') { echo ' font-weight: bold;'; } echo '">Payment Gateways</a></span>';
	echo '<span class="nav-tab'; if ($SettingsPage == 'currencies') { echo ' nav-tab-active" style="background-color: #fafafa; border-bottom: none;'; } echo '"><a href="admin.php?page=fssc-config&f=currencies" style="text-decoration: none; color: #333333;'; if ($SettingsPage == 'currencies') { echo ' font-weight: bold;'; } echo '">Currencies</a></span>';
	echo '<span class="nav-tab'; if ($SettingsPage == 'marketing') { echo ' nav-tab-active" style="background-color: #fafafa; border-bottom: none;'; } echo '"><a href="admin.php?page=fssc-config&f=marketing" style="text-decoration: none; color: #333333;'; if ($SettingsPage == 'marketing') { echo ' font-weight: bold;'; } echo '">Marketing</a></span>';
	echo '<span class="nav-tab'; if ($SettingsPage == 'locations') { echo ' nav-tab-active" style="background-color: #fafafa; border-bottom: none;'; } echo '"><a href="admin.php?page=fssc-config&f=locations" style="text-decoration: none; color: #333333;'; if ($SettingsPage == 'locations') { echo ' font-weight: bold;'; } echo '">Locations</a></span>';
	echo '</div>';
	echo '</div>';
	echo '</div>';
	if ($SettingsPage == 'config') {
		require_once("admin_config_general.php");
	} elseif ($SettingsPage == 'features') {
		require_once("admin_config_features.php");
	} elseif ($SettingsPage == 'style') {
		require_once("admin_config_style.php");
	} elseif ($SettingsPage == 'text') {
		require_once("admin_config_text.php");
	} elseif ($SettingsPage == 'orders') {
		require_once("admin_config_orders.php");
	} elseif ($SettingsPage == 'members') {
		require_once("admin_config_members.php");
	} elseif ($SettingsPage == 'shipping') {
		require_once("admin_config_shipping.php");
	} elseif ($SettingsPage == 'gateways') {
		require_once("admin_config_gateways.php");
	} elseif ($SettingsPage == 'currencies') {
		require_once("admin_config_currencies.php");
	} elseif ($SettingsPage == 'marketing') {
		require_once("admin_config_marketing.php");
	} elseif ($SettingsPage == 'locations') {
		require_once("admin_config_locations.php");
//	} elseif ($SettingsPage == 'finder') {
//		if (file_exists(ABSPATH.'wp-content/plugins/fs-real-estate-plugin/includes/finder/admin_config_finder.php')) { require_once("finder/admin_config_finder.php"); } else { echo missing_settings('Product Finder'); }
	}
	echo '</form>';
	echo '</div>';
}
?>