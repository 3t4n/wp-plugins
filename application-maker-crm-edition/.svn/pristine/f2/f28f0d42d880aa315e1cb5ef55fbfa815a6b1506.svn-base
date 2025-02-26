<?php

$app_modules["ff_email_newsletter"] = array(
    'slug' => __('email_newsletter'),
    'name' => __('Newsletters/Mail Campaign'),
    'icon' => 'letter_16.png',
    'menu_name' => __('Newslet.'),
    'singular_name' => __('Newsletter/Mail Campaign'),
    'exclude_from_search' => true,
    'publicly_queryable' => false,
    /* 'module_columns_sortby' => array('post_title', 'contact_parent', 'account_parent', 'lead_parent', 'emails_date_sent', 'emails_time_sent', 'post_date'),
      'module_columns' => array('post_title','newsletter_status','email_template','mailing_list_to_use', 'contact_parent', 'account_parent', 'lead_parent', 'emails_date_sent', 'emails_time_sent', 'post_date'),
     */
    'migrate_fields_list' => array(
        'newsletter_status,ff_newsletter_status'
    ),
    'module_editform' => array(
        'use_previewbtn' => false
    ),
    'module_datagrid' => array(
        'filters' => 'newsletter_status,email_template,mailing_list_to_use,contact_parent,account_parent,lead_parent,emails_date_sent,post_date',
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
                "schema" => "<div class='row_highlight'><span class='row_xxl '>{{field}}</span></div>"
            ),
            'assign_to' => array(
                'width' => '15%',
                'ajax_edit' => true,
                'edit_case' => 'dblclick',
                'use_link' => true,
                'link_type' => 'user_profile',
            ),
            'account_parent' => array(
                'link_type' => 'edit_other_post',
                'use_link' => true,
                'width' => '20%',
            ),
            'contact_parent' => array(
                'link_type' => 'edit_other_post',
                'use_link' => true,
                'width' => '10%',
            ),
            'lead_parent' => array(
                'link_type' => 'edit_other_post',
                'use_link' => true,
                'width' => '10%',
            ),
            'emails_date_sent' => array(
                'column_special_label' => 'Sent',
                'special_label' => 'Sent date-time',
                'width' => '15%',
                "schema" => "<div class=''><span class='row_xxl '>{{field}}</span><br/><span class='row_n '>{{emails_time_sent}}</span></div>"
            ),
            'emails_time_sent' => array(
                'width' => '1%',
            ),
            'mailing_list_to_use' => array(
                'width' => '10%',
            ),
            'email_template' => array(
                'column_special_label' => 'Email tpl.',
                'special_label' => 'Email template',
                'width' => '10%',
                'link_type' => 'edit_other_post',
                'use_link' => true
            ),
            'newsletter_status' => array(
                'column_special_label' => 'Status',
                'special_label' => 'Status',
                'width' => '10%',
            ),
            'post_date' => array(
                'width' => '15%',
            ),
        ),
        'fields_to_load' => 'post_title,assign_to,newsletter_status,email_template,mailing_list_to_use,contact_parent,account_parent,lead_parent,emails_date_sent,emails_time_sent,post_date',
        'columns_initial_list' => 'post_title,assign_to,emails_date_sent,newsletter_status,email_template,mailing_list_to_use,contact_parent,account_parent,lead_parent,post_date',
        'sortby' => 'post_title,contact_parent,account_parent,lead_parent,emails_date_sent,emails_time_sent,post_date',
        'exportfields' => 'post_title,newsletter_status,email_template,mailing_list_to_use,contact_parent,account_parent,lead_parent,emails_date_sent,emails_time_sent,post_date',
        'config' => array(
            'header_a_z' => true,
            'use_paging' => true,
        ),
    ),
    'module_new_categories' => array('cat15_newsletters'),
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
        /* 'action_information' => array(
          'title' => __('Actions'),
          'context' => 'side',
          'priority' => 'high',
          'positioning' => array(
          'main' => array(
          array(
          'send_newsletter'
          ),
          array(
          'newsletter_send_order'
          ),
          ),
          )
          ), */
        'newsletter_information' => array(
            'title' => __('Newsletter Information'),
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
                        'send_newsletter_result'
                    ),
                    array(
                         'newsletter_step1'
                    ),
                    array(
                        'email_template', 'newsletter_status'
                    ),
                    array(
                         'newsletter_step2'
                    ),
                    array(
                        'newsletter_special_subject', // 'newsletter_set_title',
                    ),
                    array(
                        'newsletter_step3',
                    ),
                    array(
                        'mailing_list_html',
                    ),
                    array(
                        'account_parent', 'contact_parent'
                    ),
                    array(
                        'lead_parent', 'mailing_list_to_use'
                    ),
                    array(
                        'newsletter_step4',
                    ),
                    array(
                        'send_newsletter',
                    ),
                    array(
                        'separator_field',
                    ),
                    array('ref_id', 'set_privacy'
                    ),
                    array(
                        'emails_date_sent', 'emails_time_sent'
                    ),
                    array(
                        'created_by', 'created_date', 'modified_date'
                    )
                ),
                'tabs' => array(
                    'tab_2' => array(
                        'label' => 'Note',
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

