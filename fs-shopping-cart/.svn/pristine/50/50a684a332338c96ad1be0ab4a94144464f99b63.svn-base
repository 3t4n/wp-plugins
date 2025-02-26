<?php
	if (isset($_POST['submit'])) {
		$wpdb->query("INSERT INTO ".$wpdb->prefix."fssc_products_images (products_id) VALUES (".$_GET['pid'].")");
		$ImageID = $wpdb->get_var("SELECT images_id FROM ".$wpdb->prefix."fssc_products_images ORDER BY images_id DESC LIMIT 1");
		$uploaddir = ABSPATH.'wp-content/uploads/fscart/products/temp/';
		$uploadfile = $uploaddir . basename($_FILES['file']['name']);
		if (move_uploaded_file($_FILES['file']['tmp_name'], $uploadfile)) {
			rename($uploadfile, $uploaddir.basename($_FILES['file']['name']));
			fssc_imageresizer($uploaddir.basename($_FILES['file']['name']), ABSPATH.'wp-content/uploads/fscart/products/additional/'.$ImageID.'.jpg', $fscartconfig['MaxStandardPictureSize'], $fscartconfig['MaxStandardPictureSize']);
			fssc_imageresizer($uploaddir.basename($_FILES['file']['name']), ABSPATH.'wp-content/uploads/fscart/products/additional/small/'.$ImageID.'.jpg', $fscartconfig['MaxThumbnailSize'], $fscartconfig['MaxThumbnailSize']);
			fssc_imageresizer($uploaddir.basename($_FILES['file']['name']), ABSPATH.'wp-content/uploads/fscart/products/additional/enlarged/'.$ImageID.'.jpg', 800, 600);
			unlink($uploaddir.basename($_FILES['file']['name']));
			echo '<div id="message" class="updated fade"><p><strong>Your product has been uploaded.</strong></p></div>';
		} else {
			echo '<div id="message" class="updated fade"><p><strong>There was an error uploading the image.</strong></p></div>';
		}
	}
	if (isset($_GET['del'])) {
		$wpdb->query("DELETE FROM ".$wpdb->prefix."fssc_products_images WHERE images_id = ".$_GET['del']);
		if (file_exists(ABSPATH.'wp-content/uploads/fscart/products/additional/'.$_GET['del'].'.jpg')) { unlink(ABSPATH.'wp-content/uploads/fscart/products/additional/'.$_GET['del'].'.jpg'); }
		if (file_exists(ABSPATH.'wp-content/uploads/fscart/products/additional/enlarged/'.$_GET['del'].'.jpg')) { unlink(ABSPATH.'wp-content/uploads/fscart/products/additional/enlarged/'.$_GET['del'].'.jpg'); }
		if (file_exists(ABSPATH.'wp-content/uploads/fscart/products/additional/small/'.$_GET['del'].'.jpg')) { unlink(ABSPATH.'wp-content/uploads/fscart/products/additional/small/'.$_GET['del'].'.jpg'); }
		echo '<div id="message" class="updated fade"><p><strong>Your image has been deleted.</strong></p></div>';
	}

	echo '<h2>Add Image</h2>';
		echo '<form name="add-product" action="admin.php?page=fssc-products&fp=images&f=iadd&cid='.$_GET['cid'].'&pid='.$_GET['pid'].'" enctype="multipart/form-data" method="POST">';
		echo '<input type="hidden" name="MAX_FILE_SIZE" value="10000000" />';
		echo '<table class="widefat page fixed" cellspacing="0" border="1">
		<thead>
		<tr>
		<th scope="col" class="manage-column" width="200"><b>Add Image</b></th>
		<th scope="col" class="manage-column">&nbsp;</th>
		</tr>
		</thead>
		<tfoot>
		<tr>
		<th scope="col" class="manage-column" width="200">&nbsp;</th>
		<th scope="col" class="manage-column"><input type="submit" name="submit" class="button-primary" value="Upload Image" style="padding: 3px 8px;"></th>
		</tr>
		</tfoot>
		<tbody>
		<tr>
		<td>Upload Image</td>
		<td><input name="file" type="file" size="35"></td>
		</tr>
		</tbody></table><br />';
	echo '<table class="widefat page fixed" cellspacing="0" border="1">
		<thead>
		<tr>
		<th scope="col" class="manage-column"><b>Current Images</b></th>
		</tr>
		</thead>
		<tbody>
		<tr>
		<td>';
		$Images = $wpdb->get_results("SELECT * FROM ".$wpdb->prefix."fssc_products_images WHERE products_id = ".$_GET['pid']." ORDER BY images_id");
		foreach ($Images as $Images) {
			echo '<div style="float: left; padding-right: 5px; text-align: center;"><img src="'.get_option('home').'/wp-content/uploads/fscart/products/additional/small/'.$Images->images_id.'.jpg" border="0"><br /><a href="admin.php?page=fssc-products&fp=images&f=iadd&cid='.$_GET['cid'].'&pid='.$_GET['pid'].'&del='.$Images->images_id.'" onClick="return confirm(\'Are you sure you want to remove this image?\')">remove</a></div>';
		}
		echo '</td>
		</tr>
		</tbody></table>';
?>