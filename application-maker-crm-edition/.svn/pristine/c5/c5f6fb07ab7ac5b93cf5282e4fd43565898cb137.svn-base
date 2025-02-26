<?php

$local_custom_fields = array(
////15CRM
////******
//////POTENTIALS
    'potential_owner' => array(
        'label' => __('Potential Owner'),
        'label_width' => 80,
        'field_type' => 'userslist',
        'label_width_perc' => 45,
        'width' => 5
    ),
    'potential_addrelated' => array(
        'label' => '',
        'default' => '',
        'width' => 5,
        'label_width_perc' => 30,
        'field_type' => 'setAddRelated',
        'field_config' => array(
            'post_types' => 'ff_tasks,ff_events,ff_notes,ff_call_log',
        )
    ),
    'potential_amount' => array(
        'label' => __('Amount ({{currency}})'),
        'column_label' => 'Potent. amount',
        'field_type' => 'currencyfield',
        'restrict_format' => 'numbers',
        'label_config' => array(
            'size_cls' => "f",
        ),
        'width' => 6,
        'fieldwidth' => 5,
    ),
    'potential_amount_type' => array(
        'label' => __('Amount type'),
        'default' => '',
        /* 'hide_label' => true,
          'data_type' => 'list',
          //'options' => array('Fix bid','Per hour','Per day','Per week','Per month','Per year'),
          'label_width_perc' => 10,
          'width' => 3,
          'field_type' => 'select',
          'field_config' => array(
          'post_type' => 'ff_potent_amnt_type',
          'link_parent' => false,
          'use_none' => true
          ) */

        'field_type' => 'setInBodyCategorySelect',
        'field_config' => array(
            'category' => 'cat15_potential_amounttype',
        ),
        'label_config' => array(
            'size_cls' => "f",
        ),
        'width' => 6,
        'fieldwidth' => 4,
    ),
    'potential_amount_sum' => array(
        'label' => __('Potentials total amount ({{currency}})'),
        'field_type' => 'currencyfield',
        'data_type' => 'int',
        'column_label' => 'Potent. tot. amount',
        'column_type' => 'input_ajax',
        'column_options' => array(
            'width' => 'medium',
        ),
        'help' => 'Field auto calculated from the childs Potential Records',
        'restrict_format' => 'numbers',
        'maxlength' => 20,
        'label_config' => array(
            'size_cls' => "f",
        ),
        'width' => 8,
        'fieldwidth' => 3
    ),
    'potential_proba_average' => array(
        'label' => __('Potent. Probability average (%)'),
        'field_type' => 'numberfield',
        'column_label' => 'Probability (%)',
        'help' => 'Field auto calculated from the childs Potential Records',
        'restrict_format' => 'numbers',
        'maxlength' => 20,
        'label_config' => array(
            'size_cls' => "f",
        ),
        'width' => 6,
        'fieldwidth' => 3
    ),
    'potential_expected_revenue_sum' => array(
        'label' => __('Potent. total expected revenue ({{currency}})'),
        'column_label' => 'Potent. tot. expec. revenue',
        'field_type' => 'currencyfield',
        'data_type' => 'int',
        'column_type' => 'input_ajax',
        'column_options' => array(
            'width' => 'medium',
        ),
        'help' => 'Field auto calculated from the childs Potential Records',
        'restrict_format' => 'numbers',
        'maxlength' => 20,
        'label_config' => array(
            'size_cls' => "f",
        ),
        'width' => 6,
        'fieldwidth' => 4
    ),
    'potential_expected_revenue' => array(
        'label' => __('Expec. Reven. ({{currency}})'),
        'column_label' => 'Expected Revenue ',
        'field_type' => 'currencyfield',
        'restrict_format' => 'numbers',
        'label_config' => array(
            'size_cls' => "f",
        ),
        'width' => 6,
        'fieldwidth' => 4
    ),
    'potential_closing_date' => array(
        'label' => __('Closing date'),
        'field_type' => 'datefield',
        'label_config' => array(
            'size_cls' => "f",
        ),
        'width' => 6,
        'fieldwidth' => 4
    ),
    'potential_won_date' => array(
        'label' => __('Won date'),
        'field_type' => 'datefield',
        'label_config' => array(
            'size_cls' => "f",
        ),
        'width' => 6,
        'fieldwidth' => 4
    ),
    'potential_stage' => array(
        'label' => __('Stage'),
        'default' => '',
        /* 'data_type' => 'select',
          //'options' => array('Prospecting','Qualification','Needs Analysis','Value Proposition','Id. Decision Makers','Perception Analysis','Proposal/Price Quote','Negotiation/Review','Closed Won','Closed Lost','Closed Lost to Competition'),
          'label_width_perc' => 25,
          'width' => 5,
          'field_type' => 'select',
          'field_config' => array(
          'post_type' => 'ff_potential_stage',
          'link_parent' => false,
          'use_none' => true
          ) */

        'field_type' => 'setInBodyCategorySelect',
        'field_config' => array(
            'category' => 'cat15_potential_stage',
        ),
        'label_config' => array(
            'size_cls' => "f",
        ),
        'width' => 6,
        'fieldwidth' => 4,
    ),
    'potential_type' => array(
        'label' => __('Type'),
        'default' => '',
        /* 'data_type' => 'select' ,
          //'options' => array('-None-','Existing Business','New Business'),
          'label_width_perc' => 25,
          'width' => 5,
          'field_type' => 'select',
          'field_config' => array(
          'post_type'=>'ff_potential_type',
          'link_parent'=>false,
          'use_none'=>true
          ) */
        'field_type' => 'setInBodyCategorySelect',
        'field_config' => array(
            'category' => 'cat15_potential_type',
        ),
        'label_config' => array(
            'size_cls' => "f",
        ),
        'width' => 6,
        'fieldwidth' => 4,
    ),
    'potential_proba' => array(
        'label' => __('Probab. (%)'),
        'field_type' => 'numberfield',
        'maxlength' => 20,
        'label_config' => array(
            'size_cls' => "f",
        ),
        'width' => 6,
        'fieldwidth' => 1
    ),
    'potential_next_step' => array(
        'label' => __('Next Step'),
        'label_config' => array(
            'size_cls' => "f",
        ),
        'width' => 6,
        'fieldwidth' => 5
    ),
    'ff_potential_child_tasks' => array(
        'label' => __('Tasks'),
        'field_type' => 'childgrid',
        'field_config' => array(
            'post_type' => 'ff_tasks',
            'child_key' => 'potential_parent',
            'columns' => array(
                array(
                    'field' => 'post_title',
                    'width' => '25'
                ),
                array(
                    'field' => 'assign_to',
                    'width' => '15'
                ),
                array(
                    'field' => 'due_date',
                    'width' => '15'
                ),
                array(
                    'field' => 'priority',
                    'width' => '10'
                ),
                array(
                    'field' => 'status',
                    'width' => '10'
                ),
                array(
                    'field' => 'percent_complete',
                    'width' => '10'
                ),
                array(
                    'field' => 'task_type',
                    'width' => '25'
                ),
            )
        ),
        'width' => 10
    ),
    'ff_potential_child_notes' => array(
        'label' => __('Notes'),
        'field_type' => 'childgrid',
        'field_config' => array(
            'post_type' => 'ff_notes',
            'child_key' => 'potential_parent',
            'columns' => array(
                array(
                    'field' => 'post_title',
                    'width' => '60'
                ),
                array(
                    'field' => 'account_parent',
                    'width' => '40'
                ),
            )
        ),
        'width' => 10
    ),
    'ff_potential_child_calls' => array(
        'label' => __('Call logs'),
        'field_type' => 'childgrid',
        'field_config' => array(
            'post_type' => 'ff_call_log',
            'child_key' => 'potential_parent',
            'columns' => array(
                array(
                    'field' => 'post_title',
                    'width' => '30'
                ),
                array(
                    'field' => 'account_parent',
                    'width' => '20'
                ),
                array(
                    'field' => 'assign_to',
                    'width' => '15'
                ),
                array(
                    'field' => 'contact_parent',
                    'width' => '10'
                ),
                array(
                    'field' => 'start_date',
                    'width' => '10'
                ),
                array(
                    'field' => 'call_type',
                    'width' => '10'
                ),
                array(
                    'field' => 'call_purpose',
                    'width' => '10'
                ),
                array(
                    'field' => 'call_from_to',
                    'width' => '10'
                ),
            )
        ),
        'width' => 10
    ),
    'ff_potential_child_events' => array(
        'label' => __('Events'),
        'field_type' => 'childgrid',
        'field_config' => array(
            'post_type' => 'ff_events',
            'child_key' => 'potential_parent',
            'columns' => array(
                array(
                    'field' => 'post_title',
                    'width' => '25'
                ),
                array(
                    'field' => 'account_parent',
                    'width' => '15'
                ),
                array(
                    'field' => 'assign_to',
                    'width' => '15'
                ),
                array(
                    'field' => 'start_date',
                    'width' => '15'
                ),
                array(
                    'field' => 'end_date',
                    'width' => '1'
                ),
                array(
                    'field' => 'event_location',
                    'width' => '15'
                ),
            //,'post_title','account_parent','assign_to','start_date','end_date','event_location'
            )
        ),
        'width' => 10
    ),
    'win_potential' => array(
        'label' => __('Set Won'),
        'help' => __('Set this potential as WON'),
        'button_label' => __('Won'),
        'button_icon' => __('icon-thumbs-up'),
        'hide_label' => true,
        'field_type' => 'action_button',
        'field_config' => array(
            'limit_to_edit' => true,
            'btn_class' => 'btn-success',
            'transform_fields' => array(
                array('potential_stage', 'Closed Won', 'text'), //='Closed Won'
                array('potential_proba', '100', 'text'),
                array('potential_next_step','', 'text'),
                array('potential_won_date', 'NOW()'),
                array('potential_closing_date', 'NOW()', 'if_empty'),
                array('comments', 'Won this potential'),
            ),
            'hide_on_fields_values' => array(array('potential_stage', 'Closed Won,Closed Lost,Closed Lost to Competition')),
        ),
        'label_config' => array(
            'size_cls' => "f",
        ),
        'width' => 4,
        'fieldwidth' => 3
    ),
    'convert_potential_to_project' => array(
        'label' => __('Copy as a Project'),
        'help' => __('Copy the Potential in a Project'),
        'field_type' => 'action_button',
        'button_label' => __('Proj.'),
        'button_icon' => __('icon-circle-arrow-right'),
        'field_config' => array(
            'btn_class' => 'btn-info',
            'do_trash_original' => false,
            'post_type_targets' => array(
                array('target_name' => 'ff_projects'
                    , 'target_fields' => array('post_title', 'account_parent', 'contact_parent',
                        'project_type', 'potential_amount', 'potential_amount_type', 'full_description', 'files_upload'
                    /* array(
                      'source_fieldname'=>'company',
                      'target_fieldname'=>'account_parent',
                      'find_mode'=>'find_parent_by_name',
                      'full_description'
                      ) */
                    )
                    , 'target_transform' => false//true = convert the old existing post to a new one by changing his post_type, not creating new one...
                    , 'target_childs' => array(//handle the childs conversion to the new post/migrated post.
                    )
                )
            )
        ),
        'label_config' => array(
            'size_cls' => "f",
        ),
        'width' => 4,
        'fieldwidth' => 3
    ),
    'lost_potential' => array(
        'label' => __('Set Lost'),
        'help' => __('Set this potential as LOST'),

        'button_label' => __('Lost'),
        'button_icon' => __('icon-thumbs-down'),
        'hide_label' => true,
        'field_type' => 'action_button',
        'field_config' => array(
            'limit_to_edit' => true,
            'btn_class' => 'btn-warning',
            'transform_fields' => array(
                array('potential_stage', 'Closed Lost', 'text'), //='Closed Won'
                array('potential_proba', '0', 'text'),
                array('potential_won_date', ''),
                array('potential_next_step','', 'text'),
                array('potential_expected_revenue','0', 'text'),
                array('potential_amount','0', 'text'),
                array('potential_closing_date', 'NOW()', 'if_empty'),
                array('comments', 'Lost this potential'),
            ),
            'hide_on_fields_values' => array(array('potential_stage', 'Closed Won,Closed Lost,Closed Lost to Competition')),
        ),
        'label_config' => array(
            'size_cls' => "f",
        ),
        'width' => 4,
        'fieldwidth' => 3
    ),
);
