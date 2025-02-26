
<?php ?>

<!--h4>Settings for the App <?php echo $appLabel; ?></h4-->
<form method="post" action="" class="settingform">
    <div class="row-fluid">
        <input type="hidden" name='dosubmit' value='dosubmit' />
        <ul class="nav nav-tabs" id="myOptionsTab">
            <?php
            $act = ' class="active" ';
            $sectcount = 0;
            if (count($oThis->applications[$appName]['option_sections']) > 0) {
                foreach ($oThis->applications[$appName]['option_sections'] as $option_section) {
                    echo '<li ' . $act . ' ><a href="#tabid_' . $sectcount . '"data-toggle="tab">' . $option_section['section_label'] . '</a></li>';
                    $act = '';
                    $sectcount++;
                }
            }
            ?>
        </ul>

        <div class="tab-content">
            <?php
            $sectcount = 0;
            $act = 'active';
            if (count($oThis->applications[$appName]['option_sections']) > 0) {
                foreach ($oThis->applications[$appName]['option_sections'] as $option_section) {

                    echo '<div class="' . $act . ' tab-pane settingtabcontent" id="tabid_' . $sectcount . '">';
                    $sectcount++;
                    $act = '';
                    echo "<h5 class=''>" . $option_section['section_label'] . "</h5>";
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
                        echo "<li>
                    <span  class='span3'><label>" . $label . ": </label></span>";
                        switch ($field_type) {
                            case "html":
                                //$val = stripslashes(esc_attr(get_option($key)));
                               // if ($val == '') {
                                    $val = $default_value;
                               // }
                                echo  $val;
                                break;
                            case "text":
                                $val = stripslashes(esc_attr(get_option($key)));
                                if ($val == '') {
                                    $val = $default_value;
                                }
                                echo "<input name='" . $key . "' type='text' class='span9' value='" . $val . "'  /> ";
                                break;
                            case "textarea":
                                $val = stripslashes(esc_attr(get_option($key)));
                                if ($val == '') {
                                    $val = $default_value;
                                }
                                echo "<textarea name='" . $key . "' class='span9' rows='7' >" . $val . "</textarea> ";
                                break;
                            case "select":
                                $val = stripslashes(esc_attr(get_option($key)));
                                if ($val == '') {
                                    $val = $default_value;
                                }
                                echo "<select name='" . $key . "'  class='span9' >";
                                foreach ($option_field[3] as $opt) {
                                    $sel = '';
                                    if ($opt == $val) {

                                        $sel = " selected='selected' ";
                                    }
                                    echo " <option " . $sel . " value='" . $opt . "'>" . $opt . "</option>";
                                }

                                echo "   </select>";
                                break;
                            case "checkbox":
                                $op = get_option($key);
                                $checked = '';
                                if ($op == 'on') {
                                    $checked = ' checked="checked" ';
                                } else if ($op !== 'off') {
                                    if ($op == false or $op == '' or !empty($op)) {
                                        if ($default_value == true) {
                                            $checked = ' checked="checked" ';
                                        }
                                    }
                                }
                                echo '<span  class="span9"><input type="checkbox" name="' . $key . '"  ' . $checked . ' /></span>';
                                break;
                        }
                        if (isset($option_field[4]) and $option_field[4] !== '') {
                            echo "<div class='apm_settings_note'>NOTE: " . $option_field[4] . "</div>";
                        }
                        echo "</li>";
                    }
                    echo "</ul>
            </div>";
                }
            }
            ?>
        </div>
        <span class='btn btn-info do_submit_settings'>Update Settings</span>
    </div>
</form>
