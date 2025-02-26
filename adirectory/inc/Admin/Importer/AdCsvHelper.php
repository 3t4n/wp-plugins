<?php

namespace ADQS_Directory\Admin\Importer;

class AdCsvHelper
{

    protected function get_import_subdir_name(): string
    {
        return 'adqs-imports';
    }

    public static function generate_submission_fields($termid)
    {
        $fieldsarray = [];

        $metas = get_term_meta($termid, 'adqs_metafields_types', true);

        if (is_wp_error($metas) || empty($metas)) {
            return $fieldsarray;
        }

        foreach ($metas as $section) {
            foreach ($section['fields'] as $field) {
                switch ($field['input_type']) {
                    case 'text':
                    case 'textarea':
                    case 'number':
                    case 'url':
                    case 'date':
                    case 'time':
                    case 'select':
                    case 'radio':
                    case 'checkbox':
                    case 'field_images':
                        $fieldsarray[] = array(
                            "meta" => "_" . $field['input_type'] . '_' . $field['fieldid'],
                            "label" => $field['label'],
                            "type" => $field['input_type']
                        );

                        break;
                    case 'map':
                        $fieldsarray[] = array(
                            "meta" => "_map_lat",
                            "label" => 'Latitude',
                            "type" => $field['input_type']
                        );

                        $fieldsarray[] = array(
                            "meta" => "_map_lon",
                            "label" => 'Longitude',
                            "type" => $field['input_type']
                        );
                        break;

                    case 'pricing':
                        $fieldsarray[] = array(
                            "meta" => "_price",
                            "label" => $field['label'],
                            "type" => $field['input_type']
                        );

                        $fieldsarray[] = array(
                            "meta" => "_price_range",
                            "label" => 'Price Range',
                            "type" => $field['input_type']
                        );
                        break;
                    default:
                        $fieldsarray[] = array(
                            "meta" => "_" . $field['input_type'],
                            "label" => $field['label'],
                            "type" => $field['input_type']
                        );
                }
            }
        }

        return $fieldsarray;
    }


    public function handle_csv_upload($import_type, $files_index = 'import', $allowed_mime_types = array())
    {
        $import_type = sanitize_key($import_type);
        if (! $import_type) {
            throw new \Exception('Import type is invalid.');
        }

        if (! $allowed_mime_types) {
            $allowed_mime_types = array(
                'csv' => 'text/csv',
                'txt' => 'text/plain',
            );
        }

        $file = $_FILES[$files_index] ?? null;
        if (! isset($file['tmp_name']) || ! is_uploaded_file($file['tmp_name'])) {
            throw new \Exception(esc_html__('File is empty. Please upload something more substantial. This error could also be caused by uploads being disabled in your php.ini or by post_max_size being defined as smaller than upload_max_filesize in php.ini.', 'woocommerce'));
        }

        if (! function_exists('wp_import_handle_upload')) {
            require_once ABSPATH . 'wp-admin/includes/import.php';
        }

        $file['name'] = $import_type . '-' . $file['name'];

        $overrides_callback = function ($overrides_) use ($allowed_mime_types) {
            $overrides_['test_form'] = false;
            $overrides_['test_type'] = true;
            $overrides_['mimes']     = $allowed_mime_types;
            return $overrides_;
        };

        add_filter('upload_dir', array($this, 'override_upload_dir'));
        add_filter('wp_unique_filename', array($this, 'override_unique_filename'), 0, 2);
        add_filter('wp_handle_upload_overrides', $overrides_callback, 999);
        add_filter('wp_handle_upload_prefilter', array($this, 'remove_txt_from_uploaded_file'), 0);

        $orig_files_import = $_FILES['import'] ?? null; // phpcs:ignore WordPress.Security.ValidatedSanitizedInput.InputNotSanitized,WordPress.Security.NonceVerification.Missing
        $_FILES['import']  = $file;  // wp_import_handle_upload() expects the file to be in 'import'.

        $upload = wp_import_handle_upload();

        remove_filter('upload_dir', array($this, 'override_upload_dir'));
        remove_filter('wp_unique_filename', array($this, 'override_unique_filename'), 0);
        remove_filter('wp_handle_upload_overrides', $overrides_callback, 999);
        remove_filter('wp_handle_upload_prefilter', array($this, 'remove_txt_from_uploaded_file'), 0);

        if ($orig_files_import) {
            $_FILES['import'] = $orig_files_import;
        } else {
            unset($_FILES['import']);
        }

        if (! empty($upload['error'])) {
            throw new \Exception(esc_html($upload['error']));
        }

        if (false) {
            wp_delete_attachment($file['id'], true);
            throw new \Exception(esc_html__('Invalid file type for a CSV import.', 'woocommerce'));
        }

        return $upload;
    }

    public function override_upload_dir($uploads): array
    {
        $new_subdir = '/' . $this->get_import_subdir_name();

        $uploads['path']   = $uploads['basedir'] . $new_subdir;
        $uploads['url']    = $uploads['baseurl'] . $new_subdir;
        $uploads['subdir'] = $new_subdir;

        return $uploads;
    }

    public function override_unique_filename(string $filename, string $ext): string
    {
        $length = min(10, 255 - strlen($filename) - 1);
        if (1 < $length) {
            $suffix   = strtolower(wp_generate_password($length, false, false));
            $filename = substr($filename, 0, strlen($filename) - strlen($ext)) . '-' . $suffix . $ext;
        }

        return $filename;
    }

    public function remove_txt_from_uploaded_file(array $file): array
    {
        $file['name'] = substr($file['name'], 0, -4);
        return $file;
    }
}
