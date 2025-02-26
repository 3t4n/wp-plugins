<?php

$local_custom_fields = array(
////15CRM
////******
    /////LEADS
    'lead_source' => array(
        'label' => __('Lead Source'),
        'default' => '',
        'data_type' => 'select',
        //'options' => array('-None-','Advertisement','Cold Call','Employee Referral','External Referral','OnlineStore','Partner','Public Relations','Sales Mail Alias','Seminar Partner','Seminar-Internal','Trade Show','Web Download','Web Research','Web Cases','Web Mail','Web site form'),
        'field_type' => 'setInBodyCategorySelect',
        'field_config' => array(
            'category' => 'cat15_lead_source',
        ),
        'label_config' => array(
            'size_cls' => "f",
        ),
        'width' => 6,
        'fieldwidth' => 5,
    ),
    'lead_status' => array(
        'label' => __('Lead Status'),
        'default' => '',
        //'options' => array('-None-','Attempted to Contact','Cold','Contact in Future','Contacted','Hot','Junk Lead','Lost Lead','Not Contacted','Pre Qualified','Qualified','Warm'),
        'field_type' => 'setInBodyCategorySelect',
        'field_config' => array(
            'category' => 'cat15_lead_status',
        ),
        'label_config' => array(
            'size_cls' => "f",
        ),
        'width' => 4,
        'fieldwidth' => 4
    ),
    'company' => array(
        'label' => __('Company'),
        'label_config' => array(
            'size_cls' => "f",
        ),
        'width' => 6,
        'fieldwidth' => 6
    ),
    'country_webform' => array(//country_webform  city_webform
        'label' => __('Country from WebForm'),
        'label_config' => array(
            'size_cls' => "f",
        ),
        'width' => 6,
        'fieldwidth' => 5,
    ),
    'city_webform' => array(
        'label' => __('City from WebForm'),
        'label_config' => array(
            'size_cls' => "f",
        ),
        'width' => 6,
        'fieldwidth' => 5,
    ),
    'leads_addrelated' => array(
        'label' => '',
        'default' => '',
        'width' => 5,
        'label_width_perc' => 30,
        'field_type' => 'setAddRelated',
        'field_config' => array(
            'post_types' => 'ff_tasks,ff_events,ff_notes,ff_call_log,ff_email_newsletter',
        )
    ),
    'ff_lead_child_cases' => array(
        'label' => __('Cases'),
        'field_type' => 'childgrid',
        'field_config' => array(
            'post_type' => 'ff_cases',
            'child_key' => 'lead_parent',
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
                ),
            )
        ),
        'width' => 10
    ),
    'ff_lead_child_newsletter' => array(
        'label' => __('Newsletters'),
        'field_type' => 'childgrid',
        'field_config' => array(
            'post_type' => 'ff_email_newsletter',
            'child_key' => 'lead_parent',
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
    'ff_lead_child_tasks' => array(
        'label' => __('Tasks'),
        'field_type' => 'childgrid',
        'field_config' => array(
            'post_type' => 'ff_tasks',
            'child_key' => 'lead_parent',
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
    'ff_lead_child_events' => array(
        'label' => __('Events'),
        'field_type' => 'childgrid',
        'field_config' => array(
            'post_type' => 'ff_events',
            'child_key' => 'lead_parent',
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
    'ff_lead_child_notes' => array(
        'label' => __('Notes'),
        'field_type' => 'childgrid',
        'field_config' => array(
            'post_type' => 'ff_notes',
            'child_key' => 'lead_parent',
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
    'ff_lead_child_emails' => array(
        'label' => __('Email Archive'),
        'field_type' => 'childgrid',
        'field_config' => array(
            'post_type' => 'ff_mail_archive',
            'child_key' => 'lead_parent',
            'columns' => array(
                array(
                    'field' => 'post_title',
                    'width' => '40'
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
    'ff_lead_child_calls' => array(
        'label' => __('Call logs'),
        'field_type' => 'childgrid',
        'field_config' => array(
            'post_type' => 'ff_call_log',
            'child_key' => 'lead_parent',
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
    'convert_lead' => array(
        'label' => __('Convert Lead'),
        'button_label' => __('Convert'),
        'button_icon' => __('icon-user'),
        'hide_label' => true,
        'help' => __('Convert the lead in Contact and Account'),
        //'field_type' => 'convert_button',
        'field_type' => 'action_button',
        'field_config' => array(
            'limit_to_edit' => true,
            'btn_class' => 'btn-info',
            'do_trash_original' => false,
            'post_type_targets' => array(
                array(
                    'target_name' => 'ff_accounts'
                    , 'target_fields' => array(
                        array(
                            'source_fieldname' => 'company',
                            'target_fieldname' => 'post_title'
                        )
                        , 'assign_to', 'email', 'phone', 'fax', 'parent_city', 'parent_country', 'street', 'state', 'zipcode', 'account_website', 'account_industry', 'account_annual_revenue', 'account_nb_employees', 'rating', 'full_description'
                    )
                ),
                array('target_name' => 'ff_contacts'
                    , 'target_fields' => array('post_title', 'email', 'contact_birth_date', 'contact_skype', 'contact_msn', 'secondary_email', 'contact_title', 'contact_dept', 'phone', 'fax', 'secondary_phone', 'mobile_phone', 'assign_to', 'lead_source', 'parent_city', 'parent_country', 'street', 'state', 'zipcode', 'contact_gender', 'contact_fistname', 'contact_lastname',
                        array(
                            'source_fieldname' => 'company',
                            'target_fieldname' => 'account_parent',
                            'find_mode' => 'find_parent_by_name',
                            'full_description'
                        )
                    )
                    , 'target_transform' => true//true = convert the old existing post to a new one by changing his post_type, not creating new one...
                    , 'target_childs' => array(//handle the childs conversion to the new post/migrated post.
                        array('module' => 'ff_tasks', 'original_field' => 'lead_parent', 'migrate_to_field' => 'contact_parent'),
                        array('module' => 'ff_cases', 'original_field' => 'lead_parent', 'migrate_to_field' => 'contact_parent'),
                        array('module' => 'ff_email_newsletter', 'original_field' => 'lead_parent', 'migrate_to_field' => 'contact_parent'),
                        array('module' => 'ff_events', 'original_field' => 'lead_parent', 'migrate_to_field' => 'contact_parent'),
                        array('module' => 'ff_call_log', 'original_field' => 'lead_parent', 'migrate_to_field' => 'contact_parent'),
                        array('module' => 'ff_notes', 'original_field' => 'lead_parent', 'migrate_to_field' => 'contact_parent'),
                    )
                )
            )
        ),
        'label_config' => array(
            'size_cls' => "f",
        ),
        'width' => 4,
        'fieldwidth' => 3
    ),
    'convert_agent' => array(
        'field_type' => 'setConverTaxAgent',
        'field_config' => array(
            'btn_class' => 'btn-info',
            'limit_to_edit' => true,
        ),
        'width' => 4
    ),
    'convert_office' => array(
        'field_type' => 'setConverTaxOffice',
        'field_config' => array(
            'btn_class' => 'btn-info',
            'limit_to_edit' => true,
        ),
        'width' => 4
    ),
    'related_user' => array(//CREATE the EXTRA EXNETSIOn FIELD 'RELATED USER' . all defintiion of this field is ini an extension setRelatedUser
        'info' => 'User related',
        'label_config' => array(
            'size_cls' => "lm",
        ),
        'field_type' => 'setRelatedUser',
        'width' => 4,
        'fieldwidth' => 4
    ),
    'related_user_convert' => array(
        'field_type' => 'actionRelatedUser',
        'label_config' => array(
            'btn_class' => 'btn-info',
        ),
        'width' => 4
    ),
);
