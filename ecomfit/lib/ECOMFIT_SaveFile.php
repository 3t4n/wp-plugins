<?php

if (!class_exists('ECOMFIT_SaveFile')) {
    class ECOMFIT_SaveFile {

        public function __construct() {
        }

        /**
         * Check if the directory for feed file exist or not and make directory
         *
         * @param $path
         * @return bool
         */
        public static function check_dir($path) {
            if (!file_exists($path)) {
                return wp_mkdir_p($path);
            }
            return true;
        }

        /**
         * Save XML and TXT File
         *
         * @param $path
         * @param $file
         * @param $content
         * @return bool
         */
        public static function save_file($path, $file, $content) {
            // var_dump($content);
            if (ECOMFIT_SaveFile::check_dir($path)) {
                $fp = fopen($file, "wb");
                fwrite($fp, $content);
                fclose($fp);
                update_option("WPF_DIRECTORY_PERMISSION_CHECK","");
                return true;
            } else {
                $upload_dir = wp_upload_dir();
                $user_dirname = $upload_dir['basedir'];
                update_option("WPF_DIRECTORY_PERMISSION_CHECK"," <b>Directory $user_dirname is not writable</b>");
                return false;
            }
        }
    }
}