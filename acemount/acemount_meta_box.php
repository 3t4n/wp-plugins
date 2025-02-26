<?php


if ( ! defined( 'ABSPATH' ) ) {
    exit; // Exit if accessed directly.
}


class Acemount_meta_box {


    public static function acemount_output() {

        ?>
            <div id="acemount_sms_send_form">
                         <p id="info"></p>
                         <strong> Enter phone number </strong>
                         <input id="acemount_sms_phone" name="acemount_sms_phone" value="" >
                         <strong> Enter SMS text </strong>
                         <input id='acemount_sms_text' name="acemount_sms_text" value="">
                         <p></p>
                         <input hidden id='acemount_one_sms' name="acemount_one_sms" value=<?=wp_create_nonce('acemount_one_sms') ?>>

                <input type="button" id="acemount_sms_send" class="button button-primary" value="Sand SMS">

            </div>

        <?php
    }




}

?>
<script>


    setTimeout(acemountInit, 1000);

    function acemountInit(){
        jQuery('#acemount_sms_send').click(function () {
            var acemount_data = {
                action: 'acemount_get_ajax',
                acemount_phone: Number(jQuery('#acemount_sms_send_form #acemount_sms_phone').val()),
                acemount_text: jQuery('#acemount_sms_send_form #acemount_sms_text').val(),
                acemount_one_sms: jQuery('#acemount_sms_send_form #acemount_one_sms').val(),
            };


            // с версии 2.8 'ajaxurl' всегда определен в админке
            jQuery.post( ajaxurl, acemount_data, function(response) {
                if(response.success){
                    jQuery('#acemount_sms_send_form>p#info').css("color", "green");
                    jQuery('#acemount_sms_send_form>p#info').text(response.data);
                    setTimeout("jQuery('#acemount_sms_send_form>p#info').text('')", 2000);
                }else {
                    jQuery('#acemount_sms_send_form>p#info').css("color", "red");
                    jQuery('#acemount_sms_send_form>p#info').text(response.data);
                    setTimeout("jQuery('#acemount_sms_send_form>p#info').text('')", 3000);

                }

            });


        });
    }


</script>
