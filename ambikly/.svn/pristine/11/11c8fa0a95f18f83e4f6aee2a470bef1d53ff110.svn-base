<?php

namespace Ambikly\Options;

use Ambikly\Sanitization;
use Ambikly\Validation;

abstract class BaseOptions
{

    public function __construct()
    {


    }

    abstract function getOptions();

    public function sanitize($raw_data = [])
    {

        $sections = $this->getOptions();

        $final_data = [];

        foreach ($sections as $section_id => $settings) {

            foreach ($settings as $setting) {

                $name = $setting['name'] ?? '';

                $type = $setting['type'] ?? '';

                $sanitize = $setting['sanitize'] ?? '';

                $raw_value = $raw_data[$name] ?? '';

                if (isset($raw_data[$name])) {

                    $final_data[$name] = Sanitization::sanitize($raw_value, $type, $sanitize);

                } else {
                    $final_data[$name] = "";
                }
            }
        }
        return $final_data;
    }

    public function validate($data)
    {
        $errors = [];

        foreach ($this->getOptions() as $section) {

            foreach ($section as $field) {

                $name = $field['name'];

                $rules = $field['validation'] ?? [];

                $value = $data[$name] ?? '';

                $error_for_field = Validation::validate($name, $value, $rules);

                if (isset($error_for_field[$name])) {

                    $errors[$name] = $error_for_field[$name];
                }
            }
        }

        return $errors;
    }
}