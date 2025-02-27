jQuery(document).ready(function($) {
    $('#agent_login').submit(function(event){
        event.preventDefault();


        var ajaxurl = $(this).data('ajaxurl');
        var data = $(this).serialize();
        
        if ($('input[name="password"]').val() == $('input[name="repassword"]').val()) {

            $('.agent-register-info .msg').html('Please Wait...');
            $('.agent-register-info').show();
            
            $.post(ajaxurl, data, function(resp) {
                if (resp.status == 'already') {
                    $('.agent-register-info .msg').html(resp.msg);
                    $('.agent-register-info').show();
                } else {
                    $('.agent-register-info .msg').html(resp.msg);
                    $('.agent-register-info').removeClass('alert-info').addClass('alert-success');
                    window.location.reload();
                }
            }, 'json');
        } else {
            alert('Passwords did not match!');
        }

    });
});