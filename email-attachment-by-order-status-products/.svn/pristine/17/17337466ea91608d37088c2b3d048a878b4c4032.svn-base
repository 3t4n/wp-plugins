var ocount = 1;
jQuery(function ($) {
    if( !$('.wot_ea_order_email_attachment').is(':checked') ) {
        $('.OrderEmailAttachmentSection').hide();
        $(".wot_ea_order_status").val('');
        //$(".wot_ea_product_option").removeAttr('checked');
        $(".wot_ea_product_option").first().prop("checked", true);
        $('.product-type-selection').html('');
        $('.wot_ea_attachment_file').attr('href','javascript:void(0)').html('<i class="dashicons-before dashicons-upload"></i>');
        $('.wot_ea_attachment_file').next().hide();
        $('.wot_attachment_file_input').val('');
    }
    $('body').on( 'change','.wot_ea_order_email_attachment',function () {
        if( $(this).is(':checked') ) {
            $('.OrderEmailAttachmentSection').show();
        }
        else {
            $('.OrderEmailAttachmentSection').hide();
        }
    });
        $('body').on( 'change','.wot_ea_product_option',function () {
            var product_ption = $(this).val();

            var current_lists = $(this).parent().parent().parent().parent();
            var a_count = current_lists.find('.attach_counter').val();

            $.ajax({
                type: "POST",
                url: 'admin-ajax.php',
                data: {
                    'action': 'wot_get_product_type',
                    'product_ption':product_ption,
                    'a_count':a_count
                },
                beforeSend: function beforeSend() {

                },
                success: function success(data) {
                    $(current_lists).find('.product-type-selection').html(data);

                }
            });
        });


    $('body').on( 'click', '.add-order-attachment', function(e) {
        var attachment_clone =  $('.woo-attachment-settings-section').clone();
        var a_count = attachment_clone.find('.attach_counter').val();


        attachment_clone.find('.wot_ea_order_status').attr('name','theme_options[wot_woo_email_attach]['+a_count+'][wot_ea_order_status]').attr('required');
        attachment_clone.find('.wot_ea_order_status').attr('required',true);
        attachment_clone.find('.wot_ea_product_option').attr('name','theme_options[wot_woo_email_attach]['+a_count+'][wot_ea_product_option]');
        attachment_clone.find('.product-type-selection').html('');
        attachment_clone.find('.wot_ea_product_type').attr('name','theme_options[wot_woo_email_attach]['+a_count+'][wot_ea_product_type]');
        attachment_clone.find('.wot_attachment_file_default').attr('name','theme_options[wot_woo_email_attach]['+a_count+'][wot_ea_attachment_file]').val('').attr('required',true);

        var attachment_lang = attachment_clone.find('.wot_attachment_file_lang');
        attachment_lang.each(function () {
            $(this).attr('name','theme_options[wot_woo_email_attach]['+a_count+'][wot_ea_attachment_file_lang]['+$(this).attr("data-lang")+']').val('');
        });

        attachment_clone.find('.wot_ea_attachment_file').attr('href','javascript:void(0)').html('<i class="dashicons-before dashicons-upload"></i>');
        attachment_clone.find('.wot_ea_attachment_file').next().hide();
        //attachment_clone.find('table .wot-ea-form-table-add tr:first-child').append('<td><a href="javascript:void(0)" class="remove-new-order-attachment-option"><i class="dashicons-before dashicons-dismiss"></i></a></td>');
        attachment_clone.find('.attach_counter').val(a_count);


        a_count++;
        $('.woo-attachment-settings-section').find('.attach_counter').val(a_count);
        $('.add-more-section').append(attachment_clone.html());
    });
   $('body').on( 'click', '.remove-new-order-attachment-option', function(e) {
        $(this).parent().parent().parent().remove();
   });

   $('body').on( 'click', '.remove-order-attachment-option', function(e) {

       var orderRow = $(this);
       var order_status_key = orderRow.parent().parent().attr('data-id');
       $.ajax({
           type: "POST",
           url: 'admin-ajax.php',
           data: {
               'action': 'wot_remove_order_status_row',
               'order_status_key':order_status_key,

           },
           beforeSend: function beforeSend() {

           },
           success: function success(data) {
               orderRow.parent().parent().remove();

           }
       });
   });
   $('body').on( 'click', '.wot_ea_attachment_file', function(e){

           e.preventDefault();

           var button = $(this),
               custom_uploader = wp.media({
                   title: 'Insert File',
                   library : {
                       // uploadedTo : wp.media.view.settings.post.id, // attach to the current post?
                       /* type : 'image'*/
                   },
                   button: {
                       text: 'Use this file' // button label text
                   },
                   multiple: false
               }).on('select', function() { // it also has "open" and "close" events
                   var attachment = custom_uploader.state().get('selection').first().toJSON();

                   button.html(attachment.filename);
                   button.attr('href',attachment.url).next().show().next().val(attachment.id);

                   if(button.parent().hasClass('file-attachment-section')) {
                       button.parent().parent().parent().parent().parent().find('.file_validtion').hide();
                   }
               }).open();
       });

    // on remove button click
    $('body').on('click', '.remove-attachment', function(e){

        e.preventDefault();

        var button = $(this);
        button.next().val(''); // emptying the hidden field
        button.hide().prev().attr('href','javascript:void(0)');
        button.hide().prev().html('<i class="dashicons-before dashicons-upload"></i>');

    });

});
function checkValidation () {
   var attach_files = jQuery('.add-more-section .wot-ea-form-table-add .wot_attachment_file_default');
   var validate = true;
   if(attach_files) {
       attach_files.each(function () {
           var wot_attachment_file_default = jQuery(this).val();
           if(wot_attachment_file_default == '') {
               console.log(jQuery(this).parent().parent().parent().parent().parent().html());
               jQuery(this).parent().parent().parent().parent().parent().find('.file_validtion').show();
               validate = false;
           }
       });
   }
    if(validate) {

        return true;
    }
    else {

        return false;
    }



}