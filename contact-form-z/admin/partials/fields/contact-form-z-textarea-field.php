<div class="zcf_float_block">
    <table class="zcf_block_table">
        <tr>
            <td><?php esc_attr_e('Headline', 'contact-form-z');?></td>
            <td>
                <input type="text" class="zcf_field_title" name="textarea_title[]" spellcheck="true" value="<?=(isset($this->d['textarea_title']) ? $this->d['textarea_title'] : '')?>">
            </td>
            <td class="zcf_min_margin"></td>
        </tr>
        <tr>
            <td><?php esc_attr_e('Text in the field', 'contact-form-z');?></td>
            <td>
                <input type="text" name="textarea_placeholder[]" class="zcf_text_placeholder" spellcheck="true" value="<?=(isset($this->d['textarea_placeholder']) ? $this->d['textarea_placeholder'] : '')?>">
            </td>
            <td></td>
        </tr>
        <tr>
            <td></td>
            <td>
                <label class="zcf_label zcf_label_margin">
                    <label class="zcf_container_title_label"><?php esc_attr_e('Required', 'contact-form-z');?></label>
                    <input type="checkbox" class="zcf_required zcf_change_checkbox"<?=(isset($this->d['textarea_required']) && $this->d['textarea_required'] ? 'checked' : '')?>>
                    <input type="hidden" name="textarea_required[]" value="<?=(isset($this->d['textarea_required']) && $this->d['textarea_required'] ? 'true' : 'false')?>">
                    <span class="zcf_check_admin zcf_check_admin_checkbox"></span>
                </label>
                <label class="zcf_label">
                    <label class="zcf_container_title_label"><?php esc_attr_e('No title', 'contact-form-z');?></label>
                    <input type="checkbox" class="zcf_no_title zcf_change_checkbox"<?=(isset($this->d['textarea_no_title']) && $this->d['textarea_no_title'] ? 'checked' : '')?>>
                    <input type="hidden" name="textarea_no_title[]" value="<?=(isset($this->d['textarea_no_title']) && $this->d['textarea_no_title'] ? 'true' : 'false')?>">
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
                <input type="text" name="textarea_default[]" class="zcf_text_default_value" spellcheck="true" value="<?=(isset($this->d['textarea_default']) ? $this->d['textarea_default'] : '')?>">
            </td>
            <td></td>
        </tr>
        <tr>
            <td><?php esc_attr_e('Min characters', 'contact-form-z');?></td>
            <td>
                <input type="number" class="zcf_counter_length" data-attr-type="min" name="textarea_length_min[]" value="<?=(isset($this->d['textarea_length_min']) ? $this->d['textarea_length_min'] : '')?>">
            </td>
            <td>
                <span class="dashicons dashicons-editor-help" title="<?php esc_attr_e('Minimum characters in the text', 'contact-form-z');?>"></span>
            </td>
        </tr>
        <tr>
            <td><?php esc_attr_e('Max characters', 'contact-form-z');?></td>
            <td>
                <input type="number" class="zcf_counter_length" data-attr-type="max" name="textarea_length_max[]" value="<?=(isset($this->d['textarea_length_max']) ? $this->d['textarea_length_max'] : '')?>">
            </td>
            <td>
                <span class="dashicons dashicons-editor-help" title="<?php esc_attr_e('Maximum characters in the text', 'contact-form-z');?>"></span>
            </td>
        </tr>
        <tr>
            <td><?php esc_attr_e('Character counter', 'contact-form-z');?></td>
            <td>
                <label class="zcf_label">
                    <input type="checkbox" class="zcf_textarea_counter zcf_change_checkbox" data-attr-type="counter"<?=(isset($this->d['textarea_counter']) && $this->d['textarea_counter'] ? 'checked' : '')?>>
                    <input type="hidden" name="textarea_counter[]" value="<?=(isset($this->d['textarea_counter']) && $this->d['textarea_counter'] ? 'true' : 'false')?>">
                    <span class="zcf_check_admin zcf_check_admin_checkbox"></span>
                </label>
            </td>
            <td>
                <span class="dashicons dashicons-editor-help" title="<?php esc_attr_e('Show the counter of the remaining minimum and maximum number of characters under the text area', 'contact-form-z');?>"></span>
            </td>
        </tr>
        <tr>
            <td><?php esc_attr_e('ID', 'contact-form-z');?></td>
            <td>
                <input type="text" name="textarea_list_id[]" value="<?=(isset($this->d['textarea_list_id']) ? $this->d['textarea_list_id'] : '')?>">
            </td>
            <td>
                <span class="dashicons dashicons-editor-help" title="<?php esc_attr_e('Form element ID attribute (HTML)', 'contact-form-z');?>"></span>
            </td>
        </tr>
        <tr>
            <td><?php esc_attr_e('Class', 'contact-form-z');?></td>
            <td>
                <input type="text" name="textarea_list_class[]" value="<?=(isset($this->d['textarea_list_class']) ? $this->d['textarea_list_class'] : '')?>">
            </td>
            <td>
                <span class="dashicons dashicons-editor-help" title="<?php esc_attr_e('Form element Class attribute (HTML)', 'contact-form-z');?>"></span>
            </td>
        </tr>
    </table>
</div>