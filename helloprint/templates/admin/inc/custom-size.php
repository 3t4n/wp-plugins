<th scope="row">
    <label for="helloprint_width"><?php echo wp_kses(_translate_helloprint('Width', "helloprint"), true) ?></label>
</th>
<td>
    <?php
    $min_width = ($args["available_options"][0]->code == "width") ? $args["available_options"][0]->min : $args["available_options"][1]->min;
    $max_width = ($args["available_options"][0]->code == "width") ? $args["available_options"][0]->max : $args["available_options"][1]->max;
    ?>
    <div class="example-class">
        <div class="wphp-input-group">
                <div class="wphp-input-group-area">
                    <input class="regular-text helloprint_custom_option_input_preset_field" data-name="custom_options" data-keytype="width" id="helloprint_preset_width" name="custom_options[width]" type="number" value="<?php echo !empty($args["default_options"]["width"]) ? wp_kses($args["default_options"]["width"], false) : '';?>" min="<?php echo wp_kses($min_width, false)?>" required="true" max="<?php echo wp_kses($max_width, false);?>" >
                </div>
                <div class="wphp-input-group-icon"><?php echo ($args["available_options"][0]->code == "width") ? wp_kses($args["available_options"][0]->unit, true) : wp_kses($args["available_options"][1]->unit, true);?></div>
        </div>
        <i><?php echo wp_kses(_translate_helloprint("min :: " . $min_width . ", max :: " . $max_width), true);?></i>
    </div>
</td>
<th scope="row">
    <label for="helloprint_height"><?php echo wp_kses(_translate_helloprint('Height', "helloprint"), true) ?></label>
</th>
<td>
<?php
    $min_height = ($args["available_options"][0]->code == "height") ? $args["available_options"][0]->min : $args["available_options"][1]->min;
    $max_height = ($args["available_options"][0]->code == "height") ? $args["available_options"][0]->max : $args["available_options"][1]->max;
    ?>
    <div class="example-class">
    <div class="wphp-input-group">
                <div class="wphp-input-group-area">
                    <input class="regular-text helloprint_custom_option_input_preset_field" data-name="custom_options" data-keytype="height" id="helloprint_preset_height" name="custom_options[height]" type="number" value="<?php echo !empty($args["default_options"]["height"]) ? wp_kses($args["default_options"]["height"], false) : '';?>" min="<?php echo wp_kses($min_height, false);?>" required="true" max="<?php echo wp_kses($max_height, false);?>" >
                </div>
                <div class="wphp-input-group-icon"><?php echo ($args["available_options"][0]->code == "height") ? wp_kses($args["available_options"][0]->unit) : wp_kses($args["available_options"][1]->unit, true);?></div>
        </div>
        <i><?php echo wp_kses(_translate_helloprint("min :: " . $min_height . ", max :: " . $max_height), true);?></i>
    </div>
    
</td>
