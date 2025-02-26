<div class="zcf_float_block">
    <table class="zcf_block_table">
        <tr>
            <td><?php esc_attr_e('Headline', 'contact-form-z');?></td>
            <td>
                <input type="text" class="zcf_field_title" name="file_title[]" spellcheck="true" value="<?=(isset($this->d['file_title']) ? $this->d['file_title'] : '')?>">
            </td>
            <td></td>
        </tr>
        <tr>
            <td><?php esc_attr_e('Multiple files', 'contact-form-z');?></td>
            <td>
                <label class="zcf_label">
                    <input type="checkbox" class="zcf_file_multiple zcf_change_checkbox" <?=(isset($this->d['file_multiple']) && $this->d['file_multiple'] ? 'checked' : '')?>>
                    <input type="hidden" name="file_multiple[]" value="<?=(isset($this->d['file_multiple']) && $this->d['file_multiple'] ? 'true' : 'false')?>">
                    <span class="zcf_check_admin zcf_check_admin_checkbox"></span>
                </label>
            </td>
            <td>
                <span class="dashicons dashicons-editor-help" title="<?php esc_attr_e('Simultaneously uploading multiple files', 'contact-form-z');?>"></span>
            </td>
        </tr>
        <tr>
            <td></td>
            <td>
                <label class="zcf_label zcf_label_margin">
                    <label class="zcf_container_title_label"><?php esc_attr_e('Required', 'contact-form-z');?></label>
                    <input type="checkbox" class="zcf_required zcf_change_checkbox" <?=(isset($this->d['file_required']) && $this->d['file_required'] ? 'checked' : '')?>>
                    <input type="hidden" name="file_required[]" value="<?=(isset($this->d['file_required']) && $this->d['file_required'] ? 'true' : 'false')?>">
                    <span class="zcf_check_admin zcf_check_admin_checkbox"></span>
                </label>
                <label class="zcf_label">
                    <label class="zcf_container_title_label"><?php esc_attr_e('No title', 'contact-form-z');?></label>
                    <input type="checkbox" class="zcf_no_title zcf_change_checkbox" <?=(isset($this->d['file_no_title']) && $this->d['file_no_title'] ? 'checked' : '')?>>
                    <input type="hidden" name="file_no_title[]" value="<?=(isset($this->d['file_no_title']) && $this->d['file_no_title'] ? 'true' : 'false')?>">
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
<div class="zcf_float_block zcf_options_block">
    <table class="zcf_block_table">
        <tr>
            <td><?php esc_attr_e('Max file size', 'contact-form-z');?></td>
            <td>
                <input type="number" class="zcf_file_option" name="file_size[]" step="any" data-attr-type="size"  spellcheck="true" value="<?=(isset($this->d['file_size']) ? $this->d['file_size'] : '')?>">
            </td>
            <td>
                <span class="dashicons dashicons-editor-help" title="<?php esc_attr_e('Maximum MB size of a single file to be uploaded', 'contact-form-z');?>"></span>
            </td>
        </tr>
        <tr>
            <td><?php esc_attr_e('Size information', 'contact-form-z');?></td>
            <td>
                <label class="zcf_label">
                    <input type="checkbox" class="zcf_file_option_view zcf_change_checkbox" data-attr-type="size" <?=(isset($this->d['file_size_info']) && $this->d['file_size_info'] ? 'checked' : '')?>>
                    <input type="hidden" name="file_size_info[]" value="<?=(isset($this->d['file_size_info']) && $this->d['file_size_info'] ? 'true' : 'false')?>">
                    <span class="zcf_check_admin zcf_check_admin_checkbox"></span>
                </label>
            </td>
            <td>
                <span class="dashicons dashicons-editor-help" title="<?php esc_attr_e('Displays under the field information about the maximum size of the uploaded file', 'contact-form-z');?>"></span>
            </td>
        </tr>
        <tr>
            <td><?php esc_attr_e('File formats', 'contact-form-z');?></td>
            <td>
                <input type="text" class="zcf_file_option" name="file_type[]" data-attr-type="format" spellcheck="true" value="<?=(isset($this->d['file_type']) ? $this->d['file_type'] : '')?>">
            </td>
            <td>
                <span class="dashicons dashicons-editor-help" title="<?php esc_attr_e('A list of available upload file formats. Separate the formats with commas. For example, doc, pdf, txt, etc. ', 'contact-form-z');?>"></span>
            </td>
        </tr>
        <tr>
            <td><?php esc_attr_e('Format Information', 'contact-form-z');?></td>
            <td>
                <label class="zcf_label">
                    <input type="checkbox" class="zcf_file_option_view zcf_change_checkbox" data-attr-type="format" <?=(isset($this->d['file_type_info']) && $this->d['file_type_info'] ? 'checked' : '')?>>
                    <input type="hidden" name="file_type_info[]" value="<?=(isset($this->d['file_type_info']) && $this->d['file_type_info'] ? 'true' : 'false')?>">
                    <span class="zcf_check_admin zcf_check_admin_checkbox"></span>
                </label>
            </td>
            <td>
                <span class="dashicons dashicons-editor-help" title="<?php esc_attr_e('Displays information about available file formats under the field', 'contact-form-z');?>"></span>
            </td>
        </tr>
        <tr>
            <td><?php esc_attr_e('Class', 'contact-form-z');?></td>
            <td>
                <input type="text" name="file_list_class[]" value="<?=(isset($this->d['file_list_class']) ? $this->d['file_list_class'] : '')?>">
            </td>
            <td>
                <span class="dashicons dashicons-editor-help" title="<?php esc_attr_e('Form element Class attribute (HTML)', 'contact-form-z');?>"></span>
            </td>
        </tr>
    </table>
</div>