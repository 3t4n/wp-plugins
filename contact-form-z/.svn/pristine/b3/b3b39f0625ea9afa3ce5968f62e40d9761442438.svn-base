<?php
$this->d['text_default'] = ZCForm_Static::zcform_get_text_value($this->d['text_default'], $this->d['text_default_value']);
?>

<div class="zcf_container_block zcf_container_block_text_<?=$zcf_rnk?> zcf_size_field_<?=(isset($this->d[$this->field_key.'_size_field']) ? $this->d[$this->field_key.'_size_field'] : 100)?> <?=(isset($this->d[$this->field_key.'_padding_state']) && $this->d[$this->field_key.'_padding_state'] ? 'zcf_size_field_padding' : '')?>" <?=(isset($this->d[$this->field_key.'_hide']) && $this->d[$this->field_key.'_hide'] ? 'style="display: none;"' : '')?>
    <?=(!isset($this->pfi) ? ('zcf-data-size="'.(isset($this->d[$this->field_key.'_size_field']) ? $this->d[$this->field_key.'_size_field'] : 100).'"') : '')?>
    >
    <label class="zcf_style_label zcf_container_label_text_<?=$zcf_rnk?> <?=(isset($this->pfi) ? 'zcf_style_label'.$this->pfi : '')?>">
        <?=(isset($this->d[$this->field_key.'_no_title']) && !$this->d[$this->field_key.'_no_title'] ? $this->d[$this->field_key.'_title'].(isset($this->d[$this->field_key.'_required']) && $this->d[$this->field_key.'_required'] && !empty($this->d[$this->field_key.'_title']) ? '&nbsp;<sup class="zcf_sup">*</sup>' : '&nbsp;') : '&nbsp;')?>
    </label>
    <div class="zcf_error_message zcf_small_text zcf_error_block_text_<?=$zcf_rnk?> zcf_em_<?=(isset($this->pfi) ? $this->pfi : '')?>"></div>
    <input 
        <?=(isset($this->d[$this->field_key.'_list_id']) && !empty($this->d[$this->field_key.'_list_id']) ? "id='".$this->d[$this->field_key.'_list_id']."'" : '')?>
        type="<?=(isset($this->d['text_field_type']) ? $this->d['text_field_type'] : 'text')?>" 
        class="zcf_style_field zcf_counter_txt zcf_container_field_text_<?=$zcf_rnk?> <?=(isset($this->pfi) ? 'zcf_style_field'.$this->pfi : '')?> <?=(isset($this->d[$this->field_key.'_list_class']) && !empty($this->d[$this->field_key.'_list_class']) ? $this->d[$this->field_key.'_list_class'] : '')?>"
        <?php if(!isset($this->pfi)):?>
            zcf_num_attr="<?=$zcf_rnk?>" 
            zcf_type_attr="text" 
        <?php endif;?>
        name="text[<?=$zcf_rnk?>]"
        value="<?=$this->d['text_default']?>" 
        placeholder="<?=(isset($this->d[$this->field_key.'_placeholder']) ? $this->d[$this->field_key.'_placeholder'] : '')?>" 
        >
    <?= ZCForm_Static::zcform_get_counter_block($this->d, 'text', $zcf_rnk);?>
</div>