(function($) {
    'use strict';

    jQuery( document ).ready(function($) {

        var msg_text                = aims_cf7_msg.msg_text;
        var position                = aims_cf7_msg.position ? aims_cf7_msg.position : 'top-right';
        var default_notice_disable  = aims_cf7_msg.default_notice_disable ? aims_cf7_msg.default_notice_disable : '';
        var close_button            = aims_cf7_msg.close_button == 'on' ? false : true;
        var progress_bar            = aims_cf7_msg.progress_bar == 'on' ? false : true;
        var prevent_duplicates      = aims_cf7_msg.prevent_duplicates == 'on' ? true : false;
        var show_popup_timeout      = aims_cf7_msg.show_popup_timeout ? aims_cf7_msg.show_popup_timeout * 1000 : 5000;

        toastr.options = {
            'closeButton': close_button,
            'debug': false,
            'newestOnTop': false,
            'progressBar': progress_bar,
            'positionClass': "toast-" + position,
            'preventDuplicates': prevent_duplicates,
            'showDuration': 1000,
            'hideDuration': 1000,
            'timeOut': show_popup_timeout,
            'extendedTimeOut': '1000',
            'showEasing': 'swing',
            'hideEasing': 'linear',
            'showMethod': 'fadeIn',
            'hideMethod': 'fadeOut',
        }
            

        var aimscf7Forms = document.querySelectorAll( '.wpcf7' );

        
        aimscf7Forms.forEach(function( aimsform ) {

            aimsform.addEventListener( 'wpcf7submit', function( e ) {
                var currentformid   = e.detail.contactFormId;
                var aims_status     = e.detail.apiResponse.status;
                var amis_message    = e.detail.apiResponse.message;

                if( default_notice_disable == 'on'){
                    $('.wpcf7-response-output').hide();
                }
   
                if( aims_status == 'validation_failed' || aims_status == 'mail_failed'){
                    toastr.warning( amis_message )
                }else{
                    amis_message = msg_text ? msg_text : amis_message;
                    toastr.success( amis_message );
                }
            });

        });


    });


})(jQuery);