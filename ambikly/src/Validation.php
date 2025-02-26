<?php

namespace Ambikly;

class Validation
{
    private static array $validation_errors = [];

    public static function validate($name, $value = '', $rules = [], $label = ''): array
    {
        self::$validation_errors = [];

        foreach ($rules as $rule) {
            $rule_value = null;

            if (str_contains($rule, ':')) {
                list($rule_name, $rule_value) = explode(':', $rule);
            } else {
                $rule_name = $rule;
            }

            // Check if a validation method exists for the rule
            if (method_exists(__CLASS__, $rule_name)) {
                $error = self::$rule_name($value, $name, $rule_value, $label);
                if ($error) {
                    self::$validation_errors[$name][] = $error;
                }
            }
        }

        return self::$validation_errors;
    }

    public static function required($value, $name, $rule_value, $label)
    {
        if (empty($value)) {
            return $label == '' ? esc_html__('This field is required.', 'ambikly') : sprintf(esc_html__('%s field is required.', 'ambikly'), $label);
        }
        return null;
    }

    public static function max($value, $name, $rule_value, $label)
    {
        if (strlen($value) > (int)$rule_value) {
            return sprintf(esc_html__('Maximum length is %s characters.', 'ambikly'), esc_html($rule_value));
        }
        return null;
    }

    public static function min($value, $name, $rule_value, $label)
    {
        if (strlen($value) < (int)$rule_value) {
            return sprintf(esc_html__('Minimum length is %s characters.', 'ambikly'), esc_html($rule_value));
        }
        return null;
    }

    public static function email($value, $name, $rule_value, $label)
    {
        if (!filter_var($value, FILTER_VALIDATE_EMAIL)) {
            return esc_html__('Please enter a valid email address.', 'ambikly');
        }
        return null;
    }

    public static function regex($value, $name, $rule_value, $label)
    {
        if (!preg_match(trim($rule_value, '/'), $value)) {
            return esc_html__('Invalid format.', 'ambikly');
        }
        return null;
    }
}