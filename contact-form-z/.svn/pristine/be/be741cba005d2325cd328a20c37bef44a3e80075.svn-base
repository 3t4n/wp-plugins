<?=ZCForm_Static::zcform_clean_script(ZCForm_Static::zcform_get_style_rating($this->d, $zcf_rnk), false)?>
<style type="text/css"></style>
<div class="zcf_container_block zcf_container_block_rating_<?=$zcf_rnk?> zcf_size_field_<?=(isset($this->d[$this->field_key.'_size_field']) ? $this->d[$this->field_key.'_size_field'] : 100)?> <?=(isset($this->d[$this->field_key.'_padding_state']) && $this->d[$this->field_key.'_padding_state'] ? 'zcf_size_field_padding' : '')?>" <?=(isset($this->d[$this->field_key.'_hide']) && $this->d[$this->field_key.'_hide'] ? 'style="display: none;"' : '')?>
    <?=(!isset($this->pfi) ? ('zcf-data-size="'.(isset($this->d[$this->field_key.'_size_field']) ? $this->d[$this->field_key.'_size_field'] : 100).'"') : '')?>
    >
    <label class="zcf_style_label zcf_container_label_rating_<?=$zcf_rnk?> <?=(isset($this->pfi) ? 'zcf_style_label'.$this->pfi : '')?>">
        <?=(isset($this->d[$this->field_key.'_no_title']) && !$this->d[$this->field_key.'_no_title'] ? $this->d[$this->field_key.'_title'].(isset($this->d[$this->field_key.'_required']) && $this->d[$this->field_key.'_required'] && !empty($this->d[$this->field_key.'_title']) ? '&nbsp;<sup class="zcf_sup">*</sup>' : '&nbsp;') : '&nbsp;')?>
    </label>
    <div class="zcf_error_message zcf_small_text zcf_error_block_rating_<?=$zcf_rnk?> zcf_em_<?=(isset($this->pfi) ? $this->pfi : '')?>"></div>
    <select 
            <?=(isset($this->d[$this->field_key.'_list_id']) && !empty($this->d[$this->field_key.'_list_id']) ? "id='".$this->d[$this->field_key.'_list_id']."'" : '')?>
            class="zcf_style_field zcf_container_field_rating_<?=$zcf_rnk?> <?=(isset($this->d[$this->field_key.'_list_class']) && !empty($this->d[$this->field_key.'_list_class']) ? $this->d[$this->field_key.'_list_class'] : '')?>" 
             name="rating[<?=$zcf_rnk?>]"
            >
            <option value=""></option>
        <?php foreach($this->d['list'] as $k => $v):?>
            <option 
                    <?=(isset($v[$this->field_key.'_list_check']) && $v[$this->field_key.'_list_check'] ? 'selected' : '')?>
                        value="<?=$k?>"
                    ><?=(isset($v[$this->field_key.'_list_title']) ? $v[$this->field_key.'_list_title'] : '')?></option>
                <?php endforeach;?>
    </select>
</div>