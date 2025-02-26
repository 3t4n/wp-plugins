<?php

// Exits if accessed directly.
if ( ! defined( 'ABSPATH' ) ) {
    exit;
}

/**
 * Class that handles displaying of review notice
 *
 * @since 1.0.2
 */
class ANBU_Review_Manager {

    /**
     * Variable to hold how many results needed to show message
     *
     * @since 1.0.2
     */
    public $trigger = -1;

    /**
     * Main Construct Function
     *
     * Adds the notice check to init and then check to display message
     *
     * @since 1.0.2
     */
    public function __construct() {
        add_action( 'admin_init', array( $this, 'check_message_display' ) );
    }

    /**
     * Checks if message should be displayed
     *
     * @since 1.0.2
     */
    public function check_message_display() {
        if ( ! current_user_can( 'activate_plugins' ) ) {
            return;
        }
        $this->admin_notice_check();
        $this->trigger = $this->check_message_trigger();
        if ( -1 !== $this->trigger ) {
            if ( ! empty( $this->trigger ) && $this->trigger < strtotime( '-1 week' ) ) {
                add_action( 'admin_notices', array( $this, 'display_admin_message' ) );
            }
        }
    }


    /**
     * Retrieves what the next trigger value is
     *
     * @since 1.0.2
     * @return int The amount of results needed to display message
     */
    public function check_message_trigger() {
        $trigger = get_option( 'anbu_review_message_trigger' );
        if ( empty( $trigger ) ) {
            add_option( 'anbu_review_message_trigger', time() );
            return time();
        }
        return intval( $trigger );
    }

    /**
     * Displays the message
     *
     * Displays the message asking for review
     *
     * @since 1.0.2
     */
    public function display_admin_message() {
        $already_url  = add_query_arg( 'anbu_review_notice_check', 'already_did' );
        $nope_url     = add_query_arg( 'anbu_review_notice_check', 'remove_message' );
        ?>
        <style>
            .anbu-review-message strong {
                display: block;
            }
            .anbu-review-message .anbu-review-message-action-links {
                margin-top: 15px;
            }
        </style>
        <div class="updated anbu-review-message">
            <p>
                <?php
                echo sprintf( __('Greetings! I noticed that you have been using the Analytics Buddy plugin for over a week now. That is
		awesome! Could you please help me out by giving this plugin a 5-star rating on WordPress? This
		will help me by helping other users discover this plugin. %s', 'analytics-buddy'),
                    '<strong><em>~ Frank Corso</em></strong>'
                );
                ?>
            </p>
            <p class="anbu-review-message-action-links">
                <a target="_blank" href="http://bit.ly/analytics-buddy-review" class="button-primary"><?php esc_html_e( 'Yeah, you deserve it!', 'analytics-buddy' ); ?></a>
                <a href="<?php echo esc_url( $already_url ); ?>" class="button-secondary"><?php esc_html_e( 'I already did!', 'analytics-buddy' ); ?></a>
                <a href="<?php echo esc_url( $nope_url ); ?>" class="button-secondary"><?php esc_html_e( 'No, this plugin is not good enough', 'analytics-buddy' ); ?></a>
            </p>
        </div>
        <?php
    }

    /**
     * Checks if a link in the admin message has been clicked
     *
     * @since 1.0.2
     */
    public function admin_notice_check() {
        if ( isset( $_GET['anbu_review_notice_check'] ) && 'remove_message' == $_GET['anbu_review_notice_check'] ) {
            update_option( 'anbu_review_message_trigger', -1 );
        }
        if ( isset( $_GET['anbu_review_notice_check'] ) && 'already_did' == $_GET['anbu_review_notice_check'] ) {
            update_option( 'anbu_review_message_trigger', -1 );
        }
    }
}

$anbu_review_manager = new ANBU_Review_Manager();
?>
