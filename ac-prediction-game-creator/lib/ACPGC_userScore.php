<?php
if ( ! defined( 'ABSPATH' ) ) exit; // Exit if accessed directly

class ACPGC_userScore{

    private $users = [];
    private $rounds_scored = [];

    function __construct() {
//        $this->acpgc_get_users();
//        $this->acpgc_get_rounds_scored();
//        $this->acpgc_calculate();
    }

    /*
     * Get all users ids
     */
    private function acpgc_get_users(){
        $users = get_users( array( 'fields' => array( 'ID' ) ) );;
        $this->users = $users;
        return $users;
    }

    /*
     *  Get all previouly scored rounds from wp options table
     */
    private function acpgc_get_rounds_scored()
    {
        $key = 'acpgc_rounds_scored';
        $rounds = get_option($key);

        //if previous rounds
        if($rounds){
            //Save rounds to this object
            $this->rounds_scored = unserialize($rounds);
        }else{
            //set the rounds to an empty array
            $rounds = [];
            $this->rounds_scored = $rounds;

            update_option($key, serialize($rounds));
        }

        return $rounds;
    }

    /*
     * Save the array of rounds scored to wp options
     */
    private function  acpgc_update_rounds_scored(){
        $key = 'acpgc_rounds_scored';
        update_option($key, serialize($this->rounds_scored));
    }


    static function acpgc_calculate_round_score_single_user($round_id, $answers, $user_id) {
        global $wpdb;

        $user_round_score = 0;
        $table = $wpdb->prefix . ACPGC_PREFIX . 'rounds_user_scores';

        $predictions = ACPGC_user::acpgc_get_user_predictions($user_id, $round_id, 'ARRAY_A', 'rounds_prediction_question_id');

        foreach ($answers as $question_key => $answer_id) {
            // Extracting numerical ID from the string 'correct_answer_xx'
            $question_id = intval(str_replace('correct_answer_', '', $question_key));
            $question_score = get_field('correct_score', $question_id) ?: 1;

            if (isset($predictions[$question_id])) {
                $prediction = $predictions[$question_id]['rounds_prediction_choice_id'];

                // Extract IDs from WP_Post objects
                $answer_ids = array_map(function ($post) {
                    return $post->ID;
                }, $answer_id);

                // Comparison
                if (in_array($prediction, $answer_ids)) {
                    $user_round_score += $question_score;
                }
            }
        }

        $data = array(
            'user_id' => $user_id,
            'rounds_user_score_round_id' => $round_id,
            'rounds_user_score_value' => $user_round_score,
            'created_at' => current_time('mysql'),
            'updated_at' => current_time('mysql'),
        );

        $insert = $wpdb->insert($table, $data);

        return $user_round_score;
    }


    public static function acpgc_update_user_total_score($user_id, $single_round_score) {
        // Get current total score from the database



        $current_total_score = get_user_meta($user_id, 'acpgc_user_score', true);

        // Update total score
        $new_total_score = (int) $current_total_score + $single_round_score;

        // Save new total score back to the database
        update_user_meta($user_id, 'acpgc_user_score', $new_total_score);
    }


    /**
     * Delete all 'rounds_user_score' records for a specific round.
     *
     * @param int $round_id The round ID.
     */

    static function acpgc_delete_round_scores($round_id) {
        global $wpdb;

        $table = $wpdb->prefix . ACPGC_PREFIX . 'rounds_user_scores';

        // Define the data to match for deletion
        $where = array('rounds_user_score_round_id' => $round_id);

        // Delete records that match the given round_id
        $wpdb->delete($table, $where);
    }

    //Remove the users round score
    public static function acpgc_delete_single_user_round_score($user_id, $round_id) {
        global $wpdb;

        $table = $wpdb->prefix . ACPGC_PREFIX . 'rounds_user_scores';

        // Define the conditions for deletion
        $where = array(
            'rounds_user_score_round_id' => $round_id,
            'user_id' => $user_id,
        );

        // Delete records that match the specified conditions
        $wpdb->delete($table, $where);
    }


    //Get the score for a users round
    public static function acpgc_get_user_round_score($user_id, $round_id) {
        global $wpdb;

        $table = $wpdb->prefix . ACPGC_PREFIX . 'rounds_user_scores';
        $sanitized_table = esc_sql($table); // Sanitize the table name

        // Use get_var with prepare directly
        $round_score = $wpdb->get_var($wpdb->prepare("SELECT rounds_user_score_value FROM {$sanitized_table} WHERE user_id = %d AND rounds_user_score_round_id = %d", $user_id, $round_id));

        return $round_score ? intval($round_score) : 0;
    }


}
