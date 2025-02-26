<?php
if ( ! defined( 'ABSPATH' ) ) exit; // Exit if accessed directly

class ACPGC_round
{

    public $acpgc_background_process;

    function __construct() {

        $this->acpgc_background_process = new ACPGC_Background_Process();
        //custom post type
        add_action( 'init', array($this, 'acpgc_cpt_rounds'), 10, 2 );
        //custom post type custom fields
        add_action( 'init', array($this,'acpgc_acf_rounds'), 10, 2 );

        //add admin scripts
        if(is_admin()){
            add_action( 'admin_enqueue_scripts', array($this,'acpgc_rounds_editor'), 10, 2 );
        }

        //add round update to update hook
        add_action( 'pre_post_update', array($this,'acpgc_update_round'), 10, 2 );

        //create columns in post list
        add_filter('manage_acpgc_round_posts_columns', array($this, 'acpgc_create_rounds_columns'), 10, 2);

        //set columns in post list
        add_action('manage_acpgc_round_posts_custom_column', array($this, 'acpgc_set_rounds_columns'), 10, 2);

        add_action('pre_get_posts', array($this, 'acpgc_sort_rounds_columns'), 10, 2 );

        //Register the shortcode
        add_shortcode('acpgc_rounds', array($this, 'acpgc_rounds_sc'));

        //Hide the Round Lock ACF
        add_filter( 'acf/prepare_field/key=field_round_lock', function(){return false;} );

    }

    /*
    * acf/update_value action
     * Fix the action that means the disabled inputs will not be saved to the database
    */
    function acpgc_update_round_question($value,$post_id,$field){

        //get the field name
        $current_value = get_field($field['name'], $post_id);
        $id_array = [];

        // If the field has a current value in the database
        if(is_array( $current_value )){
            foreach ($current_value as $obj){
                //store each id in the ID Array
                $id_array[] = $obj->ID;
            }
        }

        //update the value of the disabled input with the current value
        $value = $id_array;

        return $value;
    }

    /*
     * Rounds update action
     */
    function acpgc_update_round($post_id, $data) {
        // Ensure this is the correct post type
        if ($data['post_type'] !== 'acpgc_round') {
            return;
        }

        // Check if the nonce is valid.
        if (!isset($_POST['_wpnonce']) || !wp_verify_nonce(sanitize_text_field(wp_unslash($_POST['_wpnonce'])), 'update-post_' . $post_id)) {
            wp_die('Security check failed');;
        }

        // Check user permissions
        if (!current_user_can('edit_post', $post_id)) {
            wp_die('You do not have permission to edit this post');
        }

        // Get the lock status
        $lockStatus = get_field('round_status', $post_id);

        // Sanitize and validate the submitted round status
        $post_lock_status = isset($_POST['acf']['field_round_status']) ? sanitize_key($_POST['acf']['field_round_status']) : false;
        $post_lock_status = ($post_lock_status === '1' || $post_lock_status === '0') ? $post_lock_status : false;

        // Sanitize and validate the update action
        $update_action = isset($_POST['acf']['field_update_action']) ? sanitize_text_field(wp_unslash($_POST['acf']['field_update_action'])) : false;
        $valid_actions = ['calculate'];
        $update_action = in_array($update_action, $valid_actions) ? $update_action : false;

        // Retrieve and process questions
        $questions = get_posts([
            'post_type' => 'acpgc_question',
            'posts_per_page' => -1,
            'post_status' => 'publish'
        ]);

        // Create the answers array
        $answers = [];
        $allQuestionsAnswered = true;
        foreach ($questions as $question) {
            $includeQuestion = 'include_question_' . $question->ID;
            $voidQuestion = 'void_question_' . $question->ID;

            // Skip if the question is not included or is voided
            if (!get_field($includeQuestion, $post_id) || get_field($voidQuestion, $post_id)) {
                continue;
            }

            $answerId = 'correct_answer_' . $question->ID;
            $answers[$answerId] = get_field($answerId);
            if (!get_field($answerId, $post_id)) {
                $allQuestionsAnswered = false;
                break;
            }
        }

        // Update post meta
        update_post_meta($post_id, '_acpgc_all_questions_answered', $allQuestionsAnswered);

        $allUsers = get_users();

        // Actions based on conditions
        if ($allQuestionsAnswered && $update_action === 'calculate' && !$lockStatus) {
            foreach ($allUsers as $user) {
                $this->acpgc_background_process->push_to_queue([
                    'user_id' => $user->ID,
                    'round_id' => $post_id,
                    'answers' => $answers,
                    'action' => 'calculate_score'
                ]);
            }
            $this->acpgc_background_process->save()->dispatch();

            add_action('save_post', function ($post_id) {
                if (defined('DOING_AUTOSAVE') && DOING_AUTOSAVE) return;
                if (wp_is_post_revision($post_id)) return;

                update_field('round_status', 1, $post_id);
            }, 10, 3);

            update_post_meta($post_id, '_acpgc_round_calculated', '1');
        }

        // If the round is unlocked
        if (!$post_lock_status && $lockStatus) {
            foreach ($answers as $id => $answer) {
                add_filter('acf/update_value/name=' . sanitize_key($id), array($this, 'acpgc_update_round_question'), 10, 4);
            }
            foreach ($allUsers as $user) {
                $this->acpgc_background_process->push_to_queue([
                    'user_id' => $user->ID,
                    'round_id' => $post_id,
                    'action' => 'subtract_score'
                ]);
            }
            $this->acpgc_background_process->save()->dispatch();

            update_post_meta($post_id, '_acpgc_round_calculated', '');
        } elseif ($post_lock_status) {
            foreach ($answers as $id => $answer) {
                add_filter('acf/update_value/name=' . sanitize_key($id), array($this, 'acpgc_update_round_question'), 10, 4);
            }
        }

        // Reset the post update action
        $_POST['acf']['field_update_action'] = '';
    }


    /*
     *  Custom editor function for Rounds
     */
    function acpgc_rounds_editor()
    {

        if (!function_exists('get_current_screen'))
        {
            return;
        };

        //If acpgc_round edit screen
        $screen = get_current_screen();

        if ($screen->base !== 'post' || $screen->post_type !== 'acpgc_round' || $screen->action !== '') {
            return;
        }
            global $post;

            //$round_status = 'closed';
            $answers = [];

            //questions not included
            $excludedQuestions = [];

            //questions that do not have answers
            $voidedQuestions = [];

            //Get the questions
            $questions = get_posts(array(
                    'post_type' => 'acpgc_question',
                    'posts_per_page' => -1,
                    'post_status' => 'publish',
                    'orderby' => 'menu_order',
                    'order' => 'ASC'
                ));

            //Get the lockstatus from the db
            $lockStatus = get_field('round_status');

            //Get the calculate status from the DB
            $round_calculated = get_post_meta($post->ID, '_acpgc_round_calculated');
            // If calculated
            if (isset($round_calculated[0]) and !empty($round_calculated[0])){

                //Update the round action instructions and disable
                add_filter('acf/prepare_field/key=field_update_action', function ($field) {
                    $field['instructions'] = 'The round has been calculated. Unlock and update to clear the calculation';
                    $field['disabled'] = 1;
                    return $field;
                });
            }

        //Make the answers array - Only include selected questions that are not void
        foreach ($questions as $question) {
            $includeQuestion = 'include_question_' . $question->ID;
            $isVoid = get_field('void_question_' . $question->ID);  // Assuming the custom "Void" field is named 'void_question_[ID]'

            // Skip this iteration if the question is not included
            if (!get_field($includeQuestion)) {
                $answerId = 'correct_answer_' . $question->ID;
                $excludedQuestions[$answerId] = get_field($answerId);
            } else {
                // Check if this question is voided
                if ($isVoid) {
                    $answerId = 'correct_answer_' . $question->ID;
                    $voidedQuestions[$answerId] = get_field($answerId); // Or some other data you might want to store
                    continue; // Skip the rest of this iteration, move on to next question
                }

                // Otherwise, include the answer as usual
                $answerId = 'correct_answer_' . $question->ID;
                $answers[$answerId] = get_field($answerId);
            }
        }


        $allQuestionsAnswered = true;

            // If one or more questions have not been answered
            if (in_array('', $answers))
            {
                $allQuestionsAnswered = false;

                //var_dump($answers);die();
                // Remove the lock toggle
                add_filter('acf/prepare_field/key=field_round_status', function ($field) {
                    return;
                });

                //There are empty answers so disable the update action
                add_filter('acf/prepare_field/key=field_update_action', function ($field) {
                    $field['disabled'] = 1;
                    return $field;
                });

                // Set the status to unlocked
                update_field('round_status', 0, $post->ID);

                // set the calculated meta to false
                update_post_meta($post->ID, '_acpgc_round_calculated' , false);



            }
            elseif ($lockStatus == true)
            {

                //The round is locked so disable the update action
                add_filter('acf/prepare_field/key=field_update_action', function ($field) {
                    $field['disabled'] = 1;
                    return $field;
                });

                foreach ($answers as $id => $answer)
                {
                    add_filter('acf/prepare_field/key=field_' . $id, function ($field) {
                        $field['disabled'] = 1;
                        //$field['instructions'] = "some instructions";
                        $field['conditional_logic'] = 0;
                        return $field;
                    });
                }

                foreach ($questions as $question)
                {
                    $includeQuestion = 'include_question_' . $question->ID;
                    $voidQuestion = 'void_question_' . $question->ID;
                    add_filter('acf/prepare_field/key=field_' .$includeQuestion, function ($field) {
                        return false;
                    });
                    add_filter('acf/prepare_field/key=field_' .$voidQuestion, function ($field) {
                        return false;
                    });
                }

                foreach ($excludedQuestions as $id => $answer)
                {
                    add_filter('acf/prepare_field/key=field_' . $id, function ($field) {

                        return false;
                    });
                }

                foreach ($voidedQuestions as $id => $answer)
                {
                    add_filter('acf/prepare_field/key=field_' . $id, function ($field) {
                        $field['disabled'] = 1;
                        $field['conditional_logic'] = 0;
                        return $field;
                    });
                }

                //If round not calculate
                if (!isset($round_calculated[0]) || !$round_calculated[0])
                {
                    //The round is not calculated but it is already locked. Update the instructions
                    add_filter('acf/prepare_field/key=field_update_action', function ($field) {
                        $field['instructions'] = 'The round has not been calculate. Unlock to calculate the scores!';
                        $field['disabled'] = 1;
                        return $field;
                    });
                }
            }
            else{

                // if scores have not been calculated
                if (!isset($round_calculated[0]) || !$round_calculated[0])
                {

                    add_filter('acf/prepare_field/key=field_update_action', function ($field) {
                        $field['instructions'] = "Select 'Calculate round scores' to calculate the scores for this round";

                        return $field;
                    });
                }
            }

        // set the questions meta
        update_post_meta($post->ID, '_acpgc_all_questions_answered' , $allQuestionsAnswered);



        }


    /*
     *  Rounds custom post type
     */
    public static function acpgc_cpt_rounds() {

        //Rounds
        $labels = array(
            'name' => _x('Rounds', 'post type general name', 'ac-prediction-game-creator'),
            'singular_name' => _x('Round', 'post type singular name', 'ac-prediction-game-creator'),
            'add_new' => _x('Add New', 'Round', 'ac-prediction-game-creator'),
            'add_new_item' => __('Add New Round', 'ac-prediction-game-creator'),
            'edit_item' => __('Edit Round', 'ac-prediction-game-creator'),
            'new_item' => __('New Round', 'ac-prediction-game-creator'),
            'all_items' => __('All Rounds', 'ac-prediction-game-creator'),
            'view_item' => __('View Round', 'ac-prediction-game-creator'),
            'search_items' => __('Search Rounds', 'ac-prediction-game-creator'),
            'not_found' => __('No Rounds found', 'ac-prediction-game-creator'),
            'not_found_in_trash' => __('No Rounds found in the trash', 'ac-prediction-game-creator'),
            'parent_item_colon' => '',
            'menu_name' => __('Rounds', 'ac-prediction-game-creator')
        );

        $args = array(
            'labels' => $labels,
            'menu_icon' => 'dashicons-bell',
            'description' => 'Rounds available',
            'public' => true,
            'menu_position' => 20,
            'supports' => array('title','thumbnail','revisions'),
            'has_archive' => false,
            'publicly_queryable' => false
        );
        register_post_type('acpgc_round', $args);




    }

    /*
     *  Rounds custom fields
     */
    /*
 *  Rounds custom fields
 */
    function acpgc_acf_rounds() {

        if( function_exists('acf_add_local_field_group') ):

            // Add Round Settings Field Group
            acf_add_local_field_group(array(
                'key' => 'group_round_settings',
                'title' => 'Round Settings',
                'fields' => array(
                    array(
                        'key' => 'field_round_start_time',
                        'label' => 'Round Start Time',
                        'name' => 'round_start_time',
                        'aria-label' => '',
                        'type' => 'date_time_picker',
                        'instructions' => 'Select a date and time for user to start answering question',
                        'required' => 0,
                        'conditional_logic' => 0,
                        'wrapper' => array(
                            'width' => '',
                            'class' => '',
                            'id' => '',
                        ),
                        'display_format' => 'd/m/Y g:i a',
                        'return_format' => 'l dS, F',
                        'first_day' => 1,
                    ),
                    array(
                        'key' => 'field_round_end_time',
                        'label' => 'Round End Time',
                        'name' => 'round_end_time',
                        'aria-label' => '',
                        'type' => 'date_time_picker',
                        'instructions' => 'Select a date and time for when users can no longer answer question',
                        'required' => 0,
                        'conditional_logic' => 0,
                        'wrapper' => array(
                            'width' => '',
                            'class' => '',
                            'id' => '',
                        ),
                        'display_format' => 'd/m/Y g:i a',
                        'return_format' => 'l dS, F',
                        'first_day' => 1,
                    ),
                    array(
                        'key' => 'field_round_status',
                        'label' => 'Round Status',
                        'name' => 'round_status',
                        'aria-label' => '',
                        'type' => 'true_false',
                        'instructions' => 'Set the status of this round',
                        'required' => 0,
                        'conditional_logic' => 1,
                        'wrapper' => array(
                            'width' => '',
                            'class' => '',
                            'id' => '',
                        ),
                        'message' => 'Unlock to clear the scores and update the round',
                        'default_value' => 1,
                        'ui_on_text' => 'Locked',
                        'ui_off_text' => 'Unlocked',
                        'ui' => 1,
                    ),
                ),
                'location' => array(
                    array(
                        array(
                            'param' => 'post_type',
                            'operator' => '==',
                            'value' => 'acpgc_round',
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

            // Add Update Action Field Group
            acf_add_local_field_group(array(
                'key' => 'group_update_action',
                'title' => 'Update Action',
                'fields' => array(
                    array(
                        'key' => 'field_update_action',
                        'readonly' => true,
                        'label' => 'Update Actions',
                        'name' => 'update_actions',
                        'aria-label' => '',
                        'type' => 'select',
                        'instructions' => 'Select all the correct answers to calculate the score for this round.',
                        'required' => 0,
                        'conditional_logic' => 0,
                        'wrapper' => array(
                            'width' => '',
                            'class' => '',
                            'id' => '',
                        ),
                        'choices' => array(
                            'false' => 'Select an action...',
                            'calculate' => 'Calculate round scores',
                        ),
                        'default_value' => 'false',
                        'return_format' => 'value',
                        'multiple' => 0,
                        'allow_null' => 0,
                        'ui' => 0,
                        'ajax' => 0,
                        'placeholder' => '',
                    ),
                ),
                'location' => array(
                    array(
                        array(
                            'param' => 'post_type',
                            'operator' => '==',
                            'value' => 'acpgc_round',
                        ),
                    ),
                ),
                'menu_order' => 0,
                'position' => 'side',
                'style' => 'default',
                'label_placement' => 'top',
                'instruction_placement' => 'label',
                'hide_on_screen' => '',
                'active' => true,
                'description' => '',
                'show_in_rest' => 0,
            ));

            // Retrieve all questions
            $questions = get_posts(array(
                'post_type' => 'acpgc_question',
                'posts_per_page' => -1,
                'post_status' => 'publish',
                'orderby' => 'menu_order',
                'order' => 'ASC'
            ));

            // Iterate through each question and create fields
            foreach ($questions as $question) {
                $fields = [];
                $title = get_the_title($question);
                $handle = preg_replace('/\s+/', '_', strtolower($title));

                // Include question field
                $question_field = array(
                    'key' => 'field_include_question_' . $question->ID,
                    'label' => $title,
                    'name' => 'include_question_' . $question->ID,
                    'aria-label' => '',
                    'type' => 'true_false',
                    'instructions' => '',
                    'required' => 0,
                    'conditional_logic' => 0,
                    'wrapper' => array(
                        'width' => '',
                        'class' => '',
                        'id' => '',
                    ),
                    'message' => 'Include this question',
                    'default_value' => 1,
                    'ui_on_text' => '',
                    'ui_off_text' => '',
                    'ui' => 0,
                );

                // Correct answer field
                $answer_field = array(
                    'key' => 'field_correct_answer_' . $question->ID,
                    'label' => 'Answer',
                    'name' => 'correct_answer_' . $question->ID,
                    'aria-label' => '',
                    'type' => 'post_object',
                    'instructions' => 'Select the correct answer for "<i>' . $title . '</i>"',
                    'required' => 0,
                    'conditional_logic' => array(
                        array(
                            array(
                                'field' => 'field_include_question_' . $question->ID,
                                'operator' => '==',
                                'value' => '1',
                            ),
                            array(
                                'field' => 'field_void_question_' . $question->ID,
                                'operator' => '!=',
                                'value' => '1',
                            ),
                        ),
                    ),
                    'wrapper' => array(
                        'width' => '',
                        'class' => '',
                        'id' => '',
                    ),
                    'post_type' => array('acpgc_choice'),
                    'taxonomy' => '',
                    'return_format' => 'object',
                    'multiple' => 1, // Allow multiple selections
                    'allow_null' => 0,
                    'ui' => 1,
                );

                // Attach the filter to each specific field
                add_filter('acf/fields/post_object/query/key=field_correct_answer_' . $question->ID, function ($args, $field, $post_id) {
                    // Modify the query arguments to include only active choices
                    $args['meta_query'] = array(
                        array(
                            'key'     => 'choice_active',
                            'value'   => '1',
                            'compare' => '='
                        )
                    );

                    return $args;
                }, 10, 3);

                // Void question field
                $void_field = array(
                    'key' => 'field_void_question_' . $question->ID,
                    'label' => 'Void',
                    'name' => 'void_question_' . $question->ID,
                    'aria-label' => '',
                    'type' => 'true_false',
                    'instructions' => 'Select "Yes" if the question "<i>' . $title . '</i>" does not have an answer.',
                    'required' => 0,
                    'conditional_logic' => array(
                        array(
                            array(
                                'field' => 'field_include_question_' . $question->ID,
                                'operator' => '==',
                                'value' => '1',
                            ),
                            array(
                                'field' => 'field_correct_answer_' . $question->ID,
                                'operator' => '==empty',
                            ),
                        ),
                    ),
                    'wrapper' => array(
                        'width' => '',
                        'class' => '',
                        'id' => '',
                    ),
                    'message' => 'Void this question',
                    'default_value' => 0,
                    'ui' => 1,
                );

                $fields[] = $question_field;
                $fields[] = $answer_field;
                $fields[] = $void_field;

                // Add field group for each question
                acf_add_local_field_group(array(
                    'key' => 'group_' . $handle,
                    'title' => $title,
                    'fields' => $fields,
                    'location' => array(
                        array(
                            array(
                                'param' => 'post_type',
                                'operator' => '==',
                                'value' => 'acpgc_round',
                            ),
                        ),
                    ),
                    'menu_order' => 0,
                    'position' => 'normal',
                    'style' => 'default',
                    'label_placement' => 'top',
                    'instruction_placement' => 'label',
                    'hide_on_screen' => '',
                    'active' => true,
                    'description' => '',
                    'show_in_rest' => 0,
                ));
            }

        endif;
    }



/**
     *
     * Create the rounds short code
     *
     */
    function acpgc_rounds_sc($atts = [], $content = null, $tag = '' ){

        $atts = array_change_key_case( (array) $atts, CASE_LOWER );

        $atts = shortcode_atts(
            array(
                'status' => 'open',
                'order' => false,
                'show' => -1 // Default value -1 means "show all"
            ), $atts, $tag
        );

        // Validate 'show' to make sure it's an integer
        $show_count = is_numeric($atts['show']) ? intval($atts['show']) : -1;

        $order_rounds = $atts['order'];

        //status filter show open or closed rounds
        if ($atts['status'] == 'open'){

            $order_rounds = (!$order_rounds) ? 'ASC' : $order_rounds;
            $meta_query = array(
                'relation' => 'AND',
                array(
                    'key'     => 'round_start_time',
                    'value'   => gmdate("Y-m-d H:i:s"),
                    'compare' => '<=',
                    'type'    => 'DATETIME'
                ),
                array(
                    'key'     => 'round_end_time',
                    'value'   => gmdate("Y-m-d H:i:s"),
                    'compare' => '>=',
                    'type'    => 'DATETIME'
                ),
                array(
                    'key'     => 'round_status',
                    'value'   => '1',
                    'compare' => '!=', // Assuming 'round_status' of '1' means closed
                    'type'    => 'NUMERIC' // Assuming 'round_status' is stored as a numeric value
                )
            );
        }else if($atts['status'] == 'closed'){
            $meta_query = array(
                'relation' => 'OR',
                array(
                    'key'     => 'round_end_time',
                    'value'   => gmdate("Y-m-d H:i:s"),
                    'compare' => '<=',
                    'type'    => 'DATETIME'
                ),
                array(
                    'key'     => 'round_status',
                    'value'   => '1', // Explicitly checking for closed status
                    'compare' => '=',
                    'type'    => 'NUMERIC'
                )
            );
        }else if($atts['status'] == 'future'){
            $order_rounds = (!$order_rounds) ? 'ASC' : $order_rounds;
            $meta_query = array(
                'relation' => 'AND',
                array(
                    'key'     => 'round_start_time',
                    'value'   => gmdate("Y-m-d H:i:s"),
                    'compare' => '>=',
                    'type'    => 'DATETIME'
                ),
                array(
                    'key'     => 'round_status',
                    'value'   => '1',
                    'compare' => '!=', // Assuming you want to exclude closed rounds
                    'type'    => 'NUMERIC'
                )
            );
        }
        else{
            $meta_query = false;
        }


        global $wp_query;
        $temp_q = $wp_query;
        $wp_query = null;
        $wp_query = new WP_Query();

        //get rounds
        $args = array(
            'post_type' => 'acpgc_round',
            'showposts' => $show_count, // Use validated show_count
            'post_status' => 'publish',
            'orderby' => 'meta_value',
            'order' => $order_rounds,
            'ignore_sticky_posts' => true,
            'meta_key'    => 'round_end_time',
            'meta_type'   => 'DATETIME',
            'meta_query' => $meta_query
        );

        $wp_query->query($args);

        //get questions
        $questions  = get_posts(
            array(
                'post_type'         => 'acpgc_question',
                'posts_per_page'    => -1,
                'post_status'       => 'publish',
                'orderby' =>   'menu_order',
                'order' => 'ASC'
            )
        );

        //get choices
        $choices = get_posts(
            array(
                'post_type'         => 'acpgc_choice',
                'posts_per_page'    => -1,
                'post_status'       => 'publish',
                'orderby'           => 'menu_order',
                'order'             => 'ASC',
                'meta_query'        => array(
                    array(
                        'key'     => 'choice_active',
                        'value'   => '1',
                        'compare' => '='
                    )
                )
            )
        );


        //set the template
        $template = ACPGC_PLUGIN_TEMPLATE_DIR."/round-template.php";

        $user_id =  get_current_user_id();
        $user_predictions = [];

        $output = '';

        //if we have rounds
        if (have_posts()) :
            $output .= '<div class="l-rounds-list is-status-'.$atts['status'].'">';
            $output .= '<ul class="l-rounds-list__list">';

            while (have_posts()):
                $output .= '<li class="l-rounds-list__item">';
                the_post();

                $round_id = get_the_ID();

                $filtered_questions = [];

                // Filter questions
                foreach ($questions as $question) {
                    $include_question = get_post_meta($round_id, 'include_question_' . $question->ID, true);

                    if ($include_question) {  // This assumes that 'true' is stored as boolean true in meta data
                        $filtered_questions[] = $question;
                    }
                }



                // Set date status
                $round_start_date = get_field('round_start_time', $round_id);
                $round_start_date_raw = get_field('round_start_time', $round_id, false);
                $dt_round_start_date = new DateTime($round_start_date_raw);
                $round_end_date = get_field('round_end_time', $round_id);
                $round_end_date_raw = get_field('round_end_time', $round_id, false);
                $dt_round_end_date = new DateTime($round_end_date_raw);
                $today = new DateTime( 'now' );


                if($today > $dt_round_end_date) {
                    $round_date_status = 'closed';
                    $template = ACPGC_PLUGIN_TEMPLATE_DIR."/round-template-closed.php";
                }elseif ($today < $dt_round_start_date) {
                    $round_date_status = 'coming';
                    $template = ACPGC_PLUGIN_TEMPLATE_DIR."/round-template-coming.php";
                }else{
                    $round_date_status = 'open';
                }


                // Set answer status
                $round_answer_status = get_field('round_status', $round_id);

                $round_total = 0;

                //Get the ids of all the rounds the user predicted
                $user_rounds_predicted = $this->acpcg_get_user_rounds_predicted($user_id);

                // set user prediction status
                $round_user_prediction_status = false;

                //If the user has prediction for this round
                if(in_array($round_id, $user_rounds_predicted)){

                    //Update the prediction status
                    $round_user_prediction_status = true;

                    //Get the users predictions for this round
                    $user_predictions = ACPGC_User::acpgc_get_user_predictions($user_id, $round_id, 'ARRAY_A', 'rounds_prediction_question_id');

                    foreach ($user_predictions as $question_id => $prediction)
                    {
                        //Get the correct answer for this question
                        $correct_answers = get_field('correct_answer_' . $question_id);

                        if($correct_answers){
                            //add the answers to the array
                            foreach ($correct_answers as $answer)
                            {
                                $user_predictions[$question_id]['rounds_correct_answers'][$answer->ID]['answer_id'] = $answer->ID;
                                $user_predictions[$question_id]['rounds_correct_answers'][$answer->ID]['answer_title'] = get_the_title($answer->ID);
                            }
                        }
                    }

                    // If round is locked the answers must have been set
                    if($round_answer_status)
                    {
                        //Calculate the scores
                        foreach ($user_predictions as $question_id => $prediction)
                        {
                            $correct_score = (get_field('correct_score' , $question_id) ? get_field('correct_score' , $question_id) : 1);
                            if (isset($prediction['rounds_correct_answers']))
                            {
                                //If the choice is a correct answer
                                if (array_key_exists($prediction['rounds_prediction_choice_id'], $prediction['rounds_correct_answers']))
                                {
                                    //Update the question total
                                    $user_predictions[$question_id]['rounds_prediction_score'] = $correct_score;
                                    // update the round total
                                    $round_total += $user_predictions[$question_id]['rounds_prediction_score'];
                                } else
                                {
                                    $user_predictions[$question_id]['rounds_prediction_score'] = 0;
                                }
                            }

                        }
                    }

                }
                else{
                    $round_correct_answers = ACPGC_round::acpgc_get_round_correct_answers($round_id);
                }

                ob_start();
                ?>

                <?php include("$template"); ?>

                <?php
                $output .= ob_get_contents();
                ob_end_clean();
                $output .= '</li>';
            endwhile;



            $output .= '</ul >';
            $output .= '</div>';
        else :
            //we do not have any rounds to show
            if($atts['status'] == 'future'){
                $output .= "There are currently no future rounds.";
            }else if($atts['status'] == 'closed'){
                $output .= "Game on! currently no closed rounds.";
            }else{
                $output .= "All rounds are currently closed.";
            }

        endif;
        $wp_query = $temp_q;

        return $output;
    }

    /*
     * Get the round ids that have been predicted by the user
     */
    static function acpcg_get_user_rounds_predicted($user_id) {
        $key = 'acpgc_rounds_predicted';
        $previous_rounds = get_user_meta($user_id, $key);

        if (!is_array($previous_rounds) || empty($previous_rounds)) {
            return [];
        }

        $unserialized_data = @unserialize($previous_rounds[0]);
        return is_array($unserialized_data) ? $unserialized_data : [];
    }


    /*
     * Update the rounds predictions
     */
    static function acpgc_update_user_rounds_predicted($user_id, $round, $u = true){

        $key =  'acpgc_rounds_predicted';
        $previous_rounds = get_user_meta($user_id, $key, true );

        if($previous_rounds){

            $previous_rounds_array = unserialize($previous_rounds);

            if(in_array($round, $previous_rounds_array)){
                return;
            }

            $previous_rounds_array[] = $round;
            $serial = serialize($previous_rounds_array);
            update_user_meta( $user_id, $key, $serial);

        }else{
            $previous_rounds_array[] = $round  ;
            $serial = serialize($previous_rounds_array);
            update_user_meta( $user_id, $key, $serial);
        }

        return;

    }

    /*
     * Get Round correct answers
     */
    static function acpgc_get_round_correct_answers($round_id = false){
        //get questions
        $questions  = get_posts(
            array(
                'post_type'         => 'acpgc_question',
                'posts_per_page'    => -1,
                'post_status'       => 'publish',
                'orderby' =>   'menu_order',
                'order' => 'ASC'
            )
        );

        $question_array = [];
        foreach ($questions as $question){
            $answers_array = [];
            $answer_title_array = [];
            $question_key = 'correct_answer_' . $question->ID;
            $correct_answers = get_field($question_key, $round_id);
            if(is_array($correct_answers)){
                foreach ($correct_answers as $answer){
                    $answers_array[] = $answer->ID;
                    $answer_title_array[] = $answer->post_title;
                }
            }

            $question_array[$question->ID]['question_id'] = $question->ID;
            $question_array[$question->ID]['answers_array'] = $answers_array;
            $question_array[$question->ID]['answers_title_array'] = $answer_title_array;
        }

        return $question_array;

    }

    /*
     * Set Rounds list columns
     */
    function acpgc_create_rounds_columns($columns) {
        $columns =  array_merge($columns,
            [
                'status' => __('Statuses', 'ac-prediction-game-creator'),
                'start_date' => __('Start Date', 'ac-prediction-game-creator'),
                'end_date' => __('End Date', 'ac-prediction-game-creator')
            ]);

        $date_col =  $columns['date'];
        unset($columns['date']);
        $columns['date'] = $date_col;

        add_filter('manage_edit-acpgc_round_sortable_columns', function($columns) {
            $columns['start_date'] = 'start_date';
            $columns['end_date'] = 'end_date';
            return $columns;
        });


        return $columns;
    }


    /*
     * Set Rounds list columns
     */
    function acpgc_set_rounds_columns($column_key, $post_id) {
        switch ($column_key) {
            case 'status':
                $lock_status = get_field('round_status', $post_id) ? '<span style="font-weight:bold; color: red;">' . esc_html__('Locked', 'ac-prediction-game-creator') . '</span>' : '<span style="font-weight:bold; color: green;">' . esc_html__('Unlocked', 'ac-prediction-game-creator') . '</span>';
                $answer_status = get_post_meta($post_id, '_acpgc_all_questions_answered', true) ? '<span style="font-weight:bold; color: green;">' . esc_html__('Complete', 'ac-prediction-game-creator') . '</span>' : '<span style="font-weight:bold; color: red;">' . esc_html__('Unanswered', 'ac-prediction-game-creator') . '</span>';
                $calc_status = get_post_meta($post_id, '_acpgc_round_calculated', true) ? '<span style="font-weight:bold; color: green;">' . esc_html__('Calculated', 'ac-prediction-game-creator') . '</span>' : '<span style="font-weight:bold; color: red;">' . esc_html__('Not Calculated', 'ac-prediction-game-creator') . '</span>';

                $current_time = current_time('mysql');
                $current_timestamp = strtotime($current_time);

                $start_date_time = get_field('round_start_time', $post_id, false);
                $start_timestamp = strtotime($start_date_time, false);

                $end_date_time = get_field('round_end_time', $post_id, false);
                $end_timestamp = strtotime($end_date_time, false);

                $date_status = '';

                if ($current_timestamp < $start_timestamp) {
                    $date_status = '<span style="font-weight:bold; color: orange;">' . esc_html__('Future', 'ac-prediction-game-creator') . '</span>';
                } elseif ($current_timestamp >= $start_timestamp && $current_timestamp <= $end_timestamp) {
                    $date_status = '<span style="font-weight:bold; color: green;">' . esc_html__('Current', 'ac-prediction-game-creator') . '</span>';
                } else {
                    $date_status = '<span style="font-weight:bold; color: red;">' . esc_html__('Past', 'ac-prediction-game-creator') . '</span>';
                }
                echo 'Date : ' . $date_status;
                echo '<br>';
                echo 'Lock : ' . $lock_status;
                echo '<br>';
                echo 'Answers : ' . $answer_status;
                echo '<br>';
                echo 'Calculation : ' . $calc_status;
                break;
            case 'end_date':
                $end_date_time = get_field('round_end_time', $post_id);
                echo esc_html($end_date_time);
                break;
            case 'start_date':
                $start_date_time = get_field('round_start_time', $post_id);
                echo esc_html($start_date_time);
                break;
            default:
                break;
        }
    }



    /*
     * Sort Rounds list columns
     */
    function acpgc_sort_rounds_columns($query) {
        if (!is_admin()) {
            return;
        }

        $orderby = $query->get('orderby');
        if ($orderby == 'end_date') {
            $query->set('meta_key', 'round_end_time');
            $query->set('orderby', 'meta_value');
        }
        if ($orderby == 'start_date') {
            $query->set('meta_key', 'round_start_time');
            $query->set('orderby', 'meta_value');
        }
    }

}
