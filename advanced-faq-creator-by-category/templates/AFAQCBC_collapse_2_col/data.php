<?php
$template_name = __("Collapse 2Columns",'advanced-faq-creator-by-category');
$array_data = array
(
    'collapse_data' => '',
    'card_columns_data' => '',
    'tabfaq_data' => '',
    'frequently_data' => '',
    'normal_links_data' => '',
    'card_news_data' => '',
    'Number_Of_Columns_Per_Row' => '6',
    'On_Select_Question' => '1',
    'Main_Container_Options' => array
        (
            'font-size' => '0',
            'margin-top' => '0',
            'margin-bottom' => '0',
            'padding-top' => '40',
            'padding-right' => '0',
            'padding-bottom' => '40',
            'padding-left' => '0',
            'border-top' => '0',
            'border-right' => '0',
            'border-bottom' => '0',
            'border-left' => '0',
            'background-color' => '#ffffff',
            'animation_select' => 'pulse',
            'id_modal_return' => 'Main_Container_Options',
        ),

    'Question_Default_Status' => '1',
    'faqs_Order_By_Post' => 'ID',
    'faqs_Order_Post' => 'DESC',
    'faq_question_iconVisibility' => '1',
    'question_like_icon' => 'fas fa-thumbs-up',
    'question_like_icon_options' => array
        (
            'font-size' => '14',
            'color' => '#81d742',
            'id_modal_return' => 'question_like_icon_options',
        ),

    'question_dislike_icon' => 'fas fa-thumbs-down',
    'question_dislike_icon_options' => array
        (
            'font-size' => '14',
            'color' => '#dd3333',
            'id_modal_return' => 'question_dislike_icon_options',
        ),

    'searchVisibility' => '2',
    'search_box' => array
        (
        ),

    'search_label' => array
        (
            'font-size' => '22',
            'font-weight' => '500',
            'text-align' => 'left',
            'margin-top' => '10',
            'padding-left' => '20',
            'id_modal_return' => 'search_label',
        ),

    'search_input' => array
        (
        ),

    'search_button' => array
        (
        ),

    'category_container_options' => array
        (
            'font-size' => '0',
            'margin-top' => '40',
            'margin-right' => '0',
            'margin-bottom' => '40',
            'margin-left' => '0',
            'padding-top' => '0',
            'padding-right' => '0',
            'padding-bottom' => '0',
            'padding-left' => '0',
            'border-top' => '0',
            'border-right' => '0',
            'border-bottom' => '0',
            'border-left' => '0',
            'border-style' => 'none',
            'background-color' => '#ffffff',
            'id_modal_return' => 'category_container_options',
        ),

    'category_title_options' => array
        (
            'font-size' => '25',
            'color' => '#0008f9',
            'font-weight' => '600',
            'margin-top' => '20',
            'margin-right' => '0',
            'margin-bottom' => '10',
            'margin-left' => '0',
            'padding-top' => '0',
            'padding-right' => '0',
            'padding-bottom' => '0',
            'padding-left' => '0',
            'cursor' => 'pointer',
            'id_modal_return' => 'category_title_options',
        ),

    'category_iconVisibility' => '1',
    'category_icon_options' => array
        (
            'font-size' => '20',
            'id_modal_return' => 'category_icon_options',
        ),

    'category_image_options' => array
        (
            'font-size' => '0',
            'margin-top' => '25',
            'margin-right' => '0',
            'margin-bottom' => '15',
            'margin-left' => '0',
            'padding-top' => '0',
            'padding-right' => '0',
            'padding-bottom' => '0',
            'padding-left' => '0',
            'border-top' => '0',
            'border-right' => '0',
            'border-bottom' => '0',
            'border-left' => '0',
            'id_modal_return' => 'category_image_options',
        ),

    'question_style' => array
        (
            'font-size' => '0',
            'margin-top' => '10',
            'margin-right' => '0',
            'margin-bottom' => '10',
            'margin-left' => '0',
            'padding-top' => '10',
            'padding-right' => '10',
            'padding-bottom' => '10',
            'padding-left' => '10',
            'border-top' => '0',
            'border-right' => '0',
            'border-bottom' => '0',
            'border-left' => '0',
            'border-style' => 'none',
            'border-color' => '#f9f9f9',
            'box-shadow' => '0 3px 5px 0 rgba(0,1,1,.1)',
            'id_modal_return' => 'question_style',
        ),

    'question_active_header_options' => array
        (
            'font-size' => '0',
            'border-style' => 'none',
            'border-color' => '#ededed',
            'hover_background-color' => '#adadad',
            'hover_text_color' => '#000000',
            'id_modal_return' => 'question_active_header_options',
        ),

    'question_inactive_header_options' => array
        (
            'font-size' => '0',
            'border-color' => '#b7b7b7',
            'hover_background-color' => '#aaaaaa',
            'hover_text_color' => '#000000',
            'id_modal_return' => 'question_inactive_header_options',
        ),

    'question_title_options' => array
        (
            'font-size' => '16',
            'color' => '#0800f4',
            'margin-top' => '10',
            'margin-right' => '5',
            'margin-bottom' => '10',
            'margin-left' => '5',
            'padding-top' => '5',
            'padding-bottom' => '5',
            'hover_text_color' => '#000000',
            'cursor' => 'pointer',
            'id_modal_return' => 'question_title_options',
        ),

    'question_description_Visibility' => '1',
    'short_description_length' => '',
    'read_more_link' => '',
    'question_question_options' => array
        (
            'font-size' => '14',
            'color' => '#616161',
            'padding-top' => '10',
            'padding-right' => '10',
            'padding-bottom' => '10',
            'padding-left' => '10',
            'id_modal_return' => 'question_question_options',
        ),

    'question_iconVisibility' => '1',
    'question_icon_options' => array
        (
        ),

    'faq_custom_css' => '.question_title_card { margin-bottom: 15px; }',
);