<?php

// fs_categories_page() displays the page content for the first submenu of the custom Shopping Cart menu
function fssc_categories_page() {
	global $wpdb;
	$ShowCategoryListing = TRUE;
	
	function fssc_categories ($ParentID, $Recurrence) {
		global $tr_color,$wpdb;
		$Recurrence = $Recurrence + 1;
		$Categories = $wpdb->get_results("SELECT parent_id, categories_visibility, categories_order, categories_name, categories_id, categories_order FROM ".$wpdb->prefix."fssc_categories WHERE parent_id = $ParentID ORDER BY categories_order");
		$CategoryCount = count($Categories);
		if ($CategoryCount > 0) {
			foreach ($Categories as $Categories) {
				if ($tr_color == 'FFFFFF') {
					$tr_color = 'alternate ';
				} else {
					$tr_color = 'FFFFFF';
				}
				echo '<tr id="page-22" class="'.$tr_color.'iedit">';
				echo '<td align="center" width="60">';
				if ($Categories->categories_order == 1) {
					echo '<img src="'.get_option('home').'/wp-content/plugins/fs-shopping-cart/images/btn-mini-up-g.gif" alt="UP"> ';
				} else {
					echo '<a href="admin.php?page=fssc-categories&f=up&id='.$Categories->categories_id.'&pid='.$Categories->parent_id.'"><img src="'.get_option('home').'/wp-content/plugins/fs-shopping-cart/images/btn-mini-up.gif" border="0" alt="UP"></a> ';
				}
				if ($Categories->categories_order == $CategoryCount) {
					echo '<img src="'.get_option('home').'/wp-content/plugins/fs-shopping-cart/images/btn-mini-down-g.gif" border="0" alt="DOWN"><br />';
				} else {
					echo '<a href="admin.php?page=fssc-categories&f=down&id='.$Categories->categories_id.'&pid='.$Categories->parent_id.'"><img src="'.get_option('home').'/wp-content/plugins/fs-shopping-cart/images/btn-mini-down.gif" border="0" alt="DOWN"></a><br />';
				}
				echo '</td>';
				if ($Categories->categories_visibility == 1) {
					$visibility = '';
				} else {
					$visibility = ' <font color="#990000">[hidden]</font>';
				}
				$tab = '';
				for ($i=1; $i<$Recurrence; $i++) {
					$tab .= '&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;';
				}
				echo '<td>'.$tab.stripslashes($Categories->categories_name);
				if ($Categories->categories_visibility == 0) {
					echo '&nbsp;&nbsp;<span style="color: #990000">[hidden]</span>';
				}
				echo '<br />'.$tab.'<a href="admin.php?page=fssc-categories&f=edit&id='.$Categories->categories_id.'&pid='.$Categories->parent_id.'">edit</a> | <a href="admin.php?page=fssc-categories&f=del&id='.$Categories->categories_id.'&pid='.$Categories->parent_id.'" onClick="return confirm(\'Are you sure you want to delete this category along with any subcategories in this category?\')">delete</a></td></tr>';
				fssc_categories ($Categories->categories_id, $Recurrence);
			}
		}
	}

	if (isset($_GET['f'])) {
		if ($_GET['f'] == "add"){
			$ShowCategoryListing = FALSE;
			if (isset($_POST['submit'])) {
				$url = fssc_url_generator($_POST['categories_name']);
				$CategoryURLCheck = $wpdb->get_var("SELECT COUNT(*) FROM ".$wpdb->prefix."fssc_categories WHERE categories_url = '$url'");
				if ($CategoryURLCheck > 0) {
					for ($i=1;$i<99;$i++) {
						$newurl = $url.$i;
						$NewURLCheck = $wpdb->get_var("SELECT COUNT(*) FROM ".$wpdb->prefix."fssc_categories WHERE categories_url = '$newurl'");
						if ($NewURLCheck == 0) {
							$url = $newurl;
							$i = 100;
						}
					}
				}
				
				$OrderCount = $wpdb->get_var("SELECT COUNT(*) FROM ".$wpdb->prefix."fssc_categories WHERE parent_id = ".$_POST['parent_id']);
				$OrderCount++;
				$wpdb->query("INSERT INTO ".$wpdb->prefix."fssc_categories (
															categories_visibility, 
															parent_id, 
															categories_name, 
															categories_url, 
															categories_description, 
															categories_meta_description, 
															categories_meta_keywords, 
															categories_order
														)	VALUES (
															".$_POST['categories_visibility'].", 
															".$_POST['parent_id'].", 
															'".addslashes($_POST['categories_name'])."', 
															'$url', 
															'".addslashes($_POST['categories_description'])."', 
															'".addslashes($_POST['categories_meta_description'])."', 
															'".addslashes($_POST['categories_meta_keywords'])."', 
															$OrderCount
														)");
				
				$AddedCategoryID = $wpdb->get_var("SELECT categories_id FROM ".$wpdb->prefix."fssc_categories ORDER BY categories_id DESC LIMIT 1");
				$uploaddir = ABSPATH.'wp-content/uploads/fscart/categories/temp/';
				$uploadfile = $uploaddir . basename($_FILES['file']['name']);
				if (move_uploaded_file($_FILES['file']['tmp_name'], $uploadfile)) {
					rename($uploadfile, $uploaddir.basename($_FILES['file']['name']));
					fssc_imageresizer($uploaddir.basename($_FILES['file']['name']), ABSPATH.'wp-content/uploads/fscart/categories/'.$AddedCategoryID.'.jpg', 160, 160);
					fssc_imageresizer($uploaddir.basename($_FILES['file']['name']), ABSPATH.'wp-content/uploads/fscart/categories/small/'.$AddedCategoryID.'.jpg', 100, 100);
					fssc_imageresizer($uploaddir.basename($_FILES['file']['name']), ABSPATH.'wp-content/uploads/fscart/categories/enlarged/'.$AddedCategoryID.'.jpg', 800, 800);
					rename(ABSPATH.'wp-content/uploads/fscart/categories/enlarged/'.basename($_FILES['file']['name']), ABSPATH.'wp-content/uploads/fscart/categories/enlarged/'.$AddedCategoryID.'.jpg');
					unlink($uploaddir.basename($_FILES['file']['name']));
				}
				
				echo '<div class="wrap">';
				echo '<h2>Add Category</h2>';
				echo '<div id="message" class="updated fade"><p><strong>Your category has been added.</strong> <a href="admin.php?page=fssc-categories&f=edit&id='.$AddedCategoryID.'&pid='.$_POST['parent_id'].'">Click here</a> to edit your category.</p></div>';
				echo '</div>';
			} else {
				$CategoryID = '';
				$CategoryDetails = '';
				echo '<div class="wrap">';
				echo '<h2>Add Category</h2>';
				echo '<form name="add-category" action="admin.php?page=fssc-categories&f=add" enctype="multipart/form-data" method="POST"><input type="hidden" name="MAX_FILE_SIZE" value="10000000" />';				
				include('forms/categories.php');
				echo '</form>';
				echo '</div>';
			}			
		} elseif ($_GET['f'] == "edit"){
			$ShowCategoryListing = FALSE;
			echo '<div class="wrap">';
			echo '<h2>Edit Category</h2>';
			if (isset($_POST['submit'])) {
				$ParentID = $wpdb->get_var("SELECT parent_id FROM ".$wpdb->prefix."fssc_categories WHERE categories_id = ".$_GET['id']);
				if ($ParentID != $_POST['parent_id']) {
					$OrderCount = $wpdb->get_var("SELECT COUNT(*) FROM ".$wpdb->prefix."fssc_categories WHERE parent_id = ".$_POST['parent_id']);
					$OrderCount++;
					$wpdb->query("UPDATE ".$wpdb->prefix."fssc_categories SET parent_id = '".$_POST['parent_id']."' WHERE categories_id = ".$_GET['id']);
					$wpdb->query("UPDATE ".$wpdb->prefix."fssc_categories SET categories_order = $OrderCount WHERE categories_id = ".$_GET['id']);
					$OrderCount = 0;
					$CategoryOrder = $wpdb->get_results("SELECT * FROM ".$wpdb->prefix."fssc_categories WHERE parent_id = $ParentID ORDER BY categories_order");
					foreach ($CategoryOrder as $CategoryOrder) {
						$OrderCount++;
						$wpdb->query("UPDATE ".$wpdb->prefix."fssc_categories SET categories_order = $OrderCount WHERE categories_id = ".$CategoryOrder->categories_id);
					}
				}
				
				$wpdb->query("UPDATE ".$wpdb->prefix."fssc_categories SET 
				categories_visibility = '".$_POST['categories_visibility']."',
				categories_toolbar = '".$_POST['categories_toolbar']."',
				categories_name = '".addslashes($_POST['categories_name'])."', 
				categories_meta_description = '".addslashes($_POST['categories_meta_description'])."', 
				categories_description = '".addslashes($_POST['categories_description'])."', 
				categories_meta_keywords = '".addslashes($_POST['categories_meta_keywords'])."', 
				categories_url = '".$_POST['categories_url']."', 
				categories_custom_order = '".$_POST['categories_custom_order']."' 
				WHERE categories_id = '".$_GET['id']."'");
				
				if ($_FILES['file']['name'] != "") {
					if (file_exists(ABSPATH.'wp-content/uploads/fscart/categories/'.$_GET['id'].'.jpg')) { unlink(ABSPATH.'wp-content/uploads/fscart/categories/'.$_GET['id'].'.jpg'); }
					if (file_exists(ABSPATH.'wp-content/uploads/fscart/categories/thumbs/'.$_GET['id'].'.jpg')) { unlink(ABSPATH.'wp-content/uploads/fscart/categories/thumbs/'.$_GET['id'].'.jpg'); }
					if (file_exists(ABSPATH.'wp-content/uploads/fscart/categories/enlarged/'.$_GET['id'].'.jpg')) { unlink(ABSPATH.'wp-content/uploads/fscart/categories/enlarged/'.$_GET['id'].'.jpg'); }
					$uploaddir = ABSPATH.'wp-content/uploads/fscart/categories/temp/';
					$uploadfile = $uploaddir . basename($_FILES['file']['name']);
					if (move_uploaded_file($_FILES['file']['tmp_name'], $uploadfile)) {
						rename($uploadfile, $uploaddir.basename($_FILES['file']['name']));
						fssc_imageresizer($uploaddir.basename($_FILES['file']['name']), ABSPATH.'wp-content/uploads/fscart/categories/'.$_GET['id'].'.jpg', 160, 160);
						fssc_imageresizer($uploaddir.basename($_FILES['file']['name']), ABSPATH.'wp-content/uploads/fscart/categories/small/'.$_GET['id'].'.jpg', 100, 100);
						fssc_imageresizer($uploaddir.basename($_FILES['file']['name']), ABSPATH.'wp-content/uploads/fscart/categories/enlarged/'.$_GET['id'].'.jpg', 800, 800);
						rename(ABSPATH.'wp-content/uploads/fscart/categories/enlarged/'.basename($_FILES['file']['name']), ABSPATH.'wp-content/uploads/fscart/categories/enlarged/'.$_GET['id'].'.jpg');
						unlink($uploaddir.basename($_FILES['file']['name']));
					}
				}
				
				echo '<div id="message" class="updated fade"><p><strong>Your category has been updated.</strong> <a href="admin.php?page=fssc-categories">Click here</a> to view all categories.</p></div>';
			}
			$CategoryID = $_GET['id'];
			$CategoryDetails = $wpdb->get_row("SELECT * FROM ".$wpdb->prefix."fssc_categories WHERE categories_id = ".$CategoryID);
			echo '<form name="edit-category" action="admin.php?page=fssc-categories&f=edit&id='.$CategoryID.'" enctype="multipart/form-data" method="POST"><input type="hidden" name="MAX_FILE_SIZE" value="10000000" />';				
			include('forms/categories.php');
			echo '</form>';
			echo '</div>';
		} elseif ($_GET['f'] == "down" || $_GET['f'] == "up") {
			$NewID = $_GET['id'];
			$NewCategoryInfo = $wpdb->get_row("SELECT * FROM ".$wpdb->prefix."fssc_categories WHERE categories_id = $NewID");
			$OldOrder = $NewCategoryInfo->categories_order;
			if ($_GET['f'] == "down") { 
				echo 'down';
				$NewOrder = $NewCategoryInfo->categories_order + 1;
			} else {
				echo 'up';
				$NewOrder = $NewCategoryInfo->categories_order - 1;
			}
			$OldCategoryOrder = $wpdb->get_row("SELECT * FROM ".$wpdb->prefix."fssc_categories WHERE categories_order = $NewOrder AND parent_id = ".$_GET['pid']);
			if (count($OldCategoryOrder) > 0) {
				$OldID = $OldCategoryOrder->categories_id;
				$wpdb->query("UPDATE ".$wpdb->prefix."fssc_categories SET categories_order = $NewOrder WHERE categories_id = $NewID");
				$wpdb->query("UPDATE ".$wpdb->prefix."fssc_categories SET categories_order = $OldOrder WHERE categories_id = $OldID");
			}
		} elseif ($_GET['f'] == "del" && $_GET['id'] != ""){
			$wpdb->query("DELETE FROM ".$wpdb->prefix."fssc_categories WHERE categories_id = ".$_GET['id']);
			$wpdb->query("DELETE FROM ".$wpdb->prefix."fssc_categories WHERE parent_id = ".$_GET['id']);
			$wpdb->query("DELETE FROM ".$wpdb->prefix."fssc_products_to_categories WHERE categories_id = ".$_GET['id']);
			$count = 0;
			$UpdateCategoryOrdering = $wpdb->get_results("SELECT categories_id, parent_id, categories_order FROM ".$wpdb->prefix."fssc_categories WHERE parent_id = ".$_GET['pid']." ORDER BY categories_order");
			foreach ($UpdateCategoryOrdering as $UpdateCategoryOrdering) {
				$count++;
				$wpdb->query("UPDATE ".$wpdb->prefix."fssc_categories SET categories_order = $count WHERE categories_id = ".$UpdateCategoryOrdering->categories_id);
			}
			if (file_exists(ABSPATH.'wp-content/uploads/fscart/categories/'.$_GET['id'].'.jpg')) { unlink(ABSPATH.'wp-content/uploads/fscart/categories/'.$_GET['id'].'.jpg'); }
			if (file_exists(ABSPATH.'wp-content/uploads/fscart/categories/small/'.$_GET['id'].'.jpg')) { unlink(ABSPATH.'wp-content/uploads/fscart/categories/small/'.$_GET['id'].'.jpg'); }
			if (file_exists(ABSPATH.'wp-content/uploads/fscart/categories/enlarged/'.$_GET['id'].'.jpg')) { unlink(ABSPATH.'wp-content/uploads/fscart/categories/enlarged/'.$_GET['id'].'.jpg'); }	
			echo '<div class="wrap">';
			echo '<div id="message" class="updated fade"><p><strong>Your category has been deleted.</strong></div>';
			echo '</div>';
			
		}
	}
	if ($ShowCategoryListing == TRUE) {
		echo '<div class="wrap">';
		echo '<h2>Categories <a href="admin.php?page=fssc-categories&f=add" class="add-new-h2">Add New</a> </h2> ';
		echo '<table class="widefat page fixed" cellspacing="0">
			<thead>
			<tr>
			<th scope="col" id="date" class="manage-column" style="width: 50px;">&nbsp;</th>
			<th scope="col" id="title" class="manage-column" style="">Categories</th>
			</tr>
			</thead>
			<tfoot>
			<tr>
			<th scope="col" class="manage-column" style="width: 50px;">&nbsp;</th>
			<th scope="col" class="manage-column" style="">Categories</th>
			</tr>
			</tfoot>
			<tbody>';
			fssc_categories (0, 0);
		echo '</tbody></table>';
		echo '</div>';
	}
}
?>