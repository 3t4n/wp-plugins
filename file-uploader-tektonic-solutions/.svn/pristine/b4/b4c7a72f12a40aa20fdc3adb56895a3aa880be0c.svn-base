<?php
/**
 * Plugin Name:   File Uploader - Tektonic Solutions
 * Description:   This plugin lets you embed a file uploader in your WordPress website.
 * Author:        Tektonic Solutions
 * Author URI:    https://tektonicsolutions.com/
 * Developer:     Tektonic Solutions
 * Developer URI: https://tektonicsolutions.com/
 * Text Domain:   file-uploader-tektonic-solutions
 * Network:       false
 * Slug:          file-uploader-tektonic-solutions
 * Version:       1.0.0
 * License:       GPLv2 or later
 *
 * Copyright (C) 2019  Tektonic Solutions (https://tektonicsolutions.com/)
 *
 * @package    file-uploader-tektonic-solutions
 * @subpackage Main
 * @author     Tektonic Solutions (https://tektonicsolutions.com/)
 * @version    1.0.0
 */

// Exit if accessed directly.
defined( 'ABSPATH' ) or die;

// Define the constants to use in the plugin
if( !defined( 'TEKTONIC_FILE_UPLOAD_PLUGIN_PATH' ) ) {
	define( 'TEKTONIC_FILE_UPLOAD_PLUGIN_PATH', plugin_dir_path( __FILE__ ) );
}

if( !defined( 'TEKTONIC_FILE_UPLOAD_PLUGIN_URL' ) ) {
	define( 'TEKTONIC_FILE_UPLOAD_PLUGIN_URL', plugins_url(null, __FILE__) );
}

if( !defined('TEKTONIC_FILE_UPLOAD_PLUGIN_ALREADY_EXISTS' ) ) {
	define( 'TEKTONIC_FILE_UPLOAD_PLUGIN_ALREADY_EXISTS', __('It seems that you have another version of this plugin already installed. Please de-activate or delete it before proceeding.'));
}

register_activation_hook( __FILE__, 'tektonic_file_upload_install' );

/**
 * tektonic_file_upload_install()
 * To add the options to the wp_options table while plugin installation
 *
 * @since  1.0.0
 * @author Tektonic Solutions (https://tektonicsolutions.com/)
 * @return Void
 */
if( !function_exists('tektonic_file_upload_install')) {
	function tektonic_file_upload_install() {
		global $wpdb;

		$table_name      = $wpdb->prefix . 'tektonic_file_upload_logs';
		$charset_collate = $wpdb->get_charset_collate();

		$sql = "CREATE TABLE $table_name (
	  id mediumint(9) NOT NULL AUTO_INCREMENT,
	  user_id tinytext NOT NULL,
	  file_name text NOT NULL,
	  date_added datetime DEFAULT '0000-00-00 00:00:00' NOT NULL,
	  PRIMARY KEY  (id)
	  ) $charset_collate;";

		require_once( ABSPATH . 'wp-admin/includes/upgrade.php' );
		dbDelta( $sql );

		$addOptions = array(
			'tektonic_file_upload_bar_show' => 'on',
			'tektonic_file_upload_bar_type' => 'bar',
			'tektonic_file_upload_allowed_file_types' => 'txt,jpg,jpeg,bmp,gif,png',
			'tektonic_file_upload_hotlink_filename' => 'on'
		);

		add_option( 'tektonic_file_upload_options', $addOptions );

		add_option( 'tektonic_file_upload_db_version', '1.0' );
	}
} else {
	die( TEKTONIC_FILE_UPLOAD_PLUGIN_ALREADY_EXISTS );
}

/**
 * tektonic_file_upload_custom_enqueue()
 * To enqueue the styles and scripts used in this plugin
 *
 * @since  1.0.0
 * @author Tektonic Solutions (https://tektonicsolutions.com/)
 * @return Void
 */
if( !function_exists('tektonic_file_upload_custom_enqueue')) {
	function tektonic_file_upload_custom_enqueue() {
		/** Variables assignment **/
		$ajaxUrl        = admin_url( 'admin-ajax.php' );
		$currentPageUrl = basename(get_permalink());
		$siteUrl        = get_site_url();
		$currentUserId  = absint(get_current_user_id());

		wp_enqueue_style( 'tektonic-file-upload-css', TEKTONIC_FILE_UPLOAD_PLUGIN_URL . '/css/tektonic-file-upload.css', array(), '1.0.0', 'all' );
		wp_enqueue_style( 'tektonic-file-upload-circle-css', TEKTONIC_FILE_UPLOAD_PLUGIN_URL . '/css/tektonic-file-upload-circle.css', array(), '1.0.0', 'all' );
		wp_enqueue_script( 'jquery' );
		wp_enqueue_script( 'tektonic-file-upload-js', TEKTONIC_FILE_UPLOAD_PLUGIN_URL . '/js/tektonic-file-upload.js', array(), null, true );

	    wp_localize_script( 'tektonic-file-upload-js', 'tektonic_site_params', array(
				'ajax_url'     => esc_url($ajaxUrl),
				'current_page' => esc_url($currentPageUrl),
				'site_url'     => esc_url($siteUrl),
				't'            => absint($currentUserId),
				'tsfu'         => wp_create_nonce( 'tektonic-file-upload' )
			)
		);
	}
} else {
	die( TEKTONIC_FILE_UPLOAD_PLUGIN_ALREADY_EXISTS );
}

add_action( 'wp_enqueue_scripts', 'tektonic_file_upload_custom_enqueue' );

/**
 * tektonic_file_upload_custom_enqueue_admin()
 * To enqueue the styles and scripts for the plugin settings page in admin area
 *
 * @since  1.0.0
 * @author Tektonic Solutions (https://tektonicsolutions.com/)
 * @return Void
 */
if( !function_exists('tektonic_file_upload_custom_enqueue_admin')) {
	function tektonic_file_upload_custom_enqueue_admin( $hook ) {
	    if($hook != 'settings_page_tektonic-file-upload-settings') {
	        return;
	    }

	    wp_enqueue_style( 'tektonic-file-upload-admin-css', TEKTONIC_FILE_UPLOAD_PLUGIN_URL . '/css/tektonic-file-upload-admin.css', array(), '1.0.0', 'all' );
	}
} else {
	die( TEKTONIC_FILE_UPLOAD_PLUGIN_ALREADY_EXISTS );
}

add_action( 'admin_enqueue_scripts', 'tektonic_file_upload_custom_enqueue_admin' );

add_shortcode('tektonic_file_upload', 'tektonic_file_upload_form');

/**
 * tektonic_file_upload_form()
 * To show the HTML form to let the users drag-n-drop a file
 *
 * @since  1.0.0
 * @author Tektonic Solutions (https://tektonicsolutions.com/)
 * @return String
 */
if( !function_exists('tektonic_file_upload_form')) {
	function tektonic_file_upload_form() {
		$getTektonicOptions = get_option( 'tektonic_file_upload_options' );
		$fileTypes = isset( $getTektonicOptions['tektonic_file_upload_allowed_file_types'] ) ? $getTektonicOptions['tektonic_file_upload_allowed_file_types'] : 'txt,jpg,jpeg,bmp,gif,png';

		// Escape before outputting the data
		$fileTypes = esc_html( $fileTypes );

		ob_start();
		include( TEKTONIC_FILE_UPLOAD_PLUGIN_PATH . '/template-parts/upload-form.php' );

		return ob_get_clean();
	}
} else {
	die( TEKTONIC_FILE_UPLOAD_PLUGIN_ALREADY_EXISTS );
}

add_action( 'wp_ajax_tektonic_file_upload', 'tektonic_file_upload' );
add_action( 'wp_ajax_nopriv_tektonic_file_upload', 'tektonic_file_upload_login_redirect' );

/**
 * tektonic_file_upload()
 * This function uploads the files to the WordPress folder
 *
 * @since  1.0.0
 * @author Tektonic Solutions (https://tektonicsolutions.com/)
 * @return Void
 */
if( !function_exists('tektonic_file_upload')) {
	function tektonic_file_upload() {
		/** Check if valid ajax call **/
	    check_ajax_referer( 'tektonic-file-upload', 'tsfu' );

	    $uploadId = $lastInsertId = 0;

		$wpUploadDir     = wp_get_upload_dir();
		$wpUploadDirPath = $wpUploadDir['basedir'];
		$wpUploadUrl     = $wpUploadDir['baseurl'];

		// Sanitize values if they exist
		$filename    = isset($_FILES['file']['name']) ? sanitize_file_name($_FILES['file']['name']) : null;
		$fileTmpName = isset($_FILES['file']['tmp_name']) ? sanitize_text_field($_FILES['file']['tmp_name']) : null;

		$info          = new SplFileInfo($filename);
		$fileExtension = $info->getExtension();
		$fileExtension = strtolower($fileExtension);
		$fileNameWithoutExt = str_replace('.' . $fileExtension, '', $filename);
		$fileNewName   = str_replace(' ', '-', $fileNameWithoutExt). '_' . time() . '.' . $fileExtension;

		// Sanitize file name
		$fileNewName   = sanitize_file_name( $fileNewName );

		$filePath = $wpUploadDirPath . '/' . $fileNewName;

		// Sanitize file path
		$filePath = sanitize_text_field( $filePath );

		$fileUrl  = $wpUploadUrl . '/' . $fileNewName;

		// Escape the URL
		$fileUrl  = esc_url_raw( $fileUrl );

		$fileMime = mime_content_type( $fileTmpName );

		// Sanitize the MIME type
		$fileMime = sanitize_mime_type( $fileMime );

		$getTektonicOptions = get_option( 'tektonic_file_upload_options' );

		// Escape values if they exist for outputting
		$fileTypes = isset($getTektonicOptions['tektonic_file_upload_allowed_file_types']) ? esc_html($getTektonicOptions['tektonic_file_upload_allowed_file_types']) : 'txt,jpg,jpeg,bmp,gif,png';
		$hotLinking = isset($getTektonicOptions['tektonic_file_upload_hotlink_filename']) ? esc_html($getTektonicOptions['tektonic_file_upload_hotlink_filename']) : null ;

		$arrFileTypes = explode(',', $fileTypes);
		$arrFileTypes = tektonic_file_upload_trimData($arrFileTypes);

		if( in_array($fileExtension, $arrFileTypes) ) {
			try {
				$moveFile = move_uploaded_file( $fileTmpName, $filePath );

				$uploadId = (int) tektonic_file_upload_insert_attachment( $filePath, $fileNewName, $fileMime );
			} catch(Exception $e) {
				echo 'Error: ' . $e->getMessage(); die;
			}

			if( $moveFile === false ) {
				echo 1;
				die;
			}

			$lastInsertId = (int) tektonic_file_upload_log_data($fileNewName);

			$deleteHtml = null;

			$deleteIcon = plugin_dir_url( __FILE__ ) . 'trash.png';

			if($lastInsertId > 0) {
				// Use escaping before displaying on browser
				$deleteHtml = '<img src="'.esc_url($deleteIcon).'" class="pleft delete-file" data-fid="' . absint($lastInsertId) . '" data-fname="' . esc_attr($fileNewName) . '" onclick="' . esc_js('deleteFile(this)'). '" title="'.esc_html__('Click here to delete this file').'" data-aid="' . absint($uploadId) . '">';
			}

			if(!file_exists($filePath)) {
				$deleteHtml = null;
			}

			if(file_exists($filePath)) {
				if($hotLinking == 'on') {
					echo json_encode(array(
						// Use escaping before displaying on browser
						'html' => $deleteHtml . '<a href="' . esc_url($fileUrl) . '" title="" target="_blank">' . esc_html($fileNewName) . '</a>'
					));
				} else {
					echo json_encode(array(
						// Use escaping before displaying on browser
						'html' => $deleteHtml . esc_html($fileNewName)
					));
				}
			}
		} else {
			echo 2;
		}

		die;
	}
} else {
	die( TEKTONIC_FILE_UPLOAD_PLUGIN_ALREADY_EXISTS );
}

/**
 * tektonic_file_upload_insert_attachment()
 * This function adds the uploaded file to media
 *
 * @since  1.0.0
 * @author Tektonic Solutions (https://tektonicsolutions.com/)
 *
 * @param  $filePath     String
 * @param  $fileNewName  String
 * @param  $fileMime     String
 *
 * @return Void
 */
if( !function_exists('tektonic_file_upload_insert_attachment') ) {
	function tektonic_file_upload_insert_attachment( $filePath, $fileNewName, $fileMime ) {
		// Sanitize the values before inserting
		$filePath    = sanitize_text_field($filePath);
		$fileMime    = sanitize_mime_type($fileMime);
		$fileNewName = sanitize_file_name($fileNewName);

		$uploadId = (int) wp_insert_attachment( array(
			'guid'           => $filePath, 
			'post_mime_type' => $fileMime,
			'post_title'     => preg_replace( '/\.[^.]+$/', '', $fileNewName ),
			'post_content'   => '',
			'post_status'    => 'inherit'
		), $filePath );

		require_once( ABSPATH . 'wp-admin/includes/image.php' );

		wp_update_attachment_metadata( $uploadId, wp_generate_attachment_metadata( $uploadId, $filePath ) );

		return absint($uploadId);
	}
} else {
	die( TEKTONIC_FILE_UPLOAD_PLUGIN_ALREADY_EXISTS );
}

/**
 * tektonic_file_upload_log_data()
 * This function logs the file data in the db after a successful upload
 *
 * @since  1.0.0
 * @author Tektonic Solutions (https://tektonicsolutions.com/)
 * @return Integer
 */
if( !function_exists('tektonic_file_upload_log_data')) {
	function tektonic_file_upload_log_data( $fileName ) {
		global $wpdb;

		// Sanitize the file name
		$fileName = sanitize_file_name( $fileName );

		$wpdb->insert( 
			$wpdb->prefix . 'tektonic_file_upload_logs', 
			array( 
				'user_id'    => get_current_user_id(),
				'file_name'  => $fileName,
				'date_added' => current_time( 'mysql', 1 ) 
			), 
			array( 
				'%d', 
				'%s',
				'%s'
			)
		);

		return absint($wpdb->insert_id);
	}
} else {
	die( TEKTONIC_FILE_UPLOAD_PLUGIN_ALREADY_EXISTS );
}

add_action('wp_ajax_tektonic_file_upload_delete_file', 'tektonic_file_upload_delete_file');
add_action('wp_ajax_nopriv_tektonic_file_upload_delete_file', 'tektonic_file_upload_login_redirect');

/**
 * tektonic_file_upload_delete_file()
 * This function deletes the currently uploaded file
 *
 * @since  1.0.0
 * @author Tektonic Solutions (https://tektonicsolutions.com/)
 * @return Void
 */
if( !function_exists('tektonic_file_upload_delete_file')) {
	function tektonic_file_upload_delete_file() {
		/** Check if valid ajax call **/
	    check_ajax_referer( 'tektonic-file-upload', 'tsfu' );

		global $wpdb;

		$resp     = __('File could not be deleted! Please try again.');

		// Sanitize the values before deleting
		$fileId   = isset($_REQUEST['file_id']) ? absint($_REQUEST['file_id']) : 0;
		$fileName = isset($_REQUEST['file_name']) ? sanitize_file_name($_REQUEST['file_name']) : null;
		$postId   = isset($_REQUEST['aid']) ? absint($_REQUEST['aid']) : 0;

		// Delete the upload logs
		$deleteFile = (int) $wpdb->delete( $wpdb->prefix . 'tektonic_file_upload_logs',
			array( 'id' => $fileId, 'user_id' => get_current_user_id() ),
			array( '%d' )
		);

		if($deleteFile > 0) {
			$wpUploadDir     = wp_get_upload_dir();
			$wpUploadDirPath = $wpUploadDir['basedir'];

			$filePath = $wpUploadDirPath . '/' . $fileName;

			if( file_exists($filePath) ) {
				unlink($filePath);
			}

			tektonic_file_upload_delete_attachments( $postId );

			$resp = __('File deleted successfully!');
		}

		$output = array(
			'error'   => $deleteFile,
			'message' => $resp
		);

		echo json_encode($output);
		die;
	}
} else {
	die( TEKTONIC_FILE_UPLOAD_PLUGIN_ALREADY_EXISTS );
}

/**
 * tektonic_file_upload_delete_attachments()
 * This function notifies the users to login
 *
 * @since  1.0.0
 * @author Tektonic Solutions (https://tektonicsolutions.com/)
 * @return Void
 */
function tektonic_file_upload_delete_attachments( Int $attachmentId ) {
	if( !empty($attachmentId) ) {
		wp_delete_attachment( $attachmentId, true);
		wp_delete_post( $attachmentId, true );
	}
}

/**
 * tektonic_file_upload_login_redirect()
 * This function notifies the users to login
 *
 * @since  1.0.0
 * @author Tektonic Solutions (https://tektonicsolutions.com/)
 * @return Void
 */
if( !function_exists('tektonic_file_upload_login_redirect')) {
	function tektonic_file_upload_login_redirect() {
		$return = array(
			'error'   => 1,
			'message' => __('Error: Please log in and try again.')
		);

		echo json_encode($return);
		die;
	}
} else {
	die( TEKTONIC_FILE_UPLOAD_PLUGIN_ALREADY_EXISTS );
}

add_filter( 'plugin_row_meta', 'tektonic_file_upload_meta_links', 10, 2 );

/**
 * tektonic_file_upload_meta_links()
 * This function creates the plugin meta links on the plugins page
 *
 * @since  1.0.0
 * @author Tektonic Solutions (https://tektonicsolutions.com/)
 * @return Array
 */
if( !function_exists('tektonic_file_upload_meta_links')) {
	function tektonic_file_upload_meta_links( $links, $file ) {
		if ( strpos( $file, 'tektonic-file-upload.php' ) !== false ) {
			$newLinks = array(
				'tektonic-solutions-doc' => '<a href="'.esc_url('https://www.tektonicsolutions.com/ts_plugin/file-uploader/').'" target="_blank">'.esc_html__('User Manual').'</a>',
				'tektonic-solutions-donate' => '<a href="'.esc_url('https://www.tektonicsolutions.com/ts_plugin/file-uploader/').'" target="_blank">'.esc_html__('Donate').'</a>',
				'tektonic-solutions-faq' => '<a href="'.esc_url('http://www.tektonicsolutions.com/faq/').'" target="_blank">'.esc_html__('FAQs').'</a>'
			);
			
			$links = array_merge( $links, $newLinks );
		}
		
		return $links;
	}
} else {
	die( TEKTONIC_FILE_UPLOAD_PLUGIN_ALREADY_EXISTS );
}

add_filter( 'plugin_action_links_' . plugin_basename(__FILE__), 'tektonic_file_upload_action_links' );

/**
 * tektonic_file_upload_action_links()
 * This function creates the plugin action links on the plugins page
 *
 * @since  1.0.0
 * @author Tektonic Solutions (https://tektonicsolutions.com/)
 * @return Array
 */
if( !function_exists('tektonic_file_upload_action_links')) {
	function tektonic_file_upload_action_links ( $links ) {
		$settingsPageURL = admin_url( 'options-general.php?page=tektonic-file-upload-settings' );

		$mylinks = array(
			'tektonic-settings' => '<a href="' . esc_url($settingsPageURL) . '" id="tektonic-settings"  target="_blank">'.esc_html__('Settings').'</a>',
			'tektonic-upgrade-to-pro' => '<a href="'.esc_url('https://www.tektonicsolutions.com/ts_plugin/file-uploader-pro-with-drag-n-drop/').'" id="tektonic-upgrade-to-pro" target="_blank">'.esc_html__('Upgrade to Pro').'</a>'
		);

		return array_merge( $links, $mylinks );
	}
} else {
	die( TEKTONIC_FILE_UPLOAD_PLUGIN_ALREADY_EXISTS );
}

/**
 * tektonic_file_upload_trimData()
 * This function trims the elements in an array
 *
 * @since  1.0.0
 * @author Tektonic Solutions (https://tektonicsolutions.com/)
 * @param  entity
 * @return Array
 */
if( !function_exists('tektonic_file_upload_trimData')) {
	function tektonic_file_upload_trimData( Array $entity ) {
		foreach ($entity as &$value) {
			$value = trim($value);
		}

		return $entity;
	}
} else {
	die( TEKTONIC_FILE_UPLOAD_PLUGIN_ALREADY_EXISTS );
}

if( is_admin() ) {
	include TEKTONIC_FILE_UPLOAD_PLUGIN_PATH . 'classes/tektonic-file-upload-settings-class.php';
	$objTektonicFileUploadSettingsPage = new TektonicFileUploadSettingsPage();
}
