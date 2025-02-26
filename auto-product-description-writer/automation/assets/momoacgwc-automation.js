/*global jQuery*/
/*global define */
/*global window */
/*global this*/
/*global tinymce*/
/*global document*/
/*global momoacgwc_automation_admin*/
/*global console*/
/*global FileReader*/
/*global location*/
/*jslint this*/
/**
 * Woo Product Writer (momoacgwc) Admin Script
 */
jQuery(document).ready(function ($) {
    "use strict";
    function loadWorkflowsList() {
        var $parent = $('.momoacgwc-automation-workflows-list').closest('.momo-be-main-tabcontent');
        var $working = $parent.find('.momo-be-working-two');
        $.ajax({
            beforeSend: function () {
                $working.addClass('show');
            },
            dataType: 'json',
            url: momoacgwc_automation_admin.ajaxurl,
            type: 'POST',
            data: {
                action: 'momoacgwc_automation_load_workflows_list',
                security: momoacgwc_automation_admin.momoacgwc_ajax_nonce
            },
            success: function (response) {
                console.log(response.content);
                $('.momoacgwc-automation-workflows-list').html(response.content);
            },
            complete: function () {
                $working.removeClass('show');
            },
            error: function (xhr, status, error) {
                console.log(error);
            }
        });
    }

    // Load list on page load
    loadWorkflowsList();
    function reloadEditor(editorID) {
        // Remove existing TinyMCE instance
        if (typeof tinymce !== "undefined" && tinymce.get(editorID)) {
            tinymce.get(editorID).remove();
        }

        // Reinitialize TinyMCE
        tinymce.init({
            selector: "#" + editorID,
            menubar: false,
            toolbar: "bold italic | alignleft aligncenter alignright | bullist numlist outdent indent",
            setup: function(editor) {
                editor.on('change', function() {
                    tinymce.triggerSave(); // Save changes back to textarea
                });
            }
        });

        // Re-enable Quicktags (Text mode)
        if (typeof quicktags !== "undefined") {
            quicktags({ id: editorID });
            QTags._buttonsInit();
        }
    }
    $('body').on('click', 'table.momo-acgwc-automation-list a.delete-automation', function () {
        var $btn = $(this);
        var workflow_id = $btn.data('id');
        var $parent = $btn.closest('.momo-be-main-tabcontent');
        var $contentBox = $parent.find('#momo-be-automation-automation').find('.momo-admin-content-box');
        var $msgBox = $parent.find('.momo-be-msg-block');
        $msgBox.html('').removeClass('show').removeClass('warning').removeClass('info').css('margin-bottom', '12px');
        var $working = $parent.find('.momo-be-working-two');
        var ajaxdata = {};
        ajaxdata.workflow_id = workflow_id;
        ajaxdata.type = 'edit';
        ajaxdata.action = 'momoacgwc_automation_delete_automation';
        ajaxdata.security = momoacgwc_automation_admin.momoacgwc_ajax_nonce;
        $.ajax({
            beforeSend: function () {
                $working.addClass('show');
                $('html, body').animate({ scrollTop: 0 }, 800);
                $msgBox.html(momoacgwc_automation_admin.delete).addClass('info').addClass('show');
            },
            type: 'POST',
            dataType: 'json',
            url: momoacgwc_automation_admin.ajaxurl,
            data: ajaxdata,
            success: function (data) {
                console.log(data);
                if (data.hasOwnProperty('status') && 'good' === data.status) {
                    $msgBox.html(data.message).addClass('info');
                    loadWorkflowsList();
                }
            },
            complete: function () {
                $working.removeClass('show');
            }
        });
    });
    $('body').on('click', 'table.momo-acgwc-automation-list a.edit-automation', function () {
        var $btn = $(this);
        var workflow_id = $btn.data('id');
        var $parent = $btn.closest('.momo-be-main-tabcontent');
        var $contentBox = $parent.find('#momo-be-automation-automation').find('.momo-admin-content-box');
        var $msgBox = $parent.find('.momo-be-msg-block');
        $msgBox.html('').removeClass('show').removeClass('warning').removeClass('info').css('margin-bottom', '12px');
        var $working = $parent.find('.momo-be-working-two');
        var ajaxdata = {};
        ajaxdata.workflow_id = workflow_id;
        ajaxdata.type = 'edit';
        ajaxdata.action = 'momoacgwc_automation_edit_form';
        ajaxdata.security = momoacgwc_automation_admin.momoacgwc_ajax_nonce;
        $.ajax({
            beforeSend: function () {
                $working.addClass('show');
                $('a[href="#momo-be-automation-automation"]').click();
                $('html, body').animate({ scrollTop: 0 }, 800);
                $contentBox.addClass('working');
                $msgBox.html(momoacgwc_automation_admin.generating).addClass('info').addClass('show');
            },
            type: 'POST',
            dataType: 'json',
            url: momoacgwc_automation_admin.ajaxurl,
            data: ajaxdata,
            success: function (data) {
                console.log(data);
                if (data.hasOwnProperty('status') && 'good' === data.status) {
                    $msgBox.html(data.message).addClass('info');
                    $contentBox.find('.momoacgwc-automation-addedit-container').html(data.content);
                    $contentBox.find('.momo-acgwc-automation-title').html(data.title);
                    $contentBox.removeClass('working');
                    $contentBox.addClass('show');
                    $contentBox.find('input[name="momoacgwc_automation_title"]').focus();
                    reloadEditor('content');
                }
            },
            complete: function () {
                $working.removeClass('show');
            }
        });
    });

    $('body').on('click', 'table.momo-acgwc-automation-list .momo-workflow-toggle-status', function () {
        var $btn = $(this);
        var workflow_id = $btn.data('id');
        var status = $btn.data('status');
        var $parent = $btn.closest('.momo-be-main-tabcontent');
        var $msgBox = $parent.find('.momo-be-msg-block');
        var $working = $parent.find('.momo-be-working-two');
        var ajaxdata = {};
        ajaxdata.workflow_id = workflow_id;
        ajaxdata.status = status;
        ajaxdata.action = 'momoacgwc_automation_toggle_status';
        ajaxdata.security = momoacgwc_automation_admin.momoacgwc_ajax_nonce;
        $.ajax({
            beforeSend: function () {
                $working.addClass('show');
            },
            type: 'POST',
            dataType: 'json',
            url: momoacgwc_automation_admin.ajaxurl,
            data: ajaxdata,
            success: function (data) {
                console.log(data);
                if (data.hasOwnProperty('status') && 'good' === data.status) {
                    $msgBox.html(data.message).addClass('info');
                    $btn.data('status', data.new_status);
                    $btn.attr('data-status', data.new_status);
                    $btn.text(data.text);
                }
            },
            complete: function () {
                $working.removeClass('show');
            }
        });

    });
    $('body').on('click', '.momo-automation-addedit-action', function () {
        var $parent = $(this).closest('.momo-be-main-tabcontent');
        var $contentBox = $(this).closest('.momo-admin-content-box');
        var $msgBox = $parent.find('.momo-be-msg-block');
        $msgBox.html('').removeClass('show').removeClass('warning').removeClass('info').css('margin-bottom', '12px');
        var $working = $parent.find('.momo-be-working-two');
        var $form = $parent.find('.momo-automation-main-form');
        var ajaxdata = {};
        var isValid = true;
        $contentBox.find(':input').each(function() {
            var input = $(this);
            if (input.hasClass('required') && !input.val().trim()) {
                isValid = false;
            }
            // Ensure there's a name attribute to avoid issues
            if (input.attr('name')) {
                ajaxdata[input.attr('name')] = input.val();
            }
        });
        if(!isValid) {
            $msgBox.html(momoacgwc_automation_admin.empty_field).addClass('show').addClass('warning');
            $('html, body').animate({ scrollTop: 0 }, 800);
            return;
        }
        ajaxdata.action = 'momoacgwc_automation_addedit';
        ajaxdata.security = momoacgwc_automation_admin.momoacgwc_ajax_nonce;
        console.log(ajaxdata);
        $.ajax({
            beforeSend: function () {
                $working.addClass('show');
                $msgBox.html(momoacgwc_automation_admin.creating_post).addClass('show');
                $('html, body').animate({ scrollTop: 0 }, 800);
                $contentBox.addClass('working');
            },
            type: 'POST',
            dataType: 'json',
            url: momoacgwc_automation_admin.ajaxurl,
            data: ajaxdata,
            success: function (data) {
                console.log(data);
                if (data.hasOwnProperty('status') && 'good' === data.status) {
                    $msgBox.html(data.message).addClass('info');
                    $contentBox.find(':input').val('');
                    loadWorkflowsList();
                }
            },
            complete: function () {
                $working.removeClass('show');
                $contentBox.removeClass('working');
            }
        });
	});
});