
/*global jQuery*/
/*global define */
/*global window */
/*global this*/
/*global tinymce*/
/*global document*/
/*global momoacg_insights_admin*/
/*global console*/
/*global FileReader*/
/*global location*/
/*jslint this*/
/**
 * Woo Product Writer (momoacgwc) Admin Script
 */
jQuery(document).ready(function ($) {
    "use strict";
    $('#email-template-editor').trumbowyg({
        btns: [['bold', 'italic'], ['link'], ['unorderedList', 'orderedList'], ['viewHTML']],
        autogrow: true,
    });
    $('body').on('click', '#momo-clear-insights-cache', function () {
        var $tab = $(this).closest('.momo-be-admin-content.active');
        var $parent = $tab.closest('.momo-be-main-tabcontent');
        var $msgBox = $parent.find('.momo-be-msg-block');
        $msgBox.html('').removeClass('show').removeClass('warning').removeClass('info').css('margin-bottom', '12px');
        var $working = $parent.find('.momo-be-working');
        var type = $(this).data('type');
        var ajaxdata = {};
        ajaxdata.type = type;
        ajaxdata.security = momoacg_insights_admin.momoacg_ajax_nonce;
        ajaxdata.action = 'momo_insights_clear_cache';
        $.ajax({
            beforeSend: function () {
                $working.addClass('show');
                $msgBox.html(momoacg_insights_admin.clearing_cache).addClass('show');
                $('html, body').animate({ scrollTop: 0 }, 'slow');
            },
            type: 'POST',
            dataType: 'json',
            url: momoacg_insights_admin.ajaxurl,
            data: ajaxdata,
            success: function (data) {
                console.log(data);
                if (data.hasOwnProperty('status') && 'good' === data.status) {
                    $msgBox.html(data.message).addClass('info');
                }
            },
            complete: function () {
                $working.removeClass('show');
            }
        });
    });

    function generateTemplate(templateType, $this) {
        var $tab = $this.closest('.momo-be-admin-content.active');
        var $parent = $tab.closest('.momo-be-main-tabcontent');
        var $msgBox = $tab.find('.momo-be-msg-block');
        $msgBox.html('').removeClass('show').removeClass('warning').removeClass('info').css('margin-bottom', '12px');
        var $working = $parent.find('.momo-be-working');
        $.ajax({
            beforeSend: function () {
                $working.addClass('show');
                $msgBox.html(momoacg_insights_admin.generating_template).addClass('show');
                $('html, body').animate({ scrollTop: 0 }, 'slow');
            },
            url: momoacg_insights_admin.ajaxurl,
            type: 'POST',
            dataType: 'json',
            data: {
                action: 'momoacgwc_generate_template',
                template_type: templateType,
                security: momoacg_insights_admin.momoacg_ajax_nonce
            },
            success: function (response) {
                $('#template-preview').html(response.preview);
                $('#email-template-editor').trumbowyg('html', response.template);
                if (response.hasOwnProperty('status') && 'good' === response.status) {
                    $msgBox.html(response.message).addClass('info');
                }
            },
            complete: function () {
                $working.removeClass('show');
            }
        });
    }
    $('#generate-abandoned-cart-template').on('click', function () {
        generateTemplate('abandoned_cart', $(this));
    });
    $('#generate-follow-up-template').on('click', function () {
        generateTemplate('follow_up', $(this));
    });
    $('#generate-recommendation-template').on('click', function () {
        generateTemplate('product_recommendation', $(this));
    });


    $('#save-email-template').on('click', function () {
        var $tab = $(this).closest('.momo-be-admin-content.active');
        var $parent = $tab.closest('.momo-be-main-tabcontent');
        var $msgBox = $parent.find('.momo-be-msg-block');
        $msgBox.html('').removeClass('show').removeClass('warning').removeClass('info').css('margin-bottom', '12px');
        var $working = $parent.find('.momo-be-working');
        const templateName = $parent.find('#template-name').val();
        const templateContent = $parent.find('#email-template-editor').trumbowyg('html');
        const templateID = $parent.find('#template-name').data('id');
        if (!templateName.trim()) {
            $msgBox.html(momoacg_insights_admin.empty_title).addClass('warning').addClass('show');
            $parent.find('#template-name').addClass('warning');
            return;
        }

        $.ajax({
            beforeSend: function () {
                $working.addClass('show');
                $msgBox.html(momoacg_insights_admin.saving_template).addClass('show');
                $('html, body').animate({ scrollTop: 0 }, 'slow');
            },
            url: momoacg_insights_admin.ajaxurl,
            type: 'POST',
            dataType: 'json',
            data: {
                action: 'momoacgwc_save_email_template',
                content: templateContent,
                title: templateName,
                id: templateID,
                security: momoacg_insights_admin.momoacg_ajax_nonce
            },
            success: function (response) {
                $('#template-preview').html(response.preview);
                $('#email-template-editor').trumbowyg('html', response.template);
                if (response.hasOwnProperty('status') && 'good' === response.status) {
                    $msgBox.html(response.message).addClass('info');
                } else {
                    $msgBox.html(response.message).addClass('warning');
                }
            },
            complete: function () {
                $working.removeClass('show');
            }
        });
    });
    $('body').on('change', '#email_template_select', function () {
        var value = $(this).find('option:selected').val();
        if(!value.trim()) {
            return;
        }
        var $tab = $(this).closest('.momo-be-admin-content.active');
        var $parent = $tab.closest('.momo-be-main-tabcontent');
        var $msgBox = $parent.find('.momo-be-msg-block');
        $msgBox.html('').removeClass('show').removeClass('warning').removeClass('info').css('margin-bottom', '12px');
        var $working = $parent.find('.momo-be-working');
        var $templateName = $parent.find('#template-name');
        var $templateContent = $parent.find('#email-template-editor');
        var $templateID = $parent.find('#template-name');

        $.ajax({
            beforeSend: function () {
                $working.addClass('show');
                $msgBox.html(momoacg_insights_admin.open_template).addClass('show');
                $('html, body').animate({ scrollTop: 0 }, 'slow');
            },
            url: momoacg_insights_admin.ajaxurl,
            type: 'POST',
            dataType: 'json',
            data: {
                action: 'momoacgwc_open_email_template',
                id: value,
                security: momoacg_insights_admin.momoacg_ajax_nonce
            },
            success: function (response) {
                if (response.hasOwnProperty('status') && 'good' === response.status) {
                    $templateName.val(response.title);
                    $templateContent.trumbowyg('html', response.content);
                    $msgBox.html(response.message).addClass('info');
                } else {
                    $msgBox.html(response.message).addClass('warning');
                }
            },
            complete: function () {
                $working.removeClass('show');
            }
        });
    });
    $('body').on('change', 'select[name="momoacgwc-insights-time-filter"]', function () {
        var value = $(this).find('option:selected').val();
        if(!value.trim()) {
            return;
        }
        var $tab = $(this).closest('#momo-be-form').find('.momo-be-admin-content.active');
        var $parent = $tab.closest('.momo-be-main-tabcontent');
        var $msgBox = $parent.find('.momo-be-msg-block');
        $msgBox.html('').removeClass('show').removeClass('warning').removeClass('info').css('margin-bottom', '12px');
        var $working = $parent.find('.momo-be-working');
        console.log(value);
        $.ajax({
            beforeSend: function () {
                $working.addClass('show');
                $msgBox.html(momoacg_insights_admin.change_tf).addClass('show');
                $('html, body').animate({ scrollTop: 0 }, 'slow');
            },
            url: momoacg_insights_admin.ajaxurl,
            type: 'POST',
            dataType: 'json',
            data: {
                action: 'momoacgwc_insights_change_timeframe',
                timeframe: value,
                security: momoacg_insights_admin.momoacg_ajax_nonce
            },
            success: function (response) {
                location.reload();
            },
            complete: function () {
                $working.removeClass('show');
            }
        });
    });

    $('#generate_report').on('click', function() {
        const dateRange = $('#date_range').val();
    
        $.ajax({
            url: ajaxurl, // WordPress AJAX handler
            type: 'POST',
            data: {
                action: 'generate_report',
                date_range: dateRange,
            },
            success: function(response) {
                $('#report_results').html(response.data.html);
            },
            error: function(error) {
                alert('Failed to generate report. Please try again.');
            },
        });
    });
    
});