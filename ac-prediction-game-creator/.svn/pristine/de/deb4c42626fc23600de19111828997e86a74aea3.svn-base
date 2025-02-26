<?php
if ( ! defined( 'ABSPATH' ) ) exit; // Exit if accessed directly

class ACPGC_question
{

    function __construct() {

        add_action( 'init', array($this,'acpgc_question_cpt'), 10, 2 );

        add_action( 'init', array($this,'acpgc_acf_questions'), 10, 2 );

        //filter the editor title
        add_filter( 'enter_title_here', function($title){  $title =  ( 'acpgc_question' == get_current_screen()->post_type ) ? 'Question' : $title; return $title;  }, 10, 2 );

    }

    public static function acpgc_question_cpt() {

        //Questions
        $labels = array(
            'name' => _x('Questions', 'post type general name', 'ac-prediction-game-creator'),
            'singular_name' => _x('Question', 'post type singular name', 'ac-prediction-game-creator'),
            'add_new' => _x('Add New', 'Question', 'ac-prediction-game-creator'),
            'add_new_item' => __('Add New Question', 'ac-prediction-game-creator'),
            'edit_item' => __('Edit Question', 'ac-prediction-game-creator'),
            'new_item' => __('New Question', 'ac-prediction-game-creator'),
            'all_items' => __('All Questions', 'ac-prediction-game-creator'),
            'view_item' => __('View Question', 'ac-prediction-game-creator'),
            'search_items' => __('Search Questions', 'ac-prediction-game-creator'),
            'not_found' => __('No Questions found', 'ac-prediction-game-creator'),
            'not_found_in_trash' => __('No Questions found in the trash', 'ac-prediction-game-creator'),
            'parent_item_colon' => '',
            'menu_name' => __('Questions', 'ac-prediction-game-creator')
        );

        $args = array(
            'labels' => $labels,
            'menu_icon' => 'dashicons-clipboard',
            'description' => 'Questions offered',
            'public' => true,
            'menu_position' => 20,
            'supports' => array('title','thumbnail','revisions','page-attributes'),
            'has_archive' => false,
            'publicly_queryable' => false
        );
        register_post_type('acpgc_question', $args);

        //Question Categories
        $labels = array(
            'name'              => _x('Question Categories', 'taxonomy general name', 'ac-prediction-game-creator'),
            'singular_name'     => _x('Question Category', 'taxonomy singular name', 'ac-prediction-game-creator'),
            'search_items'      => __('Search Question Categories', 'ac-prediction-game-creator'),
            'all_items'         => __('All Question Categories', 'ac-prediction-game-creator'),
            'edit_item'         => __('Edit Question Category', 'ac-prediction-game-creator'),
            'update_item'       => __('Update Question Category', 'ac-prediction-game-creator'),
            'add_new_item'      => __('Add New Question Category', 'ac-prediction-game-creator'),
            'new_item_name'     => __('New Tile Question Category', 'ac-prediction-game-creator'),
            'menu_name'         => __('Question Categories', 'ac-prediction-game-creator')
        );


        $args = array(
            'hierarchical'      => false,
            'labels'            => $labels,
            'show_ui'           => true,
            'show_admin_column' => true,
            'query_var'         => true,
            'rewrite'           => array( 'slug' => 'question-category' ),
        );

        register_taxonomy( 'acpgc_question_category', array( 'question' ), $args );



    }



    function acpgc_acf_questions(){
        if( function_exists('acf_add_local_field_group') ):

            acf_add_local_field_group(array(
                'key' => 'group_question_info',
                'title' => 'Question Info',
                'fields' => array(
                    array(
                        'key' => 'field_question_description',
                        'label' => 'Question description',
                        'name' => 'question_description',
                        'aria-label' => '',
                        'type' => 'textarea',
                        'instructions' => 'Add some more information about this question.',
                        'required' => 0,
                        'conditional_logic' => 0,
                        'wrapper' => array(
                            'width' => '',
                            'class' => '',
                            'id' => '',
                        ),
                        'default_value' => '',
                        'maxlength' => '',
                        'rows' => '',
                        'placeholder' => '',
                        'new_lines' => '',
                    ),
                ),
                'location' => array(
                    array(
                        array(
                            'param' => 'post_type',
                            'operator' => '==',
                            'value' => 'acpgc_question',
                        ),
                    ),
                ),
                'menu_order' => 0,
                'position' => 'normal',
                'style' => 'seamless',
                'label_placement' => 'top',
                'instruction_placement' => 'label',
                'hide_on_screen' => '',
                'active' => true,
                'description' => '',
                'show_in_rest' => 0,
            ));

            acf_add_local_field_group(array(
                'key' => 'group_question_settings',
                'title' => 'Question Settings',
                'fields' => array(
                    array(
                        'key' => 'field_correct_score',
                        'label' => 'Correct Score',
                        'name' => 'correct_score',
                        'aria-label' => '',
                        'type' => 'number',
                        'instructions' => 'How many point for a correct answer',
                        'required' => 0,
                        'conditional_logic' => 0,
                        'wrapper' => array(
                            'width' => '',
                            'class' => '',
                            'id' => '',
                        ),
                        'default_value' => 1,
                        'min' => '',
                        'max' => '',
                        'placeholder' => '',
                        'step' => 1,
                        'prepend' => '',
                        'append' => 'Point',
                    ),
                    array(
                        'key' => 'field_incorrect_score',
                        'label' => 'Incorrect Score',
                        'name' => 'incorrect_score',
                        'aria-label' => '',
                        'type' => 'number',
                        'instructions' => 'How many point for an incorrect answer - This should probably be 0 or a negative number (-1)',
                        'required' => 0,
                        'conditional_logic' => 0,
                        'wrapper' => array(
                            'width' => '',
                            'class' => '',
                            'id' => '',
                        ),
                        'default_value' => 0,
                        'min' => '',
                        'max' => '',
                        'placeholder' => '',
                        'step' => 1,
                        'prepend' => '',
                        'append' => 'Point',
                    ),
                ),
                'location' => array(
                    array(
                        array(
                            'param' => 'post_type',
                            'operator' => '==',
                            'value' => 'acpgc_question',
                        ),
                    ),
                ),
                'menu_order' => 0,
                'position' => 'acf_after_title',
                'style' => 'seamless',
                'label_placement' => 'top',
                'instruction_placement' => 'label',
                'hide_on_screen' => '',
                'active' => true,
                'description' => '',
                'show_in_rest' => 0,
            ));

        endif;
    }

}
