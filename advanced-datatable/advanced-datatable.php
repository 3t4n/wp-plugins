<?php

/**
 * Plugin Name:       Advanced Datatable
 * Plugin URI:        https://weplugins.com/
 * Description:       The ultimate data table plugin for gutenberg block editor.
 * Requires at least: 6.1
 * Requires PHP:      7.0
 * Version:           1.0.2
 * Author:            flippercode
 * License:           GPLv2 or later
 * License URI:       https://www.gnu.org/licenses/gpl-2.0.html
 * Text Domain:       advanced-datatable
 * Domain Path:       /lang/
 */

if (!defined('ABSPATH')) {
	die('You are not allowed to call this page directly.');
}

if (!class_exists('Advanced_Datatable_Block')) {

	class Advanced_Datatable_Block{
		
		public function __construct(){

			$this->adb_register_plugin_hooks();
		}

		function adb_register_plugin_hooks() {

			add_action(  'init',				 [ $this, 'adb_advance_datatable_block_callback']);
			add_action( 'plugins_loaded',        [ $this, 'adb_load_plugin_languages'] );
		}

		function adb_advance_datatable_block_callback()	{

			register_block_type(__DIR__ . '/build',  array(
				'render_callback' => array($this, 'adb_advance_datatable_block'),
				'script' => ['jquery'],
			));
			wp_enqueue_script('adb-advance-datatable-script', plugin_dir_url(__FILE__) . 'build/view.js', array('jquery'), null, true);
			wp_enqueue_style('adb-advance-datatable-style', plugin_dir_url(__FILE__) . 'build/index.css');
		}

		function adb_load_plugin_languages() {

            load_plugin_textdomain( 'advanced-datatable', false, dirname( plugin_basename( __FILE__ ) ) . '/lang' );
        }


		function adb_advance_datatable_block($attributes) {

			if(empty($attributes['AlternateColorToggler'])){
				$attributes['rowEvenColor'] = $attributes['rowBgColor'];
				$attributes['rowOddColor'] = $attributes['rowBgColor'];
			}
			if (isset($attributes['attachmentId']) && !empty($attributes['attachmentId'])) {
				$attachment_id = $attributes['attachmentId'];
				$json_attributes = wp_json_encode($attributes);
				$csv_data = $this->adb_read_attachment_id($attachment_id);
				$csv_json = wp_json_encode($csv_data);
				$unique_id = 'advance-data-table-' . uniqid();
				$output = '<div id="' . $unique_id . '"></div>';
				$inline_script = '
				document.addEventListener("DOMContentLoaded", function() {
					var csvData = ' . $csv_json . ';
					var attachmentData = ' . $json_attributes . ';
					var wrapperDiv = document.querySelector("#' . $unique_id . '");
					if (wrapperDiv) {
						var style = document.createElement("style");
			style.innerHTML = `
				/* Even rows */
				.gridjs-tr:nth-child(even) .gridjs-td {
					background-color: ${attachmentData.rowEvenColor};
				}

				/* Odd rows */
				.gridjs-tr:nth-child(odd) .gridjs-td {
					background-color: ${attachmentData.rowOddColor};
				}

				/* Hover effect */
				.gridjs-tr:hover .gridjs-td {
					background-color: ${attachmentData.hoverColor};
					color: ${attachmentData.TexthoverColor}!important;
				}
			`;
			document.head.appendChild(style);
						jQuery(wrapperDiv).Grid({
							search: attachmentData.DataSearch,
							pagination: {
								limit: attachmentData.TablePagination
							},
							style: {
								table: {
									border: `${attachmentData.borderWidth} ${attachmentData.borderStyle} ${attachmentData.borderColor}`,
								},
								th: {
									"background-color": attachmentData.headerBgColor,
									color: attachmentData.headerTextColor,
									"text-align": attachmentData.headerTextAlign,
									padding: attachmentData.headerPadding,
								},
								td: {
									color: attachmentData.rowTextColor,
									"text-align": attachmentData.rowTextAlign,
									padding: attachmentData.rowPadding,
								},
							},
							sort: attachmentData.DataSorting,
							height: attachmentData.tableHeight,
							width: attachmentData.TableWidth,
							fixedHeader: attachmentData.FixedHeader,
							columns: csvData.columns,
							data: csvData.data
						});
					}
				});
			';
			
				wp_add_inline_script('adb-advance-datatable-script', $inline_script);
			} else {
				$output = '';
			}
			return $output;
		}

		// Method to return 'direct' for the filesystem_method filter
		public function adb_allow_csv_direct_read($method, $args, $context, $allow_relaxed_file_ownership) {
			// Don't remove this. We automatically remove this once CSV upload is completed.
			$method = 'direct';
			return $method;
		}

		function adb_read_attachment_id($attachment_id) {

			// Add the filter to allow CSV read but remove it after use
			add_filter('filesystem_method', [ $this, 'adb_allow_csv_direct_read' ], 10, 4);

		    if (!function_exists('WP_Filesystem')) {
		        require_once ABSPATH . 'wp-admin/includes/file.php';
		    }

		    global $wp_filesystem;
		    if (!WP_Filesystem()) {
		        return 'Failed to initialize WP_Filesystem.';
		    }

		    $file_url = wp_get_attachment_url($attachment_id);
		    if (!$file_url) {
		        return 'Invalid attachment ID.';
		    }

		    $file_path = str_replace(wp_get_upload_dir()['baseurl'], wp_get_upload_dir()['basedir'], $file_url);
		    if (!$wp_filesystem->exists($file_path)) {
		        return 'File not found.';
		    }

		    $file_contents = $wp_filesystem->get_contents($file_path);
		    if ($file_contents === false) {
		        return 'Error opening the file.';
		    }

		    $csv_data = array(
		        'columns' => array(),
		        'data' => array()
		    );

		    $rows = explode("\n", $file_contents);

		    if (count($rows) > 0) {
		        $csv_data['columns'] = str_getcsv(array_shift($rows));
		        foreach ($rows as $row) {
		            if (!empty(trim($row))) {
		                $csv_data['data'][] = str_getcsv($row);
		            }
		        }
		    }

			 // Remove the filter after use
			remove_filter('filesystem_method', [ $this, 'adb_allow_csv_direct_read' ], 10, 4 );

		    return $csv_data;
		}

		
	}

	return new Advanced_Datatable_Block();
}
