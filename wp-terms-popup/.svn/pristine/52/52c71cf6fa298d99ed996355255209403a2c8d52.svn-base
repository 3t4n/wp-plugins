(function($) {
	'use strict';

    $(document).ready(function($) {
        var wptp_agree_button_check = setInterval(function() {
            if ($('input[name="wptp_agree"]').length) {
                clearInterval(wptp_agree_button_check);
                
                var age_verified = true;
                var acknowledged = true;

                // Age Verification
                if ($('#wptpa-Y').length && $('#wptpa-M').length && $('#wptpa-D').length) {
                    $('input[name="wptp_agree"]').prop('disabled', true);
                    age_verified = false;

                    $('.wptpa-dropdown').on('change', function() {
                        var target_date = $('#wptpa-Y').attr('data-target') + '-' + $('#wptpa-M').attr('data-target') + '-' + $('#wptpa-D').attr('data-target');
                        var selected_date = $('#wptpa-Y').val() + '-' + $('#wptpa-M').val() + '-' + $('#wptpa-D').val();
            
                        if ($('#wptpa-Y').val() != '' && $('#wptpa-M').val() != '' && $('#wptpa-D').val() != '' && (new Date(selected_date) <= new Date(target_date))) {
                            age_verified = true;
                        } else {
                            age_verified = false;
                        }

                        if (age_verified && acknowledged) {
                            $('input[name="wptp_agree"]').prop('disabled', false);
                        } else {
                            $('input[name="wptp_agree"]').prop('disabled', true);
                        }
                    });
                }

                // Acknowledgement Check Box
                if ($('#wptp-acknowledgement').length) {
                    $('input[name="wptp_agree"]').prop('disabled', true);
                    acknowledged = false;

                    $('#wptp-acknowledgement').on('change', function() {
                        if ($(this).is(':checked')) {
                            acknowledged = true;
                        } else {
                            acknowledged = false;
                        }

                        if (age_verified && acknowledged) {
                            $('input[name="wptp_agree"]').prop('disabled', false);
                        } else {
                            $('input[name="wptp_agree"]').prop('disabled', true);
                        }
                    });
                }
            }
         }, 100);
    });

})(jQuery);