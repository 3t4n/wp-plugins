<?php
if ( ! defined( 'ABSPATH' ) ) exit; // Exit if accessed directly

class ACPGC_Background_Process extends WP_Background_Process {

    // Unique identifier for the process
    protected $action = 'acpgc_background_process';


    // Task to run for each item in the queue
    protected function task($item) {
        $action = $item['action'];
        $user_id = $item['user_id'];
        $round_id = $item['round_id'];

        if ($action == 'calculate_score') {
            $answers = $item['answers'];
            $user_round_score = ACPGC_userScore::acpgc_calculate_round_score_single_user($round_id, $answers, $user_id);
            ACPGC_userScore::acpgc_update_user_total_score($user_id, $user_round_score);
        } elseif ($action == 'subtract_score') {
            // Get the score for this round for this user.
            $single_round_score = ACPGC_userScore::acpgc_get_user_round_score($user_id, $round_id);

            // Subtract the round score from the total score
            ACPGC_userScore::acpgc_update_user_total_score($user_id, -$single_round_score); // subtract score

            // Delete this user's score for this round
            ACPGC_userScore::acpgc_delete_single_user_round_score($user_id, $round_id);
        }

        return false;
    }


    // Code to execute when the process completes
    protected function complete() {
        parent::complete();

        // Post-processing logic, maybe update a status or clear a transient
    }
}





