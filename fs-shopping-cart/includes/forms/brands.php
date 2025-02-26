<div id="poststuff" class="metabox-holder has-right-sidebar">        
<div id="side-info-column" class="inner-sidebar">
  <div id="side-sortables" class="meta-box-sortables ui-sortable">
  	<div id="submitdiv" class="postbox ">
      <div class="handlediv" title="Click to toggle"><br></div>
      <h3 class="hndle"><span>Brand/Vendor Information</span></h3>
      <div class="inside">
        <div class="submitbox" id="submitpost">
          <div id="minor-publishing">
            <div id="misc-publishing-actions" style="border-bottom: none;">
              <div class="misc-pub-section">Status: <span id="post-status-display">
                <select name="brand_visibility">
                  <option value="1"<?php if ($BrandDetails->brand_visibility == 1) { echo ' selected'; } ?>>Visible</option>
                  <option value="0"<?php if ($BrandDetails->brand_visibility == 0) { echo ' selected'; } ?>>Hidden</option>
                </select>
              </span></div>
            	<?php if ($BrandID != '') { ?>
                <div class="misc-pub-section">Products: <span id="post-status-display"><?php echo $wpdb->get_var("SELECT COUNT(*) FROM ".$wpdb->prefix."fssc_products_to_brands WHERE brand_id = ".$BrandID); ?></span></div>
                <div id="publishing-action" style="padding: 10px;"><input type="submit" name="submit" id="publish" class="button-primary" value="Update Brand/Vendor" tabindex="5" accesskey="p"></div>
              <?php } else { ?>
                <div class="misc-pub-section">Status: <span id="post-status-display">To be added...</span></div>
                <div id="publishing-action" style="padding: 10px;"><input type="submit" name="submit" id="publish" class="button-primary" value="Add Brand/Vendor" tabindex="5" accesskey="p"></div>
              <?php } ?>
            </div>
            <div class="clear"></div>
          </div>
        </div>
      </div>
    </div>

		<?php if ($BrandID != '') { ?>
    <div id="postimagediv" class="postbox ">
      <div class="handlediv" title="Click to toggle"><br></div>
      <h3 class="hndle"><span>Feature in Widget</span></h3>
      <div class="inside">
        <select name="brand_widget_featured">
          <?php
            $selected1 = "selected";
            $selected2 = "";
            if ($BrandDetails->brand_widget_featured == 0) {
              $selected1 = "";
              $selected2 = "selected";
            }
          ?>
          <option value="1" <?php print $selected1 ?>>Yes</option>
          <option value="0" <?php print $selected2 ?>>No</option>
        </select>
      </div>
    </div>
		<?php } ?>
		
		<?php if ($BrandID != '') { ?>
    <div id="postimagediv" class="postbox ">
      <div class="handlediv" title="Click to toggle"><br></div>
      <h3 class="hndle"><span>Permalink URL</span></h3>
      <div class="inside"><input type="text" name="brand_url" value="<?php echo $BrandDetails->brand_url; ?>" style="width: 255px;"></div>
    </div>
		<?php } ?>
	
    <div id="postimagediv" class="postbox ">
      <div class="handlediv" title="Click to toggle"><br></div>
      <h3 class="hndle"><span>Brand / Vendor Logo</span></h3>
      <div class="inside" style="text-align: center;">
				<?php
        $Picture = 'No Picture Uploaded';
        if (file_exists(ABSPATH.'wp-content/uploads/fscart/categories/'.$BrandID.'.jpg')) {
        	echo '<img src="'.get_option('home').'/wp-content/uploads/fscart/categories/'.$BrandID.'.jpg" style="border: 1px solid #999999;"><br /><br />';
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
				$ListingNameLabel = ''; if ($BrandID == '') { $ListingNameLabel = 'Enter brand/vendor name here.'; }
				echo '<div id="titlediv"><div id="titlewrap"><label class="hide-if-no-js" style="" id="title-prompt-text" for="title">'.$ListingNameLabel.'</label><input type="text" name="brand_name" size="30" tabindex="1" value="'.stripslashes($BrandDetails->brand_name).'" id="title" autocomplete="off"></div></div>';
				?><div id="poststuff"><?php the_editor(stripslashes($BrandDetails->brand_description), "brand_description", "", false); ?></div><p>&nbsp;</p><?php

				echo '<table class="widefat page fixed" cellspacing="0" border="1">
				<thead>
				<tr>
				<th scope="col" class="manage-column" width="200">General Information</th>
				<th scope="col" class="manage-column" colspan="2">&nbsp;</th>
				</tr>
				</thead>
				<tbody>';
				fssc_print_admin_input('Meta Title', 'brand_meta_title', $BrandDetails->brand_meta_title, 35, '', '');
				fssc_print_admin_textarea('Meta Description', 'brand_meta_description', $BrandDetails->brand_meta_description, 35, 6, '');
				fssc_print_admin_textarea('Meta Keywords', 'brand_meta_keywords', $BrandDetails->brand_meta_keywords, 35, 6, '');
				echo '</tbody></table><p>&nbsp;</p>';
			
			
				echo '</div>';
				echo '</div>';
?>
