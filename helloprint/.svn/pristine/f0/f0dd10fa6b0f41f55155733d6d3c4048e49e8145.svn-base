<?php



namespace HelloPrint\Inc\Services;

use DateTime;

class FileUploadService
{
    public function storeFile($files, $plugin_path, $path = '')
    {
        // Load the necessary file for WP_Filesystem
        require_once ABSPATH . 'wp-admin/includes/file.php';
        global $wp_filesystem;
        if (!WP_Filesystem()) {
            return []; // Return an empty array if WP_Filesystem cannot initialize
        }

        $uploaded_files = [];
        $plugin_upload_path = $path ? $path : 'uploads/print-tmp/';
        $basePath = $plugin_path . '../../' . $plugin_upload_path;

        // Check if directory exists, and create if not
        if (!$wp_filesystem->is_dir($basePath)) {
            $wp_filesystem->mkdir($basePath, FS_CHMOD_DIR);
        }

        // Apply .htaccess to the directory if needed
        if ($path == '') {
            $this->noIndexOnSearchEngine($basePath);
        }

        $acceptedFileTypes = [
            'image/jpeg', 
            'image/png', 
            'image/jpg', 
            'application/pdf', 
            'image/tiff', 
            'image/tif', 
            'application/vnd.openxmlformats-officedocument.wordprocessingml.document', 
            'application/msword',
            'application/x-zip-compressed', 
            'application/octet-stream', 
            'application/postscript'
        ];// Allowed file types

        // Loop through each file and process upload
        foreach ($files['name'] as $index => $name) {
            $temp_file = $files['tmp_name'][$index];

            // Use wp_check_filetype_and_ext to validate MIME type and extension
            $file_info = wp_check_filetype_and_ext($temp_file, $name);
            if (!$file_info['ext'] || !$file_info['type'] || !in_array($file_info['type'], $acceptedFileTypes)) {
                continue; // Skip file if type or extension is not allowed
            }
            
            $file_name = gmdate("YmdHis") . '-' . basename(str_replace(' ', '-', sanitize_text_field($name)));
            $target = trailingslashit($basePath) . $file_name;

            // Use WP_Filesystem to move the uploaded file
            $temp_file = $files['tmp_name'][$index];
            if ($wp_filesystem->move($temp_file, $target)) {
                $uploaded_files[] = [
                    'file_name' => sanitize_text_field($file_name),
                    'file_path' => '/wp-content/' . $plugin_upload_path . $file_name
                ];
            }
        }

        return $uploaded_files;
    }

    public function noIndexOnSearchEngine($path)
    {
        try {
            $logger = wc_get_logger();
            $context = array('source' => 'helloprint');
            $path = trailingslashit($path) . '.htaccess';
            
            // Load the necessary file for WP_Filesystem
            require_once ABSPATH . 'wp-admin/includes/file.php';

            // Initialize WP_Filesystem
            global $wp_filesystem;
            if (!WP_Filesystem()) {
                $logger->error('Failed to initialize WP_Filesystem', $context);
                return;
            }

            // Check if the file already exists
            if ($wp_filesystem->exists($path)) {
                $logger->notice('.htaccess file already exists', $context);
                return;
            }

            // Content to write to the .htaccess file
            $htaccessContent = 'Options -Indexes';

            // Write content to the .htaccess file
            if (!$wp_filesystem->put_contents($path, $htaccessContent, FS_CHMOD_FILE)) {
                $logger->error('.htaccess file cannot be created or written to', $context);
                return;
            }

            $logger->info('.htaccess rule added and file created successfully', $context);

            // Set permissions for the .htaccess file (if needed)
            $wp_filesystem->chmod($path, 0644);
            $logger->info('.htaccess file permissions set to 0644', $context);
            
        } catch (\Exception $e) {
            error_log($e->getCode() . " :: " . $e->getMessage() . " at " . $e->getLine() . " of " . $e->getFile());
        }
    }
}
