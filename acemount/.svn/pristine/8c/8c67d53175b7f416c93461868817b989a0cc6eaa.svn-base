<?php

    if ( ! defined( 'ABSPATH' ) ) {
        exit; // Exit if accessed directly.
    }

    if(isset($_POST['acemount_auth'])){
        check_admin_referer('acemount_setting_save');
    }

    if(isset($_POST['acemount_order_completed_sms_text'])){
        check_admin_referer('acemount_template_save');
    }

    $acemount_auth = $_POST['acemount_auth'] ? sanitize_user($_POST['acemount_auth']) : false;
    $acemount_alpha = $_POST['acemount_alpha'] ? sanitize_text_field($_POST['acemount_alpha']) : false;

    $acemount_order_completed = $_POST['acemount_order_completed_sms_text'] ? sanitize_text_field($_POST['acemount_order_completed_sms_text']) : false  ;
    $acemount_order_failed = $_POST['acemount_order_failed_sms_text']  ? sanitize_text_field($_POST['acemount_order_failed_sms_text']) : false  ;
    $acemount_order_pending = $_POST['acemount_order_pending_sms_text']  ? sanitize_text_field($_POST['acemount_order_pending_sms_text']) : false  ;
    $acemount_order_on = $_POST['acemount_order_on_sms_text']  ? sanitize_text_field($_POST['acemount_order_on_sms_text']) : false  ;
    $acemount_order_refunded = $_POST['acemount_order_refunded_sms_text']  ? sanitize_text_field($_POST['acemount_order_refunded_sms_text']) : false  ;
    $acemount_order_cancelled = $_POST['acemount_order_cancelled_sms_text']  ? sanitize_text_field($_POST['acemount_order_cancelled_sms_text']) : false  ;
    $acemount_order_on_hold = $_POST['acemount_order_on_hold_sms_text']  ? sanitize_text_field($_POST['acemount_order_on_hold_sms_text']) : false  ;



    $acemount_order_completed_can = $_POST['acemount_order_completed_can'] ? sanitize_text_field($_POST['acemount_order_completed_can']) : false  ;
    $acemount_order_failed_can = $_POST['acemount_order_failed_can']  ? sanitize_text_field($_POST['acemount_order_failed_can']) : false  ;
    $acemount_order_pending_can = $_POST['acemount_order_pending_can']  ? sanitize_text_field($_POST['acemount_order_pending_can']) : false  ;
    $acemount_order_on_can = $_POST['acemount_order_on_can']  ? sanitize_text_field($_POST['acemount_order_on_can']) : false  ;
    $acemount_order_refunded_can = $_POST['acemount_order_refunded_can']  ? sanitize_text_field($_POST['acemount_order_refunded_can']) : false  ;
    $acemount_order_cancelled_can = $_POST['acemount_order_cancelled_can']  ? sanitize_text_field($_POST['acemount_order_cancelled_can']) : false  ;
    $acemount_order_on_hold_can = $_POST['acemount_order_on_hold_can']  ? sanitize_text_field($_POST['acemount_order_on_hold_can']) : false  ;

    $acemount_auth ? update_option('acemount_auth', $acemount_auth) : $acemount_auth = get_option('acemount_auth') ;
    $acemount_alpha ? update_option('acemount_alpha', $acemount_alpha) : $acemount_alpha = get_option('acemount_alpha') ;

    $acemount_order_completed ? update_option('acemount_order_completed_sms_text', $acemount_order_completed) : $acemount_order_completed = get_option('acemount_order_completed_sms_text') ; //завершен
    $acemount_order_failed ? update_option('acemount_order_failed_sms_text', $acemount_order_failed) : $acemount_order_failed = get_option('acemount_order_failed_sms_text') ; //не удался
    $acemount_order_pending ? update_option('acemount_order_pending_sms_text', $acemount_order_pending) : $acemount_order_pending = get_option('acemount_order_pending_sms_text') ; // в ожидании оплаты
    $acemount_order_on ? update_option('acemount_order_on_sms_text', $acemount_order_on) : $acemount_order_on = get_option('acemount_order_on_sms_text') ; //обработка
    $acemount_order_refunded ? update_option('acemount_order_refunded_sms_text', $acemount_order_refunded) : $acemount_order_refunded = get_option('acemount_order_refunded_sms_text') ; //возвращен
    $acemount_order_cancelled ? update_option('acemount_order_cancelled_sms_text', $acemount_order_cancelled) : $acemount_order_cancelled = get_option('acemount_order_cancelled_sms_text') ; //отменен
    $acemount_order_on_hold ? update_option('acemount_order_on_hold_sms_text', $acemount_order_on_hold) : $acemount_order_on_hold = get_option('acemount_order_on_hold_sms_text') ; // на удержании

    // checkbox слать или не слать
    $acemount_order_completed_can ? update_option('acemount_order_completed_can', $acemount_order_completed_can) : $acemount_order_completed_can = get_option('acemount_order_completed_can') ; //завершен
    $acemount_order_failed_can ? update_option('acemount_order_failed_can', $acemount_order_failed_can) : $acemount_order_failed_can = get_option('acemount_order_failed_can') ; //не удался
    $acemount_order_pending_can ? update_option('acemount_order_pending_can', $acemount_order_pending_can) : $acemount_order_pending_can = get_option('acemount_order_pending_can') ; // в ожидании оплаты
    $acemount_order_on_can ? update_option('acemount_order_on_can', $acemount_order_on_can) : $acemount_order_on_can = get_option('acemount_order_on_can') ; //обработка
    $acemount_order_refunded_can ? update_option('acemount_order_refunded_can', $acemount_order_refunded_can) : $acemount_order_refunded_can = get_option('acemount_order_refunded_can') ; //возвращен
    $acemount_order_cancelled_can ? update_option('acemount_order_cancelled_can', $acemount_order_cancelled_can) : $acemount_order_cancelled_can = get_option('acemount_order_cancelled_can') ; //отменен
    $acemount_order_on_hold_can ? update_option('acemount_order_on_hold_can', $acemount_order_on_hold_can) : $acemount_order_on_hold_can = get_option('acemount_order_on_hold_can') ; // на удержании



?>



<div id="acemount_app">

    <div id="acemount-menu" >

            <div class="acemount-menu-linker">
                <ul >
                    <li class="acemount-logo"><img src="https://acemountmedia.com/img/logo.png" alt="">
                    </li>
                    <li id="acemount-link" > <a href="https://acemountmedia.com"> Our site: </a> <br /> <a href="https://acemountmedia.com"> Acemountmedia.com </a>
                    </li>
                    <li id="acemount-setting" > <a > General Settings </a>
                    </li>
                    <li id="acemount-templates" > <a > Customer Templates</a>
                    </li>
                    <li id="acemount-statuses" > <a > SMS Statuses</a>
                    </li>

                </ul>
            </div>

    </div>



    <div id="acemount-content" >

        <div class="acemount-setting">

            <?php require_once('general_setting.php') ?>

        </div>

        <div class="acemount-templates">

            <?php require_once('templates.php') ?>

        </div>

        <div class="acemount-statuses">

            <?php require_once('sms_statuses.php') ?>

        </div>
        <div class="acemount-contact">

            <?php require_once('contact.php') ?>

        </div>


    </div>

</div>





<script>


    jQuery(document).ready(function () {

        jQuery('.acemount-setting').css("display", "block");
        jQuery('.acemount-templates').css("display", "none");
        jQuery('.acemount-statuses').css("display", "none");
        jQuery('.acemount-contact').css("display", "none");

        jQuery('#acemount-setting').click(function () {
            jQuery('.acemount-menu-linker>ul>li:not("#acemount-link")>a').css('color', '#424242');
            jQuery(this).children('a').css('color', 'orange');

            jQuery('.acemount-setting').css("display", "block");
            jQuery('.acemount-templates').css("display", "none");
            jQuery('.acemount-statuses').css("display", "none");
            jQuery('.acemount-contact').css("display", "none");
        });

        jQuery('#acemount-templates').click(function () {
            jQuery('.acemount-menu-linker>ul>li:not("#acemount-link")>a').css('color', '#424242');
            jQuery(this).children('a').css('color', 'orange');

            jQuery('.acemount-setting').css("display", "none");
            jQuery('.acemount-templates').css("display", "block");
            jQuery('.acemount-statuses').css("display", "none");
            jQuery('.acemount-contact').css("display", "none");
        });

        jQuery('#acemount-statuses').click(function () {
            jQuery('.acemount-menu-linker>ul>li:not("#acemount-link")>a').css('color', '#424242');
            jQuery(this).children('a').css('color', 'orange');

            jQuery('.acemount-setting').css("display", "none");
            jQuery('.acemount-templates').css("display", "none");
            jQuery('.acemount-statuses').css("display", "block");
            jQuery('.acemount-contact').css("display", "none");
        });

        jQuery('#acemount-contact').click(function () {
            jQuery('.acemount-menu-linker>ul>li:not("#acemount-link")>a').css('color', '#424242');
            jQuery(this).children('a').css('color', 'orange');

            jQuery('.acemount-setting').css("display", "none");
            jQuery('.acemount-templates').css("display", "none");
            jQuery('.acemount-statuses').css("display", "none");
            jQuery('.acemount-contact').css("display", "block");
        });


    });




</script>