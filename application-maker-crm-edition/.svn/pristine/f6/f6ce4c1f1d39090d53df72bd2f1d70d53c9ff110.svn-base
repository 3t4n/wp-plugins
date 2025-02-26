<?php

$local_custom_fields = array(
////15CRM
////******
    ///NEWSLETTERS
    //
    'newsletter_step1' => array(
        'field_type' => 'html',
        'html' => "<h4>STEP 1 - Select a template.</h4> <em>(You can create email templates in the Mail Tpl module)</em>",
        'label_config' => array(
            'size_cls' => "f",
        ),
        'width' => 12,
        'fieldwidth' => 12,
    ),
    'newsletter_step2' => array(
        'field_type' => 'html',
        'html' => "<h4>STEP 2 -Input Your email subject</h4> <em>(This can be predefined by the selected Email Template)</em>",
        'label_config' => array(
            'size_cls' => "f",
        ),
        'width' => 12,
        'fieldwidth' => 12,
    ),
    'newsletter_step3' => array(
        'field_type' => 'html',
        'html' => "<h4>STEP 3 - Select Destinees.</h4>",
        'label_config' => array(
            'size_cls' => "f",
        ),
        'width' => 12,
        'fieldwidth' => 12,
    ),
    'newsletter_step4' => array(
        'field_type' => 'html',
        'html' => "<h4>STEP 4 - SEND.</h4>",
        'label_config' => array(
            'size_cls' => "f",
        ),
        'width' => 12,
        'fieldwidth' => 12,
    ),
    'separator_field' => array(
        'field_type' => 'html',
        'html' => "<div style='border-top:1px solid #aaa; height:2px; margin:10px 0;'/> </div>",
        'label_config' => array(
            'size_cls' => "f",
        ),
        'width' => 12,
        'fieldwidth' => 12,
    ),
    'email_template' => array(
        'label' => __('Email Template'),
        'default' => '',
        'field_type' => 'select',
        'field_config' => array(
            'post_type' => 'ff_email_template',
            'link_parent' => false,
            'force_add_btn' => true,
        //'null_value'=>true,
        //'use_none'=>true
        ),
        'label_config' => array(
            'size_cls' => "f",
        ),
        'width' => 6,
        'fieldwidth' => 3,
    ),
    'privacy' => array(
        'label' => __('Privacy'),
        'default' => '',
        'data_type' => 'select',
        'field_type' => 'setInBodyCategorySelect',
        'field_config' => array(
            'category' => 'cat15_emailtpl_privacy',
            'use_none' => false
        ),
        'label_config' => array(
            'size_cls' => "f",
        ),
        'width' => 6,
        'fieldwidth' => 3,
    ),
    'newsletter_status' => array(
        'label' => __('Newsletter Status'),
        'default' => '',
        'data_type' => 'select',
        //'options' => array('Draft','Sent','Confirmed received','Positive reaction','Negative reaction','To follow up'),
        'field_type' => 'setInBodyCategorySelect',
        'field_config' => array(
            'category' => 'cat15_newsletter_status',
        //'use_none'=>true,
        //'link_parent'=>false,
        ),
        'label_config' => array(
            'size_cls' => "f",
        ),
        'width' => 6,
        'fieldwidth' => 3,
    ),
    'newsletter_set_title' => array(
        'label' => __('Click to auto reset the Title'),
        'field_type' => 'auto_set_title',
        'field_config' => array(
            'hide_title' => true,
            'hide_btn' => true,
            'auto_on_save' => true,
            'schema' => 'Newsletter sent on {emails_date_sent} {emails_time_sent}, status {newsletter_status} '
        ),
        'label_config' => array(
            'size_cls' => "f",
        ),
        'width' => 5,
        'fieldwidth' => 4,
    ),
    'newsletter_send_order' => array(
        'width' => 2,
        'field_type' => 'hiddenfield',
    ),
    'newsletter_special_subject' => array(
        'label' => __('Special Email Subject'),
        'label_config' => array(
            'size_cls' => "f",
        ),
        'width' => 12,
        'fieldwidth' => 10,
        'description' => 'If not empty, overhide the Email Template subject'
    ),
    'mailing_list_htmltitle' => array(
        'label' => __('Select Destinees'),
        'field_type' => 'html',
        'label_config' => array(
            'size_cls' => "f",
        ),
        'width' => 12,
        'fieldwidth' => 12,
    ),
    'mailing_list_html' => array(
        'field_type' => 'html',
        'html' => "Note: Select an account, or contact, or Lead, or a Mailing list, as Destinees (Cumulative).",
        'label_config' => array(
            'size_cls' => "f",
        ),
        'width' => 12,
        'fieldwidth' => 12,
    ),
    'mailing_list_to_use' => array(
        'label' => __('Mailing List'),
        'default' => '',
        'field_type' => 'select',
        'field_config' => array(
            'post_type' => 'ff_email_mailinglist',
            'link_parent' => false,
            'force_add_btn' => true,
            'use_none' => true,
        ),
        'label_config' => array(
            'size_cls' => "f",
        ),
        'width' => 6,
        'fieldwidth' => 3,
    ),
    'mailing_list' => array(
        'label' => __('Mailing List'),
        'field_type' => 'setMailingList',
        'label_config' => array(
            'size_cls' => "f",
        ),
        'width' => 12,
        'fieldwidth' => 12,
    ),
    'send_newsletter_result' => array(
        'label' => __(''),
        'hide_label' => true,
        'field_type' => 'sendNewsletter',
        'label_config' => array(
            'size_cls' => "f",
        ),
        'width' => 12,
        'fieldwidth' => 12,
    ),
    'send_newsletter' => array(
        'label' => __('Send this newsletter'),
        'help' => __('Send this newsletter'),
        'field_type' => 'action_button',
        'button_label' => __('Send'),
        'button_icon' => __('icon-envelope'),
        'hide_label' => true,
        'field_config' => array(
            'btn_class' => 'btn-info',
            'transform_fields' => array(
                array('newsletter_status', 'Sent', 'text'), //='Closed Won' TIME() newsletter_send_order
                array('emails_date_sent', 'NOW()', 'if_empty'),
                array('emails_time_sent', 'TIME()', 'if_empty'),
                array('comments', 'Sent this Newsletter'),
            // array('newsletter_send_order', 'true'),
            ),
        // 'limit_to_edit' => true,
        // 'hide_on_fields_values' => array(array('newsletter_status', '1,2,3,4,5,6')),
        ),
        'label_config' => array(
            'size_cls' => "f",
        ),
        'width' => 4,
        'fieldwidth' => 3
    ),
);
