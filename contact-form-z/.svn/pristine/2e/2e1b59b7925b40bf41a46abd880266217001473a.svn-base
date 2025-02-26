<div class="meta-box-sortables ui-sortable">
    <div class="postbox">
        <table class="zcf_options_table">
            <tr>
                <td>
                    <b><?php esc_attr_e('‘Thank you’ page', 'contact-form-z');?></b>
                </td>
                <td>
                </td>
            </tr>
        </table>

        <div class="inside ">
            <table class="zcf_options_table_list">
                <tr>
                    <td colspan="2">
                        <select class="zcf_redirection_rules" name="redirection_rules">
                            <?php foreach(ZCFORM_SELECTOR['options']['redirection_rules'] as $k => $v):?>
                                <option value="<?=$k;?>" <?=(isset($this->content['options']['redirection_rules']) && $this->content['options']['redirection_rules'] == $k ? 'selected' : '')?>><?=$v;?></option>
                            <?php endforeach;?>
                        </select>
                    </td>
                </tr>
                <tr class="zcf_redirection_one_page <?=(isset($this->content['options']['redirection_rules']) && $this->content['options']['redirection_rules'] === 'one' ? '' : 'zcf_hide_text')?>">
                    <td>URL</td>
                    <td>
                        <input type="text" name="one_page" value="<?=(isset($this->content['options']['one_page']) ? $this->content['options']['one_page'] : '')?>">
                    </td>
                </tr>
            </table>
            <table class="zcf_options_table_list_more <?=(isset($this->content['options']['redirection_rules']) && $this->content['options']['redirection_rules'] === 'more' ? '' : 'zcf_hide_text')?>">
                <tr>
                    <th><?php esc_attr_e('Field', 'contact-form-z');?></th>
                    <th><?php esc_attr_e('Value', 'contact-form-z');?></th>
                    <th><?php esc_attr_e('URL', 'contact-form-z');?></th>
                    <th></th>
                </tr>
                <tbody class="zcf_redirection_more_body_row">
                    <?php if(!isset($this->content['options']['list'])):?>
                        <tr class="zcf_redirection_more_page">
                            <td>
                                <select class="zcf_redirection_rules_options" name="more_page_field[]">
                                    <option value=""></option>
                                    <?php foreach($this->content['fields'] as $data):?>
                                        <?php if(in_array(key($data), ['select', 'checkbox', 'radio', 'rating'])):?>
                                            <option value="<?=key($data);?>_<?=$data[key($data)][key($data).'_rank'];?>">
                                                <?php if(!empty($data[key($data)][key($data).'_title'])):?>
                                                    <?=$data[key($data)][key($data).'_title'];?>
                                                <?php else:?>
                                                    <?=key($data);?> <?=$data[key($data)][key($data).'_rank'];?>
                                                <?php endif;?>
                                            </option>
                                        <?php endif;?>
                                    <?php endforeach;?>
                                </select>
                            </td>
                            <td>
                                <select class="zcf_redirection_rules_options_list" name="more_page_list[]">
                                    <option value=""></option>
                                </select>
                            </td>
                            <td>
                                <input type="text" name="more_page_url[]">
                            </td>
                            <td>
                                <button type="button" class="button zcf_redirection_rules_add_clone_row">
                                    <span class="dashicons dashicons-plus"></span>
                                </button>
                            </td>
                        </tr>
                    <?php else:?>
                        <?php foreach($this->content['options']['list'] as $v):?>
                            <tr <?=($this->count_key_list == 0 ? 'class="zcf_redirection_more_page"' : "")?>>
                                <td>
                                    <select class="zcf_redirection_rules_options" name="more_page_field[]">
                                        <option value=""></option>
                                        <?php foreach($this->content['fields'] as $data_key => $data):?>
                                            <?php if(in_array(key($data), ['select', 'checkbox', 'radio', 'rating'])):?>
                                                <option value="<?=key($data);?>_<?=$data[key($data)][key($data).'_rank'];?>" 
                                                <?php
                                                $r_more = explode('_', $v['more_page_field']);
                                                if($r_more[1] == $data[key($data)][key($data).'_rank'] && $r_more[0] == key($data)):
                                                    $this->redirect_position[0] = $data_key;
                                                    $this->redirect_position[1] = key($data);
                                                    $this->redirect_position[2] = $data[key($data)][key($data).'_rank'];
                                                    echo 'selected';
                                                endif;
                                                ?>
                                                        >
                                                            <?php if(!empty($data[key($data)][key($data).'_title'])):?>
                                                                <?=$data[key($data)][key($data).'_title'];?>
                                                            <?php else:?>
                                                                <?=key($data);?> <?=$data[key($data)][key($data).'_rank'];?>
                                                            <?php endif;?>
                                                </option>
                                            <?php endif;?>
                                        <?php endforeach;?>
                                    </select>
                                </td>
                                <td>
                                    <select class="zcf_redirection_rules_options_list" name="more_page_list[]">
                                        <option value=""></option>
                                        <?php foreach($this->content['fields'][$this->redirect_position[0]][$this->redirect_position[1]]['list'] as $data_list_key => $data_list):?>
                                            <option value="<?=$this->redirect_position[1].'_'.$this->redirect_position[2].'_'.$data_list_key?>"
                                            <?=(explode('_', $v['more_page_list'])[2] == $data_list_key ? 'selected' : '')?>
                                                    >
                                                        <?php if(!empty($data_list[$this->redirect_position[1].'_list_title'])):?>
                                                            <?=$data_list[$this->redirect_position[1].'_list_title'];?>
                                                        <?php else:?>
                                                            <?=$this->redirect_position[1].'-'.$this->redirect_position[2].'-'.$data_list_key?>
                                                        <?php endif;?>
                                            </option>
                                        <?php endforeach;?>
                                    </select>
                                </td>
                                <td>
                                    <input type="text" name="more_page_url[]" value="<?=stripslashes($v['more_page_url'])?>">
                                </td>
                                <td>
                                    <button type="button" class="button <?=($this->count_key_list == 0 ? "zcf_redirection_rules_add_clone_row" : "zcf_list_remove_row")?>">
                                        <span class="dashicons dashicons-<?=($this->count_key_list++ == 0 ? "plus" : "minus")?>"></span>
                                    </button>
                                </td>
                            </tr>
                        <?php endforeach;?>
                    <?php endif;?>
                </tbody>
            </table>
        </div>
    </div>
</div>

<div class="meta-box-sortables ui-sortable">
    <div class="postbox">
        <table class="zcf_options_table">
            <tr>
                <td>
                    <b><?php esc_attr_e('Field rules', 'contact-form-z');?></b>
                </td>
                <td></td>
            </tr>
        </table>

        <div class="inside zcf_rules_block">
            <?=ZCForm_Static::zcform_rules_blocks($this->content)?>
        </div>
    </div>
</div>
<table class="zcf_options_table zcf_title_show_hide">
    <tr>
        <td>
            <button type="button" class="button button-primary zcf_rules_field_block"><?php esc_attr_e('Add a rule', 'contact-form-z');?> <span class="dashicons dashicons-plus"></span></button>
        </td>
        <td></td>
    </tr>
</table>