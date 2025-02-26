jQuery(document).ready(function ($) {
    'use strict';

    function upload_image() {
        var affi_img_uploader;
        $(document).on('click', '.affi-upload-badge-remove', function () {
            let wrap = $(this).closest('.affi-upload-badge-wrap');
            let src_placeholder = wrap.find('.affi-upload-badge-preview img').data('src_placeholder');
            wrap.find('.affi-rank-badge').val('');
            wrap.find('.affi-upload-badge-preview img').attr('src', src_placeholder);

            $(this).addClass('affi-hidden');
        });
        $(document).on('click', '.affi-upload-badge-add-new', function (e) {
            e.preventDefault();
            $(this).closest('.affi-upload-badge-wrap').addClass('affi-upload-img-editing');
            let editing = $('.affi-upload-img-editing');
            //If the uploader object has already been created, reopen the dialog
            if (affi_img_uploader) {
                affi_img_uploader.open();
                return false;
            }
            //Extend the wp.media object
            affi_img_uploader = wp.media.frames.file_frame = wp.media({
                title: 'Choose Badge',
                button: {
                    text: 'Choose Badge'
                },
                multiple: true
            });

            //When a file is selected, grab the URL and set it as the text field's value
            affi_img_uploader.on('select', function () {
                let attachment = affi_img_uploader.state().get('selection').first().toJSON();
                editing.find('.affi-rank-badge').val(attachment.id);
                editing.find('.affi-upload-badge-preview img').attr('src', attachment.url);
                editing.find('.affi-upload-badge-remove').removeClass('affi-hidden');
                editing.removeClass('affi-upload-img-editing');
            });

            //Open the uploader dialog
            affi_img_uploader.open();
        });
    }

    $('.affi-dropdown').each(function () {
        let placeholder = $(this).attr('placeholder');
        $(this).viDropdown({placeholder});
    });

    upload_image();

    // $(document).on('click', '.affi-affiliates-action', function (e) {
    //     e.preventDefault();
    //     e.stopPropagation();
    //     show_modal_aff_edit('add_new', '');
    // });
    //
    // $(document).on('click', '.affi-aff-user-edit-btn', function (e) {
    //     e.preventDefault();
    //     e.stopPropagation();
    //     show_modal_aff_edit('edit', $(e.target).closest('.affi-row-actions'));
    // });
    //
    //
    // /*Function show modal*/
    // function show_modal_aff_edit(type, selector = '') {
    //     $('.affi-actions-button').removeClass('affi-hidden');
    //     if (type === 'add_new') {
    //
    //         $('.affi-affiliates-popup-title-new').removeClass('affi-hidden');
    //         $('.affi-affiliates-popup-title-edit').addClass('affi-hidden');
    //         $('.affi-aff-user-select').removeClass('affi-hidden');
    //         $('.affi-aff-user-edit').addClass('affi-hidden');
    //         $('.affi-aff-user-status').addClass('affi-hidden');
    //
    //         $('.affi-create-aff-user').removeClass('affi-hidden');
    //         $('.affi-save-aff-user').addClass('affi-hidden');
    //     } else if (type === 'edit') {
    //         let aff_name = selector.closest('td').find('.affi-aff-user-table').html(),
    //             aff_id = selector.data('id'),
    //             new_rank = selector.data('rank'),
    //             new_status = selector.data('status');
    //
    //         // $('.affi-loading').addClass('active');
    //         $('.affi-affiliates-popup-title-new').addClass('affi-hidden');
    //         $('.affi-affiliates-popup-title-edit').removeClass('affi-hidden');
    //         $('.affi-aff-user-select').addClass('affi-hidden');
    //         $('.affi-aff-user-edit').removeClass('affi-hidden');
    //         $('.affi-aff-user-status').removeClass('affi-hidden');
    //         $('.affi-create-aff-user').addClass('affi-hidden');
    //         $('.affi-save-aff-user').removeClass('affi-hidden');
    //
    //         $('#affi_get_user_input').data('id', aff_id).val(aff_name);
    //         $('#affi_set_user_rank').viDropdown('set selected', new_rank);
    //         $('#affi_set_user_status').viDropdown('set selected', new_status);
    //
    //
    //     }
    // }
    //
    // $(".affi-set-user-select2").select2({
    //     closeOnSelect: true,
    //     placeholder: "Search for user",
    //     ajax: {
    //         url: "admin-ajax.php?action=affi_search_user",
    //         dataType: 'json',
    //         type: "GET",
    //         quietMillis: 50,
    //         delay: 250,
    //         data: function (params) {
    //             return {
    //                 nonce: affiParams.nonce,
    //                 keyword: params.term
    //             };
    //         },
    //         processResults: function (data) {
    //             return {
    //                 results: data
    //             };
    //         },
    //         cache: true
    //     },
    //     escapeMarkup: function (markup) {
    //         return markup;
    //     },
    //     minimumInputLength: 1
    // });
    // // .on('select2:open', function (e) {
    // //     bopobb_active_select = e.currentTarget;
    // // }).on("select2:selecting", function (e) {
    // //     bopobb_active_select = e.currentTarget;
    // // }).on("select2:unselecting", function (e) {
    // //     bopobb_active_select = e.currentTarget;
    // // });
    //
    // /*Action click button delete*/
    // $(document).on('click', '.affi-aff-user-delete-btn', function (e) {
    //     e.preventDefault();
    //     e.stopPropagation();
    //     if (confirm("You definitely want to take this action. Affiliate deletion cannot be undone!")) {
    //
    //         let aff_id = $(this).closest('.affi-row-actions').data('id');
    //         $.ajax({
    //             url: affiParams.ajaxUrl,
    //             type: 'POST',
    //             data: {
    //                 nonce: affiParams.nonce,
    //                 action: 'affi_delete_affiliate_user',
    //                 aff_id: aff_id,
    //             },
    //             success(responsive) {
    //                 if (responsive.status) {
    //                     window.location.reload();
    //                 } else {
    //                     if (responsive.message) {
    //                         alert(responsive.message);
    //                     }
    //                 }
    //
    //             }
    //         });
    //     }
    // });
    //
    // /*Save edit ticket category*/
    // $(document).on('click', '.affi-save-aff-user', function (e) {
    //     let selector = $(e.target),
    //         aff_id = $('#affi_get_user_input').data('id'),
    //         new_rank = $('#affi_set_user_rank').val(),
    //         new_status = $('#affi_set_user_status').val();
    //     // $('.affi-loading').addClass('active');
    //
    //     $(this).addClass('loading');
    //     $.ajax({
    //         url: affiParams.ajaxUrl,
    //         type: 'POST',
    //         data: {
    //             nonce: affiParams.nonce,
    //             action: 'affi_edit_affiliate_user',
    //             aff_id: aff_id,
    //             rank: new_rank,
    //             status: new_status,
    //         },
    //         success(responsive) {
    //             if (responsive) {
    //                 window.location.reload();
    //             } else {
    //                 $(selector).removeClass('loading');
    //                 if (responsive.message) {
    //                     alert(responsive.message);
    //                 } else {
    //                     alert('Oops! Something went error, please try again');
    //                 }
    //             }
    //             // $('.affi-loading').removeClass('active');
    //         }
    //     });
    //     return false;
    // });
    //
    // /*Create ticket category*/
    // $(document).on('click', '.affi-create-aff-user', function (e) {
    //     let type = $(e.currentTarget).data('actions'),
    //         selector = $(e.target),
    //         $container = selector.closest('.vi-ui.modal');
    //
    //     let user_id = $container.find('#affi_set_user_input').val();
    //     let user_rank = $container.find('#affi_set_user_rank').val();
    //     selector.addClass('loading');
    //     if (user_id === '' || user_rank === '') {
    //         alert('Please input all require field!');
    //     } else {
    //         $.ajax({
    //             url: affiParams.ajaxUrl,
    //             type: 'POST',
    //             data:{
    //                 nonce: affiParams.nonce,
    //                 action: 'affi_create_affiliate_user',
    //                 user_id: user_id,
    //                 user_rank: user_rank,
    //             },
    //             success(responsive) {
    //                 if (responsive) {
    //                     window.location.reload();
    //                 } else {
    //                     if (responsive.message) {
    //                         alert(responsive.message);
    //                     } else {
    //                         alert('Oops! Something went error, please try again');
    //                     }
    //                 }
    //                 selector.removeClass('loading');
    //             }
    //         });
    //     }
    //     return false;
    // });
});