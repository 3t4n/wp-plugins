<?php
/**
 * @file
 * Handles all ajax processing from PAAM callbacks.
 */
require('paam-config-ajax.php');

if (isset($_POST['paam_action'])) {
	switch($_POST['paam_action']) {
		case 'delete_assets':
			$assets = $_POST['paam_assetstodelete'];
			$assets = explode(',', $assets);
			if ($assets) {
				foreach($assets as $asset_id) {
					if ($asset_id) {
						PA_AssetsManager_AssetsFactory::deleteAsset($asset_id);
					}
				}
			}
			echo '{response: 1}';
			break;
		case 'delete_skus':
			$skus = $_POST['paam_skustodelete'];
			$skus = explode(',', $skus);
			if ($skus) {
				foreach($skus as $sku_id) {
					if ($sku_id) {
						PA_AssetsManager_AssetsFactory::deleteSku($sku_id);
					}
				}
			}
			echo '{response: 1}';
			break;
		case 'save_asset':
			$asset = new PA_AssetsManager_Asset;
			$is_new = true;
			if ($_POST['paam_assetid']) {
				$asset->asset_id = $_POST['paam_assetid'];
				$is_new = false;
			}
			$asset->sku_id = $_POST['sku_id'];
			$asset->asset_title = stripslashes($_POST['paam_assettitle']);
			$asset->asset_filename = $_POST['paam_assetfile'];
			$asset->asset_id = PA_AssetsManager_AssetsFactory::saveAsset($asset);
			
			echo '{response: 1, skuID : ' . $asset->sku_id . ', assetID : ' . $asset->asset_id . ', isNew : ' . intval($is_new) . '}';
			break;
		case 'save_sku':
			$sku = new PA_AssetsManager_Sku;
			$is_new = true;
			if ($_POST['paam_skuid']) {
				$sku->sku_id = $_POST['paam_skuid'];
				$is_new = false;
			}
			$sku->post_id = $_POST['post_id'];
			$sku->sku_name = stripslashes($_POST['paam_skuname']);
			$sku->sku_description = stripslashes($_POST['paam_skudescription']);
			$sku->sku_thumbnail = $_POST['paam_skuthumbnail'];
			$sku->sku_id = PA_AssetsManager_AssetsFactory::saveSku($sku);
			
			echo '{response: 1, skuID : ' . $sku->sku_id . ', isNew : ' . intval($is_new) . '}';
			break;
		default:
			die("PAAM action called not defined.");
			break;
	}
}