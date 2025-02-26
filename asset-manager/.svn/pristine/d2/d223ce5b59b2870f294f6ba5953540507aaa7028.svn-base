<script type="text/javascript">
	// PAAM_PLUGIN_URL set in asset-manager/admin/admin.php
	var PAAM_CONTEXT = '#paam_assetsmanager';
	
	var PAAM = {};
	
	
		
	PAAM.hideLoader = function() {
		jQuery('#paam-loading', PAAM_CONTEXT).fadeOut();	
	}
	
	PAAM.showLoader = function() {
		jQuery('#paam-loading', PAAM_CONTEXT).fadeIn();	
	}
	
	PAAM.loadAsset = function(skuID, assetID) {
		PAAM.showLoader();
		if (assetID) {
			jQuery('#varietal-form').load(PAAM_PLUGIN_URL + '/views/form-edit-asset.php?post=' + <?php echo intval($_GET['post']); ?> + '&sku_id=' + skuID + '&asset_id=' + assetID, null, PAAM.hideLoader);
		} else {
			jQuery('#varietal-form').load(PAAM_PLUGIN_URL + '/views/form-edit-asset.php?post=' + <?php echo intval($_GET['post']); ?> + '&sku_id=' + skuID, null, PAAM.hideLoader);
		}
	}
	
	PAAM.loadProductForm = function() {
		PAAM.showLoader();
		setTimeout('PAAM.loadVarietalForm();', 800);	
		return false;
	}
	
	PAAM.loadVarietalForm = function() {
		var postID = jQuery('#post_ID').val();
		if (postID <= 0) {
			// post ID not set, attempt again.
			PAAM.loadProductForm();	
		}
		jQuery('#varietal-assets').children().remove();
		jQuery('#varietal-form').load(PAAM_PLUGIN_URL + '/views/manage-skus.php?post=' + postID, null, PAAM.hideLoader);	
	}
	
	PAAM.loadSku = function(skuID) {
		jQuery('#varietal-assets').children().remove();
		if (skuID) {
			jQuery('#varietal-form').load(PAAM_PLUGIN_URL + '/views/form-edit-sku.php?post=' + <?php echo intval($_GET['post']); ?> + '&sku_id=' + skuID, null, PAAM.hideLoader);	
		} else {
			jQuery('#varietal-form').load(PAAM_PLUGIN_URL + '/views/form-edit-sku.php?post=' + <?php echo intval($_GET['post']); ?>, null, PAAM.hideLoader);		
		}
	}
	
	// Init
	jQuery(function() {
					
		// check for post title (which means #post_ID is set
		var postID = jQuery('#post_ID').val();
		if (postID > 0) {
			PAAM.loadProductForm(); 
		} else {
			jQuery('#paam-loading', PAAM_CONTEXT).fadeOut();	
		}
		
		// check for post changes
		jQuery('#title').change(function() {
			PAAM.loadProductForm();										
		});
	});
</script>
<div id="varietal-form">
	<?php global $post_ID; if (!$post_ID) : ?>
        <p>Enter a title for this post in order to add assets.</p>
	<?php endif; ?>
</div>

<div id="varietal-assets"></div>

