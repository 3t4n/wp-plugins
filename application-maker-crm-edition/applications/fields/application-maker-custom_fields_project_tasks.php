<?php

$local_custom_fields = array(
////15CRM
////******
///PROEJCT TASKS
    'project_parent' => array(
        'label' => __('Project'),
        'field_type' => 'autocomplete',
        'placeholder' => 'Type the first letters to find a project',
        'field_config' => array(
            'post_type' => 'ff_projects',
            'use_none' => true
        ),
        'label_config' => array(
            'size_cls' => "f",
        ),
        'width' => 9,
        'fieldwidth' => 8,
    ), //

    'project_task_type' => array(
        'label' => __('Project Task Type'),
        'default' => '',
        'field_type' => 'setInBodyCategorySelect',
        'field_config' => array(
            'category' => 'cat15_project_task_type',
        ),
        'label_config' => array(
            'size_cls' => "f",
        ),
        'width' => 6,
        'fieldwidth' => 4,
    ),
    'ff_milestones_child_tasks' => array(
        'label' => __('Milestone Tasks'),
        'field_type' => 'childgrid',
        'field_config' => array(
            'post_type' => 'ff_project_tasks',
            'child_key' => 'milestone_parent',
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
                )
            )
        ),
        'width' => 10
    ),
        /* 'task_recurring'=>array(
          'label' => __( 'Recurring Activity' ),
          'label_width_perc' => 70,
          'field_type' => 'checkbox',
          'width' => 5
          ), */
);
