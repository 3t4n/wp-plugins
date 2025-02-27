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
                    $bsa_title_bg = $(this).data('title_bg'),
                    $bsa_title_text_color = $(this).data('title_text_color'),
                    $bsa_nav_box_bg = $(this).data('nav_box_bg'),
                    $bsa_title_active_bg = $(this).data('title_active_bg'),
                    $bsa_title_active_text_color = $(this).data('title_active_text_color'),
                    $bsa_nav_active_box_bg = $(this).data('nav_active_box_bg'),
                    $bsa_animate = $(this).data('animate'),
                    $bsa_rtl = $(this).data('rtl'),
                    $bsa_msg_item_found = $(this).data('msg_item_found'),
                    $bsa_msg_no_result = $(this).data('msg_no_result'),
                    $bsa_ctrl_btn = $(this).data('ctrl_btn'),
                    $bsa_toggle = $(this).data('toggle'),
                    $bsa_closeall = $(this).data('closeall'),
                    $bsa_item_opened = $(this).data('item_opened'),
                    $bsa_nav_box = $(this).data('nav_box'),
                    $bsa_nav_icon = $(this).data('nav_icon'),
                    $bsa_highlight_bg = $(this).data('highlight_bg'),
                    $bsa_highlight_color = $(this).data('highlight_color'),
                    $bsa_content_bg = $(this).data('content_bg'),
                    $bsa_content_text_color = $(this).data('content_text_color'),
                    $bsa_content_link_color = $(this).data('content_link_color'),
                    $bsa_content_link_hover_color = $(this).data('content_link_hover_color'),
                    $bsa_pagination = $(this).data('pagination'),
                    $bsa_limit = $(this).data('limit'),
                    $bsa_suggestion_box = $(this).data('suggestion_box'),
                    $bsa_sbox_title = $(this).data('sbox_title'),
                    $bsa_sbox_keywords = $(this).data('sbox_keywords'),
                    $bsa_placeholder = $(this).data('placeholder'),
                    $bsa_nav_right = $(this).data('nav_right'),
                    $bsa_query_string = $(this).data('query_string');

            $accordion_id.bwlAccordion({
                search: $bsa_search,
                theme: $bsa_theme,
                title_bg: $bsa_title_bg,
                title_text_color: $bsa_title_text_color,
                nav_box_bg: $bsa_nav_box_bg,
                title_active_bg: $bsa_title_active_bg,
                title_active_text_color: $bsa_title_active_text_color,
                nav_active_box_bg: $bsa_nav_active_box_bg,
                animation: $bsa_animate,
                rtl: $bsa_rtl,
                msg_item_found: $bsa_msg_item_found,
                msg_no_result: $bsa_msg_no_result,
                ctrl_btn: $bsa_ctrl_btn,
                toggle: $bsa_toggle,
                closeall: $bsa_closeall,
                item_opened: $bsa_item_opened,
                nav_box: $bsa_nav_box,
                nav_icon: $bsa_nav_icon,
                highlight_bg: $bsa_highlight_bg,
                highlight_color: $bsa_highlight_color,
                content_bg: $bsa_content_bg,
                content_text_color: $bsa_content_text_color,
                content_link_color: $bsa_content_link_color,
                content_link_hover_color: $bsa_content_link_hover_color,
                placeholder: $bsa_placeholder,
                pagination: $bsa_pagination, // pagination status.
                suggestion_box: $bsa_suggestion_box, // pagination status.
                sbox_title: $bsa_sbox_title, // pagination status.
                sbox_keywords: $bsa_sbox_keywords, // pagination status.
                limit: $bsa_limit, // item per page.
                class: $bsa_nav_right,
                query_string: $bsa_query_string
            });

        });

    });

});