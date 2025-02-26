<div class="zcf_container_block zcf_container_block_file_<?=$zcf_rnk?> zcf_size_field_<?=(isset($this->d[$this->field_key.'_size_field']) ? $this->d[$this->field_key.'_size_field'] : 100)?> <?=(isset($this->d[$this->field_key.'_padding_state']) && $this->d[$this->field_key.'_padding_state'] ? 'zcf_size_field_padding' : '')?>" <?=(isset($this->d[$this->field_key.'_hide']) && $this->d[$this->field_key.'_hide'] ? 'style="display: none;"' : '')?>
    <?=(!isset($this->pfi) ? ('zcf-data-size="'.(isset($this->d[$this->field_key.'_size_field']) ? $this->d[$this->field_key.'_size_field'] : 100).'"') : '')?>
    >
    <label class="zcf_style_label zcf_container_label_file_<?=$zcf_rnk?> <?=(isset($this->pfi) ? 'zcf_style_label'.$this->pfi : '')?>">
        <?=(isset($this->d[$this->field_key.'_no_title']) && !$this->d[$this->field_key.'_no_title'] ? $this->d[$this->field_key.'_title'].(isset($this->d[$this->field_key.'_required']) && $this->d[$this->field_key.'_required'] && !empty($this->d[$this->field_key.'_title']) ? '&nbsp;<sup class="zcf_sup">*</sup>' : '&nbsp;') : '&nbsp;')?>
    </label>
    <div class="zcf_error_message zcf_small_text zcf_error_block_file_<?=$zcf_rnk?> zcf_em_<?=(isset($this->pfi) ? $this->pfi : '')?>"></div>
    <div class="zcf_input_file_box <?=(isset($this->pfi) ? 'zcf_input_file_box'.$this->pfi : '')?>">
        <input 
                type="file" 
               id="zcf_file_<?=$zcf_rnk?>" 
               class="zcf_input_file zcf_container_field_file_<?=$zcf_rnk?> <?=(isset($this->pfi) ? 'zcf_input_file'.$this->pfi : '')?> <?=(isset($this->d[$this->field_key.'_list_class']) && !empty($this->d[$this->field_key.'_list_class']) ? $this->d[$this->field_key.'_list_class'] : '')?>" 
               name="file[<?=$zcf_rnk?>]"
               data-multiple-caption="{count} <?=esc_attr_e('file selected', 'contact-form-z');?>"
               <?=(isset($this->d['file_multiple']) && $this->d['file_multiple'] ? 'multiple' : '')?>>
            <label for="zcf_file_<?=$zcf_rnk?>">
                <figure>
                    <svg xmlns="http://www.w3.org/2000/svg" width="20" height="17" viewBox="0 0 20 17">
                        <path d="M10 0l-5.2 4.9h3.3v5.1h3.8v-5.1h3.3l-5.2-4.9zm9.3 11.5l-3.2-2.1h-2l3.4 2.6h-3.5c-.1 0-.2.1-.2.1l-.8 2.3h-6l-.8-2.2c-.1-.1-.1-.2-.2-.2h-3.6l3.4-2.6h-2l-3.2 2.1c-.4.3-.7 1-.6 1.5l.6 3.1c.1.5.7.9 1.2.9h16.3c.6 0 1.1-.4 1.3-.9l.6-3.1c.1-.5-.2-1.2-.7-1.5z"></path>
                    </svg>
                </figure> 
                <span><?=esc_attr_e('Select a file', 'contact-form-z');?></span>
            </label>
    </div>
    <div class="zcf_style_limit_block zcf_limit_block_size_file_<?=$zcf_rnk?> <?=(isset($this->d['file_size_info']) && $this->d['file_size_info'] ? '' : 'zcf_hide_text')?>">
        <?=esc_attr__('size', 'contact-form-z');?>: <span class="zcf_limit_span_size_file_<?=$zcf_rnk?>"><?=(isset($this->d['file_size']) && !empty($this->d['file_size']) ? $this->d['file_size'].'Mb' : '')?></span>
    </div>
    <div class="zcf_style_limit_block zcf_limit_block_format_file_<?=$zcf_rnk?> <?=(isset($this->d['file_type_info']) && $this->d['file_type_info'] ? '' : 'zcf_hide_text')?>">
        <?=esc_attr__('format', 'contact-form-z');?>: <span class="zcf_limit_span_format_file_<?=$zcf_rnk?>"><?=(isset($this->d['file_type']) && !empty($this->d['file_type']) ? $this->d['file_type'] : '')?></span>
    </div>
</div>