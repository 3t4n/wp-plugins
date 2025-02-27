
<tr id="el-intro-tag-off-<?php echo esc_html($format->ad_id); ?>" style="background: #ffebeb">
    <td class="td_medium table-multi-center">
        <img src="<?php echo esc_html($format->path_format_img . $format->ad_img) ?>" alt="<?php echo $format->form_name ?>"/> <br>
        <?php echo esc_html(__($format->ad_name,'themoneytizer')); ?>
    </td>
    <?php if($format->ad_id == 20){
    } ?>
    <td id="container_action_<?php echo $format->ad_id ?>">
        <?php if(in_array($format->ad_id, [5,16])){
            if($format->form_ad_id == null){
                $format->disabled = 'disabled'; ?>
                <div></div>
            <?php } elseif($format->form_state == 1) {
                $format->disabled = 'disabled'; ?>
                <div></div>
            <?php } elseif ($format->form_state == 0) {
                $format->disabled = 'disabled'; ?>
                <div></div>
            <?php } else {
                if($format->tag_id == null){ ?>
                    <div></div>
                <?php } else { ?>
                    <div></div>
                <?php }
            }
        } else {
            if ($format->form_state == 0 && $format->form_state != null) {
                $format->disabled = 'disabled'; ?>
                <div></div>
            <?php } else {
                if (($format->tag_id === null && $format->form_state == 2) || $format->form_state == null) {
                    $format->disabled = 'disabled'; ?>
                    <div></div>
                <?php }
            }
        }
        if ($format->tag_actif != '' && $format->tag_actif == 0 && $format->form_state == 2) { ?>
            <div></div>
        <?php } ?>
    </td>
    <?php if(in_array($format->ad_id, TAG_AUTOPLACE) && $format->form_state != 0){
        if ($format->form_state == 1 || in_array($format->form_state, [0, 1])) {
            $format->disabled = 'disabled';
        } ?>
        <td id="container_auto_<?php echo $format->ad_id ?>" style='text-align: center'>
            <label for='<?php echo $format->ad_id ?>'><?php echo esc_html(__('Placement automatique', 'themoneytizer')); ?></label>
            <input onChange="saveAutoAd(<?php echo $format->ad_id ?>)"
                class='checkbox_format' name='formatauto[]' id='data_auto_<?php echo $format->ad_id ?>' value='<?php echo $format->ad_id ?>'
                type='checkbox'
                <?php echo (isset($data_auto[$format->ad_id]->status) && $data_auto[$format->ad_id]->status == 'true') ? 'checked' : ''; ?>
                <?php echo $format->tag_actif == 0 ? 'disabled' : '' ?>
            >
        </td>
        <td></td>
    <?php }else if($format->disabled != 'disabled'&&!in_array($format->ad_id, TAG_NO_LAZY_LOADING)){ ?>
        <td id="container_auto_<?php echo $format->ad_id ?>"></td>
        <td id="container_lazy_<?php echo $format->ad_id ?>">
        <input type="text" hidden id="lazy_data_frequency_<?php echo $format->ad_id ?>"
            value="<?php echo isset($data_lazy[$format->ad_id]->frequency) ?  $data_lazy[$format->ad_id]->frequency : 1 ?>"/>
        <input type="text" hidden id="lazy_data_order_<?php echo $format->ad_id ?>"
            value="<?php echo(isset($data_lazy[$format->ad_id]->order) ?  $data_lazy[$format->ad_id]->order : 'before') ?>"/>
        <input type="text" hidden id="lazy_data_align_<?php echo $format->ad_id ?>"
            value="<?php echo isset($data_lazy[$format->ad_id]->align) ?  $data_lazy[$format->ad_id]->align : 'left' ?>"/>
        <input type="text" hidden id="lazy_data_width_<?php echo $format->ad_id ?>"
            value="<?php echo isset($data_lazy[$format->ad_id]->width) ? $data_lazy[$format->ad_id]->width : $format->ad_size_width ?>"/>
        <input type="text" hidden id="lazy_data_height_<?php echo $format->ad_id ?>"
            value="<?php echo isset($data_lazy[$format->ad_id]->height) ? $data_lazy[$format->ad_id]->height : $format->ad_size_height ?>"/>
        <input type="text" hidden id="lazy_data_anchor_<?php echo $format->ad_id ?>"
            value="<?php echo isset($data_lazy[$format->ad_id]->anchor) ?  $data_lazy[$format->ad_id]->anchor : 'p' ?>"/>
        <input type="text" hidden id="lazy_data_start_<?php echo $format->ad_id ?>"
            value="<?php echo isset($data_lazy[$format->ad_id]->start) ?  $data_lazy[$format->ad_id]->start : 0 ?>"/>
        
            <div class="col-container">
                <div class="row-container" style="justify-content: center"> 
                    <label style="cursor: default text-align:center" id="label-lazy-<?php echo $format->ad_id ?>" for='lazy-<?php echo $format->ad_id ?>'><?php _e('Status :', 'themoneytizer'); ?><?php if(isset($data_lazy[$format->ad_id])&&$data_lazy[$format->ad_id]->status != 'false'){ echo '<i class="themoneytizer_ico_green bi bi-play-fill"></i>'; }else{ echo '<i class="themoneytizer_ico_red bi bi-pause-fill"></i>'; }?></label>
                    <input style="cursor: default" class="themoneytizer_checkbox checkbox_align themoneytizer_o_1" type="checkbox" readonly
                    id='lazyTagRead-<?php echo $format->ad_id ?>' hidden
                    type='checkbox' <?php echo (isset($data_lazy[$format->ad_id])&&$data_lazy[$format->ad_id]->status != 'false') ? 'checked' : ''; ?> disabled >
                </div>
                <div class="themoneytizer_button center lazyloading"
                onClick="lazySetup(
                    <?php echo $format->ad_id ?>,
                    '<?php echo $format->form_name ?>'
                )">
                    <?php echo esc_html(__('Configurer', 'themoneytizer')); ?>
                </div>
            </div>
        </td>
    <?php } else { ?>
        <td id="container_auto_<?php echo $format->ad_id ?>"></td>
        <td id="container_lazy_<?php echo $format->ad_id ?>"></td>
    <?php } ?>
    <td id="container_tags_<?php echo $format->ad_id ?>"></td>
</tr>