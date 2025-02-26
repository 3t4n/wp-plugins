<?php

if (! defined('ABSPATH')) exit; // Exit if accessed directly

if (!class_exists('GFForms'))
    die();

class ADTF_Editor {
    public function __construct() {
        if (! is_admin()) {
            return;
        }

        add_filter('gform_field_settings_tabs', array($this, 'fields_settings_tab'), 10, 2);
        add_action('gform_field_settings_tab_content_adtf_tab', array($this, 'fields_settings_tab_content'), 10, 2);
    }

    public function fields_settings_tab($tabs, $form) {
        $tabs[] = array(
            // Define the unique ID for your tab.
            'id'             => 'adtf_tab',
            // Define the title to be displayed on the toggle button your tab.
            'title'          => 'Date Time Field',
            // Define an array of classes to be added to the toggle button for your tab.
            'toggle_classes' => array('adtf_toggle_1', 'adtf_toggle_2'),
            // Define an array of classes to be added to the body of your tab.
            'body_classes'   => array('adtf_toggle_class'),
        );
        return $tabs;
    }

    public function fields_settings_tab_content($form) {
?>
        <li class="adtf_all_options field_setting">
            <ul>
                <li class="field_setting adtf_type">
                    <label for="adtf_type" class="inline">
                        <?php esc_html_e('Date / Time Type', 'advanced-date-time-field'); ?>
                        <?php gform_tooltip("pcrs_type"); ?>
                    </label>
                    <select name="adtf_type" id="adtf_type" class="adtf_type" onchange="SetFieldProperty( 'adtf_Type', jQuery( this ).val() );">
                        <option value="date">Date Picker</option>
                        <option value="time">Time Picker</option>
                        <option value="both">Date & Time Picker</option>
                    </select>
                </li>
                <li class="adtf_format field_setting">
                    <label for="adtf_format" class="inline">
                        <?php esc_html_e('Date Format', 'advanced-date-time-field'); ?>
                        <?php gform_tooltip("pcrs_type"); ?>
                    </label>
                    <select name="adtf_format" id="adtf_format" class="adtf_format" onchange="SetFieldProperty( 'adtf_Format', jQuery( this ).val() );">
                        <option value="mdy">mm/dd/yyyy</option>
                        <option value="dmy">dd/mm/yyyy</option>
                        <option value="ymd">yyyy/mm/dd</option>
                        <option value="ymdt">dd/mm/yyyy at H:i</option>
                    </select>
                </li>
            </ul>
        </li>
<?php
    }
}

new ADTF_Editor();
