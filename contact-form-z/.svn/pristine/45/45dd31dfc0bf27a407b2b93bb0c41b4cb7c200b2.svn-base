
<div class="wrap zcf">
    <div class="zcf_hdn"></div>
    <?=ZCForm_Static::zcform_admin_preload();?>

    <h1><?=(isset($editor->content["page_title"]) ? $editor->content['page_title'] : '')?> 
        <?php if($editor->content["type"] !== 'add_form'):?>
            <a class="button button-primary zcf_small_btn" href="?page=zcf-add-form"><?php esc_attr_e('Add New', 'contact-form-z');?></a>
        <?php endif;?>
    </h1>

    <div id="poststuff">

        <div id="post-body" class="metabox-holder columns-2">

            <!-- HEAD -->
            <div id="post-body-content">
                <div id="titlediv">
                    <div id="titlewrap">
                        <input type="text" name="form_title" class="zcf_general_title" value="<?=(isset($editor->content["title"]) ? $editor->content['title'] : '')?>" size="30" id="title" placeholder="<?php esc_attr_e('Enter title', 'contact-form-z');?>" spellcheck="true" autocomplete="off">
                    </div>
                    <div class="inside">
                    </div>
                </div>
                <?php if($editor->content["type"] === 'edit_form'):?>
                    <div class="zcf_info_text_block">
                        <p>
                            <?=esc_attr__('Copy this shortcode and paste it into the site pages', 'contact-form-z')?>: <span class="zcf_shortcode">[CFZ id=<?=$editor->content['id']?>]</span>
                        </p>
                    </div>
                <?php endif;?>
            </div>


            <!-- RIGHT -->
            <div id="postbox-container-1" class="postbox-container">
                <div class="meta-box-sortables">
                    <div class="postbox">
                        <h2 class="hndle ui-sortable-handle">
                            <span><?php esc_attr_e('Post', 'contact-form-z');?></span>
                            <div class="zcf_version_plugins">
                                <?=ZCFORM_PLUGIN_NAME_ABBR;?> <span>v.<?=ZCFORM_PLUGIN_NAME_VERSION;?> <?=ZCFORM_PLUGIN_RELEASE_DATE;?></span>
                            </div>
                        </h2>

                        <div class="zcf_info_form">
                            <div class="zcf_info_block">
                                <a href="<?=ZCFORM_PLUGIN_URL?>" target="_blank"><?=esc_attr__('Documentation', 'contact-form-z')?></a>
                            </div>
                            <div class="zcf_info_block">
                                <a href="<?=ZCFORM_PLUGIN_BASE_URL?>/feedback" target="_blank"><?=esc_attr__('To suggest an idea', 'contact-form-z')?></a>
                            </div>
                        </div>

                        <?php $editor->zcform_history_list($editor->content);?>

                        <div id="major-publishing-actions">
                            <div id="delete-action">
                                <?php if($editor->content["type"] === 'edit_form'):?>
                                    <a class="zcf_delete_form" data-value="<?=$editor->content['id']?>"><?php esc_attr_e('Delete', 'contact-form-z');?></a>
                                <?php endif;?>
                            </div>
                            <div id="publishing-action">
                                <span class="spinner"></span>
                                <input type="button" id="zcf_<?=$editor->content['action']?>" class="button button-primary" value="<?=$editor->content['button_text']?>">
                            </div>
                            <div class="clear"></div>
                        </div>

                    </div>
                </div>



                <div class="meta-box-sortables">
                    <div class="postbox">
                        <div class="inside zcf_title_line">
                            <table class="zcf_header_preview">
                                <tr>
                                    <td>
                                        <b><?php esc_attr_e('Preview', 'contact-form-z');?></b>
                                    </td>
                                    <td>
                                        <button class="button zcf_show_hide_preview_form" data-state-preview="off">
                                            <span class="dashicons dashicons-external"></span>
                                        </button>
                                    </td>
                                </tr>
                            </table>
                        </div>

                        <div class="inside zcf_preview_form_general">
                            <div id="zcf_form_" class="zcf_form">
                                <div class="zcf_preview_form">
                                    <?php if(isset($editor->content["fields"]) && count($editor->content["fields"]) > 1):?>

                                        <?php $editor->zcform_view_list_preview_field($editor->content["fields"]);?>

                                    <?php endif;?>
                                </div>
                                <?php if(isset($editor->content["fields"]) && count($editor->content["fields"]) > 0):?>

                                    <?php $editor->zcform_view_list_preview_field($editor->content["fields"], true);?>

                                <?php endif;?>
                            </div>
                            <?=ZCForm_Static::zcform_public_preload(6);?>
                        </div>
                    </div>
                </div>
            </div>

            <!-- CENTER -->
            <div id="postbox-container-2" class="postbox-container">
                <div class="meta-box-sortables ui-sortable">

                    <?php $editor->zcform_view_editor($editor->content['id'], $editor->content['title'], $editor->content['type']);?>


                </div>
            </div>

        </div>
        <br class="clear">
    </div>
</div>
