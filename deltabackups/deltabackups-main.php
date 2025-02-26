<?php

function dtbps_backup_plugin_backups_page() {
    dtbps_define_constants();
    $action = esc_html('dtbps_backup_action');
    $nonce = esc_html('dtbps_backup_nonce');

    $isUserLoggedIn = !empty(DTBPS_USER_ID) && !empty(DTBPS_PASSWORD);

    if (!$isUserLoggedIn && !DTBPS_LOCAL_MODE){
        dtbps_backup_plugin_user_page();
        return;
    }

    if ($isUserLoggedIn && empty(DTBPS_CLIENT_ID) && !DTBPS_LOCAL_MODE){
        dtbps_backup_plugin_client_page();
        return;
    }

    if(DTBPS_LOCAL_MODE && $isUserLoggedIn)
        echo '<div class="notice"><p><b>* You are using Local mode!</b></p></div>';

    try {
        if ($_SERVER['REQUEST_METHOD'] === 'POST' &&
            check_admin_referer($action, $nonce) &&
            current_user_can(DTBPS_WP_PLUGIN_ACCESS_LEVEL)) {
            if(dtbps_is_lock()) {
                dtbps_is_lock_error();
            } else {
                dtbps_set_lock();
                // Handle form submission
                if (isset($_POST['delete_last_backup'])) {
                    if(DTBPS_LOCAL_MODE){
                        $backupId = dtbps_get_local_folders(DTBPS_PATH_BACKUPS_CACHE_WP_ID)[0];
                        dtbps_delete_path_files(DTBPS_PATH_BACKUPS_CACHE_WP_ID . DTBPS_DIR . $backupId);
                        rmdir(DTBPS_PATH_BACKUPS_CACHE_WP_ID . DTBPS_DIR . $backupId);
                    }
                    else
                        dtbps_cloud_backup_delete();
                    echo '<div class="updated"><p>Backup deleted!</p></div>';
                } else if (isset($_POST['create_backup'])) {
                    // create backup process depends on client instance resources, so we override timeout
                    set_time_limit(0);
                    $rsp = dtbps_backup_plugin_create();

                    $divStyle = 'error';
                    if($rsp['status'] == '200'){
                        $divStyle = 'updated';
                    }
                    echo '<div class="' . esc_html($divStyle) . '"><p>' . esc_html($rsp['message']) . '</p></div>';
                } else if (isset($_POST['backup_restore'])) {
                    // restore backup process depends on client instance resources, so we override timeout
                    set_time_limit(0);
                    $backupId = sanitize_text_field($_POST['backup_restore']);

                    $backupSiteUrl = "";
                    if (isset($_POST['backup_restore_siteurl'])) {
                        $backupSiteUrl = sanitize_text_field($_POST['backup_restore_siteurl']);
                    }

                    $rsp = dtbps_plugin_restore($backupId, $backupSiteUrl);

                    $divStyle = 'error';
                    if($rsp['status'] == '200'){
                      $divStyle = 'updated';
                    }
                    echo '<div class="' . esc_html($divStyle) . '"><p>' . esc_html($rsp['message']) . '</p></div>';
                }
                dtbps_remove_lock();
            }
        }
    } catch (Exception $e) {
        dtbps_return_exception_response($e);
    } catch (Error $e) {
        dtbps_return_exception_response($e);
    } catch (Throwable $e) {
        dtbps_return_exception_response($e);
    }


    wp_enqueue_style('deltabackups-style', plugin_dir_url(__FILE__) . 'style.css');
    // Enqueue loading animation script
    wp_enqueue_script('deltabackups-script', plugin_dir_url(__FILE__) . 'script.js' , array(), '1.0', true);

    ?>
        <div class="wrap">
            <h2>Backups</h2>
        </div>

        <div id="confirmationModal" class="modal">
          <div class="modal-content">
            <span class="close" id="closeModalButton">&times;</span>
            <p id="questionModalParagraph"></p>
            <button id="confirmModalButton">Yes</button>
            <button id="cancelModalButton">No</button>
          </div>
        </div>

        <div class="wrap">
            <form method="post" id="create_backup">
                <?php wp_nonce_field($action, $nonce); ?>
                <input type="hidden" name="create_backup">
                <button type="button" id="create-button" class="button button-primary" onclick="areYouSureModal('Are you sure you want to create new backup?').then(result => (result) ? getSubmitByElementId('create_backup') : null);">Create Backup</button>
            </form>
            <div id="corrupted-backup-message" class="error" style="display: none;"><p>Some backups are corrupted on this or other client! To proceed delete corrupted backup!</p></div>
        </div>
    <?php



    // get list of all backups
    if (DTBPS_LOCAL_MODE){
        $backups_folders = dtbps_get_local_folders(DTBPS_PATH_BACKUPS_CACHE_WP_ID);
        $backups = [];
        $isCorrupted = false;

        foreach ($backups_folders as $backupId) {
            $backup = dtbps_get_local_backup($backupId);
            array_push($backups, $backup);
            if($backup['isCorrupted'])
                $isCorrupted = true;
        }
    } else {
        $jsonBody = dtbps_cloud_backup_list(null);

        $isBackupsReturnedInResponse = isset($jsonBody['backups']);
        if (!$isBackupsReturnedInResponse) {
            dtbps_print_error_in_console('Error: Cloud did not return valid response with backups field of type array!');
        }

        $backups = $isBackupsReturnedInResponse ? $jsonBody['backups'] : array();
        $isCorrupted = isset($jsonBody['corrupted']) ? $jsonBody['corrupted'] : true;
    }

    usort($backups, function ($a, $b) {
        return $b['createdAt'] - $a['createdAt'];
    });

    if ($isCorrupted){
        wp_add_inline_script('deltabackups-script', 'document.getElementById("create-button").disabled = true; document.getElementById("corrupted-backup-message").style.display = "";');
    }


    // Display the items in a table
    echo '<div class="my-table">';
    echo '<table>';
    echo '<thead><tr><th>createdAt</th><th>backupId</th><th>newFiles</th><th>hasDatabase</th><th>hasMetadata</th><th>Size (MB)</th><th>isActive</th><th>Action</th></tr></thead>';
    echo '<tbody>';

    // Loop through the "items" and display in the table
    foreach ($backups as $item) {
        $disableRestore = (is_multisite() || !esc_html($item['isActive']) || $isCorrupted ? 'disabled' : '');

        echo '<tr>';
        echo '<td>' . esc_html(date('Y-m-d H:i:s', (round(esc_html($item['createdAt']) / 1000 )))) . '</td>';
        echo '<td>' . esc_html($item['backupId']) . '</td>';
        echo '<td>' . esc_html($item['hasFiles'] ? 'Yes' : 'No') . '</td>';
        echo '<td>' . esc_html($item['hasDatabase'] ? 'Yes' : 'No') . '</td>';
        echo '<td>' . esc_html($item['hasMetadata'] ? 'Yes' : 'No') . '</td>';
        echo '<td>' . esc_html(round(esc_html($item['size'] / DTBPS_MB_IN_BYTES_SIZE, 2))) . '</td>';
        echo '<td>' . esc_html($item['isActive'] ? 'Yes' : 'No') . '</td>';
        echo '<td>
                <form method="post" id="backup_restore_' . esc_html($item['backupId']) . '">'
                    . wp_nonce_field($action, $nonce) .
                    '<input type="hidden" name="backup_restore" value="' . esc_html($item['backupId']) . '">
                    <input type="hidden" name="backup_restore_siteurl" value="' . esc_html($item['siteUrl']) . '">
                    <button type="button" class="button button-primary" name="backup_restore" onclick="areYouSureModal(\'Are you sure you want to restore?\').then(result => (result) ? getSubmitByElementId(\'backup_restore_' . esc_html($item['backupId']) . '\') : null);" ' . esc_html($disableRestore) . '>Restore</button>
                </form>
            </td>';
        echo '</tr>';
    }

    echo '</tbody></table></div><br><br>';
    if(!empty($backups)){
        echo '<form method="post" id="delete_last_backup"> <input type="hidden" name="delete_last_backup">';
        echo wp_nonce_field($action, $nonce);
        echo '<button type="button" class="button button-primary" style="background-color: #ff5454; border-color: #ff5454;" onclick="areYouSureModal(\'Are you sure you want to delete?\').then(result => (result) ? getSubmitByElementId(\'delete_last_backup\') : null);">Delete latest backup</button></form>';
    }

}



function dtbps_backup_plugin_client_page() {
    dtbps_define_constants();
    $action = esc_html('dtbps_client_action');
    $nonce = esc_html('dtbps_client_nonce');

    $isUserLoggedIn = !empty(DTBPS_USER_ID) && !empty(DTBPS_PASSWORD);
    if(DTBPS_LOCAL_MODE){
        if ($isUserLoggedIn)
            echo '<div class="wrap"><h2>Clients</h2><div class="notice"><p><b>* Cannot use Clients feature in Local mode. Disable Local Mode in Settings!</b></p></div></div>';
        else
            echo '<div class="wrap"><h2>Clients</h2><div class="error"><p><b>* Cannot use Clients feature in Local mode. Upgrade plan for more features!</b></p></div></div>';
        return;
    }


    if (!$isUserLoggedIn){
        dtbps_backup_plugin_user_page();
        return;
    }

    wp_enqueue_style('deltabackups-style', plugin_dir_url(__FILE__) . 'style.css');
    // Enqueue loading animation script
    wp_enqueue_script('deltabackups-script', plugin_dir_url(__FILE__) . 'script.js' , array(), '1.0', true);

    try {
        if ($_SERVER['REQUEST_METHOD'] === 'POST' &&
             check_admin_referer($action, $nonce) &&
             current_user_can(DTBPS_WP_PLUGIN_ACCESS_LEVEL)) {
            if(dtbps_is_lock()) {
                dtbps_is_lock_error();
            } else {
                dtbps_set_lock();
                // Handle form submission
                if (isset($_POST['client_submit'])) {
                    $clientId = sanitize_text_field($_POST['client_submit']);

                    // check if client id valid
                    if (!empty($clientId)) {
                        dtbps_insert_deltabackups_option(DTBPS_DB_SQL_TABLE_OPTIONS_CLIENT_ID, $clientId);
                        echo '<div class="updated"><p>Client selected!</p></div>';
                        $CLIENT_ID_OVERRIDE = dtbps_get_client_id();
                    } else {
                        throw new Exception("Please fill in valid client Id!");
                    }
                } else if (isset($_POST['delete_client_id'])) {
                   $clientId = sanitize_text_field($_POST['delete_client_id']);

                   // check if client id valid
                   if (!empty($clientId)) {
                        // delete client by id
                        dtbps_cloud_client_delete($clientId);
                        echo '<div class="updated"><p>Client deleted!</p></div>';
                   }
               } else if (isset($_POST['new_client_submit'])) {
                   $clientName = sanitize_text_field($_POST['new_client_submit']);

                   // check if client name valid
                   if (!empty($clientName)) {
                        // create client with new name
                        dtbps_cloud_client_create($clientName);
                        echo '<div class="updated"><p>Client created!</p></div>';
                   }
               }
           dtbps_remove_lock();
           }
        }
    } catch (Exception $e) {
        dtbps_return_exception_response($e);
    } catch (Error $e) {
        dtbps_return_exception_response($e);
    } catch (Throwable $e) {
        dtbps_return_exception_response($e);
    }

    ?>
    <div class="wrap">
        <h2>Clients</h2>
            <div id="confirmationModal" class="modal">
              <div class="modal-content">
                <span class="close" id="closeModalButton">&times;</span>
                <p id="questionModalParagraph"></p>
                <button id="confirmModalButton">Yes</button>
                <button id="cancelModalButton">No</button>
              </div>
            </div>
    <?php

    // get clients
    $jsonBody = dtbps_cloud_client_list();
    $sizeUsed = 0;
    $size = $jsonBody['size'];

    if (isset($jsonBody['clients'])) {
        // Display the items in a table
        echo '<div class="my-table">';
        echo '<table>';
        echo '<thead><tr><th>Client</th><th>size used (in MB)</th><th>Action</th></tr></thead>';
        echo '<tbody>';
        $clients = $jsonBody['clients'];

        // Loop through the "items" and display in the table
        foreach ($clients as $item) {
            $sizeUsed = $sizeUsed + $item['size'];
            $id = isset($CLIENT_ID_OVERRIDE) ? $CLIENT_ID_OVERRIDE :DTBPS_CLIENT_ID;
            $disableCurrentClient = ($id == $item['clientId'] ? 'disabled' : '');
            echo '<tr>';
            echo '<td>' . esc_html($item['name']) . '</td>';
            echo '<td>' . esc_html(round(esc_html($item['size'] / DTBPS_MB_IN_BYTES_SIZE, 2))) . '</td>';
            echo '<td style="display: flex;">
            <form method="post" id="client_submit_' . esc_html($item['clientId']) . '">'
                . wp_nonce_field($action, $nonce) .
                '<input type="hidden" name="client_submit" value="' . esc_html($item['clientId']) . '">
                <button type="button" class="button button-primary" name="client_submit" id="client_submit_button_' . esc_html($item['clientId']) . '" onclick="areYouSureModal(\'Are you sure you want to use this client?\').then(result => (result) ? getSubmitByElementId(\'client_submit_' . esc_html($item['clientId']) . '\') : null);" ' . esc_html($disableCurrentClient) . '>Use Client</button>
            </form>
            <form method="post" id="delete_client_id_' . esc_html($item['clientId']) . '">'
                . wp_nonce_field($action, $nonce) .
                '<input type="hidden" name="delete_client_id"  value="' . esc_html($item['clientId']) . '">
                <button type="button" class="button button-primary" id="delete_client_id_button_' . esc_html($item['clientId']) . '" style="background-color: #ff5454; border-color: #ff5454;" name="delete_client_id" onclick="areYouSureModal(\'Are you sure you want to delete?\').then(result => (result) ? getSubmitByElementId(\'delete_client_id_' . esc_html($item['clientId']) . '\') : null);" ' . esc_html($disableCurrentClient) . '>Delete</button>
            </form></td>';
            echo '</tr>';
        }

        echo '</tbody></table></div><br><br>';

    } else {
        // Handle missing "items" field or JSON decoding error
        error_log('Error: Missing "items" field or decoding JSON response.');
    }

    echo '
    <form method="post">'
        . wp_nonce_field($action, $nonce) .
        '<input type="text" name="new_client_submit" value="" placeholder="Enter New Client name" required>
        <input type="submit" class="button button-primary" value="Create Client">
    </form>';

    $sizeUsedInMb = round($sizeUsed / DTBPS_MB_IN_BYTES_SIZE, 2);
    $sizeInMB =  round($size / DTBPS_MB_IN_BYTES_SIZE, 2);
    $sizeColor =  $sizeUsedInMb / $sizeInMB > 0.9 ? "red" : "blue";

    echo "<h2>Total Used Size: " . esc_html($sizeUsedInMb) . " / " . esc_html($sizeInMB) . " MB <progress style='accent-color:" . esc_html($sizeColor) . ";' value='" . esc_html($sizeUsedInMb) . "' max='" . esc_html($sizeInMB) . "'/></h2>";
    if (isset($jsonBody['networkSize']) && isset($jsonBody['networkLimit'])) {
        $networkSizeInMB =  round($jsonBody['networkSize'] / DTBPS_MB_IN_BYTES_SIZE, 2);
        $networkLimitInMB =  round($jsonBody['networkLimit'] / DTBPS_MB_IN_BYTES_SIZE, 2);
        $networkColor = $networkSizeInMB / $networkLimitInMB > 0.9 ? "red" : "blue";
        echo "<h4>* Total Used Network Size: " . esc_html($networkSizeInMB) . " / " . esc_html($networkLimitInMB) . "  MB <progress style='accent-color:" . esc_html($networkColor) . ";' value='" . esc_html($networkSizeInMB) . "' max='" . esc_html($networkLimitInMB) . "'/></h4><br>";
    }

    echo "</div>";
}

function dtbps_backup_plugin_user_page() {
    dtbps_define_constants();
    $action = esc_html('dtbps_user_action');
    $nonce = esc_html('dtbps_user_nonce');

    try {
        if ($_SERVER['REQUEST_METHOD'] === 'POST' &&
             check_admin_referer($action, $nonce) &&
             current_user_can(DTBPS_WP_PLUGIN_ACCESS_LEVEL)) {
            if(dtbps_is_lock()) {
                dtbps_is_lock_error();
            } else {
                // Handle form submission user login
                if (isset($_POST['user_submit'])) {
                    dtbps_set_lock();
                    $username = sanitize_text_field($_POST['username']);
                    $password = sanitize_text_field($_POST['password']);

                    if (!empty($username)) {

                        // check if user valid
                        $jsonBody = dtbps_cloud_login($username, $password);

                        // on error, response message will be 'ERROR'
                        if($jsonBody['message'] == DTBPS_ENDPOINT_RESPONSE_MESSAGE_SUCCESS) {
                            dtbps_delete_deltabackups_option(DTBPS_DB_SQL_TABLE_OPTIONS_CLIENT_ID);
                            dtbps_insert_deltabackups_option(DTBPS_DB_SQL_TABLE_OPTIONS_USER_ID, $username);
                            dtbps_insert_deltabackups_option(DTBPS_DB_SQL_TABLE_OPTIONS_PASSWORD, $password);
                            echo '<div class="updated"><p>User login successful!</p></div>';
                        }
                    } else {
                        echo '<div class="error"><p>Please fill in valid user Id!</p></div>';
                    }
                    dtbps_remove_lock();
                } else if (isset($_POST['local_mode_submit'])) {
                    dtbps_insert_deltabackups_option(DTBPS_DB_SQL_TABLE_OPTIONS_SETTINGS_LOCAL_MODE, true);
                }
            }

        }
    } catch (Exception $e) {
        dtbps_return_exception_response($e);
    } catch (Error $e) {
        dtbps_return_exception_response($e);
    } catch (Throwable $e) {
        dtbps_return_exception_response($e);
    }

    $username = dtbps_get_username();
    $password = dtbps_get_password();
    $is_local_mode_displayed = (dtbps_is_local_mode() || (!empty($username) && empty(!$password))) ? 'hidden' : '';

    // Display the form
    ?>
        <div class="wrap">
            <h2>User</h2>
            <form method="post">
                <?php wp_nonce_field($action, $nonce); ?>
                <label for="username">Email:</label>
                <input type="text" name="username" id="username" value="<?php echo esc_html($username); ?>" required>
                <br>
                <br>
                <label for="password">Password:</label>
                <input type="password" name="password" id="password" value="<?php echo esc_html($password); ?>" required>
                <br>
                <br>
                <input type="submit" name="user_submit" class="button button-primary" value="Save">
            </form>
            <br>
            <br>
            <form method="post" <?php echo esc_html($is_local_mode_displayed); ?>>
                <?php wp_nonce_field($action, $nonce); ?>
                <label for="password">or use free: </label>
                <br>
                <input type="submit" name="local_mode_submit" class="button" value="Local Storage">
            </form>
        </div>
    <?php
}


function dtbps_backup_plugin_settings_page() {
    dtbps_define_constants();
    $action = esc_html('dtbps_settings_action');
    $nonce = esc_html('dtbps_settings_nonce');

    try {
        if ($_SERVER['REQUEST_METHOD'] === 'POST' &&
             check_admin_referer($action, $nonce) &&
             current_user_can(DTBPS_WP_PLUGIN_ACCESS_LEVEL)) {
            // Handle form submission
            if (isset($_POST['settings_submit'])) {
                $isLock = sanitize_text_field(isset($_POST['lock']) ? $_POST['lock'] : false);
                $isLocalMode = sanitize_text_field(isset($_POST['local']) ? $_POST['local'] : false);

                dtbps_insert_deltabackups_option(DTBPS_DB_SQL_TABLE_OPTIONS_SETTINGS_LOCK, $isLock);
                dtbps_insert_deltabackups_option(DTBPS_DB_SQL_TABLE_OPTIONS_SETTINGS_LOCAL_MODE, $isLocalMode);
                echo '<div class="updated"><p>Save successful!</p></div>';
            }
        }
    } catch (Exception $e) {
        dtbps_return_exception_response($e);
    } catch (Error $e) {
        dtbps_return_exception_response($e);
    } catch (Throwable $e) {
        dtbps_return_exception_response($e);
    }

    $options = get_option(DTBPS_DB_SQL_TABLE_OPTIONS_KEY, array());
    $isLockChecked = dtbps_is_lock() ? "checked" : "";
    $isLocalModeChecked = dtbps_is_local_mode() ? "checked" : "";
    // Display the form
    ?>
        <div class="wrap">
            <h2>Settings</h2>
            <br>
            <form method="post">
                <?php wp_nonce_field($action, $nonce); ?>
                <input type="checkbox" id="lock" name="lock" value="lock" <?php echo esc_html( $isLockChecked ); ?> >
                <label for="lock"> DeltaBackups Lock</label><br>
                <input type="checkbox" id="local" name="local" value="local" <?php echo esc_html( $isLocalModeChecked ); ?> >
                <label for="lock"> DeltaBackups Local Mode</label><br>

                <br>
                <input type="submit" name="settings_submit" class="button button-primary" value="Save">
            </form>
        </div>
    <?php
}



function dtbps_plugin_restore($backupId, $backupSiteUrl) {
    $isMultisite = is_multisite();
    $currentBlogId = get_current_blog_id();

    $backupPath = DTBPS_PATH_BACKUPS_CACHE_WP_ID . DTBPS_DIR . $backupId;
    $backupMetadataMap = DTBPS_LOCAL_MODE ? dtbps_get_metadata_map_local($backupId, null) : dtbps_get_metadata_map($backupId);
    $wpDbFilePath = DTBPS_LOCAL_MODE ? $backupPath . DTBPS_DIR . DTBPS_FILE_DATABASE_NAME . DTBPS_FILE_COMPRESSED_EXTENSION : DTBPS_DIR . DTBPS_CLIENT_ID . DTBPS_DIR . $backupId . DTBPS_DIR . DTBPS_FILE_DATABASE_NAME . DTBPS_FILE_COMPRESSED_EXTENSION;
    $localMetadataMap = array();
    $toDeleteFilesList = array();
    $toDownloadMetadataMap = array();

    if(!DTBPS_LOCAL_MODE)
        dtbps_delete_path_files(DTBPS_PATH_BACKUPS_CACHE_WP_ID);
    // create path if not exists for new backup
    wp_mkdir_p($backupPath);


    // get local files
    $localFiles = new RecursiveIteratorIterator(new RecursiveDirectoryIterator(DTBPS_PATH_WP_CONTENT));
    foreach ($localFiles as $file) {
        $path = $file->getPathname();
        $fileIsDir = $file->isDir();
        $pathUnix = dtbps_windows_to_unix_if_needed($path);
        if (!$fileIsDir && !str_starts_with($pathUnix, DTBPS_PATH_BACKUPS_CACHE_WP_ID)) {
            $fileHash = hash_file(DTBPS_HASH_ALGO, $path);

            // Get real and relative path for current file
            $filePath = $file->getRealPath();
            $relativePath = substr($filePath, strlen(ABSPATH));
            $relativePathUNIX = dtbps_windows_to_unix_if_needed($relativePath);

            if($isMultisite && $currentBlogId > 1){
                $relativePathUNIX = str_replace( DTBPS_PATH_WP_CONTENT_UPLOADS_SITES_ID . DTBPS_DIR, DTBPS_PATH_WP_CONTENT_UPLOADS . DTBPS_DIR , $relativePathUNIX);
            }

            if(!empty($relativePathUNIX)){
                $localMetadataMap[$relativePathUNIX] = [$relativePathUNIX, null, $backupId, $fileHash];

                if(!empty($backupMetadataMap) && !isset($backupMetadataMap[$relativePathUNIX])){
                    // add to delete process
                    array_push($toDeleteFilesList, $file);
                }
            }
        }
    }

    foreach ($backupMetadataMap as $backupFile) {
        if(!isset($localMetadataMap[$backupFile[0]]) || ((isset($localMetadataMap[$backupFile[0]])) && strcmp($localMetadataMap[$backupFile[0]][3], $backupFile[3]) != 0)){
            // add to download
            $clientIdIfNeeded = DTBPS_LOCAL_MODE ? '' : DTBPS_DIR . DTBPS_CLIENT_ID;
            $fileZipPath = $clientIdIfNeeded . DTBPS_DIR . $backupFile[2] . DTBPS_DIR . DTBPS_PATH_BACKUP_FILES . DTBPS_DIR . $backupFile[1] . DTBPS_FILE_COMPRESSED_EXTENSION;

            if (isset($toDownloadMetadataMap[$fileZipPath])){
                array_push($toDownloadMetadataMap[$fileZipPath], $backupFile);
            } else {
                $toDownloadMetadataMap[$fileZipPath] = array($backupFile);
            }
        }
    }

    $filesToDownload = array_keys($toDownloadMetadataMap);
    // add other db and metadata files
    $filesToDownloadAndDb = array_merge($filesToDownload, array($wpDbFilePath));

    if(!DTBPS_LOCAL_MODE){
        $jsonBody = dtbps_cloud_bucket_fetch($filesToDownloadAndDb);
        if (isset($jsonBody[DTBPS_FILE_URLS])) {
            foreach($filesToDownloadAndDb as $backupFilePath){
                $fileUrl = $jsonBody[DTBPS_FILE_URLS][$backupFilePath];

                $file = dtbps_make_request_get($fileUrl);
                file_put_contents(dtbps_format_file_path_to_local($backupPath, $backupFilePath), $file);
            }
        }
    }

    // extract missing and changes files from zips
    foreach($filesToDownload as $backupFilePath){
        $csvRows = $toDownloadMetadataMap[$backupFilePath];
        $filesToExtract = array();
        foreach($csvRows as $csvRow){
            array_push($filesToExtract, substr($csvRow[0], 0));
        }


        $zip = new ZipArchive;
        $zipFilePath = DTBPS_LOCAL_MODE ? DTBPS_PATH_BACKUPS_CACHE_WP_ID . $backupFilePath : dtbps_format_file_path_to_local($backupPath, $backupFilePath);
        $resource = $zip->open($zipFilePath);
        if ($resource === TRUE) {
            foreach($filesToExtract as $fileToExtract){
                dtbps_set_password_if_needed($resource, $zip);
                if($isMultisite && $currentBlogId > 1 && str_starts_with($fileToExtract, DTBPS_PATH_WP_CONTENT_UPLOADS . DTBPS_DIR)){
                    $zip->extractTo(ABSPATH . "tmp" , $fileToExtract);
                    $fileToExtractNewPath = str_replace(DTBPS_PATH_WP_CONTENT_UPLOADS . DTBPS_DIR, DTBPS_PATH_WP_CONTENT_UPLOADS_SITES_ID . DTBPS_DIR, $fileToExtract);
                    rename(ABSPATH . "tmp/" . $fileToExtract, ABSPATH . $fileToExtractNewPath);
                } else {
                    $zip->extractTo(ABSPATH, $fileToExtract);
                }
            }
            $zip->close();
        } else {
            throw new Exception("Could not extract files from zip: " . esc_html($backupFilePath));
        }
    }

    $dbBackupFilePath = DTBPS_LOCAL_MODE ? $wpDbFilePath : dtbps_format_file_path_to_local($backupPath, $wpDbFilePath);
    $zipDatabase = new ZipArchive;
    $resource = $zipDatabase->open($dbBackupFilePath);
    dtbps_set_password_if_needed($resource, $zipDatabase);
    $zipDatabase->extractTo($backupPath);
    $zipDatabase->close();
    dtbps_restore_wp_database($backupPath . DTBPS_DIR . DTBPS_FILE_DATABASE_NAME . DTBPS_FILE_DB_EXTENSION, $backupSiteUrl);

    if(!empty($backupMetadataMap) && !empty($toDeleteFilesList)){
        dtbps_delete_files($toDeleteFilesList);
    }

    // cleanup deltabackups cache folders
    if(!DTBPS_LOCAL_MODE)
        dtbps_delete_path_files(DTBPS_PATH_BACKUPS_CACHE_WP_ID);

    // cleanup empty themes
    dtbps_delete_path_empty_folders(DTBPS_PATH_WP_CONTENT_THEMES);
    // cleanup empty plugins
    dtbps_delete_path_empty_folders(DTBPS_PATH_WP_CONTENT_PLUGINS);

    return array('status' => '200', 'message' => 'Restore finished successfully!');
}

// New Backup Database
function dtbps_backup_wp_database($backupId) {
    global $wpdb;
    $currentBlogId = get_current_blog_id();
    $backupPath = DTBPS_PATH_BACKUPS_CACHE_WP_ID . DTBPS_DIR . $backupId;
    $sqlPathAndFileName = $backupPath . DTBPS_DIR . DTBPS_FILE_DATABASE_NAME . DTBPS_FILE_DB_EXTENSION;

    global $wpdb;
    $wp_table_prefix = $wpdb->prefix;
    $charset_collate = $wpdb->get_charset_collate();
    $tables = $wpdb->get_results(dtbps_sql_query_get_all_tables_for_wp_instance($wp_table_prefix), ARRAY_N);
    $backup_sql = "";

    foreach ($tables as $table) {
        $table = $table[0];
        $newTable = str_replace($wp_table_prefix, DTBPS_DB_SQL_TABLE_DEFAULT_PREFIX, $table);
        $backup_sql .= "DROP TABLE IF EXISTS $newTable;;;\n\n";
        $backup_sql .= str_replace("CREATE TABLE", "CREATE TABLE IF NOT EXISTS", str_replace($wp_table_prefix, DTBPS_DB_SQL_TABLE_DEFAULT_PREFIX, $wpdb->get_results("SHOW CREATE TABLE $table", ARRAY_N)[0][1] . ";;;\n\n"));
        $selectQuery = "SELECT * FROM $table" ;
        $rows = $wpdb->get_results($wpdb->prepare($selectQuery), ARRAY_A);

        $backup_sql .= "LOCK TABLES `$newTable` WRITE;;;\n";
        foreach ($rows as $row) {
            $row = array_map('addslashes', $row);
            //$row = array_map('esc_sql', $row);
            $backup_sql .= "INSERT INTO $newTable VALUES (\"" . implode("\", \"", str_replace($wp_table_prefix, DTBPS_DB_SQL_TABLE_DEFAULT_PREFIX, $row)) . "\");;;\n";
        }
        $backup_sql .= "UNLOCK TABLES;;;\n";

        $backup_sql .= "\n\n";
    }

    file_put_contents($sqlPathAndFileName, $backup_sql);


    $zipSqlPathAndFileName = $backupPath . DTBPS_DIR . DTBPS_FILE_DATABASE_NAME . DTBPS_FILE_COMPRESSED_EXTENSION;
    dtbps_zip_file($sqlPathAndFileName, $zipSqlPathAndFileName,  DTBPS_FILE_DATABASE_NAME . DTBPS_FILE_DB_EXTENSION);

    return $zipSqlPathAndFileName;
}

// Restore Database
function dtbps_restore_wp_database($file_path, $backupSiteUrl) {
    global $wpdb;
    // Disable foreign key checks during the restore
    $wpdb->query('SET foreign_key_checks = 0;;;');
    $wpTablePrefix = $wpdb->prefix;

    // get wp_options site dns data
    $wpOptionsTableName = "wp_options";
    $rows = $wpdb->get_results($wpdb->prepare("SELECT * FROM " . $wpTablePrefix . "options where option_name in ('siteurl','home')"), ARRAY_A);
    foreach ($rows as $row) {
        $row = array_map('addslashes', $row);
        $sqlQ = "\nUPDATE $wpOptionsTableName SET option_value='" . $row['option_value'] . "' where option_name='" . $row['option_name'] . "';;;\n";
        file_put_contents($file_path, $sqlQ, FILE_APPEND);
    }

    $fileHandle = fopen($file_path, 'r');

    // Check if the file opened successfully
    if ($fileHandle) {
        $currentSiteUrl = get_site_url();
        $line = "";
        // Read the file line by line until end of file (EOF) is reached
        while (!feof($fileHandle)) {
            // Read the current line from the file
            $line .= fgets($fileHandle);

            // Replace the default database prefix with the current prefix
            $modifiedLine = dtbps_modify_sql_query($line, $wpTablePrefix, $currentSiteUrl, $backupSiteUrl);
            $queries = explode(";;;\n", $modifiedLine);
            if(count($queries)>1){
                foreach ($queries as $query) {
                    $query = trim($query);
                    if (!empty($query)) {
                        /**
                         This replacement is needed: https://developer.wordpress.org/reference/classes/wpdb/prepare/
                         'Literal percentage signs (%) in the query string must be written as %%.'
                         Here I have a database .sql file that contains statements like:
                         * DROP TABLE
                         * CREATE TABLE
                         * INSERT INTO
                         Inserts can contain literal % symbols that have to be replaced in order to use prepare
                         */
                        $query = str_replace('%', '%%', $query);
                        $query = $wpdb->prepare($query);

                        $wpdb->query($query);
                    }
                }
                // Clear the line variable to save memory
                $line = "";
                unset($modifiedLine);
                unset($queries);
                unset($query);
            }
        }

        // Close the file handle
        fclose($fileHandle);
    } else {
        throw new Exception("Error opening the file: " . esc_html($file_path));
    }

    // Enable foreign key checks
    $wpdb->query('SET foreign_key_checks = 1;');
}

function dtbps_get_metadata_map($backupId){
    $backupMetadataMap = array();

    if($backupId != null){
        $backupMetadataMap = dtbps_get_metadata(DTBPS_CLIENT_ID, $backupId);
    } else {
        $jsonBody = dtbps_cloud_backup_list(1);

        if (isset($jsonBody['backups'])) {
            $backups = $jsonBody['backups'];
            if ($backups != null && $backups[0] != null){
                $lastBackupId = $backups[0]['backupId'];
                $backupMetadataMap = dtbps_get_metadata(DTBPS_CLIENT_ID, $lastBackupId);
            }
        }
    }
    return $backupMetadataMap;
}

function dtbps_get_metadata($clientId, $backupId){
    $backupMetadataMap = array();
    $backupPath = DTBPS_PATH_BACKUPS_CACHE_WP_ID . DTBPS_DIR . $backupId;
    $zipBackupMetadataPath = $backupPath . DTBPS_DIR . DTBPS_FILE_METADATA_NAME . DTBPS_FILE_COMPRESSED_EXTENSION;
    $wpMetadataFilePath = $backupPath . DTBPS_DIR . DTBPS_FILE_METADATA_NAME . DTBPS_FILE_CSV_EXTENSION;

    if (!DTBPS_LOCAL_MODE){
        $backupMetadataPath = DTBPS_DIR . $clientId . DTBPS_DIR . $backupId . DTBPS_DIR . DTBPS_FILE_METADATA_NAME . DTBPS_FILE_COMPRESSED_EXTENSION;

        $jsonBody = dtbps_cloud_bucket_fetch(array($backupMetadataPath));
        if (isset($jsonBody[DTBPS_FILE_URLS][$backupMetadataPath])) {
            $backupMetadataUrl = $jsonBody[DTBPS_FILE_URLS][$backupMetadataPath];

            // Get the CSV data from the response
            $csvDataZipResponse = dtbps_make_request_get($backupMetadataUrl);

            // create path if not exists for new backup
            if (!file_exists($backupPath)) {
                wp_mkdir_p($backupPath);
            }
            // Save the ZIP file
            file_put_contents($zipBackupMetadataPath, $csvDataZipResponse);

        } else {
              $rsp = array('status' => '404', 'message' => $jsonBody);
        }
    }

    $zip = new ZipArchive;
    $resource = $zip->open($zipBackupMetadataPath);
    dtbps_set_password_if_needed($resource, $zip);
    $zip->extractTo($backupPath);
    $zip->close();

    $csvData = file_get_contents($wpMetadataFilePath);

    if(dtbps_is_windows()) {
        $csvData = str_replace("\n", "\r\n", $csvData);
    }
    // Convert CSV string to an array of rows
    $csv_rows = str_getcsv($csvData, PHP_EOL);


    // Initialize an empty map variable

    // Loop through each row
    foreach ($csv_rows as $csv_row) {
        // Convert each row to an array of values
        $row_values = str_getcsv($csv_row, ',', '"');
        $row_values = array_map('trim', $row_values);

        // If the size of the array is greater than 4, concatenate the first items
        $rowCount = count($row_values);
        if($rowCount > DTBPS_FILE_CSV_COLUMNS){
            $concatenatedString = implode(',', array_slice($row_values, 0, $rowCount-DTBPS_FILE_CSV_COLUMNS+1));
            $row_values = array_merge(array($concatenatedString), array_slice($row_values, $rowCount-DTBPS_FILE_CSV_COLUMNS+1));
        }

        // Use the first field as the key and the entire row as the value
        $key = isset($row_values[0]) ? $row_values[0] : null;
        $backupMetadataMap[$key] = $row_values;
    }

    wp_delete_file($wpMetadataFilePath);
    return $backupMetadataMap;
}

function dtbps_backup_plugin_create() {
    $uuid = dtbps_generate_uuid4();
    // for local use epoch in millis,
    $backupId = DTBPS_LOCAL_MODE ? round(microtime(true) * 1000) : $uuid;

    $backupPath = DTBPS_PATH_BACKUPS_CACHE_WP_ID . DTBPS_DIR . $backupId . DTBPS_DIR ;
    $backupFilesZipPath = $backupPath . DTBPS_DIR . DTBPS_PATH_BACKUP_FILES . DTBPS_DIR ;

    if (!DTBPS_LOCAL_MODE) {
        dtbps_delete_path_files(DTBPS_PATH_BACKUPS_CACHE_WP_ID);
    }
    // create path if not exists for new backup
    wp_mkdir_p($backupFilesZipPath);

    $lastBackupMetadataMap = DTBPS_LOCAL_MODE ? dtbps_get_metadata_map_local(null, $backupId) : dtbps_get_metadata_map(null);

    $zip_fileNumber = dtbps_backup_wp_files($backupId, $lastBackupMetadataMap, $backupPath, $backupFilesZipPath);
    $databaseFilePath = dtbps_backup_wp_database($backupId);

    // process for uploading data to cloud
    if (!DTBPS_LOCAL_MODE){
        $jsonBody = dtbps_cloud_backup_create($backupId, $zip_fileNumber);
        $response = dtbps_cloud_response_check_all_size_used($jsonBody);

        if($response != null)
            return $response;

        if($jsonBody['response'] == 'compressed_backup_create'){
            $gzipByteArray = base64_decode($jsonBody['message']);
            $jsonString = gzdecode($gzipByteArray);
            $json = json_decode($jsonString, true);
            $dbLink = $json['backup']['dbLink'];
            $metadataLink = $json['backup']['metadataLink'];
            $fileLinks = $json['backup']['fileLinks'];


            $zipIndex = 0;
            $metadataPathAndFileName = DTBPS_PATH_BACKUPS_CACHE_WP_ID . DTBPS_DIR . $backupId . DTBPS_DIR . DTBPS_FILE_METADATA_NAME . DTBPS_FILE_COMPRESSED_EXTENSION;
            $dbPathAndFileName = $databaseFilePath;
            $filesPath = DTBPS_PATH_BACKUPS_CACHE_WP_ID . DTBPS_DIR . $backupId . DTBPS_DIR . DTBPS_PATH_BACKUP_FILES;
            $zipPathAndFileName = $filesPath . DTBPS_DIR . $zipIndex . DTBPS_FILE_COMPRESSED_EXTENSION;

            foreach ($fileLinks as $fileLink) {
                if (file_exists($zipPathAndFileName)) {
                    // Read the file contents
                    $file_contents = file_get_contents($zipPathAndFileName);
                    // upload files
                    $response = dtbps_bucket_upload($fileLink, $file_contents);

                    $zipIndex += 1;
                    $zipPathAndFileName = $filesPath . DTBPS_DIR . $zipIndex . DTBPS_FILE_COMPRESSED_EXTENSION;
                }
            }

            // Read the db contents
            $db_contents = file_get_contents($dbPathAndFileName);
            // upload db
            dtbps_bucket_upload($dbLink, $db_contents);

            // Read the metadataPath contents
            $metadata_contents = file_get_contents($metadataPathAndFileName);

            // upload metadataPath
            dtbps_bucket_upload($metadataLink, $metadata_contents);

            // trigger backup calculate
            dtbps_cloud_backup_calculate($backupId);

            // clanup downloaded and created data
            dtbps_delete_path_files(DTBPS_PATH_BACKUPS_CACHE_WP_ID);

            return array('status' => '200', 'message' => 'Backup created successfully!');
        } else
            return array('status' => '404', 'message' => 'Unknown Error!');
    } else {
        dtbps_delete_files(array(new SplFileInfo($backupPath . DTBPS_FILE_DATABASE_NAME . DTBPS_FILE_DB_EXTENSION), new SplFileInfo($backupPath . DTBPS_FILE_METADATA_NAME . DTBPS_FILE_CSV_EXTENSION)));
        return array('status' => '200', 'message' => 'Backup created successfully!');
    }

    return array('status' => '404', 'message' => 'Unknown Error!');
}


function dtbps_backup_wp_files($backupId, $lastBackupMetadataMap, $backupPath, $backupFilesZipPath) {
    $isMultisite = is_multisite();
    $currentBlogId = get_current_blog_id();
    $zipIndex = 0;
    $zipSize = 0;

    $zipPathAndFileName = $backupFilesZipPath . $zipIndex . DTBPS_FILE_COMPRESSED_EXTENSION;

    $metadataPathAndFileName = $backupPath . DTBPS_FILE_METADATA_NAME . DTBPS_FILE_CSV_EXTENSION;

    // Initialize archive object
    $zip = new ZipArchive();
    $zip->open($zipPathAndFileName, ZipArchive::CREATE | ZipArchive::OVERWRITE);

    $files = new RecursiveIteratorIterator(new RecursiveDirectoryIterator(DTBPS_PATH_WP_CONTENT));

    $csvMetadataFile = fopen($metadataPathAndFileName, 'w+');
    foreach ($files as $file) {
        $path = $file->getPathname();
        $fileIsDir = $file->isDir();
        $pathUnix = dtbps_windows_to_unix_if_needed($path);
        if (!$fileIsDir
            && !str_starts_with($pathUnix, DTBPS_PATH_BACKUPS_CACHE)
            && !($isMultisite
                && str_starts_with($pathUnix, DTBPS_PATH_WP_CONTENT_UPLOADS)
                && ($currentBlogId > 1 ? !str_starts_with($pathUnix, DTBPS_PATH_WP_CONTENT_UPLOADS_SITES_ID) : str_starts_with($pathUnix, DTBPS_PATH_WP_CONTENT_UPLOADS_SITES)))) {

            // Get real and relative path for current file
            $filePath = dtbps_windows_to_unix_if_needed($file->getRealPath());
            $relativePath = dtbps_get_relative_path(DTBPS_PATH_WP_CONTENT, $filePath);
            $relativePathUNIX = dtbps_windows_to_unix_if_needed($relativePath);
            if($isMultisite && $currentBlogId > 1){
                $relativePathUNIX = str_replace(DTBPS_PATH_WP_CONTENT_UPLOADS_SITES_ID . DTBPS_DIR, DTBPS_PATH_WP_CONTENT_UPLOADS . DTBPS_DIR, $relativePathUNIX);
            }

            $fileSize = filesize($path);
            $zipSize += $fileSize;
            $fileHash = hash_file(DTBPS_HASH_ALGO, $path);

            if (isset($lastBackupMetadataMap[$relativePathUNIX]) && strcmp($lastBackupMetadataMap[$relativePathUNIX][3], $fileHash) == 0){
                $file_metadata_array = [$lastBackupMetadataMap[$relativePathUNIX][0], $lastBackupMetadataMap[$relativePathUNIX][1], $lastBackupMetadataMap[$relativePathUNIX][2], $lastBackupMetadataMap[$relativePathUNIX][3]];
            } else {
                $file_metadata_array = [$relativePathUNIX, $zipIndex, $backupId, $fileHash];

                // Add current file to archive
                $zip->addFile($filePath, $relativePathUNIX);
                if (DTBPS_CAN_ENCRYPT && !DTBPS_LOCAL_MODE)
                    $zip->setEncryptionName($relativePathUNIX, ZipArchive::EM_AES_256, DTBPS_CLIENT_ID);
                if($zipSize > 5000000){
                    $zip->close();

                    $currentZipSize = filesize($zipPathAndFileName);
                    if($currentZipSize < 4500000){
                        $zipSize = $currentZipSize;
                        $zip->open($zipPathAndFileName);
                    } else {
                        $zipIndex += 1;
                        $zipSize = 0;
                        $zipPathAndFileName = $backupFilesZipPath . $zipIndex . DTBPS_FILE_COMPRESSED_EXTENSION;
                        $zip = new ZipArchive();
                        $zip->open($zipPathAndFileName, ZipArchive::CREATE | ZipArchive::OVERWRITE);
                    }
                }
            }
            fputcsv($csvMetadataFile, $file_metadata_array);
        }
    }
    // Zip archive will be created only after closing object
    $zip->close();
    fclose($csvMetadataFile);

    $zipMetadataPathAndFileName = $backupPath . DTBPS_FILE_METADATA_NAME . DTBPS_FILE_COMPRESSED_EXTENSION;
    dtbps_zip_file($metadataPathAndFileName, $zipMetadataPathAndFileName, DTBPS_FILE_METADATA_NAME . DTBPS_FILE_CSV_EXTENSION);

    return $zipIndex;
}

function dtbps_generate_uuid4() {
    $data = random_bytes(16);
    assert(strlen($data) == 16);

    $data[6] = chr(ord($data[6]) & 0x0f | 0x40); // set version to 0100
    $data[8] = chr(ord($data[8]) & 0x3f | 0x80); // set bits 6-7 to 10

    return vsprintf('%s%s-%s-%s-%s-%s%s%s', str_split(bin2hex($data), 4));
}

function dtbps_set_password_if_needed($resource, $zip){
    $isOpenable = is_resource($resource);
    $zipEncrypted = true;
    if ($isOpenable){
        $isReadable = zip_read($resource);
        if ($isReadable)
            $zipEncrypted = false;
    }

    if (!DTBPS_CAN_DECRYPT && $zipEncrypted){
        throw new Exception("Cloud files are encrypted, upgrade PHP version to be able to use them!");
    } else if (DTBPS_CAN_DECRYPT && $zipEncrypted && !DTBPS_LOCAL_MODE)
        $zip->setPassword(DTBPS_CLIENT_ID);
}


function dtbps_print_error_in_console($messages){
    $errorMessage = 'Error: Unable to fetch data from the cloud: ' . esc_html($messages);
    throw new Exception($errorMessage);
}

function dtbps_return_exception_response($e){
    $errorMessage = 'Error: ' . esc_html($e->getMessage());
    echo "<div class='error'><p>" . esc_html($errorMessage) . "</p></div>";
    return array('status' => '404', 'message' => $errorMessage);
}

function dtbps_is_lock_error() {
    echo '<div class="error"><p><b>There is active DeltaBackups process started by you or other user, all activity is locked try later!</b></p><p><i>* This can be unchecked in Settings section, not advised!</i></p></div>';
}

function dtbps_modify_sql_query($line, $wpTablePrefix, $currentSiteUrl, $backupSiteUrl) {
    // replace only first occurrence, create wp_options and all inserts to wp_options except wp_user_roles
    $pattern = '/wp_posts|wp_postmeta|wp_commentmeta|wp_term_taxonomy|wp_options(?!.*wp_user_roles)/';
    $patternDomain = '/wp_posts|wp_postmeta|wp_options(?=.*astra)/';
    $patternDomainWpOptionsObject = '/wp_options(?=.*astra\-settings)/';

    if (preg_match($pattern, $line)) {
        if (!DTBPS_LOCAL_MODE && $backupSiteUrl !== "" && $backupSiteUrl !== $currentSiteUrl && preg_match($patternDomain, $line)) {
            // check if query matches
            if (preg_match($patternDomainWpOptionsObject, $line)) {
                $ptrn = '/s:\d+:\\\\"' . preg_quote($backupSiteUrl, '/') . '\/[^"]*\\\\";/';
                preg_match_all($ptrn, $line, $matches, PREG_OFFSET_CAPTURE);

                if (!empty($matches[0])) {
                    $unique_matches = []; // Array to store unique matches

                    foreach ($matches[0] as $match) {
                            $matched_string = $match[0]; // The matched substring

                            // Store unique matches using array_unique() and a simple array
                            if (!in_array($matched_string, $unique_matches)) {
                                $unique_matches[] = $matched_string; // Add only unique matched strings
                            }
                        }

                    // Output unique matched strings
                    foreach ($unique_matches as $unique_match) {
                        $unserializedMatch = unserialize(str_replace('\"', '"', $unique_match));
                        $replaced_unserialized_unique_match = str_replace($backupSiteUrl, $currentSiteUrl, $unserializedMatch);
                        $serializedUnique = str_replace('"', '\"', serialize( $replaced_unserialized_unique_match));

                        $line = str_replace($unique_match, $serializedUnique, $line);

                    }
                }
            } else {
                // plain replace domains
                $line = str_replace($backupSiteUrl, $currentSiteUrl, $line);
            }

        }

        return preg_replace('/' . preg_quote(DTBPS_DB_SQL_TABLE_DEFAULT_PREFIX, '/') . '/', $wpTablePrefix, $line, 1);
    }

    // replace all prefixes for the query
    return str_replace(DTBPS_DB_SQL_TABLE_DEFAULT_PREFIX, $wpTablePrefix, $line);
}
