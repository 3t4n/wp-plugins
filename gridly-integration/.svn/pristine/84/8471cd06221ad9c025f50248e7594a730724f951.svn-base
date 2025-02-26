<?php

/*
 * Plugin Name:       Gridly Integration
 * Plugin URI:        https://www.gridly.com/integrations/
 * Description:       Description: An integration that you can use to send and receive your WordPress pages with Gridly.
 * Version:           1.0.2
 * Requires at least: 6.2.2
 * Requires PHP:      7.2
 * Author:            Gridly
 * Author URI:        https://gridly.com
 * License:           GPL v2 or later
 * License URI:       https://www.gnu.org/licenses/gpl-2.0.html
 * Text Domain:       gridly-integration
 */
if (!defined('ABSPATH')) {
	exit;
}
$isWpmlIsntalled = false;

if (defined('ICL_SITEPRESS_VERSION')) {
	// WPML is active, include the necessary files
	$plugin_path = plugin_dir_path(__FILE__);

	include_once $plugin_path . '../sitepress-multilingual-cms/inc/translation-management/translation-management.class.php';
	include_once $plugin_path . '../sitepress-multilingual-cms/inc/wpml-private-actions-tm.php';
	include_once $plugin_path . '../sitepress-multilingual-cms/classes/class-wpml-translation-job-factory.php';
	require_once $plugin_path . '../sitepress-multilingual-cms/classes/ATE/JobRecords.php';
	require_once $plugin_path . '../sitepress-multilingual-cms/classes/translation-roles/endpoints/SaveUser.php';



	// Hook into the 'wpml_added_local_translation_job' action to log the translation job
	add_action('wpml_added_local_translation_job', 'GRDL_WP_PLUGIN_LOG_TRANSLATION_JOB');
	add_action('plugins_loaded', 'GRDL_WP_PLUGIN_CHECK_GRIDLY_INTEGRATION_TABLES');
	add_action('wp_ajax_GRDL_WP_PLUGIN_GET_TRANSLATIONS', 'GRDL_WP_PLUGIN_GET_TRANSLATIONS');
	add_action('admin_init', 'GRDL_WP_PLUGIN_SAVE_USER');
	add_action('admin_menu', 'GRDL_WP_PLUGIN_MENU');
	add_action('admin_post', 'GRDL_WP_PLUGIN_DELETE_PROFILE');
	add_action('admin_enqueue_scripts', 'GRDL_WP_PLUGIN_enqueue_scripts');
	$isWpmlIsntalled = true;
	// Your plugin code that relies on WPML goes here
	// ...
} else {
	// WPML is not active, handle the situation gracefully
	add_action('admin_notices', 'GRDL_WP_PLUGIN_ADMIN_NOTICE');
}



function GRDL_WP_PLUGIN_ADMIN_NOTICE()
{
?><div class="notice notice-error">
		<p>!!! You must buy and activate WPML to be able to use the Gridly plugin. !!!</p>
	</div>
<?php
}


function GRDL_WP_PLUGIN_LOG_TRANSLATION_JOB($job_id): void
{
	//error_log('Translation job hook triggered for job ID: ' . $job_id);
	// Get the translation job from the WPML translation queue
	$tm               = new TranslationManagement();
	$job              = $tm->get_translation_job($job_id);
	$translator_id    = $job->translator_id;
	$translator       = get_userdata($translator_id);
	$translator_email = $translator->user_email;
	$translator_name  = $translator->display_name;
	$job_title        = $job->title;
	$grid_data        = GRDL_WP_PLUGIN_GET_GRID_ACCESS_DATA($translator_id);
	if (str_starts_with($translator_name, '@Gridly@_')) {
		// Log the job details
		$log_string = 'Translation job created for send it into Gridly: ID ' . esc_html($job_id) .
			', Original post ID: ' . esc_html($job->original_doc_id) .
			', Language: ' . esc_html($job->language_code) .
			', Translator e-mail: ' . esc_html($translator_email) .
			', Job title: ' . esc_html($job->title);
		GRDL_WP_PLUGIN_EXPORT_AS_XLIFF($job_id, $grid_data, $job_title);
	}
}




function GRDL_WP_PLUGIN_EXPORT_AS_XLIFF($job_id, $grid_data, $job_title): void
{
	$writer = new WPML_TM_Xliff_Writer(wpml_tm_load_job_factory());
	$xliff  = $writer->generate_job_xliff($job_id);
	$target_lang = (string) simplexml_load_string($xliff)->file['target-language'];
	$source_lang = (string) simplexml_load_string($xliff)->file['source-language'];
	GRDL_WP_PLUGIN_GENERATE_COLUMN_IF_NOT_EXISTS($grid_data, $source_lang, false, $source_lang);
    GRDL_WP_PLUGIN_GENERATE_COLUMN_IF_NOT_EXISTS($grid_data, $target_lang, true, $source_lang);

	
	GRDL_WP_PLUGIN_CONVERT_XLIFF_INTO_CSV($xliff, $job_id, $grid_data, $job_title);
}

function GRDL_WP_PLUGIN_CONVERT_XLIFF_INTO_CSV($xliff_data, $job_id, $grid_data, $job_title): void
{
    global $wp_filesystem;
    //error_log($xliff_data);

    // Initialize WP_Filesystem
    if (!function_exists('WP_Filesystem')) {
        require_once ABSPATH . 'wp-admin/includes/file.php';
    }
    WP_Filesystem();

    // Get the upload directory path for WordPress
    $upload_dir = wp_upload_dir();
    $upload_path = $upload_dir['basedir'] . '/gridly-integration/';

    // Create the directory if it doesn't exist
    if (!$wp_filesystem->is_dir($upload_path)) {
        $wp_filesystem->mkdir($upload_path);
    }

    // Parse the XLIFF content
    $xliff = GRDL_WP_PLUGIN_DELETE_TARGET_WHERE_EQUAL_TO_SOURCE($xliff_data);
    $xliff = simplexml_load_string($xliff);

    $setting_data = GRDL_WP_PLUGIN_GET_GRIDLY_GENERAL_SETTINGS();
    $auto_columns = $setting_data->auto_columns;
    $set_dependencies = $setting_data->set_dependencies;

    // File path for CSV file
    $csv_filename = $upload_path . 'gridly_job_' . $job_id . '.csv';

    // Initialize CSV content
    $csv_content = '';

    // Add the header row to the CSV content with quotation marks around each item
    $csv_content .= implode(',', array_map(function($header) {
        return '"' . str_replace('"', '""', $header) . '"'; // Escape any inner double quotes in the header
    }, array('_recordId', '_pathTag', (string)$xliff->file['source-language'], (string)$xliff->file['target-language']))) . "\n";

    // Loop through each trans-unit in the XLIFF file and append to CSV content with quotation marks around each item
    foreach ($xliff->file->body->children() as $transUnit) {
        $recordId = (string)$transUnit['id'];
        $sourceString = (string)$transUnit->source;
        $targetString = (string)$transUnit->target;

        // Append each row to the CSV content with each field wrapped in quotation marks
        $csv_content .= implode(',', array_map(function($field) {
            // Wrap each field in quotes and escape inner double quotes
            return '"' . str_replace('"', '""', $field) . '"';
        }, array($recordId, $job_title, $sourceString, $targetString))) . "\n";
    }

    // Write the CSV content to the file using WP_Filesystem
    $wp_filesystem->put_contents($csv_filename, $csv_content, FS_CHMOD_FILE);

    // Send the CSV content to Gridly or process further
    $csv_content = $wp_filesystem->get_contents($csv_filename); // Reading from the newly created file
    //error_log($csv_content);
    GRDL_WP_PLUGIN_IMPORT_CSV_INTO_GRIDLY($csv_content, $job_id, $grid_data, $xliff_data);
}





function GRDL_WP_PLUGIN_UPDATE_XLIFF_WITH_TRANSLATION($csv_data, $xliff_data, $target_lang)
{

	$xliff = simplexml_load_string($xliff_data);
	$csv   = array_map('str_getcsv', explode("\n", $csv_data));

	// Get the header row of the CSV
	$header = array_shift($csv);

	// Get the column index of the given language
	$lang_col = array_search($target_lang, $header);

	// Loop through the CSV rows and update the XLIFF as needed
	foreach ($csv as $row) {
		$id          = $row[0];
		$target_text = $row[$lang_col];
		foreach ($xliff->file->body->children() as $transUnit) {
			if ((string) $transUnit['id'] == $id) {
				$transUnit->target = $target_text;
			}
		}
	}

	// Convert the SimpleXMLElement object back to a string
	$xliff = $updated_xliff_str = $xliff->asXML();
	return GRDL_WP_PLUGIN_CS2T_WHERE_EMPTY($xliff);
}

function GRDL_WP_PLUGIN_CONVERT_CSV_INTO_RECORDS($csv_data)
{
	// Split the CSV data into lines
	$lines = explode("\n", $csv_data);

	// Get the headers from the first line
	$headers = str_getcsv(array_shift($lines));

	// Initialize the result array
	$result = array();

	// Process the remaining lines
	foreach ($lines as $line) {
		$values = str_getcsv($line);

		if (empty($values[0])) {
			continue;
		}

		// Create an object for each row
		$row = array(
			'id'    => $values[0],
			'path'  => $values[1],
			'cells' => array(),
		);

		// Loop through the headers and values to create cell objects
		for ($i = 2; $i < count($headers); $i++) {
			$row['cells'][] = array(
				'columnId' => $headers[$i],
				'value'    => $values[$i],
			);
		}

		// Add the row to the result
		$result[] = $row;
	}

	// Convert the result to JSON
	$json_result = wp_json_encode($result, JSON_PRETTY_PRINT);
	return $json_result;
}

function GRDL_WP_PLUGIN_IMPORT_CSV_INTO_GRIDLY($csv_data, $job_id, $grid_data, $xliff): void
{

	$records = GRDL_WP_PLUGIN_CONVERT_CSV_INTO_RECORDS($csv_data);
	$url     = 'https://api.gridly.com/v1/views/' . $grid_data->view_id . '/records';

	$headers = array(
		'Authorization' => 'ApiKey ' . $grid_data->api_key,
		'Content-Type'  => 'application/json',
	);

	$response = wp_remote_post(
		$url,
		array(
			'headers' => $headers,
			'body'    => $records,
		)
	);

	// Check for errors
	if (is_wp_error($response)) {
		$error_message = $response->get_error_message();
	} else {

		GRDL_WP_PLUGIN_CHANGE_WPML_JOB_STATUS($job_id, 2);
		$tm            = new TranslationManagement();
		$job           = $tm->get_translation_job($job_id);
		$translator_id = $job->translator_id;
		$translator    = get_userdata($translator_id);
		$profile       = GRDL_WP_PLUGIN_GET_GRID_ACCESS_DATA($translator_id);
		GRDL_WP_PLUGIN_INSERT_NEW_JOB_INTO_GRIDLY($job_id, $job->title, GRDL_WP_PLUGIN_GET_GRIDLY_PROFILE($job->translator_id)->display_name, GRDL_WP_PLUGIN_GET_SOURCE_CODE_OF_JOB($xliff), GRDL_WP_PLUGIN_GET_TARGET_CODE_OF_JOB($xliff));
	}
}

function GRDL_WP_PLUGIN_INSERT_NEW_JOB_INTO_GRIDLY($job_id, $job_name, $profile_name, $source_language, $target_language): void
{
    global $wpdb;
    $table_name = $wpdb->prefix . 'gridly_jobs';
    $progress   = 0;

    // Attempt to insert the new job
    $result = $wpdb->insert(
        $table_name,
        array(
            'job_id'          => $job_id,
            'job_name'        => $job_name,
            'profile_name'    => $profile_name,
            'progress'        => $progress,
            'source_language' => $source_language,
            'target_language' => $target_language,
        )
    );

    // Check if the insertion was successful
    if ($result === false) {
        // Log the last SQL query and error message if the insertion failed
        //error_log("GRDL_WP_PLUGIN_INSERT_NEW_JOB_INTO_GRIDLY: Failed to insert job. Error: " . $wpdb->last_error);
        //error_log("GRDL_WP_PLUGIN_INSERT_NEW_JOB_INTO_GRIDLY: SQL Query - " . $wpdb->last_query);
        /*error_log("GRDL_WP_PLUGIN_INSERT_NEW_JOB_INTO_GRIDLY: Job Data - " . print_r(array(
            'job_id'          => $job_id,
            'job_name'        => $job_name,
            'profile_name'    => $profile_name,
            'progress'        => $progress,
            'source_language' => $source_language,
            'target_language' => $target_language,
        ), true));*/
    } else {
        // Log success message if insertion was successful
        //error_log("GRDL_WP_PLUGIN_INSERT_NEW_JOB_INTO_GRIDLY: Successfully inserted job with job_id: $job_id.");
    }
}

function GRDL_WP_PLUGIN_INSERT_NEW_PROFILE($profile_name, $view_id, $api_key, $user_id): void
{
    global $wpdb;
    $table_name = $wpdb->prefix . 'gridly_profiles';
    $wpdb->insert(
        $table_name,
        array(
            'profile_name' => $profile_name,
            'view_id'      => $view_id,
            'api_key'      => $api_key,
            'user_id'      => $user_id, // Store the user ID in the profile table
        )
    );
}


function GRDL_WP_PLUGIN_IMPORT_TRANSLATED_XLIFF($xliff, $job_id): void
{
	global $wpdb;
	$job_records = new \WPML\TM\ATE\JobRecords($wpdb);
	$ate_jobs    = new WPML_TM_ATE_Jobs($job_records);
	try {
		// $xliff = file_get_contents(__DIR__ . '/file.xliff');

		try {
			$ate_jobs->apply($xliff);

			$progress = GRDL_WP_PLUGIN_CALCULATE_TRANSLATION_PERCENTAGE($xliff);
			GRDL_WP_PLUGIN_UPDATE_JOB_PROGRESS($job_id, $progress);
			if (GRDL_WP_PLUGIN_IS_TRANSLATION_COMPLETED($xliff) == false) {
				// If the translated content still contains source string, we change the status back to in progress
				GRDL_WP_PLUGIN_CHANGE_WPML_JOB_STATUS($job_id, 2);
			}
		} catch (Exception $e) {
		}
	} catch (Exception $e) {
		// handle error: file does not exists or can not be read

	}
}

function GRDL_WP_PLUGIN_GET_GRID_ACCESS_DATA($profile_id)
{
    global $wpdb;
    $table_name = $wpdb->prefix . 'gridly_profiles';
    
    // Retrieve the specific profile based on profile_id
    $profile = $wpdb->get_row(
        $wpdb->prepare("SELECT * FROM $table_name WHERE user_id = %d", $profile_id)
    );

    // Log if profile not found
    if (!$profile) {
        //error_log("No profile found for profile_id: $profile_id");
		        // Retrieve all columns in the table
				//$columns = $wpdb->get_results("SHOW COLUMNS FROM $table_name");
				//error_log("Gridly Profiles Table Columns: " . print_r($columns, true));
		
				// Retrieve all records in the table
				//$records = $wpdb->get_results("SELECT * FROM $table_name");
				//error_log("All Gridly Profiles Table Records: " . print_r($records, true));
    } else {
        // Log the retrieved profile details
        //error_log("Profile retrieved: " . print_r($profile, true));


    }

    return $profile;
}


function GRDL_WP_PLUGIN_GET_GRIDLY_GENERAL_SETTINGS()
{
	global $wpdb;
	$table_name = $wpdb->prefix . 'gridly_general_settings';

	// Load the data from the database
	$setting_data = $wpdb->get_row("SELECT * FROM {$wpdb->prefix}gridly_general_settings");

	// Check if the data exists
	return $setting_data;
}

function GRDL_WP_PLUGIN_GET_GRIDLY_PROFILES()
{
	global $wpdb;
	$profiles = $wpdb->get_results("SELECT * FROM {$wpdb->prefix}gridly_profiles");
	return $profiles;
}

function GRDL_WP_PLUGIN_GET_GRIDLY_JOBS()
{
    global $wpdb;
    $jobs = $wpdb->get_results("SELECT * FROM {$wpdb->prefix}gridly_jobs");

    // Debug: Log the job data to the error log
    if (empty($jobs)) {
        //error_log("GRDL_WP_PLUGIN_GET_GRIDLY_JOBS: No jobs found in gridly_jobs table.");
    } else {
        //error_log("GRDL_WP_PLUGIN_GET_GRIDLY_JOBS: Found jobs in gridly_jobs table - " . print_r($jobs, true));
    }

    return $jobs;
}

function GRDL_WP_PLUGIN_CHECK_GRIDLY_INTEGRATION_TABLES(): void
{
    global $wpdb;

    // Check if `gridly_general_settings` table exists, create it if not
    if (empty(GRDL_WP_PLUGIN_GET_GRIDLY_GENERAL_SETTINGS())) {
        $table_name      = $wpdb->prefix . 'gridly_general_settings';
        $charset_collate = $wpdb->get_charset_collate();
        $sql             = "CREATE TABLE $table_name (
            id bigint(20) NOT NULL AUTO_INCREMENT,
            auto_columns tinyint(1) NOT NULL DEFAULT 0,
            set_dependencies tinyint(1) NOT NULL DEFAULT 0,
            complete_status tinyint(1) NOT NULL DEFAULT 0,
            PRIMARY KEY (id)
        ) $charset_collate;";
        require_once ABSPATH . 'wp-admin/includes/upgrade.php';
        dbDelta($sql);
    }

    // Check if `gridly_jobs` table exists, create it if not
    if (empty(GRDL_WP_PLUGIN_GET_GRIDLY_JOBS())) {
        $table_name      = $wpdb->prefix . 'gridly_jobs';
        $charset_collate = $wpdb->get_charset_collate();
        $sql             = "CREATE TABLE $table_name (
            id bigint(20) NOT NULL AUTO_INCREMENT,
            job_id bigint(50) NOT NULL DEFAULT 0,
            job_name varchar(255) NOT NULL DEFAULT 0,
            profile_name varchar(255) NOT NULL DEFAULT 0,
            progress bigint(20) NOT NULL DEFAULT 0,
            source_language varchar(255) NOT NULL DEFAULT 0,
            target_language varchar(255) NOT NULL DEFAULT 0,
            PRIMARY KEY (id)
        ) $charset_collate;";
        require_once ABSPATH . 'wp-admin/includes/upgrade.php';
        dbDelta($sql);
    }

    // Profiles table
	$table_name      = $wpdb->prefix . 'gridly_profiles';
	$charset_collate = $wpdb->get_charset_collate();

	// Check if the table exists and create if not
	if (empty(GRDL_WP_PLUGIN_GET_GRIDLY_PROFILES())) {
		$sql = "CREATE TABLE $table_name (
			id bigint(20) NOT NULL AUTO_INCREMENT,
			profile_name varchar(255) NOT NULL DEFAULT '',
			view_id varchar(255) NOT NULL DEFAULT '',
			api_key varchar(255) NOT NULL DEFAULT '',
			user_id bigint(20) NOT NULL,  -- Add user_id column for linking profiles to users
			PRIMARY KEY (id)
		) $charset_collate;";
		require_once ABSPATH . 'wp-admin/includes/upgrade.php';
		dbDelta($sql);
	} else {
		// Check if the 'user_id' column exists and add it if it doesn't
		$column_exists = $wpdb->get_results("SHOW COLUMNS FROM $table_name LIKE 'user_id'");
		if (empty($column_exists)) {
			$wpdb->query("ALTER TABLE $table_name ADD user_id bigint(20) NOT NULL");
		}
	}
}



function GRDL_WP_PLUGIN_GENERATE_COLUMN_IF_NOT_EXISTS($profile, $lang_col, $target, $source_lang): void
{
	// Use the WordPress HTTP API to make the GET request
	$response = wp_remote_get(
		esc_url('https://api.gridly.com/v1/views/' . $profile->view_id),
		array(
			'headers' => array(
				'Authorization' => esc_html('ApiKey ' . $profile->api_key),
				'Content-Type: application/json',
			),
		)
	);

	// Check if the request was successful
	if (is_wp_error($response)) {
		// Handle the error
		$error_message = $response->get_error_message();
		$response_code = $response->get_error_code();
	}

	$columns = GRDL_WP_PLUGIN_GET_COLUMN_NAMES(wp_remote_retrieve_body($response));

	if (!in_array($lang_col, $columns)) {

		try {
			$request_body = '{
                "id": "' . $lang_col . '",
                "name": "' . $lang_col . '",
                "type": "language",
                "languageCode": "' . $lang_col . '"
            }';

			if ($target) {
				$request_data = '{
                    "id": "' . $lang_col . '",
                    "localizationType": "targetLanguage",
                    "name": "' . $lang_col . '",
                    "type": "language",
                    "languageCode": "' . $lang_col . '"
                }';
			}

			$response = wp_remote_post(
				'https://api.gridly.com/v1/views/' . $profile->view_id . '/columns',
				array(
					'headers' => array(
						'Authorization' => 'ApiKey ' . $profile->api_key,
						'Content-Type'  => 'application/json',
					),
					'body'    => $request_body,
				)
			);
			$setting_data = GRDL_WP_PLUGIN_GET_GRIDLY_GENERAL_SETTINGS();
			$set_dependencies = $setting_data->set_dependencies;

			if($target){
				GRDL_WP_PLUGIN_CREATE_DEPENDENCY($profile, $source_lang, $lang_col);
			}

			if (is_wp_error($response)) {
				// Handle the error
				$error_message = $response->get_error_message();
				$response_code = $response->get_error_code();
			}
		} catch (Exception $e) {
			$errorString = $e->getMessage();
		}
	}
}


function GRDL_WP_PLUGIN_CREATE_DEPENDENCY($profile, $source_lang, $target_lang): void
{
	// Define the URL
	$url = 'https://api.gridly.com/v1/views/' . $profile->view_id . '/dependencies';

	// Define the headers
	$headers = array(
		'Authorization' => 'ApiKey ' . $profile->api_key,
		'Content-Type'  => 'application/json',
	);

	// Define the request data
	$request_body = wp_json_encode(array(
		'sourceColumnId' => $source_lang,
		'targetColumnId' => $target_lang
	));


	$response = wp_remote_post(
		$url,
		array(
			'headers' => $headers,
			'body'    => $request_body,
		)
	);

	// Check for errors and log the response
	if (is_wp_error($response)) {
		// Handle and log the error
		$error_message = $response->get_error_message();
		//error_log("Request failed: " . $error_message);
	} else {
		// Log the response body to see if the dependency was created successfully
		$response_body = wp_remote_retrieve_body($response);
		$response_code = wp_remote_retrieve_response_code($response);
		//error_log("Response Code: " . $response_code);
		//error_log("Response Body: " . $response_body);
		
		// Additional logging for status
		if ($response_code !== 200 && $response_code !== 201) {
			//error_log("Failed to create dependency. Check API permissions or data format.");
		}
	}
}


function GRDL_WP_PLUGIN_GET_SOURCE_COLUMN($jsonResponse)
{
	$source_lang = '';
	$json        = json_decode($jsonResponse, true);
	try {
		foreach ($json['columns'] as $column) {
			if (isset($column['type'])) {
				if ($column['type'] == 'language') {
					if ($column['isSource'] == 'true') {
						$source_lang = $column['name'];
					}
				}
			}
		}
	} catch (Exception $e) {
		$errorString = $e->getMessage();
	}

	return $source_lang;
}

function GRDL_WP_PLUGIN_GET_COLUMN_NAMES($jsonResponse): array
{
	$result = array();
	$json   = json_decode($jsonResponse, true);
	try {
		foreach ($json['columns'] as $column) {
			if (isset($column['type'])) {
				if ($column['type'] == 'language') {
					array_push($result, $column['name']);
				}
			}
		}
	} catch (Exception $e) {
		$errorString = $e->getMessage();
	}

	return $result;
}

function GRDL_WP_PLUGIN_GET_TRANSLATIONS(): void
{
	// Check nonce
	$nonce = isset($_POST['nonce']) ? sanitize_text_field(wp_unslash($_POST['nonce'])) : '';
	if (!check_admin_referer('GRDL_WP_PLUGIN_GET_TRANSLATIONS', 'nonce')) {
		// Nonce verification failed, handle the error or exit
		wp_die('Nonce verification failed.');
	}

	// Define the function to avoid PHP warnings
	if (!function_exists('wp_remote_get')) {
		require_once ABSPATH . '/wp-admin/includes/file.php';
	}

	$job_ids = isset($_POST['job_ids']) ? array_map('sanitize_text_field', wp_unslash($_POST['job_ids'])) : array();

	foreach ($job_ids as $job_id) {
		$job = GRDL_WP_PLUGIN_GET_JOB($job_id);
		if (!$job) {
			continue; // Skip if job is not found
		}

		$writer = new WPML_TM_Xliff_Writer(wpml_tm_load_job_factory());
		$xliff = $writer->generate_job_xliff($job->job_id);
		$target_lang = GRDL_WP_PLUGIN_GET_TARGET_CODE_OF_JOB($xliff);

		$translator_id = $job->translator_id;
		$translator = get_userdata($translator_id);
		if (!$translator) {
			continue; // Skip if translator is not found
		}

		$translator_email = $translator->user_email;
		$translator_name = $translator->display_name;
		$job_title = $job->title;
		$grid_data = GRDL_WP_PLUGIN_GET_GRID_ACCESS_DATA($translator_id);

		// Use the WordPress HTTP API to make the GET request
		$response = wp_remote_get(
			'https://api.gridly.com/v1/views/' . $grid_data->view_id . '/export',
			array(
				'headers' => array(
					'Authorization' => 'ApiKey ' . $grid_data->api_key,
				),
			)
		);

		if (is_wp_error($response)) {
			// Handle the error
			$error_message = $response->get_error_message();
			// Add your error handling code here
		} else {
			// Request was successful, and the response is in $response['body']
			$response_body = wp_remote_retrieve_body($response);
			$updated_xliff_str = GRDL_WP_PLUGIN_UPDATE_XLIFF_WITH_TRANSLATION($response_body, $xliff, $target_lang);
			GRDL_WP_PLUGIN_IMPORT_TRANSLATED_XLIFF($updated_xliff_str, $job_id);
		}
	}

	wp_die();
}



function GRDL_WP_PLUGIN_GET_SOURCE_CODE_OF_JOB($xliff_data): string
{
	$xliff = simplexml_load_string($xliff_data);
	return (string) $xliff->file['source-language'];
}

function GRDL_WP_PLUGIN_GET_TARGET_CODE_OF_JOB($xliff_data): string
{
	$xliff = simplexml_load_string($xliff_data);
	return (string) $xliff->file['target-language'];
}

function GRDL_WP_PLUGIN_SAVE_USER(): void
{
	global $wpdb;

	// Check if delete_user is set and user_id exists
	if (isset($_POST['delete_user']) && isset($_POST['user_id'])) {
		$user_id = intval($_POST['user_id']); // Safe to access user_id after isset check
		$result  = wp_delete_user($user_id);

		if (is_wp_error($result)) {
			$error = $result->get_error_message();
			// Log or handle the error as needed
		} else {
			// Safely delete from the custom table using the prepared statement
			$wpdb->query(
				$wpdb->prepare(
					"DELETE FROM {$wpdb->prefix}gridly_profiles WHERE user_id = %d OR user_id = \"\"",
					$user_id
				)
			);
			// Handle successful deletion here, e.g., logging or confirmation message
		}
	}

	// Check if the user and nonce are set and valid
	if (isset($_POST['user']) && isset($_POST['GRDL_WP_PLUGIN_ADD_USER_NONCE']) &&
		wp_verify_nonce(sanitize_text_field(wp_unslash($_POST['GRDL_WP_PLUGIN_ADD_USER_NONCE'])), 'GRDL_WP_PLUGIN_ADD_USER')) {
		
		// Ensure profile_name, view_id, and api_key are set before accessing them
		if (isset($_POST['user']['profile_name']) && isset($_POST['user']['view_id']) && isset($_POST['user']['api_key'])) {
			// Unslash the input before sanitizing
			$profile_name = sanitize_text_field(wp_unslash($_POST['user']['profile_name']));
			$view_id      = sanitize_text_field(wp_unslash($_POST['user']['view_id']));
			$api_key      = sanitize_text_field(wp_unslash($_POST['user']['api_key']));

			// Ensure required fields are not empty
			if (!empty($profile_name) && !empty($view_id)) {
				// Create a new WordPress user with a unique username and dummy email
				$result = wp_create_user("@Gridly@_$profile_name", wp_generate_password(), "$view_id@$view_id.com");

				if (is_wp_error($result)) {
					$error = $result->get_error_message();
					// Handle or log the error as needed
				} else {
					$user_id = $result; // The created user ID

					// Insert the new profile linked to the created user's ID
					GRDL_WP_PLUGIN_INSERT_NEW_PROFILE(
						$profile_name,
						$view_id,
						$api_key,
						$user_id // Pass the created user ID to link with the profile
					);

					// Handle successful creation, e.g., logging or confirmation message
				}
			}
		}
	}
}




function GRDL_WP_PLUGIN_MENU(): void
{
	add_menu_page('Gridly Integration', 'Gridly Integration', 'manage_options', 'gridly-integration', 'GRDL_WP_PLUGIN_USER_FORM', plugins_url('Resources/Images/gridly.ico', __FILE__), 6);
}

/*
function GRDL_WP_PLUGIN_GET_GRIDLY_PROFILES() {
	$gridly_profiles = get_users( array( 'search' => '*Gridly*' ) );
	return $gridly_profiles;
}
*/
function GRDL_WP_PLUGIN_GET_GRIDLY_PROFILE($profile_id)
{
	$gridly_profiles = get_users(array('search' => '*Gridly*'));
	foreach ($gridly_profiles as $user) {
		if ($user->ID == $profile_id) {
			return $user;
		}
	}
	return null;
}

function GRDL_WP_PLUGIN_DELETE_PROFILE(): void
{
	if (
		isset($_POST['delete_user'], $_POST['user_id'], $_POST['nonce']) &&
		wp_verify_nonce(sanitize_text_field(wp_unslash($_POST['nonce'])), 'delete_user_nonce')
	) {
		$user_id = intval($_POST['user_id']);
		wp_delete_user($user_id);
	}
}



function GRDL_WP_PLUGIN_CHANGE_WPML_JOB_STATUS($job_id, $status): void
{
	// 2 is In progress
	// 4 is Translation ready to download
	// 5 is Cancelled
	// 10 is Completed
	global $wpdb;
	$wpdb->update($wpdb->prefix . 'icl_translation_status', array('status' => $status), array('rid' => GRDL_WP_PLUGIN_GET_JOB($job_id)->rid));
}

function GRDL_WP_PLUGIN_CLEAN_JOB_LIST($gridly_profiles, $gridly_jobs)
{
    $profile_ids = array();
    $filtered_job_ids = array();
    
    // Collect user IDs of profiles associated with Gridly
    foreach ($gridly_profiles as $profile) {
        $profile_ids[] = $profile->user_id;
    }

    global $wpdb;

    // Get the most recent job entries from `icl_translate_job` for each `rid`
    $results = $wpdb->get_results("SELECT * FROM {$wpdb->prefix}icl_translate_job WHERE job_id = (SELECT MAX(job_id) FROM {$wpdb->prefix}icl_translate_job as t2 WHERE t2.rid = {$wpdb->prefix}icl_translate_job.rid)");

    // Filter jobs based on translator_id matching profile_ids and status == 2 in `icl_translation_status`
    foreach ($results as $job) {
        $status = $wpdb->get_var($wpdb->prepare("SELECT status FROM {$wpdb->prefix}icl_translation_status WHERE rid = %d", $job->rid));
        if (in_array($job->translator_id, $profile_ids) && $status == 2) {
            $filtered_job_ids[] = $job->job_id;
        }
    }

    // Delete any jobs in `gridly_jobs` that are not in the filtered list
    foreach ($gridly_jobs as $job) {
        if (!in_array($job->job_id, $filtered_job_ids)) {
            $wpdb->delete("{$wpdb->prefix}gridly_jobs", array('job_id' => $job->job_id));
        }
    }

    // Prepare and execute the query for remaining jobs using placeholders
    if (!empty($filtered_job_ids)) {
        $placeholders = implode(',', array_fill(0, count($filtered_job_ids), '%d'));
        $remaining_jobs = $wpdb->get_results($wpdb->prepare("SELECT * FROM {$wpdb->prefix}gridly_jobs WHERE job_id IN ($placeholders)", ...$filtered_job_ids));
    } else {
        $remaining_jobs = array(); // No jobs to select if filtered_job_ids is empty
    }

    return $remaining_jobs;
}




function GRDL_WP_PLUGIN_GET_JOB($job_id)
{
	global $wpdb;
	$job_data = $wpdb->get_results($wpdb->prepare("SELECT * FROM {$wpdb->prefix}icl_translate_job WHERE job_id = %d", $job_id));
	return $job_data[0];
}

function GRDL_WP_PLUGIN_UPDATE_JOB_PROGRESS($job_id, $new_progress): bool
{
	global $wpdb;
	$table_name = $wpdb->prefix . 'gridly_jobs';
	$updated    = $wpdb->update(
		$table_name,
		array('progress' => $new_progress),
		array('job_id' => $job_id)
	);
	return $updated !== false;
}

function GRDL_WP_PLUGIN_IS_TRANSLATION_COMPLETED($xliff_string): bool
{
	$xml       = simplexml_load_string($xliff_string);
	$completed = true;
	foreach ($xml->file->body->children() as $trans_unit) {
		if ((string) $trans_unit->source == (string) $trans_unit->target) {
			$completed = false;
			break;
		}
	}
	return $completed;
}

function GRDL_WP_PLUGIN_CALCULATE_TRANSLATION_PERCENTAGE($xliff_string): int
{
	// Check if SimpleXML extension is enabled
	if (!extension_loaded('simplexml')) {
		// Handle the situation gracefully, display an error message, or take appropriate action
		return 0; // Return a default value or handle the error as desired
	}

	$xml       = simplexml_load_string($xliff_string);
	$total     = count($xml->file->body->children());
	$completed = 0;

	foreach ($xml->file->body->children() as $trans_unit) {
		if ((string) $trans_unit->source != (string) $trans_unit->target) {
			$completed++;
		}
	}

	// Calculate percentage
	if ($total > 0) {
		$percentage = ($completed / $total) * 100;
	} else {
		$percentage = 0;
	}

	return (int) $percentage;
}

function GRDL_WP_PLUGIN_CS2T_WHERE_EMPTY($xliff_string)
{
	$xml = simplexml_load_string($xliff_string);
	foreach ($xml->file->body->children() as $trans_unit) {
		if (empty((string) $trans_unit->target)) {
			(string) $trans_unit->target = (string) $trans_unit->source;
		}
	}
	return $xliff_string;
}

function GRDL_WP_PLUGIN_DELETE_TARGET_WHERE_EQUAL_TO_SOURCE($xliff_string)
{
	$xml = simplexml_load_string($xliff_string);
	foreach ($xml->file->body->children() as $trans_unit) {
		if ((string) $trans_unit->source == (string) $trans_unit->target) {
			(string) $trans_unit->target = '';
		}
	}
	return $xliff_string;
}

// GRDL_WP_PLUGIN
// Entrance function: Control all UI part of the plugin
function GRDL_WP_PLUGIN_USER_FORM(): void
{
    $profiles = GRDL_WP_PLUGIN_GET_GRIDLY_PROFILES();
    $jobs = GRDL_WP_PLUGIN_GET_GRIDLY_JOBS();
    
    // Clean up jobs and only return filtered list if required
    $jobs = GRDL_WP_PLUGIN_CLEAN_JOB_LIST($profiles, $jobs);

    // Enqueue styles
    wp_enqueue_style('my-plugin-style', plugins_url('Resources/CSS/style.css', __FILE__));
    wp_enqueue_style('style', get_stylesheet_uri());

    // Enqueue script and localize it
    wp_enqueue_script('gridly_js', plugins_url('Resources/js/gridly.js', __FILE__), array('jquery'), '1.0', true);
    wp_localize_script('gridly_js', 'gridly_ajax_obj', array(
        'ajaxurl' => admin_url('admin-ajax.php'),
        'nonce'   => wp_create_nonce('gridly_ajax_nonce')
    ));
    ?>
    <div class="wrap">
        <h1>Gridly integration</h1>
        <h2 class="nav-tab-wrapper">
            <a href="#tab-1" class="nav-tab nav-tab-active">Instructions</a>
            <a href="#tab-2" class="nav-tab">General settings</a>
            <a href="#tab-3" class="nav-tab">Profiles</a>
            <a href="#tab-4" class="nav-tab">Jobs</a>
        </h2>
        <?php
        // Display UI tabs
        echo wp_kses_post(GRDL_WP_PLUGIN_UI_TAB_1());
        echo wp_kses_post(GRDL_WP_PLUGIN_UI_TAB_2());
        echo wp_kses_post(GRDL_WP_PLUGIN_UI_TAB_3($profiles));
        echo wp_kses_post(GRDL_WP_PLUGIN_UI_TAB_4($jobs));
        ?>
    </div>
    <?php
}


function GRDL_WP_PLUGIN_UI_TAB_1()
{
?>
	<div id="tab-1" class="tab-content tab-content-active">
		<ol type="1">
			<li>Install and activate <a href="https://wpml.org/">WPML plugin</a></li>
			<li>Create a profile with your API key and View ID you find in your Grid, this plugin will always place @Gridly@ as a prefix to your profile name</li>
			<li>Prepare your Grid by creating the columns with names as the <a href="https://help.gridly.com/hc/en-us/articles/6485575751325-Supported-Languages-in-Gridly">ISO language code</a> you will send, or define in the settings to create the columns automatically</li>
			<li>Assign languages to the newly created profile in WPML plugin translator's "Translators" tab</li>
			<li>Create translation jobs and assign your Gridly profile as a translator</li>
			<li>Gather your translations in this plugin's "Jobs" tab</li>
	</div>
<?php
}


function GRDL_WP_PLUGIN_UI_TAB_2()
{
	global $wpdb;
	$table_name = $wpdb->prefix . 'gridly_general_settings';

	// Verify nonce
	if (isset($_POST['gridly_settings_submit']) && check_admin_referer('gridly_settings_nonce', 'gridly_settings_nonce_field')) {
		$id = isset($_POST['id']) ? sanitize_text_field(wp_unslash($_POST['id'])) : 0;

		// Use validation to ensure other variables are 0 or 1
		$auto_columns     = (isset($_POST['gridly_auto_columns']) && $_POST['gridly_auto_columns'] == 1) ? 1 : 0;
		$set_dependencies = (isset($_POST['gridly_set_dependencies']) && $_POST['gridly_set_dependencies'] == 1) ? 1 : 0;
		$complete_status  = (isset($_POST['gridly_complete_status']) && $_POST['gridly_complete_status'] == 1) ? 1 : 0;

		$wpdb->update(
			$table_name,
			array(
				'auto_columns'     => $auto_columns,
				'set_dependencies' => $set_dependencies,
				'complete_status'  => $complete_status,
			),
			array('id' => $id)
		);
	}

	$setting_data             = GRDL_WP_PLUGIN_GET_GRIDLY_GENERAL_SETTINGS();
	$auto_columns_checked     = $setting_data->auto_columns == 1 ? 'checked' : '';
	$set_dependencies_checked = $setting_data->set_dependencies == 1 ? 'checked' : '';
	$complete_status_checked  = $setting_data->complete_status == 1 ? 'checked' : '';
	
?>
	<div id="tab-2" class="tab-content">
		<form method="post">
			<table class="form-table">
				<tr>
					<th scope="row">Generate columns automatically</th>
					<td>
						<input type="checkbox" name="gridly_auto_columns" value="1" <?php echo esc_attr($auto_columns_checked); ?>>
					</td>
				</tr>
				<tr>
					<th scope="row">Set dependencies</th>
					<td>
						<input type="checkbox" name="gridly_set_dependencies" value="1" <?php echo esc_attr($set_dependencies_checked); ?>>
					</td>
				</tr>
				<tr>
					<th scope="row">Change job status to Complete automatically</th>
					<td>
						<input type="checkbox" name="gridly_complete_status" value="1" <?php echo esc_attr($complete_status_checked); ?>>
					</td>
				</tr>
			</table>
			<input type="hidden" name="id" value="<?php echo esc_attr($setting_data->id); ?>">
			<input type="submit" name="gridly_settings_submit" class="button button-primary" value="Save Changes">
			<?php
			wp_nonce_field('gridly_settings_nonce', 'gridly_settings_nonce_field', true, true);
			?>
		</form>
	</div>
<?php
}


function GRDL_WP_PLUGIN_UI_TAB_3($profiles)
{
?>
	<div id="tab-3" class="tab-content">
		<div class="wrap">
			<h2>Manage profiles</h2>
		</div>
		<table class="wp-list-table tablenav widefat fixed striped table-view-list users">
			<tr>
				<th>Profile name</th>
				<th>View ID</th>
				<th>API Key</th>
				<th>Action</th>
			</tr>
			<?php
			if (!empty($profiles)) {
				foreach ($profiles as $profile) {
			?>
					<tr>
						<td><?php echo esc_html($profile->profile_name); ?></td>
						<td><?php echo esc_html($profile->view_id); ?></td>
						<td><?php echo esc_html($profile->api_key); ?></td>
						<td>
							<form method="post" action="" class="list-profile">
								<input type="hidden" name="user_id" value="<?php echo esc_attr($profile->user_id); ?>">
								<input type="hidden" name="nonce" value="<?php echo esc_html(wp_create_nonce('delete_user_nonce')); ?>">
								<input type="submit" class="button button-danger" name="delete_user" id="delete-button" value="Delete">
							</form>
						</td>
					</tr>
				<?php
				}
			} else {
				?>
				<tr>
					<td colspan="3">No profile found</td>
				</tr>
			<?php
			}
			?>
		</table>
		<div class="clear form-table tablenav" id="new-profile-link"><a href="#">Add new Profile</a></div>
		<form method="post" action="" id="new-profile-form" class="hide">
			<table class="form-table tablenav bottom">
				<tbody>
					<tr>
						<th scope="row">Profile name</th>
						<td><input type="text" id="profile_name" name="user[profile_name]" required></td>
					</tr>
					<tr>
						<th scope="row">View ID</th>
						<td><input type="text" id="view_id" name="user[view_id]" required></td>
					</tr>
					<tr>
						<th scope="row">Api Key</th>
						<td><input type="text" id="api_key" name="user[api_key]" required></td>
					</tr>
				</tbody>
			</table>
			<?php wp_nonce_field('GRDL_WP_PLUGIN_ADD_USER', 'GRDL_WP_PLUGIN_ADD_USER_NONCE', true, true); ?>
			<input class="button button-primary" type="submit" value="Create new profile">
	</div>
	</form>
	</div>
<?php
}


function GRDL_WP_PLUGIN_UI_TAB_4($jobs)
{
?>
    <div id="tab-4" class="tab-content wrap">
        <div class="wrap">
            <h2>Manage Translation Jobs</h2>
        </div>
        <table class="wp-list-table widefat fixed striped table-view-list users">
            <thead>
                <tr>
                    <th scope="col" class="manage-column column-cb check-column">
                        <input type="checkbox" id="cb-select-all-1">
                    </th>
                    <th scope="col" class="manage-column column-name">Job name</th>
                    <th scope="col" class="manage-column column-name">Profile name</th>
                    <th scope="col" class="manage-column column-name">Progress</th>
                    <th scope="col" class="manage-column column-name">Source language</th>
                    <th scope="col" class="manage-column column-name">Target language</th>
                </tr>
            </thead>
            <tbody id="the-list">
                <?php foreach ($jobs as $job) : ?>
					
                    <tr>
                        <td id="cb" class="manage-column column-cb">
                            <input type="checkbox" name="job_ids[]" value="<?php echo esc_attr($job->job_id); ?>">
                        </td>
                        <td class="column-name"><?php echo esc_attr($job->job_name); ?></td>
                        <td class="column-name"><?php echo esc_attr($job->profile_name); ?></td>
                        <td class="column-name">
                            <div class="progress-bar">
                                <div class="progress" style="width: <?php echo esc_attr($job->progress); ?>%">
                                    <span class="progress-text"><?php echo esc_attr($job->progress); ?>%</span>
                                </div>
                            </div>
                        </td>
                        <td class="column-name"><?php echo esc_html($job->source_language); ?></td>
                        <td class="column-name"><?php echo esc_html($job->target_language); ?></td>
                    </tr>
                <?php endforeach; ?>
            </tbody>
        </table>
        <div class="wrap">
            <button id="get-translations-button" class="button button-primary">Get translations</button>
        </div>
    </div>
<?php
}

// Enqueueing JavaScript for the admin page
function GRDL_WP_PLUGIN_enqueue_scripts() {
    if (isset($_GET['page']) && $_GET['page'] === 'gridly-integration') {
        wp_enqueue_script('jquery');
        
        // Load Bootstrap locally
        wp_enqueue_script(
            'bootstrap-js',
            plugins_url('/Resources/js/bootstrap.bundle.min.js', __FILE__), // Local path
            array('jquery'),
            '4.5.2',
            true
        );

        // Register and enqueue your custom script
        wp_register_script(
            'grdl-admin-scripts',
            plugins_url('/Resources/js/gridly.js', __FILE__),
            array('jquery'),
            null,
            true
        );

        wp_localize_script('grdl-admin-scripts', 'GRDL_Ajax', array(
            'ajaxurl' => admin_url('admin-ajax.php'),
            'nonce'   => wp_create_nonce('GRDL_WP_PLUGIN_GET_TRANSLATIONS')
        ));

        wp_enqueue_script('grdl-admin-scripts');
    }
}
add_action('admin_enqueue_scripts', 'GRDL_WP_PLUGIN_enqueue_scripts');





// Must have a list about jobs that send into Gridly, and the user can select one or more to get the translations from Gridly, becuase the WPML builtin function not works for simple jobs, just for TMS jobs
// The list can be gathered by list the jobs where the user is a Gridly profile  so it starts with @Gridly@ have a checkmark for them and have 2 button, one is for sync all, other is synch selected
// Also we have to check the statuses, because the xliff import can change it to complete even the xliff is not fully translated yet.
// FIRST have to find, how can we change the job status, because we will have to generate the list of jobs by their status

/*
Translation sync workflow:
- Get a jobid what we want to synch
- Export it as xliff from wpml
- Get the target lang code of the xliff
- Get the view that has the job
- Export the column that has the language we have in the xliff
- Replace the translation we have in the xliff with the one we got from Gridly
*/

// OTHER THINGS TO DO
/*
-- GENERAL SETTINGS --
- boolean to generate automatically columns in the Grid
- boolean to chnage job status to Complete automatically if all records has translation

-- JOBS --
- Have a translation statusbar
- Be able to batch change status
- Be able to batch delete jobs

-- XLIFFS --
- On sending xliff into Gridly, if source == target, remove target text
- On receiving xliff into WP, if target is empty, we have to copy the source to target
*/