<?php
$form = '
<script>
    jQuery(document).ready(function($) {
        var mask = $("#acfw30_contact_form_'.$post->ID.' .acfw30_tel_mask").val();
        $("#acfw30_contact_form_'.$post->ID.' .acfw30_input_tel").mask(mask);
    })
</script>

<form class="acfw30_contact_form" id="acfw30_contact_form_'.$post->ID.'" action="#" method="post">
    '.do_shortcode($acfw30_form_fields).'
</form>
';