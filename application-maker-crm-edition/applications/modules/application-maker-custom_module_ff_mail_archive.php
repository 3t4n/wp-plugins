<?php

$app_modules["ff_mail_archive"] = array(
    'slug' => __('mail_archive'),
    'name' => __('Archive emails'),
    'menu_name' => __('Arc. emails'),
    'singular_name' => __('Archive email'),
    'icon' => 'letter_16.png',
    'exclude_from_search' => true,
    'publicly_queryable' => false,
    'is_secundary' =>true,
    /*'module_columns_sortby' => array('post_title', 'assign_to', 'account_parent', 'contact_parent', 'start_date', 'post_date'),
    'module_columns' => array('post_title', 'assign_to', 'account_parent', 'contact_parent', 'start_date', 'post_date'),
    'module_columns_filters' => array('account_parent', 'assign_to', 'contact_parent', 'potential_parent'),
    'module_columns_config' => array(
        'grid_type' => 'ajax_data',
        'use_paging' => true,
        'use_global_default_paging_nb' => true, //THIS MUST BE SET IN GENERAL OPTION, with option 'default_paging_nb'
        //'nb_by_page'=>20, //To FORCE A SPECIFIC PAGING NB FOR THIS MODULE. WILL OVERHIDE THE use_global_default_paging_nb NB
        'user_can_change_paging_nb_by_module' => true,
    ),*/
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
            'lead_parent' => array(
                'link_type' => 'edit_other_post',
                'use_link' => true,
                'width' => '15%',
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
            'from_parent' => array(
                'width' => '15%'
            ),
            'emails_date_sent' => array(
                'column_special_label' => 'Sent',
                'special_label' => 'Sent date-time',
                'width' => '15%',
                 "schema" => "<div class=''><span class='row_xxl '>{{field}}</span><br/><span class='row_n '>{{emails_time_sent}}</span></div>"

            ),
            'to_parent' => array(
                'width' => '15%'
            ),
        ),
        'fields_to_load' => 'post_title,emails_date_sent,emails_time_sent,assign_to,from_parent,to_parent,account_parent,contact_parent,lead_parent,post_date',
        'columns_initial_list' => 'post_title,assign_to,from_parent,to_parent,emails_date_sent,account_parent,contact_parent,lead_parent,post_date',
        'sortby' => 'post_title,assign_to,account_parent,contact_parent,lead_parent,post_date',
        'sortDir' => 'ASC',
        'config' => array(
            'header_a_z' => true,
            'use_paging' => true,
            'default_nb_by_page' => 10,
        ),
    ),
    'module_dashboard_widgets' => array(
    ),
    'module_new_categories' => array('cat15_mail_archive'),
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
        /* 'events_team_notif'=>array(
          'title' => __( 'Team & Notifications' ),
          'context' => 'side',
          'priority' => 'high',
          'positioning' =>array(
          'main' => array(
          ),

          'tabs' => array(

          'tab_l1' => array(
          'label'=>'Team',
          'items'=>array(
          array('assign_to'),
          array('team_assignments')
          )
          ),
          'tab_l2' => array(
          'label'=>'Notifications',
          'items'=>array(
          array(
          'notifications'
          ),
          array('notifications_comments'),
          )
          )
          )
          )
          ), */
        'mailinformation' => array(
            'title' => __('Mail Information'),
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
                        'ref_id', 'email_archi_set_title','set_privacy'
                    ),
                    array(
                         'emails_date_sent', 'emails_time_sent'
                    ),
                    /* array(
                      'help_email_contacts'
                      ), */

                    array(
                        'from_parent', 'to_parent', 'cc_parent'
                    ),
                    array(
                        'from_static', 'to_static', 'cc_static'
                    ),
                    array(
                        'account_parent', 'contact_parent', 'lead_parent'
                    ),
                     array(
                      'email_archi_subject'
                      ),
                    array(
                        'created_by', 'created_date', 'modified_date'
                    )
                ),
                'tabs' => array(
                    'tab_2' => array(
                        'label' => 'Email Body content',
                        'items' => array(
                            array('email_body'),
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

