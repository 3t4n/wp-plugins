<?php

class PA_AssetsManager_AssetsFactory {
	
	public function deleteAsset($asset_id) {
		global $wpdb;
		$asset = $wpdb->get_row($wpdb->prepare("SELECT * FROM " . PAAM_DB_ASSETS . " WHERE asset_id=%d", $asset_id));
		if ($asset && (file_exists($asset->asset_filename))) {
			unlink(PAAM_IMAGEUPLOADPATH . $asset->asset_filename);	
		}
		return $wpdb->query($wpdb->prepare("DELETE FROM " . PAAM_DB_ASSETS . " WHERE asset_id=%d", $asset_id));
	}
	
	
	public function deleteSku($sku_id) {
		global $wpdb;
		$sku = $wpdb->get_row($wpdb->prepare("SELECT * FROM " . PAAM_DB_SKUS . " WHERE sku_id=%d", $sku_id));
		if ($sku && (file_exists($sku->sku_thumbnail))) {
			unlink(PAAM_IMAGEUPLOADPATH . $sku->sku_thumbnail);	
		}
		return $wpdb->query($wpdb->prepare("DELETE FROM " . PAAM_DB_SKUS . " WHERE sku_id=%d", $sku_id));
	}
	
	
	public function getAllAssets() {
		global $wpdb;
		return $wpdb->get_results("SELECT * FROM " . PAAM_DB_ASSETS);
	}
	
	public function getAllSkus() {
		global $wpdb;
		return $wpdb->get_results("SELECT * FROM " . PAAM_DB_SKUS);
	}
	
	public function getAsset($asset_id) {
		global $wpdb;
		return $wpdb->get_row($wpdb->prepare("SELECT * FROM " . PAAM_DB_ASSETS . " WHERE asset_id=%d", $asset_id));
	}
	
	public function getSku($sku_id) {
		global $wpdb;
		return $wpdb->get_row($wpdb->prepare("SELECT * FROM " . PAAM_DB_SKUS . " WHERE sku_id=%d", $sku_id));
	}
	
	public function getSkuAssets($sku_id) {
		global $wpdb;
		return $wpdb->get_results($wpdb->prepare("SELECT * FROM " . PAAM_DB_ASSETS . " WHERE sku_id=%d", $sku_id));
	}
	
	public function getSkusByPost($post_id) {
		global $wpdb;
		return $wpdb->get_results($wpdb->prepare("SELECT * FROM " . PAAM_DB_SKUS . " WHERE post_id=%d", $post_id));
	}
	
	public function saveAsset($asset) {
		global $wpdb;
		
		if ($asset->asset_id) {
			$wpdb->query($wpdb->prepare("UPDATE " . PAAM_DB_ASSETS . " SET sku_id=%d, asset_title=%s, asset_filename=%s WHERE asset_id=%d", $asset->sku_id, $asset->asset_title, $asset->asset_filename, $asset->asset_id));
		} else {
			$wpdb->query($wpdb->prepare("INSERT INTO " . PAAM_DB_ASSETS . " (sku_id, asset_title, asset_filename) VALUES (%d, %s, %s)", $asset->sku_id, $asset->asset_title, $asset->asset_filename));
			$asset->asset_id = $wpdb->insert_id;
		}
		
		// move thumbnail over from temp
		if ($asset->asset_filename) {
			if (file_exists(PAAM_TEMPPATH . $asset->asset_filename)) {
				rename(PAAM_TEMPPATH . $asset->asset_filename, PAAM_IMAGEUPLOADPATH . $asset->asset_filename);
			}
		}
		
		return $asset->asset_id;
	}
	
	public function saveSku($sku) {
		global $wpdb;
		
		if ($sku->sku_id) {
			$wpdb->query($wpdb->prepare("UPDATE " . PAAM_DB_SKUS . " SET post_id=%d, sku_name=%s, sku_description=%s, sku_thumbnail=%s WHERE sku_id=%d", $sku->post_id, $sku->sku_name, $sku->sku_description, $sku->sku_thumbnail, $sku->sku_id));
		} else {
			$wpdb->query($wpdb->prepare("INSERT INTO " . PAAM_DB_SKUS . " (post_id, sku_name, sku_description, sku_thumbnail) VALUES (%d, %s, %s, %s)", $sku->post_id, $sku->sku_name, $sku->sku_description, $sku->sku_thumbnail));
			$sku->sku_id = $wpdb->insert_id;
		}
		
		// move thumbnail over from temp
		if ($sku->sku_thumbnail) {
			if (file_exists(PAAM_TEMPPATH . $sku->sku_thumbnail)) {
				rename(PAAM_TEMPPATH . $sku->sku_thumbnail, PAAM_IMAGEUPLOADPATH . $sku->sku_thumbnail);
			}
		}
		
		return $sku->sku_id;
	}
}