<?php

/**
 * @package HelloPrint
 */

namespace HelloPrint\Inc\Base\Controllers\Admin;

use HelloPrint\Inc\Services\FileUploadService;
use HelloPrint\Inc\Base\Controllers\BaseController;

class CartFileUploadController extends BaseController
{
    public function register()
    {
        add_action('wp_ajax_wphp_upload_cart_file', array($this, 'upload_cart_file'));
        add_action('wp_ajax_nopriv_wphp_upload_cart_file', array($this, 'upload_cart_file'));

        add_action('wp_ajax_helloprint_upload_cart_file', array($this, 'upload_cart_file'));
        add_action('wp_ajax_nopriv_helloprint_upload_cart_file', array($this, 'upload_cart_file'));

        add_action('wp_ajax_remove_wphp_cart_file', array($this, 'remove_cart_file'));
        add_action('wp_ajax_nopriv_remove_wphp_cart_file', array($this, 'remove_cart_file'));

        add_action('wp_ajax_remove_wphp_product_file', array($this, 'remove_file'));
        add_action('wp_ajax_nopriv_remove_product_file', array($this, 'remove_file'));
    }

    public function upload_cart_file()
    {
        check_ajax_referer('wphp-plugin-nonce');
        $files = [];
        $noCart = isset($_POST['no_cart']) ? false : true;
        $validFileTypes = ['image/jpeg', 'image/png', 'image/jpg', 'application/pdf', 'image/tiff', 'image/tif', 'application/vnd.openxmlformats-officedocument.wordprocessingml.document', 'application/msword', 'application/x-zip-compressed', 'application/octet-stream', 'application/postscript'];
        $maxFileSize = helloprint_get_max_file_upload_size();

        if ($noCart) {
            $cart_item_key = sanitize_text_field(wp_unslash($_POST['cart_item_key']));
        }

        foreach ($_FILES as $file) {
            // Validate file type and size
            if (is_array($file['name']) && count($file['name']) > 0) {
                $fileInfo = wp_check_filetype_and_ext($file['tmp_name'][0], $file['name'][0]);
            } else {
                $fileInfo = wp_check_filetype_and_ext($file['tmp_name'], $file['name']);
            }
            $fileType = $fileInfo['type'];
            $fileExt = $fileInfo['ext'];

            if (!$fileType || !in_array($fileType, $validFileTypes, true)) {
                wc_add_notice(wp_kses(_translate_helloprint('Please upload a valid file type for this product. Valid file types are: pdf, jpg, jpeg, png, tiff, tif', 'helloprint'), false), 'error');
                return wp_send_json_error([
                    'message' => wp_kses(_translate_helloprint('Please upload a valid file type for this product. Valid file types are: pdf, jpg, jpeg, png, tiff, tif', 'helloprint'), false),
                ]);
            }


            $files['name'] = $file['name'];
            $files['tmp_name'] = $file['tmp_name'];
            $files['size'] = $file['size'];
            $files['type'] = $file['type'];
        }

        // Process the uploaded files
        $uploaded_files = (new FileUploadService())->storeFile($files, $this->plugin_path);
        $response_array = [];

        if ($noCart) {
            $cart = WC()->cart->get_cart();
            $cart_item = $cart[$cart_item_key];

            foreach ($uploaded_files as $item) {
                $response_array['file_component_id'] = $this->create_upload_for_file_component($cart_item_key, $item['file_name'], $item['file_path']);
                $response_array['cart_item_key'] = $cart_item_key;
            }

            return wp_send_json_success($response_array);
        } else {
            return wp_send_json_success($uploaded_files);
        }
    }

    private function create_upload_for_file_component($cart_item_key, $filename, $file_path)
    {
        $cart = WC()->cart->get_cart();
        $cart_item = $cart[$cart_item_key];
        $file_component['file_name'] = $filename;
        $file_component['file_path'] = $file_path;
        $cart_item['helloprint_product_setup']['uploaded_files'][] = $file_component;
        WC()->cart->cart_contents[$cart_item_key] = $cart_item;
        WC()->cart->set_session();
        return (count($cart_item['helloprint_product_setup']['uploaded_files']) - 1);
    }

    public function remove_cart_file()
    {
        check_ajax_referer('wphp-plugin-nonce');
        $cart_item_key = sanitize_text_field(wp_unslash($_POST['cart_item_key']));
        $file_component_id = (int)sanitize_text_field(wp_unslash($_POST['file_component_id']));
        $cart = WC()->cart->get_cart();
        $cart_item = $cart[$cart_item_key];
        foreach ($cart_item['helloprint_product_setup']['uploaded_files'] as $file_component_index => $file_component) {

            if ($file_component_index === $file_component_id) {
                $file_component['api_upload_id'] = null;
                $file_component['file_name'] = null;
                wp_delete_file(ABSPATH . $file_component['file_path']);
                $file_component['file_path'] = null;
                $cart_item['helloprint_product_setup']['uploaded_files'][$file_component_index] = $file_component;
                WC()->cart->cart_contents[$cart_item_key] = $cart_item;
                WC()->cart->set_session();
            }
        }
        return wp_send_json_success();
    }
    public function remove_file()
    {
        check_ajax_referer('wphp-plugin-nonce');
        $remove_file_path = sanitize_text_field(wp_unslash($_POST['wphp_file']));
        if ($remove_file_path && file_exists(ABSPATH . $remove_file_path)) {
            wp_delete_file(ABSPATH . $remove_file_path);
        }
        return wp_send_json_success();
    }
}
