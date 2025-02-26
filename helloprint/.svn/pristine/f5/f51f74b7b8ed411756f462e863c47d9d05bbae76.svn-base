<?php

namespace HelloPrint\Inc\Base\Controllers\Admin;

use Exception;
use HelloPrint\Inc\Base\Controllers\BaseController;
use HelloPrint\Inc\Services\HelloPrintApiService;
use HelloPrint\Inc\Services\FileUploadService;

class OrderPresetController extends BaseController
{
    private $tableName = '';
    private $fileTableName = '';
    private $wpdb;

    public function register()
    {

        add_action('wp_ajax_helloprint_upload_preset_file', array($this, 'upload_preset_file'));
        add_action('wp_ajax_remove_helloprint_preset_file', array($this, 'remove_file'));
        // action to bulk import 
        add_action('wp_ajax_get_helloprint_preset_load_quantities', array($this, 'get_quanitites_and_service_level'));
        add_action("wp_ajax_get_helloprint_preset_load_details_from_preset", array($this, 'get_details_form_preset'));

        add_action("wp_ajax_helloprint_save_order_item_presets", array($this, 'save_order_item_presets'));

        add_action('wp_ajax_get_helloprint_preset_get_custom_size', array($this, 'get_custom_size_options_design'));

    }

    private function setTable()
    {
        global $wpdb;
        $this->wpdb = $wpdb;
        $this->tableName = $this->wpdb->prefix . 'helloprint_order_presets';
        $this->fileTableName = $this->wpdb->prefix . 'helloprint_order_line_preset_files';
    }

    public function helloprint_order_presets()
    {
        $post_per_page = 20;
        $pagenum = isset($_GET['paged']) ? (int)sanitize_text_field(wp_unslash($_GET['paged'])) : 1;
        $s = isset($_GET['s']) ? sanitize_text_field(wp_unslash($_GET['s'])) : '';
        $this->setTable();
        $query = "
            SELECT id, product_type, order_preset_name, helloprint_product_id, helloprint_item_sku, helloprint_variant_key, 
                   default_service_level, default_quantity, file_name, file_url 
            FROM $this->tableName
        ";
        
        // If a search term is provided, add it to the query
        if (!empty($s)) {
            $query .= " WHERE 
                (`order_preset_name` LIKE %s) OR 
                (`helloprint_item_sku` LIKE %s) OR 
                (`helloprint_variant_key` LIKE %s) OR 
                (`default_service_level` LIKE %s)
            ";
            // Prepare the query with the search term, adding '%' for LIKE queries
            $search_term = '%' . $s . '%';
            $query = $this->wpdb->prepare(
                // phpcs:ignore WordPress.DB.PreparedSQL.NotPrepared
                $query, $search_term, $search_term, $search_term, $search_term);
        }
        
        // Get the total number of results
        $results = $this->wpdb->get_results(
            // phpcs:ignore WordPress.DB.PreparedSQL.NotPrepared
            $query);
        $totals = $this->wpdb->num_rows;
        
        // Calculate pagination
        $page = ($pagenum - 1);
        $query .= " ORDER BY id DESC LIMIT %d OFFSET %d";
        
        // Prepare the query with pagination values
        $query = $this->wpdb->prepare(
            // phpcs:ignore WordPress.DB.PreparedSQL.NotPrepared
            $query, $post_per_page, $page * $post_per_page);
        
        // Execute the query with pagination
        $order_presets = $this->wpdb->get_results(
            // phpcs:ignore WordPress.DB.PreparedSQL.NotPrepared
            $query);

        $num_of_pages = ceil($totals / $post_per_page);
        $page_links = paginate_links(array(
            'base' => add_query_arg('paged', '%#%'),
            'format' => '',
            'prev_text' => __('&laquo;', 'helloprint'),
            'next_text' => __('&raquo;', 'helloprint'),
            'total' => $num_of_pages,
            'current' => $pagenum
        ));

        require_once "$this->plugin_path/templates/admin/order-preset/lists.php";
    }

    public function new_helloprint_order_preset()
    {
        if (isset($_POST['action'])) {
            $this->setTable();
            $order_preset_name = isset($_POST['order_preset_name']) ? (string)(sanitize_text_field(wp_unslash($_POST['order_preset_name']))) : '';
            $helloprint_item_sku = isset($_POST['helloprint_item_sku']) ? (string)(sanitize_text_field(wp_unslash($_POST['helloprint_item_sku']))) : '';
            $product_type = (isset($_POST['product_type']) && !empty($_POST['product_type'])) ? (sanitize_text_field(wp_unslash($_POST['product_type']))) : "non_hp";
            $default_service_level =  isset($_POST['default_service_level']) ?  (string)(sanitize_text_field(wp_unslash($_POST['default_service_level']))) : '';
            $default_quantity = (isset($_POST['default_quantity']) && !empty($_POST['default_quantity'])) ?  (float)(sanitize_text_field(wp_unslash($_POST['default_quantity']))) : 0;
            if ($product_type == "non_hp") {
                $helloprint_variant_key = isset($_POST['helloprint_variant_key']) ? (string)(sanitize_text_field(wp_unslash($_POST['helloprint_variant_key']))) : '';
                $helloprint_product_id = "";
            } else {
                $helloprint_variant_key = '';
                $helloprint_product_id = isset($_POST['helloprint_product']) ? (string)(sanitize_text_field(wp_unslash($_POST['helloprint_product']))) : '';
                $helloprint_item_sku = "";
                $default_service_level =  '';
                $default_quantity = 0;
            
            }
            
            $file_name = '';
            $file_url = '';
            if (!empty($_POST['helloprint_order_preset_file_upload'])) {
                $fileUploads = sanitize_text_field(wp_unslash($_POST['helloprint_order_preset_file_upload']));
                $fileUploads = ltrim($fileUploads, '[');
                $fileUploads = rtrim($fileUploads, ']');
                if (!empty($fileUploads)) {
                    $filesArray = json_decode(stripslashes($fileUploads), true);
                    $file_name = (sanitize_text_field(wp_unslash($filesArray['file_name']))) ?? '';
                    $file_url = (sanitize_text_field(wp_unslash($filesArray['file_path']))) ?? '';
                }
            } else {
                $file_url = isset($_POST['order_preset_public_url']) ? sanitize_text_field(wp_unslash($_POST['order_preset_public_url'])) : '';
            }
            $available_options = (isset($_POST['available_options']) && !empty($_POST['available_options'])) ?  (sanitize_text_field($_POST['available_options'])) : "";
            $options_array = $this->_get_default_options();
            $default_option = $options_array["options"];
            if ($options_array["quantity"] > 0) {
                $default_quantity = $options_array["quantity"];
            }
            $query = "
                INSERT INTO $this->tableName 
                (product_type, order_preset_name, helloprint_item_sku, helloprint_variant_key, 
                default_service_level, default_quantity, file_name, file_url, available_options, 
                default_options, helloprint_product_id) 
                VALUES (%s, %s, %s, %s, %s, %d, %s, %s, %s, %s, %s)
            ";

            $output = $this->wpdb->prepare(
                // phpcs:ignore WordPress.DB.PreparedSQL.NotPrepared
                $query, 
                $product_type, 
                $order_preset_name, 
                $helloprint_item_sku, 
                $helloprint_variant_key, 
                $default_service_level, 
                $default_quantity, 
                $file_name, 
                $file_url, 
                $available_options, 
                $default_option, 
                $helloprint_product_id
            );

            $this->wpdb->query(
                // phpcs:ignore WordPress.DB.PreparedSQL.NotPrepared
                $output);
            return wp_redirect('admin.php?page=helloprint-order-presets&success=added');
        }
        $all_hp_products = (new HelloPrintApiService())->getAllProducts();
        $product_type = "hp";

        require_once "$this->plugin_path/templates/admin/order-preset/add.php";
    }

    public function edit_helloprint_order_preset()
    {
        $this->setTable();
        if (isset($_POST['action']) && isset($_POST['id'])) {
            $this->setTable();
            $id = sanitize_text_field(wp_unslash($_POST['id']));
            $order_preset_name = isset($_POST['order_preset_name']) ? (string)(sanitize_text_field(wp_unslash($_POST['order_preset_name']))) : '';
            $helloprint_item_sku = isset($_POST['helloprint_item_sku']) ? (string)(sanitize_text_field(wp_unslash($_POST['helloprint_item_sku']))) : '';
            $product_type = (isset($_POST['product_type']) && !empty($_POST['product_type'])) ? (sanitize_text_field(wp_unslash($_POST['product_type']))) : "non_hp";
            $default_service_level =  isset($_POST['default_service_level']) ?  (string)(sanitize_text_field(wp_unslash($_POST['default_service_level']))) : '';
            $default_quantity = (isset($_POST['default_quantity']) && !empty($_POST['default_quantity'])) ?  (float)(sanitize_text_field(wp_unslash($_POST['default_quantity']))) : 0;
            if ($product_type == "non_hp") {
                $helloprint_variant_key = isset($_POST['helloprint_variant_key']) ? (string)(sanitize_text_field(wp_unslash($_POST['helloprint_variant_key']))) : '';
                $helloprint_product_id = "";
            } else {
                $helloprint_variant_key = '';
                $helloprint_product_id = isset($_POST['helloprint_product']) ? (string)(sanitize_text_field(wp_unslash($_POST['helloprint_product']))) : '';
                $helloprint_item_sku = "";
                $default_service_level =  '';
                $default_quantity =  0;
            
            }
            $file_name = '';
            $file_url = '';
            $remove_preset_file = isset($_POST['remove_preset_file']) ? (sanitize_text_field(wp_unslash($_POST['remove_preset_file']))) : 0;
            if ($remove_preset_file == 1) {
                $this->wpdb->query(
                    $this->wpdb->prepare(
                        "UPDATE $this->tableName SET file_name = %s, file_url = %s WHERE id = %d",
                        '', // Empty value for file_name
                        '', // Empty value for file_url
                        $id  // The ID value should be sanitized (e.g., using an integer placeholder)
                    )
                );
            }
            $available_options = (isset($_POST['available_options']) && !empty($_POST['available_options'])) ?  (sanitize_text_field(wp_unslash($_POST['available_options']))) : "";
            $available_options = wp_json_encode(wp_json_encode($available_options));
            $options_array = $this->_get_default_options();
            $default_option = $options_array["options"];
            if ($options_array["quantity"] > 0) {
                $default_quantity = $options_array["quantity"];
            }
            $query = "
                UPDATE $this->tableName 
                SET 
                    product_type = %s, 
                    order_preset_name = %s, 
                    helloprint_item_sku = %s, 
                    helloprint_variant_key = %s, 
                    default_service_level = %s, 
                    default_quantity = %d, 
                    available_options = %s, 
                    default_options = %s, 
                    helloprint_product_id = %s 
                WHERE id = %d
            ";

            $this->wpdb->query(
                // phpcs:ignore WordPress.DB.PreparedSQL.NotPrepared
                $this->wpdb->prepare(
                    // phpcs:ignore WordPress.DB.PreparedSQL.NotPrepared
                    $query, 
                    // phpcs:ignore WordPress.DB.PreparedSQL.NotPrepared
                    $product_type, 
                    // phpcs:ignore WordPress.DB.PreparedSQL.NotPrepared
                    $order_preset_name, 
                    // phpcs:ignore WordPress.DB.PreparedSQL.NotPrepared
                    $helloprint_item_sku, 
                    // phpcs:ignore WordPress.DB.PreparedSQL.NotPrepared
                    $helloprint_variant_key, 
                    // phpcs:ignore WordPress.DB.PreparedSQL.NotPrepared
                    $default_service_level, 
                    // phpcs:ignore WordPress.DB.PreparedSQL.NotPrepared
                    $default_quantity, 
                    // phpcs:ignore WordPress.DB.PreparedSQL.NotPrepared
                    $available_options, 
                    // phpcs:ignore WordPress.DB.PreparedSQL.NotPrepared
                    $default_option, 
                    // phpcs:ignore WordPress.DB.PreparedSQL.NotPrepared
                    $helloprint_product_id, 
                    // phpcs:ignore WordPress.DB.PreparedSQL.NotPrepared
                    $id
                )
            );
            $fileUploads = isset($_POST['helloprint_order_preset_file_upload']) ? sanitize_text_field(wp_unslash($_POST['helloprint_order_preset_file_upload'])) : [];

            $publicUrl = isset($_POST['order_preset_public_url']) ? sanitize_text_field(wp_unslash($_POST['order_preset_public_url'])) : '';
            if (!empty($fileUploads)) {
                $fileUploads = ltrim($fileUploads, '[');
                $fileUploads = rtrim($fileUploads, ']');
                $filesArray = json_decode(stripslashes($fileUploads), true);
                $file_name = (sanitize_text_field(wp_unslash($filesArray['file_name']))) ?? '';
                $file_url = (sanitize_text_field(wp_unslash($filesArray['file_path']))) ?? '';
                if (!empty($file_url)) {
                    $this->wpdb->query(
                        $this->wpdb->prepare(
                            "UPDATE $this->tableName SET file_name = %s, file_url = %s WHERE id = %d",
                            $file_name,  // %s is for strings (file_name and file_url)
                            $file_url,   // %s is for strings (file_name and file_url)
                            $id          // %d is for integers (id)
                        )
                    );                }
            } else {
                $this->wpdb->query(
                    $this->wpdb->prepare(
                        "UPDATE $this->tableName SET file_name = '', file_url = %s WHERE id = %d",
                        $publicUrl,  // %s for string (file_url)
                        $id          // %d for integer (id)
                    )
                );
            }

            return wp_redirect('admin.php?page=helloprint-order-presets&success=updated');
        }

        $id = isset($_GET['id']) ? absint($_GET['id']) : null;
        $order_preset_name = '';
        $helloprint_item_sku = '';
        $helloprint_variant_key = '';
        $default_service_level = '';
        $default_quantity = '';
        $file_name = '';
        $file_url = '';
        $product_type = "hp";
        $helloprint_product_id = "";
        $is_public_url = false;
        $result = $this->wpdb->get_results(
            $this->wpdb->prepare(
                "SELECT * FROM $this->tableName WHERE id = %d", 
                $id // The id should be sanitized as an integer
            )
        );
        foreach ($result as $print) {
            $order_preset_name = $print->order_preset_name;
            $helloprint_item_sku = $print->helloprint_item_sku;
            $helloprint_variant_key = $print->helloprint_variant_key;
            $default_service_level = $print->default_service_level;
            $default_quantity = $print->default_quantity;
            $file_name = $print->file_name;
            $file_url = $print->file_url;
            $product_type = $print->product_type;
            $helloprint_product_id = $print->helloprint_product_id;
        }
        if (strpos($file_url, "//") !== FALSE) {
            $is_public_url = true;
        }
        $all_hp_products = (new HelloPrintApiService())->getAllProducts();
        require_once "$this->plugin_path/templates/admin/order-preset/edit.php";
    }

    private function _get_default_options($data = [])
    {
        $quantity = 0;
        $default_option = "";
        if (!empty($data["available_option_type"])) {
            $available_option_type =  (string)(sanitize_text_field(wp_unslash($data["available_option_type"])));
        } else {
            $available_option_type =  isset($_POST['available_option_type']) ?  (string)(sanitize_text_field(wp_unslash($_POST['available_option_type']))) : '';
        }
        if ($available_option_type == "custom_options") {
            if (!empty($data["custom_options"])) {
                $custom_options = $data["custom_options"];
            } else {
                $custom_options = !empty($_POST['custom_options']) ? $_POST['custom_options'] : [];
            }
            $option_default = array_map('sanitize_textarea_field', $custom_options);
            $default_option = ["custom_options" => $option_default];
            $default_option = wp_json_encode($default_option);
        } else if ($available_option_type == "appreal_sizes") {
            if (!empty($data["appreal_sizes"])) {
                $option_default = $data["appreal_sizes"];
            } else {
                $option_default = !empty($_POST['appreal_sizes']) ? $_POST['appreal_sizes'] : [];
            }
            //print_r($option_default);die();
            $options = [];
            foreach ($option_default as $key => $def) {
                $def = array_map('sanitize_textarea_field', $def);
                $options[$key] = [];
                foreach ($def as $k => $val) {
                    $val = (float) $val;
                    if ($val > 0) {
                        $options[$key][$k] = $val;
                        $quantity += $val;
                    }
                }
                if (empty($options[$key])) {
                    unset($options[$key]);
                }
            }

            $default_option = ["appreal_sizes" => $options];
            $default_option = wp_json_encode($default_option);
        }

        return ["quantity" => $quantity, "options" => $default_option];
    }

    public function delete_helloprint_order_preset()
    {
        $this->setTable();
        $del_id = isset($_GET['id']) ? (int)sanitize_text_field(wp_unslash($_GET['id'])) : null;
        $this->wpdb->query(
            $this->wpdb->prepare(
                "DELETE FROM $this->tableName WHERE id = %d", 
                $del_id  // %d for integer (del_id)
            )
        );        return wp_redirect('admin.php?page=helloprint-order-presets&success=deleted');
    }

    public function get_quanitites_and_service_level()
    {
        check_ajax_referer('wphp-plugin-nonce');
        $variantKey = isset($_POST['variant_key']) ? (sanitize_text_field(wp_unslash($_POST['variant_key']))) : '';
        if (empty($variantKey)) {
            return '';
        }
        $api = new HelloPrintApiService();
        $data = $api->get_qts_and_levels($variantKey);
        $data["variant_key"] = $variantKey;
        return wp_send_json_success($data);
    }

    public function get_details_form_preset()
    {
        check_ajax_referer('wphp-plugin-nonce');
        $preset_id = (sanitize_text_field(wp_unslash($_POST['preset_id']))) ?? '';
        $item_id = (sanitize_text_field(wp_unslash($_POST['item_id']))) ?? '';
        if (empty($preset_id)) {
            return [];
        }
        $this->setTable();
        $results = $this->wpdb->get_results(
            $this->wpdb->prepare(
                "SELECT * FROM $this->tableName WHERE id = %d", 
                $preset_id  // %d for integer (preset_id)
            )
        );        if (!isset($results[0])) {
            return [];
        }

        $tableName = $this->wpdb->prefix . 'helloprint_order_line_item_presets';
        $query = "SELECT * FROM $tableName WHERE line_item_id = %d";
        $existingresults = $this->wpdb->get_results(
                // phpcs:ignore WordPress.DB.PreparedSQL.NotPrepared
                $this->wpdb->prepare(
                    // phpcs:ignore WordPress.DB.PreparedSQL.NotPrepared
                    $query, $item_id)
            );
        $existingPresetId = null;
        if (isset($existingresults[0])) {
            $existingPresetId = $existingresults[0]->preset_id;
        }
        $variantKey = $results[0]->helloprint_variant_key;
        $service_level = $results[0]->default_service_level;
        $quantity = $results[0]->default_quantity;
        $sku = $results[0]->helloprint_item_sku;

        $api = new HelloPrintApiService();
        $data = $api->get_qts_and_levels($variantKey);
        $data['service_level'] = $service_level;
        $data['quantity'] = $quantity;
        $data['sku'] = $sku;
        if ($existingPresetId != $preset_id) {
            $data['file_name'] = $results[0]->file_name;
            $data['file_url'] = $file_url = $results[0]->file_url;
            $data['file_full_path'] = esc_url_raw(get_site_url() . $results[0]->file_url);
        } else {
            $data['file_name'] = '';
            $data['file_url'] = $file_url = '';
            $data['file_full_path'] = '';
        }

        $data['remove_text'] = wp_kses(_translate_helloprint("Remove", 'helloprint'), false);
        $data['download_text'] = wp_kses(_translate_helloprint("Download", 'helloprint'), false);
        $data['existing_files'] = $this->get_existing_files($item_id, $file_url);
        return wp_send_json_success($data);
    }

    public function upload_preset_file()
    {
        check_ajax_referer('wphp-plugin-nonce');

        $validFileTypes = [
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
        $files = [];
        $fileArray = [];

        $allFiles = $_FILES;
        $fileObj = ($allFiles['helloprint_order_item_file_upload']) ?? $allFiles['helloprint_order_preset_file_upload'];

        if (empty($fileObj) && isset($allFiles['filepond']) && !empty($allFiles['filepond'])) {
            $fileObj = $allFiles['filepond'];
        }

        if (!isset($fileObj[0])) {
            $fileArray[0] = $fileObj;
        } else {
            $fileArray = $fileObj;
        }

        foreach ($fileArray as $key => $file) {
            if (!isset($file['tmp_name'], $file['name'])) {
                continue;
            }

            // Use wp_check_filetype_and_ext to validate
            $file_info = wp_check_filetype_and_ext($file['tmp_name'], $file['name']);

            if (!$file_info['ext'] || !$file_info['type'] || !in_array($file_info['type'], $validFileTypes, true)) {
                wc_add_notice(__('Invalid file type. Please upload a valid file.', 'helloprint'), 'error');
                return wp_send_json_error([
                    'message' => __('Invalid file type. Please upload a valid file.', 'helloprint'),
                ]);
            }

            // Sanitize and store file details
            $files['name'][$key] = sanitize_text_field(wp_unslash($file['name']));
            $files['tmp_name'][$key] = sanitize_text_field(wp_unslash($file['tmp_name']));
            $files['size'][$key] = absint($file['size']);
            $files['type'][$key] = $file_info['type'];
        }

        $uploaded_files = (new FileUploadService())
            ->storeFile($files, $this->plugin_path);

        return wp_send_json_success($uploaded_files);
    }

    public function remove_file()
    {
        check_ajax_referer('wphp-plugin-nonce');
        $remove_file_path = sanitize_text_field(wp_unslash($_POST['helloprint_file']));
        if ($remove_file_path && file_exists(ABSPATH . $remove_file_path)) {
            wp_delete_file(ABSPATH . $remove_file_path);
        }
        return wp_send_json_success();
    }

    private function get_existing_files($item_id = null, $file_url = '')
    {
        if (empty($item_id)) {
            return [];
        }
        $this->setTable();
        $results = $this->wpdb->get_results(
            $this->wpdb->prepare(
                "SELECT * FROM $this->fileTableName WHERE line_item_id = %d AND file_url != %s", 
                $item_id, // %d for integer (item_id)
                $file_url // %s for string (file_url)
            )
        );
        if (!isset($results[0])) {
            return [];
        }
        foreach ($results as &$res) {
            $res->file_full_path = esc_url_raw(get_site_url() . $res->file_url);
        }

        return $results;
    }

    public function save_order_item_presets()
    {
        check_ajax_referer('wphp-plugin-nonce');
        $order_id = isset($_POST['data']['order_id_preset']) ? (sanitize_text_field(wp_unslash($_POST['data']['order_id_preset']))) : '';
        // return wp_send_json_success($formData);
        $item_id = isset($_POST['data']['item_id_preset']) ? sanitize_text_field(wp_unslash($_POST['data']['item_id_preset'])) : '';
        $preset = isset($_POST['data']['order_item_preset']) ? sanitize_text_field(wp_unslash($_POST['data']['order_item_preset'])) : null;
        $service_levels = isset($_POST['data']['order_item_preset_service_level']) ? sanitize_text_field(wp_unslash($_POST['data']['order_item_preset_service_level'])) : null;
        $quantity = isset($_POST['data']['order_item_preset_quantity']) && !empty($_POST['data']['order_item_preset_quantity']) ? sanitize_text_field(wp_unslash($_POST['data']['order_item_preset_quantity'])) : 0;
        $external_file_url = isset($_POST['data']['helloprint_artwork_external_url']) ? sanitize_text_field(wp_unslash($_POST['data']['helloprint_artwork_external_url'])) : '';
        $helloprint_preset_prefer_file = isset($_POST['data']['helloprint_preset_prefer_files']) && !empty($_POST['data']['helloprint_preset_prefer_files']) ? sanitize_text_field(wp_unslash($_POST['data']['helloprint_preset_prefer_files'])) : "";
        
        wc_update_order_item_meta($item_id, "helloprint_preset_prefer_files", $helloprint_preset_prefer_file);
        global $wpdb;
        $tableName = $wpdb->prefix . 'helloprint_order_line_item_presets';
        $deleteQuery = $wpdb->prepare(
            "DELETE FROM $tableName WHERE line_item_id = %d", 
            $item_id
        );
        $wpdb->query(
            // phpcs:ignore WordPress.DB.PreparedSQL.NotPrepared
            $deleteQuery);
        $options_array = $this->_get_default_options($_POST['data']);
        $options = $options_array["options"];
        if ($options_array["quantity"] > 0) {
            $quantity = $options_array["quantity"];
        }
        if (!empty($preset) && $preset != 0) {
            $insertQuery = $wpdb->prepare(
                "INSERT INTO $tableName (order_id, line_item_id, preset_id, service_level, quantity, options) 
                 VALUES (%d, %d, %s, %s, %d, %s)",
                $order_id, 
                $item_id, 
                $preset, 
                $service_levels, 
                $quantity, 
                $options
            );
            $wpdb->query(
                // phpcs:ignore WordPress.DB.PreparedSQL.NotPrepared
                $insertQuery);
        }

        $fileTableName = $wpdb->prefix . 'helloprint_order_line_preset_files';
        $deleteQuery = $wpdb->prepare(
            "DELETE FROM $fileTableName WHERE line_item_id = %d", 
            $item_id
        );
        $wpdb->query(
            // phpcs:ignore WordPress.DB.PreparedSQL.NotPrepared
            $deleteQuery);
        $publicfileTableName = $wpdb->prefix . 'helloprint_order_line_public_files';
        $deletePublicQuery = $wpdb->prepare(
            "DELETE FROM $publicfileTableName WHERE line_item_id = %d", 
            $item_id
        );
        $wpdb->query(
            // phpcs:ignore WordPress.DB.PreparedSQL.NotPrepared
            $deletePublicQuery);
        $filesUploaded = [];
        $files = isset($_POST['data']['helloprint_order_preset_file_upload']) ? array_map('sanitize_text_field', wp_unslash($_POST['data']['helloprint_order_preset_file_upload'])) : [];
        
        if ((empty($files[0]) || !is_array($files[0])) && !empty($_POST["data"]["filepond"])) {
            $files = sanitize_text_field(wp_unslash($_POST['data']['filepond']));
            $files = ltrim($files, "[");
            $files = rtrim($files, "]");
            $filesArr[] = $files;
            $files = $filesArr;  
        }
        $is_artwork_added = false;
        if (!empty($files) && count($files) > 0) {
            foreach ($files as $fileUploads) {
                $fileUploads = ltrim($fileUploads, "[");
                $fileUploads = rtrim($fileUploads, "]");
                $filesArray = json_decode(stripslashes($fileUploads), true);
                if (is_string($fileUploads) && !isset($filesArray)) {
                    $file_url = $fileUploads;
                } else {
                    $file_name = (sanitize_text_field(wp_unslash($filesArray['file_name']))) ?? "";
                    $file_url = (sanitize_text_field(wp_unslash($filesArray['file_path']))) ?? "";
                    $filesUploaded[] = ['file_name' => $file_name, 'file_path' => $file_url];
                }
                if (!empty($file_url)) {
                    $is_artwork_added = true;
                    $insertQuery = $wpdb->prepare(
                        "INSERT INTO $fileTableName (order_id, line_item_id, file_url) VALUES (%d, %d, %s)",
                        $order_id, $item_id, $file_url
                    );
                    $wpdb->query(
                        // phpcs:ignore WordPress.DB.PreparedSQL.NotPrepared
                        $insertQuery);
                }
            }
        } else if (!empty($external_file_url)) {
            $is_artwork_added = true;
            $insertQuery = $wpdb->prepare(
                "INSERT INTO $publicfileTableName (order_id, line_item_id, public_file_url) VALUES (%d, %d, %s)",
                $order_id, $item_id, $external_file_url
            );
            $wpdb->query(
                // phpcs:ignore WordPress.DB.PreparedSQL.NotPrepared
                $insertQuery);
        }
        $hp_order_id = "";
        $hp_order_status = get_post_meta($order_id, 'helloprint_order_status', true);
        if (!empty($hp_order_status)) {
            if (!is_array($hp_order_status)) {
                $hp_order_status = json_decode($hp_order_status, true);
            }
            if (!empty($hp_order_status["order_id"])) {
                $hp_order_id = $hp_order_status["order_id"];
            }
        }
        $item = new \WC_Order_Item_Product($item_id);
        $product = wc_get_product($item->get_product_id());
        if (
            $is_artwork_added && empty($hp_order_id) && get_option("helloprint_automatic_send_order", false) && !empty($product) &&
            $product->get_type() === "helloprint_product"
        ) {
            $this->_validate_and_send_hp_order($order_id, $item_id);
        }
        return wp_send_json_success(['files' => $filesUploaded, 'message' => wp_kses(_translate_helloprint("Successfully Saved", 'helloprint'), false), 'download' => wp_kses(_translate_helloprint('Download', 'helloprint'), true), 'remove' => wp_kses(_translate_helloprint('Remove', 'helloprint'), true)]);
    }

    function get_custom_size_options_design()
    {
        check_ajax_referer('wphp-plugin-nonce');
        $this->setTable();
        $preset_id = sanitize_text_field(wp_unslash($_POST['preset_id']));
        if (!empty($preset_id)) {
            $preset_details = $this->wpdb->get_results(
                $this->wpdb->prepare(
                    "SELECT * FROM $this->tableName WHERE id = %d", 
                    $preset_id // %d for integer (preset_id)
                )
            );
            if (!isset($preset_details[0])) {
                return wp_send_json_error();
            }
            $default_options = $preset_details[0]->default_options;
        }
        $line_item_id = sanitize_text_field(wp_unslash($_POST['line_item_id']));
        if (!empty($line_item_id)) {
            $line_item_preset_table = $this->wpdb->prefix . "helloprint_order_line_item_presets";
            $line_item_preset = $this->wpdb->get_results(
                $this->wpdb->prepare(
                    "SELECT * FROM $line_item_preset_table WHERE line_item_id = %d", 
                    $line_item_id // %d for integer (line_item_id)
                )
            );
            if (!empty($line_item_preset[0]) && $line_item_preset[0]->preset_id == $preset_id) {
                $default_options = $line_item_preset[0]->options;
            }
        }
        $options = sanitize_text_field($_POST['options']);
        if ((empty($options) || $options == "[]") && !empty($preset_details) && !empty($line_item_id)) {
            $options = $preset_details[0]->available_options;
        }
        $options = wp_unslash($options);
        if (empty($options)) {
            return wp_send_json_success(["html" => ""]);
        }
        $data = [];
        $data["available_options"] = $available_options = json_decode($options);
        $default_options = !empty($default_options) ? json_decode($default_options, true) : [];

        $file_name = "";
        $custom_html = "";
        $type = "";
        if (
            array_search('height', array_column($available_options, 'code'), true) !== false &&
            array_search('width', array_column($available_options, 'code'), true) !== false
        ) {
            $file_name = "custom-size.php";
            $type = "custom_options";
            $data["default_options"] = !empty($default_options["custom_options"]) ? $default_options["custom_options"] : [];
        } else if (array_search('apparelSize', array_column($available_options, 'code'), true) !== false) {
            $file_name = "appreal-sizes.php";
            $type = "appreal_sizes";
            $data["default_options"] = !empty($default_options["appreal_sizes"]) ? $default_options["appreal_sizes"] : [];
        }
        if (!empty($file_name)) {
            ob_start();
            load_template("$this->plugin_path/templates/admin/inc/$file_name", true, $data);
            $custom_html = ob_get_contents();
            ob_end_clean();
        }
        return wp_send_json_success(["html" => $custom_html, "type" => $type]);
    }

    public function _validate_and_send_hp_order($order_id, $item_id)
    {
        $order = wc_get_order($order_id);
        if (empty($order)) return;
        $validate = true;
        global $wpdb;
        $preset_tableName = $wpdb->prefix . 'helloprint_order_presets';
        $line_item_file_tableName = $wpdb->prefix . 'helloprint_order_line_preset_files';
        foreach ($order->get_items() as $item) {
            $itemId = $item->get_id();
            if ($itemId == $item_id) continue;
            $product = wc_get_product($item['product_id']);
            if ($product !== false) {
                // check if the product is HP Product
                if ($product->get_type() == 'helloprint_product') {
                    $single_validate = false;
                    $presetFiles = $wpdb->get_results(
                        $wpdb->prepare(
                            "SELECT * FROM $line_item_file_tableName WHERE line_item_id = %d", 
                            $itemId // %d for integer (itemId)
                        )
                    );                    
                    // check if any artwork has been uploaded to the order item
                    if (!empty($presetFiles)) {
                        foreach ($presetFiles as $key => $file) {
                            if ($file->file_url != '') {
                                $single_validate = true;
                            }
                        }
                    }
                    $hello_print_product_id = get_post_meta($product->get_id(), "helloprint_external_product_id", true);
                    $hpPresets = $wpdb->get_results("SELECT * from $preset_tableName where product_type = 'hp' and helloprint_product_id='$hello_print_product_id' ");
                    // check if any artwork has been uploaded to the Helloprint Order Preset with the current product 
                    if (!empty($hpPresets)) {
                        foreach ($hpPresets as $key => $file) {
                            if ($file->file_url != '' && !empty($file->file_url)) {
                                $single_validate = true;
                            }
                        }
                    }

                    if (!$single_validate) {
                        $validate = false;
                        break;
                        return false;
                    }
                }
            }
        }

        if ($validate) {
            $checkoutController = new CheckoutController();
            $checkoutController->send_order_to_helloprint($order_id);
        }
        return false;
    }

}
