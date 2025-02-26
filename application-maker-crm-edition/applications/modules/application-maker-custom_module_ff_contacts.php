<?php

$app_modules["ff_contacts"] = array(
    'slug' => __('contacts'),
    'name' => __('Contacts'),
    'menu_name' => __('Contacts'),
    'singular_name' => __('Contact'),
    'icon' => 'user3_16.png',
    'exclude_from_search' => true,
    'publicly_queryable' => false,
    'migrate_fields_list' => array(
        'lead_source,ff_lead_source'
        , 'contact_gender,ff_contact_gender'
    ),
    'module_dashboard_widgets' => array(
    ),
    'module_new_categories' => array('cat15_contacts'),
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
    'module_editform' => array(
        'use_previewbtn' => false
    ),
    'module_datagrid' => array(
        'filters' => 'account_parent,assign_to,parent_city,parent_country,lead_source,post_date',
        'privacy_nonadmin' => array(
            'field' => 'set_privacy'
        ),
        'columns_definition' => array(
            'post_title' => array(
                'width' => '33%',
                'use_link' => true,
                'link_type' => 'edit_post',
                'ajax_edit' => true,
                'edit_case' => 'dblclick',
                "schema" => "<div class='row_highlight'><span class='row_xxl '>[linkstart]{{contact_gender}} {{contact_fistname}} {{contact_lastname}} ({{field}})[linkend]</span><br/><span class='row_n '>Phone: {{phone}} | Email: {{email}}</span></div>"
            ),
            'assign_to' => array(
                'width' => '15%',
                'ajax_edit' => true,
                'edit_case' => 'dblclick',
                'use_link' => true,
                'link_type' => 'user_profile',
            ),
            'parent_country' => array(
                'column_special_label' => 'Country/City',
                'special_label' => 'Country/City',
                'width' => '20%',
                "schema" => "<div class=''><span class='row_m '>Country: {{field}}</span><br/><span class='row_n '>City: {{parent_city}}</span></div>"
            ),
            'account_parent' => array(
                'link_type' => 'edit_other_post',
                'use_link' => true,
                'width' => '20%',
            ),
            'email' => array(
                'width' => '15%',
            ),
            'parent_city' => array(
                'width' => '15%',
            ),
            'post_date' => array(
                'width' => '10%',
            ),
        ),
        'fields_to_load' => 'lead_source,post_title,contact_fistname,contact_lastname,assign_to,account_parent,phone,parent_country,post_date,parent_city,contact_gender,contact_title,email',
        'columns_initial_list' => 'post_title,assign_to,account_parent,parent_country,post_date',
        'fields_quickadd' => 'contact_gender,contact_title,contact_fistname,contact_lastname,email,assign_to,account_parent,phone,lead_source,parent_country,parent_city',
        'sortby' => 'post_title,assign_to,account_parent,email,parent_city,parent_country,post_date',
        'exportfields' => 'post_title,ref_id,assign_to,contact_title,contact_gender,contact_fistname,contact_lastname,contact_nickname,lead_source,account_parent,email,phone,mobile_phone,fax,assistant_phone,contact_skype,contact_msn,contact_report_to,contact_assistant,contact_dept,contact_birth_date,street,state,zipcode,parent_city,parent_country,post_date',
        'config' => array(
            'header_a_z' => true,
            'use_paging' => true,
        ),
    ),
    /* 'module_columns_formatting' => array(
      'post_title' => array(
      "schema" => "<div class='row_highlight'><span class='row_xxl '>{field}</span><br/><span class='row_m '>email: <a href='mailto:[email]'>[email]</a></span></div>"
      ),
      'phone' => array(
      "schema" => "<div class=''><span class='row_n '>{field}</span><br/><span class='row_sm '>Mobile: [mobile_phone]</span></div>"
      ),
      'parent_country' => array(
      "schema" => "<div class=''><span class='row_n '>{field}</span><br/><span class='row_sm '>city: [parent_city]</span></div>"
      ),
      ), */
    // 'module_columns' => array('post_title', 'assign_to', 'account_parent', 'phone', 'parent_country', 'post_date'),
    // 'module_columns_subcontent' => array('email', 'parent_city', 'mobile_phone'),
    // 'module_columns_filters' => array('account_parent', 'assign_to', 'parent_city', 'parent_country', 'lead_source'),
    // 'module_columns_sortby' => array('post_title', 'assign_to', 'account_parent', 'email', 'parent_city', 'parent_country', 'post_date'),
    /* 'module_datagrid_special_action' => array(
      'do_export' => array(
      'label' => 'Export to Csv',
      'action' => 'export_csv',
      'icon_css' => 'apm_export_csv',
      //,'','', ','','''',''
      'fields' => 'post_title,ref_id,assign_to,contact_title,contact_gender,contact_fistname,contact_lastname,contact_nickname,lead_source,account_parent,email,phone,mobile_phone,fax,assistant_phone,contact_skype,contact_msn,contact_report_to,contact_assistant,contact_dept,contact_birth_date,street,state,zipcode,parent_city,parent_country,post_date',
      /* 'sub_entity'=>'users',
      'sub_id_source'=>'locker_user_id',
      'sub_fields'=>'user_email',
      'sub_fields_label'=>'Email', */
    /*   'tooltip' => 'This will export in csv all the records currenlty filter by search, or all records if no search (dont need to select records...)'
      ),
      ), */
    /* 'module_columns_config' => array(
      'header_a_z' => true,
      'grid_type' => 'ajax_data',
      'use_paging' => true,
      'use_global_default_paging_nb' => true, //THIS MUST BE SET IN GENERAL OPTION, with option 'default_paging_nb'
      //'nb_by_page'=>20, //To FORCE A SPECIFIC PAGING NB FOR THIS MODULE. WILL OVERHIDE THE use_global_default_paging_nb NB
      'user_can_change_paging_nb_by_module' => true,
      ), */
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
          array('quick_add_potential'),
          array('quick_add_task'),
          array('quick_add_event'),
          array('quick_add_call'),
          array('quick_add_note'),
          )
          )
          )
          )
          ), */
        'team_notif' => array(
            'title' => __('Add Related / Teams / Categories'),
            'context' => 'side',
            'priority' => 'high',
            'positioning' => array(
                'main' => array(
                // array('contacts_addrelated'),
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
        /* 'categ_tags' => array(
          'title' => __('Categories'), // & tags
          'context' => 'side',
          'priority' => 'high',
          'positioning' => array(
          'main' => array(
          ),
          'tabs' => array(
          'tablone' => array(
          'label' => 'Categories',
          'items' => array(
          array('categories_list'),
          )
          )/* ,'tabltwo' => array(
          'label'=>'tags',
          'items'=>array(
          array('tags_list'),
          )
          ),
          )
          )
          ), */
        'contact_information' => array(
            'title' => __('Contact'),
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
                        'contact_fistname', 'contact_lastname'
                    ),
                    array(
                        'lead_source', 'account_parent'
                    ),
                    array(
                        'email', 'secondary_email', 'perso_email'
                    ),
                    array(
                        'contact_gender', 'contact_nickname'
                    ),
                    array(
                        'contact_title', 'contact_dept',
                    ),
                    array(
                        'ref_id', 'set_privacy'
                    ),
                    array(
                        'created_by', 'created_date', 'modified_date', 'contact_set_title'
                    )
                ),
                'tabs' => array(
                    'tab_0' => array(
                        'label' => 'Contact infos',
                        'items' => array(
                            array(
                                'phone', 'secondary_phone', 'home_phone'
                            ),
                            array(
                                'contact_assistant', 'assistant_phone',
                            ),
                            array(
                                'contact_birth_date', 'contact_report_to',
                            ),
                            array(
                                'fax', 'mobile_phone', 'mobile_phone_sec'
                            )
                        )
                    ),
                    'tabd' => array(
                        'label' => 'Description & Comments',
                        'items' => array(
                            array(
                                'full_description_label'
                            ),
                            array('comments'),
                        //  array('notifications_comments'),
                        )
                    ),
                    'tab_2' => array(
                        'label' => 'IM & SNS',
                        'items' => array(
                            array(
                                'contact_skype', 'contact_msn', 'other_im'
                            ),
                            array(
                                'facebook_username', 'twitter_username', 'other_sns_username'
                            ),
                        )
                    ),
                    'tab_3' => array(
                        'label' => 'Address',
                        'items' => array(
                            array('street', 'state', 'zipcode'),
                            array('parent_city', 'parent_country'),
                        )
                    ),
                    'tabp' => array(
                        'label' => 'Files',
                        'items' => array(
                            array('files_upload'),
                        // array('files_upload_fridalonetest'),
                        // array('files_upload_paneltest'),
                        )
                    )
                /* 'tab_2' => array(
                  'label'=>'Description',
                  'items'=>array(
                  array('full_description'),
                  )
                  ),
                  'tab_11' => array(
                  'label'=>'Comments',
                  'items'=>array(
                  array('comments'),
                  )
                  ) */
                )
            )
        )
        , 'childs_items' => array(
            'title' => __('Sales & Activities'),
            'context' => 'advanced',
            'priority' => 'high',
            'positioning' => array(
                'tabs' => array(
                    'tab_5b' => array(
                        'label' => 'Tasks',
                        'items' => array(
                            array('ff_contact_child_tasks')
                        )
                    ),
                    'tab_9b' => array(
                        'label' => 'Cases',
                        'items' => array(
                            array('ff_contact_child_cases')
                        )
                    ),
                    'tab_7b' => array(
                        'label' => 'Events',
                        'items' => array(
                            array('ff_contact_child_events')
                        )
                    ),
                    'tab_15b' => array(
                        'label' => 'Newsletters',
                        'items' => array(
                            array('ff_contact_child_newsletter')
                        )
                    ),
                    'tab_8b' => array(
                        'label' => 'Call logs',
                        'items' => array(
                            array('ff_contact_child_calls')
                        )
                    ),
                    'tab_6b' => array(
                        'label' => 'Potentials',
                        'items' => array(
                            array('ff_contact_child_potential')
                        )
                    ),
                    'tab_11b' => array(
                        'label' => 'Email Archive',
                        'items' => array(
                            array('ff_contact_child_emails')
                        )
                    ),
                    'tab_14b' => array(
                        'label' => 'Notes',
                        'items' => array(
                            array('ff_contact_child_notes')
                        )
                    ),
                /*  'tab_10' => array(
                  'label' => 'Files',
                  'items' => array(
                  array('files_upload'),
                  )
                  ) */
                )
            )
        )
    )
);

