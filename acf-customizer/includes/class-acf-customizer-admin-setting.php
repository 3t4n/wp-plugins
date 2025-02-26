<?php

class acf_customizer_admin_setting {
    public static $location = 'customizer';
    function  __construct()
    {
        add_filter('acf/location/rule_types', array($this, 'registerRules'));

        add_filter('acf/render_field', array($this, 'add_value_fields'), 999, 1);
        add_filter('acf/field_group/render_field', array($this, 'add_value_fields'), 999, 1);
    }

    public function registerRules($choices) {
        $choices['Forms'][self::$location] = 'Customizer';
        return $choices;
    }

    public function add_value_fields( $field ) {
        return $field;
    }
}


new acf_customizer_admin_setting();