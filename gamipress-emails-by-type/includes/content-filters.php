<?php
/**
 * Content Filters
 *
 * @package     GamiPress\Emails\By_Type\Content_Filters
 * @since       1.0.0
 */
// Exit if accessed directly
if( !defined( 'ABSPATH' ) ) exit;

/* ------------------------
 * ACHIEVEMENT
   ------------------------ */

/**
 * Override the achievement email disable status
 *
 * @since 1.0.0
 *
 * @param bool $return
 * @param integer $user_id
 * @param integer $achievement_id
 *
 * @return bool True to disable
 */
function gamipress_emails_by_type_disable_achievement_earned_email( $return, $user_id, $achievement_id ) {

    $prefix = '_gamipress_emails_by_type_';

    // Achievement

    // Bail if achievements emails are disabled for this achievement
    if( (bool) gamipress_get_post_meta( $achievement_id, $prefix . 'disable_achievement_earned_email' ) ) {
        return true;
    }

    // Achievement Type

    // Get the achievement type ID (where is stored our custom config)
    $achievement_types = gamipress_get_achievement_types();
    $achievement_type = $achievement_types[get_post_type( $achievement_id )];

    // Bail if achievements emails are disabled for this type
    if( (bool) gamipress_get_post_meta( $achievement_type['ID'], $prefix . 'disable_achievement_earned_email', true ) ) {
        return true;
    }

    return $return;

}
add_filter( 'gamipress_disable_achievement_earned_email', 'gamipress_emails_by_type_disable_achievement_earned_email', 10, 3 );

/**
 * Override the achievement email subject
 *
 * @since 1.0.0
 *
 * @param string $return
 * @param integer $user_id
 * @param integer $achievement_id
 *
 * @return string
 */
function gamipress_emails_by_type_achievement_earned_email_subject( $return, $user_id, $achievement_id ) {

    $prefix = '_gamipress_emails_by_type_';

    // Achievement

    // Get achievement custom subject
    $subject = gamipress_get_post_meta( $achievement_id, $prefix . 'achievement_earned_email_subject' );

    // If not empty, override
    if( ! empty( $subject ) ) {
        return $subject;
    }

    // Achievement Type

    // Get the achievement type ID (where is stored our custom config)
    $achievement_types = gamipress_get_achievement_types();
    $achievement_type = $achievement_types[get_post_type( $achievement_id )];

    // Get achievement type custom subject
    $subject = gamipress_get_post_meta( $achievement_type['ID'], $prefix . 'achievement_earned_email_subject' );

    // If not empty, override
    if( ! empty( $subject ) ) {
        return $subject;
    }

    return $return;

}
add_filter( 'gamipress_achievement_earned_email_subject', 'gamipress_emails_by_type_achievement_earned_email_subject', 10, 3 );

/**
 * Override the achievement email content
 *
 * @since 1.0.0
 *
 * @param string $return
 * @param integer $user_id
 * @param integer $achievement_id
 *
 * @return string
 */
function gamipress_emails_by_type_achievement_earned_email_content( $return, $user_id, $achievement_id ) {

    $prefix = '_gamipress_emails_by_type_';

    // Achievement

    // Get achievement custom content
    $content = gamipress_get_post_meta( $achievement_id, $prefix . 'achievement_earned_email_content' );

    // If not empty, override
    if( ! empty( $content ) ) {
        return $content;
    }

    // Achievement Type

    // Get the achievement type ID (where is stored our custom config)
    $achievement_types = gamipress_get_achievement_types();
    $achievement_type = $achievement_types[get_post_type( $achievement_id )];

    // Get achievement type custom content
    $content = gamipress_get_post_meta( $achievement_type['ID'], $prefix . 'achievement_earned_email_content' );

    // If not empty, override
    if( ! empty( $content ) ) {
        return $content;
    }

    return $return;

}
add_filter( 'gamipress_achievement_earned_email_content', 'gamipress_emails_by_type_achievement_earned_email_content', 10, 3 );

/**
 * Override the achievement email subject on preview
 *
 * @since 1.0.0
 *
 * @param string $return
 *
 * @return string
 */
function gamipress_emails_by_type_preview_achievement_earned_email_subject( $return ) {

    $prefix = '_gamipress_emails_by_type_';

    $post = ( isset( $_GET['post'] ) ? $_GET['post'] : '' );
    $post_type = ( isset( $_GET['post_type'] ) ? $_GET['post_type'] : '' );

    // Achievement

    if( ! empty( $post ) ) {

        // Get achievement custom subject
        $subject = gamipress_get_post_meta( $post, $prefix . 'achievement_earned_email_subject' );

        // If not empty, override
        if( ! empty( $subject ) ) {
            return $subject;
        }

        $post_type = get_post_type( $post );

    }

    // Achievement Type

    if( ! empty( $post_type ) ) {

        // Get the achievement type ID (where is stored our custom config)
        $achievement_types = gamipress_get_achievement_types();
        $achievement_type = $achievement_types[$post_type];

        // Get achievement type custom subject
        $subject = gamipress_get_post_meta( $achievement_type['ID'], $prefix . 'achievement_earned_email_subject' );

        // If not empty, override
        if( ! empty( $subject ) ) {
            return $subject;
        }

    }

    return $return;

}
add_filter( 'gamipress_preview_achievement_earned_email_subject', 'gamipress_emails_by_type_preview_achievement_earned_email_subject' );
add_filter( 'gamipress_send_test_achievement_earned_email_subject', 'gamipress_emails_by_type_preview_achievement_earned_email_subject' );

/**
 * Override the achievement email content on preview
 *
 * @since 1.0.0
 *
 * @param string $return
 *
 * @return string
 */
function gamipress_emails_by_type_preview_achievement_earned_email_content( $return ) {

    $prefix = '_gamipress_emails_by_type_';

    $post = ( isset( $_GET['post'] ) ? $_GET['post'] : '' );
    $post_type = ( isset( $_GET['post_type'] ) ? $_GET['post_type'] : '' );

    // Achievement

    if( ! empty( $post ) ) {

        // Get achievement custom content
        $content = gamipress_get_post_meta( $post, $prefix . 'achievement_earned_email_content' );

        // If not empty, override
        if( ! empty( $content ) ) {
            return $content;
        }

        $post_type = get_post_type( $post );

    }

    // Achievement Type

    if( ! empty( $post_type ) ) {

        // Get the achievement type ID (where is stored our custom config)
        $achievement_types = gamipress_get_achievement_types();
        $achievement_type = $achievement_types[$post_type];

        // Get achievement type custom content
        $content = gamipress_get_post_meta( $achievement_type['ID'], $prefix . 'achievement_earned_email_content' );

        // If not empty, override
        if( ! empty( $content ) ) {
            return $content;
        }

    }

    return $return;

}
add_filter( 'gamipress_preview_achievement_earned_email_content', 'gamipress_emails_by_type_preview_achievement_earned_email_content' );
add_filter( 'gamipress_send_test_achievement_earned_email_content', 'gamipress_emails_by_type_preview_achievement_earned_email_content' );

/* ------------------------
 * STEP
   ------------------------ */

/**
 * Override the step email disable status
 *
 * @since 1.0.0
 *
 * @param bool $return
 * @param integer $user_id
 * @param integer $step_id
 * @param WP_Post $achievement
 *
 * @return bool True to disable
 */
function gamipress_emails_by_type_disable_step_completed_email( $return, $user_id, $step_id, $achievement ) {

    $prefix = '_gamipress_emails_by_type_';

    // Achievement

    // Bail if steps emails are disabled for this achievement
    if( (bool) gamipress_get_post_meta( $achievement->ID, $prefix . 'disable_step_completed_email' ) ) {
        return true;
    }

    // Achievement Type

    // Get the achievement type ID (where is stored our custom config)
    $achievement_types = gamipress_get_achievement_types();
    $achievement_type = $achievement_types[$achievement->post_type];

    // Bail if steps emails are disabled for this type
    if( (bool) gamipress_get_post_meta( $achievement_type['ID'], $prefix . 'disable_step_completed_email' ) ) {
        return true;
    }

    return $return;

}
add_filter( 'gamipress_disable_step_completed_email', 'gamipress_emails_by_type_disable_step_completed_email', 10, 4 );

/**
 * Override the step email subject
 *
 * @since 1.0.0
 *
 * @param string $return
 * @param integer $user_id
 * @param integer $step_id
 * @param WP_Post $achievement
 *
 * @return string
 */
function gamipress_emails_by_type_step_completed_email_subject( $return, $user_id, $step_id, $achievement ) {

    $prefix = '_gamipress_emails_by_type_';

    // Achievement

    // Get achievement custom subject
    $subject = gamipress_get_post_meta( $achievement->ID, $prefix . 'step_completed_email_subject' );

    // If not empty, override
    if( ! empty( $subject ) ) {
        return $subject;
    }

    // Achievement Type

    // Get the achievement type ID (where is stored our custom config)
    $achievement_types = gamipress_get_achievement_types();
    $achievement_type = $achievement_types[$achievement->post_type];

    // Get achievement type custom subject
    $subject = gamipress_get_post_meta( $achievement_type['ID'], $prefix . 'step_completed_email_subject' );

    // If not empty, override
    if( ! empty( $subject ) ) {
        return $subject;
    }

    return $return;

}
add_filter( 'gamipress_step_completed_email_subject', 'gamipress_emails_by_type_step_completed_email_subject', 10, 4 );

/**
 * Override the step email content
 *
 * @since 1.0.0
 *
 * @param string $return
 * @param integer $user_id
 * @param integer $step_id
 * @param WP_Post $achievement
 *
 * @return string
 */
function gamipress_emails_by_type_step_completed_email_content( $return, $user_id, $step_id, $achievement ) {

    $prefix = '_gamipress_emails_by_type_';

    // Achievement

    // Get achievement custom content
    $content = gamipress_get_post_meta( $achievement->ID, $prefix . 'step_completed_email_content' );

    // If not empty, override
    if( ! empty( $content ) ) {
        return $content;
    }

    // Achievement Type

    // Get the achievement type ID (where is stored our custom config)
    $achievement_types = gamipress_get_achievement_types();
    $achievement_type = $achievement_types[$achievement->post_type];

    // Get achievement type custom content
    $content = gamipress_get_post_meta( $achievement_type['ID'], $prefix . 'step_completed_email_content' );

    // If not empty, override
    if( ! empty( $content ) ) {
        return $content;
    }

    return $return;

}
add_filter( 'gamipress_step_completed_email_content', 'gamipress_emails_by_type_step_completed_email_content', 10, 4 );

/**
 * Override the step email subject on preview
 *
 * @since 1.0.0
 *
 * @param string $return
 *
 * @return string
 */
function gamipress_emails_by_type_preview_step_completed_email_subject( $return ) {

    $prefix = '_gamipress_emails_by_type_';

    $post = ( isset( $_GET['post'] ) ? $_GET['post'] : '' );
    $post_type = ( isset( $_GET['post_type'] ) ? $_GET['post_type'] : '' );

    // Achievement

    if( ! empty( $post ) ) {

        // Get achievement custom subject
        $subject = gamipress_get_post_meta( $post, $prefix . 'step_completed_email_subject' );

        // If not empty, override
        if( ! empty( $subject ) ) {
            return $subject;
        }

        $post_type = get_post_type( $post );

    }

    // Achievement Type

    if( ! empty( $post_type ) ) {

        // Get the achievement type ID (where is stored our custom config)
        $achievement_types = gamipress_get_achievement_types();
        $achievement_type = $achievement_types[$post_type];

        // Get achievement type custom subject
        $subject = gamipress_get_post_meta( $achievement_type['ID'], $prefix . 'step_completed_email_subject' );

        // If not empty, override
        if( ! empty( $subject ) ) {
            return $subject;
        }

    }

    return $return;

}
add_filter( 'gamipress_preview_step_completed_email_subject', 'gamipress_emails_by_type_preview_step_completed_email_subject' );
add_filter( 'gamipress_send_test_step_completed_email_subject', 'gamipress_emails_by_type_preview_step_completed_email_subject' );

/**
 * Override the step email content on preview
 *
 * @since 1.0.0
 *
 * @param string $return
 *
 * @return string
 */
function gamipress_emails_by_type_preview_step_completed_email_content( $return ) {

    $prefix = '_gamipress_emails_by_type_';

    $post = ( isset( $_GET['post'] ) ? $_GET['post'] : '' );
    $post_type = ( isset( $_GET['post_type'] ) ? $_GET['post_type'] : '' );

    // Achievement

    if( ! empty( $post ) ) {

        // Get achievement custom content
        $content = gamipress_get_post_meta( $post, $prefix . 'step_completed_email_content' );

        // If not empty, override
        if( ! empty( $content ) ) {
            return $content;
        }

        $post_type = get_post_type( $post );

    }

    // Achievement Type

    if( ! empty( $post_type ) ) {

        // Get the achievement type ID (where is stored our custom config)
        $achievement_types = gamipress_get_achievement_types();
        $achievement_type = $achievement_types[$post_type];

        // Get achievement type custom content
        $content = gamipress_get_post_meta( $achievement_type['ID'], $prefix . 'step_completed_email_content' );

        // If not empty, override
        if( ! empty( $content ) ) {
            return $content;
        }

    }

    return $return;

}
add_filter( 'gamipress_preview_step_completed_email_content', 'gamipress_emails_by_type_preview_step_completed_email_content' );
add_filter( 'gamipress_send_test_step_completed_email_content', 'gamipress_emails_by_type_preview_step_completed_email_content' );

/* ------------------------
 * POINTS AWARD
   ------------------------ */

/**
 * Override the points award email disable status
 *
 * @since 1.0.0
 *
 * @param bool $return
 * @param integer $user_id
 * @param integer $points_award_id
 *
 * @return bool True to disable
 */
function gamipress_emails_by_type_disable_points_award_completed_email( $return, $user_id, $points_award_id ) {

    $prefix = '_gamipress_emails_by_type_';

    // Get the points type ID (where is stored our custom config)
    $points_type = gamipress_get_points_award_points_type( $points_award_id );

    // Bail if points awards emails are disabled for this type
    if( (bool) gamipress_get_post_meta( $points_type->ID, $prefix . 'disable_points_award_completed_email' ) ) {
        return true;
    }

    return $return;

}
add_filter( 'gamipress_disable_points_award_completed_email', 'gamipress_emails_by_type_disable_points_award_completed_email', 10, 3 );

/**
 * Override the points award email subject
 *
 * @since 1.0.0
 *
 * @param string $return
 * @param integer $user_id
 * @param integer $points_award_id
 *
 * @return string
 */
function gamipress_emails_by_type_points_award_completed_email_subject( $return, $user_id, $points_award_id ) {

    $prefix = '_gamipress_emails_by_type_';

    // Get the points type ID (where is stored our custom config)
    $points_type = gamipress_get_points_award_points_type( $points_award_id );

    // Get the custom subject
    $subject = gamipress_get_post_meta( $points_type->ID, $prefix . 'points_award_completed_email_subject' );

    // If not empty, override
    if( ! empty( $subject ) ) {
        $return = $subject;
    }

    return $return;

}
add_filter( 'gamipress_points_award_completed_email_subject', 'gamipress_emails_by_type_points_award_completed_email_subject', 10, 3 );

/**
 * Override the points award email content
 *
 * @since 1.0.0
 *
 * @param string $return
 * @param integer $user_id
 * @param integer $points_award_id
 *
 * @return string
 */
function gamipress_emails_by_type_points_award_completed_email_content( $return, $user_id, $points_award_id ) {

    $prefix = '_gamipress_emails_by_type_';

    // Get the points type ID (where is stored our custom config)
    $points_type = gamipress_get_points_award_points_type( $points_award_id );

    // Get the custom content
    $content = gamipress_get_post_meta( $points_type->ID, $prefix . 'points_award_completed_email_content' );

    // If not empty, override
    if( ! empty( $content ) ) {
        $return = $content;
    }

    return $return;

}
add_filter( 'gamipress_points_award_completed_email_content', 'gamipress_emails_by_type_points_award_completed_email_content', 10, 3 );

/**
 * Override the points award email subject on preview
 *
 * @since 1.0.0
 *
 * @param string $return
 *
 * @return string
 */
function gamipress_emails_by_type_preview_points_award_completed_email_subject( $return ) {

    if( ! isset( $_GET['post_type'] ) ) {
        return $return;
    }

    $prefix = '_gamipress_emails_by_type_';

    // Get the points type ID (where is stored our custom config)
    $points_types = gamipress_get_points_types();
    $points_type = $points_types[$_GET['post_type']];

    // Get the custom subject
    $subject = gamipress_get_post_meta( $points_type['ID'], $prefix . 'points_award_completed_email_subject' );

    // If not empty, override
    if( ! empty( $subject ) ) {
        $return = $subject;
    }

    return $return;

}
add_filter( 'gamipress_preview_points_award_completed_email_subject', 'gamipress_emails_by_type_preview_points_award_completed_email_subject' );
add_filter( 'gamipress_send_test_points_award_completed_email_subject', 'gamipress_emails_by_type_preview_points_award_completed_email_subject' );

/**
 * Override the points award email content on preview
 *
 * @since 1.0.0
 *
 * @param string $return
 *
 * @return string
 */
function gamipress_emails_by_type_preview_points_award_completed_email_content( $return ) {

    if( ! isset( $_GET['post_type'] ) ) {
        return $return;
    }

    $prefix = '_gamipress_emails_by_type_';

    // Get the points type ID (where is stored our custom config)
    $points_types = gamipress_get_points_types();
    $points_type = $points_types[$_GET['post_type']];

    // Get the custom content
    $content = gamipress_get_post_meta( $points_type['ID'], $prefix . 'points_award_completed_email_content' );

    // If not empty, override
    if( ! empty( $content ) ) {
        $return = $content;
    }

    return $return;

}
add_filter( 'gamipress_preview_points_award_completed_email_content', 'gamipress_emails_by_type_preview_points_award_completed_email_content' );
add_filter( 'gamipress_send_test_points_award_completed_email_content', 'gamipress_emails_by_type_preview_points_award_completed_email_content' );

/* ------------------------
 * POINTS DEDUCT
   ------------------------ */

/**
 * Override the points deduct email disable status
 *
 * @since 1.0.0
 *
 * @param bool $return
 * @param integer $user_id
 * @param integer $points_deduct_id
 *
 * @return bool True to disable
 */
function gamipress_emails_by_type_disable_points_deduct_completed_email( $return, $user_id, $points_deduct_id ) {

    $prefix = '_gamipress_emails_by_type_';

    // Get the points type ID (where is stored our custom config)
    $points_type = gamipress_get_points_deduct_points_type( $points_deduct_id );

    // Bail if points deducts emails are disabled for this type
    if( (bool) gamipress_get_post_meta( $points_type->ID, $prefix . 'disable_points_deduct_completed_email' ) ) {
        return true;
    }

    return $return;

}
add_filter( 'gamipress_disable_points_deduct_completed_email', 'gamipress_emails_by_type_disable_points_deduct_completed_email', 10, 3 );

/**
 * Override the points deduct email subject
 *
 * @since 1.0.0
 *
 * @param string $return
 * @param integer $user_id
 * @param integer $points_deduct_id
 *
 * @return string
 */
function gamipress_emails_by_type_points_deduct_completed_email_subject( $return, $user_id, $points_deduct_id ) {

    $prefix = '_gamipress_emails_by_type_';

    // Get the points type ID (where is stored our custom config)
    $points_type = gamipress_get_points_deduct_points_type( $points_deduct_id );

    // Get the custom subject
    $subject = gamipress_get_post_meta( $points_type->ID, $prefix . 'points_deduct_completed_email_subject' );

    // If not empty, override
    if( ! empty( $subject ) ) {
        $return = $subject;
    }

    return $return;

}
add_filter( 'gamipress_points_deduct_completed_email_subject', 'gamipress_emails_by_type_points_deduct_completed_email_subject', 10, 3 );

/**
 * Override the points deduct email content
 *
 * @since 1.0.0
 *
 * @param string $return
 * @param integer $user_id
 * @param integer $points_deduct_id
 *
 * @return string
 */
function gamipress_emails_by_type_points_deduct_completed_email_content( $return, $user_id, $points_deduct_id ) {

    $prefix = '_gamipress_emails_by_type_';

    // Get the points type ID (where is stored our custom config)
    $points_type = gamipress_get_points_deduct_points_type( $points_deduct_id );

    // Get the custom content
    $content = gamipress_get_post_meta( $points_type->ID, $prefix . 'points_deduct_completed_email_content' );

    // If not empty, override
    if( ! empty( $content ) ) {
        $return = $content;
    }

    return $return;

}
add_filter( 'gamipress_points_deduct_completed_email_content', 'gamipress_emails_by_type_points_deduct_completed_email_content', 10, 3 );

/**
 * Override the points deduct email subject on preview
 *
 * @since 1.0.0
 *
 * @param string $return
 *
 * @return string
 */
function gamipress_emails_by_type_preview_points_deduct_completed_email_subject( $return ) {

    if( ! isset( $_GET['post_type'] ) ) {
        return $return;
    }

    $prefix = '_gamipress_emails_by_type_';

    // Get the points type ID (where is stored our custom config)
    $points_types = gamipress_get_points_types();
    $points_type = $points_types[$_GET['post_type']];

    // Get the custom subject
    $subject = gamipress_get_post_meta( $points_type['ID'], $prefix . 'points_deduct_completed_email_subject' );

    // If not empty, override
    if( ! empty( $subject ) ) {
        $return = $subject;
    }

    return $return;

}
add_filter( 'gamipress_preview_points_deduct_completed_email_subject', 'gamipress_emails_by_type_preview_points_deduct_completed_email_subject' );
add_filter( 'gamipress_send_test_points_deduct_completed_email_subject', 'gamipress_emails_by_type_preview_points_deduct_completed_email_subject' );

/**
 * Override the points deduct email content on preview
 *
 * @since 1.0.0
 *
 * @param string $return
 *
 * @return string
 */
function gamipress_emails_by_type_preview_points_deduct_completed_email_content( $return ) {

    if( ! isset( $_GET['post_type'] ) ) {
        return $return;
    }

    $prefix = '_gamipress_emails_by_type_';

    // Get the points type ID (where is stored our custom config)
    $points_types = gamipress_get_points_types();
    $points_type = $points_types[$_GET['post_type']];

    // Get the custom content
    $content = gamipress_get_post_meta( $points_type['ID'], $prefix . 'points_deduct_completed_email_content' );

    // If not empty, override
    if( ! empty( $content ) ) {
        $return = $content;
    }

    return $return;

}
add_filter( 'gamipress_preview_points_deduct_completed_email_content', 'gamipress_emails_by_type_preview_points_deduct_completed_email_content' );
add_filter( 'gamipress_send_test_points_deduct_completed_email_content', 'gamipress_emails_by_type_preview_points_deduct_completed_email_content' );

/* ------------------------
 * RANK
   ------------------------ */

/**
 * Override the rank email disable status
 *
 * @since 1.0.0
 *
 * @param bool $return
 * @param integer $user_id
 * @param integer $rank_id
 *
 * @return bool True to disable
 */
function gamipress_emails_by_type_disable_rank_earned_email( $return, $user_id, $rank_id ) {

    $prefix = '_gamipress_emails_by_type_';

    // Rank

    // Bail if ranks emails are disabled for this rank
    if( (bool) gamipress_get_post_meta( $rank_id, $prefix . 'disable_rank_earned_email' ) ) {
        return true;
    }

    // Rank Type

    // Get the rank type ID (where is stored our custom config)
    $rank_types = gamipress_get_rank_types();
    $rank_type = $rank_types[get_post_type( $rank_id )];

    // Bail if ranks emails are disabled for this type
    if( (bool) gamipress_get_post_meta( $rank_type['ID'], $prefix . 'disable_rank_earned_email' ) ) {
        return true;
    }

    return $return;

}
add_filter( 'gamipress_disable_rank_earned_email', 'gamipress_emails_by_type_disable_rank_earned_email', 10, 3 );

/**
 * Override the rank email subject
 *
 * @since 1.0.0
 *
 * @param string $return
 * @param integer $user_id
 * @param integer $rank_id
 *
 * @return string
 */
function gamipress_emails_by_type_rank_earned_email_subject( $return, $user_id, $rank_id ) {

    $prefix = '_gamipress_emails_by_type_';

    // Rank

    // Get rank custom subject
    $subject = gamipress_get_post_meta( $rank_id, $prefix . 'rank_earned_email_subject' );

    // If not empty, override
    if( ! empty( $subject ) ) {
        return $subject;
    }

    // Rank Type

    // Get the rank type ID (where is stored our custom config)
    $rank_types = gamipress_get_rank_types();
    $rank_type = $rank_types[get_post_type( $rank_id )];

    // Get rank type custom subject
    $subject = gamipress_get_post_meta( $rank_type['ID'], $prefix . 'rank_earned_email_subject' );

    // If not empty, override
    if( ! empty( $subject ) ) {
        return $subject;
    }

    return $return;

}
add_filter( 'gamipress_rank_earned_email_subject', 'gamipress_emails_by_type_rank_earned_email_subject', 10, 3 );

/**
 * Override the rank email content
 *
 * @since 1.0.0
 *
 * @param string $return
 * @param integer $user_id
 * @param integer $rank_id
 *
 * @return string
 */
function gamipress_emails_by_type_rank_earned_email_content( $return, $user_id, $rank_id ) {

    $prefix = '_gamipress_emails_by_type_';

    // Rank

    // Get rank custom content
    $content = gamipress_get_post_meta( $rank_id, $prefix . 'rank_earned_email_content' );

    // If not empty, override
    if( ! empty( $content ) ) {
        return $content;
    }

    // Rank Type

    // Get the rank type ID (where is stored our custom config)
    $rank_types = gamipress_get_rank_types();
    $rank_type = $rank_types[get_post_type( $rank_id )];

    // Get rank type custom content
    $content = gamipress_get_post_meta( $rank_type['ID'], $prefix . 'rank_earned_email_content' );

    // If not empty, override
    if( ! empty( $content ) ) {
        return $content;
    }

    return $return;

}
add_filter( 'gamipress_rank_earned_email_content', 'gamipress_emails_by_type_rank_earned_email_content', 10, 3 );

/**
 * Override the rank email subject on preview
 *
 * @since 1.0.0
 *
 * @param string $return
 *
 * @return string
 */
function gamipress_emails_by_type_preview_rank_earned_email_subject( $return ) {

    $prefix = '_gamipress_emails_by_type_';

    $post = ( isset( $_GET['post'] ) ? $_GET['post'] : '' );
    $post_type = ( isset( $_GET['post_type'] ) ? $_GET['post_type'] : '' );

    // Rank

    if( ! empty( $post ) ) {

        // Get rank custom subject
        $subject = gamipress_get_post_meta( $post, $prefix . 'rank_earned_email_subject' );

        // If not empty, override
        if( ! empty( $subject ) ) {
            return $subject;
        }

        $post_type = get_post_type( $post );

    }

    // Rank Type

    if( ! empty( $post_type ) ) {

        // Get the rank type ID (where is stored our custom config)
        $rank_types = gamipress_get_rank_types();
        $rank_type = $rank_types[$post_type];

        // Get rank type custom subject
        $subject = gamipress_get_post_meta( $rank_type['ID'], $prefix . 'rank_earned_email_subject' );

        // If not empty, override
        if( ! empty( $subject ) ) {
            return $subject;
        }

    }

    return $return;

}
add_filter( 'gamipress_preview_rank_earned_email_subject', 'gamipress_emails_by_type_preview_rank_earned_email_subject' );
add_filter( 'gamipress_send_test_rank_earned_email_subject', 'gamipress_emails_by_type_preview_rank_earned_email_subject' );

/**
 * Override the rank email content on preview
 *
 * @since 1.0.0
 *
 * @param string $return
 *
 * @return string
 */
function gamipress_emails_by_type_preview_rank_earned_email_content( $return ) {

    $prefix = '_gamipress_emails_by_type_';

    $post = ( isset( $_GET['post'] ) ? $_GET['post'] : '' );
    $post_type = ( isset( $_GET['post_type'] ) ? $_GET['post_type'] : '' );

    // Rank

    if( ! empty( $post ) ) {

        // Get rank custom content
        $content = gamipress_get_post_meta( $post, $prefix . 'rank_earned_email_content' );

        // If not empty, override
        if( ! empty( $content ) ) {
            return $content;
        }

        $post_type = get_post_type( $post );

    }

    // Rank Type

    if( ! empty( $post_type ) ) {

        // Get the rank type ID (where is stored our custom config)
        $rank_types = gamipress_get_rank_types();
        $rank_type = $rank_types[$post_type];

        // Get rank type custom content
        $content = gamipress_get_post_meta( $rank_type['ID'], $prefix . 'rank_earned_email_content' );

        // If not empty, override
        if( ! empty( $content ) ) {
            return $content;
        }

    }

    return $return;

}
add_filter( 'gamipress_preview_rank_earned_email_content', 'gamipress_emails_by_type_preview_rank_earned_email_content' );
add_filter( 'gamipress_send_test_rank_earned_email_content', 'gamipress_emails_by_type_preview_rank_earned_email_content' );

/* ------------------------
 * RANK REQUIREMENT
   ------------------------ */

/**
 * Override the rank requirement email disable status
 *
 * @since 1.0.0
 *
 * @param bool $return
 * @param integer $user_id
 * @param integer $rank_requirement_id
 * @param WP_Post $rank
 *
 * @return bool True to disable
 */
function gamipress_emails_by_type_disable_rank_requirement_completed_email( $return, $user_id, $rank_requirement_id, $rank ) {

    $prefix = '_gamipress_emails_by_type_';

    // Rank

    // Bail if rank requirements emails are disabled for this rank
    if( (bool) gamipress_get_post_meta( $rank->ID, $prefix . 'disable_rank_requirement_completed_email' ) ) {
        return true;
    }

    // Rank Type

    // Get the rank type ID (where is stored our custom config)
    $rank_types = gamipress_get_rank_types();
    $rank_type = $rank_types[$rank->post_type];

    // Bail if rank requirements emails are disabled for this type
    if( (bool) gamipress_get_post_meta( $rank_type['ID'], $prefix . 'disable_rank_requirement_completed_email' ) ) {
        return true;
    }

    return $return;

}
add_filter( 'gamipress_disable_rank_requirement_completed_email', 'gamipress_emails_by_type_disable_rank_requirement_completed_email', 10, 4 );

/**
 * Override the rank requirement email subject
 *
 * @since 1.0.0
 *
 * @param string $return
 * @param integer $user_id
 * @param integer $rank_requirement_id
 * @param WP_Post $rank
 *
 * @return string
 */
function gamipress_emails_by_type_rank_requirement_completed_email_subject( $return, $user_id, $rank_requirement_id, $rank ) {

    $prefix = '_gamipress_emails_by_type_';

    // Rank

    // Get rank custom subject
    $subject = gamipress_get_post_meta( $rank->ID, $prefix . 'rank_requirement_completed_email_subject' );

    // If not empty, override
    if( ! empty( $subject ) ) {
        return $subject;
    }

    // Rank Type

    // Get the rank type ID (where is stored our custom config)
    $rank_types = gamipress_get_rank_types();
    $rank_type = $rank_types[$rank->post_type];

    // Get rank type custom subject
    $subject = gamipress_get_post_meta( $rank_type['ID'], $prefix . 'rank_requirement_completed_email_subject' );

    // If not empty, override
    if( ! empty( $subject ) ) {
        return $subject;
    }

    return $return;

}
add_filter( 'gamipress_rank_requirement_completed_email_subject', 'gamipress_emails_by_type_rank_requirement_completed_email_subject', 10, 4 );

/**
 * Override the rank requirement email content
 *
 * @since 1.0.0
 *
 * @param string $return
 * @param integer $user_id
 * @param integer $rank_requirement_id
 * @param WP_Post $rank
 *
 * @return string
 */
function gamipress_emails_by_type_rank_requirement_completed_email_content( $return, $user_id, $rank_requirement_id, $rank ) {

    $prefix = '_gamipress_emails_by_type_';

    // Rank

    // Get rank custom content
    $content = gamipress_get_post_meta( $rank->ID, $prefix . 'rank_requirement_completed_email_content' );

    // If not empty, override
    if( ! empty( $content ) ) {
        return $content;
    }

    // Rank Type

    // Get the rank type ID (where is stored our custom config)
    $rank_types = gamipress_get_rank_types();
    $rank_type = $rank_types[$rank->post_type];

    // Get rank type custom content
    $content = gamipress_get_post_meta( $rank_type['ID'], $prefix . 'rank_requirement_completed_email_content' );

    // If not empty, override
    if( ! empty( $content ) ) {
        return $content;
    }

    return $return;

}
add_filter( 'gamipress_rank_requirement_completed_email_content', 'gamipress_emails_by_type_rank_requirement_completed_email_content', 10, 4 );

/**
 * Override the rank requirement email subject on preview
 *
 * @since 1.0.0
 *
 * @param string $return
 *
 * @return string
 */
function gamipress_emails_by_type_preview_rank_requirement_completed_email_subject( $return ) {

    $prefix = '_gamipress_emails_by_type_';

    $post = ( isset( $_GET['post'] ) ? $_GET['post'] : '' );
    $post_type = ( isset( $_GET['post_type'] ) ? $_GET['post_type'] : '' );

    // Rank

    if( ! empty( $post ) ) {

        // Get rank custom subject
        $subject = gamipress_get_post_meta( $post, $prefix . 'rank_requirement_completed_email_subject' );

        // If not empty, override
        if( ! empty( $subject ) ) {
            return $subject;
        }

        $post_type = get_post_type( $post );

    }

    // Rank Type

    if( ! empty( $post_type ) ) {

        // Get the rank type ID (where is stored our custom config)
        $rank_types = gamipress_get_rank_types();
        $rank_type = $rank_types[$post_type];

        // Get rank type custom subject
        $subject = gamipress_get_post_meta( $rank_type['ID'], $prefix . 'rank_requirement_completed_email_subject' );

        // If not empty, override
        if( ! empty( $subject ) ) {
            return $subject;
        }

    }

    return $return;

}
add_filter( 'gamipress_preview_rank_requirement_completed_email_subject', 'gamipress_emails_by_type_preview_rank_requirement_completed_email_subject' );
add_filter( 'gamipress_send_test_rank_requirement_completed_email_subject', 'gamipress_emails_by_type_preview_rank_requirement_completed_email_subject' );

/**
 * Override the rank requirement email content on preview
 *
 * @since 1.0.0
 *
 * @param string $return
 *
 * @return string
 */
function gamipress_emails_by_type_preview_rank_requirement_completed_email_content( $return ) {

    $prefix = '_gamipress_emails_by_type_';

    $post = ( isset( $_GET['post'] ) ? $_GET['post'] : '' );
    $post_type = ( isset( $_GET['post_type'] ) ? $_GET['post_type'] : '' );

    // Rank

    if( ! empty( $post ) ) {

        // Get rank custom content
        $content = gamipress_get_post_meta( $post, $prefix . 'rank_requirement_completed_email_content' );

        // If not empty, override
        if( ! empty( $content ) ) {
            return $content;
        }

        $post_type = get_post_type( $post );

    }

    // Rank Type

    if( ! empty( $post_type ) ) {

        // Get the rank type ID (where is stored our custom config)
        $rank_types = gamipress_get_rank_types();
        $rank_type = $rank_types[$post_type];

        // Get rank type custom content
        $content = gamipress_get_post_meta( $rank_type['ID'], $prefix . 'rank_requirement_completed_email_content' );

        // If not empty, override
        if( ! empty( $content ) ) {
            return $content;
        }

    }

    return $return;

}
add_filter( 'gamipress_preview_rank_requirement_completed_email_content', 'gamipress_emails_by_type_preview_rank_requirement_completed_email_content' );
add_filter( 'gamipress_send_test_rank_requirement_completed_email_content', 'gamipress_emails_by_type_preview_rank_requirement_completed_email_content' );
