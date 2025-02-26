<?php

$custom_applications["15Settings"] = array(
    'name' => __('15Settings'),
    'active' => false,
    'menuname' => __('15 Settings'),
    'singular_name' => __('15 Settings'),
    'intro_page_text' => __('15 Settings'),
    'options_form' => 'apm-home-options',
    'option_sections' => array(
        array(
            'section_label' => __('Global Options'),
            'section_description' => __('Options settings for the Applications'),
            'fields' => array(
                'company_name' => __('Company name'),
                'company_email' => __('Company email'),
                'default_currency' => array(__('Default Currency'), 'text', '$'),
                '15Settings_app_name' => array(__('Settings Display name'), 'text', '15 Settings'),
                'default_paging_nb' => array(__('Default Nb of post in a list paging'), 'text', '30'),
            ),
        ),
        array(
            'section_label' => __('Notifications Options'),
            'section_description' => __('Options settings for the Notifications'),
            'fields' => array(//
                'use_notifications' => array(__('Use notifications?'), 'checkbox', true),
                'always_notify_assignee' => array(__('Always notify assignee?'), 'checkbox', true),
                'always_notify_current_user' => array(__('Always notify current user?'), 'checkbox', false),
                'from_email' => array(__('Notification "From" name'), 'text', 'APM CRM'),
                'notification_from_email' => array(__('Notification email "From" email '), 'text'),
                'notification_subject' => array(__('Notification email subject root'), 'text', 'APM CRM'),
                'system_name' => array(__('System Name'), 'text', 'APM CRM'),
            ),
        ),
        array(
            'section_label' => __('Dashboard Options'),
            'section_description' => __('Options settings for the Dashboard and Widgets'),
            'fields' => array(
                'widget_latest_default_max' => array(__('Max Nb. of recors to list in a widget list "Latest records"'), 'text', 15)
            ),
        )
    ),
    'categories' => array(
    )
    , 'modules' => array(
        /* 'ff_countries'=>array(
          'slug' => __( 'countries' ),
          'name' => __( 'Countries' ),
          'menu_name' => __( 'Countries' ),
          'singular_name' => __( 'Country' ),
          'module_columns' =>array('post_title','city_country'),
          'module_columns_config' =>array(
          'header_a_z'=>true,
          'grid_type' => 'ajax_data',
          'use_paging'=>true,
          'use_global_default_paging_nb'=>true,//THIS MUST BE SET IN GENERAL OPTION, with option 'default_paging_nb'
          //'nb_by_page'=>20, //To FORCE A SPECIFIC PAGING NB FOR THIS MODULE. WILL OVERHIDE THE use_global_default_paging_nb NB
          'user_can_change_paging_nb_by_module'=>true,
          ),
          'metaboxes'=>array(
          'account_information'=>array(
          'title' => __( 'Country Information' ),
          'context' => 'advanced',
          'priority' => 'high',
          'positioning' =>array(
          'main' => array(
          array(
          'continent'
          ),
          array(
          'country_short'
          )
          )
          )
          )
          )
          ), */
        /* 'ff_cities'=>array(
          'slug' => __( 'cities' ),
          'name' => __( 'Cities' ),
          'menu_name' => __( 'Cities' ),
          'singular_name' => __( 'City' ),
          'module_columns' =>array('post_title','parent_country'),
          'module_columns_config' =>array(
          'header_a_z'=>true,
          'grid_type' => 'ajax_data',
          'use_paging'=>true,
          'use_global_default_paging_nb'=>true,//THIS MUST BE SET IN GENERAL OPTION, with option 'default_paging_nb'
          //'nb_by_page'=>20, //To FORCE A SPECIFIC PAGING NB FOR THIS MODULE. WILL OVERHIDE THE use_global_default_paging_nb NB
          'user_can_change_paging_nb_by_module'=>true,
          ),
          'metaboxes'=>array(
          'account_information'=>array(
          'title' => __( 'City Information' ),
          'context' => 'advanced',
          'priority' => 'high',
          'positioning' =>array(
          'main' => array(
          array(
          'parent_country'
          ),
          )
          )
          )
          )
          ), */
        /* 'ff_project_type'=>array(
          'slug' => __( 'project_type' ),
          'name' => __( 'Project Types' ),
          'menu_name' => __( 'Project Types' ),
          'singular_name' => __( 'Project Type' ),
          'module_columns' =>array('post_title'),
          'metaboxes'=>array(
          'project_information'=>array(
          'title' => __( 'Project Type Information' ),
          'context' => 'advanced',
          'priority' => 'high',
          'positioning' =>array(
          'main' => array(
          )
          )
          )
          )
          ),
          'ff_project_tech'=>array(
          'slug' => __( 'project_tech' ),
          'name' => __( 'Project Tech' ),
          'menu_name' => __( 'Project Tech' ),
          'singular_name' => __( 'Project Tech' ),
          'module_columns' =>array('post_title'),
          'metaboxes'=>array(
          'project_information'=>array(
          'title' => __( 'Project Type Information' ),
          'context' => 'advanced',
          'priority' => 'high',
          'positioning' =>array(
          'main' => array(
          )
          )
          )
          )
          ),
          'ff_task_type'=>array(
          'slug' => __( 'task_types' ),
          'name' => __( 'Task types' ),
          'menu_name' => __( 'Task types' ),
          'singular_name' => __( 'Task type' ),
          'module_columns' =>array('post_title'),
          'auto_fill'=>array(
          'values'=>array('-None-','Task Type1'),
          'type'=>'list_of_terms',
          'field_target'=>'post_title'
          ),
          'metaboxes'=>array(
          'account_information'=>array(
          'title' => __( 'Task type Information' ),
          'context' => 'advanced',
          'priority' => 'high',
          'positioning' =>array(
          'main' => array(
          )
          )
          )
          )
          ),
          'ff_proj_tsk_type'=>array(
          'slug' => __( 'project_task_types' ),
          'name' => __( 'Project Task types' ),
          'menu_name' => __( 'Project Task types' ),
          'singular_name' => __( 'Project Task type' ),
          'module_columns' =>array('post_title'),
          'auto_fill'=>array(
          'values'=>array('-None-','Task Type1'),
          'type'=>'list_of_terms',
          'field_target'=>'post_title'
          ),
          'metaboxes'=>array(
          'account_information'=>array(
          'title' => __( 'Project Task type Information' ),
          'context' => 'advanced',
          'priority' => 'high',
          'positioning' =>array(
          'main' => array(
          )
          )
          )
          )
          ), */
        /* 'ff_potential_type'=>array(
          'slug' => __( 'potential_type' ),
          'name' => __( 'Potential Types' ),
          'menu_name' => __( 'Potential Types' ),
          'singular_name' => __( 'Potential Type' ),
          'module_columns' =>array('post_title'),
          'auto_fill'=>array(
          'values'=>array('-None-','Existing Business','New Business'),
          'type'=>'list_of_terms',
          'field_target'=>'post_title'
          ),
          'metaboxes'=>array(
          'account_information'=>array(
          'title' => __( 'Potential Type Information' ),
          'context' => 'advanced',
          'priority' => 'high',
          'positioning' =>array(
          'main' => array(
          )
          )
          )
          )
          ), */
        /* 'ff_newsletter_status'=>array(
          'slug' => __( 'newsletter_status' ),
          'name' => __( 'Newsletter Status' ),
          'menu_name' => __( 'Newsl. Status' ),
          'singular_name' => __( 'Newsletter Status' ),
          'module_columns' =>array('post_title'),
          'auto_fill'=>array(
          'values'=>array('Draft','Sent','Confirmed received','Positive reaction','Negative reaction','To follow up'),
          'type'=>'list_of_terms',
          'field_target'=>'post_title'
          ),
          'metaboxes'=>array(
          'account_information'=>array(
          'title' => __( 'Newsletter Status Information' ),
          'context' => 'advanced',
          'priority' => 'high',
          'positioning' =>array(
          'main' => array(
          )
          )
          )
          )
          ), */
        /* 'ff_call_type'=>array(
          'slug' => __( 'call_type' ),
          'name' => __( 'Call Types' ),
          'menu_name' => __( 'Call Types' ),
          'singular_name' => __( 'Call Type' ),
          'module_columns' =>array('post_title'),
          'auto_fill'=>array(
          'values'=>array('Inbound','Outbound'),
          'type'=>'list_of_terms',
          'field_target'=>'post_title'
          ),
          'metaboxes'=>array(
          'account_information'=>array(
          'title' => __( 'Call Type Information' ),
          'context' => 'advanced',
          'priority' => 'high',
          'positioning' =>array(
          'main' => array(
          )
          )
          )
          )
          ), */
        /* 'ff_call_from_to'=>array(
          'slug' => __( 'call_from_to' ),
          'name' => __( 'Call From/To' ),
          'menu_name' => __( 'Call From/To' ),
          'singular_name' => __( 'Call From/To' ),
          'module_columns' =>array('post_title'),
          'auto_fill'=>array(
          'values'=>array('Contact','Lead'),
          'type'=>'list_of_terms',
          'field_target'=>'post_title'
          ),
          'metaboxes'=>array(
          'account_information'=>array(
          'title' => __( 'Call From/To Information' ),
          'context' => 'advanced',
          'priority' => 'high',
          'positioning' =>array(
          'main' => array(
          )
          )
          )
          )
          ), */

        /* 'ff_call_purpose'=>array(
          'slug' => __( 'call_purpose' ),
          'name' => __( 'Call Purpose' ),
          'menu_name' => __( 'Call Purpose' ),
          'singular_name' => __( 'Call Purpose' ),
          'module_columns' =>array('post_title'),
          'auto_fill'=>array(
          'values'=>array('-None-','Prospecting','Administrative','Negotiation','Demo','Project','Support'),
          'type'=>'list_of_terms',
          'field_target'=>'post_title'
          ),
          'metaboxes'=>array(
          'account_information'=>array(
          'title' => __( 'Call Purpose Information' ),
          'context' => 'advanced',
          'priority' => 'high',
          'positioning' =>array(
          'main' => array(
          )
          )
          )
          )
          ), */
        /* 'ff_task_status'=>array(
          'slug' => __( 'task_status' ),
          'name' => __( 'Task status' ),
          'menu_name' => __( 'Task status' ),
          'singular_name' => __( 'Task status' ),
          'module_columns' =>array('post_title'),
          'auto_fill'=>array(
          'values'=>array('-None-','Not Started','Deffered','Completed','In Progress','Waiting on someone else'),
          'type'=>'list_of_terms',
          'field_target'=>'post_title'
          ),
          'metaboxes'=>array(
          'account_information'=>array(
          'title' => __( 'Task status Information' ),
          'context' => 'advanced',
          'priority' => 'high',
          'positioning' =>array(
          'main' => array(
          )
          )
          )
          )
          ), */
        /* 'ff_percent_complete'=>array(
          'slug' => __( 'percent_complete' ),
          'name' => __( '% Complete' ),
          'menu_name' => __( '% Complete' ),
          'singular_name' => __( '% Complete' ),
          'module_columns' =>array('post_title'),
          'auto_fill'=>array(
          'values'=>array('0','10','20','40','50','60','70','80','90','100'),
          'type'=>'list_of_terms',
          'field_target'=>'post_title'
          ),
          'metaboxes'=>array(
          'account_information'=>array(
          'title' => __( '% Complete Information' ),
          'context' => 'advanced',
          'priority' => 'high',
          'positioning' =>array(
          'main' => array(
          )
          )
          )
          )
          ), */
        /* 'ff_priority'=>array(
          'slug' => __( 'priority' ),
          'name' => __( 'Priorities' ),
          'menu_name' => __( 'Priorities' ),
          'singular_name' => __( 'Priority' ),
          'module_columns' =>array('post_title'),
          'auto_fill'=>array(
          'values'=>array('-None-','Normal','High','Highest','Low','Lowest'),
          'type'=>'list_of_terms',
          'field_target'=>'post_title'
          ),
          'metaboxes'=>array(
          'account_information'=>array(
          'title' => __( 'Priority Information' ),
          'context' => 'advanced',
          'priority' => 'high',
          'positioning' =>array(
          'main' => array(
          )
          )
          )
          )
          ), */
        /* 'ff_case_status'=>array(
          'slug' => __( 'case_status' ),
          'name' => __( 'Case Status' ),
          'menu_name' => __( 'Case Status' ),
          'singular_name' => __( 'Case Status' ),
          'module_columns' =>array('post_title'),
          'auto_fill'=>array(
          'values'=>array('-None-','New','Assigned','Closed','Pending Input','Rejected','Duplicate'),
          'type'=>'list_of_terms',
          'field_target'=>'post_title'
          ),
          'metaboxes'=>array(
          'account_information'=>array(
          'title' => __( 'Case Status Information' ),
          'context' => 'advanced',
          'priority' => 'high',
          'positioning' =>array(
          'main' => array(
          )
          )
          )
          )
          ), */
        /* 'ff_potential_stage'=>array(
          'slug' => __( 'potential_stage' ),
          'name' => __( 'Potential Stages' ),
          'menu_name' => __( 'Poten. Stages' ),
          'singular_name' => __( 'Potential Stage' ),
          'module_columns' =>array('post_title'),
          'auto_fill'=>array(
          'values'=>array('Prospecting','Qualification','Needs Analysis','Value Proposition','Id. Decision Makers','Perception Analysis','Proposal/Price Quote','Negotiation/Review','Closed Won','Closed Lost','Closed Lost to Competition'),
          'type'=>'list_of_terms',
          'field_target'=>'post_title'
          ),
          'metaboxes'=>array(
          'account_information'=>array(
          'title' => __( 'Potential Stage Information' ),
          'context' => 'advanced',
          'priority' => 'high',
          'positioning' =>array(
          'main' => array(
          )
          )
          )
          )
          ),
          'ff_potent_amnt_type'=>array(
          'slug' => __( 'potential_amount_type' ),
          'name' => __( 'Potential Amount type' ),
          'menu_name' => __( 'Pot. Amnt. type' ),
          'singular_name' => __( 'Potential Amount type' ),
          'module_columns' =>array('post_title'),
          'auto_fill'=>array(
          'values'=>array('Fix bid','Per hour','Per day','Per week','Per month','Per year','-None-'),
          'type'=>'list_of_terms',
          'field_target'=>'post_title'
          ),
          'metaboxes'=>array(
          'account_information'=>array(
          'title' => __( 'Potential Amount type Information' ),
          'context' => 'advanced',
          'priority' => 'high',
          'positioning' =>array(
          'main' => array(
          )
          )
          )
          )
          ), */
        /* 'ff_lead_source'=>array(
          'slug' => __( 'lead_source' ),
          'name' => __( 'Lead Source' ),
          'menu_name' => __( 'Lead Source' ),
          'singular_name' => __( 'Lead Source' ),
          'module_columns' =>array('post_title'),
          'auto_fill'=>array(
          'values'=>array('-None-','Advertisement','Cold Call','Employee Referral','External Referral','OnlineStore','Partner','Public Relations','Sales Mail Alias','Seminar Partner','Seminar-Internal','Trade Show','Web Download','Web Research','Web Cases','Web Mail','Web site form'),
          'type'=>'list_of_terms',
          'field_target'=>'post_title'
          ),
          'metaboxes'=>array(
          'account_information'=>array(
          'title' => __( 'Lead Source Information' ),
          'context' => 'advanced',
          'priority' => 'high',
          'positioning' =>array(
          'main' => array(
          )
          )
          )
          )
          ),
          'ff_lead_status'=>array(
          'slug' => __( 'lead_status' ),
          'name' => __( 'Lead Status' ),
          'menu_name' => __( 'Lead Status' ),
          'singular_name' => __( 'Lead Status' ),
          'module_columns' =>array('post_title'),
          'auto_fill'=>array(
          'values'=>array('-None-','Attempted to Contact','Cold','Contact in Future','Contacted','Hot','Junk Lead','Lost Lead','Not Contacted','Pre Qualified','Qualified','Warm'),
          'type'=>'list_of_terms',
          'field_target'=>'post_title'
          ),
          'metaboxes'=>array(
          'account_information'=>array(
          'title' => __( 'Lead Status Information' ),
          'context' => 'advanced',
          'priority' => 'high',
          'positioning' =>array(
          'main' => array(
          )
          )
          )
          )
          ),
          'ff_contact_gender'=>array(
          'slug' => __( 'contact_gender' ),
          'name' => __( 'Gender' ),
          'menu_name' => __( 'Gender' ),
          'singular_name' => __( 'Gender' ),
          'module_columns' =>array('post_title'),
          'auto_fill'=>array(
          'values'=>array('-None-','Mr.','Mrs.','Ms.','Dr.','Prof.'),
          'type'=>'list_of_terms',
          'field_target'=>'post_title'
          ),
          'metaboxes'=>array(
          'account_information'=>array(
          'title' => __( 'Gender Information' ),
          'context' => 'advanced',
          'priority' => 'high',
          'positioning' =>array(
          'main' => array(
          )
          )
          )
          )
          ),
          'ff_account_rating'=>array(
          'slug' => __( 'account_ratings' ),
          'name' => __( 'Account Ratings' ),
          'menu_name' => __( 'Accnt. Ratings' ),
          'singular_name' => __( 'Account Rating' ),
          'module_columns' =>array('post_title'),
          'auto_fill'=>array(
          'values'=>array('-None-','Acquired','Active','Market failed','Project Canceled','Shut down','Inactive','Cold','To Forget'),
          'type'=>'list_of_terms',
          'field_target'=>'post_title'
          ),
          'metaboxes'=>array(
          'account_information'=>array(
          'title' => __( 'Account Ratings Information' ),
          'context' => 'advanced',
          'priority' => 'high',
          'positioning' =>array(
          'main' => array(
          )
          )
          )
          )
          ),
          'ff_account_ownership'=>array(
          'slug' => __( 'account_ownership' ),
          'name' => __( 'Account ownership' ),
          'menu_name' => __( 'Accnt. own.' ),
          'singular_name' => __( 'Account ownership' ),
          'module_columns' =>array('post_title'),
          'auto_fill'=>array(
          'values'=>array('-None-','Other','Public','Private','Subsidiary'),
          'type'=>'list_of_terms',
          'field_target'=>'post_title'
          ),
          'metaboxes'=>array(
          'account_information'=>array(
          'title' => __( 'Account ownership Information' ),
          'context' => 'advanced',
          'priority' => 'high',
          'positioning' =>array(
          'main' => array(
          )
          )
          )
          )
          ),
          'ff_account_type_new'=>array(
          'slug' => __( 'account_types' ),
          'name' => __( 'Account types' ),
          'menu_name' => __( 'Account types' ),
          'singular_name' => __( 'Account type' ),
          'module_columns' =>array('post_title'),
          'auto_fill'=>array(
          'values'=>array('-None-','Analyst','Competitor','Customer','Integrator','Investor','Partner','Press','Prospect','Reseller','Other'),
          'type'=>'list_of_terms',
          'field_target'=>'post_title'
          ),
          'metaboxes'=>array(
          'account_information'=>array(
          'title' => __( 'Account type Information' ),
          'context' => 'advanced',
          'priority' => 'high',
          'positioning' =>array(
          'main' => array(
          )
          )
          )
          )
          ),
          'ff_industry_type'=>array(
          'slug' => __( 'industry_types' ),
          'name' => __( 'Industry types' ),
          'menu_name' => __( 'Industry types' ),
          'singular_name' => __( 'Industry type' ),
          'module_columns' =>array('post_title'),
          'auto_fill'=>array(
          'values'=>array('-None-','Apparel','Banking','Biotechnology','Chemicals','Communications','Construction','Consulting','Education','Electronics','Energy','Engineering','Entertainment','Environmental','Finance','Food & Beverage','Government','Healthcare','Hospitality','Insurance','Machinery','Manufacturing','Media','Not For Profit','Recreation','Retail','Shipping','Technology','Telecommunications','Transportation','Utilities','Other'),
          'type'=>'list_of_terms',
          'field_target'=>'post_title'
          ),
          'metaboxes'=>array(
          'account_information'=>array(
          'title' => __( 'Industry type Information' ),
          'context' => 'advanced',
          'priority' => 'high',
          'positioning' =>array(
          'main' => array(
          )
          )
          )
          )
          ),
          'ff_case_type'=>array(
          'slug' => __( 'case_types' ),
          'name' => __( 'Case types' ),
          'menu_name' => __( 'Case types' ),
          'singular_name' => __( 'Case type' ),
          'module_columns' =>array('post_title'),
          /*'metaboxes'=>array(
          'case_type_information'=>array(
          'title' => __( 'Case type Information' ),
          'context' => 'advanced',
          'priority' => 'high',
          'positioning' =>array(
          'main' => array(
          )
          )
          )
          )
          ), */
      /*  'ff_template_category' => array(
            'slug' => __('template_category'),
            'name' => __('Email Template Categories'),
            'icon' => 'document_16.png',
            'menu_name' => __('Email Tpl Ctg.'),
            'singular_name' => __('Email Template Category'),
            'module_columns' => array('post_title'),
        /* 'metaboxes'=>array(
          'case_type_information'=>array(
          'title' => __( 'Case type Information' ),
          'context' => 'advanced',
          'priority' => 'high',
          'positioning' =>array(
          'main' => array(
          )
          )
          )
          )
        ),*/
    )
);

