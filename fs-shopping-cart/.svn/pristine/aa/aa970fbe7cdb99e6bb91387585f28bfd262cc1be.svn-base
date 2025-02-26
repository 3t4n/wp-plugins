<div id="poststuff" class="metabox-holder has-right-sidebar">        
<div id="side-info-column" class="inner-sidebar">
  <div id="side-sortables" class="meta-box-sortables ui-sortable">
  	<div id="submitdiv" class="postbox ">
      <div class="handlediv" title="Click to toggle"><br></div>
      <h3 class="hndle"><span>Category Information</span></h3>
      <div class="inside">
        <div class="submitbox" id="submitpost">
          <div id="minor-publishing">
            <div id="misc-publishing-actions" style="border-bottom: none;">
              <div class="misc-pub-section">Status: <span id="post-status-display">
                <select name="categories_visibility">
                  <option value="1"<?php if ($CategoryDetails->categories_visibility == 1) { echo ' selected'; } ?>>Visible</option>
                  <option value="0"<?php if ($CategoryDetails->categories_visibility == 0) { echo ' selected'; } ?>>Hidden</option>
                </select>
              </span></div>
            	<?php if ($CategoryID != '') { ?>
                <div class="misc-pub-section">Sub Categories: <span id="post-status-display"><?php echo $wpdb->get_var("SELECT COUNT(*) FROM ".$wpdb->prefix."fssc_categories WHERE parent_id = ".$CategoryID); ?></span></div>
                <div class="misc-pub-section">Products: <span id="post-status-display"><?php echo $wpdb->get_var("SELECT COUNT(*) FROM ".$wpdb->prefix."fssc_products_to_categories WHERE categories_id = ".$CategoryID); ?></span></div>
                <div id="publishing-action" style="padding: 10px;"><input type="submit" name="submit" id="publish" class="button-primary" value="Update Category" tabindex="5" accesskey="p"></div>
              <?php } else { ?>
                <div class="misc-pub-section">Status: <span id="post-status-display">To be added...</span></div>
                <div id="publishing-action" style="padding: 10px;"><input type="submit" name="submit" id="publish" class="button-primary" value="Add Category" tabindex="5" accesskey="p"></div>
              <?php } ?>
            </div>
            <div class="clear"></div>
          </div>
        </div>
      </div>
    </div>

    <div id="postimagediv" class="postbox ">
      <div class="handlediv" title="Click to toggle"><br></div>
      <h3 class="hndle"><span>Parent Category</span></h3>
      <div class="inside">
        <select name="parent_id">
          <option value="0" $selected><-- PARENT CATEGORY --></option>
          <?php fssc_categories_basic (0, 0, $_GET['pid'], ''); ?>
        </select>
      </div>
    </div>
		
		<?php if ($CategoryID != '') { ?>
    <div id="postimagediv" class="postbox ">
      <div class="handlediv" title="Click to toggle"><br></div>
      <h3 class="hndle"><span>Permalink URL</span></h3>
      <div class="inside"><input type="text" name="categories_url" value="<?php echo $CategoryDetails->categories_url; ?>" style="width: 255px;"></div>
    </div>
		<?php } ?>
	
    <div id="postimagediv" class="postbox ">
      <div class="handlediv" title="Click to toggle"><br></div>
      <h3 class="hndle"><span>Custom Product Order</span></h3>
      <div class="inside">
        <select name="categories_custom_order">
          <option value="" <?php if ($CategoryDetails->categories_custom_order == '') { echo 'selected'; } ?>>Use Default Order</option>
          <option value="purchases" <?php if ($CategoryDetails->categories_custom_order == 'purchases') { echo 'selected'; } ?>>Sort by Purchases</option>
          <option value="views" <?php if ($CategoryDetails->categories_custom_order == 'views') { echo 'selected'; } ?>>Sort by Pageviews</option>
          <option value="addtocarts" <?php if ($CategoryDetails->categories_custom_order == 'addtocarts') { echo 'selected'; } ?>>Sort by Add to Carts</option>
          <option value="price" <?php if ($CategoryDetails->categories_custom_order == 'price') { echo 'selected'; } ?>>Sort by Price</option>
          <option value="partnumber" <?php if ($CategoryDetails->categories_custom_order == 'partnumber') { echo 'selected'; } ?>>Sort by Part Number</option>
          <option value="name" <?php if ($CategoryDetails->categories_custom_order == 'name') { echo 'selected'; } ?>>Sort by Name</option>
          <option value="order" <?php if ($CategoryDetails->categories_custom_order == 'order') { echo 'selected'; } ?>>Sort by My Custom Order</option>
        </select>
      </div>
    </div>

    <div id="postimagediv" class="postbox ">
      <div class="handlediv" title="Click to toggle"><br></div>
      <h3 class="hndle"><span>Category Image</span></h3>
      <div class="inside" style="text-align: center;">
				<?php
        $Picture = 'No Picture Uploaded';
        if (file_exists(ABSPATH.'wp-content/uploads/fscart/categories/'.$CategoryID.'.jpg')) {
        	echo '<img src="'.get_option('home').'/wp-content/uploads/fscart/categories/'.$CategoryID.'.jpg" style="border: 1px solid #999999;"><br /><br />';
        } else {
					echo '<p>Please upload a picture.</p>';
				}
        ?>
        <input type="file" name="image" value="" size="20">
      </div>
    </div>

  </div>
</div>               
        
        
        
        
        <?php
				
				echo '<div id="post-body">';
				echo '<div id="post-body-content">';
				$ListingNameLabel = ''; if ($CategoryID == '') { $ListingNameLabel = 'Enter category name here.'; }
				echo '<div id="titlediv"><div id="titlewrap"><label class="hide-if-no-js" style="" id="title-prompt-text" for="title">'.$ListingNameLabel.'</label><input type="text" name="categories_name" size="30" tabindex="1" value="'.stripslashes($CategoryDetails->categories_name).'" id="title" autocomplete="off"></div></div>';
				?><div id="poststuff"><?php the_editor(stripslashes($CategoryDetails->categories_description), "categories_description", "", false); ?></div><p>&nbsp;</p><?php

				echo '<table class="widefat page fixed" cellspacing="0" border="1">
				<thead>
				<tr>
				<th scope="col" class="manage-column" width="200">General Information</th>
				<th scope="col" class="manage-column" colspan="2">&nbsp;</th>
				</tr>
				</thead>
				<tbody>';
				fssc_print_admin_selectbox('Disable Tool Bar', 'categories_toolbar', $CategoryDetails->categories_toolbar, array('Yes' => '0', 'No' => '1'), '');
				fssc_print_admin_textarea('Meta Description', 'categories_meta_description', $CategoryDetails->categories_meta_description, 35, 6, '');
				fssc_print_admin_textarea('Meta Keywords', 'categories_meta_keywords', $CategoryDetails->categories_meta_keywords, 35, 6, '');
				echo '</tbody></table><p>&nbsp;</p>';
			
			
				echo '</div>';
				echo '</div>';
?>
