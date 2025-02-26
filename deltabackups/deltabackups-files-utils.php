<?php

function dtbps_zip_file($fileToAddPathName, $zipPathAndFileName, $newFileName){
    // Initialize archive object
    $zip = new ZipArchive();
    $zip->open($zipPathAndFileName, ZipArchive::CREATE | ZipArchive::OVERWRITE);
    // Add current file to archive
    $zip->addFile($fileToAddPathName, $newFileName);
    if (DTBPS_CAN_ENCRYPT && !DTBPS_LOCAL_MODE)
        $zip->setEncryptionName($newFileName, ZipArchive::EM_AES_256, DTBPS_CLIENT_ID);
    $zip->close();
}

function dtbps_path_contains_files($files) {
    $dtbps_path_contains_files = false;

    foreach ($files as $file) {
        if(!$file->isDir()){
            $dtbps_path_contains_files = true;
            break;
        }
    }

    return $dtbps_path_contains_files;
}

function dtbps_delete_path_files($dir){
    if (is_dir($dir)) {
        // do a local cleanup of path before start
        $toCleanupFiles = new RecursiveIteratorIterator(
            new RecursiveDirectoryIterator($dir, RecursiveDirectoryIterator::SKIP_DOTS),
            RecursiveIteratorIterator::CHILD_FIRST
        );

        if(!empty($toCleanupFiles)){
            dtbps_delete_files($toCleanupFiles);
        }
    }
}

function dtbps_delete_files($fileList){
    foreach ($fileList as $fileinfo) {
        $path = $fileinfo->getRealPath();
        $fileinfo->isDir() ? rmdir($path) : wp_delete_file($path);
    }
}

function dtbps_delete_path_empty_folders($path){
    foreach (new DirectoryIterator($path) as $theme) {
        if (!$theme->isDot() && $theme->isDir()) {
            $theme_path = $theme->getPathname();
            $filesToCheckAndDelete = new RecursiveIteratorIterator(new RecursiveDirectoryIterator($theme_path, RecursiveDirectoryIterator::SKIP_DOTS), RecursiveIteratorIterator::CHILD_FIRST);
            $dtbps_path_contains_files = dtbps_path_contains_files($filesToCheckAndDelete);

            if (!$dtbps_path_contains_files) {
                dtbps_delete_files($filesToCheckAndDelete);
                rmdir($theme_path);
            }
        }
    }
}

function dtbps_format_file_path_to_local($backupPath, $fileNamePath){
    return $backupPath . DTBPS_DIR . str_replace(DTBPS_DIR, '_', $fileNamePath);
}

function dtbps_windows_to_unix_if_needed($path) {
    if(dtbps_is_windows()) {
        // Replace backslashes with forward slashes
        $path = str_replace('\\', DTBPS_DIR, $path);
    }
    return $path;
}

function dtbps_is_windows(){
    $server_os = php_uname('s');
    if (stripos($server_os, 'win') !== false){
        return true;
    } else {
        return false;
    }
}

function dtbps_get_local_folders($directory) {
    if (!is_dir($directory)) {
        return array();
    }

    $folders = array_filter(glob($directory . '/*'), 'is_dir');
    $folder_names = array_map('basename', $folders);

    rsort($folder_names);

    return $folder_names;
}

function dtbps_get_local_files($directory) {
    if (!is_dir($directory)) {
        return array();
    }

    $files = array_filter(glob($directory . '/*'), 'is_file');
    // Filter out files that do not end with '.zip'
    $zip_files = array_filter($files, function($file) {
        return pathinfo($file, PATHINFO_EXTENSION) === 'zip';
    });

    $files_names = array_map('basename', $zip_files);
    sort($files_names);

    return $files_names;
}

function dtbps_file_check($file_path) {
    $fileIsOk = true;
    if (!file_exists($file_path) || filesize($file_path) === 0) {
        return false;
    }

    return $fileIsOk;
}

function dtbps_get_local_backup($backupId) {
    $databaseFilePath = DTBPS_PATH_BACKUPS_CACHE_WP_ID . DTBPS_DIR . $backupId . DTBPS_DIR . DTBPS_FILE_DATABASE_NAME . DTBPS_FILE_COMPRESSED_EXTENSION;
    $metadataFilePath = DTBPS_PATH_BACKUPS_CACHE_WP_ID . DTBPS_DIR . $backupId . DTBPS_DIR . DTBPS_FILE_METADATA_NAME . DTBPS_FILE_COMPRESSED_EXTENSION;
    $zipsFilePath = DTBPS_PATH_BACKUPS_CACHE_WP_ID . DTBPS_DIR . $backupId . DTBPS_DIR .  DTBPS_PATH_BACKUP_FILES;
    $files = dtbps_get_local_files($zipsFilePath);
    $hasDatabase = dtbps_file_check($databaseFilePath);
    $hasMetadata = dtbps_file_check($metadataFilePath);
    $hasFiles = !empty($files);
    $isCorrupted = false;

    $size = 0;
    if ($hasDatabase)
        $size = $size + filesize($databaseFilePath);
    if ($hasMetadata)
        $size = $size + filesize($metadataFilePath);
    if (!$hasDatabase || !$hasMetadata)
        $isCorrupted = true;
    if ($hasFiles)
        foreach($files as $fileName){
            $size = $size + filesize($zipsFilePath . DTBPS_DIR . $fileName);
        }


    $backup = [
        'backupId' => $backupId,
        'createdAt' => $backupId,
        'size' => $size,
        'hasDatabase' => $hasDatabase,
        'hasMetadata' => $hasMetadata,
        'hasFiles' => $hasFiles,
        'isActive' => true,
        'isCorrupted' => $isCorrupted,
    ];
    return $backup;
}

function dtbps_get_metadata_map_local($backupId, $newBackupId){
    $backupMetadataMap = array();
    if($backupId != null){
        $backupMetadataMap = dtbps_get_metadata(null, $backupId);
    } else {
        // get all backup ids
        $backupIds = dtbps_get_local_folders(DTBPS_PATH_BACKUPS_CACHE_WP_ID);
        // filter out backupsIds if. This is done to filter out current backup being in process.
        $filteredBackupIds = array_filter($backupIds, function($item) use ($newBackupId) { return strcasecmp($item, $newBackupId) !== 0; });
        if (!empty($filteredBackupIds)){
            $lastBackupId = reset($filteredBackupIds);
            $backupMetadataMap = dtbps_get_metadata(null, $lastBackupId);
        }
    }
    return $backupMetadataMap;
}

function dtbps_get_relative_path($rootPath, $filePath) {
    // Find the position of the last directory separator in the "rootPath"
    $lastSeparatorPos = strrpos($rootPath, DTBPS_DIR) + strlen(DTBPS_DIR);

    // Extract the base directory (like 'wp-content')
    $baseDir = substr($rootPath, $lastSeparatorPos);

    // Find the corresponding position in the "filePath"
    $baseDirPos = strpos($filePath, $baseDir);

    // Extract and return the relative path starting from the base directory
    $relativePath = substr($filePath, $baseDirPos);

    return $relativePath;
}

function dtbps_create_htaccess_in_backup_directory() {
    dtbps_define_constants();
    // Ensure the backup directory exists
    if (!file_exists(DTBPS_PATH_BACKUPS_CACHE)) {
        wp_mkdir_p(DTBPS_PATH_BACKUPS_CACHE);
    }

    // Path to the .htaccess file in the backup directory
    $htaccess_file = DTBPS_PATH_BACKUPS_CACHE . DTBPS_DIR . '.htaccess';

    // Content to be written in the .htaccess file
    $htaccess_content = "<FilesMatch \".*\">\n    Order Allow,Deny\n    Deny from all\n</FilesMatch>";

    // Write the .htaccess file
    if (!file_exists($htaccess_file)) {
        file_put_contents($htaccess_file, $htaccess_content);
    }
}