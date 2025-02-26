<?php
/**
 * @file
 * Functions available publically for template calls
 */
 
 
/**
 * Retrieve all available assets
 */
function paam_get_sku_assets() {
	return PA_AssetsManager_AssetsFactory::getAllAssets();
}


/**
 * Retrieve all skus
 */
function paam_get_all_assets() {
	return PA_AssetsManager_AssetsFactory::getAllSkus($post_id);
}

/**
 * Retrieve available skus for a specific post (each post is a wine or spirit)
 */
function paam_get_assets($post_id) {
	return PA_AssetsManager_AssetsFactory::getSkusByPost($post_id);
}

/**
 * Output thumbnail if exists, or default image if not.
 */
function paam_asset_thumbnail($filename) {
	if (!$filename) {
		echo PAAM_PLUGINURL . '/images/default-sku.png';	
		return;
	}
	echo PAAM_IMAGEUPLOADURL . '/' . $filename;	
}