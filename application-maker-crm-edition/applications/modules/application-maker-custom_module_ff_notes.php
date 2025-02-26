<?php

$app_modules["ff_notes"] = array(
    'slug' => __('notes'),
    'name' => __('Notes'),
    'menu_name' => __('Notes'),
    'singular_name' => __('Note'),
    'icon' => 'document_pencil_16.png',
    'exclude_from_search' => true,
    'publicly_queryable' => false,
    'is_secundary' => true,
    /* 'module_columns_sortby' => array('post_title', 'assign_to', 'account_parent', 'contact_parent', 'post_date'),
      'module_columns' => array('post_title', 'assign_to', 'account_parent', 'contact_parent', 'post_date'),
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
        'filters' => 'account_parent,assign_to,contact_parent,potential_parent,post_date',
        'privacy_nonadmin' => array(
            'field' => 'set_privacy'
        ),
        'exportfields' => 'post_title,assign_to,account_parent,contact_parent,potential_parent,post_date',
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
            'post_date' => array(
                'width' => '15%'
            ),
        ),
        'fields_to_load' => 'post_title,assign_to,account_parent,contact_parent,post_date',
        'columns_initial_list' => 'post_title,assign_to,account_parent,contact_parent,post_date',
        'sortby' => 'post_title,assign_to,account_parent,contact_parent,post_date',
        'sortDir' => 'ASC',
        'config' => array(
            'header_a_z' => true,
            'use_paging' => true,
            'default_nb_by_page' => 10,
        ),
    ),
    'module_dashboard_widgets' => array(
    ),
    'module_new_categories' => array('cat15_notes'),
    'module_tags' => array('tag15_crm'),
    'metaboxes' => array(
        'account_team_notif' => array(
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
        'notenformation' => array(
            'title' => __('Note Information'),
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

