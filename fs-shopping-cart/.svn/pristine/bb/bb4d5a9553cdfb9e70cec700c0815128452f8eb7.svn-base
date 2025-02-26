<?php

add_action('admin_init', 'editor_admin_init');
add_action('admin_head', 'editor_admin_head');
 
function editor_admin_init() {
  wp_enqueue_script('word-count');
  wp_enqueue_script('post');
  wp_enqueue_script('editor');
  wp_enqueue_script('media-upload');
}
function editor_admin_head() {
  wp_tiny_mce();
}


function fssc_add_pages($Pages) {
	global $wpdb;
	foreach ($Pages as $Title => $Content) {
		if ($wpdb->get_var("SELECT COUNT(post_content) FROM ".$wpdb->prefix."posts WHERE post_content = '$Content' AND post_status IN ('publish', 'private')") == 0) {
			wp_insert_post(array(
			'post_title' => $Title,
			'post_content' => $Content,
			'post_type' => 'page',
			'post_status' => 'publish',
			'comment_status' => 'closed', 
			'ping_status' => 'closed', 
			'post_author' => 1
			));
		}
	}
}
function fssc_feature_disabled($title) {
		return '<table class="widefat page fixed" cellspacing="0" border="1">
		<thead>
		<tr>
		<th scope="col" class="manage-column"><b>'.$title.'</b></th>
		</tr>
		</thead>
		<tbody>
		<td style="height: 300px;">This feature is currently disabled. To purchase this extended feature, visit <a href="http://www.firestorminteractive.com/wordpress/ecommerce/" target="_blank">www.firestorminteractive.com/wordpress/ecommerce/</a>.</td>
		</tbody></table><br />';
}
function fssc_feature_disabled_mini() {
	echo '<tr><td colspan="3">This feature is currently disabled. To purchase this extended feature, visit <a href="http://www.firestorminteractive.com/wordpress/ecommerce/" target="_blank">www.firestorminteractive.com/wordpress/ecommerce/</a>.</td></tr>';
}
function fssc_extension_version($URL) {
	if (file_exists($URL)) {
		$FSSCThemeStyle = file($URL);
		return str_replace("\n", '', str_replace('// Version: ','',$FSSCThemeStyle[1]));
	}
}
function fssc_spam_check($Var) {
	$SpamCheck = FALSE;
	foreach ($Var as $Var => $Value) {
		if (isset($Value)) {
			if ($Value != '' && is_string($Value)) { 
				if (preg_match("/wp_users/i", $Value)) {
					$SpamCheck = TRUE;
				}
			}
		}
	}
	return $SpamCheck;
}
function fssc_sql_alter ($DBNAME, $TABLENAME, $COLUMNNAME, $TYPE) {
	global $wpdb;
	$AlterTable = TRUE;
	$tableFields = mysql_list_fields($DBNAME, $TABLENAME);
	for($i=0;$i<mysql_num_fields($tableFields);$i++) { 
		if(mysql_field_name($tableFields, $i) == $COLUMNNAME) {
			$AlterTable = FALSE;
		}
	}
	if ($AlterTable == TRUE) {
		$wpdb->query("ALTER TABLE $TABLENAME ADD $COLUMNNAME $TYPE");
	}
}
function fssc_sql_insert($TableName, $ColumnName, $Value, $Columns, $Values) {
	global $wpdb;
	if ($wpdb->get_var("SELECT COUNT(*) FROM $TableName WHERE $ColumnName = '$Value'") == 0) {
		$wpdb->query("INSERT INTO $TableName ($Columns) VALUES ($Values)");
	}
}
function fssc_print_hidden_input($name, $value) {
	echo '<input type="hidden" name="'.$name.'" value="'.$value.'">';
}
function fssc_print_file_input($label, $name, $value, $length) {
	echo '<div id="fsrep_input"><div id="fsrep_input_label">'.$label.'</div><input type="file" name="'.$name.'" value="'.$value.'" size="'.$length.'"></div>';
}
function fssc_print_password_input($label, $name, $value, $length) {
	echo '<div id="fsrep_input"><div id="fsrep_input_label">'.$label.'</div><input type="password" name="'.$name.'" value="'.$value.'" size="'.$length.'"></div>';
}
function fssc_print_input($label, $name, $value, $length) {
	echo '<div id="fsrep_input"><div id="fsrep_input_label">'.$label.'</div><input type="text" name="'.$name.'" value="'.$value.'" size="'.$length.'"></div>';
}
function fssc_print_textarea($label, $name, $value, $rows, $cols) {
	echo '<div id="fsrep_input"><div id="fsrep_input_label">'.$label.'</div><textarea name="'.$name.'" rows="'.$rows.'" cols="'.$cols.'">'.$value.'</textarea></div>';
}
function fssc_print_selectbox($label, $name, $selvalue, $options) {
	echo '<div id="fsrep_input"><div id="fsrep_input_label">'.$label.'</div>';
	echo '<select name="'.$name.'">';
	foreach ($options as $key=>$value) {
		$selected = '';
		if ($selvalue == $value) { $selected = 'selected'; }
		echo '<option value="'.$value.'" '.$selected.'>'.$key.'</option>';
	}
	echo '</select>';
	echo '</div>';
}
function fssc_print_admin_file_input($label, $name, $value, $length, $description) {
	echo '<tr><td>'.$label.'</td><td><input type="file" name="'.$name.'" value="'.$value.'" size="'.$length.'"></td><td>'.$description.'</td></tr>';
}
function fssc_print_admin_input($label, $name, $value, $length, $description) {
	echo '<tr><td>'.$label.'</td><td><input type="text" name="'.$name.'" value="'.$value.'" size="'.$length.'"></td><td>'.$description.'</td></tr>';
}
function fssc_print_admin_textarea($label, $name, $value, $cols, $rows, $description) {
	echo '<tr><td>'.$label.'</td><td><textarea name="'.$name.'" cols="'.$cols.'" rows="'.$rows.'">'.$value.'</textarea></td><td>'.$description.'</td></tr>';
}
function fssc_print_admin_selectbox($label, $name, $selvalue, $options, $description) {
	echo '<tr><td>'.$label.'</td>';
	echo '<td><select name="'.$name.'">';
	foreach ($options as $key=>$value) {
		$selected = '';
		if ($selvalue == $value) { $selected = 'selected'; }
		echo '<option value="'.$value.'" '.$selected.'>'.$key.'</option>';
	}
	echo '</select>';
	echo '</td><td style="font-weight: normal;">'.$description.'</td></tr>';
}
function fssc_print_admin_ext($label, $name, $selvalue, $options, $activated, $version) {
	global $fscartconfig;
	$Disabled = '';
	if ($activated == FALSE) { 
		$Disabled = ' disabled="disabled"'; $description = 'This feature is currently disabled. To purchase this extended feature, visit <a href="http://www.firestorminteractive.com/wordpress/ecommerce/" target="_blank" style="color:#999999;">www.firestorminteractive.com/wordpress/ecommerce/</a>.'; 
	} else { 
		if (function_exists(fssc_extension_updatge)) { $description .= fssc_extension_update($name, $version); }	else { $description = 'Version: '.$version; }
		 
	}
	echo '<tr><td>'.$label.'</td>';
	if ($activated == FALSE) {
		echo '<td>&nbsp;</td><td style="font-weight: normal; color: #999999;">'.$description.'</td></tr>';
	} else {
		echo '<td><input type="text" name="'.$name.'L" value="'.$fscartconfig[$name.'L'].'" size="30"></td><td style="font-weight: normal; color: #999999;">'.$description.'</td></tr>';
	}
}
function fssc_products_title() {
	global $wpdb,$pageurl;
	$product = $wpdb->get_row('SELECT * FROM '.$wpdb->prefix.'fssc_products WHERE products_url = "'.$pageurl[1].'"');
	return ' - '.$product->products_name;
}
function fssc_categories_title() {
	global $wpdb,$pageurl;
	$CategoryInfo = $wpdb->get_row('SELECT categories_name FROM '.$wpdb->prefix.'fssc_categories WHERE categories_url = "'.$pageurl[1].'"');
	return ' - '.$CategoryInfo->categories_name;
}
function fssc_url_generator($url) {
	$url = str_replace(" ", "-", $url);
	$url = str_replace("_", "-", $url);
	$special = array('!','@','#','$','%','^','&','*','(',')','_','+','{','}','|','[',']',':',';','<','>','?',',','.','/','`','~','/','!','&','*');
	$url = str_replace(' ',' ',str_replace($special,'',$url));
	$url = str_replace("'", "", $url);
	$url = str_replace('"', '', $url);
	$url = str_replace("--", "-", $url);
	$url = strip_tags($url);
	$url = substr(strtolower($url), 0, 45);
	return $url;
}
function fssc_categories_basic ($parent_id, $level, $id, $value_adder) {
	global $wpdb;
	$level++;
	$Categories = $wpdb->get_results("SELECT parent_id, categories_id, categories_name, categories_order FROM ".$wpdb->prefix."fssc_categories WHERE parent_id = $parent_id ORDER BY categories_order");
	$count = count($Categories);
	if ($count > 0) {
		foreach($Categories as $Categories) {
			$tab = '';
			$selected = '';
			if ($Categories->categories_id == $id) {
				$selected = 'selected';
			}
			for ($i=1; $i<$level; $i++) {
				$tab .= '&nbsp;&nbsp;&nbsp;';
			}
			print '<option value="'.$value_adder.$Categories->categories_id.'" '.$selected.'>'.$previous_id.' '.$tab.$Categories->categories_name.'</option>';
			fssc_categories_basic ($Categories->categories_id, $level, $id, $value_adder);
		}
	}
}
function fssc_categories_basic_a ($parent_id, $level, $id, $value_adder, $CArray) {
	global $wpdb;
	$level++;
	$Categories = $wpdb->get_results("SELECT parent_id, categories_id, categories_name, categories_order FROM ".$wpdb->prefix."fssc_categories WHERE parent_id = $parent_id ORDER BY categories_order");
	$count = count($Categories);
	if ($count > 0) {
		foreach($Categories as $Categories) {
			$AddGateway = array($Categories->categories_name => $Categories->categories_id);
			$CArray = array_merge($CArray, $AddGateway);
			fssc_categories_basic_a ($Categories->categories_id, $level, $id, $value_adder, $CArray);
		}
	}
	return $CArray;
}
function fssc_categories_checkbox ($parent_id, $level, $products_id) {
	global $wpdb;
	$level = $level + 1;
	$Categories = $wpdb->get_results("SELECT parent_id, categories_id, categories_name, categories_order FROM ".$wpdb->prefix."fssc_categories WHERE parent_id = $parent_id ORDER BY categories_order");
	$count = count($Categories);
	if ($count > 0) {
		foreach($Categories as $Categories) {
			$style = '';
			$tab = '';
			$selected = '';
			if ($Categories->parent_id == 0) {
				$style = ' style="font-weight: bold;"';
			}
			$ProductCheck = $wpdb->get_results("SELECT products_id, categories_id FROM ".$wpdb->prefix."fssc_products_to_categories WHERE products_id = $products_id AND categories_id = ".$Categories->categories_id);
			if (count($ProductCheck) > 0) {
				$selected = ' checked';
			}
			for ($i=1; $i<$level; $i++) {
				$tab .= '&nbsp;&nbsp;&nbsp;';
			}
			echo '<p '.$style.'><input type="checkbox" name="'.$Categories->categories_id.'" value="1" '.$selected.'>'.$previous_id.' '.$tab.$Categories->categories_name.'</p>';

			fssc_categories_checkbox ($Categories->categories_id, $level, $products_id);
		}
	}
}
function fssc_flush_rewrite_rules() {
	global $wp_rewrite;
	$wp_rewrite->flush_rules();
}
function fssc_add_rewrite_rules($wp_rewrite) {
	global $wpdb,$wp_rewrite,$FSSCPages;
	$new_rules = array(
											'tickets/(.+)' => 'index.php?page_id=770&TicketPage='.$wp_rewrite->preg_index(1), 
											$FSSCPages['ProductsURL'].'/(.+)' => 'index.php?page_id='.$FSSCPages['Products'].'&ProductPage='.$wp_rewrite->preg_index(1), 
											$FSSCPages['ViewCartURL'].'/(.+)' => 'index.php?page_id='.$FSSCPages['ViewCart'].'&ViewCartPage='.$wp_rewrite->preg_index(1), 
											$FSSCPages['CheckoutURL'].'/(.+)' => 'index.php?page_id='.$FSSCPages['Checkout'].'&CheckoutPage='.$wp_rewrite->preg_index(1), 
											$FSSCPages['BrandURL'].'/(.+)' => 'index.php?page_id='.$FSSCPages['Brand'].'&BrandPage='.$wp_rewrite->preg_index(1), 
											$FSSCPages['FinderURL'].'/(.+)' => 'index.php?page_id='.$FSSCPages['Finder'].'&FinderPage='.$wp_rewrite->preg_index(1), 
											$FSSCPages['MyAccountURL'].'/(.+)' => 'index.php?page_id='.$FSSCPages['MyAccount'].'&AccountPage='.$wp_rewrite->preg_index(1)
										);
	$wp_rewrite->rules = $new_rules + $wp_rewrite->rules;
}
function fssc_grab_category_id() {
	global $wpdb,$pageurl;
	$category_id = $wpdb->get_var("SELECT categories_id FROM ".$wpdb->prefix."fssc_categories WHERE categories_url = '".$pageurl[1]."'");
	return $category_id;
}	
function fssc_imageresizer($source_pic, $destination_pic, $max_width, $max_height) {
	$src = imagecreatefromjpeg($source_pic);
	list($width,$height)=getimagesize($source_pic);
	$x_ratio = $max_width / $width;
	$y_ratio = $max_height / $height;
	if (($width <= $max_width) && ($height <= $max_height)) {
		$tn_width = $width;
		$tn_height = $height;
	} elseif (($x_ratio * $height) < $max_height) {
		$tn_height = ceil($x_ratio * $height);
		$tn_width = $max_width;
	} else {
		$tn_width = ceil($y_ratio * $width);
		$tn_height = $max_height;
	}
	$tmp=imagecreatetruecolor($tn_width,$tn_height);
	imagecopyresampled($tmp,$src,0,0,0,0,$tn_width, $tn_height,$width,$height);
	imagejpeg($tmp,$destination_pic,80);
	imagedestroy($src);
	imagedestroy($tmp);
}
function fssc_category_breadcrumb($CategoryID) {
	global $wpdb,$FSSCPages;
	$mini_nav = "";
	while ($CategoryID != 0) {
		$CategoryInfo = $wpdb->get_row("SELECT parent_id, categories_id, categories_name, categories_url FROM ".$wpdb->prefix."fssc_categories WHERE categories_id = $CategoryID");
		$mini_nav = '<a href="'.get_option('home').'/'.$FSSCPages['ProductsURL'].'/'.$CategoryInfo->categories_url.'/">'.stripslashes($CategoryInfo->categories_name).'</a> '.$mini_nav;
		$CategoryID = $CategoryInfo->parent_id;
		if ($CategoryID != 0) {
			$mini_nav = ' / '.$mini_nav;
		}
	}
	return '<a href="'.get_option('home').'/'.$FSSCPages['ProductsURL'].'/">Products</a> / '.$mini_nav;
}
function fssc_roundUp( $value, $precision=0 ) {
	if ( $precision == 0 ) {
		$precisionFactor = 1;
	}	else {
		$precisionFactor = pow( 10, $precision );
	}
	return ceil( $value * $precisionFactor )/$precisionFactor;
} 
function fssc_random_user_id() { 
	$salt = 'abchefghjkmnpqrstuvwxyz0123456789'; 
	$id = '';
	srand((double)microtime()*1000000); 
	$i = 0; 
	while ($i < 10) { 
		$num = rand() % 33; 
		$tmp = substr($salt, $num, 1); 
		$id = $id . $tmp; 
		$i++; 
	} 
	return $id;
}
function fssc_form_input($label, $name, $value, $size) {
	return "<label for=\"$name\">$label</label><input type=\"text\" id=\"$name\" name=\"$name\" value=\"$value\" size=\"$size\">";
}
function fssc_print_text_box($name, $value, $size) {
	if ($name == 'cardnumber' || $name == 'name_on_card' || $name == 'cardexpm' || $name == 'cardexpy' || $name == 'cvdvalue' || $name == 'customer_email') {
		return "<input type=\"text\" id=\"$name\" name=\"$name\" value=\"$value\" size=\"$size\" class=\"ClickTaleSensitive\">";
	} else {
		return "<input type=\"text\" id=\"$name\" name=\"$name\" value=\"$value\" size=\"$size\">";
	}
}
function fssc_print_select_box($current_value, $value, $option) {
	$selected = "";
	if ($current_value == $value) {
		$selected = "selected";
	}
	return "<option value=\"$value\" $selected>$option</option>";
}
function fssc_cat_prod_count($category_id, $type) {
	global $wpdb;
	$wpdb->query("UPDATE ".$wpdb->prefix."fssc_categories SET categories_product_count = categories_product_count".$type." WHERE categories_id = ".$category_id);
	$CategoryInfo = $wpdb->get_row("SELECT * FROM ".$wpdb->prefix."fssc_categories WHERE categories_id = ".$category_id);
	if ($CategoryInfo->parent_id != 0) {
		fssc_cat_prod_count($CategoryInfo->parent_id, $type);
	}
}
function fssc_get_price($pid) {
	global $wpdb,$fscartconfig,$user_ID,$FSSCExtensions;
	
	if ($FSSCExtensions['UserTypes'] == TRUE) {
		$ProductPrice = fssc_user_type_get_price($pid);
	} elseif ($FSSCExtensions['MultiCurrency'] == TRUE) {
		$ProductPrice = fssc_multicurrency_get_price($pid);
	} else {
		if (substr($pid, 0, 1) == 'v') {
			$ProductPrice = $wpdb->get_var("SELECT variation_price FROM ".$wpdb->prefix."fssc_products_variations WHERE variation_id = ".str_replace('v','',$pid));
		} else {
			$ProductPrice = $wpdb->get_var("SELECT products_price FROM ".$wpdb->prefix."fssc_products WHERE products_id = $pid");
		}
	}
	
	// MEMBER DISCOUNTS
	if ($user_ID) {
		$Discount = $wpdb->get_var("SELECT discount_percent FROM ".$wpdb->prefix."fssc_users_to_discounts WHERE ID = ".$user_ID);
		$Discount = 100 - $Discount;
		$Discount = $Discount / 100;
		$ProductPrice = $Discount * $ProductPrice;
	}
	$ProductPrice = $ProductPrice;
	return $ProductPrice;
}

function fssc_safe_price($Price) {
	if ($Price == '') { $Price = '0.00'; }
	if (substr($Price, -3, 1) == ',') { $Price = substr_replace($Price, '.', -3, 1); }
	$Price = str_replace(',','',$Price);
	$Price = str_replace(' ','',$Price);
	return number_format($Price, 2, '.', '');
}

function fssc_currency_format($Price) {
	global $fscartconfig;
	$Price = $Symbol.number_format($Price, 2, ".", ",");
	if ($fscartconfig['RemoveDecimals'] == 1) {
		if (substr($Price, -3) == '.00') { $Price = str_replace('.00', '', $Price); }
		if (substr($Price, -3) == ',00') { $Price = str_replace(',00', '', $Price); }
	}
	$Price = str_replace(',',$fscartconfig['PriceTSeparator'],$Price);
	$Price = str_replace('.',$fscartconfig['PriceCSeparator'],$Price);
	
	return $Price;
}

// PRODUCT LISTING FUNCTION
// (category_id(TINYINT), featured (TRUE FALSE), search_query(VARCHAR), show_footer_pagination(TRUE FALSE), show_header_pagination(TRUE FALSE))
//function fssc_print_products_listing ($category_id, $brand_id, $new, $featured, $search_query, $fpagination, $hpagination, $CategoryPE) {
function fssc_print_products_listing ($category_id, $value, $type, $fpagination, $hpagination, $CategoryPE) {
	global $fscartconfig,$fscartstyle,$wpdb,$user_ID,$FSSCPages;

//  SPAM CHECK
if (isset($_POST)) { if (fssc_spam_check($_POST) == TRUE) { unset($_POST); } }
if (isset($_GET)) { if (fssc_spam_check($_GET) == TRUE) { unset($_GET); } }

	
	$page_content = '';
	
	// CHEC FOR TEXT VERSION
	$TextOnly = FALSE;
	if (substr($type, -5) == ' Text') {
		$type = substr($type, 0, -5);
		$TextOnly = TRUE;
	}
	
	// PRINT BREADCRUMB
	if ($fscartconfig['CategoryBreadCrumbDisplay'] == "1" && $featured == FALSE && $hpagination == TRUE) {
		$page_content .= '<div id="fs-breadcrumb">'.fssc_category_breadcrumb($category_id).'</div>';
	}
	
	$CategoryURL = $wpdb->get_var("SELECT categories_url FROM ".$wpdb->prefix."fssc_categories WHERE categories_id = ".$category_id);
	$CategoryCustomOrder = $wpdb->get_var("SELECT categories_custom_order FROM ".$wpdb->prefix."fssc_categories WHERE categories_id = ".$category_id);
	
	// PRINT CATEGORY OPTIONS
	$CategoryPS = 0;
	if ($CategoryCustomOrder != '') {
		$_SESSION['CategoryOrder'] = $CategoryCustomOrder;
	} else {
		$_SESSION['CategoryOrder'] = $fscartconfig['DefaultCatOrder'];
	}
	if (isset($_GET['ps'])) {
		$CategoryPS = $_GET['ps'];
	}
	if (isset($_GET['pe'])) {
		$CategoryPE = $_GET['pe'];
	}
	if (isset($_GET['order'])) {
		$_SESSION['CategoryOrder'] = $_GET['order'];
	}
	if ($CategoryURL == 'discontinued') {
		$_SESSION['CategoryOrder'] = 'order';
	}
	$CategoryProductCount = $wpdb->get_var('SELECT COUNT(*) FROM '.$wpdb->prefix.'fssc_products_to_categories, '.$wpdb->prefix.'fssc_products WHERE '.$wpdb->prefix.'fssc_products_to_categories.categories_id = '.$category_id.' AND '.$wpdb->prefix.'fssc_products.products_id = '.$wpdb->prefix.'fssc_products_to_categories.products_id AND '.$wpdb->prefix.'fssc_products.products_visibility = 1'); // CATEGORY PRODUCT COUNT
	if ($hpagination == TRUE && $fscartconfig['ShowPHeaderPagination'] == 1) {
		$page_content .= '<div id="fs-category-options">';
		$page_content .= '<form action="./" method="GET">';
		$page_content .= '<div style="text-align: right; padding-bottom: 6px;">Sort by: <select name="order" onchange="this.form.submit();" style="width: 90px;">';
		$page_content .= '<option value="order" '; if ($_SESSION['CategoryOrder'] == "order") { $page_content .= 'selected'; } $page_content .= '>Popularity</option>';
		$page_content .= '<option value="price" '; if ($_SESSION['CategoryOrder'] == "price") { $page_content .= 'selected'; } $page_content .= '>Price</option>';
		$page_content .= '<option value="name" '; if ($_SESSION['CategoryOrder'] == "name") { $page_content .= 'selected'; } $page_content .= '>Name</option>';
		$page_content .= '<option value="partnumber" '; if ($_SESSION['CategoryOrder'] == "partnumber") { $page_content .= 'selected'; } $page_content .= '>'.$fscartconfig['ProductIdentification'].'</option>';
		$page_content .= '</select></div>';
		$page_content .= '<div id="fs-page-select">Page: <select name="ps" onchange="this.form.submit();" style="width: 90px;">';
		$page_content .= '<option value="0">1</option>';
		$TotalPages = $CategoryProductCount / $CategoryPE;
		$TotalPages = fssc_roundUp( $TotalPages, $precision=0 );
		for ($i=1;$i<$TotalPages;$i++) {
			$select = '';
			if ($CategoryPS == $i * $CategoryPE) {
				$select = 'selected';
			}
			$PageNumber = $i + 1;
			$page_content .= '<option value="'.$i * $CategoryPE.'" '.$select.'>'.$PageNumber.'</option>';
			$Pages = TRUE;
		}
		if ($Pages == FALSE && $TotalPages != 1) {
			$page_content .= '<option value="'. 1 * $CategoryPE.'">1</option>';
		}
		$page_content .= '</select></div> ';
		$page_content .= '<div id="fs-results-per-page"><select name="pe" onchange="this.form.submit();">';
		$page_content .= '<option '; if ($CategoryPE == 10) { $page_content .= 'selected'; } $page_content .= '>10</option>';
		$page_content .= '<option '; if ($CategoryPE == 25) { $page_content .= 'selected'; } $page_content .= '>25</option>';
		$page_content .= '<option '; if ($CategoryPE == 50) { $page_content .= 'selected'; } $page_content .= '>50</option>';
		$page_content .= '<option '; if ($CategoryPE == 100) { $page_content .= 'selected'; } $page_content .= '>100</option>';
		$page_content .= '</select> per page</div>';
		if ($CategoryProductCount != 0) {
			$page_content .= $CategoryProductCount.' Products';
		}
		$page_content .= '&nbsp;</form></div>';
	}

	// PRINT SUBCATEGORIES
	if ($fscartconfig['SubCategoryDisplay'] == "1") {
		$subcategories = $wpdb->get_results('SELECT * FROM '.$wpdb->prefix.'fss_categories WHERE parent_id = '.$category_id.' AND categories_visibility = 1 ORDER BY categories_order');
		foreach ($subcategories as $subcategories) {
			//GET FIRST PRODUCT INFO
			$sql2 = mysql_query("SELECT * FROM ".$wpdb->prefix."fssc_products_to_categories, ".$wpdb->prefix."fssc_products WHERE ".$wpdb->prefix."fssc_products_to_categories.categories_id = ".$categories_info['categories_id']." AND ".$wpdb->prefix."fssc_products.products_id = ".$wpdb->prefix."fssc_products_to_categories.products_id ORDER BY ".$wpdb->prefix."fssc_products_to_categories.products_order LIMIT 1");
			$product_info = mysql_fetch_array($sql2);
			$page_content .= '<div style="float: left; width: 25%; text-align: center;"><a href="'.get_option('home').'/'.$FSSCPages['ProductsURL'].'/'.$subcategories->categories_url.'/"><br />';
			$page_content .= '<img src="'.get_option('home').'/wp-content/uploads/fscart/products/small/'.$product_info['products_id'].'.jpg" border="0" alt="'.$subcategories->categories_name.'">';
			$page_content .= '<h3>'.$subcategories->categories_name.'</h3>';
			$page_content .= '</a></div>';
		}
	}
	
	// CREATE SELECT STATEMENT
	if ($type == 'Brand') {
		$products = $wpdb->get_results("SELECT * FROM ".$wpdb->prefix."fssc_products, ".$wpdb->prefix."fssc_products_to_brands WHERE brand_id = ".$value." AND ".$wpdb->prefix."fssc_products_to_brands.brand_tabs = ".$category_id." AND ".$wpdb->prefix."fssc_products.products_id = ".$wpdb->prefix."fssc_products_to_brands.products_id AND ".$wpdb->prefix."fssc_products.products_visibility = 1 AND ".$wpdb->prefix."fssc_products.products_discontinued = 0 ORDER BY ".$wpdb->prefix."fssc_products.products_views DESC");
	} elseif ($type == 'Brand Disco') {
		$products = $wpdb->get_results("SELECT * FROM ".$wpdb->prefix."fssc_products, ".$wpdb->prefix."fssc_products_to_brands WHERE brand_id = ".$value." AND ".$wpdb->prefix."fssc_products_to_brands.brand_tabs = ".$category_id." AND ".$wpdb->prefix."fssc_products.products_id = ".$wpdb->prefix."fssc_products_to_brands.products_id AND ".$wpdb->prefix."fssc_products.products_visibility = 1 AND ".$wpdb->prefix."fssc_products.products_discontinued = 1 ORDER BY ".$wpdb->prefix."fssc_products.products_views DESC");
	} elseif ($type == 'Top Sellers') {
		$products = $wpdb->get_results('SELECT * FROM '.$wpdb->prefix.'fssc_products WHERE products_visibility = 1 AND products_discontinued = 0 ORDER BY products_purchased DESC LIMIT 5');
	} elseif ($type == 'Most Popular') {
		$products = $wpdb->get_results('SELECT * FROM '.$wpdb->prefix.'fssc_products WHERE products_visibility = 1 AND products_discontinued = 0 ORDER BY products_views DESC LIMIT 5');
	} elseif ($type == 'Featured Products') {
		$products = $wpdb->get_results('SELECT * FROM '.$wpdb->prefix.'fssc_products WHERE products_visibility = 1 AND products_featured = 1');
	} elseif ($type == 'New Products') {
		$products = $wpdb->get_results('SELECT * FROM '.$wpdb->prefix.'fssc_products WHERE products_visibility = 1 AND products_discontinued = 0 ORDER BY products_id DESC LIMIT 5');
	} elseif ($type == 'Accessory Products') {
		$products = $wpdb->get_results('SELECT * FROM '.$wpdb->prefix.'fssc_products_accessories, '.$wpdb->prefix.'fssc_products WHERE '.$wpdb->prefix.'fssc_products_accessories.products_id = '.$value.' AND '.$wpdb->prefix.'fssc_products.products_id = '.$wpdb->prefix.'fssc_products_accessories.accessory_id AND '.$wpdb->prefix.'fssc_products.products_visibility = 1 ORDER BY '.$wpdb->prefix.'fssc_products.products_name');
	} elseif ($type == 'Related Products') {
		$products = $wpdb->get_results('SELECT * FROM '.$wpdb->prefix.'fssc_products_related, '.$wpdb->prefix.'fssc_products WHERE '.$wpdb->prefix.'fssc_products_related.products_id = '.$value.' AND '.$wpdb->prefix.'fssc_products.products_id = '.$wpdb->prefix.'fssc_products_related.related_id AND '.$wpdb->prefix.'fssc_products.products_visibility = 1 ORDER BY '.$wpdb->prefix.'fssc_products.products_name');
	} elseif ($type == 'Search') {
		$products = $wpdb->get_results("SELECT * FROM ".$wpdb->prefix."fssc_products WHERE (products_part_number LIKE '%".$value."%' OR products_name LIKE '%".$value."%' OR products_description LIKE '%".$value."%') AND products_visibility = 1 ORDER BY ".$wpdb->prefix."fssc_products.products_discontinued, ".$wpdb->prefix."fssc_products.products_views DESC");
	} elseif ($type == 'Finder' || $type == 'FinderH' || $type == 'FinderA') {
		$products = $wpdb->get_results($value);
	} elseif ($type == 'FinderAC') {
		$products = $wpdb->get_results($value);
	} else {
		// FIGURE OUT ORDER
		if ($user_ID) {
			$UserType = $wpdb->get_var("SELECT fssc_users_type FROM ".$wpdb->prefix."users WHERE ID = ".$user_ID);
		} else {
			$UserType = '-1';
		}
		if ($_SESSION['CategoryOrder'] == 'price') {
			$CategoryOrder = $wpdb->prefix.'fssc_products_pricing.products_price';
			$products = $wpdb->get_results('SELECT * FROM '.$wpdb->prefix.'fssc_products, '.$wpdb->prefix.'fssc_products_to_categories, '.$wpdb->prefix.'fssc_products_pricing WHERE '.$wpdb->prefix.'fssc_products_to_categories.categories_id = '.$category_id.' AND '.$wpdb->prefix.'fssc_products.products_id = '.$wpdb->prefix.'fssc_products_to_categories.products_id AND '.$wpdb->prefix.'fssc_products.products_visibility = 1 AND '.$wpdb->prefix.'fssc_products.products_discontinued != 1 AND '.$wpdb->prefix.'fssc_products_pricing.products_id = '.$wpdb->prefix.'fssc_products.products_id AND '.$wpdb->prefix.'fssc_products_pricing.user_type_id = "'.$UserType.'" AND '.$wpdb->prefix.'fssc_products_pricing.currency_id = '.$_SESSION['currency'].' ORDER BY '.$CategoryOrder.' LIMIT '.$CategoryPS.', '.$CategoryPE);
		} else {
			if ($_SESSION['CategoryOrder'] == 'partnumber') {
				$CategoryOrder = $wpdb->prefix.'fssc_products.products_part_number';
			} elseif ($_SESSION['CategoryOrder'] == 'name') {
				$CategoryOrder = $wpdb->prefix.'fssc_products.products_name';
			} elseif ($_SESSION['CategoryOrder'] == 'order') {
				$CategoryOrder = $wpdb->prefix.'fssc_products.products_discontinued, '.$wpdb->prefix.'fssc_products_to_categories.products_order';
			} elseif ($_SESSION['CategoryOrder'] == 'purchases') {
				$CategoryOrder = $wpdb->prefix.'fssc_products.products_purchased DESC';
			} elseif ($_SESSION['CategoryOrder'] == 'views') {
				$CategoryOrder = $wpdb->prefix.'fssc_products.products_views DESC';
			} elseif ($_SESSION['CategoryOrder'] == 'addtocarts') {
				$CategoryOrder = $wpdb->prefix.'fssc_products.products_add_to_carts DESC';
			}
			$products = $wpdb->get_results('SELECT * FROM '.$wpdb->prefix.'fssc_products, '.$wpdb->prefix.'fssc_products_to_categories WHERE '.$wpdb->prefix.'fssc_products_to_categories.categories_id = '.$category_id.' AND '.$wpdb->prefix.'fssc_products.products_id = '.$wpdb->prefix.'fssc_products_to_categories.products_id AND '.$wpdb->prefix.'fssc_products.products_visibility = 1 ORDER BY '.$CategoryOrder.' LIMIT '.$CategoryPS.', '.$CategoryPE);
		}
	}
	
	
	// GET LISTING TEMPLATE
	$ListingTemplate = 'themes/'.$fscartconfig['Theme'].'/listings-'.$fscartconfig['ListingsTemplate'];
	if ($type == 'Finder') {
		$ListingTemplate = 'extensions/template-finder';
	} elseif ($type == 'FinderA') {
		$ListingTemplate = 'extensions/template-findera';
	} elseif ($type == 'FinderAC') {
		$ListingTemplate = 'extensions/template-findera';
	} elseif ($type == 'Top Sellers') {
		$ListingTemplate = 'themes/'.$fscartconfig['Theme'].'/listings-'.$fscartconfig['TopSellersTemplate'];
	} elseif ($type == 'Most Popular') {
		$ListingTemplate = 'themes/'.$fscartconfig['Theme'].'/listings-'.$fscartconfig['MostPopularTemplate'];
	} elseif ($type == 'Featured Products') {
		$ListingTemplate = 'themes/'.$fscartconfig['Theme'].'/listings-'.$fscartconfig['FeaturedProductTemplate'];
	} elseif ($type == 'New Products') {
		$ListingTemplate = 'themes/'.$fscartconfig['Theme'].'/listings-'.$fscartconfig['NewProductsTemplate'];
	} elseif ($type == 'FinderH') {
		$ListingTemplate = 'themes/'.$fscartconfig['Theme'].'/listings-'.$fscartconfig['ProductFinderHTemplate'];
	}

	if ($TextOnly == TRUE) {
		$ListingTemplate .= '-text';
	}
	
	// DISPLAY LISTING TEMPLATE
	include($ListingTemplate.'.php');
	
	// Print Page Links
	if (!$_SESSION['CategoryOrder']) {
		$_SESSION['CategoryOrder'] = 'order';
	}
	if (isset($_GET['order'])) {
		$_SESSION['CategoryOrder'] = $_GET['order'];
	}
	$category_url = $wpdb->get_var("SELECT categories_url FROM ".$wpdb->prefix."fssc_categories WHERE categories_id = '".$category_id."'");
	$CurrentURL = get_option('home').'/'.$FSSCPages['ProductsURL'].'/'.$category_url.'/';

	if ($fpagination == TRUE && $fscartconfig['ShowFHeaderPagination'] == 1) {
		$page_content .= '<div id="fs-page-numbers"><a href="'.$CurrentURL.'">1</a>';
		for ($i=1;$i<$TotalPages;$i++) {
			$PageNumber = $i + 1;
			$PS = $i * $CategoryPE;
			$page_content .= ' | <a href="'.$CurrentURL.'?order='.$_SESSION['CategoryOrder'].'&ps='.$PS.'&pe='.$CategoryPE.'">'.$PageNumber.'</a>';
		}
		$page_content .= '</div>';
	}

	if (count($products) == 0) {
		$page_content .= '<br />No products found.<br/>';
	}
	
	// return $post->ID;
	return $page_content;
} 

function fssc_add_to_cart($ProductID) {
	global $wpdb,$_SESSION,$user_ID,$fscartconfig;
	
	$ProductVariationID = 0;
	
	if (!$user_ID) {
	$current_user = wp_get_current_user();
	$user_ID = $current_user->ID;
	}
	
	if (substr($ProductID, 0, 1) == 'v') {
		$ProductVariationID = str_replace('v','',$ProductID);
		$VariationInfo = $wpdb->get_row("SELECT * FROM ".$wpdb->prefix."fssc_products_variations WHERE variation_id = $ProductVariationID");
		$ProductID = $VariationInfo->products_id;
		$ProductInfo = $wpdb->get_row("SELECT * FROM ".$wpdb->prefix."fssc_products WHERE products_id = $ProductID");
		$ProductPrice = fssc_get_price('v'.$ProductVariationID);
	} else {
		$ProductInfo = $wpdb->get_row("SELECT * FROM ".$wpdb->prefix."fssc_products WHERE products_id = $ProductID");
		$ProductPrice = fssc_get_price($ProductID);
	}
	

	if ($user_ID == -1) {
		$InstantRebate = $wpdb->get_var("SELECT products_instant_rebate FROM ".$wpdb->prefix."fssc_products_pricing WHERE products_id = $ProductID AND user_type_id = -1 AND currency_id = ".$_SESSION['currency']);		
		if ($InstantRebate != '' && $InstantRebate != ' ' && $InstantRebate != '0' && $InstantRebate != '0.00') {
			$ProductPrice = $ProductPrice - $InstantRebate;
		}
	}
	
	if ($ProductPrice != 0.00) {
		$ProductCount = $wpdb->get_row("SELECT * FROM ".$wpdb->prefix."fssc_users_basket WHERE fixed_quantity = 0 AND users_code = '".$_SESSION['users_code']."' AND products_id = $ProductID");
		if ($ProductCount) {
			$ProductCount->products_quantity++;
			$wpdb->query("UPDATE ".$wpdb->prefix."fssc_users_basket SET products_quantity = '".$ProductCount->products_quantity."' WHERE users_code = '".$_SESSION['users_code']."' AND products_id = $ProductID");
		} else {
			$DistributorInfo = $wpdb->get_row("SELECT * FROM ".$wpdb->prefix."fssc_products_to_distr WHERE products_id = $ProductID AND distributor_currency = '".$_SESSION['currencycode']."' ORDER BY distributor_price LIMIT 1");
			if ($fscartconfig['Currency'] == '3' || $fscartconfig['Currency'] == '4') { $ProductPrice = str_replace(',','.',str_replace('.','',$ProductPrice)); }
			if (count($DistributorInfo) > 0) {
				$wpdb->query("INSERT INTO ".$wpdb->prefix."fssc_users_basket (fixed_quantity, users_id, users_code, products_id, variation_id, products_quantity, products_price, last_updated, products_free_shipping, products_electronic_download, distributor_price, distributor_id) 
											VALUES (0, 0, '".$_SESSION['users_code']."', $ProductID, ".$ProductVariationID.", 1, '".str_replace(',','',$ProductPrice)."', NOW(), ".$ProductInfo->products_free_shipping.", '".$ProductInfo->products_electronic_download."', ".$DistributorInfo->distributor_price.", ".$DistributorInfo->distributor_id.")");
			} else {
				$wpdb->query("INSERT INTO ".$wpdb->prefix."fssc_users_basket (fixed_quantity, users_id, users_code, products_id, variation_id, products_quantity, products_price, last_updated, products_free_shipping, products_electronic_download) 
											VALUES (0, 0, '".$_SESSION['users_code']."', $ProductID, ".$ProductVariationID.", 1, '".str_replace(',','',$ProductPrice)."', NOW(), ".$ProductInfo->products_free_shipping.", '".$ProductInfo->products_electronic_download."')");
			}
			$wpdb->query("UPDATE ".$wpdb->prefix."fssc_products SET products_addtocarts = products_addtocarts + 1 WHERE products_id = $ProductID");
		}
	}
	
	if (function_exists(fssc_auto_accessory)) { fssc_auto_accessory($ProductID); }
}

function fssc_remove_from_cart($ID) {
	global $wpdb;
	$wpdb->query("DELETE FROM ".$wpdb->prefix."fssc_users_basket WHERE basket_id = $ID");
	$wpdb->query("DELETE FROM ".$wpdb->prefix."fssc_users_basket WHERE parent_basket_id = $ID");
}

function fssc_digital_download($ProductID) {
	global $wpdb,$_SESSION,$user_ID,$fscartconfig,$FSSCExtensions;
	$ProductDetails = $wpdb->get_row("SELECT * FROM ".$wpdb->prefix."fssc_products WHERE products_id = $ProductID"); 
	if ($ProductDetails->products_electronic_download != '') { if (file_exists(ABSPATH."wp-content/uploads/fscart/".$fscartconfig['DigitalDownloadDirectory']."/".$ProductDetails->products_electronic_download)) { 
		$Download = TRUE;
		if (!$user_ID) {
		$current_user = wp_get_current_user();
		$user_ID = $current_user->ID;
		}
		if ($ProductDetails->products_download_button != 2) {
			if ($wpdb->get_var("SELECT COUNT(*) FROM ".$wpdb->prefix."fssc_downloads WHERE user_id = $user_ID AND products_id = $ProductID") == 0) {
				$Download = FALSE;
				$ErrorMessage = 'Restricted Access.';
			}
		}
		$UserType = '';
		if ($FSSCExtensions['UserTypes'] == TRUE) { 
			$UserType = $wpdb->get_var("SELECT fssc_users_type FROM ".$wpdb->prefix."users WHERE ID = ".$user_ID);
			if ($ProductDetails->products_download_user_types != '') {
				$UserTypes = explode(',', $ProductDetails->products_download_user_types);
				if (!in_array($UserType, $UserTypes)) {
					$Download = FALSE;
					$ErrorMessage = 'Restricted Access.';
				}
			}
		}
		if ($ProductDetails->products_download_limit != 0) {
			if ($wpdb->get_var("SELECT COUNT(*) FROM ".$wpdb->prefix."fssc_downloads_history WHERE user_id = $user_ID AND products_id = $ProductID") >= $ProductDetails->products_download_limit) {
				$Download = FALSE;
				$ErrorMessage = 'Download Limit Reached';
			}
		}
		if ($Download == TRUE) {
			$wpdb->query("INSERT INTO ".$wpdb->prefix."fssc_downloads_history (products_id, user_id, user_type, user_ip, download_version, download_date) VALUES ($ProductID, $user_ID, $UserType, '".$_SERVER['REMOTE_ADDR']."', '".$ProductDetails->products_download_version."', NOW())");
			$DownloadPath = ABSPATH."wp-content/uploads/fscart/".$fscartconfig['DigitalDownloadDirectory']."/".$ProductDetails->products_electronic_download;
			header("Pragma: public");
			header("Expires: 0");
			header("Cache-Control: must-revalidate, post-check=0, pre-check=0");
			header("Cache-Control: public");
			header("Content-Description: File Transfer");
			header("Content-Type: application/octet-stream");
			header("Content-Length: ".(string)(filesize($DownloadPath)));
			header('Content-Disposition: attachment; filename="'.basename($DownloadPath).'"');
			header("Content-Transfer-Encoding: binary\n");
			readfile($DownloadPath);
			return 'Success';
			exit();
		} else {
			return $ErrorMessage;
		}
		
	} }
}

function fssc_checkout() {
	global $wpdb, $fscartconfig, $PageStatus, $user_ID, $current_user, $_POST, $_GET;

//  SPAM CHECK
if (isset($_POST)) { if (fssc_spam_check($_POST) == TRUE) { unset($_POST); } }
if (isset($_GET)) { if (fssc_spam_check($_GET) == TRUE) { unset($_GET); } }

	$current_user = wp_get_current_user();
	get_currentuserinfo();
	
	if (isset($_POST['customer_first_name'])) {
		$error = "";
		if ($_POST['customer_first_name'] == "" || $_POST['customer_last_name'] == "" || $_POST['customer_email'] == "" || $_POST['customer_phone'] == "" || $_POST['customer_address1'] == "" || $_POST['customer_city'] == "" || $_POST['customer_province'] == "" || $_POST['customer_zip'] == "" || $_POST['customer_country'] == "") {
			$error .= "Please fill in all required billing details.<br />";
		}
		if ($_POST['customer_first_name'] == "0" || $_POST['customer_last_name'] == "0") {
			$error .= "Please enter a valid first and last name.<br />";
		}
		if ($_POST['order_shipping_address'] == 'different-address') {
			if ($_POST['customer_ship_first_name'] == "" || $_POST['customer_ship_last_name'] == "" || $_POST['customer_ship_phone'] == "" || $_POST['customer_ship_address1'] == "" || $_POST['customer_ship_city'] == "" || $_POST['customer_ship_stateprov'] == "" || $_POST['customer_ship_zippostal'] == "" || $_POST['customer_ship_country'] == "") {
				$error .= "Please fill in all required shipping details.<br />";
			}
		}
		//if ($_SESSION['shipping'] == 'UPS') {
		//	$error .= '<a href="'.get_option('home').'/'.$FSSCPages['ViewCartURL'].'/">Please go back to your shopping cart to provide us with your Zip or Postal Code to calculate the shipping cost.</a>';
		//}
		if ($_POST['payment-method'] != "payment-admintest") {
			if ($fscartconfig['PaymentEnableCreditCard'] == "1") {
				if ($_POST['cardnumber'] == '' || $_POST['name_on_card'] == '') {
					$error .= "Please fill in your credit card details.<br />";
				}
			}
		}	
		if (isset($_SESSION['customer_zippostal']) && $fscartconfig['Shipping Type'] == 'FedEx') {
			if ($_POST['order_shipping_address'] == 'my-billing-address') {
				$_POST['customer_zip'] = preg_replace("/[^A-Za-z0-9]/","",$_POST['customer_zip']);
				$_POST['customer_zip'] = str_replace('"','',$_POST['customer_zip']);
				$_POST['customer_zip'] = str_replace("'","",$_POST['customer_zip']);
				$_POST['customer_zip'] = str_replace(" "," ",$_POST['customer_zip']);
				$_POST['customer_zip'] = strtoupper($_POST['customer_zip']);
				if ($_SESSION['customer_zippostal'] != $_POST['customer_zip']) {
					$error .= "The zip/postal code entered does not match the shipping zip/postal code entered on the view cart page.<br />";
				}
			}
		}
	
		if ($user_ID) {
			$UserType = '';
			$UserRequirements = new stdClass();
			if (function_exists(fssc_user_type_name)) { $UserType = fssc_user_type_name($user_ID); }	
			$UserRequirements->user_type_req_tax_id = 0; $UserRequirements->user_type_req_resale_cert = 0;
			if (function_exists(fssc_get_user_type_info)) { $UserRequirements = fssc_get_user_type_info($user_ID); }		
			if ($UserRequirements->user_type_req_tax_id == 1 && $_POST['customer_taxid'] == '') {
				$error .= "Please fill in your Tax ID Number.<br />";
			}
			if ($UserRequirements->user_type_req_resale_cert == 1 && $_POST['customer_resalecert'] == '') {
				$error .= "Please fill in your Resale Certificate details.<br />";
			}
		}
		$_SESSION['order_error'] = $error;
		
		if ($_SESSION['order_error'] == "") {	
			$OverviewCountry = $wpdb->get_var("SELECT country_name FROM ".$wpdb->prefix."fssc_countries WHERE country_id = '".$_POST['customer_country']."'");
			$SOverviewCountry = $wpdb->get_var("SELECT country_name FROM ".$wpdb->prefix."fssc_countries WHERE country_id = '".$_POST['customer_ship_country']."'");
			$DBShipTo = 0;
			
			// ADD ORDER TO DB
			$orders_overview = "";
			$orders_overview .= "
			<strong>Order Number:</strong> ".$fscartconfig['OrderNumber']." <br />
			<br />
			<strong>Billing Details:</strong> <br />
			".$_POST['customer_first_name']." ".$_POST['customer_last_name']." <br />";
			if ($_POST['customer_company'] != '') {
			$orders_overview .= $_POST['customer_company']." <br />";
			}
			$orders_overview .= $_POST['customer_address1']." ".$_POST['customer_address2']." <br />
			".$_POST['customer_city']." ".$_POST['customer_province']." <br />
			".$_POST['customer_zip']." ".$OverviewCountry." <br />";
			if ($_POST['customer_taxid'] != '') {
			$orders_overview .= "Tax ID: ".$_POST['customer_taxid']." <br />";
			}
			if ($_POST['customer_resalecert'] != '') {
			$orders_overview .= "Resale Certificate: ".$_POST['customer_resalecert']." <br />";
			}
			$orders_overview .= $_POST['customer_phone']." <br />
			".$_POST['customer_email']." <br />
			<br />
			<strong>Ship To:</strong> ";
			if ($_POST['order_shipping_address'] == 'different-address') {
			$DBShipTo = 1;
			$orders_overview .= "<br /> ".$_POST['customer_ship_first_name']." ".$_POST['customer_ship_last_name']." <br />";
			if ($_POST['customer_ship_company'] != '') {
			$orders_overview .= $_POST['customer_ship_company']." <br />";
			}
			$orders_overview .= $_POST['customer_ship_address1']." ".$_POST['customer_ship_address2']." <br />
			".$_POST['customer_ship_city']."  ".$_POST['customer_ship_stateprov']." <br />
			".$_POST['customer_ship_zippostal']." ".$SOverviewCountry." <br />
			<br />
			<strong>Shipping Contact Details:</strong><br />
			".$_POST['customer_ship_phone']." <br /><br /><br />";
			} else {
			$orders_overview .= " My Billing Address <br /><br /><br />";
			}
			if ($_POST['additional_comments'] != '') {
			$orders_overview .= "<strong>Additional Comments</strong><br />
			".$_POST['additional_comments']." <br /><br />";
			}
	
			$orders_overview .= '<strong>Products</strong><br /><table width="100%" border="0" cellspacing="0" cellpadding="0">';
			$CartProducts = $wpdb->get_results("SELECT * FROM ".$wpdb->prefix."fssc_users_basket WHERE users_code = '".$_SESSION['users_code']."'");
			$count = 0;
			$UserTypeID = '-2';
			if ($user_ID) {
				if (function_exists(fssc_get_user_type)) { $UserTypeID = fssc_get_user_type($user_ID); }	
			}
			$AllProductPromo = FALSE;
			if ($wpdb->get_var("SELECT COUNT(*) FROM ".$wpdb->prefix."fssc_promo_two WHERE products_id = 0 AND user_type_id = ".$UserTypeID) > 0) {
				$AllProductPromo = TRUE;
				$AllProductPromoDetails = $wpdb->get_row("SELECT * FROM ".$wpdb->prefix."fssc_promo_two WHERE products_id =0 AND user_type_id = ".$UserTypeID);
				$AllProductPromoTotal = $AllProductPromoDetails->products_count;
			}
			$DBProducts = '';
			$DBCoupon = '';
			$DigitalDownload = FALSE;
			$DownloadIDs = '';
			foreach ($CartProducts as $CartProducts) {
				$subtotal = $CartProducts->products_quantity * $CartProducts->products_price;			
				$negative = '';
				
				// PRINT PRODUCT INFO
				if ($CartProducts->products_id != 0) {
					$num_of_products = $num_of_products + $CartProducts->products_quantity;
					$ProductDetails = $wpdb->get_row("SELECT * FROM ".$wpdb->prefix."fssc_products WHERE products_id = ".$CartProducts->products_id);
					$orders_overview .= '<tr><td valign="top">';
					$orders_overview .= $ProductDetails->products_name;
					if ($CartProducts->variation_id != 0) {
						$VariationInfo = $wpdb->get_row("SELECT * FROM ".$wpdb->prefix."fssc_products_variations WHERE variation_id = ".$CartProducts->variation_id);
						$orders_overview .= '<br />Variation: '.$VariationInfo->variation_name;
					}
					$orders_overview .= '</td>';
					// WEIGHT
					$ShipmentWeight = $ShipmentWeight + $ProductDetails->products_weight * $CartProducts->products_quantity;
					$DBProducts .= $ProductDetails->products_name.'	'.$CartProducts->products_quantity.'	'.$CartProducts->products_price.','."\n";
				} elseif($CartProducts->coupon_id != 0) {
					$CouponDetails = $wpdb->get_row("SELECT * FROM ".$wpdb->prefix."fssc_coupons WHERE coupon_id = ".$CartProducts->coupon_id);
					$orders_overview .= '<tr><td valign="top">Coupon Code: '.$CouponDetails->coupon_code.' ('.$_SESSION['currency_symbol'].$CouponDetails->coupon_value.' Off)</td>';
					$negative = '-';
					$DBCoupon .= 'Coupon Code: '.$CouponDetails->coupon_code.' ('.$_SESSION['currency_symbol'].$CouponDetails->coupon_value.' Off)	1	-'.$CouponDetails->coupon_value."\n";
				}
	
				// CHECK FOR DIGITAL DOWNLOAD
				if ($ProductDetails->products_electronic_download != '' || $ProductDetails->products_electronic_download_ext != '') {
					$DigitalDownload = TRUE;
					$DownloadIDs .= $ProductDetails->products_id.',';
				}
	
				// CHECK FOR PROMOTIONS
				if ($AllProductPromo == TRUE) {
					$AllProductPromoTotal = $AllProductPromoTotal - $CartProducts->products_quantity;
					if ($AllProductPromoTotal <= 0) {
						if ($AllProductPromoDetails->discount_type == 'Fixed') {
							$subtotal = $subtotal - $AllProductPromoDetails->discount_value;
						} else {
							$SubtotalChange = $AllProductPromoDetails->discount_value / 100;
							$presubtotal = $CartProducts->products_price * $SubtotalChange;
							$subtotal = $subtotal - $presubtotal;
						}
						$AllProductPromo = FALSE;
					}
				} elseif ($wpdb->get_var("SELECT COUNT(*) FROM ".$wpdb->prefix."fssc_promo_two WHERE products_id = ".$CartProducts->products_id." AND user_type_id = ".$UserTypeID) > 0) {
					$PromoDetails = $wpdb->get_row("SELECT * FROM ".$wpdb->prefix."fssc_promo_two WHERE products_id = ".$CartProducts->products_id." AND user_type_id = ".$UserTypeID);
					if ($CartProducts->products_quantity >= $PromoDetails->products_count) {
						if ($PromoDetails->discount_type == 'Fixed') {
							$subtotal = $subtotal - $PromoDetails->discount_value;
						} else {
							$SubtotalChange = $PromoDetails->discount_value / 100;
							$presubtotal = $CartProducts->products_price * $SubtotalChange;
							$subtotal = $subtotal - $presubtotal;
						}
					}
				}		
	
				$subtotal2 = $CartProducts->products_quantity * $CartProducts->products_price;
				$total = $total + $subtotal;
				$orders_overview .= '<td width="100" valign="top">'.$negative;
				if ($CartProducts->products_price_option != '') {
					$orders_overview .= $CartProducts->products_price_option;
				}
				if ($subtotal != $subtotal2) {
					$orders_overview .= $_SESSION['currency_symbol'].fssc_currency_format($subtotal);
				} else {
					$orders_overview .= $_SESSION['currency_symbol'].$CartProducts->products_price.'</td>';
				}
				$orders_overview .= '<td width="50" valign="top">'.$CartProducts->products_quantity."</td>";
				$orders_overview .= '<td width="100" valign="top">'.$negative.$_SESSION['currency_symbol'].fssc_currency_format($subtotal)."</td></tr>";
			}
			$DBProducts .= $DBCoupon = '';
	
	
			$orders_overview .= '</table><br />';
			$orders_overview .= 'Subtotal '.$_SESSION['currency_symbol'].fssc_currency_format($_SESSION['subtotal']).' '.$CurrencyCode.'<br/>';
			$orders_overview .= 'Shipping '.$_SESSION['currency_symbol'].fssc_currency_format($_SESSION['shipping']).' '.$CurrencyCode;
			if ($_SESSION['shippingservicename']) {
				$orders_overview .= ' ('.$_SESSION['shippingservicename'].')';
			} else {
				$orders_overview .= '<br />';
			}
			$orders_overview .= '<br />';
			if ($_SESSION['DBTaxes'] != '') {
				$OverviewTaxes = explode("\n",$_SESSION['DBTaxes']);
				$TaxCount = count($OverviewTaxes);
				for ($i=0;$i<=$TaxCount;$i++) {
					$TaxLine = explode('	',$OverviewTaxes[$i]);
					if ($TaxLine[0] != '' && $TaxLine[1] != '') { $orders_overview .= $TaxLine[0].' '.$_SESSION['currency_symbol'].$TaxLine[1].'<br />'; }
				}
			}
			$total = $total + $_SESSION['shipping'];
			$orders_overview .= 'Final Price '.$_SESSION['currency_symbol'].fssc_currency_format($_SESSION['finalprice']).' '.$CurrencyCode;
			$wpdb->query("INSERT INTO ".$wpdb->prefix."fssc_orders (
																																		users_id, 
																																		users_code, 
																																		customer_name,  
																																		customer_first_name, 
																																		customer_last_name, 
																																		customer_company, 
																																		customer_address1, 
																																		customer_address2, 
																																		customer_city, 
																																		customer_stateprov, 
																																		customer_zippostal, 
																																		customer_phone, 
																																		customer_email, 
																																		customer_country, 
																																		customer_website, 
																																		shipping_first_name, 
																																		shipping_last_name, 
																																		shipping_company, 
																																		shipping_address1, 
																																		shipping_address2, 
																																		shipping_city, 
																																		shipping_stateprov, 
																																		shipping_zippostal, 
																																		shipping_phone, 
																																		shipping_different, 
																																		customer_special_instructions, 
																																		shipping_cost, 
																																		shipping_type, 
																																		orders_taxes, 
																																		orders_total, 
																																		orders_products, 
																																		orders_finalprice, 
																																		orders_overview, 
																																		orders_last_modified, 
																																		orders_date_added, 
																																		customer_ip
																																		) VALUES (
																																		'".$current_user->ID."', 
																																		'".$_SESSION['users_code']."', 
																																		'".$_POST['customer_first_name']." ".$_POST['customer_last_name']."', 
																																		'".$_POST['customer_first_name']."', 
																																		'".$_POST['customer_last_name']."', 
																																		'".$_POST['customer_company']."', 
																																		'".$_POST['customer_address1']."', 
																																		'".$_POST['customer_address2']."', 
																																		'".$_POST['customer_city']."', 
																																		'".$_POST['customer_province']."', 
																																		'".$_POST['customer_zip']."', 
																																		'".$_POST['customer_phone']."', 
																																		'".$_POST['customer_email']."', 
																																		'".$OverviewCountry."', 
																																		'".$_POST['customer_website']."', 
																																		'".$_POST['customer_ship_first_name']."', 
																																		'".$_POST['customer_ship_last_name']."', 
																																		'".$_POST['customer_ship_company']."', 
																																		'".$_POST['customer_ship_address1']."', 
																																		'".$_POST['customer_ship_address2']."', 
																																		'".$_POST['customer_ship_city']."', 
																																		'".$_POST['customer_ship_stateprov']."', 
																																		'".$_POST['customer_ship_zippostal']."',  
																																		'".$_POST['customer_ship_phone']."', 
																																		'".$DBShipTo."', 
																																		'".addslashes($_POST['additional_comments'])."',  
																																		'".$_SESSION['shipping']."',  
																																		'".$_SESSION['shippingservicename']."',  
																																		'".$_SESSION['DBTaxes']."',  
																																		'".$_SESSION['finalprice']."', 
																																		'".$DBProducts."',  
																																		'".$_SESSION['finalprice']."', 
																																		'$orders_overview', 
																																		NOW(), 
																																		NOW(), 
																																		'".$_SERVER['REMOTE_ADDR']."'
																																		)");
			$OrderID = $wpdb->get_var("SELECT orders_id FROM ".$wpdb->prefix."fssc_orders ORDER BY orders_id DESC LIMIT 1");
			$_SESSION['invoice_number'] = $OrderID;
			$_SESSION['payment_method'] = $_POST['payment-method'];
			if ($_POST['cardnumber'] != '') { $_SESSION['secure_cc'] = substr($_POST['cardnumber'], 0, 6).'XXXXXX'.substr($_POST['cardnumber'], -4); }
			$_SESSION['order_POST'] = $_POST;
		}
	}

	if (isset($_SESSION['invoice_number'])) {		
		$BlogName = $wpdb->get_var("SELECT option_value FROM ".$wpdb->prefix."options WHERE option_name = 'blogname'");
		$FSSCOrderSuccess = FALSE;
		$FSSCOrderError = '';
		$nvpArray["AVSADDR"] = '';
		$nvpArray["AVSZIP"] = '';
		$nvpArray["PROCAVS"] = '';
		$nvpArray["CVV2MATCH"] = '';

		if ($current_user->user_level == 10 && $_SESSION['payment_method'] == 'payment-admintest') {
			$FSSCOrderSuccess = TRUE;
			$nvpArray["AVSADDR"] = '';
			$nvpArray["AVSZIP"] = '';
			$nvpArray["PROCAVS"] = '';
			$nvpArray["CVV2MATCH"] = '';
			$_SESSION['order_POST']['cardnumber'] = '';
		} elseif ($fscartconfig['PaymentEnableCreditCard'] == 1 && $_SESSION['payment_method'] == 'payment-creditcard') {
			if ($fscartconfig['PaymentGateway'] != '') { if (file_exists(ABSPATH.'wp-content/plugins/fs-shopping-cart/gateways/'.$fscartconfig['PaymentGateway'].'/'.$fscartconfig['PaymentGateway'].'.php')) { include(ABSPATH.'wp-content/plugins/fs-shopping-cart/gateways/'.$fscartconfig['PaymentGateway'].'/'.$fscartconfig['PaymentGateway'].'.php'); } }
		} elseif (isset($_GET['PayerID']) && isset($_GET['token']) && $fscartconfig['EnablePayPalExpress'] == TRUE && $_SESSION['payment_method'] == 'payment-paypal') {
			include(ABSPATH.'wp-content/plugins/fs-shopping-cart/gateways/paypalexpress.php');	
			$FSSCPayPalExpressResponse = fssc_DoExpressCheckoutPayment();
			if ($FSSCPayPalExpressResponse == 'SUCCESS') { 
				$FSSCOrderSuccess = TRUE;
				$nvpArray["AVSADDR"] = '';
				$nvpArray["AVSZIP"] = '';
				$nvpArray["PROCAVS"] = '';
				$nvpArray["CVV2MATCH"] = '';
				$_SESSION['order_POST']['cardnumber'] = '';
			} else {
				$FSSCOrderError = $FSSCPayPalExpressResponse;
			}
		} elseif ($fscartconfig['EnablePayPalExpress'] == TRUE && $_SESSION['payment_method'] == 'payment-paypal') {
			include(ABSPATH.'wp-content/plugins/fs-shopping-cart/gateways/paypalexpress.php');	
			fssc_SetExpressCheckout();
		} elseif ($fscartconfig['PaymentEnableEmailOrder'] == 1 && $_SESSION['payment_method'] == 'payment-email') {
			$FSSCOrderSuccess = TRUE;
			$nvpArray["AVSADDR"] = '';
			$nvpArray["AVSZIP"] = '';
			$nvpArray["PROCAVS"] = '';
			$nvpArray["CVV2MATCH"] = '';
			$_SESSION['order_POST']['cardnumber'] = '';
			include('gateways/emailorder.php');			
		}

		if ($FSSCOrderSuccess == TRUE) {
			$admin_orders_overview = '';
			if (isset($nvpArray)) {
				if ($nvpArray["AVSADDR"] != '') { $admin_orders_overview .= '<strong>AVS Address:</strong> '.$nvpArray["AVSADDR"].'<br />'; }
				if ($nvpArray["AVSZIP"] != '') { $admin_orders_overview .= '<strong>AVS Zip/Postal:</strong> '.$nvpArray["AVSZIP"].'<br />'; }
				if ($nvpArray["PROCAVS"] != '') { $admin_orders_overview .= '<strong>Pro AVS:</strong> '.$nvpArray["PROCAVS"].'<br />'; }
				if ($nvpArray["CVV2MATCH"] != '') { $admin_orders_overview .= '<strong>Security Code Match:</strong> '.$nvpArray["CVV2MATCH"].'<br />'; }
				$DBAVS = $admin_orders_overview;
				if ($_SESSION['secure_cc'] != '') { $DBCC = '<strong>Card Number:</strong> '.$_SESSION['secure_cc'].'<br /><br />'; }
				$admin_orders_overview .= $DBCC;
			}
			$admin_orders_overview .= $orders_overview;
		
			// EMAIL ORDER
			$OrderNumber = $fscartconfig['OrderNumber'];
			$OrderRecipient = explode(',', $fscartconfig['OrderRecipient']);
			$wpdb->query("UPDATE ".$wpdb->prefix."fssc_orders SET orders_number = '$OrderNumber' WHERE orders_id = ".$_SESSION['invoice_number']);	
			$headers  = 'MIME-Version: 1.0' . "\n";
			$headers .= 'Content-type: text/html; charset=iso-8859-1' . "\n";
			$headers .= 'From: '.$fscartconfig['OrderSenderName'].' <'.$fscartconfig['OrderSenderEmail'].'>';
			for ($i=0;$i<=sizeof($OrderRecipient);$i++) {
				if ($OrderRecipient[$i] != '') {
					mail($OrderRecipient[$i], 'Online Order', $admin_orders_overview, $headers);
				}
			}
				
			// EMAIL THANK YOU MESSAGE TO CUSTOMER
			$ThankYouMessage = get_bloginfo('name')."<br />Date: ".date("F j Y")."<br />Order #".$OrderNumber."<br /><br />".str_replace("\n","<br />",$fscartconfig['OrderEmailMessage'])."<br /><br /><strong>Your Order Details:</strong><br /><br />".$orders_overview;
			mail($_SESSION['order_POST']['customer_email'], 'Thank You For Your Order', $ThankYouMessage, $headers);
			$fscartconfig['OrderNumber'] = $fscartconfig['OrderNumber'] + 1;
			$wpdb->query("UPDATE ".$wpdb->prefix."fssc_config SET config_value = '".$fscartconfig['OrderNumber']."' WHERE config_name = 'OrderNumber'");
				
			// EMAIL PURCHASE ORDER
			if ($fscartconfig['EnablePO'] == 'Yes') {
				if (function_exists(fssc_email_purchase_order)) { fssc_email_purchase_order($_SESSION['order_POST'], $OrderRecipient); }
			}
				
			$PageStatus = '<div id="orderconfirm">'.str_replace("\n","<br />",$fscartconfig['OrderEmailMessage']).'</div>';
			
			// DIGITAL DOWNLOADS
			if ($DigitalDownload == TRUE) {
				$LicenseIDs = $DownloadIDs;
				$PageStatus .= '<br /><div id="orderconfirm">'.str_replace("\n","<br />",$fscartconfig['DigitalDownloadConfirmMessage']).'<br />'; 
				$DownloadIDs = explode(',',substr($DownloadIDs, 0, -1));
				foreach ($DownloadIDs as $DownloadIDs) {
					$PageStatus .= '<a href="'.get_option('home').'/wp-content/plugins/fs-shopping-cart/download.php?pid='.$DownloadIDs.'">'.$wpdb->get_var("SELECT products_name FROM ".$wpdb->prefix."fssc_products WHERE products_id = ".$DownloadIDs).'</a><br />';
					$ProductDetails = $wpdb->get_row("SELECT * FROM ".$wpdb->prefix."fssc_products WHERE products_id = $DownloadIDs");
					$UserType = '';
					if (function_exists(fssc_user_type_name)) { $UserType = fssc_user_type_name($user_ID); }	
					$wpdb->query("INSERT INTO ".$wpdb->prefix."fssc_downloads (products_id, orders_number, user_id, user_type, user_ip, download_initial_version, downloads, download_limit, download_date) 
																														 VALUES ($DownloadIDs, $OrderNumber, $user_ID, '$UserType', '".$_SERVER['REMOTE_ADDR']."', '".$ProductDetails->products_download_version."', 0, ".$ProductDetails->products_download_limit.", NOW())");
				}
				$PageStatus .= '</div>';
			} 
			
			// LICENSES
			if (function_exists('fssc_product_generate_license')) { 
				fssc_product_generate_license ($LicenseIDs); 
			}

			
			if($fscartconfig['EnableAnalyticsEcommerce'] == 1 && $_SESSION['payment_method'] != 'payment-admintest' && $user_ID != 1) {
				$PageStatus .= '<script type="text/javascript">pageTracker._trackPageview(\'/fssc/online-sale/\');</script>
				<script type="text/javascript">
				var gaJsHost = (("https:" == document.location.protocol) ? "https://ssl." : "http://www.");
				document.write(unescape("%3Cscript src=\'" + gaJsHost + "google-analytics.com/ga.js\' type=\'text/javascript\'%3E%3C/script%3E"));
				</script>
				<script type="text/javascript">
					var pageTracker = _gat._getTracker("'.$fscartconfig['GoogleAnalyticsID'].'");
					pageTracker._trackPageview();
					pageTracker._addTrans(
						"'.$_SESSION['invoice_number'].'",                                     // Order ID
						"",                            // Affiliation
						"'.str_replace(',','',$_SESSION['finalprice']).'",                                    // Total
						"'.$_SESSION['taxes'].'",                                     // Tax
						"'.str_replace(',','',$_SESSION['subtotal']).'",                                        // Shipping
						"'.$_SESSION['order_POST']['customer_city'].'",                                 // City
						"'.$_SESSION['order_POST']['customer_province'].'",                               // State
						"'.$OverviewCountry.'"                                       // Country
					); ';
					$CartProducts = $wpdb->get_results("SELECT * FROM ".$wpdb->prefix."fssc_users_basket WHERE users_code = '".$_SESSION['users_code']."'");
					foreach ($CartProducts as $CartProducts) {
						$ProductDetails = $wpdb->get_row("SELECT * FROM ".$wpdb->prefix."fssc_products WHERE products_id = ".$CartProducts->products_id);
						$CategoryDetails = $wpdb->get_row("SELECT ".$wpdb->prefix."fssc_products_to_categories.categories_id, ".$wpdb->prefix."fssc_products_to_categories.products_id, ".$wpdb->prefix."fssc_categories.categories_name, ".$wpdb->prefix."fssc_categories.categories_id FROM ".$wpdb->prefix."fssc_products_to_categories, ".$wpdb->prefix."fssc_categories 
						WHERE ".$wpdb->prefix."fssc_products_to_categories.products_id = ".$CartProducts->products_id." AND 
						".$wpdb->prefix."fssc_categories.categories_id = ".$wpdb->prefix."fssc_products_to_categories.categories_id LIMIT 1");
						$PageStatus .= '
							pageTracker._addItem(
								"'.$_SESSION['invoice_number'].'",                                     // Order ID
								"'.$ProductDetails->products_part_number.'",                                     // SKU
								"'.$ProductDetails->products_name.'",                                  // Product Name 
								"'.$CategoryDetails->categories_name.'",                             // Category
								"'.$CartProducts->products_price.'",                                    // Price
								"'.$CartProducts->products_quantity.'"                                         // Quantity
							); ';
						$ProductPurchases = $wpdb->get_var("SELECT products_purchased FROM ".$wpdb->prefix."fssc_products WHERE products_id = ".$ProductDetails->products_id);
						$ProductPurchases = $ProductPurchases + $CartProducts->products_quantity;
						$wpdb->query("UPDATE ".$wpdb->prefix."fssc_products SET products_purchased = $ProductPurchases WHERE products_id = ".$ProductDetails->products_id);
						
						// INVENTORY MANAGEMENT
						if ($fscartconfig['EnableInventoryManagement'] == 1) {
							$wpdb->query("UPDATE ".$wpdb->prefix."fssc_products SET products_inventory = products_inventory - ".$CartProducts->products_quantity." WHERE products_id = ".$ProductDetails->products_id);
							$ProductInventory = $wpdb->get_var("SELECT products_inventory FROM ".$wpdb->prefix."fssc_products WHERE products_id = ".$ProductDetails->products_id);
							if ($fscartconfig['InventoryOutofStockWarning'] == 1 && $ProductInventory <= 0) { mail(get_option('admin_email'), 'Product Out of Stock', $ProductDetails->products_name.' is currently out of stock.', $headers); }
							if ($fscartconfig['InventoryLowStockWarning'] == 1 && $ProductInventory <= $fscartconfig['InventoryWarnLimit']) { mail(get_option('admin_email'), 'Low Stock Warning', $ProductDetails->products_name.' is low in stock.', $headers); }
						}
						
					}
				$PageStatus .= '
					pageTracker._trackTrans();
				</script> 
				';
			}
			
			// UPDATE ORDER STATUS
			$wpdb->query("UPDATE ".$wpdb->prefix."fssc_orders SET orders_status = 'Processing' WHERE orders_id = ".$_SESSION['invoice_number']);
			$wpdb->query("UPDATE ".$wpdb->prefix."fssc_orders SET customer_cardnumber = '".$DBCC."' WHERE orders_id = ".$_SESSION['invoice_number']);
			$wpdb->query("UPDATE ".$wpdb->prefix."fssc_orders SET orders_avs = '".$DBAVS."' WHERE orders_id = ".$_SESSION['invoice_number']);
			
			// ADD TO NEWSLETTER
			if ($fscartconfig['ContactManagement'] != '') {
				if (function_exists('MailChimpStoreAddress') && $fscartconfig['ContactManagement'] == 'mailchimp' && $fscartconfig['MailChimpAPI'] != '' && $fscartconfig['MailChimpListID'] != '') { MailChimpStoreAddress($_SESSION['order_POST']); }
			}

			$_SESSION['CheckoutComplete'] = $PageStatus;
			
		} else {
			$_SESSION['order_error'] = $FSSCOrderError;
			unset($_SESSION['invoice_number']);
		}

	}
	if ($error != "") {
		$page_content .= '<h2 '.$CheckoutHeadingsStyle.'>Payment Error</h2>';
		$page_content .= '<div style="color: red; font-weight: bold;">'.$error.'</div>';
		if ($fscartconfig['CheckoutErrorNotification'] == 1) {
			if ($_SESSION['order_POST']['customer_first_name'] != "0" && $_SESSION['order_POST']['customer_first_name'] != '' && $_SESSION['order_POST']['customer_first_name'] != ' ') {
			$CENMessage = "Checkout Error: ";
			if (isset($FSSCOrderError)) {
				$CENMessage .= $FSSCOrderError;
			}
			$POSTError = $_SESSION['order_POST'];
			$POSTError['cardnumber'] = '****************';
			//$POSTError['name_on_card'] = '*******';
			$POSTError['cardexpm'] = '**';
			$POSTError['cardexpy'] = '**';
			$POSTError['cvdvalue'] = '***';
			$CENMessage .= '<pre>'.print_r($POSTError, TRUE).'</pre>';
			if (isset($nvpArray)) {
			$CENMessage .= '<pre>'.print_r($nvpArray, TRUE).'</pre>';
			}
			// MAIL ADMIN
			$CENheaders  = 'MIME-Version: 1.0' . "\n";
			$CENheaders .= 'Content-type: text/html; charset=iso-8859-1' . "\n";
			$CENheaders .= 'From: '.get_bloginfo('name').' <'.get_bloginfo('admin_email').'>';
			mail(get_bloginfo('admin_email'), 'FireStorm Plugin Checkout Error - '.date('M d Y'), $CENMessage, $CENheaders);
			}
		}
	}

}
?>