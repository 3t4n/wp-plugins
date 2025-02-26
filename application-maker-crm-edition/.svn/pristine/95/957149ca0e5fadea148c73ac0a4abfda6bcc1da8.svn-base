<?php

$custom_applications["15Projects"] = array(
    'name' => __('15Projects'),
   // 'active' => true,
    'show_home_credit' => true,
    'menuname' => __('ORIGAMI PROJECTS'),
    'option_isactive_name' => '15Projects_app_active',
    'singular_name' => __('ORIGAMI PROJECTS'),
    'intro_page_text' => __('ORIGAMI PROJECTS'),
    'options_form' => 'apm-crmhome-options',
    'intro_homefooter_text' => __('If you want to follow up what  is happening around 15CRM, please visit our minisite <a href="http://apmcrm2013.weproduceweb.com/">http://apmcrm2013.weproduceweb.com/</a>'),
    'intro_home_text' => __('<h4>Welcome to {{appname}} Home page</h4>
        {{appname}} is one of the App provided by 15 APM, you can find the other Apps below and in the main Wordpress left menu.
        </br>{{appname}} provide to you some of the features of a classic simple Project Management System. Still in it\'s early stage, this App and it\'s modules will be improved soon.
        <br/>Discover the MODULES list below.</br>Please define your specific {{appname}} settings in the tab "Settings".
        </br>You can also in the other tabs, manage the categories and tags.'),

    'option_sections' => array(
        array(
            'section_label' => __('App Admin Settings'),
           // 'restricted' => array('administrator'),
            'section_description' => __('Admin Settings for your PROJECTS App'),
            'fields' => array(
                '15Projects_app_name' => array(__('PROJECTS Display name'), 'text', 'ORIGAMI PROJECTS','','The name of this app to show on pages'),
                '15Projects_app_menuname' => array(__('PROJECTS Box Menu name'), 'text', 'ORIGAMI PROJECTS','','The name of this app to show on menus'),
                '15Projects_app_active' => array(__('Enable App?'), 'checkbox', true,'','If you disable this, the users not admin will not see this app anymore.'),
             ),
        )
    ),
    'tags' => array(
        'tag15_projects' => array(
            'name' => __('Projects tags'),
            'singular_name' => __('Projects tag'),
            'menu_name' => __('Projects tags')
        ),
    ),
    'categories' => array(
        'cat15_project_task_type' => array(
            'name' => __('Project Task Types'),
            'singular_name' => __('Project Task Type'),
            'menu_name' => __('Project Task Types')
        ),
        'cat15_projects' => array(
            'name' => __('Projects categories'),
            'singular_name' => __('Projects category'),
            'menu_name' => __('Projects categories')
        ),
        'cat15_projtasks' => array(
            'name' => __('Project Tasks categories'),
            'singular_name' => __('Project Tasks category'),
            'menu_name' => __('Project Tasks categories')
        ),
        'cat15_milestones' => array(
            'name' => __('Milestones categories'),
            'singular_name' => __('Milestones category'),
            'menu_name' => __('Milestones categories')
        ),
    )
    , 'modules' => array(
        'ff_projects' => $app_modules["ff_projects"],
        'ff_project_tasks' => $app_modules["ff_project_tasks"],
        'ff_proj_milest' => $app_modules["ff_proj_milest"]
    )
);


