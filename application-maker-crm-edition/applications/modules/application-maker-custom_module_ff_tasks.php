<?php

$app_modules["ff_tasks"] = array(
    'slug' => __('tasks'),
    'name' => __('Tasks'),
    'menu_name' => __('Tasks'),
    'singular_name' => __('Task'),
    'icon' => 'clipboard_16.png',
    'exclude_from_search' => true,
    'publicly_queryable' => false,
    'is_secundary' => true,
    'migrate_fields_list' => array(
        'priority,ff_priority',
        'status,ff_task_status',
        'percent_complete,ff_percent_complete',
        'task_type,ff_task_type'
    ),
    /* 'module_columns_sortby' => array('post_title', 'assign_to', 'start_date', 'due_date', 'account_parent_short', 'contact_parent', 'potential_parent', 'priority', 'status', 'percent_complete', 'task_type', 'post_date'),
      'module_columns' => array('post_title', 'assign_to', 'start_date', 'due_date', 'account_parent_short', 'contact_parent', 'potential_parent', 'priority', 'status', 'percent_complete', 'task_type', 'post_date'),
      'module_columns_filters' => array('account_parent_short', 'assign_to', 'contact_parent', 'potential_parent', 'priority', 'status', 'percent_complete', 'task_type'),
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
        'filters' => 'account_parent_short,assign_to,contact_parent,potential_parent,priority,status,percent_complete,task_type',
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
                "schema" => "<div class='row_highlight'><span class='row_xxl '>[linkstart]{{field}}[linkend]</span><br/><span class='row_n '>Type: {{task_type}}</span></div>"
            ),
            'assign_to' => array(
                'width' => '10%',
                'ajax_edit' => true,
                'edit_case' => 'dblclick',
                'use_link' => true,
                'link_type' => 'user_profile',
            ),
            'potential_parent' => array(
                'link_type' => 'edit_other_post',
                'use_link' => true,
                'width' => '10%',
            ),
            'account_parent_short' => array(
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
                'column_special_label' => 'Start/end/due',
                'special_label' => 'Start/end/due Date',
                'width' => '20%',
                "schema" => "<div class=''><span class='row_n '>Start: {{field}}</span><br/><span class='row_n '>End: {{end_date}}</span><br/><span class='row_n '>Due: {{due_date}}</span></div>"
            ),
            'due_date' => array(
                'width' => '10%',
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
            'task_type' => array(
                'width' => '10%',
            ),
            'percent_complete' => array(
                'width' => '10%',
            ),
            'post_date' => array(
                'width' => '10%',
            ),
        ),
        'fields_to_load' => 'post_title,assign_to,start_date,due_date,end_date,account_parent_short,contact_parent,potential_parent,priority,status,percent_complete,task_type,post_date',
        'columns_initial_list' => 'post_title,assign_to,account_parent_short,contact_parent,potential_parent,start_date,priority,post_date',
        'sortby' => 'post_title,assign_to,start_date,due_date,account_parent_short,contact_parent,potential_parent,priority,status,post_date',
        'exportfields' => 'post_title,ref_id,assign_to,start_date,due_date,end_date,account_parent_short,contact_parent,potential_parent,priority,status,percent_complete,task_type,post_date',
        'config' => array(
            'header_a_z' => true,
            'use_paging' => true,
        ),
    ),
    'module_dashboard_widgets' => array(
    ),
    'module_new_categories' => array('cat15_tasks'),
    //'module_categories' => array('cat15_tasks'),
    'module_tags' => array('tag15_crm'),
    'metaboxes' => array(
        'team_notif' => array(
            'title' => __('Teams / Categories'),
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
        'tasks_infos' => array(
            'title' => __('Task Information'),
            'context' => 'advanced',
            'priority' => 'high',
            'positioning' => array(
                'topbar' => array(
                    'special' => array('completed_task_action', '-', 'assign_to',),
                    'common' => array(
                        'delete_action' => true,
                        'status_action' => true,
                        'save_action' => true,)
                ),
                'main' => array(
                    array(
                        'status', 'percent_complete'
                    ),
                    array(
                        'task_type', 'priority'
                    ),
                    array(
                        'start_date', 'end_date', 'due_date'
                    ),
                    array(
                        'crm_recurring'
                    ),
                    array('descrip_label'),
                    array('full_description')
                ),
                'tabs' => array(
                    'tabaa' => array(
                        'label' => 'Related to',
                        'items' => array(
                            array(
                                'account_parent_short', 'contact_parent'
                            ),
                            array(
                                'lead_parent', 'potential_parent'
                            ),
                            array(
                                'ref_id', 'set_privacy'
                            ),
                            array(
                                'created_by', 'created_date', 'modified_date'
                            ),
                            array(
                                ''
                            ),
                        )
                    ),
                    'taba' => array(
                        'label' => 'Comments',
                        'items' => array(
                            array('comments_label'),
                            array('comments'),
                        )
                    ),
                    'tabc' => array(
                        'label' => 'Files',
                        'items' => array(
                            array('files_upload'),
                        )
                    )
                )
            )
        ),
    )
);

