<?php

namespace ADQS_Directory\Admin\Importer;

use ADQS_Directory\Admin\Importer\AdListingImporterController;

class AdImportExport
{
    public function __construct()
    {
        add_action('admin_menu', array($this, 'register_importer'));
        add_action('admin_init', array($this, 'handle_import_export_handler'));
        add_action('admin_enqueue_scripts', array($this, 'import_export_assets'));
        add_action('wp_ajax_adqs_get_dir_mapped_to', array($this, 'adqs_get_dir_mapped_to'));
        add_action('wp_ajax_adqs_upload_import_list', array($this, 'adqs_upload_import_list'));
        add_action('wp_ajax_adqs_export_listings', array($this, 'adqs_export_listings'));
    }


    // AJax for export listing

    public function adqs_export_listings()
    {
        if (!check_ajax_referer('adqs___directory_admin', 'security', false)) {
            wp_send_json_error(array('messsage' => $this->get_error_msg('nonce')));
        }

        if (!check_ajax_referer('adqs___directory_admin', 'security', false)) {
            wp_send_json_error(array('message' => 'Security check failed.'));
            wp_die();
        }

        $termid = absint($_POST['termid']) ?? 0;

        $submissionfields = array_filter(AdCsvHelper::generate_submission_fields($termid), function ($field) {
            return !in_array($field['type'], ['badges', 'businesshour']);
        });

        $csvheader = array(
            array(
                'Title',
                'Description',
                'Excerpt',
                'Categories',
                'Locations',
                'tags',
                'Images',
                'Status',
                'Published Date',
            )
        );

        foreach ($submissionfields as $field) {
            $csvheader[0][] = $field['label'];
        }


        $args = array(
            'post_type'      => 'adqs_directory',
            'posts_per_page' => -1,
            'meta_query'     => array(
                array(
                    'key'     => 'adqs_directory_type',
                    'value'   => $termid,
                    'compare' => '=',
                ),
            ),
        );

        $query = new \WP_Query($args);

        if ($query->have_posts()) {
            while ($query->have_posts()) {
                $query->the_post();

                $featured_image = get_the_post_thumbnail_url(get_the_ID(), 'medium');

                $image_urls = array();

                if ($featured_image) {
                    $image_urls[] = $featured_image;
                }

                $images = get_post_meta(get_the_ID(), '_images', true);

                if ($images) {
                    foreach ($images as $image_id) {
                        $image_urls[] = wp_get_attachment_url($image_id);
                    }
                }

                $listarr = array(
                    get_the_title(),
                    get_the_content(),
                    get_the_excerpt(),
                    implode(',', wp_get_post_terms(get_the_ID(), 'adqs_category', array('fields' => 'names'))),
                    implode(',', wp_get_post_terms(get_the_ID(), 'adqs_location', array('fields' => 'names'))),
                    implode(',', wp_get_post_tags(get_the_ID(), array('fields' => 'names'))),
                    implode(',', $image_urls),
                    get_post_status(),
                    get_the_date('Y-m-d H:i:s'),
                );

                foreach ($submissionfields as $field) {
                    $listarr[] = get_post_meta(get_the_ID(), $field['meta'], true) ?? '';
                }
                $csvheader[] = $listarr;
            }
        }

        wp_reset_postdata();

        header('Content-Type: text/csv');
        header('Content-Disposition: attachment; filename="exported_data_' . uniqid() . '.csv"');
        header('Pragma: no-cache');
        header('Expires: 0');

        $output = fopen('php://output', 'w');
        foreach ($csvheader as $row) {
            fputcsv($output, $row);
        }
        fclose($output);
        exit();
    }

    public function get_csv_data($file, $deilmeter = ',')
    {

        $csv = [];

        if (!$file) {
            return $csv;
        }

        if (!is_readable($file)) {
            chmod($file, 0744);
        }


        if (is_readable($file) && ($handle = fopen($file, 'r')) !== false) {

            $headers = array_map(function ($header) {
                return strtolower(str_replace(' ', '', $header));
            }, fgetcsv($handle, 0, $deilmeter));

            while (($row = fgetcsv($handle, 0, $deilmeter)) !== false) {
                $data = [];
                foreach ($headers as $key => $header) {
                    $data[$header] = $row[$key];
                }
                $csv[] = $data;
            }
            fclose($handle);
        }

        return $csv;
    }

    public function get_listing_default_statuses()
    {
        return ['publish', 'future', 'draft', 'pending', 'private'];
    }

    public function adqs_upload_import_list()
    {
        if (!check_ajax_referer('adqs-importer-nonce', 'security', 'false')) {
            wp_send_json_error(array('messsage' => 'Nonce verification failed'));
        }

        $csvmapfrom = wp_unslash($_POST['mapping']);
        $csvpath = sanitize_text_field($_POST['csv_file']);
        $delimiter = isset($_POST['delimiter']) ? wp_unslash($_POST['delimiter']) : ',';

        $position = isset($_POST['position']) ? intval($_POST['position']) : 0;
        $directory_id = isset($_POST['dir_id']) ? intval($_POST['dir_id']) : 0;

        $csvdata = $this->get_csv_data($csvpath, $delimiter);

        $total = count($csvdata);

        $imported = 0;
        $failed = 0;
        $attempted = 0;

        $offset = $total > 100 ? 20 : ($total < 40 ? 2 : 5);
        $listings = array_slice($csvdata, $position, $offset);

        $default_expiry_duration = adqs_get_setting_option('listing_expiry_date', 365);
        $expiry_date = date('Y-m-d H:i:s', strtotime('+' . $default_expiry_duration . ' days'));

        foreach ($listings as $row) {
            $args = array(
                'post_type'       => 'adqs_directory',
                'post_title'      => '',
                'post_content'         => '',
                'post_status'     => 'publish',
                'meta_input'      => array(
                    'adqs_directory_type' => (int) $directory_id,
                    '_expiry_date' => $expiry_date,
                    '_from_export_import' => '1',
                ),
            );

            $image_urls = array();
            $categories = array();
            $locations = array();

            foreach ($row as $column => $value) {
                if (empty($csvmapfrom[$column])) {
                    continue;
                }

                if ('published_date' === $csvmapfrom[$column]) {
                    continue;
                }

                if ('listing_status' === $csvmapfrom[$column]) {
                    $list_status = trim(strtolower($value));
                    if (in_array($list_status, $this->get_listing_default_statuses())) {
                        $args['post_status'] = $list_status;
                    }
                    continue;
                }

                if ('listing_title' === $csvmapfrom[$column] && !empty($value)) {
                    $args['post_title'] = $value;
                    continue;
                }

                if ('listing_content' === $csvmapfrom[$column] && !empty($value)) {
                    $args['post_content'] = $value;
                    continue;
                }

                if ('listing_images' === $csvmapfrom[$column] && !empty($value)) {
                    $image_urls = explode(',', $value);
                    continue;
                }

                if ('listing_cats' === $csvmapfrom[$column] && !empty($value)) {
                    $categories = array_map('trim', explode(',', $value));
                    continue;
                }

                if ('listing_locs' === $csvmapfrom[$column] && !empty($value)) {
                    $locations = array_map('trim', explode(',', $value));
                    continue;
                }


                if ($value) {
                    $args['meta_input'][$csvmapfrom[$column]] = $value;
                }
            }

            if (!empty($args['post_title'])) {

                remove_filter('transition_post_status', 'adqs_post_status_change_mail');

                $post_id = wp_insert_post($args);

                if (is_wp_error($post_id)) {
                    $failed++;
                    continue;
                }

                $imported++;
                $attempted++;

                if ($post_id) {
                    if (!empty($image_urls)) {
                        $attachment_ids = array();

                        foreach ($image_urls as $index => $image_url) {
                            $image_id = $this->upload_image_from_url(trim($image_url), $post_id);

                            if ($image_id) {
                                if ($index === 0) {
                                    set_post_thumbnail($post_id, $image_id);
                                } else {
                                    $attachment_ids[] = $image_id;
                                }
                            }
                        }

                        if (!empty($attachment_ids)) {
                            update_post_meta($post_id, '_images', $attachment_ids);
                        }
                    }

                    $this->insert_terms_to_taxonomy('adqs_category', $categories, $post_id, $directory_id);
                    $this->insert_terms_to_taxonomy('adqs_location', $locations, $post_id, $directory_id);
                }
            }
        }

        $isComplete = ($position + count($listings)) >= $total;
        $percentage = round((($position + count($listings)) / $total) * 100, 0);

        wp_send_json_success(array(
            'position' => $position + count($listings),
            'current_listings' => $listings,
            'total_post' => $total,
            'complete' => $isComplete,
            'percent_complete' => $percentage,
            'imported' => $imported,
            'failed' => $failed,
            'attempted' => $attempted
        ));
    }


    function insert_terms_to_taxonomy($taxonomy_slug, $terms, $post_id, $directory_id)
    {
        if (!empty($terms)) {
            $term_ids = array();

            foreach ($terms as $term_name) {

                $term = get_term_by('name', $term_name, $taxonomy_slug);

                if (!$term) {
                    $term = wp_insert_term($term_name, $taxonomy_slug);

                    if (is_wp_error($term)) {
                        return;
                    }

                    $termid = $term['term_id'];

                    update_term_meta($termid, 'listing_types', array($directory_id));
                }

                $termid = is_array($term) ? $term['term_id'] : $term->term_id;

                $directory_belongs = get_term_meta($termid, 'listing_types', true);

                if ($directory_belongs) {
                    if (!in_array($directory_id, $directory_belongs)) {
                        $directory_belongs[] = $directory_id;
                        update_term_meta($termid, 'listing_types', $directory_belongs);
                    }
                } else {
                    update_term_meta($termid, 'listing_types', array($directory_id));
                }

                $term_ids[] = $termid;
            }

            wp_set_post_terms($post_id, $term_ids, $taxonomy_slug);
        }
    }



    private function upload_image_from_url($image_url, $post_id)
    {
        $temp_file = download_url($image_url);

        if (is_wp_error($temp_file)) {
            return false;
        }

        $file = array(
            'name'     => basename($image_url),
            'type'     => mime_content_type($temp_file),
            'tmp_name' => $temp_file,
            'error'    => 0,
            'size'     => filesize($temp_file),
        );

        $overrides = array(
            'test_form' => false,
        );

        $attachment_id = media_handle_sideload($file, $post_id);

        if (is_wp_error($attachment_id)) {
            @unlink($temp_file);
            return false;
        }

        return $attachment_id;
    }


    public function get_csv_header_sample($file)
    {
        $headers = [];
        $sample_value = [];
        $sample_array = [];
        if (($handle = fopen($file, 'r')) !== false) {
            $headers = fgetcsv($handle, 0, ',');
            $sample_value = fgetcsv($handle, 1000, ',');
            fclose($handle);
        }

        foreach ($headers as $key => $value) {
            $sample_array[$value] = $sample_value[$key] ?? '';
        }

        return [
            "headers" => $headers,
            "sample" => $sample_array,
        ];
    }

    public function adqs_get_dir_mapped_to()
    {
        if (!check_ajax_referer('adqs-importer-nonce', 'security', 'false')) {
            wp_send_json_error(array('messsage' => 'Nonce verification failed'));
        }

        $termid = absint($_POST['termid']);
        $file = sanitize_text_field($_POST['csvpath']);

        $delimiter = $_POST['delimiter'] ?? ',';

        $newArray = AdCsvHelper::generate_submission_fields($termid);

        $csvhedaer = $this->get_csv_header_sample($file);

        ob_start(); ?>
        <?php
        foreach ($csvhedaer['headers'] as $key => $header) { ?>
            <li class="adqs-dropdown-item">
                <div class="article-area">
                    <h3 class="title"><?php echo esc_html($header); ?></h3>
                    <p class="des">
                        Sample:
                        <code><?php echo empty($csvhedaer['sample'][$header]) ? 'N/A' : $csvhedaer['sample'][$header]; ?></code>
                    </p>
                </div>
                <div class="input-area">
                    <div class="adqs-imex-selectbox">
                        <select class="adqs_mapped_to_metas"
                            name="mapping[<?php echo esc_attr(strtolower(str_replace(" ", "", $header))); ?>]">
                            <option value=''>Do Not Import</option>
                            <option value='listing_title'
                                <?php echo in_array(str_replace(' ', '', strtolower($header)), array('title', 'name', 'listingtitle')) ? 'selected' : '' ?>>
                                Listing Title</option>

                            <option value='listing_content'
                                <?php echo in_array(str_replace(' ', '', strtolower($header)), array('description', 'content')) ? 'selected' : '' ?>>
                                Listing Content</option>

                            <option value='listing_cats'
                                <?php echo in_array(str_replace(' ', '', strtolower($header)), array('categories', 'listingcategories')) ? 'selected' : '' ?>>
                                Listing Categories</option>

                            <option value='listing_locs'
                                <?php echo in_array(str_replace(' ', '', strtolower($header)), array('locations', 'listinglocations')) ? 'selected' : '' ?>>
                                Listing Locations</option>

                            <option value='listing_images'>Listing Images</option>

                            <option value='listing_status'
                                <?php echo in_array(str_replace(' ', '', strtolower($header)), array('status', 'listingstatus')) ? 'selected' : '' ?>>
                                Listing Status</option>

                            <option value='published_date'
                                <?php echo in_array(str_replace(' ', '', strtolower($header)), array('published', 'createdat', 'publishedat')) ? 'selected' : '' ?>>
                                Published Date</option>

                            <?php
                            foreach ($newArray as $option) { ?>
                                <option value="<?php echo $option['meta']; ?>"
                                    <?php echo str_replace(' ', '', strtolower($header)) === str_replace(' ', '', strtolower($option['label'])) ? 'selected' : ''; ?>>
                                    <?php echo $option['label']; ?></option>
                            <?php } ?>
                        </select>
                        <span class="adqs-imex-selectbox_arrow">
                            <svg width="14" height="8" viewBox="0 0 14 8" fill="none" xmlns="http://www.w3.org/2000/svg">
                                <path
                                    d="M13.7108 0.289706C13.6178 0.195067 13.5072 0.11995 13.3854 0.0686888C13.2635 0.0174272 13.1328 -0.00896454 13.0008 -0.00896454C12.8688 -0.00896454 12.7381 0.0174272 12.6162 0.0686888C12.4944 0.11995 12.3838 0.195067 12.2908 0.289706L7.71079 4.91417C7.61783 5.00881 7.50723 5.08393 7.38537 5.13519C7.26351 5.18645 7.1328 5.21284 7.00079 5.21284C6.86878 5.21284 6.73807 5.18645 6.61622 5.13519C6.49436 5.08393 6.38376 5.00881 6.29079 4.91417L1.71079 0.289706C1.61783 0.195067 1.50723 0.11995 1.38537 0.0686888C1.26351 0.0174272 1.1328 -0.00896454 1.00079 -0.00896454C0.868781 -0.00896454 0.738075 0.0174272 0.616216 0.0686888C0.494356 0.11995 0.383755 0.195067 0.290792 0.289706C0.104542 0.478887 0 0.7348 0 1.00155C0 1.2683 0.104542 1.52421 0.290792 1.71339L4.88079 6.34796C5.44329 6.91521 6.20579 7.23384 7.00079 7.23384C7.79579 7.23384 8.55829 6.91521 9.12079 6.34796L13.7108 1.71339C13.897 1.52421 14.0016 1.2683 14.0016 1.00155C14.0016 0.7348 13.897 0.478887 13.7108 0.289706Z"
                                    fill="#606C7D" />
                            </svg>
                        </span>
                    </div>

                </div>
            </li>
        <?php } ?>



<?php $mapping_section = ob_get_clean();

        wp_send_json_success(array(
            "options" => $optionsHtml,
            "mapping_sections" => $mapping_section,
            "sample" => $csvhedaer
        ));
    }



    public function import_export_assets()
    {
        $current_screen = get_current_screen();
        if (
            isset($_GET['post_type'], $_GET['page']) &&
            $_GET['post_type'] === 'adqs_directory' &&
            $_GET['page'] === 'adqs_export_import'
        ) {
            wp_enqueue_style('adqs-importer', ADQS_DIRECTORY_ASSETS_URL . '/admin/import/importer.css', array(), 'all');
            wp_enqueue_script('adqs-importer', ADQS_DIRECTORY_ASSETS_URL . '/admin/import/importer.js', array(), '', true);

            wp_localize_script("adqs-importer", "adqs_import", array(
                'nonce'    => wp_create_nonce('adqs-importer-nonce'),
            ));
        }
    }
    public function handle_import_export_handler()
    {
        if (isset($_POST['export_csv'])) {
            $exportdata = array(
                array("Title", "Description"),
            );


            $args = array(
                'post_type'      => 'post',
                'post_status'    => 'publish',
                'posts_per_page' => 20
            );


            $listings = new \WP_Query($args);

            while ($listings->have_posts()) {
                $listings->the_post();

                $exportdata[] = [
                    get_the_title(),
                    empty(get_the_content()) ? '' : get_the_content(),
                ];

                wp_reset_postdata();
            }

            header('Content-Type: text/csv');
            header('Content-Disposition: attachment; filename="sample_' . uniqid() . '.csv"');


            // Open a file in "output" mode to write directly to the output buffer

            $output = fopen('php://output', 'w');

            // Loop through data and write each row to the CSV
            foreach ($exportdata as $row) {
                fputcsv($output, $row);
            }

            // Close the output buffer
            fclose($output);
            exit;
        }
        if (isset($_POST['save_step'])) {

            check_admin_referer('adqs-importer-nonce');

            $upload = $this->handle_upload();

            $delimiter = $_POST['delimiter'] ? sanitize_text_field($_POST['delimiter']) : ',';

            if (is_wp_error($upload)) {
            }

            $path = $upload['file'];

            $params = array(
                'step'               => 'map_columns',
                'file'               => str_replace(DIRECTORY_SEPARATOR, '/', $path),
                'delimiter'          => $delimiter,
                'update_existing'    => false,
                '_wpnonce'           => wp_create_nonce('adqs-importer-nonce'),
            );

            wp_redirect(esc_url_raw(add_query_arg($params)));
            exit;
        }
    }


    public function handle_upload()
    {
        $csv_file = (new AdCsvHelper())->handle_csv_upload('adqs_listing', 'import', array());
        return $csv_file;
    }


    public function register_importer()
    {
        add_submenu_page(
            'edit.php?post_type=adqs_directory',
            esc_html__('CSV Import Export Page', 'adirectory'),
            esc_html__('Import / Export', 'adirectory'),
            'manage_options',
            'adqs_export_import',
            array($this, 'csv_export_import')
        );

        add_action('admin_head', function () {
            echo '<style>[href="edit.php?post_type=adqs_directory&page=adqs_export_import"] { display: none !important; }</style>';
        });
    }



    /**
     * CSV Export Import
     *
     * @return string
     */
    public function csv_export_import()
    {
        $importer = new AdListingImporterController();
        $importer->dispatch();
    }
}
