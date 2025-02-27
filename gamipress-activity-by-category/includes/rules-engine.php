<?php
/**
 * Rules Engine
 *
 * @package GamiPress\Activity_by_Category\Rules_Engine
 * @since 1.0.0
 */
// Exit if accessed directly
if( !defined( 'ABSPATH' ) ) exit;

/**
 * Checks if an user is allowed to work on a given requirement related to a specific category
 *
 * @since  1.0.0
 *
 * @param bool $return          The default return value
 * @param int $user_id          The given user's ID
 * @param int $requirement_id   The given requirement's post ID
 * @param string $trigger       The trigger triggered
 * @param int $site_id          The site id
 * @param array $args           Arguments of this trigger
 *
 * @return bool True if user has access to the requirement, false otherwise
 */
function gamipress_activity_by_category_user_has_access_to_achievement( $return = false, $user_id = 0, $requirement_id = 0, $trigger = '', $site_id = 0, $args = array() ) {

    // If we're not working with a requirement, bail here
    if ( ! in_array( get_post_type( $requirement_id ), gamipress_get_requirement_types_slugs() ) )
        return $return;

    // Check if user has access to the achievement ($return will be false if user has exceed the limit or achievement is not published yet)
    if( ! $return )
        return $return;

    // If is specific category trigger, rules engine needs the attached category
    if( $trigger === 'gamipress_specific_category_publish_post'
        || $trigger === 'gamipress_specific_category_new_comment'
        || $trigger === 'gamipress_specific_category_post_visit'
        || $trigger === 'gamipress_user_specific_category_post_visit' ) {

        if( $trigger === 'gamipress_user_specific_category_post_visit' ) {
            $category = absint( $args[3] );
        } else {
            $category = absint( $args[2] );
        }

        $required_category = absint( get_post_meta( $requirement_id, '_gamipress_post_category', true ) );

        // True if there is a specific category, a attached category and both are equal
        $return = (bool) (
            $category !== 0
            && $required_category !== 0
            && $category === $required_category
        );
    }

    // Send back our eligibility
    return $return;
}
add_filter( 'user_has_access_to_achievement', 'gamipress_activity_by_category_user_has_access_to_achievement', 10, 6 );