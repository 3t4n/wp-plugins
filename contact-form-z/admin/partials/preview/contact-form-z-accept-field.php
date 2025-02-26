<?php
$acp_class = '';
$acp_href = '';
switch($this->d['accept_type']){
    case '1':
        $acp_class = 'zcf_accept_link_solid';
        $acp_href = "href='{$this->d['accept_url']}'";
        break;
    case '2':
        $acp_class = 'zcf_accept_link_dashed';
        break;
}
?>

<div 
    class="zcf_container_block zcf_container_block_accept_<?=$zcf_rnk?> zcf_size_field_<?=(isset($this->d[$this->field_key.'_size_field']) ? $this->d[$this->field_key.'_size_field'] : 100)?> <?=(isset($this->d[$this->field_key.'_padding_state']) && $this->d[$this->field_key.'_padding_state'] ? 'zcf_size_field_padding' : '')?>" <?=(isset($this->d[$this->field_key.'_hide']) && $this->d[$this->field_key.'_hide'] ? 'style="display: none;"' : '')?>
    <?=(!isset($this->pfi) ? ('zcf-data-size="'.(isset($this->d[$this->field_key.'_size_field']) ? $this->d[$this->field_key.'_size_field'] : 100).'"') : '')?>
    >
    <label class="zcf_style_label zcf_container_label_accept_<?=$zcf_rnk?> <?=(isset($this->pfi) ? 'zcf_style_label'.$this->pfi : '')?>">
        <?=(isset($this->d[$this->field_key.'_no_title']) && !$this->d[$this->field_key.'_no_title'] ? $this->d[$this->field_key.'_title'] : '&nbsp;')?>
    </label>
    <div class="zcf_error_message zcf_small_text zcf_error_block_accept_<?=$zcf_rnk?> zcf_em_<?=(isset($this->pfi) ? $this->pfi : '')?>"></div>
    <label class="zcf_list_container <?=(isset($this->pfi) ? 'zcf_list_container'.$this->pfi : '')?>">
        <label class="zcf_container_title_label">
            <a class="zcf_accept_link_block zcf_label_accept_<?=$zcf_rnk?> <?=$acp_class?>" target="_blank" <?=$acp_href?>>
                <?=(isset($this->d['accept_sub_title']) && !empty($this->d['accept_sub_title']) ? $this->d['accept_sub_title'] : esc_attr_e('I agree', 'contact-form-z'))?>
            </a>
        </label>
        <input 
            type="checkbox"  
            class="zcf_container_field_accept_<?=$zcf_rnk?> <?=(isset($this->d[$this->field_key.'_list_class']) && !empty($this->d[$this->field_key.'_list_class']) ? $this->d[$this->field_key.'_list_class'] : '')?>"
                <?=(isset($this->d[$this->field_key.'_list_id']) && !empty($this->d[$this->field_key.'_list_id']) ? "id='".$this->d[$this->field_key.'_list_id']."'" : '')?>
               name="accept[<?=$zcf_rnk?>]"
               <?=(isset($this->d['accept_default']) ? $this->d['accept_default'] : '')?>
               ><span class="zcf_checkmark zcf_checkmark_checkbox <?=(isset($this->pfi) ? 'zcf_checkmark'.$this->pfi : '')?>"></span>
    </label>
    <div class="zcf_accept_text_block zcf_container_text_block_accept_<?=$zcf_rnk?>"><?=$this->d['accept_text']?></div>
</div>