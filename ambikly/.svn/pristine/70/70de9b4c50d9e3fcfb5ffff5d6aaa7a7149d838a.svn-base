<?php

namespace Ambikly\Forms;

use Ambikly\Sanitization;
use Ambikly\Validation;

abstract class BaseForm
{

    protected $fields = [];

    protected $errors = [];
    protected $submitted_data = [];

    public function __construct()
    {
        $this->initialize_fields();
    }

    abstract protected function initialize_fields();

    public function render_form()
    {
        foreach ($this->fields as $field_name => $field) {
            $this->render_field($field_name, $field);
        }
    }

    protected function render_field($field_name, $field)
    {
        $label = $field['label'] ?? '';

        $type = $field['type'] ?? 'text';

        $placeholder = $field['placeholder'] ?? '';

        $value = '';

        if (isset($this->submitted_data[$field_name])) {

            $value = $this->submitted_data[$field_name];
            
        } else {

            $value = $field['value'] ?? '';
        }


        $options = $field['options'] ?? [];

        $field_class = 'form-group ambikly-form-group ambikly-field-' . esc_attr($field_name);

        $field_class .= isset($field['class']) ? ' ' . $field['class'] : '';

        $attributes = $field['attributes'] ?? [];

        $is_required = in_array('required', $field['validation'] ?? []);

        if ($is_required) {

            $attributes['required'] = 'required';
        }

        $attribute_text = '';

        foreach ($attributes as $key => $attr) {

            $attribute_text .= sprintf(' %s="%s"', esc_attr($key), esc_attr($attr));
        }

        echo sprintf(
            '<div class="%s">',
            esc_attr($field_class)
        );
        echo sprintf(
            '<label for="%s">',
            esc_attr($field_name)
        );
        echo esc_html($label);

        echo $is_required ? '*' : '';

        echo '</label>';

        switch ($type) {

            case "textarea":
                echo sprintf(
                    '<textarea %s name="%s" id="%s" placeholder="%s" value="%s"/>',
                    $attribute_text,
                    esc_attr($field_name),
                    esc_attr($field_name),
                    esc_attr($placeholder),
                    esc_attr($value)
                );
                echo esc_attr($value);
                echo '</textarea>';
                break;
            case "select":
                echo sprintf(
                    '<select %s name="%s" id="%s" placeholder="%s" value="%s"/>',
                    $attribute_text,
                    esc_attr($field_name),
                    esc_attr($field_name),
                    esc_attr($placeholder),
                    esc_attr($value)
                );

                foreach ($options as $option_id => $option_value) {

                    echo sprintf(
                        '<option %s value="%s">',
                        selected($option_id, $value, false),
                        esc_attr($option_id)
                    );

                    echo esc_html($option_value);

                    echo '</option>';
                }
                echo '</select>';

                break;
            default:
                echo sprintf(
                    '<input %s type="%s" name="%s" id="%s" placeholder="%s" value="%s"/>',
                    $attribute_text,
                    esc_attr($type),
                    esc_attr($field_name),
                    esc_attr($field_name),
                    esc_attr($placeholder),
                    esc_attr($value)
                );
        }
        $this->render_error($field_name);

        echo "</div>";
    }

    // Render error message
    protected function render_error($field_name)
    {
        if (isset($this->errors[$field_name])) {
            return "<span class='error'>{$this->errors[$field_name]}</span>";
        }
        return '';
    }

    public function sanitize($raw_data = [])
    {
        foreach ($this->fields as $field_name => $field) {

            $name = $field_name;

            $type = $field['type'] ?? '';

            $sanitize = $field['sanitize'] ?? '';

            $raw_value = $raw_data[$name] ?? '';

            $this->submitted_data[$field_name] = Sanitization::sanitize($raw_value, $type, $sanitize);
        }

        return $this->submitted_data;
    }

    public function validate($submitted_data)
    {

        $this->submitted_data = $submitted_data;

        foreach ($this->fields as $field_name => $field) {

            $label = $field['label'] ? sanitize_text_field($field['label']) : '';

            $name = $field_name;

            $rules = $field['validation'] ?? [];

            $value = $submitted_data[$name] ?? '';

            if ($rules) {

                $error_for_field = Validation::validate($name, $value, $rules, $label);

                if (isset($error_for_field[$name])) {

                    $this->errors[$name] = $error_for_field[$name];
                }
            }
        }
        return ($this->errors);
    }

    // Get form errors
    public function get_errors()
    {
        return $this->errors;
    }

    // Get sanitized data
    public function get_data()
    {
        return $this->submitted_data;
    }
}