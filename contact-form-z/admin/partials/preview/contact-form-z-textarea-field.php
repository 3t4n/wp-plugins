
<div class="zcf_container_block zcf_container_block_textarea_<?=$zcf_rnk?> zcf_size_field_<?=(isset($this->d[$this->field_key.'_size_field']) ? $this->d[$this->field_key.'_size_field'] : 100)?> <?=(isset($this->d[$this->field_key.'_padding_state']) && $this->d[$this->field_key.'_padding_state'] ? 'zcf_size_field_padding' : '')?>" <?=(isset($this->d[$this->field_key.'_hide']) && $this->d[$this->field_key.'_hide'] ? 'style="display: none;"' : '')?>
    <?=(!isset($this->pfi) ? ('zcf-data-size="'.(isset($this->d[$this->field_key.'_size_field']) ? $this->d[$this->field_key.'_size_field'] : 100).'"') : '')?>
    >
    <label class="zcf_style_label zcf_container_label_textarea_<?=$zcf_rnk?> <?=(isset($this->pfi) ? 'zcf_style_label'.$this->pfi : '')?>">
        <?=(isset($this->d[$this->field_key.'_no_title']) && !$this->d[$this->field_key.'_no_title'] ? $this->d[$this->field_key.'_title'].(isset($this->d[$this->field_key.'_required']) && $this->d[$this->field_key.'_required'] && !empty($this->d[$this->field_key.'_title']) ? '&nbsp;<sup class="zcf_sup">*</sup>' : '&nbsp;') : '&nbsp;')?>
    </label>
    <div class="zcf_error_message zcf_small_text zcf_error_block_textarea_<?=$zcf_rnk?> zcf_em_<?=(isset($this->pfi) ? $this->pfi : '')?>"></div>
    <textarea 
    <?=(isset($this->d[$this->field_key.'_list_id']) && !empty($this->d[$this->field_key.'_list_id']) ? "id='".$this->d[$this->field_key.'_list_id']."'" : '')?>
        class="zcf_style_field zcf_counter_txt zcf_container_field_textarea_<?=$zcf_rnk?> <?=(isset($this->pfi) ? 'zcf_style_field'.$this->pfi : '')?> <?=(isset($this->d[$this->field_key.'_list_class']) && !empty($this->d[$this->field_key.'_list_class']) ? $this->d[$this->field_key.'_list_class'] : '')?>" 
        <?php if(!isset($this->pfi)):?>
            zcf_num_attr="<?=$zcf_rnk?>" 
            zcf_type_attr="textarea" 
        <?php endif;?>
        name="textarea[<?=$zcf_rnk?>]"
        placeholder="<?=(isset($this->d[$this->field_key.'_placeholder']) ? $this->d[$this->field_key.'_placeholder'] : '')?>" 
        ><?=$this->d['textarea_default']?></textarea>
        <?=ZCForm_Static::zcform_get_counter_block($this->d, 'textarea', $zcf_rnk);?>
</div>