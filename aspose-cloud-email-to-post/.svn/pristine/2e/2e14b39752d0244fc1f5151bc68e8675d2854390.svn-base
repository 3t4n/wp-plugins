jQuery(document).ready(function($){

    jQuery.ajax
    ({
        type : "post",
        dataType : "html",
        url : APCEmailParams['aspose_files_url'],
        data : {appSID: APCEmailParams['appSID'], appKey : APCEmailParams['appKey']},
        success: function(response) {
            $('#aspose_cloud_email').append(response);

        }
    });

    $('#aspose_folder_name').live('change',function() {
        var selected_folder_name = $(this).val();
        if(selected_folder_name != '') {
            jQuery.ajax
            ({
                type : "post",
                dataType : "html",
                url : APCEmailParams['aspose_files_url'],
                data : {appSID: APCEmailParams['appSID'], appKey : APCEmailParams['appKey'], aspose_folder : selected_folder_name},
                success: function(response) {
                    $('#aspose_cloud_email').html(response);

                }
            });
        }
    });



    $('#tabs').tabs();
    $('#apc_email_to_post_popup').live("click",function(){
        $("#apc_email_to_post_popup_container").dialog('open');

    });
    $("#apc_email_to_post_popup_container").dialog({
        autoOpen: false,
        resizable: false,
        modal: true,
        width:'auto',
        height:'300',
    });


    $('#insert_email_content').live('click',function(){

        var filename = $('#email_file_name').val();
        var post_ID = $('#post_ID').val();
        $("#apc_email_to_post_popup_container").dialog('close');
        $body = $("body");
        $body.addClass("loading");

        jQuery.ajax
        ({
            type : "post",
            dataType : "html",
            url : APCEmailParams['insert_email_url'],
            data : {appSID: APCEmailParams['appSID'], appKey : APCEmailParams['appKey'], filename : filename, uploadpath: APCEmailParams['uploadpath'] , uploadURI: APCEmailParams['uploadURI'], post_ID : post_ID},
            success: function(response) {
                $body.removeClass("loading");
                var parsed_response = jQuery.parseJSON(response);
                if(parsed_response.post_title !=''){

                    jQuery('#title-prompt-text').html('');
                    jQuery('input[name=post_title]').val(parsed_response.post_title);
                }

                window.send_to_editor(parsed_response.post_content);
            }
        });
    });

    $('#insert_aspose_email_content').live('click',function(){
        var filename = $('input[name="aspose_filename"]:checked').val();
        $("#aspose_doc_popup_container").dialog('close');
        $body = $("body");
        $body.addClass("loading");

        jQuery.ajax
        ({
            type : "post",
            dataType : "html",
            url : APCEmailParams['insert_email_url'],
            data : {appSID: APCEmailParams['appSID'], appKey : APCEmailParams['appKey'], filename : filename, uploadpath: APCEmailParams['uploadpath'] , aspose : '1'},
            success: function(response) {
                $body.removeClass("loading");
                window.send_to_editor(response);
            }
        });

    });


});



