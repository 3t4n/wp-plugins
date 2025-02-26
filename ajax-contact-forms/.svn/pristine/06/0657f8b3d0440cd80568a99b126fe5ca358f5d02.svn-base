<script>
    jQuery(document).ready(function($) {
        var mask = $("#acfw30_popup_contact_form_<?php echo $post->ID; ?> .acfw30_tel_mask").val();
        $("#acfw30_popup_contact_form_<?php echo $post->ID; ?> .acfw30_input_tel").mask(mask);
    })
</script>
<div class="acfw30_modal_wrapper" id="acfw30_<?php echo $post->ID; ?>">
    <a href="#close" class="acfw30_close_modal"></a>
    <div class="acfw30_modal_dialog">
        <div class="acfw30_container">  
            <form class="acfw30_popup_contact_form" id="acfw30_popup_contact_form_<?php echo $post->ID;?>" action="#" method="post">
                <a href="#close" class="acfw30_close_modal_min"></a>
                <?php echo do_shortcode($acfw30_form_fields); ?>
            </form>
        </div>        
    </div>
</div>