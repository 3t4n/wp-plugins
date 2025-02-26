<?php

$local_custom_fields = array(
////15CRM
////******
///TASKS
    'tax_parent' => array(
        'label' => __('Tax Parent'),
        'field_type' => 'autocomplete',
        'placeholder' => 'Type the first letters to find leads',
        'field_config' => array(
            'post_type' => 'ff_taxagents,ff_taxoffices',
            'use_none' => true
        ),
        'label_config' => array(
            'size_cls' => "f",
        ),
        'width' => 4,
        'fieldwidth' => 4
    ),
    'contact_parent' => array(
        'label' => __('Contact'),
        'field_type' => 'autocomplete',
        'placeholder' => 'Type the first letters to find contacts',
        'field_config' => array(
            'post_type' => 'ff_contacts',
            'use_none' => true
        ),
        'label_config' => array(
            'size_cls' => "f",
        ),
        'width' => 6,
        'fieldwidth' => 5
    ), //

    'lead_parent' => array(
        'label' => __('Lead'),
        'field_type' => 'autocomplete',
        'placeholder' => 'Type the first letters to find leads',
        'field_config' => array(
            'post_type' => 'ff_leads',
            'use_none' => true
        ),
        'label_config' => array(
            'size_cls' => "f",
        ),
        'width' => 6,
        'fieldwidth' => 4
    ),
    'account_parent_short' => array(
        'label' => __('Account'),
        'field_type' => 'autocomplete',
        'placeholder' => 'Type the first letters to find accounts',
        'field_config' => array(
            'post_type' => 'ff_accounts',
            'use_none' => true
        ),
        'label_config' => array(
            'size_cls' => "f",
        ),
        'width' => 6,
        'fieldwidth' => 5
    ),
    'potential_parent' => array(
        'label' => __('Potential'),
        'field_type' => 'autocomplete',
        'placeholder' => 'Type the first letters to find potentials',
        //'field_type' => 'select',
        'field_config' => array(
            'post_type' => 'ff_potentials',
            //'null_value'=>true,
            'use_none' => true
        ),
        'label_config' => array(
            'size_cls' => "f",
        ),
        'width' => 6,
        'fieldwidth' => 5
    ), //
    'task_owner' => array(
        'label' => __('Task Owner'),
        'label_width' => 80,
        'field_type' => 'userslist',
        'label_width_perc' => 45,
        'width' => 5
    ),
    'due_date' => array(
        'label' => __('Due date'),
        'field_type' => 'datefield',
        'label_config' => array(
            'size_cls' => "f",
        ),
        'width' => 4,
        'fieldwidth' => 3
    ),
    'priority' => array(
        'label' => __('Priority'),
        'default' => '',
        'data_type' => 'select',
        /* //'options' => array('-None-','Normal','High','Highest','Low','Lowest'),,
          'label_config' => array(
          'size_cls' => "f",
          ),
          'width' => 6,
          'fieldwidth' => 4,
          'field_type' => 'select',
          'field_config' => array(
          'post_type' => 'ff_priority',
          'link_parent' => false,
          )* */
        'column_label' => 'Priority',
        //'options' => array('-None-','Analyst','Competitor','Customer','Integrator','Investor','Partner','Press','Prospect','Reseller','Other'),

        'field_type' => 'setInBodyCategorySelect',
        'field_config' => array(
            'category' => 'cat15_priorities',
        ),
        'label_config' => array(
            'size_cls' => "f",
        ),
        'width' => 6,
        'fieldwidth' => 5,
    ),
    'task_type' => array(
        'label' => __('Type'),
        'default' => '',
        'column_label' => 'Type',
        'field_type' => 'setInBodyCategorySelect',
        'field_config' => array(
            'category' => 'cat15_tasks_type',
        ),
        'label_config' => array(
            'size_cls' => "f",
        ),
        'width' => 6,
        'fieldwidth' => 5,
    ),
    'percent_complete' => array(
        'label' => __('% Complete'),
        'default' => '',
        'data_type' => 'select',
        'column_label' => '% Comp.',
        'field_type' => 'setInBodyCategorySelect',
        'field_config' => array(
            'category' => 'cat15_percent_complete',
        ),
        'label_config' => array(
            'size_cls' => "f",
        ),
        'width' => 6,
        'fieldwidth' => 5,
    ),
    'status' => array(
        'label' => __('Status'),
        'default' => '',
        'data_type' => 'select',
        //'options' => array('-None-','Not Started','Deffered','Completed','In Progress','Waiting on someone else'),

        'column_label' => 'Status',
        'field_type' => 'setInBodyCategorySelect',
        'field_config' => array(
            'category' => 'cat15_task_status',
        ),
        'label_config' => array(
            'size_cls' => "f",
        ),
        'width' => 6,
        'fieldwidth' => 5,
    ),
    'crm_recurring' => array(
        'label' => __('Recurring'),
        'field_type' => 'checkbox',
        'label_config' => array(
            'size_cls' => "f",
        ),
        'width' => 2,
        'fieldwidth' => 2
    ),
    'completed_task_action' => array(
        'label' => __('Set as Completed'),
        'help' => __('Set this task as Completed => update status, percent completed, dates, and add a comment.'),
        'button_label' => __('Complete'),
        'button_icon' => __('icon-ok'),
        'hide_label' => true,
        'field_type' => 'action_button',
        'field_config' => array(
            'limit_to_edit' => true,
            'btn_class' => 'btn-success',
            'transform_fields' => array(
                array('status', 'Completed', 'text'), //='Closed Won'
                array('percent_complete', '100', 'text'),
                array('end_date', 'NOW()'),
                array('start_date', 'NOW()', 'if_empty'),
                array('due_date', 'NOW()', 'if_empty'),
                array('comments', 'Completed this task'),
            ),
            'hide_on_fields_values' => array(array('status', 'Completed')),
        ),
        'label_config' => array(
            'size_cls' => "f",
        ),
        'width' => 4,
        'fieldwidth' => 3
    ),
        /* 'task_recurring'=>array(
          'label' => __( 'Recurring Activity' ),
          'label_width_perc' => 70,
          'field_type' => 'checkbox',
          'width' => 5
          ), */
);
