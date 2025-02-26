<?php

$app_modules["ff_proj_milest"] = array(
    'slug' => __('project_milestones'),
    'name' => __('Project Milestones'),
    'menu_name' => __('Milestones'),
    'singular_name' => __('Project Milestone'),
    'icon' => 'clipboard_16.png',
    'exclude_from_search' => true,
    'publicly_queryable' => false,
    'migrate_fields_list' => array(
        'priority,ff_priority',
        'status,ff_task_status',
        'percent_complete,ff_percent_complete',
    ),
    /* 'module_columns_sortby' => array('post_title', 'assign_to', 'start_date', 'due_date', 'account_parent', 'contact_parent', 'project_parent', 'priority', 'status', 'percent_complete', 'post_date'),
      'module_columns' => array('post_title', 'assign_to', 'start_date', 'due_date', 'project_parent', 'account_parent', 'contact_parent', 'priority', 'status', 'percent_complete', 'post_date'),
      'module_columns_filters' => array('account_parent', 'assign_to', 'contact_parent', 'project_parent', 'priority', 'status', 'percent_complete'),
      'module_columns_config' => array(
      'grid_type' => 'ajax_data',
      'use_paging' => true,
      'use_global_default_paging_nb' => true, //THIS MUST BE SET IN GENERAL OPTION, with option 'default_paging_nb'
      //'nb_by_page'=>20, //To FORCE A SPECIFIC PAGING NB FOR THIS MODULE. WILL OVERHIDE THE use_global_default_paging_nb NB
      'user_can_change_paging_nb_by_module' => true,
      ), */
    'module_editform' => array(
        'use_previewbtn' => false
    ),
    'module_datagrid' => array(
        'filters' => 'account_parent,assign_to,contact_parent,project_parent,priority,status,percent_complete,project_task_type',
        'privacy_nonadmin' => array(
            'field' => 'set_privacy'
        ),
        'columns_definition' => array(
            'post_title' => array(
                'width' => '25%',
                'use_link' => true,
                'link_type' => 'edit_post',
                'ajax_edit' => true,
                'edit_case' => 'dblclick',
                "schema" => "<div class='row_highlight'><span class='row_xxl '>[linkstart]{{field}}[linkend]</span><br/><span class='row_n '>Type: {{project_task_type}}</span></div>"
            ),
            'assign_to' => array(
                'width' => '10%',
                'ajax_edit' => true,
                'edit_case' => 'dblclick',
                'use_link' => true,
                'link_type' => 'user_profile',
            ),
            'project_parent' => array(
                'link_type' => 'edit_other_post',
                'use_link' => true,
                'width' => '10%',
            ),
            'account_parent' => array(
                'link_type' => 'edit_other_post',
                'use_link' => true,
                'width' => '10%',
            ),
            'contact_parent' => array(
                'link_type' => 'edit_other_post',
                'use_link' => true,
                'width' => '10%',
            ),
            'start_date' => array(
                'column_special_label' => 'Dates',
                'special_label' => 'Dates',
                'width' => '20%',
                "schema" => "<div class=''><span class='row_n '>Start: {{field}}<br/>Due: {{due_date}}</span><br/><span class='row_n '>End: {{end_date}}</span></div>"
            ),
            'due_date' => array(
                'width' => '1%',
            ),
            'end_date' => array(
                'width' => '1%',
            ),
            'priority' => array(
                'column_special_label' => 'Prio/Status/% Compl.',
                'special_label' => 'Priority/Status/Percent Completed',
                'width' => '20%',
                "schema" => "<div class=''><span class='row_n '>Prio: {{field}}<br/>Status: {{status}}</span><br/><span class='row_n '>% completed: {{percent_complete}}%</span></div>"
            ),
            'status' => array(
                'width' => '15%',
            ),
            'project_task_type' => array(
                'width' => '1%',
            ),
            'percent_complete' => array(
                'width' => '10%',
            ),
            'post_date' => array(
                'width' => '10%',
            ),
        ),
        'fields_to_load' => 'post_title,assign_to,start_date,due_date,end_date,account_parent,contact_parent,project_parent,priority,status,percent_complete,project_task_type,post_date',
        'columns_initial_list' => 'post_title,project_parent,assign_to,start_date,account_parent,contact_parent,priority,post_date',
        'sortby' => 'post_title,assign_to,start_date,due_date,account_parent,contact_parent,project_parent,priority,status,percent_complete,project_task_type,post_date',
        'exportfields' => 'post_title,assign_to,start_date,due_date,account_parent,contact_parent,project_parent,priority,status,percent_complete,project_task_type,post_date',
        'config' => array(
            'header_a_z' => true,
            'use_paging' => true,
        ),
    ),
    'module_dashboard_widgets' => array(
    ),
    'module_new_categories' => array('cat15_milestones'),
    'module_tags' => array('tag15_projects'),
    'metaboxes' => array(
        /*'quickadd' => array(
            'title' => __('Quick Add'), // & tags
            'context' => 'side',
            'priority' => 'high',
            'positioning' => array(
                'main' => array(
                ),
                'tabs' => array(
                    'tablone' => array(
                        'label' => 'Quick add',
                        'items' => array(
                            array('quick_add_event'),
                            array('quick_add_note'),
                        )
                    )
                /* ,'tabltwo' => array(
                  'label'=>'tags',
                  'items'=>array(
                  array('tags_list'),
                  )
                  ),
                )
            )
        ),*/
        'team_notif' => array(
            'title' => __('Teams & Categories'),
            'context' => 'side',
            'priority' => 'high',
            'positioning' => array(
                /* 'main' => array(
                  array('assign_to'),
                  ), */

                'tabs' => array(
                    'tabltwo' => array(
                        'label' => 'Team & Notifications',
                        'items' => array(
                            array('team_assignments'),
                        )
                    ),
                    'tablone' => array(
                        'label' => 'Categories',
                        'items' => array(
                            array('categories_list'),
                        )
                    )
                )
            )
        ),
        'milestone_information' => array(
            'title' => __('Milestone Information'),
            'context' => 'advanced',
            'priority' => 'high',
            'positioning' => array(
                'topbar' => array(
                    'special' => array('assign_to'),
                    'common' => array(
                        'delete_action' => true,
                        'status_action' => true,
                        'save_action' => true,)
                ),
                'main' => array(
                    array(
                        'project_parent'
                    ),
                    array(
                        'start_date', 'due_date', 'end_date'
                    ),
                ),
                'tabs' => array(
                    'tab_1' => array(
                        'label' => 'Settings',
                        'items' => array(
                            array(
                                'ref_id', 'set_privacy'
                            ),
                            array(
                                'priority', 'status'
                            ),
                            array(
                                'percent_complete'//ff_proj_tsk_type
                            ),
                            array(
                                'account_parent', 'contact_parent'
                            ),
                            array(
                                'created_by', 'created_date', 'modified_date'
                            )
                        )
                    ),
                    'tab_2' => array(
                        'label' => 'Description & Comments',
                        'items' => array(
                            array('descrip_label'),
                            array('full_description'),
                            array('comments_label'),
                            array('comments'),
                        )
                    ),
                    'tab_10' => array(
                        'label' => 'Files',
                        'items' => array(
                            array('files_upload'),
                        )
                    )
                )
            )
        )
    )
);

