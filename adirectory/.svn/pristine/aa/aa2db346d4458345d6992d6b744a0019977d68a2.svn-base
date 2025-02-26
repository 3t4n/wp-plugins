<?php

namespace  ADQS_Directory\Admin\Importer;

class AdListingImporterController
{
    protected $file = '';

    protected $steps = [];

    protected $step = '';

    protected $errors = [];

    protected $ismultidirectory = false;

    protected $currentdirectory = null;

    protected $submission_fields = [];

    protected $delimiter = ',';

    protected $map_prefrence = false;

    protected $update_existing = false;

    protected $sample = [];


    protected $chracter_set = 'UTF-8';

    public function __construct()
    {
        $default_steps = array(
            'upload' => array(
                'name' => 'Upload File',
                'view' => array($this, 'upload_view'),
                'handler' => '',
            ),
            'map_columns' => array(
                'name' => 'Map Columns',
                'view' => array($this, 'map_columns'),
                'handler' => '',
            ),
        );

        $this->steps = apply_filters('adqs_importer_steps', $default_steps);
        $this->step = isset($_REQUEST['step']) ? sanitize_key($_REQUEST['step']) : current(array_keys($this->steps));
        $this->file = isset($_REQUEST['file']) ? wp_unslash($_REQUEST['file']) : '';
        $this->delimiter = isset($_REQUEST['delimiter']) ? wp_unslash($_REQUEST['delimiter']) : ',';
        $this->map_prefrence = isset($_REQUEST['map_prefrence']) ? (bool)$_REQUEST['map_prefrence']  : false;
        $this->update_existing = isset($_REQUEST['update_existing']) ? (bool)$_REQUEST['update_existing']  : false;
        $this->chracter_set = isset($_REQUEST['chracter_set']) ? wp_unslash($_REQUEST['chracter_set']) : 'UTF-8';
        if (count(adqs_get_directory_types_available()) > 1) {
            $this->ismultidirectory = true;
            $this->currentdirectory = adqs_get_directory_types_available();
        } else {
            $this->currentdirectory = current(adqs_get_directory_types_available());

            $termsobj = get_term_meta($this->currentdirectory['id'], 'adqs_metafields_types', true);

            $this->submission_fields = AdCsvHelper::generate_submission_fields($this->currentdirectory['id']);
        }
    }

    public function upload_view()
    {
        include dirname(__FILE__) . '/views/upload-view.php';
    }

    public function map_columns()
    {
        check_admin_referer('adqs-importer-nonce');

        $headers = [];
        $sample_value = [];
        if (($handle = fopen($this->file, 'r')) !== false) {
            $headers = fgetcsv($handle, 0, $this->delimiter);
            $sample_value = fgetcsv($handle, 1000, $this->delimiter);
            fclose($handle);

            if ($headers === false || $sample_value === false) {
                wp_die(__('Error: The file delimiter does not match the expected value.', 'text-domain'), __('Invalid Delimiter', 'text-domain'), [
                    'response' => 400,
                ]);
            }
        }


        foreach ($headers as $key => $value) {
            $this->sample[$value] = $sample_value[$key] ?? '';
        }

        include dirname(__FILE__) . '/views/mapping-column.php';
    }

    public function import()
    {

        include dirname(__FILE__) . '/views/import-progress.php';
    }

    public function complete()
    {
        include dirname(__FILE__) . '/views/complete.php';
    }


    public function dispatch()
    {
        $output = '';

        try {
            ob_start();

            if (is_callable($this->steps[$this->step]['view'])) {
                call_user_func($this->steps[$this->step]['view'], $this);
            }

            $output = ob_get_clean();
        } catch (\Exception $e) {
            $this->errors[] = $e->getMessage();
        }

        $this->output_header();

        $this->output_steps();

        //$this->output_errors();

        echo $output;

        $this->output_footer();
    }


    public function output_header()
    {
        include dirname(__FILE__) . '/views/import-header.php';
    }

    public function output_footer()
    {
        include dirname(__FILE__) . '/views/import-footer.php';
    }
    public function output_steps()
    {
        include dirname(__FILE__) . '/views/import-steps.php';
    }

    public function output_errors()
    {
        if (empty($this->errors)) {
            return;
        }
    }
}
