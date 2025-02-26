<?php

$local_custom_fields = array(
    'set_privacy' => array(
        'label' => __('Privacy setting'),
        'default' => '',
        'help' => 'Public: accessible to all. Private: only you or an Admin will be able to view this Item. Shared: you, the assignee or an Admin will be able to view this Item.',
        'data_type' => 'select',
        'column_label' => 'Privacy setting',
        'options' => array('Public', 'Private (for you only)', 'Shared (for you and assignee)'),
        'field_type' => 'select',
        'field_config' => array(
            'use_values' => true,
        ),
        'label_config' => array(
            'size_cls' => "f",
        ),
        'width' => 4,
        'fieldwidth' => 4,
    //'fieldheight' => 3
    ),
    'force_privacy' => array(
        'field_type' => 'setForcePrivacy',
        'width' => 4,
        'fieldwidth' => 4

    ),
    'post_title' => array(
        'label' => '{{modulename}} name',
    ),
    'post_date' => array(
        'label' => 'Date',
    ),
////15CRM

    'categories_list' => array(
        'field_type' => 'categories_list',
        'width' => 5,
        'fieldwidth' => 4
    ),
    'menu_order' => array(
        'label' => __('Display order'),
        'field_type' => 'numberfield',
        'maxlength' => 20,
        'label_config' => array(
            'size_cls' => "f",
        ),
        'width' => 5,
        'fieldwidth' => 4
    ),
    'files_upload_paneltest' => array(
        'label' => __(''),
        'field_type' => 'setUploadPanel',
        'allow_multi_files' => true,
        'allow_files_description' => true,
        'max_multi_files' => 0,
        'is_image' => false,
        'label_config' => array(
            'size_cls' => "f",
        ),
        'width' => 12,
        'fieldwidth' => 7
    ),
    'files_upload_fridalonetest' => array(
        'label' => __(''),
        'field_type' => 'setUploadGrid',
        'allow_multi_files' => true,
        'allow_files_description' => true,
        'max_multi_files' => 0,
        'is_image' => false,
        'label_config' => array(
            'size_cls' => "f",
        ),
        'width' => 12,
        'fieldwidth' => 7
    ),
    'files_upload' => array(
        'label' => __(''),
        'field_type' => 'setUploadAndGrid',
        'allow_multi_files' => true,
        'allow_files_description' => true,
        'max_multi_files' => 0,
        'is_image' => true,
        'image_resize' => array(
            'minithumb' => array(70, 70, 'crop:topleft'), //crop:topleft / crop:center
            'thumb' => array(175, 175, 'crop:topleft'), //crop:topleft / crop:center
            'medium' => array(300, 300),
            'zoom' => array(1000, 1000)
        ),
        /* 'img_config' => array(
          'zoom'=>'fullsize',
          'thumb'=>'fullsize',
          'thumbname'=>'original',
          'zoomname'=>'original',
          ), */
        'label_config' => array(
            'size_cls' => "f",
        ),
        'width' => 12,
        'fieldwidth' => 7
    ),
    'images_upload' => array(
        'label' => __('Images'),
        'allow_multi_files' => true,
        'is_image' => true,
        'image_resize' => array(
            'thumb' => array(175, 175, 'crop:topleft'), //crop:topleft / crop:center
            'medium' => array(300, 300, 'crop:center'),
            'zoom' => array(550, 550)
        ),
        'field_type' => 'setUploadField',
        'label_width' => 120,
        'width' => 5//1 to 10, 10=100%
    ),
    'created_by' => array(
        'label' => __('Created by'),
        'field_type' => 'created_by',
        'label_config' => array(
            'size_cls' => "f",
        ),
        'width' => 4,
        'fieldwidth' => 3,
    ),
    'created_date' => array(
        'label' => __('Created on'),
        'field_type' => 'created_date',
        'label_config' => array(
            'size_cls' => "f",
        ),
        'width' => 4,
        'fieldwidth' => 3,
    ),
    'modified_date' => array(
        'label' => __('Modified on'),
        'field_type' => 'modified_date',
        'label_config' => array(
            'size_cls' => "f",
        ),
        'width' => 4,
        'fieldwidth' => 3,
    ),
    'singular_name' => array(
        'label' => __('Singular Name'),
        'default' => 'ddd',
        //'label_position' => 'top',
        'width' => 3.5 //1 to 10, 10=100%
    ),
    'description' => array(
        'label' => __('Description'),
        'field_type' => 'richtexteditor',
        'width' => 10 //1 to 10, 10=100%
    ),
    'intro_text' => array(
        'label' => __('Intro Text'),
        'field_type' => 'textarea',
        'width' => 10 //1 to 10, 10=100%
    ),
    'notifications' => array(
        'label' => __('Post notifications'),
        'field_type' => 'notifications',
        'info' => 'Add people to notify',
        /* 'field_config' => array(
          'notify_assignee'=>true,
          'notify_full_team'=>true
          ), */
        'description' => 'Who will be notitified on each post update.',
        'label_config' => array(
            'size_cls' => "f",
        ),
        'width' => 6,
        'fieldwidth' => 5
    ),
    'notifications_rules' => array(
        'label' => __('Notification rules'),
        'field_type' => 'notifications_rules',
        'info' => 'Add people to notify',
        'field_config' => array(
            'notify_assignee' => true,
            'notify_full_team' => true,
            'comment_assignee' => true,
            'comment_notify_full_team' => true,
            'comment_notify_selected' => true,
            'notify_udpater' => true
        ),
        //'description' => 'All the peoples selected here will receive a notification email on each post update.',,
        'label_config' => array(
            'size_cls' => "f",
        ),
        'width' => 6,
        'fieldwidth' => 5
    ),
    'notifications_comments' => array(
        'label' => __('Comments notifications'),
        'field_type' => 'notifications',
        'info' => 'Add people to notify',
        /* 'field_config' => array(
          'notify_assignee'=>true,
          'notify_full_team'=>true,
          'notify_selected_for_notif'=>true,
          ), */
        'description' => 'Who will be notitified on each comment added.',
        'label_config' => array(
            'size_cls' => "f",
        ),
        'width' => 12,
        'fieldwidth' => 10
    ),
    'assign_to' => array(
        'label' => __('Assignee'),
        'placeholder' => __('Type to search'),
        'column_label' => __('Ass. to'),
        //'column_width' => 200,
        'field_type' => 'assignee',
        'info' => 'Assign to',
        //'label_width_perc' => 30,
        'field_config' => array(
            'post_type' => 'users'
        ),
        'description' => '(main assignee)',
        'label_config' => array(
            'size_cls' => "lm",
        ),
        'width' => 6,
        'fieldwidth' => 5
    ),
    'belong_to' => array(
        'label' => __('Belong to User'),
        'column_label' => __('Bel. to'),
        //'column_width' => 200,
        'field_type' => 'assignee',
        'info' => 'Assign to',
        //'label_width_perc' => 30,
        'field_config' => array(
        ),
        'description' => '(User to who this item belong)',
        'label_config' => array(
            'size_cls' => "lm",
        ),
        'width' => 6,
        'fieldwidth' => 5
    ),
    'team_assignments' => array(
        'label' => __('Team'),
        'field_type' => 'setTeamField',
        'info' => "Assign a Team:",
        'field_config' => array(
        ),
        'description' => "",
        'label_config' => array(
            'size_cls' => "f",
        ),
        'width' => 6,
        'fieldwidth' => 5
    ),
    'comments_label' => array(
        'field_type' => 'html',
        'html' => '<label  class="control-label  lbl_float lbl_f">Comments:</label>',
    ),
    'descrip_label' => array(
        'field_type' => 'html',
        'html' => '<label  class="control-label  lbl_float lbl_f">Description:</label>',
    ),
    'comments' => array(
        'hidden_label' => __('Comments'),
        'field_type' => 'comments',
        'label_config' => array(
            'size_cls' => "f",
        ),
        'width' => 12,
        'fieldwidth' => 12
    ),
    'short_description' => array(
        'label' => __('Short description'),
        'field_type' => 'richtexteditor',
        'field_config' => array(
            'rte_type' => 'show_text_first',
            'rows' => 13,
        ),
        'label_config' => array(
            'size_cls' => "f",
        ),
        'width' => 12,
        'fieldwidth' => 12
    ),
    'full_description_label' => array(
        'label' => __('Short description'),
        'label_position' => 'top',
        //'hidden_label' => __( 'Full description' ),
        'field_type' => 'richtexteditor',
        'field_config' => array(
            'rte_type' => 'show_text_first',
            'rows' => 13,
        ),
        'label_config' => array(
            'size_cls' => "f",
        ),
        'width' => 12,
        'fieldwidth' => 12
    ),
    'full_description' => array(
        //'label' => __( 'Short description' ),
        'hidden_label' => __('Full description'),
        'field_type' => 'richtexteditor',
        'field_config' => array(
            'rte_type' => 'show_text_first',
            'rows' => 13,
        ),
        'label_config' => array(
            'size_cls' => "f",
        ),
        'width' => 12,
        'fieldwidth' => 12
    ),
    'post_content' => array(
        //'label' => __( 'Short description' ),
        'hidden_label' => __('Article content'),
        'field_type' => 'richtexteditor',
        'label_config' => array(
            'size_cls' => "f",
        ),
        'width' => 12,
        'fieldwidth' => 12
    ),
    'user_select' => array(
        'label' => __('User'),
        'label_width' => 50,
        'field_type' => 'userslist',
        'width' => 4 //1 to 10, 10=100%
    ),
    'from_user_select' => array(
        'label' => __('From'),
        'label_width' => 50,
        'field_type' => 'userslist',
        'width' => 4 //1 to 10, 10=100%
    ),
    'user_assigned' => array(
        'label' => __('Assigned to'),
        'label_width_perc' => 30,
        'field_type' => 'userslist',
        'width' => 5
    ),
    'assign_rule_apply_child' => array(
        'label' => __('Repeat the same settings for childrens objects'),
        'label_width' => 300,
        'field_type' => 'checkbox',
        'width' => 6
    ),
    'short_name' => array(
        'label' => __('Short Name'),
        'label_config' => array(
            'size_cls' => "f",
        ),
        'width' => 6,
        'fieldwidth' => 3
    ),
    'video_local_path' => array(
        'label' => __('Local video server path'),
        'description' => 'Please put here the path to the video on the server',
        'width' => 3.5 //1 to 10, 10=100%
    ),
    'video_embed' => array(
        'label' => __('Video Embed code'),
        'description' => 'Please put here the embed code from YouTube or another ',
        'field_type' => 'textarea',
        'width' => 10 //1 to 10, 10=100%
    ),
    'video_link_youtube' => array(
        'label' => __('Video Youtube link'),
        'description' => 'Please put here the video Youtube link',
        'field_type' => 'textarea',
        'width' => 10 //1 to 10, 10=100%
    ),
    'first_name' => array(
        'label' => __('Owner or Agent Name'),
        'required' => true,
        'label_config' => array(
            'size_cls' => "f",
        ),
        'width' => 4,
        'fieldwidth' => 3
    ),
    'last_name' => array(
        'label' => __('Last Name'),
        'required' => true,
        'label_config' => array(
            'size_cls' => "f",
        ),
        'width' => 4,
        'fieldwidth' => 3
    ),
    'company_name' => array(
        'label' => __('Company Name'),
        'label_config' => array(
            'size_cls' => "f",
        ),
        'width' => 6,
        'fieldwidth' => 6
    ),
    'company_url' => array(
        'label' => __('Company Url'),
        'label_config' => array(
            'size_cls' => "f",
        ),
        'width' => 6,
        'fieldwidth' => 6
    ),
    'start_time' => array(
        'label' => __('Start time (Hr:Mn Am/Pm)'),
        'label_config' => array(
            'size_cls' => "f",
        ),
        'width' => 4,
        'fieldwidth' => 3
    ),
    'end_time' => array(
        'label' => __('End time (Hr:Mn Am/Pm)'),
        'label_config' => array(
            'size_cls' => "f",
        ),
        'width' => 4,
        'fieldwidth' => 3
    ),
    'start_date' => array(
        'label' => __('Start date'),
        'field_type' => 'datefield',
        'label_config' => array(
            'size_cls' => "f",
        ),
        'width' => 4,
        'fieldwidth' => 3
    ),
    'end_date' => array(
        'label' => __('End date'),
        'field_type' => 'datefield',
        'label_config' => array(
            'size_cls' => "f",
        ),
        'width' => 4,
        'fieldwidth' => 3
    ),
    'deadline' => array(
        'label' => __('Deadline'),
        'field_type' => 'datefield',
        'label_width' => 80,
        'width' => 3 //1 to 10, 10=100%
    ),
    'ref_id' => array(
        'label' => __('Ref. ld'),
        'label_config' => array(
            'size_cls' => "f",
        ),
        'field_type' => 'autoincrementfield',
        'width' => 3,
        'fieldwidth' => 1
    ),
    'email' => array(
        'label' => __('Email Pro'),
        'label_config' => array(
            'size_cls' => "f",
        ),
        'restrict_format' => 'email',
        'width' => 4,
        'fieldwidth' => 5
    ),
    'secondary_email' => array(
        'label' => __('Secon. Email Pro'),
        'restrict_format' => 'email',
        'label_config' => array(
            'size_cls' => "f",
        ),
        'width' => 4,
        'fieldwidth' => 3
    ),
    'perso_email' => array(
        'label' => __('Email Perso'),
        'restrict_format' => 'email',
        'label_config' => array(
            'size_cls' => "f",
        ),
        'width' => 4,
        'fieldwidth' => 3
    ),
    'phone' => array(
        'label' => __('Phone'),
        'field_type' => 'numberfield',
        'restrict_format' => 'phone',
        'maxlength' => 20,
        'label_config' => array(
            'size_cls' => "f",
        ),
        'width' => 4,
        'fieldwidth' => 3
    ),
    'fax' => array(
        'label' => __('Fax'),
        'field_type' => 'numberfield',
        'restrict_format' => 'phone',
        'maxlength' => 20,
        'label_config' => array(
            'size_cls' => "f",
        ),
        'width' => 4,
        'fieldwidth' => 3
    ),
    'secondary_phone' => array(
        'label' => __('Secondary Phone'),
        'field_type' => 'numberfield',
        'restrict_format' => 'phone',
        'maxlength' => 20,
        'label_config' => array(
            'size_cls' => "f",
        ),
        'width' => 4,
        'fieldwidth' => 3
    ),
    'mobile_phone' => array(
        'label' => __('Mobile Phone'),
        'field_type' => 'numberfield',
        'restrict_format' => 'phone',
        'maxlength' => 20,
        'label_config' => array(
            'size_cls' => "f",
        ),
        'width' => 4,
        'fieldwidth' => 3
    ),
    'mobile_phone_sec' => array(
        'label' => __('Secon. Mobile Phone'),
        'field_type' => 'numberfield',
        'restrict_format' => 'phone',
        'maxlength' => 20,
        'label_config' => array(
            'size_cls' => "f",
        ),
        'width' => 4,
        'fieldwidth' => 3
    ),
    'home_phone' => array(
        'label' => __('Home Phone'),
        'field_type' => 'numberfield',
        'restrict_format' => 'phone',
        'maxlength' => 20,
        'label_config' => array(
            'size_cls' => "f",
        ),
        'width' => 4,
        'fieldwidth' => 3,
    ),
    'linked_in_page' => array(
        'label' => __('Linked In Page'),
        'width' => 7
    ),
    'job_position' => array(
        'label' => __('Job Position'),
        'width' => 3
    ),
    'icon' => array(
        'label' => __('Icon'),
        'default' => '',
        'label_width' => 50,
        'width' => 2
    ),
    'status_description_simple' => array(
        'label' => __('Status description'),
        'field_type' => 'textarea',
        'field_config' => array(
            "flotable" => true,
            "rows" => 2
        ),
        'label_config' => array(
            'size_cls' => "f",
        ),
        'width' => 5,
        'fieldwidth' => 3,
    ),
    'source_description_simple' => array(
        'label' => __('Source description'),
        'field_type' => 'textarea',
        'field_config' => array(
            "flotable" => true,
            "rows" => 2
        ),
        'label_config' => array(
            'size_cls' => "f",
        ),
        'width' => 5,
        'fieldwidth' => 3,
    ),
    /////RELATED

 /*   'ff_account_child_cases' => array(
        'label' => __('Cases'),
        'field_type' => 'childgrid',
        'field_config' => array(
            'post_type' => 'ff_cases',
            'child_key' => 'account_parent',
            'columns' => array('post_title', 'assign_to', 'priority', 'case_status', 'case_type')
        ),
        'width' => 10
    ),
    'ff_account_child_newsletter' => array(
        'label' => __('Newsletters'),
        'field_type' => 'childgrid',
        'field_config' => array(
            'post_type' => 'ff_email_newsletter',
            'child_key' => 'account_parent',
            'columns' => array('post_title', 'newsletter_status', 'emails_date_sent', 'emails_time_sent')
        ),
        'width' => 10
    ),*/
  /*  'ff_account_child_projects' => array(
        'label' => __('Projects'),
        'field_type' => 'childgrid',
        'field_config' => array(
            'post_type' => 'ff_projects',
            'child_key' => 'account_parent',
            'columns' => array('post_title', 'project_type')
        ),
        'width' => 10
    ),*/
  /*  'ff_account_child_contact' => array(
        'label' => __('Contacts'),
        'field_type' => 'childgrid',
        'field_config' => array(
            'post_type' => 'ff_contacts',
            'child_key' => 'account_parent',
            'columns' => array('post_title', 'email', 'phone', 'mobile_phone', 'assign_to', 'lead_source')
        ),
        'width' => 10
    ),
    'ff_account_child_potential' => array(
        'label' => __('Potentials'),
        'field_type' => 'childgrid',
        'field_config' => array(
            'post_type' => 'ff_potentials',
            'child_key' => 'account_parent',
            'columns' => array('post_title', 'assign_to', 'potential_closing_date', 'potential_stage', 'potential_proba', 'potential_amount', 'potential_amount_type', 'potential_expected_revenue'),
            'calculations' => array('potential_amount' => array('label' => 'Total Amount', 'ending' => 'currency'), 'potential_expected_revenue' => array('label' => 'Total Expected Revenue', 'ending' => 'currency'), 'potential_proba' => array('label' => 'Average Probability', 'type' => 'average', 'ending' => '%'))
        ),
        'width' => 10
    ),
    'ff_account_child_events' => array(
        'label' => __('Events'),
        'field_type' => 'childgrid',
        'field_config' => array(
            'post_type' => 'ff_events',
            'child_key' => 'account_parent',
            'columns' => array('post_title', 'account_parent', 'assign_to', 'start_date', 'end_date', 'event_location')
        ),
        'width' => 10
    ),
    'ff_account_child_calls' => array(
        'label' => __('Call logs'),
        'field_type' => 'childgrid',
        'field_config' => array(
            'post_type' => 'ff_call_log',
            'child_key' => 'account_parent',
            'columns' => array(
                array(
                    'field' => 'post_title',
                    'width' => '30'
                ),
                array(
                    'field' => 'account_parent',
                    'width' => '20'
                ),
                array(
                    'field' => 'assign_to',
                    'width' => '15'
                ),
                array(
                    'field' => 'contact_parent',
                    'width' => '10'
                ),
                array(
                    'field' => 'start_date',
                    'width' => '10'
                ),
                array(
                    'field' => 'call_type',
                    'width' => '10'
                ),
                array(
                    'field' => 'call_purpose',
                    'width' => '10'
                ),
                array(
                    'field' => 'call_from_to',
                    'width' => '10'
                ),
            )
        ),
        'width' => 10
    ),
  /*  'ff_account_child_emails' => array(
        'label' => __('Email Archive'),
        'field_type' => 'childgrid',
        'field_config' => array(
            'post_type' => 'ff_mail_archive',
            'child_key' => 'account_parent',
            'columns' => array('post_title', 'account_parent', 'sent_date', 'to_parent',)
        ),
        'width' => 10
    ),*/
    /*'ff_account_child_notes' => array(
        'label' => __('Notes'),
        'field_type' => 'childgrid',
        'field_config' => array(
            'post_type' => 'ff_notes',
            'child_key' => 'account_parent',
            'columns' => array('post_title', 'account_parent')
        ),
        'width' => 10
    ),
    'ff_child_tasks' => array(
        'label' => __('Tasks'),
        'field_type' => 'childgrid',
        'field_config' => array(
            'post_type' => 'ff_tasks',
            'child_key' => 'account_parent',
            'columns' => array('post_title', 'assign_to', 'due_date', 'priority', 'status', 'percent_complete', 'task_type')
        ),
        'width' => 10
    ),*/
////PAGES

    'fgl_page_parent' => array(
        'label' => __('Page'),
        'field_type' => 'select',
        'label_width' => 100,
        'field_config' => array(
            'post_type' => 'fgl_pages',
            //'null_value'=>true,
            'use_none' => true
        ),
        'width' => 6
    ),
);
