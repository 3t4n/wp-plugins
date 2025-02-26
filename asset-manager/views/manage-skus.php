<?php require('../paam-config-ajax.php'); ?>

<?php
	/******************************************************************
	 * Process and collect data
	 ******************************************************************/
	if (isset($_GET['post'])) {
		// get current post's related skus
		$skus = PA_AssetsManager_AssetsFactory::getSkusByPost(intval($_GET['post']));
	}
?>

<script type="text/javascript">
jQuery(function() {
		
	jQuery('#paam-add-new').click(function() {
		PAAM.loadSku();
		return false;
	});
		
	jQuery('#add-varietal-form').submit(function() {
		PAAM.showLoader();
		var skuName = jQuery('#paam_sku').val();
		var description = jQuery('#paam_description').val();
		var thumb = jQuery('#paam_image').val();
		var postID = jQuery('#post_ID').val();
		jQuery.post('<?php echo PAAM_PLUGINURL; ?>/paam-ajax.php', {
						paam_action : 'save_sku', 
						post_id : postID,
						paam_skuname : skuName,
						paam_skudescription : description,
						paam_skuthumbnail : thumb
					}, function(rawResponse) {
						var resp = eval('(' + rawResponse + ')');
					});
		return false;
	});
	
	jQuery('.edit-sku').click(function() {
		PAAM.showLoader();							   
		var skuID = jQuery(this).attr("rel");
		PAAM.loadSku(skuID);
		return false;
	});
	
	jQuery('#delete-skus').click(function() {
		PAAM.showLoader();
		var skusToDelete = '';
		jQuery('.sku-id:checked', '#paam_assetsmanager').each(function() {
			var val = jQuery(this).val();	
			skusToDelete += val + ',';
		});
		jQuery.post('<?php echo PAAM_PLUGINURL; ?>/paam-ajax.php', {
						paam_action : 'delete_skus', 
						paam_skustodelete : skusToDelete
					}, function(rawResponse) {
						var resp = eval('(' + rawResponse + ')');
						PAAM.loadVarietalForm();
					});
		return false;
	});

});

</script>

<div id="paam-existing-panel">
    <p><strong>Existing Assets</strong> (<a href="#" id="paam-add-new">Add New</a> )</p>
    <?php if ($skus) : ?>
    
        <p>
            <input id="delete-skus" type="submit" class="button" value="Delete Selected" />
        </p>
        <table class="widefat fixed" cellspacing="0">
            <thead>
                <tr>
                    <th scope="col" id="cb" class="manage-column column-cb check-column" style="">&nbsp;</th>
                    <th scope="col" id="name" class="manage-column column-thumbnail" style="">Asset Thumbnail</th>
                    <th scope="col" id="name" class="manage-column column-description" style="">Asset Name</th>
                </tr>
            </thead>
            <tfoot>
                <tr>
                    <th scope="col" id="cb" class="manage-column column-cb check-column" style="">&nbsp;</th>
                    <th scope="col" id="name" class="manage-column column-thumbnail" style="">Asset Thumbnail</th>
                    <th scope="col" id="name" class="manage-column column-description" style="">Asset Name</th>
                </tr>
            </tfoot>
            <tbody id="paam-skus-list">
                <?php foreach($skus as $sku) : ?>
    
                    <tr>
                        <td><input class="sku-id" value="<?php echo $sku->sku_id; ?>" type="checkbox" /></td>
                        <td><?php if ($sku->sku_thumbnail) : ?>
                                <img width="100" class="paam-thumbnail" src="<?php echo PAAM_IMAGEUPLOADURL . '/' . $sku->sku_thumbnail; ?>" alt="<?php echo $sku->sku_thumbnail; ?>" />
                            <?php endif; ?>
                        </td>
                        <td><a href="#" rel="<?php echo $sku->sku_id; ?>" class="edit-sku"><?php echo $sku->sku_name; ?></a></td>
                    </tr>
                    
                <?php endforeach; ?>
            </tbody>
        </table>
    <?php else : ?>
        <p>You do not have any assets listed yet.</p>
    <?php endif; ?>
    
    <div id="paam-form-edit"></div>
</div>