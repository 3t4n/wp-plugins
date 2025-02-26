<?php

namespace Ambikly\Controllers;

use Ambikly\Repository\SettingsRepository;
use Ambikly\Sanitization;
use Ambikly\Validation;

class SettingsController extends BaseController
{

    public function __construct()
    {
        /**
         * @property SettingsRepository $repository
         */
        $this->repository = ambikly()->getClass('Repository.SettingsRepository');

    }

    public function sanitize($raw_data = [], $sections = [])
    {

        $final_data = [];

        foreach ($sections as $section_id => $settings) {

            foreach ($settings as $setting) {

                $name = $setting['name'] ?? '';

                if ($name == '') {
                    continue;
                }

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

    public function validate($data, $sections)
    {
        $errors = [];

        foreach ($sections as $section) {

            foreach ($section as $field) {

                $name = $field['name'] ?? '';

                if ($name == '') {
                    continue;
                }

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

    public function update($sanitized_data)
    {

        foreach ($sanitized_data as $name => $value) {

            $this->repository->update($name, $value);
        }

        return true;
    }

    public function getAllSettings()
    {
        $all_settings = $this->repository->getAllSettings();

        $this->repository->getAllSettings();

        $formattedArray = [];

        foreach ($all_settings as $item) {

            $formattedArray[$item['option_name']] = maybe_unserialize($item['option_value']);
        }

        return $formattedArray;
    }
}