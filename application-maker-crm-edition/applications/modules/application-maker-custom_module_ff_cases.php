<?php

$app_modules["ff_cases"] = array(
    'slug' => __('cases'),
    'name' => __('Support Cases'),
    'menu_name' => __('Support'),
    'singular_name' => __('Support Case'),
    'icon' => 'bug_16.png',
    'exclude_from_search' => true,
    'publicly_queryable' => false,
    'migrate_fields_list' => array(
        'case_status,ff_case_status',
        'priority,ff_priority',
    ),
    /* 'module_columns_sortby' => array('post_title', 'assign_to', 'account_parent', 'contact_parent', 'priority', 'case_status', 'case_type', 'post_date'),
      'module_columns' => array('post_title', 'assign_to', 'account_parent', 'contact_parent', 'priority', 'case_status', 'case_type', 'post_date'),
      'module_columns_filters' => array('account_parent', 'assign_to', 'contact_parent', 'priority', 'case_status', 'case_type'),
      'module_columns_config' => array(
      'grid_type' => 'ajax_data',
      'use_paging' => true,
      'use_global_default_paging_nb' => true, //THIS MUST BE SET IN GENERAL OPTION, with option 'default_paging_nb'
      //'nb_by_page'=>20, //To FORCE A SPECIFIC PAGING NB FOR THIS MODULE. WILL OVERHIDE THE use_global_default_paging_nb NB
      'user_can_change_paging_nb_by_module' => true,
      ), */
    'module_dashboard_widgets' => array(
    ),
    'module_editform' => array(
        'use_previewbtn' => false
    ),
    'module_datagrid' => array(
        'filters' => 'account_parent,assign_to,contact_parent,priority,case_status,case_type',
        'privacy_nonadmin' => array(
            'field' => 'set_privacy'
        ),
        'exportfields' => 'post_title,assign_to,account_parent,contact_parent,priority,case_status,case_type,post_date',
        'columns_definition' => array(
            'post_title' => array(
                'width' => '33%',
                'use_link' => true,
                'link_type' => 'edit_post',
                'ajax_edit' => true,
                'edit_case' => 'dblclick',
                "schema" => "<div class='row_highlight'><span class='row_xxl '>[linkstart]{{field}}[linkend]</span></div>"
            ),
            'assign_to' => array(
                'width' => '15%',
                'ajax_edit' => true,
                'edit_case' => 'dblclick',
                'use_link' => true,
                'link_type' => 'user_profile',
            ),
            'account_parent' => array(
                'link_type' => 'edit_other_post',
                'use_link' => true,
                'width' => '20%',
            ),
            'contact_parent' => array(
                'link_type' => 'edit_other_post',
                'use_link' => true,
                'width' => '20%',
            ),
            'priority' => array(
                'width' => '10%',
            ),
            'case_status' => array(//case_type
                'column_special_label' => 'Status/Type',
                'special_label' => 'Status/Type',
                'width' => '25%',
                "schema" => "<div class='row_highlight'><span class='row_small'>Status: {{case_status}}</span><br/><span class='row_small'>Type: {{case_type}}</span></div>"
            ),
            'case_type' => array(
                'width' => '10%',
            ),
            'post_date' => array(
                'width' => '10%',
            ),
        ),
        'fields_to_load' => 'post_title,assign_to,account_parent,contact_parent,priority,case_status,case_type,post_date',
        'columns_initial_list' => 'post_title,assign_to,account_parent,contact_parent,priority,case_status,post_date',
        'sortby' => 'post_title,assign_to,account_parent,contact_parent,priority,case_status,case_type,post_date',
        'config' => array(
            'header_a_z' => true,
            'use_paging' => true,
        ),
    ),
    'module_new_categories' => array('cat15_cases'),
    // 'module_categories' => array('cat15_cases'),
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
        'case_information' => array(
            'title' => __('Case Information'),
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
                        'case_type', 'case_status'
                    ),
                    array(
                        'priority'
                    ),
                    array('full_description')
                ),
                'tabs' => array(
                    'tab_111' => array(
                        'label' => 'Related To',
                        'items' => array(
                            array(
                                'account_parent', 'contact_parent'
                            ),
                            array(
                                'lead_parent'
                            ),
                            array(
                                'ref_id', 'set_privacy'
                            ),
                            array(
                                'created_by', 'created_date', 'modified_date'
                            )
                        )
                    ),
                    'tab_11' => array(
                        'label' => 'Comments',
                        'items' => array(
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

