<?php
function fssc_brands_page() {
	global $wpdb;

	echo '<div class="wrap">';

	if (isset($_GET['f'])) {
		if ($_GET['f'] == "add"){
			echo '<h2>Add Brand/Vendor</h2>';
			if (isset($_POST['submit'])) {
				$url = fssc_url_generator($_POST['brand_name']);
				$BrandURLCheck = $wpdb->get_var("SELECT COUNT(*) FROM ".$wpdb->prefix."fssc_brands WHERE brand_url = '$url'");
				if ($BrandURLCheck > 0) {
					for ($i=1;$i<99;$i++) {
						$newurl = $url.$i;
						$NewURLCheck = $wpdb->get_var("SELECT COUNT(*) FROM ".$wpdb->prefix."fssc_brands WHERE brand_url = '$newurl'");
						if ($NewURLCheck == 0) {
							$url = $newurl;
							$i = 100;
						}
					}
				}
				
				$sql = mysql_query("INSERT INTO ".$wpdb->prefix."fssc_brands (
															brand_widget_featured,
															brand_visibility, 
															brand_name, 
															brand_url, 
															brand_description, 
															brand_meta_title, 
															brand_meta_description, 
															brand_meta_keywords
														) VALUES (
															'".$_POST['brand_widget_featured']."', 
															'".$_POST['brand_visibility']."', 
															'".addslashes($_POST['brand_name'])."', 
															'$url', 
															'".addslashes($_POST['brand_description'])."', 
															'".addslashes($_POST['brand_meta_title'])."', 
															'".addslashes($_POST['brand_meta_description'])."', 
															'".addslashes($_POST['brand_meta_keywords'])."'
														)");
				
				$BrandID = $wpdb->get_var("SELECT brand_id FROM ".$wpdb->prefix."fssc_brands ORDER BY brand_id DESC LIMIT 1");
				
				$uploaddir = ABSPATH.'wp-content/uploads/fscart/brands/temp/';
				$uploadfile = $uploaddir . basename($_FILES['file']['name']);
				if (move_uploaded_file($_FILES['file']['tmp_name'], $uploadfile)) {
					rename($uploadfile, $uploaddir.basename($_FILES['file']['name']));
					fssc_imageresizer($uploaddir.basename($_FILES['file']['name']), ABSPATH.'wp-content/uploads/fscart/categories/'.$BrandID.'.jpg', 160, 160);
					fssc_imageresizer($uploaddir.basename($_FILES['file']['name']), ABSPATH.'wp-content/uploads/fscart/categories/small/'.$BrandID.'.jpg', 100, 100);
					fssc_imageresizer($uploaddir.basename($_FILES['file']['name']), ABSPATH.'wp-content/uploads/fscart/categories/enlarged/'.$BrandID.'.jpg', 800, 800);
					rename(ABSPATH.'wp-content/uploads/fscart/brands/enlarged/'.basename($_FILES['file']['name']), ABSPATH.'wp-content/uploads/fscart/brands/enlarged/'.$BrandID.'.jpg');
					unlink($uploaddir.basename($_FILES['file']['name']));
				}

				echo '<div id="message" class="updated fade"><p><strong>Your brand/vendor has been added.</strong> <a href="admin.php?page=fssc-brands&f=edit&id='.$BrandID.'">Click here</a> to edit your new brand/vendor.</p></div>';
			} else {
				echo '<form name="add-brand" action="admin.php?page=fssc-brands&f=add" enctype="multipart/form-data" method="POST"><input type="hidden" name="MAX_FILE_SIZE" value="10000000" />';				
				include('forms/brands.php');
				echo '</form>';
			}			
		} elseif ($_GET['f'] == "edit"){
		echo '<h2>Edit Brand/Vendor</h2>';
		if (isset($_POST['submit'])) {				
				$wpdb->query("UPDATE ".$wpdb->prefix."fssc_brands SET 
				brand_visibility = '".$_POST['brand_visibility']."', 
				brand_widget_featured = '".$_POST['brand_widget_featured']."', 
				brand_name = '".addslashes($_POST['brand_name'])."', 
				brand_url = '".$_POST['brand_url']."', 
				brand_description = '".addslashes($_POST['brand_description'])."', 
				brand_meta_title = '".addslashes($_POST['brand_meta_title'])."', 
				brand_meta_description = '".addslashes($_POST['brand_meta_description'])."', 
				brand_meta_keywords = '".addslashes($_POST['brand_meta_keywords'])."' 
				WHERE brand_id = '".$_GET['id']."'");
				
				if ($_FILES['file']['name'] != "") {
					if (file_exists(ABSPATH.'wp-content/uploads/fscart/brands/'.$_GET['id'].'.jpg')) { unlink(ABSPATH.'wp-content/uploads/fscart/brands/'.$_GET['id'].'.jpg'); }
					if (file_exists(ABSPATH.'wp-content/uploads/fscart/brands/thumbs/'.$_GET['id'].'.jpg')) { unlink(ABSPATH.'wp-content/uploads/fscart/brands/thumbs/'.$_GET['id'].'.jpg'); }
					if (file_exists(ABSPATH.'wp-content/uploads/fscart/brands/enlarged/'.$_GET['id'].'.jpg')) { unlink(ABSPATH.'wp-content/uploads/fscart/brands/enlarged/'.$_GET['id'].'.jpg'); }
					$uploaddir = ABSPATH.'wp-content/uploads/fscart/brands/temp/';
					$uploadfile = $uploaddir . basename($_FILES['file']['name']);
					if (move_uploaded_file($_FILES['file']['tmp_name'], $uploadfile)) {
						rename($uploadfile, $uploaddir.basename($_FILES['file']['name']));
						fssc_imageresizer($uploaddir.basename($_FILES['file']['name']), ABSPATH.'wp-content/uploads/fscart/brands/'.$_GET['id'].'.jpg', 160, 160);
						fssc_imageresizer($uploaddir.basename($_FILES['file']['name']), ABSPATH.'wp-content/uploads/fscart/brands/small/'.$_GET['id'].'.jpg', 100, 100);
						fssc_imageresizer($uploaddir.basename($_FILES['file']['name']), ABSPATH.'wp-content/uploads/fscart/brands/enlarged/'.$_GET['id'].'.jpg', 800, 800);
						rename(ABSPATH.'wp-content/uploads/fscart/brands/enlarged/'.basename($_FILES['file']['name']), ABSPATH.'wp-content/uploads/fscart/brands/enlarged/'.$_GET['id'].'.jpg');
						unlink($uploaddir.basename($_FILES['file']['name']));
					}
				}
				echo '<div id="message" class="updated fade"><p><strong>Your brand/vendor has been updated.</strong> <a href="admin.php?page=fssc-brands">Click here</a> to view all brands/vendors.</p></div>';
			}
			$BrandID = $_GET['id'];
			$BrandDetails = $wpdb->get_row("SELECT * FROM ".$wpdb->prefix."fssc_brands WHERE brand_id = ".$BrandID);
			echo '<form name="edit-brand" action="admin.php?page=fssc-brands&f=edit&id='.$_GET['id'].'" enctype="multipart/form-data" method="POST"><input type="hidden" name="MAX_FILE_SIZE" value="10000000" />';				
			include('forms/brands.php');
			echo '</form>';
		} elseif ($_GET['f'] == "del" && $_GET['id'] != ""){
			$sql = mysql_query("DELETE FROM ".$wpdb->prefix."fssc_brands WHERE brand_id = ".$_GET['id']);
			$sql = mysql_query("DELETE FROM ".$wpdb->prefix."fssc_products_to_brands WHERE brand_id = ".$_GET['id']);
			if (file_exists(ABSPATH.'wp-content/uploads/fscart/brands/'.$_GET['id'].'.jpg')) { unlink(ABSPATH.'wp-content/uploads/fscart/brands/'.$_GET['id'].'.jpg'); }
			if (file_exists(ABSPATH.'wp-content/uploads/fscart/brands/small/'.$_GET['id'].'.jpg')) { unlink(ABSPATH.'wp-content/uploads/fscart/brands/small/'.$_GET['id'].'.jpg'); }
			if (file_exists(ABSPATH.'wp-content/uploads/fscart/brands/enlarged/'.$_GET['id'].'.jpg')) { unlink(ABSPATH.'wp-content/uploads/fscart/brands/enlarged/'.$_GET['id'].'.jpg'); }
			echo '<h2>Brands / Vendors <a href="admin.php?page=fssc-brands&f=add" class="add-new-h2">Add New</a> </h2>';
			echo '<div id="message" class="updated fade"><p><strong>Your brand/vendor has been deleted.</strong> <a href="admin.php?page=fssc-brands">Click here</a> to view all brands/vendors.</p></div>';
		}
	} else {
		echo '<h2>Brands / Vendors <a href="admin.php?page=fssc-brands&f=add" class="add-new-h2">Add New</a> </h2>';
		echo '<table class="widefat page fixed" cellspacing="0">
				<thead>
				<tr>
				<th scope="col" id="date" class="manage-column" style="width: 25px;">&nbsp;</th>
				<th scope="col" id="title" class="manage-column" style="">Brands / Vendors</th>
				</tr>
				</thead>
				<tfoot>
				<tr>
				<th scope="col" class="manage-column" style="width: 25px;">&nbsp;</th>
				<th scope="col" class="manage-column" style="">Brands / Vendors</th>
				</tr>
				</tfoot>
			<tbody>';
		$Brands = $wpdb->get_results("SELECT * FROM ".$wpdb->prefix."fssc_brands ORDER BY brand_name");
		foreach ($Brands as $Brands) {
			echo '<tr>';
			echo '<td><a href="admin.php?page=fssc-brands&f=edit&id='.$Brands->brand_id.'" onClick="return confirm(\'Are you sure you want to remove this brand/vendor?\')"><img src="'.get_option('home').'/wp-content/plugins/fs-shopping-cart/images/cart-x.png" border="0" alt="X"></a></td>';
			echo '<td>'.$Brands->brand_name;
			if ($Brands->brand_visibility == 0) {
				echo '&nbsp;&nbsp;<span style="color: #B80000">[hidden]</span>';
			}
			echo '<br /><a href="admin.php?page=fssc-brands&f=edit&id='.$Brands->brand_id.'">edit</a> | <a href="admin.php?page=fssc-brands&f=del&id='.$Brands->brand_id.'" onClick="return confirm(\'Are you sure you want to delete this brand/vendor?\')">delete</a>';
			echo '</th>';
		}
		echo '</tbody></table>';
		
	}
	
	echo '</div>';

}
?>