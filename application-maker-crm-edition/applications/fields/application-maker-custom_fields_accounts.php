<?php

$local_custom_fields = array(
////15CRM
////******ACCOUNT
    'account_test_displayfield' => array(
        'label' => __('Ac grjfhjghj'),
        'label_width' => 80,
        'field_type' => 'displayfield',
        'label_width_perc' => 45,
        'width' => 5
    ),
    'account_owner' => array(
        'label' => __('Account Owner'),
        'label_width' => 80,
        'field_type' => 'userslist',
        'label_config' => array(
            'size_cls' => "f",
        ),
        'width' => 4,
        'fieldwidth' => 4
    ),
    'account_ownerb' => array(
        'label' => __('Account Owner'),
        'field_type' => 'userslist',
        'label_config' => array(
            'size_cls' => "f",
        ),
        'width' => 4,
        'fieldwidth' => 4
    ),
    'account_show_on_site' => array(
        'label' => __('Show on Site?'),
        'data_type' => 'bool',
        'column_type' => 'bool_ajax',
        'column_label' => 'Show site?',
        'field_type' => 'checkbox',
        'label_config' => array(
            'size_cls' => "f",
        ),
        'width' => 4,
        'fieldwidth' => 4
    ),
    'project_show_on_site' => array(
        'label' => __('Show on Site?'),
        'data_type' => 'bool',
        'column_type' => 'bool_ajax',
        'column_label' => 'Show site?',
        'field_type' => 'checkbox',
        'label_config' => array(
            'size_cls' => "f",
        ),
        'width' => 4,
        'fieldwidth' => 4
    ),
    'private_on_site' => array(
        'label' => __('Push in Private?'),
        'data_type' => 'bool',
        'column_label' => 'Push Private?',
        'column_type' => 'bool_ajax',
        'help' => 'Would be pushed on the site, but only visible if you are logged in with a invited user account',
        'field_type' => 'checkbox',
        'label_config' => array(
            'size_cls' => "f",
        ),
        'width' => 4,
        'fieldwidth' => 4
    ),
    'account_push_home' => array(
        'label' => __('Push on home of Site?'),
        'data_type' => 'bool',
        'column_type' => 'bool_ajax',
        'column_label' => 'Push home site?',
        'field_type' => 'checkbox',
        'label_config' => array(
            'size_cls' => "f",
        ),
        'width' => 4,
        'fieldwidth' => 4
    ),
    'project_push_home' => array(
        'label' => __('Push on home of Site?'),
        'data_type' => 'bool',
        'column_type' => 'bool_ajax',
        'column_label' => 'Push home site?',
        'field_type' => 'checkbox',
        'label_config' => array(
            'size_cls' => "f",
        ),
        'width' => 4,
        'fieldwidth' => 4
    ),
    'account_number' => array(
        'label' => __('Account Number'),
        'label_width_perc' => 35,
        'width' => 7
    ),
    'separator_siteaccount' => array(
        'field_type' => 'html',
        'html' => "<strong>Needed only if you show a list of clients on Front Site:</strong>"
    ),
    'account_annual_revenue' => array(
        'label' => __('Annual revenue ({{currency}})'),
        'column_label' => 'Annual revenue ',
        'data_type' => 'int',
        'field_type' => 'currencyfield',
        'restrict_format' => 'numbers',
        'label_config' => array(
            'size_cls' => "f",
        ),
        'width' => 4,
        'fieldwidth' => 3
    ),
    'account_nb_employees' => array(
        'label' => __('Employees'),
        'restrict_format' => 'numbers',
        'label_config' => array(
            'size_cls' => "f",
        ),
        'width' => 6,
        'fieldwidth' => 3
    ),
    'account_website' => array(
        'label' => __('Website'),
        'placeholder' => 'http://thesiteurl',
        //'label_width' => 100,
        // "description"=>"tytryt eytry etry ter ",
        'label_config' => array(
            'size_cls' => "f",
        ),
        'width' => 5,
        'fieldwidth' => 6
    ),
    'account_sic_code' => array(
        'label' => __('Sic Code'),
        'label_config' => array(
            'size_cls' => "f",
        ),
        'width' => 3,
        'fieldwidth' => 2
    ),
    'account_ticker_symbol' => array(
        'label' => __('Ticker Symbol'),
        'label_config' => array(
            'size_cls' => "f",
        ),
        'width' => 4,
        'fieldwidth' => 2
    ),
    'account_type' => array(
        'label' => __('Account Type'),
        'default' => '',
        'data_type' => 'select',
        'column_label' => 'Account Type',
        //'options' => array('-None-','Analyst','Competitor','Customer','Integrator','Investor','Partner','Press','Prospect','Reseller','Other'),

        'field_type' => 'setInBodyCategorySelect',
        'field_config' => array(
            'category' => 'cat15_accounts_type',
        //'use_none'=>true,
        //'link_parent'=>false,
        ),
        'label_config' => array(
            'size_cls' => "f",
        ),
        'width' => 7,
        'fieldwidth' => 5,
    //'fieldheight' => 3
    ),
    'account_industry' => array(
        'label' => __('Industry'),
        'default' => '',
        'data_type' => 'list',
        'column_label' => 'Industry',
        //'options' => array('-None-','Apparel','Banking','Biotechnology','Chemicals','Communications','Construction','Consulting','Education','Electronics','Energy','Engineering','Entertainment','Environmental','Finance','Food & Beverage','Government','Healthcare','Hospitality','Insurance','Machinery','Manufacturing','Media','Not For Profit','Recreation','Retail','Shipping','Technology','Telecommunications','Transportation','Utilities','Other'),
        'field_type' => 'setInBodyCategorySelect',
        'field_config' => array(
            'category' => 'cat15_accounts_industry',
        //'use_none'=>true,
        //'link_parent'=>false,
        ),
        'label_config' => array(
            'size_cls' => "f",
        ),
        'width' => 6,
        'fieldwidth' => 5,
    //'fieldheight' => 3
    ),
    'quick_add_potential' => array(
        'label' => __('Add Potential'),
        'default' => '',
        'width' => 5,
        'label_width_perc' => 30,
        'field_type' => 'add_child',
        'field_config' => array(
            'post_type' => 'ff_potentials',
        //'child_key'=>'account_parent',
        )
    ),
    'accounts_addrelated' => array(
        'label' => '',
        'default' => '',
        'width' => 5,
        'label_width_perc' => 30,
        'field_type' => 'setAddRelated',
        'field_config' => array(
            'post_types' => 'ff_contacts,ff_potentials,ff_tasks,ff_cases,ff_events,ff_notes,ff_call_log,ff_email_newsletter',
        )
    ),
    'quick_add_contact' => array(
        'label' => __('Add Contact'),
        'default' => '',
        'width' => 5,
        'label_width_perc' => 30,
        'field_type' => 'add_child',
        'field_config' => array(
            'post_type' => 'ff_contacts',
        //'child_key'=>'account_parent',
        )
    ),
    'quick_add_note' => array(
        'label' => __('Add Note'),
        'default' => '',
        'width' => 5,
        'label_width_perc' => 30,
        'field_type' => 'add_child',
        'field_config' => array(
            'post_type' => 'ff_notes',
        //'child_key'=>'account_parent',
        )
    ),
    'quick_add_task' => array(
        'label' => __('Add Task'),
        'default' => '',
        'width' => 5,
        'label_width_perc' => 30,
        'field_type' => 'add_child',
        'field_config' => array(
            'post_type' => 'ff_tasks',
        //'child_key'=>'account_parent',
        )
    ),
    'quick_add_event' => array(
        'label' => __('Add Event'),
        'default' => '',
        'width' => 5,
        'label_width_perc' => 30,
        'field_type' => 'add_child',
        'field_config' => array(
            'post_type' => 'ff_events',
        //'child_key'=>'account_parent',
        )
    ),
    'quick_add_call' => array(
        'label' => __('Add Call Log'),
        'default' => '',
        'width' => 5,
        'label_width_perc' => 30,
        'field_type' => 'add_child',
        'field_config' => array(
            'post_type' => 'ff_call_log',
            'child_key' => 'account_parent',
        )
    ),
    'rating' => array(
        'label' => __('Rating'),
        'default' => '',
        'data_type' => 'select',
        'column_label' => 'Rating',
        //'options' => array('-None-','Analyst','Competitor','Customer','Integrator','Investor','Partner','Press','Prospect','Reseller','Other'),

        'field_type' => 'setInBodyCategorySelect',
        'field_config' => array(
            'category' => 'cat15_rating',
        //'use_none'=>true,
        //'link_parent'=>false,
        ),
        'label_config' => array(
            'size_cls' => "f",
        ),
        'width' => 6,
        'fieldwidth' => 5,
    ),
    'ownership' => array(
        'label' => __('Ownership'),
        'default' => '',
        'data_type' => 'select',
        'column_label' => 'Ownership',
        //'options' => array('-None-','Analyst','Competitor','Customer','Integrator','Investor','Partner','Press','Prospect','Reseller','Other'),

        'field_type' => 'setInBodyCategorySelect',
        'field_config' => array(
            'category' => 'cat15_ownership',
        //'use_none'=>true,
        //'link_parent'=>false,
        ),
        'label_config' => array(
            'size_cls' => "f",
        ),
        'width' => 8,
        'fieldwidth' => 5,
    ),
    'help_main_address' => array(
        'field_type' => 'html',
        'html' => "<strong>Main Address:</strong>"
    ),
    'help_billing_address' => array(
        'field_type' => 'html',
        'html' => "<strong>Billing Address:</strong><br/>Enter the Billing Address, or keep empty if it's the same than the Main Address."
    ),
    'country_free' => array(
        'label' => __('Other country'),
        'width' => 4,
        'label_width_perc' => 30,
    ),
    'parent_country' => array(
        'label' => __('Country'),
        'data_type' => 'select',
        'column_label' => 'Country',
        'field_type' => 'setInBodyCategorySelect',
        'field_config' => array(
            'category' => 'cat15_countries',
        //'use_none'=>true,
        //'link_parent'=>false,
        ),
        'label_config' => array(
            'size_cls' => "f",
        ),
        'width' => 6,
        'fieldwidth' => 5
    ), //
    'parent_country_billing' => array(
        'label' => __('Country'),
        'data_type' => 'select',
        'column_label' => 'Country',
        'field_type' => 'setInBodyCategorySelect',
        'field_config' => array(
            'category' => 'cat15_countries',
        //'use_none'=>true,
        //'link_parent'=>false,
        ),
        'label_config' => array(
            'size_cls' => "f",
        ),
        'width' => 6,
        'fieldwidth' => 5
    ), //
    'parent_city' => array(
        'label' => __('City'),
        'data_type' => 'select',
        'column_label' => 'City',
        'field_type' => 'setInBodyCategorySelect',
        'field_config' => array(
            'category' => 'cat15_cities',
        //'use_none'=>true,
        //'link_parent'=>false,
        ),
        'label_config' => array(
            'size_cls' => "f",
        ),
        'width' => 6,
        'fieldwidth' => 5
    ), //
    'parent_city_billing' => array(
        'label' => __('City'),
        'data_type' => 'select',
        'column_label' => 'City',
        'field_type' => 'setInBodyCategorySelect',
        'field_config' => array(
            'category' => 'cat15_cities',
        //'use_none'=>true,
        //'link_parent'=>false,
        ),
        'label_config' => array(
            'size_cls' => "f",
        ),
        'width' => 6,
        'fieldwidth' => 5
    ), //
    'street' => array(
        'label' => __('Street'),
        'label_config' => array(
            'size_cls' => "f",
        ),
        'width' => 6,
        'fieldwidth' => 7
    ),
    'street_billing' => array(
        'label' => __('Street'),
        'label_config' => array(
            'size_cls' => "f",
        ),
        'width' => 6,
        'fieldwidth' => 7
    ),
    'zipcode' => array(
        'label' => __('Zip Code'),
        'label_config' => array(
            'size_cls' => "f",
        ),
        'width' => 3,
        'fieldwidth' => 2
    ),
    'zipcode_billing' => array(
        'label' => __('Zip Code'),
        'label_config' => array(
            'size_cls' => "f",
        ),
        'width' => 3,
        'fieldwidth' => 2
    ),
    'state' => array(
        'label' => __('State'),
        'label_config' => array(
            'size_cls' => "f",
        ),
        'width' => 3,
        'fieldwidth' => 3
    ),
    'state_billing' => array(
        'label' => __('State'),
        'label_config' => array(
            'size_cls' => "f",
        ),
        'width' => 3,
        'fieldwidth' => 3
    ),
    'continent' => array(
        'label' => __('Continent'),
        'label_width_perc' => 30,
        'width' => 10
    ),
    'country_short' => array(
        'label' => __('Country Short name code'),
        'label_width_perc' => 30,
        'width' => 10
    ),
    /////RELATED

    'ff_account_child_cases' => array(
        'label' => __('Cases'),
        'field_type' => 'childgrid',
        'field_config' => array(
            'post_type' => 'ff_cases',
            'child_key' => 'account_parent',
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
            // 'post_title','assign_to','priority','case_status','case_type'
            )
        ),
        'width' => 10
    ),
    'ff_account_child_newsletter' => array(
        'label' => __('Newsletters'),
        'field_type' => 'childgrid',
        'field_config' => array(
            'post_type' => 'ff_email_newsletter',
            'child_key' => 'account_parent',
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
            //'post_title','newsletter_status','emails_date_sent','emails_time_sent'
            )
        ),
        'width' => 10
    ),


    'ff_account_child_projects' => array(
        'label' => __('Projects'),
        'field_type' => 'childgrid',
        'field_config' => array(
            'post_type' => 'ff_projects',
            'child_key' => 'account_parent',
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
                    'field' => 'project_type',
                    'width' => '15'
                ),
                array(
                    'field' => 'status',
                    'width' => '15'
                ),
                array(
                    'field' => 'percent_complete',
                    'width' => '15'
                ),
                array(
                    'field' => 'end_date',
                    'width' => '15'
                ),
            //  'post_title','project_type'
            )
        ),
        'width' => 10
    ),
    'ff_account_child_contact' => array(
        'label' => __('Contacts'),
        'field_type' => 'childgrid',
        'field_config' => array(
            'post_type' => 'ff_contacts',
            'child_key' => 'account_parent',
            'columns' => array(
                array(
                    'field' => 'post_title',
                    'width' => '25'
                ),
                array(
                    'field' => 'email',
                    'width' => '15'
                ),
                array(
                    'field' => 'phone',
                    'width' => '15'
                ),
                array(
                    'field' => 'mobile_phone',
                    'width' => '15'
                ),
                array(
                    'field' => 'assign_to',
                    'width' => '15'
                ),
                array(
                    'field' => 'lead_source',
                    'width' => '15'
                ),
            // 'post_title','email','phone','mobile_phone','assign_to','lead_source'
            )
        ),
        'width' => 10
    ),
    'ff_account_child_potential' => array(
        'label' => __('Potentials'),
        'field_type' => 'childgrid',
        'field_config' => array(
            'post_type' => 'ff_potentials',
            'child_key' => 'account_parent',
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
                ),
            //'post_title','assign_to','potential_closing_date','potential_stage','potential_proba','potential_amount','potential_amount_type','potential_expected_revenue'
            ),
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
    'ff_account_child_calls' => array(
        'label' => __('Call logs fff'),
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
        //'columns'=>array('post_title','account_parent','assign_to','contact_parent','start_date','call_type','call_purpose','call_from_to')
        ),
        'width' => 10
    ),
    'ff_account_child_emails' => array(
        'label' => __('Email Archive'),
        'field_type' => 'childgrid',
        'field_config' => array(
            'post_type' => 'ff_mail_archive',
            'child_key' => 'account_parent',
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
        //'columns'=>array('post_title','account_parent','sent_date','to_parent',)
        ),
        'width' => 10
    ),
    'ff_account_child_notes' => array(
        'label' => __('Notes'),
        'field_type' => 'childgrid',
        'field_config' => array(
            'post_type' => 'ff_notes',
            'child_key' => 'account_parent',
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
        //'columns'=>array('post_title','account_parent')
        ),
        'width' => 10
    ),
    'ff_child_tasks' => array(
        'label' => __('Tasks'),
        'field_type' => 'childgrid',
        'field_config' => array(
            'post_type' => 'ff_tasks',
            'child_key' => 'account_parent_short',
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
        ///NOTES
        ///
);
