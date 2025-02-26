<?php
/**
 * Ask Question
 *
 * @package     AutomatorWP\Integrations\AnsPress\Triggers\Ask_Question
 * @author      AutomatorWP <contact@automatorwp.com>, Ruben Garcia <rubengcdev@gmail.com>
 * @since       1.0.0
 */
// Exit if accessed directly
if( !defined( 'ABSPATH' ) ) exit;

class AutomatorWP_AnsPress_Ask_Question extends AutomatorWP_Integration_Trigger {

    public $integration = 'anspress';
    public $trigger = 'anspress_ask_question';

    /**
     * Register the trigger
     *
     * @since 1.0.0
     */
    public function register() {

        automatorwp_register_trigger( $this->trigger, array(
            'integration'       => $this->integration,
            'label'             => __( 'User asks a question', 'automatorwp-anspress-integration' ),
            'select_option'     => __( 'User <strong>asks a question</strong>', 'automatorwp-anspress-integration' ),
            /* translators: %1$s: Number of times. */
            'edit_label'        => sprintf( __( 'User asks a question %1$s time(s)', 'automatorwp-anspress-integration' ), '{times}' ),
            'log_label'         => __( 'User asks a question', 'automatorwp-anspress-integration' ),
            'action'            => 'ap_after_new_question',
            'function'          => array( $this, 'listener' ),
            'priority'          => 10,
            'accepted_args'     => 2,
            'options'           => array(
                'times' => automatorwp_utilities_times_option(),
            ),
            'tags' => array_merge(
                automatorwp_utilities_post_tags( __( 'Question', 'automatorwp-anspress-integration' ) ),
                automatorwp_utilities_times_tag()
            )
        ) );

    }

    /**
     * Trigger listener
     *
     * @since 1.0.0
     *
     * @param int       $post_id
     * @param WP_Post   $post
     */
    public function listener( $post_id, $post ) {

        $user_id = $post->post_author;

        automatorwp_trigger_event( array(
            'trigger' => $this->trigger,
            'user_id' => $user_id,
            'post_id' => $post_id,
        ) );

    }

}

new AutomatorWP_AnsPress_Ask_Question();