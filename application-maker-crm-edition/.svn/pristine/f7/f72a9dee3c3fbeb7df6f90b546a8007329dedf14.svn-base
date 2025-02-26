<?php

$app_modules["ff_leads"] = array(
    'slug' => __('leads'),
    'name' => __('Leads'),
    'menu_name' => __('Leads'),
    'singular_name' => __('Lead'),
    'icon' => 'user2_16.png',
    'roles_authorized' => 'sales,commercial_direction',
    'exclude_from_search' => true,
    'publicly_queryable' => false,
    'migrate_fields_list' => array(
        'lead_source,ff_lead_source'
        , 'lead_status,ff_lead_status'
        , 'contact_gender,ff_contact_gender'
        , 'account_industry,ff_industry_type'
        , 'rating,ff_account_rating'
    ),
    /* 'module_columns' => array('post_title', 'assign_to', 'company', 'phone', 'parent_country', 'lead_source', 'lead_status', 'post_date'),
      'module_columns_subcontent' => array('email', 'parent_city', 'mobile_phone'),
      'module_columns_formatting' => array(
      'post_title' => array(
      "schema" => "<div class='row_highlight'><span class='row_xxl '>{field}</span><br/><span class='row_m '>email: <a href='mailto:[email]'>[email]</a></span></div>"
      ),
      'phone' => array(
      "schema" => "<div class=''><span class='row_n '>{field}</span><br/><span class='row_sm '>Mobile: [mobile_phone]</span></div>"
      ),
      'parent_country' => array(
      "schema" => "<div class=''><span class='row_n '>{field}</span><br/><span class='row_sm '>city: [parent_city]</span></div>"
      ),
      ),
      'module_columns_sortby' => array('post_title', 'assign_to', 'company', 'email', 'phone', 'parent_city', 'parent_country', 'lead_source', 'lead_status', 'post_date'),
     */
    'module_datagrid_special_action' => array(
    ),
    'module_dashboard_widgets' => array(
    ),
    'module_new_categories' => array('cat15_leads'),
    //'module_categories' => array('cat15_leads'),
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
        'filters' => 'company,assign_to,parent_city,parent_country,account_industry,rating,lead_status,lead_source,post_date',
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
                "schema" => "<div class='row_highlight'><span class='row_xxl '>[linkstart]{{contact_fistname}} {{contact_lastname}} ({{field}})[linkend]</span><br/><span class='row_n '>Phone: {{phone}} | Email: {{email}}</span></div>"
            ),
            'phone' => array(
                'width' => '15%',
                'ajax_edit' => true,
                'use_link' => true,
                'link_type' => 'edit_post',
                "schema" => "<div class=''><span class='row_n '>[linkstart] {{field}}[linkend]</span><br/><span class='row_sm '>Mobile: {{mobile_phone}}</span></div> "
            ),
            'assign_to' => array(
                'width' => '15%',
                'ajax_edit' => true,
                'edit_case' => 'dblclick',
                'use_link' => true,
                'link_type' => 'user_profile',
            ),
            'parent_country' => array(
                'width' => '15%',
                'column_special_label' => 'Country/City',
                'special_label' => 'Country/City',
                "schema" => "<div class=''><span class='row_m '>Country:{{field}}</span><br/><span class='row_n '>City: {{parent_city}}</span></div>"
            ),
            'rating' => array(
                'width' => '1%',
            ),
            'email' => array(
                'width' => '15%',
            ),
            'contact_fistname' => array(
                'width' => '1%',
            ),
            'contact_lastname' => array(
                'width' => '1%',
            ),
            'parent_city' => array(
                'width' => '15%',
            ),
            'lead_source' => array(
                'width' => '15%',
            ),
            'lead_status' => array(
                'width' => '15%',
                'column_special_label' => 'Stat/Rat.',
                'special_label' => 'Status/Rating',
                "schema" => "<div class=''><span class='row_m '>Status:{{field}}</span><br/><span class='row_m '>Rating: {{rating}}</span></div>"
            ),
            'company' => array(
                'width' => '20%',
                'column_special_label' => 'Comp/Indus.',
                'special_label' => 'Company/Industry',
                "schema" => "<div class=''><span class='row_n '>Comp.:{{field}}</span><br/><span class='row_n '>Industry: {{account_industry}}</span></div>"
            ),
            'post_date' => array(
                'width' => '10%',
            ),
        ),
        'fields_to_load' => 'rating,account_industry,contact_fistname,contact_lastname,email,parent_city,mobile_phone,post_title,assign_to,company,phone,parent_country,lead_source,lead_status,post_date',
       'fields_quickadd' => 'contact_fistname,contact_lastname,email,mobile_phone,assign_to,company,lead_source,lead_status,parent_city,parent_country',
        'columns_initial_list' => 'post_title,assign_to,company,parent_country,lead_source,lead_status,post_date',
        'exportfields' => 'email,parent_city,mobile_phone,post_title,assign_to,company,phone,parent_country,lead_source,lead_status,post_date',
        'sortby' => 'post_title,assign_to,company,email,phone,parent_city,parent_country,lead_source,lead_status,post_date',
        'config' => array(
            'header_a_z' => true,
            'use_paging' => true,
        ),
    ),
    /* 'module_columns_filters' => array('assign_to', 'parent_city', 'parent_country', 'lead_source', 'lead_status'),
      'module_columns_config' => array(
      'header_a_z' => true,
      'grid_type' => 'ajax_data',
      'use_paging' => true,
      'use_global_default_paging_nb' => true, //THIS MUST BE SET IN GENERAL OPTION, with option 'default_paging_nb'
      //'nb_by_page'=>20, //To FORCE A SPECIFIC PAGING NB FOR THIS MODULE. WILL OVERHIDE THE use_global_default_paging_nb NB
      'user_can_change_paging_nb_by_module' => true,
      ), */
    'metaboxes' => array(
        /* 'quickadd' => array(
          'title' => __('Quick Add'),
          'context' => 'side',
          'priority' => 'high',
          'positioning' => array(
          'main' => array(
          //  array('convert_lead'),
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
          ), */
        'team_notif' => array(
            'title' => __('Add Related / Teams / Categories'),
            'context' => 'side',
            'priority' => 'high',
            'positioning' => array(
                'main' => array(
                    array('leads_addrelated'),
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
        'lead_information' => array(
            'title' => __('Lead Information'),
            'context' => 'advanced',
            'priority' => 'high',
            'positioning' => array(
                'topbar' => array(
                    /*'special' => array('related_user_convert','convert_agent','convert_office','convert_lead', '-', 'assign_to',),*/
                    'special' => array('related_user_convert','convert_lead', '-', 'assign_to',),
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
                          'company', 'account_industry',
                    ),
                    array(
                         'rating','lead_source',
                    ),
                    array(
                         'lead_status','related_user'
                    ),
                    array(
                        'source_description_simple', 'status_description_simple'
                    ),
                    array(
                        'ref_id', 'set_privacy'
                    ),
                    array(
                        'created_by', 'created_date', 'modified_date', 'contact_set_title'
                    ),
                ),
                'tabs' => array(
                    'tab_0' => array(
                        'label' => 'Lead Contact infos',
                        'items' => array(
                            array(
                                'contact_gender',  'contact_title'
                            ),
                            array(
                                'email', 'secondary_email', 'perso_email'
                            ),
                            array(
                                'phone', 'secondary_phone', 'home_phone'
                            ),
                            array(
                                'fax', 'mobile_phone', 'mobile_phone_sec'
                            ),
                            array(
                                'contact_birth_date', 'contact_skype', 'contact_msn', 'other_im'
                            ),
                            array(
                                'facebook_username', 'twitter_username', 'other_sns_username'
                            ),
                        )
                    ),
                    'tab_40' => array(
                        'label' => 'Lead Company infos',
                        'items' => array(
                            array(
                                'contact_dept',  'account_website'
                            ),
                            array(
                                'account_annual_revenue', 'account_nb_employees',
                            ),
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
                    'tab_3' => array(
                        'label' => 'Address',
                        'items' => array(
                            array('street', 'state', 'zipcode'),
                            array('parent_city', 'parent_country'),
                            array('country_free', 'country_webform', 'city_webform'),
                        )
                    ),
                    'tabfiles' => array(
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
                            array('ff_lead_child_tasks')
                        )
                    ),
                    'tab_6b' => array(
                        'label' => 'Cases',
                        'items' => array(
                            array('ff_lead_child_cases')
                        )
                    ),
                    'tab_15b' => array(
                        'label' => 'Newsletters',
                        'items' => array(
                            array('ff_lead_child_newsletter')
                        )
                    ),
                    'tab_7b' => array(
                        'label' => 'Events',
                        'items' => array(
                            array('ff_lead_child_events')
                        )
                    ),
                    'tab_8b' => array(
                        'label' => 'Call logs',
                        'items' => array(
                            array('ff_lead_child_calls')
                        )
                    ),
                    'tab_11b' => array(
                        'label' => 'Email Archive',
                        'items' => array(
                            array('ff_lead_child_emails')
                        )
                    ),
                    'tab_14b' => array(
                        'label' => 'Notes',
                        'items' => array(
                            array('ff_lead_child_notes')
                        )
                    ),
                )
            )
        )
    )
);

