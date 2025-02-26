<?php require('../paam-config-ajax.php'); ?>

<?php
	/******************************************************************
	 * Process and collect data
	 ******************************************************************/
	$sku = null;
	if (isset($_GET['sku_id'])) {
		// get current post's related skus
		$sku = PA_AssetsManager_AssetsFactory::getSku(intval($_GET['sku_id']));
		if ($sku) {
			$sku_assets = PA_AssetsManager_AssetsFactory::getSkuAssets($sku->sku_id);
		}
	}
?>

<script type="text/javascript" src="<?php echo PAAM_PLUGINURL; ?>/js/upload-handlers.js"></script>
<script type="text/javascript">
jQuery(function() {
	swfu = new SWFUpload({
		// Backend Settings
		upload_url: PAAM_PLUGIN_URL + "/upload.php",

		// File Upload Settings
		file_size_limit : "1MB",	// 2MB
		file_types : "*.jpg; *.png; *.gif",
		file_types_description : "JPG, PNG and GIF Images",
		file_upload_limit : "0",

		// Event Handler Settings - these functions as defined in Handlers.js
		//  The handlers are not part of SWFUpload but are part of my website and control how
		//  my website reacts to the SWFUpload events.
		//file_queue_error_handler : fileQueueError,
		file_dialog_complete_handler : fileDialogComplete,
		upload_progress_handler : uploadProgress,
		upload_error_handler : uploadError,
		upload_success_handler : uploadSuccess,
		upload_complete_handler : uploadComplete,

		// Button Settings
		button_placeholder_id : "varietal-upload-button",
		button_width: 180,
		button_height: 18,
		button_text : '<span class="button">Upload Image (1 MB Max)</span>',
		button_text_style : '.button {font-family: Helvetica, Arial, sans-serif; font-size: 12pt; }',
		button_text_top_padding: 0,
		button_text_left_padding: 0,
		button_window_mode: SWFUpload.WINDOW_MODE.TRANSPARENT,
		button_cursor: SWFUpload.CURSOR.HAND,
		
		// Flash Settings
		flash_url : PAAM_WP_URL + "/wp-includes/js/swfupload/swfupload.swf",

		custom_settings : {
			upload_target : "varietal-image-progress"
		},
		
		// Debug Settings
		debug: false
	});
	
	/*jQuery('#paam-add-new').click(function() {
		PAAM.loadProductForm();			   
	});*/
	
	jQuery('#edit-varietal-form').submit(function() {
		PAAM.showLoader();
		var skuName = jQuery('#paam_sku').val();
		var description = jQuery('#paam_description').val();
		var thumb = jQuery('#paam_image').val();
		var postID = jQuery('#post_ID').val();
		var skuID = null;
		if (jQuery('#paam_skuid') != null) {
			skuID = jQuery('#paam_skuid').val();	
		}
		jQuery.post('<?php echo PAAM_PLUGINURL; ?>/paam-ajax.php', {
						paam_action : 'save_sku', 
						post_id : postID,
						paam_skuid : skuID,
						paam_skuname : skuName,
						paam_skudescription : description,
						paam_skuthumbnail : thumb
					}, function(rawResponse) {
						var resp = eval('(' + rawResponse + ')');
						PAAM.loadProductForm();
						PAAM.hideLoader();
					});
		return false;
	});
	
	jQuery('#paam-add-asset').click(function() {
		PAAM.loadAsset(<?php echo $_GET['sku_id']; ?>);
		return false;
	});
	
	jQuery('.paam-edit-asset').click(function() {
		var assetID = jQuery(this).attr('rel');
		PAAM.loadAsset(<?php echo (isset($_GET['sku_id']) ? $_GET['sku_id'] : "''"); ?>, assetID);
		return false;
	});
	
	jQuery('#paam-edit-cancel').click(function() {
		PAAM.loadProductForm();
		return false;
	});
	
	jQuery('#delete-assets').click(function() {
		PAAM.showLoader();
		var assetsToDelete = '';
		jQuery('.asset-id:checked', '#paam_assetsmanager').each(function() {
			var val = jQuery(this).val();	
			assetsToDelete += val + ',';
		});
		jQuery.post('<?php echo PAAM_PLUGINURL; ?>/paam-ajax.php', {
						paam_action : 'delete_assets', 
						paam_assetstodelete : assetsToDelete
					}, function(rawResponse) {
						var resp = eval('(' + rawResponse + ')');
						PAAM.loadSku(<?php echo $_GET['sku_id']; ?>);
					});
		return false;
	});

});
</script>

<?php if ($sku) : ?>
	<p><strong>Edit an Asset</strong></p>
<?php else : ?>
	<p><strong>Add an Asset</strong></p>
<?php endif; ?>

<form id="edit-varietal-form" action="<?php echo $_SERVER['REQUEST_URI']; ?>" method="post">
	<input type="hidden" id="paam_skuid" name="paam_skuid" value="<?php echo $sku->sku_id; ?>" />
    <table class="form-table" style="width:100%;">
        <tr class="form-field">
            <th scope="row">
                <label for="paam_sku">Asset Name</label>
            </th>
            <td>
                <input type="text" name="paam_sku" id="paam_sku" value="<?php echo $sku->sku_name; ?>" />
            </td>
        </tr>
        <tr class="form-field">
            <th scope="row">
                <label for="paam_description">Description</label>
            </th>
            <td>
                <textarea name="paam_description" id="paam_description"><?php echo $sku->sku_description; ?></textarea>
            </td>
        </tr>
        <tr class="form-field">
            <th scope="row">
                <label for="paam_image">Image</label>
            </th>
            <td>
            	<div id="varietal-image-panel">
                    <span id="varietal-upload-button"></span>
                    <div id="varietal-image-progress"></div>
               	</div>
                <br />
				<div id="varietal-image"><?php if ($sku->sku_thumbnail) : ?><img class="paam-thumbnail" src="<?php echo PAAM_IMAGEUPLOADURL . '/' . $sku->sku_thumbnail; ?>" alt="<?php echo $sku->sku_thumbnail; ?>" /><?php endif; ?></div>
                <input type="hidden" id="paam_image" name="paam_image" value="<?php echo $sku->sku_thumbnail; ?>" />
            </td>
        </tr>
        <tr>
            <td><input type="submit" class="button" value="Save" /> <a href="#" id="paam-edit-cancel">Cancel</a></td>
            <td></td>
        </tr>
    </table>
</form>