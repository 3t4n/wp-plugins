<?php

$app_modules["ff_potentials"] = array(
    'slug' => __('potentials'),
    'name' => __('Potentials'),
    'menu_name' => __('Potentials'),
    'singular_name' => __('Potential'),
    'roles_authorized' => 'sales,commercial_direction',
    'icon' => 'piggy_bank_16.png',
    'exclude_from_search' => true,
    'publicly_queryable' => false,
    'migrate_fields_list' => array(
        'potential_amount_type,ff_potent_amnt_type',
        'potential_stage,ff_potential_stage'
        , 'potential_type,ff_potential_type'
    ),
    /* 'module_columns' => array('post_title', 'assign_to', 'potential_amount', 'account_parent', 'contact_parent', 'potential_closing_date', 'potential_stage', 'potential_type', 'potential_proba', 'potential_amount_type', 'post_date'),
      'module_columns_filters' => array('account_parent', 'assign_to', 'contact_parent', 'potential_stage', 'potential_type', 'potential_amount_type'),
      'module_columns_sortby' => array('post_title', 'assign_to', 'potential_amount', 'account_parent', 'contact_parent', 'potential_stage', 'potential_type', 'potential_proba', 'potential_amount_type', 'post_date'),
      'module_datagrid_special_action' => array(
      'do_export' => array(
      'label' => 'Export to Csv',
      'icon_css' => 'apm_export_csv', //'potential_proba','lead_source','potential_expected_revenue''potential_next_step','potential_won_date'
      'fields' => 'post_title,ref_id,account_parent,contact_parent,assign_to,potential_amount,potential_type,potential_stage,potential_proba,potential_amount_type,potential_expected_revenue,potential_next_step,lead_source,potential_won_date,post_date',

      'tooltip' => 'This will export in csv all the records currenlty filter by search, or all records if no search (dont need to select records...)'
      ),
      ),
      'module_columns_config' => array(
      'grid_type' => 'ajax_data',
      'use_paging' => true,
      'use_global_default_paging_nb' => true, //THIS MUST BE SET IN GENERAL OPTION, with option 'default_paging_nb'
      //'nb_by_page'=>20, //To FORCE A SPECIFIC PAGING NB FOR THIS MODULE. WILL OVERHIDE THE use_global_default_paging_nb NB
      'user_can_change_paging_nb_by_module' => true,
      ), // */

    'module_editform' => array(
        'use_previewbtn' => false
    ),
    'module_datagrid' => array(
        'filters' => 'account_parent,assign_to,contact_parent,potential_stage,potential_type,potential_amount_type,potential_proba,lead_source',
        'privacy_nonadmin' => array(
            'field' => 'set_privacy'
        ),
        'exportfields' =>'post_title,ref_id,account_parent,contact_parent,assign_to,potential_amount,potential_type,potential_stage,potential_proba,potential_amount_type,potential_expected_revenue,potential_next_step,lead_source,potential_won_date,post_date',
        'columns_definition' => array(
            'post_title' => array(
                'width' => '25%',
                'use_link' => true,
                'link_type' => 'edit_post',
                'ajax_edit' => true,
                'edit_case' => 'dblclick',
                "schema" => "<div class='row_highlight'><span class='row_xxl '>[linkstart]{{field}}[linkend]</span><br/><span class='row_small '>Type: {{potential_type}}</span></div>"
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
                'width' => '15%',
            ),
            'potential_amount' => array(
                'column_special_label' => 'Potential',
                'special_label' => 'Potential',
                'width' => '15%', //,potential_proba,potential_amount_type
                "schema" => "<div class='row_highlight'><span class='row_small '>Amount: {{field}}{{currency}}</span><br/><span class='row_small '>Expect. Revenue: {{potential_expected_revenue}}{{currency}}</span></div>"
            ),
            'contact_parent' => array(
                'link_type' => 'edit_other_post',
                'use_link' => true,
                'width' => '15%',
            ),
            'potential_closing_date' => array(
                'width' => '10%',
            ),
            'potential_stage' => array(
                'width' => '15%',
                "schema" => "<div class='row_highlight'><span class='row_small '>{{field}}</span><br/><span class='row_small '>Closing: {{potential_closing_date}}</span></div>"
            ),
            'potential_type' => array(
                'width' => '10%',
            ),
            'potential_proba' => array(
                'column_special_label' => 'Type/Prob./Source',
                'special_label' => 'Type/Probability/Source',
                "schema" => "<div class='row_highlight'><span class='row_small '>Type: {{potential_amount_type}} | Prob: {{field}}%</span><br/><span class='row_small '>Source: {{lead_source}}</span></div>"
          ,  'width' => '20%',
            ),
            'potential_amount_type' => array(
                'width' => '15%',
            ),
            'post_date' => array(
                'width' => '10%',
            ),
        ),
        'fields_to_load' => 'post_title,lead_source,assign_to,potential_amount,account_parent,contact_parent,potential_closing_date,potential_stage,potential_expected_revenue,potential_type,potential_proba,potential_amount_type,post_date',
        'columns_initial_list' => 'post_title,assign_to,account_parent,contact_parent,potential_stage,potential_proba,potential_amount,post_date',
        'sortby' => 'post_title,assign_to,potential_amount,account_parent,contact_parent,potential_stage,potential_type,potential_proba,potential_amount_type,post_date',
        'config' => array(
            'header_a_z' => true,
            'use_paging' => true,
        ),
    ),
    'module_dashboard_widgets' => array(
    ),
    'module_new_categories' => array('cat15_potentials'),
    //'module_categories' => array('cat15_potentials'),
    'module_tags' => array('tag15_crm'),
    'relation_notif_config' => array(
        'notifications_model' => array(
        ),
        'team_model' => array(
            'get_parent_team' => true,
            'force_get_parent_team' => false,
            'cascade_child_team' => true,
            'force_child_team' => false,
        ),
        'relationships' => array(
            'parent' => array(//many to one
                'ff_accounts' => array(
                )
            ),
            'childs' => array(//one to many
            ),
            'related' => array(//many to many
            ),
        ),
    ),
    'metaboxes' => array(
       /* 'quickadd' => array(
            'title' => __('Quick Add'),
            'context' => 'side',
            'priority' => 'high',
            'positioning' => array(
                'main' => array(
                ),
                'tabs' => array(
                    'tab_l0' => array(
                        'label' => 'Quick add',
                        'items' => array(
                            array('quick_add_task'),
                            array('quick_add_event'),
                            array('quick_add_call'),
                            array('quick_add_note'),
                        )
                    )
                )
            )
        ),*/
        'team_notif' => array(
            'title' => __('Add Related / Teams / Categories'),
            'context' => 'side',
            'priority' => 'high',
            'positioning' => array(
                 'main' => array(
                  array('potential_addrelated'),
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
        'potentials_information' => array(
            'title' => __('Potential Information'),
            'context' => 'advanced',
            'priority' => 'high',
            'positioning' => array(
                'topbar' => array(
                    'special' => array('win_potential', 'lost_potential', 'convert_potential_to_project', '-', 'assign_to'),
                    'common' => array(
                        'delete_action' => true,
                        'status_action' => true,
                        'save_action' => true,)
                ),
                'main' => array(
                    array(
                        'ref_id', 'set_privacy'
                    ),
                    array(
                        'potential_type',
                        'project_type'
                    ),
                    array(
                        'account_parent', 'contact_parent'
                    ),
                    array(
                        'potential_proba', 'lead_source'
                    ),
                    array(
                        'potential_closing_date', 'potential_won_date'
                    ),
                    array(
                        'potential_stage', 'potential_next_step'
                    ),
                    array(
                        'created_by', 'created_date', 'modified_date'
                    )
                ),
                'tabs' => array(
                    'tab_1' => array(
                        'label' => 'Amounts',
                        'items' => array(
                            array(
                                'potential_amount', 'potential_amount_type'
                            ),
                            array(
                                'potential_expected_revenue'
                            ),
                        )
                    ),
                    'tab_2' => array(
                        'label' => 'Description',
                        'items' => array(
                            array('full_description'),
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
        , 'childs_items' => array(
            'title' => __('Related Items'),
            'context' => 'advanced',
            'priority' => 'high',
            'positioning' => array(
                'tabs' => array(
                    'tab_5b' => array(
                        'label' => 'Tasks',
                        'items' => array(
                            array('ff_potential_child_tasks')
                        )
                    ),
                    'tab_6b' => array(
                        'label' => 'Events',
                        'items' => array(
                            array('ff_potential_child_events')
                        )
                    ),
                    'tab_7b' => array(
                        'label' => 'Call logs',
                        'items' => array(
                            array('ff_potential_child_calls')
                        )
                    ),
                    'tab_14b' => array(
                        'label' => 'Notes',
                        'items' => array(
                            array('ff_potential_child_notes')
                        )
                    ),
                )
            )
        )
    )
);

