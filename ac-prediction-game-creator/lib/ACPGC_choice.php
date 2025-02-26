<?php
if ( ! defined( 'ABSPATH' ) ) exit; // Exit if accessed directly

class ACPGC_choice
{
    function __construct()
    {
        add_action( 'init', array($this, 'acpgc_choice_cpt'), 10, 2 );
        add_action( 'init', array($this, 'acpgc_choice_cf'), 10, 2 );

        add_filter( 'enter_title_here', function($title){  $title =  ( 'acpgc_choice' == get_current_screen()->post_type ) ? 'Choice' : $title; return $title;  }, 10, 2 );

    }

    public static function acpgc_choice_cpt() {

        $labels = array(
            'name' => _x('Choices', 'post type general name', 'ac-prediction-game-creator'),
            'singular_name' => _x('Choice', 'post type singular name', 'ac-prediction-game-creator'),
            'add_new' => _x('Add New', 'Choice', 'ac-prediction-game-creator'),
            'add_new_item' => __('Add New Choice', 'ac-prediction-game-creator'),
            'edit_item' => __('Edit Choice', 'ac-prediction-game-creator'),
            'new_item' => __('New Choice', 'ac-prediction-game-creator'),
            'all_items' => __('All Choices', 'ac-prediction-game-creator'),
            'view_item' => __('View Choice', 'ac-prediction-game-creator'),
            'search_items' => __('Search Choices', 'ac-prediction-game-creator'),
            'not_found' => __('No Choices found', 'ac-prediction-game-creator'),
            'not_found_in_trash' => __('No Choices found in the trash', 'ac-prediction-game-creator'),
            'parent_item_colon' => '',
            'menu_name' => __('Choices', 'ac-prediction-game-creator')
        );

        $args = array(
            'labels' => $labels,
            'menu_icon' => 'dashicons-yes',
            'description' => 'Choices available',
            'public' => true,
            'menu_position' => 20,
            'supports' => array('title','thumbnail','revisions'),
            'has_archive' => false,
            'publicly_queryable' => false
        );
        register_post_type('acpgc_choice', $args);

    }

    function acpgc_choice_cf(){

        if( function_exists('acf_add_local_field_group') ):

            acf_add_local_field_group(array(
                'key' => 'group_choice_settings',
                'title' => 'Choice Settings',
                'fields' => array(

                    array(
                        'key' => 'field_choice_active',
                        'label' => 'Choice Active',
                        'name' => 'choice_active',
                        'aria-label' => '',
                        'type' => 'true_false',
                        'instructions' => 'Set to inactive to hide this choice',
                        'required' => 0,
                        'conditional_logic' => 0,
                        'wrapper' => array(
                            'width' => '',
                            'class' => '',
                            'id' => '',
                        ),
                        'message' => 'Show this choice by default',
                        'default_value' => 1,
                        'ui_on_text' => 'Active',
                        'ui_off_text' => 'Inactive',
                        'ui' => 1,
                    ),
                ),
                'location' => array(
                    array(
                        array(
                            'param' => 'post_type',
                            'operator' => '==',
                            'value' => 'acpgc_choice',
                        ),
                    ),
                ),
                'menu_order' => 0,
                'position' => 'acf_after_title',
                'style' => 'default',
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
