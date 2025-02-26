<?php

$app_modules["ff_call_log"] = array(
    'slug' => __('call_log'),
    'name' => __('Call logs'),
    'menu_name' => __('Call logs'),
    'singular_name' => __('Call log'),
    'icon' => 'phone_16.png',
    'exclude_from_search' => true,
    'publicly_queryable' => false,
    'is_secundary' => true,
    'migrate_fields_list' => array(
        'call_type,ff_call_type',
        'call_from_to,ff_call_from_to',
        'call_purpose,ff_call_purpose',
    ),
    /* 'module_columns_sortby' => array('post_title', 'assign_to', 'account_parent', 'contact_parent', 'start_date', 'call_type', 'call_purpose', 'call_from_to', 'post_date'),
      'module_columns' => array('post_title', 'assign_to', 'account_parent', 'contact_parent', 'start_date', 'call_type', 'call_purpose', 'call_from_to', 'post_date'),
      'module_columns_filters' => array('account_parent', 'assign_to', 'contact_parent', 'potential_parent'),
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
        'filters' => 'account_parent,assign_to,contact_parent,potential_parent,call_type,call_purpose,call_from_to',
        'privacy_nonadmin' => array(
            'field' => 'set_privacy'
        ),
        'exportfields' => 'post_title,assign_to,start_date,start_time,potential_parent,call_type,call_purpose,call_from_to,contact_parent,post_date',
        'columns_definition' => array(
            'post_title' => array(
                'width' => '33%',
                'use_link' => true,
                'link_type' => 'edit_post',
                'ajax_edit' => true,
                'edit_case' => 'dblclick',
                "schema" => "<div class='row_highlight'><span class='row_xxl '>{{field}}</span></div>"
            ),
            'account_parent' => array(
                'link_type' => 'edit_other_post',
                'use_link' => true,
                'width' => '20%',
            ),
            'contact_parent' => array(
                'link_type' => 'edit_other_post',
                'use_link' => true,
                'width' => '15%',
            ),
            'assign_to' => array(
                'width' => '10%',
                'ajax_edit' => true,
                'edit_case' => 'dblclick',
                'use_link' => true,
                'link_type' => 'user_profile',
            ),
            'start_date' => array(
                'column_special_label' => 'Start',
                'special_label' => 'Start date-time',
                'width' => '15%',
                "schema" => "<div class=''><span class='row_xxl '>{{field}}</span><br/><span class='row_n '>{{start_time}}</span></div>"
            ),
            'call_type' => array(
                'width' => '15%'
            ),
            'call_purpose' => array(
                'width' => '15%'
            ),
            'call_from_to' => array(
                'width' => '15%'
            ),
            'post_date' => array(
                'width' => '15%'
            ),
            'start_time' => array(
                'width' => '1%'
            ),
        ),
        'fields_to_load' => 'post_title,start_time,assign_to,account_parent,contact_parent,start_date,call_type,call_purpose,call_from_to,post_date',
        'columns_initial_list' => 'post_title,assign_to,account_parent,contact_parent,start_date,call_type,call_purpose,call_from_to,post_date',
        'sortby' => 'post_title,assign_to,account_parent,contact_parent,start_date,call_type,call_purpose,call_from_to,post_date',
        'sortDir' => 'ASC',
        'config' => array(
            'header_a_z' => true,
            'use_paging' => true,
            'default_nb_by_page' => 10,
        ),
    ),
    'module_dashboard_widgets' => array(
    ),
    'module_new_categories' => array('cat15_call_logs'),
    'module_tags' => array('tag15_crm'),
    'metaboxes' => array(
        'categ_notif' => array(
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
        'callinformation' => array(
            'title' => __('Call Log Information'),
            'context' => 'advanced',
            'priority' => 'high',
            'positioning' => array(
                'topbar' => array(
                    'special' => array('assign_to',),
                    'common' => array(
                        'delete_action' => true,
                        'status_action' => true,
                        'save_action' => true,)
                ),
                'main' => array(
                    array(
                        'call_type', 'call_purpose'
                    ),
                    array(
                        'start_date', 'start_time'
                    ),
                    array(
                        'call_from_to', 'call_duration'
                    ),
                    array(
                        'call_result'
                    ),
                    array('full_description'),
                ),
                'tabs' => array(
                    'tab_2' => array(
                        'label' => 'Related Parents',
                        'items' => array(
                            array(
                                'account_parent', 'contact_parent'
                            ),
                            array(
                                'lead_parent', 'potential_parent'
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

