<?php

$local_custom_fields = array(
////15CRM
////******
    ///ARCHIVE EMAILS
    'help_email_contacts' => array(
        'field_type' => 'html',
        'html' => "Note: Use commas or semi-colons as separators for multiple email addresses."
    ),
    ///
    'email_footer' => array(
        'label' => __('Email Footer'),
        'field_type' => 'richtexteditor',
        'label_width_perc' => 30,
        'width' => 10 //1 to 10, 10=100%
    ),
    'email_body' => array(
        'label' => __('Email Body'),
        'field_type' => 'richtexteditor',
        'label_width_perc' => 30,
        'width' => 10 //1 to 10, 10=100%
    ),
    'emails_date_sent' => array(
        'label' => __('Date sent'),
        'field_type' => 'datefield',
        'label_config' => array(
            'size_cls' => "f",
        ),
        'width' => 6,
        'fieldwidth' => 4,
    ),
    'emails_time_sent' => array(
        'label' => __('Time sent (hh:mm)'),
        'label_config' => array(
            'size_cls' => "f",
        ),
        'width' => 6,
        'fieldwidth' => 4,
    ),
    'from_static' => array(
        'label' => __('From (free input)'),
        'label_config' => array(
            'size_cls' => "f",
        ),
        'width' => 4,
        'fieldwidth' => 4,
    ),
    'to_static' => array(
        'label' => __('To (free input)'),
        'label_config' => array(
            'size_cls' => "f",
        ),
        'width' => 4,
        'fieldwidth' => 4,
    ),
    'cc_static' => array(
        'label' => __('Cc (free input)'),
        'label_config' => array(
            'size_cls' => "f",
        ),
        'width' => 4,
        'fieldwidth' => 4,
    ),
    'email_archi_subject' => array(
        'label' => __('Email Subject'),
        'label_config' => array(
            'size_cls' => "f",
        ),
        'width' => 12,
        'fieldwidth' => 10,
    ),
    'from_parent' => array(
        'label' => __('From (user)'),
        'field_type' => 'assignee',
        'placeholder' => 'Type letters to find User',
        //'info' => 'Assign to',
        //'label_width_perc' => 30,
        'field_config' => array(
        ),
        'description' => '(user)',
        'label_config' => array(
            'size_cls' => "f",
        ),
        'width' => 4,
        'fieldwidth' => 5,
    ),
    'to_parent' => array(
        'label' => __('To (Contact)'),
        'field_type' => 'autocomplete',
        'placeholder' => 'Type letters to find Contact',
        'field_config' => array(
            'post_type' => 'ff_contacts',
            'use_none' => true
        ),
        'label_config' => array(
            'size_cls' => "f",
        ),
        'width' => 4,
        'fieldwidth' => 5,
    ),
    'cc_parent' => array(
        'label' => __('Cc (Contact)'),
        'placeholder' => 'Type letters to find Contact',
        'field_type' => 'autocomplete',
        'field_config' => array(
            'post_type' => 'ff_contacts',
            'use_none' => true
        ),
        'label_config' => array(
            'size_cls' => "f",
        ),
        'width' => 4,
        'fieldwidth' => 5,
    ),
    'email_archi_set_title' => array(
        'label' => __('Click to auto reset the Title'),
        'field_type' => 'auto_set_title',
        'label_width' => 100,
        'field_config' => array(
            'hide_title' => true,
            'hide_btn' => true,
            'auto_on_save' => true,
            'schema' => 'Email sent {emails_date_sent}  to {to_parent}'
        ),
        'width' => 2
    ),
    ////EMAIL TEMPLATES

    'template_category' => array(
        'label' => __('Template category'),
        'default' => '',
        'column_label' => 'Tpl Categ.',
        'field_type' => 'setInBodyCategorySelect',
        'field_config' => array(
            'category' => 'cat15_emailtpl',
        ),
        'label_config' => array(
            'size_cls' => "f",
        ),
        'width' => 6,
        'fieldwidth' => 4,
    ),
    'help_email_body_tags' => array(
        'field_type' => 'html',
        'html' => "<strong>Tags that you can use in the email body:</strong>
            <br>{{contact_lead_gender}} {{contact_lead_lastname}} {{contact_lead_firstname}} {{contact_lead_email}}
            <br>{{account_name}}"
    ),
    'reply_to_email' => array(
        'label' => __('Reply To Email'),
        'restrict_format' => 'email',
        'label_config' => array(
            'size_cls' => "f",
        ),
        'width' => 4,
        'fieldwidth' => 4,
    ),
    'template_code' => array(
        'label' => __('Template code'),
            'help' => "Optional. Used to be called in PHP codes ",
        'label_config' => array(
            'size_cls' => "f",
        ),
        'width' => 4,
        'fieldwidth' => 3,
    ),
    'email_subject' => array(
        'label' => __('Email Subject'),
        'label_config' => array(
            'size_cls' => "f",
        ),
        'width' => 12,
        'fieldwidth' => 10,
    ),
    'reply_to_name' => array(
        'label' => __('Reply To Name'),
        'label_config' => array(
            'size_cls' => "f",
        ),
        'width' => 4,
        'fieldwidth' => 4,
    ),
    'add_user_signature' => array(
        'label' => __('Add User Signature?'),
        'field_type' => 'checkbox',
        'label_config' => array(
            'size_cls' => "f",
        ),
        'width' => 4,
        'fieldwidth' => 3,
    ),
);
