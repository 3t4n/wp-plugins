jQuery(document).ready(function ($) {

    /*
     function load_my_ajax() {
     $("#loadingmessage").show();

     var post_id = 12;
     var title = $(".se2").val();

     jQuery.ajax({
     url: my_ajax_url.ajax_url,
     type: 'POST',
     data:{
     action: 'my_ajax_function' ,
     id: post_id,
     title: title
     },
     success: function( response ){

     jQuery( '#ajax-response' ).html( response );
     $('#loadingmessage').hide();
     }
     });
     }
     */

    $('#search_me').submit(function (e) {
        $("#loadingmessage").show();
        var postData = $('#search_me').serialize();
        var action = "my_ajax_function";

        $.ajax({

            url: my_ajax_url.ajax_url,
            type: "POST",
            data: postData + '&action=' + action,
            success: function (data) {

                $('#ajax-response').html(data);
                $('#loadingmessage').hide();

            }

        });

        e.preventDefault();

    });

});