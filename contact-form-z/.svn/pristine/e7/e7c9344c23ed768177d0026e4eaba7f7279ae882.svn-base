<?php ZCForm_Static::zcform_admin_get_options_rank($this->content["rank"]);?>
<form id="zcf_<?=$this->content['action']?>_content">
    <input type="hidden" name="action" value="<?=$this->content['action']?>">
    <input type="hidden" name="form_id" value="<?=($type === 'add_form' ? '' : $form_id);?>">
    <div id="zcf_tabs" class="ui-tabs ui-widget ui-widget-content ui-corner-all">
        <ul class="ui-tabs-nav ui-helper-reset ui-helper-clearfix ui-widget-header ui-corner-all">
            <li class="ui-state-default ui-corner-top ui-tabs-active ui-state-active">
                <a href="#zcf_template" class="ui-tabs-anchor">
                    <span class="dashicons dashicons-list-view"></span>
                    <?php esc_attr_e('Form', 'contact-form-z');?>
                </a>
            </li>
            <?php foreach($this->points as $k0 => $v0):?>
                <li class="ui-state-default ui-corner-top">
                    <a href="#zcf_<?=$k0;?>" class="ui-tabs-anchor">
                        <span class="dashicons <?=$v0['icon'];?>"></span>
                        <?=$v0['title'];?>
                    </a>
                </li>
            <?php endforeach;?>
        </ul>
        <div id="zcf_template" class="ui-tabs-panel ui-widget-content ui-corner-bottom">
            <?=ZCForm_Static::zcform_admin_header_help_block('template');?>

            <!--            <div class="zcf_container_button">
                            <h2><?php esc_attr_e('Common Fields', 'contact-form-z');?></h2>
            <?php foreach($this->fields_list as $k1 => $v1): if(in_array($k1, $this->stop_fields_list)) continue;?>
                                            <div>
                                                <button type="button" class="button button-primary zcf_add_block_button"  value="<?=$k1;?>"><i class="fa <?=$v1['icon'];?> fa-lg"></i> <?=$v1['name'];?></button>
                                            </div>
            <?php endforeach;?>
                            <h2><?php esc_attr_e('Additional Fields', 'contact-form-z');?></h2>
            <?php foreach($this->additional_fields_list as $k1 => $v1):?>
                                            <div>
                                                <button type="button" class="button button-primary zcf_add_additional_block_button"  value="<?=$k1;?>"><i class="fa <?=$v1['icon'];?> fa-lg"></i> <?=$v1['name'];?></button>
                                            </div>
            <?php endforeach;?>
                        </div>-->

            <div class="zcf_container_base">
                <h2 class="zcf_container_base_title"><?php esc_attr_e('Form Builder', 'contact-form-z');?></h2>
                <table class="zcf_container_base_table">
                    <tr>
                        <td class="zcf_container_base_table_button">
                            <?php foreach($this->fields_list as $k1 => $v1): if(in_array($k1, $this->stop_fields_list)) continue;?>
                                <div class="zcf_add_block_button" data-value-field="<?=$k1;?>" title="<table><tr><td><i class='fa <?=$v1['icon'];?> fa-2x'></i></td><td><span style='font-size: 14px; padding-left: 10px;'><?=$v1['name'];?></span></td></tr></table>">
                                    <i class="fa <?=$v1['icon'];?> fa-2x"></i>
                                </div>
                            <?php endforeach;?>
                        </td>
                        <td class="zcf_container_base_table_editor">
                            <div class="zcf_container_general">
                                <div class="zcf_container">
                                    <?php if(isset($this->content["fields"]) && count($this->content["fields"]) > 1):?>

                                        <?php $this->zcform_view_list_field($this->content["fields"]);?>

                                    <?php endif;?>
                                </div>
                                <?php if(isset($this->content["fields"]) && count($this->content["fields"]) > 0):?>

                                    <?php $this->zcform_view_list_field($this->content["fields"], true);?>

                                <?php endif;?>
                            </div>
                        </td>
                    </tr>
                </table>

            </div>



        </div>
        <?php foreach($this->points as $k2 => $v2): $this->count_key_list = 0;?>
            <div id="zcf_<?=$k2;?>" class="ui-tabs-panel ui-widget-content ui-corner-bottom" style="display: none;">
                <?=ZCForm_Static::zcform_admin_header_help_block($k2);?>
                <?php require ZCFORM_PLUGIN_DIR."/admin/partials/points/".'contact-form-z'."-admin-{$k2}.php";?>
            </div>
        <?php endforeach;?>
    </div>
</form>
<div class="zcf_fields_list">

    <?php $this->zcform_view_list_field();?>

</div>
