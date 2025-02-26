<?php

if (! defined('ABSPATH')) exit; // Exit if accessed directly

GFForms::include_addon_framework();

class ADTF_Addon extends GFAddOn {

    protected $_version = ADTF_VERSION;
    protected $_min_gravityforms_version = '1.9';
    protected $_slug = 'gf-date-time-field';
    protected $_path = 'advanced-date-time-field/date-time-field.php';
    protected $_full_path = __FILE__;
    protected $_title = 'Date Time Field';
    protected $_short_title = 'Date Time Field';

    private static $_instance = null;

    /**
     * Get an instance of this class.
     *
     * @return ADTF_Addon
     */
    public static function get_instance() {
        if (self::$_instance == null) {
            self::$_instance = new ADTF_Addon();
        }

        return self::$_instance;
    }

    public function init() {
        parent::init();

        add_action('gform_editor_js_set_default_values', array($this, 'set_defaults_js_value'));
        add_filter('gform_register_init_scripts', array($this, 'add_init_script'), 10, 2);
    }

    /**
     * Return the scripts which should be enqueued.
     *
     * @return array
     */
    public function scripts() {
        $scripts = array(
            array(
                'handle'  => 'adtf_flatpickr',
                'src'     => $this->get_base_url() . '/../assets/js/flatpickr.min.js',
                'version' => $this->_version,
                'deps'    => array('jquery'),
                'enqueue'  => array(
                    array('field_types' => array('ad_date_time'))
                )
            ),
            array(
                'handle'  => 'adtf_active',
                'src'     => $this->get_base_url() . '/../assets/js/dtf-active.js',
                'version' => $this->_version,
                'deps'    => array('adtf_flatpickr'),
                'enqueue'  => array(
                    array('field_types' => array('ad_date_time')),
                )
            ),
            array(
                'handle'  => 'adtf_editor',
                'src'     => $this->get_base_url() . '/../assets/js/dtf-editor.js',
                'version' => time(),
                'deps'    => array('jquery'),
                'enqueue'  => array(
                    array('admin_page' => array('form_editor')),
                )
            )
        );

        return array_merge(parent::scripts(), $scripts);
    }

    public function styles() {
        $styles = array(
            array(
                'handle'  => 'adtf_flatpickr',
                'src'     => $this->get_base_url() . '/../assets/css/flatpickr.min.css',
                'version' => $this->_version,
                'enqueue' => array(
                    array('field_types' => array('ad_date_time'))
                )
            ),
            array(
                'handle'  => 'adtf_active',
                'src'     => $this->get_base_url() . '/../assets/css/dtf-active.css',
                'version' => $this->_version,
                'enqueue' => array(
                    array('field_types' => array('ad_date_time'))
                )
            )
        );

        return array_merge(parent::styles(), $styles);
    }

    public function add_init_script($form) {
        $date_time_fields = $this->get_ad_date_time_fields($form);

        require_once(GFCommon::get_base_path() . '/form_display.php');

        foreach ($date_time_fields as $field) {
            $form_id = $field['formId'];
            $id      = $field['id'];

            $args = [
                'formId'            =>  $form_id,
                'fieldId'           =>  $id,
                'inputId'           =>  '#input_' . $form_id . '_' . $id,
                'format'            =>  $field->adtf_Format ?? false,
                'type'              =>  $field->adtf_Type ?? false,
                'icon'              =>  $field->adtf_Icon ?? false
            ];

            $slug   = "adtf_field_{$form_id}_{$id}";
            $script = 'window.' . $slug . ' = new ADTF_Field( ' . wp_json_encode($args) . ' );';

            GFFormDisplay::add_init_script($form_id, $slug, GFFormDisplay::ON_PAGE_RENDER, $script);
        }
    }

    public function get_ad_date_time_fields($form) {
        if (empty($form['fields'])) {
            return array();
        }

        $fields = array();

        foreach ($form['fields'] as $field) {
            if ($this->is_adtf_field($field)) {
                $fields[] = $field;
            }
        }

        return $fields;
    }

    public function is_adtf_field($field) {
        return rgar($field, 'type') === 'ad_date_time';
    }

    public function set_defaults_js_value() {
?>
        case "ad_date_time" :
        field.label = "Date Time";
        field.adtf_Format = "mdy";
        field.adtf_Type = "date";
        break;

<?php
    }
}
