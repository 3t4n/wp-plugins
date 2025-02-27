/* 
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */


jQuery(document).ready(function ($) {

    $(function () {

        $('.bwl_acc_container').each(function () {

            var $accordion_id = $('#' + $(this).attr('id')),
                    $bsa_search = $(this).data('search'),
                    $bsa_theme = $(this).data('theme'),
                    $bsa_animate = $(this).data('animate'),
                    $bsa_rtl = $(this).data('rtl'),
                    $bsa_msg_item_found = $(this).data('msg_item_found'),
                    $bsa_msg_no_result = $(this).data('msg_no_result'),
                    $bsa_ctrl_btn = $(this).data('ctrl_btn'),
                    $bsa_toggle = $(this).data('toggle'),
                    $bsa_closeall = $(this).data('closeall'),
                    $bsa_nav_box = $(this).data('nav_box'),
                    $bsa_nav_icon = $(this).data('nav_icon'),
                    $bsa_highlight_bg = $(this).data('highlight_bg'),
                    $bsa_highlight_color = $(this).data('highlight_color'),
                    $bsa_pagination = $(this).data('pagination'),
                    $bsa_limit = $(this).data('limit'),
                    $bsa_placeholder = $(this).data('placeholder');

            $accordion_id.bwlAccordion({
                search: $bsa_search,
                theme: $bsa_theme,
                animation: $bsa_animate,
                rtl: $bsa_rtl,
                msg_item_found: $bsa_msg_item_found,
                msg_no_result: $bsa_msg_no_result,
                ctrl_btn: $bsa_ctrl_btn,
                toggle: $bsa_toggle,
                closeall: $bsa_closeall,
                nav_box: $bsa_nav_box,
                nav_icon: $bsa_nav_icon,
                highlight_bg: $bsa_highlight_bg,
                highlight_color: $bsa_highlight_color,
                placeholder: $bsa_placeholder,
                pagination: $bsa_pagination, // pagination status.
                limit: $bsa_limit // item per page.
            });

        });

    });

});