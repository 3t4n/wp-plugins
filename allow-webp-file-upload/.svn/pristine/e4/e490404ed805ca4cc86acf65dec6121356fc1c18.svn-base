<?php
/**
* Plugin Name: Allow webp file upload
* Plugin URI: https://wordtune.me
* Description: Install an avtivate this Plugin enable uploading webp files
* Author: WordTune
* Author URI: https://wordtune.me
* Version:           1.0
* License:           GPL-2.0+
* License URI:       http://www.gnu.org/licenses/gpl-2.0.txt
**/


add_filter( 'upload_mimes', 'allowwebpupload', 1, 1 );
function allowwebpupload ( $mime_types ) {
  $mime_types['webp'] = 'image/webp';

  return $mime_types;
}
?>
