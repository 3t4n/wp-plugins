<div class="zcf_float_block">
    <table class="zcf_block_table">
        <tr>
            <td><?php esc_attr_e('Headline', 'contact-form-z');?></td>
            <td>
                <input type="text" class="zcf_field_title" name="text_title[]" spellcheck="true" value="<?=(isset($this->d['text_title']) ? $this->d['text_title'] : '')?>">
            </td>
            <td></td>
        </tr>
        <tr>
            <td><?php esc_attr_e('Field type', 'contact-form-z');?></td>
            <td>
                <select name="text_field_type[]" class="zcf_text_field_type">
                    <?php foreach(ZCFORM_SELECTOR['fields']['text']['text_field_type'] as $k => $v):?>
                        <option value="<?=$k;?>" <?=(isset($this->d['text_field_type']) && $this->d['text_field_type'] == $k ? 'selected' : '')?>><?=$v;?></option>
                    <?php endforeach;?>
                </select>
            </td>
            <td>
                <span class="dashicons dashicons-warning" title="<?php esc_attr_e('Any change resets the Rules for this field (see Logic -> Field Rules)', 'contact-form-z');?>"></span>
            </td>
        </tr>
        <tr>
            <td><?php esc_attr_e('Text in the field', 'contact-form-z');?></td>
            <td>
                <input type="text" name="text_placeholder[]" class="zcf_text_placeholder" spellcheck="false" value="<?=(isset($this->d['text_placeholder']) ? $this->d['text_placeholder'] : '')?>">
            </td>
            <td></td>
        </tr>
        <tr>
            <td>
            </td>
            <td>
                <label class="zcf_label zcf_label_margin">
                    <label class="zcf_container_title_label"><?php esc_attr_e('Required', 'contact-form-z');?></label>
                    <input type="checkbox" class="zcf_required zcf_change_checkbox" <?=(isset($this->d['text_required']) && $this->d['text_required'] ? 'checked' : '')?>>
                    <input type="hidden" name="text_required[]" value="<?=(isset($this->d['text_required']) && $this->d['text_required'] ? 'true' : 'false')?>">
                    <span class="zcf_check_admin zcf_check_admin_checkbox"></span>
                </label>
                <label class="zcf_label">
                    <label class="zcf_container_title_label"><?php esc_attr_e('No title', 'contact-form-z');?></label>
                    <input type="checkbox" class="zcf_no_title zcf_change_checkbox" <?=(isset($this->d['text_no_title']) && $this->d['text_no_title'] ? 'checked' : '')?>>
                    <input type="hidden" name="text_no_title[]" value="<?=(isset($this->d['text_no_title']) && $this->d['text_no_title'] ? 'true' : 'false')?>">
                    <span class="zcf_check_admin zcf_check_admin_checkbox"></span>
                </label>
            </td>
            <td>
                <span class="dashicons dashicons-editor-help" title="<?php esc_attr_e('Does not show the text of the field Title when displaying the form on the site. That is, it is an informational text in the form constructor', 'contact-form-z');?>"></span>
            </td>
        </tr>
        <tr>
            <td colspan="3" class="zcf_title_center">
                <h3 >
                    <a class="zcf_view_options"><?php esc_attr_e('Advanced Options', 'contact-form-z');?></a>
                </h3>
            </td>
        </tr>
    </table>
</div>
<!--Right Block-->
<div class="zcf_float_block zcf_options_block">
    <table class="zcf_block_table">
        <tr>
            <td><?php esc_attr_e('Default value', 'contact-form-z');?></td>
            <td>
                <select name="text_default[]" class="zcf_text_default">
                    <?php foreach(ZCFORM_SELECTOR['fields']['text']['text_default'] as $k => $v):?>
                        <option value="<?=$k;?>" <?=(isset($this->d['text_default']) && $this->d['text_default'] == $k ? 'selected' : '')?>><?=$v;?></option>
                    <?php endforeach;?>
                </select><br>
                <input 
                    type="text" 
                    <?=(isset($this->d['text_default']) && $this->d['text_default'] != 'text' ? 'readonly' : '')?>
                    class="zcf_text_default_value" 
                    name="text_default_value[]" 
                    spellcheck="true" 
                    value="<?=(isset($this->d['text_default_value']) ? $this->d['text_default_value'] : '')?>"
                    >
            </td>
            <td></td>
        </tr>
        <tr>
            <td><?php esc_attr_e('Min value', 'contact-form-z');?></td>
            <td>
                <input type="number" class="zcf_counter_length" name="text_length_min[]" data-attr-type="min" value="<?=(isset($this->d['text_length_min']) ? $this->d['text_length_min'] : '')?>">
            </td>
            <td>
                <span class="dashicons dashicons-editor-help" title="<?php esc_attr_e('Minimum characters in the text or number value.', 'contact-form-z');?>"></span>
            </td>
        </tr>
        <tr>
            <td><?php esc_attr_e('Max value', 'contact-form-z');?></td>
            <td>
                <input type="number" class="zcf_counter_length" name="text_length_max[]" data-attr-type="max" value="<?=(isset($this->d['text_length_max']) ? $this->d['text_length_max'] : '')?>">
            </td>
            <td>
                <span class="dashicons dashicons-editor-help" title="<?php esc_attr_e('Maximum characters in the text or number value.', 'contact-form-z');?>"></span>
            </td>
        </tr>
        <tr>
            <td><?php esc_attr_e('Character counter', 'contact-form-z');?></td>
            <td>
                <label class="zcf_label">
                    <input type="checkbox" class="zcf_text_counter zcf_change_checkbox" data-attr-type="counter"<?=(isset($this->d['text_counter']) && $this->d['text_counter'] ? 'checked' : '')?>>
                    <input type="hidden" name="text_counter[]" value="<?=(isset($this->d['text_counter']) && $this->d['text_counter'] ? 'true' : 'false')?>">
                    <span class="zcf_check_admin zcf_check_admin_checkbox"></span>
                </label>
            </td>
            <td>
                <span class="dashicons dashicons-editor-help" title="<?php esc_attr_e('Show the counter of the remaining minimum and maximum number of characters/digit limit under the text field', 'contact-form-z');?>"></span>
            </td>
        </tr>
        <tr>
            <td><?php esc_attr_e('ID', 'contact-form-z');?></td>
            <td>
                <input type="text" name="text_list_id[]" value="<?=(isset($this->d['text_list_id']) ? $this->d['text_list_id'] : '')?>">
            </td>
            <td>
                <span class="dashicons dashicons-editor-help" title="<?php esc_attr_e('Form element ID attribute (HTML)', 'contact-form-z');?>"></span>
            </td>
        </tr>
        <tr>
            <td><?php esc_attr_e('Class', 'contact-form-z');?></td>
            <td>
                <input type="text" name="text_list_class[]" value="<?=(isset($this->d['text_list_class']) ? $this->d['text_list_class'] : '')?>">
            </td>
            <td>
                <span class="dashicons dashicons-editor-help" title="<?php esc_attr_e('Form element Class attribute (HTML)', 'contact-form-z');?>"></span>
            </td>
        </tr>
        <tr>
            <td><?php esc_attr_e('Input mask', 'contact-form-z');?></td>
            <td colspan="2">
                <label class="zcf_label">
                    <input type="checkbox" class="zcf_connect_mask zcf_change_checkbox" <?=(isset($this->d['text_mask']) && $this->d['text_mask'] ? 'checked' : '')?>>
                    <input type="hidden" name="text_mask[]" value="<?=(isset($this->d['text_mask']) && $this->d['text_mask'] ? 'true' : 'false')?>">
                    <span class="zcf_check_admin zcf_check_admin_checkbox"></span>
                </label>
            </td>
        </tr>
    </table>
</div>
<!--Mask Block-->
<div class="zcf_float_block zcf_mask_block zcf_options_block">
    <table class="zcf_block_table">
        <tr>
            <td colspan="3" class="zcf_title_center">
                <h3><?php esc_attr_e('Mask settings', 'contact-form-z');?></h3>
            </td>
        </tr>
        <tr>
            <td><?php esc_attr_e('Input template', 'contact-form-z');?></td>
            <td>                    
                <input type="text" class="zcf_mask_template" name="mask_template[]" spellcheck="true" value="<?=(isset($this->d['mask_template']) ? $this->d['mask_template'] : '')?>">
            </td>
            <td>
                <span class="dashicons dashicons-editor-help" title="<?php esc_attr_e('S – latin letters only; 0 – digits only; A – latin letters and digits. Other examples of input templates can be found in the Setup manual or on the developer’s website', 'contact-form-z');?>"></span>
            </td>
        </tr>
        <tr>
            <td><?php esc_attr_e('Reverse field filling', 'contact-form-z');?></td>
            <td>
                <label class="zcf_label">
                    <input type="checkbox" class="zcf_mask_options zcf_mask_revers zcf_change_checkbox" <?=(isset($this->d['mask_revers']) && $this->d['mask_revers'] ? 'checked' : '')?>>
                    <input type="hidden" name="mask_revers[]" value="<?=(isset($this->d['mask_revers']) && $this->d['mask_revers'] ? 'true' : 'false')?>">
                    <span class="zcf_check_admin zcf_check_admin_checkbox"></span>
                </label>
            </td>
            <td>
                <span class="dashicons dashicons-editor-help" title="<?php esc_attr_e('When the field is filled, the values are shifted to the right', 'contact-form-z');?>"></span>
            </td>
        </tr>
        <tr>
            <td><?php esc_attr_e('Field cleaning', 'contact-form-z');?></td>
            <td>
                <label class="zcf_label">
                    <input type="checkbox" class="zcf_mask_options zcf_mask_clean zcf_change_checkbox" <?=(isset($this->d['mask_clean']) && $this->d['mask_clean'] ? 'checked' : '')?>>
                    <input type="hidden" name="mask_clean[]" value="<?=(isset($this->d['mask_clean']) && $this->d['mask_clean'] ? 'true' : 'false')?>">
                    <span class="zcf_check_admin zcf_check_admin_checkbox"></span>
                </label>
            </td>
            <td>
                <span class="dashicons dashicons-editor-help" title="<?php esc_attr_e('If the mask value was not fully entered, the field will be cleared', 'contact-form-z');?>"></span>
            </td>
        </tr>
    </table>
</div>
