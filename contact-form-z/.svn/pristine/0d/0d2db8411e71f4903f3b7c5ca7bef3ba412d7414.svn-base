<div class="meta-box-sortables ui-sortable">

    <div class="postbox">
        <div class="inside">
            <table class="zcf_mail_field_list">
                <thead>
                    <tr>
                        <th><?php esc_attr_e('Contact Field Headers', 'contact-form-z');?></th>
                        <th><?php esc_attr_e('Code to insert in the text of the mail', 'contact-form-z');?></th>
                    </tr>
                </thead>
                <tbody class="zcf_mail_field_list_body">
                    <?php foreach($this->content['fields'] as $data):?>
                        <?php if(!in_array(key($data), ['file', 'button', 'mathcaptcha', 'recaptcha', 'accept'])):?>
                            <tr class="zcf_mail_field_<?=key($data).'_'.$data[key($data)][key($data).'_rank'];?>">
                                <td>
                                    <?php if(!empty($data[key($data)][key($data).'_title'])):?>
                                        <?=$data[key($data)][key($data).'_title'];?>
                                    <?php else:?>
                                        <?=key($data);?> <?=$data[key($data)][key($data).'_rank'];?>
                                    <?php endif;?>
                                </td>
                                <td class="zcf_shortcode">[<?=key($data);?>-<?=$data[key($data)][key($data).'_rank'];?>]</td>
                            </tr>
                        <?php endif;?>
                    <?php endforeach;?>
                </tbody>
            </table>
        </div>
    </div>
</div>
<?php foreach($this->content['mail'] as $key => $value):?>
    <div class="meta-box-sortables ui-sortable zcf_mail_template <?=(array_keys($this->content['mail'])[0] == $key ? 'zcf_general_mail_template' : '')?>">
        <div class="postbox">
            <div class="zcf_header_mail_title">
                <table>
                    <tr>
                        <td>
                            <b><?php (array_keys($this->content['mail'])[0] == $key ? esc_attr_e('Mail template', 'contact-form-z') : esc_attr_e('Additional mail template', 'contact-form-z'));?></b>
                        </td>
                        <td>
                            <button 
                                type="button"
                                class="button zcf_block_mail_remove <?=(array_keys($this->content['mail'])[0] == $key ? 'zcf_hidden_block' : '')?>" 
                                title="<?php esc_attr_e('Delete letter template', 'contact-form-z');?>" 
                                >
                                <span class="dashicons dashicons-no"></span>
                            </button>
                        </td>
                    </tr>
                </table>
            </div>

            <div class="inside">
                <input type="hidden" name="mail_template[]" value="<?=$key;?>" />
                <table class="zcf_mail_table">
                    <tr>
                        <td><?php esc_attr_e('To', 'contact-form-z');?></td>
                        <td>
                            <?php $check_mail = ZCForm_Static::zcform_check_mail_block((empty($value['whom']) ? get_user_option('user_email') : $value['whom']));?>
                            <input 
                                type="email" 
                                name="whom[<?=$key;?>]" 
                                class="zcf_change_mail_field_value"
                                value="<?=empty($value['whom']) ? get_user_option('user_email') : $value['whom']?>"
                                data-check="false"
                                data-check-state="<?=!$check_mail ? 'false' : 'true'?>"
                                />
                                <?php if($check_mail):?>
                                <div class="zcf_mail_field_error"><span class="dashicons dashicons-warning"></span> <?=$check_mail?></div>
                            <?php endif;?>
                        </td>
                    </tr>
                    <tr>
                        <td><?php esc_attr_e('From', 'contact-form-z');?></td>
                        <td>
                            <?php $check_mail = ZCForm_Static::zcform_check_mail_block((empty($value['from']) ? 'wordpress@'.$_SERVER['SERVER_NAME'] : $value['from']), true);?>
                            <input 
                                type="email" 
                                name="from[<?=$key;?>]" 
                                class="zcf_change_mail_field_value"
                                value="<?=empty($value['from']) ? 'wordpress@'.$_SERVER['SERVER_NAME'] : $value['from']?>"
                                data-check="true"
                                data-check-state="<?=!$check_mail ? 'false' : 'true'?>"
                                />
                                <?php if($check_mail):?>
                            <div class="zcf_mail_field_error"><span class="dashicons dashicons-warning"></span> <?=$check_mail?></div>
                            <?php endif;?>
                        </td>
                    </tr>
                    <tr>
                        <td><?php esc_attr_e('Reply to', 'contact-form-z');?></td>
                        <td>
                            <?php $check_mail = ZCForm_Static::zcform_check_mail_block((empty($value['reply-to']) ? 'wordpress@'.$_SERVER['SERVER_NAME'] : $value['reply-to']));?>
                            <input 
                                type="email" 
                                name="reply-to[<?=$key;?>]" 
                                class="zcf_change_mail_field_value"
                                value="<?=empty($value['reply-to']) ? 'wordpress@'.$_SERVER['SERVER_NAME'] : $value['reply-to']?>"
                                data-check="false"
                                data-check-state="<?=!$check_mail ? 'false' : 'true'?>"
                                />
                                <?php if($check_mail):?>
                                <div class="zcf_mail_field_error"><span class="dashicons dashicons-warning"></span> <?=$check_mail?></div>
                            <?php endif;?>
                        </td>
                    </tr>
                    <tr>
                        <td><?php esc_attr_e('Subject', 'contact-form-z');?></td>
                        <td>
                            <input type="text" name="subject[<?=$key;?>]" value="<?=$value['subject']?>"/>
                        </td>
                    </tr>
                    <tr>
                        <td><?php esc_attr_e('Message body', 'contact-form-z');?></td>
                        <td class="zcf_mail_editor">
                            <?php
                            wp_editor($value['body_mail'], "zcf_editor_id_{$key}", [
                                'wpautop' => 1,
                                'media_buttons' => 0,
                                'textarea_name' => "body_mail[{$key}]",
                                'dfw' => 0,
                                'tinymce' => 1,
                                'quicktags' => 1,
                                'editor_height' => 400
                            ]);
                            ?> 
                        </td>
                    </tr>
                    <tr>
                        <td>
                            <?php esc_attr_e('Attached files', 'contact-form-z');?>
                        </td>
                        <td>
                            <table class="zcf_add_mail_list_file">
                                <?php foreach($this->content['fields'] as $data):?>
                                    <?php if(key($data) === 'file'):?>
                                        <tr class="zcf_mail_field_file_<?=$data[key($data)][key($data).'_rank'];?>">
                                            <td>
                                                <?php if(!empty($data[key($data)][key($data).'_title'])):?>
                                                    <?=$data[key($data)][key($data).'_title'];?>
                                                <?php else:?>
                                                    <?=key($data);?> <?=$data[key($data)][key($data).'_rank'];?>
                                                <?php endif;?>
                                            <td>
                                                <label class="zcf_label">
                                                    <input type="checkbox" name="mail_file[<?=$key;?>][]" value="<?=$data[key($data)][key($data).'_rank'];?>"
                                                    <?=in_array($data[key($data)][key($data).'_rank'], $value['files']) ? 'checked' : ''?>
                                                           >
                                                    <span class="zcf_check_admin zcf_check_admin_checkbox"></span>
                                                </label>
                                            </td>
                                        </tr>
                                    <?php endif;?>
                                <?php endforeach;?>
                            </table>
                        </td>
                    </tr>
                </table>
            </div>
        </div>
    </div>
<?php endforeach;?>
<table class="zcf_options_table zcf_title_show_hide">
    <tr>
        <td>
            <button type="button" class="button button-primary zcf_add_mail_block" data-mail-title="<?php esc_attr_e('Additional mail template', 'contact-form-z');?>"><?php esc_attr_e('Add mail template', 'contact-form-z');?> <span class="dashicons dashicons-plus"></span></button>
        </td>
        <td></td>
    </tr>
</table>

