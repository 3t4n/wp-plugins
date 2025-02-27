window.onload = function(){
    document.onclick = function(e){
        var popup = document.getElementById('awecm-survey-form');
        var overlay = document.getElementById('awecm-survey-form-wrap');
        var openButton = document.getElementById('deactivate-email-customizer-and-designer-for-woocommerce');
        if(e.target.id == 'awecm-survey-form-wrap'){
            popup.style.display = 'none';
            overlay.style.display = 'none';
        }
        if(e.target === openButton){
            e.preventDefault();
            popup.style.display = 'block';
            overlay.style.display = 'block';
        }
        if(e.target.id == 'aco_skip'){ 
            e.preventDefault();
            var urlRedirect = document.querySelector('[data-slug="email-customizer-and-designer-for-woocommerce"] a').getAttribute('href');
            window.location = urlRedirect;
        }
        if(e.target.id == 'aco_cancel'){ 
            e.preventDefault();
            popup.style.display = 'none';
            overlay.style.display = 'none';
        }
    };
    jQuery("#awecm-survey-form form").on('submit', function(e) {
        e.preventDefault();
        var valid = validate();
		if (valid) {
            var urlRedirect = document.querySelector('[data-slug="email-customizer-and-designer-for-woocommerce"] a').getAttribute('href');
            var form = jQuery(this);
            var serializeArray = form.serializeArray();
            var actionUrl = 'https://feedback.acowebs.com/plugin.php';
            jQuery.ajax({
                type: "post",
                url: actionUrl,
                data: serializeArray,
                contentType: "application/javascript",
                dataType: 'jsonp',
                beforeSend: function () {
					jQuery('#awecm_deactivate').prop( 'disabled', 'disabled' );
                },
                success: function(data)
                {
                    window.location = urlRedirect;
                },
                error: function (jqXHR, textStatus, errorThrown) { 
                    window.location = urlRedirect;
                }
            });
        }
    });
    jQuery('#awecm-survey-form .aco-comments textarea').on('keyup', function () {
		validate();
	});
    jQuery("#awecm-survey-form form input[type='radio']").on('change', function(){
        validate();
        let val = jQuery(this).val();
        if ( val == 'I found a bug' || val == 'Plugin suddenly stopped working' || val == 'Plugin broke my site' || val == 'Other' || val == 'Plugin doesn\'t meets my requirement' ) {
            jQuery("#awecm-survey-form form .aco-comments").show();
        } else {
            jQuery("#awecm-survey-form form .aco-comments").hide();
        }
    });
    function validate() {
		var error = '';
		var reason = jQuery("#awecm-survey-form form input[name='Reason']:checked").val();
		if ( !reason ) {
			error += 'Please select your reason for deactivation';
		}
		if ( error === '' && ( reason == 'I found a bug' || reason == 'Plugin suddenly stopped working' || reason == 'Plugin broke my site' || reason == 'Other' || reason == 'Plugin doesn\'t meets my requirement' ) ) {
			var comments = jQuery('#awecm-survey-form .aco-comments textarea').val();
			if (comments.length <= 0) {
				error += 'Please specify';
			}
		}
		if ( error !== '' ) {
			jQuery('#aco-error').html(error);
			return false;
		}
		jQuery('#aco-error').html('');
		return true;
	}
}