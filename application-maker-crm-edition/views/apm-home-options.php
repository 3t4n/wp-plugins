
<?php
$alert = "";
if (isset($_REQUEST['submit'])) {

    foreach ($oThis->applications[$appName]['option_sections'] as $option_section) {
        foreach ($option_section['fields'] as $key => $option_field) {
            if (isset($_REQUEST[$key])) {
                update_option($key, $_REQUEST[$key]);
            } else {
                if (is_array($option_field)) {
                    $label = $option_field[0];
                    $field_type = $option_field[1];
                    if ($field_type == 'checkbox') {
                        update_option($key, false);
                    }
                }
            }
        }
    }

    $alert = 'Options updated.';
}
?>
<div class="apm_full_width_list">

    <form method="post" action="">
<?php
echo $alert;
foreach ($oThis->applications[$appName]['option_sections'] as $option_section) {
    echo "<h3>" . $option_section['section_label'] . "</h3>";
    echo "<p>" . $option_section['section_description'] . "</p>";
    echo "<ul>";
    $default_value = '';
    foreach ($option_section['fields'] as $key => $option_field) {
        if (is_array($option_field)) {
            $label = $option_field[0];
            $field_type = $option_field[1];
            if ($field_type == '') {
                $field_type = 'text';
            }
            if (count($option_field) > 2) {
                $default_value = $option_field[2];
            }
        } else {
            $label = $option_field;
            $field_type = 'text';
        }
        echo "<li><label>" . $label . ": </label>";
        switch ($field_type) {

         
            case "text":
                $val = stripslashes(esc_attr(get_option($key)));
                if ($val == '') {
                    $val = $default_value;
                }
                echo "<input name='" . $key . "' type='text' class='code' value='" . $val . "' size='60' /> </li>";
                break;
            case "textarea":
                $val = stripslashes(esc_attr(get_option($key)));
                if ($val == '') {
                    $val = $default_value;
                }
                echo "<textarea name='" . $key . "' class='code' style='width:100%; height:200px;' >" . $val . "</textarea> </li>";
                break;
            case "checkbox":
                //echo ((get_option($key))).'//';
                $checked = '';
                if ((get_option($key)) !== false) {
                    $checked = ' checked="checked" ';
                }
                echo '<input type="checkbox" name="' . $key . '"  ' . $checked . ' /></li>';
                break;
        }
    }
    echo "</ul>";
}
?>

        <p class="submit"><input type="submit" name="submit" value="<?php esc_html_e('Update Settings &raquo;', 'cud') ?>" /></p>
    </form>
</div>
