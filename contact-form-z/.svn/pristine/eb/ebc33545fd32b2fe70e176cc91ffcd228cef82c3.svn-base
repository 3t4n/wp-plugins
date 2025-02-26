<div class="zcf_<?=$this->field_key;?>_form zcf_block zcf_block_position zcf_field_template_<?=$this->field_key;?>_<?=(isset($this->d[$this->field_key.'_rank']) ? $this->d[$this->field_key.'_rank'] : '')?>">
    <?=
    ZCForm_Static::zcform_admin_header_field_block(
        $this->fields_list[$this->field_key], 
        $this->field_key, 
        (isset($this->d[$this->field_key.'_title']) ? $this->d[$this->field_key.'_title'] : ''), 
        (isset($this->d[$this->field_key.'_rank']) ? $this->d[$this->field_key.'_rank'] : null), 
        !$button,
        (isset($this->d[$this->field_key.'_hide']) ? $this->d[$this->field_key.'_hide'] : false),
        (isset($this->d[$this->field_key.'_required']) ? $this->d[$this->field_key.'_required'] : false),
        (isset($this->d[$this->field_key.'_size_field']) ? $this->d[$this->field_key.'_size_field'] : 100)
    );
    ?>
    <div class="zcf_body_block">
        <input type="hidden" name="field[]" value="<?=$this->field_key?>">
        <input type="hidden" class="zcf_<?=$this->field_key?>_field_hide" name="<?=$this->field_key?>_hide[]" value="<?=(isset($this->d[$this->field_key.'_hide']) && $this->d[$this->field_key.'_hide'] ? 'true' : 'false')?>">
        <input type="hidden" class="zcf_padding_state" name="<?=$this->field_key?>_padding_state[]" value="<?=(isset($this->d[$this->field_key.'_padding_state']) && $this->d[$this->field_key.'_padding_state'] ? 'true' : 'false')?>">
        <input type="hidden" class="zcf_<?=$this->field_key?>_rank" name="<?=$this->field_key?>_rank[]" value="<?=(isset($this->d[$this->field_key.'_rank']) ? $this->d[$this->field_key.'_rank'] : 0)?>">
    <?php require ZCFORM_PLUGIN_DIR."/admin/partials/fields/".ZCFORM_PLUGIN_NAME."-{$this->field_key}-field.php";?>
    </div>
</div>