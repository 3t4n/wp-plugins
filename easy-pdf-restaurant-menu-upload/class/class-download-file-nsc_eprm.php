<?php

class downloadFile_nsc_eprm
{

    public function custom_rewrite_rules_nsc_eprm()
    {
        add_rewrite_rule(
            'easy-pdf-restaurant-menu/menu-files/([^/]+)?$',
            'index.php?nsceprm_filedownload=$matches[1]',
            'top'
        );
    }

    public function custom_query_vars_nsc_eprm($vars)
    {
        $vars[] = 'nsceprm_filedownload';
        return $vars;
    }


    public function handle_custom_file_request_nsc_eprm()
    {
        $validation = new clean_input_validation_nsc_eprm;
        $fileName = get_query_var('nsceprm_filedownload');
        $fileName = $validation->text_only_nsc_eprm($fileName);

        if (empty($fileName) === false) {
            $eprm = new nsc_easy_pdf_restaurant_menu;

            $filePath = $eprm->return_menu_upload_dir() . $fileName;

            if (file_exists($filePath)) {
                // Set headers
                $last_modified_time = filemtime($filePath);
                $etag = md5_file($filePath);
                $headersToSet = array("X-Robots-Tag" => "noindex", "Etag" => $etag, "Last-Modified" => gmdate("D, d M Y H:i:s", $last_modified_time) . " GMT");
                $headersToSet = apply_filters('headers_to_set_nsc_eprm', $headersToSet, $fileName);
                header('Content-Type: ' . mime_content_type($filePath));
                foreach ($headersToSet as $key => $value) {
                    header($key . ": " . $value);
                }
                if (ob_get_level()) {
                    ob_end_clean();
                }

                $handle = fopen($filePath, 'rb');
                if ($handle === false) {
                    die('Error opening the file.');
                }

                // Output the file content
                while (!feof($handle)) {
                    echo fread($handle, 8192);
                    flush();
                }

                fclose($handle);
                exit;
            } else {
                // Serve a 404 if the file doesn't exist
                status_header(404);
                echo 'File not found.';
                exit;
            }
        }
    }

}


?>