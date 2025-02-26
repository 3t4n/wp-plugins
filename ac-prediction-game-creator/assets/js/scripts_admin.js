/**
 * Created by Richie on 11/02/2018.
 */


(function($) {

    function calculate_scores() {

        let refresh_url = $('#calculate-fbo-scores').attr('data-page-url');

        console.log('calculating');


        var data = {
            'nonce': acpgc_admin.nonce,
            'action': 'acpgc_ajax_admin',
        };

        console.log('acpgc_admin.nonce' + acpgc_admin.nonce);
        console.log('acpgc_admin.ajax_url' + acpgc_admin.ajax_url);

        $.ajax({
            url: acpgc_admin.ajax_url,
            data: data,
            type: 'post',
            success: function(response) {
                console.log(response);
                console.log('Some success current');

                if (response.success) {
                    console.log('Some success current success');

                    $('#acpgcCalculateScores').attr('data-active', 0);

                }else{
                    console.log('Some success current NOT success');
                }
            },
            error: function (response) {

                console.log('Some error');
            }
        });

    }

    $(document).on('click', '#acpgcCalculateScores[data-active="0"]', function() {

        var $button = $(this);
        $button.attr('data-active', 1);
        console.log('Calculate Scores admin js click')
        calculate_scores()

    });
})(jQuery);
