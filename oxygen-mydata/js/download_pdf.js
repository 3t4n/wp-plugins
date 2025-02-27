/**
 * Oxygen Payment Js code for handling modal windows of payment
 *
 * @package Oxygen Payments
 * @version 1.0.56
 * @author Oxygen
 * @since 1.0.0
 *
 * This file handle oxygen payment window
 */


jQuery( document ).ready(

    function ( $ ) {

        $(".send_invoice_email").on('click', function (e) {

            e.stopPropagation();

            let order_info = $(this).closest('tr').attr("id");

            var order_id = '';

            if (typeof order_info !== 'undefined' && order_info !== null) {
                order_id = order_info.split('-')[1];
            }else{
                order_id = $('#order').find('input[name="post_ID"]').val();
            }
            // console.log(order_id);

            var download_pdf_div = $('#order-'+order_id).find('.download_pdf_orders');
            var doctype = '';
            var classList = '';

            if (typeof download_pdf_div !== 'undefined' && download_pdf_div !== null && download_pdf_div.length > 0) {

                classList = download_pdf_div.attr('class').split(/\s+/);
                classList.forEach(function (className) {
                    if (className.startsWith('doctype_')) {
                        doctype = className.split('_')[1];
                    }
                });
            }else{

                classList = $(this).parent().find('.download_pdf_orders').attr('class').split(/\s+/);
                classList.forEach(function (className) {
                    if (className.startsWith('doctype_')) {
                        doctype = className.split('_')[1];
                    }
                });
            }

            // console.log(doctype);


            $.ajax({
                type: 'POST',
                url: download_pdf_action.ajax_url,
                data: {
                    action: 'send_invoice_email_on_click_action',
                    order_id: order_id,
                    document_type: doctype
                },
                beforeSend: function() {
                    $.blockUI({
                        message: '',
                        css: {
                            border: 'none',
                            padding: '15px',
                            backgroundColor: '#000',
                            color: '#fff',
                            opacity: 0.7
                        }
                    });
                },
                success: function(response) {

                    $.unblockUI();
                    displayAdminNotice('Document sent successfully to customer\'s email address.', 'success');
                },
                error: function() {

                    $.unblockUI();
                    displayAdminNotice('An error occurred while sending file via email.', 'error');
                }
            });

        });

        $(".download_pdf_orders").on('click', function (e) {

            e.stopPropagation();

            let document_id = $(this).attr("id");
            var classList = $(this).attr('class').split(/\s+/);
            var doctype = '';

            classList.forEach(function (className) {
                if (className.startsWith('doctype_')) {
                    doctype = className.split('_')[1];
                }
            });

            const $this = $(this);

            $this.children('.loader_pdf').addClass('loading_pdf_download');
            $this.css('opacity', '.5');

            $.ajax({
                type: 'POST',
                url: download_pdf_action.ajax_url,
                data: {
                    action: 'download_pdf_action',
                    document_id: document_id,
                    doctype : doctype
                },
                success: function(response) {

                    var data = response['data'];

                    if (data !== undefined && data['message'] === undefined && data.startsWith("http")) { // Ensure it's a URL

                        var downloadLink = document.createElement('a');
                        let document_name = data.split('/').pop();

                        downloadLink.href = data;

                        if(document_name !== null && document_name !== '') {
                            downloadLink.download = document_name;
                        }else{
                            displayAdminNotice('Document has no name', 'error');
                        }

                        document.body.appendChild(downloadLink);
                        downloadLink.click();
                        displayAdminNotice('PDF document file downloaded successfully.', 'success');
                        document.body.removeChild(downloadLink);

                        $this.children('.loader_pdf').removeClass('loading_pdf_download');
                        $this.css('opacity','1');

                        setTimeout(function(){
                            delete_pdf_after_download(document_name);
                        }, 500);

                        $('.notice.pdf_downloaded').delay(2000).hide('slow'); /* auto remove notice */

                    } else {

                        if(data !== undefined && data['message'] !== '') {
                            displayAdminNotice(data['message'], 'error');
                        }else{
                            $this.children('.loader_pdf').removeClass('loading_pdf_download');
                            $this.css('opacity','1');
                        }
                    }
                },
                error: function() {
                    displayAdminNotice('An error occurred while downloading the file.', 'error');
                }
            });
        });

        function delete_pdf_after_download(document_name){

            if(document_name !== ''){

                $.ajax({
                    type: 'POST',
                    url: download_pdf_action.ajax_url,
                    data: {
                        action: 'delete_pdf_after_downloading',
                        document_name: document_name
                    },
                    success: function(response) {

                        if(response){
                            var data = response['data'];

                            if (data.hasOwnProperty('message')) {
                                displayAdminNotice(data['message'], 'success');
                            }
                        }

                    }
                });

            }
        }

        function displayAdminNotice(message, type = 'success') {

            let currentUrl = window.location.href;

            let noticeClass = (type === 'error') ? 'notice-error' : 'notice-success';

            let notice = $(`
                <div class="notice ${noticeClass} is-dismissible pdf_downloaded">
                    <p>${message}</p>
                    <button type="button" class="notice-dismiss"></button>
                </div>
            `);


            if (currentUrl.includes('action=edit')) {

                $('.wrap form#order').before(notice);

            } else {
                $('.wrap ul:first').before(notice);
            }

            notice.on('click', '.notice-dismiss', function() {
                notice.remove();
            });
        }
    }
);