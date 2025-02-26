<?php

$app_modules["ff_email_mailinglist"] = array(
    'slug' => __('email_mailinglist'),
    'name' => __('Mailing Lists'),
    'icon' => 'letter_16.png',
    'menu_name' => __('Mail. List'),
    'singular_name' => __('Mailing List'),
    'exclude_from_search' => true,
    'publicly_queryable' => false,
   /* 'module_columns_sortby' => array('post_title', 'post_date'),
    'module_columns' => array('post_title',  'post_date'),*/
     'module_editform' => array(
        'use_previewbtn' => false
    ),
    'module_datagrid' => array(
        'filters' => 'account_parent,assign_to,contact_parent,lead_parent,post_date',
        'privacy_nonadmin' => array(
            'field' => 'set_privacy'
        ),
        'exportfields' => 'post_title,assign_to,account_parent,contact_parent,lead_parent,post_date',
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

        ),
        'fields_to_load' => 'post_title,assign_to,account_parent,contact_parent,lead_parent,post_date',
        'columns_initial_list' => 'post_title,assign_to,account_parent,contact_parent,lead_parent,post_date',
        'sortby' => 'post_title,assign_to,account_parent,contact_parent,lead_parent,post_date',
        'sortDir' => 'ASC',
        'config' => array(
            'header_a_z' => true,
            'use_paging' => true,
            'default_nb_by_page' => 10,
        ),
    ),
    'module_new_categories' => array('cat15_mailinglist'),
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
        'newsletter_information' => array(
            'title' => __('Mailign List Information'),
            'context' => 'advanced',
            'priority' => 'high', //send_newsletter
            'positioning' => array(
                'topbar' => array(
                    'special' => array('assign_to'),
                    'common' => array(
                        'delete_action' => true,
                        'status_action' => true,
                        'save_action' => true,)
                ),
                'main' => array(
                  /*  array(
                        'contact_parent'// 'account_parent',
                    ),
                    array(
                        'lead_parent'
                    ),*/
                    array(
                        'mailing_list'
                    ),
                    array(
                        'ref_id', 'set_privacy'
                    ),
                    array(
                        'created_by', 'created_date', 'modified_date'
                    )
                ),
                'tabs' => array(
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
                    )
                )
            )
        )
    )
);

