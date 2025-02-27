<?php

	$saved_settings = get_option( 'rem_all_settings' );
    // var_dump($saved_settings);
    $field_value = (isset($saved_settings[$field['name']])) ? $saved_settings[$field['name']] : '' ;

    switch ($field['type']) {

        case 'text': ?>

            <div class="form-group">
                <label for="<?php echo $field['name']; ?>" class="col-sm-3 control-label"><?php echo $field['title']; ?></label>
                <div class="col-sm-9">
                    <input type="text" name="<?php echo $field['name']; ?>" class="form-control input-sm" id="<?php echo $field['name']; ?>" value="<?php echo $field_value; ?>">
                    <span class="help-block"><?php echo $field['help']; ?></span>
                </div>
            </div>
            <?php break;

        case 'number': ?>

            <div class="form-group">
                <label for="<?php echo $field['name']; ?>" class="col-sm-3 control-label"><?php echo $field['title']; ?></label>
                <div class="col-sm-9">
                    <input type="number" name="<?php echo $field['name']; ?>" class="form-control input-sm" id="<?php echo $field['name']; ?>" value="<?php echo $field_value; ?>">
                    <span class="help-block"><?php echo $field['help']; ?></span>
                </div>
            </div>
            <?php break;

        case 'textarea': ?>

            <div class="form-group">
                <label for="<?php echo $field['name']; ?>" class="col-sm-3 control-label"><?php echo $field['title']; ?></label>
                <div class="col-sm-9">
                    <textarea name="<?php echo $field['name']; ?>" class="form-control" id="<?php echo $field['name']; ?>"><?php echo $field_value; ?></textarea>
                    <span class="help-block"><?php echo $field['help']; ?></span>
                </div>
            </div>
            <?php break;

        case 'select': ?>

            <div class="form-group">
                <label for="<?php echo $field['name']; ?>" class="col-sm-3 control-label"><?php echo $field['title']; ?></label>
                <div class="col-sm-9">
                    <select name="<?php echo $field['name']; ?>" id="<?php echo $field['name']; ?>" class="form-control input-sm">
                        <?php
                        if (isset($field['options']) && $field['options'] != '') {
                            foreach ($field['options'] as $val => $label) {
                                $selected = ($field_value == $val) ? 'selected' : '' ;
                                $disabled = (strpos($val, 'disabled')) ? 'disabled' : '' ;

                                echo '<option value="'.$val.'" '.$selected.' '.$disabled.'>'.$label.'</option>';
                            }
                        }
                        ?>
                    </select>
                    <span class="help-block"><?php echo $field['help']; ?></span>
                </div>
            </div>
            <?php break;

        case 'color': ?>

            <div class="form-group">
                <label for="<?php echo $field['name']; ?>" class="col-sm-3 control-label"><?php echo $field['title']; ?></label>
                <div class="col-sm-9">
                    <span class="wcp-color-wrap">
                        <input type="text" name="<?php echo $field_name; ?>" id="<?php echo $field['name']; ?>" value="<?php echo $field_value; ?>" class="colorpicker" data-alpha="true">
                    </span>
                    <span class="help-block"><?php echo $field['help']; ?></span>
                </div>
            </div>
            <?php break;

        case 'checkbox': ?>

            <div class="form-group">
                <label for="<?php echo $field_id; ?>" class="col-sm-3 control-label"><?php echo $field['title']; ?></label>
                <div class="col-sm-9">
                    <div class="checkbox">
                        <label>
                            <?php $checked = ($field_value != '') ? 'checked' : '' ; ?>
                            <input type="checkbox" name="<?php echo $field_name; ?>" id="<?php echo $field_id; ?>" <?php echo $checked; ?>> <?php _e( 'Enable', 'image-caption-hover' ); ?>
                        </label>
                    </div>                            
                    <span class="help-block"><?php echo $field['help']; ?></span>
                </div>
            </div>
            <?php break;
        
        default:
            
            break;
    }
?>