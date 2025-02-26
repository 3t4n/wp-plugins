<div class="zcf_container_block zcf_container_block_radio_<?=$zcf_rnk?> zcf_size_field_<?=(isset($this->d[$this->field_key.'_size_field']) ? $this->d[$this->field_key.'_size_field'] : 100)?> <?=(isset($this->d[$this->field_key.'_padding_state']) && $this->d[$this->field_key.'_padding_state'] ? 'zcf_size_field_padding' : '')?>" <?=(isset($this->d[$this->field_key.'_hide']) && $this->d[$this->field_key.'_hide'] ? 'style="display: none;"' : '')?>
    <?=(!isset($this->pfi) ? ('zcf-data-size="'.(isset($this->d[$this->field_key.'_size_field']) ? $this->d[$this->field_key.'_size_field'] : 100).'"') : '')?>
    >
    <label class="zcf_style_label zcf_container_label_radio_<?=$zcf_rnk?> <?=(isset($this->pfi) ? 'zcf_style_label'.$this->pfi : '')?>">
        <?=(isset($this->d[$this->field_key.'_no_title']) && !$this->d[$this->field_key.'_no_title'] ? $this->d[$this->field_key.'_title'].(isset($this->d[$this->field_key.'_required']) && $this->d[$this->field_key.'_required'] && !empty($this->d[$this->field_key.'_title']) ? '&nbsp;<sup class="zcf_sup">*</sup>' : '&nbsp;') : '&nbsp;')?>
    </label>
    <div class="zcf_error_message zcf_small_text zcf_error_block_radio_<?=$zcf_rnk?> zcf_em_<?=(isset($this->pfi) ? $this->pfi : '')?>"></div>
    <?php foreach($this->d['list'] as $k => $v):?>
        <label class="zcf_list_container zcf_container_list_label_radio_<?=$zcf_rnk?>_<?=$k?> <?=(isset($this->pfi) ? 'zcf_list_container'.$this->pfi : '')?>">
            <label class="zcf_container_title_label zcf_container_title_label_radio_<?=$zcf_rnk?>_<?=$k?>">
                <?=(isset($v[$this->field_key.'_list_title']) ? $v[$this->field_key.'_list_title'] : '')?>
            </label>
            <input 
                <?=(isset($this->d[$this->field_key.'_list_id']) && !empty($this->d[$this->field_key.'_list_id']) ? "id='".$this->d[$this->field_key.'_list_id']."'" : '')?>
                class="zcf_container_field_radio_<?=$zcf_rnk?> <?=(isset($this->d[$this->field_key.'_list_class']) && !empty($this->d[$this->field_key.'_list_class']) ? $this->d[$this->field_key.'_list_class'] : '')?>"
                type="radio" 
            <?=(isset($v[$this->field_key.'_list_check']) && $v[$this->field_key.'_list_check'] ? 'checked' : '')?> 
                name="radio[<?=$zcf_rnk?>]" 
                value="<?=$k?>"><span class="zcf_checkmark zcf_checkmark_radio <?=(isset($this->pfi) ? 'zcf_checkmark'.$this->pfi : '')?>"></span>
        </label>
    <?php endforeach;?>
</div>