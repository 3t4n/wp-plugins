<?php
	if ($fscartconfig['StoreRequiresLogin'] == 1 && !$user_ID) {
		return 'You must be logged in to view our product catalog.';
		exit;
	}

	$CategoryNameStyle = ''; if (function_exists(fssc_text_styling)) { $CategoryNameStyle = fssc_text_styling($fscartstyle['CategoryNameSize'], $fscartstyle['CategoryNameColor']); }
	
	$ToolBarLinkStyle = ''; if (function_exists(fssc_textcolor_styling)) { $ToolBarLinkStyle = fssc_textcolor_styling($fscartstyle, 'ProductToolBarLinkColor'); }
	$ToolBarTextStyle = ''; if (function_exists(fssc_text_styling)) { $ToolBarTextStyle = fssc_text_styling($fscartstyle['ProductToolBarFontSize'], $fscartstyle['ProductToolBarFontColor']); }
	$ToolBarStyle = 'style="background: url('.get_option('home').'/wp-content/plugins/fs-shopping-cart/images/pnavg.png) repeat-x; background-color: #d0d0d0; border: 1px solid #d0d0d0; "'; if (function_exists(fssc_toolbar_styling)) { $ToolBarStyle = fssc_toolbar_styling($fscartstyle); }

	
	$category_id = fssc_grab_category_id();
	$CategoryName = stripslashes($wpdb->get_var("SELECT categories_name FROM ".$wpdb->prefix."fssc_categories WHERE categories_id = ".$category_id));
	$page_content = '<div id="fs-cart">';
	$page_content .= '<h1 id="fs-cart-category-name"'.$CategoryNameStyle.'>'.$CategoryName.'</h1>';
	if ($fscartconfig['CategoryToolBar'] == 0 && $wpdb->get_var("SELECT categories_toolbar FROM ".$wpdb->prefix."fssc_categories WHERE categories_id = ".$category_id) == 1) {
		$page_content .= '<ul id="fs-product-nav" '.$ToolBarStyle.'>';
		$CategoryDescription = $wpdb->get_var("SELECT categories_description FROM ".$wpdb->prefix."fssc_categories WHERE categories_id = ".$category_id);
		if ($CategoryDescription != '' && !isset($_GET['order'])) {
			$page_content .= '<li '.$ToolBarTextStyle.' onClick="document.getElementById(\'fs-cat-description\').className=\'\';document.getElementById(\'fs-cat-all\').className=\'hide\';">About</li>';
	} 
	$page_content .= '<li '.$ToolBarTextStyle.' onClick="document.getElementById(\'fs-cat-all\').className=\'\';document.getElementById(\'fs-cat-description\').className=\'hide\';">Products</li>';
	$page_content .= '</ul>';
	}
	if ($CategoryDescription != '' && !isset($_GET['order'])) {
		$page_content .= '<div id="fs-cat-description"><br />';
		$page_content .= '<h2>'.$CategoryName.' Overview</h2>';
		$page_content .= '<p>'.str_replace("\n","<br />",stripslashes($CategoryDescription)).'</p>'; 
		$page_content .= '</div>';
	} 
	$page_content .= '<div id="fs-cat-all"><br />';
	$page_content .= fssc_print_products_listing ($category_id, '', '', TRUE, TRUE, $fscartconfig['DefaultProductsPerPage']);
	$page_content .= '</div>';
	
	$page_content .= '</div>';
	$page_content .= '<SCRIPT TYPE="text/javascript">
	<!--
	document.getElementById(\'fs-cat-description\').className=\'hide\';
	document.getElementById(\'fs-cat-all\').className=\'\';
	//-->
	</SCRIPT>';
	echo $page_content;
?>