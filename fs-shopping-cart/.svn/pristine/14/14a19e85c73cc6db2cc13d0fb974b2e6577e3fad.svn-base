<?php
			if (isset($_POST['submit'])) {
				$wpdb->query("INSERT INTO ".$wpdb->prefix."fssc_products_variations (products_id, variation_name) VALUES (".$_GET['pid'].", '".addslashes($_POST['variation_name'])."')");
			}
			if (isset($_GET['del'])) {
				$wpdb->query("DELETE FROM ".$wpdb->prefix."fssc_products_variations WHERE variation_id = ".$_GET['del']);
			}
			?>
      <h2>Product Variations</h2>
			<form name="add-variation" action="admin.php?page=fssc-products&fp=general&f=var&cid=<?php print $_GET['cid']; ?>&pid=<?php print $_GET['pid']; ?>" method="POST">
      <table class="widefat page fixed" cellspacing="0">
        <thead>
        <tr>
          <th scope="col" id="title" class="manage-column" width="100">Add Variation</th>
          <th scope="col" id="title" class="manage-column">&nbsp;</th>
        </tr>
        </thead>
        <tfoot>
        <tr>
          <th scope="col" id="title" class="manage-column">&nbsp;</th>
          <th scope="col" id="title" class="manage-column"><input type="submit" name="submit" class="button-primary" value="Add Variation" style="padding: 3px 8px;"></th>
        </tr>
        </tfoot>
        <tbody>
          <tr>
            <td><strong>Name:</strong></td>
            <td><input type="text" name="variation_name" value="" size="40"></td>
          </tr>
        </tbody>
      </table>
			</form>
      <p><br /></p>
      <table class="widefat page fixed" cellspacing="0">
        <thead>
        <tr>
          <th scope="col" id="title" class="manage-column" width="25">&nbsp;</th>
          <th scope="col" id="title" class="manage-column">Variations</th>
        </tr>
        </thead>
        <tfoot>
        <tr>
          <th scope="col" id="title" class="manage-column" width="25">&nbsp;</th>
          <th scope="col" id="title" class="manage-column">Variations</th>
        </tr>
        </tfoot>
        <tbody>
          <?php
					$Variations = $wpdb->get_results("SELECT * FROM ".$wpdb->prefix."fssc_products_variations WHERE products_id = ".$_GET['pid']." ORDER BY variation_name");
					foreach ($Variations as $Variations) {
						echo '<tr><td><a href="admin.php?page=fssc-products&f=var&cid='.$_GET['cid'].'&pid='.$_GET['pid'].'&del='.$Variations->variation_id.'"><img src="'.get_bloginfo('home').'/wp-content/plugins/fs-shopping-cart/images/cart-x.png" border="0" /></a></td><td><a href="admin.php?page=fssc-products&f=pricing&cid='.$_GET['cid'].'&pid='.$_GET['pid'].'&var='.$Variations->variation_id.'">'.$Variations->variation_name.'</a></td></tr>';
					}
					?>
        </tbody>
      </table>
