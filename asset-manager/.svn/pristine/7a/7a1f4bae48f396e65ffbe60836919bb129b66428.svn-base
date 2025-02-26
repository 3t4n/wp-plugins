<?php require('../paam-config-ajax.php'); ?>

<?php
	/******************************************************************
	 * Process and collect data
	 ******************************************************************/
	$asset = null;
	if (isset($_GET['asset_id'])) {
		// get current post's related skus
		$asset = PA_AssetsManager_AssetsFactory::getAsset(intval($_GET['asset_id']));
	}
?>

<script type="text/javascript" src="<?php echo PAAM_PLUGINURL; ?>/js/upload-handlers.js"></script>
<script type="text/javascript">
jQuery(function() {
	swfu = new SWFUpload({
		// Backend Settings
		upload_url: PAAM_PLUGIN_URL + "/upload.php",

		// File Upload Settings
		file_size_limit : "10MB",	// 2MB
		file_types : "*.*",
		file_types_description : "All files",
		file_upload_limit : "0",

		// Event Handler Settings - these functions as defined in Handlers.js
		//  The handlers are not part of SWFUpload but are part of my website and control how
		//  my website reacts to the SWFUpload events.
		//file_queue_error_handler : fileQueueError,
		file_dialog_complete_handler : fileDialogComplete,
		upload_progress_handler : uploadProgress,
		upload_error_handler : uploadError,
		upload_success_handler : uploadSuccessAsset,
		upload_complete_handler : uploadComplete,

		// Button Settings
		button_placeholder_id : "asset-upload-button",
		button_width: 180,
		button_height: 18,
		button_text : '<span class="button">Upload Asset (10MB Max)</span>',
		button_text_style : '.button {font-family: Helvetica, Arial, sans-serif; font-size: 12pt; }',
		button_text_top_padding: 0,
		button_text_left_padding: 0,
		button_window_mode: SWFUpload.WINDOW_MODE.TRANSPARENT,
		button_cursor: SWFUpload.CURSOR.HAND,
		
		// Flash Settings
		flash_url : PAAM_WP_URL + "/wp-includes/js/swfupload/swfupload.swf",

		custom_settings : {
			upload_target : "asset-file-progress"
		},
		
		// Debug Settings
		debug: false
	});
	
	/*jQuery('#paam-add-new').click(function() {
		PAAM.loadProductForm();			   
	});*/
	
	jQuery('#edit-asset-form').submit(function() {
		PAAM.showLoader();
		var assetTitle = jQuery('#paam_assettitle').val();
		var assetFile = jQuery('#paam_assetfile').val();
		
		var skuID = <?php echo $_GET['sku_id']; ?>;
		var assetID = null;
		
		if (jQuery('#paam_assetid') != null) {
			assetID = jQuery('#paam_assetid').val();	
		}
		jQuery.post('<?php echo PAAM_PLUGINURL; ?>/paam-ajax.php', {
						paam_action : 'save_asset', 
						sku_id : skuID,
						paam_assetid : assetID,
						paam_assettitle : assetTitle,
						paam_assetfile : assetFile
					}, function(rawResponse) {
						var resp = eval('(' + rawResponse + ')');
						PAAM.loadSku(resp.skuID);
						PAAM.hideLoader();
					});
		return false;
	});
	
	jQuery('#paam-edit-cancel').click(function() {
		PAAM.loadSku(<?php echo $_GET['sku_id']; ?>);
		return false;
	});

});
</script>

<?php if ($asset) : ?>
	<p><strong>Edit Asset</strong></p>
<?php else : ?>
	<p><strong>Add an Asset</strong></p>
<?php endif; ?>

<form id="edit-asset-form" action="<?php echo $_SERVER['REQUEST_URI']; ?>" method="post">
	<input type="hidden" id="paam_assetid" name="paam_assetid" value="<?php echo $asset->asset_id; ?>" />
    <table class="form-table" style="width:100%;">
        <tr class="form-field">
            <th scope="row">
                <label for="paam_assettitle">Asset Title</label>
            </th>
            <td>
                <input type="text" name="paam_assettitle" id="paam_assettitle" value="<?php echo $asset->asset_title; ?>" />
            </td>
        </tr>
        <tr class="form-field">

            <th scope="row">
                <label for="paam_assetfile">Asset File</label>
            </th>
            <td>
            	<div id="asset-file-panel">
                    <span id="asset-upload-button"></span>
                    <div id="asset-file-progress"></div>
               	</div>
                <br />
				<div id="asset-file">
					<?php if ($asset->asset_filename) : ?>
                		<a target="_blank" href="<?php echo PAAM_IMAGEUPLOADURL . '/' . $asset->asset_filename; ?>">
							<?php echo $asset->asset_filename; ?>
						</a>
					<?php endif; ?>
               	</div>
                <input type="hidden" id="paam_assetfile" name="paam_assetfile" value="<?php echo $asset->asset_filename; ?>" />
            </td>
        </tr>
        <tr>
            <td><input type="submit" class="button" value="Save" /> <a href="#" id="paam-edit-cancel">Cancel</a></td>
            <td></td>
        </tr>
    </table>
</form>