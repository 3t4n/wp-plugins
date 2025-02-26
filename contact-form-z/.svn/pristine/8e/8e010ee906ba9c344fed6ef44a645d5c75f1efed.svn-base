<div class="zcf_float_block">
    <table class="zcf_block_table">
        <tr>
            <td><?php esc_attr_e('Headline', 'contact-form-z');?></td>
            <td>
                <input type="text" class="zcf_field_title" name="datetime_title[]" spellcheck="false" value="<?=(isset($this->d['datetime_title']) ? $this->d['datetime_title'] : '')?>">
            </td>
            <td></td>
        </tr>
        <tr>
            <td><?php esc_attr_e('Input example', 'contact-form-z');?></td>
            <td>
                <input type="text" name="datetime_placeholder[]" class="zcf_text_placeholder" spellcheck="true" value="<?=(isset($this->d['datetime_placeholder']) ? $this->d['datetime_placeholder'] : '')?>">
            </td>
            <td></td>
        </tr>
        <tr>
            <td><?php esc_attr_e('Field type', 'contact-form-z');?></td>
            <td>
                <select name="datetime_field_type[]" class="zcf_datetime_type">
                    <?php foreach(ZCFORM_SELECTOR['fields']['datetime']['datetime_field_type'] as $k => $v):?>
                        <option value="<?=$k;?>" <?=(isset($this->d['datetime_field_type']) && $this->d['datetime_field_type'] == $k ? 'selected' : '')?>><?=$v;?></option>
                    <?php endforeach;?>
                </select>
            </td>
            <td class="zcf_min_margin"></td>
        </tr>
        <tr>
            <td><?php esc_attr_e('Input format', 'contact-form-z');?></td>
            <td>
                <select name="datetime_format[]" class="zcf_datetime_format">
                    <?php foreach(ZCFORM_SELECTOR['fields']['datetime']['datetime_format'] as $k => $v):?>
                        <option value="<?=$k;?>" <?=(isset($this->d['datetime_format']) && $this->d['datetime_format'] == $k ? 'selected' : '')?>><?=$v;?></option>
                    <?php endforeach;?>
                </select>
                <br>
                <select name="date_format[]" class="zcf_date_format <?=(isset($this->d['datetime_format']) && $this->d['datetime_format'] == 2 && isset($this->d['datetime_field_type']) && in_array($this->d['datetime_field_type'], ['date', 'datetime']) ? '' : 'zcf_hide_text')?>">
                    <?php foreach(ZCFORM_SELECTOR['fields']['datetime']['date_formats'] as $format):?>
                        <option value="<?=esc_attr__($format);?>" <?=(isset($this->d['date_format']) && $this->d['date_format'] == esc_attr__($format) ? 'selected' : '')?>><?=esc_attr__($format);?> (<?=date($format);?>)</option>
                    <?php endforeach;?>
                </select>
                <select name="time_format[]" class="zcf_time_format <?=(isset($this->d['datetime_format']) && $this->d['datetime_format'] == 2 && isset($this->d['datetime_field_type']) && in_array($this->d['datetime_field_type'], ['time', 'datetime']) ? '' : 'zcf_hide_text')?>">
                    <?php foreach(ZCFORM_SELECTOR['fields']['datetime']['time_formats'] as $format):?>
                        <option value="<?=esc_attr__($format);?>" <?=(isset($this->d['time_format']) && $this->d['time_format'] == esc_attr__($format) ? 'selected' : '')?>><?=esc_attr__($format);?> (<?=date($format);?>)</option>
                    <?php endforeach;?>
                </select>
            </td>
            <td>
                <span class="dashicons dashicons-editor-help" title="<?php esc_attr_e('For more details about the date and time format, see the WordPress General Settings page or the manual on this field', 'contact-form-z');?>"></span>
            </td>
        </tr>

        <tr>
            <td><?php esc_attr_e('Language', 'contact-form-z');?></td>
            <td>
                <select name="datetime_language[]" class="zcf_datetime_language">
                    <?php
                    $datetime_lng = isset($this->d['datetime_language']) ? $this->d['datetime_language'] : ZCFORM_PLUGIN_LOCALE;
                    foreach(ZCFORM_SELECTOR['fields']['datetime']['datetime_language'] as $k => $v):
                        ?>
                        <option value="<?=$k;?>" <?=($datetime_lng == $k ? 'selected' : '')?>><?=$v;?></option>
                    <?php endforeach;?>
                </select>
            </td>
            <td class="zcf_min_margin"></td>
        </tr>
        <tr>
            <td></td>
            <td>
                <label class="zcf_label zcf_label_margin">
                    <label class="zcf_container_title_label"><?php esc_attr_e('Required', 'contact-form-z');?></label>
                    <input type="checkbox" class="zcf_required zcf_change_checkbox" <?=(isset($this->d['datetime_required']) && $this->d['datetime_required'] ? 'checked' : '')?>>
                    <input type="hidden" name="datetime_required[]" value="<?=(isset($this->d['datetime_required']) && $this->d['datetime_required'] ? 'true' : 'false')?>">
                    <span class="zcf_check_admin zcf_check_admin_checkbox"></span>
                </label>
                <label class="zcf_label">
                    <label class="zcf_container_title_label"><?php esc_attr_e('No title', 'contact-form-z');?></label>
                    <input type="checkbox" class="zcf_no_title zcf_change_checkbox" <?=(isset($this->d['datetime_no_title']) && $this->d['datetime_no_title'] ? 'checked' : '')?>>
                    <input type="hidden" name="datetime_no_title[]" value="<?=(isset($this->d['datetime_no_title']) && $this->d['datetime_no_title'] ? 'true' : 'false')?>">
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
                <select name="datetime_default[]" class="zcf_datetime_default">
                    <?php foreach(ZCFORM_SELECTOR['fields']['datetime']['datetime_list'] as $k => $v):?>
                        <option value="<?=$k;?>" <?=(isset($this->d['datetime_default']) && $this->d['datetime_default'] == $k ? 'selected' : '')?>><?=$v;?></option>
                    <?php endforeach;?>
                </select><br>
                <input type="text" 
                       class="zcf_datetime_default_value zcf_set_calendar zcf_calendar_rank_<?=(isset($this->d['datetime_rank']) ? $this->d['datetime_rank'] : 0)?> <?=(isset($this->d['datetime_default']) && $this->d['datetime_default'] != 1 ? 'zcf_hide_text' : '')?>" 
                       name="datetime_default_value[]" 
                       autocomplete="off"
                       value="<?=(isset($this->d['datetime_default_value']) ? $this->d['datetime_default_value'] : '')?>"
                       >
                <table class="zcf_children_table">
                    <tr>
                        <td>
                            <input 
                                type="number" 
                                class="zcf_datetime_interval_days" 
                                name="datetime_days[]" 
                                spellcheck="true" 
                                placeholder="<?php esc_attr_e('days', 'contact-form-z');?>"
                                value="<?=(isset($this->d['datetime_days']) ? $this->d['datetime_days'] : '')?>"
                            <?=(isset($this->d['datetime_default']) && $this->d['datetime_default'] == 3 && isset($this->d['datetime_field_type']) && in_array($this->d['datetime_field_type'], ['date', 'datetime']) ? '' : 'readonly')?>
                                   >
                        </td>
                        <td>
                            <input 
                                type="number"  
                                class="zcf_datetime_interval_minutes" 
                                name="datetime_minutes[]" 
                                spellcheck="true" 
                                placeholder="<?php esc_attr_e('minutes', 'contact-form-z');?>"
                                value="<?=(isset($this->d['datetime_minutes']) ? $this->d['datetime_minutes'] : '')?>"
                            <?=(isset($this->d['datetime_default']) && $this->d['datetime_default'] == 3 && isset($this->d['datetime_field_type']) && in_array($this->d['datetime_field_type'], ['time', 'datetime']) ? '' : 'readonly')?>
                                   >
                        </td>
                    </tr>
                </table>
            </td>
            <td></td>
        </tr>
        <tr>
            <td><?php esc_attr_e('Beginning of the week', 'contact-form-z');?></td>
            <td>
                <select name="datetime_start_day[]" class="zcf_datetime_start_day <?=(isset($this->d['datetime_field_type']) && $this->d['datetime_field_type'] == 'time' ? 'zcf_hide_text' : '')?>">
                    <?php foreach(ZCFORM_SELECTOR['fields']['datetime']['datetime_start_day'] as $k => $v):?>
                        <option value="<?=$k;?>" <?=(isset($this->d['datetime_start_day']) && $this->d['datetime_start_day'] == $k ? 'selected' : '')?>><?=$v;?></option>
                    <?php endforeach;?>
                </select>
            </td>
            <td>
                <span class="dashicons dashicons-editor-help" title="<?php esc_attr_e('The first day of the week in the calendar', 'contact-form-z');?>"></span>
            </td>
        </tr>
        <tr>
            <td><?php esc_attr_e('Step minutes', 'contact-form-z');?></td>
            <td>
                <input type="number" name="datetime_minutes_step[]" class="zcf_datetime_minutes_step" min="1" max="60" spellcheck="true"
                <?=(isset($this->d['datetime_field_type']) && in_array($this->d['datetime_field_type'], ['time', 'datetime']) ? '' : 'readonly')?>
                       value="<?=(isset($this->d['datetime_minutes_step']) ? $this->d['datetime_minutes_step'] : '')?>"
                       >
            </td>
            <td>
                <span class="dashicons dashicons-editor-help" title="<?php esc_attr_e('Increment in minutes for time intervals selected in the calendar. Minimum: 1, maximum: 60. Default: 5.', 'contact-form-z');?>"></span>
            </td>
        </tr>
        <tr>
            <td><?php esc_attr_e('Min value', 'contact-form-z');?></td>
            <td>
                <select name="date_min_limit[]" class="zcf_datetime_limit" data-limit-type="min">
                    <?php foreach(ZCFORM_SELECTOR['fields']['datetime']['datetime_list'] as $k => $v):?>
                        <option value="<?=$k;?>" <?=(isset($this->d['date_min_limit']) && $this->d['date_min_limit'] == $k ? 'selected' : '')?>><?=$v;?></option>
                    <?php endforeach;?>
                </select>
                <table class="zcf_children_table">
                    <tr class="zcf_set_datetime_limit <?=(isset($this->d['date_min_limit']) && $this->d['date_min_limit'] != 1 ? 'zcf_hide_text' : '')?>">
                        <td>
                            <input type="text" 
                                   class="zcf_date_value_min zcf_set_calendar_date zcf_limit_change" 
                                   name="date_min_value[]" autocomplete="off" placeholder="<?php esc_attr_e('date', 'contact-form-z');?>"
                                   value="<?=(isset($this->d['date_min_value']) ? $this->d['date_min_value'] : '')?>"
                                   >
                        </td>
                        <td>
                            <input type="text" 
                                   class="zcf_time_value_min zcf_set_calendar_time zcf_limit_change" 
                                   name="time_min_value[]" autocomplete="off" placeholder="<?php esc_attr_e('time', 'contact-form-z');?>"
                                   value="<?=(isset($this->d['time_min_value']) ? $this->d['time_min_value'] : '')?>"
                                   >
                        </td>
                    </tr>
                    <tr class="zcf_set_interval_limit <?=(isset($this->d['date_min_limit']) && $this->d['date_min_limit'] != 3 ? 'zcf_hide_text' : '')?>">
                        <td>
                            <input type="number" 
                                   class="zcf_datetime_interval_days_min zcf_limit_input" 
                                   name="datetime_min_days[]" spellcheck="true" placeholder="<?php esc_attr_e('days', 'contact-form-z');?>"
                                   value="<?=(isset($this->d['datetime_min_days']) ? $this->d['datetime_min_days'] : '')?>"
                                   >
                        </td>
                        <td>
                            <input type="number" 
                                   class="zcf_datetime_interval_minutes_min zcf_limit_input" 
                                   name="datetime_min_minutes[]" spellcheck="true" placeholder="<?php esc_attr_e('minutes', 'contact-form-z');?>"
                                   value="<?=(isset($this->d['datetime_min_minutes']) ? $this->d['datetime_min_minutes'] : '')?>"
                                   >
                        </td>
                    </tr>
                </table>
            </td>
            <td>
                <span class="dashicons dashicons-editor-help" title="<?php esc_attr_e('Minimum date and time selected in the field', 'contact-form-z');?>"></span>
            </td>
        </tr>
        <tr>
            <td><?php esc_attr_e('Max value', 'contact-form-z');?></td>
            <td>
                <select name="date_max_limit[]" class="zcf_datetime_limit" data-limit-type="max">
                    <?php foreach(ZCFORM_SELECTOR['fields']['datetime']['datetime_list'] as $k => $v):?>
                        <option value="<?=$k;?>" <?=(isset($this->d['date_max_limit']) && $this->d['date_max_limit'] == $k ? 'selected' : '')?>><?=$v;?></option>
                    <?php endforeach;?>
                </select>
                <table class="zcf_children_table">
                    <tr class="zcf_set_datetime_limit <?=(isset($this->d['date_max_limit']) && $this->d['date_max_limit'] != 1 ? 'zcf_hide_text' : '')?>">
                        <td>
                            <input type="text" 
                                   class="zcf_date_value_max zcf_set_calendar_date zcf_limit_change" 
                                   name="date_max_value[]" autocomplete="off" placeholder="<?php esc_attr_e('date', 'contact-form-z');?>"
                                   value="<?=(isset($this->d['date_max_value']) ? $this->d['date_max_value'] : '')?>"
                                   >
                        </td>
                        <td>
                            <input type="text" 
                                   class="zcf_time_value_max zcf_set_calendar_time zcf_limit_change" 
                                   name="time_max_value[]" autocomplete="off" placeholder="<?php esc_attr_e('time', 'contact-form-z');?>"
                                   value="<?=(isset($this->d['time_max_value']) ? $this->d['time_max_value'] : '')?>"
                                   >
                        </td>
                    </tr>
                    <tr class="zcf_set_interval_limit <?=(isset($this->d['date_max_limit']) && $this->d['date_max_limit'] != 3 ? 'zcf_hide_text' : '')?>">
                        <td>
                            <input type="number" 
                                   class="zcf_datetime_interval_days_max zcf_limit_input" 
                                   name="datetime_max_days[]" spellcheck="true" placeholder="<?php esc_attr_e('days', 'contact-form-z');?>"
                                   value="<?=(isset($this->d['datetime_max_days']) ? $this->d['datetime_max_days'] : '')?>"
                                   >
                        </td>
                        <td>
                            <input type="number" 
                                   class="zcf_datetime_interval_minutes_max zcf_limit_input" 
                                   name="datetime_max_minutes[]" spellcheck="true" placeholder="<?php esc_attr_e('minutes', 'contact-form-z');?>"
                                   value="<?=(isset($this->d['datetime_max_minutes']) ? $this->d['datetime_max_minutes'] : '')?>"
                                   >
                        </td>
                    </tr>
                </table>
            </td>
            <td>
                <span class="dashicons dashicons-editor-help" title="<?php esc_attr_e('Maximum date and time selected in the field', 'contact-form-z');?>"></span>
            </td>
        </tr>
        <tr>
            <td><?php esc_attr_e('ID', 'contact-form-z');?></td>
            <td>
                <input type="text" name="datetime_list_id[]" value="<?=(isset($this->d['datetime_list_id']) ? $this->d['datetime_list_id'] : '')?>">
            </td>
            <td>
                <span class="dashicons dashicons-editor-help" title="<?php esc_attr_e('Form element ID attribute (HTML)', 'contact-form-z');?>"></span>
            </td>
        </tr>
        <tr>
            <td><?php esc_attr_e('Class', 'contact-form-z');?></td>
            <td>
                <input type="text" name="datetime_list_class[]" value="<?=(isset($this->d['datetime_list_class']) ? $this->d['datetime_list_class'] : '')?>">
            </td>
            <td>
                <span class="dashicons dashicons-editor-help" title="<?php esc_attr_e('Form element Class attribute (HTML)', 'contact-form-z');?>"></span>
            </td>
        </tr>
    </table>
</div>