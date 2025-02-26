<?php

$local_custom_fields = array(
////15CRM
////****PROJECT

    'project_help' => array(
        'field_type' => 'html',
        'html' => "Note: The project section has evolved a bit. Still far from complete, more to come"
    ),
    'project_year' => array(
        'label' => __('Project year'),
        'label_config' => array(
            'size_cls' => "f",
        ),
        'width' => 5,
        'fieldwidth' => 3,
    ),
    'project_addrelated' => array(
        'label' => '',
        'default' => '',
        'width' => 5,
        'label_width_perc' => 30,
        'field_type' => 'setAddRelated',
        'field_config' => array(
            'post_types' => 'ff_proj_milest,ff_project_tasks',
        )
    ),
    'demo_url' => array(
        'label' => __('Demo URL'),
        'label_config' => array(
            'size_cls' => "f",
        ),
        'width' => 5,
        'fieldwidth' => 3,
    ),
    'end_url' => array(
        'label' => __('End live URL'),
        'label_width_perc' => 30,
        'width' => 5//1 to 10, 10=100%
    ),
    'ff_project_child_milestones' => array(
        'label' => __('Milestones'),
        'field_type' => 'childgrid',
        'field_config' => array(
            'post_type' => 'ff_proj_milest',
            'child_key' => 'project_parent',
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
    'ff_project_child_tasks' => array(
        'label' => __('Project Tasks'),
        'field_type' => 'childgrid',
        'field_config' => array(
            'post_type' => 'ff_project_tasks',
            'child_key' => 'project_parent',
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
    'project_type' => array(
        'label' => __('Project Type'),
        'default' => '',
        //'options' => array('-None-','Mobile App','Web site','Blog','Web App','Social Network','Plugin','Banners','Minisite','Mini Game','Other'),
        /* 'label_width_perc' => 30,
          'width' => 5,
          'field_type' => 'select',
          'field_config' => array(
          'post_type'=>'ff_project_type',
          'link_parent'=>false,
          'force_add_btn'=>true,
          //'null_value'=>true,
          //'use_none'=>true
          ) */

        'field_type' => 'setInBodyCategorySelect',
        'field_config' => array(
            'category' => 'cat15_project_type',
        ),
        'label_config' => array(
            'size_cls' => "f",
        ),
        'width' => 8,
        'fieldwidth' => 6,
    ),
    'project_tech' => array(
        'label' => __('Project Tech'),
        'default' => '',
        //'options' => array('-None-','iPhone','Android','Php','Html','Javascript','Wordpress','Zend Framework','Flash'),
        'width' => 5,
        'field_type' => 'select',
        'field_config' => array(
            'post_type' => 'ff_project_tech',
            'link_parent' => false,
            'force_add_btn' => true,
            'multiselect' => true
        //'null_value'=>true,
        //'use_none'=>true
        )
    ),
    'full_description_simple' => array(
        'label' => __('Short description'),
        'field_type' => 'textarea',
        'label_width' => 120,
        'width' => 10 //1 to 10, 10=100%
    ),
    'screenshots_upload' => array(
        'label' => __('Images'),
        'allow_multi_files' => true,
        'is_image' => true,
        'image_resize' => array(
            'minithumb' => array(70, 70, 'crop:topleft'), //crop:topleft / crop:center
            'thumb' => array(175, 175, 'crop:topleft'), //crop:topleft / crop:center
            'medium' => array(300, 300),
            'zoom' => array(1000, 1000)
        ),
        'field_type' => 'setUploadField',
        'label_width' => 120,
        'width' => 5//1 to 10, 10=100%
    ),
    'quick_add_taskproj' => array(
        'label' => __('Add Task'),
        'default' => '',
        'width' => 5,
        'label_width_perc' => 30,
        'field_type' => 'add_child',
        'field_config' => array(
            'post_type' => 'ff_project_tasks',
        //'child_key'=>'account_parent',
        )
    ),
    'quick_add_milestone' => array(
        'label' => __('Add Milestone'),
        'default' => '',
        'width' => 5,
        'label_width_perc' => 30,
        'field_type' => 'add_child',
        'field_config' => array(
            'post_type' => 'ff_proj_milest',
        //'child_key'=>'account_parent',
        )
    ),
);
