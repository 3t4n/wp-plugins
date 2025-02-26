<?php

$custom_applications["15CRM"] = array(
    'name' => __('15CRM'),
    //'active' => true,
    'show_home_credit' => true,
    'menuname' => __('ORIGAMI CRM'),
    'option_isactive_name' => '15CRM_app_active',
    'singular_name' => __('BLUE ORIGAMI CRM'),
    'intro_page_text' => __('BLUE ORIGAMI CRM Management'),
    'intro_homefooter_text' => __('YOU ARE USING THE FREE VERSION OF BLUE ORIGAMI CRM (Formerly APM CPM). To remove ads and get extra features and addons, get the PRO VERSION. <br/>If you want to follow up what  is happening around 15CRM, please visit our minisite <a href="http://apmcrm2013.weproduceweb.com/">http://apmcrm2013.weproduceweb.com/</a>'),
    'intro_home_text' => __('<h4>Welcome to BLUE ORIGAMI CRM Home page</h4>
        </br>YOU ARE USING THE FREE VERSION OF BLUE ORIGAMI CRM (Formerly APM CPM).
           <p> The PRO Version based on this Free version has been stopped but the Free version will continue to have small improvement.
        <a href=\'http://apmcrm2013.weproduceweb.com/\' target="_blank" >More Infos</a>.
        And a full new BLUE ORIGAMI PRO totally rebuild from zero to be much much better is in progress for maybe middle 2014.
        <a href=\'http://apmcrm2013.weproduceweb.com/blue_origami_crm_pro\' target="_blank" >PRO VERSION</a>.
        </br>BLUE ORIGAMI CRM provide to you most of the features of a classic simple CRM, plus some specific features.
        <br/>Discover the MODULES list below.</br>Please define your specific BLUE ORIGAMI CRM settings in the tab "Settings" (the Free version has limited Settings).
        </br>You can also in the other tabs, manage the categories and tags.'),
    'options_form' => 'apm-crmhome-options',
    'special_links' => array(
    ),
    'widgets' => array(
        'modules_list' => array(
            'dashboard_type' => 'default',
            'type' => 'list_modules',
            'modules' => 'ff_accounts,ff_contacts,ff_leads,ff_potentials,ff_cases,ff_tasks,ff_events,ff_call_log,ff_notes',
            'show_dashboard_link' => true,
            'label' => __('{{appname}} - Modules'),
            'roles_authorized' => 'sales,commercial_direction',
        ),
        'modules_list_support' => array(
            'dashboard_type' => 'default',
            'type' => 'list_modules',
            'modules' => 'ff_contacts,ff_cases,ff_tasks,ff_events,ff_call_log,ff_notes',
            'show_dashboard_link' => true,
            'label' => __('{{appname}} - Support Agent Modules'),
            'hide_admin' => true,
            'roles_authorized' => 'support_agent',
        ),
        'modules_list_support' => array(
            'dashboard_type' => 'default',
            'type' => 'list_modules',
            'modules' => 'ff_contacts,ff_cases,ff_tasks,ff_events,ff_call_log,ff_notes',
            'show_dashboard_link' => true,
            'label' => __('{{appname}} - Support Agent Modules'),
            'hide_admin' => true,
            'roles_authorized' => 'support_agent',
        ),
        'latest_activities' => array(
            'type' => 'latests',
            'modules' => 'ff_accounts,ff_contacts,ff_leads,ff_potentials,ff_cases,ff_tasks',
            'default_nbr' => 20,
            'option_nbr_name' => '15CRM_app_nbrecordsdash',
            'show_dashboard_link' => true,
            'label' => __('{{appname}} - {{nbr}} latest activities'),
        ),
    ),
    'option_sections' => array(
        array(
            'section_label' => __('CRM Settings'),
            'section_description' => __('Settings for your CRM.</br>You are using the Free version, in the free version you would have extra settings, like defining the curreny symbol etc.'),
            'fields' => array(),
        ),
        array(
            'section_label' => __('App Admin Settings'),
            // 'restricted' => array('administrator'),
            'section_description' => __('Admin Settings for your CRM App</br>You are using the Free version, in the PRO version you would have extra settings, like defining custom application name, etc.'),
            'fields' => array(
                '15CRM_app_active' => array(__('Enable App?'), 'checkbox', true, '', 'If you disable this, the users not admin will not see this app anymore.'),
                '15CRM_app_name' => array(__('CRM Display name'), 'html', 'BLUE ORIGAMI CRM', '', 'Available in the pro version. Allow to modify the App display name'),
                '15CRM_app_menuname' => array(__('CRM Menu name'), 'html', 'ORIGAMI CRM', '', 'Available in the pro version. Allow to modify the App display name'),
                '15CRM_app_nbrecordsdash' => array(__('Numbers of Latests Records on main Dashboard'), 'html', 20, '', 'Available in the pro version. Allow to modify the numbers of records to return in the Dashboard for the Latest Activities'),
            // '15CRM_app_test' => array(__('textarea'), 'textarea', '15 CRM','',''),
// '15CRM_app_test2' => array(__('select'), 'select', 'bb',array('aa','bb','cc'),''),
            ),
        ),
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
    'tags' => array(
        'tag15_crm' => array(
            'name' => __('CRM tags'),
            'singular_name' => __('CRM tag'),
            'menu_name' => __('CRM tags')
        ),
    ),
    'categories' => array(
        'cat15_accounts' => array(
            'name' => __('Account categories'),
            'singular_name' => __('Account category'),
            'menu_name' => __('Account categories')
        ), //rating
        'cat15_ownership' => array(
            'name' => __('Ownership'),
            'singular_name' => __('Ownership'),
            'menu_name' => __('Ownership'),
            'default_data' => array(
                'slug' => array('none', 'other', 'public', 'private', 'subsidiary'),
                'fr' => array('-None-', 'Other', 'Public', 'Private', 'Subsidiary'),
                'en' => array('-None-', 'Other', 'Public', 'Private', 'Subsidiary'),
            ),
        ),
        'cat15_countries' => array(
            'name' => __('Countries'),
            'singular_name' => __('Country'),
            'menu_name' => __('Countries'),
            'default_data' => array(
                'slug' => array('none', 'usa', 'france', 'belgium', 'england', 'germany', 'italy', 'japon', 'china', 'australia'),
                'fr' => array('-None-', 'Usa', 'France', 'Belgium', 'England', 'Germany', 'Italy', 'Japon', 'China', 'Australia'),
                'en' => array('-None-', 'Usa', 'France', 'Belgium', 'England', 'Germany', 'Italy', 'Japon', 'China', 'Australia'),
            ),
        ),
        'cat15_call_from' => array(
            'name' => __('Call  From/To'),
            'singular_name' => __('Call  From/To'),
            'menu_name' => __('Call  From/To'),
            'default_data' => array(
                'slug' => array('none', 'contact', 'lead', 'partner', 'subcontractor', 'retailler', 'reseller', 'other'),
                'fr' => array('-None-', 'Contact', 'Lead', 'Partner', 'Subcontractor', 'Retailler', 'Reseller', 'Other'),
                'en' => array('-None-', 'Contact', 'Lead', 'Partner', 'Subcontractor', 'Retailler', 'Reseller', 'Other'),
            ),
        ),
        'cat15_call_type' => array(
            'name' => __('Call Type'),
            'singular_name' => __('Call Type'),
            'menu_name' => __('Call Type'),
            'default_data' => array(
                'slug' => array('none', 'inbound', 'outbound'),
                'fr' => array('-None-', 'Inbound', 'Outbound'),
                'en' => array('-None-', 'Inbound', 'Outbound'),
            ),
        ),
        'cat15_call_purpose' => array(
            'name' => __('Call Purpose'),
            'singular_name' => __('Call Purpose'),
            'menu_name' => __('Call Purpose'),
            'default_data' => array(
                'slug' => array('none', 'prospecting', 'administrative', 'negotiation', 'demo', 'project', 'support'),
                'fr' => array('-None-', 'Prospecting', 'Administrative', 'Negotiation', 'Demo', 'Project', 'Support'),
                'en' => array('-None-', 'Prospecting', 'Administrative', 'Negotiation', 'Demo', 'Project', 'Support'),
            ),
        ),
        'cat15_tasks_type' => array(
            'name' => __('Task types'),
            'singular_name' => __('Task type'),
            'menu_name' => __('Task type'),
            'default_data' => array(
                'slug' => array('none', 'task_type_1', 'task_type_2'),
                'fr' => array('-None-', 'Task type 1', 'Task type 2'),
                'en' => array('-None-', 'Task type 1', 'Task type 2'),
            ),
        ),
        'cat15_cities' => array(
            'name' => __('Cities'),
            'singular_name' => __('City'),
            'menu_name' => __('Cities'),
            'default_data' => array(
                'slug' => array('none', 'paris', 'new_york'),
                'fr' => array('-None-', 'Paris', 'New-York'),
                'en' => array('-None-', 'Paris', 'New-York'),
            ),
        ),
        'cat15_rating' => array(
            'name' => __('Rating'),
            'singular_name' => __('Rating'),
            'menu_name' => __('Rating'),
            'default_data' => array(
                'slug' => array('none', 'acquired', 'active', 'market_failed', 'project_canceled', 'shut_down', 'inactive', 'cold', 'to_forget'),
                'fr' => array('-None-', 'Acquired', 'Active', 'Market failed', 'Project Canceled', 'Shut down', 'Inactive', 'Cold', 'To Forget'),
                'en' => array('-None-', 'Acquired', 'Active', 'Market failed', 'Project Canceled', 'Shut down', 'Inactive', 'Cold', 'To Forget'),
            ),
        ),
        'cat15_invoice_status' => array(
            'name' => __('Invoices Status'),
            'singular_name' => __('Invoices Status'),
            'menu_name' => __('Invoices Status'),
            'default_data' => array(
                'slug' => array('created', 'approved', 'sent', 'canceled', 'paid'),
                'fr' => array('Created', 'Approved', 'Sent', 'Canceled', 'Paid (close)'),
                'en' => array('Created', 'Approved', 'Sent', 'Canceled', 'Paid (close)'),
            ),
        ),
        'cat15_task_status' => array(
            'name' => __('Task Status'),
            'singular_name' => __('Task Status'),
            'menu_name' => __('Task Status'),
            'default_data' => array(
                'slug' => array('not_started', 'deffered', 'completed', 'in_progress', 'waiting_on_someone_else'),
                'fr' => array('Not Started', 'Deffered', 'Completed', 'In Progress', 'Waiting on someone else'),
                'en' => array('Not Started', 'Deffered', 'Completed', 'In Progress', 'Waiting on someone else'),
            ),
        ),
        'cat15_percent_complete' => array(
            'name' => __('% completed'),
            'singular_name' => __('% completed'),
            'menu_name' => __('% completed'),
            'default_data' => array(
                'slug' => array('0', '10', '20', '30', '40', '50', '60', '70', '80', '90', '100'),
                'fr' => array('0', '10', '20', '30', '40', '50', '60', '70', '80', '90', '100'),
                'en' => array('0', '10', '20', '30', '40', '50', '60', '70', '80', '90', '100'),
            ),
        ),
        'cat15_cases_status' => array(
            'name' => __('Case status'),
            'singular_name' => __('Case status'),
            'menu_name' => __('Case status'),
            'default_data' => array(
                'slug' => array('new', 'assigned', 'closed', 'pending_input', 'rejected', 'duplicate'),
                'fr' => array('New', 'Assigned', 'Closed', 'Pending Input', 'Rejected', 'Duplicate'),
                'en' => array('New', 'Assigned', 'Closed', 'Pending Input', 'Rejected', 'Duplicate'),
            ),
        ),
        'cat15_priorities' => array(
            'name' => __('Priorities'),
            'singular_name' => __('Priority'),
            'menu_name' => __('Priority'),
            'default_data' => array(
                'slug' => array('normal', 'high', 'highest', 'low', 'lowest'),
                'fr' => array('Normal', 'High', 'Highest', 'Low', 'Lowest'),
                'en' => array('Normal', 'High', 'Highest', 'Low', 'Lowest'),
            ),
        ),
        'cat15_cases_type' => array(
            'name' => __('Case types'),
            'singular_name' => __('Case type'),
            'menu_name' => __('Case types'),
            'default_data' => array(
                'slug' => array('none'),
                'fr' => array('-None-'),
                'en' => array('-None-'),
            ),
        ),
        'cat15_accounts_type' => array(
            'name' => __('Account types'),
            'singular_name' => __('Account type'),
            'menu_name' => __('Account types'),
            'default_data' => array(
                'slug' => array('none', 'analyst', 'competitor', 'customer', 'integrator', 'investor', 'partner', 'press', 'prospect', 'reseller', 'other'),
                'fr' => array('-None-', 'Analyst', 'Competitor', 'Customer', 'Integrator', 'Investor', 'Partner', 'Press', 'Prospect', 'Reseller', 'Other'),
                'en' => array('-None-', 'Analyst', 'Competitor', 'Customer', 'Integrator', 'Investor', 'Partner', 'Press', 'Prospect', 'Reseller', 'Other'),
            ),
        ),
        'cat15_accounts_industry' => array(
            'name' => __('Account industry'),
            'singular_name' => __('Account industry'),
            'menu_name' => __('Account industry'),
            'default_data' => array(
                'slug' => array('none', 'apparel', 'banking', 'biotechnology', 'chemicals', 'communications', 'construction', 'consulting', 'education', 'electronics', 'energy', 'engineering', 'entertainment', 'environmental', 'finance', 'food-beverage', 'government', 'healthcare', 'hospitality', 'insurance', 'machinery', 'manufacturing', 'media', 'not_for_profit', 'recreation', 'retail', 'shipping', 'technology', 'telecommunications', 'transportation', 'utilities', 'other'),
                'fr' => array('-None-', 'FRApparel', 'FRBanking', 'FRBiotechnology', 'FRChemicals', 'FRCommunications', 'FRConstruction', 'Consulting', 'Education', 'Electronics', 'Energy', 'Engineering', 'Entertainment', 'Environmental', 'Finance', 'Food & Beverage', 'Government', 'Healthcare', 'Hospitality', 'Insurance', 'Machinery', 'Manufacturing', 'Media', 'Not For Profit', 'Recreation', 'Retail', 'Shipping', 'Technology', 'Telecommunications', 'Transportation', 'Utilities', 'Other'),
                'en' => array('-None-', 'Apparel', 'Banking', 'Biotechnology', 'Chemicals', 'Communications', 'Construction', 'Consulting', 'Education', 'Electronics', 'Energy', 'Engineering', 'Entertainment', 'Environmental', 'Finance', 'Food & Beverage', 'Government', 'Healthcare', 'Hospitality', 'Insurance', 'Machinery', 'Manufacturing', 'Media', 'Not For Profit', 'Recreation', 'Retail', 'Shipping', 'Technology', 'Telecommunications', 'Transportation', 'Utilities', 'Other'),
            ),
        ),
        'cat15_payment_terms' => array(
            'name' => __('Payment terms'),
            'singular_name' => __('Payment term'),
            'menu_name' => __('Payment terms'),
            'default_data' => array(
                'slug' => array('reception', '15', '30', '45', '60', '4end', '60end'),
                'fr' => array('On Invoice reception', '15 days', '30 days', '45 days', '60 days', '45 days end of month', '60 days end of month'),
                'en' => array('On Invoice reception', '15 days', '30 days', '45 days', '60 days', '45 days end of month', '60 days end of month'),
            ),
        ),
        'cat15_potential_stage' => array(
            'name' => __('Potential Stages'),
            'singular_name' => __('Potential Stage'),
            'menu_name' => __('Potential Stage'),
            'default_data' => array(
                'slug' => array('prospecting', 'qualification', 'needs_analysis', 'value_proposition', 'id_decision_makers', 'perception_analysis', 'proposal_price_quote', 'negotiation_review', 'closed_won', 'closed_lost', 'closed_lost_to_competition'),
                'fr' => array('Prospecting', 'Qualification', 'Needs Analysis', 'Value Proposition', 'Id. Decision Makers', 'Perception Analysis', 'Proposal/Price Quote', 'Negotiation/Review', 'Closed Won', 'Closed Lost', 'Closed Lost to Competition'),
                'en' => array('Prospecting', 'Qualification', 'Needs Analysis', 'Value Proposition', 'Id. Decision Makers', 'Perception Analysis', 'Proposal/Price Quote', 'Negotiation/Review', 'Closed Won', 'Closed Lost', 'Closed Lost to Competition'),
            ),
        ),
        'cat15_potential_amounttype' => array(
            'name' => __('Potential Amount Types'),
            'singular_name' => __('Potential Amount Type'),
            'menu_name' => __('Potential Amount Type'),
            'default_data' => array(
                'slug' => array('none', 'fix_bid', 'per_hour', 'per_day', 'per_week', 'per_month', 'per_year'),
                'fr' => array('-None-', 'Fix bid', 'Per hour', 'Per day', 'Per week', 'Per month', 'Per year'),
                'en' => array('-None-', 'Fix bid', 'Per hour', 'Per day', 'Per week', 'Per month', 'Per year'),
            ),
        ),
        'cat15_project_type' => array(
            'name' => __('Project Types'),
            'singular_name' => __('Project Type'),
            'menu_name' => __('Project Type'),
            'default_data' => array(
                'slug' => array('none', 'mobile_app', 'web_site', 'blog', 'web_app', 'social_network', 'plugin', 'banners', 'minisite', 'mini_game', 'other'),
                'fr' => array('-None-', 'Mobile App', 'Web site', 'Blog', 'Web App', 'Social Network', 'Plugin', 'Banners', 'Minisite', 'Mini Game', 'Other'),
                'en' => array('-None-', 'Mobile App', 'Web site', 'Blog', 'Web App', 'Social Network', 'Plugin', 'Banners', 'Minisite', 'Mini Game', 'Other'),
            ),
        ),
        'cat15_quotes_status' => array(
            'name' => __('Quotes Status'),
            'singular_name' => __('Quotes Status'),
            'menu_name' => __('Quotes Status'),
            'default_data' => array(
                'slug' => array('draft', 'negociation', 'delivered', 'onhold', 'confirmed', 'closewon', 'closelost'),
                'fr' => array('Draft', 'Negociation', 'Delivered', 'On Hold', 'Confirmed', 'Close Won', 'Close Lost'),
                'en' => array('Draft', 'Negociation', 'Delivered', 'On Hold', 'Confirmed', 'Close Won', 'Close Lost'),
            ),
        ),
        'cat15_potential_type' => array(
            'name' => __('Potential Types'),
            'singular_name' => __('Potential Type'),
            'menu_name' => __('Potential Type'),
            'default_data' => array(
                'slug' => array('none', 'existing8business', 'new8business', 'other'),
                'fr' => array('-None-', 'Existing Business', 'New Business', 'Other'),
                'en' => array('-None-', 'Existing Business', 'New Business', 'Other'),
            ),
        ),
        'cat15_lead_source' => array(
            'name' => __('Lead source'),
            'singular_name' => __('Lead source'),
            'menu_name' => __('Lead source'),
            'default_data' => array(
                'slug' => array('none', 'advertisement', 'cold_call', 'employee_referral', 'external_referral', 'onlinestore', 'partner', 'public_relations', 'sales_mail_alias', 'seminar_partner', 'Seminar-Internal', 'trade_show', 'web_download', 'web_research', 'web_cases', 'web_mail', 'web_site_form'),
                'fr' => array('-None-', 'Advertisement', 'Cold Call', 'Employee Referral', 'External Referral', 'OnlineStore', 'Partner', 'Public Relations', 'Sales Mail Alias', 'Seminar Partner', 'Seminar-Internal', 'Trade Show', 'Web Download', 'Web Research', 'Web Cases', 'Web Mail', 'Web site form'),
                'en' => array('-None-', 'Advertisement', 'Cold Call', 'Employee Referral', 'External Referral', 'OnlineStore', 'Partner', 'Public Relations', 'Sales Mail Alias', 'Seminar Partner', 'Seminar-Internal', 'Trade Show', 'Web Download', 'Web Research', 'Web Cases', 'Web Mail', 'Web site form'),
            ),
        ),
        'cat15_lead_status' => array(
            'name' => __('Lead status'),
            'singular_name' => __('Lead status'),
            'menu_name' => __('Lead status'),
            'default_data' => array(
                'slug' => array('none', 'attempted_to_contact', 'cold', 'contact_in_future', 'contacted', 'hot', 'junk_lead', 'lost_lead', 'not_contacted', 'pre_qualified', 'qualified', 'warm'),
                'fr' => array('-None-', 'Attempted to Contact', 'Cold', 'Contact in Future', 'Contacted', 'Hot', 'Junk Lead', 'Lost Lead', 'Not Contacted', 'Pre Qualified', 'Qualified', 'Warm'),
                'en' => array('-None-', 'Attempted to Contact', 'Cold', 'Contact in Future', 'Contacted', 'Hot', 'Junk Lead', 'Lost Lead', 'Not Contacted', 'Pre Qualified', 'Qualified', 'Warm'),
            ),
        ),
        'cat15_gender' => array(
            'name' => __('Gender'),
            'singular_name' => __('Gender'),
            'menu_name' => __('Gender'),
            'default_data' => array(
                'slug' => array('none', 'dr', 'mr', 'mrs', 'ms', 'prof'),
                'fr' => array('-None-', 'FRDr.', 'FRMr.', 'FRMrs.', 'FRMs.', 'FRProf.'),
                'en' => array('-None-', 'Dr.', 'Mr.', 'Mrs.', 'Ms.', 'Prof.'),
            ),
        ),
        'cat15_contacts' => array(
            'name' => __('Contact categories'),
            'singular_name' => __('Contact category'),
            'menu_name' => __('Contact categories')
        ),
        'cat15_leads' => array(
            'name' => __('Lead categories'),
            'singular_name' => __('Lead category'),
            'menu_name' => __('Lead categories')
        ),
        'cat15_potentials' => array(
            'name' => __('Potential categories'),
            'singular_name' => __('Potential category'),
            'menu_name' => __('Potential categories')
        ),
        'cat15_cases' => array(
            'name' => __('Cases categories'),
            'singular_name' => __('Cases category'),
            'menu_name' => __('Cases categories')
        ),
        'cat15_activities' => array(
            'name' => __('Activity categories'),
            'singular_name' => __('Activity category'),
            'menu_name' => __('Activity categories')
        ),
        'cat15_tasks' => array(
            'name' => __('Task categories'),
            'singular_name' => __('Task category'),
            'menu_name' => __('Task categories')
        ),
        'cat15_quotes' => array(
            'name' => __('Quotes categories'),
            'singular_name' => __('Quotes category'),
            'menu_name' => __('Quotes categories')
        ),
        'cat15_invoices' => array(
            'name' => __('Invoices categories'),
            'singular_name' => __('Invoices category'),
            'menu_name' => __('Invoices categories')
        ),
        'cat15_events' => array(
            'name' => __('Event categories'),
            'singular_name' => __('Event category'),
            'menu_name' => __('Event categories')
        ),
        'cat15_call_logs' => array(
            'name' => __('Call log categories'),
            'singular_name' => __('Call log category'),
            'menu_name' => __('Call log categories')
        ),
        'cat15_mail_archive' => array(
            'name' => __('Mail Archives categories'),
            'singular_name' => __('Mail Archives category'),
            'menu_name' => __('Mail Archives categories')
        ),
        'cat15_notes' => array(
            'name' => __('Notes categories'),
            'singular_name' => __('Notes category'),
            'menu_name' => __('Notes categories')
        )
    )
    , 'modules' => array(
        'ff_accounts' => $app_modules["ff_accounts"]
        , 'ff_contacts' => $app_modules["ff_contacts"]
        , 'ff_leads' => $app_modules["ff_leads"]
        , 'ff_cases' => $app_modules["ff_cases"]
        , 'ff_quotes' => $app_modules["ff_quotes"]
        , 'ff_invoices' => $app_modules["ff_invoices"]
        , 'ff_tasks' => $app_modules["ff_tasks"]
        , 'ff_events' => $app_modules["ff_events"]
        , 'ff_call_log' => $app_modules["ff_call_log"]
        , 'ff_notes' => $app_modules["ff_notes"]
        , 'ff_mail_archive' => $app_modules["ff_mail_archive"]
    /* , 'ff_email_template' => array(
      'slug' => __('email_templates'),
      'name' => __('Email Templates'),
      'icon' => 'letter_16.png',
      'menu_name' => __('Email Tpl'),
      'singular_name' => __('Email Template'),
      'module_columns' => array('post_title'),
      'metaboxes' => array(
      'case_type_information' => array(
      'title' => __('Email Templates Information'),
      'context' => 'advanced',
      'priority' => 'high',
      'positioning' => array(
      'main' => array(
      array(
      'template_category', 'from_parent'
      ),
      array(
      'reply_to_email', 'reply_to_name', 'add_user_signature'
      ),
      array(
      'help_email_body_tags'
      ),
      array(
      'email_subject'
      ),
      array(
      'email_body'
      ),
      array(
      'email_footer'
      ),
      array(
      'created_by', 'created_date', 'modified_date'
      )
      )
      )
      )
      )
      ) */
    )
);

