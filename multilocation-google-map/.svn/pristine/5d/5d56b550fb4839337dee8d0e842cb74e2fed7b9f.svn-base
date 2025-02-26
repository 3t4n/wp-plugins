<?php
function mgm_settings_init()   {
    //SECTION
    add_settings_section(
        'google_map_section_developers',
        __('Set your displaying map options.', 'google_map'),
        'mgm_google_map_section_developers_cb',
        'google_map'
    );

    //FIELDS
    add_settings_field(
        'map_key_field_pill',
        __('Google key', 'google_map'),
        'mgm_map_key_field_pill_cb',
        'google_map',
        'google_map_section_developers',
        [
            'label_for' => 'map_key_field_pill',
            'class' => 'map_key_row',
            'map_key_custom_data' => 'custom',
        ]
    );

    add_settings_field(
        'map_lat_field_pill',
        __('Lat', 'google_map'),
        'mgm_map_lat_field_pill_cb',
        'google_map',
        'google_map_section_developers',
        [
            'label_for' => 'map_lat_field_pill',
            'class' => 'map_lat_row',
            'map_lat_custom_data' => 'custom',
        ]
    );

    add_settings_field(
        'map_lng_field_pill',
        __('Lng', 'google_map'),
        'mgm_map_lng_field_pill_cb',
        'google_map',
        'google_map_section_developers',
        [
            'label_for' => 'map_lng_field_pill',
            'class' => 'map_lng_row',
            'map_lng_custom_data' => 'custom',
        ]
    );

    add_settings_field(
        'map_zoom_field_pill',
        __('Zoom', 'google_map'),
        'mgm_map_zoom_field_pill_cb',
        'google_map',
        'google_map_section_developers',
        [
            'label_for' => 'map_zoom_field_pill',
            'class' => 'map_zoom_row',
            'map_zoom_custom_data' => 'custom',
        ]
    );

    add_settings_field(
        'map_type_field_pill',
        __('Map Type', 'google_map'),
        'mgm_map_type_field_pill_cb',
        'google_map',
        'google_map_section_developers',
        [
            'label_for' => 'map_type_field_pill',
            'class' => 'map_type_row',
            'map_type_custom_data' => 'custom',
        ]
    );

    add_settings_field(
        'map_scrollwheel_field_pill',
        __('Scrollwheel', 'google_map'),
        'mgm_map_scrollwheel_field_pill_cb',
        'google_map',
        'google_map_section_developers',
        [
            'label_for' => 'map_scrollwheel_field_pill',
            'class' => 'map_scrollwheel_row',
            'map_scrollwheel_custom_data' => 'custom',
        ]
    );

    add_settings_field(
        'map_draggable_field_pill',
        __('Draggable', 'google_map'),
        'mgm_map_draggable_field_pill_cb',
        'google_map',
        'google_map_section_developers',
        [
            'label_for' => 'map_draggable_field_pill',
            'class' => 'map_draggable_row',
            'map_draggable_custom_data' => 'custom',
        ]
    );

    add_settings_field(
        'map_zoomcontrol_field_pill',
        __('Zoomcontrol', 'google_map'),
        'mgm_map_zoomcontrol_field_pill_cb',
        'google_map',
        'google_map_section_developers',
        [
            'label_for' => 'map_zoomcontrol_field_pill',
            'class' => 'map_zoomcontrol_row',
            'map_zoomcontrol_custom_data' => 'custom',
        ]
    );

    add_settings_field(
        'map_marker_click_zoom_field_pill',
        __('On marker click zoom', 'google_map'),
        'mgm_map_marker_click_zoom_field_pill_cb',
        'google_map',
        'google_map_section_developers',
        [
            'label_for' => 'map_marker_click_zoom_field_pill',
            'class' => 'map_marker_click_zoom_row',
            'map_marker_click_zoom_custom_data' => 'custom',
        ]
    );

    add_settings_field(
        'upload_pointer_image_field_pill',
        __('Select marker image', 'google_map'),
        'mgm_upload_pointer_image_field_pill_cb',
        'google_map',
        'google_map_section_developers',
        [
            'label_for' => 'upload_pointer_image_field_pill',
            'class' => 'upload_pointer_image_row',
            'upload_pointer_image_custom_data' => 'custom',
        ]
    );

    //REGISTER OPTIONS FOR EACH FIELD
    register_setting('google_map', 'mgm_map_key_options');
    register_setting('google_map', 'mgm_map_lat_options');
    register_setting('google_map', 'mgm_map_lng_options');
    register_setting('google_map', 'mgm_map_zoom_options');
    register_setting('google_map', 'mgm_map_type_options');
    register_setting('google_map', 'mgm_map_scrollwheel_options');
    register_setting('google_map', 'mgm_map_draggable_options');
    register_setting('google_map', 'mgm_map_zoomcontrol_options');
    register_setting('google_map', 'mgm_map_marker_click_zoom_options');
    register_setting('google_map', 'mgm_upload_pointer_image_options');


}
/**
 * register our map_zoom_settings_init to the admin_init action hook
 */
add_action('admin_init', 'mgm_settings_init');

/**
 * custom option and settings:
 * callback functions
 */

//SETTINGS SECTION CALLBACK FUNCTION
function mgm_google_map_section_developers_cb($args)    {
    //echo "Please set map options";
}

//SETTING FIELDS CALLBACK FUNCTIONS

function mgm_map_key_field_pill_cb($args)  {
    $options = get_option('mgm_map_key_options');
    ?>
    <input type="text" style="width: 50%;" step="any" id="<?php echo esc_attr($args['label_for']); ?>"
           data-custom="<?php echo esc_attr($args['map_key_custom_data']); ?>"
           name="mgm_map_key_options[<?php echo esc_attr($args['label_for']); ?>]"
           value="<?php echo $options['map_key_field_pill']; ?>"/>
    <p>Enter your Google key. (In order to create Google map you need to get API Key from Google.)</p>
    <?php
}

function mgm_map_lat_field_pill_cb($args)  {
    $options = get_option('mgm_map_lat_options');
    ?>
    <input type="number" step="any" id="<?php echo esc_attr($args['label_for']); ?>"
           data-custom="<?php echo esc_attr($args['map_lat_custom_data']); ?>"
           name="mgm_map_lat_options[<?php echo esc_attr($args['label_for']); ?>]"
           value="<?php echo $options['map_lat_field_pill']; ?>"/>
    <p>Enter your latitude GPS coordinates.</p>
    <?php
    if(!empty($options['map_lat_field_pill']))  {
        if(preg_match("/[a-z]/i", $options['map_lat_field_pill'])){
            echo '<div style="padding-top: 5px;font-size: 18px;color: red;">Must be number/ float!</div>';
        }
    }
}

function mgm_map_lng_field_pill_cb($args)  {
    $options = get_option('mgm_map_lng_options');
    ?>
    <input type="number" step="any" id="<?php echo esc_attr($args['label_for']); ?>"
           data-custom="<?php echo esc_attr($args['map_lng_custom_data']); ?>"
           name="mgm_map_lng_options[<?php echo esc_attr($args['label_for']); ?>]"
           value="<?php echo $options['map_lng_field_pill']; ?>"/>
    <p>Enter your longitude GPS coordinates.</p>
    <?php
    if(!empty($options['map_lng_field_pill']))  {
        if(preg_match("/[a-z]/i", $options['map_lng_field_pill'])){
            echo '<div style="padding-top: 5px;font-size: 18px;color: red;">Must be number/ float!</div>';
        }
    }
}

function mgm_map_zoom_field_pill_cb($args)  {
    $options = get_option('mgm_map_zoom_options');
    ?>
    <select id="<?php echo esc_attr($args['label_for']); ?>"
            data-custom="<?php echo esc_attr($args['map_zoom_custom_data']); ?>"
            name="mgm_map_zoom_options[<?php echo esc_attr($args['label_for']); ?>]">
        <?php
        for($i = 1; $i <= 20; $i+=1)    {
            ?>
            <option value="<?php echo $i; ?>" <?php echo isset($options[$args['label_for']]) ? (selected($options[$args['label_for']], $i, false)) : (''); ?>>
                <?php esc_html_e($i, 'google_map'); ?>
            </option>
            <?php
        } ?>
    </select>
    <?php
}

function mgm_map_type_field_pill_cb($args)  {
    $options = get_option('mgm_map_type_options');
    ?>
    <select id="<?php echo esc_attr($args['label_for']); ?>"
            data-custom="<?php echo esc_attr($args['map_type_custom_data']); ?>"
            name="mgm_map_type_options[<?php echo esc_attr($args['label_for']); ?>]">
        <?php
        $map_types_arr = ['roadmap', 'satellite', 'hybrid', 'terrain'];
        for($i = 0; $i < sizeof($map_types_arr); $i+=1)    {
            ?>
            <option value="<?php echo $map_types_arr[$i]; ?>" <?php echo isset($options[$args['label_for']]) ? (selected($options[$args['label_for']], $map_types_arr[$i], false)) : (''); ?>>
                <?php esc_html_e($map_types_arr[$i], 'google_map'); ?>
            </option>
            <?php
        } ?>
    </select>
    <?php
}

function mgm_map_scrollwheel_field_pill_cb($args)  {
    $options = get_option('mgm_map_scrollwheel_options');
    ?>
    <select id="<?php echo esc_attr($args['label_for']); ?>"
            data-custom="<?php echo esc_attr($args['map_scrollwheel_custom_data']); ?>"
            name="mgm_map_scrollwheel_options[<?php echo esc_attr($args['label_for']); ?>]">
        <?php
        $map_scrollwheel_arr = ['true' => "yes", 'false' => "no"];
        foreach ($map_scrollwheel_arr  as $key => $value) {
            ?>
            <option value="<?php echo $key; ?>" <?php echo isset($options[$args['label_for']]) ? (selected($options[$args['label_for']], $key, false)) : (''); ?>>
                <?php esc_html_e($value, 'google_map'); ?>
            </option>
            <?php
        } ?>
    </select>
    <?php
}

function mgm_map_draggable_field_pill_cb($args)  {
    $options = get_option('mgm_map_draggable_options');
    ?>
    <select id="<?php echo esc_attr($args['label_for']); ?>"
            data-custom="<?php echo esc_attr($args['map_draggable_custom_data']); ?>"
            name="mgm_map_draggable_options[<?php echo esc_attr($args['label_for']); ?>]">
        <?php
        $map_draggable_arr = ['true' => "yes", 'false' => "no"];
        foreach ($map_draggable_arr  as $key => $value) {
            ?>
            <option value="<?php echo $key; ?>" <?php echo isset($options[$args['label_for']]) ? (selected($options[$args['label_for']], $key, false)) : (''); ?>>
                <?php esc_html_e($value, 'google_map'); ?>
            </option>
            <?php
        } ?>
    </select>
    <?php
}

function mgm_map_zoomcontrol_field_pill_cb($args)  {
    $options = get_option('mgm_map_zoomcontrol_options');
    ?>
    <select id="<?php echo esc_attr($args['label_for']); ?>"
            data-custom="<?php echo esc_attr($args['map_zoomcontrol_custom_data']); ?>"
            name="mgm_map_zoomcontrol_options[<?php echo esc_attr($args['label_for']); ?>]">
        <?php
        $map_zoomcontrol_arr = ['true' => "yes", 'false' => "no"];
        foreach ($map_zoomcontrol_arr  as $key => $value) {
            ?>
            <option value="<?php echo $key; ?>" <?php echo isset($options[$args['label_for']]) ? (selected($options[$args['label_for']], $key, false)) : (''); ?>>
                <?php esc_html_e($value, 'google_map'); ?>
            </option>
            <?php
        } ?>
    </select>
    <?php
}

function mgm_map_marker_click_zoom_field_pill_cb($args)  {
    $options = get_option('mgm_map_marker_click_zoom_options');
    ?>
    <select id="<?php echo esc_attr($args['label_for']); ?>"
            data-custom="<?php echo esc_attr($args['map_marker_click_zoom_custom_data']); ?>"
            name="mgm_map_marker_click_zoom_options[<?php echo esc_attr($args['label_for']); ?>]">
        <?php
        for($i = 1; $i <= 20; $i+=1)    {
            ?>
            <option value="<?php echo $i; ?>" <?php echo isset($options[$args['label_for']]) ? (selected($options[$args['label_for']], $i, false)) : (''); ?>>
                <?php esc_html_e($i, 'google_map'); ?>
            </option>
            <?php
        } ?>
    </select>
    <?php
}

function mgm_upload_pointer_image_field_pill_cb($args){
    $options = get_option('mgm_upload_pointer_image_options');
    wp_enqueue_media();
    ?>
    <div>
        <input type="text" name="mgm_upload_pointer_image_options[<?php echo esc_attr($args['label_for']); ?>]" id="image_url" class="regular-text" value="<?php echo $options['upload_pointer_image_field_pill']; ?>">
        <input type="button" name="upload-btn" id="upload-btn" class="button-secondary" value="Upload Image">
    </div>
    <script type="text/javascript">
        jQuery(document).ready(function ($) {
            $('#upload-btn').click(function (e) {
                e.preventDefault();
                var image = wp.media({
                    title: 'Upload Image',
                    // mutiple: true if you want to upload multiple files at once
                    multiple: false
                }).open()
                    .on('select', function (e) {
                        // This will return the selected image from the Media Uploader, the result is an object
                        var uploaded_image = image.state().get('selection').first();
                        // We convert uploaded_image to a JSON object to make accessing it easier
                        var image_url = uploaded_image.toJSON().url;
                        // Let's assign the url value to the input field
                        $('#image_url').val(image_url);
                    });
            });
        });
    </script>
    <?php
}


//SETTING FIELDS CALLBACK FUNCTIONS - END
//SEND DATA TO JS
function mgm_get_multilocation_map_options()    {
    if(!is_admin()) {
        $multilocation_map_empty_options_error_msg = false;
        if(get_option('mgm_map_key_options')['map_key_field_pill'] == null) {
            $multilocation_map_empty_options_error_msg = true;
        }else {
            echo "<script>
                        var multilocation_google_map_api_key = '" . get_option('mgm_map_key_options')['map_key_field_pill'] . "';
                    </script>";
        }
        if(get_option('mgm_map_lat_options')['map_lat_field_pill'] == null) {
            $multilocation_map_empty_options_error_msg = true;
        }else if(get_option('mgm_map_lng_options')['map_lng_field_pill'] == null) {
            $multilocation_map_empty_options_error_msg = true;
        }else if(get_option('mgm_map_zoom_options')['map_zoom_field_pill'] == null) {
            $multilocation_map_empty_options_error_msg = true;
        }else if(get_option('mgm_map_marker_click_zoom_options')['map_marker_click_zoom_field_pill'] == null) {
            $multilocation_map_empty_options_error_msg = true;
        }else if(get_option('mgm_map_type_options')['map_type_field_pill'] == null) {
            $multilocation_map_empty_options_error_msg = true;
        }else if(get_option('mgm_map_scrollwheel_options')['map_scrollwheel_field_pill'] == null) {
            $multilocation_map_empty_options_error_msg = true;
        }else if(get_option('mgm_map_zoomcontrol_options')['map_zoomcontrol_field_pill'] == null) {
            $multilocation_map_empty_options_error_msg = true;
        }else if(get_option('mgm_map_draggable_options')['map_draggable_field_pill'] == null) {
            $multilocation_map_empty_options_error_msg = true;
        }else if($multilocation_map_empty_options_error_msg == false)   {
            echo "<script>
                    var multilocation_map_options_error_msg = false;
                    if(typeof(" . get_option('mgm_map_lat_options')['map_lat_field_pill'] . ") != 'number') {
                        multilocation_map_options_error_msg = true;
                    }else if(typeof(" . get_option('mgm_map_lng_options')['map_lng_field_pill'] . ") != 'number')  {
                        multilocation_map_options_error_msg = true;
                    }else if(typeof(" . get_option('mgm_map_zoom_options')['map_zoom_field_pill'] . ")  != 'number')  {
                        multilocation_map_options_error_msg = true;
                    }else if(typeof(" . get_option('mgm_map_marker_click_zoom_options')['map_marker_click_zoom_field_pill'] . ") != 'number')  {
                        multilocation_map_options_error_msg = true;
                    }else if('" . get_option('mgm_map_type_options')['map_type_field_pill'] . "' != 'roadmap' && 
                    '" . get_option('mgm_map_type_options')['map_type_field_pill'] . "' != 'satellite' && 
                    '" . get_option('mgm_map_type_options')['map_type_field_pill'] . "' != 'hybrid' && 
                    '" . get_option('mgm_map_type_options')['map_type_field_pill'] . "' != 'terrain') {
                        multilocation_map_options_error_msg = true;
                    }else if(" . get_option('mgm_map_scrollwheel_options')['map_scrollwheel_field_pill'] . " != true &&
                    " . get_option('mgm_map_scrollwheel_options')['map_scrollwheel_field_pill'] . " != false)   {
                        multilocation_map_options_error_msg = true;
                    }else if(" . get_option('mgm_map_draggable_options')['map_draggable_field_pill'] . " != true &&
                    " . get_option('mgm_map_draggable_options')['map_draggable_field_pill'] . " != false)   {
                        multilocation_map_options_error_msg = true;
                    }else if(" . get_option('mgm_map_zoomcontrol_options')['map_zoomcontrol_field_pill'] . " != true &&
                    " . get_option('mgm_map_zoomcontrol_options')['map_zoomcontrol_field_pill'] . " != false)   {
                        multilocation_map_options_error_msg = true;
                    }else if(multilocation_map_options_error_msg == false)  {
                        var mgm_multilocation_map_options = {
                            'mgm_map_lat_data' : " . get_option('mgm_map_lat_options')['map_lat_field_pill'] . ",
                            'mgm_map_lng_data' : " . get_option('mgm_map_lng_options')['map_lng_field_pill'] . ",
                            'mgm_map_zoom_data' : " . get_option('mgm_map_zoom_options')['map_zoom_field_pill'] . ",
                            'mgm_map_type_data' : '" . get_option('mgm_map_type_options')['map_type_field_pill'] . "',
                            'mgm_map_scrollwheel_data' : " . get_option('mgm_map_scrollwheel_options')['map_scrollwheel_field_pill'] . ",
                            'mgm_map_draggable_data' : " . get_option('mgm_map_draggable_options')['map_draggable_field_pill'] . ",
                            'mgm_map_zoomcontrol_data' : " . get_option('mgm_map_zoomcontrol_options')['map_zoomcontrol_field_pill'] . ",
                            'mgm_map_marker_click_zoom_data' : " . get_option('mgm_map_marker_click_zoom_options')['map_marker_click_zoom_field_pill'] . ",
                            'mgm_upload_pointer_image_data' : '" . get_option('mgm_upload_pointer_image_options')['upload_pointer_image_field_pill'] . "'
                        };
                    }
                </script>";
        }
    }
}

add_action('wp_footer', 'mgm_get_multilocation_map_options');

function map_options_page_html()    {
    if (!current_user_can('manage_options')) {
        return;
    }

    if (isset($_GET['settings-updated'])) {
        add_settings_error('map_zoom_messages', 'map_zoom_message', __('Settings Saved', 'google_map'), 'updated');
    }

    settings_errors('map_zoom_messages');
    ?>
    <div class="wrap">
        <h1><?php echo esc_html(get_admin_page_title()); ?></h1>
        <form action="options.php" method="post">
            <?php
            // output security fields for the registered setting "map_zoom"
            settings_fields('google_map');
            // output setting sections and their fields
            // (sections are registered for "map_zoom", each field is registered to a specific section)
            do_settings_sections('google_map');
            // output save settings button
            submit_button('Save Settings');
            ?>
            <div style="font-weight: 600;font-size: 14px;color: #23282d;">Shortcode: &nbsp;[mgm_multilocation_google_map]</div>
        </form>
    </div>
    <?php
}