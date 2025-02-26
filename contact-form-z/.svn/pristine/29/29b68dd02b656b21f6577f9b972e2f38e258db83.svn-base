<div class="meta-box-sortables ui-sortable">
    <div class="postbox">
        <table class="zcf_options_table zcf_title_show_hide">
            <tr>
                <td>
                    <b><?php esc_attr_e('Events for Internet counters', 'contact-form-z');?></b>
                </td>
                <td>
                    <button 
                        class="button zcf_show_hide_block_event" 
                        data-zcf-state-form="off"
                        type="button"
                        >
                        <span class="dashicons dashicons-edit"></span>
                    </button>
                </td>
            </tr>
        </table>
        <div class="inside zcf_body_block_event">
            <textarea id="zcf_analytic_field" class="zcf_analytic_field" name="analytic"><?=stripcslashes($this->content['options']['analytic']);?></textarea>
        </div>
    </div>
</div>

<div class="meta-box-sortables ui-sortable">
    <div class="postbox">
        <table class="zcf_options_table">
            <tr>
                <td>
                    <b><?php esc_attr_e('CAPTCHA', 'contact-form-z');?></b>
                </td>
                <td>
                </td>
            </tr>
        </table>

        <div class="inside">
            <table class="zcf_options_table_list">
                <tr>
                    <td><?php esc_attr_e('reCAPTCHA', 'contact-form-z');?></td>
                    <td>
                        <?php if(count(ZCForm_Static::zcform_get_settings('recaptcha')) > 0):?>
                            <label class="zcf_label">
                                <input type="checkbox" class="zcf_add_recaptcha" name="recaptcha" 
                                       data-key="<?=ZCForm_Static::zcform_get_settings('recaptcha')['key'];?>"
                                       <?=(isset($this->content['options']['recaptcha']) && $this->content['options']['recaptcha'] ? 'checked' : '')?> 
                                       >
                                <span class="zcf_check_admin zcf_check_admin_checkbox"></span>
                            </label>
                        <?php else:?>
                            <?php esc_attr_e('Keys for reCAPTCHA not found. To change, go to', 'contact-form-z');?> <a href="<?=admin_url('admin.php')."?page=zcf-settings-form#zcf_recaptcha";?>" target="_blank"><?php esc_attr_e('Settings', 'contact-form-z');?></a>
                        <?php endif;?>

                    </td>
                </tr>
                <tr>
                    <td><?php esc_attr_e('Math CAPTCHA', 'contact-form-z');?></td>
                    <td>
                            <label class="zcf_label">
                                <input type="checkbox" class="zcf_add_mathcaptcha" name="mathcaptcha" 
                                       data-form-id="<?=$form_id?>"
                                       <?=(isset($this->content['options']['mathcaptcha']) && $this->content['options']['mathcaptcha'] ? 'checked' : '')?> 
                                       >
                                <span class="zcf_check_admin zcf_check_admin_checkbox"></span>
                            </label>
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
                    <b>Akismet Anti-Spam</b>
                </td>
                <td>
                    <label class="zcf_label">
                        <label class="zcf_container_title_label"><?php esc_attr_e('Activate', 'contact-form-z');?></label>
                        <input type="checkbox" name="enable_akismet" class="zcf_enable_akismet" <?=(isset($this->content['options']['akismet']['enable_akismet']) && $this->content['options']['akismet']['enable_akismet'] ? 'checked' : '')?>>
                        <span class="zcf_check_admin zcf_check_admin_checkbox"></span>
                    </label>
                </td>
            </tr>
        </table>

        <div class="inside <?=(isset($this->content['options']['akismet']['enable_akismet']) && $this->content['options']['akismet']['enable_akismet'] ? '' : 'zcf_hide_text')?>">
            <?php if(!is_callable(['Akismet', 'http_post'])):?>
                <div class="zcf_paste_info"><?php esc_attr_e('Attention! Akismet plugin not found. Please go to Plugins -> Add New and install Akismet Anti-Spam.', 'contact-form-z');?></div>
            <?php elseif(!(bool)Akismet::get_api_key()):?>
                <div class="zcf_paste_info"><?php esc_attr_e('Attention! API key plugin Akismet not found. Please go to Settings -> Akismet Anti-Spam and specify the API key.', 'contact-form-z');?></div>
            <?php else:?>
                <div class="zcf_paste_info"><?php esc_attr_e('Attention! In order for Akismet Anti-Spam to work correctly, you must specify the fields that will match the name and email of the author of the form.', 'contact-form-z');?></div>
                <table class="zcf_message_table">
                    <tr>
                        <td><?php esc_attr_e('Author Name', 'contact-form-z');?> <sup class="zcf_sup">*</sup></td>
                        <td>
                            <?=ZCForm_Static::zcform_akismet_select($this->content, 'autor');?>
                        </td>
                    <td><span class="dashicons dashicons-editor-help" title="<?php esc_attr_e('Select the form field, which will be the senders name', 'contact-form-z');?>"></span></td>
                    </tr>
                    <tr>
                        <td><?php esc_attr_e('Author Email', 'contact-form-z');?> <sup class="zcf_sup">*</sup></td>
                        <td>
                            <?=ZCForm_Static::zcform_akismet_select($this->content, 'email');?>
                        </td>
                    <td><span class="dashicons dashicons-editor-help" title="<?php esc_attr_e('Select the form field, which will be the senders email', 'contact-form-z');?>"></span></td>
                    </tr>
                </table>

            <?php endif;?>
        </div>
    </div>
</div>