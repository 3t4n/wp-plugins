/*global jQuery*/
/*global define */
/*global window */
/*global this*/
/*global location*/
/*global document*/
/*global momoacg_admin*/
/*global momoacg_bulkcw_admin*/
/*global console*/
/*jslint this*/
/**
 * momowsw Admin Script
 */
jQuery(document).ready(function ($) {
    "use strict";
    $('body').on('momo_acg_datepicker', function () {
        $('.momo_jquery_date_selector').datepicker({
            minDate: 1
        });
    });
    $('body').trigger('momo_acg_datepicker');
    $('body').on('click', '.momo_bulkcw_add_new_title_row', function () {
        var $parent = $(this).closest('.momo-be-main-tabcontent');
        var $container = $parent.find('.momobulkcw-editor-main');
        var $msgBox = $container.find('.momo-be-msg-block');
        var $working = $parent.find('.momo-be-working');
        var $table = $container.find('table.momo-acg-bulkcw-titles-list');
        var $tbody = $table.find('tbody');
        var count = $table.data('row_count');
        var $form = $container.find('#momo-bulkcw-title-tow-section');
        var ajaxdata = {};
        var title = $form.find('input[name="momo_bulkcw_title_text"').val();
        var date = $form.find('input[name="momo_bulkcw_select_date"').val();
        var $image = $form.find('input[name="momo_bulkcw_enable_image"');
        var noofpara = $form.find('select[name="momo_bulkcw_noofpara"').val();
        var category = $form.find('select[name="momo_bulkcw_category"').val();
        var ptype = $form.find('select[name="momo_bulkcw_post_type"').val();
        ajaxdata.title = title;
        ajaxdata.date = date;
        ajaxdata.image = $image.prop('checked');
        ajaxdata.noofpara = noofpara;
        ajaxdata.category = category;
        ajaxdata.post_type = ptype;
        ajaxdata.count = count;
        ajaxdata.security = momoacg_admin.momoacg_ajax_nonce;
        ajaxdata.action = 'momo_acg_bulkcw_add_new_title_row';
        $.ajax({
            beforeSend: function () {
                $working.addClass('show');
                $msgBox.html(momoacg_bulkcw_admin.adding_to_queue);
                $msgBox.show();
            },
            type: 'POST',
            dataType: 'json',
            url: momoacg_admin.ajaxurl,
            data: ajaxdata,
            success: function (data) {
                if (data.status === 'bad') {
                    $msgBox.html(data.msg);
                    $msgBox.show();
                } else if ('good' === data.status) {
                    $msgBox.html(data.msg);
                    $msgBox.show();
                    if (parseInt(count) === 0) {
                        $tbody.html(data.content);
                    } else {
                        $tbody.append(data.content);
                    }
                    $table.data('row_count', data.count);
                }
            },
            complete: function () {
                $working.removeClass('show');
            }
        });
    });
    $('body').on('click', '.momo_bulkcw_remove_title_row', function () {

    });
    $('body').on('click', '.momo_bulkcw_generate_bulk_content', function () {
        var $parent = $(this).closest('.momo-be-main-tabcontent');
        var $container = $parent.find('.momobulkcw-editor-main');
        var $msgBox = $container.find('.momo-be-msg-block');
        var $working = $parent.find('.momo-be-working');
        var $table = $container.find('table.momo-acg-bulkcw-titles-list');
        var $tbody = $table.find('tbody');
        var count = $table.data('row_count');
        if (parseInt(count) === 0 || count === undefined) {
            $msgBox.html(momoacg_bulkcw_admin.empty_table_queue);
            $msgBox.show();
            return;
        }
        var $postType = $container.find('input[name="momo_bulkcw_post_type"]:checked');
        var ajaxdata = {};
        var postData = [];
        ajaxdata.security = momoacg_admin.momoacg_ajax_nonce;
        ajaxdata.action = 'momo_acg_bulkcw_queue_titles_to_generate';
        $tbody.find('tr').each(function (index, tr) {
            var data = $(tr).data('data');
            console.log(data);
            if (!data || data === undefined) {
                return;
            }
            postData.push(data);
        });
        ajaxdata.post_data = postData;
        $.ajax({
            beforeSend: function () {
                $working.addClass('show');
                $msgBox.html(momoacg_bulkcw_admin.queueing_titles);
                $msgBox.show();
            },
            type: 'POST',
            dataType: 'json',
            url: momoacg_admin.ajaxurl,
            data: ajaxdata,
            success: function (data) {
                if (data.status === 'bad') {
                    $msgBox.html(data.msg);
                    $msgBox.show();
                } else if ('good' === data.status) {
                    $tbody.html(data.content);
                    $msgBox.html(data.msg);
                    $msgBox.show();
                }
            },
            complete: function () {
                $working.removeClass('show');
            }
        });
    });
    $('body').on('click', 'i.momo-bulkcw-remove-cron', function () {
        var $td = $(this).closest('td');
        var $holder = $td.find('span.momo-remove-holder');
        var $tr = $td.closest('tr');
        var $parent = $(this).closest('.momo-be-main-tabcontent');
        var $container = $parent.find('.momobulkcw-editor-main');
        var $msgBox = $container.find('.momo-be-msg-block');
        var cid = $td.data('id');
        var ajaxdata = {};
        ajaxdata.security = momoacg_admin.momoacg_ajax_nonce;
        ajaxdata.action = 'momo_acg_bulkcw_delete_cron_by_id';
        ajaxdata.cron_id = cid;
        $.ajax({
            beforeSend: function () {
                $holder.addClass('td-working');
            },
            type: 'POST',
            dataType: 'json',
            url: momoacg_admin.ajaxurl,
            data: ajaxdata,
            success: function (data) {
                if (data.status === 'bad') {
                    $msgBox.html(data.msg);
                    $msgBox.show();
                } else if ('good' === data.status) {
                    $tr.remove();
                    $msgBox.html(data.msg);
                    $msgBox.show();
                }
            },
            complete: function () {
                $holder.removeClass('td-working');
            }
        });
    });
});