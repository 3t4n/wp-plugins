$(document).ready(function(){

    $("#SaveCategory").live('click', function(){

        var cat_list = "";

        $("#PopupCategoryList input[type='checkbox']:checked").each(function( index, value ){

            cat_list += $(this).val() + ",";

        });


        // call Jquery Ajax API
        var request = $.ajax({

            url:"../wp-admin/admin-ajax.php",
            type: "POST",
            beforeSend: function(){},
            data: "action=Admin_Ajax_Handler&callback_function=Save_Category_Lightbox&cats="+cat_list

        });

        request.done(function( res ){
            
            $("#WP_cl_categories").html(res);

        });


    });

});