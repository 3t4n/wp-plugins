<?php

$app_modules["ff_quotes"] = array(
    'slug' => __('quotes'),
    'name' => __('Quotes'),
    'menu_name' => __('Quotes'),
    'singular_name' => __('Quote'),
    'roles_authorized' => 'sales,commercial_direction',
    'icon' => 'wallet_16.png',
    'exclude_from_search' => true,
    'publicly_queryable' => false,
    'is_secundary' => true,
    'module_editform' => array(
        'use_previewbtn' => false
    ),
    'module_datagrid' => array(
        'filters' => 'assign_to,account_parent_short,contact_parent,potential_parent,project_parent,quote_status,sent_date,valid_date',
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
                "schema" => "<div class='row_highlight'><span class='row_xxl '>[linkstart]{{field}}[linkend]</span></div>"
            ),
            'assign_to' => array(
                'width' => '10%',
                'ajax_edit' => true,
                'edit_case' => 'dblclick',
                'use_link' => true,
                'link_type' => 'user_profile',
            ),
            'potential_parent' => array(
                'link_type' => 'edit_other_post',
                'use_link' => true,
                'width' => '10%',
            ),
            'account_parent_short' => array(
                'link_type' => 'edit_other_post',
                'use_link' => true,
                'width' => '10%',
            ),
            'contact_parent' => array(
                'link_type' => 'edit_other_post',
                'use_link' => true,
                'width' => '10%',
            ),
            'sent_date' => array(
                'column_special_label' => 'Sent/due',
                'special_label' => 'Sent/due Date',
                'width' => '20%',
                "schema" => "<div class=''><span class='row_n '>Sent: {{field}}</span><br/><span class='row_n '>Due: {{valid_date}}</span></div>"
            ),
            'valid_date' => array(
                'width' => '10%',
            ),
            'project_parent' => array(
                'width' => '1%',
            ),
            'quote_status' => array(
                'width' => '15%',
            ),
            'post_date' => array(
                'width' => '10%',
            ),
        ),
        'fields_to_load' => 'quote_status,project_parent,post_title,assign_to,sent_date,valid_date,account_parent_short,contact_parent,potential_parent,post_date',
        'columns_initial_list' => 'post_title,assign_to,quote_status,valid_date,account_parent_short,contact_parent,potential_parent,sent_date,post_date',
        'sortby' => 'post_title,assign_to,sent_date,valid_date,account_parent_short,contact_parent,potential_parent,project_parent,post_date',
        'exportfields' => 'quote_status,project_parent,post_title,assign_to,sent_date,valid_date,account_parent_short,contact_parent,potential_parent,quote_status,payment_terms,sent_date,valid_date,carrier,quote_team,products_list,subtotal,discount,taxes,grand_total,post_date',
        'config' => array(
            'header_a_z' => true,
            'use_paging' => true,
        ),
    ),
    'module_dashboard_widgets' => array(
    ),
    'module_new_categories' => array('cat15_quotes'),
    //'module_categories' => array('cat15_tasks'),
    'module_tags' => array('tag15_crm'),
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
        'tasks_infos' => array(
            'title' => __('Task Information'),
            'context' => 'advanced',
            'priority' => 'high',
            'positioning' => array(
                'topbar' => array(
                    'special' => array( 'assign_to',),
                    'common' => array(
                        'delete_action' => true,
                        'status_action' => true,
                        'save_action' => true,)
                ),
                'main' => array(
                    array(
                        'ref_id',  'set_privacy'
                    ),
                    array(
                        'quote_status','payment_terms'
                    ),
                    array(
                        'sent_date', 'valid_date'
                    ),
                    array(
                        'carrier', 'quote_team'
                    ),
                ),
                'tabs' => array(
                    'tabbb' => array(
                        'label' => 'Products/Amounts details',
                        'items' => array(
                            array(
                                'products_list'
                            ),
                            array(
                                '', 'subtotal'
                            ),
                            array(
                                '', 'discount'
                            ),
                            array(
                                '', 'taxes'
                            ),
                            array(
                                '', 'grand_total'
                            ),
                            array(
                                'more_advanced_pro'
                            ),
                            array(
                                'created_by', 'created_date', 'modified_date'
                            ),
                            array(
                                ''
                            ),
                        )
                    ),
                    'tabaa' => array(
                        'label' => 'Related to',
                        'items' => array(
                            array(
                                'account_parent_short', 'contact_parent'
                            ),
                            array(
                                'potential_parent', 'project_parent'
                            ),
                            array(
                                ''
                            ),
                        )
                    ),
                    'tabe' => array(
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
                    'tabi' => array(
                        'label' => 'Description and Terms & Comments',
                        'items' => array(
                            array('termsconditions'),
                            array('full_description_label'),
                        )
                    ),
                    'taba' => array(
                        'label' => 'Notes & Comments',
                        'items' => array(
                            array('notes'),
                            array('comments_label'),
                            array('comments'),
                        )
                    ),
                    'tabc' => array(
                        'label' => 'Files',
                        'items' => array(
                            array('files_upload'),
                        )
                    ),
                    'taba' => array(
                        'label' => 'Notes & Comments',
                        'items' => array(
                            array('notes'),
                            array('comments_label'),
                            array('comments'),
                        )
                    )
                )
            )
        ),
    )
);

