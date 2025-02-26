<div class="zcf_float_block">
    <table class="zcf_block_table">
        <tr>
            <td><?php esc_attr_e('Headline', 'contact-form-z');?></td>
            <td>
                <input type="text" class="zcf_field_title" name="accept_title[]" spellcheck="true" value="<?=(isset($this->d['accept_title']) ? $this->d['accept_title'] : '')?>">
            </td>
            <td></td>
        </tr>
        <tr>
            <td><?php esc_attr_e('Verification text', 'contact-form-z');?></td>
            <td>
                <input type="text" class="zcf_accept_title" name="accept_sub_title[]" spellcheck="true" data-default-text="<?php esc_attr_e('I agree', 'contact-form-z');?>"
                       value="<?=(isset($this->d['accept_sub_title']) ? $this->d['accept_sub_title'] : '')?>"
                       >
            </td>
            <td></td>
        </tr>
        <tr>
            <td><?php esc_attr_e('Default', 'contact-form-z');?></td>
            <td>
                <select name="accept_default[]" class="zcf_accept_default">
                    <?php foreach(ZCFORM_SELECTOR['fields']['accept']['accept_default'] as $k => $v):?>
                        <option value="<?=$k;?>" <?=(isset($this->d['accept_default']) && $this->d['accept_default'] == $k ? 'selected' : '')?>><?=$v;?></option>
                    <?php endforeach;?>
                </select>
            </td>
            <td>
                <span class="dashicons dashicons-editor-help" title="<?php esc_attr_e('Agreement checkbox checked/unchecked by default', 'contact-form-z');?>"></span>
            </td>
        </tr>
        <tr>
            <td></td>
            <td>
                <label class="zcf_label">
                    <label class="zcf_container_title_label"><?php esc_attr_e('No title', 'contact-form-z');?></label>
                    <input type="checkbox" class="zcf_no_title zcf_change_checkbox" <?=(isset($this->d['accept_no_title']) && $this->d['accept_no_title'] ? 'checked' : '')?>>
                    <input type="hidden" name="accept_no_title[]" value="<?=(isset($this->d['accept_no_title']) && $this->d['accept_no_title'] ? 'true' : 'false')?>">
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
            <td><?php esc_attr_e('Agreement condition', 'contact-form-z');?></td>
            <td>
                <select name="accept_condition[]">
                    <?php foreach(ZCFORM_SELECTOR['fields']['accept']['accept_condition'] as $k => $v):?>
                        <option value="<?=$k;?>" <?=(isset($this->d['accept_condition']) && $this->d['accept_condition'] == $k ? 'selected' : '')?>><?=$v;?></option>
                    <?php endforeach;?>
                </select>
            </td>
            <td>
                <span class="dashicons dashicons-editor-help" title="<?php esc_attr_e('The condition to accept the agreement', 'contact-form-z');?>"></span>
            </td>
        </tr>
        <tr>
            <td><?php esc_attr_e('Conclusion of agreement', 'contact-form-z');?></td>
            <td>
                <select name="accept_type[]" class="zcf_accept_type">
                    <?php foreach(ZCFORM_SELECTOR['fields']['accept']['accept_type'] as $k => $v):?>
                        <option value="<?=$k;?>" <?=(isset($this->d['accept_type']) && $this->d['accept_type'] == $k ? 'selected' : '')?>><?=$v;?></option>
                    <?php endforeach;?>
                </select>
            </td>
            <td>
                <span class="dashicons dashicons-editor-help" title="<?php esc_attr_e('Type of agreement information provided', 'contact-form-z');?>"></span>
            </td>
        </tr>
        <tr class="<?=(isset($this->d['accept_type']) && $this->d['accept_type'] == 1 ? '' : 'zcf_hide_text')?>">
            <td><?php esc_attr_e('URL', 'contact-form-z');?></td>
            <td>
                <input type="url" class="zcf_accept_content" data-attr-type="link" name="accept_url[]" value="<?=(isset($this->d['accept_url']) ? $this->d['accept_url'] : '')?>">
            </td>
            <td>
                <span class="dashicons dashicons-editor-help" title="<?php esc_attr_e('A link to the text of the Agreement to be placed next to the title', 'contact-form-z');?>"></span>
            </td>
        </tr>
        <tr class="<?=(isset($this->d['accept_type']) && $this->d['accept_type'] == 2 ? '' : 'zcf_hide_text')?>">
            <td><?php esc_attr_e('Text', 'contact-form-z');?></td>
            <td>
                <textarea class="zcf_accept_content" data-attr-type="text" name="accept_text[]"><?=(isset($this->d['accept_text']) ? $this->d['accept_text'] : '')?></textarea>
            </td>
            <td>
                <span class="dashicons dashicons-editor-help" title="<?php esc_attr_e('The text of the agreement to be displayed under the dialog next to the agreement heading', 'contact-form-z');?>"></span>
            </td>
        </tr>
        <tr>
            <td><?php esc_attr_e('ID', 'contact-form-z');?></td>
            <td>
                <input type="text" name="accept_list_id[]" value="<?=(isset($this->d['accept_list_id']) ? $this->d['accept_list_id'] : '')?>">
            </td>
            <td>
                <span class="dashicons dashicons-editor-help" title="<?php esc_attr_e('Form element ID attribute (HTML)', 'contact-form-z');?>"></span>
            </td>
        </tr>
        <tr>
            <td><?php esc_attr_e('Class', 'contact-form-z');?></td>
            <td>
                <input type="text" name="accept_list_class[]" value="<?=(isset($this->d['accept_list_class']) ? $this->d['accept_list_class'] : '')?>">
            </td>
            <td>
                <span class="dashicons dashicons-editor-help" title="<?php esc_attr_e('Form element Class attribute (HTML)', 'contact-form-z');?>"></span>
            </td>
        </tr>
    </table>
</div>