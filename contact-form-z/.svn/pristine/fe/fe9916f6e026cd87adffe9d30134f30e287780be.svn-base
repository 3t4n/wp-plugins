
<div class="wrap zcf">
    <?=ZCForm_Static::zcform_admin_preload();?>

    <h1><?php _e('Settings');?></h1>

    <div id="zcf_tabs">
        <ul>
            <li><a href="#zcf_recaptcha"><?php esc_attr_e('reCAPTCHA', 'contact-form-z');?></a></li>
        </ul>
        <div id="zcf_recaptcha">
            <?=ZCForm_Static::zcform_admin_header_help_block('recaptcha');?>
            <div class="meta-box-sortables ui-sortable">
                <div class="postbox">
                    <table class="zcf_options_table">
                        <tr>
                            <td>
                                <b><?php esc_attr_e('Keeping Keys', 'contact-form-z');?></b>
                            </td>
                            <td>
                            </td>
                        </tr>
                    </table>

                    <div class="inside ">
                        <form id="zcf_recaptcha_content">
                            <input type="hidden" name="action" value="save_recaptcha">
                            <table class="zcf_settings_table">
                                <tr>
                                    <td><?php esc_attr_e('Key', 'contact-form-z');?></td>
                                    <td>
                                        <?php if(isset($settings['recaptcha'])):?>
                                            <b class="zcf_recaptcha_text"><?=$settings['recaptcha']['key'];?></b>
                                        <?php endif;?>
                                        <input type="text" name="key" class="zcf_recaptcha_input <?=(isset($settings['recaptcha']) ? 'zcf_hide_text' : '')?>">
                                    </td>
                                </tr>
                                <tr>
                                    <td><?php esc_attr_e('The secret key', 'contact-form-z');?></td>
                                    <td>
                                        <?php if(isset($settings['recaptcha'])):?>
                                            <b class="zcf_recaptcha_text"><?=ZCForm_Static::zcform_hide_secret_key($settings['recaptcha']['secret_key']);?></b>
                                        <?php endif;?>
                                        <input type="text" name="secret_key" class="zcf_recaptcha_input <?=(isset($settings['recaptcha']) ? 'zcf_hide_text' : '')?>">
                                    </td>
                                </tr>
                                <tr class="<?=(!isset($settings['recaptcha']) ? 'zcf_hide_text' : '')?>">
                                    <td colspan="2">
                                        <input type="button" class="button button-default zcf_update_recaptcha" value="<?php esc_attr_e('Change', 'contact-form-z');?>">
                                    </td>
                                </tr>
                                <tr class="zcf_recaptcha_input <?=(isset($settings['recaptcha']) ? 'zcf_hide_text' : '')?>">
                                    <td colspan="2">
                                        <input type="button" class="button button-primary zcf_save_recaptcha" value="<?php esc_attr_e('Save', 'contact-form-z');?>">
                                    </td>
                                </tr>
                            </table>
                        </form>
                    </div>
                </div>
            </div>
        </div>

    </div>

</div>

