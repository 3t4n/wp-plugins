<?php
	if (isset($_GET['order'])) {
		if ($_GET['order'] == "up" || $_GET['order'] == "down") {
			$ProductCategory = $wpdb->get_row("SELECT * FROM ".$wpdb->prefix."fssc_products_to_categories WHERE products_id = ".$_GET['pid']." AND categories_id = ".$_GET['cid']);
			$OldOrder = $ProductCategory->products_order;
			if ($_GET['order'] == "up") {
				$NewOrder = $ProductCategory->products_order - 1;
			} elseif ($_GET['order'] == "down") {
				$NewOrder = $ProductCategory->products_order + 1;
			}
			$OldProductCategory = $wpdb->get_row("SELECT * FROM ".$wpdb->prefix."fssc_products_to_categories WHERE products_order = $NewOrder AND categories_id = ".$_GET['cid']);
			$OPCCount = count($OldProductCategory);
			if ($OPCCount > 0) {
				$wpdb->query("UPDATE ".$wpdb->prefix."fssc_products_to_categories SET products_order = $NewOrder WHERE categories_id = ".$_GET['cid']." AND products_id = ".$_GET['pid']);
				$wpdb->query("UPDATE ".$wpdb->prefix."fssc_products_to_categories SET products_order = $OldOrder WHERE categories_id = ".$_GET['cid']." AND products_id = ".$OldProductCategory->products_id);
			}
		} elseif ($_GET['order'] == "upa") {
			$wpdb->query("UPDATE ".$wpdb->prefix."fssc_products_to_categories SET products_order = '-1' WHERE categories_id = ".$_GET['cid']." AND products_id = ".$_GET['pid']);
			fssc_product_ordering_fix();
		} elseif ($_GET['order'] == "downa") {
			$wpdb->query("UPDATE ".$wpdb->prefix."fssc_products_to_categories SET products_order = '9999999' WHERE categories_id = ".$_GET['cid']." AND products_id = ".$_GET['pid']);
			fssc_product_ordering_fix();
		}
	} elseif (isset($_GET['del'])) {
		$ProductID = $_GET['del'];
		$BrandID = $wpdb->get_var("SELECT brand_id FROM ".$wpdb->prefix."fssc_products_to_brands WHERE products_id = $ProductID");
		$wpdb->query("UPDATE ".$wpdb->prefix."fssc_brands SET brand_product_count = brand_product_count - 1 WHERE brand_id = $BrandID");
		$wpdb->query("DELETE FROM ".$wpdb->prefix."fssc_products_to_brands WHERE products_id = $ProductID");
		$Categories = $wpdb->get_results("SELECT * FROM ".$wpdb->prefix."fssc_products_to_categories WHERE products_id = $ProductID");
		foreach ($Categories as $Categories) {
			$wpdb->query("DELETE FROM ".$wpdb->prefix."fssc_products_to_categories WHERE products_id = $ProductID AND categories_id = $Categories->categories_id");
		}
		$wpdb->query("DELETE FROM ".$wpdb->prefix."fssc_products WHERE products_id = $ProductID");
		$wpdb->query("DELETE FROM ".$wpdb->prefix."fssc_products_to_categories WHERE products_id = $ProductID");
		$wpdb->query("DELETE FROM ".$wpdb->prefix."fssc_products_features WHERE products_id = $ProductID");
		$wpdb->query("DELETE FROM ".$wpdb->prefix."fssc_products_accessories WHERE products_id = $ProductID");
		$wpdb->query("DELETE FROM ".$wpdb->prefix."fssc_products_auto_acc WHERE products_id = $ProductID");
		$wpdb->query("DELETE FROM ".$wpdb->prefix."fssc_products_related WHERE products_id = $ProductID");
		$wpdb->query("DELETE FROM ".$wpdb->prefix."fssc_products_to_countries WHERE products_id = $ProductID");
		$wpdb->query("DELETE FROM ".$wpdb->prefix."fssc_products_to_distr WHERE products_id = $ProductID");
		$wpdb->query("DELETE FROM ".$wpdb->prefix."fssc_products_to_finder WHERE products_id = $ProductID");
		$wpdb->query("DELETE FROM ".$wpdb->prefix."fssc_products_variations WHERE products_id = $ProductID");
		$wpdb->query("DELETE FROM ".$wpdb->prefix."fssc_promo_two WHERE products_id = $ProductID");
		$wpdb->query("DELETE FROM ".$wpdb->prefix."fssc_reviews WHERE products_id = $ProductID");
		if (file_exists(ABSPATH.'wp-content/uploads/fscart/products/'.$ProductID.'.jpg')) { unlink(ABSPATH.'wp-content/uploads/fscart/products/'.$ProductID.'.jpg'); }
		if (file_exists(ABSPATH.'wp-content/uploads/fscart/products/small/'.$ProductID.'.jpg')) { unlink(ABSPATH.'wp-content/uploads/fscart/products/small/'.$ProductID.'.jpg'); }
		if (file_exists(ABSPATH.'wp-content/uploads/fscart/products/enlarged/'.$ProductID.'.jpg')) { unlink(ABSPATH.'wp-content/uploads/fscart/products/enlarged/'.$ProductID.'.jpg'); }
		fssc_cat_prod_count($_GET['cid'], '-1');
		fssc_product_ordering_fix();
		echo '<div id="message" class="updated fade"><p><strong>Your product has been deleted.</strong></p></div>';
	}
	if (isset($_GET['ofix'])) {
		fssc_product_ordering_fix();
		echo '<div id="message" class="updated fade"><p><strong>Ordering has been fixed.</strong></p></div>';
	}

	echo '<h2>View Category:</h2>';
	echo '<select name="parent_id" onchange="window.open(this.options[this.selectedIndex].value,\'_top\')"><option value="admin.php?page=fssc-products">Please Select a Category</option>';
	echo fssc_categories_basic (0, 0, $CategoryID, "admin.php?page=fssc-products&cid=");
	echo '</select><br /><br />';
	if (isset($CategoryName)) { echo '<h2>'.$CategoryName.'</h2>'; } else { echo '<h2>Recently Added Products</h2>'; }
	echo '<table class="widefat page fixed" cellspacing="0">
				<thead>
				<tr>
				<th scope="col" class="manage-column" style="width: 150px;"><b><a href="admin.php?page=fssc-products&cid='.$CategoryID.'&order=sku">Part Number</a></b></th>
				<th scope="col" class="manage-column"><b><a href="admin.php?page=fssc-products&cid='.$CategoryID.'&order=name">Product Name</a></b></th>
				<th scope="col" class="manage-column" style="width: 100px; text-align: center;"><b><a href="admin.php?page=fssc-products&cid='.$CategoryID.'">Order</a></b></th>
				</tr>
				</thead>
				<tfoot>
				<tr>
				<th scope="col" class="manage-column" style="width: 150px;"><b><a href="admin.php?page=fssc-products&cid='.$CategoryID.'&order=sku">Part Number</a></b></th>
				<th scope="col" class="manage-column"><b><a href="admin.php?page=fssc-products&cid='.$CategoryID.'&order=name">Product Name</a></b></th>
				<th scope="col" class="manage-column" style="width: 100px; text-align: center;"><b><a href="admin.php?page=fssc-products&cid='.$CategoryID.'">Order</a></b></th>
				</tr>
				</tfoot>
				<tbody>';
				if ($CategoryID == 0) {
					$ProductListSQL = "SELECT * FROM ".$wpdb->prefix."fssc_products ORDER BY products_id DESC LIMIT 25";
				} else {
					$CategoryOrder = $wpdb->prefix."fssc_products_to_categories.products_order"; 
					if (isset($_GET['order'])) {
						if ($_GET['order'] == 'sku') {
							$CategoryOrder = $wpdb->prefix."fssc_products.products_part_number";
						} elseif($_GET['order'] == 'name') {
							$CategoryOrder = $wpdb->prefix."fssc_products.products_name";
						} elseif($_GET['order'] == 'price') {
							$CategoryOrder = $wpdb->prefix."fssc_products.products_price";
						} else {
							$CategoryOrder = $wpdb->prefix."fssc_products_to_categories.products_order";
						}
					}
					$ProductListSQL = "SELECT * FROM ".$wpdb->prefix."fssc_products_to_categories, ".$wpdb->prefix."fssc_products WHERE ".$wpdb->prefix."fssc_products_to_categories.categories_id = $CategoryID AND ".$wpdb->prefix."fssc_products.products_id = ".$wpdb->prefix."fssc_products_to_categories.products_id ORDER BY ".$CategoryOrder;
				}
				$TRColor = "fdfcfc";
				
				$Products = $wpdb->get_results($ProductListSQL);
				$ProductCount = count($Products);
				foreach ($Products as $Products) {
					$ProductVisibility = ''; if ($Products->products_visibility == 0) { $ProductVisibility = '<span style="color: red">[Hidden]</span>'; }
					$DiscontinuedProduct = ''; if ($Products->products_discontinued == 1) { $DiscontinuedProduct = '<span style="color: red">[Discontinued]</span>'; }
					echo '<tr bgcolor="#'.$TRColor.'"><td>'.$Products->products_part_number;
					if ($Products->products_amazon_id != '') { echo '<br /><span style="color: #999999; text-decoration: italic;">Listed in Amazon</span>';
					}
					echo '</td>';
					echo '<td><strong>'.$Products->products_name.'</strong> '.$ProductVisibility.' '.$DiscontinuedProduct.'<br />';
					echo '<a href="admin.php?page=fssc-products&fp=general&f=edit&cid='.$CategoryID.'&pid='.$Products->products_id.'">edit</a> | <a href="admin.php?page=fssc-products&cid='.$CategoryID.'&del='.$Products->products_id.'" onClick="return confirm(\'Are you sure you want to remove this product?\')">delete</a></td>';
					if ($CategoryID != 0) {
						echo '<td align="center" valign="middle">';
						if ($CategoryOrder == $wpdb->prefix."fssc_products_to_categories.products_order") {
							if ($Products->products_order == 1) {
								echo '<img src="'.get_option('home').'/wp-content/plugins/fs-shopping-cart/images/btn-mini-up-g.gif" border="0" alt="UP"> ';
							} else {
								echo '<a href="admin.php?page=fssc-products&order=upa&cid='.$CategoryID.'&pid='.$Products->products_id.'"><img src="'.get_option('home').'/wp-content/plugins/fs-shopping-cart/images/btn-mini-up-a.gif" border="0" alt="UP"></a> ';
								echo '<a href="admin.php?page=fssc-products&order=up&cid='.$CategoryID.'&pid='.$Products->products_id.'"><img src="'.get_option('home').'/wp-content/plugins/fs-shopping-cart/images/btn-mini-up.gif" border="0" alt="UP"></a> ';
							}
							if ($Products->products_order == $ProductCount) {
								echo '<img src="'.get_option('home').'/wp-content/plugins/fs-shopping-cart/images/btn-mini-down-g.gif" border="0" alt="DOWN">';
							} else {
								echo '<a href="admin.php?page=fssc-products&order=down&cid='.$CategoryID.'&pid='.$Products->products_id.'"><img src="'.get_option('home').'/wp-content/plugins/fs-shopping-cart/images/btn-mini-down.gif" border="0" alt="DOWN"></a> ';
								echo '<a href="admin.php?page=fssc-products&order=downa&cid='.$CategoryID.'&pid='.$Products->products_id.'"><img src="'.get_option('home').'/wp-content/plugins/fs-shopping-cart/images/btn-mini-down-a.gif" border="0" alt="DOWN"></a>';
							}
						} else {
							echo '<img src="'.get_option('home').'/wp-content/plugins/fs-shopping-cart/images/btn-mini-up-g.gif" border="0" alt="UP"> ';
							echo '<img src="'.get_option('home').'/wp-content/plugins/fs-shopping-cart/images/btn-mini-down-g.gif" border="0" alt="DOWN">';
						}
						echo '</td>';
					} else {
						echo '<td>&nbsp;</td>';
					}
					echo '</tr>';
					if ($TRColor == "fdfcfc") { $TRColor = "faf9f9"; } else { $TRColor = "fdfcfc"; }
				}
				if ($ProductCount == 0) {
					echo '<tr bgcolor="#fdfcfc"><td colspan="2">&nbsp;</td><td colspan="2">No products found.</td></tr>';
				}
	echo '</tbody></table>';

?>
  <p><br /></p>
	<table class="widefat page fixed" cellspacing="0">
		<thead>
		<tr>
		<th scope="col" id="title" class="manage-column" width="200">Tools</th>
		<th scope="col" id="title" class="manage-column">&nbsp;</th>
		</tr>
		</thead>
		<tbody>
        <tr><th><a href="admin.php?page=fssc-products&ofix&cid=<?php print $CategoryID; ?>">Fix Product Ordering</a></th><th>Use this tool to fix the product ordering. This tool will run on all categories in the database.</th></tr>
	</tbody></table>