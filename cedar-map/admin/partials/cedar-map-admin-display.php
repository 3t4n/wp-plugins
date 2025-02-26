<?php

/**
 * Provide a admin area view for the plugin
 *
 * This file is used to markup the admin-facing aspects of the plugin.
 *
 * @link       sina-abadi-uri
 * @since      1.0.0
 *
 * @package    Cedar_Map
 * @subpackage Cedar_Map/admin/partials
 */
?>

<?php
$options = get_option($this->plugin_name);
$apiKey = !empty($options['api_key']) ? $options['api_key'] : null;
$height = !empty($options['height']) ? $options['height'] : null;
$width = !empty($options['width']) ? $options['width'] : null;
$center_lng = !empty($options['center_lng']) ? $options['center_lng'] : null;
$center_lat = !empty($options['center_lat']) ? $options['center_lat'] : null;
$zoom = !empty($options['zoom']) ? $options['zoom'] : null;
$min_zoom = !empty($options['min_zoom']) ? $options['min_zoom'] : null;
$max_zoom = !empty($options['max_zoom']) ? $options['max_zoom'] : null;
$scroll_wheel_zoom = !empty($options['scroll_wheel_zoom']) ? $options['scroll_wheel_zoom'] : null;
$markers = !empty($options['markers']) ? $options['markers'] : array();

?>

<h1><?php echo esc_html(get_admin_page_title()) ?></h1>
<hr/>
<div>
    <form class="main-form" method="post" name="cedar_map_options" action="options.php">
        <?php
        settings_fields($this->plugin_name);
        do_settings_sections($this->plugin_name);
        ?>


        <div class="main-form__group required">
            <label class="main-form__label" for="api_key">API Key</label>
            <input type="text" class="main-form__input"
                   id="<?php echo $this->plugin_name ?>-api_key"
                   name="<?php echo $this->plugin_name ?>[api_key]"
                   value="<?php if (!empty($apiKey)) echo $apiKey ?>"
                   aria-describedby="API KEY" placeholder="API KEY"
                   required>
        </div>
        <div class="main-form__group required">
            <label class="main-form__label" for="center_lat">Center Latitude</label>
            <input type="number" step="0.0000001" class="main-form__input "
                   id="<?php echo $this->plugin_name ?>-center_lat"
                   name="<?php echo $this->plugin_name ?>[center_lat]"
                   value="<?php if (!empty($center_lat)) echo $center_lat ?>"
                   aria-describedby="Latitude" placeholder="Latitude" required>
        </div>
        <div class="main-form__group required">
            <label class="main-form__label" for="center_lng">Center Longitude</label>
            <input type="number" step="0.0000001" class="main-form__input "
                   id="<?php echo $this->plugin_name ?>-center_lng"
                   name="<?php echo $this->plugin_name ?>[center_lng]"
                   value="<?php if (!empty($center_lng)) echo $center_lng ?>"
                   aria-describedby="Longitude" placeholder="Longitude" required>
        </div>

        <div class="main-form__group">
            <label class="main-form__label" for="zoom">Zoom</label>
            <input type="number" class="main-form__input"
                   id="<?php echo $this->plugin_name ?>-zoom"
                   name="<?php echo $this->plugin_name ?>[zoom]"
                   value="<?php if (!empty($zoom)) echo $zoom ?>"
                   aria-describedby="Zoom" placeholder="Zoom">
        </div>
        <div class="main-form__group">
            <label class="main-form__label" for="min_zoom">Minimum Zoom</label>
            <input type="number" class="main-form__input"
                   id="<?php echo $this->plugin_name ?>-min_zoom"
                   name="<?php echo $this->plugin_name ?>[min_zoom]"
                   value="<?php if (!empty($min_zoom)) echo $min_zoom ?>"
                   aria-describedby="Minimum Zoom" placeholder="Minimum Zoom">
        </div>

        <div class="main-form__group">
            <label class="main-form__label" for="max_zoom">Maximum Zoom</label>
            <input type="number" class="main-form__input"
                   id="<?php echo $this->plugin_name ?>-max_zoom"
                   name="<?php echo $this->plugin_name ?>[max_zoom]"
                   value="<?php if (!empty($max_zoom)) echo $max_zoom ?>"
                   aria-describedby="Maximum Zoom" placeholder="Maximum Zoom">
        </div>

        <div class="main-form__group">
            <label class="main-form__label" for="width">Width</label>
            <input type="Width" class="main-form__input" id="<?php echo $this->plugin_name ?>-width"
                   name="<?php echo $this->plugin_name ?>[width]" value="<?php if (!empty($width)) echo $width ?>"
                   aria-describedby="Map Width" placeholder="Map Width">
        </div>
        <div class="main-form__group">
            <label class="main-form__label" for="height">Height</label>
            <input type="height" class="main-form__input" id="<?php echo $this->plugin_name ?>-height"
                   name="<?php echo $this->plugin_name ?>[height]" value="<?php if (!empty($height)) echo $height ?>"
                   aria-describedby="Map Height" placeholder="Map Height">
        </div>
        <div class="main-form__group">
            <label class="main-form__label" for="scroll_wheel_zoom">Scroll Wheel Zoom</label>
            <input type="checkbox" id="<?php echo $this->plugin_name; ?>-scroll_wheel_zoom"
                   name="<?php echo $this->plugin_name; ?>[scroll_wheel_zoom]"
                   value="1" <?php checked($scroll_wheel_zoom, 1); ?> />
        </div>
        <div class="panel panel-default">
            <div class="panel-heading">
                <div data-plugin-name="<?php echo $this->plugin_name ?>" class="main-form__btn"> + Add
                    Marker
                </div>
            </div>
            <div class="panel-body">
                <div class="form-markers">
                    <?php
                    $index = 0;
                    $pluginName = $this->plugin_name;

                    foreach ($markers as $marker) {
                        if (empty($marker['popup_name']) || !is_numeric($marker['lat']) || !is_numeric($marker['lng'])) continue;
                        echo '
                       <div data-id=' . $index . ' class="form-marker-container">
                       <h2 class="delete-marker">Point ' . ($index + 1) . '
                       <span>x</span>
                       </h2>
                          <div class="form-marker">
                            <div class="main-form__group">
                                <label class="main-form__label" for="marker[index]-popup-name">Popup Name</label>
                                <input type="text" class="main-form__input"
                                       id="' . $pluginName . '-markers[' . $index . ']-popup_name"
                                       name="' . $pluginName . '[markers][' . $index . '][popup_name]"
                                       value="' . $marker['popup_name'] . '"
                                       aria-describedby="Popup Name" placeholder="Popup Name"
                                       required>
                            </div>
                            <div class="main-form__group">
                                <label class="main-form__label" for="marker-lat">Latitude</label>
                                <input type="number" step="0.0000001" class="main-form__input"
                                       id="' . $pluginName . '-markers[' . $index . ']-marker_lat"
                                       name="' . $pluginName . '[markers][' . $index . '][lat]"
                                       value="' . $marker['lat'] . '"
                                       aria-describedby="Latitude" placeholder="Latitude" required>
                            </div>
                            <div class="main-form__group">
                                <label class="main-form__label" for="marker-lng">Longitude</label>
                                <input type="number" step="0.0000001" class="main-form__input"
                                       id="' . $pluginName . '-markers[' . $index . ']-marker_lng"
                                       name="' . $pluginName . '[markers][' . $index . '][lng]"
                                       value="' . $marker['lng'] . '"
                                       aria-describedby="Longitude" placeholder="Longitude" required>
                            </div>                        
                        </div>
                    </div>
                        ';
                    }
                    $index++;
                    ?>
                </div>
            </div>
        </div>

        <button id="submit" type="submit" class="btn btn-primary">Submit</button>
    </form>
</div>

