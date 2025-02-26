<?php

$alert = "";
if (isset($_REQUEST['dosubmit']) and $_REQUEST['dosubmit'] == 'dosubmit') {

    foreach ($oThis->applications[$appName]['option_sections'] as $option_section) {
        foreach ($option_section['fields'] as $key => $option_field) {
            if (isset($_REQUEST[$key])) {
                update_option($key, $_REQUEST[$key]);
                if (is_array($option_field)) {
                    $label = $option_field[0];
                    $field_type = $option_field[1];
                    if ($field_type == 'checkbox') {
                        update_option($key, 'on');
                    }
                }
            } else {
                if (is_array($option_field)) {
                    $label = $option_field[0];
                    $field_type = $option_field[1];
                    if ($field_type == 'checkbox') {
                        update_option($key, 'off');
                    }
                }
            }
        }
    }
    $alert = 'Settings updated.';
}
?>
