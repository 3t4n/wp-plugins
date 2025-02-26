<?php
function fssc_categories_wp_checkbox ($ParentID, $Level, $ProductID) {
	global $wpdb;
	$Level++;
	$Categories = $wpdb->get_results("SELECT parent_id, categories_id, categories_name, categories_order FROM ".$wpdb->prefix."fssc_categories WHERE parent_id = $ParentID ORDER BY categories_order");
	$CategoryCount = count($Categories);
	if ($CategoryCount > 0) {
		foreach ($Categories as $Categories) {
			$Spacing = "";
			$Checked = "";
			$ProductCheck = $wpdb->get_var("SELECT COUNT(*) FROM ".$wpdb->prefix."fssc_products_to_categories WHERE products_id = $ProductID AND categories_id = ".$Categories->categories_id);
			if ($ProductCheck > 0) {
				$Checked = ' checked="checked"';
			}
			for ($i=1; $i<$Level; $i++) {
				$Spacing .= "&nbsp;&nbsp;&nbsp;";
			}
			echo '<li id="category-'.$Categories->categories_id.'"><label class="selectit"><input value="'.$Categories->categories_id.'" type="checkbox" name="category-'.$Categories->categories_id.'" id="in-category-'.$Categories->categories_id.'"'.$Checked.'>'.$Spacing.stripslashes($Categories->categories_name).'</label></li>';
			fssc_categories_wp_checkbox ($Categories->categories_id, $Level, $ProductID);
		}
	}
} 

$ProductID = 0;
if (isset($_GET['pid'])) {
	$ProductID = $_GET['pid'];
}
if (isset($_POST['submit'])) {
	if ($ProductID == 0) {
		$ProductURL = fssc_url_generator($_POST['products_name']);
		$ProductURLCheck = $wpdb->get_var("SELECT COUNT(*) FROM ".$wpdb->prefix."fssc_products WHERE products_url = '$url'");
		if ($ProductURLCheck > 0) {
			for ($i=1;$i<99;$i++) {
				$newurl = $url.$i;
				$NewURLCheck = $wpdb->get_var("SELECT COUNT(*) FROM ".$wpdb->prefix."fssc_products WHERE products_url = '$newurl'");
				if ($NewURLCheck == 0) {
					$url = $newurl;
					$i = 100;
				}
			}
		}
		$wpdb->query("INSERT INTO ".$wpdb->prefix."fssc_products (
									products_part_number, 
									products_url, 
									products_date_added
									) VALUES (
									'".addslashes($_POST['products_part_number'])."', 
									'".$ProductURL."', 
									NOW()
									)");
		$ProductID = $wpdb->get_var("SELECT products_id FROM ".$wpdb->prefix."fssc_products ORDER BY products_id DESC LIMIT 1");
		if ($fscartconfig['EnableBrands'] == 'TRUE') { 
			$wpdb->query("INSERT INTO ".$wpdb->prefix."fssc_products_to_brands (products_id, brand_id) VALUES ($ProductID, ".$_POST['brand_id'].")");
			$wpdb->query("UPDATE ".$wpdb->prefix."fssc_brands SET brand_product_count = brand_product_count + 1 WHERE brand_id = ".$_POST['brand_id']);
		}
		$AddedProduct = TRUE;
	} else {
		$wpdb->query("UPDATE ".$wpdb->prefix."fssc_products SET products_url = '".$_POST['products_url']."' WHERE products_id = $ProductID");
		if ($fscartconfig['EnableBrands'] == 'TRUE') {
			$BrandCheck = $wpdb->get_row("SELECT * FROM ".$wpdb->prefix."fssc_products_to_brands WHERE products_id = $ProductID");
			if ($BrandCheck->brand_id != $_POST['brand_id']) {
				$wpdb->query("UPDATE ".$wpdb->prefix."fssc_products_to_brands SET brand_id = ".$_POST['brand_id']." WHERE products_id = $ProductID");
				$wpdb->query("UPDATE ".$wpdb->prefix."fssc_brands SET brand_product_count = brand_product_count + 1 WHERE brand_id = ".$_POST['brand_id']);
				$wpdb->query("UPDATE ".$wpdb->prefix."fssc_brands SET brand_product_count = brand_product_count - 1 WHERE brand_id = $BrandCheck->brand_id");
			}
		}
		$AddedProduct = FALSE;
	}

	$wpdb->query("UPDATE ".$wpdb->prefix."fssc_products SET products_visibility = ".$_POST['products_visibility']." WHERE products_id = $ProductID");
	$wpdb->query("UPDATE ".$wpdb->prefix."fssc_products SET products_show_details = ".$_POST['products_show_details']." WHERE products_id = $ProductID");
	$wpdb->query("UPDATE ".$wpdb->prefix."fssc_products SET products_discontinued = ".$_POST['products_discontinued']." WHERE products_id = $ProductID");
	$wpdb->query("UPDATE ".$wpdb->prefix."fssc_products SET products_featured = ".$_POST['products_featured']." WHERE products_id = $ProductID");
	$wpdb->query("UPDATE ".$wpdb->prefix."fssc_products SET products_availability = ".$_POST['products_availability']." WHERE products_id = $ProductID");
	$wpdb->query("UPDATE ".$wpdb->prefix."fssc_products SET products_warranty = ".$_POST['products_warranty']." WHERE products_id = $ProductID");
	$wpdb->query("UPDATE ".$wpdb->prefix."fssc_products SET products_weight = '".$_POST['products_weight']."' WHERE products_id = $ProductID");
	$wpdb->query("UPDATE ".$wpdb->prefix."fssc_products SET products_package_weight = '".$_POST['products_package_weight']."' WHERE products_id = $ProductID");
	$wpdb->query("UPDATE ".$wpdb->prefix."fssc_products SET products_part_number = '".addslashes($_POST['products_part_number'])."' WHERE products_id = $ProductID");
	$wpdb->query("UPDATE ".$wpdb->prefix."fssc_products SET products_name = '".addslashes($_POST['products_name'])."' WHERE products_id = $ProductID");
	$wpdb->query("UPDATE ".$wpdb->prefix."fssc_products SET products_description = '".addslashes($_POST['products_description'])."' WHERE products_id = $ProductID");
	$wpdb->query("UPDATE ".$wpdb->prefix."fssc_products SET products_special_notice = '".addslashes($_POST['products_special_notice'])."' WHERE products_id = $ProductID");
	$wpdb->query("UPDATE ".$wpdb->prefix."fssc_products SET products_meta_description = '".addslashes($_POST['products_meta_description'])."' WHERE products_id = $ProductID");
	$wpdb->query("UPDATE ".$wpdb->prefix."fssc_products SET products_meta_keywords = '".addslashes($_POST['products_meta_keywords'])."' WHERE products_id = $ProductID");
	$wpdb->query("UPDATE ".$wpdb->prefix."fssc_products SET products_last_updated  = NOW() WHERE products_id = $ProductID");
	$wpdb->query("UPDATE ".$wpdb->prefix."fssc_products SET products_purchased = ".$_POST['products_purchased']." WHERE products_id = $ProductID");
	$wpdb->query("UPDATE ".$wpdb->prefix."fssc_products SET products_views = ".$_POST['products_views']." WHERE products_id = $ProductID");
	$wpdb->query("UPDATE ".$wpdb->prefix."fssc_products SET products_addtocarts = ".$_POST['products_addtocarts']." WHERE products_id = $ProductID");
	$wpdb->query("UPDATE ".$wpdb->prefix."fssc_products SET products_custom_tab1 = '".addslashes($_POST['products_custom_tab1'])."' WHERE products_id = $ProductID");
	$wpdb->query("UPDATE ".$wpdb->prefix."fssc_products SET products_custom_tab1_value = '".addslashes($_POST['products_custom_tab1_value'])."' WHERE products_id = $ProductID");
	$wpdb->query("UPDATE ".$wpdb->prefix."fssc_products SET products_custom_tab2 = '".addslashes($_POST['products_custom_tab2'])."' WHERE products_id = $ProductID");
	$wpdb->query("UPDATE ".$wpdb->prefix."fssc_products SET products_custom_tab2_value = '".addslashes($_POST['products_custom_tab2_value'])."' WHERE products_id = $ProductID");
	$wpdb->query("UPDATE ".$wpdb->prefix."fssc_products SET products_custom_tab3 = '".addslashes($_POST['products_custom_tab3'])."' WHERE products_id = $ProductID");
	$wpdb->query("UPDATE ".$wpdb->prefix."fssc_products SET products_custom_tab3_value = '".addslashes($_POST['products_custom_tab3_value'])."' WHERE products_id = $ProductID");
	$wpdb->query("UPDATE ".$wpdb->prefix."fssc_products SET products_free_shipping = ".$_POST['products_free_shipping']." WHERE products_id = $ProductID");
	$wpdb->query("UPDATE ".$wpdb->prefix."fssc_products SET products_extra_shipping = ".$_POST['products_extra_shipping']." WHERE products_id = $ProductID");
	$wpdb->query("UPDATE ".$wpdb->prefix."fssc_products SET products_download_limit = ".$_POST['products_download_limit']." WHERE products_id = $ProductID");
	$wpdb->query("UPDATE ".$wpdb->prefix."fssc_products SET products_download_version = ".$_POST['products_download_version']." WHERE products_id = $ProductID");
	$wpdb->query("UPDATE ".$wpdb->prefix."fssc_products SET products_download_user_types = ".$_POST['products_download_user_types']." WHERE products_id = $ProductID");
	$wpdb->query("UPDATE ".$wpdb->prefix."fssc_products SET products_download_button = ".$_POST['products_download_button']." WHERE products_id = $ProductID");
	$wpdb->query("UPDATE ".$wpdb->prefix."fssc_products SET products_electronic_download_ext = '".$_POST['products_electronic_download_ext']."' WHERE products_id = $ProductID");
	$wpdb->query("UPDATE ".$wpdb->prefix."fssc_products SET products_toolbar = '".$_POST['products_toolbar']."' WHERE products_id = $ProductID");
	$wpdb->query("UPDATE ".$wpdb->prefix."fssc_products SET products_buy_button_link = '".$_POST['products_buy_button_link']."' WHERE products_id = $ProductID");
	$wpdb->query("UPDATE ".$wpdb->prefix."fssc_products SET products_buy_button_text = '".$_POST['products_buy_button_text']."' WHERE products_id = $ProductID");
	
	
	if (isset($_FILES['products_electronic_download']['name'])) { if ($_FILES['products_electronic_download']['name'] != '') { 
		$wpdb->query("UPDATE ".$wpdb->prefix."fssc_products SET products_electronic_download = '".$_FILES['products_electronic_download']['name']."' WHERE products_id = $ProductID"); 
		if (file_exists(ABSPATH."wp-content/uploads/fscart/".$fscartconfig['DigitalDownloadDirectory']."/".$_FILES['products_electronic_download']['name'])) { unlink(ABSPATH."wp-content/uploads/fscart/".$fscartconfig['DigitalDownloadDirectory']."/".$_FILES['products_electronic_download']['name']); }
		$uploaddir = ABSPATH."wp-content/uploads/fscart/".$fscartconfig['DigitalDownloadDirectory']."/";
		$uploadfile = $uploaddir.basename($_FILES['products_electronic_download']['name']);
		if (move_uploaded_file($_FILES['products_electronic_download']['tmp_name'], $uploadfile)) {
			rename($uploadfile, $uploaddir.basename($_FILES['products_electronic_download']['name']));
			unlink($uploaddir.basename($_FILES['products_electronic_download']['name']));
		}	
	} }
	
	if ($FSSCExtensions['Amazon'] == TRUE) {
		$wpdb->query("UPDATE ".$wpdb->prefix."fssc_products SET products_amazon_id = '".$_POST['products_amazon_id']."' WHERE products_id = $ProductID");
		$wpdb->query("UPDATE ".$wpdb->prefix."fssc_products SET products_amazon_price = '".str_replace(',','',str_replace('$','',$_POST['products_amazon_price']))."' WHERE products_id = $ProductID");
	}
					
	$Categories = $wpdb->get_results("SELECT categories_id FROM ".$wpdb->prefix."fssc_categories");
	foreach ($Categories as $Categories) {
		$CategoryCheck = $wpdb->get_var("SELECT COUNT(categories_id) FROM ".$wpdb->prefix."fssc_products_to_categories WHERE categories_id = ".$Categories->categories_id." AND products_id = $ProductID");
		if (isset($_POST['category-'.$Categories->categories_id])) {
			if ($CategoryCheck == 0) {
				$ProductOrder = $wpdb->get_var("SELECT COUNT(*) FROM ".$wpdb->prefix."fssc_products_to_categories WHERE categories_id = $Categories->categories_id ORDER BY products_order LIMIT 1");
				$ProductOrder++;
				$wpdb->query("INSERT INTO ".$wpdb->prefix."fssc_products_to_categories (products_id, categories_id, products_order) VALUES ($ProductID, $Categories->categories_id, $ProductOrder)");
				fssc_cat_prod_count($Categories->categories_id, '+1');
			}
		} else {
			if ($CategoryCheck > 0) {
				$wpdb->query("DELETE FROM ".$wpdb->prefix."fssc_products_to_categories WHERE categories_id = $Categories->categories_id AND products_id = $ProductID");
				fssc_cat_prod_count($Categories->categories_id, '-1');
			}
		}
	}
	
	$Features = $wpdb->get_results("SELECT * FROM ".$wpdb->prefix."fssc_products_features WHERE products_id = $ProductID ORDER BY features_id");
	foreach ($Features as $Features) {
		if ($_POST['feature-'.$Features->features_id] == '') {
			$wpdb->query("DELETE FROM ".$wpdb->prefix."fssc_products_features WHERE features_id = ".$Features->features_id);
		} elseif ($Features->features_feature != $_POST['feature-'.$Features->features_id]) {
			$wpdb->query("UPDATE ".$wpdb->prefix."fssc_products_features SET features_feature = '".$_POST['feature-'.$Features->features_id]."' WHERE features_id = ".$Features->features_id);
		}
	}
	for ($i=0;$i<=4;$i++) {
		if ($_POST['new-feature-'.$i] != '') {
			$wpdb->query("INSERT INTO ".$wpdb->prefix."fssc_products_features (products_id, features_feature) VALUES ($ProductID, '".$_POST['new-feature-'.$i]."')");
		}
	}
	
	if ($_FILES['file']['name'] != '') {
		if (file_exists(ABSPATH.'wp-content/uploads/fscart/products/'.$ProductID.'.jpg')) { unlink(ABSPATH.'wp-content/uploads/fscart/products/'.$ProductID.'.jpg'); }
		if (file_exists(ABSPATH.'wp-content/uploads/fscart/products/small/'.$ProductID.'.jpg')) { unlink(ABSPATH.'wp-content/uploads/fscart/products/small/'.$ProductID.'.jpg'); }
		if (file_exists(ABSPATH.'wp-content/uploads/fscart/products/enlarged/'.$ProductID.'.jpg')) { unlink(ABSPATH.'wp-content/uploads/fscart/products/enlarged/'.$ProductID.'.jpg'); }
		$uploaddir = ABSPATH.'wp-content/uploads/fscart/products/temp/';
		$uploadfile = $uploaddir . basename($_FILES['file']['name']);
		if (move_uploaded_file($_FILES['file']['tmp_name'], $uploadfile)) {
			rename($uploadfile, $uploaddir.basename($_FILES['file']['name']));
			fssc_imageresizer($uploaddir.basename($_FILES['file']['name']), ABSPATH.'wp-content/uploads/fscart/products/'.$ProductID.'.jpg', $fscartconfig['MaxStandardPictureSize'], $fscartconfig['MaxStandardPictureSize']);
			fssc_imageresizer($uploaddir.basename($_FILES['file']['name']), ABSPATH.'wp-content/uploads/fscart/products/small/'.$ProductID.'.jpg', $fscartconfig['MaxThumbnailSize'], $fscartconfig['MaxThumbnailSize']);
			fssc_imageresizer($uploaddir.basename($_FILES['file']['name']), ABSPATH.'wp-content/uploads/fscart/products/enlarged/'.$ProductID.'.jpg', 800, 600);
			unlink($uploaddir.basename($_FILES['file']['name']));
		}	
	}
	if ($AddedProduct == TRUE) {
		echo '<div id="message" class="updated fade"><p><strong>Your product has been added.</strong> <a href="admin.php?page=fssc-products&fp=general&f=edit&cid=0&pid='.$ProductID.'">Click here</a> to edit your product.</p></div>';
	} else {
		echo '<div id="message" class="updated fade"><p><strong>Your product has been updated.</strong></p></div>';
	}
}
if ($ProductID != 0) { 
	$ProductDetails = $wpdb->get_row("SELECT * FROM ".$wpdb->prefix."fssc_products WHERE products_id = $ProductID"); 
 echo '<form name="add-product" action="admin.php?page=fssc-products&fp=general&f=edit&cid='.$CategoryID.'&pid='.$ProductID.'" enctype="multipart/form-data" method="POST">';
} else {
	if (isset($_GET['removefile'])) {
		$wpdb->query("UPDATE ".$wpdb->prefix."fssc_products SET products_electronic_download = '' WHERE products_id = $ProductID"); 
		if (file_exists(ABSPATH."wp-content/uploads/fscart/".$fscartconfig['DigitalDownloadDirectory']."/".$ProductDetails->products_electronic_download)) { unlink(ABSPATH."wp-content/uploads/fscart/".$fscartconfig['DigitalDownloadDirectory']."/".$ProductDetails->products_electronic_download); }
		echo '<div id="message" class="updated fade"><p><strong>Your product has been updated.</strong></p></div>';
	}
 echo '<form name="add-product" action="admin.php?page=fssc-products&f=add&cid='.$CategoryID.'" enctype="multipart/form-data" method="POST">';
}
?>
<input type="hidden" name="MAX_FILE_SIZE" value="10000000" />
<div id="poststuff" class="metabox-holder has-right-sidebar">        
<div id="side-info-column" class="inner-sidebar">
  <div id="side-sortables" class="meta-box-sortables ui-sortable">
  	<div id="submitdiv" class="postbox ">
      <div class="handlediv" title="Click to toggle"><br></div>
      <h3 class="hndle"><span>Product Information</span></h3>
      <div class="inside">
        <div class="submitbox" id="submitpost">
          <div id="minor-publishing">
            <div id="misc-publishing-actions" style="border-bottom: none;">
              <div class="misc-pub-section">Status: <span id="post-status-display">
                <select name="products_visibility">
                  <option value="1"<?php if ($ProductDetails->products_visibility == 1) { echo ' selected'; } ?>>Visible</option>
                  <option value="0"<?php if ($ProductDetails->products_visibility == 0) { echo ' selected'; } ?>>Hidden</option>
                </select>
              </span></div>
              <div class="misc-pub-section">Featured: <span id="post-status-display">
                <select name="products_featured">
                  <option value="1"<?php if ($ProductDetails->products_featured == 1) { echo ' selected'; } ?>>Yes</option>
                  <option value="0"<?php if ($ProductDetails->products_featured == 0) { echo ' selected'; } ?>>No</option>
                </select>
              </span></div>
            	<?php if ($ProductID != '') { ?>
                <div id="publishing-action" style="padding: 10px;"><input type="submit" name="submit" id="publish" class="button-primary" value="Update Product" tabindex="5" accesskey="p"></div>
              <?php } else { ?>
                <div id="publishing-action" style="padding: 10px;"><input type="submit" name="submit" id="publish" class="button-primary" value="Add Product" tabindex="5" accesskey="p"></div>
              <?php } ?>
            </div>
            <div class="clear"></div>
          </div>
        </div>
      </div>
    </div>

    <div id="postimagediv" class="postbox ">
      <div class="handlediv" title="Click to toggle"><br></div>
      <h3 class="hndle"><span>Product Image</span></h3>
      <div class="inside" style="text-align: center;">
				<?php
        $Picture = 'No Picture Uploaded';
        if (file_exists(ABSPATH.'wp-content/uploads/fscart/products/'.$ProductID.'.jpg')) {
        	echo '<img src="'.get_option('home').'/wp-content/uploads/fscart/products/'.$ProductID.'.jpg" style="border: 1px solid #999999;"><br /><br />';
        } else {
					echo '<p>Please upload a picture.</p>';
				}
        ?>
        <input type="file" name="file" value="" size="20">
      </div>
    </div>

    <div id="categorydiv" class="postbox ">
    <div class="handlediv" title="Click to toggle"><br></div>
    <h3 class="hndle"><span>Categories</span></h3>
    <div class="inside">
      <div id="taxonomy-category" class="categorydiv">
        <div id="category-all" class="tabs-panel">
          <ul id="categorychecklist" class="list:category categorychecklist form-no-clear">
						<?php fssc_categories_wp_checkbox (0, 0, $ProductID);  ?>
          </ul>
        </div>
        <div id="category-adder" class="wp-hidden-children"><h4><a href="admin.php?page=fssc-categories&f=add" target="_blank">+ Add New Category</a></h4></div>
      </div>
    </div>
    </div>

		<?php if ($ProductID == '') { ?>
    <div id="postimagediv" class="postbox ">
      <div class="handlediv" title="Click to toggle"><br></div>
      <h3 class="hndle"><span>Category</span></h3>
      <div class="inside">
        <select name="category_id">
          <?php fssc_categories_basic (0, 0, $CategoryID, ''); ?>
        </select>
      </div>
    </div>
		<?php } 
		
		if ($fscartconfig['EnableBrands'] == 'TRUE') { ?>
    
    <div id="postimagediv" class="postbox ">
      <div class="handlediv" title="Click to toggle"><br></div>
      <h3 class="hndle"><span>Brand/Vendor</span></h3>
      <div class="inside">
        <select name="brand_id">
				<?php 
					$ProductBrandID = $wpdb->get_var("SELECT brand_id FROM ".$wpdb->prefix."fssc_products_to_brands WHERE products_id = $ProductID");
          $Brands = $wpdb->get_results("SELECT * FROM ".$wpdb->prefix."fssc_brands ORDER BY brand_name");
          foreach ($Brands as $Brands) {
						$Selected = '';
						if ($Brands->brand_id == $ProductBrandID) { $Selected = ' selected'; }
            echo '<option value="'.$Brands->brand_id.'"'.$Selected.'>'.$Brands->brand_name.'</option>';
          }
        ?></select>
      </div>
    </div>

		<?php }
		
		if ($ProductID != '') { ?>
    <div id="postimagediv" class="postbox ">
      <div class="handlediv" title="Click to toggle"><br></div>
      <h3 class="hndle"><span>Permalink URL</span></h3>
      <div class="inside"><input type="text" name="products_url" value="<?php echo $ProductDetails->products_url; ?>" style="width: 255px;"></div>
    </div>
		<?php } ?>

    <div id="postimagediv" class="postbox ">
      <div class="handlediv" title="Click to toggle"><br></div>
      <h3 class="hndle"><span>Features</span></h3>
      <?php
			if ($ProductID != '') {
				$Features = $wpdb->get_results("SELECT * FROM ".$wpdb->prefix."fssc_products_features WHERE products_id = $ProductID ORDER BY features_id");
				foreach ($Features as $Features) {
					echo '<div class="inside"><input type="text" name="feature-'.$Features->features_id.'" value="'.htmlentities($Features->features_feature, ENT_QUOTES).'" style="width: 255px;"></div>';
				}
			}
			for ($i=0;$i<=4;$i++) {
				echo '<div class="inside"><input type="text" name="new-feature-'.$i.'" value="" style="width: 255px;"></div>';
			}
			?>
    </div>

		<?php if ($ProductID != '') { ?>
    <div id="postimagediv" class="postbox ">
      <div class="handlediv" title="Click to toggle"><br></div>
      <h3 class="hndle"><span>Statistics</span></h3>
        <div class="misc-pub-section">Pageviews: <span id="post-status-display"><input type="text" name="products_views" size="3" maxlength="250" value="<?php echo $ProductDetails->products_views; ?>"></span></div>
        <div class="misc-pub-section">Add to Carts: <span id="post-status-display"><input type="text" name="products_addtocarts" size="3" maxlength="250" value="<?php echo $ProductDetails->products_addtocarts; ?>"></span></div>
        <div class="misc-pub-section">Purchases: <span id="post-status-display"><input type="text" name="products_purchased" size="3" maxlength="250" value="<?php echo $ProductDetails->products_purchased; ?>"></span></div>
    </div>
		<?php } ?>
		
  </div>
</div>               
        
        
        
        
        <?php
				
				echo '<div id="post-body">';
				echo '<div id="post-body-content">';
				$ListingNameLabel = ''; if ($ProductID == '') { $ListingNameLabel = 'Enter your product name here.'; }
				echo '<div id="titlediv"><div id="titlewrap"><label class="hide-if-no-js" style="" id="title-prompt-text" for="title">'.$ListingNameLabel.'</label><input type="text" name="products_name" size="30" tabindex="1" value="'.stripslashes($ProductDetails->products_name).'" id="title" autocomplete="off"></div></div>';
				?><div id="poststuff"><?php the_editor(stripslashes($ProductDetails->products_description), "products_description", "", false); ?></div><p>&nbsp;</p><?php

				echo '<table class="widefat page fixed" cellspacing="0" border="1">
				<thead>
				<tr>
				<th scope="col" class="manage-column" width="200">General Information</th>
				<th scope="col" class="manage-column" width="290">&nbsp;</th>
				<th scope="col" class="manage-column">&nbsp;</th>
				</tr>
				</thead>
				<tbody>';
				fssc_print_admin_selectbox('Allow Details Page', 'products_show_details', $ProductDetails->products_show_details, array('Yes' => '1', 'No' => '0'), '');
				fssc_print_admin_selectbox('Discontinued', 'products_discontinued', $ProductDetails->products_discontinued, array('For Sale' => '0', 'Discontinued' => '1'), '');
				fssc_print_admin_input('Product Special Notice', 'products_special_notice', $ProductDetails->products_special_notice, 35, '');
				fssc_print_admin_input('Product Warranty', 'products_warranty', $ProductDetails->products_warranty, 35, '');
				fssc_print_admin_input('Part Number / Sku', 'products_part_number', $ProductDetails->products_part_number, 35, '');
				fssc_print_admin_input('Availability / Stock', 'products_availability', $ProductDetails->products_availability, 35, '');
				fssc_print_admin_input('Product Weight', 'products_weight', $ProductDetails->products_weight, 35, 'Lbs.');
				fssc_print_admin_input('Packaging Weight', 'products_package_weight', $ProductDetails->products_package_weight, 35, 'Lbs.');
				fssc_print_admin_selectbox('Disable Tool Bar', 'products_toolbar', $ProductDetails->products_toolbar, array('Yes' => '0', 'No' => '1'), '');
				fssc_print_admin_input('Custom Buy Button Link', 'products_buy_button_link', $ProductDetails->products_buy_button_link, 35, '');
				fssc_print_admin_input('Custom Buy Button Text', 'products_buy_button_text', $ProductDetails->products_buy_button_text, 35, '');
				echo '</tbody></table><p>&nbsp;</p>';
				
				echo '<table class="widefat page fixed" cellspacing="0" border="1">
				<thead>
				<tr>
				<th scope="col" class="manage-column" width="200">Digital Download</th>
				<th scope="col" class="manage-column" width="290">&nbsp;</th>
				<th scope="col" class="manage-column">&nbsp;</th>
				</tr>
				</thead>
				<tbody>';
				if ($ProductDetails->products_electronic_download != '' && file_exists(ABSPATH."wp-content/uploads/fscart/".$fscartconfig['DigitalDownloadDirectory']."/".$ProductDetails->products_electronic_download)) { echo '<tr><td>File</td><td colspan="2">'.$ProductDetails->products_electronic_download.' <a href="admin.php?page=fssc-products&fp=general&f=edit&cid='.$CategoryID.'&pid='.$ProductID.'&removefile" onClick="return confirm(\'Are you sure you want to remove this file?\')"><img src="'.get_option('home').'/wp-content/plugins/fs-shopping-cart/images/cart-x.png" border="0" alt="X"></a></td></tr>'; } else { fssc_print_admin_file_input('Upload Digital Download File', 'products_electronic_download', $ProductDetails->products_electronic_download, 35, ''); }
				fssc_print_admin_input('External Download Link', 'products_electronic_download_ext', $ProductDetails->products_electronic_download_ext, 35, 'Will override Digital Download File.');
				fssc_print_admin_input('Download Limit', 'products_download_limit', $ProductDetails->products_download_limit, 5, '0 for unlimited.');
				fssc_print_admin_input('Current Download Version', 'products_download_version', $ProductDetails->products_download_version, 5, '');
				fssc_print_admin_selectbox('Replace Buy Button with Download Link', 'products_download_button', $ProductDetails->products_download_button, array('Never' => '0', 'Only After Purchase' => '1', 'For Everyone' => '2'), '');
				echo '</tbody></table><p>&nbsp;</p>';
				
				
				if ($FSSCExtensions['UserTypes'] == TRUE) { fssc_user_type_product_downloads($ProductID, $_POST); }
				if ($FSSCExtensions['Licenses'] == TRUE) { fssc_licenses_product_admin($ProductDetails); }

				
				echo '<table class="widefat page fixed" cellspacing="0" border="1">
				<thead>
				<tr>
				<th scope="col" class="manage-column" width="200">Shipping</th>
				<th scope="col" class="manage-column" width="290">&nbsp;</th>
				<th scope="col" class="manage-column">&nbsp;</th>
				</tr>
				</thead>
				<tbody>';
				fssc_print_admin_selectbox('Free Shipping', 'products_free_shipping', $ProductDetails->products_free_shipping, array('No' => '0', 'Yes' => '1'), '');
				fssc_print_admin_input('Extra Shipping Cost', 'products_extra_shipping', $ProductDetails->products_extra_shipping, 5, 'Do not enter currency symbol.');
				echo '</tbody></table><p>&nbsp;</p>';
				
				echo '<table class="widefat page fixed" cellspacing="0" border="1">
				<thead>
				<tr>
				<th scope="col" class="manage-column" width="200">Amazon</th>
				<th scope="col" class="manage-column" width="290">&nbsp;</th>
				<th scope="col" class="manage-column">&nbsp;</th>
				</tr>
				</thead>
				<tbody>';
				if ($FSSCExtensions['Amazon'] == TRUE) {
					fssc_print_admin_input('Amazon ID', 'products_amazon_id', $ProductDetails->products_amazon_id, 35, '');
					fssc_print_admin_input('Amazon Price', 'products_amazon_price', $ProductDetails->products_amazon_price, 35, '');
				} else {
					fssc_feature_disabled_mini();
				}
				echo '</tbody></table><p>&nbsp;</p>';
				
				echo '<table class="widefat page fixed" cellspacing="0" border="1">
				<thead>
				<tr>
				<th scope="col" class="manage-column" width="200">Custom Tabs</th>
				<th scope="col" class="manage-column" width="290">&nbsp;</th>
				<th scope="col" class="manage-column">&nbsp;</th>
				</tr>
				</thead>
				<tbody>';
				fssc_print_admin_input('Tab 1 Name', 'products_custom_tab1', $ProductDetails->products_custom_tab1, 35, '');
				fssc_print_admin_input('Tab 1 Link', 'products_custom_tab1_value', $ProductDetails->products_custom_tab1_value, 35, '');
				fssc_print_admin_input('Tab 2 Name', 'products_custom_tab2', $ProductDetails->products_custom_tab2, 35, '');
				fssc_print_admin_input('Tab 2 Link', 'products_custom_tab2_value', $ProductDetails->products_custom_tab2_value, 35, '');
				fssc_print_admin_input('Tab 3 Name', 'products_custom_tab3', $ProductDetails->products_custom_tab3, 35, '');
				fssc_print_admin_input('Tab 3 Link', 'products_custom_tab3_value', $ProductDetails->products_custom_tab3_value, 35, '');
				echo '</tbody></table><p>&nbsp;</p>';
				
				echo '<table class="widefat page fixed" cellspacing="0" border="1">
				<thead>
				<tr>
				<th scope="col" class="manage-column" width="200">Search Engine Optimization</th>
				<th scope="col" class="manage-column" width="290">&nbsp;</th>
				<th scope="col" class="manage-column">&nbsp;</th>
				</tr>
				</thead>
				<tbody>';
				fssc_print_admin_textarea('Meta Description', 'products_meta_description', $ProductDetails->products_meta_description, 35, 6, '');
				fssc_print_admin_textarea('Meta Keywords', 'products_meta_keywords', $ProductDetails->products_meta_keywords, 35, 6, '');
				echo '</tbody></table><p>&nbsp;</p>';
			
			
				echo '</div>';
				echo '</div>';
?>
</form>