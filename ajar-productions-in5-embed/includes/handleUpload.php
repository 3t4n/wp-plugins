<?php

if (!defined('ABSPATH')) {
  exit;
} // Exit if accessed directly

if ( ! defined( 'DOING_AJAX' ) ) {
	return false;
}
if ( ! isset( $_GET['in5'] ) || $_GET['in5'] <> 'upload' ) {
	return false;
}
if ( ! isset( $_FILES ) ) {
	return false;
}

$files             = $_FILES;
$files             = $_FILES['files'];
$allFiles['files'] = array();

$customPath = ($_POST['customPath']) ? $_POST['customPath'] : 'wp-content/uploads/in5-archives';

if ($customPath !== '') {
  $customPath = _normalise($customPath);
}

$name    = $files['name'][0];
$size    = $files['size'][0];
$tmpName = $files['tmp_name'][0];
$type    = $files['type'][0];
$date    = date( "F d, Y" );

if ( in5_validateSize( $size ) == false ) {
	$maxSize = ini_get( 'upload_max_filesize' );
	echo 'Maximum allowed file size is ' . $maxSize . '!';
	wp_die();
}

if ( in5_validateFile( $name, $type ) == false ) {
	echo "Invalid file! Please try uploading another file.";
	wp_die();
}

$folderName = in5_doArchiveUpload($name, $tmpName, $customPath);
if ($folderName == "") {
  echo "The archive " . $name . " does not contain an index.html!";
  wp_die();
} else if( !_checkFolderForArbitraryFileUpload($folderName) ) {
	in5_rrmdir($folderName);
	echo "The archive " . $name . " contains PHP or some other file format that is not allowed, so cannot be used.";
  wp_die();
}


$metaData = in5_extractMetaData($folderName, $size, $customPath);
in5_writeMetaData($metaData);

$allFiles['files'][] = $metaData;
$allFiles['directory'] = $customPath;

echo json_encode( $allFiles );
wp_die();

/*
 @return bool pass/fail
*/
function _checkFolderForArbitraryFileUpload($folderName){
	if ( _searchDirForPHP($folderName) ) {
		return false;
	}
	return true;
}

/*
 @return bool true if a php file is found inside
*/
function _searchDirForPHP($folderName, $recur=true){
	foreach (scandir($folderName) as $file) {
		$fpath = $folderName.'/'.$file;
		$mtype = mime_content_type($file);
		if(!preg_match('/\w/', $file)) {
			continue; //skip names without letters or numbers
		}
		if(is_dir($fpath) || $mtype === "directory") {
			if( $recur && _searchDirForPHP($file) ){
				return true;
			}
		
		} else if ( _notAllowed($file, $fpath) ) {
				return true;
		}
	}
	return false;
}

function _notAllowed($file, $fpath){
	$filename = strtolower($file);
	$mtype = mime_content_type($file);
	//$whitelist contains in5-specific files that should be allowed, but have non-standard types
	$whitelist = array('in5.serviceworker.js', 'book.json', 'manifest.appcache');
	if(in_array($file, $whitelist)){
		return false;
	}
	$default_mimes = get_allowed_mime_types();
	$added_mimes = array(
			//formats that may be used with in5 output.
			'appcache'              				=> 'text/cache-manifest',
			'json'									=> 'application/json',
			'serviceworker|serviceworker.js'		=> 'text/javascript',
			'ttf'									=> 'font/ttf',
			'otf'									=> 'font/otf',
			'woff'									=> 'font/woff2',
			'eot'									=> 'application/vnd.ms-fontobject'
	);
	$allowed_mimes = array_merge($default_mimes, $added_mimes);
	$wp_check = wp_check_filetype_and_ext($fpath, $file, $allowed_mimes);
	$wp_type = $wp_check['type'];
	$wp_ext = $wp_check['ext'];
	return (str_contains($filename,'.php') ||  str_contains($mtype, 'php') ||
		$wp_ext === false || $wp_type === false );
}



/**
 * Normalise a file path string so that it can be checked safely.
 *
 * Attempt to avoid invalid encoding bugs by transcoding the path. Then 
 * remove any unnecessary path components including '.', '..' and ''.
 *
 * @param $path string
 *     The path to normalise.
 * @param $encoding string
 *     The name of the path iconv() encoding.
 * @return string
 *    The path, normalised.
 */
function _normalise($path, $encoding = "UTF-8")
{

  // Attempt to avoid path encoding problems.
  $path = iconv($encoding, "$encoding//IGNORE//TRANSLIT", $path);
  // Process the components
  $parts = explode('/', $path);
  $safe = array();
  foreach ($parts as $idx => $part) {
    if (empty($part) || ('.' == $part)) {
      continue;
    } elseif ('..' == $part) {
      array_pop($safe);
      continue;
    } else {
      $safe[] = $part;
    }
  }

  // Return the "clean" path
  $path = implode(DIRECTORY_SEPARATOR, $safe);
  return $path;
}
