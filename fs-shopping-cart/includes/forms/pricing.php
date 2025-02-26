<?php
$VariationID = 0;
if (isset($_GET['var'])) { $VariationID = $_GET['var']; }
if (isset($_POST['submit'])) {
	if (isset($_GET['var'])) { 
		$wpdb->query("UPDATE ".$wpdb->prefix."fssc_products_variations SET variation_rebate_instant = '".fssc_safe_price($_POST['irebate'])."' WHERE products_id = ".$_GET['pid'].' AND variation_id = '.$_GET['var']);
	} else {
		$wpdb->query("UPDATE ".$wpdb->prefix."fssc_products SET products_rebate_instant = '".fssc_safe_price($_POST['irebate'])."' WHERE products_id = ".$_GET['pid']);
	}
	$wpdb->query("UPDATE ".$wpdb->prefix."fssc_products SET products_google = '".fssc_safe_price($_POST['products_google'])."' WHERE products_id = ".$_GET['pid']);
	if ($FSSCExtensions['Amazon'] == TRUE) {
		$wpdb->query("UPDATE ".$wpdb->prefix."fssc_products SET products_amazon_price = '".fssc_safe_price($_POST['products_amazon_price'])."' WHERE products_id = ".$_GET['pid']);
	}
	if ($FSSCExtensions['UserTypes'] == FALSE) { $wpdb->query("UPDATE ".$wpdb->prefix."fssc_products SET products_price = ".fssc_safe_price($_POST['products_price'])." WHERE products_id = ".$_GET['pid']); }
	$wpdb->query("UPDATE ".$wpdb->prefix."fssc_products SET products_msrp = ".fssc_safe_price($_POST['products_msrp'])." WHERE products_id = ".$_GET['pid']);
	$wpdb->query("UPDATE ".$wpdb->prefix."fssc_products SET products_pricematch = ".$_POST['products_pricematch']." WHERE products_id = ".$_GET['pid']);
	$wpdb->query("UPDATE ".$wpdb->prefix."fssc_products SET products_price_label = '".$_POST['products_price_label']."' WHERE products_id = ".$_GET['pid']);
	if (isset($_POST['variation_price'])) { $wpdb->query("UPDATE ".$wpdb->prefix."fssc_products_variations SET variation_price = '".fssc_safe_price($_POST['variation_price'])."' WHERE variation_id = ".$_GET['var']); }
	echo '<div id="message" class="updated fade"><p><strong>Your pricing has been updated.</strong></p></div>';
}
?>
<h2>Product Pricing</h2>
<form name="special-pricing" action="admin.php?page=fssc-products&fp=pricing&f=pricing&cid=<?php print $_GET['cid']; ?>&pid=<?php print $_GET['pid']; if (isset($_GET['var'])) { echo '&var='.$_GET['var']; } ?>" method="POST">
<?php
$CurrentVariation = 0;
if (isset($_GET['var'])) { $CurrentVariation = $_GET['var']; }
$Variations = $wpdb->get_results("SELECT * FROM ".$wpdb->prefix."fssc_products_variations WHERE products_id = ".$_GET['pid']." ORDER BY variation_name");
if (count($Variations) > 0) {
	echo '<strong>Variation:</strong> <select name="variation_id" id="variation_id" onchange="window.open(this.options[this.selectedIndex].value,\'_top\')">';
	echo '<option value="admin.php?page=fssc-products&fp=pricing&f=pricing&cid='.$_GET['cid'].'&pid='.$_GET['pid'].'">No Variation</option>';
	foreach ($Variations as $Variations) {
		$selected = '';
		if ($CurrentVariation == $Variations->variation_id) { $selected = ' selected'; }
		echo '<option value="admin.php?page=fssc-products&fp=pricing&f=pricing&cid='.$_GET['cid'].'&pid='.$_GET['pid'].'&var='.$Variations->variation_id.'"'.$selected.'>'.$Variations->variation_name.'</option>';
	}
	echo '</select><br /><br />';
}
$AmazonPrice = $wpdb->get_var("SELECT products_amazon_price FROM ".$wpdb->prefix."fssc_products WHERE products_id = ".$_GET['pid']);		  
$GoogleShopping = $wpdb->get_var("SELECT products_google FROM ".$wpdb->prefix."fssc_products WHERE products_id = ".$_GET['pid']);		
$AmazonProfit = FALSE;
if ($AmazonPrice != 0.00) {
	$DPrice = $wpdb->get_var("SELECT distributor_price FROM ".$wpdb->prefix."fssc_products_to_distr WHERE products_id = ".$_GET['pid']." AND distributor_currency = 'USD' ORDER BY distributor_price");
	if ($DPrice != '' && $DPrice != '0' && $DPrice != '0.00') { 
		$MerchFees = 100 - 8;
		$MerchFees = $MerchFees / 100;
		$TempPrice = $AmazonPrice * $MerchFees;
		$AmazonProfit = $TempPrice - $fscartconfig['StatsPricingShipping'] - $DPrice;
	}
}  
$ProductDetails = $wpdb->get_row("SELECT * FROM ".$wpdb->prefix."fssc_products WHERE products_id = ".$_GET['pid']);
if (isset($_GET['var'])) { $VariationDetails = $wpdb->get_row("SELECT * FROM ".$wpdb->prefix."fssc_products_variations WHERE variation_id = ".$_GET['var']); } 

echo '<table class="widefat page fixed" cellspacing="0" border="1">
<thead>
<tr>
<th scope="col" class="manage-column" width="200">Pricing</th>
<th scope="col" class="manage-column" width="290">&nbsp;</th>
<th scope="col" class="manage-column">&nbsp;</th>
</tr>
</thead>
<tfoot>
<tr>
<th scope="col" class="manage-column" width="200">Pricing</th>
<th scope="col" class="manage-column" width="290">&nbsp;</th>
<th scope="col" class="manage-column"><input type="submit" name="submit" class="button-primary" value="Update Pricing" style="padding: 3px 8px;"></th>
</tr>
</tfoot>
<tbody>';
if ($FSSCExtensions['UserTypes'] == FALSE && $FSSCExtensions['MultiCurrency'] == FALSE) { fssc_print_admin_input('Product Price', 'products_price', $ProductDetails->products_price, 35, ''); }
if ($FSSCExtensions['UserTypes'] == FALSE && $FSSCExtensions['MultiCurrency'] == FALSE && isset($_GET['var'])) { fssc_print_admin_input('Variation Price', 'variation_price', $VariationDetails->variation_price, 35, ''); }
fssc_print_admin_input('Product MSRP ('.$_SESSION['currency_symbol'].')', 'products_msrp', $ProductDetails->products_msrp, 35, '');
fssc_print_admin_input('Google Shopping ('.$_SESSION['currency_symbol'].')', 'products_google', $ProductDetails->products_google, 35, '');
if ($FSSCExtensions['Amazon'] == TRUE) {
	fssc_print_admin_input('Amazon Price ('.$_SESSION['currency_symbol'].')', 'products_amazon_price', $ProductDetails->products_amazon_price, 35, '');
}
fssc_print_admin_selectbox('Display Price Match Seal', 'products_pricematch', $ProductDetails->products_pricematch, array('Yes' => '1', 'No' => '0'), '');
fssc_print_admin_input('Price Label', 'products_price_label', $ProductDetails->products_price_label, 35, '');
echo '</tbody></table><p>&nbsp;</p>';
if ($FSSCExtensions['MultiCurrency'] == TRUE && $FSSCExtensions['UserTypes'] == TRUE) {
	fssc_user_type_multi_currency_table($VariationID); 
} elseif ($FSSCExtensions['MultiCurrency'] == TRUE) {
	fssc_multi_currency_table($VariationID); 
} elseif ($FSSCExtensions['UserTypes'] == TRUE) { 
	fssc_user_type_table($VariationID); 
}
?>
</form>
