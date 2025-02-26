<?php
if (! defined('ABSPATH')) exit; // Exit if accessed directly

if (! class_exists('GFForms'))
    die();

class ADTF_Field extends GF_Field {
    public $type = 'ad_date_time';

    public function get_form_editor_field_title() {
        return (esc_attr__('Advanced Date Time', 'advanced-date-time-field'));
    }

    public function get_form_editor_field_settings() {
        return array(
            'conditional_logic_field_setting',
            'prepopulate_field_setting',
            'error_message_setting',
            'label_setting',
            'adtf_format',
            'adtf_all_options',
            'adtf_type',
            'admin_label_setting',
            'rules_setting',
            'duplicate_setting',
            'description_setting',
            'css_class_setting',
        );
    }

    public function is_conditional_logic_supported() {
        return true;
    }

    public function get_field_input($form, $value = '', $entry = null) {

        $is_entry_detail = $this->is_entry_detail();
        $is_form_editor  = $this->is_form_editor();
        $is_admin        = $is_entry_detail || $is_form_editor;

        $form_id  = $form['id'];
        $id       = intval($this->id);
        $field_id = $is_admin || $form_id == 0  ? "input_$id" : 'input_' . $form_id . "_$id";

        $size          = $this->size;
        $disabled_text = $is_form_editor ? "disabled='disabled'" : '';
        $class_suffix  = $is_entry_detail ? '_admin' : '';
        $class         = $this->type . ' ' . $size . $class_suffix;
        $invalid_attribute  = $this->failed_validation ? 'aria-invalid="true"' : 'aria-invalid="false"';

        $input = '<div class="ginput_container ginput_container_ad_date_time flatpickr">';
        $input .= '<input type="text" name="input_' . $id . '" id="' . $field_id . '" value="' . esc_attr($value) . '" class="' . $class . '" ' . $disabled_text . ' ' . $invalid_attribute . '/>';
        $input .= '</div>';

        return $input;
    }
}


GF_Fields::register(new ADTF_Field());
