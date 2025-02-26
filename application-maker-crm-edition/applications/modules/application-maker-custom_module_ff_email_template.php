<?php

$app_modules["ff_email_template"] = array(
    'slug' => __('email_templates'),
    'name' => __('Email Templates'),
    'icon' => 'letter_16.png',
    'menu_name' => __('Email Tpl'),
    'singular_name' => __('Email Template'),
    'exclude_from_search' => true,
    'publicly_queryable' => false,
    /* 'module_columns_sortby' => array('post_title', 'post_date'),
      'module_columns' => array('post_title', 'post_date'), */
    'module_editform' => array(
        'use_previewbtn' => false
    ),
    'module_datagrid' => array(
        'filters' => 'assign_to,template_category,from_parent,reply_to_email,post_date',
        'privacy_nonadmin' => array(
            'field' => 'set_privacy'
        ),
        'exportfields' => 'post_title,assign_to,template_category,from_parent,reply_to_email,post_date',
        'columns_definition' => array(
            'post_title' => array(
                'width' => '33%',
                'use_link' => true,
                'link_type' => 'edit_post',
                'ajax_edit' => true,
                'edit_case' => 'dblclick',
                "schema" => "<div class='row_highlight'><span class='row_xxl '>{{field}}</span></div>"
            ),
            'assign_to' => array(
                'width' => '10%',
                'ajax_edit' => true,
                'edit_case' => 'dblclick',
                'use_link' => true,
                'link_type' => 'user_profile',
            ),
            'template_category' => array(
                'width' => '15%'
            ),
            'from_parent' => array(
                'width' => '15%'
            ),
            'reply_to_email' => array(
                'width' => '15%'
            ),
            'post_date' => array(
                'width' => '15%'
            ),
        ),
        'fields_to_load' => 'post_title,assign_to,template_category,from_parent,reply_to_email,post_date',
        'columns_initial_list' => 'post_title,assign_to,template_category,from_parent,reply_to_email,post_date',
        'sortby' => 'post_title,assign_to,template_category,from_parent,reply_to_email,post_date',
        'sortDir' => 'ASC',
        'config' => array(
            'header_a_z' => true,
            'use_paging' => true,
            'default_nb_by_page' => 10,
        ),
    ),
    //'module_new_categories' => array('cat15_mailinglist'),
    'metaboxes' => array(
        'team_notif' => array(
            'title' => __('Teams'),
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
                /* 'tablone' => array(
                  'label' => 'Categories',
                  'items' => array(
                  array('categories_list'),
                  )
                  ) */
                )
            )
        ),
        'emailtpl_information' => array(
            'title' => __('Email Templates  Information'),
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

                    array(
                        'template_category', 'from_parent'
                    ),
                    array(
                        'reply_to_email', 'reply_to_name', 'add_user_signature'
                    ),
                    array(
                        'help_email_body_tags'
                    ),
                    array(
                        'email_subject'
                    ),
                    array(
                        'email_body'
                    ),
                    array(
                        'email_footer'
                    ),
                    array(
                       'template_code'
                    ),
                    array('ref_id', 'set_privacy'),
                    array(
                        'created_by', 'created_date', 'modified_date'
                    )
                ),
            /* 'tabs' => array(
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
              ) */
            )
        )
    )
);

