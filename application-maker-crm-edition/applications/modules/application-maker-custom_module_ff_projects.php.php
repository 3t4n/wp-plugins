<?php

$app_modules["ff_projects"] = array(
    'slug' => __('projects'),
    'name' => __('Projects'),
    'menu_name' => __('Projects'),
    'singular_name' => __('Project'),
    'icon' => 'box_16.png',
    'exclude_from_search' => true,
    'publicly_queryable' => false,
    /* 'module_columns' => array( 'post_title','assign_to','start_date','status', 'percent_complete', 'account_parent', 'post_date'),
      'module_columns_config' => array(
      'header_a_z' => true,
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
        'filters' => 'account_parent,assign_to,contact_parent,status,percent_complete,project_task_type',
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
                "schema" => "<div class='row_highlight'><span class='row_xxl '>[linkstart]{{field}}[linkend]</span><br/><span class='row_n '>Type: {{project_type}}</span></div>"
            ),
            'assign_to' => array(
                'width' => '10%',
                'ajax_edit' => true,
                'edit_case' => 'dblclick',
                'use_link' => true,
                'link_type' => 'user_profile',
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
                "schema" => "<div class=''><span class='row_n '>Start: {{field}}<br/><span class='row_n '>End: {{end_date}}</span></div>"
            ),
            'end_date' => array(
                'width' => '1%',
            ),
            'potential_amount' => array(
                'column_special_label' => 'Amount',
                'special_label' => 'Amount',
                'width' => '20%',
                "schema" => "<div class=''><span class='row_n '>Amount: {{field}}<br/>Type: {{potential_amount_type}}</span></div>"
            ),
            'status' => array(
                'column_special_label' => 'Status/% Compl.',
                'special_label' => 'Status/Percent Completed',
                'width' => '15%',
                "schema" => "<div class=''><span class='row_n '>Status: {{field}}<br/><span class='row_n '>% completed: {{percent_complete}}%</span></div>"
            ),
            'project_type' => array(
                'width' => '1%',
            ),
            'percent_complete' => array(
                'width' => '10%',
            ),
            'percent_complete' => array(
                'width' => '10%',
            ),
            'post_date' => array(
                'width' => '10%',
            ),
        ),
        'fields_to_load' => 'potential_amount,potential_amount_type,post_title,assign_to,start_date,end_date,account_parent,contact_parent,status,percent_complete,project_type,post_date',
        'columns_initial_list' => 'post_title,assign_to,start_date,account_parent,contact_parent,status,post_date',
        'sortby' => 'post_title,assign_to,start_date,account_parent,contact_parent,status,percent_complete,project_type,post_date',
        'exportfields' => 'post_title,assign_to,start_date,account_parent,contact_parent,status,percent_complete,project_type,post_date',
        'config' => array(
            'header_a_z' => true,
            'use_paging' => true,
        ),
    ),
    'module_new_categories' => array('cat15_projects'),
    'module_tags' => array('tag15_projects'),
    'custom_featured_image' => array(
        'thumb_name' => 'fgl_mini_screen',
        'sizes' => array(
            'fgl_mini_screen' => array(70, 70, true),
            'fgl_small_screen' => array(175, 175, true),
            'fgl_medium_screen' => array(300, 300),
            'fgl_zoom_screen' => array(1000, 1000),
        )/* ,
      'blocks' => array(
      'secondary-image' => _('Second Image'),
      'third-image' => _('Third Image'),
      'fourth-image' => _('Fourth Image'),
      'fifth-image' => _('Fifth Image')
      ) */
    ),
    'metaboxes' => array(
        /* 'quickadd' => array(
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
          array('quick_add_taskproj'),
          array('quick_add_milestone'),
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
          ), */
        'team_notif' => array(
            'title' => __('Add Related / Teams / Categories'),
            'context' => 'side',
            'priority' => 'high',
            'positioning' => array(
                'main' => array(
                    array('project_addrelated'),
                ),
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
        'project_information' => array(
            'title' => __('Project Information'),
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
                        'status', 'percent_complete'
                    ),
                ),
                'tabs' => array(
                    'tab_1' => array(
                        'label' => 'Project Settings',
                        'items' => array(
                            array(
                                'ref_id', 'project_type', 'set_privacy'
                            ),
                            array(
                                'account_parent', 'contact_parent'
                            ),
                            array(
                                'start_date',
                                'end_date'
                            ),
                            array(
                                'potential_amount', 'potential_amount_type'
                            ),
                            array(
                                'created_by', 'created_date', 'modified_date'
                            ),
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
                    'tab_5b' => array(
                        'label' => 'Project Tasks',
                        'items' => array(
                            array('ff_project_child_tasks')//ff_potential_child_tasks
                        )
                    ),
                    'tab_5i' => array(
                        'label' => 'Milestones',
                        'items' => array(
                            array('ff_project_child_milestones')//ff_potential_child_tasks
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
    /* , 'portfolio_information' => array(
      'title' => __('Portfolio Information'),
      'context' => 'advanced',
      'priority' => 'high',
      'positioning' => array(
      'main' => array(
      ),
      'tabs' => array(
      'tab_portfolio' => array(
      'label' => 'Infos Portfolio',
      'items' => array(
      array(
      'project_show_on_site',
      'project_push_home', 'private_on_site'
      ),
      array(
      'full_description_simple'
      ),
      array(
      'project_tech',
      ),
      array(
      'demo_url', 'end_url',
      ),
      )
      ),
      'tab_2' => array(
      'label' => 'Images Portfolio',
      'items' => array(
      array('screenshots_upload'),
      )
      ),
      )
      )
      ) */
    )
);

