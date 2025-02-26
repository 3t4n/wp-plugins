
(function( $ ) {
	"use strict";

    function confirmHandle($callback) {
        
    }

    function opbw_toast_mess($type, $message) {
		if (typeof $.toast === 'function') {
			$.toast({
				heading: $type == 'success' ? 'Success' : 'Error',
				text: $message,
				showHideTransition: 'slide',
				icon: $type,
				position: 'top-right',
				hideAfter: 6000
			})
		} else {
			alert($message);
		}
	}

    function ajax_import($id, $position = 0) {
        $.ajax({ 
            url: opbw_script.ajaxurl,
            type: 'post',
            data: {
                action: 'opbw_restore_backup',
                id: $id,
                position: $position,
                ajax_nonce_parameter: opbw_script.security_nonce,
            },
            beforeSend: function() {
                // $box.addClass('loading');
            },
            success: function(data) {
                if (typeof data.success != 'undefined') {
                    if (data.success) {
                        let positionNext = data.data.position,
                            percentage = data.data.percentage;

                        var $progressBar = $('.opbw-popup .progress-bar');
                        if ($progressBar.length) {
                            $progressBar.css('width', percentage + '%');
                            $progressBar.find('span').text(percentage + '%');
                        }

                        if ( 'done' === positionNext) {
                            var imported = data.data.imported,
                                imported_variations = data.data.imported_variations,
                                failed = data.data.failed,
                                updated = data.data.updated,
                                skipped = data.data.skipped;

                            setTimeout(function () {
                                Swal.fire({
                                    title: "<strong style='color: #36b97e'>Successful recovery</strong>",
                                    icon: "success",
                                    html: `
                                        <ul class="results-import">
                                            <li>Imported: ${imported}</li>
                                            <li>Imported Variations: ${imported_variations}</li>
                                            <li>Failed: ${failed}</li>
                                            <li>Updated: ${updated}</li>
                                            <li>Skipped: ${skipped}</li>
                                        </ul>
                                    `,
                                    showCloseButton: true,
                                    showCancelButton: false,
                                    focusConfirm: true,
                                    confirmButtonText: `<i class="fa fa-thumbs-up"></i> Done!`,
                                });
                            }, 2000)
                        } else {
                            ajax_import($id, positionNext)
                        }

                    } else {
                        Swal.close();
                        opbw_toast_mess('error', data.data.message);
                    }
                } else {
                    Swal.close();
                    opbw_toast_mess('error', 'Error occured. Please try again!');
                }
            },
            error: function(xhr) { // if error occured
                Swal.close();
                alert("Error occured. Please try again!");
            },
            complete: function() {
            },
        });
    }

    /**
	 * ##########################################################################################
	 * History Function
	 * ##########################################################################################
	 */
	var opbwHistory = {

		init: function() {
            this.trigger_show_logs();
            this.trigger_restore_backup();
            this.trigger_delete_history();
		},

        trigger_show_logs: function() {
            $('.history-logs').on('click', function(e) {
                e.preventDefault();
                var $id = $(this).data('id');

                Swal.fire({
                    title: 'Show logs',
                    text: 'Comming soon!',
                    icon: "warning",
                    showCancelButton: false,
                    confirmButtonText: 'OK',
                    confirmButtonColor: "#36b97e",
                });
            });
        },

        trigger_restore_backup: function() {
            $('.history-restore').on('click', function(e) {
                e.preventDefault();
                var $id = $(this).data('id');

                Swal.fire({
                    title: opbw_script.translate.confirm_edit,
                    text: opbw_script.translate.confirm_notice_restore,
                    icon: "warning",
                    showCancelButton: true,
                    cancelButtonColor: "#d33",
                    cancelButtonText: opbw_script.translate.cancel_btn,
                    confirmButtonText: opbw_script.translate.confirm_btn,
                    confirmButtonColor: "#36b97e",
                }).then((result) => {
                    if (result.isConfirmed) {
                        Swal.fire({
                            title: 'Restoring backup',
                            allowEscapeKey: false,
                            allowOutsideClick: false,
                            showConfirmButton: false,
                            width: '40em',
                            customClass: {
                                container: 'opbw-popup',
                            },
                            html: `
                                <div class="restore-progress">
                                    <p class="restore-notice">Please do not reload the page during processing!</p>
                                    <div class="loading-progress">
                                        <div class="progress-box">
                                            <div class="progress-bar active progress-bar-striped progress-bar-success" role="progressbar" style="width: 0%;"><span>0%</span></div>
                                        </div>
                                    </div>
                                </div>
                            `,
                            didOpen: () => {
                                Swal.showLoading();
                                ajax_import($id);
                            },
                        });
                    }
                });
            });
        },

        trigger_delete_history: function() {
            $('.history-delete').on('click', function(e) {
                e.preventDefault();
                var $id = $(this).data('id');

                Swal.fire({
                    title: opbw_script.translate.confirm_edit,
                    text: opbw_script.translate.confirm_notice_delete,
                    icon: "warning",
                    showCancelButton: true,
                    cancelButtonColor: "#d33",
                    cancelButtonText: opbw_script.translate.cancel_btn,
                    confirmButtonText: opbw_script.translate.confirm_btn,
                    confirmButtonColor: "#36b97e",
                }).then((result) => {
                    if (result.isConfirmed) {
                        Swal.fire({
                            title: 'Delete History',
                            text: 'Please do not reload the page during processing!',
                            allowEscapeKey: false,
                            allowOutsideClick: false,
                            showConfirmButton: false,
                            // width: '40em',
                            customClass: {
                                container: 'opbw-popup',
                            },
                            didOpen: () => {
                                Swal.showLoading();
                                $.ajax({ 
                                    url: opbw_script.ajaxurl,
                                    type: 'post',
                                    data: {
                                        action: 'opbw_delete_history',
                                        id: $id,
                                        ajax_nonce_parameter: opbw_script.security_nonce,
                                    },
                                    beforeSend: function() {
                                        // $box.addClass('loading');
                                    },
                                    success: function(data) {
                                        if (typeof data.success != 'undefined') {
                                            if (data.success) {
                                                $(`#post-${$id}`).slideUp(1000, function() {
                                                    $(this).remove();
                                                });
                                                opbw_toast_mess('success', data.data.message);
                                            } else {
                                                opbw_toast_mess('error', data.data.message);
                                            }
                                        } else {
                                            opbw_toast_mess('error', 'Error occured. Please try again!');
                                        }
                                    },
                                    error: function(xhr) { // if error occured
                                        alert("Error occured. Please try again!");
                                    },
                                    complete: function() {
                                        Swal.close();
                                    },
                                });
                            },
                        });
                    }
                });
            });
        },
    }

    opbwHistory.init();

})( jQuery );
