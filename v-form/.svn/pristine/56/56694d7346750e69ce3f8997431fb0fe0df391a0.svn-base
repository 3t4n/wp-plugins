jQuery(document).ready(function ($) {
    $('.vform_deactivate-link').on('click', function (e) {
        e.preventDefault();
        $('#vform_frm-deactivation-modal').fadeIn();
    });

    $('#vform_submit-feedback').on('click', function () {
        const reason = $('input[name="reason"]:checked').val();
        const details1 = $('textarea[name="haveyoufound"]').val();
        const details2 = $('textarea[name="featuremissing"]').val();
        const details3 = $('textarea[name="describereason"]').val();

        if (!reason) {
            alert('Please select a reason.');
            return;
        }

        var nonce = $('#myvformdata66form').serialize();
        var postdata = "action=vformfeedback&param=save_vform&reason="+reason+"&details1="+details1+"&details2="+details2+"&details3="+details3+"&"+nonce;
        jQuery.post(ajax_object,postdata,function(response){
          var data = jQuery.parseJSON(response);
        //   console.log(data);
            window.location.reload();
        });

    });

    $('#vform_skip-deactivate').on('click', function () {

        const reason = 'skip';
        const details1 = '';
        const details2 = '';
        const details3 = '';


        var nonce = $('#myvformdata66form').serialize();
        var postdata = "action=vformfeedback&param=save_vform&reason="+reason+"&details1="+details1+"&details2="+details2+"&details3="+details3+"&"+nonce;
        jQuery.post(ajax_object,postdata,function(response){
          var data = jQuery.parseJSON(response);
        //   console.log(data);
            window.location.reload();

         
        });
        
    });
    $('.vform_frm-modal-close').on('click', function () {
        $('#vform_frm-deactivation-modal').fadeOut();
    });
    $('#vform_deactivation-feedback-form .vform_checkreason').click(function(){
        var getname = $(this).val();
        $('#vform_deactivation-feedback-form [name="haveyoufound"]').hide();
        $('#vform_deactivation-feedback-form [name="featuremissing"]').hide();
        $('#vform_deactivation-feedback-form [name="describereason"]').hide();
        if(getname=='found_better_plugin'){
            $('#vform_deactivation-feedback-form [name="haveyoufound"]').show();
        }else if(getname=='no_needed_feature'){
            $('#vform_deactivation-feedback-form [name="featuremissing"]').show();
         }else if(getname=='other'){
            $('#vform_deactivation-feedback-form [name="describereason"]').show();
         }


    });
});
