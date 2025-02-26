<?php
/**
 * @$dirname => 'wp-content\uploads\wpshare247_aeiwooc_woocommerce_invoices'
 * Delete files before, then delete dir after
 * @return => true | false
 */
function wpshare247_aeiwooc_delete_directory($dirname) {
	if (is_dir($dirname))
	   $dir_handle = opendir($dirname);
	if (!$dir_handle)
		return false;
	while($file = readdir($dir_handle)) {
	   if ($file != "." && $file != "..") {
			if (!is_dir($dirname."/".$file))
				 unlink($dirname."/".$file);
			else
				 wpshare247_aeiwooc_delete_directory($dirname.'/'.$file);
	   }
	}
	closedir($dir_handle);
	rmdir($dirname);
	return true;
}

/**
 * @$zip_path_file => 'wp-content\uploads\wpshare247_aeiwooc_woocommerce_invoices.zip'
 * @$dir => 'wp-content\uploads\wpshare247_aeiwooc_woocommerce_invoices'
 * Dir Zip
 * @return => 'wp-content\uploads\wpshare247_aeiwooc_woocommerce_invoices.zip'
 */
function wpshare247_aeiwooc_dir_zip($zip_path_file, $dir){
	if( !file_exists($dir) ) return false;
	
	$rootPath = realpath($dir);
	$zip = new ZipArchive();
	$zip->open($zip_path_file, ZipArchive::CREATE | ZipArchive::OVERWRITE);
	$files = new RecursiveIteratorIterator(
		new RecursiveDirectoryIterator($rootPath),
		RecursiveIteratorIterator::LEAVES_ONLY
	);
	
	foreach ($files as $name => $file)
	{
		// Skip directories (they would be added automatically)
		if (!$file->isDir())
		{
			// Get real and relative path for current file
			$filePath = $file->getRealPath();
			$relativePath = substr($filePath, strlen($rootPath) + 1);
	
			// Add current file to archive
			$zip->addFile($filePath, $relativePath);
		}
	}
	
	// Zip archive will be created only after closing object
	$zip->close();
	
	return $zip_path_file;
}