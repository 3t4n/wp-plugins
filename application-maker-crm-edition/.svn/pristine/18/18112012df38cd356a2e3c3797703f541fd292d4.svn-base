<?php

$custom_applications["15TAX"] = array(
    'name' => __('15TAX'),
    //'active' => true,
    'show_home_credit' => true,
    'menuname' => __('TAX MAXPLUS'),
    'option_isactive_name' => '15TAX_app_active',
    'singular_name' => __('TAX MAXPLUS AFFILIATES'), //Mail Box &
    'intro_page_text' => __('TAX MAXPLUS AFFILIATES'), //Mail Box &
    'options_form' => 'apm-crmhome-options',
    'intro_homefooter_text' => __(''),
    'intro_home_text' => __('<h4>Welcome to TAX MAXPLUS AFFILIATES Home page</h4>
      '),
    'widgets' => array(
        'taxmodules_list' => array(
            'type' => 'list_modules',
            'show_dashboard_link' => true,
            'label' => __('{{appname}} - Modules'),
        ),
		'taxmodules_yourtax_offices' => array(
            'type' => 'list_yourtax',
            'show_dashboard_link' => true,
            // 'label' => __('{{appname}} - Test new widget type'),
            'label' => __('YOUR TAX MAXPLUS OFFICES'),
			'modules' => 'tax_offices',
			'default_nbr' => 20,
            'option_nbr_name' => '15TAX_app_nbrecordsdash',
			'default_name' => 'TAX OFFICE',
        ),
		'taxmodules_yourtax_taxagents' => array(
            'type' => 'list_yourtax',
            'show_dashboard_link' => true,
            // 'label' => __('{{appname}} - Test new widget type'),
			'label' => __('YOUR TAX MAXPLUS AGENT'),
			'modules' => 'ff_taxagents',
			'default_nbr' => 20,
            'option_nbr_name' => '15TAX_app_nbrecordsdash',
			'default_name' => 'AGENT',
        ),
        /* 'latest_emails' => array(
          'type' => 'latests',
          'modules' => 'ff_email_inoutbox',
          'default_nbr' => 20,
          'show_dashboard_link' => true,
          'label' => __('{{appname}} - {{nbr}} latest Emails'),
          ), */

        'taxmodules_activities' => array(
            'type' => 'latests',
            'modules' => 'ff_taxagents,tax_offices',//,ff_taxoffices
            'default_nbr' => 20,
            'option_nbr_name' => '15TAX_app_nbrecordsdash',
            'show_dashboard_link' => true,
            'label' => __('{{appname}} - {{nbr}} latest activities'),
        ),
    ),
    'option_sections' => array(
        array(
            'section_label' => __('App Admin Settings'),
            //'restricted' => array('administrator'),
            'section_description' => __('Admin Settings for your BLUE ORIGAMI MAIL App</br>You are using the Free version, in the free version you would have extra settings, like defining the Application mame etc.'),
            'fields' => array(
                '15TAX_app_name' => array(__('"TAX MAXPLUS AFFILIATES" Display name'), 'html', 'TAX MAXPLUS AFFILIATES', '', 'Available in the pro version. Allow to modify the App display name'),
                '15TAX_app_nbrecordsdash' => array(__('Numbers of Latests Records on main Dashboard'), 'html', 20, '', 'Available in the pro version. Allow to modify the numbers of records to return in the Dashboard for the Latest Activities'),
                '15TAX_app_menuname' => array(__('"TAX MAXPLUS AFFILIATES" Menu name'), 'html', 'TAX MAXPLUS', '', 'Available in the pro version. Allow to modify the App menu name'),
                '15TAX_app_active' => array(__('Enable App?'), 'checkbox', true, '', 'If you disable this, the users not admin will not see this app anymore.'),
            ),
        )
    ),
    'tags' => array(
    ),
    'categories' => array(
      /*  'cat15_emailtpl' => array(
            'name' => __('Email Template Types'),
            'singular_name' => __('Email Template  Type'),
            'menu_name' => __('Email Template  Type'),
            'default_data' => array(
                'slug' => array('none', 'tpltype1'),
                'fr' => array('-None-', 'template type 1'),
                'en' => array('-None-', 'template type 1'),
            ),
        ),*/

    )
    , 'modules' => array(
        'ff_taxagents' => $app_modules["ff_taxagents"]
       , 'ff_taxoffices' => $app_modules["ff_taxoffices"]
    )
);

