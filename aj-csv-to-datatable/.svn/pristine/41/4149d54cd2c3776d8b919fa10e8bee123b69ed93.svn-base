<?php
/**
 * Plugin Name: AJ CSV to DataTable
 * Plugin URI: https://github.com/anjanasilva/AJ-CSV-to-DataTable
 * Description: Import data from a spreadsheet (.csv file format) and display in a DataTable.
 * Version: 1.1
 * Author: Anjana Silva
 * Author URI: http://www.anjanasilva.com
 * Text Domain: aj-csv-to-datatable
 * License: GNU
 */
 
// Define file path constants.
define('CSV_PATH', plugin_dir_path(__FILE__));
define('CSV_URL', plugin_dir_url(__FILE__));
define('CSV_BASE', plugin_basename(__FILE__));

// For PHP versions < 5.3.
if (!function_exists('str_getcsv' ))
    require_once CSV_PATH . 'lib/str_getcsv4.php';

// Instantiate primary plugin class.
require_once CSV_PATH . 'lib/main_class.php';
main_class::instance();