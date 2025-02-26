<?php

$custom_applications["15MAIL"] = array(
    'name' => __('15MAIL'),
    //'active' => true,
    'show_home_credit' => true,
    'menuname' => __('ORIGAMI MAIL.'),
    'option_isactive_name' => '15MAIL_app_active',
    'singular_name' => __('BLUE ORIGAMI MAIL & Newsletters'), //Mail Box &
    'intro_page_text' => __('BLUE ORIGAMI MAIL & Newsletters'), //Mail Box &
    'options_form' => 'apm-crmhome-options',
    'intro_homefooter_text' => __('If you want to follow up what  is happening around BLUE ORIGAMI CRM, please visit our minisite <a href="http://apmcrm2013.weproduceweb.com/">http://apmcrm2013.weproduceweb.com/</a>'),
    'intro_home_text' => __('<h4>Welcome to BLUE ORIGAMI MAIL Home page</h4>
        BLUE ORIGAMI MAIL is one of the App provided by 15 APM, you can find the other Apps below and in the main Wordpress left menu.
        </br>YOU ARE USING THE FREE VERSION OF BLUE ORIGAMI CRM (Formerly APM CPM).
           <p> The PRO Version based on this Free version has been stopped but the Free version will continue to have small improvement.
        <a href=\'http://apmcrm2013.weproduceweb.com/\' target="_blank" >More Infos</a>.
        And a full new BLUE ORIGAMI PRO totally rebuild from zero to be much much better is in progress for maybe middle 2014.
        <a href=\'http://apmcrm2013.weproduceweb.com/blue_origami_crm_pro\' target="_blank" >PRO VERSION</a>.
    </p>
        </br>BLUE ORIGAMI MAIL provide to you some features of a mail client, associated with the CRM Contacts, Leads and Accounts.
        <br/>Discover the MODULES list below.</br>Please define your specific BLUE ORIGAMI MAIL settings in the tab "Settings" (the Free version has limited Settings).
        </br>You can also in the other tabs, manage the categories and tags.'),
    'widgets' => array(
        'mailmodules_list' => array(
            'type' => 'list_modules',
            'dashboard_type' => 'default',
            'show_dashboard_link' => true,
            'label' => __('{{appname}} - Modules'),
            'roles_authorized' => 'commercial_direction',
        ),
        'mailmodules_list_sales' => array(
            'type' => 'list_modules',
            'dashboard_type' => 'default',
            'modules' => 'ff_email_newsletter,ff_email_mailinglist',
            'show_dashboard_link' => true,
            'label' => __('{{appname}} - Sales Modules'),
            'hide_admin' => true,
            'roles_authorized' => 'sales',
        ),
    /*  'maillatest_activities' => array(
      'type' => 'latests',
      'modules' => 'ff_email_newsletter,ff_email_mailinglist,ff_email_template',
      'default_nbr' => 20,
      'option_nbr_name' => '15MAIL_app_nbrecordsdash',
      'show_dashboard_link' => true,
      'label' => __('{{appname}} - {{nbr}} latest activities'),
      ), */
    ),
    'option_sections' => array(
        array(
            'section_label' => __('App Admin Settings'),
            //'restricted' => array('administrator'),
            'section_description' => __('Admin Settings for your BLUE ORIGAMI MAIL App</br>You are using the Free version, in the free version you would have extra settings, like defining the Application mame etc.'),
            'fields' => array(
                '15MAIL_app_name' => array(__('"BLUE ORIGAMI MAIL & Newsletter" Display name'), 'html', 'BLUE ORIGAMI MAIL & Newsletter', '', 'Available in the pro version. Allow to modify the App display name'),
                '15MAIL_app_nbrecordsdash' => array(__('Numbers of Latests Records on main Dashboard'), 'html', 20, '', 'Available in the pro version. Allow to modify the numbers of records to return in the Dashboard for the Latest Activities'),
                '15MAIL_app_menuname' => array(__('"BLUE ORIGAMI MAIL & Newsletter" Menu name'), 'html', 'ORIGAMI MAIL', '', 'Available in the pro version. Allow to modify the App menu name'),
                '15MAIL_app_active' => array(__('Enable App?'), 'checkbox', true, '', 'If you disable this, the users not admin will not see this app anymore.'),
            ),
        )
    ),
    'tags' => array(
    ),
    'categories' => array(
        'cat15_emailtpl' => array(
            'name' => __('Email Template Types'),
            'singular_name' => __('Email Template  Type'),
            'menu_name' => __('Email Template  Type'),
            'default_data' => array(
                'slug' => array('none', 'tpltype1'),
                'fr' => array('-None-', 'template type 1'),
                'en' => array('-None-', 'template type 1'),
            ),
        ),
        'cat15_newsletter_status' => array(
            'name' => __('Newsletter Status'),
            'singular_name' => __('Newsletter Status'),
            'menu_name' => __('Newsletter Status'),
            'default_data' => array(
                'slug' => array('draft', 'sent', 'confirmed_received', 'positive_reaction', 'negative_reaction', 'to_follow_up'),
                'fr' => array('Draft', 'Sent', 'Confirmed received', 'Positive reaction', 'Negative reaction', 'To follow up'),
                'en' => array('Draft', 'Sent', 'Confirmed received', 'Positive reaction', 'Negative reaction', 'To follow up'),
            ),
        ),
        'cat15_emailtpl_privacy' => array(
            'name' => __('Template Privacy'),
            'singular_name' => __('TemplatePrivacy'),
            'menu_name' => __('TemplatePrivacy'),
            'default_data' => array(
                'slug' => array('none', 'private', 'shared', 'public'),
                'fr' => array('None', 'Private (for me only)', 'Shared (for me and the assignee)', 'Public'),
                'en' => array('None', 'Private (for me only)', 'Shared (for me and the assignee)', 'Public'),
            ),
        ),
        'cat15_newsletters' => array(
            'name' => __('Newsletters categories'),
            'singular_name' => __('Newsletters category'),
            'menu_name' => __('Newsletters categories')
        ),
        'cat15_mailinglist' => array(
            'name' => __('Mailing List categories'),
            'singular_name' => __('Mailing List category'),
            'menu_name' => __('Mailing List categories')
        ),
        'cat15_emailfolders' => array(
            'name' => __('Email folders'),
            'singular_name' => __('Email folder'),
            'menu_name' => __('Email folders')
        ),
    )
    , 'modules' => array(
        'ff_email_newsletter' => $app_modules["ff_email_newsletter"]
        , 'ff_email_mailinglist' => $app_modules["ff_email_mailinglist"]
        , 'ff_email_template' => $app_modules["ff_email_template"]
    )
);

