jQuery(document).ready(function($) {
    $( '#btn-activate-api' ).on( 'click', function(e) {
        //e.preventDefault();

        jQuery("#submit").trigger("click");
        

        var api_key = jQuery('#reoon_api_key').val();


        var data = {
            'action': 'validate_reoon_api',
            'api_key': api_key
        };
        
        // jQuery.ajax({
        //     method:'post',
        //     url:reoon_obj.ajaxurl,
        //     data:data,
        //     success:function(d)
        //     {
        //         console.log(d);
        //         window.location.reload();
        //     },
        //     error:function(e)
        //     {
        //         console.log(e);
        //         alert("error");
        //     }
        // });
    });



    jQuery("#send_test_email").click(function(){
        
        var email = jQuery("#test_email").val();
        var btn = jQuery(this);
        var defaultText = btn.text();
        btn.text("Testing...");
        btn.prop("disabled",true);
        if(!email)
        {
            alert("Please enter an email address");
            return;
        }


        var data = {
            'action': 'validate_reoon_email',
            'email': email
        };
        
        jQuery.ajax({
            method:'post',
            url:reoon_obj.ajaxurl,
            data:data,
            success:function(d)
            {
                btn.text(defaultText);
                btn.prop("disabled",false);
                console.log(d);
                //alert(d);
                
                jQuery('.reo-modal-body').html(d);
                jQuery('#email-test-model').show();
                
            },
            error:function(e)
            {
                btn.text(defaultText);
                btn.prop("disabled",false);
                console.log(e);
                alert("error validating");
            }
        });

    });


});


(function($) {
    $(document).ready(function() {
      // Open modal
      $('.reo-modal-open').click(function() {
        var modal_id = $(this).data('email-test-model');
        $('#' + modal_id).show();
      });
  
      // Close modal
      $('.reo-modal-close, .reo-modal').click(function() {
        $('.reo-modal').hide();
      });
  
      // Prevent modal from closing when clicking on content
      $('.reo-modal-content').click(function(e) {
        e.stopPropagation();
      });
    });
  })(jQuery);
  



  jQuery(document).ready(function($) {
    var isClicked = false;
    $('.reo-remove-apikey').on('click', function(e) {
        e.preventDefault();
        if (isClicked) {
            return;
        }
        isClicked = true;
        if (confirm("Are you sure you want to remove the API key?")) {
            $.ajax({
                url: ajaxurl,
                type: 'POST',
                data: {
                    action: 'reoon_remove_api_key',
                    api_key: ''
                },
                beforeSend: function() {
                    $('.reo-remove-apikey').html('Removing...');
                },
                success: function(response) {          
                    location.reload();          
                    jQuery('.reo-modal-body').html("API key removed successfully");                    
                    jQuery('#email-test-model').show();
                },
                error: function(xhr, status, error) {                    
                    jQuery('.reo-modal-body').html('Error removing API key');
                    jQuery('#email-test-model').show();
                },
                complete: function() {
                    $('.reo-remove-apikey').html('Remove API Key');
                    isClicked = false;
                }
            });
            $('input[name="reoonev-settings[reoon_api_key]"]').val('');
        } else {
            isClicked = false;
        }
    });
});
