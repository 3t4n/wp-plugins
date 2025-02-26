<div class="meta-box-sortables ui-sortable">
    <div class="postbox">
        <table class="zcf_options_table">
            <tr>
                <td>
                    <b><?php esc_attr_e('Form field settings', 'contact-form-z');?></b>
                </td>
                <td>
                </td>
            </tr>
        </table>
        <div class="inside ">
            <table class="zcf_style_table_list">
                <tr>
                    <td><?php esc_attr_e('Colors style', 'contact-form-z');?></td>
                    <td>
                        <select class="zcf_colors_style" name="colors_style">
                            <?php foreach(ZCFORM_COLORS_STYLE as $k => $v):?>
                                <option value="<?=$k;?>" <?=(isset($this->content['style']['colors_style']) && $this->content['style']['colors_style'] == $k ? 'selected' : '')?>><?=$v['name'];?></option>
                            <?php endforeach;?>
                        </select>
                    </td>
                </tr>
            </table>
            <hr>
            <table class="zcf_style_table_list">
                <tr>
                    <td><?php esc_attr_e('Header color', 'contact-form-z');?></td>
                    <td>
                        <input class="zcf_style_color_title" name="color_title" type="text" value="<?=$this->content['style']['color_title'];?>" />
                    </td>
                </tr>
                <tr>
                    <td><?php esc_attr_e('Frame color', 'contact-form-z');?></td>
                    <td>
                        <input class="zcf_style_color_border" name="color_border" type="text" value="<?=$this->content['style']['color_border'];?>" />
                    </td>
                </tr>
                <tr>
                    <td><?php esc_attr_e('Frame color in focus', 'contact-form-z');?></td>
                    <td>
                        <input class="zcf_style_color_focus" name="color_focus" type="text" value="<?=$this->content['style']['color_focus'];?>" />
                    </td>
                </tr>
                <tr>
                    <td><?php esc_attr_e('Button color', 'contact-form-z');?></td>
                    <td>
                        <input class="zcf_style_color_button" name="color_button" type="text" value="<?=$this->content['style']['color_button'];?>" />
                    </td>
                </tr>
                <tr>
                    <td><?php esc_attr_e('Hover button color', 'contact-form-z');?></td>
                    <td>
                        <input class="zcf_style_color_button_hover" name="color_button_hover" type="text" value="<?=$this->content['style']['color_button_hover'];?>" />
                    </td>
                </tr>
                <tr>
                    <td><?php esc_attr_e('Button text color', 'contact-form-z');?></td>
                    <td>
                        <input class="zcf_style_color_button_text" name="color_button_text" type="text" value="<?=$this->content['style']['color_button_text'];?>" />
                    </td>
                </tr>
                <tr>
                    <td><?php esc_attr_e('Checkbox and radio color', 'contact-form-z');?></td>
                    <td>
                        <input class="zcf_style_color_checked" name="color_checked" type="text" value="<?=$this->content['style']['color_checked'];?>" />
                    </td>
                </tr>
                <tr>
                    <td><?php esc_attr_e('Fields width', 'contact-form-z');?></td>
                    <td>
                        <table>
                            <tr>
                                <td>
                                    <input class="zcf_style_width_value" name="width_value" type="text" value="<?=$this->content['style']['width_value'];?>" />
                                </td>
                                <td>
                                    <select class="zcf_style_width_unit" name="width_unit">
                                        <?php foreach(ZCFORM_SELECTOR['style']['width_unit'] as $k => $v):?>
                                            <option value="<?=$k;?>" <?=(isset($this->content['style']['width_unit']) && $this->content['style']['width_unit'] == $k ? 'selected' : '')?>><?=$v;?></option>
                                        <?php endforeach;?>
                                    </select>
                                </td>
                            </tr>
                        </table>
                    </td>
                </tr>
                <tr>
                    <td><?php esc_attr_e('Field height', 'contact-form-z');?></td>
                    <td>
                        <table>
                            <tr>
                                <td>
                                    <input class="zcf_style_height_value" name="height_value" type="text" value="<?=$this->content['style']['height_value'];?>" />
                                </td>
                                <td>
                                    <select class="zcf_style_height_unit" name="height_unit">
                                        <?php foreach(ZCFORM_SELECTOR['style']['height_unit'] as $k => $v):?>
                                            <option value="<?=$k;?>" <?=(isset($this->content['style']['height_unit']) && $this->content['style']['height_unit'] == $k ? 'selected' : '')?>><?=$v;?></option>
                                        <?php endforeach;?>
                                    </select>
                                </td>
                            </tr>
                        </table>
                    </td>
                </tr>
                <tr>
                    <td><?php esc_attr_e('Text area field height', 'contact-form-z');?></td>
                    <td>
                        <table>
                            <tr>
                                <td>
                                    <input class="zcf_style_height_textarea_value" name="height_textarea_value" type="text" value="<?=$this->content['style']['height_textarea_value'];?>" />
                                </td>
                                <td>
                                    <select class="zcf_style_height_textarea_unit" name="height_textarea_unit">
                                        <?php foreach(ZCFORM_SELECTOR['style']['height_unit'] as $k => $v):?>
                                            <option value="<?=$k;?>" <?=(isset($this->content['style']['height_textarea_unit']) && $this->content['style']['height_textarea_unit'] == $k ? 'selected' : '')?>><?=$v;?></option>
                                        <?php endforeach;?>
                                    </select>
                                </td>
                            </tr>
                        </table>
                    </td>
                </tr>
                <tr>
                    <td><?php esc_attr_e('Button Width', 'contact-form-z');?></td>
                    <td>
                        <table>
                            <tr>
                                <td>
                                    <input class="zcf_style_width_button_value" name="width_button_value" type="text" value="<?=$this->content['style']['width_button_value'];?>"
                                    <?=(isset($this->content['style']['width_button_unit']) && $this->content['style']['width_button_unit'] != 'initial' ? '' : 'readonly')?>
                                           />
                                </td>
                                <td>
                                    <select class="zcf_style_width_button_unit" name="width_button_unit">
                                        <?php foreach(ZCFORM_SELECTOR['style']['width_button_unit'] as $k => $v):?>
                                            <option value="<?=$k;?>" <?=(isset($this->content['style']['width_button_unit']) && $this->content['style']['width_button_unit'] == $k ? 'selected' : '')?>><?=$v;?></option>
                                        <?php endforeach;?>
                                    </select>
                                </td>
                            </tr>
                        </table>
                    </td>
                </tr>
                <tr>
                    <td><?php esc_attr_e('Button Height', 'contact-form-z');?></td>
                    <td>
                        <table>
                            <tr>
                                <td>
                                    <input class="zcf_style_height_button_value" name="height_button_value" type="text" value="<?=$this->content['style']['height_button_value'];?>"
                                    <?=(isset($this->content['style']['height_button_unit']) && $this->content['style']['height_button_unit'] != 'initial' ? '' : 'readonly')?>
                                           />
                                </td>
                                <td>
                                    <select class="zcf_style_height_button_unit" name="height_button_unit">
                                        <?php foreach(ZCFORM_SELECTOR['style']['height_button_unit'] as $k => $v):?>
                                            <option value="<?=$k;?>" <?=(isset($this->content['style']['height_button_unit']) && $this->content['style']['height_button_unit'] == $k ? 'selected' : '')?>><?=$v;?></option>
                                        <?php endforeach;?>
                                    </select>
                                </td>
                            </tr>
                        </table>
                    </td>
                </tr>
                <tr>
                    <td><?php esc_attr_e('Rounded Fields', 'contact-form-z');?></td>
                    <td>
                        <table>
                            <tr>
                                <td>
                                    <input class="zcf_style_border_fields_value" name="border_fields_value" type="text" value="<?=$this->content['style']['border_fields_value'];?>" />
                                </td>
                                <td>
                                    <select class="zcf_style_border_fields_unit" name="border_fields_unit">
                                        <?php foreach(ZCFORM_SELECTOR['style']['height_unit'] as $k => $v):?>
                                            <option value="<?=$k;?>" <?=(isset($this->content['style']['border_fields_unit']) && $this->content['style']['border_fields_unit'] == $k ? 'selected' : '')?>><?=$v;?></option>
                                        <?php endforeach;?>
                                    </select>
                                </td>
                            </tr>
                        </table>
                    </td>
                </tr>
                <tr>
                    <td><?php esc_attr_e('Fields frame shadow when in focus', 'contact-form-z');?></td>
                    <td>
                        <label class="zcf_label">
                            <input class="zcf_style_shadow" name="shadow" type="checkbox" <?=(isset($this->content['style']['shadow']) && $this->content['style']['shadow'] ? 'checked' : '')?> />
                            <span class="zcf_check_admin zcf_check_admin_checkbox"></span>
                        </label>
                    </td>
                </tr>
            </table>
        </div>
    </div>
</div>