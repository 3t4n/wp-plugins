<?php
/**
 * Admin
 *
 * @package     GamiPress\Emails\By_Type\Admin
 * @since       1.0.0
 */
// Exit if accessed directly
if( !defined( 'ABSPATH' ) ) exit;

/**
 * Register plugin meta boxes
 *
 * @since  1.0.0
 */
function gamipress_emails_by_type_meta_boxes() {

    $post = ( isset( $_GET['post'] ) ? $_GET['post'] : '' );
    $post_type = '';

    if( isset( $_GET['post'] ) ) {
        $post_type = get_post_field( 'post_name', $_GET['post'] );
    }

    $prefix = '_gamipress_emails_by_type_';

    // -------------------------------
	// Achievement Type
    // -------------------------------

	gamipress_add_meta_box(
        'achievement-type-emails-by-type',
        __( 'Emails', 'gamipress-emails-by-type' ),
        'achievement-type',
        array(

            // Achievement Earned

            $prefix . 'achievement_earned_email_actions' => array(
                'type' => 'multi_buttons',
                'buttons' => array(
                    'achievement-earned-email-preview' => array(
                        'label' => __( 'Preview Email', 'gamipress' ),
                        'type' => 'link',
                        'link' => admin_url( 'admin.php?gamipress-action=preview_achievement_earned_email&post_type=' . $post_type ),
                        'target' => '_blank',
                    ),
                    'achievement-earned-email-send' => array(
                        'label' => __( 'Send Test Email', 'gamipress' ),
                        'type' => 'link',
                        'link' => admin_url( 'admin.php?gamipress-action=send_test_achievement_earned_email&post_type=' . $post_type ),
                        'target' => '_blank',
                    )
                ),
            ),
            $prefix . 'disable_achievement_earned_email' => array(
                'name' => __( 'Disable achievement earned email sending', 'gamipress' ),
                'desc' => __( 'Check this option to stop sending emails to users for the new achievements earned of this achievement type.', 'gamipress' ),
                'type' => 'checkbox',
                'classes' => 'gamipress-switch',
            ),
            $prefix . 'achievement_earned_email_subject' => array(
                'name' => __( 'Subject', 'gamipress' ),
                'desc' => __( 'Enter the subject line for the achievement earned email (leave blank to keep subject configured from settings).', 'gamipress' ),
                'type' => 'text',
            ),
            $prefix . 'achievement_earned_email_content' => array(
                'name' => __( 'Content', 'gamipress' ),
                'desc' => __( 'Leave blank to keep content configured from settings. Available tags:', 'gamipress' )
                    . gamipress_get_email_pattern_tags_html( 'achievement_earned' ),
                'type' => 'wysiwyg',
            ),

            // Step Completed

            $prefix . 'step_completed_email_actions' => array(
                'type' => 'multi_buttons',
                'buttons' => array(
                    'step-completed-email-preview' => array(
                        'label' => __( 'Preview Email', 'gamipress' ),
                        'type' => 'link',
                        'link' => admin_url( 'admin.php?gamipress-action=preview_step_completed_email&post_type=' . $post_type ),
                        'target' => '_blank',
                    ),
                    'step-completed-email-send' => array(
                        'label' => __( 'Send Test Email', 'gamipress' ),
                        'type' => 'link',
                        'link' => admin_url( 'admin.php?gamipress-action=send_test_step_completed_email&post_type=' . $post_type ),
                        'target' => '_blank',
                    )
                ),
            ),
            $prefix . 'disable_step_completed_email' => array(
                'name' => __( 'Disable step completed email sending', 'gamipress' ),
                'desc' => __( 'Check this option to stop sending emails to users for the new steps completed of this achievement type.', 'gamipress' ),
                'type' => 'checkbox',
                'classes' => 'gamipress-switch',
            ),
            $prefix . 'step_completed_email_subject' => array(
                'name' => __( 'Subject', 'gamipress' ),
                'desc' => __( 'Enter the subject line for the step completed email (leave blank to keep subject configured from settings).', 'gamipress' ),
                'type' => 'text',
            ),
            $prefix . 'step_completed_email_content' => array(
                'name' => __( 'Content', 'gamipress' ),
                'desc' => __( 'Leave blank to keep content configured from settings. Available tags:', 'gamipress' )
                    . gamipress_get_email_pattern_tags_html( 'step_completed' ),
                'type' => 'wysiwyg',
            ),

        ),
        array(
            'tabs' => array(
                'achievement' => array(
                    'icon' => 'dashicons-awards',
                    'title' => __( 'Achievements', 'gamipress-emails-by-type' ),
                    'fields' => array(
                        $prefix . 'achievement_earned_email_actions',
                        $prefix . 'disable_achievement_earned_email',
                        $prefix . 'achievement_earned_email_subject',
                        $prefix . 'achievement_earned_email_content'
                    ),
                ),
                'steps' => array(
                    'icon' => 'dashicons-editor-ol',
                    'title' => __( 'Steps', 'gamipress-emails-by-type' ),
                    'fields' => array(
                        $prefix . 'step_completed_email_actions',
                        $prefix . 'disable_step_completed_email',
                        $prefix . 'step_completed_email_subject',
                        $prefix . 'step_completed_email_content'
                    ),
                ),
            ),
            'vertical_tabs' => true
        )
    );

    // -------------------------------
    // Achievement
    // -------------------------------

    gamipress_add_meta_box(
        'achievement-emails-by-type',
        __( 'Emails', 'gamipress-emails-by-type' ),
        gamipress_get_achievement_types_slugs(),
        array(

            // Achievement Earned

            $prefix . 'achievement_earned_email_actions' => array(
                'type' => 'multi_buttons',
                'buttons' => array(
                    'achievement-earned-email-preview' => array(
                        'label' => __( 'Preview Email', 'gamipress' ),
                        'type' => 'link',
                        'link' => admin_url( 'admin.php?gamipress-action=preview_achievement_earned_email&post=' . $post ),
                        'target' => '_blank',
                    ),
                    'achievement-earned-email-send' => array(
                        'label' => __( 'Send Test Email', 'gamipress' ),
                        'type' => 'link',
                        'link' => admin_url( 'admin.php?gamipress-action=send_test_achievement_earned_email&post=' . $post ),
                        'target' => '_blank',
                    )
                ),
            ),
            $prefix . 'disable_achievement_earned_email' => array(
                'name' => __( 'Disable achievement earned email sending', 'gamipress' ),
                'desc' => __( 'Check this option to stop sending emails to users for earn this achievement.', 'gamipress' ),
                'type' => 'checkbox',
                'classes' => 'gamipress-switch',
            ),
            $prefix . 'achievement_earned_email_subject' => array(
                'name' => __( 'Subject', 'gamipress' ),
                'desc' => __( 'Enter the subject line for the achievement earned email (leave blank to keep subject configured from achievement type or settings).', 'gamipress' ),
                'type' => 'text',
            ),
            $prefix . 'achievement_earned_email_content' => array(
                'name' => __( 'Content', 'gamipress' ),
                'desc' => __( 'Leave blank to keep content configured from achievement type or settings. Available tags:', 'gamipress' )
                    . gamipress_get_email_pattern_tags_html( 'achievement_earned' ),
                'type' => 'wysiwyg',
            ),

            // Step Completed

            $prefix . 'step_completed_email_actions' => array(
                'type' => 'multi_buttons',
                'buttons' => array(
                    'step-completed-email-preview' => array(
                        'label' => __( 'Preview Email', 'gamipress' ),
                        'type' => 'link',
                        'link' => admin_url( 'admin.php?gamipress-action=preview_step_completed_email&post=' . $post ),
                        'target' => '_blank',
                    ),
                    'step-completed-email-send' => array(
                        'label' => __( 'Send Test Email', 'gamipress' ),
                        'type' => 'link',
                        'link' => admin_url( 'admin.php?gamipress-action=send_test_step_completed_email&post=' . $post ),
                        'target' => '_blank',
                    )
                ),
            ),
            $prefix . 'disable_step_completed_email' => array(
                'name' => __( 'Disable step completed email sending', 'gamipress' ),
                'desc' => __( 'Check this option to stop sending emails to users for the new steps completed of this achievement.', 'gamipress' ),
                'type' => 'checkbox',
                'classes' => 'gamipress-switch',
            ),
            $prefix . 'step_completed_email_subject' => array(
                'name' => __( 'Subject', 'gamipress' ),
                'desc' => __( 'Enter the subject line for the step completed email (leave blank to keep subject configured from achievement type or settings).', 'gamipress' ),
                'type' => 'text',
            ),
            $prefix . 'step_completed_email_content' => array(
                'name' => __( 'Content', 'gamipress' ),
                'desc' => __( 'Leave blank to keep content configured from achievement type or settings. Available tags:', 'gamipress' )
                    . gamipress_get_email_pattern_tags_html( 'step_completed' ),
                'type' => 'wysiwyg',
            ),

        ),
        array(
            'tabs' => array(
                'achievement' => array(
                    'icon' => 'dashicons-awards',
                    'title' => __( 'Achievements', 'gamipress-emails-by-type' ),
                    'fields' => array(
                        $prefix . 'achievement_earned_email_actions',
                        $prefix . 'disable_achievement_earned_email',
                        $prefix . 'achievement_earned_email_subject',
                        $prefix . 'achievement_earned_email_content'
                    ),
                ),
                'steps' => array(
                    'icon' => 'dashicons-editor-ol',
                    'title' => __( 'Steps', 'gamipress-emails-by-type' ),
                    'fields' => array(
                        $prefix . 'step_completed_email_actions',
                        $prefix . 'disable_step_completed_email',
                        $prefix . 'step_completed_email_subject',
                        $prefix . 'step_completed_email_content'
                    ),
                ),
            ),
            'vertical_tabs' => true
        )
    );

    // -------------------------------
    // Points Type
    // -------------------------------

    gamipress_add_meta_box(
        'points-type-emails-by-type',
        __( 'Emails', 'gamipress-emails-by-type' ),
        'points-type',
        array(

            // Points Award Completed

            $prefix . 'points_award_completed_email_actions' => array(
                'type' => 'multi_buttons',
                'buttons' => array(
                    'points-award-completed-email-preview' => array(
                        'label' => __( 'Preview Email', 'gamipress' ),
                        'type' => 'link',
                        'link' => admin_url( 'admin.php?gamipress-action=preview_points_award_completed_email&post_type=' . $post_type ),
                        'target' => '_blank',
                    ),
                    'points-award-completed-email-send' => array(
                        'label' => __( 'Send Test Email', 'gamipress' ),
                        'type' => 'link',
                        'link' => admin_url( 'admin.php?gamipress-action=send_test_points_award_completed_email&post_type=' . $post_type ),
                        'target' => '_blank',
                    )
                ),
            ),
            $prefix . 'disable_points_award_completed_email' => array(
                'name' => __( 'Disable points award email sending', 'gamipress' ),
                'desc' => __( 'Check this option to stop sending emails to users for the new points award completed of this points type.', 'gamipress' ),
                'type' => 'checkbox',
                'classes' => 'gamipress-switch',
            ),
            $prefix . 'points_award_completed_email_subject' => array(
                'name' => __( 'Subject', 'gamipress' ),
                'desc' => __( 'Enter the subject line for the points award email (leave blank to keep subject configured from settings).', 'gamipress' ),
                'type' => 'text',
            ),
            $prefix . 'points_award_completed_email_content' => array(
                'name' => __( 'Content', 'gamipress' ),
                'desc' => __( 'Leave blank to keep content configured from settings. Available tags:', 'gamipress' )
                    . gamipress_get_email_pattern_tags_html( 'points_award_completed' ),
                'type' => 'wysiwyg',
            ),

            // Points Deduct Completed

            $prefix . 'points_deduct_completed_email_actions' => array(
                'type' => 'multi_buttons',
                'buttons' => array(
                    'points-deduct-completed-email-preview' => array(
                        'label' => __( 'Preview Email', 'gamipress' ),
                        'type' => 'link',
                        'link' => admin_url( 'admin.php?gamipress-action=preview_points_deduct_completed_email&post_type=' . $post_type ),
                        'target' => '_blank',
                    ),
                    'points-deduct-completed-email-send' => array(
                        'label' => __( 'Send Test Email', 'gamipress' ),
                        'type' => 'link',
                        'link' => admin_url( 'admin.php?gamipress-action=send_test_points_deduct_completed_email&post_type=' . $post_type ),
                        'target' => '_blank',
                    )
                ),
            ),
            $prefix . 'disable_points_deduct_completed_email' => array(
                'name' => __( 'Disable points deduct email sending', 'gamipress' ),
                'desc' => __( 'Check this option to stop sending emails to users for the new points deduct of this points type.', 'gamipress' ),
                'type' => 'checkbox',
                'classes' => 'gamipress-switch',
            ),
            $prefix . 'points_deduct_completed_email_subject' => array(
                'name' => __( 'Subject', 'gamipress' ),
                'desc' => __( 'Enter the subject line for the points deduct email (leave blank to keep subject configured from settings).', 'gamipress' ),
                'type' => 'text',
            ),
            $prefix . 'points_deduct_completed_email_content' => array(
                'name' => __( 'Content', 'gamipress' ),
                'desc' => __( 'Leave blank to keep content configured from settings. Available tags:', 'gamipress' )
                    . gamipress_get_email_pattern_tags_html( 'points_deduct_completed' ),
                'type' => 'wysiwyg',
            ),

        ),
        array(
            'tabs' => array(
                'points_awards' => array(
                    'icon' => 'dashicons-star-filled',
                    'title' => __( 'Points Awards', 'gamipress-emails-by-type' ),
                    'fields' => array(
                        $prefix . 'points_award_completed_email_actions',
                        $prefix . 'disable_points_award_completed_email',
                        $prefix . 'points_award_completed_email_subject',
                        $prefix . 'points_award_completed_email_content'
                    ),
                ),
                'points_deducts' => array(
                    'icon' => 'dashicons-star-empty',
                    'title' => __( 'Points Deducts', 'gamipress-emails-by-type' ),
                    'fields' => array(
                        $prefix . 'points_deduct_completed_email_actions',
                        $prefix . 'disable_points_deduct_completed_email',
                        $prefix . 'points_deduct_completed_email_subject',
                        $prefix . 'points_deduct_completed_email_content'
                    ),
                ),
            ),
            'vertical_tabs' => true
        )
    );

    // -------------------------------
    // Rank Type
    // -------------------------------

    gamipress_add_meta_box(
        'rank-type-emails-by-type',
        __( 'Emails', 'gamipress-emails-by-type' ),
        'rank-type',
        array(

            // Rank Reached

            $prefix . 'rank_earned_email_actions' => array(
                'type' => 'multi_buttons',
                'buttons' => array(
                    'rank-earned-email-preview' => array(
                        'label' => __( 'Preview Email', 'gamipress' ),
                        'type' => 'link',
                        'link' => admin_url( 'admin.php?gamipress-action=preview_rank_earned_email&post_type=' . $post_type ),
                        'target' => '_blank',
                    ),
                    'rank-earned-email-send' => array(
                        'label' => __( 'Send Test Email', 'gamipress' ),
                        'type' => 'link',
                        'link' => admin_url( 'admin.php?gamipress-action=send_test_rank_earned_email&post_type=' . $post_type ),
                        'target' => '_blank',
                    )
                ),
            ),
            $prefix . 'disable_rank_earned_email' => array(
                'name' => __( 'Disable rank earned email sending', 'gamipress' ),
                'desc' => __( 'Check this option to stop sending emails to users for the new ranks reached of this rank type.', 'gamipress' ),
                'type' => 'checkbox',
                'classes' => 'gamipress-switch',
            ),
            $prefix . 'rank_earned_email_subject' => array(
                'name' => __( 'Subject', 'gamipress' ),
                'desc' => __( 'Enter the subject line for the rank earned email (leave blank to keep subject configured from settings).', 'gamipress' ),
                'type' => 'text',
            ),
            $prefix . 'rank_earned_email_content' => array(
                'name' => __( 'Content', 'gamipress' ),
                'desc' => __( 'Leave blank to keep content configured from settings. Available tags:', 'gamipress' )
                    . gamipress_get_email_pattern_tags_html( 'rank_earned' ),
                'type' => 'wysiwyg',
            ),

            // Rank Requirement Completed

            $prefix . 'rank_requirement_completed_email_actions' => array(
                'type' => 'multi_buttons',
                'buttons' => array(
                    'rank-requirement-completed-email-preview' => array(
                        'label' => __( 'Preview Email', 'gamipress' ),
                        'type' => 'link',
                        'link' => admin_url( 'admin.php?gamipress-action=preview_rank_requirement_completed_email&post_type=' . $post_type ),
                        'target' => '_blank',
                    ),
                    'rank-requirement-completed-email-send' => array(
                        'label' => __( 'Send Test Email', 'gamipress' ),
                        'type' => 'link',
                        'link' => admin_url( 'admin.php?gamipress-action=send_test_rank_requirement_completed_email&post_type=' . $post_type ),
                        'target' => '_blank',
                    )
                ),
            ),
            $prefix . 'disable_rank_requirement_completed_email' => array(
                'name' => __( 'Disable rank requirement completed email sending', 'gamipress' ),
                'desc' => __( 'Check this option to stop sending emails to users for the new rank requirements completed of this rank type.', 'gamipress' ),
                'type' => 'checkbox',
                'classes' => 'gamipress-switch',
            ),
            $prefix . 'rank_requirement_completed_email_subject' => array(
                'name' => __( 'Subject', 'gamipress' ),
                'desc' => __( 'Enter the subject line for the rank requirement completed email (leave blank to keep subject configured from settings).', 'gamipress' ),
                'type' => 'text',
            ),
            $prefix . 'rank_requirement_completed_email_content' => array(
                'name' => __( 'Content', 'gamipress' ),
                'desc' => __( 'Leave blank to keep content configured from settings. Available tags:', 'gamipress' )
                    . gamipress_get_email_pattern_tags_html( 'rank_requirement_completed' ),
                'type' => 'wysiwyg',
            ),

        ),
        array(
            'tabs' => array(
                'rank' => array(
                    'icon' => 'dashicons-rank',
                    'title' => __( 'Ranks', 'gamipress-emails-by-type' ),
                    'fields' => array(
                        $prefix . 'rank_earned_email_actions',
                        $prefix . 'disable_rank_earned_email',
                        $prefix . 'rank_earned_email_subject',
                        $prefix . 'rank_earned_email_content'
                    ),
                ),
                'rank_requirements' => array(
                    'icon' => 'dashicons-editor-ol',
                    'title' => __( 'Rank Requirements', 'gamipress-emails-by-type' ),
                    'fields' => array(
                        $prefix . 'rank_requirement_completed_email_actions',
                        $prefix . 'disable_rank_requirement_completed_email',
                        $prefix . 'rank_requirement_completed_email_subject',
                        $prefix . 'rank_requirement_completed_email_content'
                    ),
                ),
            ),
            'vertical_tabs' => true
        )
    );

    // -------------------------------
    // Rank
    // -------------------------------

    gamipress_add_meta_box(
        'rank-emails-by-type',
        __( 'Emails', 'gamipress-emails-by-type' ),
        gamipress_get_rank_types_slugs(),
        array(

            // Rank Reached

            $prefix . 'rank_earned_email_actions' => array(
                'type' => 'multi_buttons',
                'buttons' => array(
                    'rank-earned-email-preview' => array(
                        'label' => __( 'Preview Email', 'gamipress' ),
                        'type' => 'link',
                        'link' => admin_url( 'admin.php?gamipress-action=preview_rank_earned_email&post=' . $post ),
                        'target' => '_blank',
                    ),
                    'rank-earned-email-send' => array(
                        'label' => __( 'Send Test Email', 'gamipress' ),
                        'type' => 'link',
                        'link' => admin_url( 'admin.php?gamipress-action=send_test_rank_earned_email&post=' . $post ),
                        'target' => '_blank',
                    )
                ),
            ),
            $prefix . 'disable_rank_earned_email' => array(
                'name' => __( 'Disable rank earned email sending', 'gamipress' ),
                'desc' => __( 'Check this option to stop sending emails to users for reach this rank.', 'gamipress' ),
                'type' => 'checkbox',
                'classes' => 'gamipress-switch',
            ),
            $prefix . 'rank_earned_email_subject' => array(
                'name' => __( 'Subject', 'gamipress' ),
                'desc' => __( 'Enter the subject line for the rank earned email (leave blank to keep subject configured from rank type or settings).', 'gamipress' ),
                'type' => 'text',
            ),
            $prefix . 'rank_earned_email_content' => array(
                'name' => __( 'Content', 'gamipress' ),
                'desc' => __( 'Leave blank to keep content configured from rank type or settings. Available tags:', 'gamipress' )
                    . gamipress_get_email_pattern_tags_html( 'rank_earned' ),
                'type' => 'wysiwyg',
            ),

            // Rank Requirement Completed

            $prefix . 'rank_requirement_completed_email_actions' => array(
                'type' => 'multi_buttons',
                'buttons' => array(
                    'rank-requirement-completed-email-preview' => array(
                        'label' => __( 'Preview Email', 'gamipress' ),
                        'type' => 'link',
                        'link' => admin_url( 'admin.php?gamipress-action=preview_rank_requirement_completed_email&post=' . $post ),
                        'target' => '_blank',
                    ),
                    'rank-requirement-completed-email-send' => array(
                        'label' => __( 'Send Test Email', 'gamipress' ),
                        'type' => 'link',
                        'link' => admin_url( 'admin.php?gamipress-action=send_test_rank_requirement_completed_email&post=' . $post ),
                        'target' => '_blank',
                    )
                ),
            ),
            $prefix . 'disable_rank_requirement_completed_email' => array(
                'name' => __( 'Disable rank requirement completed email sending', 'gamipress' ),
                'desc' => __( 'Check this option to stop sending emails to users for the new rank requirements completed of this rank.', 'gamipress' ),
                'type' => 'checkbox',
                'classes' => 'gamipress-switch',
            ),
            $prefix . 'rank_requirement_completed_email_subject' => array(
                'name' => __( 'Subject', 'gamipress' ),
                'desc' => __( 'Enter the subject line for the rank requirement completed email (leave blank to keep subject configured from rank type or settings).', 'gamipress' ),
                'type' => 'text',
            ),
            $prefix . 'rank_requirement_completed_email_content' => array(
                'name' => __( 'Content', 'gamipress' ),
                'desc' => __( 'Leave blank to keep content configured from rank type or settings. Available tags:', 'gamipress' )
                    . gamipress_get_email_pattern_tags_html( 'rank_requirement_completed' ),
                'type' => 'wysiwyg',
            ),

        ),
        array(
            'tabs' => array(
                'rank' => array(
                    'icon' => 'dashicons-rank',
                    'title' => __( 'Ranks', 'gamipress-emails-by-type' ),
                    'fields' => array(
                        $prefix . 'rank_earned_email_actions',
                        $prefix . 'disable_rank_earned_email',
                        $prefix . 'rank_earned_email_subject',
                        $prefix . 'rank_earned_email_content'
                    ),
                ),
                'rank_requirements' => array(
                    'icon' => 'dashicons-editor-ol',
                    'title' => __( 'Rank Requirements', 'gamipress-emails-by-type' ),
                    'fields' => array(
                        $prefix . 'rank_requirement_completed_email_actions',
                        $prefix . 'disable_rank_requirement_completed_email',
                        $prefix . 'rank_requirement_completed_email_subject',
                        $prefix . 'rank_requirement_completed_email_content'
                    ),
                ),
            ),
            'vertical_tabs' => true
        )
    );

}
add_action( 'cmb2_admin_init', 'gamipress_emails_by_type_meta_boxes' );

/**
 * GamiPress Emails By Type automatic updates
 *
 * @since  1.0.0
 *
 * @param array $automatic_updates_plugins
 *
 * @return array
 */
function gamipress_emails_by_type_automatic_updates( $automatic_updates_plugins ) {

    $automatic_updates_plugins['gamipress-emails-by-type'] = __( 'Emails By Type', 'gamipress-emails-by-type' );

    return $automatic_updates_plugins;
}
add_filter( 'gamipress_automatic_updates_plugins', 'gamipress_emails_by_type_automatic_updates' );