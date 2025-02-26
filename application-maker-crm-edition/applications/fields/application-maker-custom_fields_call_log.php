<?php

$local_custom_fields = array(
////15CRM
////******
/////CALL LOGS


    'call_type' => array(
        'label' => __('Call Type'),
        'default' => '',
        'data_type' => 'select',
        //'options' => array('Inbound','Outbound'),
        'field_type' => 'setInBodyCategorySelect',
        'field_config' => array(
            'category' => 'cat15_call_type',
        ),
        'label_config' => array(
            'size_cls' => "f",
        ),
        'width' => 5,
        'fieldwidth' => 4,
    ),
    'call_from_to' => array(
        'label' => __('Call From/To'),
        'default' => '',
        'data_type' => 'select',
        //'options' => array('Contact','Lead'),
        
        'field_type' => 'setInBodyCategorySelect',
        'field_config' => array(
            'category' => 'cat15_call_from',
        ),
        'label_config' => array(
            'size_cls' => "f",
        ),
        'width' => 6,
        'fieldwidth' => 4,
    ),
    'call_purpose' => array(
        'label' => __('Call Purpose'),
        'default' => '',
        'data_type' => 'select',
        //'options' => array('-None-','Prospecting','Administrative','Negotiation','Demo','Project','Support'),
       
        'field_type' => 'setInBodyCategorySelect',
        'field_config' => array(
            'category' => 'cat15_call_purpose',
        ),
        'label_config' => array(
            'size_cls' => "f",
        ),
        'width' => 5,
        'fieldwidth' => 4,
    ),
    'call_duration' => array(
        'label' => __('Call Duration'),
        'help' => 'hh:mm:ss',
        'maxlength' => 8,
        'label_config' => array(
            'size_cls' => "f",
        ),
        'width' => 6,
        'fieldwidth' => 4
    ),
    'call_result' => array(
        'label' => __('Call Result'),
        'label_config' => array(
            'size_cls' => "f",
        ),
        'width' => 12,
        'fieldwidth' => 8
    ),
);
