<div class="zcf_float_block">
    <table class="zcf_block_table">
        <tr>
            <td><?php esc_attr_e('Headline', 'contact-form-z');?></td>
            <td>
                <input type="text" class="zcf_field_title" name="checkbox_title[]" spellcheck="true" value="<?=(isset($this->d['checkbox_title']) ? $this->d['checkbox_title'] : '')?>">
            </td>
            <td></td>
        </tr>
        <tr>
            <td></td>
            <td>
                <label class="zcf_label zcf_label_margin">
                    <label class="zcf_container_title_label"><?php esc_attr_e('Required', 'contact-form-z');?></label>
                    <input type="checkbox" class="zcf_required zcf_change_checkbox" <?=(isset($this->d['checkbox_required']) && $this->d['checkbox_required'] ? 'checked' : '')?>>
                    <input type="hidden" name="checkbox_required[]" value="<?=(isset($this->d['checkbox_required']) && $this->d['checkbox_required'] ? 'true' : 'false')?>">
                    <span class="zcf_check_admin zcf_check_admin_checkbox"></span>
                </label>
                <label class="zcf_label">
                    <label class="zcf_container_title_label"><?php esc_attr_e('No title', 'contact-form-z');?></label>
                    <input type="checkbox" class="zcf_no_title zcf_change_checkbox" <?=(isset($this->d['checkbox_no_title']) && $this->d['checkbox_no_title'] ? 'checked' : '')?>>
                    <input type="hidden" name="checkbox_no_title[]" value="<?=(isset($this->d['checkbox_no_title']) && $this->d['checkbox_no_title'] ? 'true' : 'false')?>">
                    <span class="zcf_check_admin zcf_check_admin_checkbox"></span>
                </label>
            </td>
            <td>
                <span class="dashicons dashicons-editor-help" title="<?php esc_attr_e('Does not show the text of the field Title when displaying the form on the site. That is, it is an informational text in the form constructor', 'contact-form-z');?>"></span>
            </td>
        </tr>
    </table>
</div>
<div class="zcf_float_block">
    <table class="zcf_block_table_list">
        <tr>
            <td colspan="3">
                <h3><?php esc_attr_e('List items', 'contact-form-z');?></h3>
            </td>
        </tr>
        <tr>
            <th><?php esc_attr_e('Headline', 'contact-form-z');?></th>
            <th><?php esc_attr_e('Selected', 'contact-form-z');?></th>
            <th></th>
        </tr>
        <tbody class="zcf_body_row">
            <?php foreach($this->d['list'] as $k => $v):?>
                <tr>
                    <td>
                        <input type="text" class="zcf_list_title" 
                               name="checkbox_list_title[<?=(isset($this->d['checkbox_rank']) ? $this->d['checkbox_rank'] : 0)?>][<?=$k;?>]" 
                               data-num-value="<?=$k;?>"
                               value="<?=(isset($v['checkbox_list_title']) ? $v['checkbox_list_title'] : ($this->count_key_list+1))?>"
                               >
                    </td>
                    <td>
                        <label class="zcf_label">
                            <input type="checkbox" class="zcf_list_check" 
                            <?=(isset($v['checkbox_list_check']) && $v['checkbox_list_check'] ? 'checked' : '')?>        
                                   >
                            <input type="hidden" name="checkbox_list_check[<?=(isset($this->d['checkbox_rank']) ? $this->d['checkbox_rank'] : 0)?>][<?=$k;?>]" 
                                   value="<?=(isset($v['checkbox_list_check']) && $v['checkbox_list_check'] ? 'true' : 'false')?>"
                                   >
                            <span class="zcf_check_admin zcf_check_admin_checkbox"></span>
                        </label>
                    </td>
                    <td>
                        <button type="button"  class="button <?=($this->count_key_list == 0 ? "zcf_add_clone_row" : "zcf_remove_clone_row")?>" 
                                data-rank-count="<?=count($this->d['list']);?>" data-type-list="checkbox"
                                >
                            <span class="dashicons dashicons-<?=($this->count_key_list++ == 0 ? "plus" : "minus")?>"></span>
                        </button>
                    </td>
                </tr>
            <?php endforeach;?>
        </tbody>
    </table>
</div>
<div class="zcf_float_block">
    <table class="zcf_block_table">
        <tr>
            <td></td>
            <td></td>
            <td></td>
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
            <td><?php esc_attr_e('Min number', 'contact-form-z');?></td>
            <td>
                <select class="zcf_min_count" name="checkbox_min_count_check[]">
                    <?php for($i = 0; $i <= count($this->d['list']); $i++):?>
                        <option value="<?=$i;?>" <?=(isset($this->d['checkbox_min_count_check']) && $this->d['checkbox_min_count_check'] == $i ? 'selected' : '')?>><?=$i;?></option>
                    <?php endfor;?>
                </select>
            </td>
            <td>
                <span class="dashicons dashicons-editor-help" title="<?php esc_attr_e('Minimum number of selected checkboxes required to submit the form', 'contact-form-z');?>"></span>
            </td>
        </tr>
        <tr>
            <td><?php esc_attr_e('Max number', 'contact-form-z');?></td>
            <td>
                <select class="zcf_max_count" name="checkbox_max_count_check[]">
                    <?php for($i = 0; $i <= count($this->d['list']); $i++):?>
                        <option value="<?=$i;?>" <?=(isset($this->d['checkbox_max_count_check']) && $this->d['checkbox_max_count_check'] == $i ? 'selected' : '')?>><?=$i;?></option>
                    <?php endfor;?>
                </select>
            </td>
            <td>
                <span class="dashicons dashicons-editor-help" title="<?php esc_attr_e('Maximum number of the selected checkboxes', 'contact-form-z');?>"></span>
            </td>
        </tr>
        <tr>
            <td><?php esc_attr_e('ID', 'contact-form-z');?></td>
            <td>
                <input type="text" name="checkbox_list_id[]" value="<?=(isset($this->d['checkbox_list_id']) ? $this->d['checkbox_list_id'] : '')?>">
            </td>
            <td>
                <span class="dashicons dashicons-editor-help" title="<?php esc_attr_e('Form element ID attribute (HTML)', 'contact-form-z');?>"></span>
            </td>
        </tr>
        <tr>
            <td><?php esc_attr_e('Class', 'contact-form-z');?></td>
            <td>
                <input type="text" name="checkbox_list_class[]" value="<?=(isset($this->d['checkbox_list_class']) ? $this->d['checkbox_list_class'] : '')?>">
            </td>
            <td>
                <span class="dashicons dashicons-editor-help" title="<?php esc_attr_e('Form element Class attribute (HTML)', 'contact-form-z');?>"></span>
            </td>
        </tr>
    </table>
</div>