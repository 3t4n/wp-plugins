<?php

// This function checks certification.

if (!function_exists('amJL_check_certification')) {
    function amJL_check_certification($key) {
        $check_result = false;
        
        // ZIPファイルが存在するか確認
        if (file_exists(amJL_structure_zip_file)) {
            $zip = new ZipArchive();
            if ($zip->open(amJL_structure_zip_file)) {
                $zip->setPassword($key);
                // ZIPファイルを展開
                $zip->extractTo(autoMakingJSONLD);
                $zip->close();
                
                // 抽出されたファイルが存在するか確認
                if (file_exists(amJL_BL_dir.'breadcrumb.php')) {
                    $check_result = true;
                }
            }
        }

        return $check_result;
    }
}
