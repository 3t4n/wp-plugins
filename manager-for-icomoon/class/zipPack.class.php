<?php

namespace managerForIcomoon ; 

use RecursiveIteratorIterator;
use RecursiveDirectoryIterator;

class ZipPack {
    

    private static $allowed_files = array(
        'fonts'.DIRECTORY_SEPARATOR.'icomoon.eot',
        'fonts'.DIRECTORY_SEPARATOR.'icomoon.svg',
        'fonts'.DIRECTORY_SEPARATOR.'icomoon.ttf',
        'fonts'.DIRECTORY_SEPARATOR.'icomoon.woff',
        'ie7'.DIRECTORY_SEPARATOR.'ie7.css',
        'ie7'.DIRECTORY_SEPARATOR.'ie7.js',
        'selection.json',
        'style.css',
        'style.min.css'
    );

    public function __construct(){
        if(isset($_POST['managerforicomoon-upload'])){
            self::upload();
        }
        if(isset($_POST['managerforicomoon-minify'])){
            self::minifyCSS();
        }

        if(isset($_POST['managerforicomoon-restore'])){
            self::restoreDefault();
        }
    }

    /**
     * Upload de l'archive .zip d'icomoon
     */
    static public function upload(){
        try {

            // Vérification des droits utilisateur
            if(!function_exists('wp_get_current_user')) {
                include_once ABSPATH . "wp-includes/pluggable.php" ; 
            }
            if (!current_user_can('manage_options')) {
                throw new \Exception(__('You do not have permission to manage the zip archive.', 'managerforicomoon'));
            }
            // Vérification du nonce
            if (!isset($_POST['managerforicomoon-zip_nonce']) or 
                    !wp_verify_nonce($_POST['managerforicomoon-zip_nonce'], 'managerforicomoon-zip_nonce')) {
                throw new \Exception(__('Cross-Site Request Forbidden!', 'managerforicomoon'));
            }
            // Vérifie si un fichier a été téléversé
            if (empty($_FILES['managerforicomoon-zip']['name'])) {
                throw new \Exception( __("Please select a .zip file!", "managerforicomoon"));
            }
            // Verification du format .zip
            $file_info = pathinfo(strtolower($_FILES['managerforicomoon-zip']['name'])) ;
            if($file_info['extension'] != "zip" or 
               ($_FILES['managerforicomoon-zip']['type'] != 'application/zip' && $_FILES['managerforicomoon-zip']['type'] != 'application/x-zip-compressed')){
                throw new \Exception( __('You can only load files in .zip format!','managerforicomoon') );
            }
            
            require_once(ABSPATH .'/wp-admin/includes/file.php');
            WP_Filesystem();  

            // Vidage du dossier existant
            self::rrmdir(Core::getIcomoonUploadPath());

            // Extraction du fichier ZIP
            $unzip_result  = unzip_file($_FILES['managerforicomoon-zip']['tmp_name'], Core::getIcomoonUploadPath());
            if(is_wp_error($unzip_result)) {
                throw new \Exception(__('Zip extraction error : ', 'managerforicomoon').$unzip_result->get_error_message());
            }

            // Filtrer les fichiers non autorisés après l'extraction
            self::filterUnauthorizedFiles();

            // Minify CSS
            self::minifyCSS();

            // Init the icomoon access
            Core::setIcomoonUrlAndPath();

            // Update options with selection.json params
            Options::updateFromSelectionJson();

            //Notice::setInfo( __( "The icomoon package has been uploaded successfully", 'managerforicomoon') ) ;
            Notice::setToastInfo( __( "The icomoon package has been uploaded successfully.", 'managerforicomoon') ) ;            


        } catch (\Exception $ex) {
            Notice::setToastError($ex->getMessage()); 
        }
    }

    /**
     * Filtrage des fichiers autorisés dans l'archive .zip d'icomoon
     */
    static private function filterUnauthorizedFiles() {
        $directory = Core::getIcomoonUploadPath();
        $files = new RecursiveIteratorIterator(
            new RecursiveDirectoryIterator($directory),
            RecursiveIteratorIterator::SELF_FIRST
        );

        $deleted_files_count = 0;

        foreach ($files as $file) {
            if ($file->isFile()) {
                $relative_path = substr($file->getPathname(), strlen($directory));
                $relative_path = ltrim($relative_path, DIRECTORY_SEPARATOR); 

                if (!in_array($relative_path, self::$allowed_files)) {
                    // Si le fichier n'est pas autorisé, le supprimer et incrémenter le compteur
                    unlink($file->getPathname());
                    $deleted_files_count++;
                }
            }
        }

        return $deleted_files_count;
    }

    /**
     * Minification du CSS
     */
    static public function minifyCSS(){
        try {
            $style = file_get_contents(Core::getIcomoonUploadPath().'style.css');
        
            $minified = str_replace("\n", "", $style);
            $minified = str_replace("  ", " ", $minified);
            $minified = str_replace("  ", " ", $minified);
            $minified = str_replace(" {", "{", $minified);
            $minified = str_replace("{ ", "{", $minified);
            $minified = str_replace(" }", "}", $minified);
            $minified = str_replace("} ", "}", $minified);
            $minified = str_replace(", ", ",", $minified);
            $minified = str_replace("; ", ";", $minified);
            $minified = str_replace(": ", ":", $minified);
    
            $styleMini = fopen(Core::getIcomoonUploadPath().'style.min.css', 'w');
            fwrite($styleMini, $minified);
            fclose($styleMini);

            Notice::setToastInfo(__( "The CSS file has been minified successfully.", 'managerforicomoon'));
        } catch (\Exception $ex) {
            Notice::setToastError($ex->getMessage()); 
        }
        
    }
 
	/**
     * Restauration des icones par défaut
     */
    static public function restoreDefault(){
        try {
            if(!isset($_POST['restore-confirm'])){
                throw new \Exception( __( "Thanks to confirm that you have understood the consequences of this operation.", 'managerforicomoon') );
            }

            // Vidage du dossier existant
            self::rrmdir(Core::getIcomoonUploadPath());
            
            // Init the icomoon access
            Core::setIcomoonUrlAndPath();

            // Update options with selection.json params
            Options::updateFromSelectionJson();

            //Notice::setInfo( __( "Default icons have been restored successfully.", 'managerforicomoon') ) ;
            Notice::setToastInfo( __( 'Default icons have been restored successfully.', 'managerforicomoon') ) ;
        } catch (\Exception $ex) {
            //Notice::setError($ex->getMessage());
            Notice::setToastError($ex->getMessage()); 
        }
    }

	/**
     * Suppression recursive des fichiers d'un dossier
     * 
     * @param string $dir 
     */
    static private function rrmdir($dir) {
        if(is_dir($dir)) {
          $objects = scandir($dir);
          foreach ($objects as $object) {
            if ($object != "." && $object != "..") {
              if (filetype($dir."/".$object) == "dir") 
                    self::rrmdir($dir."/".$object); 
              else unlink   ($dir."/".$object);
            }
          }
          reset($objects);
          rmdir($dir);
        }
    }
}