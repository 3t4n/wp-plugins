<?php

    if ( ! defined( 'ABSPATH' ) ) {
        exit; // Exit if accessed directly.
    }

?>



<div class="acemount-content-wrapper">
    <form name="template" method="post" action=<?=esc_url(wp_nonce_url( ACEMOUNT_POST, 'acemount_template_save'))  ?> >

        <div class="temlate-section">
            <div>
                <a  class="acemount-tamlate " >
                    <input type="checkbox" <?= $acemount_order_completed_can == 'can' ? esc_attr("checked='checked'") : esc_attr('')?>" >
                    <textarea name="acemount_order_completed_can" hidden="hidden"></textarea>
                    <label>Text SMS when Order is Completed</label>
                    <span class="acemount-pending acemount_btn "></span>
                </a>

                <div  class="acemount-pending" ">
                    <table class="form-table">
                        <tbody>
                            <tr valign="top">
                                <td><div class="acemount_tokens">
                                        <?php require('tokens.php') ?>
                                    </div>

                                    <textarea name="acemount_order_completed_sms_text" > <?=$acemount_order_completed ? esc_textarea($acemount_order_completed) : esc_textarea('')?> </textarea>
                                </td>
                            </tr>
                        </tbody></table>
                </div>
            </div>

            <div>
                <a  class="acemount-tamlate " >
                    <input type="checkbox" <?= $acemount_order_failed_can == 'can' ? esc_attr("checked='checked'") : esc_attr('')?>" >
                    <textarea name="acemount_order_failed_can" hidden="hidden"></textarea>
                    <label>Text SMS when Order is Failed</label>
                    <span class="acemount-pending acemount_btn "></span>
                </a>

                <div  class="acemount-pending" ">
                    <table class="form-table">
                        <tbody>
                        <tr valign="top">
                            <td><div class="acemount_tokens">
                                    <?php require('tokens.php') ?>
                                </div>

                                <textarea name="acemount_order_failed_sms_text" > <?=$acemount_order_failed ? esc_textarea($acemount_order_failed) : esc_textarea('')?> </textarea>
                            </td>
                        </tr>
                        </tbody></table>
                </div>
            </div>


            <div>
                <a  class="acemount-tamlate " >
                    <input type="checkbox" <?= $acemount_order_pending_can == 'can' ? esc_attr("checked='checked'") : esc_attr('')?>" >
                    <textarea name="acemount_order_pending_can" hidden="hidden"></textarea>
                    <label>Text SMS when Order is Pending</label>
                    <span class="acemount-pending acemount_btn "></span>
                </a>

                <div  class="acemount-pending" ">
                    <table class="form-table">
                        <tbody>
                        <tr valign="top">
                            <td><div class="acemount_tokens">
                                    <?php require('tokens.php') ?>
                                </div>

                                <textarea name="acemount_order_pending_sms_text" > <?=$acemount_order_pending ? esc_textarea($acemount_order_pending) : esc_textarea('')?> </textarea>
                            </td>
                        </tr>
                        </tbody></table>
                </div>
            </div>


            <div>
                <a  class="acemount-tamlate " >
                    <input type="checkbox" <?= $acemount_order_on_can == 'can' ? esc_attr("checked='checked'") : esc_attr('')?>" >
                    <textarea name="acemount_order_on_can" hidden="hidden"></textarea>
                    <label>Text SMS when Order is On</label>
                    <span class="acemount-pending acemount_btn "></span>
                </a>

                <div  class="acemount-pending" ">
                    <table class="form-table">
                        <tbody>
                        <tr valign="top">
                            <td><div class="acemount_tokens">
                                    <?php require('tokens.php') ?>
                                </div>

                                <textarea name="acemount_order_on_sms_text" > <?=$acemount_order_on ? esc_textarea($acemount_order_on) : esc_textarea('')?> </textarea>
                            </td>
                        </tr>
                        </tbody></table>
                </div>
            </div>

            <div>
                <a  class="acemount-tamlate " >
                    <input type="checkbox" <?= $acemount_order_refunded_can == 'can' ? esc_attr("checked='checked'") : esc_attr('')?>" >
                    <textarea name="acemount_order_refunded_can" hidden="hidden"></textarea>
                    <label>Text SMS when Order is Refused </label>
                    <span class="acemount-pending acemount_btn "></span>
                </a>

                <div  class="acemount-pending" ">
                    <table class="form-table">
                        <tbody>
                        <tr valign="top">
                            <td><div class="acemount_tokens">
                                    <?php require('tokens.php') ?>
                                </div>

                                <textarea name="acemount_order_refunded_sms_text" > <?=$acemount_order_refunded ? esc_textarea($acemount_order_refunded) : esc_textarea('')?> </textarea>
                            </td>
                        </tr>
                        </tbody></table>
                </div>
            </div>

            <div>
                <a  class="acemount-tamlate " >
                    <input type="checkbox" <?= $acemount_order_cancelled_can == 'can' ? esc_attr("checked='checked'") : esc_attr('')?>" >
                    <textarea name="acemount_order_cancelled_can" hidden="hidden"></textarea>
                    <label>Text SMS when Order is Canselled</label>
                    <span class="acemount-pending acemount_btn "></span>
                </a>

                <div  class="acemount-pending" ">
                    <table class="form-table">
                        <tbody>
                        <tr valign="top">
                            <td><div class="acemount_tokens">
                                    <?php require('tokens.php') ?>
                                </div>

                                <textarea name="acemount_order_cancelled_sms_text" > <?=$acemount_order_cancelled ? esc_textarea($acemount_order_cancelled) : esc_textarea('')?> </textarea>
                            </td>
                        </tr>
                        </tbody></table>
                </div>
            </div>

            <div>
                <a  class="acemount-tamlate " >
                    <input type="checkbox" <?= $acemount_order_on_hold_can == 'can' ? esc_attr("checked='checked'") : esc_attr('')?>" >
                    <textarea name="acemount_order_on_hold_can" hidden="hidden"></textarea>
                    <label>Text SMS when Order is on Hold</label>
                    <span class="acemount-pending acemount_btn "></span>
                </a>

                <div  class="acemount-pending" ">
                    <table class="form-table">
                        <tbody>
                        <tr valign="top">
                            <td><div class="acemount_tokens">
                                    <?php require('tokens.php') ?>
                                </div>

                                <textarea name="acemount_order_on_hold_sms_text" > <?=$acemount_order_on_hold ? esc_textarea($acemount_order_on_hold) : esc_textarea('')?> </textarea>
                            </td>
                        </tr>
                        </tbody></table>
                </div>
            </div>


        </div>
        <input type="submit" name="submit" id="submit" class="button button-primary" value="Save changes">
    </form>
</div>


<script>

    jQuery(document).ready(function () {

        jQuery('span.acemount-pending').click(function () {
            if(jQuery(this).parent().parent().children('div').css('display') == 'block'){
                jQuery(this).parent().parent().children('div').css('display', 'none');
                jQuery(this).removeClass('active');
            }else{
                jQuery(this).parent().parent().children('div').css('display', 'block');
                jQuery(this).addClass('active');
            }

        });


        jQuery('.acemount_tokens>a').click(function () {
            var text = jQuery(this).parent().parent().children('textarea').val() + jQuery(this).attr('val');
            jQuery(this).parent().parent().children('textarea').val(text);
        });

        jQuery('input[type="checkbox"]').click(function () {
                if(jQuery(this).prop("checked")){
                    jQuery( this ).parent().children('textarea').val('can');
                    console.log(jQuery(this).prop("checked"));
                    console.log(jQuery( this ).parent().children('textarea').val());
                }else{
                    jQuery( this).parent().children('textarea').val('not');
                    console.log(jQuery(this).prop("checked"));
                    console.log(jQuery(this).parent().children('textarea').val());
                }
        });

    })




</script>