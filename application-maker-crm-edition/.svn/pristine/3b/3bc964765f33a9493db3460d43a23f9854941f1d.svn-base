<?php

$app_modules["ff_accounts"] = array(
    'slug' => __('accounts'),
    'name' => __('Accounts'),
    'menu_name' => __('Accounts'),
    'singular_name' => __('Account'),
    'icon' => 'briefcase_16.png',
    'roles_authorized' => 'sales,commercial_direction',
    'exclude_from_search' => true,
    'publicly_queryable' => false,
    'migrate_fields_list' => array(
        'account_type,ff_account_type_new'
        , 'account_industry,ff_industry_type'
        , 'rating,ff_account_rating'
    ),
    'module_datagrid_special_action' => array(
    ),
    'module_dashboard_widgets' => array(
    ),
    //'module_categories' =>array('cat15_accounts'),
    'module_new_categories' => array('cat15_accounts'),
    'module_tags' => array('tag15_crm'),
    'relation_notif_config' => array(
        'notifications_model' => array(
        ),
        'team_model' => array(
            'get_parent_team' => false,
            'force_get_parent_team' => false,
            'cascade_child_team' => true,
            'force_child_team' => false,
        ),
        'relationships' => array(
            'parent' => null,
            'childs' => array(//one to many
                'ff_contacts' => array(
                )
            ),
            'related' => array(//many to many
            ),
        ),
    ),
    'module_editform' => array(
        'use_previewbtn' => false
    ),
    'module_datagrid' => array(
        'filters' => 'account_parent,assign_to,parent_city,parent_country,account_type,account_industry,rating,post_date',
        'privacy_nonadmin' => array(
            'field' => 'set_privacy'
        ),
        'exportfields' => 'post_title,ref_id,short_name,account_website,parent_city,parent_country,account_type,account_industry,email,phone,fax,potential_amount_sum,potential_expected_revenue_sum,account_show_on_site,private_on_site,ownership,street,state,zipcode,secondary_phone,account_annual_revenue,potential_expected_revenue_sum,potential_proba_average,rating,account_sic_code,account_ticker_symbol,account_nb_employees,post_date',
        'columns_definition' => array(
            'post_title' => array(
                'width' => '33%',
                'use_link' => true,
                'link_type' => 'edit_post',
                'ajax_edit' => true,
                'edit_case' => 'dblclick',
                "schema" => "<div class='row_highlight'><span class='row_xxl '>{{field}} [ifnotemptystart]<span class='row_n'>(Short: {{short_name}})</span>[ifnotemptyend]</span><br/><span class='row_n '>Type: {{account_type}} | Indus.:{{account_industry}}</span></div>"
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
                'width' => '15%',
                "schema" => "<div class=''><span class='row_n'>Country: {{field}}</span><br/><span class='row_n'>City: {{parent_city}}</span></div>"
            ),
            'potential_amount_sum' => array(
                'width' => '20%',
                // 'ajax_edit' => true,
                'edit_case' => 'shown'
                , 'column_special_label' => 'Potential',
                'special_label' => 'Potential',
                "schema" => "<div class=''><span class='row_m '>Sum:{{field}}{{currency}}</span><br/><span class='row_n '>Expect. Revenue: {{potential_expected_revenue_sum}}{{currency}}</span></div>"
            ),
            'potential_expected_revenue_sum' => array(
                'width' => '1%',
                // 'ajax_edit' => true,
                'edit_case' => 'shown'
            ),
            'rating' => array(
                'width' => '10%',
                'ajax_edit' => true,
                'edit_case' => 'dblclick'
            ),
            'post_date' => array(
                'width' => '10%'
            ),
            'phone' => array(
                'width' => '1%'
            ),
            'email' => array(
                //'ajax_edit' => true,
                'width' => '15%',
                'edit_case' => 'dblclick'
                , 'column_special_label' => 'Email/Phone',
                'special_label' => 'Email/Phone',
                "schema" => "<div class=''><span class='row_m '>Email Pro: {{field}}</span><br/><span class='row_n '>Phone: {{phone}}</span></div>"
            ),
        ),
        'fields_to_load' => 'phone,featured_image,short_name,email,post_title,assign_to,parent_country,potential_amount_sum,potential_expected_revenue_sum,rating,post_date,parent_city,account_type,account_industry',
        'columns_initial_list' => 'post_title,assign_to,parent_country,email,rating,potential_amount_sum,post_date',
        'fields_quickadd' => 'zipcode,state,street,phone,post_title,short_name,ref_id,set_privacy,assign_to,parent_country,parent_city,email,account_type,account_industry,rating,potential_amount_sum',
        'fields_quickadd_set' => array(
            'taba' => array(
                'label' => 'Infos',
                'items' => array(
                    array('post_title/6', 'short_name/4', 'ref_id/2'),
                    array('set_privacy/6', 'assign_to/6'),
                    array('email/6', 'phone/6'),
                    array('account_industry/6', 'rating/6'),
                    array('account_type/6', 'potential_amount_sum/6'),
                )
            ),
            'tabb' => array(
                'label' => 'Addresse',
                'items' => array(
                    array('street/6', 'state/3', 'zipcode/3'),
                    array('parent_country/6', 'parent_city/6'),
                )
            ),
        ),
        'sortby' => 'post_title,post_date,assign_to,parent_country,potential_amount_sum,potential_expected_revenue_sum,rating',
        'sortDir' => 'ASC',
        'config' => array(
            'header_a_z' => true,
            'use_paging' => true,
            'default_nb_by_page' => 10,
        ),
    ),
    /* 'module_columns_formatting' => array(
      'post_title' => array(
      "schema" => "<div class='row_highlight'><span class='row_xxl '>{field}</span><br/><span class='row_m '>[account_type] | [account_industry]</span></div>"
      ),
      'parent_country' => array(
      "schema" => "<div class=''><span class='row_n '>{field}</span><br/><span class='row_sm '>city: [parent_city]</span></div>"
      ),
      ), */
    // 'module_columns_sortby' => array('post_title', 'assign_to', 'parent_city', 'parent_country', 'account_type', 'account_industry', 'potential_amount_sum', 'potential_expected_revenue_sum', 'rating', 'account_type', 'account_industry', 'post_date'),
    // 'module_columns_filters' => array('account_parent', 'assign_to', 'parent_city', 'parent_country', 'account_type', 'account_industry', 'rating', 'post_date'),
    // 'module_columns' => array('featured_image', 'post_title', 'assign_to', 'parent_country', 'potential_amount_sum', 'potential_expected_revenue_sum', 'rating', 'post_date'),
    // 'module_columns_subcontent' => array('parent_city', 'account_type', 'account_industry'),
    /* 'module_columns_config' => array(
      'header_a_z' => true,
      'grid_type' => 'ajax_data',
      'use_paging' => true,
      'use_global_default_paging_nb' => true, //THIS MUST BE SET IN GENERAL OPTION, with option 'default_paging_nb'
      //'nb_by_page'=>20, //To FORCE A SPECIFIC PAGING NB FOR THIS MODULE. WILL OVERHIDE THE use_global_default_paging_nb NB
      'user_can_change_paging_nb_by_module' => true,
      ), */
    'custom_featured_image' => array(
        'sizes' => array(
            'fgl_big_logo' => array(110, 110, false),
            'fgl_small_logo' => array(70, 70, false)
        )/* ,
      'blocks' => array(
      'secondary-image' => _('Second Image'),
      'third-image' => _('Third Image'),
      'fourth-image' => _('Fourth Image'),
      'fifth-image' => _('Fifth Image')
      ) */
    ),
    'metaboxes' => array(
        'team_notif' => array(
            'title' => __('Add Related / Teams / Categories'),
            'context' => 'side',
            'priority' => 'high',
            'positioning' => array(
                'main' => array(
                    array('accounts_addrelated'),
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
        'account_information' => array(
            'title' => __('Account Information'),
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
                        'account_type', 'account_industry'
                    ),
                    array(
                        'short_name','rating',
                    ), //account_number
                    /* array(
                      'account_test_displayfield'
                      ), */

                    array(
                        'email', 'phone', 'fax'
                    ),
                ),
                'tabs' => array(
                    'tabaa' => array(
                        'label' => 'Main',
                        'items' => array(
                            array( 'ownership','account_parent'),
                            array('account_website', 'account_sic_code'
                                , 'account_ticker_symbol'),
                            array(
                                'ref_id', 'set_privacy'
                            ),
                            array(
                                'created_by', 'created_date', 'modified_date'
                            ),
                            array('full_description_label')
                        )
                    ),
                    'taba' => array(
                        'label' => 'Details',
                        'items' => array(
                            array('secondary_email', 'mobile_phone', 'secondary_phone'),
                            array(
                                'account_annual_revenue', 'potential_amount_sum'
                            ),
                            array('potential_expected_revenue_sum', 'potential_proba_average'),
                            array('account_nb_employees'),
                        //array('separator_siteaccount'),
                        //  array( 'account_show_on_site','account_push_home','private_on_site'   )
                        )
                    ),
                    'tabb' => array(
                        'label' => 'Address',
                        'items' => array(
                            array('help_main_address'),
                            array('street', 'state', 'zipcode'),
                            array('parent_city', 'parent_country'),
                            array('help_billing_address'),
                            array('street_billing', 'state_billing', 'zipcode_billing'),
                            array('parent_city_billing', 'parent_country_billing'),
                        )
                    ),
                )
            )
        )
        , 'main_childs_items' => array(
            'title' => __('Comments & Files'),
            'context' => 'advanced',
            'priority' => 'high',
            'positioning' => array(
                'tabs' => array(
                    'tabd' => array(
                        'label' => 'Comments',
                        'items' => array(
                            array('comments'),
                        // array('notifications_comments'),
                        )
                    ),
                    'tabp' => array(
                        'label' => 'Files',
                        'items' => array(
                            array('files_upload'),
                        // array('files_upload_fridalonetest'),
                        // array('files_upload_paneltest'),
                        )
                    ),
                    'tabk' => array(
                        'label' => 'Notes',
                        'items' => array(
                            array('ff_account_child_notes')
                        )
                    ),
                )
            )
        )
        /* , 'second_main_childs_items' => array(
          'title' => __('Comments & files'),
          'context' => 'advanced',
          'priority' => 'high',
          'positioning' => array(
          )
          ) */
        , 'childs_items' => array(
            'title' => __('Sales & Activities'),
            'context' => 'advanced',
            'priority' => 'high',
            'positioning' => array(
                'tabs' => array(
                    'tadf' => array(
                        'label' => 'Contacts',
                        'items' => array(
                            array('ff_account_child_contact')
                        )
                    ),
                    'tabg' => array(
                        'label' => 'Potentials',
                        'items' => array(
                            array('ff_account_child_potential')
                        )
                    ),
                    'tabn' => array(
                        'label' => 'Newsletters',
                        'items' => array(
                            array('ff_account_child_newsletter')
                        )
                    ), 'tabl' => array(
                        'label' => 'Tasks',
                        'items' => array(
                            array('ff_child_tasks')
                        )
                    ),
                    'tabm' => array(
                        'label' => 'Cases',
                        'items' => array(
                            array('ff_account_child_cases')
                        )
                    ),
                    'tabh' => array(
                        'label' => 'Events',
                        'items' => array(
                            array('ff_account_child_events')
                        )
                    ),
                    'tabi' => array(
                        'label' => 'Call logs',
                        'items' => array(
                            array('ff_account_child_calls')
                        )
                    ),
                    'tabj' => array(
                        'label' => 'Email archive',
                        'items' => array(
                            array('ff_account_child_emails')
                        )
                    ),
                )
            )
        )
        /* , 'other_childs_items' => array(
          'title' => __('Activities'),
          'context' => 'advanced',
          'priority' => 'high',
          'positioning' => array(
          'tabs' => array(

          )
          )
          ) */
        , 'prodchilds_items' => array(
            'title' => __('Production Related Items'),
            'context' => 'advanced',
            'priority' => 'high',
            'positioning' => array(
                'tabs' => array(
                    'tabo' => array(
                        'label' => 'Projects',
                        'items' => array(
                            array('ff_account_child_projects')
                        )
                    ),
                )
            )
        )
    )
);

