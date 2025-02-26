<?php $p = 0;?>
<div class="meta-box-sortables ui-sortable">
    <div class="postbox">
        <table class="zcf_options_table">
            <tr>
                <td>
                    <b><?php esc_attr_e('Use shortcode', 'contact-form-z');?></b>
                </td>
                <td>
                </td>
            </tr>
        </table>

        <div class="inside ">
            <table class="zcf_options_table_list">
                <tr>
                    <td class="zcf_shortcode zcf_padding_top_row">
                        [<?=ZCFORM_PLUGIN_NAME_ABBR;?> id=<?=$form_id;?>]
                    </td>
                </tr>
                <tr>
                    <td class="zcf_padding_top_row">
                        <?php esc_attr_e('Copy this shortcode and paste it into your posts, pages or text widget content', 'contact-form-z');?>
                    </td>
                </tr>
            </table>
        </div>
    </div>
</div>

<div class="meta-box-sortables ui-sortable">
    <div class="postbox">
        <table class="zcf_options_table">
            <tr>
                <td>
                    <b><?php esc_attr_e('Select pages', 'contact-form-z');?></b>
                </td>
                <td>
                    <label class="zcf_label">
                        <label class="zcf_container_title_label"><?php esc_attr_e('Activate', 'contact-form-z');?></label>
                        <input type="checkbox" name="enable_paste_form_list" class="zcf_enable_paste_form_list" <?=(isset($this->content['paste']['enable_paste_form_list']) && $this->content['paste']['enable_paste_form_list'] ? 'checked' : '')?>>
                        <span class="zcf_check_admin zcf_check_admin_checkbox"></span>
                    </label>
                </td>
            </tr>
        </table>

        <div class="inside <?=(isset($this->content['paste']['enable_paste_form_list']) && $this->content['paste']['enable_paste_form_list'] ? '' : 'zcf_hide_text')?>">
            <div class="zcf_paste_info"><?php esc_attr_e('Attention! After saving the data, the form will be automatically displayed on all pages and posts indicated.', 'contact-form-z');?></div>
            <table class="zcf_add_form_list">
                <tr>
                    <th><?php esc_attr_e('Type', 'contact-form-z');?></th>
                    <th><?php esc_attr_e('Title', 'contact-form-z');?></th>
                    <th><?php esc_attr_e('Location', 'contact-form-z');?></th>
                    <th></th>
                </tr>
                <tbody class="zcf_add_form_list_body_row">
                    <?php foreach($this->content['paste']['list'] as $v):?>
                        <tr <?=($this->count_key_list == 0 ? 'class="zcf_add_form_list_row"' : "")?>>
                            <td>
                                <select class="zcf_add_form_list_type" name="form_list_type[]">
                                    <?php foreach(ZCFORM_SELECTOR['paste']['form_list_type'] as $k0 => $v0):?>
                                        <option value="<?=$k0;?>" <?=(isset($v['form_list_type']) && $v['form_list_type'] == $k0 ? 'selected' : '')?>><?=$v0;?></option>
                                    <?php endforeach;?>
                                </select>
                            </td>
                            <td>
                                <select class="zcf_add_form_list_title zcf_add_form_list_title_page <?=(isset($v['form_list_type']) && $v['form_list_type'] === 'page' ? '' : 'zcf_hide_text')?>" name="form_list_page[]">
                                    <option value=""></option>
                                    <?php foreach($this->zcf_wp_page as $page):?>
                                        <option value="<?=$page->ID;?>" <?=(isset($v['form_list_page']) && $v['form_list_page'] == $page->ID ? 'selected' : '')?>><?=$page->post_title;?></option>
                                    <?php endforeach;?>
                                </select>
                                <select class="zcf_add_form_list_title zcf_add_form_list_title_post <?=(isset($v['form_list_type']) && $v['form_list_type'] === 'post' ? '' : 'zcf_hide_text')?>" name="form_list_post[]">
                                    <option value=""></option>
                                    <?php foreach($this->zcf_wp_post as $post):?>
                                        <option value="<?=$post->ID;?>" <?=(isset($v['form_list_post']) && $v['form_list_post'] == $post->ID ? 'selected' : '')?>><?=$post->post_title;?></option>
                                    <?php endforeach;?>
                                </select>
                            </td>
                            <td>
                                <select class="zcf_add_form_list_position" name="form_list_position[]">
                                    <?php foreach(ZCFORM_SELECTOR['paste']['form_list_position'] as $k0 => $v0):?>
                                        <option value="<?=$k0;?>" <?=(isset($v['form_list_position']) && $v['form_list_position'] == $k0 ? 'selected' : '')?>><?=$v0;?></option>
                                    <?php endforeach;?>
                                </select>
                            </td>
                            <td>
                                <button type="button" class="button <?=($this->count_key_list == 0 ? "zcf_add_form_add_clone_row" : "zcf_list_remove_row")?>">
                                    <span class="dashicons dashicons-<?=($this->count_key_list++ == 0 ? "plus" : "minus")?>"></span>
                                </button>
                            </td>
                        </tr>
                    <?php endforeach;?>
                </tbody>
            </table>
        </div>
    </div>
</div>