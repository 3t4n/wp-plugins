<?php

$local_custom_fields = array(
////15CRM
////******
//****CONTACT

    /* 'parent_account'=>array(
      'label' => __( 'Parent Account' ),
      'field_type' => 'select',
      'label_width' => 100,
      'field_config' => array(
      'post_type'=>'ff_accounts',
      //'null_value'=>true,
      'use_none'=>true
      ),
      'label_width_perc' => 20,
      'width' => 10
      ),// */


    'ff_contact_child_potential' => array(
        'label' => __('Potentials'),
        'field_type' => 'childgrid',
        'field_config' => array(
            'post_type' => 'ff_potentials',
            'child_key' => 'contact_parent',
            'columns' => array(
                array(
                    'field' => 'post_title',
                    'width' => '25'
                ),
                array(
                    'field' => 'assign_to',
                    'width' => '10'
                ),
                array(
                    'field' => 'potential_closing_date',
                    'width' => '10'
                ),
                array(
                    'field' => 'potential_stage',
                    'width' => '10'
                ),
                array(
                    'field' => 'potential_proba',
                    'width' => '10'
                ),
                array(
                    'field' => 'potential_amount',
                    'width' => '15'
                ),
                array(
                    'field' => 'potential_amount_type',
                    'width' => '10'
                ),
                array(
                    'field' => 'potential_expected_revenue',
                    'width' => '15'
                )
            )
        ),
        'width' => 10
    ),
    'ff_contact_child_notes' => array(
        'label' => __('Notes'),
        'field_type' => 'childgrid',
        'field_config' => array(
            'post_type' => 'ff_notes',
            'child_key' => 'contact_parent',
            'columns' => array(
                array(
                    'field' => 'post_title',
                    'width' => '60'
                ),
                array(
                    'field' => 'account_parent',
                    'width' => '40'
                ),
            )
        ),
        'width' => 10
    ),
    'ff_contact_child_emails' => array(
        'label' => __('Email Archive'),
        'field_type' => 'childgrid',
        'field_config' => array(
            'post_type' => 'ff_mail_archive',
            'child_key' => 'contact_parent',
            'columns' => array(
                array(
                    'field' => 'post_title',
                    'width' => '40'
                ),
                array(
                    'field' => 'account_parent',
                    'width' => '20'
                ),
                array(
                    'field' => 'emails_date_sent',
                    'width' => '15'
                ),
                array(
                    'field' => 'to_parent',
                    'width' => '15'
                ),
            )
        ),
        'width' => 10
    ),
    'contacts_addrelated' => array(
        'label' => '',
        'default' => '',
        'width' => 5,
        'label_width_perc' => 30,
        'field_type' => 'setAddRelated',
        'field_config' => array(
            'post_types' => 'ff_potentials,ff_tasks,ff_events,ff_notes,ff_call_log,ff_email_newsletter',
        )
    ),
    'ff_contact_child_calls' => array(
        'label' => __('Call logs'),
        'field_type' => 'childgrid',
        'field_config' => array(
            'post_type' => 'ff_call_log',
            'child_key' => 'contact_parent',
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
    'ff_contact_child_events' => array(
        'label' => __('Events'),
        'field_type' => 'childgrid',
        'field_config' => array(
            'post_type' => 'ff_events',
            'child_key' => 'contact_parent',
            'columns' => array(
                array(
                    'field' => 'post_title',
                    'width' => '25'
                ),
                array(
                    'field' => 'account_parent',
                    'width' => '15'
                ),
                array(
                    'field' => 'assign_to',
                    'width' => '15'
                ),
                array(
                    'field' => 'start_date',
                    'width' => '15'
                ),
                array(
                    'field' => 'end_date',
                    'width' => '1'
                ),
                array(
                    'field' => 'event_location',
                    'width' => '15'
                ),
            //,'post_title','account_parent','assign_to','start_date','end_date','event_location'
            )
        ),
        'width' => 10
    ),
    'ff_contact_child_newsletter' => array(
        'label' => __('Newsletters'),
        'field_type' => 'childgrid',
        'field_config' => array(
            'post_type' => 'ff_email_newsletter',
            'child_key' => 'contact_parent',
            'columns' => array(
                array(
                    'field' => 'post_title',
                    'width' => '40'
                ),
                array(
                    'field' => 'newsletter_status',
                    'width' => '20'
                ),
                array(
                    'field' => 'emails_date_sent',
                    'width' => '20'
                ),
                array(
                    'field' => 'emails_time_sent',
                    'width' => '20'
                ),
            )
        ),
        'width' => 10
    ),
    'ff_contact_child_cases' => array(
        'label' => __('Cases'),
        'field_type' => 'childgrid',
        'field_config' => array(
            'post_type' => 'ff_cases',
            'child_key' => 'contact_parent',
            'columns' => array(
                array(
                    'field' => 'post_title',
                    'width' => '40'
                ),
                array(
                    'field' => 'assign_to',
                    'width' => '15'
                ),
                array(
                    'field' => 'priority',
                    'width' => '15'
                ),
                array(
                    'field' => 'case_status',
                    'width' => '15'
                ),
                array(
                    'field' => 'case_type',
                    'width' => '15'
                )
            )
        ),
        'width' => 10
    ),
    'ff_contact_child_tasks' => array(
        'label' => __('Tasks'),
        'field_type' => 'childgrid',
        'field_config' => array(
            'post_type' => 'ff_tasks',
            'child_key' => 'contact_parent',
            'columns' => array(
                array(
                    'field' => 'post_title',
                    'width' => '25'
                ),
                array(
                    'field' => 'assign_to',
                    'width' => '15'
                ),
                array(
                    'field' => 'due_date',
                    'width' => '15'
                ),
                array(
                    'field' => 'priority',
                    'width' => '10'
                ),
                array(
                    'field' => 'status',
                    'width' => '10'
                ),
                array(
                    'field' => 'percent_complete',
                    'width' => '10'
                ),
                array(
                    'field' => 'task_type',
                    'width' => '25'
                ),
            )
        ),
        'width' => 10
    ),
    'contact_owner' => array(
        'label' => __('Contact Owner'),
        'label_width' => 80,
        'field_type' => 'userslist',
        'label_width_perc' => 45,
        'width' => 5
    ),
    'account_parent' => array(
        'label' => __('Parent Account'),
        'field_type' => 'autocomplete',
        'placeholder' => 'Type the first letters to find accounts',
        'filter_label' => __('Parent account'),
        'field_config' => array(
            'post_type' => 'ff_accounts',
            'action_dropup' => true,
            'use_none' => true,
            'link_parent' => true,
            'quick_add_ajax' => true,
        ),
        'label_config' => array(
            'size_cls' => "f",
        ),
        'width' => 6,
        'fieldwidth' => 5
    ), //

    'account_owner' => array(
        'label' => __('Parent company'),
        'field_type' => 'autocomplete',
        'placeholder' => 'Type the first letters to find accounts',
        'filter_label' => __('Parent account'),
        'field_config' => array(
            'post_type' => 'ff_accounts',
            'use_none' => true,
            'link_parent' => true,
            'quick_add_ajax' => true,
        ),
        'label_config' => array(
            'size_cls' => "f",
        ),
        'width' => 10,
        'fieldwidth' => 8
    ), //
    'contact_nickname' => array(
        'label' => __('Nickname'),
        'label_config' => array(
            'size_cls' => "f",
        ),
        'width' => 4,
        'fieldwidth' => 4,
    ),
    'contact_gender' => array(
        'label' => __('Gender'),
        'default' => '',
        'data_type' => 'select',
        //'options' => array('-None-','Mr.','Mrs.','Ms.','Dr.','Prof.'),
        'column_label' => 'Gender',
        'field_type' => 'setInBodyCategorySelect',
        'field_config' => array(
            'category' => 'cat15_gender',
        ),
        'label_config' => array(
            'size_cls' => "f",
        ),
        'width' => 4,
        'fieldwidth' => 3,
    ),
    'contact_fistname' => array(
        'label' => __('First name'),
        'required' => true,
        'label_config' => array(
            'size_cls' => "f",
        ),
        'width' => 6,
        'fieldwidth' => 6,
    ),
    'contact_lastname' => array(
        'label' => __('Last Name'),
        'required' => true,
        'label_config' => array(
            'size_cls' => "f",
        ),
        'width' => 6,
        'fieldwidth' => 6,
    ),
    'contact_report_to' => array(
        'label' => __('Report to'),
        'field_type' => 'userslist',
        'width' => 6,
        'fieldwidth' => 6,
    ),
    'contact_assistant' => array(
        'label' => __('Assistant'),
        'field_type' => 'userslist',
        'width' => 4,
        'fieldwidth' => 4,
    ),
    'assistant_phone' => array(
        'label' => __('Assistant phone'),
        'field_type' => 'numberfield',
        'maxlength' => 20,
        'label_config' => array(
            'size_cls' => "f",
        ),
        'width' => 4,
        'fieldwidth' => 4,
    ),
    'contact_dept' => array(
        'label' => __('Department'),
        'label_type' => 'inline',
        'label_config' => array(
            'size_cls' => "f",
        ),
        'width' => 6,
        'fieldwidth' => 6,
    ),
    'contact_title' => array(
        'label' => __('Title'),
        'label_config' => array(
            'size_cls' => "f",
        ),
        'width' => 6,
        'fieldwidth' => 6,
    ),
    'contact_birth_date' => array(
        'label' => __('Birth date'),
        'field_type' => 'datefield',
        'label_config' => array(
            'size_cls' => "f",
        ),
        'width' => 4,
        'fieldwidth' => 3,
    ),
    'contact_skype' => array(
        'label' => __('Skype'),
        'label_config' => array(
            'size_cls' => "f",
        ),
        'width' => 3,
        'fieldwidth' => 1,
    ),
    'contact_msn' => array(
        'label' => __('Msn'),
        'label_config' => array(
            'size_cls' => "f",
        ),
        'width' => 3,
        'fieldwidth' => 1,
    ),
    'other_im' => array(
        'label' => __('Other IM'),
        'label_config' => array(
            'size_cls' => "f",
        ),
        'width' => 4,
        'fieldwidth' => 1,
    ),
    'facebook_username' => array(
        'label' => __('Facebook username'),
        'label_config' => array(
            'size_cls' => "f",
        ),
        'width' => 4,
        'fieldwidth' => 3,
    ),
    'twitter_username' => array(
        'label' => __('Twitter username'),
        'label_config' => array(
            'size_cls' => "f",
        ),
        'width' => 4,
        'fieldwidth' => 3,
    ),
    'other_sns_username' => array(
        'label' => __('Other SNS'),
        'label_config' => array(
            'size_cls' => "f",
        ),
        'width' => 4,
        'fieldwidth' => 3,
    ),
    'contact_set_title' => array(
        'label' => __('Click to auto reset the Title'),
        'field_type' => 'auto_set_title',
        'label_width' => 100,
        'field_config' => array(
            'hide_title' => true,
            'hide_btn' => true,
            'auto_on_save' => true,
            'schema' => '{contact_fistname} {contact_lastname} ({contact_gender})'
        ),
        'width' => 2
    ),
);
